<?php

/**
 * Contest landing page for participants.
 * 
 * @since 0.1
 * 
 * @file SpecialContestWelcome.php
 * @ingroup Contest
 * 
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class SpecialContestWelcome extends SpecialContestPage {
	
	/**
	 * Constructor.
	 * 
	 * @since 0.1
	 */
	public function __construct() {
		parent::__construct( 'ContestWelcome' );
	}
	
	/**
	 * @see SpecialPage::getDescription
	 * 
	 * @since 0.1
	 */
	public function getDescription() {
		return wfMsg( 'special-' . strtolower( $this->getName() ) );
	}
	
	/**
	 * Main method.
	 * 
	 * @since 0.1
	 * 
	 * @param string $arg
	 */
	public function execute( $subPage ) {
		$subPage = str_replace( '_', ' ', $subPage );
		
		if ( !parent::execute( $subPage ) ) {
			return;
		}
		
		$out = $this->getOutput();
		
		$contest = Contest::s()->selectRow( null, array( 'name' => $subPage ) );
		
		if ( $contest === false ) {
			$this->showError( 'contest-welcome-unknown' );
			$out->addHTML( '<br /><br /><br /><br />' );
			$out->returnToMain();
		}
		else {
			// TODO: we might want to have a title field here
			$out->setPageTitle( $contest->getField( 'name' ) );
			
			$this->showIntro( $contest );
			$this->showChallanges( $contest );
			$this->showOpportunities( $contest );
			$this->showRules( $contest );
			$this->showSignupLinks( $contest );
			
			$out->addModules( '' );
		}
	}
	
	protected function showIntro( Contest $contest ) {
		$this->getOutput()->addWikiText( $this->getArticleContent( $contest->getField( 'intro' ) ) );
	}
	
	protected function showChallanges( Contest $contest ) {
		$out = $this->getOutput();
		
		foreach ( $contest->getChallanges() as /* ContestChallange */ $challange ) {
			$out->addHTML( Html::rawElement(
				'fieldset',
				array(
					'data-contest-target' => $this->getSignupLink( $challange->getId() )
				),
				Html::element( 'legend', array(), $challange->getField( 'title' ) )
					. htmlspecialchars( $challange->getField( 'text' ) )
			) );
		}
	}
	
	protected function showOpportunities( Contest $contest ) {
		$this->getOutput()->addWikiText( $this->getArticleContent( $contest->getField( 'oppertunities' ) ) );
	}
	
	protected function showRules( Contest $contest ) {
		// TODO: we might want to have a pop-up with the content here, instead of a link to the page.
		$this->getOutput()->addWikiMsgArray( 'contest-welcome-rules', $contest->getField( 'rules_page' ) ); 
	}
	
	protected function showSignupLinks( Contest $contest ) {
		$out = $this->getOutput();
		
		$out->addHTML( Html::element(
			'button',
			array(
				'id' => 'contest-signup',
				'class' => 'contest-signup',
				'data-contest-target' => $this->getSignupLink( $contest->getField( 'name' ) )
			),
			wfMsg( 'contest-welcome-signup' )
		) );
	}
	
	protected function getSignupLink( $contestName, $challangeId = false ) {
		$signupitle = SpecialPage::getTitleFor( 'ContestSignup', $contestName );
		
		if ( $this->getUser()->isLoggedIn() ) {
			return $signupitle->getLocalURL();
		}
		else {
			return SpecialPage::getTitleFor( 'UserLogin' )->getLocalURL( array(
				//'type' => 'signup',
				'returnto' => $signupitle->getFullText()
			) );
		}
	}

	protected function getArticleContent( $pageName ) {
		$title = Title::newFromText( $pageName );
		
		if ( is_null( $title ) ) {
			return '';
		}
		
		$article = new Article( $title, 0 );
		return $article->getContent();
	}
	
}