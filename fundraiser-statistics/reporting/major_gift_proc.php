<?

/*
	Ryan Faulkner
	Wikimedia Foundation
	2011
*/	

// Authenticate form
$pwd_key=$_POST["pwd"];

// extract the private the passkey
$key_string = file_get_contents ("keys.txt");
$key_string = trim($key_string);

if ($pwd_key != $key_string) {
	$message  = "Invalid Key.\n";
	die($message);
}

// we connect to example.com and port 3307
$link = mysql_connect('storage3.pmtpa.wmnet', 'rfaulk');

if (!$link) {
    die('Could not connect: ' . mysql_error());
}

// echo 'Connected successfully<br>';

$db_selected = mysql_select_db('faulkner', $link);
if (!$db_selected) {
    die ('Can\'t use faulkner : ' . mysql_error());
}

$html_file=$_POST["query_type"];
$html_text = file_get_contents ($html_file);
echo $html_text;


?>