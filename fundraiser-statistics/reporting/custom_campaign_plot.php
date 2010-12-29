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
$args = ' ' . $cmpgn . ' ' . $start;
// $cmd = 'echo "baggin5" | sudo -S ./plot_build_latest.sh' . $args;
$cmd = './plot_build_latest.sh' . $args;

chdir('/home/rfaulk/fundraiser-statistics/bash/');

// Execute the shell command
//$output1 = shell_exec($cmd . ' 2>&1');
//$output2 = shell_exec('whoami');
$output = shell_exec('echo ' . $cmd. $args . ' >async_plotter.sh');

echo '<html>';
echo '<head>';
echo '<title>Wikimedia Fundraiser Reporting</title>';
echo '</head>';
echo '<body>';

// echo $cmd . '<br>';
// echo $output . '<br>';
// echo $output2 . '<br>';
echo 'Plots are generating, results will be up momentarily.<br>';
echo '<a href="http://fundraising.wikimedia.org/stats/reporting_latest.html">Back to latest Reports</a><br>';

echo '</body>';
echo '</html>';

?>




