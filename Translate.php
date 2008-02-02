<?php
if (!defined('MEDIAWIKI')) die();
/**
 * An extension to ease the translation of Mediawiki and other projects.
 *
 * @addtogroup Extensions
 *
 * @author Niklas Laxström
 * @copyright Copyright © 2006-2008, Niklas Laxström
 * @copyright Copyright © 2007, Siebrand Mazeland
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 */

define( 'TRANSLATE_VERSION', '7.22' );

$wgExtensionCredits['specialpage'][] = array(
	'name' => 'Translate',
	'version' => TRANSLATE_VERSION,
	'author' => array( 'Niklas Laxström', 'Siebrand Mazeland' ),
	'description' => '[[Special:Translate|Special page]] for translating Mediawiki and beyond',
	'descriptionmsg' => 'translate-desc',
	'url' => 'http://www.mediawiki.org/wiki/Extension:Translate',
);

$dir = dirname(__FILE__) . '/';
$wgAutoloadClasses['TranslateTasks'] = $dir . 'TranslateTasks.php';
$wgAutoloadClasses['TaskOptions'] = $dir . 'TranslateTasks.php';

$wgAutoloadClasses['TranslateUtils'] = $dir . 'TranslateUtils.php';
$wgAutoloadClasses['HTMLSelector'] = $dir . 'TranslateUtils.php';

$wgAutoloadClasses['MessageChecks'] = $dir . 'MessageChecks.php';
$wgAutoloadClasses['MessageGroups'] = $dir . 'MessageGroups.php';

$wgAutoloadClasses['MessageCollection'] = $dir . 'Message.php';
$wgAutoloadClasses['TMessage'] = $dir . 'Message.php';

$wgAutoloadClasses['CoreExporter'] = $dir . 'Exporters.php';
$wgAutoloadClasses['StandardExtensionExporter'] = $dir . 'Exporters.php';
$wgAutoloadClasses['MultipleFileExtensionExporter'] = $dir . 'Exporters.php';


$wgAutoloadClasses['TranslateEditAddons'] = $dir . 'TranslateEditAddons.php';
$wgAutoloadClasses['languages'] = $IP . '/maintenance/language/languages.inc';
$wgAutoloadClasses['MessageWriter'] = $IP . '/maintenance/language/writeMessagesArray.inc';


$wgAutoloadClasses['SpecialTranslate'] = $dir . 'TranslatePage.php';
$wgAutoloadClasses['SpecialMagic'] = $dir . 'SpecialMagic.php';
$wgAutoloadClasses['SpecialTranslationChanges'] = $dir . 'SpecialTranslationChanges.php';


$wgExtensionMessagesFiles['Translate'] = $dir . 'Translate.i18n.php';

$wgSpecialPages['Translate'] = 'SpecialTranslate';
$wgSpecialPages['Magic'] = 'SpecialMagic';
$wgSpecialPages['TranslationChanges'] = 'SpecialTranslationChanges';

$wgHooks['EditPage::showEditForm:initial'][] = 'TranslateEditAddons::addTools';

define( 'TRANSLATE_FUZZY', '!!FUZZY!!' );
define( 'TRANSLATE_INDEXFILE', $dir . 'messageindex.ser' );
define( 'TRANSLATE_CHECKFILE', $dir . 'messagecheck.ser' );

#
# Configuration variables
#

/** Where to look for extension files */
$wgTranslateExtensionDirectory = "$IP/extensions/";

/** Which other language translations are displayed to help translator */
$wgTranslateLanguageFallbacks = array();

/** Name of the fuzzer bot */
$wgTranslateFuzzyBotName = 'FuzzyBot';

/** Address to css if non-default or false */
$wgTranslateCssLocation = $wgScriptPath . '/extensions/Translate';

/** Language code for special documentation language */
$wgTranslateDocumentationLanguageCode = false;

