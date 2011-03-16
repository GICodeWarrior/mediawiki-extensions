<?php
/**
 * Hotmail contact importing script
 */

$username = $_POST['username'];

$password = $_POST['password'];

$refering_site = 'http://mail.hotmail.com/'; //setting the site for refer

$browser_agent = 'Mozilla/5.0 (Windows; U; Windows NT 5.0; en-US; rv:1.4) Gecko/20030624 Netscape/7.1 (ax)'; //setting browser type

$path_to_cookie = realpath( 'hotmailcookie.txt' );

$setcookie = fopen( $path_to_cookie, 'wb' ); // this opens the file and resets it to zero length
fclose( $setcookie );

$form_language = $_REQUEST['language'];

include_once( dirname( __FILE__ ) . '/getmycontactsbase.php' );

function curl_get( $url, $follow, $debug ) {
	global $path_to_cookie, $browser_agent;

	$ch = curl_init();
	curl_setopt( $ch, CURLOPT_URL, $url );
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
	curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
	curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, 0 );
	curl_setopt( $ch, CURLOPT_COOKIEJAR, $path_to_cookie );
	curl_setopt( $ch, CURLOPT_COOKIEFILE, $path_to_cookie );
	curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, $follow );
	curl_setopt( $ch, CURLOPT_USERAGENT, $browser_agent );
	$result = curl_exec( $ch );
	curl_close( $ch );

	if( $debug == 1 ) {
		echo '<textarea rows="30" cols="120">' . $result . '</textarea>';
	}

	if( $debug == 2 ) {
		echo '<textarea rows="30" cols="120">' . $result . '</textarea>';
		echo $result;
	}

	return $result;
}

function curl_post( $url, $postal_data, $follow, $debug ) {
	global $path_to_cookie, $browser_agent;

	$ch = curl_init();
	curl_setopt( $ch, CURLOPT_URL, $url );
	curl_setopt( $ch, CURLOPT_POST, 1 );
	curl_setopt( $ch, CURLOPT_POSTFIELDS, $postal_data );
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
	curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
	curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, 0 );
	curl_setopt( $ch, CURLOPT_COOKIEJAR, $path_to_cookie );
	curl_setopt( $ch, CURLOPT_COOKIEFILE, $path_to_cookie );
	curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, $follow );
	curl_setopt( $ch, CURLOPT_USERAGENT, $browser_agent );
	$result = curl_exec( $ch );
	curl_close( $ch );

	if( $debug == 1 ) {
		echo '<textarea rows="30" cols="120">' . $result . '</textarea>';
	}

	if( $debug == 2 ) {
		echo '<textarea rows="30" cols="120">' . $result . '</textarea>';
		echo $result;
	}

	return $result;
}

// Step 1
$url = 'http://login.live.com/login.srf?id=2&vv=400&lc=1033';
$page_result = curl_get( $url, 1, 0 );
preg_match_all( "/name=\"PPFT\" id=\"i0327\" value=\"(.*?)\"/", $page_result, $matches1 );
$found1 = $matches1[1][0];
preg_match_all( "/name=\"PPSX\" value=\"(.*?)\"/", $page_result, $matches2 );
$found2 = $matches2[1][0];
preg_match_all( "/name=\"PwdPad\" id=\"i0340\" value=\"(.*?)\"/", $page_result, $matches3 );
$found3 = $matches3[1][0];
preg_match_all( "/method=\"POST\" target=\"_top\" action=\"(.*?)\"/", $page_result, $matches4 );
$found4 = $matches4[1][0];
preg_match_all( "/name=\"LoginOptions\" id=\"i0136\" value=\"(.*?)\"/", $page_result, $matches5 );
$found5 = $matches5[1][0];

// Step 2
$postal_data = 'PPSX=' . $found2 . '&' . 'PwdPad=' . $found3 . '&' . 'login=' . $username . '&' . 'passwd=' . $password . '&' . 'LoginOptions=' . $found5 . '&' . 'PPFT=' . $found1;
$url = $found4;
$result = curl_post( $url, $postal_data, 1, 0 );

