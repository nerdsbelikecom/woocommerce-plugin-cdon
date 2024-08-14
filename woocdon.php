<?php
/*
    Plugin Name: WooCDON
    Plugin URI: https://github.com/nerdsbelikecom/woocommerce-plugin-cdon
    Description: Free CDON Plugin for WooCommerce.
    Author: Juan Soto
    Author URI: https://www.linkedin.com/in/juan-soto-83bb8765
    Version: 1.0.0
    Text Domain: woocdon
    Domain Path: /lang
*/

// Security, don't run outside kids!
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Define plugin constants
if ( !defined( 'WOCDON_PLUGIN_BASE_PATH' ) ) {
    define( 'WOCDON_PLUGIN_BASE_PATH', untrailingslashit( plugin_dir_path( __FILE__ ) ) );
}

if ( !defined( 'WOCDON_PLUGIN_INC_DIR_PATH' ) ) {
    define( 'WOCDON_PLUGIN_INC_DIR_PATH', WOCDON_PLUGIN_BASE_PATH . '/inc' );
}

// Load plugin text domain for internationalization.
function woocdon_load_textdomain() {
    load_plugin_textdomain( 'woocdon', false, basename( dirname( __FILE__ ) ) . '/lang' );
}
add_action( 'plugins_loaded', 'woocdon_load_textdomain' );

// Autoload classes and get plugin instance
function woocdon_get_plugin_instance() {
  if ( class_exists( '\\WOCDON\\Inc\\Autoloader' ) ) {
      \WOCDON\Inc\Autoloader::get_instance();
  } else {
      // Handle the error, maybe log or notify the admin
      error_log( 'WOCDON Autoloader class not found.' );
  }
}
woocdon_get_plugin_instance();