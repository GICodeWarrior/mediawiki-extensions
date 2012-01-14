<?php

/**
 * Class representing a single mentor.
 *
 * @since 0.1
 *
 * @file EPMentor.php
 * @ingroup EducationProgram
 *
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class EPMentor extends EPDBObject {

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
			'user_id' => 'id',
		);
	}

    /**
   	 * Display a pager with mentors.
   	 *
   	 * @since 0.1
   	 *
   	 * @param IContextSource $context
   	 * @param array $conditions
   	 */
   	public static function displayPager( IContextSource $context, array $conditions = array() ) {
   		$pager = new EPMentorPager( $context, $conditions );

   		if ( $pager->getNumRows() ) {
   			$context->getOutput()->addHTML(
   				$pager->getFilterControl() .
   				$pager->getNavigationBar() .
   				$pager->getBody() .
   				$pager->getNavigationBar() .
   				$pager->getMultipleItemControl()
   			);
   		}
   		else {
   			$context->getOutput()->addHTML( $pager->getFilterControl( true ) );
   			$context->getOutput()->addWikiMsg( 'ep-mentors-noresults' );
   		}
   	}

}
