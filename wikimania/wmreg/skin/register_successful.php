<?php

/* Prevent hacking */
if(!defined('TC_STARTED')) 
{ die('Hacking Attempt'); }

global $register_data, $lang_messages;

/* Fix XSS */
$register_data = array_map('htmlspecialchars', $register_data);

?>
<?php
if ($userLanguage == 'ar' || $userLanguage == 'fa' || $userLanguage == 'he')
{
echo '<div dir="rtl">';
}
?>

<h1><?php echo $lang_messages['successful']; ?></h1>
<?php echo $lang_messages['successful_description']; ?>
<p id="unique_code"><?php echo $register_data['unique_code']; ?></p>

<h2><?php echo $lang_messages['cost']; ?></h2>
<ul>
<li><?php echo $lang_messages['attendance_cost']; ?><?php echo $register_data['attendance_cost'] ?> <?php echo $register_data['currency']; ?></li>
<li><?php echo $lang_messages['accommodation_cost']; ?><?php echo $register_data['accommodation_cost']?> <?php echo $register_data['currency']; ?></li>
<li><?php echo $lang_messages['vat_cost']; ?><?php echo $register_data['vat_cost']?> <?php echo $register_data['currency']; ?></li>
<li class="total_cost"><?php echo $lang_messages['total_cost']; ?><?php echo $register_data['cost_total']?> <?php echo $register_data['currency']; ?></li>
</ul>


