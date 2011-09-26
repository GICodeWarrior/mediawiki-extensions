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
	 * @param string $arg
	 */
	public function execute( $subPage ) {
		$this->setParameter( $subPage );
		$this->setHeaders();
		$this->outputHeader();

		// This will throw exceptions if there's a problem
		$this->userCanExecute( $this->getUser() );
		
		if ( $this->getRequest()->wasPosted() && $this->getUser()->matchEditToken( $this->getRequest()->getVal( 'newEditToken' ) ) ) {
			$data = array( 'name' => $this->getRequest()->getVal( 'newcontest' ) );
			
			$contest = Contest::s()->selectRow( null, $data );
			
			if ( $contest === false ) {
				$contest = new Contest( $data, true );
			}
			else {
				// TODO: warn not new
			}
		}
		else {
			$contest = Contest::s()->selectRow( null, array( 'name' => $subPage ) );
		}
		
		if ( $contest === false ) {
			$this->getOutput()->redirect( SpecialPage::getTitleFor( 'Contests' )->getLocalURL() );
		}
		else {
			$this->contest = $contest;
			$form = $this->getForm();
			
			if ( $form->show() ) {
				$this->onSuccess();
			}
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
			'cancelEdit'
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
		
		if ( $contest === false ) {
			return array();
		}
		
		$fields = array();

		$fields['id'] = array ( 'type' => 'hidden', 'default' => $contest->getId() );
		$fields['name'] = array ( 'type' => 'text', 'default' => $contest->getField( 'name' ), 'label-message' => 'contest-edit-name' );
		$fields['status'] = array (
			'type' => 'radio',
			'default' => $contest->getField( 'status' ),
			'label-message' => 'contest-edit-status',
			'options' => Contest::getStatusMessages()
		);
		
		// TODO
		
		$mappedFields = array();
		
		foreach ( $fields as $name => $field ) {
			$mappedFields['contest-' . $name] = $field;
		}
		
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
			
			if ( preg_match( '/contest-(\.+)/', $name, $matches ) ) {
				$fields[$matches[1]] = $value;
			}
		}
		
		if ( !array_key_exists( 'id', $fields ) || $fields['id'] === '' ) {
			$fields['id'] = null;
		}
		
		$sessionField = 'contestid-' . $fields['name'];
		
		if ( is_null( $fields['id'] ) && !is_null( $wgRequest->getSessionData( $sessionField ) ) ) {
			$contest->setId( $wgRequest->getSessionData( $sessionField ) );
		}
		
		$contest = new Contest( $fields );

		$success = $contest->writeToDB();

		$this->getRequest()->setSessionData( $sessionField, $contest->getId() );
		
		if ( $success ) {
			return true;
		}
		else {
			return array(); // TODO
		}
	}
	
	public function onSuccess() {
		$this->getOutput()->redirect( SpecialPage::getTitleFor( 'Contests' )->getLocalURL() );
	}
	
}