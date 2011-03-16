<?php
/**
 * Rediffmail.com contact importing script
 */

$fullemail = $_POST['username'];

list( $username, $domain ) = explode( '@', $fullemail );

$refering_site = 'http://yahoo.com/'; // setting the site for refer

$browser_agent = 'Mozilla/5.0 (Windows; U; Windows NT 5.0; en-US; rv:1.4) Gecko/20030624 Netscape/7.1 (ax)'; // setting browser type

$path_to_cookie = realpath( 'rediffmailcookie.txt' );

$setcookie = fopen( $path_to_cookie, 'wb' ); //this opens the file and resets it to zero length
fclose( $setcookie );

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
$url = 'http://www.rediff.com';
$page_result = curl_get( $url, 1, 0 );

// Step 2
$loginurl = 'http://mail.rediff.com/cgi-bin/login.cgi';
$postdata = 'login=' . $username . '&passwd=' . $password . '&FormName=existing&x=14&y=9';

$ch = curl_init();
curl_setopt( $ch, CURLOPT_URL,$loginurl );
curl_setopt( $ch, CURLOPT_USERAGENT, $browser_agent );
curl_setopt( $ch, CURLOPT_POST, 1 );
curl_setopt( $ch, CURLOPT_HEADER, 1 );
curl_setopt( $ch, CURLOPT_POSTFIELDS,$postdata );
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1 );
curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, 0 );
curl_setopt( $ch, CURLOPT_REFERER, $url );
curl_setopt( $ch, CURLOPT_COOKIEFILE, $path_to_cookie );
curl_setopt( $ch, CURLOPT_COOKIEJAR, $path_to_cookie );
$result = curl_exec( $ch );
curl_close( $ch );
preg_match_all( "/session_id=(.*?)&farm/", $result, $matches );
$session_id = $matches[1][0];
preg_match_all( "/http:\/\/(.*?).com/", $result, $matches );
$contacts_url = $matches[1][0];

// Step 3
$url = 'http://' . $contacts_url . '.com/bn/address.cgi?login=' . $username . '&FormName=export&session_id=' . $session_id . '&FormName=group_book';

$ch = curl_init();
curl_setopt( $ch, CURLOPT_URL, $url );
curl_setopt( $ch, CURLOPT_USERAGENT, $browser_agent );
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, 0 );
curl_setopt( $ch, CURLOPT_COOKIEFILE, $path_to_cookie );
curl_setopt( $ch, CURLOPT_COOKIEJAR, $path_to_cookie );
$result = curl_exec( $ch );
curl_close( $ch );

// Writing the results to a csv file on the server
$myFile = $username;
$fh = fopen( $myFile, 'w' ) or die( "can't open file" );
fwrite( $fh, $result );
fclose( $fh );

// Checking if login was succesful -- by searching for the @ sign in the csv
preg_match_all( "/@/", $result, $array_at );

$at_sign = $array_at[0];

if( empty( $at_sign ) ) {
	echo '<p align="center"><font face="Verdana" size="2"><b>No Details Found:</b> Please make sure you have entered correct login details and try again.</font></p><p align="center">';
} else {
	// Start of HTML
	// [header section - html]

$header = <<<headertext

<html>
<head>
<title>CONTACTS</title>
<script type="text/javascript" src="../js/SelectAll.js"></script>
</head>
<body>

headertext;

	echo $header;

// [RESULTS -TITLE HTML]

$title = <<<titletext

<body>
<div align="center">
<center>
<table border="0" width="578">
<tr>
<td width="622"><img height="2" alt="" src="../images/spacer.gif" width="1" border="0" /></td>
</tr>
<tr>
<td align="middle" width="622">
<table cellspacing="0" cellpadding="0" width="640" border="0">
<tbody>
<tr>
<td width="5" height="5"><img height="5" alt="" src="../images/tls.gif" width="5" border="0" /></td>
<td background="../images/t.gif" colspan="2" width="716"><img height="1" alt="" src="../images/spacer.gif" width="1" border="0" /></td>
<td width="6" height="5"><img height="5" alt="" src="../images/trs.gif" width="5" border="0" /></td>
</tr>
<tr>
<td width="5" background="../images/l.gif" height="5"><img height="5" alt="" src="../images/spacer.gif" width="5" border="0" /></td>
<td width="6"><img height="1" alt="" src="../images/spacer.gif" width="6" border="0" /></td>
<td valign="top" width="704">
<table border="0" width="100%">
<tr>
<td width="100%" bgcolor="#D7D8DF">
<p align="center"><font face="Arial" size="3" color="#333333">My Contacts</font>
</td>
</tr>
</table>
<p align="center">

titletext;

	echo $title;

	// [RESULTS - START OF FORM]
	echo '<form id="form_id" name="myform" method="post" action="postage.php">';
	echo '<div align="center"><center><table border="0" cellpadding="3" cellspacing="6" width="100%">';

	// Opening the stored csv file and turning it into an array
	$fp = fopen( $username, 'r' );

	while( !feof( $fp ) ) {
		$data = fgetcsv( $fp, 4100, ',' ); // this uses the fgetcsv function to store the quote info in the array $data

		$dataname = $data[0];

		if( empty( $dataname ) ) {
			$dataname = $data[2];
		}

		if( empty( $dataname ) ) {
			$dataname = $data[3];
		}

		if( empty( $dataname ) ) {
			$dataname = 'None';
		}

		$email = $data[1]; // different csv to lycos and yahoo etc

		if( empty( $email ) ) {
			// Skip table
		} else {
			$email = $data[1];

			if( $dataname != 'First Name' ) {
				echo '<tr>
				<td width="22" bgcolor="#F5F5F5"><input type="checkbox" name="list[]" value="' . $email . '" checked="checked" /></td>
				<td width="269" bgcolor="#F5F5F5"><p align="center"><font face="Verdana" size="2">' . $dataname . '</font></td>
				<td width="296" bgcolor="#F5F5F5"><p align="center"><font face="Verdana" size="2">' . $email . '</font></td>
				<input type="hidden" name="sendersemail" size="20" value="' . $fullemail . '" />
				</tr>';
			}
		}
	}
	echo '</table></center></div>';

$footer = <<<footertext

<table border="0" width="100%">
<tr>
<td width="100%">
<p align="center"><input type="submit" value="Send Email To Contacts" name="B1" style="background-color: #808080; color: #FFFFFF; font-family: Arial; font-size: 10pt; font-weight: bold; border: 1 solid #333333"></p>
</form>
</td>
</tr>
</table>
<img height="1" alt="" src="../images/spacer.gif" width="1" border="0" /></td>
<td width="6" background="../images/r.gif" height="5"><img height="1" alt="" src="../images/spacer.gif" width="1" border="0" /></td>
</tr>
<tr>
<td width="5" height="5"><img height="5" alt="" src="../images/bls.gif" width="5" border="0" /></td>
<td background="../images/b.gif" colspan="2" width="716"><img height=1 alt="" src="../images/spacer.gif" width="1" border="0" /></td>
<td width="6" height="5"><img height="5" alt="" src="../images/brs.gif" width="5" border="0" />
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</table>
</center></div>
</body></html>

footertext;

	echo $footer;
}
	unlink( $username ); // deleting csv file