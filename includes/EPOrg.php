<?php

/**
 * Class representing a single organization/institution.
 *
 * @since 0.1
 *
 * @file EPOrg.php
 * @ingroup EducationProgram
 *
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class EPOrg extends EPDBObject {

	/**
	 * @see parent::getFieldTypes
	 *
	 * @since 0.1
	 *
	 * @return string
	 */
	public static function getDBTable() {
		return 'ep_orgs';
	}

	/**
	 * @see parent::getFieldTypes
	 *
	 * @since 0.1
	 *
	 * @return string
	 */
	protected static function getFieldPrefix() {
		return 'org_';
	}

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
			
			'name' => 'str',
			'city' => 'str',
			'country' => 'str',
		);
	}
	
	public static function getDefaults() {
		return array(
			'name' => '',
			'city' => '',
			'country' => '',
		);
	}
	
	public static function getOrgOptions( array /* EPOrg */ $orgs ) {
		$options = array();
		
		foreach ( $orgs as /* EPOrg */ $org ) {
			$options[$org->getField( 'name' )] = $org->getId(); 
		}
		
		return $options;
	}
	
	/**
	 * Returns the list of orgs that the specified user can edit.
	 * 
	 * @since 0.1
	 * 
	 * @param User|int $user
	 * @param array|null $fields
	 * 
	 * @return array of EPOrg
	 */
	public static function getEditableOrgs( $user, array $fields = null ) {
		if ( is_int( $user ) ) {
			$userId = $user;
			$user = User::newFromId( $user );
		}
		else {
			$userId = $user->getId();
		}
		
		if ( $user->isAllowed( 'epadmin' ) ) {
			return self::select( $fields );
		}
		elseif ( $user->isAllowed( 'epmentor' ) ) {
			$mentor = EPMentor::selectRow( 'id', array( 'user_id' => $userId ) );
			return $mentor === false ? array() : $mentor->getOrgs( $fields );
		}
		else {
			return array();
		}
	}

}
