<?php

# Alert the user that this is not a valid entry point to MediaWiki if they try to access the special pages file directly.
if ( !defined( 'MEDIAWIKI' ) ) {
	echo <<<EOT
To install my extension, put the following line in LocalSettings.php:
require_once( "\$IP/extensions/ContributionReporting/ContributionReporting.php" );
EOT;
	exit( 1 );
}

$wgContributionReportingBaseURL = "http://meta.wikimedia.org/w/index.php?title=Special:NoticeTemplate/view&template=";

// Override these with appropriate DB settings for the CiviCRM database...
$wgContributionReportingDBserver = $wgDBserver;
$wgContributionReportingDBuser = $wgDBuser;
$wgContributionReportingDBpassword = $wgDBpassword;
$wgContributionReportingDBname = $wgDBname;

// And now the tracking database
$wgContributionTrackingDBserver = $wgDBserver;
$wgContributionTrackingDBuser = $wgDBuser;
$wgContributionTrackingDBpassword = $wgDBpassword;
$wgContributionTrackingDBname = $wgDBname;

$wgExtensionCredits['specialpage'][] = array(
	'path' => __FILE__,
	'name' => 'Contribution Reporting',
	'url' => 'http://www.mediawiki.org/wiki/Extension:ContributionReporting',
	'author' => array( 'David Strauss', 'Brion Vibber', 'Siebrand Mazeland', 'Trevor Parscal', 'Tomasz Finc' ),
	'descriptionmsg' => 'contributionreporting-desc',
);

$dir = dirname( __FILE__ ) . '/';

$wgExtensionMessagesFiles['ContributionReporting'] = $dir . 'ContributionReporting.i18n.php';
$wgExtensionAliasesFiles['ContributionReporting'] = $dir . 'ContributionReporting.alias.php';

$wgAutoloadClasses['ContributionHistory'] = $dir . 'ContributionHistory_body.php';
$wgAutoloadClasses['ContributionTotal'] = $dir . 'ContributionTotal_body.php';
$wgAutoloadClasses['SpecialContributionStatistics'] = $dir . 'ContributionStatistics_body.php';
$wgAutoloadClasses['SpecialFundraiserStatistics'] = $dir . 'FundraiserStatistics_body.php';
$wgAutoloadClasses['SpecialContributionTrackingStatistics'] = $dir . 'ContributionTrackingStatistics_body.php';
/*
$wgAutoloadClasses['SpecialDailyTotal'] = $dir . 'DailyTotal_body.php';
$wgAutoloadClasses['SpecialYearlyTotal'] = $dir . 'YearlyTotal_body.php';
$wgAutoloadClasses['DisabledNotice'] = $dir . 'DisabledNotice_body.php';
*/

$wgSpecialPages['ContributionHistory'] = 'ContributionHistory';
$wgSpecialPages['ContributionTotal'] = 'ContributionTotal';
$wgSpecialPages['ContributionStatistics'] = 'SpecialContributionStatistics';
$wgSpecialPages['FundraiserStatistics'] = 'SpecialFundraiserStatistics';
$wgSpecialPages['ContributionTrackingStatistics'] = 'SpecialContributionTrackingStatistics';
/*
$wgSpecialPages['DailyTotal'] = 'SpecialDailyTotal';
$wgSpecialPages['YearlyTotal'] = 'SpecialYearlyTotal';
*/

$wgSpecialPageGroups['ContributionHistory'] = 'contribution';
$wgSpecialPageGroups['ContributionTotal'] = 'contribution';
$wgSpecialPageGroups['ContributionStatistics'] = 'contribution';
$wgSpecialPageGroups['FundraiserStatistics'] = 'contribution';
$wgSpecialPageGroups['ContributionTrackingStatistics'] = 'contribution';

// Shortcut to this extension directory
$dir = dirname( __FILE__ ) . '/';

// CutOff for fiscal year
$egContributionStatisticsFiscalYearCutOff = 'July 1';

// Days back to show
$egContributionStatisticsViewDays = 7;

// Fundraiser dates
// Please list these in chronological order
$egFundraiserStatisticsFundraisers = array(
	array(
		'id' => '2007',
		'title' => '2007 Fundraiser',
		'start' => 'Oct 22 2007',
		'end' => 'Jan 3 2008'
	),
	array(
		'id' => '2008',
		'title' => '2008 Fundraiser',
		'start' => 'Nov 4 2008',
		'end' => 'Jan 9 2009'
	),
	array(
		'id' => '2009',
		'title' => '2009 Fundraiser',
		'start' => 'Nov 10 2009',
		'end' => 'Jan 15 2010'
	),
	array(
		'id' => '2010',
		'title' => '2010 Fundraiser',
		'start' => 'Nov 11 2010',
		'end' => 'Jan 15 2011',
	),
	array(
		'id' => '2011',
		'title' => '2011 Fundraiser',
		'start' => 'Nov 16 2011',
		'end' => 'Jan 15 2012',
	),
);

