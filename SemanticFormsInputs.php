<?php
/**
 * Additional input types for [http://www.mediawiki.org/wiki/Extension:SemanticForms Semantic Forms].
 *
 * @defgroup SFI Semantic Forms Inputs
 * @author Stephan Gambke
 * @author Sanyam Goyal
 * @version 0.4.2 alpha
 */

/**
 * The main file of the Semantic Forms Inputs extension
 *
 * @file
 * @ingroup SFI
 */

if ( !defined( 'MEDIAWIKI' ) ) {
	die( 'This file is a MediaWiki extension, it is not a valid entry point.' );
}

if ( !defined( 'SF_VERSION' ) ) {
	die( '<b>Error:</b> <a href="https://www.mediawiki.org/wiki/Extension:Semantic_Forms_Inputs">Semantic Forms Inputs</a> is a Semantic Forms extension. You need to install <a href="https://www.mediawiki.org/wiki/Extension:Semantic_Forms">Semantic Forms</a> first.' );
}

define( 'SFI_VERSION', '0.4.2 alpha' );

// create and initialize settings
$sfigSettings = new SFISettings();

// register extension
$wgExtensionCredits[defined( 'SEMANTIC_EXTENSION_TYPE' ) ? 'semantic' : 'other'][] = array(
	'path' => __FILE__,
	'name' => 'Semantic Forms Inputs',
	'author' => array( '[http://www.mediawiki.org/wiki/User:F.trott Stephan Gambke]', 'Sanyam Goyal', 'Yaron Koren' ),
	'url' => 'http://www.mediawiki.org/wiki/Extension:Semantic_Forms_Inputs',
	'descriptionmsg' => 'semanticformsinputs-desc',
	'version' => SFI_VERSION,
);

$dir = dirname( __FILE__ );

// load user settings
require_once( $dir . '/SFI_Settings.php' );

$wgExtensionMessagesFiles['SemanticFormsInputs'] = $dir . '/SemanticFormsInputs.i18n.php';
$wgExtensionFunctions[] = 'wfSFISetup';
$wgAutoloadClasses['SFIInputs'] = $dir . '/SFI_Inputs.php';

/**
 * Class to encapsulate all settings
 */
class SFISettings {
	// general settings
	public $scriptPath;
	//public $yuiBase;

	// settings for input type datepicker
	public $datePickerFirstDate;
	public $datePickerLastDate;
	public $datePickerDateFormat;
	public $datePickerWeekStart;
	public $datePickerShowWeekNumbers;
	public $datePickerDisableInputField;
	public $datePickerShowResetButton;
	public $datePickerDisabledDaysOfWeek;
	public $datePickerHighlightedDaysOfWeek;
	public $datePickerDisabledDates;
	public $datePickerHighlightedDates;
	public $datePickerMonthNames;
	public $datePickerDayNames;
}

/**
 * Registers the input types with Semantic Forms.
 */
function wfSFISetup() {
	global $sfgFormPrinter, $wgVersion;

	$sfgFormPrinter->setInputTypeHook( 'regexp', array( 'SFIInputs', 'regexpHTML' ), array() );
	$sfgFormPrinter->setInputTypeHook( 'datepicker', array( 'SFIInputs', 'jqDatePickerHTML' ), array() );
	$sfgFormPrinter->setInputTypeHook( 'simpledatepicker', array( 'SFIInputs', 'jqDatePickerHTML' ), array() );
	$sfgFormPrinter->setInputTypeHook( 'timepicker', array( 'SFIInputs', 'timepickerHTML' ), array() );
	$sfgFormPrinter->setInputTypeHook( 'datetimepicker', array( 'SFIInputs', 'datetimepickerHTML' ), array() );
//	$sfgFormPrinter->setInputTypeHook( 'wysiwyg', array( 'SFIInputs', 'wysiwygHTML' ), array() );
	$sfgFormPrinter->setInputTypeHook( 'menuselect', array( 'SFIInputs', 'menuselectHTML' ), array() );

	// This function has been deprecated in 1.16, but needed for earlier versions.
	if ( version_compare( $wgVersion, '1.16', '<' ) ) {
		wfLoadExtensionMessages( 'SemanticFormsInputs' );
	}
}
