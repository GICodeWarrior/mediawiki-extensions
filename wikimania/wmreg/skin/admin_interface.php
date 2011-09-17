<?php
/* Prevent hacking */
if ( !defined( 'TC_STARTED' ) )
{ die( 'nothing here!' ); }

include_once 'includes/language_en.php';

global $myself_url, $register_data, $table_data, $lang_countries, $error_message, $lang_register_form;

function get_percentage( $number ) {
	global $register_data;
	if ( $register_data['total_people'] == 0 )  return '0.0%';
	else return number_format( $number / $register_data['total_people'] * 100, 1 ) . '%';
}
/* Fix XSS */
$register_data = array_map( 'htmlspecialchars', $register_data );

$cloth_sizes = array( NULL, 'XXS', 'XS', 'S', 'M', 'L', 'XL', 'XXL', 'XXXL' );

$parameters = $myself_url . 'index.php?action=admin';
$parameters2 = $myself_url . 'index.php?action=admin';

if ( $MY_REQUEST['page'] )
{ $parameters .= '&page=' . urlencode( $MY_REQUEST['page'] ); }

if ( $MY_REQUEST['keyword'] )
{
	$parameters .= '&keyword=' . urlencode( $MY_REQUEST['keyword'] ) . '&filter=' . urlencode( $MY_REQUEST['filter'] );
	$parameters2 .= '&keyword=' . urlencode( $MY_REQUEST['keyword'] ) . '&filter=' . urlencode( $MY_REQUEST['filter'] );
}
$parameters2 .= '&mode=' . urlencode( $MY_REQUEST['mode'] );

$parameters .= '&real=' . urlencode( $MY_REQUEST['real'] );
$parameters2 .= '&real=' . urlencode( $MY_REQUEST['real'] );
?>

<script type="text/javascript" src="jquery-1.4.3.min.js"></script>
<script type="text/javascript">
	<!--

	$(document).ready(
	function()
	{
		for (i = 1; i <= 3; i++)
		 {if (document.getElementById("item"+i+"_radio").checked == true) {radiocheck(i); } }

	$('#admin_form2').addClass('popup');
	$('#cancel_button').removeClass('hide_item');
	$('#fill_data_col').removeClass('hide_item');
	$('.fill_data_link').removeClass('hide_item');

	});

	function confirm_warning()
	{
		return confirm('Notice: If you confirm or reject the registration, it cannot be undone at this interface.\nAlso, the registration result will be sent to the registrant during the submission.\nAre you sure to submit?');
	}

	function warning2()
	{
		return confirm('This action cannot be undone!\n\nAre you sure to submit?');
	}
	function fill_data(surname, given_name, unique_code, join_date, nights, hotel, room_number, cost_paid, coupon)
	{
		$("#content_part, #admin_form3, #footer").fadeTo('slow', 0.5);
		$('#mask').show();
		$("#admin_form2").fadeIn('slow');

		for (i = 1; i <= 3; i++)
		 {if (document.getElementById("item"+i+"_radio").checked == true) {radiocheck(i); } }

		$("#surname").val(surname);
		$("#given_name").val(given_name);
		$("#u_code").val(unique_code);

		for (var i=1; i<=6; i++)
		{
			if (join_date.indexOf(i) != -1) $("#j"+i).attr("checked", "checked");
			else $("#j"+i).removeAttr("checked");
		}
		for (var i=1; i<=8; i++)
		{
			if (nights.indexOf(i) != -1) $("#n"+i).attr("checked", "checked");
			else $("#n"+i).removeAttr("checked");
		}

		$("#h"+hotel).attr("checked", "checked");
		$("#room_number").val(room_number);
		$("#vips"+coupon).attr("selected", "selected");
	}

	function radiocheck(num)
	{
		for (i = 1; i<= 3; i++)
		{
			if (i != num)
			$("#item"+i).removeClass();
			$("#item"+i+" > p").hide('fast');
		}
		$("#item"+num).addClass("checked_item");
		$("#item"+num+" > p").show();
	}

	function close_popup()
	{
		$('#mask').hide();
		$("#content_part, #admin_form3, #footer").fadeTo('slow', 1);
		$("#admin_form2").fadeOut('slow');
	}
	//-->
