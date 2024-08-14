<?php
namespace WOCDON\Inc;

class Autoloader {

    public static function get_instance() {
        spl_autoload_register( [ __CLASS__, 'autoload' ] );
    }

    private static function autoload( $class_name ) {
        // Check if the namespace matches our plugin
        if ( false === strpos( $class_name, 'WOCDON' ) ) {
            return;
        }

        // remove namespace from classname
        $class_name = str_replace( 'WOCDON\\', '', $class_name );
        $class_name = str_replace( '\\', DIRECTORY_SEPARATOR, $class_name );

        $file = PLUGIN_BASE_PATH . DIRECTORY_SEPARATOR . 'inc' . DIRECTORY_SEPARATOR . strtolower( $class_name ) . '.php';

        if ( file_exists( $file ) ) {
            require_once $file;
        }
    }
}