<?php
/**
 * ***** BEGIN LICENSE BLOCK *****
 * This file is part of QPoll.
 * Uses parts of code from Quiz extension (c) 2007 Louis-Rémi BABE. All rights reserved.
 *
 * QPoll is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * QPoll is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with QPoll; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 *
 * ***** END LICENSE BLOCK *****
 *
 * QPoll is a poll tool for MediaWiki.
 *
 * To activate this extension :
 * * Create a new directory named QPoll into the directory "extensions" of MediaWiki.
 * * Place the files from the extension archive there.
 * * Add this line at the end of your LocalSettings.php file :
 * require_once "$IP/extensions/QPoll/qp_user.php";
 *
 * @version 0.8.0a
 * @link http://www.mediawiki.org/wiki/Extension:QPoll
 * @author QuestPC <questpc@rambler.ru>
 */

if ( !defined( 'MEDIAWIKI' ) ) {
	die( "This file is part of the QPoll extension. It is not a valid entry point.\n" );
}

# interpretation scripts namespace
define( 'NS_QP_INTERPRETATION', 800 );
# talk namespace is always + 1
define( 'NS_QP_INTERPRETATION_TALK', 801 );

qp_Setup::init();

/**
 * Extension's parameters.
 */
$wgExtensionCredits['parserhook'][] = array(
	'path' => __FILE__,
	'name' => 'QPoll',
	'version' => '0.8.0a',
	'author' => 'Dmitriy Sintsov',
	'url' => 'http://www.mediawiki.org/wiki/Extension:QPoll',
	'descriptionmsg' => 'qp_desc',
);
$wgExtensionCredits['specialpage'][] = array(
	'path' => __FILE__,
	'name' => 'QPoll results page',
	'version' => '0.8.0a',
	'author' => 'Dmitriy Sintsov',
	'url' => 'http://www.mediawiki.org/wiki/Extension:QPoll',
	'descriptionmsg' => 'qp_desc-sp',
);

if ( isset( $wgResourceModules ) ) {
	$wgResourceModules['ext.qpoll'] = array(
		'scripts' => 'clientside/qp_user.js',
		'styles' => 'clientside/qp_user.css',
		'localBasePath' => dirname( __FILE__ ),
		'remoteExtPath' => 'QPoll'
	);
	$wgResourceModules['ext.qpoll.special.pollresults'] = array(
		'styles' => 'clientside/qp_results.css',
		'localBasePath' => dirname( __FILE__ ),
		'remoteExtPath' => 'QPoll'
	);
}

/**
 * Interpretation script debug function
 * @param $args  array $args[0] - string message
 *                     $args[1] - variable to dump (optional)
 *                     $args[2] - bool true / false enable / disable output (optional)
 */
function qp_debug( /* $args */ ) {
	$args = func_get_args();
	if ( count( $args ) < 1 ) {
		return;
	}
	$message = strval( $args[0] );
	$debug = true;
	if ( count( $args ) > 2 ) {
		$debug = $args[2];
	}
	if ( $debug !== true ) {
		return;
	}
	if ( count( $args ) > 1 ) {
		ob_start();
		var_dump( $args[1] );
		$var_value = ob_get_contents();
		ob_end_clean();
		$message = "{$message} = {$var_value}\n";
	}
	wfDebugLog( 'qpoll', $message );
}

/**
 * Interpretation script text lowercase function (according to content language)
 */
function qp_lc( $text ) {
	global $wgContLang;
	return $wgContLang->lc( $text );
}

/**
 * Returns either scalar or associative array with structured interpretation
 * of the specified poll for the current user
 *
 * @return  scalar/array when success; null when there is no structured interpretation
 */
function qp_getStructuredInterpretation( $poll_address ) {
	$pollStore = qp_PollStore::newFromAddr( $poll_address );
	if ( !( $pollStore instanceof qp_PollStore ) || $pollStore->pid === null ) {
		return null;
	}
	$username = qp_Setup::getCurrUserName();
	$pollStore->loadQuestions();
	$pollStore->setLastUser( $username, false );
	if ( $pollStore->interpResult->structured === '' ) {
		return null;
	}
	return unserialize( $pollStore->interpResult->structured );
}

/**
 * Extension's global settings and initializiers
 * should be purely static and preferrably have no constructor
 */
class qp_Setup {

	const ERROR_MISSED_TITLE = 1;
	const ERROR_INVALID_ADDRESS = 2;
	const MAX_TEXT_ANSWER_LENGTH = 1024;

