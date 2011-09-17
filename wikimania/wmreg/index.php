<?php
/**
 * Wikimania 2008 Registration system
 * Copyright (C) 2008 Littlebtc ([[zh:User:B]]), alexsh ([[zh:User:Alexsh]]), Tim ([[wm07:User:Foxkaworus]]), and others
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; version 2 of the License, or
 * (at your option) any later version.

 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
 *
 * Made originally for Wikimania 2007 and modified specifically for Wikimania 2008 needs by local Alexandria team.
 * @copyright (C) 2008 Littlebtc ([[zh:User:B]]), alexsh ([[zh:User:Alexsh]]), Tim ([[wm07:User:Foxkaworus]]), and others
 * @license GNU General Public License version 2
 */

/* prevent hacking */
define( 'TC_STARTED', 1 );

/**
 * An array merging information from GET & POST.
 */
$MY_REQUEST = array_merge( $_GET , $_POST );

/* unregister globals */
if ( @ini_get( 'register_globals' ) )
{
	/**
	 * Variables that should not be removed
	 */
	$chk_unset = array( '_GET', '_POST', '_COOKIE', '_REQUEST', '_ENV', '_FILES', '_SERVER', 'GLOBALS' );
	$unset_vars = array_keys( array_merge( $_COOKIE , $_REQUEST , $_ENV , $_FILES , $_SERVER ) );

	/* avoid GLOBALS hijacking in PHP4*/
	if ( in_array( 'GLOBALS', $unset_vars ) )
	{
		echo 'Error: GLOBALS overwrite attempt';
		exit;
	}

	foreach ( $unset_vars as $key )
	{
		if ( !in_array( $key, $chk_unset )  && isset( $$key ) )
			{ unset( $$key ); }
	}
	unset( $unset_vars );
	unset( $chk_unset );
}

include 'includes/SqlConnect-mysql.php';
include 'includes/UserSession.php';
include 'includes/languages.php';
include 'includes/prices.php';
include 'includes/mail.php';
include 'dbdata.php';

/**
 * If the system is not opened, display an "error" message.
 */
if ( time() < $open_time )
{
	include "skin/html_header.php";
	include "skin/patience.php";
	include "skin/html_footer.php";
	exit;
}
if ( time() > $close_time )
{
	include "index_thanks.php";
	exit;
}

/**
 * Default value of user language
 */
$userLanguage = 'en';

/**
 * An array to stored "error message"
 * @todo: This should be moved to view/skin level
 */
$error_message = '';

/**
 * An array to stored filtered user-sent data, for confirming and writing data
 */
$register_data = array();

/**
 * An array to output the staff-side data in the staff interface.
 */
$table_data = array();

/**
 * If no uselang is assigned in POST/GET, we try HTTP_ACCEPT_LANGUAGE
 */
if ( !array_key_exists( 'uselang', $MY_REQUEST ) )
{
	$acceptLanguages = explode( ',', $_SERVER['HTTP_ACCEPT_LANGUAGE'] );

	$acceptLanguage = $acceptLanguages[0];

	/* zh-languages */
	if ( preg_match( '/^zh/', $acceptLanguage ) )
	{
		if ( preg_match( '/^zh-(tw|hk)/', $acceptLanguage ) )
			$userLanguage = 'zh-hant';
		else
			$userLanguage = 'zh-hans';
	}
	/* Others */
	else
	{
		$acceptLanguage = preg_replace( '/([^-;]+)[-|;]?(.+)?/', '\\1', $acceptLanguage );
		if ( file_exists( 'includes/language_' . $acceptLanguage . '.php' ) )
			$userLanguage = $acceptLanguage;

	}

	unset( $acceptLanguage );
	unset( $acceptLanguages );

}

elseif ( !preg_match( '/[^0-9A-Z\-]/i', $MY_REQUEST['uselang'] ) )
{
	if ( file_exists( 'includes/language_' .  $MY_REQUEST['uselang'] . '.php' ) )
		$userLanguage = $MY_REQUEST['uselang'];
}

include 'includes/language_' . $userLanguage . '.php';

if ( !$DB_HOST ) exit;

$sql = new SqlConnect();
if ( !$sql->Start( $DB_HOST, $DB_ID, $DB_PASS, $DB_NAME ) ) exit;

/* Start Session */
$my_session = new UserSession();

if ( !$_COOKIE['wikimania'] && $_POST['secret_id'] )
{
	if ( !$my_session->Start( $_POST['secret_id'] ) ) exit;
}
else
{
	if ( !$my_session->Start() ) exit;
}

switch( $MY_REQUEST['action'] )
{
	case 'submit':
	submission();
	break;

	case 'confirm':
	confirmation();
	break;

	case 'paypal_successful':
	paypal_successful();
	break;

	case 'paypal_failed':
	paypal_failed();
	break;

	case 'admin':
	administration();
	break;

	case 'login':
	login();
	break;

	case 'admin_login':
	process_login();
	break;

	case 'logout':
	logout();
	break;

	case 'query':
	query();
	break;

	case 'query_result':
	query_result();
	break;

	case 'coupon':
	coupon();
	break;

	case 'coupon_activate':
	coupon_activation();
	break;

	default:
	regform();
}


/**
 * Display the registraion form.
 */
function regform()
{
	$_SESSION['register_form'] = 1;
	include "skin/html_header.php";
	include "skin/form.php";
	include "skin/html_footer.php";
}

/**
 * Transfer an error code to actual message
 * @todo: This should be moved to the view/skin part
 */
function create_error( $errormsg, $form1, $form2 = NULL )
{
	global $lang_register_form, $lang_errors;

	if ( $form2 )
	{
		return preg_replace( '/(.+)\t\n\t(.+)/' , $lang_errors[$errormsg] , $lang_register_form[$form1] . "\t\n\t" . $form2 );
	}
	else
	{
		return preg_replace( '/(.+)/' , $lang_errors[$errormsg] , $lang_register_form[$form1] );
	}
}

function isValidEmail( $email )
{
		$qtext = '[^\\x0d\\x22\\x5c\\x80-\\xff]';
		$dtext = '[^\\x0d\\x5b-\\x5d\\x80-\\xff]';
		$atom = '[^\\x00-\\x20\\x22\\x28\\x29\\x2c\\x2e\\x3a-\\x3c' .
			'\\x3e\\x40\\x5b-\\x5d\\x7f-\\xff]+';
		$quoted_pair = '\\x5c[\\x00-\\x7f]';
		$domain_literal = "\\x5b($dtext|$quoted_pair)*\\x5d";
		$quoted_string = "\\x22($qtext|$quoted_pair)*\\x22";
		$domain_ref = $atom;
		$sub_domain = "($domain_ref|$domain_literal)";
		$word = "($atom|$quoted_string)";
		$domain = "$sub_domain(\\x2e$sub_domain)*";
		$local_part = "$word(\\x2e$word)*";
		$addr_spec = "$local_part\\x40$domain";

		return preg_match( "!^$addr_spec$!", $email ) ? true : false;
}

/**
 * Check the sent data
 */
