<?php

/**
 * Base special page for special pages in the Contest extension,
 * taking care of some common stuff and providing compatibility helpers.
 * 
 * @since 0.1
 * 
 * @file SpecialContestPage.php
 * @ingroup Contest
 * 
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
abstract class SpecialContestPage extends SpecialPage {
	
	protected $subPage;
	
	/**
	 * @see SpecialPage::getDescription
	 * 
	 * @since 0.1
	 */
	public function getDescription() {
		return wfMsg( 'special-' . strtolower( $this->getName() ) );
	}
	
	/**
	 * Sets headers - this should be called from the execute() method of all derived classes!
	 * 
	 * @since 0.1
	 */
	public function setHeaders() {
		$out = $this->getOutput();
		$out->setArticleRelated( false );
		$out->setRobotPolicy( 'noindex,nofollow' );
		$out->setPageTitle( $this->getDescription() );
	}	
	
	/**
	 * Main method.
	 * 
	 * @since 0.1
	 * 
	 * @param string $arg
	 */
	public function execute( $subPage ) {
		$this->subPage = $subPage;
		
		$this->setHeaders();
		$this->outputHeader();
		
		// If the user is authorized, display the page, if not, show an error.
		if ( !$this->userCanExecute( $this->getUser() ) ) {
			$this->displayRestrictionError();
			return false;
		}
		
		return true;
	}
	
	/**
	 * Show a message in an error box.
	 * 
	 * @since 0.1
	 * 
	 * @param string $message
	 */
	protected function showError( $message ) {
		$this->getOutput()->addHTML(
			'<p class="visualClear errorbox">' . wfMsgExt( $message, 'parseinline' ) . '</p>'
		);
	}
	
	/**
	 * Show a message in a warning box.
	 * 
	 * @since 0.1
	 * 
	 * @param string $message
	 */
	protected function showWarning( $message ) {
		$this->getOutput()->addHTML(
			'<p class="visualClear warningbox">' . wfMsgExt( $message, 'parseinline' ) . '</p>'
		);
	}
	
	/**
	 * Get an array of navigation links.
	 * 
	 * @param boolean $excludeSelf
	 * @param string|null $contestName
	 * 
	 * @since 0.1
	 * 
	 * @return array
	 */
	protected function getNavigationLinks( $excludeSelf = true, $contestName = null ) {
		if ( is_null( $contestName ) ) {
			$contestName = $this->subPage;
		}
		
		$pages = array();
		
		$pages['contest-nav-contests'] = array( 'Contests' );
		
		if ( $this->getUser()->isAllowed( 'contestjudge' ) ) {
			$pages['contest-nav-contest'] = array( 'Contest', $contestName );
		}
		
		if ( $this->getUser()->isAllowed( 'contestadmin' ) ) {
			$pages['contest-nav-editcontest'] = array( 'EditContest', $contestName );
		}
		
		$pages['contest-nav-contestwelcome'] = array( 'ContestWelcome', $contestName );
		
		if ( $this->getUser()->isAllowed( 'contestparticipant' ) ) {
			$pages['contest-nav-contestsignup'] = array( 'ContestSignup', $contestName );
		}
		
		$links = array();
		
		// Yeah, array map would be nice... if only we could use anon functions :/
		foreach ( $pages as $message => $page ) {
			$page = (array)$page;
			
			if ( $excludeSelf && $page[0] == $this->getName() ) {
				continue;
			}
			
			$subPage = count( $page ) > 1 ? $page[1] : false;
			
			$links[] = Html::element(
				'a',
				array( 'href' => SpecialPage::getTitleFor( $page[0], $subPage )->getLocalURL() ),
				wfMsgExt( $message, 'parseinline', $subPage )
			);
		}
		
		return $links;
	}
	
	/**
	 * Display navigation links.
	 * 
	 * @since 0.1
	 * 
	 * @param array $links
	 */
	protected function displayNavigation( array $links = null ) {
		if ( is_null( $links ) ) {
			$links = $this->getNavigationLinks();
		}
		
		$this->getOutput()->addHTML( Html::rawElement( 'p', array(), $this->getLang()->pipeList( $links ) ) );
	}
	
}
