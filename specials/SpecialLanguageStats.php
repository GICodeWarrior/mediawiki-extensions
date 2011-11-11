<?php
/**
 * Contains logic for special page Special:LanguageStats.
 *
 * @file
 * @author Siebrand Mazeland
 * @author Niklas Laxström
 * @copyright Copyright © 2008-2011 Siebrand Mazeland, Niklas Laxström
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

	/**
	 * @var StatsTable
	 */
	protected $table;

	/**
	 * @var String
	 */
	protected $targetValueName = 'code';

	/**
	 * Most of the displayed numbers added together.
	 */
	protected $totals = array( 0, 0, 0 );

	/**
	 * How long spend time calculating missing numbers, before
	 * bailing out.
	 * @var int
	 */
	protected $timelimit = 8;

	/**
	 * Flag to set if nothing to show.
	 * @var bool
	 */
	protected $nothing = false;

	/**
	 * Flag to set if not all numbers are available.
	 * @var bool
	 */
	protected $incomplete = false;

	/**
	 * Whether to hide rows which are fully translated.
	 * @var bool
	 */
	protected $noComplete = true;

	/**
	 * Whether to hide reos which are fully untranslated.
	 * @var bool
	 */
	protected $noEmpty = false;

	/**
	 * The target of stats, language code or group id.
	 */
	protected $target;

	/**
	 * @var bool
	 */
	protected $purge;

	public function __construct() {
		parent::__construct( 'LanguageStats' );
		global $wgLang;
		$this->target = $wgLang->getCode();
	}

	function execute( $par ) {
		global $wgRequest, $wgOut;

		$request = $wgRequest;

		$this->purge = $request->getVal( 'action' ) === 'purge';
		$this->table = new StatsTable();

		$this->setHeaders();
		$this->outputHeader();

		$wgOut->addModules( 'ext.translate.special.languagestats' );
		$wgOut->addModules( 'ext.translate.messagetable' );

		$params = explode( '/', $par  );
		if ( isset( $params[0] ) && trim( $params[0] ) ) {
			$this->target = $params[0];
		}
		if ( isset( $params[1] ) ) {
			$this->noComplete = (bool)$params[1];
		}
		if ( isset( $params[2] ) ) {
			$this->noEmpty = (bool)$params[2];
		}

		// Whether the form has been submitted
		$submitted = $request->getVal( 'x' ) === 'D';

		// Default booleans to false if the form was submitted
		if ( !$this->including() ) {
			$this->target = $request->getVal( $this->targetValueName, $this->target );
			$this->noComplete = $request->getBool( 'suppresscomplete', $this->noComplete && !$submitted );
			$this->noEmpty = $request->getBool( 'suppressempty', $this->noEmpty && !$submitted );
		}

		if ( !$this->including() ) {
			$wgOut->addHTML( $this->getForm() );
		}

		$allowedValues = $this->getAllowedValues();
		if ( in_array( $this->target, $allowedValues, true ) ) {
			$this->outputIntroduction();
			$output = $this->getTable();
			if ( $this->incomplete ) {
				$wgOut->wrapWikiMsg( "<div class='error'>$1</div>", 'translate-langstats-incomplete' );
			}
			if ( $this->nothing ) {
				$wgOut->wrapWikiMsg( "<div class='error'>$1</div>", 'translate-mgs-nothing' );
			}
			$wgOut->addHTML( $output );
		} elseif ( $submitted ) {
			$this->invalidTarget();
		}

	}

	/**
	 * Return the list of allowed values for target here.
	 * @return array
	 */
	protected function getAllowedValues() {
		$langs = Language::getLanguageNames( false );
		return array_keys( $langs );
	}

	/// Called when the target is unknown.
	protected function invalidTarget() {
		global $wgOut;
		$wgOut->wrapWikiMsg( "<div class='error'>$1</div>", 'translate-page-no-such-language' );
	}

	/**
	 * HTML for the top form.
	 * @return \string HTML
	 * @todo duplicated code
	 */
	protected function getForm() {
		global $wgScript;

		$out = Html::openElement( 'div' );
		$out .= Html::openElement( 'form', array( 'method' => 'get', 'action' => $wgScript ) );
		$out .= Html::hidden( 'title', $this->getTitle()->getPrefixedText() );
		$out .= Html::hidden( 'x', 'D' ); // To detect submission
		$out .= Html::openElement( 'fieldset' );
		$out .= Html::element( 'legend', null, wfMsg( 'translate-language-code' ) );
		$out .= Html::openElement( 'table' );

		$out .= Html::openElement( 'tr' );
		$out .= Html::openElement( 'td', array( 'class' => 'mw-label' ) );
		$out .= Xml::label( wfMsg( 'translate-language-code-field-name' ), 'code' );
		$out .= Html::closeElement( 'td' );
		$out .= Html::openElement( 'td', array( 'class' => 'mw-input' ) );
		$out .= Xml::input( 'code', 10, $this->target, array( 'id' => 'code' ) );
		$out .= Html::closeElement( 'td' );
		$out .= Html::closeElement( 'tr' );

		$out .= Html::openElement( 'tr' );
		$out .= Html::openElement( 'td', array( 'colspan' => 2 ) );
		$out .= Xml::checkLabel( wfMsg( 'translate-suppress-complete' ), 'suppresscomplete', 'suppresscomplete', $this->noComplete );
		$out .= Html::closeElement( 'td' );
		$out .= Html::closeElement( 'tr' );

		$out .= Html::openElement( 'tr' );
		$out .= Html::openElement( 'td', array( 'colspan' => 2 ) );
		$out .= Xml::checkLabel( wfMsg( 'translate-ls-noempty' ), 'suppressempty', 'suppressempty', $this->noEmpty );
		$out .= Html::closeElement( 'td' );
		$out .= Html::closeElement( 'tr' );

		$out .= Html::openElement( 'tr' );
		$out .= Html::openElement( 'td', array( 'class' => 'mw-input', 'colspan' => 2 ) );
		$out .= Xml::submitButton( wfMsg( 'translate-ls-submit' ) );
		$out .= Html::closeElement( 'td' );
		$out .= Html::closeElement( 'tr' );

		$out .= Html::closeElement( 'table' );
		$out .= Html::closeElement( 'fieldset' );
		$out .= Html::closeElement( 'form' );
		$out .= Html::closeElement( 'div' );

		return $out;
	}

	/**
	 * Output something helpful to guide the confused user.
	 */
	protected function outputIntroduction() {
		global $wgOut, $wgLang;

		$linker = class_exists( 'DummyLinker' ) ? new DummyLinker : new Linker;
		$languageName = TranslateUtils::getLanguageName( $this->target, false, $wgLang->getCode() );
		$rcInLangLink = $linker->link(
			SpecialPage::getTitleFor( 'Recentchanges' ),
			wfMsgHtml( 'languagestats-recenttranslations' ),
			array(),
			array(
				'translations' => 'only',
				'trailer' => "/" . $this->target
			)
		);

		$out = wfMsgExt( 'languagestats-stats-for', array( 'parse', 'replaceafter' ), $languageName, $rcInLangLink );
		$wgOut->addHTML( $out );
	}

	/**
	 * Returns the table itself.
	 * @return \string HTML
	 */
	function getTable() {
		$table = $this->table;
		$out = '';

		if ( $this->purge ) {
			MessageGroupStats::clearLanguage( $this->target );
		}

		MessageGroupStats::setTimeLimit( $this->timelimit );
		$cache = MessageGroupStats::forLanguage( $this->target );

		$structure = MessageGroups::getGroupStructure();
		foreach ( $structure as $item ) {
			$out .= $this->makeGroupGroup( $item, $cache );
		}

		if ( $out ) {
			$table->setMainColumnHeader( wfMessage( 'translate-ls-column-group' ) );
			$out = $table->createHeader() . "\n" . $out;
			$out .= $table->makeTotalRow( wfMessage( 'translate-languagestats-overall' ), $this->totals );
			$out .= Html::closeElement( 'tbody' );
			$out .= Html::closeElement( 'table' );
			return $out;
		} else {
			$this->nothing = true;
			return '';
		}

		/// @todo: Allow extra message here, once total translated volume goes
		///        over a certain percentage? (former live hack at translatewiki)
		/// if ( $this->totals['2'] && ( $this->totals['1'] / $this->totals['2'] ) > 0.95 ) {
		/// 	$out .= wfMessage( 'translate-somekey' );
		/// }
	}

	/**
	 * @param $item
	 * @param $cache
	 * @param $parent string
	 * @return string
	 */
	protected function makeGroupGroup( $item, $cache, $parent = '' ) {
		if ( !is_array( $item ) ) {
			return $this->makeGroupRow( $item, $cache, $parent === '' ? false : $parent );
		}

		$out = '';
		$top = array_shift( $item );
		$out .= $this->makeGroupRow( $top, $cache, $parent === '' ? true : $parent );
		foreach ( $item as $subgroup ) {
			$parents = trim( $parent . ' ' . $top->getId() );
			$out .= $this->makeGroupGroup( $subgroup, $cache, $parents );
		}
		return $out;
	}

	/**
	 * @param $group
	 * @param $cache
	 * @param $parent bool
	 * @return string
	 */
	protected function makeGroupRow( $group, $cache, $parent = false ) {
		if ( $this->table->isBlacklisted( $group->getId(), $this->target ) !== null ) {
			return '';
		}

		$stats = $cache[$group->getId()];

		list( $total, $translated, $fuzzy ) = $stats;
		if ( $total === null ) {
			$this->incomplete = true;
			$extra = array();
		} else {
			if ( $this->noComplete && $fuzzy === 0 && $translated === $total ) {
				return '';
			}

			if ( $this->noEmpty && $translated === 0 && $fuzzy === 0 ) {
				return '';
			}

			if ( $translated === $total ) {
				$extra = array( 'task' => 'reviewall' );
			} else {
				$extra = array();
			}
		}

		if ( !$group instanceof AggregateMessageGroup ) {
			$this->totals = MessageGroupStats::multiAdd( $this->totals, $stats );
		}

		$rowParams = array();
		$rowParams['data-groupid'] = $group->getId();
		if ( is_string( $parent ) ) {
			$rowParams['data-parentgroups'] = $parent;
		} elseif ( $parent === true ) {
			$rowParams['data-ismeta'] = '1';
		}

		$out  = "\t" . Html::openElement( 'tr', $rowParams );
		$out .= "\n\t\t" . Html::rawElement( 'td', array(),
			$this->table->makeGroupLink( $group, $this->target, $extra ) );
		$out .= $this->table->makeNumberColumns( $fuzzy, $translated, $total );
		$out .= "\n\t" . Html::closeElement( 'tr' ) . "\n";
		return $out;
	}
}