function check_register_data( $check_captcha )
{
	global $MY_REQUEST, $sql, $WikimediaLanguages, $WikimediaOrgs, $WikimediaProjects, $error_array,
		 $error_message, $register_data, $lang_countries, $recaptcha_privatekey;

	/**
	 * All fields needs to retrived from $MY_REQUEST
	 * @todo This should be in a better way, like a "fields info" containing the data type in the MySQL table and output form type
	 */
	$register_data_keys = array( 'given_name', 'surname', 'sex', 'country', 'langn', 'lang1', 'lang1-level', 'lang2', 'lang2-level', 'lang3', 'lang3-level', 'wiki_id',
	 'wiki_language', 'wiki_project', 'email', 'join_date', 'tours', 'showname', 'custom_showname', 'size', 'food', 'food_other', 'visa_assistance', 'nationality', 'passport_day',
	 'passport_month', 'passport_year', 'passport_issued', 'passport', 'day', 'month', 'year', 'countryofbirth',  'homeaddress', 'visa_assistance_description', 'nights', 'room', 'room_partner', 'room_requests', 'hotels', 'discount_code' );

	foreach ( $register_data_keys as $key )
	{
		if ( isset( $MY_REQUEST[$key] ) )
		{
			$register_data[$key] = $MY_REQUEST[$key];
		}
	}
	unset( $register_data_keys );

	$error_array = array();

	if ( $check_captcha )
	{
		require_once( 'recaptchalib.php' );
		$resp = recaptcha_check_answer ( $recaptcha_privatekey,
									$_SERVER["REMOTE_ADDR"],
									$_POST["recaptcha_challenge_field"],
									$_POST["recaptcha_response_field"] );

		if ( !$resp->is_valid ) {
			$error_array[] = create_error( 'wrong', 'captcha' );
		}
	}

	/* Record UTC / GMT Date */
	$register_data['signuptime'] = time();

	/* Check input */
	if ( !$register_data['given_name'] )
	{
		$error_array[] = create_error( 'not_input', 'given_name' );
	}

	if ( mb_strlen( $register_data['given_name'], 'UTF-8' ) > 24 )
	{
		$error_array[] = create_error( 'too_long', 'given_name', '24' );
	}

	if ( !$register_data['surname'] )
	{
		$error_array[] = create_error( 'not_input', 'surname' );
	}

	if ( mb_strlen( $register_data['surname'], 'UTF-8' ) > 24 )
	{
		$error_array[] = create_error( 'too_long', 'surname', '24' );
	}

	if ( !$register_data['sex'] )
	{
		$error_array[] = create_error( 'not_select', 'sex' );
	}
	elseif ( !in_array( $register_data['sex'], array( 'm', 'f', 'd' ) ) )
	{
		$error_array[] = create_error( 'wrong', 'sex' );
	}

	if ( !$register_data['country'] )
	{
		$error_array[] = create_error( 'not_select', 'country' );
	}
	elseif ( !in_array( $register_data['country'], array_keys( $lang_countries ) ) )
	{
		$error_array[] = create_error( 'wrong', 'country' );
	}

	if ( !$register_data['langn'] )
	{
		$error_array[] = create_error( 'not_select', 'langn' ); }
	elseif ( !in_array( $register_data['langn'], array_keys( $WikimediaLanguages ) ) )
	{
		$error_array[] = create_error( 'wrong', 'langn' );
	}

	for ( $i = 1; $i <= 3; $i++ )
	{
		if ( $register_data['lang' . $i] )
		{
			if ( !in_array( $register_data['lang' . $i], array_keys( $WikimediaLanguages ) ) )
			{
				$error_array[] =  create_error( 'wrong', 'lang' . $i );
			}
			elseif ( !$register_data['lang' . $i . '-level'] )
			{
				$error_array[] = create_error( 'not_select', 'lang' . $i . '_level' );
			}
			elseif ( !in_array( $register_data['lang' . $i . '-level'], array( '1', '2', '3', '4' ) ) )
			{
				$error_array[] = create_error( 'wrong', 'lang' . $i . '_level' );
			}
		}
	}

	if ( $register_data['wiki_id'] || $register_data['wiki_language'] || $register_data['wiki_project'] )
	{
		if ( !$register_data['wiki_id'] || !$register_data['wiki_language'] || !$register_data['wiki_project'] )
		{
			$error_array[] = create_error( 'not_input_completely', 'wiki_id' );
		}
		else
		{
			if ( !in_array( $register_data['wiki_language'], array_keys( $WikimediaLanguages ) ) && !in_array( $register_data['wiki_language'], $WikimediaOrgs ) )
			{
				$error_array[] = create_error( 'wrong', 'wiki_id' );
			}
			elseif ( !in_array( $register_data['wiki_project'], $WikimediaProjects ) )
			{
				$error_array[] = create_error( 'wrong', 'wiki_id' );
			}
			elseif ( in_array( $register_data['wiki_language'], $WikimediaOrgs ) && $register_data['wiki_project'] != 'wikimedia' )
			{
				$error_array[] = create_error( 'wrong', 'wiki_id' );
			}
			elseif ( !in_array( $register_data['wiki_language'], $WikimediaOrgs ) && $register_data['wiki_project'] == 'wikimedia' )
			{
				$error_array[] = create_error( 'wrong', 'wiki_id' );
			}
			if ( mb_strlen( $register_data['wiki_id'], 'UTF-8' ) > 100 )
			{
				$error_array[] = create_error( 'too_long', 'wiki_id', 100 );
			}
		}
	}

	if ( !$register_data['email'] )
	{
		$error_array[] = create_error( 'not_input', 'email' );
	}
	elseif ( !isValidEmail( $register_data['email'] ) )
	{
		$error_array[] = create_error( 'wrong', 'email' );
	}
	elseif ( mb_strlen( $register_data['email'], 'UTF-8' ) > 48 )
	{
		$error_array[] = create_error( 'too_long', 'email', 48 );
	}

	$join_date_selected = 0;
	$main_date_selected = 0;

	if ( is_array( $register_data['join_date'] ) )
	{
		for ( $i = 1; $i <= 6; $i++ )
		{
			if ( in_array( $i, $register_data['join_date'] ) )
			{
				$join_date_selected++;
				if ( 3 <= $i && $i <= 5 )
				{
					$main_date_selected++;
				}
			}
		}
	}

	if ( $join_date_selected == 0 )
	{
		$error_array[] = create_error( 'not_select', 'join_date' );
	}
//	if ($main_date_selected == 0)
//	{
//		$error_array[] = create_error('not_select', 'main_date');
//	}

	unset( $join_date_selected );
	unset( $main_date_selected );

	$showname_entered = false;
	if ( is_array( $register_data['showname'] ) )
	{
		for ( $i = 1; $i <= 3; $i++ )
		{
			if ( in_array( $i, $register_data['showname'] ) )
			{
				$showname_entered = true;

				if ( $i == 3 && empty( $register_data['custom_showname'] ) )
				{
					$error_array[] = create_error( 'not_input', 'custom_showname' );
				}
			}
		}
	}

	if ( !$showname_entered )
	{
		$error_array[] = create_error( 'not_input', 'showname' );
	}

	if ( mb_strlen( $register_data['custom_showname'], 'UTF-8' ) > 30 )
	{
		$error_array[] = create_error( 'too_long', 'custom_showname', 30 );
	}

	if ( !$register_data['size'] )
	{
		$error_array[] = create_error( 'not_select', 'size' );
	}
	elseif ( !in_array( $register_data['size'], array( 'XXS', 'XS', 'S', 'M', 'L', 'XL', 'XXL', 'XXXL' ) ) )
	{
		$error_array[] = create_error( 'wrong', 'size' );
	}

	if ( $register_data['food'] == 3 && empty( $register_data['food_other'] ) )
	{
		$error_array[] = create_error( 'not_input', 'food_other' );
	}
	if ( mb_strlen( $register_data['food_other'], 'UTF-8' ) > 64 )
	{
		$error_array[] = create_error( 'too_long', 'food_other', 64 );
	}

	if ( !$register_data['visa_assistance'] )
	{
		$register_data['visa_assistance'] = 0;
	}
	else
	{
		if ( !$register_data['nationality'] )
		{
			$error_array[] = create_error( 'not_select', 'nationality' );
		}
		elseif ( !in_array( $register_data['nationality'], array_keys( $lang_countries ) ) )
		{
			$error_array[] = create_error( 'wrong', 'nationality' );
		}
		if ( !$register_data['passport'] )
		{
			$error_array[] = create_error( 'not_input', 'passport' );
		}

		if ( mb_strlen( $register_data['passport'], 'UTF-8' ) > 30 )
		{
			$error_array[] = create_error( 'too_long', 'passport', 30 );
		}

		if ( !$register_data['passport_year'] || !$register_data['passport_month'] || !$register_data['passport_day'] )
		{
			$error_array[] = create_error( 'not_input_completely', 'passport_valid' );
		}

		elseif ( $register_data['passport_month'] < 1 || $register_data['passport_day'] < 1 || $register_data['passport_year'] < 2011 || $register_data['year'] > 2050 )
		{
			$error_array[] = create_error( 'incorrect', 'passport_valid' );
		}
		else
		{
			$register_data['passport_year'] = intval( $register_data['passport_year'] );
			$register_data['passport_month'] = intval( $register_data['passport_month'] );
			$register_data['passport_day'] = intval( $register_data['passport_day'] );
			if ( !checkdate( $register_data['passport_month'] , $register_data['passport_day'] , $register_data['passport_year'] ) )
			{
				$error_array[] = create_error( 'incorrect', 'passport_valid' );
			}
		}

		$register_data['passport_valid'] = $register_data['passport_year'] . '-' . $register_data['passport_month'] . '-' . $register_data['passport_day'];

		if ( !$register_data['passport_issued'] )
		{
			$error_array[] = create_error( 'not_input', 'passport_issued' );
		}

		if ( mb_strlen( $register_data['passport_issued'], 'UTF-8' ) > 30 )
		{
			$error_array[] = create_error( 'too_long', 'passport_issued', 30 );
		}

		if ( !$register_data['year'] || !$register_data['month'] || !$register_data['day'] )
		{
			$error_array[] = create_error( 'not_input_completely', 'birthday' );
		}

		elseif ( $register_data['month'] < 1 || $register_data['day'] < 1 || $register_data['year'] < 1900 || $register_data['year'] > 2011 )
		{
			$error_array[] = create_error( 'incorrect', 'birthday' );
		}
		else
		{
			$register_data['year'] = intval( $register_data['year'] );
			$register_data['month'] = intval( $register_data['month'] );
			$register_data['day'] = intval( $register_data['day'] );
			if ( !checkdate( $register_data['month'] , $register_data['day'] , $register_data['year'] ) )
			{
				$error_array[] = create_error( 'incorrect', 'birthday' );
			}
		}

		$register_data['birthday'] = $register_data['year'] . '-' . $register_data['month'] . '-' . $register_data['day'];

		if ( !$register_data['countryofbirth'] )
		{
			$error_array[] = create_error( 'not_select', 'countryofbirth' );
		}
		elseif ( !in_array( $register_data['countryofbirth'], array_keys( $lang_countries ) ) )
		{
			$error_array[] = create_error( 'wrong', 'countryofbirth' );
		}
		if ( !$register_data['homeaddress'] )
		{
			$error_array[] = create_error( 'not_input', 'homeaddress' );
		}
		elseif ( mb_strlen( $register_data['homeaddress'], 'UTF-8' ) > 500 )
		{
			$error_array[] = create_error( 'too_long', 'homeaddress', 500 );
		}
		if ( mb_strlen( $register_data['visa_assistance_description'], 'UTF-8' ) > 500 )
		{
			$error_array[] = create_error( 'too_long',  'visa_assistance_description', 500 );
		}
	}

	$nights_selected = 0;
	if ( is_array( $register_data['nights'] ) )
	{
		for ( $i = 1; $i <= 8; $i++ )
		{
			if ( in_array( $i, $register_data['nights'] ) )
			{
				$nights_selected++;
			}
		}
	}
	$room_selected = false;
	for ( $i = 1; $i <= 3;  $i++ )
	{
		if ( $register_data['room'] == $i )
		{
			$room_selected = true;
		}
	}
	if ( $room_selected == false && $nights_selected > 0 )
	{
		$error_array[] = create_error( 'not_select', 'room' );
	}
	if ( $register_data['room'] == 3 && empty( $register_data['room_partner'] ) )
	{
		$error_array[] = create_error( 'not_input', 'room_partner' );
	}
	if ( mb_strlen( $register_data['room_partner'], 'UTF-8' ) > 64 )
	{
		$error_array[] = create_error( 'too_long', 'room_partner', 64 );
	}

	if ( mb_strlen( $register_data['room_requests'], 'UTF-8' ) > 500 )
	{
		$error_array[] = create_error( 'too_long', 'room_requests', 500 );
	}

	$hotel_selected = false;
	for ( $i = 1; $i <= 9; $i++ )
	{
		if ( $register_data['hotels'] == $i )
		{
			$hotel_selected = true;
		}
	}
	if ( $hotel_selected == false && $nights_selected > 0 )
	{
		$error_array[] = create_error( 'not_select', 'accommodation_hotel' );
	}

	unset( $room_selected );
	unset( $nights_selected );
	unset( $hotel_selected );



	if ( mb_strlen( $register_data['discount_code'], 'UTF-8' ) > 18 )
	{
		$error_array[] = create_error( 'too_long', 'discount_code', 18 );
	}

	if ( !empty( $error_array ) )
	{
		$error_message = '<ul>' . "\n" . '<li>' . implode( '</li>' . "\n" . '<li>', $error_array ) . '</li>' . "\n" . '</ul>';
		regform();
		unset( $error_array );
		return 0;
	}

	/* calculate all costs!
	 * seems like a weird place to do it, but as it is required by both the confirmation and submission phase
	 * it actually makes some sense */
	$cost = calculate_cost( $register_data );
	$register_data = array_merge( $register_data, $cost );
	return 1;
}

