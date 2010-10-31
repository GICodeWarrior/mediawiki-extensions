<?php

/*
 * Checks a number of syntax conventions on variables from a valid PHP file.
 *
 * Run as:
 *  find phase3/ \( -name \*.php -or -name \*.inc \) -not \( -name importUseModWiki.php -o -name diffLanguage.php -o -name LocalSettings.php -o -name Parser?????.php \) -exec php tools/code-utils/check-vars.php \{\} +
 */
if( ! $IP = getenv( 'MW_INSTALL_PATH' ) ) {
	$IP = dirname( __FILE__ ) . "/../../phase3/";
}
require_once( "$IP/includes/Defines.php" ); # Faster than parsing
require_once( "$IP/includes/AutoLoader.php" );

$mwDeprecatedFunctions = false;
@include( dirname( __FILE__ ) . "/deprecated.functions" );

if ( !extension_loaded( 'sockets' ) ) dl( 'sockets.so' );
if ( !extension_loaded( 'PDO' ) ) dl( 'pdo.so' );

$wgAutoloadLocalClasses += array(
		'DBAccessError' => 'LBFactory',
		'Maintenance' => 'Maintenance.php',
		'MessageGroup' => 'Translate extension interface',
		'MessageGroups' => 'Translate extension',
		'PremadeMediawikiExtensionGroups' => 'Translate extension',
		'languages' => 'maintenance/language/languages.inc',
		'extensionLanguages' => 'maintenance/language/languages.inc',
		'MessageWriter' => 'maintenance/language/writeMessagesArray.inc',
		'tidy' => 'pecl tidy',
		'PEAR' => 'pear',
		'Normalizer' => 'pecl intl',
		'Mail' => 'pear Mail',

		'UserDupes' => 'maintenance/userDupes.inc',
		'DeleteDefaultMessages' => 'maintenance/deleteDefaultMessages.php',
		'PopulateCategory' => 'maintenance/populateCategory.php',
		'PopulateParentId' => 'maintenance/populateParentId.php',
		'PopulateRevisionLength' => 'maintenance/populateRevisionLength.php',
		'PopulateLogSearch' => 'maintenance/populateLogSearch.php',
		'BaseDump' => 'maintenance/backupPrefetch.inc',
		'ExportProgressFilter' => 'maintenance/backup.inc'
	);

class CheckVars {
	var $mDebug = false;
	static $mDefaultSettingsGlobals = null;
	static $mRequireKnownClasses = array();
	static $mRequireKnownConstants = array();

	static $constantIgnorePrefixes = array( "PGSQL_", "OCI_", "SQLT_BLOB", "DB2_", "XMLREADER_", "SQLSRV_" ); # Ignore constants with these prefixes
	protected $generateDeprecatedList = false;

	/* Values for status */
	const WAITING_FUNCTION = 0;
	const IN_FUNCTION_NAME = 1;
	const IN_FUNCTION = 2;
	const IN_GLOBAL = 3;
	const IN_INTERFACE = 4;
	const IN_REQUIRE_WAITING = 6;
	const IN_FUNCTION_REQUIRE = 8;

	/* Token specializations */
	const CLASS_NAME = -4;
	const CLASS_MEMBER = -5;
	const FUNCTION_NAME = -6;
	const FUNCTION_DEFINITION = -7;

	/* Function attribute */
	const FUNCTION_DEPRECATED = -8;

	function __construct() {
		if ( self::$mDefaultSettingsGlobals == null ) {
			global $IP;
			$this->load( "$IP/includes/DefaultSettings.php", false );
			if ( count( $this->mTokens ) > 0 ) {
				$globals = array (
					'$wgArticle', # Setup.php
					'$wgAutoloadLocalClasses', # AutoLoader.php, a couple of readers					
					'$wgCanonicalNamespaceNames', # Namespace.php
					'$wgContLang', # Setup.php
					'$wgDeferredUpdateList', # Setup.php
					'$wgExtModifiedFields', '$wgExtNewFields', '$wgExtNewIndexes', '$wgExtNewTables', # Updates
					'$wgFeedClasses', # Defines.php, many uses					
					'$wgLang', # Setup.php
					'$wgLanguageNames', # Language.php, read by others
					'$wgMemc', # Setup.php
					'$wgMessageCache', # Setup.php
					'$wgNoDBParam', # maintenance, serialized
					'$wgOut', # Setup.php
					'$wgParser', # Setup.php
					'$wgPostCommitUpdateList', # Initialised in Setup.php, should be removed
					'$wgProfiler', # StartProfiler.php
					'$wgProfiling', # Profiler.php
					'$wgQueryPages', # QueryPage.php
					'$wgRequest', # Setup.php
					'$wgRequestTime', # WebStart.php
					'$wgRUstart', # WebStart.php, for Profiler stuff
					'$wgTitle', # index.php
					'$wgUpdates', # updaters
					'$wgUseEnotif', # Setup.php
					'$wgUseNormalUser', # maintenance
					'$wgUser', # Setup.php
					'$wgWikiFarm', # maintenance, to be removed
				);

				foreach ( $this->mTokens as $token ) {
					if ( is_array( $token ) && ( $token[0] == T_VARIABLE ) && ( substr( $token[1], 0, 3 ) == '$wg' ) ) {
						$globals[] = $token[1];
					}
				}
				self::$mDefaultSettingsGlobals = array_unique( $globals );
				$this->mTokens = array(); # Free
			}
		}
	}

