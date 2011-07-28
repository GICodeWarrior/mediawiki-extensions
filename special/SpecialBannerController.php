<?php

/**
 * Generates Javascript file which controls banner selection on the client side
 */
class SpecialBannerController extends UnlistedSpecialPage {
	protected $sharedMaxAge = 3600; // Cache for 1 hour on the server side
	protected $maxAge = 3600; // Cache for 1 hour on the client side

	function __construct() {
		// Register special page
		parent::__construct( "BannerController" );
	}

	function execute( $par ) {
		global $wgOut;
		
		$wgOut->disable();
		$this->sendHeaders();
		
		$content = $this->getOutput();
		if ( strlen( $content ) == 0 ) {
			// Hack for IE/Mac 0-length keepalive problem, see RawPage.php
			echo "/* Empty */";
		} else {
			echo $content;
		}
	}
	
	/**
	 * Generate the HTTP response headers for the banner controller
	 */
	function sendHeaders() {
		global $wgJsMimeType;
		header( "Content-type: $wgJsMimeType; charset=utf-8" );
		header( "Cache-Control: public, s-maxage=$this->sharedMaxAge, max-age=$this->maxAge" );
	}

	/**
	 * Generate the body for the Javascript file
	 *
	 * We use a jsonp scheme for actual delivery of the banner so that they can be served from meta.
	 * In order to circumvent the normal squid cache override we add '/cn.js' to the bannerlist URL.
	 */
	function getOutput() {
		global $wgCentralPagePath, $wgNoticeFundraisingUrl, $wgContLang;
		
		$js = $this->getScriptFunctions() . $this->getToggleScripts();
		$js .= <<<JAVASCRIPT
( function( $ ) {
	$.ajaxSetup({ cache: true });
	$.centralNotice = {
		'data': {
			'getVars': {}
		},
		'fn': {
			'loadBanner': function( bannerName, campaign, bannerType ) {
				// Get the requested banner
				var bannerPageQuery = $.param( { 
					'banner': bannerName, 'campaign': campaign, 'userlang': wgUserLanguage, 
					'db': wgDBname, 'sitename': wgSiteName, 'country': Geo.country
				} );
				var bannerPage = '?title=Special:BannerLoader&' + bannerPageQuery;
JAVASCRIPT;
		$js .= "\n\t\t\t\tvar bannerScript = '<script type=\"text/javascript\" src=\"" . 
			Xml::escapeJsString( $wgCentralPagePath ) .
			"' + bannerPage + '\"></script>';\n";
		$js .= <<<JAVASCRIPT
				if ( document.cookie.indexOf( 'centralnotice_'+bannerType+'=hide' ) == -1 ) {
					$( '#siteNotice' ).prepend( '<div id="centralNotice" class="' + 
						( wgNoticeToggleState ? 'expanded' : 'collapsed' ) + 
						' cn-' + bannerType + '">'+bannerScript+'</div>' );
				}
			},
			'loadBannerList': function( geoOverride ) {
				if ( geoOverride ) {
					var geoLocation = geoOverride; // override the geo info
				} else {
					var geoLocation = Geo.country; // pull the geo info
				}
				var bannerListQuery = $.param( { 'language': wgContentLanguage, 'project': wgNoticeProject, 'country': geoLocation } );
JAVASCRIPT;
		$js .= "\n\t\t\t\tvar bannerListURL = wgScript + '?title=' + encodeURIComponent('" . 
			$wgContLang->specialPage( 'BannerListLoader' ) .
			"') + '&cache=/cn.js&' + bannerListQuery;\n";
		$js .= <<<JAVASCRIPT
				var request = $.ajax( {
					url: bannerListURL,
					dataType: 'json',
					success: $.centralNotice.fn.chooseBanner
				} );
			},
			'chooseBanner': function( bannerList ) {
				// Convert the json object to a true array
				bannerList = Array.prototype.slice.call( bannerList );
				
				// Make sure there are some banners to choose from
				if ( bannerList.length == 0 ) return false;
				
				var groomedBannerList = [];
				
				for( var i = 0; i < bannerList.length; i++ ) {
					// Only include this banner if it's intended for the current user
					if( ( wgUserName && bannerList[i].display_account ) || 
						( !wgUserName && bannerList[i].display_anon == 1 ) ) 
					{
						// add the banner to our list once per weight
						for( var j=0; j < bannerList[i].weight; j++ ) {
							groomedBannerList.push( bannerList[i] );
						}
					}
				}
				
				// Return if there's nothing left after the grooming
				if( groomedBannerList.length == 0 ) return false;
				
				// Choose a random key
				var pointer = Math.floor( Math.random() * groomedBannerList.length );
				
				// Load a random banner from our groomed list
				$.centralNotice.fn.loadBanner( 
					groomedBannerList[pointer].name,
					groomedBannerList[pointer].campaign,
					( groomedBannerList[pointer].fundraising ? 'fundraising' : 'default' )
				);
			},
			'getQueryStringVariables': function() {
				document.location.search.replace( /\??(?:([^=]+)=([^&]*)&?)/g, function () {
					function decode( s ) {
						return decodeURIComponent( s.split( "+" ).join( " " ) );
					}
					$.centralNotice.data.getVars[decode( arguments[1] )] = decode( arguments[2] );
				} );
			}
		}
	}
	$( document ).ready( function () {
		// Initialize the query string vars
		$.centralNotice.fn.getQueryStringVariables();
		if( $.centralNotice.data.getVars['banner'] ) {
			// if we're forcing one banner
			$.centralNotice.fn.loadBanner( $.centralNotice.data.getVars['banner'] );
		} else {
			// Look for banners ready to go NOW
			$.centralNotice.fn.loadBannerList( $.centralNotice.data.getVars['country'] );
		}
	} ); //document ready
} )( jQuery );
JAVASCRIPT;
		return $js;
			
	}
	
