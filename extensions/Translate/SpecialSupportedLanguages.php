<?php
/**
 * @author Niklas Laxström
 * @copyright Copyright © 2010 Niklas Laxström
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 */

class SpecialSupportedLanguages extends UnlistedSpecialPage {
	public function __construct() {
		parent::__construct( 'SupportedLanguages' );
	}

	public function execute( $par ) {
		global $wgLang, $wgOut;

		$this->outputHeader();
		$this->setHeaders();

		$locals = LanguageNames::getNames( $wgLang->getCode(),
			LanguageNames::FALLBACK_NORMAL,
			LanguageNames::LIST_MW_AND_CLDR
		);
		$natives = Language::getLanguageNames( false );
		ksort( $natives );

		$titles = array();
		foreach ( $natives as $code => $_ ) {
			$titles[] = Title::capitalize( $code, NS_PORTAL ) . '/translators';
		}

		$dbr = wfGetDB( DB_SLAVE );
		$tables = array( 'page', 'revision', 'text' );
		$vars = array_merge( Revision::selectTextFields(), array( 'page_title', 'page_namespace' ), Revision::selectFields() );
		$conds = array(
			'page_latest = rev_id',
			'rev_text_id = old_id',
			'page_namespace' => NS_PORTAL,
			'page_title' => $titles,
		);

		$res = $dbr->select( $tables, $vars, $conds, __METHOD__ );

		$users = array();
		$lb = new LinkBatch;

		foreach ( $res as $row ) {
			$rev = new Revision( $row );
			$text = $rev->getText();
			$code = strtolower( preg_replace( '!/translators$!', '', $row->page_title ) );
			preg_match_all( '!{{user\|([^}|]+)!', $text, $matches,  PREG_SET_ORDER );
			foreach ( $matches as $match ) {
				$user = Title::capitalize( $match[1], NS_USER );
				$lb->add( NS_USER, $user );
				$lb->add( NS_USER_TALK, $user );
				@$users[$code][] = $user;
			}
		}

		$lb->execute();
		global $wgUser;
		$skin = $wgUser->getSkin();

		$parser = new Parser;
		$parser->setOutputType( 'wiki' );
		$parserOptions = new ParserOptions;

		foreach ( array_keys( $users ) as $code ) {
			$portalTitle = Title::makeTitleSafe( NS_PORTAL, $code );
			$linkText = $parser->parse(
				"==[$code] {$locals[$code]} - {$natives[$code]}==",
				$portalTitle /* as dummy */,
				$parserOptions
			);
			$portalLink = link(
				$portalTitle,
				$linkText,
				array( 'id' => $code ),
				array(),
				attay( 'known', 'noclasses' )
			);
				
			$wgOut->addHtml( $portalLink );

			foreach ( $users[$code] as $index => $username ) {
				$title = Title::makeTitleSafe( NS_USER, $username );
				$users[$code][$index] = $skin->link( $title, $username );
			}

			$wgOut->addHTML( $wgLang->listToText( $users[$code] ) );
		}
	}
}
