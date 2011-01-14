<?php
class Photocommons {
    // TODO: ugly
    const PLUGIN_PATH = "/wp-content/plugins/wp-photocommons/";
    
    function __construct() {
        if (is_admin()) {
            wp_enqueue_script('jquery');
            wp_enqueue_script('jquery-ui-core');
            wp_enqueue_script('jquery-ui-dialog');        
            
            wp_register_script('admin', self::PLUGIN_PATH . 'js/admin.js');
            wp_enqueue_script('admin');
        }
    }
}