	static $pollTag = 'qpoll';
	static $interpTag = 'qpinterpret';
	# parser $interpTag hook output market list
	static $markerList = array();

	static $ExtDir; // filesys path with windows path fix
	static $ScriptPath; // apache virtual path
	static $messagesLoaded = false; // check whether the extension's localized messages are loaded
	static $article; // Article instance we got from hook parameter
	static $title; // Title instance we got from hook parameter
	static $user; // User instance we got from hook parameter

	static $questionTypes = array(
		'[]' => array(
			'ctrl' => 'qp_TabularQuestion',
			'view' => 'qp_TabularQuestionView',
			'mType' => 'multipleChoice'
		),
		'()' => array(
			'ctrl' => 'qp_TabularQuestion',
			'view' => 'qp_TabularQuestionView',
			'mType' => 'singleChoice'
		),
		'unique()' => array(
			'ctrl' => 'qp_TabularQuestion',
			'view' => 'qp_TabularQuestionView',
			'mType' => 'singleChoice',
			'mSubType' => 'unique'
		),
		'mixed' => array(
			'ctrl' => 'qp_MixedQuestion',
			'view' => 'qp_TabularQuestionView',
			'mType' => 'mixedChoice'
		),
		'text' => array(
			'ctrl' => 'qp_TextQuestion',
			'view' => 'qp_TextQuestionView',
			'mType' => 'textQuestion',
			'mSubType' => 'requireAllCategories'
		),
		'text!' => array(
			'ctrl' => 'qp_TextQuestion',
			'view' => 'qp_TextQuestionView',
			'mType' => 'textQuestion'
		)
	);

	# interpretation script namespaces with their canonical names
	static $interpNamespaces = array(
		NS_QP_INTERPRETATION => 'Interpretation',
		NS_QP_INTERPRETATION_TALK => 'Interpretation_talk'
	);
	# stores interpretation script line numbers separately for
	# every script language (currently only php eval is implemented)
	# key is value of <qpinterpret> xml tag 'lang' attribute, value is source line counter
	static $scriptLinesCount = array();

	/**
	 * default configuration settings
	 * (can be modified in LocalSettings.php after require_once(...) )
	 */
	# disable global showresults attribute
	public static $global_showresults = 0;
	# disable appending of 'X-Forwarded-For' client address chain to the anonymous username (in the form of 'proxy_IP/client_IP')
	public static $anon_forwarded_for = false;
	# enable parser and article caches control for better performance (somewhat experimental, may break compatibility; checked with MW v1.15, v1.16)
	public static $cache_control = false;
	# number of submit attempts allowed (0 or less for infinite number)
	public static $max_submit_attempts = 0;
	# maximal length of question proposal row
	# tuned for MySQL ROW_FORMAT=REDUNDANT, ROW_FORMAT=COMPACT
	# feel free to increase the value for ROW_FORMAT=DYNAMIC, ROW_FORMAT=COMPRESSED
	# however make sure that the whole row will fit into DB page,
	# otherwise the performance may decrease
	# it is important only for question type="text", where
	# proposal text contains serialized array of proposal parts and category fields
	public static $proposal_max_length = 768;
	# not larger than DB field size, otherwise serialization will be invalid
	public static $structured_interpretation_max_length = 65535;
	# whether to show short, long, structured interpretation results to end user
	public static $show_interpretation = array(
		'short' => true,
		'long' => true,
		'structured' => true
	);
	/* end of default configuration settings */

	static function entities( $s ) {
		return htmlentities( $s, ENT_COMPAT, 'UTF-8' );
	}

	static function specialchars( $s ) {
		return htmlspecialchars( $s, ENT_COMPAT, 'UTF-8' );
	}

	/**
	 * Autoload classes from the map provided
	 */
	static function autoLoad( $map ) {
		global $wgAutoloadClasses;
		foreach ( $map as $path => &$classes ) {
			if ( is_array( $classes ) ) {
				foreach ( $classes as &$className ) {
					$wgAutoloadClasses[$className] = self::$ExtDir . '/' . $path;
				}
			} else {
				$wgAutoloadClasses[$classes] = self::$ExtDir . '/' . $path;
			}
		}
	}

