<?php

/*
Plugin Name: Orders
Description: Plugin developed to store service orders and send them by email.
Version: 1.0
Author: Sergio Barbosa
License: GPLv2 or later
*/

define( 'ORDERS_VERSION', '1.0' );
define( 'ORDERS_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'ORDERS_PLUGIN_DIR_PUBLIC', plugins_url( "orders" ));
define( 'ORDERS_PLUGIN_ASSETS_PUBLIC', plugins_url( "orders/assets" ));

register_activation_hook( __FILE__, plugin_activation);
register_deactivation_hook( __FILE__, plugin_deactivation);
add_action('parse_request', 'create_order_handler');
add_action('parse_request', 'new_order_handler');
add_action( 'wp_ajax_autocomplete_action', 'autocomplete_action' );
add_action( 'wp_ajax_nopriv_autocomplete_action', 'autocomplete_action' );

add_action( 'admin_menu', 'orders_create_menu' );

add_action('parse_request', 'delete_pdf_order_handler');
add_action('parse_request', 'delete_html_order_handler');

/**
 * This function create all required database tables.
 * @author Sergio Barbosa <sbarbosa115@gmail.com>
 */
function plugin_activation() {
    global $wpdb;

    $charset_collate = $wpdb->get_charset_collate();
    $table_orders = $wpdb->prefix . 'orders';

    $sql = "CREATE TABLE {$table_orders} (
                id int(10) NOT NULL AUTO_INCREMENT,
                detail text COLLATE utf8mb4_unicode_ci,
                PRIMARY KEY (`id`)
            ) $charset_collate";

    $table_contacts = $wpdb->prefix . 'contacts';
    $sqlB = "CREATE TABLE {$table_contacts} (                           
                id int(11) NOT NULL AUTO_INCREMENT,
                name varchar(255) DEFAULT NULL,
                home_phone varchar(55) DEFAULT NULL,
                work_phone varchar(55) DEFAULT NULL,
                job_location varchar(255) DEFAULT NULL,
                PRIMARY KEY (id)
            ) $charset_collate";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );
    dbDelta( $sqlB);
}

/**
 * This function remove all database tables.
 * @author Sergio Barbosa <sbarbosa115@gmail.com>
 */
function plugin_deactivation() {
    global $wpdb;

    $table_orders = $wpdb->prefix . 'orders';
    $table_contacts = $wpdb->prefix . 'contacts';
    $sql = "DROP TABLE {$table_orders}; DROP TABLE {$table_contacts}";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );
}


/***
 * This action is called whenever the form is saved.
 * @author Sergio Barbosa <sbarbosa115@gmail.com>
 */
function create_order_handler() {
    global $wpdb;

    $table_orders = $wpdb->prefix . 'orders';

    if($_SERVER['REQUEST_METHOD'] == 'POST' && $_SERVER["REQUEST_URI"] == '/order/create') {
        if(is_isset_and_not_empty($_POST['preview'])){
            generate_pdf(true);
            die();        
        }

        if(validate_form()){
            $wpdb->insert(
                $table_orders,
                array(
                    'detail' => json_encode($_POST)
                )
            );

            create_or_update_contact($_POST);
            generate_pdf();
            sendmail();

            include "templates/thanks.php";
            die();
        }

        include "templates/new.php";
        die();
    }
}

/**
 * To validate the post parameter before store in database.
 * @param $params Array request to evaluate.
 * @return bool Return true if the given array has a elements in it otherwise false.
 * @author Sergio Barbosa <sbarbosa115@gmail.com>
 */
function validate_post_parameter($params){
    $result = false;
    foreach ($params as $param){
        if($param){
            $result = true;
        }
    }

    return $result;
}

/**
 * Validate if the contact sent was create in database.
 * @param $element Array with the contact to create or update.
 * @return bool False if the contact data is empty.
 * @author Sergio Barbosa <sbarbosa115@gmail.com>
 */