	protected static $mGlobalsPerFile = array( # Variables which are OK, but only on a few files
			'$wgCaches' => array( 'ObjectCache.php', 'phpunit', 'ForkController.php' ),
			'$wgDatabase' => array( 'updaters.inc', 'Installer.php', 'install-utils.inc', 'update.php', 'SqliteInstaller.php' ), # For update scripts
			'$wgHtmlEntities' => array( 'Sanitizer.php' ),
			'$wgHtmlEntityAliases' => array( 'Sanitizer.php' ),
			'$wgFullyInitialised' => array( /* Set */ 'Setup.php', /* read */ 'Exception.php' ),
			'$wgContLanguageCode' => array( 'Setup.php' ),
			'$wgUseLatin1' => array( 'FiveUpgrade.inc' ), # If you upgrade from MW < 1.5 it will be there
			'$wgDatabase' => array( 'DatabaseUpdater.php' ),
			'$wgExtPGNewFields' => array( 'DatabaseUpdater.php', 'PostgresUpdater.php' ),
			'$wgExtPGAlteredFields' => array( 'DatabaseUpdater.php', 'PostgresUpdater.php' ),
			'$errs' => array( 'Installer.php' ),
			'$mainListOpened' => array( 'Installer.php' ),
			'$optionsWithArgs' => array( 'commandLine.inc' ),
			'$args' => array( 'commandLine.inc' ),
			'$options' => array( 'commandLine.inc', 'FiveUpgrade.inc' ),
			'$canonicalDecomp' => array( 'UtfNormalGenerate.php' ),
			'$compatibilityDecomp' => array( 'UtfNormalGenerate.php' ),
			'$mmfl' => array( 'mergeMessageFileList.php' ),
			'$checkBlacklist' => array( 'checkLanguage.inc' ),
			'$stderr' => array( 'serialize.php' ),
		);

	function setGenerateDeprecatedList( $bool = true ) {
		$this->generateDeprecatedList = $bool;
	}
	function getGenerateDeprecatedList() {
		return $this->generateDeprecatedList;
	}
	function saveDeprecatedList( $filename ) {
		$data = "<?php\n\$mwDeprecatedFunctions = array(\n";
		foreach( $this->mDeprecatedFunctionList as $depre => $classes ) {
			$data .= "\t'$depre' => array( " . implode( ", ", $classes ) . " ),\n";
		}
		$data .= "\n);\n\n";
		file_put_contents( $filename, $data );
	}


	function load( $file, $shortcircuit = true ) {
		$this->mProblemCount = 0;
		$this->mFilename = $file;
		
		/* These are used even if it's shortcircuited */
		$this->mKnownFileClasses = array();
		$this->mUnknownClasses = array();
		$this->mConstants = array();

		$source = file_get_contents( $file );
		if ( substr( $source, 0, 3 ) == "\xEF\xBB\xBF" ) {
			$this->warning( "$file has an UTF-8 BOM" );
		}
		$source = rtrim( $source );
		if ( substr( $source, -2 ) == '?>' ) {
			$this->warning( "?> at end of file is deprecated in MediaWiki code" );
		}
		if ( $shortcircuit && !preg_match( "/^[^'\"#*]*function [^\"']*\$/m", $source ) ) {
			$this->mTokens = array();
			return;
		}
		$this->mTokens = token_get_all( $source );
		$this->mStatus = self::WAITING_FUNCTION;
		$this->mFunctionQualifiers = array();


		// Predefine constant that might not be defined by this file source code
		$this->mConstants = array( 'PARSEKIT_SIMPLE', 'UNORM_NFC', # Extensions
			/* Defined in Title.php and GlobalFunctions.php */
			'GAID_FOR_UPDATE', 'TC_MYSQL', 'TS_UNIX', 'TS_MW', 'TS_DB', 'TS_RFC2822',
			'TS_ISO_8601', 'TS_EXIF', 'TS_ORACLE', 'TS_POSTGRES', 'TS_DB2',
			'TS_ISO_8601_BASIC',
			/* PHP extensions */
			'FILEINFO_MIME', 'FILEINFO_MIME_TYPE', 'MHASH_ADLER32',
			'SIGTERM', 'SIG_DFL',
			'SVN_REVISION_HEAD', 'SVN_REVISION_INITIAL',
		) ;
	}

