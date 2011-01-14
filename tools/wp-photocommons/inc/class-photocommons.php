<?php
class Photocommons {
    // TODO: ugly
    const PLUGIN_PATH = "/wp-content/plugins/wp-photocommons/";

    function __construct() {
        if (is_admin()) {
            wp_enqueue_script('jquery');
            wp_enqueue_script('jquery-ui-core');
            wp_enqueue_script('jquery-ui-dialog');

            wp_register_style('jquid_jquery_blog_stylesheet', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/sunny/jquery-ui.css');
    		wp_enqueue_style('jquid_jquery_blog_stylesheet');

            wp_register_script('admin', self::PLUGIN_PATH . 'js/admin.js');
            wp_enqueue_script('admin');
        }
    }
}