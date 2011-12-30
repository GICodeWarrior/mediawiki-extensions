<?php

class ExtZeroRatedMobileAccess {
	const VERSION = '0.0.6';

	public static $renderZeroRatedLandingPage;
	public static $renderZeroRatedBanner;
	private static $debugOutput = array();
	private static $displayDebugOutput = false;
	private static $formatMobileUrl = '//%s.m.wikipedia.org/';
	private static $title;
	private static $isFilePage;
	private static $acceptBilling;
	private static $carrier;
	private static $renderZeroRatedRedirect;

	/**
	 * Handler for the BeforePageDisplay hook
	 *
	 * @param $out OutputPage
	 * @param $text String
	 * @return bool
	 */
	public function beforePageDisplayHTML( &$out, &$text ) {
		global $wgRequest;
		wfProfileIn( __METHOD__ );

		$output = Html::openElement( 'div',
			array( 'id' => 'zero-landing-page' ) );

		self::$renderZeroRatedLandingPage = $wgRequest->getFuzzyBool( 'renderZeroRatedLandingPage' );
		self::$renderZeroRatedBanner = $wgRequest->getFuzzyBool( 'renderZeroRatedBanner' );
		self::$renderZeroRatedRedirect = $wgRequest->getFuzzyBool( 'renderZeroRatedRedirect' );
		self::$acceptBilling = $wgRequest->getVal( 'acceptbilling' );
		self::$title = $out->getTitle();

		if ( self::$title->getNamespace() == NS_FILE ) {
			self::$isFilePage = true;
		}

		if ( self::$acceptBilling === 'no' ) {
			$targetUrl = $wgRequest->getVal( 'returnto' );
			$out->redirect( $targetUrl, '301' );
			$out->output();
		}

		if ( self::$acceptBilling === 'yes' ) {
			$targetUrl = $wgRequest->getVal( 'returnto' );
			if ( $targetUrl ) {
				$out->redirect( $targetUrl, '301' );
				$out->output();
			}
		}

		if ( self::$isFilePage && self::$acceptBilling !== 'yes' ) {
			$acceptBillingYes = Html::rawElement( 'a',
				array('href' => $wgRequest->appendQuery( 'renderZeroRatedBanner=true&acceptbilling=yes' ) ),
				wfMsg( 'zero-rated-mobile-access-banner-text-data-charges-yes' ) );
			$referrer = $wgRequest->getHeader( 'referer' );
			$acceptBillingNo = Html::rawElement( 'a',
				array('href' => $wgRequest->appendQuery( 'acceptbilling=no&returnto=' . urlencode( $referrer ) ) ),
				wfMsg( 'zero-rated-mobile-access-banner-text-data-charges-no' ) );
			$bannerText = Html::rawElement( 'h3',
				array(	'id' => 'zero-rated-banner-text' ),
					wfMsg( 'zero-rated-mobile-access-banner-text-data-charges', $acceptBillingYes, $acceptBillingNo ) );
			$banner = Html::rawElement( 'div',
				array(	'style' => 'display:none;',
						'id' => 'zero-rated-banner-red' ),
					$bannerText
			);
			$output .= $banner;
			$out->clearHTML();
			$out->setPageTitle( null );
		} elseif ( self::$renderZeroRatedRedirect === true ) {
			$returnto = $wgRequest->getVal( 'returnto' );
			$acceptBillingYes = Html::rawElement( 'a',
				array('href' => $wgRequest->appendQuery( 'renderZeroRatedBanner=true&acceptbilling=yes&returnto=' . urlencode( $returnto ) ) ),
				wfMsg( 'zero-rated-mobile-access-banner-text-data-charges-yes' ) );
			$referrer = $wgRequest->getHeader( 'referer' );
			$acceptBillingNo = Html::rawElement( 'a',
				array('href' => $wgRequest->appendQuery( 'acceptbilling=no&returnto=' . urlencode( $referrer ) ) ),
				wfMsg( 'zero-rated-mobile-access-banner-text-data-charges-no' ) );
			$bannerText = Html::rawElement( 'h3',
				array(	'id' => 'zero-rated-banner-text' ),
					wfMsg( 'zero-rated-mobile-access-banner-text-data-charges', $acceptBillingYes, $acceptBillingNo ) );
			$banner = Html::rawElement( 'div',
				array(	'style' => 'display:none;',
						'id' => 'zero-rated-banner-red' ),
					$bannerText
			);
			$output .= $banner;
			$out->clearHTML();
			$out->setPageTitle( null );
		} elseif ( self::$renderZeroRatedBanner === true ) {
			// a2enmod headers >>> .htaccess >>> RequestHeader set HTTP_CARRIER Verizon
			$carrier = $wgRequest->getHeader( 'HTTP_CARRIER' );
			self::$carrier = $this->lookupCarrier( $carrier );
			$html = $out->getHTML();
			$parsedHtml = $this->parseLinksForZeroQueryString( $html );
			$out->clearHTML();
			$out->addHTML( $parsedHtml );
			$bannerText = Html::rawElement( 'h3',
				array(	'id' => 'zero-rated-banner-text' ),
					wfMsg( 'zero-rated-mobile-access-banner-text', self::$carrier['link'] ) );
			$banner = Html::rawElement( 'div',
				array(	'style' => 'display:none;',
						'id' => 'zero-rated-banner' ),
					$bannerText
			);
			$output .= $banner;
		}
		if ( self::$renderZeroRatedLandingPage === true ) {
			$out->clearHTML();
			$out->setPageTitle( null );
			$output .= wfMsg( 'zero-rated-mobile-access-desc' );
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
				$sizeOfLanguagesForCountry = sizeof( $languagesForCountry );
				for ( $i = 0; $i < $sizeOfLanguagesForCountry; $i++ ) {
					$languageName = $languageNames[$languagesForCountry[$i]['language']];
					$languageCode = $languagesForCountry[$i]['language'];
					$output .= Html::element( 'hr' );
					$output .= Html::element( 'h3',
						array( 'id' => 'lang_' . $languageCode ),
						$languageName
					);
					if ( $i == 0 ) {
						$output .= self::getSearchFormHtml( $languageCode );
					} else {
						$languageUrl = sprintf( self::$formatMobileUrl, $languageCode );
						$output .= Html::element( 'a',
							array(	'id' => 'lang_' . $languageCode,
							 		'href' => $languageUrl ),
							wfMessage( 'zero-rated-mobile-access-home-page-selection',
								$languageName )->inLanguage( $languageCode )
						);
						$output .= Html::element( 'br' );
					}
				}
			}
			$output .= Html::element( 'hr' );
			$output .= wfMsg( 'zero-rated-mobile-access-home-page-selection-text' );
			$output .= Html::openElement( 'select',
				array( 'id' => 'languageselection',
					'onchange' => 'javascript:window.location = this.options[this.selectedIndex].value;',
				)
			);
			$output .=	Html::element( 'option',
				array( 'value' => '' ),
				wfMsg( 'zero-rated-mobile-access-language-selection' )
			);
			foreach ( $languageNames as $languageCode => $languageName ) {
				$output .=	Html::element( 'option',
					array( 'value' => sprintf( self::$formatMobileUrl, $languageCode ) ),
					$languageName
				);
			}
			$output .= Html::closeElement( 'select' );
		}