/**
 * Call the confirm function and display the comfirmation form
 */
function confirmation()
{
	global $register_data;

	if ( !$_SESSION['register_form'] ) exit; // Avoid something bad :(

	/* Get data checked!! */
	if ( !check_register_data( true ) ) return;

	/* Create Secret ID2 */
	$_SESSION['secret'] = md5( $register_data['signuptime'] );

	/* Show result */
	include 'skin/html_header.php';
	include 'skin/confirm_data.php';
	include 'skin/html_footer.php';

}

/**
 * Submit the data after confirmation
 */
function submission()
{
	global $sql, $WikimediaLanguages, $WikimediaOrgs, $WikimediaProjects, $error_array, $error_message, $register_data, $wikimania_cost, $accommodation_cost, $other_cost, $user_cost, $lang_errors, $lang_register_form;

	if ( !$_SESSION['register_form'] ) exit; // Avoid something bad :(

	/* Get data checked!! */
	if ( !check_register_data( false ) ) {
		die( 'Problem with data.' );
	}

	/* Reset? */
	if ( $_POST['submit'] == $lang_register_form['reset'] )
	{
		regform();
		return;
	}

	/* Hacking attempt? */
	if ( $_SESSION['secret'] != $_POST['secret_id2'] && ( !empty( $_POST['secret_id2'] ) ) )
	{
		die( 'Hacking attempt or session recording error. Try turning on cookies and try again.' );
	}
	/* No Repeat */
	$test_code_result = $sql->selectData( 'registration', array(), '`surname`=\'' . $sql->EscapeString( $register_data['surname'] ) . '\'' .
	' AND `given_name`=\'' . $sql->EscapeString( $register_data['given_name'] ) . '\'' .
	' AND `email`=\'' . $sql->EscapeString( $register_data['email'] ) . '\'' );
	if ( is_array( $sql->fetchArray( $test_code_result ) ) )
	{
		echo $lang_errors['repeat'];
		return;
	}
	mysql_free_result( $test_code_result );

	/* format sign-up time */
	$register_data['signuptime'] = gmdate( 'Y-m-d H:i:s', $register_data['signuptime'] );

	/* Unset input data that is covered by other fields (birthday, passport_valid) */
	unset( $register_data['year'] );
	unset( $register_data['month'] );
	unset( $register_data['day'] );
	unset( $register_data['passport_year'] );
	unset( $register_data['passport_month'] );
	unset( $register_data['passport_day'] );

	/* Transform arrays into comma-delimited strings for use with SET type fields */
	if ( array_key_exists( 'join_date', $register_data ) )
		$register_data['join_date'] = implode( ',', $register_data['join_date'] );
	if ( array_key_exists( 'showname', $register_data ) )
		$register_data['showname'] = implode( ',', $register_data['showname'] );
	if ( array_key_exists( 'nights', $register_data ) )
		$register_data['nights'] = implode( ',', $register_data['nights'] );

	/* Create Unique Data, avoid repeat */
	for ( $i = 1; $i <= 100; $i++ ) /* 100 times are too much... */
	{
		$register_data['unique_code'] = substr( md5( uniqid( mt_rand(), true ) ), 3, 5 );
		$test_code_result = $sql->selectData( 'registration', array(), '`unique_code`=\'' . $register_data['unique_code'] . '\'' );
		if ( !is_array( $sql->fetchArray( $test_code_result ) ) )
			break; /* successfully found the code that is not same */
	}

	/* Write into database */
	$result = $sql->insertData( 'registration', $register_data );
	if ( !$result )
	{
		die( 'Registration system error, please contact the Wikimania team.' );
	}

	/* Send mail */
	include 'skin/mail_successful.php';
	$mail_successful_content = preg_replace( '/\$1/', $register_data['given_name'] . ' ' . $register_data['surname'], $mail_successful_content );
	$mail_successful_content = preg_replace( '/\$2/', $register_data['unique_code'], $mail_successful_content );
	$mail_successful_content = preg_replace( '/\$3/', $register_data['email'], $mail_successful_content );

	$to = $register_data['given_name'] . ' ' . $register_data['surname'] . '  <' . $register_data['email'] . '>';
	if ( !mail_msg( $to, 'Wikimania 2011 - Registration Received', $mail_successful_content ) )
	{
		echo 'Notice: Mail delivery error. Contact Wikimania team.';
	}

	/* Show result */
	include 'skin/html_header.php';
	include 'skin/register_successful.php';
	include 'skin/paypal.php';
	include 'skin/html_footer.php';
}