	static $functionQualifiers = array( T_ABSTRACT, T_PRIVATE, T_PUBLIC, T_PROTECTED, T_STATIC );

	function execute() {
		$currentToken = null;

		foreach ( $this->mTokens as $token ) {
			if ( self::isMeaningfulToken( $currentToken ) )
				$lastMeaningfulToken = $currentToken;
			$currentToken = $token;

			if ( $lastMeaningfulToken[0] == T_OPEN_TAG && $token[0] == T_OPEN_TAG ) {
				# See r69767
				$this->warning( "{$token[1]} in line {$token[2]} after {$lastMeaningfulToken[1]} in line {$lastMeaningfulToken[2]}" );
			}
			if ( $token == ';' ) {
				if ( $lastMeaningfulToken == ';' ) {
					# See r72751, warn on ;;
					$this->warning( "Empty statement" );
				} elseif ( $lastMeaningfulToken[0] == T_FOR ) {
					# But not on infinte for loops: for ( ; ; )
					$currentToken = array(';', ';', $lastMeaningfulToken[2] );
				}
			}

			if ( $lastMeaningfulToken[0] == T_DECLARE && $token[0] == T_STRING ) {
				$currentToken[0] = T_WHITESPACE; # Ignore the ticks or encoding
				continue;
			}

			if ( is_array( $token ) && ( $token[0] == T_CONSTANT_ENCAPSED_STRING ) && is_array( $lastMeaningfulToken )
				&& ( ( $lastMeaningfulToken[0] == T_STRING ) || ( $lastMeaningfulToken[0] == self::FUNCTION_NAME ) )
				&& ( $lastMeaningfulToken[1] == 'define' ) ) {

				// Mark as defined
				$this->mConstants[] = trim( $token[1], "'\"" );
			}

			if ( is_array( $token ) && ( $token[0] == T_CONSTANT_ENCAPSED_STRING ) && is_array( $lastMeaningfulToken )
				&& ( ( $lastMeaningfulToken[0] == T_STRING ) || ( $lastMeaningfulToken[0] == self::FUNCTION_NAME ) )
				&& ( $lastMeaningfulToken[1] == 'defined' ) ) {

				// FIXME: Should be marked as defined only inside this T_IF
				$this->mConstants[] = trim( $token[1], "'\"" );
			}

			switch ( $this->mStatus ) {
				case self::WAITING_FUNCTION:
					if ( $token == ';' )
						$this->mFunctionQualifiers = array();

					if ( $token[0] == T_DOC_COMMENT ) {
						if ( strpos( $token[1], '@deprecated' ) !== false ) {
							$this->mFunctionQualifiers[] = self::FUNCTION_DEPRECATED;
						}
					}
					if ( in_array( $token[0], self::$functionQualifiers ) ) {
						$this->mFunctionQualifiers[] = $token[0];
					}
					if ( $token[0] == T_INTERFACE ) {
						$this->mStatus = self::IN_INTERFACE;
					}

					if ( ( $lastMeaningfulToken[0] == T_CLASS ) && ( $token[0] == T_STRING ) ) {
						$this->mKnownFileClasses[] = $token[1];
						$this->mClass = $token[1];
						$this->mParent = null;
					}
					if ( ( $lastMeaningfulToken[0] == T_EXTENDS ) && ( $token[0] == T_STRING ) ) {
						$this->checkClassName( $token );
						$this->mParent = $token[1];
					}

					if ( in_array( $token[0], array( T_REQUIRE, T_REQUIRE_ONCE, T_INCLUDE, T_INCLUDE_ONCE ) ) ) {
						$this->mStatus = self::IN_REQUIRE_WAITING;
						$requirePath = "";
						continue;
					}
					
					if ( $token[0] != T_FUNCTION )
						continue;
					$this->mStatus = self::IN_FUNCTION_NAME;
					break;

				case self::IN_FUNCTION_NAME:
					if ( ( $token == '&' ) || ( $token[0] == T_WHITESPACE ) )
						continue;
					if ( $token[0] == T_STRING ) {
						$this->mFunction = $token[1];
						$this->mStatus = self::IN_FUNCTION;
						$this->mBraces = 0;
						$this->mInSwitch = 0;
						$this->mFunctionGlobals = array();
						$currentToken[0] = self::FUNCTION_DEFINITION;

						if ( $this->generateDeprecatedList && in_array( self::FUNCTION_DEPRECATED, $this->mFunctionQualifiers ) ) {
							if ( ( substr( $this->mFunction, 0, 2 ) != "__" ) ) {
								if ( !isset( $this->mDeprecatedFunctionList[ $this->mFunction ] ) ) {
									$this->mDeprecatedFunctionList[ $this->mFunction ] = array( $this->mClass );
								} else {
									$this->mDeprecatedFunctionList[ $this->mFunction ][] = $this->mClass;
								}
							}
						}

						$this->debug( "Entering into function {$token[1]} at line {$token[2]} " );
						continue;
					}

					$this->error( $token );

				case self::IN_FUNCTION:
					if ( ( $token == ';' ) && ( $this->mBraces == 0 ) ) {
						if ( !in_array( T_ABSTRACT, $this->mFunctionQualifiers ) ) {
							$this->error( $token );
						}
						// abstract function
						$this->mStatus = self::WAITING_FUNCTION;
						continue;
					}
					if ( $token == '{' ) {
						$this->mBraces++;
					} elseif ( $token == '}' ) {
						$this->mBraces--;
						if ( $this->mInSwitch <= $this->mBraces )
							$this->mInSwitch = 0;
						
						$this->purgeGlobals();
						if ( ! $this->mBraces ) {
							$this->mStatus = self::WAITING_FUNCTION;
							$this->mFunctionQualifiers = array();
						}
					} elseif ( is_array ( $token ) ) {
						if ( $token[0] == T_GLOBAL ) {
							$this->mStatus = self::IN_GLOBAL;
							if ( $this->mInSwitch ) {
								$this->warning( "Defining global variables inside a switch in line $token[2], function {$this->mFunction}" );
							}
						} elseif ( ( $token[0] == T_CURLY_OPEN ) || ( $token[0] == T_DOLLAR_OPEN_CURLY_BRACES ) ) {
							// {$ and ${ and  All these three end in }, so we need to open an extra brace to balance
							// T_STRING_VARNAME is documented as ${a but it's the text inside the braces
							$this->mBraces++;
						}
						if ( $token[0] == T_STRING_VARNAME ) {
							$token[0] = T_VARIABLE;
							$token[1] = '$' . $token[1];
						}
						if ( $token[0] == T_VARIABLE ) {
							# $this->debug( "Found variable $token[1]" );

							if ( ( $token[1] == '$this' ) && in_array( T_STATIC, $this->mFunctionQualifiers ) ) {
								$this->warning( "Use of \$this in static method function {$this->mFunction} in line $token[2]" );
							}

							if ( $lastMeaningfulToken[0] == T_PAAMAYIM_NEKUDOTAYIM ) {
								/* Class variable. No check for now */
							} else {
								if ( isset( $this->mFunctionGlobals[ $token[1] ] ) ) {
										$this->mFunctionGlobals[ $token[1] ][0] ++;
								} elseif ( $this->shouldBeGlobal( $token[1] ) ) {
									$this->warning( "{$token[1]} is used as local variable in line $token[2], function {$this->mFunction}" );
								}
							}
						} elseif ( $token[0] == T_FUNCTION ) {
							$this->warning( "Uh? Function inside function? A lamda function?" );
							$this->error( $token );
						} elseif ( $token[0] == T_SWITCH ) {
							if ( !$this->mInSwitch )
								$this->mInSwitch = $this->mBraces;
						} elseif ( ( $token[0] == T_PAAMAYIM_NEKUDOTAYIM ) && is_array( $lastMeaningfulToken ) && ( $lastMeaningfulToken[0] == T_VARIABLE ) ) {
							if ( ( $lastMeaningfulToken[1] == '$self' ) || ( $lastMeaningfulToken[1] == '$parent' ) ) {
								# Bug of r69904
								$this->warning( "$lastMeaningfulToken[1]:: used in line $lastMeaningfulToken[2] It probably should have been " . substr( $lastMeaningfulToken[1], 1 ) . "::" );
							}
						} elseif ( ( $token[0] == T_STRING ) && ( is_array( $lastMeaningfulToken )
								&& in_array( $lastMeaningfulToken[0], array( T_OBJECT_OPERATOR, T_PAAMAYIM_NEKUDOTAYIM ) ) ) ) {
							# Class member or class constant
							$currentToken[0] = self::CLASS_MEMBER;
						} elseif ( $token[0] == T_STRING && is_array( $lastMeaningfulToken ) &&
							( in_array( $lastMeaningfulToken[0], array( T_INSTANCEOF, T_NEW ) ) ) ) {

							$this->checkClassName( $token );
							$currentToken[0] = self::CLASS_NAME;
						} else if ( in_array( $token[0], array( T_REQUIRE, T_REQUIRE_ONCE, T_INCLUDE, T_INCLUDE_ONCE ) ) ) {
							$this->mStatus = self::IN_FUNCTION_REQUIRE;
							$requirePath = '';
							continue;
						}
					}

					/* Try to guess the class of the variable */
					if ( in_array( $token[0], array( T_OBJECT_OPERATOR, T_PAAMAYIM_NEKUDOTAYIM ) ) ) {
						$currentToken['base'] = $lastMeaningfulToken;
					} else
					if ( ( ( $token[0] == T_STRING ) || ( $token[0] == self::CLASS_MEMBER ) )
						&& is_array( $lastMeaningfulToken ) && isset( $lastMeaningfulToken['base'] ) ) {
						$currentToken['base'] = $lastMeaningfulToken['base'];
						$currentToken['class'] = $this->guessClassName( $lastMeaningfulToken['base'] );
					}

					if ( ( $token == '(' ) && is_array( $lastMeaningfulToken ) ) {
						if ( $lastMeaningfulToken[0] == T_STRING ) {
							$lastMeaningfulToken[0] = self::FUNCTION_NAME;
							$this->checkDeprecation( $lastMeaningfulToken );
						} else if ( $lastMeaningfulToken[0] == self::CLASS_MEMBER ) {
							$this->checkDeprecation( $lastMeaningfulToken );
						}
					}

					/* Detect constants */
					if ( self::isMeaningfulToken( $token ) && is_array( $lastMeaningfulToken ) &&
							( $lastMeaningfulToken[0] == T_STRING ) && !self::isPhpConstant( $lastMeaningfulToken[1] ) ) {

						if ( in_array( $token[0], array( T_PAAMAYIM_NEKUDOTAYIM, T_VARIABLE, T_INSTANCEOF ) ) ) {
							$this->checkClassName( $lastMeaningfulToken );
						} else {

							if ( !defined( $lastMeaningfulToken[1] ) && !in_array( $lastMeaningfulToken[1], $this->mConstants ) && !self::isIgnoreConstant( $lastMeaningfulToken[1] ) ) {
								$this->warning( "Use of undefined constant $lastMeaningfulToken[1] in line $lastMeaningfulToken[2]" );
							}
						}
					}
					continue;

				case self::IN_GLOBAL:
					if ( $token == ',' )
						continue;
					if ( $token == ';' ) {
						$this->mStatus = self::IN_FUNCTION;
						continue;
					}
					if ( !self::isMeaningfulToken( $token ) )
						continue;

					if ( is_array( $token ) ) {
						if ( $token[0] == T_VARIABLE ) {
							if ( !$this->shouldBeGlobal( $token[1] ) && !$this->canBeGlobal( $token[1] ) ) {
								$this->warning( "Global variable {$token[1]} in line {$token[2]}, function {$this->mFunction} does not follow coding conventions" );
							}
							if ( isset( $this->mFunctionGlobals[ $token[1] ] ) ) {
								if ( !$this->mInSwitch ) {
									$this->warning( $token[1] . " marked as global again in line {$token[2]}, function {$this->mFunction}" );
								}
							} else {
								$this->checkGlobalName( $token[1] );
								$this->mFunctionGlobals[ $token[1] ] = array( 0, $this->mBraces, $token[2] );
							}
							continue;
						}
					}
					$this->error( $token );

				case self::IN_INTERFACE:
					if ( $lastMeaningfulToken[0] == T_INTERFACE )
						$this->mKnownFileClasses[] = $token[1];

					if ( $token == '{' ) {
						$this->mBraces++;
					} elseif ( $token == '}' ) {
						$this->mBraces--;
						if ( !$this->mBraces )
							$this->mStatus = self::WAITING_FUNCTION;
					}
					continue;

				case self::IN_REQUIRE_WAITING:
				case self::IN_FUNCTION_REQUIRE:
					if ( $token == ';' ) {
						$requirePath = trim( $requirePath, ')("' );
						
						if ( substr( $requirePath, 0, 8 ) == "PHPUnit/" ) {
							$this->mStatus = $this->mStatus - self::IN_REQUIRE_WAITING;
							continue;
						}
						if ( $requirePath == "Testing/Selenium.php" ) {
							$this->mStatus = $this->mStatus - self::IN_REQUIRE_WAITING;
							continue;
						}
						if ( substr( $requirePath, 0, 12 ) == "Net/Gearman/" ) {
							$this->mStatus = $this->mStatus - self::IN_REQUIRE_WAITING;
							continue;
						}
						
						if ( ( $requirePath == '' ) || ( !file_exists( $requirePath ) && $requirePath[0] != '/' ) ) {
							/* Try prepending the script folder, for maintenance scripts (but see Maintenance.php:758) */
							$requirePath = dirname( $this->mFilename ) . "/" . $requirePath;
						}
						if ( !file_exists( $requirePath ) ) {
							if ( strpos( $requirePath, '$' ) === false ) {
								$this->warning( "Did not found the expected require of $requirePath" );
							}
						} else if ( isset( self::$mRequireKnownClasses[$requirePath] ) ) {
							$this->mKnownFileClasses = array_merge( $this->mKnownFileClasses, self::$mRequireKnownClasses[$requirePath] );
							$this->mConstants = array_merge( $this->mConstants, self::$mRequireKnownConstants[$requirePath] );
						} else {
							$newCheck = new CheckVars;
							$newCheck->load( $requirePath );
							$newCheck->execute();
							/* Get the classes defined there */
							$this->mKnownFileClasses = array_merge( $this->mKnownFileClasses, $newCheck->mKnownFileClasses );
							$this->mConstants = array_merge( $this->mConstants, $newCheck->mConstants );
							self::$mRequireKnownClasses[$requirePath] = $newCheck->mKnownFileClasses;
							self::$mRequireKnownConstants[$requirePath] = $newCheck->mConstants;
						}
						$this->mStatus = $this->mStatus - self::IN_REQUIRE_WAITING;
						continue;
					}
					
					if ( $token[0] == T_WHITESPACE )
						continue;
					
					if ( $token[0] == T_STRING_VARNAME ) {
						$token[0] = T_VARIABLE;
						$token[1] = '$' . $token[1];
					}
					if ( $token[0] == T_VARIABLE && $this->mStatus == self::IN_FUNCTION_REQUIRE ) {
						if ( isset( $this->mFunctionGlobals[ $token[1] ] ) ) {
								$this->mFunctionGlobals[ $token[1] ][0] ++;
						} elseif ( $this->shouldBeGlobal( $token[1] ) ) {
							$this->warning( "{$token[1]} is used as local variable in line $token[2], function {$this->mFunction}" );
						}
					}
					if ( $token == '.' ) {
						if ( $requirePath == 'dirname(__FILE__)' ) {
							$requirePath = dirname( $this->mFilename );
						} elseif ( $requirePath == 'dirname(dirname(__FILE__))' ) {
							$requirePath = dirname( dirname( $this->mFilename ) );
						}
					} else if ( $token[0] == T_CURLY_OPEN || $token == '}' ) {
						continue;
					} else if ( !is_array( $token ) ) {
						if ( ( $token != '(' ) || $requirePath != '' ) {
							$requirePath .= $token[0];
						}
					} else if ( in_array( $token[0], array( T_CONSTANT_ENCAPSED_STRING, T_ENCAPSED_AND_WHITESPACE ) ) ) {
						$requirePath .= trim( $token[1], '\'"' );
					} else if ( $token[0] == T_VARIABLE ) {
						if ( $token[1] == '$IP' || $token[1] == '$mwPath' ) {
							#$requirePath .= dirname( __FILE__ ) . '/../../phase3';
							global $IP;
							$requirePath .= $IP ;
						} elseif ( $token[1] == '$dir' ) {
							//  Scripts at phase3/maintenance/language/
							$requirePath .= dirname( $this->mFilename );
						} elseif ( $token[1] == '$wgStyleDirectory' ) {
							#$requirePath .= dirname( __FILE__ ) . '/../../phase3/skins';
							global $IP;
							$requirePath .= "$IP/skins/";
						} elseif ( in_array( $token[1], array( '$classFile', '$file', '$_fileName', '$fileName', '$filename' ) ) ) {
							/* Maintenance.php lines 374 and 894 */
							/* LocalisationCache.php, MessageCache.php, AutoLoader.php */
						} else {
							//$this->warning( "require uses unknown variable {$token[1]} in line {$token[2]}" );
							$requirePath .= $token[1];
						}
					} elseif ( $token[0] == T_STRING && $token[1] == 'DO_MAINTENANCE' ) {
						#$requirePath .= dirname( __FILE__ ) . '/../../phase3/maintenance/doMaintenance.php';
						global $IP;
						$requirePath .= "$IP/maintenance/doMaintenance.php";
					} else {
						$requirePath .= $token[1];
					}
					continue;
				
			}
		}

		$this->checkPendingClasses();
	}

