/*
 * This script is run on [[Special:UploadWizard]].
 * Configures and creates an interface for uploading files in multiple steps, hence "wizard".
 *
 * Tries to transform Javascript globals dumped on us by the SpecialUploadWizard.php into a more 
 * compact configuration, owned by the UploadWizard created.
 */

// create UploadWizard
mw.UploadWizardPage = function() {
	
	var apiUrl = false; 
	if ( typeof wgServer != 'undefined' && typeof wgScriptPath  != 'undefined' ) {
		 apiUrl = wgServer + wgScriptPath + '/api.php';
	}

	var config = { 
		debug:  wgUploadWizardDebug,  
		userName:  wgUserName,  
		userLanguage:  wgUserLanguage, 
		fileExtensions:  wgFileExtensions, 
		apiUrl: apiUrl,
	
		thumbnailWidth:  120,  
		thumbnailMaxHeight:  200,  
		smallThumbnailWidth:  60,  
		smallThumbnailMaxHeight: 100,
		iconThumbnailWidth: 32,
		iconThumbnailMaxHeight: 32,
		maxAuthorLength: 50,
		minAuthorLength: 2,
		maxSourceLength: 200,
		minSourceLength: 5,
		maxTitleLength: 200,
		minTitleLength: 5,
		maxDescriptionLength: 4096,
		minDescriptionLength: 5,
		maxOtherInformationLength: 4096,
		maxSimultaneousConnections: 2,
		maxUploads: 10,

		// not for use with all wikis. 
		// The ISO 639 code for the language tagalog is "tl".
		// Normally we name templates for languages by the ISO 639 code.
		// Commons already had a template called 'tl:  though.
		// so, this workaround will cause tagalog descriptions to be saved with this template instead.
		languageTemplateFixups:  { tl: 'tgl' }, 

		// names of all license templates, in order. Case sensitive!
		// n.b. in the future, the licenses for a wiki will probably be defined in PHP or even LocalSettings.
		licenses: [
			{ template: 'Cc-by-sa-3.0',	messageKey: 'mwe-upwiz-license-cc-by-sa-3.0', 	'default': true },
			{ template: 'Cc-by-3.0', 	messageKey: 'mwe-upwiz-license-cc-by-3.0', 	'default': false },
			{ template: 'Cc-zero', 		messageKey: 'mwe-upwiz-license-cc-zero', 	'default': false },
			// n.b. the PD-US is only for testing purposes, obviously we need some geographical discrimination here... 
			{ template: 'PD-US', 		messageKey: 'mwe-upwiz-license-pd-us', 		'default': false },
			{ template: 'GFDL', 		messageKey: 'mwe-upwiz-license-gfdl', 		'default': false }
		 ]

		// XXX this is horribly confusing -- some file restrictions are client side, others are server side
		// the filename prefix blacklist is at least server side -- all this should be replaced with PHP regex config
		// or actually, in an ideal world, we'd have some way to reliably detect gibberish, rather than trying to 
		// figure out what is bad via individual regexes, we'd detect badness. Might not be too hard.
		//
		// we can export these to JS if we so want.
		// filenamePrefixBlacklist: wgFilenamePrefixBlacklist,
		// 
		// filenameRegexBlacklist: [
		//	/^(test|image|img|bild|example?[\s_-]*)$/,  // test stuff
		//	/^(\d{10}[\s_-][0-9a-f]{10}[\s_-][a-z])$/   // flickr
		// ]
	};

	if ( !config.debug ) {
		mw.log.level = mw.log.NONE;
	}

	var uploadWizard = new mw.UploadWizard( config );
	uploadWizard.createInterface( '#upload-wizard' );

}

jQuery( document ).ready( function() {
	// add "magic" to Language template parser for keywords
	mw.addTemplateTransform( { 'SITENAME' : function() { return wgSitename; } } );
	
	// sets up plural "magic" and so on. Seems like a bad design to have to do this, though.
	mw.Language.magicSetup();
	
	// show page. 
	mw.UploadWizardPage();
} );
