<?php

/**
 * Class representing a single instructor.
 *
 * @since 0.1
 *
 * @file EPInstructor.php
 * @ingroup EducationProgram
 *
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class EPInstructor {

	/**
	 * Field for caching the linked user.
	 *
	 * @since 0.1
	 * @var User|false
	 */
	protected $user = false;

	/**
	 * Holds the user id if only an id was provided.
	 * 
	 * @since 0.1
	 * @var integer
	 */
	protected $userId;
	
	/**
	 * Create a new instructor object from a user id.
	 * 
	 * @since 0.1
	 * 
	 * @param integer $userId
	 * 
	 * @return EPInstructor
	 */
	public static function newFromId( $userId ) {
		return new self( $userId );
	}
	
	/**
	 * Create a new instructor object from a User object.
	 * 
	 * @since 0.1
	 * 
	 * @param User $user
	 * 
	 * @return EPInstructor
	 */
	public static function newFromUser( User $user ) {
		return new self( $user );
	}
	
	/**
	 * Constructor.
	 * 
	 * @since 0.1
	 * 
	 * @param User|integer $user
	 */
	public function __construct( $user ) {
		if ( is_integer( $user ) ) {
			$this->userId = $user;
		}
		elseif ( $user instanceof User ) {
			$this->user = $user;
		}
		else {
			throw new MWException( 'Instructors can only be constructed from an user id or an User object.' );
		}
	}
	
	/**
	 * Returns the user that this instructor is.
	 * 
	 * @since 0.1
	 * 
	 * @return User
	 */
	public function getUser() {
		if ( $this->user === false ) {
			$this->user = User::newFromId( $this->userId );
		}
		
		return $this->user;
	}
	
	/**
	 * Returns the name of the instroctor, using their real name when available.
	 * 
	 * @since 0.1
	 * 
	 * @return string
	 */
	public function getName() {
		return $this->getUser()->getRealName() === '' ? $this->getUser()->getName() : $this->getUser()->getRealName();
	}
	
	/**
	 * Retruns the user link for this instructor, using their real name when available.
	 * 
	 * @since 0.1
	 * 
	 * @return string
	 */
	public function getUserLink() {
		return Linker::userLink(
			$this->getUser()->getId(),
			$this->getUser()->getName(),
			$this->getName()
		);
	}
	
	/**
	 * Returns the tool links for this mentor.
	 * 
	 * @since 0.1
	 * 
	 * @param IContextSource $context
	 * @param EPCourse|null $course
	 * 
	 * @return string
	 */
	public function getToolLinks( IContextSource $context, EPCourse $course = null ) {
		$links = array();
		
		$links[] = Linker::userTalkLink( $this->getUser()->getId(), $this->getUser()->getName() );
		
		$links[] = Linker::link( SpecialPage::getTitleFor( 'Contributions', $this->getUser()->getName() ), wfMsgHtml( 'contribslink' ) );
		
		if ( !is_null( $course ) &&
			( $context->getUser()->isAllowed( 'ep-instructor' ) || $this->getUser()->getId() == $context->getUser()->getId() ) ) {
			$links[] = Html::element(
				'a',
				array(
					'href' => '#',
					'class' => 'ep-instructor-remove',
					'data-courseid' => $course->getId(),
					'data-coursename' => $course->getField( 'name' ),
					'data-userid' => $this->getUser()->getId(),
					'data-username' => $this->getUser()->getName(),
					'data-bestname' => $this->getName(),
				),
				wfMsg( 'ep-instructor-remove' )
			);
			
			$context->getOutput()->addModules( 'ep.instructor' );
		}
		
		return ' <span class="mw-usertoollinks">(' . $context->getLanguage()->pipeList( $links ) . ')</span>';
	}
	
}