	function checkDeprecation( $token ) {
		global $mwDeprecatedFunctions;
		
		if ( $mwDeprecatedFunctions && !in_array( self::FUNCTION_DEPRECATED, $this->mFunctionQualifiers ) && 
			isset( $mwDeprecatedFunctions[ $token[1] ] ) ) {
			
			if ( isset( $token['class'] ) ) {
				if ( in_array( $token['class'], $mwDeprecatedFunctions[ $token[1] ] ) ) {
					$this->warning( "Non deprecated function $this->mFunction calls deprecated function {$token['class']}::{$token[1]} in line {$token[2]}" );
				}
			} else if ( isset( $token['base'] ) ) { # Avoid false positives for local functions, see maintenance/rebuildInterwiki.inc
				$this->warning( "Non deprecated function $this->mFunction may be calling deprecated function " .
					implode( '/', $mwDeprecatedFunctions[ $token[1] ] ) . "::" . $token[1] . " in line {$token[2]}" );
			}
		}
	}

	/* Returns a class name, or null if it couldn't guess */
	function guessClassName( $token ) {
		static $wellKnownVars = array(
			'$wgArticle' => 'Article',
			'$wgTitle' => 'Title',
			'$wgParser' => 'Parser',
			'$wgUser' => 'User',
			'$wgOut' => 'OutputPage',
			'$wgRequest' => 'WebRequest',
			'$request' => 'WebRequest',
			'$wgMessageCache' => 'MessageCache',
			'$wgLang' => 'Language', '$wgContLang' => 'Language',
			'$dbw' => 'Database', '$dbr' => 'Database',
			'$sk' => 'Skin'
		);
			
		if ( $token[0] == T_VARIABLE ) {
			if ( isset( $wellKnownVars[ $token[1] ] ) ) {
				return $wellKnownVars[ $token[1] ];
			}
			if ( $token[1] == '$this' )
				return $this->mClass;
			$name = substr( $token[1], 1 );
		} elseif ( ( $token[0] == T_STRING ) || ( $token[0] == self::CLASS_MEMBER ) ) {
			if ( ( $token[1] == 'self' ) && !isset( $token['base'] ) )
				return $this->mClass;
			if ( ( $token[1] == 'parent' ) && !isset( $token['base'] ) )
				return $this->getParentName( $token );
			
			$name = $token[1];
			
			if ( $token[1][0] == 'm' )  // member
				$name = substr( $token[1], 1 );
		} else {
			return null;
		}
		$className = $this->checkClassName( array( 1=> ucfirst( $name ) ) , 'no' );
		if ( $className ) {
			return $className;
		}

		return null;
	}