	/**
	 * Add this extension to the mediawiki's extensions list.
	 */
	static function init() {
		global $wgScriptPath;
		global $wgExtensionMessagesFiles, $wgExtensionAliasesFiles;
		global $wgSpecialPages;
		global $wgHooks;
		global $wgExtraNamespaces, $wgNamespaceProtection;
		global $wgGroupPermissions;
		global $wgDebugLogGroups;

		# local / remote path
		self::$ExtDir = str_replace( "\\", "/", dirname( __FILE__ ) );
		$dirs = explode( '/', self::$ExtDir );
		$top_dir = array_pop( $dirs );
		self::$ScriptPath = $wgScriptPath . '/extensions' . ( ( $top_dir == 'extensions' ) ? '' : '/' . $top_dir );

		# language files
		# extension messages
		$wgExtensionMessagesFiles['QPoll'] = self::$ExtDir . '/i18n/qp.i18n.php';
		# localized namespace names
		$wgExtensionMessagesFiles['QPollNamespaces'] = self::$ExtDir . '/i18n/qp.namespaces.php';
		# localized special page titles
		$wgExtensionAliasesFiles['QPoll'] = self::$ExtDir . '/i18n/qp.alias.php';

		# extension setup, hooks handling and content transformation
		self::autoLoad( array(
			'qp_user.php' => 'qp_Setup',
			'includes/qp_functionshook.php' => 'qp_FunctionsHook',
			'includes/qp_renderer.php' => 'qp_Renderer',
			'includes/qp_excel.php' => 'qp_Excel',

			## DB schema updater
			'maintenance/qp_schemaupdater.php' => 'qp_SchemaUpdater',

			## controllers (polls and questions derived from separate abstract classes)
			# polls
			'ctrl/poll/qp_abstractpoll.php' => 'qp_AbstractPoll',
			'ctrl/poll/qp_poll.php' => 'qp_Poll',
			'ctrl/poll/qp_pollstats.php' => 'qp_PollStats',
			# questions
			'ctrl/question/qp_abstractquestion.php' => 'qp_AbstractQuestion',
			'ctrl/question/qp_stubquestion.php' => 'qp_StubQuestion',
			'ctrl/question/qp_tabularquestion.php' => 'qp_TabularQuestion',
			'ctrl/question/qp_mixedquestion.php' => 'qp_MixedQuestion',
			'ctrl/question/qp_textquestion.php' => array( 'qp_TextQuestionOptions', 'qp_TextQuestion' ),
			'ctrl/question/qp_questionstats.php' => 'qp_QuestionStats',
			# interpretation results
			'ctrl/qp_interpresult.php' => 'qp_InterpResult',

			# generic view
			'view/qp_abstractview.php' => 'qp_AbstractView',
			## poll and question views are derived from single generic class
			## isCompatibleController() method is used to check linked controllers (bugcheck)
			# polls
			'view/poll/qp_abstractpollview.php' => 'qp_AbstractPollView',
			'view/poll/qp_pollview.php' => 'qp_PollView',
			'view/poll/qp_pollstatsview.php' => 'qp_PollStatsView',
			# questions
			'view/question/qp_stubquestionview.php' => 'qp_StubQuestionView',
			'view/question/qp_tabularquestionview.php' => 'qp_TabularQuestionView',
			'view/question/qp_textquestionview.php' => 'qp_TextQuestionView',
			'view/question/qp_questionstatsview.php' => 'qp_QuestionStatsView',
			## proposal views are derived from their own base abstract class
			# proposals
			'view/proposal/qp_stubquestionproposalview.php' => 'qp_StubQuestionProposalView',
			'view/proposal/qp_tabularquestionproposalview.php' => 'qp_TabularQuestionProposalView',
			'view/proposal/qp_questionstatsproposalview.php' => 'qp_QuestionStatsProposalView',
			'view/proposal/qp_textquestionproposalview.php' => 'qp_TextQuestionProposalView',
			## question data views are used to display question results in Special:PollResults page
			'view/results/qp_questiondataresults.php' => 'qp_QuestionDataResults',
			'view/results/qp_textquestiondataresults.php' => 'qp_TextQuestionDataResults',
			# interpretation results
			'view/qp_interpresultview.php' => 'qp_InterpResultView',

			## models/storage
			# poll
			'model/qp_pollstore.php' => 'qp_PollStore',
			# question storage; qp_TextQuestionData is very small, thus kept in the same file;
			'model/qp_questiondata.php' => array( 'qp_QuestionData', 'qp_TextQuestionData' ),
			# collection of the questions
			'model/qp_question_collection.php' => 'qp_QuestionCollection',

			# special pages
			'specials/qp_special.php' => array( 'qp_SpecialPage', 'qp_QueryPage' ),
			'specials/qp_results.php' => 'PollResults',
			'specials/qp_webinstall.php' => array( 'qp_WebInstall' ),

			# interpretation of answers
			'interpretation/qp_interpret.php' => 'qp_Interpret',
			'interpretation/qp_eval.php' => 'qp_Eval'
		) );

		# TODO: Use the new technique for i18n of special page aliases
		$wgSpecialPages['PollResults'] = 'PollResults';
		$wgSpecialPages['QPollWebInstall'] = 'qp_WebInstall';
		# TODO: Use the new technique for i18n of magic words
		# instantiating fake instance for PHP < 5.2.3, which does not support 'Class::method' type of callbacks
		$wgHooks['LanguageGetMagic'][] =
		$wgHooks['MediaWikiPerformAction'][] =
		$wgHooks['ParserFirstCallInit'][] =
		$wgHooks['LoadAllMessages'][] =
		$wgHooks['ParserAfterTidy'][] =
		$wgHooks['CanonicalNamespaces'][] = new qp_Setup;
		$wgHooks['LoadExtensionSchemaUpdates'][] = new qp_SchemaUpdater;

		if ( self::mediaWikiVersionCompare( '1.17' ) ) {
			# define namespaces for the interpretation scripts and their talk pages
			# used only for non-localized namespace names in MW < 1.17
			if ( !is_array( $wgExtraNamespaces ) ) {
				$wgExtraNamespaces = array();
			}
			foreach ( self::$interpNamespaces as $ns_idx => $canonical_name ) {
				if ( isset( $wgExtraNamespaces[$ns_idx] ) ) {
					die( "QPoll requires namespace index {$ns_idx} which is already used by another extension. Either disable another extension or change the namespace index." );
				}
			}
			foreach ( self::$interpNamespaces as $ns_idx => $canonical_name ) {
				$wgExtraNamespaces[$ns_idx] = $canonical_name;
			}
		}

		foreach ( self::$interpNamespaces as $ns_idx => $canonical_name ) {
			$wgNamespaceProtection[$ns_idx] = array( 'editinterpretation' );
		}
		# groups which has permission to access poll results by default
		$wgGroupPermissions['sysop']['pollresults'] = true;
		$wgGroupPermissions['bureaucrat']['pollresults'] = true;
		$wgGroupPermissions['polladmin']['pollresults'] = true;
		# groups which can edit interpretation scripts by default
		# please minimize the number of groups as low as you can
		# that is security measure against inserting of malicious code
		# into the source of interpretation scripts
		$wgGroupPermissions['sysop']['editinterpretation'] = true;
		$wgGroupPermissions['bureaucrat']['editinterpretation'] = true;

		$wgDebugLogGroups['qpoll'] = 'qpoll_debug_log.txt';
	}