		$output .= Html::closeElement( 'div' );
		$out->addHTML( $output );
		wfProfileOut( __METHOD__ );
		return true;
	}
	
	/**
	* Returns information about carrier
	* 
	* @param String $carrier: Name of carrier e.g., "Verizon Wireless"
	* @return Array
	*/
	private function lookupCarrier( $carrier ) {
		wfProfileIn( __METHOD__ );
		$carrierLink = '';
		$carrierLinkData = '';
		switch ( $carrier ) {
			case 'Verizon':
				$carrierLinkData = array( 'name' => 'Verizon Wireless', 
					'url' => 'http://www.verizonwireless.com/b2c/index.html',
					'partnerId' => '1006' );
				break;
			case 'Orange':
				$carrierLinkData = array( 'name' => 'Orange Tunisia', 
					'url' => 'http://www.orange.tn/',
					'partnerId' => '1007' );
				break;
		}

		if ( is_array( $carrierLinkData ) ) {
			$carrierLink = Html::rawElement( 'a',
				array('href' => $carrierLinkData['url'] ),
				$carrierLinkData['name'] );
		}
		$carrierLinkData['link'] = $carrierLink;
		wfProfileOut( __METHOD__ );
		return $carrierLinkData;
	}

	/**
	* Returns the Html of a page with the various links appended with zeropartner parameter
	* 
	* @param String $html: Html of current page
	* @return String
	*/
	private function parseLinksForZeroQueryString( $html ) {
		wfProfileIn( __METHOD__ );
		$html = mb_convert_encoding( $html, 'HTML-ENTITIES', "UTF-8" );
		libxml_use_internal_errors( true );
		$doc = new DOMDocument();
		$doc->loadHTML( '<?xml encoding="UTF-8">' . $html );
		libxml_use_internal_errors( false );
		$doc->preserveWhiteSpace = false;
		$doc->strictErrorChecking = false;
		$doc->encoding = 'UTF-8';

		$xpath = new DOMXpath( $doc );

		$zeroRatedLinks = $xpath->query( "//a[not(contains(@class,'external'))]" );
		foreach ( $zeroRatedLinks as $zeroRatedLink ) {
			$zeroRatedLinkHref = $zeroRatedLink->getAttribute( 'href' );
			if ( $zeroRatedLinkHref && substr( $zeroRatedLinkHref, 0, 1 ) !== '#' ) {
				$zeroPartnerUrl = $this->appendQueryString( $zeroRatedLinkHref,
					array( array( 'name' => 'zeropartner',
						'value' => self::$carrier['partnerId'] ), 
					array('name' => 'renderZeroRatedBanner', 
						'value' => 'true') ) );
				if ( $zeroPartnerUrl ) {
					$zeroRatedLink->setAttribute( 'href', $zeroPartnerUrl );
				}
			}
		}

		$zeroRatedExternalLinks = $xpath->query( "//a[contains(@class,'external')]" );
		foreach ( $zeroRatedExternalLinks as $zeroRatedExternalLink ) {
			$zeroRatedExternalLinkHref = $zeroRatedExternalLink->getAttribute( 'href' );
			if ( $zeroRatedExternalLinkHref && substr( $zeroRatedExternalLinkHref, 0, 1 ) !== '#' ) {
				$zeroPartnerUrl = $this->appendQueryString( $zeroRatedLinkHref,
					array( array( 'name' => 'zeropartner',
						'value' => self::$carrier['partnerId'] ), 
					array('name' => 'renderZeroRatedBanner', 
						'value' => 'true') ) );
				if ( $zeroPartnerUrl ) {
					$zeroRatedExternalLink->setAttribute( 'href', '?renderZeroRatedRedirect=true&returnto=' . urlencode($zeroRatedExternalLinkHref) );
				}
			}
		}

		$output = $doc->saveXML( null, LIBXML_NOEMPTYTAG );
		wfProfileOut( __METHOD__ );
		return $output;
	}

	/**
	* Returns the url with querystring parameters appended
	* 
	* @param String $url: valid url to append querystring
	* @param Array $queryStringParameters: array of parameters to add to querystring
	* @return String
	*/
	private function appendQueryString( $url, $queryStringParameters ) {
		wfProfileIn( __METHOD__ );
		$parsedUrl = parse_url( $url );
		if ( isset( $parsedUrl['query'] ) ) {
			parse_str( $parsedUrl['query'], $queryString );
			foreach ( $queryStringParameters as $queryStringParameter ) {
				$queryString[$queryStringParameter['name']] = $queryStringParameter['value'];
			}
			$parsedUrl['query'] = http_build_query( $queryString );
		} else {
			$parsedUrl['query'] = '';
			foreach ( $queryStringParameters as $queryStringParameter ) {
				$parsedUrl['query'] .= "{$queryStringParameter['name']}={$queryStringParameter['value']}&";
			}
			if ( substr( $parsedUrl['query'], -1, 1 ) === '&' ) {
				$parsedUrl['query'] = substr( $parsedUrl['query'], 0, -1 );
			}
		}
		wfProfileOut( __METHOD__ );
		return $this->unParseUrl( $parsedUrl );
	}

	/**
	* Returns the full url
	* 
	* @param Array $parsedUrl: the array returned from parse_url
	* @return String
	*/
	private function unParseUrl( $parsedUrl ) { 
		wfProfileIn( __METHOD__ );
		$scheme = isset( $parsedUrl['scheme'] ) ? $parsedUrl['scheme'] . '://' : '';
		$host = isset( $parsedUrl['host'] ) ? $parsedUrl['host'] : '';
		$port = isset( $parsedUrl['port'] ) ? ':' . $parsedUrl['port'] : '';
		$user = isset( $parsedUrl['user'] ) ? $parsedUrl['user'] : '';
		$pass = isset( $parsedUrl['pass'] ) ? ':' . $parsedUrl['pass']  : '';
		$pass = ( $user || $pass ) ? "$pass@" : '';
		$path = isset( $parsedUrl['path'] ) ? $parsedUrl['path'] : '';
		$query = isset( $parsedUrl['query'] ) ? '?' . $parsedUrl['query'] : '';
		$fragment = isset( $parsedUrl['fragment'] ) ? '#' . $parsedUrl['fragment'] : '';
		wfProfileOut( __METHOD__ );
		return "$scheme$user$pass$host$port$path$query$fragment"; 
	}

	/**
	* Adds object to debugOutput Array
	* 
	* @param Object $object: any valid PHP object
	* @return bool
	*/
	private static function addDebugOutput( $object ) {
		wfProfileIn( __METHOD__ );
		if ( is_array( self::$debugOutput ) ) {
			self::$debugOutput[] = $object;
		}
		wfProfileOut( __METHOD__ );
		return true;
	}

	/**
	* Writes objects from the debugOutput Array to buffer
	* 
	* @return bool
	*/
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

	/**
	* Returns the language options array parsed from a valid Wiki page
	* 
	* @return Array
	*/
	private static function createLanguageOptionsFromWikiText() {
		global $wgMemc;
		wfProfileIn( __METHOD__ );
		$languageOptionsWikiPage = wfMsg( 'zero-rated-mobile-access-language-options-wiki-page' );
		$title = Title::newFromText( $languageOptionsWikiPage, NS_MEDIAWIKI );
		// Use the revision directly to prevent other hooks to be called
		$rev = Revision::newFromTitle( $title );
		$sha1OfRev = $rev->getSha1();
		$key = wfMemcKey( 'zero-rated-mobile-access-language-options', $sha1OfRev );
		$languageOptions = $wgMemc->get( $key );
		
		if ( !$languageOptions ) {
			$languageOptions = array();
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
								array(	'language'  =>  $language, 
										'percentage'  =>  intval( str_replace( '%', '', trim( $lineParts[1] ) ) ) ) :
								$language;
						}
					}
				}
			}
			$wgMemc->set( $key, $languageOptions, self::getMaxAge() );
		}
		wfProfileOut( __METHOD__ );
		return $languageOptions;
	}

	/**
	 * Returns the Unix timestamp of current day's first second
	 * 
	 * @return int: Timestamp
	 */
	private static function todaysStart() {
		wfProfileIn( __METHOD__ );
		static $time = false;
		if ( !$time ) {
			global $wgLocaltimezone;
			if ( isset( $wgLocaltimezone ) ) {
				$tz = new DateTimeZone( $wgLocaltimezone );
			} else {
				$tz = new DateTimeZone( date_default_timezone_get() );
			}
			$dt = new DateTime( 'now', $tz );
			$dt->setTime( 0, 0, 0 );
			$time = $dt->getTimestamp();
		}
		wfProfileOut( __METHOD__ );
		return $time;
	}

	/**
	* Returns the number of seconds an item should stay in cache
	* 
	* @return int: Time in seconds
	*/
	private static function getMaxAge() {
		wfProfileIn( __METHOD__ );
		// add 10 seconds to cater for the time deviation between servers
		$expiry = self::todaysStart() + 24 * 3600 - wfTimestamp() + 10;
		wfProfileOut( __METHOD__ );
		return min( $expiry, 3600 );
	}

	/**
	* Get full country name from code
	* 
	* @param string $code: alpha-2 code ISO 3166 country code
	* @return String
	*/
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

	/**
	* Search form for various languages
	* 
	* @param string $langCode: alpha-2 code for language
	* @return String
	*/
	private static function getSearchFormHtml( $langCode ) {
		wfProfileIn( __METHOD__ );
		$searchValue = wfMessage( 'zero-rated-mobile-access-search' )->inLanguage( $langCode );
		$formHtml = <<<HTML
		<form id="zero-language-search" action="//{$langCode}.wikipedia.org/w/index.php" class="search_bar" method="get">
			<input type="hidden" value="Special:Search" name="title">
			<div id="sq" class="divclearable">
        		<input type="text" name="search" id="search" size="22" value="" autocorrect="off" autocomplete="off" autocapitalize="off" maxlength="1024">
				<div class="clearlink" id="clearsearch" title="Clear"></div>
			</div> 
		<button id="goButton" type="submit">{$searchValue}</button>
		</form>
HTML;
		wfProfileOut( __METHOD__ );
		return $formHtml;
	}

	public function getVersion() {
		return __CLASS__ . ': $Id$';
	}
}