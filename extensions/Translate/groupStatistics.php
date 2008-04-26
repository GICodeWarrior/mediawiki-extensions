<?php
/**
 * Statistics about message groups.
 *
 * @addtogroup Maintenance
 *
 * @author Niklas Laxstrom
 *
 * @copyright Copyright © 2007, Niklas Laxström
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 */

$optionsWithArgs = array( 'groups', 'output', 'skiplanguages', );

$dir = dirname( __FILE__ ); $IP = "$dir/../..";
@include("$dir/../CorePath.php"); // Allow override
require_once( "$IP/maintenance/commandLine.inc" );

function stderr( $message ) {
	static $stderr = null;
	if (is_null($stderr)) $stderr = fopen( "php://stderr", "wt" );
	fwrite( $stderr, $message . "\n" );
}

require_once( $IP . '/maintenance/language/StatOutputs.php' );

if ( isset( $options['help'] ) ) {
	showUsage();
}

# Default output is WikiText
if ( !isset( $options['output'] ) ) {
	$options['output'] = 'wiki';
}

/** Print a usage message*/
function showUsage() {
	$msg = <<<END
Usage: php transstat.php [--help] [--output=csv|text|wiki] --groups
	--help : this helpful message
	--groups : comma separated list of groups
	--skiplanguages : comma separated list of languages that should be skipped
	--output : select an output engine one of:
		* 'csv'      : Comma Separated Values.
		* 'wiki'     : MediaWiki syntax (default).
		* 'metawiki' : MediaWiki syntax used for Meta-Wiki.
		* 'text'     : Text with tabs.
Example: php maintenance/transstat.php --output=text

END;
	stderr( $msg );
	die( 1 );
}


# Select an output engine
switch ( $options['output'] ) {
	case 'wiki':
		$out = new wikiStatsOutput();
		break;
	case 'metawiki':
		$out = new metawikiStatsOutput();
		break;
	case 'text':
		$out = new textStatsOutput();
		break;
	case 'csv':
		$out = new csvStatsOutput();
		break;
	default:
		showUsage();
}

if ( !isset($options['groups']) ) {
	showUsage();
}

// Get groups from input
$groups = array();
$reqGroups = array_map( 'trim', explode( ',', $options['groups'] ) );

$skipLanguages = array();
if ( isset($options['skiplanguages']) ) {
	$skipLanguages = array_map( 'trim', explode( ',', $options['skiplanguages'] ) );
}

// List of all groups
$allGroups = MessageGroups::singleton()->getGroups();

// Get list of valid groups
foreach ( $reqGroups as $id ) {
	if ( array_key_exists( $id, $allGroups ) ) {
		$groups[$id] = $allGroups[$id];
	} else {
		stderr( "Unknown group $id" );
	}
}

// List of all customized languages.
$languages = Language::getLanguageNames( true );

// Default sorting order by language code, users can sort wiki output by any
// column, if it is supported.
ksort( $languages );

// Output headers
$out->heading();
$out->blockstart();
$out->element( 'Code', true );
$out->element( 'Language', true );
foreach ( $groups as $g ) {
	// Add unprocessed description of group as heading
	$out->element( $g->getLabel(), true );
}
$out->blockend();


// Perform the statistic calculations on every language
foreach ( $languages as $code => $name ) {
	// Skip list
	if ( in_array( $code, $skipLanguages ) ) continue;

	$out->blockstart();
	$out->element( $code );
	$out->element( $name );


	foreach ( $groups as $g ) {
		// Initialise messages
		$messages = new MessageCollection( $code );
		$definitions = $g->getDefinitions();
		foreach ( $definitions as $key => $definition ) {
			$messages->add( new TMessage( $key, $definition ) );
		}

		$bools = $g->getBools();
		foreach ( array_merge($bools['ignored'], $bools['optional']) as $key ) {
			unset($messages[$key]);
		}

		// Store the count of real messages for later calculation.
		$total = count( $messages );

		// Get all translations. Could this be done more efficient?
		TranslateUtils::fillContents( $messages );
		$g->fill( $messages );

		// Remove untranslated messages from the list
		foreach ( $messages->keys() as $key ) {
			if ( $messages[$key]->translation === null ) {
				unset( $messages[$key] );
			}
		}

		// Count the completion percent and output it
		$translated = count( $messages );

		$out->element( $out->formatPercent( $translated, $total,
			/* Inverted color */ false, /* Decimals */ 2 )
		);
	}

	$out->blockend();
}

# Finally output footer
$out->footer();
