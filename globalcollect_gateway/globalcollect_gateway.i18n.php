<?php
/**
 * Internationalization file for the Donation Interface - GlobalCollect - extension
 *
 * @file
 * @ingroup Extensions
 */

$messages = array();

/** English */
$messages['en'] = array(
	'globalcollectgateway' => 'Make your donation now',
	'globalcollect_gateway-desc' => 'GlobalCollect payment processing',
	'globalcollect_gateway-response-9130' => 'Invalid country.',
	'globalcollect_gateway-response-9140' => 'Invalid currency.',
	'globalcollect_gateway-response-9150' => 'Invalid language.',
	'globalcollect_gateway-response-400530' => 'Invalid payment method.',
	'globalcollect_gateway-response-430306' => 'Your credit card has expired. Please try a different card or one of our other payment methods.',
	'globalcollect_gateway-response-430330' => 'Invalid card number.',
	'globalcollect_gateway-response-430421' => 'Your credit card could not be validated. Please verify that all information matches your credit card profile, or try a different card.', // suspected fraud
	'globalcollect_gateway-response-430360' => 'The transaction could not be authorized. Please try a different card or one of our other payment methods.', // low funds
	'globalcollect_gateway-response-430285' => 'The transaction could not be authorized. Please try a different card or one of our other payment methods.', // do not honor
	'globalcollect_gateway-response-21000150' => 'Invalid bank account number.',
	'globalcollect_gateway-response-21000155' => 'Invalid bank code.',
	'globalcollect_gateway-response-21000160' => 'Invalid giro account number.',
	'globalcollect_gateway-response-default' => 'There was an error processing your transaction.
Please try again later.',
);

/** Message documentation (Message documentation)
 * @author Kaldari
 */
$messages['qqq'] = array(
	'globalcollectgateway' => '{{Identical|Support Wikimedia}}',
	'globalcollect_gateway-desc' => '{{desc}}',
	'globalcollect_gateway-response-9130' => 'Error message for invalid country.',
	'globalcollect_gateway-response-9140' => 'Error message for invalid currency.',
	'globalcollect_gateway-response-9150' => 'Error message for invalid language.',
	'globalcollect_gateway-response-400530' => 'Error message for invalid payment method, for example, not a valid credit card type.',
	'globalcollect_gateway-response-430306' => 'Error message for expired credit card.',
	'globalcollect_gateway-response-430330' => 'Error message for invalid card number.',
	'globalcollect_gateway-response-430421' => 'Error message for declined credit card transaction. This error may be due to incorrect information being entered into the form.',
	'globalcollect_gateway-response-430360' => 'Error message for declined credit card transaction due to insuffient funds.',
	'globalcollect_gateway-response-430285' => 'Error message for declined credit card transaction due to "do not honor" message from payment provider.',
	'globalcollect_gateway-response-21000150' => 'Error message for invalid bank account number.',
	'globalcollect_gateway-response-21000155' => 'Error message for invalid bank code.',
	'globalcollect_gateway-response-21000160' => 'Error message for invalid giro account number.',
	'globalcollect_gateway-response-default' => 'Error message if something went wrong on our side.',
);

/** German (Deutsch)
 * @author Kghbln
 */