	function error( $token ) {
		$msg = "Unexpected token " . ( is_string( $token ) ? $token : token_name( $token[0] ) ) ;
		if ( is_array( $token ) && isset( $token[2] ) ) {
			$msg .= " in line $token[2]";
		}
		$msg .= "\n";
		$this->warning( $msg );
		die( 1 );
	}

	function warning( $msg ) {
		if ( !$this->mProblemCount ) {
			echo "Problems in {$this->mFilename}:\n";
		}
		$this->mProblemCount++;
		echo " $msg\n";
	}

	function debug( $msg ) {
		if ( $this->mDebug ) {
			echo "$msg\n";
		}
	}

	# Is this the name of a global variable?
	function shouldBeGlobal( $name ) {
		static $specialGlobals = array( '$IP', '$parserMemc', '$messageMemc', '$hackwhere', '$haveProctitle' );
		static $nonGlobals = array(	'$wgOptionalMessages', '$wgIgnoredMessages', '$wgEXIFMessages', # Used by Translate extension, read from maintenance/languages/messageTypes.inc
									'$wgMessageStructure', '$wgBlockComments' ); # Used by Translate extension and maintenance/language/writeMessagesArray.inc, read from maintenance/languages/messages.inc

		return ( ( substr( $name, 0, 3 ) == '$wg' ) || ( substr( $name, 0, 3 ) == '$eg' ) || in_array( $name, $specialGlobals ) ) && !in_array( $name, $nonGlobals );
	}

