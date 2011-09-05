<?php

/**
 * Abstract base class for representing objects that are stored in some DB table.
 * 
 * @since 0.1
 * 
 * @file SurveyDBClass.php
 * @ingroup Survey
 * 
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
abstract class SurveyDBClass {
	
	/**
	 * The fields of the object.
	 * field name (w/o prefix) => value
	 * 
	 * @since 0.1
	 * @var array
	 */
	protected $fields;
	
	/**
	 * Constructor.
	 * 
	 * @since 0.1
	 * 
	 * @param array|null $fields
	 */
	public function __construct( $fields ) {
		if ( !is_null( $fields ) ) {
			$this->setFields( $fields );
		}
	}
	
	/**
	 * Returns an array with the fields and their types this object contains.
	 * This corresponds directly to the fields in the database, without prefix.
	 * 
	 * field name => type
	 * 
	 * Allowed types:
	 * * str
	 * * int
	 * * bool
	 * 
	 * @since 0.1
	 * 
	 * @return array
	 */
	protected static function getFieldTypes() {
		return array();
	}
	
	/**
	 * Returns the name of the database table objects of this type are stored in.
	 * 
	 * @since 0.1
	 * 
	 * @throws MWException
	 * @return string
	 */
	protected static function getDBTable() {
		throw new MWException( 'Class did not implement getDBTable' );
	}

	/**
	 * Gets the db field prefix. 
	 * 
	 * @since 0.1
	 * 
	 * @throws MWException
	 * @return array
	 */
	protected static function getFieldPrefix() {
		throw new MWException( 'Class did not implement getFieldPrefix' );
	}
	
	/**
	 * Returns the name of the id db field, without prefix.
	 * 
	 * @since 0.1
	 * 
	 * @return string
	 */
	protected static function getIDField() {
		return 'id';
	}
	
	/**
	 * Get a new instance of the class from a database result. 
	 * 
	 * @since 0.1
	 * 
	 * @param object $result
	 * 
	 * @return SurveyDBClass
	 */
	public static function newFromDBResult( $result ) {
		$result = (array)$result;
		$data = array();
		$idFieldLength = strlen( static::getFieldPrefix() );
		
		foreach ( $result as $name => $value ) {
			$data[substr( $name, $idFieldLength )] = $value;
		}
		
		return static::newFromArray( $data );
	}
	
	/**
	 * Get a new instance of the class from an array. 
	 * 
	 * @since 0.1
	 * 
	 * @param array $data
	 * 
	 * @return SurveyDBClass
	 */	
	public static function newFromArray( array $data ) {
		return new static( $data );
	}
	
	/**
	 * Selects the the specified fields of the records matching the provided
	 * conditions.
	 * 
	 * @since 0.1
	 * 
	 * @param array|null $fields
	 * @param array $conditions
	 * @param array $options
	 * 
	 * @return array of self
	 */
	public static function select( $fields = null, array $conditions = array(), array $options = array() ) {
		$result = static::rawSelect( $fields, $conditions, $options );
		
		$objects = array();
		
		foreach ( $result as $record ) {
			$objects[] = static::newFromDBResult( $record );
		}
		
		return $objects;
	}
	
	/**
	 * Selects the the specified fields of the first matching record.
	 * 
	 * @since 0.1
	 * 
	 * @param array|null $fields
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
	 * Selects the the specified fields of the records matching the provided
	 * conditions.
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
		if ( is_null( $fields ) ) {
			$fields = array_keys( static::getFieldTypes() );
		}
		
		$dbr = wfgetDB( DB_SLAVE );
		
		return $dbr->select(
			static::getDBTable(),
			static::getPrefixedFields( $fields ),
			count( $conditions ) == 0 ? '' : static::getPrefixedValues( $conditions ),
			'',
			$options
		);
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
		if ( $this->hadIdField() ) {
			return $this->insertIntoDB();
		}
		else {
			return $this->updateInDB();
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
			array( static::getFieldPrefix() . static::getIDField() => $this->getId() )
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
			static::getDBTable(),
			static::getWriteValues()
		);
		
		$this->setField( static::getIDField(), $dbw->insertId() );
		
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
		$dbw = wfGetDB( DB_MASTER );
		
		$sucecss = $dbw->delete(
			static::getDBTable(),
			array( static::getFieldPrefix() . static::getIDField() => $this->getId() )
		);
		
		if ( $sucecss ) {
			$this->removeField( static::getIDField() );
		}
		
		return $sucecss;
	}
	
	/**
	 * Return the names of the fields.
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
	public static function getFieldNames() {
		return array_keys( static::getFieldTypes() );
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
	 * 
	 * @throws MWException
	 */
	public function setField( $name, $value ) {
		$fields = static::getFieldTypes();
		
		if ( array_key_exists( $name, $fields ) ) {
			switch ( $fields[$name] ) {
				case 'int':
					$value = (int)$value;
				case 'bool':
					if ( is_string( $value ) ) {
						$value = $value != '0';
					}
				case 'array':
					if ( is_string( $value ) ) {
						$value = unserialize( $value );
					}
			}
			
			$this->fields[$name] = $value;
		}
		else {
			throw new MWException( 'Attempted to set unknonw field ' . $name );
		}
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
		if ( array_key_exists( $name, static::getFieldTypes() ) ) {
			return $this->fields[$name];
		}
		else {
			throw new MWException( 'Attempted to get unknonw field ' . $name );
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
		return $this->getField( static::getIDField() );
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
	 * Gets if the id field is set.
	 * 
	 * @since 0.1
	 * 
	 * @return boolean
	 */
	public function hasIdField() {
		return $this->hasField( static::getIDField() ) 
			&& !is_null( $this->getField( static::getIDField() ) );
	}
	
	/**
	 * Sets multiple fields.
	 * 
	 * @since 0.1
	 * 
	 * @param array $fields
	 */
	public function setFields( array $fields ) {
		foreach ( $fields as $name => $value ) {
			$this->setField( $name, $value );
		}
	}
	
	/**
	 * Gets the fields => values to write to the surveys table. 
	 * 
	 * @since 0.1
	 * 
	 * @return array
	 */
	protected function getWriteValues() {
		$values = array();
		
		foreach ( static::getFieldTypes() as $name => $type ) {
			$value = $this->fields[$name];
			
			switch ( $type ) {
				case 'array':
					$value = serialize( (array)$value );
			}
			
			$values[static::getFieldPrefix() . $name] = $value;
		}
		
		return $values;
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
	 * Serializes the survey to an associative array which
	 * can then easily be converted into JSON or similar.
	 * 
	 * @since 0.1
	 * 
	 * @param null|array $props
	 * 
	 * @return array
	 */
	public function toArray( $fields = null ) {
		$data = array();
		$setFields = array();
		
		if ( !is_array( $fields ) ) {
			$setFields = $this->getSetFieldNames();
		}
		else {
			foreach ( $fields as $field ) {
				if ( $this->hasField( $field ) ) {
					$setFields[] = $field;
				}
			}
		}
		
		foreach ( $setFields as $field ) {
			$data[$field] = $this->getField( $field );
		}
		
		return $data;
	}
	
	/**
	 * Creates and returns a new instance from an array.
	 * 
	 * @since 0.1
	 * 
	 * @param array $data
	 * 
	 * @return SurveyDBClass
	 */
	public static function fromArray( array $data ) {
		$validData = array();
		
		foreach ( $data as $name => $value ) {
			if ( static::canHasField( $name ) ) {
				$validData[$name] = $value;
			}
		}
		
		return new static( $validData );
	}
	
}
