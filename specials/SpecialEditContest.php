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
			$this->getOutput()->addModules( 'contest.special.contest' );
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
		
		$fields['oppertunities'] = array (
			'type' => 'text',
			'label-message' => 'contest-edit-oppertunities',
		);
		
		$fields['rules_page'] = array (
			'type' => 'text',
			'label-message' => 'contest-edit-rulespage',
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
			foreach ( $contest->getChallanges() as /* ContestChallange */ $challange ) {
				$mappedFields[] = array(
					'class' => 'ContestChallangeField',
					'options' => $challange->toArray()
				);
			}
		}
		
		$mappedFields['delete-challanges'] = array ( 'type' => 'hidden', 'id' => 'delete-challanges' );
		
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

		$contest->setChallanges( $this->getSubmittedChallanges() );
		$success = $contest->writeAllToDB();
		
		$success = $this->removeDeletedChallanges( $data['delete-challanges'] ) && $success;

		$this->getRequest()->setSessionData( $sessionField, $contest->getId() );
		
		if ( $success ) {
			return true;
		}
		else {
			return array(); // TODO
		}
	}
	
	protected function removeDeletedChallanges( $idString ) {
		if ( $idString == '' ) {
			return true;
		}
		
		return ContestChallange::s()->delete( array( 'id' => explode( '|', $idString ) ) ); 
	}
	
	protected function getSubmittedChallanges() {
		$challanges = array();
		
		foreach ( $this->getrequest()->getValues() as $name => $value ) {
			$matches = array();
			
			if ( preg_match( '/contest-challange-(\d+)/', $name, $matches ) ) {
				$challanges[] = $this->getSubmittedChallange( $matches[1] );
			} elseif ( preg_match( '/contest-challange-new-(\d+)/', $name, $matches ) ) {
				$challanges[] = $this->getSubmittedChallange( $matches[1], true );
			}
		}
		
		return $challanges;
	}
	
	/**
	 * Create and return a contest challange object from the submitted data. 
	 * 
	 * @since 0.1
	 * 
	 * @param integer|null $challangeId
	 * 
	 * @return ContestChallange
	 */
	protected function getSubmittedChallange( $challangeId, $isNewChallange = false ) {
		if ( $isNewChallange ) {
			$challangeDbId = null;
			$challangeId = "new-$challangeId";
		} else {
			$challangeDbId = $challangeId;
		}
		
		$request = $this->getRequest();
		
		return new ContestChallange( array(
			'id' => $challangeDbId,
			'text' => $request->getText( "challange-text-$challangeId" ),
			'title' => $request->getText( "contest-challange-$challangeId" ),
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

class ContestChallangeField extends HTMLFormField {
	
	public function getInputHTML( $value ) {
		$attribs = array(
			'class' => 'contest-challange'
		);
		
		foreach ( $this->mParams['options'] as $name => $value ) {
			$attribs['data-challange-' . $name] = $value;
		}
		
		return Html::element(
			'div',
			$attribs
		);
	}
	
}