/** AC = Available classes */
$wgTranslateAC = array(
'core'                      => 'CoreMessageGroup',
'core-mostused'             => 'CoreMostUsedMessageGroup',
'ext-0-all'                 => 'AllMediawikiExtensionsGroup',
'ext-0-wikimedia'           => 'AllWikimediaExtensionsGroup',
'ext-advancedrandom'        => 'AdvancedRandomMessageGroup',
'ext-automaticgroups'       => 'AutomaticGroups',
'ext-ajaxshoweditors'       => 'AjaxShowEditorsMessageGroup',
'ext-antispoof'             => 'AntiSpoofMessageGroup',
'ext-assertedit'            => 'AssertEditMessageGroup',
'ext-asksql'                => 'AsksqlMessageGroup',
'ext-backandforth'          => 'BackAndForthMessageGroup',
'ext-badimage'              => 'BadImageMessageGroup',
'ext-blahtex'               => 'BlahtexMessageGroup',
'ext-blocktitles'           => 'BlockTitlesMessageGroup',
'ext-boardvote'             => 'BoardVoteMessageGroup',
'ext-bookinformation'       => 'BookInformationMessageGroup',
'ext-call'                  => 'CallMessageGroup',
'ext-categorystepper'       => 'CategoryStepperMessageGroup',
'ext-categorytree'          => 'CategoryTreeMessageGroup',
'ext-centralauth'           => 'CentralAuthMessageGroup',
'ext-changeauthor'          => 'ChangeAuthorMessageGroup',
'ext-checkuser'             => 'CheckUserMessageGroup',
'ext-chemistry'             => 'ChemFunctionsMessageGroup',
'ext-cite'                  => 'CiteMessageGroup',
'ext-citespecial'           => 'CiteSpecialMessageGroup',
'ext-commentspammer'        => 'CommentSpammerMessageGroup',
'ext-confirmaccount'        => 'ConfirmAccountMessageGroup',
'ext-confirmedit'           => 'ConfirmEditMessageGroup',
'ext-confirmeditfancycaptcha' => 'ConfirmEditFancyCaptchaMessageGroup',
'ext-contactpage'           => 'ContactPageMessageGroup',
'ext-contributionscores'    => 'ContributionScoresMessageGroup',
'ext-contributionseditcount'=> 'ContributionseditcountMessageGroup',
'ext-contributors'          => 'ContributorsMessageGroup',
'ext-countedits'            => 'CountEditsMessageGroup',
'ext-crossnamespacelinks'   => 'CrossNamespaceLinksMessageGroup',
'ext-deletedcontribs'       => 'DeletedContribsMessageGroup',
'ext-dismissablesitenotice' => 'DismissableSiteNoticeMessageGroup',
'ext-duplicator'            => 'DuplicatorMessageGroup',
'ext-editcount'             => 'EditcountMessageGroup',
'ext-eval'                  => 'EvalMessageGroup',
'ext-expandtemplates'       => 'ExpandTemplatesMessageGroup',
'ext-farmer'                => 'FarmerMessageGroup',
'ext-fckeditor'             => 'FCKeditorMessageGroup',
'ext-findspam'              => 'FindSpamMessageGroup',
'ext-flaggedrevs'           => 'FlaggedRevsMessageGroup',
'ext-flaggedrevsmakereviewer' => 'FlaggedRevsMakeReviewerMessageGroup',
'ext-formatemail'           => 'FormatEmailMessageGroup',
'ext-gadgets'               => 'GadgetsMessageGroup',
'ext-icon'                  => 'IconMessageGroup',
'ext-imagemap'              => 'ImageMapMessageGroup',
'ext-importfreeimages'      => 'ImportFreeImagesMessageGroup',
'ext-inputbox'              => 'InputBoxMessageGroup',
'ext-inspectcache'          => 'InspectCacheMessageGroup',
'ext-intersection'          => 'IntersectionMessageGroup',
'ext-interwiki'             => 'InterwikiMessageGroup',
'ext-languageselector'      => 'LanguageSelectorMessageGroup',
'ext-latexdoc'              => 'LatexDocMessageGroup',
'ext-linksearch'            => 'LinkSearchMessageGroup',
'ext-liquidthreads'         => 'LiquidThreadsMessageGroup',
'ext-lookupuser'            => 'LookupUserMessageGroup',
'ext-lucenesearch'          => 'LuceneSearchMessageGroup',
'ext-mathstat'              => 'MathStatMessageGroup',
'ext-mediafunctions'        => 'MediaFunctionsMessageGroup',
'ext-metavidwiki'           => 'MetavidWikiMessageGroup',
'ext-microid'               => 'MicroIDMessageGroup',
'ext-minidonation'          => 'MiniDonationMessageGroup',
'ext-minimumnamelength'     => 'MinimumNameLengthMessageGroup',
'ext-minipreview'           => 'MiniPreviewMessageGroup',
'ext-multiboilerplate'      => 'MultiBoilerplateMessageGroup',
'ext-multiupload'           => 'MultiUploadMessageGroup',
'ext-networkauth'           => 'NetworkAuthMessageGroup',
'ext-newestpages'           => 'NewestPagesMessageGroup',
'ext-newuserlog'            => 'NewuserLogMessageGroup',
'ext-newusernotif'          => 'NewUserNotifMessageGroup',
'ext-nuke'                  => 'NukeMessageGroup',
'ext-ogghandler'            => 'OggHandlerMessageGroup',
#'ext-openid'                => 'OpenIDMessageGroup',
'ext-oversight'             => 'OversightMessageGroup',
'ext-pageby'                => 'PageByMessageGroup',
'ext-passwordreset'         => 'PasswordResetMessageGroup',
'ext-parserdifftest'        => 'ParserDiffTestMessageGroup',
'ext-parserfunctions'       => 'ParserfunctionsMessageGroup',
'ext-patroller'             => 'PatrollerMessageGroup',
'ext-pdfhandler'            => 'PdfHandlerMessageGroup',
'ext-player'                => 'PlayerMessageGroup',
'ext-postcomment'           => 'PostCommentMessageGroup',
'ext-povwatch'              => 'PovWatchMessageGroup',
'ext-profilemonitor'        => 'ProfileMonitorMessageGroup',
'ext-proofreadpage'         => 'ProofreadPageMessageGroup',
'ext-protectsection'        => 'ProtectSectionMessageGroup',
'ext-purge'                 => 'PurgeMessageGroup',
'ext-purgecache'            => 'PurgeCacheMessageGroup',
'ext-quiz'                  => 'QuizMessageGroup',
'ext-randomincategory'      => 'RandomInCategoryMessageGroup',
'ext-regexblock'            => 'RegexBlockMessageGroup',
'ext-renameuser'            => 'RenameUserMessageGroup',
'ext-resign'                => 'ResignMessageGroup',
'ext-review'                => 'ReviewMessageGroup',
'ext-scanset'               => 'ScanSetMessageGroup',
'ext-seealso'               => 'SeealsoMessageGroup',
'ext-selectcategory'        => 'SelectCategoryMessageGroup',
'ext-semanticdrilldown'     => 'SemanticDrilldownMessageGroup',
'ext-semanticforms'         => 'SemanticFormsMessageGroup',
'ext-showprocesslist'       => 'ShowProcesslistMessageGroup',
'ext-signdocument'          => 'SignDocumentMessageGroup',
'ext-signdocumentspecial'   => 'SignDocumentSpecialMessageGroup',
'ext-signdocumentspecialcreate' => 'SignDocumentSpecialCreateMessageGroup',
'ext-sitematrix'            => 'SiteMatrixMessageGroup',
'ext-smoothgallery'         => 'SmoothGalleryMessageGroup',
'ext-spamblacklist'         => 'SpamBlacklistMessageGroup',
'ext-spamdifftool'          => 'SpamDiffToolMessageGroup',
'ext-spamregex'             => 'SpamRegexMessageGroup',
'ext-specialfilelist'       => 'SpecialFileListMessageGroup',
'ext-specialform'           => 'SpecialFormMessageGroup',
'ext-stalepages'            => 'StalePagesMessageGroup',
'ext-syntaxhighlightgeshi'  => 'SyntaxHighlight_GeSHiMessageGroup',
'ext-talkhere'              => 'TalkHereMessageGroup',
'ext-templatelink'          => 'TemplateLinkMessageGroup',
'ext-throttle'              => 'ThrottleMessageGroup',
'ext-tidytab'               => 'TidyTabMessageGroup',
'ext-titleblacklist'        => 'TitleBlacklistMessageGroup',
'ext-todo'                  => 'TodoMessageGroup',
'ext-todotasks'             => 'TodoTasksMessageGroup',
'ext-translate'             => 'TranslateMessageGroup',
'ext-usagestatistics'       => 'UsageStatisticsMessageGroup',
'ext-usercontactlinks'      => 'UserContactLinksMessageGroup',
'ext-userimages'            => 'UserImagesMessageGroup',
'ext-usermerge'             => 'UserMergeMessageGroup',
'ext-usernameblacklist'     => 'UsernameBlacklistMessageGroup',
'ext-userrightsnotif'       => 'UserRightsNotifMessageGroup',
'ext-vote'                  => 'VoteMessageGroup',
'ext-watchers'              => 'WatchersMessageGroup',
'ext-webstore'              => 'WebStoreMessageGroup',
'ext-whoiswatching'         => 'WhoIsWatchingMessageGroup',
'ext-wikidatalanguagemanager' => 'WikidataLanguageManagerMessageGroup',
'out-freecol'               => 'FreeColMessageGroup',
);

/** EC = Enabled classes */
$wgTranslateEC = array();
$wgTranslateEC[] = 'core';

/** CC = Custom classes */
$wgTranslateCC = array();

/** Tasks */
$wgTranslateTasks = array(
	'view'           => 'ViewMessagesTask',
	'untranslated'   => 'ViewUntranslatedTask',
	'optional'       => 'ViewOptionalTask',
	'review'         => 'ReviewMessagesTask',
	'reviewall'      => 'ReviewAllMessagesTask',
	'export-as-po'   => 'ExportasPoMessagesTask',
	'export'         => 'ExportMessagesTask',
	'export-to-file' => 'ExportToFileMessagesTask',
);
