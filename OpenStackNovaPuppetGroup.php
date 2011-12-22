<?php

/**
 * Class for interacting with puppet groups, variables and classes
 */
class OpenStackNovaPuppetGroup {

	private $id, $name, $position, $vars, $classes;

	/**
	 * Constructor. Can't be called directly. Call one of the static NewFrom* methods
	 * @param $id Int Database id for the group
	 * @param $name String User-defined name of the group
	 */
	public function __construct( $id, $name, $position ) {
		$this->id = $id;
		$this->name = $name;
		$this->position = $position;
		$this->loadVars( $id );
		$this->loadClasses( $id );
	}

	public function getName() {
		return $this->name;
	}

	public function getId() {
		return $this->id;
	}

	public function getPosition() {
		return $this->position;
	}

	public function getVars() {
		return $this->vars;
	}

	public function getClasses() {
		return $this->classes;
	}

	/**
	 * @param $name string
	 * @return OpenStackNovaPuppetGroup|null
	 */
	public static function newFromName( $name ) {
		$dbr = wfGetDB( DB_SLAVE );
		$row = $dbr->selectRow(
			'openstack_puppet_groups',
			array( 
				'group_id',
				'group_name',
				'group_position' ),
			array( 'group_name' => $name ),
			__METHOD__ );

		if ( $row ) {
			return self::newFromRow( $row );
		} else {
			return null;
		}
	}

	/**
	 * @param $id int
	 * @return OpenStackNovaPuppetGroup|null
	 */
	public static function newFromId( $id ) {
		$dbr = wfGetDB( DB_SLAVE );
		$row = $dbr->selectRow(
			'openstack_puppet_groups',
			array( 
				'group_id',
				'group_name',
				'group_position' ),
			array( 'group_id' => intval( $id ) ),
			__METHOD__ );

		if ( $row ) {
			return self::newFromRow( $row );
		} else {
			return null;
		}
	}

	/**
	 * @param $row
	 * @return OpenStackNovaPuppetGroup
	 */
	static function newFromRow( $row ) {
		return new OpenStackNovaPuppetGroup(
			intval( $row->group_id ),
			$row->group_name,
			$row->group_position
		);
	}

	/**
	 * @return array
	 */
	public static function getGroupList() {
		$dbr = wfGetDB( DB_SLAVE );
		$rows = $dbr->select(
			'openstack_puppet_groups',
			array(
				'group_id',
				'group_name',
				'group_position'
			),
			'',
			__METHOD__,
			array( 'ORDER BY' => 'group_position ASC' )
		);
		$groups = array();
		foreach ( $rows as $row ) {
			$groups[] = self::newFromRow( $row );
		}
		return $groups;
	}

	/**
	 * @param $group_id Int Group id of puppet variables
	 */
	function loadVars( $groupid ) {
		$dbr = wfGetDB( DB_SLAVE );
		$rows = $dbr->select(
			'openstack_puppet_vars',
			array( 
				'var_id',
				'var_name',
				'var_position' ),
			array( 'var_group_id' => $groupid ),
			__METHOD__,
			array( 'ORDER BY' => 'var_position ASC' )
	       	);

		$this->vars = array();
		if ( $rows ) {
			foreach ( $rows as $row ) {
				$this->vars[] = array(
					"name" => $row->var_name,
					"id" => intval( $row->var_id ),
					"position" => intval( $row->var_position )
				);
			}
		}
	}

	/**
	 * @param $group_id Int Group id of puppet classes
	 */
	function loadClasses( $groupid ) {
		$dbr = wfGetDB( DB_SLAVE );
		$rows = $dbr->select(
			'openstack_puppet_classes',
			array( 
				'class_id',
				'class_name',
				'class_position' ),
			array( 'class_group_id' => $groupid ),
			__METHOD__,
			array( 'ORDER BY' => 'class_position ASC' )
		);

		$this->classes = array();
		if ( $rows ) {
			foreach ( $rows as $row ) {
				$this->classes[] = array(
					"name" => $row->class_name,
					"id" => intval( $row->class_id ),
					"position" => intval( $row->class_position )
				);
			}
		}
	}

	public static function addGroup( $name, $position ) {
		$dbw = wfGetDB( DB_MASTER );
		return $dbw->insert(
			'openstack_puppet_groups',
			array(  'group_name' => $name,
				'group_position' => $position
			),
			__METHOD__
		);
	}

	public static function addVar( $name, $position, $groupid ) {
		$dbw = wfGetDB( DB_MASTER );
		return $dbw->insert(
			'openstack_puppet_vars',
			array(  'var_name' => $name,
				'var_position' => $position,
				'var_group_id' => $groupid
			),
			__METHOD__
		);
	}

	public static function addClass( $name, $position, $groupid ) {
		$dbw = wfGetDB( DB_MASTER );
		return $dbw->insert(
			'openstack_puppet_classes',
			array(  'class_name' => $name,
				'class_position' => $position,
				'class_group_id' => $groupid
			),
			__METHOD__
		);
	}

	public static function deleteVar( $id ) {
		$dbw = wfGetDB( DB_MASTER );
		return $dbw->delete(
			'openstack_puppet_vars',
			array( 'var_id' => $id ),
			__METHOD__
		);
	}

	public static function deleteClass( $id ) {
		$dbw = wfGetDB( DB_MASTER );
		return $dbw->delete(
			'openstack_puppet_classes',
			array( 'class_id' => $id ),
			__METHOD__
		);
	}

	public static function deleteGroup( $id ) {
		$dbw = wfGetDB( DB_MASTER );
		// TODO: stuff this into a transaction
		$dbw->delete(
			'openstack_puppet_vars',
			array( 'var_group_id' => $id ),
			__METHOD__
		);
		$dbw->delete(
			'openstack_puppet_classes',
			array( 'class_group_id' => $id ),
			__METHOD__
		);
		return $dbw->delete(
			'openstack_puppet_groups',
			array( 'group_id' => $id ),
			__METHOD__
		);
	}

	public static function updateVar( $id, $groupid, $position ) {
		$dbw = wfGetDB( DB_MASTER );
		return $dbw->update(
			'openstack_puppet_vars',
			array(
				'var_position' => $position,
				'var_group_id' => $groupid
			),
			array( 'var_id' => $id ),
			__METHOD__
		);
	}

	public static function updateClass( $id, $groupid, $position ) {
		$dbw = wfGetDB( DB_MASTER );
		return $dbw->update(
			'openstack_puppet_classes',
			array(
				'class_position' => $position,
				'class_group_id' => $groupid
			),
			array( 'class_id' => $id ),
			__METHOD__
		);
	}

	public static function updateGroupPosition( $id, $position ) {
		$dbw = wfGetDB( DB_MASTER );
		return $dbw->update(
			'openstack_puppet_groups',
			array(
				'group_position' => $position,
			),
			array(
				'group_id' => $id,
			),
			__METHOD__
		);
	}

}
