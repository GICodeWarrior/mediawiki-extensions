<?

/*
	Ryan Faulkner
	Wikimedia Foundation
	2011
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
$first_name=$_POST["first_name"];
$last_name=$_POST["last_name"];

$query = file_get_contents ($sql_file);

$query_parts = explode('\\',$query);
$query='';
for ( $counter = 0; $counter < count($query_parts); $counter += 1)
{
    $query=$query.$query_parts[$counter];
}


// FORMAT THE SQL QUERY BASED ON THE FILE WHICH INDICATES THE REQUEST
$query = sprintf($query, "%", "%", "%", "%", $first_name, $last_name);

// Perform Query
$result = mysql_query($query);

// Check result
// This shows the actual query sent to MySQL, and the error. Useful for debugging.
if (!$result) {
	$message  = 'Invalid query: ' . mysql_error() . "\n";
	$message .= 'Whole query: ' . $query;
	die($message);
}

// Title line - donor's name
echo "<b>".$first_name." ".$last_name."'s donation history ...</b><br><br>";

// Build Table

//loop thru the field names to print the correct headers
echo "<table width='100%'><tr>";
if (mysql_num_rows($result)>0)
{
	//loop thru the field names to print the correct headers
	$i = 0;
	while ($i < mysql_num_fields($result))
	{
		echo "<th>". mysql_field_name($result, $i) . "</th>";
		$i++;
	}
	echo "</tr>"; 


	while ($row = mysql_fetch_assoc($result)) {
		echo "<tr>";
		foreach ($row as $data)
		{
			echo "<td align='center'>". $data . "</td>";
		} 
	}
	
	echo "</table>"; 
}

?>