<?php

# Needs to be called within MediaWiki; not standalone
if ( !defined( 'MEDIAWIKI' ) ) {
	echo( "This is an extension to the MediaWiki package and cannot be run standalone.\n" );
	die( -1 );
}

# Define the extension; allows us make sure the extension is used correctly
define( 'PATCHOUTPUTMOBILE', 'PatchOutputMobile' );

// Extension credits that will show up on Special:Version
$wgExtensionCredits['other'][] = array(
	'name' => 'PatchOutputMobile',
	'version' => ExtPatchOutputMobile::VERSION,
	'author' => '[http://www.mediawiki.org/wiki/User:Preilly Preilly]',
	'description' => 'Patch HTML output for mobile',
	'url' => 'http://www.mediawiki.org/wiki/Extension:PatchOutputMobile',
);

$wgExtPatchOutputMobile = new ExtPatchOutputMobile();

$wgHooks['OutputPageBeforeHTML'][] = array( &$wgExtPatchOutputMobile,
											'onOutputPageBeforeHTML' );

class ExtPatchOutputMobile {
	const VERSION = '0.2.1';

	private $doc;

	public $items_to_remove = array(
		'#contentSub',        # redirection notice
		'div.messagebox',     # cleanup data
		'#siteNotice',        # site notice
		'#siteSub',           # "From Wikipedia..."
		'#jump-to-nav',       # jump-to-nav
		'div.editsection',    # edit blocks
		'div.infobox',        # Infoboxes in the article
		'table.toc',          # table of contents
		'#catlinks',          # category links
		'div.stub',           # stub warnings
		'table.metadata',     # ugly metadata
		'form',
		'div.sister-project',
		'script',
		'div.magnify',        # stupid magnify thing
		'.editsection',
		'span.t',
		'sup[style*="help"]',
		'.portal',
		'#protected-icon',
		'.printfooter',
		'.boilerplate',
		'#id-articulo-destacado',
		'#coordinates',
		'#top',
		'.hiddenStructure',
		'.noprint',
		'.medialist',
		'.mw-search-createlink'
	);

	public function onOutputPageBeforeHTML( &$out, &$text ) {
		ob_start( array( &$this, 'parse' ) );
		return true;
	}

	private function _show_hide_callback( $matches ) {
		static $headings = 0;
		$show = 'Show';
		$hide =	'Hide';
		$back_to_top = 'Jump Back A Section';
		++$headings;
		// Back to top link
		$base = "<div class='section_anchors' id='anchor_" . intval( $headings - 1 ) .
			"'><a href='#section_" . intval( $headings - 1 ) .
			"' class='back_to_top'>&uarr; {$back_to_top}</a></div>";
		// generate the HTML we are going to inject
		$buttons = "<button class='section_heading show' section_id='{$headings}'>{$show}</button><button class='section_heading hide' section_id='{$headings}'>{$hide}</button>";
		$base .= "<h2 class='section_heading' id='section_{$headings}'{$matches[1]}{$buttons} <span>{$matches[2]}</span></h2><div class='content_block' id='content_{$headings}'>";

		if ( $headings > 1 ) {
			// Close it up here
			$base = '</div>' . $base;
		}

		$GLOBALS['headings'] = $headings;

		return $base;
	}

	public function javascriptize( $s ) {
		// Closures are a PHP 5.3 feature.
		// MediaWiki currently requires PHP 5.2.3 or higher.
		// So, using old style for now.
		$s = preg_replace_callback(
			'/<h2(.*)<span class="mw-headline" [^>]*>(.+)<\/span>\w*<\/h2>/',
			array( &$this, '_show_hide_callback' ),
			$s
		);

		// if we had any, make sure to close the whole thing!
		if ( isset( $GLOBALS['headings'] ) && $GLOBALS['headings'] > 0 ) {
			$s = str_replace(
				'<div class="visualClear">',
				'</div><div class="visualClear">',
				$s
			);
		}

		return $s;
	}

	public function parse( $s ) {
		// foreach( self::$mTable as $from => $to ) {
		//		$s =& str_replace( $from, $to, $s );
		// }

		return $this->DOMParse( $s );
	}

	private function parse_items_to_remove() {
		$item_to_remove_records = array();

		foreach ( $this->items_to_remove as $item_to_remove ) {
			$type = '';
			$raw_name = '';
			CSS_detection::detect_id_css_or_tag( $item_to_remove, $type, $raw_name );
			$item_to_remove_records[$type][] = $raw_name;
		}

		return $item_to_remove_records;
	}

