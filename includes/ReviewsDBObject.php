<?php

/**
 * Abstract base class for representing objects that are stored in some DB table.
 * These methods must be implemented in deriving classes:
 * * getDBTable
 * * getFieldPrefix
 * * getFieldTypes
 * * getDefaults
 *
 * @since 0.1
 *
 * @file ReviewsDBObject.php
 * @ingroup Review
 *
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
abstract class ReviewsDBObject {

	/**
	 * The fields of the object.
	 * field name (w/o prefix) => value
	 *
	 * @since 0.1
	 * @var array
	 */
	protected $fields = array( 'id' => null );

	/**
	 * The database connection to use for read operations.
	 *
	 * @since 0.2
	 * @var integer DB_ enum
	 */
	protected static $readDb = DB_SLAVE;

	/**
	 * Returns the name of the database table objects of this type are stored in.
	 * 
	 * @since 0.1
	 * 
	 * @throws MWException
	 * @return string
	 */
	public static function getDBTable() {
		throw new MWException( 'Class did not implement getDBTable' );
	}

	/**
	 * Gets the db field prefix. 
	 * 
	 * @since 0.1
	 * 
	 * @throws MWException
	 * @return string
	 */
	protected static function getFieldPrefix() {
		throw new MWException( 'Class did not implement getFieldPrefix' );
	}
	
	/**
	 * Returns an array with the fields and their types this object contains.
	 * This corresponds directly to the fields in the database, without prefix.
	 *
	 * field name => type
	 *
	 * Allowed types:
	 * * id
	 * * str
	 * * int
	 * * float
	 * * bool
	 * * array
	 *
	 * @since 0.1
	 *
	 * @throws MWException
	 * @return array
	 */
	protected static function getFieldTypes() {
		throw new MWException( 'Class did not implement getFieldTypes' );
	}

	/**
	 * Returns a list of default field values.
	 * field name => field value
	 *
	 * @since 0.1
	 *
	 * @throws MWException
	 * @return array
	 */
	public static function getDefaults() {
		throw new MWException( 'Class did not implement getDefaults' );
	}
	
	/**
	 * Constructor.
	 *
	 * @since 0.1
	 *
	 * @param array|null $fields
	 * @param boolean $loadDefaults
	 */
	public function __construct( $fields = null, $loadDefaults = false ) {
		if ( !is_array( $fields ) ) {
			$fields = array();
		}

		if ( $loadDefaults ) {
			$fields = array_merge( $this->getDefaults(), $fields );
		}

		$this->setFields( $fields );
	}

	/**
	 * Load the specified fields from the database.
	 *
	 * @since 0.1
	 *
	 * @param array|null $fields
	 * @param boolean $override
	 *
	 * @return Success indicator
	 */
	public function loadFields( $fields = null, $override = true ) {
		if ( is_null( $this->getId() ) ) {
			return false;
		}

		if ( is_null( $fields ) ) {
			$fields = array_keys( $this->getFieldTypes() );
		}

		$results = $this->rawSelect(
			$this->getPrefixedFields( $fields ),
			array( $this->getPrefixedField( 'id' ) => $this->getId() ),
			array( 'LIMIT' => 1 )
		);

		foreach ( $results as $result ) {
			$this->setFields( $this->getFieldsFromDBResult( $result ), $override );
			return true;
		}

		return false;
	}

	/**
	 * Gets the value of a field.
	 *
	 * @since 0.1
	 *
	 * @param string $name
	 *
	 * @throws MWException
	 * @return mixed
	 */
	public function getField( $name ) {
		if ( $this->hasField( $name ) ) {
			return $this->fields[$name];
		} else {
			throw new MWException( 'Attempted to get not-set field ' . $name );
		}
	}

	/**
	 * Remove a field.
	 *
	 * @since 0.1
	 *
	 * @param string $name
	 */
	public function removeField( $name ) {
		unset( $this->fields[$name] );
	}

	/**
	 * Returns the objects database id.
	 *
	 * @since 0.1
	 *
	 * @return integer|null
	 */
	public function getId() {
		return $this->getField( 'id' );
	}

	/**
	 * Sets the objects database id.
	 *
	 * @since 0.1
	 *
	 * @param integere|null $id
	 */
	public function setId( $id ) {
		return $this->setField( 'id', $id );
	}

	/**
	 * Gets if a certain field is set.
	 *
	 * @since 0.1
	 *
	 * @param string $name
	 *
	 * @return boolean
	 */
	public function hasField( $name ) {
		return array_key_exists( $name, $this->fields );
	}

	/**
	 * Gets if the id field is set.
	 *
	 * @since 0.1
	 *
	 * @return boolean
	 */
	public function hasIdField() {
		return $this->hasField( 'id' )
			&& !is_null( $this->getField( 'id' ) );
	}

	/**
	 * Sets multiple fields.
	 *
	 * @since 0.1
	 *
	 * @param array $fields The fields to set
	 * @param boolean $override Override already set fields with the provided values?
	 */
	public function setFields( array $fields, $override = true ) {
		foreach ( $fields as $name => $value ) {
			if ( $override || !$this->hasField( $name ) ) {
				$this->setField( $name, $value );
			}
		}
	}

	/**
	 * Gets the fields => values to write to the table.
	 *
	 * @since 0.1
	 *
	 * @return array
	 */
	protected function getWriteValues() {
		$values = array();

		foreach ( $this->getFieldTypes() as $name => $type ) {
			if ( array_key_exists( $name, $this->fields ) ) {
				$value = $this->fields[$name];

				switch ( $type ) {
					case 'array':
						$value = serialize( (array)$value );
				}

				$values[$this->getFieldPrefix() . $name] = $value;
			}
		}

		return $values;
	}

	/**
	 * Serializes the object to an associative array which
	 * can then easily be converted into JSON or similar.
	 *
	 * @since 0.1
	 *
	 * @param null|array $fields
	 * @param boolean $incNullId
	 *
	 * @return array
	 */
	public function toArray( $fields = null, $incNullId = false ) {
		$data = array();
		$setFields = array();

		if ( !is_array( $fields ) ) {
			$setFields = $this->getSetFieldNames();
		} else {
			foreach ( $fields as $field ) {
				if ( $this->hasField( $field ) ) {
					$setFields[] = $field;
				}
			}
		}

		foreach ( $setFields as $field ) {
			if ( $incNullId || $field != 'id' || $this->hasIdField() ) {
				$data[$field] = $this->getField( $field );
			}
		}

		return $data;
	}

	/**
	 * Load the default values, via getDefaults.
	 *
	 *  @since 0.1
	 *
	 * @param boolean $override
	 */
	public function loadDefaults( $override = true ) {
		$this->setFields( $this->getDefaults(), $override );
	}

	/**
	 * Writes the answer to the database, either updating it
	 * when it already exists, or inserting it when it doesn't.
	 *
	 * @since 0.1
	 *
	 * @return boolean Success indicator
	 */
	public function writeToDB() {
		if ( $this->hasIdField() ) {
			return $this->updateInDB();
		} else {
			return $this->insertIntoDB();
		}
	}

	/**
	 * Updates the object in the database.
	 *
	 * @since 0.1
	 *
	 * @return boolean Success indicator
	 */
	protected function updateInDB() {
		$dbw = wfGetDB( DB_MASTER );

		return $dbw->update(
			$this->getDBTable(),
			$this->getWriteValues(),
			array( $this->getFieldPrefix() . 'id' => $this->getId() ),
			__METHOD__
		);
	}

	/**
	 * Inserts the object into the database.
	 *
	 * @since 0.1
	 *
	 * @return boolean Success indicator
	 */
	protected function insertIntoDB() {
		$dbw = wfGetDB( DB_MASTER );

		$result = $dbw->insert(
			$this->getDBTable(),
			$this->getWriteValues(),
			__METHOD__,
			array( 'IGNORE' )
		);

		$this->setField( 'id', $dbw->insertId() );

		return $result;
	}

	/**
	 * Removes the object from the database.
	 *
	 * @since 0.1
	 *
	 * @return boolean Success indicator
	 */
	public function removeFromDB() {
		$success = $this->delete( array( 'id' => $this->getId() ) );

		if ( $success ) {
			$this->setField( 'id', null );
		}

		return $success;
	}

	/**
	 * Return the names and values of the fields.
	 *
	 * @since 0.1
	 *
	 * @return array
	 */
	public function getFields() {
		return $this->fields;
	}

	/**
	 * Return the names of the fields.
	 *
	 * @since 0.1
	 *
	 * @return array
	 */
	public function getSetFieldNames() {
		return array_keys( $this->fields );
	}

	/**
	 * Sets the value of a field.
	 * Strings can be provided for other types,
	 * so this method can be called from unserialization handlers.
	 *
	 * @since 0.1
	 *
	 * @param string $name
	 * @param mixed $value
	 * @param boolean $haxPrefix
	 *
	 * @throws MWException
	 */
	public function setField( $name, $value ) {
		$fields = $this->getFieldTypes();

		if ( array_key_exists( $name, $fields ) ) {
			switch ( $fields[$name] ) {
				case 'int':
					$value = (int)$value;
					break;
				case 'float':
					$value = (float)$value;
					break;
				case 'bool':
					if ( is_string( $value ) ) {
						$value = $value !== '0';
					} elseif ( is_int( $value ) ) {
						$value = $value !== 0;
					}
					break;
				case 'array':
					if ( is_string( $value ) ) {
						$value = unserialize( $value );
					}
					break;
				case 'id':
					if ( is_string( $value ) ) {
						$value = (int)$value;
					}
					break;
			}

			$this->fields[$name] = $value;
		} else {
			throw new MWException( 'Attempted to set unknown field ' . $name );
		}
	}

	/**
	 * Get a new instance of the class from an array.
	 *
	 * @since 0.1
	 *
	 * @param array $data
	 * @param boolean $loadDefaults
	 *
	 * @return ReviewDBObject
	 */
	public static function newFromArray( array $data, $loadDefaults = false ) {
		return new static( $data, $loadDefaults );
	}
	
	/**
	 * Get the database type used for read operations.
	 *
	 * @since 0.2
	 * @return integer DB_ enum
	 */
	public static function getReadDb() {
		return self::$readDb;
	}

	/**
	 * Set the database type to use for read operations.
	 *
	 * @param integer $db
	 *
	 * @since 0.2
	 */
	public static function setReadDb( $db ) {
		self::$readDb = $db;
	}

	/**
	 * Gets if the object can take a certain field.
	 *
	 * @since 0.1
	 *
	 * @param string $name
	 *
	 * @return boolean
	 */
	public static function canHasField( $name ) {
		return array_key_exists( $name, static::getFieldTypes() );
	}

	/**
	 * Takes in a field or array of fields and returns an
	 * array with their prefixed versions, ready for db usage.
	 *
	 * @since 0.1
	 *
	 * @param array|string $fields
	 *
	 * @return array
	 */
	public static function getPrefixedFields( $fields ) {
		$fields = (array)$fields;

		foreach ( $fields as &$field ) {
			$field = static::getFieldPrefix() . $field;
		}

		return $fields;
	}

	/**
	 * Takes in a field and returns an it's prefixed version, ready for db usage.
	 *
	 * @since 0.1
	 *
	 * @param string $field
	 *
	 * @return string
	 */
	public static function getPrefixedField( $field ) {
		return static::getFieldPrefix() . $field;
	}

	/**
	 * Takes in an associative array with field names as keys and
	 * their values as value. The field names are prefixed with the
	 * db field prefix.
	 *
	 * @since 0.1
	 *
	 * @param array $values
	 *
	 * @return array
	 */
	public static function getPrefixedValues( array $values ) {
		$prefixedValues = array();

		foreach ( $values as $field => $value ) {
			$prefixedValues[static::getFieldPrefix() . $field] = $value;
		}

		return $prefixedValues;
	}

	/**
	 * Get an array with fields from a database result,
	 * that can be fed directly to the constructor or
	 * to setFields.
	 *
	 * @since 0.1
	 *
	 * @param object $result
	 *
	 * @return array
	 */
	public static function getFieldsFromDBResult( $result ) {
		$result = (array)$result;
		return array_combine(
			static::unprefixFieldNames( array_keys( $result ) ),
			array_values( $result )
		);
	}
	
	/**
	 * Takes a field name with prefix and returns the unprefixed equivalent.
	 * 
	 * @since 0.1
	 * 
	 * @param string $fieldName
	 * 
	 * @return string
	 */
	public static function unprefixFieldName( $fieldName ) {
		return substr( $fieldName, strlen( static::getFieldPrefix() ) );
	}
	
	/**
	 * Takes an array of field names with prefix and returns the unprefixed equivalent.
	 * 
	 * @since 0.1
	 * 
	 * @param array $fieldNames
	 * 
	 * @return array
	 */
	public static function unprefixFieldNames( array $fieldNames ) {
		return array_map( 'static::unprefixFieldName', $fieldNames );
	}

	/**
	 * Get a new instance of the class from a database result.
	 *
	 * @since 0.1
	 *
	 * @param stdClass $result
	 *
	 * @return ReviewDBObject
	 */
	public static function newFromDBResult( stdClass $result ) {
		return static::newFromArray( static::getFieldsFromDBResult( $result ) );
	}

	/**
	 * Removes the object from the database.
	 *
	 * @since 0.1
	 *
	 * @param array $conditions
	 *
	 * @return boolean Success indicator
	 */
	public static function delete( array $conditions ) {
		return wfGetDB( DB_MASTER )->delete(
			static::getDBTable(),
			static::getPrefixedValues( $conditions )
		);
	}

	/**
	 * Add an amount (can be negative) to the specified field (needs to be numeric).
	 *
	 * @since 0.1
	 *
	 * @param string $field
	 * @param integer $amount
	 *
	 * @return boolean Success indicator
	 */
	public static function addToField( $field, $amount ) {
		if ( $amount == 0 ) {
			return true;
		}

		if ( !static::hasIdField() ) {
			return false;
		}

		$absoluteAmount = abs( $amount );
		$isNegative = $amount < 0;

		$dbw = wfGetDB( DB_MASTER );

		$fullField = static::getPrefixedField( $field );

		$success = $dbw->update(
			static::getDBTable(),
			array( "$fullField=$fullField" . ( $isNegative ? '-' : '+' ) . $absoluteAmount ),
			array( static::getPrefixedField( 'id' ) => static::getId() ),
			__METHOD__
		);

		if ( $success && static::hasField( $field ) ) {
			static::setField( $field, static::getField( $field ) + $amount );
		}

		return $success;
	}

	/**
	 * Selects the the specified fields of the records matching the provided
	 * conditions. Field names get prefixed.
	 *
	 * @since 0.1
	 *
	 * @param array|string|null $fields
	 * @param array $conditions
	 * @param array $options
	 *
	 * @return array of self
	 */
	public static function select( $fields = null, array $conditions = array(), array $options = array() ) {
		if ( is_null( $fields ) ) {
			$fields = array_keys( static::getFieldTypes() );
		}

		$result = static::rawSelect(
			static::getPrefixedFields( $fields ),
			static::getPrefixedValues( $conditions ),
			$options
		);

		$objects = array();

		foreach ( $result as $record ) {
			$objects[] = static::newFromDBResult( $record );
		}

		return $objects;
	}

	/**
	 * Selects the the specified fields of the first matching record.
	 * Field names get prefixed.
	 *
	 * @since 0.1
	 *
	 * @param array|string|null $fields
	 * @param array $conditions
	 * @param array $options
	 *
	 * @return self|false
	 */
	public static function selectRow( $fields = null, array $conditions = array(), array $options = array() ) {
		$options['LIMIT'] = 1;

		$objects = static::select( $fields, $conditions, $options );

		return count( $objects ) > 0 ? $objects[0] : false;
	}

	/**
	 * Returns if there is at least one record matching the provided conditions.
	 * Condition field names get prefixed.
	 *
	 * @since 0.1
	 *
	 * @param array $conditions
	 *
	 * @return boolean
	 */
	public static function has( array $conditions = array() ) {
		return static::selectRow( array( 'id' ), $conditions ) !== false;
	}

	/**
	 * Returns the amount of matching records.
	 * Condition field names get prefixed.
	 *
	 * @since 0.1
	 *
	 * @param array $conditions
	 * @param array $options
	 *
	 * @return integer
	 */
	public static function count( array $conditions = array(), array $options = array() ) {
		$res = static::rawSelect(
			array( 'COUNT(*) AS rowcount' ),
			static::getPrefixedValues( $conditions ),
			$options
		)->fetchObject();

		return $res->rowcount;
	}

	/**
	 * Selects the the specified fields of the records matching the provided
	 * conditions. Field names do NOT get prefixed.
	 *
	 * @since 0.1
	 *
	 * @param array|null $fields
	 * @param array $conditions
	 * @param array $options
	 *
	 * @return ResultWrapper
	 */
	public static function rawSelect( $fields = null, array $conditions = array(), array $options = array() ) {
		$dbr = wfGetDB( static::getReadDb() );

		return $dbr->select(
			static::getDBTable(),
			$fields,
			count( $conditions ) == 0 ? '' : $conditions,
			__METHOD__,
			$options
		);
	}

	/**
	 * Update the records matching the provided conditions by
	 * setting the fields that are keys in the $values patam to
	 * their corresponding values.
	 *
	 * @since 0.1
	 *
	 * @param array $values
	 * @param array $conditions
	 *
	 * @return boolean Success indicator
	 */
	public static function update( array $values, array $conditions = array() ) {
		$dbw = wfGetDB( DB_MASTER );

		return $dbw->update(
			static::getDBTable(),
			static::getPrefixedValues( $values ),
			static::getPrefixedValues( $conditions ),
			__METHOD__
		);
	}

	/**
	 * Return the names of the fields.
	 *
	 * @since 0.1
	 *
	 * @return array
	 */
	public static function getFieldNames() {
		return array_keys( static::getFieldTypes() );
	}

	/**
	 * Returns an array with the fields and their descriptions.
	 *
	 * field name => field description
	 *
	 * @since 0.1
	 *
	 * @return array
	 */
	public static function getFieldDescriptions() {
		return array();
	}

	/**
	 * Get API parameters for the fields supported by this object.
	 *
	 * @since 0.1
	 *
	 * @param boolean $requireParams
	 * @param boolean $setDefaults
	 *
	 * @return array
	 */
	public static function getAPIParams( $requireParams = false, $setDefaults = false ) {
		$typeMap = array(
			'id' => 'integer',
			'int' => 'integer',
			'float' => 'NULL',
			'str' => 'string',
			'bool' => 'integer',
			'array' => 'string'
		);

		$params = array();
		$defaults = static::getDefaults();

		foreach ( static::getFieldTypes() as $field => $type ) {
			if ( $field == 'id' ) {
				continue;
			}

			$hasDefault = array_key_exists( $field, $defaults );

			$params[$field] = array(
				ApiBase::PARAM_TYPE => $typeMap[$type],
				ApiBase::PARAM_REQUIRED => $requireParams && !$hasDefault
			);

			if ( $type == 'array' ) {
				$params[$field][ApiBase::PARAM_ISMULTI] = true;
			}

			if ( $setDefaults && $hasDefault ) {
				$default = is_array( $defaults[$field] ) ? implode( '|', $defaults[$field] ) : $defaults[$field];
				$params[$field][ApiBase::PARAM_DFLT] = $default;
			}
		}

		return $params;
	}

}
