/**
 * scripts specific for monobook skin of mediawiki.
 */

( function ( $ ) {
		/**
		 * Prepare the menu for the webfonts.
		 * @param config The webfont configuration.
		 */
		 mw.webfonts.buildMenu = function(config) {
			var $menuItemsDiv = mw.webfonts.buildMenuItems( config );
			if( $menuItemsDiv == null ) {
				return;
			}
			var $div = $( '<div>' )
				.attr( 'id', 'webfonts-menu' )
				.addClass( 'portlet' )
				.append( $( '<h5>' ).text( mw.message( 'webfonts-load' ).escaped() ) )
				.append( $menuItemsDiv .find ('ul').addClass('pBody'));
			$div.insertAfter( '#p-search');
		};
} ) ( jQuery );
