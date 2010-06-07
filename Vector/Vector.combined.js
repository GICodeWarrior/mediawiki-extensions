/* Prototype code to show collapsing left nav options */
/* First draft and will be changing greatly */

$j(document).ready( function() {
	if( !wgVectorEnabledModules.collapsiblenav ) {
		return true;
	}
	var mod = {
		'browsers': {
			// Left-to-right languages
			'ltr': {
				// Collapsible Nav is broken in Opera < 9.6 and Konqueror < 4
				'opera': [['>=', 9.6]],
				'konqueror': [['>=', 4.0]],
				'blackberry': false,
				'ipod': false,
				'iphone': false
			},
			// Right-to-left languages
			'rtl': {
				'opera': [['>=', 9.6]],
				'konqueror': [['>=', 4.0]],
				'blackberry': false,
				'ipod': false,
				'iphone': false
			}
		}
	};
	if ( !$j.wikiEditor.isSupported( mod ) ) {
		return true;
	}
	// Fallback to old version
	var version = 1;
	// Allow new version override
	if ( wgCollapsibleNavForceNewVersion == true ) {
		version = 2;
	} else {
		// Make bucket testing optional
		if ( wgCollapsibleNavBucketTest == true ) {
			// This is be determined randomly, and then stored in a cookie
			version = $j.cookie( 'vector-nav-pref-version' );
			// If the cookie didn't exist, or the value is out of range, generate a new one and save it
			if ( version == null ) {
				console.log( version );
				// 50% of the people will get the new version
				version = Math.round( Math.random() + 1 );
				$j.cookie( 'vector-nav-pref-version', version, { 'expires': 30, 'path': '/' } );
			}
		}
	}
	// Language portal splitting feature (if it's turned on)
	if ( version == 2 ) {
		// How many links to show in the primary languages portal
		var limit = 5;
		// How many links there must be in the secondary portal to justify having a secondary portal
		var threshold = 3;
		// Make the interwiki language links list a secondary list, and create a new list before it as primary list
		$j( '#p-lang ul' ).addClass( 'secondary' ).before( '<ul class="primary"></ul>' );
		// This is a list of languages in order of Wikipedia project size. This is the lowest fallback for choosing
		// which links to show in the primary list. Ideally the browser's accept-language headers should steer this
		// list, and we should fallback on a site configured (MediaWiki:Common.js) list of prefered languages.
		var languages = [
			'en', 'fr', 'de', 'es', 'pt', 'it', 'ru', 'ja', 'nl', 'pl', 'zh', 'sv', 'ar', 'tr', 'uk', 'fi', 'no', 'ca',
			'ro', 'hu', 'ksh', 'id',  'he', 'cs', 'vi', 'ko', 'sr', 'fa', 'da', 'eo', 'sk', 'th', 'lt', 'vo', 'bg',
			'sl', 'hr', 'hi', 'et', 'mk', 'simple', 'new', 'ms', 'nn', 'gl', 'el', 'eu', 'ka', 'tl', 'bn', 'lv', 'ml',
			'bs', 'te', 'la', 'az', 'sh', 'war', 'br', 'is', 'mr', 'be-x-old', 'sq', 'cy', 'lb', 'ta', 'zh-classical',
			'an', 'jv', 'ht', 'oc', 'bpy', 'ceb', 'ur', 'zh-yue', 'pms', 'scn', 'be', 'roa-rup', 'qu', 'af', 'sw',
			'nds', 'fy', 'lmo', 'wa', 'ku', 'hy', 'su', 'yi', 'io', 'os', 'ga', 'ast', 'nap', 'vec', 'gu', 'cv',
			'bat-smg', 'kn', 'uz', 'zh-min-nan', 'si', 'als', 'yo', 'li', 'gan', 'arz', 'sah', 'tt', 'bar', 'gd', 'tg',
			'kk', 'pam', 'hsb', 'roa-tara', 'nah', 'mn', 'vls', 'gv', 'mi', 'am', 'ia', 'co', 'ne', 'fo', 'nds-nl',
			'glk', 'mt', 'ang', 'wuu', 'dv', 'km', 'sco', 'bcl', 'mg', 'my', 'diq', 'tk', 'szl', 'ug', 'fiu-vro', 'sc',
			'rm', 'nrm', 'ps', 'nv', 'hif', 'bo', 'se', 'sa', 'pnb', 'map-bms', 'lad', 'lij', 'crh', 'fur', 'kw', 'to',
			'pa', 'jbo', 'ba', 'ilo', 'csb', 'wo', 'xal', 'krc', 'ckb', 'pag', 'ln', 'frp', 'mzn', 'ce', 'nov', 'kv',
			'eml', 'gn', 'ky', 'pdc', 'lo', 'haw', 'mhr', 'dsb', 'stq', 'tpi', 'arc', 'hak', 'ie', 'so', 'bh', 'ext',
			'mwl', 'sd', 'ig', 'myv', 'ay', 'iu', 'na', 'cu', 'pi', 'kl', 'ty', 'lbe', 'ab', 'got', 'sm', 'as', 'mo',
			'ee', 'zea', 'av', 'ace', 'kg', 'bm', 'cdo', 'cbk-zam', 'kab', 'om', 'chr', 'pap', 'udm', 'ks', 'zu', 'rmy',
			'cr', 'ch', 'st', 'ik', 'mdf', 'kaa', 'aa', 'fj', 'srn', 'tet', 'or', 'pnt', 'bug', 'ss', 'ts', 'pcd',
			'pih', 'za', 'sg', 'lg', 'bxr', 'xh', 'ak', 'ha', 'bi', 've', 'tn', 'ff', 'dz', 'ti', 'ki', 'ny', 'rw',
			'chy', 'tw', 'sn', 'tum', 'ng', 'rn', 'mh', 'ii', 'cho', 'hz', 'kr', 'ho', 'mus', 'kj'
		];
		// If the user has an Accept-Language cookie, use it. Otherwise, set it asynchronously but keep the default behavior
		// for this page view.
		var acceptLangCookie = $j.cookie( 'accept-language' );
		if ( acceptLangCookie != null ) {
			// Put the user's accepted languages before the list ordered by wiki size
			if ( acceptLangCookie != '' ) {
				languages = acceptLangCookie.split( ',' ).concat( languages );
			}
		} else {
			$j.getJSON( wgScriptPath + '/api.php?action=query&meta=userinfo&uiprop=acceptlang&format=json', function( data ) {
				var langs = [];
				if ( typeof data.query != 'undefined' && typeof data.query.userinfo != 'undefined' &&
						typeof data.query.userinfo.acceptlang != 'undefined' ) {
					for ( var j = 0; j < data.query.userinfo.acceptlang.length; j++ ) {
						if ( data.query.userinfo.acceptlang[j].q != 0 ) {
							langs.push( data.query.userinfo.acceptlang[j]['*'] );
						}
					}
				}
				$j.cookie( 'accept-language', langs.join( ',' ), { 'path': '/', 'expires': 30 } );
			} );
		}
		// Shortcuts to the two lists
		$primary = $j( '#p-lang ul.primary' );
		$secondary = $j( '#p-lang ul.secondary' );
		// Adjust the limit based on the threshold
		if ( $secondary.children().length < limit + threshold ) {
			limit += threshold;
		}
		// Move up to 5 of the links into the primary list, based on the priorities set forth in the languages list
		var count = 0;
		for ( var i = 0; i < languages.length; i++ ) {
			$link = $secondary.find( '.interwiki-' + languages[i] );
			if ( $link.length ) {
				if ( count++ < limit ) {
					$link.appendTo( $primary );
				} else {
					break;
				}
			}
		}
		// If there's still links in the secondary list and we havn't filled the primary list to it's limit yet, move links
		// into the primary list in order of appearance
		if ( count < limit ) {
			$secondary.children().each( function() {
				if ( count++ < limit ) {
					$j(this).appendTo( $primary );
				} else {
					return false;
				}
			} );
		}
		// Hide the more portal if it's now empty, otherwise make the list into it's very own portal
		if ( $secondary.children().length == 0 ) {
			$secondary.remove();
		} else {
			$j( '#p-lang' ).after( '<div id="p-lang-more" class="portal"><h5></h5><div class="body"></div></div>' );
			$j( '#p-lang-more h5' ).text( mw.usability.getMsg( 'vector-collapsiblenav-more' ) );
			$secondary.appendTo( $j( '#p-lang-more div.body' ) );
		}
		// Always show the primary interwiki language portal
		$j( '#p-lang' ).addClass( 'persistent' );
	}
	// Always show the first portal
	$j( '#panel > div.portal:first' ).addClass( 'first persistent' );
	// Apply a class to the entire panel to activate styles
	$j( '#panel' ).addClass( 'collapsible-nav' );
	// Use cookie data to restore preferences of what to show and hide
	$j( '#panel > div.portal:not(.persistent)' )
		.each( function( i ) {
			var id = $j(this).attr( 'id' );
			var state = $j.cookie( 'vector-nav-' + id );
			// In the case that we are not showing the new version, let's show the languages by default
			if ( state == 'true' || ( state == null && i < 1 ) || version == 1 && id == 'p-lang' ) {
				$j(this)
					.addClass( 'expanded' )
					.find( 'div.body' )
					.show();
			} else {
				$j(this).addClass( 'collapsed' );
			}
			// Re-save cookie
			if ( state != null ) {
				$j.cookie( 'vector-nav-' + $j(this).attr( 'id' ), state, { 'expires': 30, 'path': '/' } );
			}
		} );
	// Use the same function for all navigation headings - don't repeat yourself
	function toggle( $element ) {
		$j.cookie(
			'vector-nav-' + $element.parent().attr( 'id' ),
			$element.parent().is( '.collapsed' ),
			{ 'expires': 30, 'path': '/' }
		);
		$element
			.parent()
			.toggleClass( 'expanded' )
			.toggleClass( 'collapsed' )
			.find( 'div.body' )
			.slideToggle( 'fast' );
	}
	var $headings = $j( '#panel > div.portal:not(.persistent) > h5' );
	/** Copy-pasted from jquery.wikiEditor.dialogs - :( */
	// Find the highest tabindex in use
	var maxTI = 0;
	$j( '[tabindex]' ).each( function() {
		var ti = parseInt( $j(this).attr( 'tabindex' ) );
		if ( ti > maxTI )
			maxTI = ti;
	});
	var tabIndex = maxTI + 1;
	// Fix the search not having a tabindex
	$j( '#searchInput' ).attr( 'tabindex', tabIndex++ );
	// Make it keyboard accessible
	$headings.each( function() {
		$j(this).attr( 'tabindex', tabIndex++ );
	} );
	/** End of copy-pasted section */
	// Toggle the selected menu's class and expand or collapse the menu
	$headings
		// Make the space and enter keys act as a click
		.keydown( function( event ) {
			if ( event.which == 13 /* Enter */ || event.which == 32 /* Space */ ) {
				toggle( $j(this) );
			}
		} )
		.mousedown( function() {
			toggle( $j(this) );
			$j(this).blur();
			return false;
		} );
} );
$j(document).ready( function() {
	// Check if CollapsibleTabs is enabled
	if ( !wgVectorEnabledModules.collapsibletabs ) {
		return true;
	}
	
	var rtl = $j( 'body' ).is( '.rtl' );
	
	// Overloading the moveToCollapsed function to animate the transition 
	$j.collapsibleTabs.moveToCollapsed = function( ele ) {
		var $moving = $j( ele );
		$j.collapsibleTabs.getSettings( $j( $j.collapsibleTabs.getSettings( $moving ).expandedContainer ) ).shifting = true;
		var data = $j.collapsibleTabs.getSettings( $moving );
		// Remove the element from where it's at and put it in the dropdown menu
		var target = data.collapsedContainer;
		$moving.css( "position", "relative" )
			.css( ( rtl ? 'left' : 'right' ), 0 )
			.animate( { width: '1px' }, "normal", function() {
				$j( this ).hide();
				// add the placeholder
				$j( '<span class="placeholder" style="display:none;"></span>' ).insertAfter( this );
				$j( this ).remove().prependTo( target ).data( 'collapsibleTabsSettings', data );
				$j( this ).attr( 'style', 'display:list-item;' );
				$j.collapsibleTabs.getSettings( $j( $j.collapsibleTabs.getSettings( $j( ele ) ).expandedContainer ) )
					.shifting = false;
				$j.collapsibleTabs.handleResize();
			} );
	};
	
	// Overloading the moveToExpanded function to animate the transition
	$j.collapsibleTabs.moveToExpanded = function( ele ) {
		var $moving = $j( ele );
		$j.collapsibleTabs.getSettings( $j( $j.collapsibleTabs.getSettings( $moving ).expandedContainer ) ).shifting = true;
		var data = $j.collapsibleTabs.getSettings( $moving );
		// grab the next appearing placeholder so we can use it for replacing
		var $target = $j( data.expandedContainer ).find( 'span.placeholder:first' );
		var expandedWidth = data.expandedWidth;
		$moving.css( "position", "relative" ).css( ( rtl ? 'right' : 'left' ), 0 ).css( 'width', '1px' );
		$target.replaceWith( $moving.remove().css( 'width', '1px' ).data( 'collapsibleTabsSettings', data )
			.animate( { width: expandedWidth+"px" }, "normal", function() {
				$j( this ).attr( 'style', 'display:block;' );
				$j.collapsibleTabs.getSettings( $j( $j.collapsibleTabs.getSettings( $moving ).expandedContainer ) )
					.shifting = false;
				$j.collapsibleTabs.handleResize();
			} ) );
	};
	
	// Bind callback functions to animate our drop down menu in and out
	// and then call the collapsibleTabs function on the menu 
	$j( '#p-views ul' ).bind( "beforeTabCollapse", function() {
		if( $j( '#p-cactions' ).css( 'display' ) == 'none' )
		$j( "#p-cactions" ).addClass( "filledPortlet" ).removeClass( "emptyPortlet" )
			.find( 'h5' ).css( 'width','1px' ).animate( { 'width':'26px' }, 390 );
	}).bind( "beforeTabExpand", function() {
		if( $j( '#p-cactions li' ).length == 1 )
		$j( "#p-cactions h5" ).animate( { 'width':'1px' }, 370, function() {
			$j( this ).attr( 'style', '' ).parent().addClass( "emptyPortlet" ).removeClass( "filledPortlet" );
		});
	}).collapsibleTabs( {
		expandCondition: function( eleWidth ) {
			if( rtl ){
				return ( $j( '#right-navigation' ).position().left + $j( '#right-navigation' ).width() + 1 )
					< ( $j( '#left-navigation' ).position().left - eleWidth );
			} else {
				return ( $j( '#left-navigation' ).position().left + $j( '#left-navigation' ).width() + 1 )
					< ( $j( '#right-navigation' ).position().left - eleWidth );
			}
		},
		collapseCondition: function() {
			if( rtl ) {
				return ( $j( '#right-navigation' ).position().left + $j( '#right-navigation' ).width() )
					> $j( '#left-navigation' ).position().left;
			} else {
				return ( $j( '#left-navigation' ).position().left + $j( '#left-navigation' ).width() )
					> $j( '#right-navigation' ).position().left;
			}
		}
	} );
} );
/* JavaScript for EditWarning extension */

