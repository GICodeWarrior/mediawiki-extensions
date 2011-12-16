<?php

/**
 * Adittion and modification interface for insitutions.
 *
 * @since 0.1
 *
 * @file SpecialEditInstitution.php
 * @ingroup EducationProgram
 *
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class SpecialEditInstitution extends SpecialEPFormPage {

	/**
	 * Constructor.
	 *
	 * @since 0.1
	 */
	public function __construct() {
		parent::__construct( 'EditInstitution', 'epadmin', false );
	}

	/**
	 * Attempt to get the contest to be edited or create the one to be added.
	 * If this works, show the form, if not, redirect to special:contests.
	 *
	 * @since 0.1
	 */
	protected function showContent() {
		if ( $this->isNew() ) {
			$conditions = array( 'name' => $this->getRequest()->getVal( 'neworg' ) );

			$contest = Contest::s()->selectRow( null, $conditions );

			if ( $contest === false ) {
				$contest = new Contest( $conditions, true );
			}
			else {
				$this->showWarning( 'contest-edit-exists-already' );
			}
		}
		else {
			$contest = Contest::s()->selectRow( null, array( 'name' => $this->subPage ) );
		}

		if ( $contest === false ) {
			$this->getOutput()->redirect( SpecialPage::getTitleFor( 'Contests' )->getLocalURL() );
		}
		else {
			if ( !$this->isNew() ) {
				$this->getOutput()->addHTML(
					SpecialContestPage::getNavigation( $contest->getField( 'name' ), $this->getUser(), $this->getLanguage(), $this->getName() )
				);
			}

			$this->contest = $contest;
			$this->showForm();
			$this->getOutput()->addModules( 'contest.special.editcontest' );
		}
	}

	/**
	 * (non-PHPdoc)
	 * @see FormSpecialPage::getFormFields()
	 * @return array
	 */
	protected function getFormFields() {

		/**
		 * @var $contest Contest
		 */
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
			'options' => Contest::getStatusMessages( true )
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

		$fields['signup_email'] = array (
			'type' => 'text',
			'label-message' => 'contest-edit-signup',
		);

		$fields['reminder_email'] = array (
			'type' => 'text',
			'label-message' => 'contest-edit-reminder',
		);

		$fields['end'] = array (
			'type' => 'text',
			'label-message' => 'contest-edit-end',
			'id' => 'contest-edit-end',
			'size' => 15
		);

		if ( $contest !== false ) {
			foreach ( $fields as $name => $data ) {
				$default = $contest->getField( $name );

				if ( $name == 'end' ) {
					$default = wfTimestamp( TS_DB, $default );
				}

				$fields[$name]['default'] = $default;
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
	 *
	 * @param array $data
	 *
	 * @return Bool|Array
	 */
	public function onSubmit( array $data ) {
		$fields = array();

		foreach ( $data as $name => $value ) {
			$matches = array();

			if ( preg_match( '/contest-(.+)/', $name, $matches ) ) {
				if ( $matches[1] == 'end' ) {
					$value = wfTimestamp( TS_MW, strtotime( $value ) );
				}

				$fields[$matches[1]] = $value;
			}
		}

		// If no ID is set, this means it's a new contest, so set the ID to null for an insert.
		// However, the user can have hot the back button after creation of a new contest,
		// re-submitting the form. In this case, get the ID of the already existing item for an update.
		if ( !array_key_exists( 'id', $fields ) || $fields['id'] === '' ) {
			$contest = Contest::s()->selectRow( 'id', array( 'name' => $fields['name'] ) );
			$fields['id'] = $contest === false ? null : $contest->getField( 'id' );
		}

		$contest = new Contest( $fields, is_null( $fields['id'] ) );

		$contest->setChallenges( $this->getSubmittedChallenges() );
		$success = $contest->writeAllToDB();

		$success = $this->removeDeletedChallenges( $data['delete-challenges'] ) && $success;

		if ( $success ) {
			return true;
		}
		else {
			return array(); // TODO
		}
	}

	/**
	 * The UI keeps track of 'removed' challenges by storing them into a
	 * hidden HTML input, pipe-separated. On submission, this method
	 * takes this string and actually deletes them.
	 *
	 * @since 0.1
	 *
	 * @param string $idString
	 *
	 * @return boolean Success indicator
	 */
	protected function removeDeletedChallenges( $idString ) {
		if ( $idString == '' ) {
			return true;
		}
		
		if ( !ContestSettings::get( 'contestDeletionEnabled' ) ) {
			// Shouldn't get here (UI should prevent it)
			throw new MWException( 'Contest deletion is disabled', 'contestdeletiondisabled' );
		}
		
		return ContestChallenge::s()->delete( array( 'id' => explode( '|', $idString ) ) );
	}

	/**
	 * Finds the submitted challanges and returns them as a list of
	 * ContestChallenge objects.
	 *
	 * @since 0.1
	 *
	 * @return array of ContestChallenge
	 */
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

	/**
	 * Gets called after the form is saved.
	 * Enter description here ...
	 */
	public function onSuccess() {
		$this->getOutput()->redirect( SpecialPage::getTitleFor( 'Institutions' )->getLocalURL() );
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
			. '<hr style="display: block; clear: both; visibility: hidden;" />'
		);
	}

}
