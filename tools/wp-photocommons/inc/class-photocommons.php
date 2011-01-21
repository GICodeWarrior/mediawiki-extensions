<?php
class PhotoCommons {
	const PLUGIN_PATH = '/wp-photocommons/';
	const FILEPATH_PATTERN = 'http://commons.wikimedia.org/w/index.php?title=Special:FilePath&file=%s&width=%s';
	const FILEPAGE_PATTERN = 'http://commons.wikimedia.org/w/index.php?title=File:%s';

	function __construct() {
		if ( is_admin() ) {
			$this->initAdmin();
		} else {
			$this->initFrontend();
		}
	}

	public function addShortcode($args) {
		$filename = $args['file'];
		$width = $args['width'];
		$align = empty($args['align']) ? 'alignright' : 'align' . $args['align'];
		$thumb = $this->getThumbUrl($filename, $width);
		$filepage = $this->getPageUrl($filename, $width);

		return sprintf(
			'<a href="%s" title="%s" class="wp-photocommons-thumb">' .
			'<img src="%s" title="%s via Wikimedia Commons" alt="%s" class="%s" width="%s" />' .
			'</a>',
			$filepage, $filename,
			$thumb, $filename, $filename, $align, $width
		);
	}

	private function getThumbUrl($file, $width) {
		return sprintf(self::FILEPATH_PATTERN, rawurlencode($file), rawurlencode($width));
	}

	private function getPageUrl($file, $width) {
		return sprintf(self::FILEPAGE_PATTERN, rawurlencode($file));
	}

	private function initAdmin() {
		$this->enqueueScripts();
		$this->enqueueStyles();
	}

	private function enqueueScripts() {
		// Register some of our own scripts
		wp_register_script('admin', plugins_url() . self::PLUGIN_PATH . 'js/admin.js');
		wp_register_script('search', plugins_url() . self::PLUGIN_PATH . 'js/search.js');
		wp_register_script('suggestions', plugins_url() . self::PLUGIN_PATH . 'js/jquery.suggestions.js');

		// Enqueue external libraries
		wp_enqueue_script('jquery');
		wp_enqueue_script('jquery-ui-core');
		wp_enqueue_script('jquery-ui-dialog');

		// Enqueue our own scripts
		wp_enqueue_script('admin');
		wp_enqueue_script('search');
		wp_enqueue_script('suggestions');
	}

	private function enqueueStyles() {
		// Register our own styles and enqueue
		wp_register_style('jquid_jquery_blog_stylesheet', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/redmond/jquery-ui.css');
		wp_register_style('suggestions', plugins_url() . self::PLUGIN_PATH . 'css/jquery.suggestions.css');
		wp_register_style('search', plugins_url() . self::PLUGIN_PATH . 'css/search.css');

		wp_enqueue_style('jquid_jquery_blog_stylesheet');
		wp_enqueue_style('suggestions');
		wp_enqueue_style('search');

	}

	private function initFrontend() {
		add_shortcode('photocommons', array($this, 'addShortcode'));
	}
}