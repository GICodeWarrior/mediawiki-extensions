<?php
/**
 * Contains logic for special page Special:LanguageStats.
 *
 * @file
 * @author Siebrand Mazeland
 * @author Niklas Laxström
 * @copyright Copyright © 2008-2010 Siebrand Mazeland, Niklas Laxström
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 */

/**
 * Implements includable special page Special:LanguageStats which provides
 * translation statistics for all defined message groups.
 *
 * Loosely based on the statistics code in phase3/maintenance/language
 *
 * Use {{Special:LanguageStats/nl/1}} to show for 'nl' and suppres completely
 * translated groups.
 *
 * @ingroup SpecialPage TranslateSpecialPage Stats
 */
class SpecialLanguageStats extends IncludableSpecialPage {
	function __construct() {
		parent::__construct( 'LanguageStats' );
	}

	function execute( $par ) {
		global $wgRequest, $wgOut;

		$this->setHeaders();
		$this->outputHeader();

		$wgOut->addExtensionStyle( TranslateUtils::assetPath( 'Translate.css' ) );

		// no UI when including()
		if ( !$this->including() ) {
			$code = $wgRequest->getVal( 'code', $par );
			$suppressComplete = $wgRequest->getVal( 'suppresscomplete', $par );
			$wgOut->addHTML( $this->buildLanguageForm( $code, $suppressComplete ) );
		} else {
			$paramArray = explode( '/', $par, 2 );
			$code = $paramArray[0];
			$suppressComplete = isset( $paramArray[1] ) && (bool)$paramArray[1];
		}

		if ( !$code ) {
			global $wgUser;

			if ( $wgUser->isLoggedIn() ) {
				global $wgLang;

				$code = $wgLang->getCode();
			}
		}

		$out = '';

		if ( array_key_exists( $code, Language::getLanguageNames() ) ) {
			$out .= $this->getGroupStats( $code, $suppressComplete );
		} else if ( $code ) {
			$wgOut->wrapWikiMsg( "<div class='error'>$1</div>", 'translate-page-no-such-language' );
		}

		$wgOut->addHTML( $out );
	}

	/**
	 * HTML for the top form.
	 * @param $code \string A language code (default empty, example: 'en').
	 * @param $suppressComplete \bool If completely translated groups should be suppressed (default: false).
	 * @return \string HTML
	 */
	function buildLanguageForm( $code = '', $suppressComplete = false ) {
		global $wgScript;

		$t = $this->getTitle();

		$out = Xml::openElement( 'div', array( 'class' => 'languagecode' ) );
		$out .= Xml::openElement( 'form', array( 'method' => 'get', 'action' => $wgScript ) );
		$out .= Xml::hidden( 'title', $t->getPrefixedText() );
		$out .= Xml::openElement( 'fieldset' );
		$out .= Xml::element( 'legend', null, wfMsg( 'translate-language-code' ) );
		$out .= Xml::openElement( 'table', array( 'id' => 'langcodeselect', 'class' => 'allpages' ) );

		$out .= Xml::openElement( 'tr' );
		$out .= Xml::openElement( 'td', array( 'class' => 'mw-label' ) );
		$out .= Xml::label( wfMsg( 'translate-language-code-field-name' ), 'code' );
		$out .= Xml::closeElement( 'td' );
		$out .= Xml::openElement( 'td', array( 'class' => 'mw-input' ) );
		$out .= Xml::input( 'code', 30, str_replace( '_', ' ', $code ), array( 'id' => 'code' ) );
		$out .= Xml::closeElement( 'td' );
		$out .= Xml::closeElement( 'tr' );

		$out .= Xml::openElement( 'tr' );
		$out .= Xml::openElement( 'td', array( 'colspan' => 2 ) );
		$out .= Xml::checkLabel( wfMsg( 'translate-suppress-complete' ), 'suppresscomplete', 'suppresscomplete', $suppressComplete );
		$out .= Xml::closeElement( 'td' );
		$out .= Xml::closeElement( 'tr' );

		$out .= Xml::openElement( 'tr' );
		$out .= Xml::openElement( 'td', array( 'class' => 'mw-input', 'colspan' => 2 ) );
		$out .= Xml::submitButton( wfMsg( 'allpagessubmit' ) );
		$out .= Xml::closeElement( 'td' );
		$out .= Xml::closeElement( 'tr' );

		$out .= Xml::closeElement( 'table' );
		$out .= Xml::closeElement( 'fieldset' );
		$out .= Xml::closeElement( 'form' );
		$out .= Xml::closeElement( 'div' );

		return $out;
	}