	function getToggleScripts() {
		$script = "var wgNoticeToggleState = (document.cookie.indexOf('hidesnmessage=1')==-1);\n\n";
		return $script;
	}

	function getScriptFunctions() {
		global $wgNoticeFundraisingUrl;
		$script = <<<JAVASCRIPT
function insertBanner(bannerJson) {
	jQuery( 'div#centralNotice' ).prepend( bannerJson.bannerHtml );
	if ( bannerJson.fundraising ) {
JAVASCRIPT;
	$script .= "\n\t\tvar url = '" . 
	Xml::escapeJsString( $wgNoticeFundraisingUrl ) . "';";
	$script .= <<<JAVASCRIPT
		if ( bannerJson.landingPages.length ) {
			targets = String( bannerJson.landingPages ).split(',');
			url += "?" + jQuery.param( {
				'landing_page': targets[Math.floor( Math.random() * targets.length )].replace( /^\s+|\s+$/, '' )
			} );
			url += "&" + jQuery.param( {
				'utm_medium': 'sitenotice', 'utm_campaign': bannerJson.campaign, 
				'utm_source': bannerJson.bannerName, 'language': wgUserLanguage, 
				'country': Geo.country
			} );
			jQuery( '#cn_fundraising_link' ).attr( 'href', url );
		}
	}
}
function hideBanner( bannerType ) {
	$( '#centralNotice' ).hide(); // Hide current banner
	if ( bannerType === undefined ) bannerType = 'default';
	setBannerHidingCookie( bannerType ); // Hide future banners of the same type
}
function setBannerHidingCookie( bannerType ) {
	var e = new Date();
	e.setTime( e.getTime() + (7*24*60*60*1000) ); // one week
	var work='centralnotice_'+bannerType+'=hide; expires=' + e.toGMTString() + '; path=/';
	document.cookie = work;
}
function toggleNotice() {
	var notice = document.getElementById('centralNotice');
	if (!wgNoticeToggleState) {
		notice.className = notice.className.replace('collapsed', 'expanded');
		toggleNoticeCookie('0'); // Expand banners
	} else {
		notice.className = notice.className.replace('expanded', 'collapsed');
		toggleNoticeCookie('1'); // Collapse banners
	}
	wgNoticeToggleState = !wgNoticeToggleState;
}
function toggleNoticeStyle(elems, display) {
	if(elems)
		for(var i=0;i<elems.length;i++)
			elems[i].style.display = display;
}
function toggleNoticeCookie(state) {
	var e = new Date();
	e.setTime( e.getTime() + (7*24*60*60*1000) ); // one week
	var work='hidesnmessage='+state+'; expires=' + e.toGMTString() + '; path=/';
	document.cookie = work;
}

JAVASCRIPT;
		return $script;
	}

}
