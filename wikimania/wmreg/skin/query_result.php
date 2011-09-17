<?php

/* Prevent hacking */
if ( !defined( 'TC_STARTED' ) )
{ die( 'Hacking Attempt' ); }

global $error_message, $register_data, $lang_query, $lang_register_form, $lang_errors;

/* Fix XSS */
$register_data = array_map( 'htmlspecialchars', $register_data );
?>
<?php
if ( $userLanguage == 'ar' || $userLanguage == 'fa' || $userLanguage == 'he' )
{
	echo '<div dir="rtl">';
}
?>

<p id="special_pages">
<?php
if ( $userLanguage == 'ar' || $userLanguage == 'fa' || $userLanguage == 'he' )
{
	echo '<div align="left">';
} ?>
<a href="<?php echo $myself_url . 'index.php'?>"
	title="Return to Registration form">Registration Form</a> | <a
	href="<?php echo $myself_url . 'index.php?action=admin'?>"
	title="Enter the managment system">Admin</a><?php
	if ( $userLanguage == 'ar' || $userLanguage == 'fa' || $userLanguage == 'he' )
	{
		echo '</div>';
	}
?>
</p>
<h1><?php echo $lang_query['query_title']; ?></h1>
<p>
<?php echo preg_replace( '/(.+)/', $lang_query['your_status'], $register_data['given_name'] . ' ' . $register_data['surname'] ); ?>
</p>
<br>
<p>
<?php echo $lang_query['unique_code'] . ' <b>' . $register_data['unique_code'] . '</b>'; ?>
</p>
<br>
<p>
<?php echo $lang_query['received_money'] . ' <br> <b>' . $register_data['cost_paid'] . ' out of ' . $register_data['cost_total'] . ' ' . $register_data['currency'] . '</b>';
if ( $register_data['cost_paid'] < $register_data['cost_total'] ) {
	echo ' (' . $lang_query['lack'] . ')';
	include 'skin/paypal.php';
}

if ( $register_data['cost_paid'] == $register_data['cost_total'] ) echo ' (' . $lang_query['enough'] . ')';
if ( $register_data['cost_paid'] > $register_data['cost_total'] ) echo ' (' . $lang_query['too_much'] . ')';
?>
</p>
<br><br>
<p>
<?php switch( $register_data['status'] )
{
	case 0:
		echo $lang_query['not_yet'];
		break;
	case 1:
		echo $lang_query['accepted'];
		break;
	case 2:
		echo $lang_query['rejected'];
		break;
} ?>
</p>
<?php

if ( $userLanguage == 'ar' || $userLanguage == 'fa' || $userLanguage == 'he' )
{
	echo '</div>';
} ?>