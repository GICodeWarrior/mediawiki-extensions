<?

/*
	Ryan Faulkner
	Wikimedia Foundation
	2010
*/	


// Authenticate form
$pwd_key=$_POST["pwd"];

if ($pwd_key != "angelface") {
	$message  = "Invalid Key.\n";
	die($message);
}

// CONNECT TO FAULKNER STORAGE3
$link = mysql_connect('storage3.pmtpa.wmnet', 'rfaulk');

if (!$link) {
	die('Could not connect: ' . mysql_error());
}

$db_selected = mysql_select_db('faulkner', $link);
if (!$db_selected) {
	die ('Can\'t use faulkner : ' . mysql_error());
}

$query = file_get_contents ($sql_file);

// get the campaign and the start time
$start=$_POST["start_time"];
$cmpgn=$_POST["utm_campaign"];

// generate plots
$home_path = './plot_build_latest.sh';
$cmd_arr = array();
$args = ' ' . $cmpgn . ' ' . $start;
$cmd = 'sh plot_build_latest.sh' . $args;


chdir('/home/rfaulk/fundraiser-statistics/bash/');
// $output= shell_exec($cmd);

// Execute the shell command
$output = shell_exec($cmd);

echo '<html>';
echo '<head>';
echo '<title>Wikimedia Fundraiser Reporting</title>';
echo '</head>';
echo '<body>';

echo $cmd . '<br>';
echo $output . '<br>';
echo 'Plots are generating, results will be up momentarily.<br>';
echo '<a href="http://fundraising.wikimedia.org/stats/reporting_latest.html">Back to latest Reports</a><br>';

echo '</body>';
echo '</html>';

?>




