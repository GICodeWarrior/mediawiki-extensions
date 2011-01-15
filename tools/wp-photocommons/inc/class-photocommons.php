<?php
class PhotoCommons {
    // TODO: ugly
    const PLUGIN_PATH = "/wp-content/plugins/wp-photocommons/";
    const RESIZE_URL = "http://commons.wikimedia.org/w/api.php?action=query&titles=%s&prop=imageinfo&iiprop=url&iiurlwidth=%s&format=php";

    function __construct() {
        if (is_admin()) {
            $this->initAdmin();
        } else {
            $this->initFrontend();
        }
    }

    public function addShortcode($args) {
        $filename = $args['file'];
        $size = $args['size'];
        $align = empty($args['align']) ? 'alignright' : 'align' . $args['align'];
        $d = $this->doApiThumbResizeRequest($filename, $size);

        return sprintf(
            '<a href="%s" title="%s">' .
            '<img src="%s" title="%s" alt="%s" class="%s" width="%s" height="%s" />' .
            '</a>',
            $d['url'], $d['title'], $d['src'], $d['title'], $d['title'],
            $align,
            $d['width'], $d['height']
        );
    }

    private function doApiThumbResizeRequest($filename, $size) {
        ini_set('user_agent', 'PhotoCommons/1.0');
        $url = $this->getResizeUrl($filename, $size);
        $result = unserialize(file_get_contents($url));
        $data = array_pop($result['query']['pages']);

        $image = $data['imageinfo'][0];

        return array(
            "url" => $image['descriptionurl'],
            "src" => $image['thumburl'],
            "width" => $image['thumbwidth'],
            "height" => $image['thumbheight'],
            "title" => $data['title']
        );
    }

    private function getResizeUrl($file, $size) {
        return sprintf(self::RESIZE_URL, rawurlencode($file), rawurlencode($size));
    }

    private function initAdmin() {
        wp_enqueue_script('jquery');
        wp_enqueue_script('jquery-ui-core');
        wp_enqueue_script('jquery-ui-dialog');

        wp_register_script('admin', self::PLUGIN_PATH . 'js/admin.js');

        wp_register_style('jquid_jquery_blog_stylesheet', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/redmond/jquery-ui.css');
		wp_enqueue_style('jquid_jquery_blog_stylesheet');

        wp_register_style('suggestions', self::PLUGIN_PATH . "css/jquery.suggestions.css");
		wp_enqueue_style('suggestions');

        wp_register_style('search', self::PLUGIN_PATH . "css/search.css");
		wp_enqueue_style('search');

        wp_register_script('admin', self::PLUGIN_PATH . 'js/admin.js');
        wp_register_script('search', self::PLUGIN_PATH . 'js/search.js');
        wp_register_script('suggestions', self::PLUGIN_PATH . 'js/jquery.suggestions.js');
        wp_enqueue_script('admin');
        wp_enqueue_script('search');
        wp_enqueue_script('suggestions');
    }

    private function initFrontend() {
        add_shortcode("photocommons", array($this, "addShortcode"));
    }
}