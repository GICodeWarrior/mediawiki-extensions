<?php

/**
 * Contest editing interface for contest admins.
 * 
 * @since 0.1
 * 
 * @file SpecialEditContest.php
 * @ingroup Contest
 * 
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class SpecialEditContest extends FormSpecialPage {
	
	protected $contest = false;
	protected $isNewPost = false;
	
	/**
	 * Constructor.
	 * 
	 * @since 0.1
	 */
	public function __construct() {
		parent::__construct( 'EditContest', 'contestadmin', false );
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
	 * @param string $subPage
	 */
	public function execute( $subPage ) {
		$subPage = str_replace( '_', ' ', $subPage );
		
		$this->setParameter( $subPage );
		$this->setHeaders();
		$this->outputHeader();

		// This will throw exceptions if there's a problem
		$this->userCanExecute( $this->getUser() );
		
		if ( $this->getRequest()->wasPosted() && $this->getUser()->matchEditToken( $this->getRequest()->getVal( 'wpEditToken' ) ) ) {
			$this->showForm();
		}
		else {
			$this->showContent( $subPage );
		}
	}
	
	/**
	 * Show the form.
	 * 
	 * @since 0.1
	 */
	protected function showForm() {
		$form = $this->getForm();
		
		if ( $form->show() ) {
			$this->onSuccess();
		}
	}
	
	/**
	 * Attempt to get the contest to be edited or create the one to be added.
	 * If this works, show the form, if not, redirect to special:contests.
	 * 
	 * @since 0.1
	 * 
	 * @param string $subPage
	 */
	protected function showContent( $subPage ) {
		$isNew = $this->getRequest()->wasPosted() && $this->getUser()->matchEditToken( $this->getRequest()->getVal( 'newEditToken' ) );
		
		if ( $isNew ) {
			$data = array( 'name' => $this->getRequest()->getVal( 'newcontest' ) );
			
			$contest = Contest::s()->selectRow( null, $data );
			
			if ( $contest === false ) {
				$contest = new Contest( $data, true );
			}
			else {
				$this->showWarning( 'contest-edit-exists-already' );
			}
		}
		else {
			$contest = Contest::s()->selectRow( null, array( 'name' => $subPage ) );
		}
		
		if ( $contest === false ) {
			$this->getOutput()->redirect( SpecialPage::getTitleFor( 'Contests' )->getLocalURL() );
		}
		else {
			if ( !$isNew ) {
				$this->getOutput()->addHTML(
					SpecialContestPage::getNavigation( $contest->getField( 'name' ), $this->getUser(), $this->getLang(), $this->getName() )
				);
			}
			
			$this->contest = $contest;
			$this->showForm();
			$this->getOutput()->addModules( 'contest.special.editcontest' );
		}
	}
	
	/**
	 * (non-PHPdoc)
	 * @see FormSpecialPage::getForm()
	 */
	protected function getForm() {
		$form = parent::getForm();
		
		$form->addButton(
			'cancelEdit',
			wfMsg( 'cancel' ),
			'cancelEdit',
			array(
				'onclick' => 'window.location="' . SpecialPage::getTitleFor( 'Contests' )->getFullURL() . '";return false;'
			)
		);
		
//		$form->addButton(
//			'deleteEdit',
//			wfMsg( 'delete' ),
//			'deleteEdit'
//		);

		return $form;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see FormSpecialPage::getFormFields()
	 */
	protected function getFormFields() {
		$contest = $this->contest;
		
		$fields = array();

		$fields['id'] = array ( 'type' => 'hidden' );
		
		$fields['name'] = array (
			'type' => 'text',
			'label-message' => 'contest-edit-name',
			'id' => 'contest-name-field',
		);
		
		$fields['status'] = array (
			'type' => 'radio',
			'label-message' => 'contest-edit-status',
			'options' => Contest::getStatusMessages()
		);
		
		$fields['intro'] = array (
			'type' => 'text',
			'label-message' => 'contest-edit-intro',
		);
		
		$fields['opportunities'] = array (
			'type' => 'text',
			'label-message' => 'contest-edit-opportunities',
		);
		
		$fields['rules_page'] = array (
			'type' => 'text',
			'label-message' => 'contest-edit-rulespage',
		);
		
		$fields['help'] = array (
			'type' => 'text',
			'label-message' => 'contest-edit-help',
		);
		
		if ( $contest !== false ) {
			foreach ( $fields as $name => $data ) {
				$fields[$name]['default'] = $contest->getField( $name );
			}
		}
		
		$mappedFields = array();
		
		foreach ( $fields as $name => $field ) {
			$mappedFields['contest-' . $name] = $field;
		}
		
		if ( $contest !== false ) {
			foreach ( $contest->getChallenges() as /* ContestChallenge */ $challenge ) {
				$mappedFields[] = array(
					'class' => 'ContestChallengeField',
					'options' => $challenge->toArray()
				);
			}
		}
		
		$mappedFields['delete-challenges'] = array ( 'type' => 'hidden', 'id' => 'delete-challenges' );
		
		return $mappedFields;
	}
	
	/**
	 * Process the form.  At this point we know that the user passes all the criteria in
	 * userCanExecute(), and if the data array contains 'Username', etc, then Username
	 * resets are allowed.
	 * @param $data array
	 * @return Bool|Array
	 */
	public function onSubmit( array $data ) {
		$fields = array();
		
		foreach ( $data as $name => $value ) {
			$matches = array();
			
			if ( preg_match( '/contest-(.+)/', $name, $matches ) ) {
				$fields[$matches[1]] = $value;
			}
		}
		
		if ( !array_key_exists( 'id', $fields ) || $fields['id'] === '' ) {
			$fields['id'] = null;
		}
		
		$sessionField = 'contestid-' . $fields['name'];
		
		if ( is_null( $fields['id'] ) && !is_null( $this->getRequest()->getSessionData( $sessionField ) ) ) {
			$fields['id'] = $this->getRequest()->getSessionData( $sessionField );
		}
		
		$contest = new Contest( $fields, true );

		$contest->setChallenges( $this->getSubmittedChallenges() );
		$success = $contest->writeAllToDB();
		
		$success = $this->removeDeletedChallenges( $data['delete-challenges'] ) && $success;

		$this->getRequest()->setSessionData( $sessionField, $contest->getId() );
		
		if ( $success ) {
			return true;
		}
		else {
			return array(); // TODO
		}
	}
	
	protected function removeDeletedChallenges( $idString ) {
		if ( $idString == '' ) {
			return true;
		}
		
		return ContestChallenge::s()->delete( array( 'id' => explode( '|', $idString ) ) ); 
	}
	
	protected function getSubmittedChallenges() {
		$challenges = array();
		
		foreach ( $this->getrequest()->getValues() as $name => $value ) {
			$matches = array();
			
			if ( preg_match( '/contest-challenge-(\d+)/', $name, $matches ) ) {
				$challenges[] = $this->getSubmittedChallenge( $matches[1] );
			} elseif ( preg_match( '/contest-challenge-new-(\d+)/', $name, $matches ) ) {
				$challenges[] = $this->getSubmittedChallenge( $matches[1], true );
			}
		}
		
		return $challenges;
	}
	
	/**
	 * Create and return a contest challenge object from the submitted data. 
	 * 
	 * @since 0.1
	 * 
	 * @param integer|null $challengeId
	 * 
	 * @return ContestChallenge
	 */
	protected function getSubmittedChallenge( $challengeId, $isNewChallenge = false ) {
		if ( $isNewChallenge ) {
			$challengeDbId = null;
			$challengeId = "new-$challengeId";
		} else {
			$challengeDbId = $challengeId;
		}
		
		$request = $this->getRequest();
		
		return new ContestChallenge( array(
			'id' => $challengeDbId,
			'text' => $request->getText( "challenge-text-$challengeId" ),
			'title' => $request->getText( "contest-challenge-$challengeId" ),
			'oneline' => $request->getText( "challenge-oneline-$challengeId" ),
		) );
	}
	
	public function onSuccess() {
		$this->getOutput()->redirect( SpecialPage::getTitleFor( 'Contests' )->getLocalURL() );
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
	
}

class ContestChallengeField extends HTMLFormField {
	
	public function getInputHTML( $value ) {
		$attribs = array(
			'class' => 'contest-challenge'
		);
		
		foreach ( $this->mParams['options'] as $name => $value ) {
			$attribs['data-challenge-' . $name] = $value;
		}
		
		return Html::element(
			'div',
			$attribs
		);
	}
	
}