	/**
	 * Statistics table element (heading or regular cell)
	 *
	 * @todo document
	 * @param $in \string Element contents.
	 * @param $bgcolor \string Backround color in ABABAB format.
	 * @param $sort \string Value used for sorting.
	 * @return \string Html td element.
	 */
	function element( $in, $bgcolor = '', $sort = '' ) {
		$attributes = array();
		if ( $sort ) $attributes['data-sort-value'] = $sort;
		if ( $bgcolor ) $attributes['style'] = "background-color: #" . $bgcolor;

		$element = Xml::element( 'td', $attributes, $in );
		return "\t\t" . $element . "\n";
	}

	function getBackgroundColour( $subset, $total, $fuzzy = false ) {
		$v = @round( 255 * $subset / $total );

		if ( $fuzzy ) {
			// Weigh fuzzy with factor 20.
			$v = $v * 20;
			if ( $v > 255 ) $v = 255;
			$v = 255 - $v;
		}

		if ( $v < 128 ) {
			// Red to Yellow
			$red = 'FF';
			$green = sprintf( '%02X', 2 * $v );
		} else {
			// Yellow to Green
			$red = sprintf( '%02X', 2 * ( 255 - $v ) );
			$green = 'FF';
		}
		$blue = '00';

		return $red . $green . $blue;
	}

	function createHeader( $code ) {
		global $wgUser, $wgLang;

		$languageName = TranslateUtils::getLanguageName( $code, false, $wgLang->getCode() );
		$rcInLangLink = $wgUser->getSkin()->link(
			SpecialPage::getTitleFor( 'Recentchanges' ),
			wfMsgHtml( 'languagestats-recenttranslations' ),
			array(),
			array(
				'translations' => 'only',
				'trailer' => "/" . $code
			)
		);

		$out = wfMsgExt( 'languagestats-stats-for', array( 'parse', 'replaceafter' ), $languageName, $rcInLangLink );

		// Create table header
		$out .= Xml::openElement(
			'table',
			array(
				'class' => "sortable wikitable mw-sp-translate-table"
			)
		);

		$out .= Xml::openElement( 'tr' );
		$out .= Xml::element( 'th', array( 'title' => self::newlineToWordSeparator( wfMsg( 'translate-page-group-tooltip' ) ) ), wfMsg( 'translate-page-group' ) );
		$out .= Xml::element( 'th', array( 'title' => self::newlineToWordSeparator( wfMsg( 'translate-total-tooltip' ) ) ), wfMsg( 'translate-total' ) );
		$out .= Xml::element( 'th', array( 'title' => self::newlineToWordSeparator( wfMsg( 'translate-untranslated-tooltip' ) ) ), wfMsg( 'translate-untranslated' ) );
		$out .= Xml::element( 'th', array( 'title' => self::newlineToWordSeparator( wfMsg( 'translate-percentage-complete-tooltip' ) ) ), wfMsg( 'translate-percentage-complete' ) );
		$out .= Xml::element( 'th', array( 'title' => self::newlineToWordSeparator( wfMsg( 'translate-percentage-fuzzy-tooltip' ) ) ), wfMsg( 'translate-percentage-fuzzy' ) );
		$out .= Xml::closeElement( 'tr' );

		return $out;
	}

