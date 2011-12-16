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
	protected $subPage;
	
	/**
	 * Instance of the object being edited or created.
	 * 
	 * @since 0.1
	 * @var EPDBObject|false
	 */
	protected $item = false; 
	
	protected $itemClass;
	
	protected $listPage;
	
	/**
	 * Constructor.
	 *
	 * @since 0.1
	 * 
	 * @param string $name Name of the page 
	 * @param string $right Right needed to access the page
	 * @param string $itemClass Name of the item class
	 * @param string $listPage Name of the page listing the items
	 */
	public function __construct( $name, $right, $itemClass, $listPage ) {
		$this->itemClass = $itemClass;
		$this->listPage = $listPage;
		
		parent::__construct( $name, $right, false );
	}
	
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
	 * Returns if the page should work in insertion mode rather then modification mode.
	 * 
	 * @since 0.1
	 * 
	 * @return boolean
	 */
	protected function isNew() {
		return $this->getRequest()->wasPosted() && $this->getUser()->matchEditToken( $this->getRequest()->getVal( 'newEditToken' ) );
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
	 * Returns the data to use as condition for selecting the object,
	 * or in case nothing matches the selection, the data to initialize
	 * it with. This is typically an identifier such as name or id.
	 * 
	 * @since 0.1
	 * 
	 * @return array
	 */
	protected function getNewData() {
		return array( 'name' => $this->getRequest()->getVal( 'newname' ) );
	}
	
	/**
	 * Attempt to get the contest to be edited or create the one to be added.
	 * If this works, show the form, if not, redirect to special:contests.
	 *
	 * @since 0.1
	 */
	protected function showContent() {
		$c = $this->itemClass;
		
		if ( $this->isNew() ) {
			$data = $this->getNewData();

			$object = $c::selectRow( null, $data );

			if ( $object === false ) {
				$object = new Contest( $data, true );
			}
			else {
				$this->showWarning( 'educationprogram-' . strtolower( $this->getName() ) . '-exists-already' );
			}
		}
		else {
			$object = $c::selectRow( null, array( 'name' => $this->subPage ) );
		}

		if ( $object === false ) {
			$this->getOutput()->redirect( SpecialPage::getTitleFor( $this->listPage )->getLocalURL() );
		}
		else {
//			if ( !$this->isNew() ) {
//				$this->getOutput()->addHTML(
//					SpecialContestPage::getNavigation( $contest->getField( 'name' ), $this->getUser(), $this->getLanguage(), $this->getName() )
//				);
//			}

			$this->item = $object;
			$this->showForm();
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
				'target-url' => SpecialPage::getTitleFor( $this->listPage )->getFullURL()
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
	 * @return array
	 */
	protected function getFormFields() {
		$fields = array();

		$fields['id'] = array ( 'type' => 'hidden' );
		
		return $fields;
	}
	
	/**
	 * Populates the form fields with the data of the item
	 * and prefixes their names.
	 * 
	 * @since 0.1
	 * 
	 * @param array $fields
	 */
	protected function processFormFields( array $fields ) {
		if ( $this->item !== false ) {
			foreach ( $fields as $name => $data ) {
				$default = $this->item->getField( $name );
				$fields[$name]['default'] = $default;
			}
		}

		$mappedFields = array();

		foreach ( $fields as $name => $field ) {
			$mappedFields['item-' . $name] = $field;
		}

		return $mappedFields;
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
	
	/**
	 * Gets called after the form is saved.
	 * 
	 * @since 0.1
	 */
	public function onSuccess() {
		$this->getOutput()->redirect( SpecialPage::getTitleFor( $this->listPage )->getLocalURL() );
	}
	
	/**
	 * Process the form.  At this point we know that the user passes all the criteria in
	 * userCanExecute(), and if the data array contains 'Username', etc, then Username
	 * resets are allowed.
	 *
	 * @param array $data
	 *
	 * @return Bool|Array
	 */
	public function onSubmit( array $data ) {
		$fields = array();

		foreach ( $data as $name => $value ) {
			$matches = array();

			if ( preg_match( '/item-(.+)/', $name, $matches ) ) {
				$fields[$matches[1]] = $value;
			}
		}

		$c = $this->itemClass;
		$item = new $c( $fields, is_null( $fields['id'] ) );

		$success = $item->writeAllToDB();

		if ( $success ) {
			return true;
		}
		else {
			return array(); // TODO
		}
	}
	
}
