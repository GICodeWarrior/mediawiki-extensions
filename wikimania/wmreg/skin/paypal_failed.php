<?php
/* Prevent hacking */
if ( !defined( 'TC_STARTED' ) )
{ die( 'Hacking Attempt' ); }

global $myself_url, $register_data, $lang_register_form ;

/* Fix XSS */
$register_data = array_map( 'htmlspecialchars', $register_data );

?>
<?php
if ( $userLanguage == 'ar' || $userLanguage == 'fa' || $userLanguage == 'he' )
{
	echo '<div dir="rtl">';
}
?>
<h2><?php echo $lang_register_form['paypal_failed']?></h2>
<?php echo $lang_register_form['paypal_failed_description']?>
<?php
if ( $userLanguage == 'ar' || $userLanguage == 'fa' || $userLanguage == 'he' )
{
	echo '</div>';
} ?>