	public function DOMParse( $html ) {
		libxml_use_internal_errors( true );
		$this->doc = DOMDocument::loadHTML( $html );
		libxml_use_internal_errors( false );
		$this->doc->preserveWhiteSpace = false;
		$this->doc->strictErrorChecking = false;

		$item_to_remove_records = $this->parse_items_to_remove();

		// Tags

		// You can't remove DOMNodes from a DOMNodeList as you're iterating
		// over them in a foreach loop. It will seemingly leave the internal
		// iterator on the foreach out of wack and results will be quite
		// strange. Though, making a queue of items to remove seems to work.
		// For example:
		$title_node = $this->doc->getElementsByTagName( 'title' );

		if ( $title_node->length > 0 ) {
			$title = $title_node->item( 0 )->nodeValue;
		}

		$domElemsToRemove = array();
		foreach ( $item_to_remove_records['TAG'] as $tag_to_remove ) {
			$tag_to_remove_nodes = $this->doc->getElementsByTagName( $tag_to_remove );

			foreach( $tag_to_remove_nodes as $tag_to_remove_node ) {
				if ( $tag_to_remove_node ) {
					$domElemsToRemove[] = $tag_to_remove_node;
				}
			}
		}

		foreach( $domElemsToRemove as $domElement ) {
			$domElement->parentNode->removeChild( $domElement );
		}

		// Elements with named IDs
		foreach ( $item_to_remove_records['ID'] as $item_to_remove ) {
			$item_to_remove_node = $this->doc->getElementById( $item_to_remove );
			if ( $item_to_remove_node ) {
				$removed_item_to_remove = $item_to_remove_node->parentNode->removeChild( $item_to_remove_node );
			}
		}

		// CSS Classes
		$xpath = new DOMXpath( $this->doc );
		foreach ( $item_to_remove_records['CLASS'] as $class_to_remove ) {
			$elements = $xpath->query( '//*[@class="' . $class_to_remove . '"]' );

			foreach( $elements as $element ) {
				$removed_element = $element->parentNode->removeChild( $element );
			}
		}

		// Tags with CSS Classes
		foreach ( $item_to_remove_records['TAG_CLASS'] as $class_to_remove ) {
			$parts = explode( '.', $class_to_remove );

			$elements = $xpath->query(
				'//' . $parts[0] . '[@class="' . $parts[1] . '"]'
			);

			foreach( $elements as $element ) {
				$removed_element = $element->parentNode->removeChild( $element );
			}
		}

		$content = $this->doc->getElementById( 'content' );

		$content_html = $this->doc->saveXML( $content, LIBXML_NOEMPTYTAG );

		if ( empty( $title ) ) {
			$title = 'Wikipedia';
		}

		require( 'views/notices/_donate.html.php' );
		require( 'views/layout/_search_webkit.html.php' );
		require( 'views/layout/_footmenu_default.html.php' );
		require( 'views/layout/application.html.php' );

		return ( strlen( $content_html ) > 4000 ) ? $this->javascriptize( $application_html ) : $application_html; //$content_html;
	}
}

class CSS_detection {

	public static function detect_id_css_or_tag( $snippet, &$type, &$raw_name ) {
		$output = '';

		if ( strpos( $snippet, '.' ) === 0 ) {
			$output = 'Class found: ';
			$type = 'CLASS';
			$raw_name = substr( $snippet, 1 );
		}

		if ( strpos( $snippet, '#' ) === 0 ) {
			$output = 'ID found: ';
			$type = 'ID';
			$raw_name = substr( $snippet, 1 );
		}

		if ( strpos( $snippet, '.' ) !== 0 &&
			strpos( $snippet, '.' ) !== false ) {
			$output = 'Tag with Class found: ';
			$type = 'TAG_CLASS';
			$raw_name = $snippet;
		}

		if ( strpos( $snippet, '.' ) === false &&
			strpos( $snippet, '#' ) === false &&
			strpos( $snippet, '[' ) === false &&
			strpos( $snippet, ']' ) === false ) {
			$output = 'Tag found: ';
			$type = 'TAG';
			$raw_name = $snippet;
		}

		if ( empty( $output ) ) {
			$output = 'Unknown HTML snippet found: ';
			$type = 'UNKNOWN';
			$raw_name = $snippet;
		}

		return $output;
	}
}