$j(document).ready( function() {
	// Check if EditWarning is enabled and if we need it
	if ( !wgVectorEnabledModules.editwarning || $j( '#wpTextbox1' ).size() == 0 ) {
		return true;
	}
	// Get the original values of some form elements
	$j( '#wpTextbox1, #wpSummary' ).each( function() {
		$j(this).data( 'origtext', $j(this).val() );
	});
	// Attach our own handler for onbeforeunload which respects the current one
	fallbackWindowOnBeforeUnload = window.onbeforeunload;
	window.onbeforeunload = function() {
		var fallbackResult = undefined;
		// Check if someone already set on onbeforeunload hook
		if ( fallbackWindowOnBeforeUnload ) {
			// Get the result of their onbeforeunload hook
			fallbackResult = fallbackWindowOnBeforeUnload();
		}
		// Check if their onbeforeunload hook returned something
		if ( fallbackResult !== undefined ) {
			// Exit here, returning their message
			return fallbackResult;
		}
		// Check if the current values of some form elements are the same as
		// the original values
		if(
			wgAction == 'submit' ||
			$j( '#wpTextbox1' ).data( 'origtext' ) != $j( '#wpTextbox1' ).val() ||
			$j( '#wpSummary' ).data( 'origtext' ) != $j( '#wpSummary' ).val()
		) {
			// Return our message
			return mw.usability.getMsg( 'vector-editwarning-warning' );
		}
	}
	// Add form submission handler
	$j( 'form' ).submit( function() {
		// Restore whatever previous onbeforeload hook existed
		window.onbeforeunload = fallbackWindowOnBeforeUnload;
	});
});
//Global storage of fallback for onbeforeunload hook
var fallbackWindowOnBeforeUnload = null;
/* JavaScript for ExpandableSearch extension */
$j( document ).ready( function() {
	
	// Only use this function in conjuction with the Vector skin
	if( !wgVectorEnabledModules.expandablesearch || skin != 'vector' ) {
		return true;
	}
	$j( '#searchInput' )
		.expandableField( { 
			'beforeExpand': function( context ) {
				// animate the containers border
				$j( this )
					.parent()
					.animate( {
						'borderTopColor': '#a0d8ff',
						'borderLeftColor': '#a0d8ff',
						'borderRightColor': '#a0d8ff',
						'borderBottomColor': '#a0d8ff' }, 'fast' );
			},
			'beforeCondense': function( context ) {
				// animate the containers border
				$j( this )
					.parent()
					.animate( {
						'borderTopColor': '#aaaaaa',
						'borderLeftColor': '#aaaaaa',
						'borderRightColor': '#aaaaaa',
						'borderBottomColor': '#aaaaaa' }, 'fast' );
			},
			'afterExpand': function( context ) {
				//trigger the collapsible tabs resize handler
				if ( typeof $j.collapsibleTabs != 'undefined' ){
					$j.collapsibleTabs.handleResize();
				}
			},
			'afterCondense': function( context ) {
				//trigger the collapsible tabs resize handler
				if ( typeof $j.collapsibleTabs != 'undefined' ){
					$j.collapsibleTabs.handleResize();
				}
			}
		} )
		.siblings( 'button' )
		.css( 'float', 'right' );
});
/* Prototype code to demonstrate proposed edit page footer cleanups */
/* First draft and will be changing greatly */

