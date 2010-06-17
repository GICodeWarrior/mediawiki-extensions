/**
* TimedText loader.    
*/
// Scope everything in "mw"  ( keeps the global namespace clean ) 
( function( mw ) {
	
mw.addResourcePaths( {
	"mw.TimedText" : "mw.TimedText.js",
	"mw.style.TimedText" : "css/mw.style.TimedText.css",
		
	"mw.TimedTextEdit" : "mw.TimedTextEdit.js",
	"mw.style.TimedTextEdit" : "css/mw.style.TimedTextEdit.css",
	
	"RemoteMwTimedText" : "remotes/RemoteMwTimedText.js"
} );

var mwTimedTextRequestSet = [ 
	'$j.fn.menu', 
	'mw.TimedText',
	'mw.style.TimedText',
	'mw.style.jquerymenu'
];

// TimedText module
mw.addModuleLoader( 'TimedText', function( callback ) {
	mw.load( mwTimedTextRequestSet , function() {
		callback( 'TimedText' );
	} );
});

var mwLoadTimedTextFlag = false;
// Always Merge in the timed text libs 
if( mw.getConfig( 'textInterface' ) == 'always' ) {
	mwLoadTimedTextFlag = true;	
}

/**
* Setup the load embedPlayer visit tag addSetupHook function 
*
* Check if the video tags in the page support timed text
* this way we can add our timed text libraries to the initial 
* request and avoid an extra round trip to the server
*/

// Bind the loader embed player tag viewing
$j( mw ).bind( 'LoaderEmbedPlayerVisitTag', function( event, playerElement ) {	
	// If add timed text flag not already set check for itext, and sources
	if( ! mwLoadTimedTextFlag ) {
		if( $j( playerElement ).find( 'itext' ).length != 0 ) {
			// Has an itext child include timed text request
			mwLoadTimedTextFlag = true;
		}
		// Check for ROE pointer or apiTitleKey
		if ( $j( playerElement ).attr('roe') 
			|| $j( playerElement ).attr( 'apiTitleKey' ) )
		{
			mwLoadTimedTextFlag = true;
		}
	}
} );
// Update the player loader request with timedText if the flag has been set 
$j( mw ).bind( 'LoaderEmbedPlayerUpdateRequest', function( event, classRequest ) {
	// Add timed text items if flag set.  	
	if( mwLoadTimedTextFlag ) {
		$j.merge( classRequest, mwTimedTextRequestSet );
	}	

} );
	

// TimedText editor:
mw.addModuleLoader( 'TimedText.Edit', function( callback ) {
	mw.load([ 
		[
			'$j.ui',
			'$j.fn.menu', 
			"mw.style.jquerymenu",
			
			'mw.TimedText',
			'mw.style.TimedText',
			
			'mw.TimedTextEdit',
			'mw.style.TimedTextEdit'
		],
		[
			'$j.ui.dialog',
			'$j.ui.tabs'
		]
	], function( ) {
		callback( 'TimedText.Edit' );
	});
});

} )( window.mw );