</script>
<div id="mask">&nbsp;</div>
<div id="content_part">
<h1>Wikimania 2011 administration interface</h1>

<p id="special_pages">Signed in as <strong> <?php echo $_SESSION['user_id']?></strong>
| <a href="<?php echo $myself_url . 'index.php?action=logout'?>"
	title="Exit the admin interface and log out">Logout</a></p>

<?php if ( !empty( $error_message ) )
{
	echo '<div id="correction">' . "\n" . $error_message . "\n" . '</div>' . "\n";
}
?>

<h3>List and statistics</h3>

<?php if ( $register_data['total_keyword'] ) { ?>
<p>Found <strong><?php echo $register_data['total_keyword']?></strong>
registrant(s). <a href="<?php echo $myself_url; ?>?action=admin"
	title="End search and display all of the data">Clear search result</a>
<?php
}
else { ?>
<p><strong><?php echo $register_data['total_people']; ?>
</strong>
registrants (<?php echo $register_data['total_people_confirmed']; ?> confirmed)
<?php } ?>

<form action="<?php echo $myself_url . 'index.php'; ?>" method="GET">
<div id="admin_navigation">

<p id="search_form">
<select name="filter">
	<option value="name"
	<?php if ( $MY_REQUEST['filter'] == 'name' ) echo 'selected="selected"'; ?>>Name,	Wiki username</option>
	<option value="email"
	<?php if ( $MY_REQUEST['filter'] == 'email' ) echo 'selected="selected"'; ?>>Mail</option>
	<option value="unique_code"
	<?php if ( $MY_REQUEST['filter'] == 'unique_code' ) echo 'selected="selected"'; ?>>Registration
	number</option>
</select>
<input type="text" name="keyword"
	value="<?php echo stripslashes( htmlspecialchars( $MY_REQUEST['keyword'] ) ); ?>" />
<input type="submit" value="Search" /> <input type="hidden"
	name="action" value="admin" /> <input type="hidden" name="mode"
	value="<?php echo htmlspecialchars( $MY_REQUEST['mode'] ); ?>" /></p>

<p><a href="<?php echo $parameters?>"
	title="Info like birthday, name, and ID code">General</a> | <a
	href="<?php echo $parameters?>&mode=topic"
	title="Join dates, dietary restriction and cloth size">Dates and food</a>
| <a href="<?php echo $parameters?>&mode=accommodation"
	title="Accommodation registration and prefered rooms">Accommodation</a>
| <a href="<?php echo $parameters?>&mode=visa" title="Visa assistance">Visa</a>
| <a href="<?php echo $parameters?>&mode=pay" title="Payment status">Payment</a></p>

</div>
<input type="checkbox" name="real" <?php if ( $MY_REQUEST['real'] ) echo 'checked="checked"'; ?>/> Approved only
</form>

<p><?php

switch( $MY_REQUEST['mode'] )
{
	case NULL:
	    echo 'From <strong>' . $register_data['total_countries'] . '</strong> countries / ' .
	    '<strong>' . $register_data['total_male'] . '</strong> male (' . get_percentage( $register_data['total_male'] ) . ') ' .
	    '<strong>' . $register_data['total_female'] . '</strong> female (' . get_percentage( $register_data['total_female'] ) . ') ' .
	    '<strong>' . $register_data['total_sex_other'] . '</strong> decline to state sex (' . get_percentage( $register_data['total_sex_other'] ) . ') ' .
	    '<strong>' . $register_data['total_wikimedians'] . '</strong> are Wikimedians (' . get_percentage( $register_data['total_wikimedians'] ) . ') ';
	    break;

	case 'topic':
	    for ( $i = 1; $i <= 6; $i++ )
		    echo 'Day ' . $i . ' total: <strong>' . $register_data['total_day' . $i] . '</strong> people (' . get_percentage( $register_data['total_day' . $i] ) . ') | ';
		echo '<br>';
	    for ( $i = 1; $i <= 6; $i++ )
		    echo $i . ' days: <strong>' . $register_data['total_' . $i . 'days'] . '</strong> people (' . get_percentage( $register_data['total_' . $i . 'days'] ) . ') | ';
	    break;

	case 'accommodation':
		for ( $i = 1; $i <= 9; $i++ )
		{
		    echo  $lang_register_form['hotel' . $i] . ': <strong>' . $register_data['total_hotel' . $i] . '</strong> people (' . get_percentage( $register_data['total_hotel' . $i] ) . ') ';
		    echo  'in <strong>' . $register_data['rooms_hotel' . $i] . '</strong> rooms | ';
		}
		echo '<br>';
		for ( $i = 0; $i <= 8; $i++ )
		    echo  $i . ' nights: <strong>' . $register_data['total_' . $i . 'nights'] . '</strong> people (' . get_percentage( $register_data['total_' . $i . 'nights'] ) . ') | ';
	    break;

	case 'visa':
	    echo '<strong>' . $register_data['total_assist'] . '</strong> people (' . get_percentage( $register_data['total_assist'] ) . ') needs visa assistance';
	    break;
}
?></p>