	static function mediaWikiVersionCompare( $version, $operator = '<' ) {
		global $wgVersion;
		return version_compare( $wgVersion, $version, $operator );
	}

	static function getCurrUserName() {
		global $wgUser, $wgSquidServers;
		global $wgUsePrivateIPs;
		if ( self::$anon_forwarded_for === true && $wgUser->isAnon() ) {
			/* collect the originating IPs
				borrowed from ProxyTools::wfGetIP
				bypass trusted proxies list check */
			# Client connecting to this webserver
			if ( isset( $_SERVER['REMOTE_ADDR'] ) ) {
				$ipchain = array( IP::canonicalize( $_SERVER['REMOTE_ADDR'] ) );
			} else {
				# Running on CLI?
				$ipchain = array( '127.0.0.1' );
			}
			$ip = $ipchain[0];

			# Append XFF on to $ipchain
			$forwardedFor = wfGetForwardedFor();
			if ( isset( $forwardedFor ) ) {
				$xff = array_map( 'trim', explode( ',', $forwardedFor ) );
				$xff = array_reverse( $xff );
				$ipchain = array_merge( $ipchain, $xff );
			}
			$username = "";
			foreach ( $ipchain as $i => $curIP ) {
				if ( $wgUsePrivateIPs || IP::isPublic( $curIP ) ) {
					$username .= IP::canonicalize( $curIP ) . '/';
				}
			}
			if ( $username != "" ) {
				# remove trailing slash
				$username = substr( $username, 0, strlen( $username ) - 1 );
			} else {
				$username .= IP::canonicalize( $ipchain[0] );
			}
		} else {
			$username = $wgUser->getName();
		}
		return $username;
	}

