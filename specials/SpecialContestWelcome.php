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
		else if ( $contest->getField( 'status' ) !== Contest::STATUS_ACTIVE ) {
			// TODO: show message 
		}
		else {
			$this->showEnabledPage( $contest );
		}
	}
	
	protected function showEnabledPage( Contest $contest ) {
		$out = $this->getOutput();
		
		$alreadySignedup = $this->getUser()->isLoggedIn();
		
		if ( $alreadySignedup ) {
			// Check if the user is already a contestant in this contest.
			// If he is, reirect to submission page, else show signup form.
			$alreadySignedup = ContestContestant::s()->selectRow(
				'id',
				array(
					'contest_id' => $contest->getId(),
					'user_id' => $this->getUser()->getId()
				)
			) !== false;
		}
		
		if ( $alreadySignedup ) {
			$out->redirect( SpecialPage::getTitleFor( 'MyContests', $contest->getField( 'name' ) )->getLocalURL() );
		}
		else {
			$out->setPageTitle( $contest->getField( 'name' ) );
			
			$this->showIntro( $contest );
			$this->showChallenges( $contest );
			$this->showOpportunities( $contest );
			$this->showRules( $contest );
			
			$out->addModules( 'contest.special.welcome' );
		}
	}
	
	/**
	 * Show the intro text for this contest.
	 * 
	 * @since 0.1
	 * 
	 * @param Contest $contest
	 */
	protected function showIntro( Contest $contest ) {
		$this->getOutput()->addWikiText( ContestUtils::getArticleContent( $contest->getField( 'intro' ) ) );
	}
	
	/**
	 * Show a list of the challenges part of this contest.
	 * 
	 * @since 0.1
	 * 
	 * @param Contest $contest
	 */
	protected function showChallenges( Contest $contest ) {
		$this->showNoJSFallback( $contest );
		
		$this->getOutput()->addHTML( '<div id="contest-challenges"></div><div style="clear:both"></div>' );
		
		$this->addContestJS( $contest );
	}
	
	protected function addContestJS( Contest $contest ) {
		$challenges = array();
		
		foreach ( $contest->getChallenges() as /* ContestChallenge */ $challenge ) {
			$data = $challenge->toArray();
			$data['target'] = $this->getSignupLink( $contest->getField( 'name' ), $challenge->getId() );
			$challenges[] = $data;
		}
		
		$this->getOutput()->addScript( 
			Skin::makeVariablesScript( 
				array(
					'ContestChallenges' => $challenges,
					'ContestConfig' => array()
				)
			)
		);
	}
	
	protected function showNoJSFallback( Contest $contest ) {
		$out = $this->getOutput();
		
		$out->addHTML( '<noscript>' );
		$out->addHTML( '<p class="errorbox">' . htmlspecialchars( wfMsg( 'contest-welcome-js-off' ) ) . '</p>' );
		// TODO?
		$out->addHTML( '</noscript>' );
	}
	
	/**
	 * Show the opportunities for this contest.
	 * 
	 * @since 0.1
	 * 
	 * @param Contest $contest
	 */
	protected function showOpportunities( Contest $contest ) {
		$this->getOutput()->addWikiText( ContestUtils::getArticleContent( $contest->getField( 'opportunities' ) ) );
	}
	
	/**
	 * Show the rules for this contest.
	 * 
	 * @since 0.1
	 * 
	 * @param Contest $contest
	 */
	protected function showRules( Contest $contest ) {
		// TODO: we might want to have a pop-up with the content here, instead of a link to the page.
		$this->getOutput()->addWikiMsgArray( 'contest-welcome-rules', $contest->getField( 'rules_page' ) ); 
	}
	
	/**
	 * Gets the URL for the signup links.
	 * When the user has to login, this will be to the login page,
	 * with a retunrto to the signup page.
	 * 
	 * @since 0.1
	 * 
	 * @param string $contestName
	 * @param integer|false $challengeId
	 * 
	 * @return string
	 */
	protected function getSignupLink( $contestName, $challengeId = false ) {
		if ( $challengeId !== false ) {
			$contestName .= '/' . $challengeId;
		}
		
		$signupTitle = SpecialPage::getTitleFor( 'ContestSignup', $contestName );
		
		if ( $this->getUser()->isLoggedIn() ) {
			return $signupTitle->getLocalURL();
		}
		else {
			return SpecialPage::getTitleFor( 'Userlogin' )->getLocalURL( array(
				//'type' => 'signup',
				'returnto' => $signupTitle->getFullText(),
				'campaign' => 'contests'
			) );
		}
	}

}
