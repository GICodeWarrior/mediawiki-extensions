/**
 * JavasSript for the Education Program MediaWiki extension.
 * @see https://www.mediawiki.org/wiki/Extension:Reviews
 *
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw <jeroendedauw at gmail dot com>
 */

window.educationProgram = new( function() {
	
	this.api = new( function() {
		
		this.remove = function( data, callback ) {
			var requestArgs = {
				'action': 'deleteeducation',
				'format': 'json',
				'token': mw.user.tokens.get( 'editToken' ),
				'ids': data.id,
				'type': data.type
			};
			
			$.post(
				wgScriptPath + '/api.php',
				requestArgs,
				function( data ) {
					var success = data.hasOwnProperty( 'success' ) && data.success;
					
					callback( {
						'success': success
					} );
				}	
			);	
		};
		
	} );
	
} );

