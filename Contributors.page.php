<?php

/**
 * Special page class for the Contributors extension
 *
 * @addtogroup Extensions
 * @author Rob Church <robchur@gmail.com>
 */
 
class SpecialContributors extends IncludableSpecialPage {

	protected $target;

	public function __construct() {
		parent::__construct( 'Contributors' );
	}
	
	public function execute( $target ) {
		wfProfileIn( __METHOD__ );
		global $wgOut, $wgRequest;
		$this->setHeaders();
		$this->determineTarget( $wgRequest, $target );
		
		# What are we doing? Different execution paths for inclusion,
		# direct access and raw access
		if( $this->including() ) {
			$this->showInclude();
		} elseif( $wgRequest->getText( 'action' ) == 'raw' ) {
			$this->showRaw();
		} else {
			$wgOut->addHTML( $this->makeForm() );
			if( is_object( $this->target ) )
				$this->showNormal();
		}
		
		wfProfileOut( __METHOD__ );	
	}
	
	private function showInclude() {
		wfProfileIn( __METHOD__ );

		global $wgOut, $wgContentLang;

		if( is_object( $this->target ) ) {
			if( $this->target->exists() ) {
				$names = array();
				list( $contributors, $others ) = self::getMainContributors($this->target);
				foreach( $contributors as $username => $info )
					$names[] = $username;
				$output = $wgContentLang->listToText( $names );
				if( $others > 0 )
					$output .= wgMsgForContent( 'word-separator' ) . wfMsgForContent( 'contributors-others', $wgContentLang->formatNum( $others ) );
				$wgOut->addHTML( htmlspecialchars( $output ) );
			} else {
				$wgOut->addHTML( '<p>' . htmlspecialchars( wfMsgForContent( 'contributors-nosuchpage', $this->target->getPrefixedText() ) ) . '</p>' );
			}
		} else {
			$wgOut->addHTML( '<p>' . htmlspecialchars( wfMsgForContent( 'contributors-badtitle' ) ) . '</p>' );
		}
		wfProfileOut( __METHOD__ );	
	}
	
	/**
	 * Output a machine-readable form of the raw information
	 */
	private function showRaw() {
		wfProfileIn( __METHOD__ );
		global $wgOut;
		$wgOut->disable();
		if( is_object( $this->target ) && $this->target->exists() ) {
			foreach( $this->getContributors() as $username => $info ) {
				list( $userid, $count ) = $info;
				header( 'Content-type: text/plain; charset=utf-8' );
				echo( htmlspecialchars( "{$username} = {$count}\n" ) );
			}
		} else {
			header( 'Status: 404 Not Found', true, 404 );
			echo( 'The requested target page does not exist.' );
		}
		wfProfileOut( __METHOD__ );	
	}
	
	private function showNormal() {
		wfProfileIn( __METHOD__ );
		global $wgOut, $wgUser, $wgLang;
		if( $this->target->exists() ) {
			$total = 0;
			$skin =& $wgUser->getSkin();
			$link = $skin->makeKnownLinkObj( $this->target );
			$wgOut->addHTML( '<h2>' . wfMsgHtml( 'contributors-subtitle', $link ) . '</h2>' );
			list( $contributors, $others ) = self::getMainContributors($this->target);
			$wgOut->addHTML( '<ul>' );
			foreach( $contributors as $username => $info ) {
				list( $id, $count ) = $info;
				$line = $skin->userLink( $id, $username ) . $skin->userToolLinks( $id, $username );
				$line .= ' [' . $wgLang->formatNum( $count ) . ']';
				$wgOut->addHTML( '<li>' . $line . '</li>' );
			}
			$wgOut->addHTML( '</ul>' );
			if( $others > 0 ) {
				$others = $wgLang->formatNum( $others );
				$wgOut->addWikiText( wfMsgNoTrans( 'contributors-others-long', $others ) );
			}
		} else {
			$wgOut->addHTML( '<p>' . htmlspecialchars( wfMsg( 'contributors-nosuchpage', $this->target->getPrefixedText() ) ) . '</p>' );
		}
		wfProfileOut( __METHOD__ );	
	}
	
