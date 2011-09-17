<?php
/* ToyCastle project */

/* Rrevent hacking */
if ( !defined( 'TC_STARTED' ) )
{ die( 'Hacking Attempt' ); }

define( 'TC_TABLE_MEMBER', 'admins' );
define( 'TC_COOKIE_SESSION_NAME', 'wikimania' );

/* Class UserSession start */
Class UserSession
{

	var $handle; /* Session ID */

	function UserSession()
	{
		 $this->handle = '';
	}

	function Start( $custom_session_id = '' )
	{
		global $sql, $_COOKIE ;

		/* Check SQL */
		if ( !$sql->handle )
		{ return false; }

		/* If there is no Session, create it */
		if ( !$_COOKIE[TC_COOKIE_SESSION_NAME] && ! $custom_session_id )
		{  return $this->Create(); }

		/* Cookie Session ID as 2nd order */
		if ( !$custom_session_id )
				{ $custom_session_id = $_COOKIE[TC_COOKIE_SESSION_NAME]; }

		/* First, check for vaild Session ID */
		if ( preg_match( '/[^0-9A-Z]/i', $custom_session_id ) ) return false;
		if ( !preg_match( '/^[0-9A-Z]{32}$/is', $custom_session_id ) ) return false;

		/* Then, start Session */
		session_name( TC_COOKIE_SESSION_NAME );
		session_id( $custom_session_id );
		session_start();

		$this->handle = $custom_session_id;

		/* If a logged-in user */
		if ( array_key_exists( 'logged_in', $_SESSION ) )
		{
			/* Check for vaild ID */
			if ( preg_match( '/[^0-9A-Z\_\-]/i', $_SESSION[user_id] ) ) {
				$this->Destroy();
				return false;
			}

			/* Check for vaild login data */
			$result = $sql->selectData( TC_TABLE_MEMBER, array(), '`user_id`=\'' . $_SESSION[user_id] . '\' and `password`=\'' . $sql->EscapeString( $_SESSION[user_password] ) . '\'' );
			$login_data = $sql->fetchArray( $result );
			if ( !$result || !$login_data )
			{
				$this->Destroy();
				return false;
			}

			return true;
		}
		else
		{
			unset( $_SESSION['user_id'] );
			unset( $_SESSION['user_password'] );
			return true;
		}
	}

	function Create()
	{
		$new_sessionid = md5( uniqid( mt_rand(), true ) );
		session_name( TC_COOKIE_SESSION_NAME );
		session_id( $new_sessionid );
		session_start();
		$this->handle = $new_sessionid;
		return true;
	}

	function Destroy()
	{

		if ( isset( $_COOKIE[TC_COOKIE_SESSION_NAME] ) )
		{
			setcookie( TC_COOKIE_SESSION_NAME, '', time() -42000, '/' );
		}

		session_destroy();
	}

}
