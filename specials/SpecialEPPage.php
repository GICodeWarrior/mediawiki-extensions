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

	/**
	 * The subpage, ie the part after Special:PageName/
	 * Empty string if none is provided.
	 * 
	 * @since 0.1
	 * @var string
	 */
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
		$out->setPageTitle( $this->getDescription() );
	}

	/**
	 * Main method.
	 *
	 * @since 0.1
	 *
	 * @param string|null $subPage
	 *
	 * @return boolean
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
	 * @param Message $message
	 */
	protected function showError( Message $message ) {
		$this->getOutput()->addHTML(
			'<p class="visualClear errorbox">' . $message->parse() . '</p>'
			. '<hr style="display: block; clear: both; visibility: hidden;" />'
		);
	}

	/**
	 * Show a message in a warning box.
	 *
	 * @since 0.1
	 *
	 * @param Message $message
	 */
	protected function showWarning( Message $message ) {
		$this->getOutput()->addHTML(
			'<p class="visualClear warningbox">' . $message->parse() . '</p>'
			. '<hr style="display: block; clear: both; visibility: hidden;" />'
		);
	}

	/**
	 * Show a message in a success box.
	 *
	 * @since 0.1
	 *
	 * @param Message $message
	 */
	protected function showSuccess( Message $message ) {
		$this->getOutput()->addHTML(
			'<div class="successbox"><strong><p>' . $message->parse() . '</p></strong></div>'
			. '<hr style="display: block; clear: both; visibility: hidden;" />'
		);
	}

	/**
	 * Get the Language being used for this instance.
	 * getLang was deprecated in 1.19, getLanguage was introduces in the same version.
	 *
	 * @since 0.1
	 *
	 * @return Language
	 */
	public function getLanguage() {
		return method_exists( get_parent_class(), 'getLanguage' ) ? parent::getLanguage() : $this->getLang();
	}
	
	/**
	 * Adds a navigation menu with the provided links.
	 * Links should be provided in an array with:
	 * label => Title (object)
	 * 
	 * @since 0.1
	 * 
	 * @param array $items
	 */
	protected function displayNavigation( array $items = array() ) {
		$links = array();
		$items = array_merge( $this->getDefaultNavigationItems(), $items );
		
		foreach ( $items as $label => $target ) {
			$links[] = Linker::linkKnown(
				$target,
				htmlspecialchars( $label )
			);
		}
		
		$this->getOutput()->addHTML(
			Html::rawElement( 'p', array(), $this->getLang()->pipeList( $links ) )
		);
	}
	
	/**
	 * Returns the default nav items for @see displayNavigation.
	 * 
	 * @since 0.1
	 * 
	 * @return array
	 */
	protected function getDefaultNavigationItems() {
		$items = array(
			wfMsg( 'ep-nav-orgs' ) => SpecialPage::getTitleFor( 'Institutions' ),
			wfMsg( 'ep-nav-courses' ) => SpecialPage::getTitleFor( 'Courses' ),
			wfMsg( 'ep-nav-terms' ) => SpecialPage::getTitleFor( 'Terms' ),
		);
		
		if ( $this->getUser()->isAllowed( 'epmentor' ) || EPStudent::has( array( 'user_id' => $this->getUser()->getId() ) ) ) {
			$items[wfMsg( 'ep-nav-mycourses' )] = SpecialPage::getTitleFor( 'MyCourses' );
		}
		
		return $items;
	}
	
	/**
	 * Display the summary data.
	 * 
	 * @since 0.1
	 * 
	 * @param EPDBObject $item
	 * @param boolean $collapsed
	 */
	protected function displaySummary( EPDBObject $item, $collapsed = true ) {
		$out = $this->getOutput();
		
		$class = 'wikitable ep-summary mw-collapsible';
		
		if ( $collapsed ) {
			$class.= ' mw-collapsed';
		}
		
		$out->addHTML( Html::openElement( 'table', array( 'class' => $class ) ) );
		
		$out->addHTML( '<tr>' . Html::element( 'th', array( 'colspan' => 2 ), wfMsg( 'ep-item-summary' ) ) . '</tr>' );
		
		foreach ( $this->getSummaryData( $item ) as $stat => $value ) {
			$out->addHTML( '<tr>' );

			$out->addHTML( Html::element(
				'th',
				array( 'class' => 'ep-summary-name' ),
				wfMsg( strtolower( get_called_class() ) . '-summary-' . $stat )
			) );

			$out->addHTML( Html::element(
				'td',
				array( 'class' => 'ep-summary-value' ),
				$value
			) );

			$out->addHTML( '</tr>' );
		}

		$out->addHTML( Html::closeElement( 'table' ) );
	}
	
	/**
	 * Gets the summary data.
	 *
	 * @since 0.1
	 *
	 * @param EPDBObject $item
	 *
	 * @return array
	 */
	protected function getSummaryData( EPDBObject $item ) {
		return array();
	}

}