	static function onLoadAllMessages() {
		if ( !self::$messagesLoaded ) {
			self::$messagesLoaded = true;
			# for MW 1.15 which is still being used by many customers
			# please do not remove until 2012
			if ( self::mediaWikiVersionCompare( '1.16' ) ) {
				wfLoadExtensionMessages( 'QPoll' );
			}
		}
		return true;
	}

	static function ParserFunctionsWords( $lang ) {
		$words = array();
		$words[ 'en' ] = array( 'qpuserchoice' => array( 0, 'qpuserchoice' ) );
		# English is used as a fallback, and the English synonyms are
		# used if a translation has not been provided for a given word
		return ( $lang == 'en' || !array_key_exists( $lang, $words ) )
			? $words[ 'en' ]
			: array_merge( $words[ 'en' ], $words[ $lang ] );
	}

	static function onLanguageGetMagic( &$magicWords, $langCode ) {
		foreach ( self::ParserFunctionsWords( $langCode ) as $word => $trans )
			$magicWords [$word ] = $trans;
		return true;
	}

	static function clearCache() {
		if ( self::$cache_control ) {
			global $parserMemc;
			$parserCache = ParserCache::singleton();
			$key = $parserCache->getKey( self::$article, self::$user );
			$parserMemc->delete( $key );
			if ( method_exists( 'Article', 'doPurge' ) ) {
				self::$article->doPurge();
			} else {
				WikiPage::factory( self::$title )->doPurge();
			}
		}
	}

	static function onMediaWikiPerformAction( $output, $article, $title, $user, $request, $wiki ) {
		global $wgCookiePrefix;
		global $qp_enable_showresults; // deprecated since v0.6.5
		global $qp_AnonForwardedFor; // deprecated since v0.6.5
		global $wgUser;
		self::$article = $article;
		self::$title = $title;
		# in MW v1.15 / v1.16 user object was stub;
		# in MW v1.19 it seems to be real object.
		# Unstub for the versions where it is stubbed.
		# Borrowed from Title::getUserPermissionsErrors() MW v1.16
		if ( !StubObject::isRealObject( $user ) ) {
			// Since StubObject is always used on globals, we can unstub $wgUser here and set $user = $wgUser
			global $wgUser;
			$wgUser->_unstub( '', 5 );
			$user = $wgUser;
		}
		self::$user = $user;
		if ( isset( $qp_AnonForwardedFor ) ) {
			self::$anon_forwarded_for = $qp_AnonForwardedFor;
		}
		# setup proper integer global showresults level
		if ( isset( $qp_enable_showresults ) ) {
			self::$global_showresults = $qp_enable_showresults;
		}
		if ( !is_int( self::$global_showresults ) ) {
			# convert from older v0.5 boolean value
			self::$global_showresults = (int) (boolean) self::$global_showresults;
		}
		if ( self::$global_showresults < 0 ) {
			self::$global_showresults = 0;
		} elseif ( self::$global_showresults > 2 ) {
			self::$global_showresults = 2;
		}
		if ( isset( $_COOKIE["{$wgCookiePrefix}QPoll"] ) ) {
			$request->response()->setCookie( 'QPoll', '', time() - 86400 ); // clear cookie
			self::clearCache();
		} elseif ( $request->getVal( 'pollId' ) !== null ) {
			self::clearCache();
		}
		return true;
	}

	/**
	 * Register the extension with the WikiText parser.
	 */
	static function onParserFirstCallInit( $parser ) {
		global $wgOut, $wgTitle;
		if ( !is_object( $wgTitle ) || $wgTitle->getNamespace() === NS_SPECIAL ) {
			# special page will add it's proper module itself;
			# 'ext.qpoll' and 'ext.qpoll.special.pollresults' currently are not
			# designed to be used together
			return true;
		}
		if ( class_exists( 'ResourceLoader' ) ) {
			# MW 1.17+
			// $wgOut->addModules( 'jquery' );
			$wgOut->addModules( 'ext.qpoll' );
		} else {
			# MW < 1.17
			global $wgJsMimeType, $wgContLang;
			# Ouput the style and the script to the header once for all.
			$head = '<script type="' . $wgJsMimeType . '" src="' . self::$ScriptPath . '/clientside/qp_user.js"></script>' . "\n";
			$wgOut->addScript( $head );
			$wgOut->addExtensionStyle( self::$ScriptPath . '/clientside/qp_user.css' );
			if ( $wgContLang->isRTL() ) {
				$wgOut->addExtensionStyle( self::$ScriptPath . '/clientside/qp_user_rtl.css' );
			}
		}
		global $wgQPollFunctionsHook;
		# setup tag hook
		$parser->setHook( self::$pollTag, array( 'qp_Setup', 'showPoll' ) );
		$parser->setHook( self::$interpTag, array( 'qp_Setup', 'showScript' ) );
		$wgQPollFunctionsHook = new qp_FunctionsHook();
		# setup function hook
		$parser->setFunctionHook( 'qpuserchoice', array( &$wgQPollFunctionsHook, 'qpuserchoice' ), SFH_OBJECT_ARGS );
		return true;
	}