	# Variables that can be used as global, but also as locals
	function canBeGlobal( $name ) {
		if ( $name == '$argv' ) {
			/* Used as global by maintenance scripts, but also common as function var */
			return true;
		}
		if ( isset( self::$mGlobalsPerFile[$name] ) && in_array( basename( $this->mFilename ) , self::$mGlobalsPerFile[$name] ) ) {
			return true;
		}
		if ( $this->mFunction == 'loadWikimediaSettings' ) {
			/* Skip the error about $site and $lang in Maintenance.php */
			return true;
		}
		
		return false;
	}

	private function purgeGlobals() {
		foreach ( $this->mFunctionGlobals as $globalName => $globalData ) {
			if ( $globalData[1] <= $this->mBraces )
				continue; # In scope

			#  global $x  still affects the variable after the endo of the
			# conditional, but only if the condition was true.
			#  We keep in the safe side and only consider it defined inside
			# the if block (see r69883).

			if ( $globalData[0] == 0 ) {
				$this->warning( "Unused global $globalName in function {$this->mFunction} line $globalData[2]" );
			}
			unset( $this->mFunctionGlobals[$globalName] );
		}
	}

	# Look for typos in the globals names
	protected function checkGlobalName( $name ) {
		if ( substr( $name, 0, 3 ) == '$wg' ) {
			if ( ( self::$mDefaultSettingsGlobals != null ) && !in_array( $name, self::$mDefaultSettingsGlobals ) ) {
				if ( !isset( self::$mGlobalsPerFile[$name] ) || !in_array( basename( $this->mFilename ) , self::$mGlobalsPerFile[$name] ) ) {
					$this->warning( "Global variable $name is not present in DefaultSettings" );
				}
			}
		}
	}