/**
 * After PayPal transmission successful, display a message
 */
function paypal_successful()
{
	global $MY_REQUEST, $sql;
	if ( !$MY_REQUEST['unique_code'] || empty( $MY_REQUEST['unique_code'] ) || preg_match( '/[^0-9A-Z]/i', $MY_REQUEST['unique_code'] ) )
	{
		exit; /* invaild information? bye bye :) */
	}
	/* Hacking attempt? */
	if ( ( md5( $_SESSION['secret'] . $MY_REQUEST['unique_code'] ) != $MY_REQUEST['nonce'] ) || ( empty( $MY_REQUEST['nonce'] ) ) )
	{
		die( 'Hacking attempt or session recording error. Please contact the Wikimania team.' );
	}

	$test_code_result = $sql->selectData( 'registration', array(), '`unique_code`=\'' . $MY_REQUEST['unique_code'] . '\'' );
	$test_code_array = $sql->fetchArray( $test_code_result );
	if ( !is_array( $test_code_array ) ) { exit; } /* didn't find vaild unique id */

	if ( $test_code_array['paypal'] ) exit;

	/* OK, now write paypal ok :) */
	if ( !$sql->updateData( 'registration', array( 'paypal' => '1' ),  '`unique_code`=\'' . $MY_REQUEST['unique_code'] . '\'' ) )
	{ echo 'SYSTEM ERROR'; return; }

	include 'skin/html_header.php';
	include 'skin/paypal_successful.php';
	include 'skin/html_footer.php';
}

/**
 * After PayPal transmission failed, display a message
 */
function paypal_failed()
{
	global $MY_REQUEST, $sql;
	if ( !$MY_REQUEST['unique_code'] || empty( $MY_REQUEST['unique_code'] ) || preg_match( '/[^0-9A-Z]/i', $MY_REQUEST['unique_code'] ) )
	{
		exit; /* invaild information? bye bye :) */
	}

	$test_code_result = $sql->selectData( 'registration', array(), '`unique_code`=\'' . $MY_REQUEST['unique_code'] . '\'' );
	$test_code_array = $sql->fetchArray( $test_code_result );
	if ( !is_array( $test_code_array ) ) { exit; } /* found vaild unique id */

	if ( $test_code_array['paypal'] ) exit;

	$register_data = $test_code_array;
	include 'skin/html_header.php';
	include 'skin/paypal_failed.php';
	include 'skin/paypal.php';
	include 'skin/html_footer.php';

}