<form action="<?php echo $myself_url . 'index.php'; ?>" method="POST"
	onsubmit="return confirm_warning();">
<table id="admin_table">
	<tr>
		<th>Check</th>
		<th>No.</th>
		<th>Signup time</th>
		<th>Name</th>
		<th>Sex</th>
		<?php
		switch( $MY_REQUEST['mode'] ) {
		case NULL:
			echo '
			<th>E-mail</th>
			<th>Country</th>
		    <th>Native lang</th>
		    <th>Languages</th>
		    <th>Username</th>
		    <th>Badge</th>
			';
			break;
		case 'topic':
			echo '
			<th>2/8</th>
			<th>3/8</th>
			<th>4/8</th>
			<th>5/8</th>
			<th>6/8</th>
			<th>7/8</th>
			<th>Tour</th>
		    <th>Size</th>
		<th>Food</th>';
			break;
		case 'accommodation':
			echo '<th>1/8</th>
		    <th>2/8</th>
		    <th>3/8</th>
		    <th>4/8</th>
		    <th>5/8</th>
		    <th>6/8</th>
		    <th>7/8</th>
		    <th>8/8</th>
		<th>Hotel</th>
		    <th>Type</th>
		    <th>Partner</th>
		    <th>Room #</th>
		    <th>Special</th>';
		    break;
		case 'visa':
		    echo '<th>Assistance needed?</th>
		    <th>Nationality</th>
		    <th>Passport number</th>
		    <th>Valid until</th>
			<th>Issued in</th>
			<th>Birthday</th>
			<th>Born in</th>
			<th>Address</th>
		    <th>Detail</th>';
		    break;
		case 'pay':
		    echo '
		    <th>Attendance cost</th>
		    <th>Hotel cost</th>
		    <th>VAT</th>
		    <th>Total cost</th>
		    <th>Currency</th>
		    <th>PayPal OK</th>
		    <th>Received</th>
		    <th>Coupon</th>';
		    break;
		} ?>
		<th>Status</th>
	<!--<th>Tag</th>-->
		<th id="fill_data_col">Edit</th>
	</tr>
	<?php foreach ( $table_data as $data ) {
	/* I Hate XSS */
	$data = array_map( 'htmlspecialchars', $data );
	?>
	<tr>
		<td><input type="checkbox" name="no[]"
			value=<?php echo $data['unique_code']; ?> /></td>
		<td><?php echo $data['unique_code']; ?></td>
		<td><?php echo $data['signuptime']; ?></td>
		<td><?php echo $data['given_name'] . ' ' . $data['surname']; ?></td>
		<td><?php echo $data['sex']; ?></td>

		<?php

		switch( $MY_REQUEST['mode'] ) {
		case NULL:
			echo '<td>' . $data['email'] . '</td>';
		    echo '<td>' . $lang_countries[strtolower( $data['country'] )] . '</td>
		    <td>' . $data['langn'] . '</td>
		    <td>';
		    if ( $data['lang1'] )
		    echo $data['lang1'] . '-' . $data['lang1-level'] . ' ';
		    if ( $data['lang2'] )
		    echo $data['lang2'] . '-' . $data['lang2-level'] . ' ';
		    if ( $data['lang3'] )
		    echo $data['lang3'] . '-' . $data['lang3-level'] . ' ';
		    echo '</td><td>';
		    if ( $data['wiki_id'] )
		    	echo $data['wiki_id'] . '@' . $data['wiki_language'] . '.' . $data['wiki_project'];
		    echo '</td><td>';
		    foreach ( explode( ',', $data['showname'] ) as $key => $value )
		    {
		    	if ( $value == 1 ) echo 'N,';
		    	if ( $value == 2 ) echo 'U,';
			    if ( $value == 3 ) echo 'A(' . $data['custom_showname'] . ')';
		    }
		    echo '</td>';
		    break;
		case "topic":
		?>
			<td class="group1"><?php if ( !( strpos( $data['join_date'], '1' ) === false ) ) echo 'X'; ?></td>
			<td class="group1"><?php if ( !( strpos( $data['join_date'], '2' ) === false ) ) echo 'X'; ?></td>
			<td class="group1"><?php if ( !( strpos( $data['join_date'], '3' ) === false ) ) echo 'X'; ?></td>
			<td class="group1"><?php if ( !( strpos( $data['join_date'], '4' ) === false ) ) echo 'X'; ?></td>
			<td class="group1"><?php if ( !( strpos( $data['join_date'], '5' ) === false ) ) echo 'X'; ?></td>
			<td class="group1"><?php if ( !( strpos( $data['join_date'], '6' ) === false ) ) echo 'X'; ?></td>
			<td class="group1"><?php echo $data['tours']; ?></td>
		<?php echo
		    '<td class="group3">' . $data['size'] . '</td>
		    <td class="group3">';
		    foreach ( explode( ',', $data['food'] ) as $key => $value )
		    {
		    	if ( $value == 1 ) echo 'V';
		    	if ( $value == 2 ) echo 'H';
			    if ( $value == 3 ) echo 'O(' . $data['food_other'] . ')';
		    }
		    break;
		case "accommodation":
		    ?>

		<td class="group2"><?php if ( !( strpos( $data['nights'], '1' ) === false ) ) echo 'X'; ?></td>
		<td class="group2"><?php if ( !( strpos( $data['nights'], '2' ) === false ) ) echo 'X'; ?></td>
		<td class="group2"><?php if ( !( strpos( $data['nights'], '3' ) === false ) ) echo 'X'; ?></td>
		<td class="group2"><?php if ( !( strpos( $data['nights'], '4' ) === false ) ) echo 'X'; ?></td>
		<td class="group2"><?php if ( !( strpos( $data['nights'], '5' ) === false ) ) echo 'X'; ?></td>
		<td class="group2"><?php if ( !( strpos( $data['nights'], '6' ) === false ) ) echo 'X'; ?></td>
		<td class="group2"><?php if ( !( strpos( $data['nights'], '7' ) === false ) ) echo 'X'; ?></td>
		<td class="group2"><?php if ( !( strpos( $data['nights'], '8' ) === false ) ) echo 'X'; ?></td>
		<?php
		    echo '<td class="group3">';
		    echo $lang_register_form['hotel' . $data['hotels']];
		    echo '</td><td class="group3">';
		    if ( $data['room'] == 1 ) echo 'S';
		    if ( $data['room'] == 2 ) echo 'T';
		    if ( $data['room'] == 3 ) echo 'D';
		    echo '</td>';
		    echo '<td class="group3">' . $data['room_partner'] . '</td>';
		    echo '<td class="group3">' . $data['room_number'] . '</td>';
		    echo '<td class="group3">' . $data['room_requests'] . '</td>';
		    break;
		case 'visa':
		    echo '<td class="group3">';
		    if ( $data['visa_assistance'] ) echo 'X';
		    echo '<td class="group3">' . $lang_countries[strtolower( $data['nationality'] )] . '</td>';
		    echo '<td class="group3">' . $data['passport'] . '</td>';
		    echo '<td class="group3">' . $data['passport_valid'] . '</td>';
		    echo '<td class="group3">' . $data['passport_issued'] . '</td>';
		    echo '<td class="group3">' . $data['birthday'] . '</td>';
		    echo '<td class="group3">' . $lang_countries[strtolower( $data['countryofbirth'] )] . '</td>';
		    echo '<td class="group3">' . $data['homeaddress'] . '</td>';
		    echo '<td class="group3">' . $data['visa_assistance_description'] . '</td>';
		    break;
		case 'pay':
			echo '<td class="group3">' . $data['attendance_cost'] . '</td>';
			echo '<td class="group3">' . $data['accommodation_cost'] . '</td>';
			echo '<td class="group3">' . $data['vat_cost'] . '</td>';
			echo '<td class="group3">' . $data['cost_total'] . '</td>';
			echo '<td class="group3">' . $data['currency'] . '</td>';
			echo '<td class="group3">';
			if ( $data['paypal'] == 1 ) echo 'X';
			echo '</td>';
			echo '<td class="group3">' . $data['cost_paid'] . '</td>';
			// @todo make this into a *type of discount_code* field
			echo '<td class="group3">' . $data['discount_code'] . '</td>';
	} // switch
	echo '<td>';
	if ( $data['status'] == 1 ) echo '√';
    if ( $data['status'] == 2 ) echo 'X';
    echo '</td>';
	echo '<td><a href="#" class="fill_data_link" onclick="fill_data(\'' . addslashes( $data['surname'] ) . '\',\'' . addslashes( $data['given_name'] ) . '\',\'' . $data['unique_code'] . '\',\'' . $data['join_date'] . '\',\'' . $data['nights'] . '\',\'' . $data['hotels'] . '\',\'' . $data['room_number'] . '\')">Edit</a></td>';
	echo '</tr>';
	} // foreach ?>

