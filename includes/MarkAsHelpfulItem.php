<?php
/**
 * An entity that handles 'Mark As Helpful' items
 */
class MarkAsHelpfulItem {

	// database field definition
	protected $property = array(
		'mah_id' => null,
		'mah_type' => null,
		'mah_item' => null,
		'mah_user_id' => null,
		'mah_user_ip' => null,
		'mah_user_editcount' => null,
		'mah_namespace' => null,
		'mah_title' => null,
		'mah_active' => null,
		'mah_timestamp' => null,
		'mah_system_type' => null,
		'mah_user_agent' => null,
		'mah_locale' => null
	);

	protected $user;
	protected $loadFromDatabase = false;

	/**
	 * Constructor
	 */
	public function __construct( $mah_id = null ) {
		if ( $mah_id == intval( $mah_id ) ) {
			$this->property['mah_id'] = $mah_id;
		}
	}

	public function getProperty( $key ) {
		if( isset( $key, $this->property) ) {
			return $this->property[$key];
		}
	}

	public function setProperty( $key, $value ) {
		if( isset( $key, $this->property) ) {
			$this->property[$key] = $value;
		}
	}

	public function getUser() {
		if ( !$this->user ) {
			if ( $this->loadFromDatabase ) {
				if ( $this->getProperty( 'mah_user_id' ) ) {
					$this->user = User::newFromId( $this->getProperty( 'mah_user_id' ) );
				} elseif ( $this->getProperty( 'mah_user_ip' ) ) {
					$this->user = User::newFromName( $this->getProperty( 'mah_user_ip' ) );
				}
			} else {
				global $wgUser;

				$this->user = $wgUser;
			}
		}

		return $this->user;
	}

	public function loadFromRequest( $params ) {
		global $wgUser, $wgMarkAsHelpfulType;

		if ( isset( $params['type'] ) && in_array( $params['type'], $wgMarkAsHelpfulType ) ) {
			$this->setProperty( 'mah_type', $params['type'] );
		} else {
			throw new MWMarkAsHelpFulItemPropertyException( 'Unsupported type!' );
		}

		if ( isset( $params['item'] ) && $params['item'] == intval( $params['item'] ) ) {
			$this->setProperty( 'mah_item', $params['item'] );
		} else {
			throw new MWMarkAsHelpFulItemPropertyException( 'Invalid item!' );
		}

		if ( $wgUser->isAnon() ) {
			$this->setProperty( 'mah_user_ip', $wgUser->getName() );
			$this->setProperty( 'mah_user_editcount', 0 );
		} else {
			$this->setProperty( 'mah_user_id', $wgUser->getId() );
			$this->setProperty( 'mah_user_editcount', $wgUser->getEditCount() );
		}

		if ( isset( $params['page'] ) ) {
			$page = Title::newFromText( $params['page'] );

			if ( $page ) {
				$this->setProperty( 'mah_namespace', $page->getNamespace() );
				$this->setProperty( 'mah_title', $page->getDBkey() );
			} else {
				throw new MWMarkAsHelpFulItemPropertyException( 'Invalid page!' );
			}
		}

		$this->setProperty( 'mah_active', '1' );
		$this->setProperty( 'mah_timestamp', wfTimestampNow() );

		if ( isset( $params['system'] ) ) {
			$this->setProperty( 'mah_system_type', $params['system'] );
		}
		if ( isset( $params['useragent'] ) ) {
			$this->setProperty( 'mah_user_agent', $params['useragent'] );
		}
		if ( isset( $params['locale'] ) ) {
			$this->setProperty( 'mah_locale', $params['locale'] );
		}
	}

	/**
	 * Load from database
	 * @param $conds Array: keys to load unique item from database
	 */
	public function loadFromDatabase( $conds = array() ) {
		$dbr = wfGetDB( DB_SLAVE );

		$res = $dbr->selectRow(
			array( 'mark_as_helpful' ),
			array( '*' ),
			$conds,
			__METHOD__
		);

		if( $res !== false ) {
			foreach( $this->property as $key => $val ) {
				$this->setProperty( $key, $res->$key );
			}

			// @todo FIXME: $Item is not defined (and it should be called $item
			// as per our coding conventions)
			$Item->setLoadFromDatabase = true;

			return true;
		} else {
			return false;
		}
	}

	/**
	 * This function should be called after either prepareDataBeforeMark() or setProperty()
	 * data must be validated if called from setProperty()
	 */
	public function mark() {
		if ( $this->userHasMarked() ) {
			return;
		}

		$dbw = wfGetDB( DB_MASTER );

		$row = array();

		foreach ( $this->property as $key => $value ) {
			if ( !is_null ( $value ) ) {
				$row[$key] = $value;
			}
		}

		$this->property['mah_id'] = $dbw->nextSequenceValue( 'mark_as_helpful_mah_id' );
		$dbw->insert( 'mark_as_helpful', $row, __METHOD__ );
		$this->setProperty( 'mah_id', $dbw->insertId() );
	}

	public function unmark( $currentUser ) {
		if ( $this->getProperty( 'mah_id' ) ) {
			if ( !$this->getProperty( 'mah_type' ) ) {
				if( !$this->loadFromDatabase() ) {
					return;
				}
			}

			// for sure this is an invalid item
			if( !$this->getProperty( 'mah_item' ) ) {
				return;
			}

			$user = $this->getUser();

			if ( $user ) {
				if (
					$currentUser->getId() == $user->getId() ||
					$currentUser->getName() == $user->getName()
				)
				{
					$dbw = wfGetDB( DB_MASTER );

					$dbw->delete(
						'mark_as_helpful',
						array( 'mah_id' => $this->getProperty( 'mah_id' ) ),
						__METHOD__
					);
				}
			}
		}

	}

	public function userHasMarked() {
		$dbr = wfGetDB( DB_SLAVE );

		$conds = array(
			'mah_type' => $this->getProperty( 'mah_type' ),
			'mah_item' => intval( $this->getProperty( 'mah_item' ) )
		);

		$user = $this->getUser();

		if ( $user ) {
			if ( $user->isAnon() ) {
				$conds['mah_user_ip'] = $user->getName();
			} else {
				$conds['mah_user_id'] = $user->getId();
			}
		} else {
			// Invalid User object, we can't treat this user has marked an item
			return true;
		}

		$res = $dbr->selectRow(
			array( 'mark_as_helpful' ),
			array( 'mah_id' ),
			$conds,
			__METHOD__
		);

		// user has not marked this item
		if ( $res === false ) {
			return false;
		} else {
			return true;
		}
	}

	public static function getMarkAsHelpfulList( $type, $item ) {
		$dbr = wfGetDB( DB_SLAVE );

		$conds = array(
			'mah_type' => $type,
			'mah_item' => intval( $item )
		);

		$res = $dbr->select(
			array( 'mark_as_helpful', 'user' ),
			array( 'mah_id', 'user_id', 'user_name', 'mah_user_ip' ),
			$conds,
			__METHOD__,
			array(),
			array( 'user' => array( 'LEFT JOIN', 'mah_user_id=user_id' ) )
		);

		$list = array();

		foreach( $res as $val ) {
			$list[$val['user_id']] = array(
				'user_name' => $val['user_name'],
				'user_id' => $val['user_id'],
				'user_ip' => $val['mah_user_ip']
			);
		}

		return $list;
	}
}

class MWMarkAsHelpFulItemPropertyException extends MWException {}