$j(document).ready( function() {
	if( !wgVectorEnabledModules.footercleanup ) {
		return true;
	}
	$j( '#editpage-copywarn' )
		.add( '.editOptions' )
		.wrapAll( '<div id="editpage-bottom"></div>' );
	$j( '#wpSummary' )
		.data( 'hint',
			$j( '#wpSummaryLabel span small' )
				.remove()
				.text()
				// FIXME - Not a long-term solution. This change should be done in the message itself
				.replace( /\)|\(/g, '' )
		)
		.change( function() {
			if ( $j( this ).val().length == 0 ) {
				$j( this )
					.addClass( 'inline-hint' )
					.val( $j( this ).data( 'hint' ) );
			} else {
				$j( this ).removeClass( 'inline-hint' );
			}
		} )
		.focus( function() {
			if ( $j( this ).val() == $j( this ).data( 'hint' ) ) {
				$j( this )
					.removeClass( 'inline-hint' )
					.val( "" );
			}
		})
		.blur( function() { $j( this ).trigger( 'change' ); } )
		.trigger( 'change' );
	$j( '#wpSummary' )
		.add( '.editCheckboxes' )
		.wrapAll( '<div id="editpage-summary-fields"></div>' );
		
	$j( '#editpage-specialchars' ).remove();
	
	// transclusions
	// FIXME - bad CSS styling here with double class selectors. Should address here. 
	var transclusionCount = $j( '.templatesUsed ul li' ).size();
	$j( '.templatesUsed ul' )
		.wrap( '<div id="transclusions-list" class="collapsible-list collapsed"></div>' )
		.parent()
		// FIXME: i18n, remove link from message and let community add link to transclusion page if it exists
		.prepend( '<label>This page contains <a href="http://en.wikipedia.org/wiki/transclusion">transclusions</a> of <strong>'
			+ transclusionCount 
			+ '</strong> other pages.</label>' );
	$j( '.mw-templatesUsedExplanation' ).remove();
	
	$j( '.collapsible-list label' )
		.click( function() {
			$j( this )
				.parent()
				.toggleClass( 'expanded' )
				.toggleClass( 'collapsed' )
				.find( 'ul' )
				.slideToggle( 'fast' );
			return false;
		})
		.trigger( 'click' );
	$j( '#wpPreview, #wpDiff, .editHelp, #editpage-specialchars' )
		.remove();
	$j( '#mw-editform-cancel' )
		.remove()
		.appendTo( '.editButtons' );
} );
/* JavaScript for SimpleSearch extension */

