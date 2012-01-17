/**
 * JavasSript for the Education Program MediaWiki extension.
 * @see https://www.mediawiki.org/wiki/Extension:Reviews
 *
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw <jeroendedauw at gmail dot com>
 */

if ( typeof mw.language.gender === 'undefined' ) {
	mw.language.gender = function( gender, forms ) {
		if ( !forms || forms.length === 0 ) {
			return '';
		}
		forms = mw.language.preConvertPlural( forms, 2 );
		if ( gender === 'male' ) {
			return forms[0];
		}
		if ( gender === 'female' ) {
			return forms[1];
		}
		return ( forms.length === 3 ) ? forms[2] : forms[0];
	};
}

window.educationProgram = new( function() {

	// TODO: move to own file
	this.msg = function () {
		if ( typeof mw.language.gender === 'undefined' ) {
			return gM.apply( this, arguments );
		}
		else {
			return mw.msg.apply( this, arguments );
		}
	};
	
	this.msge = function () {
		return mw.html.escape( this.msg.apply( this, arguments ) );
	};
	
	this.api = new( function() {

		this.remove = function( data, callback ) {
			var requestArgs = {
				'action': 'deleteeducation',
				'format': 'json',
				'token': window.mw.user.tokens.get( 'editToken' ),
				'ids': data.ids.join( '|' ),
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
		
		this.instructor = function( args ) {
			var requestArgs = $.extend( {
				'action': 'instructor',
				'format': 'json',
				'token': window.mw.user.tokens.get( 'editToken' )
			}, args );
			
			var deferred = $.Deferred();
			
			$.post(
				wgScriptPath + '/api.php',
				requestArgs,
				function( data ) {
					if ( data.hasOwnProperty( 'success' ) && data.success ) {
						deferred.resolve();
					}
					else {
						deferred.reject();
					}
				}
			);
			
			return deferred.promise();
		};
		
		this.addInstructor = function( args ) {
			args.subaction = 'add';
			return this.instructor( args );
		};
		
		this.removeInstructor = function( args ) {
			args.subaction = 'remove';
			return this.instructor( args );
		};

	} );

} );

