( function( $ ) { $.wikiLove = {

	$dialog: null, // dialog jQuery object
	currentTypeId: null, // id of the currently selected type (e.g. 'barnstar' or 'makeyourown')
	currentSubtypeId: null, // id of the currently selected subtype (e.g. 'original' or 'special')
	currentTypeOrSubtype: null, // content of the current (sub)type (i.e. an object with title, descr, text, etc.)
	previewData: null, // data of the currently previewed thing is set here
	emailable: false,
	gallery: {},
	defaultText: '{| style="background-color: $5; border: 1px solid $6;"\n\
|rowspan="2" style="vertical-align: middle; padding: 5px;" | [[Image:$3|$4]]\n\
|style="font-size: x-large; padding: 3px; height: 1.5em;" | \'\'\'$2\'\'\'\n\
|-\n\
|style="vertical-align: middle; padding: 3px;" | $1 ~~~~\n\
|}',
	defaultBackgroundColor: '#fdffe7',
	defaultBorderColor: '#fceb92',
	defaultImageSize: '100px',
	
	/*
	 * Opens the dialog and builds it if necessary.
	 */
	openDialog: function() {
		if ( $.wikiLove.$dialog === null ) {
			// Load local configuration
			var wikiLoveConfigUrl = wgServer + wgScript + '?' + $.param( { 'title': 'MediaWiki:WikiLove.js', 'action': 'raw', 'ctype': 'text/javascript' } );
			$.getScript( wikiLoveConfigUrl, function() {
				// Test to see if the 'E-mail this user' link exists
				$.wikiLove.emailable = $( '#t-emailuser' ).length ? true : false;
				
				// Reusable spinner string
				var spinner = '<img class="wlSpinner" src="' + mw.config.get( 'wgServer' ) + mw.config.get( 'wgScriptPath' ) + '/extensions/WikiLove/images/spinner.gif' + '"/>';
				
				// Build a type list like this:
				var $typeList = $( '<ul id="wlTypes"></ul>' );
				for( var typeId in $.wikiLove.types ) {
					var $button = $( '<a href="#"></a>' );
					var $buttonInside = $( '<div class="wlInside"></div>' );
					
					if( typeof $.wikiLove.types[typeId].icon == 'string' ) {
						$buttonInside.append( '<div class="wlIconBox"><img src="'
							+ mw.html.escape( $.wikiLove.types[typeId].icon ) + '"/></div>' );
					}
					else {
						$buttonInside.addClass( 'wlNoIcon' );
					}
					
					$buttonInside.append( '<div class="wlLinkText">' + $.wikiLove.types[typeId].name + '</div>' );
					
					$button.append( '<div class="wlLeftCap"></div>');
					$button.append( $buttonInside );
					$button.append( '<div class="wlRightCap"></div>');
					$button.data( 'typeId', typeId );
					$typeList.append( $( '<li tabindex="0"></li>' ).append( $button ) );
				}
				
				$.wikiLove.$dialog = $( '\
<div id="wikiLoveDialog">\
	<div id="wlSelectType">\
		<span class="wlNumber">1</span>\
		<h3><html:msg key="wikilove-select-type"/></h3>\
		<ul id="wlTypes"></ul>\
	</div>\
	<div id="wlGetStarted">\
		<h2><html:msg key="wikilove-get-started-header"/></h2>\
		<ol>\
			<li><html:msg key="wikilove-get-started-list-1"/></li>\
			<li><html:msg key="wikilove-get-started-list-2"/></li>\
			<li><html:msg key="wikilove-get-started-list-3"/></li>\
		</ol>\
	</div>\
	<div id="wlAddDetails">\
		<span class="wlNumber">2</span>\
		<h3><html:msg key="wikilove-add-details"/></h3>\
		<form id="wlPreviewForm">\
			<label for="wlSubtype" id="wlSubtypeLabel"></label>\
			<select id="wlSubtype"></select>\
			<div id="wlSubtypeDescription"></div>\
			<label id="wlGalleryLabel"><html:msg key="wikilove-image"/></label>\
			<div id="wlGallerySpinner">' + spinner + '</div>\
			<div id="wlGallery"></div>\
			<label for="wlHeader" id="wlHeaderLabel"><html:msg key="wikilove-header"/></label>\
			<input type="text" class="text" id="wlHeader"/>\
			<label for="wlTitle" id="wlTitleLabel"><html:msg key="wikilove-title"/></label>\
			<input type="text" class="text" id="wlTitle"/>\
			<label for="wlImage" id="wlImageLabel"><html:msg key="wikilove-image"/></label>\
			<input type="text" class="text" id="wlImage"/>\
			<label for="wlMessage" id="wlMessageLabel"><html:msg key="wikilove-enter-message"/></label>\
			<span class="wlNote"><html:msg key="wikilove-omit-sig"/></span>\
			<textarea id="wlMessage"></textarea>\
			<div id="wlNotify">\
				<input type="checkbox" id="wlNotifyCheckbox" name="notify"/>\
				<label for="wlNotifyCheckbox"><html:msg key="wikilove-notify"/></label>\
			</div>\
			<button class="submit" id="wlButtonPreview" type="submit"></button>\
			' + spinner + '\
		</form>\
	</div>\
	<div id="wlPreview">\
		<span class="wlNumber">3</span>\
		<h3><html:msg key="wikilove-preview"/></h3>\
		<div id="wlPreviewArea"></div>\
		<form id="wlSendForm">\
			<button class="submit" id="wlButtonSend" type="submit"></button>\
			' + spinner + '\
		</form>\
	</div>\
</div>' );
				$.wikiLove.$dialog.localize();
				
				$.wikiLove.$dialog.dialog({
						width: 800,
						position: ['center', 80],
						autoOpen: false,
						title: mw.msg( 'wikilove-dialog-title' ),
						modal: true,
						resizable: false
					});
				
				$( '#wlButtonPreview' ).button( { label: mw.msg( 'wikilove-button-preview' ), icons: { primary:'ui-icon-search' } } );
				$( '#wlButtonSend' ).button( { label: mw.msg( 'wikilove-button-send' ) } );
				$( '#wlAddDetails' ).hide();
				$( '#wlPreview' ).hide();
				$( '#wlTypes' ).replaceWith( $typeList );
				
				$( '#wlTypes a' ).click( $.wikiLove.clickType );
				$( '#wlSubtype' ).change( $.wikiLove.changeSubtype );
				$( '#wlPreviewForm' ).submit( $.wikiLove.submitPreview );
				$( '#wlSendForm' ).click( $.wikiLove.submitSend );
				$( '#wlMessage' ).elastic(); // have the message textarea grow automatically
				
				$.wikiLove.$dialog.dialog( 'open' );
			});			
		} else {
			$.wikiLove.$dialog.dialog( 'open' );
		}
	},
	
	/*
	 * Handler for the left menu. Selects a new type and initialises next section
	 * depending on whether or not to show subtypes.
	 */
	clickType: function( e ) {
		e.preventDefault();
		$( '#wlGetStarted' ).hide(); // always hide the get started section
		
		var newTypeId = $( this ).data( 'typeId' );
		if( $.wikiLove.currentTypeId != newTypeId ) { // only do stuff when a different type is selected
			$.wikiLove.currentTypeId = newTypeId;
			$.wikiLove.currentSubtypeId = null; // reset the subtype id
			
			$( '#wlTypes a' ).removeClass( 'selected' );
			$( this ).addClass( 'selected' ); // highlight the new type in the menu
			
			if( typeof $.wikiLove.types[$.wikiLove.currentTypeId].subtypes == 'object' ) {
				// we're dealing with subtypes here
				$.wikiLove.currentTypeOrSubtype = null; // reset the (sub)type object until a subtype is selected
				$( '#wlSubtype' ).html( '' ); // clear the subtype menu
				
				for( var subtypeId in $.wikiLove.types[$.wikiLove.currentTypeId].subtypes ) {
					// add all the subtypes to the menu while setting their subtype ids in jQuery data
					var subtype = $.wikiLove.types[$.wikiLove.currentTypeId].subtypes[subtypeId];
					$( '#wlSubtype' ).append(
						$( '<option></option>' ).text( subtype.option ).data( 'subtypeId', subtypeId )
					);
				}
				$( '#wlSubtype' ).show();
				
				// change and show the subtype label depending on the type
				$( '#wlSubtypeLabel' ).text( $.wikiLove.types[$.wikiLove.currentTypeId].select || mw.msg( 'wikilove-select-type' ) );
				$( '#wlSubtypeLabel' ).show();
				$.wikiLove.changeSubtype(); // update controls depending on the currently selected (i.e. first) subtype
			}
			else {
				// there are no subtypes, just use this type for the current (sub)type
				$.wikiLove.currentTypeOrSubtype = $.wikiLove.types[$.wikiLove.currentTypeId];
				$( '#wlSubtype' ).hide();
				$( '#wlSubtypeLabel' ).hide();
				$.wikiLove.updateAllDetails(); // update controls depending on this type
			}
			
			$( '#wlAddDetails' ).show();
			$( '#wlPreview' ).hide();
			$.wikiLove.previewData = null;
		}
		return false;
	},
	
	/*
	 * Handler for changing the subtype.
	 */
	changeSubtype: function() {
		// find out which subtype is selected
		var newSubtypeId = $( '#wlSubtype option:selected' ).first().data( 'subtypeId' );
		if( $.wikiLove.currentSubtypeId != newSubtypeId ) { // only change stuff when a different subtype is selected
			$.wikiLove.currentSubtypeId = newSubtypeId;
			$.wikiLove.currentTypeOrSubtype = $.wikiLove.types[$.wikiLove.currentTypeId]
				.subtypes[$.wikiLove.currentSubtypeId];
			$( '#wlSubtypeDescription' ).html( $.wikiLove.currentTypeOrSubtype.descr );
			$.wikiLove.updateAllDetails();
			$( '#wlPreview' ).hide();
			$.wikiLove.previewData = null;
		}
	},
	
	/*
	 * Called when type or subtype changes, updates controls.
	 */
	updateAllDetails: function() {
		$( '#wikiLoveDialog' ).find( '.wlError' ).remove();
		
		// only show the description if it exists for this type or subtype
		if( typeof $.wikiLove.currentTypeOrSubtype.descr == 'string' ) {
			$( '#wlSubtypeDescription').show();
		} else {
			$( '#wlSubtypeDescription').hide();
		}
		
		// show or hide header label and textbox depending on whether a predefined header exists
		if( $.inArray( 'header', $.wikiLove.currentTypeOrSubtype.fields ) >= 0 ) {
			$( '#wlHeaderLabel').show();
			$( '#wlHeader' ).show();
		} else {
			$( '#wlHeaderLabel').hide();
			$( '#wlHeader' ).hide();
		}
		$( '#wlHeader' ).val( $.wikiLove.currentTypeOrSubtype.header || '' );
		
		// show or hide title label and textbox depending on whether a predefined title exists
		if( $.inArray( 'title', $.wikiLove.currentTypeOrSubtype.fields ) >= 0 ) {
			$( '#wlTitleLabel').show();
			$( '#wlTitle' ).show();
		} else {
			$( '#wlTitleLabel').hide();
			$( '#wlTitle' ).hide();
		}
		$( '#wlTitle' ).val( $.wikiLove.currentTypeOrSubtype.title || '' );
		
		// show or hide image label and textbox depending on whether a predefined image exists
		if( $.inArray( 'image', $.wikiLove.currentTypeOrSubtype.fields ) >= 0 ) {
			$( '#wlImageLabel').show();
			$( '#wlImage' ).show();
		} else {
			$( '#wlImageLabel').hide();
			$( '#wlImage' ).hide();
		}
		$( '#wlImage' ).val( $.wikiLove.currentTypeOrSubtype.image || '' );
		
		if( typeof $.wikiLove.currentTypeOrSubtype.gallery == 'object' ) {
			$( '#wlGalleryLabel' ).show();
			$( '#wlGallery' ).show();
			$( '#wlGallerySpinner' ).show();
			$.wikiLove.makeGallery();
		}
		else {
			$( '#wlGalleryLabel' ).hide();
			$( '#wlGallery' ).hide();
			$( '#wlGallerySpinner' ).hide();
		}
		
		if( $.inArray( 'notify', $.wikiLove.currentTypeOrSubtype.fields ) >= 0 && $.wikiLove.emailable ) {
			$( '#wlNotify' ).show();
		} else {
			$( '#wlNotify' ).hide();
			$( '#wlNotifyCheckbox' ).attr('checked', false);
		}
	},
	
	/*
	 * Handler for clicking the preview button. Builds data for AJAX request.
	 */
	submitPreview: function( e ) {
		e.preventDefault();
		$( '#wlPreview' ).hide();
		$( '#wikiLoveDialog' ).find( '.wlError' ).remove();
		
		if( typeof $.wikiLove.currentTypeOrSubtype.gallery == 'object' ) {
			if ( $( '#wlImage' ).val().length <= 0 ) {
				$.wikiLove.showError( 'wikilove-err-image' ); return false;
			}
		}
		if( $( '#wlHeader' ).val().length <= 0 ) {
			$.wikiLove.showError( 'wikilove-err-header' ); return false;
		}
		if( $( '#wlMessage' ).val().length <= 0 ) {
			$.wikiLove.showError( 'wikilove-err-msg' ); return false;
		}
		
		// If there isn't a signature already in the message, throw an error
		if ( $( '#wlMessage' ).val().indexOf( '~~~' ) >= 0 ) {
			$.wikiLove.showError( 'wikilove-err-sig' ); return false;
		}
		
		var msg = $.wikiLove.prepareMsg(
			$.wikiLove.currentTypeOrSubtype.text || $.wikiLove.defaultText,
			$.wikiLove.currentTypeOrSubtype.imageSize,
			$.wikiLove.currentTypeOrSubtype.backgroundColor,
			$.wikiLove.currentTypeOrSubtype.borderColor
		);
		
		$.wikiLove.doPreview( '==' + $( '#wlHeader' ).val() + "==\n" + msg );
		$.wikiLove.previewData = {
			'header': $( '#wlHeader' ).val(),
			'msg': msg,
			'type': $.wikiLove.currentTypeId
				+ ($.wikiLove.currentSubtypeId !== null ? '-' + $.wikiLove.currentSubtypeId : ''),
		};
		
		if ( $( '#wlNotifyCheckbox:checked' ).val() && $.wikiLove.emailable ) {
			$.wikiLove.previewData.mail = $.wikiLove.prepareMsg( $.wikiLove.currentTypeOrSubtype.mail );
		}
		return false;
	},
	
	showError: function( errmsg ) {
		$( '#wlAddDetails' ).append( $( '<div class="wlError"></div>' ).text( mw.msg( errmsg ) ) );
	},
	
	/*
	 * Prepares a message or e-mail body by replacing placeholders.
	 * $1: message entered by the user
	 * $2: title of the item
	 * $3: title of the image
	 * $4: image size
	 * $5: background color
	 * $6: border color
	 * $7: username of the recipient
	 */
	prepareMsg: function( msg, imageSize, backgroundColor, borderColor ) {
		
		msg = msg.replace( '$1', $( '#wlMessage' ).val() ); // replace the raw message
		msg = msg.replace( '$2', $( '#wlTitle' ).val() ); // replace the title
		msg = msg.replace( '$3', $( '#wlImage' ).val() ); // replace the image
		
		var myImageSize = imageSize || $.wikiLove.defaultImageSize;
		var myBackgroundColor = backgroundColor || $.wikiLove.defaultBackgroundColor;
		var myBorderColor = borderColor || $.wikiLove.defaultBorderColor;
		
		msg = msg.replace( '$4', myImageSize ); // replace the image size
		msg = msg.replace( '$5', myBackgroundColor ); // replace the background color
		msg = msg.replace( '$6', myBorderColor ); // replace the border color
		
		msg = msg.replace( '$7', wgTitle ); // replace the username we're sending to
		
		return msg;
	},
	
	/*
	 * Fires AJAX request for previewing wikitext.
	 */
	doPreview: function( wikitext ) {
		$( '#wlAddDetails .wlSpinner' ).fadeIn( 200 );
		$.ajax({
			url: mw.config.get( 'wgServer' ) + mw.config.get( 'wgScriptPath' ) + '/api.php?',
			data: {
				'action': 'parse',
				'format': 'json',
				'text': wikitext,
				'prop': 'text',
				'pst': true
			},
			dataType: 'json',
			type: 'POST',
			success: function( data ) {
				$.wikiLove.showPreview( data.parse.text['*'] );
				$( '#wlAddDetails .wlSpinner' ).fadeOut( 200 );
			}
		});
	},
	
	/*
	 * Callback for the preview function. Sets the preview area with the HTML and fades it in.
	 */
	showPreview: function( html ) {
		$( '#wlPreviewArea' ).html( html );
		$( '#wlPreview' ).fadeIn( 200 );
	},
	
	/*
	 * Handler for the send (final submit) button. Builds data for AJAX request.
	 * The type sent for statistics is 'typeId-subtypeId' when using subtypes,
	 * or simply 'typeId' otherwise.
	 */
	submitSend: function( e ) {
		e.preventDefault();
		$.wikiLove.doSend( $.wikiLove.previewData.header, $.wikiLove.previewData.msg,
			$.wikiLove.previewData.type, $.wikiLove.previewData.notify );
		return false;
	},
	
	/*
	 * Fires the final AJAX request and then redirects to the talk page where the content is added.
	 */
	doSend: function( subject, wikitext, type, mail ) {
		$( '#wlPreview .wlSpinner' ).fadeIn( 200 );
		
		var sendData = {
			'action': 'wikilove',
			'format': 'json',
			'title': mw.config.get( 'wgPageName' ),
			'type': type,
			'text': wikitext,
			'subject': subject,
			'token': mw.user.tokens.get( 'editToken' )
		};
		
		if ( mail ) {
			sendData.email = mail;
		}
		
		$.ajax({
			url: mw.config.get( 'wgServer' ) + mw.config.get( 'wgScriptPath' ) + '/api.php?',
			data: sendData,
			dataType: 'json',
			type: 'POST',
			success: function( data ) {
				$( '#wlPreview .wlSpinner' ).fadeOut( 200 );
				
				if ( typeof data.error !== 'undefined' ) {
					$( '#wlPreview' ).append( '<div class="wlError">' + mw.html.escape( data.error.info ) + '<div>' );
					return;
				}
				
				if ( typeof data.redirect !== 'undefined'
					&&  data.redirect.pageName == mw.config.get( 'wgPageName' ) ) {
					// unfortunately, when on the talk page we cannot reload and then
					// jump to the correct section, because when we set the hash (#...)
					// the page won't reload...
					window.location.reload();
				}
				else {
					window.location = mw.config.get( 'wgArticlePath' ).replace( '$1', data.redirect.pageName ) 
						+ '#' + data.redirect.fragment;
				}
			}
		});
	},
	
	/*
	 * This is a bit of a hack to show some random images. A predefined set of image infos are
	 * retrieved using the API. Then we randomise this set ourselves and select some images to
	 * show. Eventually we probably want to make a custom API call that does this properly and
	 * also allows for using remote galleries such as Commons, which is now prohibited by JS.
	 */
	makeGallery: function() {
		$( '#wlGallery' ).html( '' );
		$.wikiLove.gallery = {};
		$( '#wlGallerySpinner .wlSpinner' ).fadeIn( 200 );
		
		$.ajax({
			url: mw.config.get( 'wgServer' ) + mw.config.get( 'wgScriptPath' ) + '/api.php',
			data: {
				'action'      : 'query',
				'format'      : 'json',
				'prop'        : 'imageinfo',
				'iiprop'      : 'mime|url',
				'iiurlwidth'  : $.wikiLove.currentTypeOrSubtype.gallery.width,
				'generator'   : 'categorymembers',
				'gcmtitle'    : $.wikiLove.currentTypeOrSubtype.gallery.category,
				'gcmnamespace': 6,
				'gcmsort'     : 'timestamp',
				'gcmlimit'    : $.wikiLove.currentTypeOrSubtype.gallery.total
			},
			dataType: 'json',
			type: 'POST',
			success: function( data ) {
				// clear
				$( '#wlGallery' ).html( '' );
				$.wikiLove.gallery = {};
				
				// if we have any images at all
				if( data.query) {
					// get the page keys which are just ids
					var keys = Object.keys( data.query.pages );
					
					// try to find "num" images to show
					for( var i=0; i<$.wikiLove.currentTypeOrSubtype.gallery.num; i++ ) {
						// continue looking for a new image until we have found one thats valid
						// or until we run out of images
						while( keys.length > 0 ) {
							// get a random page
							var id = Math.floor( Math.random() * keys.length );
							var page = data.query.pages[keys[id]];
							
							// remove the random page from the keys array
							keys.splice(id, 1);
							
							// only add the image if it's actually an image
							if( page.imageinfo[0].mime.substr(0,5) == 'image' ) {
								// build an image tag with the correct url and width
								var $img = $( '<img/>' )
									.attr( 'src', page.imageinfo[0].url )
									.attr( 'width', $.wikiLove.currentTypeOrSubtype.gallery.width )
									.hide()
									.load( function() { $( this ).css( 'display', 'inline-block' ); } );
								
								// append the image to the gallery and also make sure it's selectable
								$( '#wlGallery' ).append( 
									$( '<a href="#"></a>' )
										.attr( 'id', 'wlGalleryImg' + i )
										.append( $img )
										.click( function( e ) {
											e.preventDefault();
											$( '#wlGallery a' ).removeClass( 'selected' );
											$( this ).addClass( 'selected' );
											$( '#wlImage' ).val( $.wikiLove.gallery[$( this ).attr( 'id' )] );
											return false;
										})
								);
								
								// save the page title into an array so we know which image id maps to which title
								$.wikiLove.gallery['wlGalleryImg' + i] = page.title;
								break;
							}
						}
					}
				}
				if( $.wikiLove.gallery.length <= 0 ) {
					$( '#wlGallery' ).hide();
					$( '#wlGalleryTitle' ).hide();
				}
				
				$( '#wlGallerySpinner .wlSpinner' ).fadeOut( 200 );
			}
		});
	},
	
	/*
	 * Init function which is called upon page load. Binds the WikiLove icon to opening the dialog.
	 */
	init: function() {
		$( '#ca-wikilove a' ).click( function( e ) {
			$.wikiLove.openDialog();
			e.preventDefault();
			return false;
		});
	}
};

$( document ).ready( $.wikiLove.init );
} ) ( jQuery );
