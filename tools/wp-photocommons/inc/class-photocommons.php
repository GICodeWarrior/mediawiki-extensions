<?php
class Photocommons {
    // TODO: ugly
    const PLUGIN_PATH = "/wp-content/plugins/wp-photocommons/";

    function __construct() {
        if (is_admin()) {
            $this->initAdmin();
        } else {
            $this->initFrontend();
        }
    }

    public function addShortcode($args) {
        return print_r($args, false);
    }

    private function initAdmin() {
        wp_enqueue_script('jquery');
        wp_enqueue_script('jquery-ui-core');
        wp_enqueue_script('jquery-ui-dialog');       
                
        wp_register_script('admin', self::PLUGIN_PATH . 'js/admin.js');        

        wp_register_style('jquid_jquery_blog_stylesheet', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/sunny/jquery-ui.css');
		wp_enqueue_style('jquid_jquery_blog_stylesheet');
		
        wp_register_style('suggestions', self::PLUGIN_PATH . "css/jquery.suggestions.css");
		wp_enqueue_style('suggestions');
		
        wp_register_script('admin', self::PLUGIN_PATH . 'js/admin.js');
        wp_register_script('search', self::PLUGIN_PATH . 'js/search.js');
        wp_register_script('suggestions', self::PLUGIN_PATH . 'js/jquery.suggestions.js');        
        wp_enqueue_script('admin');
        wp_enqueue_script('search');
        wp_enqueue_script('suggestions');        
    }

    private function initFrontend() {
        add_shortcode("shortcode", array($this, "addShortcode"));
    }
}