	/**
	 * Retrieve all contributors for the target page worth listing, at least
	 * according to the limit and threshold defined in the configuration
	 *
	 * Also returns the number of contributors who weren't considered
	 * "important enough"
	 *
	 * @return array
	 */
	public static function getMainContributors($title) {
		wfProfileIn( __METHOD__ );
		global $wgContributorsLimit, $wgContributorsThreshold;
		$total = 0;
		$ret = array();
		$all = self::getContributors($title);
		foreach( $all as $username => $info ) {
			list( $id, $count ) = $info;
			if( $total >= $wgContributorsLimit && $count < $wgContributorsThreshold )
				break;
			$ret[$username] = array( $id, $count );
			$total++;
		}
		$others = count( $all ) - count( $ret );
		wfProfileOut( __METHOD__ );	
		return array( $ret, $others );
	}
	
	/**
	 * Retrieve the contributors for the target page with their contribution numbers
	 *
	 * @return array
	 */
	public static function getContributors($title) {
		wfProfileIn( __METHOD__ );
		global $wgMemc;
		$k = wfMemcKey( 'contributors', $title->getArticleId() );
		$contributors = $wgMemc->get( $k );
		if( !$contributors ) {
			$contributors = array();
			$dbr = wfGetDB( DB_SLAVE );
			$res = $dbr->select(
				'revision',
				array(
					'COUNT(*) AS count',
					'rev_user',
					'rev_user_text',
				),
				self::getConditions($title),
				__METHOD__,
				array(
					'GROUP BY' => 'rev_user_text',
					'ORDER BY' => 'count DESC',
				)
			);
			if( $res && $dbr->numRows( $res ) > 0 ) {
				while( $row = $dbr->fetchObject( $res ) )
					$contributors[ $row->rev_user_text ] = array( $row->rev_user, $row->count );
			}
			$wgMemc->set( $k, $contributors, 84600 );
		}
		wfProfileOut( __METHOD__ );
		return $contributors;
	}
	
	/**
	 * Get conditions for the main query
	 *
	 * @return array
	 */
	protected static function getConditions($title) {
		global $wgVersion;
		$conds['rev_page'] = $title->getArticleId();
		if( version_compare( $wgVersion, '1.11alpha', '>=' ) )
			$conds[] = 'rev_deleted & ' . Revision::DELETED_USER . ' = 0';
		return $conds;
	}
	
	/**
	 * Given the web request, and a possible override from a subpage, work
	 * out which we want to use
	 *
	 * @param $request WebRequest we're serving
	 * @param $override Possible subpage override
	 * @return string
	 */
	private function determineTarget( &$request, $override ) {
		$target = $request->getText( 'target', $override );
		$this->target = Title::newFromURL( $target );
	}
	
	/**
	 * Make a nice little form so the user can enter a title and so forth
	 * in normal output mode
	 *
	 * @return string
	 */
	private function makeForm() {
		global $wgScript;
		$self = parent::getTitleFor( 'Contributors' );
		$target = is_object( $this->target ) ? $this->target->getPrefixedText() : '';
		$form  = '<form method="get" action="' . htmlspecialchars( $wgScript ) . '">';
		$form .= Xml::hidden( 'title', $self->getPrefixedText() );
		$form .= '<fieldset><legend>' . wfMsgHtml( 'contributors-legend' ) . '</legend>';
		$form .= '<table><tr>';
		$form .= '<td><label for="target">' . wfMsgHtml( 'contributors-target' ) . '</label></td>';
		$form .= '<td>' . Xml::input( 'target', 40, $target, array( 'id' => 'target' ) ) . '</td>';
		$form .= '</tr><tr>';
		$form .= '<td>&nbsp;</td>';
		$form .= '<td>' . Xml::submitButton( wfMsg( 'contributors-submit' ) ) . '</td>';
		$form .= '</tr></table>';
		$form .= '</fieldset>';
		$form .= '</form>';
		return $form;
	}

}