// The first year of statistics to make visible by default.
// We normally don't show all of them by default, since it makes the chart extremely wide.
$egFundraiserStatisticsFirstYearDefault = 2009;

// Thesholds for fundraiser statistics
$egFundraiserStatisticsMinimum = 1;
$egFundraiserStatisticsMaximum = 10000;

// Cache timeout for fundraiser statistics (short timeout), in seconds
$egFundraiserStatisticsCacheTimeout = 900; // 15 minutes
// Cache timeout for fundraiser statistics (long timeout), in seconds
$wgFundraiserStatisticsLongCacheTimeout = 60 * 60 * 24 * 7; // one week


$wgContributionTrackingStatisticsViewWeeks = 3;

$commonModuleInfo = array(
	'localBasePath' => dirname( __FILE__ ) . '/modules',
	'remoteExtPath' => 'ContributionReporting/modules',
);

$wgResourceModules['ext.fundraiserstatistics.table'] = array(
	'styles' => 'ext.fundraiserstatistics.table.css',
) + $commonModuleInfo;

$wgResourceModules['ext.fundraiserstatistics'] = array(
	'scripts' => 'ext.fundraiserstatistics.js',
	'styles' => 'ext.fundraiserstatistics.css',
) + $commonModuleInfo;

$wgResourceModules['ext.disablednotice'] = array(
	'styles' => 'ext.disablednotice.css',
) + $commonModuleInfo;

$wgHooks['ParserFirstCallInit'][] = 'efContributionReportingSetup';
$wgHooks['LanguageGetMagic'][] = 'efContributionReportingTotal_Magic';

/**
 * @param $parser Parser
 * @return bool
 */
function efContributionReportingSetup( $parser ) {
	$parser->setFunctionHook( 'contributiontotal', 'efContributionReportingTotal_Render' );
	return true;
}

/**
 * @param $magicWords array
 * @param $langCode string
 * @return bool
 */
function efContributionReportingTotal_Magic( &$magicWords, $langCode ) {
	$magicWords['contributiontotal'] = array( 0, 'contributiontotal' );
	return true;
}

/**
 * Automatically use a local or special database connection for reporting
 * @return DatabaseMysql
 */
function efContributionReportingConnection() {
	global $wgContributionReportingDBserver, $wgContributionReportingDBname;
	global $wgContributionReportingDBuser, $wgContributionReportingDBpassword;

	static $db;

	if ( !$db ) {
		$db = new DatabaseMysql(
			$wgContributionReportingDBserver,
			$wgContributionReportingDBuser,
			$wgContributionReportingDBpassword,
			$wgContributionReportingDBname );
		$db->query( "SET names utf8" );
	}

	return $db;
}

/**
 * Automatically use a local or special database connection for tracking
 * @return DatabaseMysql
 */
function efContributionTrackingConnection() {
	global $wgContributionTrackingDBserver, $wgContributionTrackingDBname;
	global $wgContributionTrackingDBuser, $wgContributionTrackingDBpassword;

	static $db;

	if ( !$db ) {
		$db = new DatabaseMysql(
			$wgContributionTrackingDBserver,
			$wgContributionTrackingDBuser,
			$wgContributionTrackingDBpassword,
			$wgContributionTrackingDBname );
		$db->query( "SET names utf8" );
	}

	return $db;
}

/**
 * Get the total amount of money raised since the start of the fundraiser
 * @param $start
 * @param $fudgeFactor
 * @return string
 */
function efContributionReportingTotal( $start, $fudgeFactor ) {
	$db = efContributionReportingConnection();

	$sql = 'SELECT ROUND( SUM(converted_amount) ) AS ttl FROM public_reporting';

	if ( $start ) {
		$sql .= ' WHERE received >= ' . $db->addQuotes( wfTimestamp( TS_UNIX, $start ) );
	}

	$res = $db->query( $sql );

	$row = $res->fetchRow();

	# Output
	$output = $row['ttl'] ? $row['ttl'] : '0';
	
	// Make sure fudge factor is a number
	if ( is_nan( $fudgeFactor ) ) {
		$fudgeFactor = 0;
	}

	$output += $fudgeFactor;

	return $output;
}

/**
 * @return string
 */
function efContributionReportingTotal_Render() {
	$args = func_get_args();
	array_shift( $args );

	$fudgeFactor = false;
	$start = false;

	foreach( $args as $arg ) {
		if ( strpos($arg,'=') === false ) {
			continue;
		}

		list($key,$value) = explode( '=', trim($arg), 2 );

		if ($key == 'fudgefactor') {
			$fudgeFactor = $value;
		} elseif ($key == 'start') {
			$start = $value;
		}
	}

	return efContributionReportingTotal( $start, $fudgeFactor );
}
