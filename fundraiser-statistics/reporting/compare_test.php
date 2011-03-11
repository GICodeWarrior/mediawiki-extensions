<?

/*
	Ryan Faulkner
	Wikimedia Foundation
	2010
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

$sql_file=$_POST["sqlFile"];
$cmpgn1=$_POST["utm_campaign_1"];
$cmpgn2=$_POST["utm_campaign_2"];
$item1=$_POST["item_1"];
$item2=$_POST["item_2"];
$start=$_POST["start_time"];
$end=$_POST["end_time"];
$metric=$_POST["metric"];

$query = file_get_contents ($sql_file);

// format Query
$query_parts = explode('\\',$query);
$query='';
for ( $counter = 0; $counter < count($query_parts); $counter += 1)
{
	$query=$query.$query_parts[$counter];
}

//  Format the query based on the type
if ($sql_file == "banner_test_by_banner.sql") {
	$query1 = sprintf($query, '%','%','%','%','10','10', $start, $end, $item1, '%','%','%','%','10','10', $start, $end, $cmpgn1, $item1, '%','%','%','%','10','10', $start, $end, $cmpgn1, $item1);
	$query2 = sprintf($query, '%','%','%','%','10','10', $start, $end, $item2, '%','%','%','%','10','10', $start, $end, $cmpgn2, $item2, '%','%','%','%','10','10', $start, $end, $cmpgn2, $item2);
} elseif ($sql_file == "banner_test_by_lp.sql") {
	$query1 = sprintf($query, '%','%','%','%','10','10', $start, $end, $cmpgn1, $item1, '%','%','%','%','10','10', $start, $end, $cmpgn1, $item1);
	$query2 = sprintf($query, '%','%','%','%','10','10', $start, $end, $cmpgn2, $item2, '%','%','%','%','10','10', $start, $end, $cmpgn2, $item2);
}

// echo '<br><br>' . $query1 . '<br><br>';
// echo '<br><br>' . $query2 . '<br><br>';

// Execute Queries
$result1 = mysql_query($query1);
$result2 = mysql_query($query2);

// Check result
// This shows the actual query sent to MySQL, and the error. Useful for debugging.
if (!$result1 || !$result2) {
	$message  = 'Invalid query: ' . mysql_error() . "\n";
	$message .= 'Whole query: ' . $query1;
	$message .= 'Whole query: ' . $query2;
	die($message);
}


/* Compute the mean and standard deviation of the results */
$n1 = 0;
$n2 = 0;
$m1= array();
$m2= array();
$interval = 6;

// These will store the table values
$time = array();
$metric1 = array();
$metric2 = array();
$num_samples = array();

// Compute the means of the first item
$counter = 0;
$index = 0;
while ($row = mysql_fetch_assoc($result1)) {

	$time[$n1] = $row["day_hr"];
	$x1 = $row[$metric];
	$metric1[$n1] = $x1;

	$m1[$index] = $x1 + $m1[$index];
	$n1=$n1+1;

	if ($counter < $interval) {
		$counter = $counter + 1;
	} else {
		$index = $index + 1;
		$counter = 0; 
	}
}

// Compute the means of the second item
$counter = 0;
$index = 0;
while ($row = mysql_fetch_assoc($result2)) {
	$x2 = $row[$metric];
	$metric2[$n2] = $x2;

	$m2[$index] = $x2 + $m2[$index];
	$n2=$n2+1;

	if ($counter < $interval) {
		$counter += 1;
	} else {
		$index = $index + 1;
		$counter = 0; 
	}
}

$n = $n1;

// Normalize means
for ( $i = 0; $i < count($m1); $i += 1) {
	$m1[$i] = $m1[$i] / $interval;
	$m2[$i] = $m2[$i] / $interval;
}

$v1 = array();
$v2 = array();

// Compute variance for both groups
for ( $counter = 0; $counter < $n; $counter += 1)
{  
	$index = floor($counter / $interval);
	
	$diff1 = $metric1[$counter] - $m1[$index];
	$diff2 = $metric2[$counter] - $m2[$index];
	$v1[$index] = $v1[$index] + pow($diff1,2);
	$v2[$index] = $v2[$index] + pow($diff2,2);
	
}

// Normalize variances
for ( $i = 0; $i < count($v1); $i += 1) {
	$v1[$i] = $v1[$i] / $interval;
	$v2[$i] = $v2[$i] / $interval;
}


//  Compute W values for each test hour
$W = array();
for ( $i = 0; $i < count($v1); $i += 1)
{
	$W[$i] = abs($m1[$i] - $m2[$i]) / pow(($v1[$i] + $v2[$i]) ,0.5);
}


// Student's t test
// $t = ($m1 - $m2) / pow(($v1 + $v2) / $n, 0.5);
// $df = pow(($v1+$v2)/$n,2) / ((pow($v1/$n,2)/($n-1)) + (pow($v2/$n,2)/($n-1)));

