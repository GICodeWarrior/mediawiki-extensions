<?php
/* ToyCastle project */

/* Prevent hacking */
if ( !defined( 'TC_STARTED' ) )
{ die( 'Hacking Attempt' ); }

/* Class SqlConnect start */
Class SqlConnect
{
	var $handle;
	var $database_name;

	function Start( $sql_server, $sql_name, $sql_password, $sql_database_name, $sql_persistency = false )
	{
		if ( $this->handle ) return false;

		/* Start Connect */
		if ( $sql_persistency )
		{
			$this->handle = mysql_pconnect( $sql_server, $sql_name, $sql_password );
		}
		else
		{
			$this->handle = mysql_connect( $sql_server, $sql_name, $sql_password );
		}

		if ( $this->handle )
		{
			/* force to use UTF-8 */
			@mysql_query( 'SET NAMES \'utf8\'' );

			if ( mysql_select_db( $sql_database_name ) )
			{
				$this->database_name = $sql_database_name;
				return true;
			}
			else
			{
				return false;
			}
		}
		else
		{
			return false;
		}
	}

	function Query( $query_string )
	{
		return mysql_query( $query_string, $this->handle );
	}
	function fetchArray( $query_result )
	{
		return mysql_fetch_array( $query_result );
	}
	function fetchAssoc( $query_result )
	{
		return mysql_fetch_assoc( $query_result );
	}
	function fetchRow()
	{
		return mysql_fetch_row( $query_result );
	}
	/*
	Function      : EscapeString
	Description   : Escape String to Prevent SQL injection
	Arguments     : None
	Return values : true if success,false if failed
	Last modified : 2006/04/25 littleb
	*/
	function EscapeString( $unescaped_string )
	{
		/* No Connect, No Escape */
		if ( !$this->handle ) return false;

		if ( function_exists( 'get_magic_quotes_gpc' ) && get_magic_quotes_gpc() ) $unescaped_string = stripslashes( $unescaped_string );

		/* Try Escape String by MySQL */
		$escape_result =  @mysql_real_escape_string( $unescaped_string, $this->handle );
		/* Try Escape String by php */
		if ( !$escape_result ) { $escape_result =  @mysql_escape_string( $unescaped_string ); }
		/* Finally, Try addslashes */
		if ( !$escape_result ) { $escape_result =  @addslashes( $unescaped_string ); }


		return $escape_result;
	}
	/*SHOW TABLES FROM db_name LIKE 'pattern'*/
	/* function isTableExist($table_name)*/
	// {
		/* No Connect, No Action */
		// if(!$this->handle) return false;

		/*MySQL Query  */
	        // $this->query('SHOW TABLE FROM `'. $this->database_name .'` LIKE\''. preg_replace('\_','\\\_',$this->EscapeString($table_name) .'\'');
	// }


	function insertData( $table, $data_array )
	{

		/* No Connect, No Action */
		if ( !$this->handle ) return false;

                /* Must be an array */
		if ( !is_array( $data_array ) ) return false;

		/* No special table name */
		if ( preg_match( '/[^0-9A-Z\.\_\-]/i', $table ) ) return false;

		/* No Multi-Dimentional Array and special column name; Escape Strings */
		foreach ( $data_array as $key => $value )
		{
			if ( empty( $key ) ) return false;
			if ( preg_match( '/[^0-9A-Z\.\_\-]/i', $key ) ) return false;
			if ( is_array( $value ) ) return false;
			$data_array[$key] = $this->EscapeString( $value );
		}

		/* Prepare Query */
		$queryString = 'INSERT INTO `' . $table . '` (`' . implode( '`, `', array_keys( $data_array ) ) . '`)' .
				' VALUES (\'' . implode( '\', \'', /* Esacped in Foreach */array_values( $data_array ) ) . '\');';
		return $this->Query( $queryString );
	}
	function updateData( $table, $data_array, $where_parameters )
	{
		/* No Connect, No Action */
		if ( !$this->handle )
		{ return false; }

                /* Must be an array */
		if ( !is_array( $data_array ) )
		{ return false; }

		/* No special table name */
		if ( preg_match( '/[^0-9A-Z\.\_\-]/i', $table ) )
		{ return false; }

		$data_parameters = '';

		/* No Multi-Dimentional Array and special field name; Escape Strings */
		foreach ( $data_array as $key => $value )
		{
			if ( empty( $key ) ) return false;
			if ( preg_match( '/[^0-9A-Z\.\_\-]/i', $key ) ) return false;
			if ( is_array( $value ) ) return false;

			if ( empty( $data_parameters ) )
			{	$data_parameters = '`' . $key . '` = \'' . $this->EscapeString( $value ) . '\''; }
			else
			{	$data_parameters .= ', `' . $key . '` = \'' . $this->EscapeString( $value ) . '\''; }
		}

		/* Prepare Query */
		$queryString = 'UPDATE `' . $table . '` SET ' . /* Esacped in Foreach */ $data_parameters . ' WHERE ' . $where_parameters;

		return $this->Query( $queryString );
	}


	function removeData( $table, $where_parameters )
	{
		/* No Connect, No Action */
		if ( !$this->handle )
		{ return false; }

		/* No special table name */
		if ( preg_match( '/[^0-9A-Z\.\_\-]/i', $table ) )
		{ return false; }

		/* Prepare Query */
		$queryString = 'DELETE FROM `' . $table . '` WHERE ' . $where_parameters;

		/* FIXME: DEVELOPEMENT USE ONLY  ***/
		/**/echo $queryString; return 1; /**/
		/* END FIXME **********************/

		return $this->Query( $queryString );
	}
	function selectData( $table, $field_array = array(), $where_parameters = '', $order_array = array(), $other_array = array() )
	{
		/* FIXME: add support of multi-table */
		if ( empty( $other_array ) || ! is_array( $other_array ) )
		{ $other_array = array(); }

		/* No Connect, No Action */
		if ( !$this->handle )
		{ return false; }

		/* Must be an array or empty */
		if ( !is_array( $field_array ) && !empty( $field_array ) )
		{ return false; }

		/* No special table name */
		if ( preg_match( '/[^0-9A-Z\.\_\-]/i', $table ) )
		{ return false; }

		$field_parameters = '';

		/* distinct process */
		if ( $other_array['distinct'] )
		{

			/* Only one field is ok */
			if ( count( $field_array ) != 1 )
			{ return false;  }

			/* pop the only value */
			$value = array_pop( $field_array );

			/* No Multi-Dimentional Array and special field name; Escape Strings */
			if ( empty( $value ) ) return false;
			if ( preg_match( '/[^0-9A-Z\.\_\-]/i', $value ) ) return false;
			if ( is_array( $value ) ) return false;

			if ( $other_array['count'] )
			{ $field_parameters .= 'COUNT( DISTINCT `' . $value . '` )'; }
			else
			{ $field_parameters .= 'DISTINCT `' . $value . '`'; }

		}
		else
		{
			/* count? */
			if ( $other_array['count'] )
			$field_parameters .= 'COUNT(';

			/* Select All Fields */
			if ( empty( $field_array ) )
			{ $field_parameters .= '*'; }
			else
			{
				/* No Multi-Dimentional Array and special field name; Escape Strings */
				foreach ( $field_array as $value )
				{
					if ( empty( $value ) ) return false;
					if ( preg_match( '/[^0-9A-Z\.\_\-]/i', $value ) ) return false;
					if ( is_array( $value ) ) return false;
				}
			$field_parameters .= '`' . implode( '`, `', $field_array ) . '`';
			}

			/* count? */
			if ( $other_array['count'] )
			$field_parameters .= ')';
		}

		/* Select All Fields */
		if ( empty( $order_array ) )
		{ $order_parameters = ''; }
		else
		{
			/* No Multi-Dimentional Array and special field name; Escape Strings */
			foreach ( $order_array as $value )
			{
				if ( empty( $value ) ) return false;
				if ( preg_match( '/[^0-9A-Z\.\_\-]/i', $value ) ) return false;
				if ( is_array( $value ) ) return false;
			}
		$order_parameters = ' ORDER BY `' . implode( '`, `', $order_array ) . '`';
		if ( $other_array['asc'] )
		{ $order_parameters .= ' ASC'; }
                else
                { $order_parameters .= 'DESC'; }
		}

		/* page set */
		$other_array['start'] = intval( $other_array['start'] );
		$other_array['total'] = intval( $other_array['total'] );

		if ( $other_array['start'] >= 0 && $other_array['total'] > 0 )
		{
		$order_parameters .= ' LIMIT ' . $other_array['start'] . ', ' . $other_array['total'] ;
		}
		else
		{
		/* FIXME: unset */
		}

		if ( empty( $where_parameters ) )
		{ $where_parameters = '1'; }

		/* Prepare Query */
		$queryString = 'SELECT ' . $field_parameters . ' FROM `' . $table . '` WHERE ' . $where_parameters . $order_parameters;
		return $this->Query( $queryString );
	}
}
?>