function administration()
{
	global $_SESSION, $sql, $register_data, $MY_REQUEST, $table_data, $error_array,
	$error_message, $lang_countries, $lang_register_form, $myself_url;

	/* check for login. If not, show login form */
	if ( !$_SESSION['logged_in'] )
	{
		header( 'Location:' . $myself_url . 'index.php?action=login' );
		return;
	}

	/* No strange mode */
	if ( !in_array( $MY_REQUEST['mode'], array( NULL, 'topic', 'accommodation', 'visa', 'pay' ) ) )
		return;

	/* Admin options first */
	switch ( $MY_REQUEST['modification'] )
	{
		case 'edit_user':

			if ( !$MY_REQUEST['unique_code'] || empty( $MY_REQUEST['unique_code'] ) || preg_match( '/[^0-9A-Z]/i', $MY_REQUEST['unique_code'] ) )
			{
				$error_array[] = 'filled out the wrong code'; /* invaild information */
				break;
			}

			/* Get Data */
			$result = $sql->selectData( 'registration', array(), '`surname`=\'' . $sql->EscapeString( $MY_REQUEST['surname'] ) . '\' AND `given_name` = \'' . $sql->EscapeString( $MY_REQUEST['given_name'] ) . '\' AND `unique_code`=\'' . $MY_REQUEST['unique_code'] . '\'' );
			if ( !$data = $sql->fetchAssoc( $result ) )
			{
				$error_array[] = '';
				break;
			}
			mysql_free_result( $result );

			if ( $MY_REQUEST['item'] == 1 )
			{
				$MY_REQUEST['cost_paid'] = round( $MY_REQUEST['cost_paid'], 2 );
				if ( $MY_REQUEST['cost_paid'] == 0 )
				{
					$error_array[] = 'Received a wrong amount or zero.'; /* invaild information */
					break;
				}

				/* Send data */
				// add or substract the input sum
				if ( !$sql->updateData( 'registration', array( 'cost_paid' => ( $data['cost_paid'] + $MY_REQUEST['cost_paid'] ) ), '`unique_code`=\'' . $MY_REQUEST['unique_code'] . '\'' ) )
				{ echo 'SYSTEM ERROR'; return; }

				$error_array[] = $MY_REQUEST['given_name'] . ' ' . $MY_REQUEST['surname'] . ': Payment adjustment has been completed';
				$MY_REQUEST['cost_paid'] = 0;
				$MY_REQUEST['unique_code'] = '';
				$MY_REQUEST['surname'] = '';
				$MY_REQUEST['given_name'] = '';
			}
			// @todo finish this
			elseif ( $MY_REQUEST['item'] == 2 )
			{
				$register_data = array(
				'join_date' => implode( ',', $MY_REQUEST['join_date'] ),
				'nights' => implode( ',', $MY_REQUEST['nights'] ),
				'hotels' => $MY_REQUEST['hotels'],
				'room_number' => $MY_REQUEST['room_number']
				);
			}
			elseif ( $MY_REQUEST['item'] == 3 )
			{
				var_dump( $MY_REQUEST );
				$register_data = array(
				);
			}

			if ( $MY_REQUEST['item'] == 2 || $MY_REQUEST['item'] == 3 )
			{
				/* Send data */
				if ( !$sql->updateData( 'registration', $register_data, '`unique_code`=\'' . $MY_REQUEST['unique_code'] . '\'' ) )
				{ echo 'SYSTEM ERROR'; return; }
				if ( $MY_REQUEST['item'] == 2 )
				{ $error_array[] = $MY_REQUEST['given_name'] . ' ' . $MY_REQUEST['surname'] . ': Accommodation modification has been completed successfully'; }
				elseif ( $MY_REQUEST['item'] == 3 )
				{ $error_array[] = $MY_REQUEST['given_name'] . ' ' . $MY_REQUEST['surname'] . ': Tag and identity modification has been completed successfully'; }
			}
		break;

		case 'change_status':

			$MY_REQUEST['status'] = intval( $MY_REQUEST['status'] );
			if ( $MY_REQUEST['status'] != 1 && $MY_REQUEST['status'] != 2 )
			{ break; }

			if ( !is_array( $MY_REQUEST['no'] ) )
			{ break; }

			foreach ( $MY_REQUEST['no'] as $no )
			{
				/* Accepted, rejected, or even not exist? */
				$result = $sql->selectData( 'registration', NULL, '`unique_code`=\'' . $no . '\'' );
				if ( !( $data = $sql->fetchArray( $result ) ) )
				{
					$error_array[] = 'Couldn\'t find the registration of information of #' . $no ;
					continue;
				}

				if ( $data['status'] != 0 )
				{
					$error_array[] = $data['given_name'] . ' ' . $data['surname'] . '(No. ' . $no . ') has been accepted or rejected, so the change couldn\'t be done.';
					continue;
				}

				if ( $MY_REQUEST['status'] == 1 && $data['cost_total'] > $data['cost_paid'] )
				{
					$error_array[] = $data['given_name'] . ' ' . $data['surname'] . ' (' . $no . ') hasn\'t completed payment, so registration couldn\'t be confirmed.';
					continue;
				}

				if ( $MY_REQUEST['status'] == 1 )
				{
					if ( $sql->updateData( 'registration', array( 'status' => $MY_REQUEST['status'] ), '`unique_code`=\'' . $no . '\'' ) )
						{  $error_array[] = $data['given_name'] . ' ' . $data['surname'] . '(' . $no . ') has been confirmed successfully.'; }
					else
						{  $error_array[] = $data['given_name'] . ' ' . $data['surname'] . '(' . $no . ') is not confirmed due to databse error.'; }
				}
				else if ( $MY_REQUEST['status'] == 2 )
				{
					if ( $sql->updateData( 'registration', array( 'status' => $MY_REQUEST['status'] ), '`unique_code`=\'' . $no . '\'' ) )
						{  $error_array[] = $data['given_name'] . ' ' . $data['surname'] . '(' . $no . ') has been rejected successfully.'; }
					else
						{  $error_array[] = $data['given_name'] . ' ' . $data['surname'] . '(' . $no . ') is not rejected due to database error.'; }
				}

				if ( $MY_REQUEST['status'] == 1 )
				{
					/* Send mail */
//					$temp_accommodation = '';
//					$temp_nights = array(NULL, 'July 16', 'July 17', 'July 18', 'July 19');
//
//					for ($i = 1; $i <= 4; $i++)
//					{
//						if ($data['night'.$i])
//						{ $temp_accommodation = $temp_accommodation . $temp_nights[$i].', '; }
//					}
//					unset($temp_nights);
//
//					if (!empty($temp_accommodation))
//					{$temp_accommodation = substr($temp_accommodation, 0, -2);}
//
//					include 'skin/mail_confirmed.php';
//					$mail_confirmed_content = preg_replace('/\$1/',$data['given_name'].' '.$data['surname'], $mail_confirmed_content);
//					$mail_confirmed_content = preg_replace('/\$2/',$data['unique_code'], $mail_confirmed_content);
//					$mail_confirmed_content = preg_replace('/\$4/',$data['email'], $mail_confirmed_content);
//					//$mail_confirmed_content = preg_replace('/\$5/',$temp_accommodation, $mail_confirmed_content);
//					//$mail_successful_content = preg_replace('/\$6/',$register_data['hotelname'], $mail_confirmed_content);
//
//					$to = $data['given_name'].' '.$data['surname'].'  <'.$data['email'].'>';
//					mail_msg($to, 'Wikimania 2011 - Registration Confirmed', $mail_confirmed_content);
//
//					unset($temp_accommodation);
				}

			}
			break;


		case 'get_data':
			header( 'Content-type: text/download; charset=utf-8' );
			header( 'Content-Disposition: attachment; filename="registration_data_' . gmdate( 'ymd_Hi', time() ) . '.txt"' );
			$result = $sql->selectData( 'registration', NULL, '', array( 'signuptime' ), array( 'asc' => true ) );

			$fields = array(
			'unique_code' => 'Code',
			'signuptime' => 'Sign-up',
			'given_name' => 'Given name',
			'surname' => 'Surname',
			'sex' => 'Sex',
			'country' => 'Country',
			'langn' => 'LangN',
			'lang1' => 'Lang1',
			'lang1-level' => 'Lang1lv',
			'lang2' => 'Lang2',
			'lang2-level' => 'Lang2lv',
			'lang3' => 'Lang3',
			'lang3-level' => 'Lang3lv',
			'wiki_id' => 'Wiki ID',
			'wiki_language' => 'Wiki Lang',
			'wiki_project' => 'Wiki project',
			'email' => 'E-mail',
			'j1' => 'Aug 2',
			'j2' => 'Aug 3',
			'j3' => 'Aug 4',
			'j4' => 'Aug 5',
			'j5' => 'Aug 6',
			'j6' => 'Aug 7',
			'tours' => 'Tour',
			's1' => 'Tag 1',
			's2' => 'Tag 2',
			's3' => 'Tag 3',
			'custom_showname' => 'Tag other',
			'size' => 'Size',
			'food' => 'Food',
			'food_other' => 'Food other',
			'visa_assistance' => 'Visa assistance',
			'nationality' => 'Nationality',
			'passport' => 'Passport number',
			'passport_valid' => 'Passport valid',
			'passport_issued' => 'Passport issued',
			'birthday' => 'Birthday',
			'countryofbirth' => 'Country of birth',
			'homeaddress' => 'Home address',
			'visa_assistance_descrption' => 'Visa other',
			'n1' => 'NAug 1',
			'n2' => 'NAug 2',
			'n3' => 'NAug 3',
			'n4' => 'NAug 4',
			'n5' => 'NAug 5',
			'n6' => 'NAug 6',
			'n7' => 'NAug 7',
			'n8' => 'NAug 8',
			'room' => 'Room type',
			'room_partner' => 'Room partner',
			'room_number' => 'Room number',
			'room_requests' => 'Room other',
			'hotelname' => 'Hotel',
			'discount_code' => 'Discount code',
			'attendance_cost' => 'Attendance cost',
			'accommodation_cost' => 'Accommodation cost',
			'vat_cost' => 'VAT',
			'cost_total' => 'Total cost',
			'currency' => 'Currency',
			'paypal' => 'Paypal',
			'cost_paid' => 'Cost paid',
			'status' => 'Status'
			);

			echo implode( "\t", $fields ) . "\r\n";

			while ( $data = $sql->fetchAssoc( $result ) )
			{
				for ( $i = 1; $i <= 3; $i++ )
				{
					if ( !( strpos( $data['showname'], (string)$i ) === false ) ) $data['s' . $i] = 'X';
				}
				for ( $i = 1; $i <= 6; $i++ )
				{
					if ( !( strpos( $data['join_date'], (string)$i ) === false ) ) $data['j' . $i] = 'X';
				}
				for ( $i = 1; $i <= 8; $i++ )
				{
					if ( !( strpos( $data['nights'], (string)$i ) === false ) ) $data['n' . $i] = 'X';
				}
				$data['hotelname'] = $lang_register_form['hotel' . $data['hotels']];
				$data['country'] = $lang_countries[strtolower( $data['country'] )];
				$data['nationality'] = $lang_countries[strtolower( $data['nationality'] )];
				$data['countryofbirth'] = $lang_countries[strtolower( $data['countryofbirth'] )];
				foreach ( $fields as $field => $field_alias )
				{
					$data[$field] = preg_replace( '/\t/', ' ', $data[$field] );
					$data[$field] = preg_replace( '/\n/', '.', $data[$field] );
					$data[$field] = preg_replace( '/\r/', ' ', $data[$field] );
					echo $data[$field];
					if ( $field != $fields[( count( $fields ) -1 )] ) echo "\t";
				}
				echo "\r\n";
			}
			return;
			break;

		case 'set_data':

			if ( !move_uploaded_file( $_FILES['accommodation_file']['tmp_name'], 'upload/tmp_accomodation.txt' ) )
			{ return; }

			$file_handle = @fopen( "upload/tmp_accomodation.txt", "r" );
			if ( !$file_handle || @feof( $file_handle ) )
			{ return; }
			$firstline = trim( fgets( $file_handle, 4096 ) );
			$fields = explode( "\t", $firstline );

			while ( !feof( $file_handle ) )
			{
				$buffer = trim( fgets( $file_handle, 4096 ) );
				if ( !$buffer )
				{ continue; }
				$data = array();

				$values = explode( "\t", $buffer );
				$data = array_combine( $fields, $values );

				/* Get Data */
				$result = $sql->selectData( 'registration', array(), '`no`=\'' . $sql->EscapeString( $data['no'] ) . '\'' .
				' AND `unique_code`=\'' . $sql->EscapeString( $data['unique_code'] ) . '\'' );
				if ( !$sql_data = $sql->fetchAssoc( $result ) )
				{
					$error_array[] = 'Find #' . $data['no'] . '				   Text file may be corrupted, please re-confirm				   ';
					continue;
				}
				if ( $data['room_num1'] + $data['room_num2'] + $data['room_num3'] +
				$data['room_num4'] + $data['room_num5'] == 0 )
				{ echo 'Skip No.' . $data['no'] . ' '; continue; }

				echo '<p>Preparing to write No.' . $data['no'] . 'Accommodation info				   ' . $data['room_num1'] . '/' . $data['room_num2'] . '/' . $data['room_num3'] . '/' . $data['room_num4'] . '/' . $data['room_num5'] . '...';

				/* Write Data */
				if ( !$sql->updateData( 'registration', array(
				'room_num1' => $data['room_num1'],
				'room_num2' => $data['room_num2'],
				'room_num3' => $data['room_num3'],
				'room_num4' => $data['room_num4'],
				'room_num5' => $data['room_num5'],
				), '`no`=\'' . $sql->EscapeString( $data['no'] ) . '\'' .
				' AND `unique_code`=\'' . $sql->EscapeString( $data['unique_code'] ) . '\'' ) )
				{ echo 'SYSTEM ERROR</p>'; continue; }
				echo 'OK! </p>';
				$buffer	= '';
			}
			fclose( $file_handle );
			$error_array[] = 'Registration has been completed.';
			unlink( 'upload/tmp_accomodation.txt' );
			break;
	}
	if ( !empty( $error_array ) )
	{
		$error_message = '<ul>' . "\n" . '<li>' . implode( '</li>' . "\n" . '<li>', $error_array ) . '</li>' . "\n" . '</ul>';
	}


	///////////////////////	///////////////////////	///////////////////////
	// END OF ADMIN OPTIONS
	///////////////////////	///////////////////////	///////////////////////

	/* How many people joined? */
	$result = $sql->selectData( 'registration', NULL, '', NULL, array( 'count' => 1 ) );
	$data = $sql->fetchArray( $result );
	$register_data['total_people'] = $data['COUNT(*)'];
	mysql_free_result( $result );

	/* How many people joined and confirmed? */
	$result = $sql->selectData( 'registration', NULL, '`status` = 1', NULL, array( 'count' => 1 ) );
	$data = $sql->fetchArray( $result );
	$register_data['total_people_confirmed'] = $data['COUNT(*)'];
	mysql_free_result( $result );
//
//	/* How many people accommodation? */
//	$result = $sql->selectData('registration',NULL,' `night1` + `night2` + `night3` + `night4` > 0 AND `status` = 1',NULL,array('count' => 1));
//	$data = $sql->fetchArray($result);
//	$register_data['total_accommodation'] = $data['COUNT(*)'];
//	mysql_free_result($result);
//

	switch ( $MY_REQUEST['mode'] )
	{
		case NULL:
			/* How many countries? */
			$result = $sql->selectData( 'registration', array( 'country' ), '', NULL, array( 'count' => 1, 'distinct' => 1 ) );
			$data = $sql->fetchArray( $result );
			$register_data['total_countries'] = $data[0];
			mysql_free_result( $result );

			/* How about sex? */
			$result = $sql->selectData( 'registration', NULL, '`sex` = \'m\'', NULL, array( 'count' => 1 ) );
			$data = $sql->fetchArray( $result );
			$register_data['total_male'] = $data[0];
			mysql_free_result( $result );

			$result = $sql->selectData( 'registration', NULL, '`sex` = \'f\'', NULL, array( 'count' => 1 ) );
			$data = $sql->fetchArray( $result );
			$register_data['total_female'] = $data[0];
			mysql_free_result( $result );

			$result = $sql->selectData( 'registration', NULL, '`sex` = \'d\'', NULL, array( 'count' => 1 ) );
			$data = $sql->fetchArray( $result );
			$register_data['total_sex_other'] = $data[0];
			mysql_free_result( $result );

			$result = $sql->selectData( 'registration', NULL, '`wiki_id` != \'\'', NULL, array( 'count' => 1 ) );
			$data = $sql->fetchArray( $result );
			$register_data['total_wikimedians'] = $data['COUNT(*)'];
			mysql_free_result( $result );

		case 'topic':

			/* How many people join for 1 day, for 2 days etc. */
			for ( $i = 1; $i <= 6; $i++ ) {
				$result = $sql->Query( 'SELECT COUNT(*) FROM `registration` WHERE BIT_COUNT(`join_date`) = ' . $i );
				$data = $sql->fetchArray( $result );
				$register_data['total_' . $i . 'days'] = $data[0];
				unset( $data );
				mysql_free_result( $result );
			}

			/* People per day */
			for ( $i = 1; $i <= 6; $i++ )
			{
				$result = $sql->Query( 'SELECT COUNT(*) FROM `registration` WHERE `join_date` LIKE \'%' . $i . '%\'' );
				$data = $sql->fetchArray( $result );
				$register_data['total_day' . $i] = $data[0];
				mysql_free_result( $result );
			}

		case 'accommodation':
			/* How many people stay 0 night, 1 night etc. */
			for ( $i = 0; $i <= 8; $i++ ) {
				$result = $sql->Query( 'SELECT COUNT(*) FROM `registration` WHERE BIT_COUNT(`nights`) = ' . $i );
				$data = $sql->fetchArray( $result );
				$register_data['total_' . $i . 'nights'] = $data[0];
				unset( $data );
				mysql_free_result( $result );
			}

			for ( $i = 1; $i <= 9; $i++ ) {
				$result = $sql->Query( 'SELECT COUNT(*) FROM `registration` WHERE `hotels` = \'' . $i . '\'' );
				$data = $sql->fetchArray( $result );
				$register_data['total_hotel' . $i] = $data[0];
				unset( $data );
				mysql_free_result( $result );
			}

			for ( $i = 1; $i <= 9; $i++ ) {
				$result = $sql->Query( 'SELECT COUNT(DISTINCT(`room_number`)) FROM `registration` WHERE `hotels` = \'' . $i . '\' AND `room_number` is not NULL AND `room_number` != \'\'' );
				$data = $sql->fetchArray( $result );
				$register_data['rooms_hotel' . $i] = $data[0];
				mysql_free_result( $result );
			}

		case 'visa':
			$result = $sql->selectData( 'registration', NULL, '`visa_assistance` = \'1\'' , NULL, array( 'count' => 1 ) );
			$data = $sql->fetchArray( $result );
			$register_data['total_assist'] = $data[0];
			unset( $data );
			mysql_free_result( $result );

	}
	/* page process */
	$register_data['per_page'] = intval( $MY_REQUEST['per_page'] );
	if ( $register_data['per_page'] <= 0 )
	{ $register_data['per_page'] = 20; }

	$register_data['page'] = intval( $MY_REQUEST['page'] );
	if ( $register_data['page'] <= 0 )
	{ $register_data['page'] = 1; }

	$select_start =  ( $register_data['page'] - 1 ) *  $register_data['per_page'];
	if ( $select_start + 1 > $register_data['total_people'] )
	{ $select_start = 0; $register_data['page'] = 1; }

	if ( $MY_REQUEST['keyword'] && is_string( $MY_REQUEST['keyword'] ) )
	{
		$keyword_temp = $sql->EscapeString( $MY_REQUEST['keyword'] );
		$keyword_temp = preg_replace( '/\_/', '\\\_', $keyword_temp );
		$keyword_temp = preg_replace( '/\%/', '\\\%', $keyword_temp );

		$query = '';

		switch ( $MY_REQUEST['filter'] )
		{
			case 'name':
			$query =  '`surname` LIKE \'%' . $keyword_temp . '%\' ' .
					  'OR `given_name` LIKE \'%' . $keyword_temp . '%\' ' .
					  'OR `wiki_id` LIKE \'%' . $keyword_temp . '%\' ' .
					  'OR `custom_showname` LIKE \'%' . $keyword_temp . '%\' ';
			break;

			case 'email':
			$query = '`email` LIKE \'%' . $keyword_temp . '%\' ';
			break;

			case 'unique_code':
			$query = '`unique_code` LIKE \'%' . $keyword_temp . '%\' ';
			break;

			default:
		}
		if ( $MY_REQUEST['real'] )
			$query = $query . ' AND `status`=1';

		$result = $sql->selectData( 'registration', NULL, $query, array( 'signuptime' ), array( 'asc' => false ) );
		$data = $sql->fetchArray( $result );
		$register_data['total_keyword'] = mysql_num_rows( $result );
		mysql_free_result( $result );
		$result = $sql->selectData( 'registration', NULL, $query, array( 'signuptime' ), array( 'asc' => false, 'start' => $select_start, 'total' => $register_data['per_page'] ) );
	}
	else
	{
		$MY_REQUEST['keyword'] = NULL;
		if ( $MY_REQUEST['real'] )
			$result = $sql->selectData( 'registration', NULL, '`status`=1', array( 'signuptime' ), array( 'asc' => false, 'start' => $select_start, 'total' => $register_data['per_page'] ) );
		else
			$result = $sql->selectData( 'registration', NULL, '', array( 'signuptime' ), array( 'asc' => false, 'start' => $select_start, 'total' => $register_data['per_page'] ) );
	}

	while ( $data = $sql->fetchAssoc( $result ) )
	{
		/* Write Data */
		$table_data[] = $data;
	}
	mysql_free_result( $result );

	include 'skin/html_header.php';
	include 'skin/admin_interface.php';
	include 'skin/html_footer.php';

}