</table>
<p id="page"><?php
	/* @todo Another dirty and quick work... */
	if ( $MY_REQUEST['keyword'] )
	{ $total_page = ceil( $register_data['total_keyword'] / $register_data['per_page'] ); }
	else
	{ $total_page = ceil( $register_data['total_people'] / $register_data['per_page'] ); }

	if ( $register_data['page'] >= 5 )
	{ echo '<a href="' . $parameters2 . '&page=1" title="Go to page 1">1</a> '; }
	if ( $register_data['page'] >= 6 )
	{ echo '... '; }
	for ( $i = max( 1, $register_data['page'] - 3 ); ( $i < $register_data['page'] ); $i++ )
	{
		echo '<a href="' . $parameters2 . '&page=' . ( $i ) . '" title="Go to page' . ( $i ) . '">' . ( $i ) . '</a> ';
	}
	echo '<strong>' . $register_data['page'] . '</strong> ';

	for ( $i = $register_data['page'] + 1; ( $i <= $total_page && $i <= $register_data['page'] + 3 ); $i++ )
	{
		echo '<a href="' . $parameters2 . '&page=' . ( $i ) . '" title="Go to page ' . ( $i ) . '">' . ( $i ) . '</a> ';
	}
	if ( $total_page - $register_data['page'] >= 5 )
	{ echo '... '; }

	if ( $total_page - $register_data['page'] >= 4 )
	{ echo '<a href="' . $parameters2 . '&page=' . $total_page . '" title="Go to page' . $total_page . '">' . $total_page . '</a> '; }
	?>
