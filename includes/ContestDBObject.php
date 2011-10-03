<?php

/**
 * Abstract base class for representing objects that are stored in some DB table.
 * This is a modified copy of SurveyDBClass, backported to work with PHP 5.2,
 * and therefore missing all the awesome you get with late static binding.
 * 
 * @since 0.1
 * 
 * @file ContestDBObject.php
 * @ingroup Contest
 * 
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
abstract class ContestDBObject {
	
	/**
	 * The fields of the object.
	 * field name (w/o prefix) => value
	 * 
	 * @since 0.1
	 * @var array
	 */
	protected $fields = array( 'id' => null );
	
	/**
	 * Constructor.
	 * 
	 * @since 0.1
	 * 
	 * @param array|null $fields
	 * @param boolean $loadDefaults
	 */
	public function __construct( $fields, $loadDefaults = false ) {
		if ( !is_array( $fields ) ) {
			$fields = array();
		}
		
		if ( $loadDefaults ) {
			$fields = array_merge( $this->getDefaults(), $fields );
		}
		
		$this->setFields( $fields );
	}
	
	/**
	 * Returns the name of the database table objects of this type are stored in.
	 * 
	 * @since 0.1
	 * 
	 * @return string
	 */
	public abstract function getDBTable();

	/**
	 * Gets the db field prefix. 
	 * 
	 * @since 0.1
	 * 
	 * @return string
	 */
	protected abstract function getFieldPrefix();
	
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
	 * @param null|array $props
	 * 
	 * @return array
	 */
	public function toArray( $fields = null ) {
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
			$data[$field] = $this->getField( $field );
		}
		
		return $data;
	}
	
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
			array( $this->getFieldPrefix() . 'id' => $this->getId() )
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
			$this->getWriteValues()
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
		$sucecss = $this->delete( array( 'id' => $this->getId() ) );
		
		if ( $sucecss ) {
			$this->setField( 'id', null );
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
			throw new MWException( 'Attempted to set unknonw field ' . $name );
		}
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
	 * @return array
	 */
	protected abstract function getFieldTypes();

	/**
	 * Returns a list of default field values.
	 * field name => field value
	 * 
	 * @since 0.1
	 * 
	 * @return array
	 */
	public abstract function getDefaults();
	
	//
	//
	// All below methods ought to be static, but can't be since this would require LSB introduced in PHP 5.3.
	//
	//
	
	/**
	 * Gets if the object can take a certain field.
	 * 
	 * @since 0.1
	 * 
	 * @param string $name
	 * 
	 * @return boolean
	 */
	public function canHasField( $name ) {
		return array_key_exists( $name, $this->getFieldTypes() );
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
	public function getPrefixedFields( $fields ) {
		$fields = (array)$fields;
		
		foreach ( $fields as &$field ) {
			$field = $this->getFieldPrefix() . $field;
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
	public function getPrefixedField( $field ) {
		return $this->getFieldPrefix() . $field;
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
	public function getPrefixedValues( array $values ) {
		$prefixedValues = array();
		
		foreach ( $values as $field => $value ) {
			$prefixedValues[$this->getFieldPrefix() . $field] = $value;
		}
		
		return $prefixedValues;
	}

	/**
	 * Get a new instance of the class from a database result. 
	 * 
	 * @since 0.1
	 * 
	 * @param object $result
	 * 
	 * @return ContestDBObject
	 */
	public function newFromDBResult( $result ) {
		$result = (array)$result;
		$data = array();
		$idFieldLength = strlen( $this->getFieldPrefix() );
		
		foreach ( $result as $name => $value ) {
			$data[substr( $name, $idFieldLength )] = $value;
		}
		
		return $this->newFromArray( $data );
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
	public function delete( array $conditions ) {
		return wfGetDB( DB_MASTER )->delete(
			$this->getDBTable(),
			$this->getPrefixedValues( $conditions )
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
	public function addToField( $field, $amount ) {
		if ( $amount == 0 ) {
			return true;
		}
		
		if ( !$this->hasIdField() ) {
			return false;
		}
		
		$absoluteAmount = abs( $amount );
		$isNegative = $amount < 0;
		
		$dbw = wfGetDB( DB_MASTER );
		
		$fullField = $this->getPrefixedField( $field );
		
		$success = $dbw->update(
			$this->getDBTable(),
			array( "$fullField=$fullField" . ( $isNegative ? '-' : '+' ) . $absoluteAmount ),
			array( $this->getPrefixedField( 'id' ) => $this->getId() )
		);
		
		if ( $success && $this->hasField( $field ) ) {
			$this->setField( $field, $this->getField( $field ) + $amount );
		}
		
		return $success;
	}
	
	/**
	 * Selects the the specified fields of the records matching the provided
	 * conditions. Field names get prefixed.
	 * 
	 * @since 0.1
	 * 
	 * @param array|null $fields
	 * @param array $conditions
	 * @param array $options
	 * 
	 * @return array of self
	 */
	public function select( $fields = null, array $conditions = array(), array $options = array() ) {
		if ( is_null( $fields ) ) {
			$fields = array_keys( $this->getFieldTypes() );
		}
		
		$result = $this->rawSelect(
			$this->getPrefixedFields( $fields ),
			$this->getPrefixedValues( $conditions ),
			$options
		);
		
		$objects = array();
		
		foreach ( $result as $record ) {
			$objects[] = $this->newFromDBResult( $record );
		}
		
		return $objects;
	}
	
	/**
	 * Selects the the specified fields of the first matching record.
	 * Field names get prefixed.
	 * 
	 * @since 0.1
	 * 
	 * @param array|null $fields
	 * @param array $conditions
	 * @param array $options
	 * 
	 * @return self|false
	 */
	public function selectRow( $fields = null, array $conditions = array(), array $options = array() ) {
		$options['LIMIT'] = 1;
		
		$objects = $this->select( $fields, $conditions, $options );
		
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
	public function has( array $conditions = array() ) {
		return $this->selectRow( array( 'id' ), $conditions ) !== false;
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
	public function count( array $conditions = array(), array $options = array() ) {
		$res = $this->rawSelect(
			array( 'COUNT(*) AS rowcount' ),
			$this->getPrefixedValues( $conditions ),
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
	public function rawSelect( $fields = null, array $conditions = array(), array $options = array() ) {		
		$dbr = wfGetDB( DB_SLAVE );
		
		return $dbr->select(
			$this->getDBTable(),
			$fields,
			count( $conditions ) == 0 ? '' : $conditions,
			'',
			$options
		);
	}

	public function update( array $values, array $conditions = array() ) {
		$dbw = wfGetDB( DB_MASTER );
		
		return $dbw->update(
			$this->getDBTable(),
			$this->getPrefixedValues( $values ),
			$this->getPrefixedValues( $conditions )
		);
	}
	
	/**
	 * Return the names of the fields.
	 * 
	 * @since 0.1
	 * 
	 * @return array
	 */
	public function getFieldNames() {
		return array_keys( $this->getFieldTypes() );
	}
	
}