function login()
{
	include 'skin/html_header.php';
	include 'skin/login_form.php';
	include 'skin/html_footer.php';
}

function process_login()
{
	global $_POST, $sql, $error_message, $register_data, $myself_url;

	$error_message = '';

	/* Check for vaild ID */
	if ( preg_match( '/[^0-9A-Z\_\-]/i', $_POST['user_id'] ) ) {
		$error_message = 1;
		$register_data = array( 'user_id' => $_POST['user_id'], 'password' => $_POST['password'] );
		include 'skin/html_header.php';
		include 'skin/login_form.php';
		include 'skin/html_footer.php';
		return;
	}

	/* Check for vaild login data */
	$result = $sql->selectData( 'admins', array(), '`user_id`=\'' . /* Filtered */ $_POST['user_id'] . '\' and `password`=\'' . /* no need to escape */md5( $_POST['password'] ) . '\'' );
	$login_data = $sql->fetchArray( $result );
	if ( !$result || !$login_data )
	{
		$error_message = 1;
		$register_data = array( 'user_id' => $_POST['user_id'], 'password' => $_POST['password'] );
		include 'skin/html_header.php';
		include 'skin/login_form.php';
		include 'skin/html_footer.php';
		return;
	}

	$_SESSION['logged_in'] = 1;
	$_SESSION['user_id'] = $_POST['user_id'];
	$_SESSION['user_password'] = md5( $_POST['password'] );

	header( 'Location:' . $myself_url . 'index.php?action=admin' );
}

