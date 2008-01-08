<?php

class SpoofUser {
	public function __construct( $name ) {
		$this->mName = strval( $name );
		list( $ok, $normalized ) = AntiSpoof::checkUnicodeString( $this->mName );
		$this->mLegal = ( $ok == 'OK' );
		if( $this->mLegal ) {
			$this->mNormalized = $normalized;
			$this->mError = null;
		} else {
			$this->mNormalized = null;
			$this->mError = $normalized;
		}
	}

	/**
	 * Does the username pass Unicode legality and script-mixing checks?
	 * @return bool
	 */
	public function isLegal() {
		return $this->mLegal;
	}

	/**
	 * Describe the error.
	 */
	public function getError() {
		return $this->mError;
	}

	/**
	 * Get the normalized key form
	 */
	public function getNormalized() {
		return $this->mNormalized;
	}

	/**
	 * Does the username pass Unicode legality and script-mixing checks?
	 *
	 * @return mixed false if no conflict, or string with conflicting username
	 */
	public function getConflict() {
		if( $this->isLegal() ) {
			$dbr = wfGetDB( DB_SLAVE );

			// Join against the user table to ensure that we skip stray
			// entries left after an account is renamed or otherwise munged.
			$row = $dbr->selectRow(
				array( 'spoofuser', 'user' ),
				array( 'user_name' ),
				array(
					'su_normalized' => $this->mNormalized,
					'su_name=user_name',
				),
				__METHOD__ );

			if( $row ) {
				return $row->user_name;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

	/**
	 * Record the username's normalized form into the database
	 * for later comparison of future names...
	 */
	public function record() {
		return self::batchRecord( array( $this ) );
	}

	private function insertFields() {
		return array(
			'su_name'       => $this->mName,
			'su_normalized' => $this->mNormalized,
			'su_legal'      => $this->mLegal ? 1 : 0,
			'su_error'      => $this->mError,
		);
	}

	/**
	 * Insert a batch of spoof normalization records into the database.
	 * @param $items array of SpoofUser
	 */
	public function batchRecord( $items ) {
		if( count( $items ) ) {
			$fields = array();
			foreach( $items as $item ) {
				$fields[] = $item->insertFields();
			}
			$dbw = wfGetDB( DB_MASTER );
			return $dbw->replace(
				'spoofuser',
				array( 'su_name' ),
				$fields,
				__METHOD__ );
		} else {
			return false;
		}
	}
}
