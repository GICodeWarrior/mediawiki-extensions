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
		$portalText = wfMsg( 'portal' );

		// Information to be used inside the foreach loop
		$linkInfo['rc']['title'] = SpecialPage::getTitleFor( 'Recentchanges' );
		$linkInfo['rc']['msg'] = wfMsg( 'languagestats-recenttranslations' );
		$linkInfo['stats']['title'] = SpecialPage::getTitleFor( 'LanguageStats' );
		$linkInfo['stats']['msg'] = wfMsg( 'languagestats' );

		foreach ( array_keys( $users ) as $code ) {
			$portalTitle = Title::makeTitleSafe( NS_PORTAL, $code );
			$portalLink = $skin->link(
				$portalTitle,
				wfMsg( 'supportedlanguages-portallink', $code, $locals[$code], $natives[$code] ),
				array(
					'id' => $code,
					'title' => $portalText . ' ' . $locals[$code]
				),
				array(),
				array( 'known', 'noclasses' )
			);

			$wgOut->addHTML( "<h2>" . $portalLink . "</h2>" );

			// Add useful links for language stats and recent changes for the language
			$links[] = $skin->link(
				$linkInfo['stats']['title'],
				$linkInfo['stats']['msg'],
				array(),
				array(
					'code' => $code,
					'suppresscomplete' => '1'
				),
				array( 'known', 'noclasses' )
			);
			$links[] = $skin->link(
				$linkInfo['rc']['title'],
				$linkInfo['rc']['msg'],
				array(),
				array(
					'translations' => 'only',
					'trailer' => "/" . $code
				),
				array( 'known', 'noclasses' )
			);
			$linkList = $wgLang->listToText( $links );

			$wgOut->addHTML( "<p>" . $linkList . "</p>\n" );

			foreach ( $users[$code] as $index => $username ) {
				$title = Title::makeTitleSafe( NS_USER, $username );
				$users[$code][$index] = $skin->link( $title, $username );
			}

			$wgOut->addHTML( "<p>" . wfMsgExt(
				'supportedlanguages-translators',
				'parsemag',
				$wgLang->listToText( $users[$code] ),
				count( $users[$code] )
			) . "</p>\n" );
		}
	}
}
