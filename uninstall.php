<?php

// if uninstall.php is not called by WordPress, die
if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}


// drop a custom database table
global $wpdb;

delete_option($option_name);

// for site options in Multisite
delete_site_option($option_name);

$table_orders = $wpdb->prefix . 'orders';
$table_contacts = $wpdb->prefix . 'contacts';

$wpdb->query("DROP TABLE IF EXISTS {$table_orders}");
$wpdb->query("DROP TABLE IF EXISTS {$table_contacts}");