<?php

/* Prevent hacking */
if(!defined('TC_STARTED'))
{ die('Hacking Attempt'); }

global $error_message, $register_data, $lang_query, $lang_register_form, $lang_errors;

/* Fix XSS */
$register_data = array_map('htmlspecialchars', $register_data);

?>
<?php
if ($userLanguage == 'ar' || $userLanguage == 'fa' || $userLanguage == 'he')
{
	echo '<div dir="rtl">';
}
?>
<h1><?php echo $lang_register_form['query'];?></h1>
<p id="special_pages"><?php
if ($userLanguage == 'ar' || $userLanguage == 'fa' || $userLanguage == 'he')
{
	echo '<div align="left">';
}?><a href="<?php echo $myself_url.'index.php?uselang='.$userLanguage?>"
	title="Return to Registration form">Registration Form</a> | <a
	href="<?php echo $myself_url.'index.php?action=admin'?>"
	title="Enter the managment System">Admin</a><?php
if ($userLanguage == 'ar' || $userLanguage == 'fa' || $userLanguage == 'he')
{
	echo '</div>';
}?></p>
<?php if ($error_message != 0)
echo '<div id="correction">'."\n".'<p>'.$lang_errors['wrong_query'].'</p>'."\n".'</div>'."\n";
?>
<form method="post" action="<?php echo $myself_url?>index.php">

<table class="form_table">
	<colgroup>
		<col class="col_left" />
		<col class="col_right" />
	</colgroup>
	<tr>
		<td><label for="given_name" class="col_title"><?php echo $lang_register_form['given_name']?></label></td>
		<td><input name="given_name" type="text" size="20" id="given_name"
			value="<?php echo $register_data['given_name'];?>" /></td>
	</tr>
	<tr>
		<td><label for="surname" class="col_title"><?php echo $lang_register_form['surname']?></label></td>
		<td><input name="surname" type="text" size="20" id="surname"
			value="<?php echo $register_data['surname'];?>" /></td>
	</tr>
	<tr>
		<td><label for="unique_code" class="col_title"><?php echo $lang_query['unique_code'] ?></label></td>
		<td><input name="unique_code" type="text" id="u_code" size="5"
			value="<?php echo $register_data['unique_code'];?>" /></td>
	</tr>
</table>
<div id="button">
<input type="submit" name="Submit" value="<?php echo $lang_query['submit']?>" /> 
<input type="reset"  name="reset" id="reset" value="<?php echo $lang_register_form['reset']?>" />
<input type="hidden" name="uselang" value="<?php echo $userLanguage;?>" />
<input type="hidden" name="action" value="query_result" /> 
<?php if(!$_COOKIE['wikimania']) echo '<input type="hidden" name="secret_id" value="'.$my_session->handle.'" />'; ?>
</div>
</form>
<?php
if ($userLanguage == 'ar' || $userLanguage == 'fa' || $userLanguage == 'he')
{
	echo '</div>';
}?>