// Wald test test
// $W = abs($m1 - $m2) / pow(($v1 + $v2) ,0.5);

echo '<h2> Test Analysis: </h2></br>';

// echo 'Average ' . $metric . ' for ' . $item1 .' = '.$m1.'<br>';
// echo 'Average ' . $metric . ' for ' . $item2 .' = '.$m2.'<br><br>';
// echo 'The Wald test value is: ' . $W . '<br>';
// echo 'sample variance of group 1 '.$v1.'<br>';
// echo 'sample variance of group 2 '.$v2.'<br>';

$P = 1;
for ( $i = 0; $i < count($m1); $i += 1) {
	
	echo 'The average of Group 1 for hour ' . ($i + 1). ': ' . $m1[$i] . '<br>';
	echo 'The average of Group 2 for hour ' . ($i + 1). ': ' . $m2[$i] . '<br>';
	echo 'The standard deviation of Group 1 for hour ' . ($i + 1). ': ' . pow($v1[$i], 0.5) . '<br>';
	echo 'The standard deviation of Group 2 for hour ' . ($i + 1). ': ' . pow($v2[$i], 0.5) . '<br>';

	
	if ($W[$i] >= 0.1) {
		echo '<br>8% confident about the winner.<br>';
		$P *= 0.08;
	} elseif ($W[$i] >= 0.2) {
		echo '<br>16% confident about the winner.<br>';
		$P *= 0.16;
	} elseif ($W[$i] >= 0.3) {
		echo '<br>24% confident about the winner.<br>';
		$P *= 0.24;
	} elseif ($W[$i] >= 0.4) {
		echo '<br>31% confident about the winner.<br>';
		$P *= 0.31;
	} elseif ($W[$i] >= 0.5) {
		echo '<br>38% confident about the winner.<br>';
		$P *= 0.38;
	} elseif ($W[$i] >= 0.6) {
		echo '<br>45% confident about the winner.<br>';
		$P *= 0.45;
	} elseif ($W[$i] >= 0.7) {
		echo '<br>52% confident about the winner.<br>';
		$P *= 0.52;
	} elseif ($W[$i] >= 0.8) {
		echo '<br>63% confident about the winner.<br>';
		$P *= 0.63;
	} elseif ($W[$i] >= 0.9) {
		echo '<br>68% confident about the winner.<br>';
		$P *= 0.68;
	} elseif ($W[$i] >= 1.0) {
		echo '<br>73% confident about the winner.<br>';
		$P *= 0.73;
	} elseif ($W[$i] >= 1.3) {
		echo '<br>81% confident about the winner.<br>';
		$P *= 0.81;
	} elseif ($W[$i] >= 1.6) {
		echo '<br>89% confident about the winner.<br>';
		$P *= 0.89;
	} elseif ($W[$i] >= 1.9) {
		echo '<br>95% confident about the winner.<br>';
		$P *= 0.95;
	} else {
		echo '<br>There is no clear winner.<br>';
		$P *= 0.08;
	}
	
	echo '<br>';
}

echo '<br>Overall there is ' . ($P * 100) . '% confidence on the winner.<br>';

// Build Table of data

echo "</br></br><table width='50%'><tr>";
//loop thru the field names to print the correct headers
echo "<th>". "Time Stamp" . "</th>";
echo "<th>". $metric . "_1" . "</th>";
echo "<th>". $metric . "_2" . "</th>";
// echo "<th>". mysql_field_name($result2, $metric) . "_2" . "</th>";
echo "</tr>"; 

for ( $counter = 0; $counter < $n; $counter += 1) {

	echo "<tr>";
	echo "<td align='center'>". $time[$counter] . "</td>";
	echo "<td align='center'>". $metric1[$counter] . "</td>";
	echo "<td align='center'>". $metric2[$counter] . "</td>";
	echo "</tr>";
}

echo "</table>"; 

// Execute a python script for plotting
$home_path = '/home/rfaulk/fundraiser-statistics/fundraiser-scripts/';

if ($sql_file === 'banner_test_by_banner.sql') {
	$type = 'report_confidence_banner';
}

// Get the metric index
$i = 0;
while ($i < mysql_num_fields($result1))
{
	if (mysql_field_name($result1, $i) === $metric) {
		$metric_index = $i;
	}
	$i++;
}

		
$script_args = $type . ' ' . $cmpgn1 . ' ' . $cmpgn2 . ' ' . $item1 . ' ' . $item2 . ' ' . $start . ' ' . $end . ' ' . $metric_index;
$cmd_output = ' 1>./plotrun_out.txt';
// echo 'python ' . $home_path . 'run_confidence_plot.py '. $script_args . $cmd_output;
$retval1 = system('python ' . $home_path . 'run_confidence_plot.py '. $script_args . $cmd_output, $retval2);

// echo '<br>' .$retval1. '<br>';
// echo $retval2;

?>