// Disable mwsuggest.js on searchInput 
if ( wgVectorEnabledModules.simplesearch && skin == 'vector' && typeof os_autoload_inputs !== 'undefined' &&
		os_autoload_forms !== 'undefined' ) {
	os_autoload_inputs = [];
	os_autoload_forms = [];
}

$j(document).ready( function() {
	// Only use this function in conjuction with the Vector skin
	if( !wgVectorEnabledModules.simplesearch || skin != 'vector' ) {
		return true;
	}
	var mod = {
		'browsers': {
			// Left-to-right languages
			'ltr': {
				// SimpleSearch is broken in Opera < 9.6
				'opera': [['>=', 9.6]],
				'blackberry': false,
				'ipod': false,
				'iphone': false
			},
			// Right-to-left languages
			'rtl': {
				'opera': [['>=', 9.6]],
				'blackberry': false,
				'ipod': false,
				'iphone': false
			}
		}
	};
	if ( !$j.wikiEditor.isSupported( mod ) ) {
		return true;
	}
	
	// Add form submission handler
	$j( 'div#simpleSearch > input#searchInput' )
		.each( function() {
			$j( '<label />' )
				.text( mw.usability.getMsg( 'vector-simplesearch-search' ) )
				.css({
					'display': 'none',
					'position' : 'absolute',
					'bottom': 0,
					'padding': '0.25em',
					'color': '#999999',
					'cursor': 'text'
				})
				.css( ( $j( 'body' ).is( '.rtl' ) ? 'right' : 'left' ), 0 )
				.click( function() {
					$j(this).parent().find( 'input#searchInput' ).focus();
				})
				.appendTo( $j(this).parent() );
			if ( $j(this).val() == '' ) {
				$j(this).parent().find( 'label' ).fadeIn( 100 );
			}
		})
		.bind( 'keypress', function() {
			// just in case the text field was focus before our handler was bound to it
			if ( $j(this).parent().find( 'label:visible' ).size() > 0 )
				$j(this).parent().find( 'label' ).fadeOut( 100 );
		})
		.focus( function() {
			$j(this).parent().find( 'label' ).fadeOut( 100 );
		})
		.blur( function() {
			if ( $j(this).val() == '' ) {
				$j(this).parent().find( 'label' ).fadeIn( 100 );
			}
		});
		// listen for dragend events in order to clear the label from the search field if
		// text is dragged into it. Only works for mozilla
		$j( document ).bind( 'dragend', function( event ) {
			if ( $j( 'div#simpleSearch > label:visible' ).size() > 0 
				&& $j( 'div#simpleSearch > input#searchInput' ).val().length > 0 )
					$j( 'div#simpleSearch > label' ).fadeOut( 100 );
		} );
	$j( '#searchInput, #searchInput2, #powerSearchText, #searchText' ).suggestions( {
		fetch: function( query ) {
			var $this = $j(this);
			var request = $j.ajax( {
				url: wgScriptPath + '/api.php',
				data: {
					'action': 'opensearch',
					'search': query,
					'namespace': 0,
					'suggest': ''
				},
				dataType: 'json',
				success: function( data ) {
					$this.suggestions( 'suggestions', data[1] );
				}
			});
			$j(this).data( 'request', request );
		},
		cancel: function () {
			var request = $j(this).data( 'request' );
			// If the delay setting has caused the fetch to have not even happend yet, the request object will
			// have never been set
			if ( request && typeof request.abort == 'function' ) {
				request.abort();
				$j(this).removeData( 'request' );
			}
		},
		result: {
			select: function( $textbox ) {
				$textbox.closest( 'form' ).submit();
			}
		},
		delay: 120,
		positionFromLeft: $j( 'body' ).is( '.rtl' )
	} )
		.bind( 'paste cut click', function() {
			$j( this ).trigger( 'keypress' );
		} );
	$j( '#searchInput' ).suggestions( {
		result: {
			select: function( $textbox ) {
				$textbox.closest( 'form' ).submit();
			}
		},
		special: {
			render: function( query ) {
				if ( $j(this).children().size() == 0  ) {
					$j(this).show()
					$label = $j( '<div />' )
						.addClass( 'special-label' )
						.text( mw.usability.getMsg( 'vector-simplesearch-containing' ) )
						.appendTo( $j(this) );
					$query = $j( '<div />' )
						.addClass( 'special-query' )
						.text( query )
						.appendTo( $j(this) );
					$query.autoEllipsis();
				} else {
					$j(this).find( '.special-query' )
						.empty()
						.text( query )
						.autoEllipsis();
				}
			},
			select: function( $textbox ) {
				$textbox.closest( 'form' ).append(
					$j( '<input />' ).attr( { 'type': 'hidden', 'name': 'fulltext', 'value': 1 } )
				);
				$textbox.closest( 'form' ).submit();
			}
		},
		$region: $j( '#simpleSearch' )
	} )
		.bind( 'paste cut click', function() {
			$j( this ).trigger( 'keypress' );
		} );
});
