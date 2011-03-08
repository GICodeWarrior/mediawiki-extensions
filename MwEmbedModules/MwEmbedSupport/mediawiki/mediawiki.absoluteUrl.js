
( function( mw ) {
	/**
	 * makeAbsolute takes makes the given 
	 * document.URL or a contextUrl param
	 * 
	 * @param {String}
	 *            source path or url
	 * @param {String}
	 *            contextUrl The domain / context for creating an absolute url
	 *            from a relative path
	 * @return {=String} absolute url
	 */
	mw.absoluteUrl = function( source, contextUrl ) {
		var isAlreadyAbsolute = true;
		try{
			var parsedSrc = new mw.Uri( source );
		} catch(e){ 
			isAlreadyAbsolute = false;
		};
		// If source was parsed successfully return ( already absolute ) 
		if( isAlreadyAbsolute ){			
			return source;
		}
	
		// Get parent Url location the context URL
		if( !contextUrl ) {
			contextUrl = document.URL;
		}
		var parsedUrl = new mw.Uri( contextUrl );
	
		// Check for local windows file that does not flip the slashes:
		if( parsedUrl.directory == '' && parsedUrl.protocol == 'file' ){
			// pop off the file
			var fileUrl = contextUrl.split( '\\');
			fileUrl.pop();
			return 	fileUrl.join('\\') + '\\' + src;
		}
		// Check for leading slash:
		if( src.indexOf( '/' ) === 0 ) {
			return parsedUrl.protocol + '://' + parsedUrl.authority + src;
		}else{
			return parsedUrl.protocol + '://' + parsedUrl.authority + parsedUrl.directory + src;
		}
	};
	
} )( window.mediaWiki );