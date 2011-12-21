<?php
/**
 * Extension ZeroRatedMobileAccess — Zero Rated Mobile Access
 *
 * @file
 * @ingroup Extensions
 * @author Patrick Reilly
 * @copyright © 2011 Patrick Reilly
 * @licence GNU General Public Licence 2.0 or later
 */

// Needs to be called within MediaWiki; not standalone
if ( !defined( 'MEDIAWIKI' ) ) {
	echo( "This is an extension to the MediaWiki package and cannot be run standalone.\n" );
	die( -1 );
}

// Extension credits that will show up on Special:Version
$wgExtensionCredits['other'][] = array(
	'path'  =>  __FILE__,
	'name'  =>  'ZeroRatedMobileAccess',
	'version'  =>  ExtZeroRatedMobileAccess::VERSION,
	'author'  =>  '[http://www.mediawiki.org/wiki/User:Preilly Preilly]',
	'descriptionmsg'  =>  'zero-rated-mobile-access-desc',
	'url'  =>  'https://www.mediawiki.org/wiki/Extension:ZeroRatedMobileAccess',
);

$cwd = dirname( __FILE__ ) . DIRECTORY_SEPARATOR;
$wgExtensionMessagesFiles['ZeroRatedMobileAccess'] = $cwd . 'ZeroRatedMobileAccess.i18n.php';

// autoload extension classes

$autoloadClasses = array (
	'ZeroRatedMobileAccessTemplate',
);

foreach ( $autoloadClasses as $class ) {
	$wgAutoloadClasses[$class] = $cwd . $class . '.php';
}

$wgExtZeroRatedMobileAccess = new ExtZeroRatedMobileAccess();

$wgHooks['BeforePageDisplay'][] = array( &$wgExtZeroRatedMobileAccess, 'beforePageDisplayHTML' );

class ExtZeroRatedMobileAccess {
	const VERSION = '0.0.3';

	public static $renderZeroRatedLandingPage;
	private static $debugOutput = array();
	private static $displayDebugOutput = false;

	/**
	 * @param $out OutputPage
	 * @param $text String
	 * @return bool
	 */
	public function beforePageDisplayHTML( &$out, &$text ) {
		global $wgRequest;
		wfProfileIn( __METHOD__ );
		self::$renderZeroRatedLandingPage = $wgRequest->getInt( 'renderZeroRatedLandingPage' );
		if ( self::$renderZeroRatedLandingPage === 1 ) {
			echo wfMsg( 'zero-rated-mobile-access-desc' );
			$country = $wgRequest->getVal( 'country' );
			$ip = ( $wgRequest->getVal( 'ip') ) ? $wgRequest->getVal( 'ip' ) : wfGetIP();
			// Temporary hack to allow for testing on localhost
			$countryIps = array(
								'GERMANY'	=> '80.237.226.75',
								'MEXICO'	=> '187.184.240.247',
								'THAILAND'	=> '180.180.150.104',
								'FRANCE'	=> '90.6.70.28',
								);
			$ip = ( strpos( $ip, '192.168.' ) === 0 ) ? $countryIps['FRANCE'] : $ip;
            if ( IP::isValid( $ip ) ) {
	            // If no country was passed, try to do GeoIP lookup
                // Requires php5-geoip package
				if ( !$country && function_exists( 'geoip_country_code_by_name' ) ) {
					$country = geoip_country_code_by_name( $ip );
				}
				self::addDebugOutput( $country );
			}
			$languageOptions = self::createLanguageOptionsFromWikiText();
			//self::$displayDebugOutput = true;
			//self::addDebugOutput( $languageOptions );
			self::addDebugOutput( self::getFullCountryNameFromCode( $country ) );
			self::addDebugOutput( $languageOptions[self::getFullCountryNameFromCode( $country )] );
			self::writeDebugOutput();
		}
		wfProfileOut( __METHOD__ );
		exit();
		return true;
	}
	
	private static function addDebugOutput( $object ) {
		wfProfileIn( __METHOD__ );
		self::$debugOutput[] = $object;
		wfProfileOut( __METHOD__ );
		return true;
	}
	
	private static function writeDebugOutput() {
		wfProfileIn( __METHOD__ );
		if ( self::$debugOutput && self::$displayDebugOutput === true ) {
			echo "<pre>";
			foreach( self::$debugOutput as $debugOutput ) {
				var_dump( $debugOutput );
			}
			echo "</pre>";
		}
		wfProfileOut( __METHOD__ );
		return true;
	}
	