</p>

<div id="admin_form1">
<p>Checked registrant(s):
<input type="hidden" name="modification" value="change_status" />
<input type="radio" name="status" value="1" id="accept" checked="checked" /><label for="accept"> Confirm</label>
<input type="radio" name="status" value="2" id="reject" /><label for="reject">Reject</label>
<input type="hidden" name="action" value="admin" />
<input type="hidden" name="mode" value="<?php echo htmlspecialchars( $MY_REQUEST['mode'] ); ?>" />
<input type="hidden" name="keyword"	value="<?php echo htmlspecialchars( $MY_REQUEST['keyword'] ); ?>" />
<input type="hidden" name="page" value="<?php echo htmlspecialchars( $MY_REQUEST['page'] ); ?>" />
<input type="submit" value="OK" /></p>
</div>
</form>
</div>


<form action="<?php echo $myself_url; ?>index.php" method="POST"	onsubmit="return warning2();">
<div id="admin_form2">
<h3>Edit registrant</h3>
<p>
First name: <input type="text" name="given_name" id="given_name" />
Last name: <input type="text" name="surname" id="surname" /> <br>
Registration Number: <input type="text" name="unique_code" size="6" id="u_code" />
</p>
<div id="item1" class="checked_item">
<input type="radio" name="item" value="1" checked="checked" id="item1_radio" onclick="radiocheck(1);" />
<label for="item1_radio">Payment received</label>
<p>Received: <input type="text" name="cost_paid" size="5" />
<input type="hidden" name="modification" value="edit_user" />
(The amount can be negative for correction convenience)
<input type="hidden" name="action" value="admin" /> <input type="hidden" name="mode" value="<?php echo htmlspecialchars( $MY_REQUEST['mode'] ); ?>" />
<input type="hidden" name="keyword" value="<?php echo htmlspecialchars( $MY_REQUEST['keyword'] ); ?>" />
<input type="hidden" name="filter" value="<?php echo htmlspecialchars( $MY_REQUEST['filter'] ); ?>" />
<input type="hidden" name="page" value="<?php echo htmlspecialchars( $MY_REQUEST['page'] ); ?>" />
</p></div>


