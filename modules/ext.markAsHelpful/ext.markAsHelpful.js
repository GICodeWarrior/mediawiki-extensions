/**
 * Front-end scripting core for the MarkAsHelpful MediaWiki extension
 *
 * @author Rob Moen, 2011
 */

(function( $ ) {

	var mah = mw.mah = {
		selector: '[class^=markashelpful-]',  //only selector for now

		init: function() {
			var $mahWrap = $( '<div />' ).attr( 'class', 'mw-mah-wrapper' );
				
			
			//$ ( mah.selector ).append( $mahWrap );

			$( mah.selector ).each ( function (i, e) {
				//$(i).append( $mahWrap );
				mah.loadItem( $( this ) );
			}); 
		},

		/*
		 * Return object of item properties
		 */
		getItemProperties: function( $item ) {
			var		tag = $item.attr( 'class' ),
					properties = {
						'item': tag.split( '-' )[2], // item id
						'type': tag.split( '-' )[1]  // item type (eg, mbresponse)
					};
			return properties;
		},

		/*
		 * Load the current state of the MarkAsHelpful item
		 */
		loadItem: function( $item ) {
			var props = mah.getItemProperties( $item );

			var request = {
				'action': 'getmarkashelpfulitem',
				'item': props.item,
				'type': props.type,
				'format': 'json'

			};
			$.ajax({
				type: 'get',
				url: mw.util.wikiScript('api'),
				data: request,
				success: function( data ) {

					if ( data && data.getmarkashelpfulitem.result == 'success' &&
						data.getmarkashelpfulitem.formatted
					) {

						var $content = $( data.getmarkashelpfulitem.formatted );
						$item.html( $content );
					} else {
						// Failure, do nothing to the item for now
					}
				},
				error: function ( data ) {
					// Failure, do nothing to the item for now
				},
				dataType: 'json'
			});
		},
		/*
		 * API call to mark or unmark an item as helpful.
		 */
		markItem: function( $item, action ) {
			var		props = mah.getItemProperties( $item ),
					clientData = $.client.profile(),
					request;
			props.mahaction = action;

			apiRequest = $.extend( {
				'action': 'markashelpful',
				'page': mw.config.get( 'wgPageName' ),
				'useragent': clientData.name + '/' + clientData.versionNumber,
				'system': clientData.platform,
				'token': mw.config.get('mahEditToken'),
				'format': 'json'
			}, props );

			$.ajax( {
				type: 'post',
				url: mw.util.wikiScript( 'api' ),
				data: apiRequest,
				success: function () {
					mah.loadItem( $item );	
				},
				dataType: 'json'
			} );

		}
	};

	// Some live events for the different modes

	/*
	 * Click Event for marking an item as helpful.
	 */
	$( '.markashelpful-mark' ).live( 'click', function() {
		$item = $( this ).parent().parent();
		mah.markItem( $item, 'mark' );
	} );

	/*
	 * Click Event for removing helpful status from an item.
	 */
	$( '.markashelpful-undo' ).live( 'click', function() {
		$item = $( this ).parent().parent();
		mah.markItem( $item, 'unmark' );
	} );

	// Initialize MarkAsHelpful
	mah.init();
} ) ( jQuery );