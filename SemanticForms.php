<?php
/**
 * Default settings for Semantic Forms.
 */
if ( !defined( 'MEDIAWIKI' ) ) die();

define( 'SF_VERSION', '2.1.2' );

$wgExtensionCredits[defined( 'SEMANTIC_EXTENSION_TYPE' ) ? 'semantic' : 'specialpage'][] = array(
	'path' => __FILE__,
	'name' => 'Semantic Forms',
	'version' => SF_VERSION,
	'author' => array( 'Yaron Koren', 'Stephan Gambke', '...' ),
	'url' => 'http://www.mediawiki.org/wiki/Extension:Semantic_Forms',
	'descriptionmsg'  => 'semanticforms-desc',
);

# ##
# This is the path to your installation of Semantic Forms as
# seen from the web. Change it if required ($wgScriptPath is the
# path to the base directory of your wiki). No final slash.
# #
$sfgPartialPath = '/extensions/SemanticForms';
$sfgScriptPath = $wgScriptPath . $sfgPartialPath;
# #

# ##
# This is the path to your installation of Semantic Forms as
# seen on your local filesystem. Used against some PHP file path
# issues.
# #
$sfgIP = dirname( __FILE__ );
# #


// constants for special properties
define( 'SF_SP_HAS_DEFAULT_FORM', 1 );
define( 'SF_SP_HAS_ALTERNATE_FORM', 2 );
define( 'SF_SP_CREATES_PAGES_WITH_FORM', 3 );
define( 'SF_SP_PAGE_HAS_DEFAULT_FORM', 4 );
define( 'SF_SP_HAS_FIELD_LABEL_FORMAT', 5 );

$wgExtensionFunctions[] = 'sfgSetupExtension';

// FIXME: Can be removed when new style magic words are used (introduced in r52503)
$wgHooks['LanguageGetMagic'][] = 'SFParserFunctions::languageGetMagic';
$wgHooks['LinkEnd'][] = 'SFFormLinker::setBrokenLink';
$wgHooks['UnknownAction'][] = 'SFFormEditTab::displayForm';
// 'SkinTemplateNavigation' replaced 'SkinTemplateTabs' in the Vector skin
$wgHooks['SkinTemplateTabs'][] = 'SFFormEditTab::displayTab';
$wgHooks['SkinTemplateNavigation'][] = 'SFFormEditTab::displayTab2';
$wgHooks['smwInitProperties'][] = 'SFUtils::initProperties';
$wgHooks['AdminLinks'][] = 'sffAddToAdminLinks';
$wgHooks['ParserBeforeStrip'][] = 'SFUtils::cacheFormDefinition';
$wgHooks['ParserFirstCallInit'][] = 'SFParserFunctions::registerFunctions';
$wgHooks['MakeGlobalVariablesScript'][] = 'SFFormUtils::setGlobalJSVariables';

$wgAPIModules['sfautocomplete'] = 'SFAutocompleteAPI';