<div id="item2">
<input type="radio" name="item" value="2" id="item2_radio" onclick="radiocheck(2);" />
<label for="item2_radio">Date and accommodation</label>
<p>Date to participate: <br> <?php
for ( $i = 1; $i <= 6; $i++ )
{
	echo '<input type="checkbox" value="' . $i . '" name="join_date[]" id="j' . $i . '" />';
	echo '<label for="j' . $i . '">' . $lang_register_form['join' . $i] . '</label><br>';
}
?>
</p>
<p>Nights: <br><?php
for ( $i = 1; $i <= 8; $i++ )
{
	echo '<input type="checkbox" value="' . $i . '" name="nights[]" id="n' . $i . '" />';
	echo '<label for="n' . $i . '">' . $lang_register_form['night' . $i] . '</label><br>';
}
?>
</p>
<p>Accommodation: <br><?php
for ( $i = 1; $i <= 9; $i++ )
{
	echo '<input type="radio" value="' . $i . '" name="hotels" id="h' . $i . '" />';
	echo '<label for="hotels">' . $lang_register_form['hotel' . $i] . '</label><br>';
}
?>
</p>
<p>Room number: <input type="text" name="room_number" id="room_number" size="5" /></p>
</div>


<div id="item3"><input type="radio" name="item" value="3"
	id="item3_radio" onclick="radiocheck(3);" /><label for="item3_radio">Tag
and identity</label>
<p><label for="tag">Tag:</label><input type="text" name="tag" id="tag" />
<label for="vip_status">Special status:</label><select name="vip_status"
	id="vip_status">
	<option value="0" id="vips0">None</option>
	<option value="1" id="vips1">All free</option>
	<option value="2" id="vips2">Wikimedian price</option>
	<option value="3" id="vips3">Accommodation fee only</option>
</select></p>
</div>
<p>
<input type="submit" value="OK" />
<input type="button" value="Cancel"	id="cancel_button" class="hide_item" onclick="close_popup()" />
</p>
</div>
</form>


<div id="admin_form3">
<form enctype="multipart/form-data" action="<?php echo $myself_url; ?>index.php" method="POST">
<h3>Upload</h3>
<p>Upload accommodation data:
<input type="file" name="accommodation_file">
<input type="hidden" name="modification" value="set_data" />
<input type="hidden" name="action" value="admin" />
<input type="submit" value="Upload" />
</p>
</form>

<form action="<?php echo $myself_url; ?>index.php" method="POST">
<h3>Download</h3>
<p>
<input type="hidden" name="modification" value="get_data" />
<input type="hidden" name="action" value="admin" />
<input type="submit" value="Download registration data" /> as tab-separated, UTF8 encoded file.
</p>
</form>
</div>