function create_or_update_contact($element){
    global $wpdb;
    $table_contacts = $wpdb->prefix . 'contacts';

    if(!validate_post_parameter($element['order'])){
        return false;
    }

    $result = $wpdb->get_var($wpdb->prepare("SELECT id FROM {$table_contacts} 
              WHERE name LIKE '%%{$element['order']['customer_name']}%%' OR home_phone = '{$element['order']['home_phone']}' OR work_phone = '{$element['order']['work_phone']}' LIMIT 1", null));

    if(!$result){
        $wpdb->insert(
            $table_contacts,
            array(
                'name' => strtolower($element['order']['customer_name']),
                'home_phone' => $element['order']['home_phone'],
                'work_phone' => $element['order']['work_phone'],
                'job_location' => strtolower($element['order']['job_location'])
            )
        );
    } else {

        $wpdb->update(
            $table_contacts,
            array(
                'name' => strtolower($element['order']['customer_name']),
                'home_phone' => $element['order']['home_phone'],
                'work_phone' => $element['order']['work_phone'],
                'job_location' => strtolower($element['order']['job_location'])
            ),
            array('id' => $result)
        );
    }
}

/**
 * This is the service that fill the information whenever the user uses the auto-complete function.
 * @author Sergio Barbosa <sbarbosa115@gmail.com>
 */
function autocomplete_action(){
    global $wpdb;

    $table_contacts = $wpdb->prefix . 'contacts';
    $q = esc_sql($_POST['query']);

    $items = $wpdb->get_results($wpdb->prepare("SELECT * FROM {$table_contacts} WHERE LOWER(name) LIKE LOWER('%%{$q}%%') OR home_phone LIKE '%%{$q}%%' OR work_phone LIKE '%%{$q}%%'", null), ARRAY_A);

    if(!$items){
        wp_send_json(array(0 => "No results."));
    }

    wp_send_json($items);
    wp_die();
}


/**
 * This action is called whenever the form is saved.
 * @author Sergio Barbosa <sbarbosa115@gmail.com>
 */
function new_order_handler() {
    if($_SERVER["REQUEST_URI"] == '/order/new') {
        $next  = "00" . (get_next_id() + 1);
        include "templates/new.php";
        exit();
    }
}

/**
 * This function evaluate if the parameter give exist and if it has some value.
 * @param String $var Variable to evaluate.
 * @return bool
 * @author Sergio Barbosa <sbarbosa115@gmail.com>
 */
function is_isset_and_not_empty($var){
    $result = false;
    if(isset($var) && $var !== null && !empty($var)){
        $result = true;
    }
    return $result;
}

/**
 * Form validation before store in Database.
 * @author Sergio Barbosa <sbarbosa115@gmail.com>
 */
function validate_form(){
    return true;
}


/**
 * This function option generate the PDF.
 * @param $download Boolean If the parameter is sent the function return a PDF response.
 * @author Sergio Barbosa <sbarbosa115@gmail.com>
 */
function generate_pdf($download = false){
    require_once('libs/tcpdf/tcpdf.php');

    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Jarocho Landscaping');
    $pdf->SetTitle('Customer Order');
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
    $pdf->SetMargins(5, 5, 5, true); // set the margins
    if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
        require_once(dirname(__FILE__).'/lang/eng.php');
    }

    $pdf->SetFont('times', null, 9);
    $pdf->AddPage();

    $maintenance = sum_by_key($_POST['maintenance']);
    $springClean = sum_by_key($_POST['spring_clean']);
    $fallClean = sum_by_key($_POST['fall_clean']);
    $bedCare = sum_by_key($_POST['bed_care']);
    $gutterCleaning = sum_by_key($_POST['gutter_cleaning']);
    $removalInstallation = sum_by_key($_POST['removal_installation']);
    $totalMaterialComplex = calculate_material($_POST['fertilization']) + calculate_material($_POST['other_projects']);
    $totalMaterial = $totalMaterialComplex;
    $totalLabor = calculate_labor($_POST['fertilization']) + calculate_labor($_POST['other_projects']) + $maintenance + $springClean + $fallClean + $bedCare + $gutterCleaning + $removalInstallation;
    $totalGeneral = $totalMaterial + $totalLabor;

    $tax = isset($_POST['order']['tax']) ? ($totalGeneral * $_POST['order']['tax'])/100 : 0;
    $totalGeneralNoTax = $totalGeneral - $tax;

    $deposit = isset($_POST['order']['deposit']) ? ($totalGeneralNoTax * $_POST['order']['deposit']) / 100 : 0;
    $balanceDue = $totalGeneralNoTax - $deposit;

    $next  = get_next_id() + 1;

    ob_start();
    require "templates/table.php";
    $html = ob_get_contents();
    ob_end_clean();

    $pdf->writeHTML($html, true, false, true, false, '');

    if($download){
        $pdf->Output('order.pdf', "I");
    } else {
        $pdf->Output(ORDERS_PLUGIN_DIR  . 'temp/order.pdf', "F");
    }
}

/**
 * From Base64 image to generate a PNG file and return path to render in PDF.
 * @param $signature
 * @return string
 * @author Sergio Barbosa <sbarbosa115@gmail.com>
 */
function generate_image_from_signature($signature){
    $path = ORDERS_PLUGIN_DIR  . 'temp/signature.png';

    $dataURI    = "$signature";
    $dataPieces = explode(',',$dataURI);
    $encodedImg = $dataPieces[1];
    $decodedImg = base64_decode($encodedImg);

    file_put_contents($path, $decodedImg);

    return ORDERS_PLUGIN_DIR . "temp/signature.png";
}

/**
 * Sum sub element of key value kind.
 * @param $items array with elements to sum.
 * @return int Amount.
 */
function sum_by_key($items){
    $result = 0;

    foreach ($items as $item){
        if(is_numeric($item)){
            $result += $item;
        }
    }

    return $result;
}

/**
 * Sum the total of labor from given array and return the total.
 * @param $items array with elements to sum.
 * @return int Total.
 */
function calculate_material_labor($items){
    $result = 0;

    foreach ($items as $item){
        $local = 0;
        if(is_numeric($item['material']) && is_numeric($item['amount']) && is_numeric($item['labor'])){
            $local = ($item['material'] + $item['amount'] ) * $item['labor'];
        }
        $result += $local;
    }

    return $result;
}


/**
 * Sum the total for all element with key labor and multiply it for amount and return the result.
 * @param $items array with elements to sum.
 * @return int Total.
 */
function calculate_labor($items){
    $result = 0;

    foreach ($items as $item){
        $local = 0;
        if(is_numeric($item['amount']) && is_numeric($item['material'])){
            $local = $item['amount'] * $item['labor'];
        }
        $result += $local;
    }

    return $result;
}


/**
 * Sum the total for all element with key material and multiply it for amount and return the result.
 * @param $items array with elements to sum.
 * @return int Total.
 */
function calculate_material($items){
    $result = 0;

    foreach ($items as $item){

        $local = 0;
        if(is_numeric($item['amount']) && is_numeric($item['material'])){
            $local = $item['amount'] * $item['material'];
        }
        $result += $local;
    }

    return $result;
}


/**
 * Return the last ID order stored in the database.
 * @return null|string
 * @author Sergio Barbosa <sbarbosa115@gmail.com>
 */
function get_next_id(){
    global $wpdb;

    $table_orders = $wpdb->prefix . 'orders';

    $result = $wpdb->get_var($wpdb->prepare("SELECT id FROM {$table_orders} WHERE 1  ORDER BY id DESC LIMIT 1", array()));

    return $result;
}


/**
 * Delete It.
 */
function delete_pdf_order_handler() {
    if($_SERVER["REQUEST_URI"] == '/order/pdf') {
        generate_pdf(true);
        exit();
    }
}

/***
 * Delete It.
 */
function delete_html_order_handler() {
    if($_SERVER["REQUEST_URI"] == '/order/html') {
        include "templates/table.php";
        exit();
    }
}


/**
 * This function send the email with attached pdf.
 * @author Sergio Barbosa <sbarbosa115@gmail.com>
 */
function sendmail(){

    if(get_option( 'order_from_email' )) {
        $domain = get_option( 'order_from_email' );
        $headers = array("From: Notifications <{$domain}>;");
    } else {
        $headers = array();
    }

    if(get_option( 'order_to_email' )){
        wp_mail(array(get_option( 'order_to_email')), "Order Created", "Someone has created a new order.", $headers, array(ORDERS_PLUGIN_DIR  . 'temp/order.pdf'));
    }
}

/**
 * Enable the main menu option
 */
function orders_create_menu() {
    add_options_page( 'Orders', 'Create Order', 'manage_options', 'create-new-order', 'orders_options' );
    register_setting( 'orders-settings', 'order_from_email' );
    register_setting( 'orders-settings', 'order_to_email' );
    register_setting( 'orders-settings', 'order_signature_space' );
}

/**
 * Enable the main menu option
 */
function orders_options() {
    if ( !current_user_can( 'manage_options' ) )  {
        wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
    }

    include 'templates/configuration.php';
}