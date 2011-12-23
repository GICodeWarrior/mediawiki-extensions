<?php

class ExtZeroRatedMobileAccess {
	const VERSION = '0.0.5';

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
		self::$renderZeroRatedLandingPage = $wgRequest->getFuzzyBool( 'renderZeroRatedLandingPage' );
		if ( self::$renderZeroRatedLandingPage === true ) {
			echo wfMsg( 'zero-rated-mobile-access-desc' );
			$languageNames = Language::getLanguageNames();
			$country = $wgRequest->getVal( 'country' );
			$ip = $wgRequest->getVal( 'ip', wfGetIP() );
			// Temporary hack to allow for testing on localhost
			$countryIps = array(
								'GERMANY' => '80.237.226.75',
								'MEXICO' => '187.184.240.247',
								'THAILAND' => '180.180.150.104',
								'FRANCE' => '90.6.70.28',
								);
			$ip = ( strpos( $ip, '192.168.' ) === 0 ) ? $countryIps['THAILAND'] : $ip;
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
			$languagesForCountry = ( isset( $languageOptions[self::getFullCountryNameFromCode( $country )] ) ) ?
				$languageOptions[self::getFullCountryNameFromCode( $country )] : null;
			//self::addDebugOutput( $languageOptions );
			self::addDebugOutput( self::getFullCountryNameFromCode( $country ) );
			self::addDebugOutput( $languagesForCountry );
			self::writeDebugOutput();

			if ( is_array( $languagesForCountry ) ) {
				foreach( $languagesForCountry as $language ) {
					echo Html::element( 'h3',
								array( 'id' => 'lang_' . $language['language']),
									$languageNames[$language['language']]);
					echo Html::element( 'hr' );
					echo self::getSearchFormHtml( $language['language'] );
				}
			}
			$output = Html::openElement( 'select',
				array( 'id' => 'languageselection',
					'onchange' => 'javascript:window.location = this.options[this.selectedIndex].value;',
				)
			);
			foreach ( $languageNames as $languageCode => $languageName ) {
				$output .=	Html::element( 'option',
							array( 'value' => '//' . $languageCode . '.m.wikipedia.org/' ),
									$languageName );
			}
			$output .= Html::closeElement( 'select' );
			echo $output;
			exit();
		}

		wfProfileOut( __METHOD__ );
		return true;
	}

	private static function addDebugOutput( $object ) {
		wfProfileIn( __METHOD__ );
		if ( is_array( self::$debugOutput ) ) {
			self::$debugOutput[] = $object;
		}
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
		$languageOptionsWikiPage = wfMsg( 'zero-rated-mobile-access-language-options-wiki-page' );
		$title = Title::newFromText( $languageOptionsWikiPage, NS_MEDIAWIKI );
		// Use the revision directly to prevent other hooks to be called
		$rev = Revision::newFromTitle( $title );
		$lines = array();
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
		$code = ( strlen( $code ) === 2 ) ? strtoupper( $code ) : null;
		return ( $code && isset( $countries[$code] ) ) ? $countries[$code] : null;
	}

	private static function getSearchFormHtml( $langCode ) {
		$searchValue = wfMessage( 'zero-rated-mobile-access-search' )->inLanguage( $langCode );
		$formHtml = <<<HTML
		<form action="//{$langCode}.wikipedia.org/w/index.php" class="search_bar" method="get">
			<input type="hidden" value="Special:Search" name="title">
			<div id="sq" class="divclearable">
        		<input type="text" name="search" id="search" size="22" value="" autocorrect="off" autocomplete="off" autocapitalize="off" maxlength="1024">
				<div class="clearlink" id="clearsearch" title="Clear"></div>
			</div> 
		<button id="goButton" type="submit">{$searchValue}</button>
		</form>
HTML;
		return $formHtml;
	}
}