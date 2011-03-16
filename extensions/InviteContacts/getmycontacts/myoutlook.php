<?php
/**
 * CSV - Outlook contact importing script
 */

// Start of file upload and security check

$limit_size = 2000000; // you can change this to a higher file size limit (this is in bytes = 2MB apprx)

$random = rand( 150, 15000 ); // create random number
$uniquename = $random . $HTTP_POST_FILES['ufile']['name']; //add random number to file name to create unique file
$path = 'upload/' . $uniquename;
echo 'name:' . $HTTP_POST_FILES['ufile']['name'];
if( $ufile != null ) {
	// Store upload file size in $file_size
	$file_size = $HTTP_POST_FILES['ufile']['size'];

	if( $file_size >= $limit_size ) {
		echo '<p align="center"><font face="Verdana" size="2"><b>Error!:</b> Your file exceeds the allowed size limit.</font></p><p align="center">';
		exit;
	} else {
		$filetype = $HTTP_POST_FILES['ufile']['type'];
		echo 'type:' . $filetype;
		if(
			$filetype == 'application/vnd.ms-excel' ||
			$filetype == 'application/x-csv' ||
			$filetype == 'text/csv'
		) {
			// Copy file to where you want to store file
			if( copy( $HTTP_POST_FILES['ufile']['tmp_name'], $path ) ) {
			} else {
				echo 'Copy Error';
				exit;
			}
		} else {
			echo '<p align="center"><font face="Verdana" size="2"><b>Error!:</b> You may only upload csv files.</font></p><p align="center">';
			exit;
		}
	}
}
// End of file upload

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
<td width="6" height="5"><img height=5 alt="" src="../images/trs.gif" width=5 border=0></TD>
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
	echo '<form id="form_id" name="myform" method="post" action="">';
	echo '<div align="center"><center><table border="0" cellpadding="3" cellspacing="6" width="100%">';

	// Opening the stored csv file and turning it into an array
	$fp = fopen( $path, 'r' );

	while( !feof( $fp ) ) {
		$data = fgetcsv( $fp, 4100, ',' ); // this uses the fgetcsv function to store the quote info in the array $data

		$dataname = $data[1];

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
			$email = $data[57];

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
<td background="../images/b.gif" colspan="2" width="716"><img height="1" alt="" src="../images/spacer.gif" width="1" border="0" /></td>
<td width="6" height="5"><img height="5" alt="" src="../images/brs.gif" width="5" border="0"></td>
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

	unlink( $path ); // deleting csv file