$messages['de'] = array(
	'globalcollectgateway' => 'Jetzt spenden',
	'globalcollect_gateway-desc' => 'Ermöglicht die Zahlungsabwicklung durch GlobalCollect',
	'globalcollect_gateway-response-9130' => 'Ungültiger Staat.',
	'globalcollect_gateway-response-9140' => 'Ungültige Währung.',
	'globalcollect_gateway-response-9150' => 'Ungültige Sprache.',
	'globalcollect_gateway-response-400530' => 'Ungültige Zahlungsmethode.',
	'globalcollect_gateway-response-430306' => 'Deine Kreditkarte ist nicht mehr gültig. Bitte verwende eine andere Karte oder nutze eine andere Zahlungsmethode.',
	'globalcollect_gateway-response-430330' => 'Die Kreditkartennummer ist ungültig.',
	'globalcollect_gateway-response-430421' => 'Deine Kreditkarte konnte nicht geprüft werden. Bitte stelle sicher, dass alle Informationen denen deiner Kreditkarte entsprechend oder verwende eine andere Karte.',
	'globalcollect_gateway-response-430360' => 'Die Transaktion wurde nicht bestätigt. Bitte verwende eine andere Karte oder nutze eine andere Zahlungsmethode.',
	'globalcollect_gateway-response-430285' => 'Die Transaktion wurde nicht bestätigt. Bitte verwende eine andere Karte oder nutze eine andere Zahlungsmethode.',
	'globalcollect_gateway-response-21000150' => 'Die Kontonummer ist ungültig.',
	'globalcollect_gateway-response-21000155' => 'Die Bankleitzahl ist ungültig.',
	'globalcollect_gateway-response-21000160' => 'Die Girokontonummer ist ungültig.',
	'globalcollect_gateway-response-default' => 'Während des Ausführens der Transaktion ist ein Verarbeitungsfehler aufgetreten.
Bitte versuche es später noch einmal.',
);

/** German (formal address) (‪Deutsch (Sie-Form)‬)
 * @author Kghbln
 */
$messages['de-formal'] = array(
	'globalcollect_gateway-response-430306' => 'Ihre Kreditkarte ist nicht mehr gültig. Bitte verwenden Sie eine andere Karte oder nutzen Sie eine andere Zahlungsmethode.',
	'globalcollect_gateway-response-430421' => 'Ihre Kreditkarte konnte nicht geprüft werden. Bitte stellen Sie sicher, dass alle Informationen denen Ihrer Kreditkarte entsprechend oder verwenden Sie eine andere Karte.',
	'globalcollect_gateway-response-430360' => 'Die Transaktion wurde nicht bestätigt. Bitte verwenden Sie eine andere Karte oder nutzen Sie eine andere Zahlungsmethode.',
	'globalcollect_gateway-response-430285' => 'Die Transaktion wurde nicht bestätigt. Bitte verwenden Sie eine andere Karte oder nutzen Sie eine andere Zahlungsmethode.',
	'globalcollect_gateway-response-default' => 'Während des Ausführens der Transaktion ist ein Verarbeitungsfehler aufgetreten.
Bitte versuchen Sie es später noch einmal.',
);

/** French (Français)
 * @author Gomoko
 * @author IAlex
 */
$messages['fr'] = array(
	'globalcollectgateway' => 'Faire un don maintenant',
	'globalcollect_gateway-desc' => 'Traitement des paiements GlobalCollect',
	'globalcollect_gateway-response-9130' => 'Pays invalide.',
	'globalcollect_gateway-response-9140' => 'Monnaie invalide.',
	'globalcollect_gateway-response-9150' => 'Langue invalide.',
	'globalcollect_gateway-response-400530' => 'Méthode de paiement invalide.',
	'globalcollect_gateway-response-430306' => "Votre carte de crédit a expiré. Veuillez essayer avec une autre carte ou l'une de nos autres méthodes de paiement.",
	'globalcollect_gateway-response-430330' => 'Numéro de carte non valide.',
	'globalcollect_gateway-response-430421' => 'Votre carte de crédit ne peut pas être validée. Veuillez vérifier que toutes les informations correspondent à votre carte de crédit, ou essayez avec une autre carte.',
	'globalcollect_gateway-response-430360' => "La transaction ne peut pas être autorisée. Veuillez essayer avec une autre carte ou l'une de nos autres méthodes de paiement.",
	'globalcollect_gateway-response-430285' => "La transaction ne peut pas être autorisée. Veuillez essayer avec une autre carte ou l'une de nos autres méthodes de paiement.",
	'globalcollect_gateway-response-21000150' => 'Numéro de compte bancaire non valide.',
	'globalcollect_gateway-response-21000155' => 'Code bancaire non valide.',
	'globalcollect_gateway-response-21000160' => 'Numéro de compte du virement invalide.',
	'globalcollect_gateway-response-default' => 'Une erreur est survenue lors du traitement de votre transaction.
Veuillez réessayer plus tard.',
);

