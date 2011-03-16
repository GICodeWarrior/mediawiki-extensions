<?php

function initContactsLang() {
	global $form_language;

	require_once ( dirname( __FILE__ ) . '/getmycontacts.i18n.php' );

	$m = efGetMyContacts();

	$contactLang = $m[$form_language];
	if (empty($contactLang)) {
		$contactLang = 'en';
	}
	return $contactLang;
}

$messages = initContactsLang();