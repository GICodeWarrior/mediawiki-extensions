<?php

/**
 * Hook attachments for the <translate> tag.
 *
 * @addtogroup Extensions
 *
 * @author Niklas Laxström
 * @copyright Copyright © 2008, Niklas Laxström
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 */
class TranslateTag {

	public static function getInstance() {
		$obj = new self;
		$obj->reset();
		return $obj;
	}


	// Remember to to use TranslateUtils::injectCSS()
	public static function getHeader( Title $title ) {
		global $wgLang;
		$par = array(
			'group' => 'page|' . $title->getPrefixedText(),
			'language' => $wgLang->getCode(),
		);
		$translate = SpecialPage::getTitleFor( 'Translate' );
		$link = $translate->getFullUrl( wfArrayToCgi( $par ) );

		wfLoadExtensionMessages( 'Translate' );
		$cat = wfMsgForContent( 'translate-tag-category' );
		$linkDesc    = wfMsgNoTrans( 'translate-tag-translate-link-desc' );
		$legendText  = wfMsgNoTrans( 'translate-tag-legend' );
		$legendOther = wfMsgNoTrans( 'translate-tag-legend-fallback' );
		$legendFuzzy = wfMsgNoTrans( 'translate-tag-legend-fuzzy' );

		$legend  = "[[Category:$cat]]";
		$legend .= "<span class='plainlinks'>[$link $linkDesc]</span> | ";
		$legend .= "$legendText <span class=\"mw-translate-other\">$legendOther</span>";
		$legend .= " <span class=\"mw-translate-fuzzy\">$legendFuzzy</span>";
		$legend .= '<br />This page is translatable using the experimental wiki page translation feature.';
		$legend .= "\n----\n";
		return $legend;
	}

	public static function addcss( $outputpage, $text ) {
		TranslateUtils::injectCSS();
		return true;
	}

	const METADATA = '~\n?<!--TS(.*?)-->\n?~us';
	const PATTERN_COMMENT = '~\n?<!--T[=:;](.*?)-->\n?~u';
	const PATTERN_TAG = '~(<translate>)\n?(.+?)(</translate>)~us';

	public static function tag( $parser, &$text, $state ) {
		// Quick escape on normal pages
		if ( strpos( $text, '</translate>' ) === false ) return true;


		$obj = self::getInstance();


		$cb = array( $obj, 'parseMetadata' );
		preg_replace_callback( self::METADATA, $cb, $text );

		$cb = array( $obj, 'replaceTags' );
		$text = preg_replace_callback( self::PATTERN_TAG, $cb, $text );

		$legend = self::getHeader( $parser->getTitle() );
		$text = $legend . $text;

		return true;
	}

	public function replaceTags( $data ) {
		global $wgLang, $wgTitle;

		$input = $data[2];

		$regex = $this->getSectionRegex();
		$matches = array();
		preg_match_all( $regex, $input, $matches, PREG_SET_ORDER );
		foreach ( $matches as $match ) {
			$key = $match['id'];
			$section = $match['section'];



			$key = $this->getTranslationPage( $wgTitle, $key, $wgLang->getCode() );
			$transTitle = Title::newFromText( $key );
			$rev = Revision::loadFromTitle( wfGetDb(), $transTitle );
			if ( $rev ) {
				$translation = $rev->getText();
				if ( strpos( $translation, TRANSLATE_FUZZY ) !== false ) {
					$translation = str_replace( TRANSLATE_FUZZY, '', $translation );
					$translation = '<div class="mw-translate-fuzzy">' . "\n" . $translation . "\n". '</div>';
				}
				$input = str_replace( $section, $translation, $input);
			} else {
				$replace = '<div class="mw-translate-other">' . "\n" . $section . "\n". '</div>';
				$input = str_replace( $section, $replace, $input );
				$input = str_replace( $match['holder'], '', $input );
			}
		}

		$input = preg_replace( self::PATTERN_PLACEHOLDER, '', $input );
		$input = preg_replace( self::METADATA, '', $input );
		$input = preg_replace( self::PATTERN_COMMENT, '', $input );

		return trim($input);

	}

	const PATTERN_SECTION = '~(<!--T:[^-]+-->)(.*?)<!--T;-->~us';
	const PATTERN_PLACEHOLDER = '~<!--T:[^-/]+/?-->~us';

	public function getSectionRegex( $taggedOnly = true ) {
		$id  = '(:? *(?P<holder><!--T:(?P<id>[^-/]+)-->)\n?)';
		$end = '(?P<trail>\n{2,}|\s*\z)';
		$text = '(?Us:[^\n].*)';
		$header = '(?m:(?P<header>(?>={1,6}).+={1,6})[ |\n]?)';

		if ( $taggedOnly ) {
			$regex = "(?P<section>$header?$id$text?)$end";
		} else {
			$regex = "(?P<section>$header?$id?$text?)$end";
			//$regex = $text;
		}

		return "~$regex~u";
	}

	public function reset() {
		$this->sections = array();
		$this->placeholders = array();
		$this->invocation = 0;
	}

