<?php
/**
 * Indiatimes contact importing script
 */

$fullemail = $_POST['username'];

list( $username, $domain ) = explode( '@', $fullemail );

$password = $_POST['password'];

$refering_site = 'http://mail.lycos.com/lycos/Index.lycos'; // setting the site for refer

$browser_agent = 'Mozilla/5.0 (Windows; U; Windows NT 5.0; en-US; rv:1.4) Gecko/20030624 Netscape/7.1 (ax)'; // setting browser type

$path_to_cookie = realpath( 'indiatimescookie.txt' );

$setcookie = fopen( $path_to_cookie, 'wb' ); //this opens the file and resets it to zero length
fclose( $setcookie );

// Logging onto Lycos, step 1

$login_page = 'http://infinite.indiatimes.com/';

	$ch = curl_init();
	curl_setopt( $ch, CURLOPT_URL, $login_page );
	curl_setopt( $ch, CURLOPT_USERAGENT, $browser_agent );
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
	curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 0 );
	curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
	curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, 0 );
	curl_setopt( $ch, CURLOPT_REFERER, $login_page );
	curl_setopt( $ch, CURLOPT_COOKIEFILE, $path_to_cookie );
	curl_setopt( $ch, CURLOPT_COOKIEJAR, $path_to_cookie );
	$result = curl_exec( $ch );
	curl_close( $ch );

preg_match_all( '%action="http://(.*?)"%', $result, $matches );

$posturl = $matches[1][0];

// Posting data to Lycos

	$url = 'http://' . $posturl;
	$postdata1 = 'login=' . $username . '&passwd=' . $password . '&Sign+in.x=31&Sign+in.y=17';

	$ch = curl_init();
	curl_setopt( $ch, CURLOPT_URL, $url );
	curl_setopt( $ch, CURLOPT_USERAGENT, $browser_agent );
	curl_setopt( $ch, CURLOPT_POST, 1 );
	curl_setopt( $ch, CURLOPT_POSTFIELDS, $postdata1 );
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
	curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1 );
	curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
	curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, 0 );
	curl_setopt( $ch, CURLOPT_REFERER, $login_page );
	curl_setopt( $ch, CURLOPT_COOKIEFILE, $path_to_cookie );
	curl_setopt( $ch, CURLOPT_COOKIEJAR, $path_to_cookie );
	$result = curl_exec( $ch );
	curl_close( $ch );

preg_match_all( '/login=(.*?)&command=compose/', $result, $matches );

$hidden = $matches[1][0];

// Opening Download csv page
$url = 'http://infinite.indiatimes.com/cgi-bin/infinitemail.cgi?login=' . $hidden . '&command=addimpexp';


	$ch = curl_init();
	curl_setopt( $ch, CURLOPT_URL, $url );
	curl_setopt( $ch, CURLOPT_USERAGENT, $browser_agent );
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
	curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1 );
	curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
	curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, 0 );
	curl_setopt( $ch, CURLOPT_REFERER, $url );
	curl_setopt( $ch, CURLOPT_COOKIEFILE, $path_to_cookie );
	curl_setopt( $ch, CURLOPT_COOKIEJAR, $path_to_cookie );
	$result = curl_exec( $ch );
	curl_close( $ch );

// Downloading csv file
	$url = 'http://infinite.indiatimes.com/cgi-bin/infinitemail.cgi/addressbook.csv?login=' . $hidden . '&command=addimpexp&button=Export+to+CSV+Format';

	$ch = curl_init();
	curl_setopt( $ch, CURLOPT_URL, $url );
	curl_setopt( $ch, CURLOPT_USERAGENT, $browser_agent );
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
	curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1 );
	curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
	curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, 0 );
	curl_setopt( $ch, CURLOPT_REFERER, $url );
	curl_setopt( $ch, CURLOPT_COOKIEFILE, $path_to_cookie );
	curl_setopt( $ch, CURLOPT_COOKIEJAR, $path_to_cookie );
	$result3 = curl_exec( $ch );
	curl_close( $ch );

// Writing the results to a csv file on the server
	$myFile = $username;
	$fh = fopen( $myFile, 'w' ) or die( "can't open file" );
	fwrite( $fh, $result3 );
	fclose( $fh );

// Checking if login was successful -- by searching the @ sign in the csv file
preg_match_all( "/@/", $result3, $array_at );

$at_sign = $array_at[0];

if( empty( $at_sign ) ) {
	echo '<p align="center"><font face="Verdana" size="2"><b>No Details Found:</b> Please make sure you have entered correct login details and try again.</font></p><p align="center">';
} else {
	// If login was successful, start displaying HTML
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
<td width="622"><img height=2 alt="" src="../images/spacer.gif" width="1" border="0" /></td>
</tr>
<tr>
<td align="middle" width="622">
<table cellspacing="0" cellpadding="0" width="640" border="0">
<tbody>
<tr>
<td width="5" height="5"><img height="5" alt="" src="../images/tls.gif" width="5" border="0" /></td>
<td background="../images/t.gif" colspan="2" width="716"><img height="1" alt="" src="../images/spacer.gif" width="1" border="0" /></td>
<td width="6" height="5"><img height="5" alt="" src="../images/trs.gif" width="5" border="0" /></td></tr>
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
			$dataname = $data[1];
		}

		if( empty( $dataname ) ) {
			$dataname = $data[3];
		}

		if( empty( $dataname ) ) {
			$dataname = $data[4];
		}

		if( empty( $dataname ) ) {
			$dataname = 'None';
		}

		$email = $data[5];

		if( empty( $email ) ) {
			// Skip table
		} else {
			$email = $data[5];

			if( $dataname != 'First Name' ) {
				echo '<tr>
					<td width="22" bgcolor="#F5F5F5"><input type="checkbox" name="list[]" value="' . $email . '" checked="checked" /></td>
					<td width="269" bgcolor="#F5F5F5"><p align="center"><font face="Verdana" size="2">' . $dataname . '</font></td>
					<td width="296" bgcolor="#F5F5F5"><p align="center"><font face="Verdana" size="2">' . $email . '</font></td>
					<input type="hidden" name="sendersemail" size="20" value="' . $username . '" />
				</tr>';
			}
		}
	}
	echo '</table></center></div>';

$footer = <<<footertext

<table border="0" width="100%">
<tr>
<td width="100%">
<p align="center">
<input type="submit" value="Send Email To Contacts" name="B1" style="background-color: #808080; color: #FFFFFF; font-family: Arial; font-size: 10pt; font-weight: bold; border: 1 solid #333333"></p>
</form>
</td>
</tr>
</table>
<img height="1" alt="" src="../images/spacer.gif" width="1" border="0" /></td>
<td width="6" background="../images/r.gif" height="5"><img height=1 alt="" src="../images/spacer.gif" width="1" border="0" /></td>
</tr>
<tr>
<td width="5" height="5"><img height="5" alt="" src="../images/bls.gif" width=5 border="0" /></td>
<td background="../images/b.gif" colspan=2 width="716"><img height="1" alt="" src="../images/spacer.gif" width="1" border="0"></td>
<td width="6" height="5"><img height=5 alt="" src="../images/brs.gif" width="5" border="0" /></td>
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