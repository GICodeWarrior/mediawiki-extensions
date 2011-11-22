/**
 * JavasSript for the Reviews MediaWiki extension.
 * @see https://www.mediawiki.org/wiki/Extension:Reviews
 *
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw <jeroendedauw at gmail dot com>
 */

window.reviews = new( function() {
	
	this.htmlSelect = function( options, value, attributes, onChangeCallback ) {
		$select = $( '<select />' ).attr( attributes );
		
		for ( message in options ) {
			if ( options.hasOwnProperty( message ) ) {
				var attribs = { 'value': options[message] };
				
				if ( value === options[message] ) {
					attribs.selected = 'selected';
				}
				
				$select.append( $( '<option />' ).text( message ).attr( attribs ) );
			}
		}
		
		if ( typeof onChangeCallback !== 'undefined' ) {
			$select.change( function() { onChangeCallback( $( this ).val() ) } );
		}
		
		return $select;
	};
	
} )();