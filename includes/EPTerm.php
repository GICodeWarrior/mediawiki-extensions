<?php

/**
 * Class representing a single term.
 * These are "instances" of a course in a certain period.
 *
 * @since 0.1
 *
 * @file EPTerm.php
 * @ingroup EducationProgram
 *
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class EPTerm extends EPDBObject {

	/**
	 * @see parent::getFieldTypes
	 *
	 * @since 0.1
	 *
	 * @return array
	 */
	protected static function getFieldTypes() {
		return array(
			'id' => 'id',
			'course_id' => 'id',
		
			'year' => 'int',
			'start' => 'str', // TS_MW
			'end' => 'str', // TS_MW
		);
	}
	
	/**
	 * (non-PHPdoc)
	 * @see EPDBObject::getDefaults()
	 */
	public static function getDefaults() {
		return array(
			'year' => substr( wfTimestamp( TS_MW ), 0, 4 ),
			'start' => wfTimestamp( TS_MW ),
			'end' => wfTimestamp( TS_MW ),
		);
	}
	
	/**
	 * (non-PHPdoc)
	 * @see EPDBObject::removeFromDB()
	 */
	public function removeFromDB() {
		$id = $this->getId();
		
		$success = parent::removeFromDB();
		
		if ( $success ) {
			$success = wfGetDB( DB_MASTER )->delete( 'ep_students_per_term', array( 'spt_term_id' => $id ) ) && $success;
		}
		
		return $success;
	}
	
	/**
	 * Display a pager with terms.
	 * 
	 * @since 0.1
	 * 
	 * @param IContextSource $context
	 * @param array $conditions
	 */
	public static function displayPager( IContextSource $context, array $conditions = array() ) {
		$pager = new EPTermPager( $context, $conditions );
		
		if ( $pager->getNumRows() ) {
			$context->getOutput()->addHTML(
				$pager->getFilterControl() .
				$pager->getNavigationBar() .
				$pager->getBody() .
				$pager->getNavigationBar()
			);
		}
		else {
			$context->getOutput()->addHTML( $pager->getFilterControl( true ) );
			$context->getOutput()->addWikiMsg( 'ep-terms-noresults' );
		}
	}
	
	/**
	 * Adds a control to add a term org to the provided context.
	 * Adittional arguments can be provided to set the default values for the control fields.
	 * 
	 * @since 0.1
	 * 
	 * @param IContextSource $context
	 * @param array $args
	 */
	public static function displayAddNewControl( IContextSource $context, array $courses ) {
		$out = $context->getOutput();

		$out->addHTML( Html::openElement(
			'form',
			array(
				'method' => 'post',
				'action' => SpecialPage::getTitleFor( 'EditTerm' )->getLocalURL(),
			)
		) );

		$out->addHTML( '<fieldset>' );

		$out->addHTML( '<legend>' . wfMsgHtml( 'ep-terms-addnew' ) . '</legend>' );

		$out->addHTML( Html::element( 'p', array(), wfMsg( 'ep-terms-namedoc' ) ) );

		$out->addHTML( Html::element( 'label', array( 'for' => 'newcourse' ), wfMsg( 'ep-terms-newcourse' ) ) );
		
		$select = new XmlSelect( 'newcourse', 'newcourse' );
		$select->addOptions( EPCourse::getCourseOptions( $courses ) );
		$out->addHTML( $select->getHTML() );
		
		$out->addHTML( '&#160;' . Xml::inputLabel( wfMsg( 'ep-terms-newyear' ), 'newyear', 'newyear', 10 ) );

		$out->addHTML( '&#160;' . Html::input(
			'addnewterm',
			wfMsg( 'ep-terms-add' ),
			'submit'
		) );

		$out->addHTML( Html::hidden( 'newEditToken', $context->getUser()->editToken() ) );
		
		$out->addHTML( '</fieldset></form>' );
	}
	
	/**
	 * Adds a control to add a new term to the provided context
	 * or show a message if this is not possible for some reason.
	 * 
	 * @since 0.1
	 * 
	 * @param IContextSource $context
	 * @param array $args
	 */
	public static function displayAddNewRegion( IContextSource $context, array $args = array() ) {
		$courses = EPCourse::getEditableCourses( $context->getUser() );
		
		if ( count( $courses ) > 0 ) {
			EPTerm::displayAddNewControl( $context, $args );
		}
		elseif ( $context->getUser()->isAllowed( 'epadmin' ) ) {
			$context->getOutput()->addWikiMsg( 'ep-terms-nocourses' );
		}
		elseif ( $context->getUser()->isAllowed( 'epmentor' ) ) {
			$context->getOutput()->addWikiMsg( 'ep-terms-addcoursefirst' );
		}
	}

}