	public static function parseSectionDefinitions( Title $title, array &$namespaces ) {
		$obj = self::getInstance();

		$namespaces = array( $title->getNamespace(), MWNamespace::getTalk( $title->getNamespace() ) );

		$defs = array();

		$revision = Revision::newFromTitle( $title );
		$pagecontents = $revision->getText();

		$cb = array( $obj, 'parseMetadata' );
		preg_replace_callback( self::METADATA, $cb, $pagecontents );

		$matches = array();
		preg_match_all( $obj->getSectionRegex(), $pagecontents, $matches, PREG_SET_ORDER );
		foreach ( $matches as $match ) {
			$key = $match['id'];
			$contents = str_replace( $match['holder'], '', $match['section'] );
			list( , $key ) = explode( ':', $obj->getTranslationPage( $title, $key ), 2);
			$defs[$key] = $contents;
		}

		return $defs;
		
	}

	public function getTranslationPage( $title, $key, $code = false ) {
		$format = '$NS:$PAGE/translations/$KEY-$SNIPPET';
		$search = array( '$NS', '$PAGE', '$KEY', '$SNIPPET' );
		$replace = array( $title->getNsText(), $title->getDBkey(), $key, $this->sections[$key]['page'] );
		$page = str_replace( $search, $replace, $format );
		if ( $code !== false ) $page .= "/$code";
		return $page;
	}

	public function onArticleSaveComplete(
		$article, $user, $text, $summary, $isminor, $_, $_, $flags, $revision
	) {
		if ( $revision === null || $isminor ) return true;

		foreach ( $this->changed as $key ) {
			$page = $this->getTranslationPage( $article->getTitle(), $key );
			$title = Title::newFromText( $page );
			if ( !$title ) continue;

			$summary = str_replace( '-->', '-- >', $summary );

			$url = $article->getTitle()->getFullUrl( 'diff=' . $revision->getId() );
			$reason = wfMsgForContent( 'translate-tag-fuzzy-reason', $user->getName(), $url, $summary );
			$reason = "<!-- $reason -->";
			$comment = wfMsgForContent( 'translate-tag-fuzzy-comment', $user->getName(), $revision->getId() );

			FuzzyJob::fuzzyPages( $reason, $comment, $title );
		}
		return true;
	}

	public static function save( $article, $user, &$text, $summary, $isminor, $iswatch, $section ) {
		// Quick escape on normal pages
		if ( strpos( $text, '</translate>' ) === false ) return true;

		$obj = self::getInstance();
		
		// Parse existing section mappings
		$obj->invocation = 0;
		$cb = array( $obj, 'parseMetadata' );
		$text = preg_replace_callback( self::METADATA, $cb, $text );

		$obj->changed = array();
		$obj->invocation = 0;
		$cb = array( $obj, 'saveCb' );
		$text = preg_replace_callback( self::PATTERN_TAG, $cb, $text );

		if ( count($obj->changed) ) {
			// Register fuzzier
			// We need to do it later, so that we know the revision number
			global $wgHooks;
			$wgHooks['ArticleSaveComplete'][] = $obj;
		}

		return true;
	}

	public function saveCb( $matches ) {

		$data = $matches[2];

		// Add sections to unsectioned data
		$cb = array( $this, 'saveCbSectionCb' );
		$regex = $this->getSectionRegex(false);
		$data = preg_replace_callback( $regex, $cb, $data );

		$output  = $matches[1] . "\n" . $data . "\n";
		$output .= $this->outputMetadata();
		$output .= $matches[3];

		$this->invocation++;
		return $output;
	}

	public function parseMetadata( $data ) {
		$matches = array();
		preg_match_all( '~^(.*?)\|(.*?)\|(.*?)$~umD', $data[1], $matches, PREG_SET_ORDER );
		foreach ( $matches as $match ) {
			$this->sections[$match[1]] = array(
				'hash' => $match[2],
				'page' => $match[3],
				'invo' => $this->invocation,
			);
		}

		$this->invocation++;
		return '';
	}

	public function outputMetadata() {
		$s  = "<!--TS\n";
		foreach ( $this->sections as $key => $section ) {
			if ( $section['invo'] !== $this->invocation ) continue;
			$s .= "$key|{$section['hash']}|{$section['page']}\n";
		}
		$s .= "-->\n";
		return $s;
	}

	public function saveCbSectionCb( array $matches ) {
		// Have to do rematch, because this is stupid
		preg_match( $this->getSectionRegex(false), $matches[0], $match );
		$section = $match['section'];

		if ( trim($match[0]) === '' ) return $match[0];

		if ( $match['holder'] !== '' ) {
			$key = $match['id'];
			$newhash = self::hash($match['section']);
			$oldhash = $this->sections[$key]['hash'];


			if ( $newhash !== $oldhash ) {
				$this->changed[] = $key;
			}

			$page = @$this->sections[$key]['page'];
			// Create page, unless it is already choosen
			if ( $page === null ) $page = TranslateUtils::snippet( $section, 30 );

			$array = array(
				'hash' => $newhash,
				'invo' => $this->invocation,
				'page' => $page,
			);

			// Update data
			$this->sections[$key] = $array;

			return $match[0];
		}

		if ( empty($this->sections) ) $key = 0;
		else $key = max( array_keys($this->sections) );

		$this->sections[++$key] = array(
			'hash' => self::hash($section),
			'page' => TranslateUtils::snippet( $section, 30 ),
			'invo' => $this->invocation,
		);

		$holder = "<!--T:$key-->";

		if ( $match['header'] !== '' ) {
			$section = str_replace( $match['header'], $match['header'] . ' ' . $holder, $section );
		} else {
			$section = $holder . "\n" . $section;
		}

		return $section . $match['trail'];
	}

	public static function hash( $contents ) {
		return sha1( trim($contents) );
	}

}