	private static function createLanguageOptionsFromWikiText() {
		wfProfileIn( __METHOD__ );
		$languageOptions = array();
		$title = Title::newFromText( "Language_options", NS_MEDIAWIKI );
		// Use the revision directly to prevent other hooks to be called
		$rev = Revision::newFromTitle( $title );
		if ( $rev ) {
			$lines = explode( "\n", $rev->getRawText() );
		}
		if ( $lines && count( $lines ) > 0 ) {
			$sizeOfLines = sizeof( $lines );
			for ( $i = 0; $i < $sizeOfLines; $i++ ) {
				$line = $lines[$i];
				if ( strpos( $line, '*' ) === 0 && strpos( $line, '**' ) !== 0 && $i >= 0 ) {
					$countryName = strtoupper( str_replace( '* ', '', $line ) );
					$languageOptions[$countryName] = '';
				} elseif ( strpos( $line, '**' ) === 0 && $i > 0 ) {
					$lineParts = explode('#', $line);
					$language = ( isset( $lineParts[0] ) ) ? 
						trim( str_replace( '** ', '', $lineParts[0] ) ) :
						trim( str_replace( '** ', '', $line ) ) ;
						if ( $language !== 'portal' && $language !== 'other' ) {
							$languageOptions[$countryName][] = ( isset( $lineParts[1] ) ) ?
								array( 'language'  =>  $language, 
									'percentage'  =>  intval( str_replace( '%', '', trim( $lineParts[1] ) ) ) ) :
								$language;
						}
				}
			}
		}
		wfProfileOut( __METHOD__ );
		return $languageOptions;
	}
	