	static function isMeaningfulToken( $token ) {
		if ( is_array( $token ) ) {
			return ( $token[0] != T_WHITESPACE && $token[0] != T_COMMENT );
		} else {
			return strpos( '(&', $token ) === false ;
		}
	}

	# Constants defined by php
	static function isPhpConstant( $name ) {
		return in_array( $name, array( 'false', 'true', 'self', 'parent', 'null' ) );
	}

	/**
	 * Returns a 
	 * @param  $token Token holding the class name
	 * @param  $warn  A value from 'no', 'defer', 'now¡
	 * @return mixed  The class name if it is found, false otherwise
	 */
	function checkClassName( $token, $warn = 'defer' ) {
		global $wgAutoloadLocalClasses;

		if ( $token[1] == 'self' )
			return $this->mClass;
		if ( $token[1] == 'parent' )
			return $this->getParentName( $token );

		if ( class_exists( $token[1], false ) ) return $token[1]; # Provided by an extension
		if ( substr( $token[1], 0, 8 ) == "PHPUnit_" ) return $token[1];
		if ( $token[1] == "Testing_Selenium" || $token[1] == "Testing_Selenium_Exception" ) return $token[1];
		if ( substr( $token[1], 0, 12 ) == "Net_Gearman_" ) return $token[1]; # phase3/maintenance/gearman/gearman.inc
		if ( $token[1] == "PEAR_Error" ) return $token[1]; # Services_JSON.php

		if ( !isset( $wgAutoloadLocalClasses[$token[1]] ) && !in_array( $token[1], $this->mKnownFileClasses ) ) {
			if ( $warn == 'now' ) {
				$this->warning( "Use of unknown class $token[1] in line $token[2]" );
			} else if ( $warn == 'defer' ) {
				// Defer to the end of the file
				$this->mUnknownClasses[] = $token;
			} else {
				return false;
			}
		}
		return $token[1];
	}

