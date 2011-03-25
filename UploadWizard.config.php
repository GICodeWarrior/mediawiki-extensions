<?php
/**
 * Upload Wizard Configuration 
 * Do not modify this file, instead use localsettings.php and set: 
 * $wgUploadWizardConfig[ 'name'] =  'value';
 */
global $wgFileExtensions, $wgServer, $wgScriptPath, $wgAPIModules;
return array(
	// Upload wizard has an internal debug flag	
	'debug' => false,

	// File extensions acceptable in this wiki
	'fileExtensions' =>  $wgFileExtensions, 

	// The default api url is for the current wiki ( can override at run time )
	'apiUrl' => $wgServer . $wgScriptPath . '/api.php',
	
	// If the uploaded file should be auto categorized
	'autoCategory' => false,

	// These templates must be installed for this to work
	'licenses' => array(
		array( 
			'template' => 'Cc-by-sa-3.0',
			'messageKey' => 'mwe-upwiz-license-cc-by-sa-3.0', 
			'default' => true 
		),
		array( 
			'template' => 'Cc-by-3.0', 	
			'messageKey' => 'mwe-upwiz-license-cc-by-3.0', 		
			'default' => false 
		),
		array( 
			'template' => 'Cc-zero', 	
			'messageKey' => 'mwe-upwiz-license-cc-zero', 		
			'default' => false 
		)
	)

	// Default thumbnail width
	'thumbnailWidth' => 120, 
 
	// Max thumbnail height:
	'thumbnailMaxHeight' => 200,

	// Min thumbnail width
	'smallThumbnailWidth' => 60,  

	// Small thumbnail max height
	'smallThumbnailMaxHeight' => 100,

	// Icon thumbnail width: 
	'iconThumbnailWidth' =>  32,

	// Icon thumbnail height: 
	'iconThumbnailMaxHeight' => 32,

	// Max author string length
	'maxAuthorLength' => 50,

	// Min author string length
	'minAuthorLength' => 2,

	// Max source string length 
	'maxSourceLength' => 200,

	// Min source string length
	'minSourceLength' => 5,

	// Max file title string length
	'maxTitleLength' => 200,

	// Min file title string length 
	'minTitleLength' => 5,

	// Max file description length
	'maxDescriptionLength' => 4096,

	// Min file description length
	'minDescriptionLength' => 5,

	// Max length for other file information: 
	'maxOtherInformationLength' => 4096,

	// Max number of simultaneous upload requests 
	'maxSimultaneousConnections' => 1,

	// Max number of uploads for a given form
	'maxUploads' => 10,

	// not for use with all wikis. 
	// The ISO 639 code for the language tagalog is "tl".
	// Normally we name templates for languages by the ISO 639 code.
	// Commons already had a template called 'tl:  though.
	// so, this workaround will cause tagalog descriptions to be saved with this template instead.
	'languageTemplateFixups' =>  array( 'tl' => 'tgl' ), 

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

	// Check if we want to enable firefogg ( for transcoding ) 
	'enableFirefogg' => false, 

	// Check if we have the firefogg upload api module enabled: 
	'enableFirefoggChunkUpload' => isset( $wgAPIModules['firefoggupload'] )? true : false,

);