preg_match_all( "/replace\(\"(.*?)\"/", $result, $matches );
$matches = $matches[1][0];

// Step 3
$url = $matches;
$result = curl_get( $url, 1, 0 );

// Step 4 -- open adress picker
$url = 'http://by101fd.bay101.hotmail.msn.com/cgi-bin/AddressPicker?Context=InsertAddress&_HMaction=Edit&qF=to';
$result = curl_get( $url, 1, 0 );
preg_match_all(
	'%<option[^>]*value="([^"]*)"[^>]*>([^<]*)&lt;[^>]*&gt;</option>%',
	$result,
	$matches,
	PREG_SET_ORDER
);
$arraycount = count( $matches );
$checkarray = $matches[1][1];

// If no results, try livemail
if( empty( $checkarray ) ) {
	require 'mylive.php';  // This gets mylive.php file and runs it instead.
} else {

// Start of HTML
// [header section - html]

$header = <<<headertext

<html>
<head>
<title>{$messages['my_contacts']}</title>
<script type="text/javascript" src="../js/SelectAll.js"></script>
</head>
<body>

headertext;

// [RESULTS - START OF FORM]
echo '<form id="form_id" name="myform" method="post" action="">';

	echo '<h1>Your contacts</h1>
		<p class="contacts-message">
			<span class="profile-on">' . $messages['sharefriends'] . '.</span>
		</p>
		<p class="contacts-message">
			<input type="submit" class="invite-form-button" value="' . $messages['inviteyourfriends'] . '" name="B1" />
			<a href="javascript:toggleChecked()">' . $messages['uncheckall'] . '</a>
		</p>
			<div class="contacts-title-row">
				<p class="contacts-checkbox"></p>
				<p class="contacts-title">'
					. $messages['friendname'] .
				'</p>
				<p class="contacts-title">'
					. $messages['emailtitle'] .
				'</p>
				<div class="cleared"></div>
			</div>
			<div class="contacts">';

		$i = 0;
		while( isset( $matches[$i] ) ):
			//  [RESULTS - START OF CONTACTS LIST]

			echo '<div class="contacts-row">
					<p class="contacts-checkbox">
						<input type="checkbox" name="list[]" value="' . $matches[$i][1] . '" checked="checked" />
					</p>
					<p class="contacts-cell">'
						. $matches[$i][2] .
					'</p>
					<p class="contacts-cell">'
						. $matches[$i][1] .
					'</p>
					<input type="hidden" name="sendersemail" size="20" value="' . $username . '" />
					<div class="cleared"></div>
				</div>';

				$i++;
		endwhile;

//  [RESULTS - START OF FOOTER]

echo '</div>';

$footer = <<<footertext

<table border="0" width="100%">
<tr>
<td width="100%">
<p align="center"><font face="Arial" size="2"><br /></font><br />
<p></p>
<p align="center"><input type="submit" value="{$messages['inviteyourfriends']}" name="B1" style="background-color: #808080; color: #FFFFFF; font-family: Arial; font-size: 10pt; font-weight: bold; border: 1 solid #333333"></p>
</form>
</td>
</tr>
</table>
<img height="1" alt="" src="../images/spacer.gif" width="1" border="0" />
</td>
<td width="6" background="../images/r.gif" height="5"><img height="1" alt="" src="../images/spacer.gif" width="1" border="0" /></td>
</tr>
<tr>
<td width="5" height="5"><img height="5" alt="" src="../images/bls.gif" width="5" border="0" /></td>
<td background="../images/b.gif" colspan="2" width="716"><img height="1" alt="" src="../images/spacer.gif" width="1" border="0" /></td>
<td width="6" height="5"><img height=5 alt="" src="../images/brs.gif" width="5" border="0" /></td>
</tr>
</tbody></table>
</td>
</tr>
</table></center></div>

footertext;

echo $footer;
}