// register all special pages and other classes
$wgSpecialPages['Forms'] = 'SFForms';
$wgAutoloadClasses['SFForms'] = $sfgIP . '/specials/SF_Forms.php';
$wgSpecialPageGroups['Forms'] = 'pages';
$wgSpecialPages['CreateForm'] = 'SFCreateForm';
$wgAutoloadClasses['SFCreateForm'] = $sfgIP . '/specials/SF_CreateForm.php';
$wgSpecialPageGroups['CreateForm'] = 'sf_group';
$wgSpecialPages['Templates'] = 'SFTemplates';
$wgAutoloadClasses['SFTemplates'] = $sfgIP . '/specials/SF_Templates.php';
$wgSpecialPageGroups['Templates'] = 'pages';
$wgSpecialPages['CreateTemplate'] = 'SFCreateTemplate';
$wgAutoloadClasses['SFCreateTemplate'] = $sfgIP . '/specials/SF_CreateTemplate.php';
$wgSpecialPageGroups['CreateTemplate'] = 'sf_group';
$wgSpecialPages['CreateProperty'] = 'SFCreateProperty';
$wgAutoloadClasses['SFCreateProperty'] = $sfgIP . '/specials/SF_CreateProperty.php';
$wgSpecialPageGroups['CreateProperty'] = 'sf_group';
$wgSpecialPages['CreateCategory'] = 'SFCreateCategory';
$wgAutoloadClasses['SFCreateCategory'] = $sfgIP . '/specials/SF_CreateCategory.php';
$wgSpecialPageGroups['CreateCategory'] = 'sf_group';
$wgSpecialPages['CreateClass'] = 'SFCreateClass';
$wgAutoloadClasses['SFCreateClass'] = $sfgIP . '/specials/SF_CreateClass.php';
$wgSpecialPageGroups['CreateClass'] = 'sf_group';
$wgSpecialPages['FormStart'] = 'SFFormStart';
$wgAutoloadClasses['SFFormStart'] = $sfgIP . '/specials/SF_FormStart.php';
$wgSpecialPageGroups['FormStart'] = 'sf_group';
$wgSpecialPages['FormEdit'] = 'SFFormEdit';
$wgAutoloadClasses['SFFormEdit'] = $sfgIP . '/specials/SF_FormEdit.php';
$wgSpecialPageGroups['FormEdit'] = 'sf_group';
$wgSpecialPages['RunQuery'] = 'SFRunQuery';
$wgAutoloadClasses['SFRunQuery'] = $sfgIP . '/specials/SF_RunQuery.php';
$wgSpecialPageGroups['RunQuery'] = 'sf_group';
// different upload-window class for MW 1.16+
if ( class_exists( 'HTMLTextField' ) ) { // added in MW 1.16
	$wgSpecialPages['UploadWindow'] = 'SFUploadWindow2';
	$wgAutoloadClasses['SFUploadWindow2'] = $sfgIP . '/specials/SF_UploadWindow2.php';
} else {
	$wgSpecialPages['UploadWindow'] = 'SFUploadWindow';
	$wgAutoloadClasses['SFUploadWindow'] = $sfgIP . '/specials/SF_UploadWindow.php';
}
$wgAutoloadClasses['SFTemplateField'] = $sfgIP . '/includes/SF_TemplateField.php';
$wgAutoloadClasses['SFForm'] = $sfgIP . '/includes/SF_FormClasses.php';
$wgAutoloadClasses['SFTemplateInForm'] = $sfgIP . '/includes/SF_FormClasses.php';
$wgAutoloadClasses['SFFormField'] = $sfgIP . '/includes/SF_FormField.php';
$wgAutoloadClasses['SFFormPrinter'] = $sfgIP . '/includes/SF_FormPrinter.php';
$wgAutoloadClasses['SFTextInput'] = $sfgIP . '/includes/SF_FormInputs.php';
$wgAutoloadClasses['SFTextAreaInput'] = $sfgIP . '/includes/SF_FormInputs.php';
$wgAutoloadClasses['SFTextWithAutocompleteInput'] = $sfgIP . '/includes/SF_FormInputs.php';
$wgAutoloadClasses['SFTextAreaWithAutocompleteInput'] = $sfgIP . '/includes/SF_FormInputs.php';
$wgAutoloadClasses['SFCheckboxInput'] = $sfgIP . '/includes/SF_FormInputs.php';
$wgAutoloadClasses['SFDateInput'] = $sfgIP . '/includes/SF_FormInputs.php';
$wgAutoloadClasses['SFDateTimeInput'] = $sfgIP . '/includes/SF_FormInputs.php';
$wgAutoloadClasses['SFDropdownInput'] = $sfgIP . '/includes/SF_FormInputs.php';
$wgAutoloadClasses['SFRadioButtonInput'] = $sfgIP . '/includes/SF_FormInputs.php';
$wgAutoloadClasses['SFListBoxInput'] = $sfgIP . '/includes/SF_FormInputs.php';
$wgAutoloadClasses['SFCheckboxesInput'] = $sfgIP . '/includes/SF_FormInputs.php';
$wgAutoloadClasses['SFComboBoxInput'] = $sfgIP . '/includes/SF_FormInputs.php';
$wgAutoloadClasses['SFCategoryInput'] = $sfgIP . '/includes/SF_FormInputs.php';
$wgAutoloadClasses['SFCategoriesInput'] = $sfgIP . '/includes/SF_FormInputs.php';
$wgAutoloadClasses['SFFormUtils'] = $sfgIP . '/includes/SF_FormUtils.php';
$wgAutoloadClasses['SFFormEditTab'] = $sfgIP . '/includes/SF_FormEditTab.php';
$wgAutoloadClasses['SFFormEditPage'] = $sfgIP . '/includes/SF_FormEditPage.php';
$wgAutoloadClasses['SFUtils'] = $sfgIP . '/includes/SF_Utils.php';
$wgAutoloadClasses['SFFormLinker'] = $sfgIP . '/includes/SF_FormLinker.php';
$wgAutoloadClasses['SFParserFunctions'] = $sfgIP . '/includes/SF_ParserFunctions.php';
$wgAutoloadClasses['SFAutocompleteAPI'] = $sfgIP . '/includes/SF_AutocompleteAPI.php';
$wgJobClasses['createPage'] = 'SFCreatePageJob';
$wgAutoloadClasses['SFCreatePageJob'] = $sfgIP . '/includes/SF_CreatePageJob.php';
require_once( $sfgIP . '/languages/SF_Language.php' );

