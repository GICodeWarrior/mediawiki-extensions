<?php
/**
 * Validates a transaction against MaxMind's minFraud service
 *
 * For more details on minFraud, go: http://www.maxmind.com/app/minfraud
 *
 * To install:
 *      require_once( "$IP/extensions/DonationInterface/payflowpro_gateway/extras/minfraud/minfraud.php" );
 *
 */

if ( !defined( 'MEDIAWIKI' ) ) {
	die( "This file is part of the MinFraud for PayflowPro Gateway extension. It is not a valid entry point.\n" );
}

$wgExtensionCredits['payflowprogateway_extras_minfraud'][] = array(
	'name' => 'minfraud',
	'author' => 'Arthur Richards',
	'url' => '',
	'description' => 'This extension uses the MaxMind minFraud service as a validator for the Payflow Pro gateway.'
);

/**
 * Your minFraud license key.
 */
$wgMinFraudLicenseKey = '';

/**
 * Set the risk score ranges that will cause a particular 'action'
 *
 * The keys to the array are the 'actions' to be taken (eg 'process').
 * The value for one of these keys is an array representing the lower
 * and upper bounds for that action.  For instance,
 *   $wgMinFraudActionRagnes = array(
 *		'process' => array( 0, 100)
 *		...
 *	);
 * means that any transaction with a risk score greather than or equal
 * to 0 and less than or equal to 100 will be given the 'process' action.
 *
 * These are evauluated on a >= or <= basis.  Please refer to minFraud
 * documentation for a thorough explanation of the 'riskScore'.
 */
$wgMinFraudActionRanges = array(
	'process' => array( 0, 100 ),
	'review' => array( -1, -1 ),
	'challenge' => array( -1, -1 ),
	'reject' => array( -1, -1 )
);

// Timeout in seconds for communicating with MaxMind
$wgMinFraudTimeout = 2;

/**
 * Define whether or not to run minFraud in stand alone mode
 *
 * If this is set to run in standalone, these scripts will be
 * accessed directly via the "PayflowGatewayValidate" hook.
 * You may not want to run this in standalone mode if you prefer
 * to use this in conjunction with Custom Filters.  This has the
 * advantage of sharing minFraud info with other filters.
 */
$wgMinFraudStandalone = TRUE;

$dir = dirname( __FILE__ ) . "/";
$wgAutoloadClasses['PayflowProGateway_Extras_MinFraud'] = $dir . "minfraud.body.php";

$wgExtensionFunctions[] = 'efMinFraudSetup';

function efMinFraudSetup() {
	// if we're in standalone mode, use the PayflowGatewayValidate hook
	global $wgMinFraudStandalone, $wgHooks;
	if ( $wgMinFraudStandalone ) $wgHooks["PayflowGatewayValidate"][] = array( 'PayflowProGateway_Extras_MinFraud::onValidate' );
}