function logout()
{
	/* login user only */
	if ( !$_SESSION['logged_in'] )
	{ return; }

	unset( $_SESSION['logged_in'] );
	unset( $_SESSION['user_id'] );
	unset( $_SESSION['user_password'] );

	global $myself_url;
	header( 'Location:' . $myself_url . 'index.php' );

}

function query()
{
	include 'skin/html_header.php';
	include 'skin/query.php';
	include 'skin/html_footer.php';
}

function query_result()
{
	global $MY_REQUEST, $sql, $error_message, $register_data;
	if ( !$MY_REQUEST['unique_code'] || empty( $MY_REQUEST['unique_code'] ) || preg_match( '/[^0-9A-Z]/i', $MY_REQUEST['unique_code'] ) )
	{
		/* Wrong? */
		$error_message = 1;
		$register_data = array( 'surname' => $MY_REQUEST['surname'], 'given_name' => $MY_REQUEST['given_name'], 'unique_code' => $MY_REQUEST['unique_code'] );
		include 'skin/html_header.php';
		include 'skin/query.php';
		include 'skin/html_footer.php';
		return;
	}

	$test_code_result = $sql->selectData( 'registration', array(), '`surname`=\'' . $sql->EscapeString( $MY_REQUEST['surname'] ) . '\' AND `given_name` = \'' . $sql->EscapeString( $MY_REQUEST['given_name'] ) . '\' AND `unique_code`=\'' . $MY_REQUEST['unique_code'] . '\'' );
	$test_code_array = $sql->fetchArray( $test_code_result );

	if ( !is_array( $test_code_array ) ) {
		/* Wrong? */
		$error_message = 2;
		$register_data = array( 'surname' => $MY_REQUEST['surname'], 'given_name' => $MY_REQUEST['given_name'], 'unique_code' => $MY_REQUEST['unique_code'] );
		include 'skin/html_header.php';
		include 'skin/query.php';
		include 'skin/html_footer.php';
		return;

	}
	$register_data = $test_code_array;
	include 'skin/html_header.php';
	include 'skin/query_result.php';
	include 'skin/html_footer.php';

}