$wgExtensionMessagesFiles['SemanticForms'] = $sfgIP . '/languages/SF_Messages.php';
$wgExtensionAliasesFiles['SemanticForms'] = $sfgIP . '/languages/SF_Aliases.php';
// Allow for file-upload windows for MW >= 1.16.1
$wgEditPageFrameOptions = 'SAMEORIGIN';

// register client-side modules
if ( defined( 'MW_SUPPORTS_RESOURCE_MODULES' ) ) {
	$sfgResourceTemplate = array(
		'localBasePath' => $sfgIP,
		'remoteExtPath' => 'SemanticForms'
	);
	$wgResourceModules += array(
		'ext.semanticforms.main' => $sfgResourceTemplate + array(
			'scripts' => array(
				'libs/SemanticForms.js',
				'libs/SF_ajax_form_preview.js',
			),
			'styles' => array(
				'skins/SemanticForms.css',
				'skins/SF_jquery_ui_overrides.css',
			),
			'dependencies' => array(
				'jquery.ui.autocomplete',
				'jquery.ui.button',
				'jquery.ui.sortable',
			),
		),
		'ext.semanticforms.fancybox' => $sfgResourceTemplate + array(
			'scripts' => 'libs/jquery.fancybox-1.3.1.js',
			'styles' => 'skins/jquery.fancybox-1.3.1.css',
		),
		'ext.semanticforms.autogrow' => $sfgResourceTemplate + array(
			'scripts' => 'libs/SF_autogrow.js',
		),
		'ext.semanticforms.popupformedit' => $sfgResourceTemplate + array(
			'scripts' => 'libs/SF_popupform.js',
			'styles' => 'skins/SF_popupform.css',
			'dependencies' => array( 'jquery' ),
		),
	);
}

// PHP fails to find relative includes at some level of inclusion:
// $pathfix = $IP . $sfgScriptPath;

// load global functions
require_once( 'includes/SF_GlobalFunctions.php' );

sffInitNamespaces();

# ##
# The number of allowed values per autocomplete - too many might
# slow down the database, and Javascript's completion
# ##
$sfgMaxAutocompleteValues = 1000;

# ##
# Whether to autocomplete on all characters in a string, not just the
# beginning of words - this is especially important for Unicode strings,
# since the use of the '\b' regexp character to match on the beginnings
# of words fails for them.
# ##
$sfgAutocompleteOnAllChars = false;

# ##
# Global variables for handling the two edit tabs (for traditional editing
# and for editing with a form):
# $sfgRenameEditTabs renames the edit-with-form tab to just "Edit", and
#   the traditional-editing tab, if it is visible, to "Edit source", in
#   whatever language is being used.
# $sfgRenameMainEditTab renames only the traditional editing tab, to
#   "Edit source".
# The wgGroupPermissions 'viewedittab' setting dictates which types of
# visitors will see the "Edit" tab, for pages that are editable by form -
# by default all will see it.
# ##
$sfgRenameEditTabs = false;
$sfgRenameMainEditTab = false;
$wgGroupPermissions['*']['viewedittab']   = true;
$wgAvailableRights[] = 'viewedittab';

# ##
# Permission to edit form fields defined as 'restricted'
# ##
$wgGroupPermissions['sysop']['editrestrictedfields'] = true;
$wgAvailableRights[] = 'editrestrictedfields';

# ##
# Permission to view, and create pages with, Special:CreateClass
# ##
$wgGroupPermissions['user']['createclass'] = true;
$wgAvailableRights[] = 'createclass';

# ##
# List separator character
# ##
$sfgListSeparator = ",";

# ##
# Extend the edit form from the internal EditPage class rather than using a
# special page and hacking things up.
# 
# @note This is experimental and requires updates to EditPage which I have only
#       added into MediaWiki 1.14a
# ##
$sfgUseFormEditPage = false;// method_exists('EditPage', 'showFooter');

# ##
# Use 24-hour time format in forms, e.g. 15:30 instead of 3:30 PM
# ##
$sfg24HourTime = false;

# ##
# Cache parsed form definitions in the page_props table, to improve loading
# speed
# ##
$sfgCacheFormDefinitions = false;

# ##
# When modifying red links to potentially point to a form to edit that page,
# check only the properties pointing to that missing page from the page the
# user is currently on, instead of from all pages in the wiki.
# ##
$sfgRedLinksCheckOnlyLocalProps = false;

# ##
# Page properties, used for the API
# ##
$wgPageProps['formdefinition'] = 'Definition of the semantic form used on the page';
 
# ##
# Global variables for Javascript
# ##
$sfgShowOnSelect = array();
$sfgAutocompleteValues = array();
$sfgInitJSFunctions = array();
$sfgValidationJSFunctions = array();