	function checkPendingClasses() {
		foreach ( $this->mUnknownClasses as $classToken ) {
			$this->checkClassName( $classToken, 'now' );
		}
		$this->mUnknownClasses = array();
	}

	static function isIgnoreConstant( $name ) {
		foreach ( self::$constantIgnorePrefixes as $prefix ) {
			if ( substr( $name, 0, strlen( $prefix ) ) == $prefix )
				return true;
		}
		return false;
	}
	
	function getParentName( $token ) {
		if ( !is_null( $this->mParent ) ) {
			return $this->mParent;
		}
		$this->warning( "Use of parent in orphan class {$this->mClass} in line $token[2]" );
		return "-";
	}
	
}

$cv = new CheckVars();
// $cv->mDebug = true;
if( $argc < 2 ) {
	die ("Usage: $argv[0] <PHP_source_file> [--generate-deprecated-list]\n");
}
array_shift( $argv );
if ( $argv[0] == '--generate-deprecated-list' ) {
	$cv->setGenerateDeprecatedList( true );
	array_shift( $argv );
}
foreach ( $argv as $arg ) {
	$cv->load( $arg );
	$cv->execute();
}
if ( $cv->getGenerateDeprecatedList( ) ) {
	$cv->saveDeprecatedList( dirname( __FILE__ ) . "/deprecated.functions" );
}
