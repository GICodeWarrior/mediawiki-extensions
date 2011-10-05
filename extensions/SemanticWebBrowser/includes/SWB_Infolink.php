<?php

/**
 * 
 * @file SWB_Infolink
 * @ingroup SWB
 * @author Anna Kantorovitch and Benedikt Kämpgen
 *
 */
class SWBInfolink extends SMWInfolink {
	
	public function __construct( $internal, $caption, $target, $style = false, array $params = array() ) {
		parent::__construct($internal, $caption, $target, $style, $params);
	}
	
    /**
	 * Static function to construct links to the browsing special.
	 *
	 * @param string $caption The label for the link.
	 * @param string $titleText
	 * @param mixed $style CSS class of a span to embedd the link into, or false if no extra style is required.
	 *
	 * @return SMWInfolink
	 */	 
	public static function newBrowsingLink( $caption, $titleText, $style = 'smwbrowse' ) {
		global $wgContLang;
		return new SMWInfolink(
			true,
			$caption,
			$wgContLang->getNsText( NS_SPECIAL ) . ':BrowseWiki',
			$style,
			array( $titleText )
		);
	}
	
	/**
	 * 
	 * Link for toolbox
	 * @param unknown_type $caption
	 * @param unknown_type $titleText
	 * @param unknown_type $style
	 */
	public static function newBrowsingSemWeb( $caption, $titleText, $style = 'swbbrowse' ) {
		global $wgContLang;
		return new SMWInfolink(
			true,
			$caption,
			$wgContLang->getNsText( NS_SPECIAL ) . ':BrowseWiki',
			$style,
			array( $titleText )
		);
	}
}



