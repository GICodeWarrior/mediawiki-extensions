<?php
/* Prevent hacking */
if(!defined('TC_STARTED')) 
{ die('Hacking Attempt'); }

global $myself_url, $register_data, $userLanguage, $lang_register_form;

/* WARNING: check $register_data & htmlentities!! */
?>
<?php
if ($userLanguage == 'ar' || $userLanguage == 'fa' || $userLanguage == 'he')
{
	echo '<div dir="rtl">';
}
?>
<h2><?php echo $lang_register_form['paypal']?></h2>
<?php echo $lang_register_form['paypal_description']?>

<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="SFPHVU7QV7VFU">
<input type="hidden" name="lc" value="IL">
<input type="hidden" name="item_name" value="Wikimania 2011 registration fee for <?php echo $register_data['given_name'].' '.$register_data['surname']?>"; />
<input type="hidden" name="item_number" value="<?php echo $register_data['unique_code'];?>"/>
<input type="hidden" name="amount" value="<?php echo $register_data['cost_total'];?>" /> 
<input type="hidden" name="currency_code" value="<?php echo $register_data['currency'];?>"/>
<input type="hidden" name="button_subtype" value="services">
<input type="hidden" name="no_note" value="1">
<input type="hidden" name="bn" value="PP-BuyNowBF:btn_paynowCC_LG.gif:NonHosted">
<input type="hidden" name="no_shipping" value="1" />
<input type="hidden" name="rm" value="1">
<input type="hidden" name="return" value="<?php echo $myself_url . '/index.php?action=paypal_successful&unique_code=' . $register_data['unique_code'] . '&nonce='.md5($_SESSION['secret'] . $register_data['unique_code']).'&uselang='.$userLanguage; ?>"/>
<input type="hidden" name="cancel_return" value="<?php echo $myself_url . '/index.php?action=paypal_failed&unique_code=' . $register_data['unique_code'] . '&uselang='.$userLanguage; ?>"/>
<input type="hidden" name="no_note" value="1" />
<input type="image" src="https://www.paypal.com/en_US/IL/i/btn/btn_paynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>
<?php
if ($userLanguage == 'ar' || $userLanguage == 'fa' || $userLanguage == 'he')
{
echo '</div>';
}?>