	/**
	 * Call the poll parser on an input text.
	 *
	 * @param  $input				Text between <qpoll> and </qpoll> tags, in QPoll syntax.
	 * @param  $argv				An array containing any arguments passed to the extension
	 * @param  &$parser			The wikitext parser.
	 * @param  &$frame			PPFrame object passed in MW 1.16+
	 * @return 						An HTML poll.
	 */

	/* @param  $input				Text between <qpoll> and </qpoll> tags, in QPoll syntax. */
	static function showPoll( $input, $argv, $parser, $frame = false ) {
		if ( !self::$cache_control ) {
			$parser->disableCache();
		}
		if ( array_key_exists( 'address', $argv ) ) {
			$qpoll = new qp_PollStats(
				$argv,
				new qp_PollStatsView( $parser, $frame )
			);
		} else {
			$qpoll = new qp_Poll(
				$argv,
				new qp_PollView( $parser, $frame )
			);
		}
		return $qpoll->parsePoll( $input );
	}

	/**
	 * Show interpetation script source with line numbering (for debugging convenience)
	 *
	 * @param  $input				Text between <qpinterpret> and </qpinterper> tags, subset of PHP syntax.
	 * @param  $argv				An array containing any arguments passed to the extension
	 * @param  &$parser			The wikitext parser.
	 * @param  &$frame			PPFrame object passed in MW 1.16+
	 * @return 						script source with line numbering
	 */
	static function showScript( $input, $argv, $parser, $frame = false ) {
		$lines_count = count( preg_split( '`(\r\n|\n|\r)`', $input, -1 ) );
		$line_numbers = '';
		if ( !isset( $argv['lang'] ) ) {
			return '<strong class="error">' . wfMsg( 'qp_error_eval_missed_lang_attr' ) . '</strong>';
		}
		$lang = $argv['lang'];
		if ( !array_key_exists( $lang, self::$scriptLinesCount ) ) {
			self::$scriptLinesCount[$lang] = 1;
		}
		$slc = &self::$scriptLinesCount[$lang];
		for ( $i = $slc; $i < $slc + $lines_count; $i++ ) {
			$line_numbers .= "{$i}\n";
		}
		$slc = $i;
		$out = array( '__tag' => 'div', 'class' => 'qpoll', 0 => array() );
		if ( is_string( $lintResult = qp_Interpret::lint( $lang, $input ) ) ) {
			$out[0][] = array( '__tag' => 'div', 'class' => 'interp_error', qp_Setup::specialchars( $lintResult ) );
		}
		$out[0][] = array( '__tag' => 'div', 'class' => 'line_numbers', $line_numbers );
		$out[0][] = array( '__tag' => 'div', 'class' => 'script_view', qp_Setup::specialchars( $input ) . "\n" );
		$markercount = count( self::$markerList );
		$marker = "!qpoll-script-view{$markercount}-qpoll!";
		self::$markerList[$markercount] = qp_Renderer::renderTagArray( $out );
		return $marker;
	}

	/**
	 * replace previousely set markers with actual rendered html of source text
	 * which has line numbers for easier way to spot possible eval check errors
	 * otherwise, this html code will be ruined when passed directly to parser
	 */
	static function onParserAfterTidy( $parser, &$text ) {
		# find markers in $text
		# replace markers with actual output
		$keys = array();
		$marker_count = count( self::$markerList );

		for ( $i = 0; $i < $marker_count; $i++ ) {
			$keys[] = "!qpoll-script-view{$i}-qpoll!";
		}

		$text = str_replace( $keys, self::$markerList, $text );
		return true;
	}

	public static function onCanonicalNamespaces( &$list ) {
		# do not use array_merge() as it will destroy negative indexes in $list
		# thus completely ruining the namespaces list
		foreach ( self::$interpNamespaces as $ns_idx => $canonical_name ) {
			$list[$ns_idx] = $canonical_name;
		}
		return true;
	}

} /* end of qp_Setup class */
