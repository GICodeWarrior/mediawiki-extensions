<?php

/**
 * Base special page for special pages in the Education Program extension,
 * taking care of some common stuff and providing compatibility helpers.
 *
 * @since 0.1
 *
 * @file SpecialEPPage.php
 * @ingroup EducationProgram
 *
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
abstract class SpecialEPPage extends SpecialPage {

	public $subPage;

	/**
	 * @see SpecialPage::getDescription
	 *
	 * @since 0.1
	 * @return String
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
	 * @param string|null $arg
	 */
	public function execute( $subPage ) {
		$subPage = is_null( $subPage ) ? '' : $subPage;
		$this->subPage = trim( str_replace( '_', ' ', $subPage ) );

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
	 * @param string $message Message key
	 * @param array|string $args Message arguments
	 */
	protected function showError( $message, $args = array() ) {
		$message = call_user_func_array( 'wfMsgExt', array_merge( array( $message ), (array)$args ) );
		$this->getOutput()->addHTML(
			'<p class="visualClear errorbox">' . $message . '</p>'
			. '<hr style="display: block; clear: both; visibility: hidden;" />'
		);
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
	 * Show a message in a success box.
	 *
	 * @since 0.1
	 *
	 * @param string $message Message key
	 * @param array|string $args Message arguments
	 */
	protected function showSuccess( $message, $args = array() ) {
		$message = call_user_func_array( 'wfMsgExt', array_merge( array( $message ), (array)$args ) );
		$this->getOutput()->addHTML(
			'<div class="successbox"><strong><p>' . $message . '</p></strong></div>'
			. '<hr style="display: block; clear: both; visibility: hidden;" />'
		);
	}


}