	/**
	 * HTML for language statistics.
	 * Copied and adaped from groupStatistics.php by Nikerabbit
	 *
	 * @param $code \string A language code (default empty, example: 'en').
	 * @param $suppressComplete \bool If completely translated groups should be suppressed
	 * @return \string HTML
	 */
	function getGroupStats( $code, $suppressComplete = false ) {
		global $wgUser, $wgLang, $wgOut;

		$out = '';

		$cache = new ArrayMemoryCache( 'groupstats' );
		$groups = MessageGroups::singleton()->getGroups();

		foreach ( $groups as $groupName => $g ) {
			// Do not report if this group is blacklisted.
			$groupId = $g->getId();
			$blacklisted = $this->isBlacklisted( $groupId, $code );

			if ( $blacklisted !== null ) {
				continue;
			}

			$fuzzy = $translated = $total = 0;

			$incache = $cache->get( $groupName, $code );
			if ( $incache !== false ) {
				list( $fuzzy, $translated, $total ) = $incache;
			}

			// Re-calculate if cache is empty or insane
			if ( !$total ) {
				// Initialise messages.
				$collection = $g->initCollection( $code );
				$collection->setInFile( $g->load( $code ) );
				$collection->filter( 'ignored' );
				$collection->filter( 'optional' );
				// Store the count of real messages for later calculation.
				$total = count( $collection );

				// Count fuzzy first.
				$collection->filter( 'fuzzy' );
				$fuzzy = $total - count( $collection );

				// Count the completed translations.
				$collection->filter( 'hastranslation', false );
				$translated = count( $collection );

				$cache->set( $groupName, $code, array( $fuzzy, $translated, $total ) );
				$cache->commit();
			}

			if ( $total === 0 ) {
				wfWarn( __METHOD__ . ": Group $groupName has zero message ($code)" );
				continue;
			}

			// Skip if $suppressComplete and complete
			if ( $suppressComplete && !$fuzzy && $translated === $total ) {
				continue;
			}

			if ( $translated === $total ) {
				$extra = array( 'task' => 'reviewall' );
			} else {
				$extra = array();
			}

			$out .= Xml::openElement( 'tr' );
			$out .= '<td>' . $this->makeGroupLink( $g, $code, $extra ) . '</td>';
			$out .= Xml::element( 'td', null, $wgLang->formatNum( $total ) );
			$out .= Xml::element( 'td', null, $wgLang->formatNum( $total - $translated ) );
			$out .= $this->element( $this->formatPercentage( $translated / $total ),
				$this->getBackgroundColour( $translated, $total ),
				sprintf( '%1.5f', $translated / $total ) );
			$out .= $this->element( $this->formatPercentage( $fuzzy / $total ),
				$this->getBackgroundColour( $fuzzy, $total, true ),
				sprintf( '%1.5f', $fuzzy / $total ) );
			$out .= Xml::closeElement( 'tr' );
		}

		if ( $out ) {
			$out = $this->createHeader( $code ) . $out;
			$out .= Xml::closeElement( 'table' );
		} else {
			$out = wfMsgExt( 'translate-nothing-to-do', 'parse' );
		}

		return $out;
	}

	protected function formatPercentage( $num ) {
		global $wgLang;
		$fmt = $wgLang->formatNum( number_format( round( 100 * $num, 2 ), 2 ) );
		return wfMsg( 'percent', $fmt );
	}

	protected function getGroupLabel( $group ) {
		$groupLabel = htmlspecialchars( $group->getLabel() );

		// Bold for meta groups.
		if ( $group->isMeta() ) {
			$groupLabel = Xml::tags( 'b', null, $groupLabel );
		}

		return $groupLabel;
	}

	protected function makeGroupLink( $group, $code, $params ) {
		global $wgOut, $wgUser;

		$specialTranslate = SpecialPage::getTitleFor( 'Translate' );
		$skin = $wgUser->getSkin();

		$queryParameters = $params + array(
			'group' => $group->getId(),
			'language' => $code
		);

		$attributes = array(
			'title' => strip_tags( $wgOut->parse( $group->getDescription(), false ) )
		);

		$translateGroupLink = $skin->link(
			$specialTranslate, $this->getGroupLabel( $group ), $attributes, $queryParameters
		);

		return $translateGroupLink;

	}

	protected function isBlacklisted( $groupId, $code ) {
		global $wgTranslateBlacklist;

		$blacklisted = null;

		$checks = array(
			$groupId,
			strtok( $groupId, '-' ),
			'*'
		);

		foreach ( $checks as $check ) {
			$blacklisted = @$wgTranslateBlacklist[$check][$code];

			if ( $blacklisted !== null ) {
				break;
			}
		}

		return $blacklisted;
	}

	/**
	 * Used to circumvent ugly tooltips when newlines are used in the
	 * message content ("x\ny" becomes "x y").
	 *
	 * @todo Name does not match behaviour.
	 * @todo Make this a static helper function somewhere?
	 */
	private static function newlineToWordSeparator( $text ) {
		$wordSeparator = wfMsg( 'word-separator' );

		$text = strtr( $text, array(
			"\n" => $wordSeparator,
			"\r" => $wordSeparator,
			"\t" => $wordSeparator,
		) );

		return $text;
	}
}