function coupon()
{
	include 'skin/html_header.php';
	include 'skin/coupon.php';
	include 'skin/html_footer.php';
}

function coupon_activation()
{
	global $MY_REQUEST, $sql, $error_message, $register_data, $coupon_vip, $coupon_median,
	 $coupon_volunteer, $wikimania_cost_wikimedian, $accommodation_limit_people_Metropol,
	  $accommodation_limit_people_Delta, $accommodation_limit_people_Dorms, $accommodation_cost_metropol,
	  $accommodation_cost_delta, $accommodation_cost_dorms;

	if ( !$MY_REQUEST['unique_code'] || empty( $MY_REQUEST['unique_code'] ) || preg_match( '/[^0-9A-Z]/i', $MY_REQUEST['unique_code'] )
	|| !$MY_REQUEST['coupon_id'] || empty( $MY_REQUEST['coupon_id'] ) || preg_match( '/[^0-9A-Z]/i', $MY_REQUEST['coupon_id'] ) )
	{
		/* Wrong? */
		$error_message = 1;
		$register_data = array( 'surname' => $MY_REQUEST['surname'], 'given_name' => $MY_REQUEST['given_name'], 'unique_code' => $MY_REQUEST['unique_code'], 'coupon_id' => $MY_REQUEST['coupon_id'] );
		include 'skin/html_header.php';
		include 'skin/coupon.php';
		include 'skin/html_footer.php';
		return;
	}


	/* Find who is the coupon activator */
	$test_code_result = $sql->selectData( registration, array(), '`surname`=\'' . $sql->EscapeString( $MY_REQUEST['surname'] ) . '\' AND `given_name` = \'' . $sql->EscapeString( $MY_REQUEST['given_name'] ) . '\' AND `unique_code`=\'' . $MY_REQUEST['unique_code'] . '\'' );
	$test_code_array = $sql->fetchArray( $test_code_result );
	if ( !is_array( $test_code_array ) || $test_code_array['status'] ) {
		/* Wrong? */
		$error_message = 1;
		$register_data = array( 'surname' => $MY_REQUEST['surname'], 'given_name' => $MY_REQUEST['given_name'], 'unique_code' => $MY_REQUEST['unique_code'] );
		include 'skin/html_header.php';
		include 'skin/coupon.php';
		include 'skin/html_footer.php';
		return;

	}

	$register_data = $test_code_array;

	/* Activate coupon */
	if ( $MY_REQUEST['coupon_id'] == $coupon_vip )
	{
		$register_data['vip_status'] = 1;
		$register_data['cost_total'] = 0;
	}
	elseif ( $MY_REQUEST['coupon_id'] == $coupon_median )
	{
		$register_data['vip_status'] = 2;
		$register_data['cost_total'] = 0;
		$register_data['cost_total'] += $wikimania_cost_wikimedian[$register_data['join1'] + $register_data['join2'] + $register_data['join3']];

		$night_selected = $register_data['night1'] + $register_data['night2'] + $register_data['night3'] +  $register_data['night4'];

		if ( $register_data['hotelname'] == 'metropol' )
										   { $register_data['cost_total'] += $accommodation_cost_metropol * $night_selected; }
										  elseif ( $register_data['hotelname'] == 'delta' )
										   { $register_data['cost_total'] += $accommodation_cost_delta * $night_selected; }
										   elseif ( $register_data['hotelname'] == 'dorms' )
										   { $register_data['cost_total'] += $accommodation_cost_dorms * $night_selected; }
										   else
										   { $register_data['cost_total'] += 0; }

	}
	elseif ( $MY_REQUEST['coupon_id'] == $coupon_volunteer )
	{
		$register_data['vip_status'] = 3;
		$register_data['cost_total'] = 0;

		$night_selected = $register_data['night1'] + $register_data['night2'] + $register_data['night3'] +  $register_data['night4'];

		if ( $register_data['hotelname'] == 'metropol' )
										   { $register_data['cost_total'] += $accommodation_cost_metropol * $night_selected; }
										  elseif ( $register_data['hotelname'] == 'delta' )
										   { $register_data['cost_total'] += $accommodation_cost_delta * $night_selected; }
										   elseif ( $register_data['hotelname'] == 'dorms' )
										   { $register_data['cost_total'] += $accommodation_cost_dorms * $night_selected; }
										   else
										   { $register_data['cost_total'] += 0; }
	}
	else
	{
		/* Wrong? */
		$error_message = 1;
		$register_data = array( 'surname' => $MY_REQUEST['surname'], 'given_name' => $MY_REQUEST['given_name'], 'unique_code' => $MY_REQUEST['unique_code'] );
		include 'skin/html_header.php';
		include 'skin/coupon.php';
		include 'skin/html_footer.php';
		return;
	}

	/* Write data */
	if ( !$sql->updateData( 'registration', array( 'vip_status' => $register_data['vip_status'], 'cost_total' => $register_data['cost_total'] ),  '`surname`=\'' . $sql->EscapeString( $MY_REQUEST['surname'] ) . '\' AND `given_name` = \'' . $sql->EscapeString( $MY_REQUEST['given_name'] ) . '\' AND `unique_code`=\'' . $MY_REQUEST['unique_code'] . '\'' ) )
	{ echo 'SYSTEM ERROR'; return; }
	$error_message = 'Coupon activated.';
	include 'skin/html_header.php';
	include 'skin/query_result.php';
	include 'skin/html_footer.php';
}
