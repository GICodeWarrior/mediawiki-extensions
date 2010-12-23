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
} elseif ($sql_file == "landing_compare.sql") {
	$query = sprintf($query, $start, $end, $cmpgn, $start, $end, $cmpgn);
}

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


// Compute the mean and standard deviation of the results
$m1= 0;
$m2= 0;
$n1 = 0;
$n2 = 0;

// These will store the table values
$time = array();
$metric1 = array();
$metric2 = array();

// Means
while ($row = mysql_fetch_assoc($result1)) {

    $time[$n1] = $row["day_hr"];
    $metric1[$n1] = $row[$metric];
    
    $x1 = $row[$metric];
    $group1[$n] = $x1;
    $m1 = $x1 + $m1;
    $n1=$n1+1;
}

while ($row = mysql_fetch_assoc($result2)) {
    $metric2[$n2] = $row[$metric];
    
    $x2 = $row[$metric];
    $group2[$n] = $x2;
    $m2 = $x2 + $m2;
    $n2=$n2+1;
}

$n = $n1;
$m1= $m1/$n;
$m2= $m2/$n;
$v1 = 0;
$v2 = 0;

// Variance
for ( $counter = 0; $counter < $n; $counter += 1)
{
    $diff1 = $group1[$counter] - $m1;
    $diff2 = $group2[$counter] - $m2;
    $v1 = $v1 + pow($diff1,2);
    $v2 = $v2 + pow($diff2,2);
}

$v1=$v1/$n;
$v2=$v2/$n;

// Student's t test
$t = ($m1 - $m2) / pow(($v1 + $v2) / $n, 0.5);
$df = pow(($v1+$v2)/$n,2) / ((pow($v1/$n,2)/($n-1)) + (pow($v2/$n,2)/($n-1)));

// Wald test test
$W = abs($m1 - $m2) / pow(($v1 + $v2) ,0.5);

echo '<h2> Test Analysis: </h2></br>';

echo 'Average ' . $metric . ' for ' . $item1 .' = '.$m1.'<br>';
echo 'Average ' . $metric . ' for ' . $item2 .' = '.$m2.'<br><br>';
echo 'The Wald test value is: ' . $W . '<br>';
// echo 'sample variance of group 1 '.$v1.'<br>';
// echo 'sample variance of group 2 '.$v2.'<br>';

if ($W >= 0.1) {
echo '<br>8% confident about the winner.<br>';
} elseif ($W >= 0.2) {
echo '<br>16% confident about the winner.<br>';
} elseif ($W >= 0.3) {
echo '<br>24% confident about the winner.<br>';
} elseif ($W >= 0.4) {
echo '<br>31% confident about the winner.<br>';
} elseif ($W >= 0.5) {
echo '<br>38% confident about the winner.<br>';
} elseif ($W >= 0.6) {
echo '<br>45% confident about the winner.<br>';
} elseif ($W >= 0.7) {
echo '<br>52% confident about the winner.<br>';
} elseif ($W >= 0.8) {
echo '<br>63% confident about the winner.<br>';
} elseif ($W >= 0.9) {
echo '<br>68% confident about the winner.<br>';
} elseif ($W >= 1.0) {
echo '<br>73% confident about the winner.<br>';
} elseif ($W >= 1.3) {
echo '<br>81% confident about the winner.<br>';
} elseif ($W >= 1.6) {
echo '<br>89% confident about the winner.<br>';
} elseif ($W >= 1.9) {
echo '<br>95% confident about the winner.<br>';
} else {
echo '<br>There is no clear winner.<br>';
}

// Build Table of data

echo "</br></br><table width='50%'><tr>";
//loop thru the field names to print the correct headers
echo "<th>". "Time Stamp" . "</th>";
echo "<th>". mysql_field_name($result1, $metric) . "_1" . "</th>";
echo "<th>". mysql_field_name($result1, $metric) . "_2" . "</th>";
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
$retval = system($home_path . 'python run_confidfence_plots.py '. $script_args , $retval);

?>