/** Macedonian (Македонски)
 * @author Bjankuloski06
 */
$messages['mk'] = array(
	'globalcollectgateway' => 'Донирајте сега',
	'globalcollect_gateway-desc' => 'Платежна обработка GlobalCollect',
	'globalcollect_gateway-response-9130' => 'Неважечка земја.',
	'globalcollect_gateway-response-9140' => 'Неважечка валута.',
	'globalcollect_gateway-response-9150' => 'Неважечки јазик.',
	'globalcollect_gateway-response-400530' => 'Неважечки начин на плаќање',
	'globalcollect_gateway-response-430306' => 'Картичката ви е истечена. Обидете се со друга картичка или поинаков начин на плаќање.',
	'globalcollect_gateway-response-430330' => 'Неважечки број на картичка.',
	'globalcollect_gateway-response-430421' => 'Не можв да ја потврдам картичката. Проверете дали сите наведени информации се совпаѓаат со оние во профилот на картичката, или пак обидете се со друга картичка.',
	'globalcollect_gateway-response-430360' => 'Не можев да ја овластам трансакцијата. Обидете се со друга картичка или поинаков начин на плаќање.',
	'globalcollect_gateway-response-430285' => 'Не можев да ја овластам трансакцијата. Обидете се со друга картичка или поинаков начин на плаќање.',
	'globalcollect_gateway-response-21000150' => 'Неважечка сметка.',
	'globalcollect_gateway-response-21000155' => 'Неважечки банковски код.',
	'globalcollect_gateway-response-21000160' => 'Неважечка жиро сметка.',
	'globalcollect_gateway-response-default' => 'Настана грешка при обработката на плаќањето.
Обидете се повторно.',
);

/** Malay (Bahasa Melayu)
 * @author Anakmalaysia
 * @author Diagramma Della Verita
 */
$messages['ms'] = array(
	'globalcollectgateway' => 'Derma sekarang',
	'globalcollect_gateway-desc' => 'Pemprosesan pembayaran GlobalCollect',
	'globalcollect_gateway-response-9130' => 'Negara tidak sah.',
	'globalcollect_gateway-response-9140' => 'Mata wang tidak sah.',
	'globalcollect_gateway-response-9150' => 'Bahasa tidak sah.',
	'globalcollect_gateway-response-400530' => 'Jenis pembayaran yang dipilih tidak sah.',
	'globalcollect_gateway-response-430306' => 'Kad kredit anda telah luput. Sila cuba dengan kad yang lain atau pilih satu daripada empat cara pembayaran yang lain.',
	'globalcollect_gateway-response-430330' => 'Kad kredit tidak sah.',
	'globalcollect_gateway-response-430421' => 'Kad kredit anda tidak dapat disahkan. Sila pastikan kesemua maklumat yang diisi sama dengan profil kad kredit anda atau sila cuba semula dengan kad yang lain.',
	'globalcollect_gateway-response-430360' => 'Transaksi tidak dapat disahkan. Sila cuba dengan kad yang lain atau pilih satu daripada empat cara pembayaran yang lain.',
	'globalcollect_gateway-response-430285' => 'Transaksi tidak dapat disahkan. Sila cuba dengan kad yang lain atau pilih satu daripada empat cara pembayaran yang lain.',
	'globalcollect_gateway-response-21000150' => 'Nombor akaun bank tidah sah.',
	'globalcollect_gateway-response-21000155' => 'Kod bank tidak sah.',
	'globalcollect_gateway-response-21000160' => 'Nombor akaun giro tidak sah.',
	'globalcollect_gateway-response-default' => 'Terdapat masalah dalam memproses transaksi anda. 
Sila cuba sebentar lagi.',
);

