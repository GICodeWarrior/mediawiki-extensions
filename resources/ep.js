/**
 * JavasSript for the Education Program MediaWiki extension.
 * @see https://www.mediawiki.org/wiki/Extension:Reviews
 *
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw <jeroendedauw at gmail dot com>
 */

window.educationProgram = new( function() {
	
	this.compatMode = true;
	
	this.msg = function () {
		if ( window.educationProgram.compatMode ) {
			return gM.apply( this, arguments );
		}
		else {
			return mw.msg.apply( this, arguments );
		}
	};
	
	this.msge = function () {
		return mw.html.escape( this.msg.apply( this, arguments ) );
	};
	
} );

mw.loader.using( 'mediawiki.language', function() {
	window.educationProgram.compatMode = typeof window.mediaWiki.language === 'undefined';
	
	if ( window.educationProgram.compatMode ) {
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
		
		mw.jqueryMsg.htmlEmitter.prototype.gender = function( nodes ) { 
			var gender;
			if  ( nodes[0] && nodes[0].options instanceof mw.Map ){
				gender = nodes[0].options.get( 'gender' );
			} else {
				gender = nodes[0];
			}
			var forms = nodes.slice(1);
			return this.language.gender( gender, forms );
		};
	}	
	
} );