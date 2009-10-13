<?php
# Alert the user that this is not a valid entry point to MediaWiki if they try to access the special pages file directly.
if (!defined('MEDIAWIKI')) {
  echo <<<EOT
To install my extension, put the following line in LocalSettings.php:
require_once( "\$IP/extensions/paypal_gateway/paypal_gateway.php" );
EOT;
  exit( 1 );
}
 
$wgExtensionCredits['specialpage'][] = array(
	'name' => 'Paypal Gateway',
	'author' => 'Four Kitchens',
	'url' => 'http://www.mediawiki.org/wiki/Extension:PaypalGateway',
	'description' => 'Registers paypal as a donation payment',
	'descriptionmsg' => 'paypal_gateway-desc',
	'version' => '1.0.0',
);


$dir = dirname(__FILE__) . '/';

$wgExtensionMessagesFiles['PaypalGateway'] = $dir . 'paypal_gateway.i18n.php';

/** 
* Hooks required to interface with the donation extension (include <donate> on page)
*
* gwValue supplies the value of the form option, the name that appears on the form
* and the currencies supported by the gateway in the $values array
*/
$wgHooks['gwValue'][] = 'paypalGatewayValue';
$wgHooks['gwPage'][] = 'paypalGatewayPage';

/*
* Hook to register form value and display name of this gateway
* also supplies currencies supported by this gateway
*/
function paypalGatewayValue(&$values) {
  
  $values['paypal'] = array(
    'gateway' => "paypal",
    'display_name' => "Paypal",
    'form_value' => "paypal",
    'currencies' => array(
      'GBP' => "GBP: British Pound",
      'EUR' => "EUR: Euro",
      'USD' => "USD: U.S. Dollar",
      'AUD' => "AUD: Australian Dollar",
      'CAD' => "CAD: Canadian Dollar",
      'CHF' => "CHF: Swiss Franc",
      'CZK' => "CZK: Czech Koruna",
      'DKK' => "DKK: Danish Krone",
      'HKD' => "HKD: Hong Kong Dollar",
      'HUF' => "HUF: Hungarian Forint",
      'JPY' => "JPY: Japanese Yen",
      'NZD' => "NZD: New Zealand Dollar",
      'NOK' => "NOK: Norwegian Krone",
      'PLN' => "PLN: Polish Zloty",
      'SGD' => "SGD: Singapore Dollar",
      'SEK' => "SEK: Swedish Krona",
      'ILS' => "ILS: Israeli Shekel",
      ),
    );

  return true;
}

/*
*  Hook to supply the page address of the payment gateway
*
* The user will redirected here with amount and currency code appended (GET).
* NOTE: $wgPaypalEmail is the business email associated with the Paypal account
* It is set in the LocalSettings.php file
*/
function paypalGatewayPage(&$url) {
  // Business email address set in LocalSettings.php
  global $wgPaypalEmail;
    
  $url['paypal'] = "https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=". urlencode($wgPaypalEmail) ."&lc=US&no_note=1&no_shipping=1&bn=PP%2dDonationsBF%3abtn_donateCC_LG%2egif%3aNonHosted";
    
  return true;
}