<?php

// if uninstall.php is not called by WordPress, die
if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}


// drop a custom database table
global $wpdb;
$table_name = $wpdb->prefix . 'orders';
delete_option($option_name);

// for site options in Multisite
delete_site_option($option_name);

$wpdb->query("DROP TABLE IF EXISTS {$table_name}");