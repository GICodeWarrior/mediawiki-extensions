<?php

/**
 * Extends FormSpecialPage with commons functions needed in EducationProgram.
 *
 * @since 0.1
 *
 * @file SpecialEPFormPage.php
 * @ingroup EducationProgram
 *
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
abstract class SpecialEPFormPage extends FormSpecialPage {

	/**
	 * The subpage, ie the part after Special:PageName/
	 * Emptry string if none is provided.
	 * 
	 * @since 0.1
	 * @var string
	 */
	public $subPage;
	
	/**
	 * @see SpecialPage::getDescription
	 *
	 * @since 0.1
	 */
	public function getDescription() {
		$action = $this->isNew() ? 'add' : 'edit';
		return wfMsg( 'special-' . strtolower( $this->getName() ) . $action );
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
		$subPage = is_null( $subPage ) ? '' : $subPage;
		$this->subPage = trim( str_replace( '_', ' ', $subPage ) );

		$this->setHeaders();
		$this->outputHeader();

		// This will throw exceptions if there's a problem.
		$this->checkExecutePermissions( $this->getUser() );

		if ( $this->isNew() ) {
			$this->showForm();
		}
		else {
			$this->showContent();
		}
	}
	
	/**
	 * 
	 * Enter description here ...
	 */
	protected function isNew() {
		return $this->getRequest()->wasPosted() && $this->getUser()->matchEditToken( $this->getRequest()->getVal( 'wpEditToken' ) );
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
	 * (non-PHPdoc)
	 * @see FormSpecialPage::getForm()
	 * @return HTMLForm|null
	 */
	protected function getForm() {
		$form = parent::getForm();

		$form->addButton(
			'cancelEdit',
			wfMsg( 'cancel' ),
			'cancelEdit',
			array(
				'target-url' => SpecialPage::getTitleFor( 'Contests' )->getFullURL()
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
	 * Show a message in a warning box.
	 *
	 * @since 0.1
	 *
	 * @param string $message Message key
	 * @param array|string $args Message arguments
	 */
	protected function showWarning( $message, $args = array() ) {
		$message = call_user_func_array( 'wfMsgExt', array_merge( array( $message ), (array)$args ) );
		$this->getOutput()->addHTML(
			'<p class="visualClear warningbox">' . $message . '</p>'
			. '<hr style="display: block; clear: both; visibility: hidden;" />'
		);
	}

}