	private static function getFullCountryNameFromCode( $code ) {
		wfProfileIn( __METHOD__ );
		$countries = array(
			'AF' => 'AFGHANISTAN',
			'AL' => 'ALBANIA',
			'DZ' => 'ALGERIA',
			'AS' => 'AMERICAN SAMOA',
			'AD' => 'ANDORRA',
			'AO' => 'ANGOLA',
			'AI' => 'ANGUILLA',
			'AQ' => 'ANTARCTICA',
			'AG' => 'ANTIGUA AND BARBUDA',
			'AR' => 'ARGENTINA',
			'AM' => 'ARMENIA',
			'AW' => 'ARUBA',
			'AU' => 'AUSTRALIA',
			'AT' => 'AUSTRIA',
			'AZ' => 'AZERBAIJAN',
			'BS' => 'BAHAMAS',
			'BH' => 'BAHRAIN',
			'BD' => 'BANGLADESH',
			'BB' => 'BARBADOS',
			'BY' => 'BELARUS',
			'BE' => 'BELGIUM',
			'BZ' => 'BELIZE',
			'BJ' => 'BENIN',
			'BM' => 'BERMUDA',
			'BT' => 'BHUTAN',
			'BO' => 'BOLIVIA',
			'BA' => 'BOSNIA AND HERZEGOVINA',
			'BW' => 'BOTSWANA',
			'BV' => 'BOUVET ISLAND',
			'BR' => 'BRAZIL',
			'IO' => 'BRITISH INDIAN OCEAN TERRITORY',
			'BN' => 'BRUNEI DARUSSALAM',
			'BG' => 'BULGARIA',
			'BF' => 'BURKINA FASO',
			'BI' => 'BURUNDI',
			'KH' => 'CAMBODIA',
			'CM' => 'CAMEROON',
			'CA' => 'CANADA',
			'CV' => 'CAPE VERDE',
			'KY' => 'CAYMAN ISLANDS',
			'CF' => 'CENTRAL AFRICAN REPUBLIC',
			'TD' => 'CHAD',
			'CL' => 'CHILE',
			'CN' => 'CHINA',
			'CX' => 'CHRISTMAS ISLAND',
			'CC' => 'COCOS (KEELING) ISLANDS',
			'CO' => 'COLOMBIA',
			'KM' => 'COMOROS',
			'CG' => 'CONGO',
			'CD' => 'CONGO, THE DEMOCRATIC REPUBLIC OF THE',
			'CK' => 'COOK ISLANDS',
			'CR' => 'COSTA RICA',
			'CI' => 'COTE D IVOIRE',
			'HR' => 'CROATIA',
			'CU' => 'CUBA',
			'CY' => 'CYPRUS',
			'CZ' => 'CZECH REPUBLIC',
			'DK' => 'DENMARK',
			'DJ' => 'DJIBOUTI',
			'DM' => 'DOMINICA',
			'DO' => 'DOMINICAN REPUBLIC',
			'TP' => 'EAST TIMOR',
			'EC' => 'ECUADOR',
			'EG' => 'EGYPT',
			'SV' => 'EL SALVADOR',
			'GQ' => 'EQUATORIAL GUINEA',
			'ER' => 'ERITREA',
			'EE' => 'ESTONIA',
			'ET' => 'ETHIOPIA',
			'FK' => 'FALKLAND ISLANDS (MALVINAS)',
			'FO' => 'FAROE ISLANDS',
			'FJ' => 'FIJI',
			'FI' => 'FINLAND',
			'FR' => 'FRANCE',
			'GF' => 'FRENCH GUIANA',
			'PF' => 'FRENCH POLYNESIA',
			'TF' => 'FRENCH SOUTHERN TERRITORIES',
			'GA' => 'GABON',
			'GM' => 'GAMBIA',
			'GE' => 'GEORGIA',
			'DE' => 'GERMANY',
			'GH' => 'GHANA',
			'GI' => 'GIBRALTAR',
			'GR' => 'GREECE',
			'GL' => 'GREENLAND',
			'GD' => 'GRENADA',
			'GP' => 'GUADELOUPE',
			'GU' => 'GUAM',
			'GT' => 'GUATEMALA',
			'GN' => 'GUINEA',
			'GW' => 'GUINEA-BISSAU',
			'GY' => 'GUYANA',
			'HT' => 'HAITI',
			'HM' => 'HEARD ISLAND AND MCDONALD ISLANDS',
			'VA' => 'HOLY SEE (VATICAN CITY STATE)',
			'HN' => 'HONDURAS',
			'HK' => 'HONG KONG',
			'HU' => 'HUNGARY',
			'IS' => 'ICELAND',
			'IN' => 'INDIA',
			'ID' => 'INDONESIA',
			'IR' => 'IRAN, ISLAMIC REPUBLIC OF',
			'IQ' => 'IRAQ',
			'IE' => 'IRELAND',
			'IL' => 'ISRAEL',
			'IT' => 'ITALY',
			'JM' => 'JAMAICA',
			'JP' => 'JAPAN',
			'JO' => 'JORDAN',
			'KZ' => 'KAZAKSTAN',
			'KE' => 'KENYA',
			'KI' => 'KIRIBATI',
			'KP' => 'KOREA DEMOCRATIC PEOPLES REPUBLIC OF',
			'KR' => 'KOREA REPUBLIC OF',
			'KW' => 'KUWAIT',
			'KG' => 'KYRGYZSTAN',
			'LA' => 'LAO PEOPLES DEMOCRATIC REPUBLIC',
			'LV' => 'LATVIA',
			'LB' => 'LEBANON',
			'LS' => 'LESOTHO',
			'LR' => 'LIBERIA',
			'LY' => 'LIBYAN ARAB JAMAHIRIYA',
			'LI' => 'LIECHTENSTEIN',
			'LT' => 'LITHUANIA',
			'LU' => 'LUXEMBOURG',
			'MO' => 'MACAU',
			'MK' => 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF',
			'MG' => 'MADAGASCAR',
			'MW' => 'MALAWI',
			'MY' => 'MALAYSIA',
			'MV' => 'MALDIVES',
			'ML' => 'MALI',
			'MT' => 'MALTA',
			'MH' => 'MARSHALL ISLANDS',
			'MQ' => 'MARTINIQUE',
			'MR' => 'MAURITANIA',
			'MU' => 'MAURITIUS',
			'YT' => 'MAYOTTE',
			'MX' => 'MEXICO',
			'FM' => 'MICRONESIA, FEDERATED STATES OF',
			'MD' => 'MOLDOVA, REPUBLIC OF',
			'MC' => 'MONACO',
			'MN' => 'MONGOLIA',
			'MS' => 'MONTSERRAT',
			'MA' => 'MOROCCO',
			'MZ' => 'MOZAMBIQUE',
			'MM' => 'MYANMAR',
			'NA' => 'NAMIBIA',
			'NR' => 'NAURU',
			'NP' => 'NEPAL',
			'NL' => 'NETHERLANDS',
			'AN' => 'NETHERLANDS ANTILLES',
			'NC' => 'NEW CALEDONIA',
			'NZ' => 'NEW ZEALAND',
			'NI' => 'NICARAGUA',
			'NE' => 'NIGER',
			'NG' => 'NIGERIA',
			'NU' => 'NIUE',
			'NF' => 'NORFOLK ISLAND',
			'MP' => 'NORTHERN MARIANA ISLANDS',
			'NO' => 'NORWAY',
			'OM' => 'OMAN',
			'PK' => 'PAKISTAN',
			'PW' => 'PALAU',
			'PS' => 'PALESTINIAN TERRITORY, OCCUPIED',
			'PA' => 'PANAMA',
			'PG' => 'PAPUA NEW GUINEA',
			'PY' => 'PARAGUAY',
			'PE' => 'PERU',
			'PH' => 'PHILIPPINES',
			'PN' => 'PITCAIRN',
			'PL' => 'POLAND',
			'PT' => 'PORTUGAL',
			'PR' => 'PUERTO RICO',
			'QA' => 'QATAR',
			'RE' => 'REUNION',
			'RO' => 'ROMANIA',
			'RU' => 'RUSSIAN FEDERATION',
			'RW' => 'RWANDA',
			'SH' => 'SAINT HELENA',
			'KN' => 'SAINT KITTS AND NEVIS',
			'LC' => 'SAINT LUCIA',
			'PM' => 'SAINT PIERRE AND MIQUELON',
			'VC' => 'SAINT VINCENT AND THE GRENADINES',
			'WS' => 'SAMOA',
			'SM' => 'SAN MARINO',
			'ST' => 'SAO TOME AND PRINCIPE',
			'SA' => 'SAUDI ARABIA',
			'SN' => 'SENEGAL',
			'SC' => 'SEYCHELLES',
			'SL' => 'SIERRA LEONE',
			'SG' => 'SINGAPORE',
			'SK' => 'SLOVAKIA',
			'SI' => 'SLOVENIA',
			'SB' => 'SOLOMON ISLANDS',
			'SO' => 'SOMALIA',
			'ZA' => 'SOUTH AFRICA',
			'GS' => 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS',
			'ES' => 'SPAIN',
			'LK' => 'SRI LANKA',
			'SD' => 'SUDAN',
			'SR' => 'SURINAME',
			'SJ' => 'SVALBARD AND JAN MAYEN',
			'SZ' => 'SWAZILAND',
			'SE' => 'SWEDEN',
			'CH' => 'SWITZERLAND',
			'SY' => 'SYRIAN ARAB REPUBLIC',
			'TW' => 'TAIWAN, PROVINCE OF CHINA',
			'TJ' => 'TAJIKISTAN',
			'TZ' => 'TANZANIA, UNITED REPUBLIC OF',
			'TH' => 'THAILAND',
			'TG' => 'TOGO',
			'TK' => 'TOKELAU',
			'TO' => 'TONGA',
			'TT' => 'TRINIDAD AND TOBAGO',
			'TN' => 'TUNISIA',
			'TR' => 'TURKEY',
			'TM' => 'TURKMENISTAN',
			'TC' => 'TURKS AND CAICOS ISLANDS',
			'TV' => 'TUVALU',
			'UG' => 'UGANDA',
			'UA' => 'UKRAINE',
			'AE' => 'UNITED ARAB EMIRATES',
			'GB' => 'UNITED KINGDOM',
			'US' => 'UNITED STATES',
			'UM' => 'UNITED STATES MINOR OUTLYING ISLANDS',
			'UY' => 'URUGUAY',
			'UZ' => 'UZBEKISTAN',
			'VU' => 'VANUATU',
			'VE' => 'VENEZUELA',
			'VN' => 'VIET NAM',
			'VG' => 'VIRGIN ISLANDS, BRITISH',
			'VI' => 'VIRGIN ISLANDS, U.S.',
			'WF' => 'WALLIS AND FUTUNA',
			'EH' => 'WESTERN SAHARA',
			'YE' => 'YEMEN',
			'YU' => 'YUGOSLAVIA',
			'ZM' => 'ZAMBIA',
			'ZW' => 'ZIMBABWE',
			);
		wfProfileOut( __METHOD__ );
		return ( isset( $countries[strtoupper( $code )] ) ) ? $countries[strtoupper( $code )] : null;
	}
}