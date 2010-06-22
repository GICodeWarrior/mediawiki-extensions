/**
 * Include all the uploadWizard msgs
 */

mw.includeAllModuleMessages();

/**
 * General configuration for the validator
 */
$j.validator.setDefaults( {
	debug: true,
	errorClass: 'mwe-error'
} );


/**
 * Sort of an abstract class for deeds
 */
mw.UploadWizardDeed = function() {
	var _this = this;
	// prevent from instantiating directly?
	return false;
};

mw.UploadWizardDeed.prototype = {
	valid: function() {
		return false;
	},

	setFormFields: function() { },
	
	getSourceWikiText: function() {
		return $j( this.sourceInput ).val();
	},

	getAuthorWikiText: function() {
		return $j( this.authorInput ).val(); 
	},

	/**
	 * Get wikitext representing the licenses selected in the license object
	 * @return wikitext of all applicable license templates.
	 */
	getLicenseWikiText: function() {
		var _this = this;
		var wikiText = ''; 
		$j.each ( _this.licenseInput.getTemplates(), function( i, template ) {
			wikiText += "{{" + template + "}}\n";
		} );
	
		return wikiText;
	}

};


/**
 * this is a progress bar for monitoring multiple objects, giving summary view
 */
mw.GroupProgressBar = function( selector, text, uploads, endState, progressProperty, weightProperty ) {
	var _this = this;

	// XXX need to figure out a way to put text inside bar
	_this.$selector = $j( selector );
	_this.$selector.html( 
		'<div class="mwe-upwiz-progress">'
		+   '<div class="mwe-upwiz-progress-bar-etr-container">'
		+     '<div class="mwe-upwiz-progress-bar-etr" style="display: none">'
		+       '<div class="mwe-upwiz-progress-bar"></div>'
		+       '<div class="mwe-upwiz-etr"></div>'
		+     '</div>'
		+   '</div>'
		+   '<div class="mwe-upwiz-count"></div>'
		+ '</div>'
	);

	_this.$selector.find( '.mwe-upwiz-progress-bar' ).progressbar( { value : 0 } );

	_this.uploads = uploads;
	_this.endState = endState;
	_this.progressProperty = progressProperty;
	_this.weightProperty = weightProperty;
	_this.beginTime = undefined;

};

mw.GroupProgressBar.prototype = {

	/**
	 * Show the progress bar with a slideout motion
         */
	showBar: function() {
		this.$selector.find( '.mwe-upwiz-progress-bar-etr' ).fadeIn( 200 );
	},

	/** 
	 * loop around the uploads, summing certain properties for a weighted total fraction
	 */
	start: function() {
		var _this = this;

		var totalWeight = 0.0;
		$j.each( _this.uploads, function( i, upload ) {
			totalWeight += upload[_this.weightProperty];
		} );

		_this.setBeginTime();
		var shown = false;

		var displayer = function() {	
			var fraction = 0.0;
			var endStateCount = 0;
			var hasData = false;
			$j.each( _this.uploads, function( i, upload ) {
				if ( upload.state == _this.endState ) {
					endStateCount++;
				}
				if (upload[_this.progressProperty] !== undefined) {
					fraction += upload[_this.progressProperty] * ( upload[_this.weightProperty] / totalWeight );
					if (upload[_this.progressProperty] > 0 ) {
						hasData = true;
					}
				}
			} );
			mw.log( 'hasdata:' + hasData + ' endstatecount:' + endStateCount );
			// sometimes, the first data we have just tells us that it's over. So only show the bar
			// if we have good data AND the fraction is less than 1.
			if ( hasData && fraction < 1.0 ) {
				if ( ! shown ) {
					_this.showBar();
					shown = true;
				}
				_this.showProgress( fraction );
			}
			_this.showCount( endStateCount );

			if ( endStateCount < _this.uploads.length ) {
				setTimeout( displayer, 200 );
			} else {
				_this.showProgress( 1.0 );
				// not necessary to hide bar since we're going to the next step.
				/* setTimeout( function() { _this.hideBar(); }, 500 ); */
			}
		};
		displayer();
	},


	/**
	 * Hide the progress bar with a slideup motion
	 */
	hideBar: function() {
		this.$selector.find( '.mwe-upwiz-progress-bar-etr' ).fadeOut( 200 );
	},
	
	/**
	 * sets the beginning time (useful for figuring out estimated time remaining)
	 * if time parameter omitted, will set beginning time to now
	 *
	 * @param time  optional; the time this bar is presumed to have started (epoch milliseconds)
	 */ 
	setBeginTime: function( time ) {
		this.beginTime = time ? time : ( new Date() ).getTime();
	},


	/**
	 * Show overall progress for the entire UploadWizard
	 * The current design doesn't have individual progress bars, just one giant one.
	 * We did some tricky calculations in startUploads to try to weight each individual file's progress against 
	 * the overall progress.
	 * @param fraction the amount of whatever it is that's done whatever it's done
	 */
	showProgress: function( fraction ) {
		var _this = this;

		_this.$selector.find( '.mwe-upwiz-progress-bar' ).progressbar( 'value', parseInt( fraction * 100, 10 ) );

		var remainingTime = _this.getRemainingTime( fraction );
		
		if ( remainingTime !== null ) {
			var t = mw.seconds2Measurements( parseInt( remainingTime / 1000, 10 ) );
			var timeString;
			if (t.hours == 0) {
				if (t.minutes == 0) {
					if (t.seconds == 0) { 
						timeString = gM( 'mwe-upwiz-finished' );
					} else {
						timeString = gM( 'mwe-upwiz-secs-remaining', t.seconds );
					}
				} else {
					timeString = gM( 'mwe-upwiz-mins-secs-remaining', t.minutes, t.seconds )
				}
			} else {
				timeString = gM( 'mwe-upwiz-hrs-mins-secs-remaining', t.hours, t.minutes, t.seconds );
			}
			_this.$selector.find( '.mwe-upwiz-etr' ).html( timeString )
		}
	},

	/**
	 * Calculate remaining time for all uploads to complete.
	 * 
	 * @param fraction	fraction of progress to show
	 * @return 		estimated time remaining (in milliseconds)
	 */
	getRemainingTime: function ( fraction ) {
		var _this = this;
		if ( _this.beginTime ) {
			var elapsedTime = ( new Date() ).getTime() - _this.beginTime;
			if ( fraction > 0.0 && elapsedTime > 0 ) { // or some other minimums for good data
				var rate = fraction / elapsedTime;
				return parseInt( ( 1.0 - fraction ) / rate, 10 ); 
			}
		}
		return null;
	},


	/**
	 * Show the overall count as we upload
	 * @param count  -- the number of items that have done whatever has been done e.g. in "uploaded 2 of 5", this is the 2
	 */
	showCount: function( count ) {
		var _this = this;
		_this.$selector
			.find( '.mwe-upwiz-count' )
			.html( gM( 'mwe-upwiz-upload-count', [ count, _this.uploads.length ] ) );
	}


};



//mw.setConfig('uploadHandlerClass', mw.MockUploadHandler); // ApiUploadHandler?

// available licenses should be a configuration of the MediaWiki instance,
// not hardcoded here.
// but, MediaWiki has no real concept of a License as a first class object -- there are templates and then specially - parsed 
// texts to create menus -- hack on top of hacks -- a bit too much to deal with ATM
/**
 * Create a group of checkboxes for licenses. N.b. the licenses are named after the templates they invoke.
 * @param div 
 * @param values  (optional) array of license key names to activate by default
 */
mw.UploadWizardLicenseInput = function( selector, values ) {
	var _this = this;

	var widgetCount = mw.UploadWizardLicenseInput.prototype.count++;
	
	_this.inputs = [];

	// TODO incompatibility check of this license versus others

	_this.$selector = $j( selector );
	_this.$selector.append( $j( '<div class="mwe-error"></div>' ) );

	$j.each( mw.getConfig( 'licenses' ), function( i, licenseConfig ) {
		var template = licenseConfig.template;
		var messageKey = licenseConfig.messageKey;
		
		var name = 'license_' + template;
		var id = 'licenseInput' + widgetCount + '_' + name;
		var $input = $j( '<input />' ) 
			.attr( { id: id, name: name, type: 'checkbox', value: template  } )
			// we use the selector because events can't be unbound unless they're in the DOM.
			.click( function() { _this.$selector.trigger( 'changeLicenses' ) } )
		_this.inputs.push( $input );
		_this.$selector.append( 
			$input,
			$j( '<label />' ).attr( { 'for': id } ).html( gM( messageKey ) ),
			$j( '<br/>' )
		);
	} );

	if ( values ) {
		_this.setValues( values );
	}

	return _this;
};

mw.UploadWizardLicenseInput.prototype = {
	count: 0,

	/**
	 * Sets the value(s) of a license input.
	 * @param object of license-key to boolean values, e.g. { cc_by_sa_30: true, gfdl: true }
	 */
	setValues: function( licenseValues ) {
		var _this = this;
		$j.each( _this.inputs, function( i, $input ) {
			var template = $input.val();
			$input.attr( 'checked', ~~!!licenseValues[template] );
		} );
		// we use the selector because events can't be unbound unless they're in the DOM.
		_this.$selector.trigger( 'changeLicenses' );
	},

	/**
	 * Set the default configured licenses
	 */
	setDefaultValues: function() {
		var _this = this;
		var values = {};
		$j.each( mw.getConfig( 'licenses' ), function( i, licenseConfig ) {
			values[ licenseConfig.template ] = licenseConfig['default'];
		} );
		_this.setValues( values );
	},

	/**
	 * Gets the templates associated with checked inputs 
	 * @return array of template names
  	 */
	getTemplates: function() {
		return $j( this.inputs )
			.filter( function() { return this.is( ':checked' ) } )
			.map( function() { return this.val() } );
	},

	/**
	 * Check if a valid value is set, also look for incompatible choices. 
	 * Side effect: if no valid value, add notes to the interface. Add listeners to interface, to revalidate and remove notes.
	 * @return boolean; true if a value set, false otherwise
	 */
	valid: function() {
		var _this = this;
		var isValid = true;

		if ( ! _this.isSet() ) {
			isValid = false;
			errorHtml = gM( 'mwe-upwiz-deeds-need-license' );
		}

		// XXX something goes here for licenses incompatible with each other

		var $errorEl = this.$selector.find( '.mwe-error' );
		if (isValid) {
			$errorEl.fadeOut();
		} else {
			// we bind to $selector because unbind() doesn't work on non-DOM objects
			_this.$selector.bind( 'changeLicenses.valid', function() {
				_this.$selector.unbind( 'changeLicenses.valid' );
				_this.valid();
			} );	
			$errorEl.html( errorHtml ).show();
		}

		return isValid;
	},


	/**
  	 * Returns true if any license is set
	 * @return boolean
	 */
	isSet: function() {
		return this.getTemplates().length > 0;
	}

};


/**
 * Represents the upload -- in its local and remote state. (Possibly those could be separate objects too...)
 * This is our 'model' object if we are thinking MVC. Needs to be better factored, lots of feature envy with the UploadWizard
 * states:
 *   'new' 'transporting' 'transported' 'details' 'submitting-details' 'complete'  
 * should fork this into two -- local and remote, e.g. filename
 */
mw.UploadWizardUpload = function( filesDiv ) {
	var _this = this;
	_this.state = 'new';
	_this.transportWeight = 1;  // default
	_this.detailsWeight = 1; // default
	_this._thumbnails = {};
	_this.imageinfo = {};
	_this.title = undefined;
	_this.filename = undefined;
	_this.originalFilename = undefined;
	_this.mimetype = undefined;
	_this.extension = undefined;
		
	// details 		
	_this.ui = new mw.UploadWizardUploadInterface( _this, filesDiv );

	// handler -- usually ApiUploadHandler
	// _this.handler = new ( mw.getConfig( 'uploadHandlerClass' ) )( _this );
	// _this.handler = new mw.MockUploadHandler( _this );
	_this.handler = new mw.ApiUploadHandler( _this );
};

mw.UploadWizardUpload.prototype = {

	acceptDeed: function( deed ) {
		var _this = this;
		_this.deed.applyDeed( _this );
	},

	/**
 	 * start
	 */
	start: function() {
		var _this = this;
		_this.setTransportProgress(0.0);
		_this.ui.start();
		_this.handler.start();	
	},

	/**
	 *  remove this upload. n.b. we trigger a removeUpload this is usually triggered from 
	 */
	remove: function() {
		if ( this.details && this.details.div ) {
			this.details.div.remove(); 
		}
		if ( this.thanksDiv ) {
			this.thanksDiv.remove();
		}
		// we signal to the wizard to update itself, which has to delete the final vestige of 
		// this upload (the ui.div). We have to do this silly dance because we 
		// trigger through the div. Triggering through objects doesn't always work.
		$j( this.ui.div ).trigger( 'removeUploadEvent' );
	},


	/**
	 * Wear our current progress, for observing processes to see
	 * XXX this is kind of a misnomer; this event is not firing except for the very first time.
 	 * @param fraction
	 */
	setTransportProgress: function ( fraction ) {
		var _this = this;
		_this.state = 'transporting';
		_this.transportProgress = fraction;
		$j( _this.ui.div ).trigger( 'transportProgressEvent' );
	},

	/**
	 * To be executed when an individual upload finishes. Processes the result and updates step 2's details 
	 * @param result	the API result in parsed JSON form
	 */
	setTransported: function( result ) {
		var _this = this;
		_this.state = 'transported';
		_this.transportProgress = 1;
		$j( _this.ui.div ).trigger( 'transportedEvent' );

		if ( result.upload && result.upload.imageinfo && result.upload.imageinfo.descriptionurl ) {
			// success
			_this.extractUploadInfo( result );	
			_this.deedPreview.setup();
			_this.details.populate();
		
		} else if ( result.upload && result.upload.sessionkey ) {
			// there was a warning - type error which prevented it from adding the result to the db 
			if ( result.upload.warnings.duplicate ) {
				var duplicates = result.upload.warnings.duplicate;
				_this.details.errorDuplicate( result.upload.sessionkey, duplicates );
			}

			// and other errors that result in a stash
		} else {
			alert("failure!");
			// we may want to tag or otherwise queue it as an upload to retry
		}
		
	
	},


	/**
	 * call when the file is entered into the file input
	 * get as much data as possible -- maybe exif, even thumbnail maybe
	 */
	extractLocalFileInfo: function( localFilename ) {
		var _this = this;
		if (false) {  // FileAPI, one day
			_this.transportWeight = getFileSize();
		}
		_this.extension = mw.UploadWizardUtil.getExtension( localFilename );
		// XXX add filename, original filename, extension, whatever else is interesting.
	},


	/** 
 	 * Accept the result from a successful API upload transport, and fill our own info 
	 *
	 * @param result The JSON object from a successful API upload result.
	 */
	extractUploadInfo: function( result ) {
		var _this = this;

		_this.filename = result.upload.filename;
		_this.title = mw.getConfig( 'fileNamespace' ) + ':' + _this.filename;

		_this.extractImageInfo( result.upload.imageinfo );

	},

	/**
	 * Extract image info into our upload object 	
	 * Image info is obtained from various different API methods
	 * @param imageinfo JSON object obtained from API result.
	 */
	extractImageInfo: function( imageinfo ) {
		var _this = this;
		for ( var key in imageinfo ) {
			// we get metadata as list of key-val pairs; convert to object for easier lookup. Assuming that EXIF fields are unique.
			if ( key == 'metadata' ) {
				_this.imageinfo.metadata = {};
				if ( imageinfo.metadata && imageinfo.metadata.length ) {
					$j.each( imageinfo.metadata, function( i, pair ) {
						if ( pair !== undefined ) {
							_this.imageinfo.metadata[pair['name'].toLowerCase()] = pair['value'];
						}
					} );
				}
			} else {
				_this.imageinfo[key] = imageinfo[key];
			}
		}
		
		// we should already have an extension, but if we don't... 
		if ( _this.extension === undefined ) {
			var extension = mw.UploadWizardUtil.getExtension( _this.imageinfo.url );
			if ( !extension ) {
				if ( _this.imageinfo.mimetype ) {
					if ( mw.UploadWizardUtil.mimetypeToExtension[ _this.imageinfo.mimetype ] ) {
						extension = mw.UploadWizardUtil.mimetypeToExtension[ _this.imageinfo.mimetype ];			
					} 
				}
			}
		}
	},

	/**
	 * Supply information to create a thumbnail for this Upload. Runs async, with a callback. 
	 * It is assumed you don't call this until it's been transported.
 	 *
	 * XXX should check if we really need this second API call or if we can get MediaWiki to make us a thumbnail URL upon upload
	 *
	 * @param width - desired width of thumbnail (height will scale to match)
	 * @param callback - callback to execute once thumbnail has been obtained -- must accept object with properties of width, height, and url.
	 */
	getThumbnail: function( width, callback ) {
		var _this = this;
		if ( _this._thumbnails[ "width" + width ] !== undefined ) {
			callback( _this._thumbnails[ "width" + width ] );
			return;
		}

		var apiUrl = mw.getLocalApiUrl();

		var params = {
                        'titles': _this.title,
                        'prop':  'imageinfo',
                        'iiurlwidth': width, 
                        'iiprop': 'url'
                };

		mw.getJSON( apiUrl, params, function( data ) {
			if ( !data || !data.query || !data.query.pages ) {
				mw.log(" No data? ");
				// XXX do something about the thumbnail spinner, maybe call the callback with a broken image.
				return;
			}

			if ( data.query.pages[-1] ) {
				// XXX do something about the thumbnail spinner, maybe call the callback with a broken image.
				return;
			}
			for ( var page_id in data.query.pages ) {
				var page = data.query.pages[ page_id ];
				if ( ! page.imageinfo ) {
					// not found? error
				} else {
					var imageInfo = page.imageinfo[0];
					var thumbnail = {
						width: 	imageInfo.thumbwidth,
						height: imageInfo.thumbheight,
						url: 	imageInfo.thumburl
					};
					_this._thumbnails[ "width" + width ] = thumbnail; 
					callback( thumbnail );
				}
			}
		} );

	},


	/**
	 *  look up thumbnail info and set it in HTML, with loading spinner
	 * it might be interesting to make this more of a publish/subscribe thing, since we have to do this 3x
	 * the callbacks may pile up, getting unnecessary info
	 *
	 * @param selector
	 * @param width
	 */
	setThumbnail: function( selector, width ) {
		var _this = this;
		if ( typeof width === 'undefined' || width === null || width <= 0 )  {	
			width = mw.getConfig( 'thumbnailWidth' );
		}
		width = parseInt( width, 10 );
				
		var callback = function( thumbnail ) {
			// side effect: will replace thumbnail's loadingSpinner
			$j( selector ).html(
				$j('<a/>')
					.attr( { 'href': _this.imageinfo.descriptionurl,
						 'target' : '_new' } )
					.append(
						$j( '<img/>' )
							.attr( 'width',  thumbnail.width )
							.attr( 'height', thumbnail.height )
							.attr( 'src',    thumbnail.url ) ) );
		};

		$j( selector ).loadingSpinner();
		_this.getThumbnail( width, callback );
	}


	
};

/**
 * Create an interface fragment corresponding to a file input, suitable for Upload Wizard.
 * @param upload
 * @param div to insert file interface
 * @param addInterface interface to add a new one (assumed that we start out there)
 */
mw.UploadWizardUploadInterface = function( upload, filesDiv ) {
	var _this = this;

	_this.upload = upload;

	// may need to collaborate with the particular upload type sometimes
	// for the interface, as well as the uploadwizard. OY.
	_this.div = $j('<div class="mwe-upwiz-file"></div>').get(0);
	_this.isFilled = false;

	_this.fileInputCtrl = $j('<input size="1" class="mwe-upwiz-file-input" name="file" type="file"/>')
				.change( function() { _this.fileChanged(); } ) 
				.get(0);


	visibleFilenameDiv = $j('<div class="mwe-upwiz-visible-file"></div>')
		.append( 
			 $j.fn.removeCtrl( 'mwe-upwiz-remove-upload', function() { _this.upload.remove(); } ),
	
			 $j( '<div class="mwe-upwiz-file-indicator"></div>' ),

			 $j( '<div class="mwe-upwiz-visible-file-filename">' )
				.append( 
					 $j( '<span class="ui-icon ui-icon-document" style="display: inline-block;" />' ),
					 $j( '<span class="mwe-upwiz-visible-file-filename-text"/>' )
				)

		);

	//_this.errorDiv = $j('<div class="mwe-upwiz-upload-error mwe-upwiz-file-indicator" style="display: none;"></div>').get(0);

	_this.filenameCtrl = $j('<input type="hidden" name="filename" value=""/>').get(0); 
	
	// this file Ctrl container is placed over other interface elements, intercepts clicks and gives them to the file input control.
	// however, we want to pass hover events to interface elements that we are over, hence the bindings.
	// n.b. not using toggleClass because it often gets this event wrong -- relies on previous state to know what to do
	_this.fileCtrlContainer = $j('<div class="mwe-upwiz-file-ctrl-container">');
/*
					.bind( 'mouseenter', function(e) { _this.addFileCtrlHover(e); } )
					.bind( 'mouseleave', function(e) { _this.removeFileCtrlHover(e); } );
*/

	// the css trickery (along with css) 
	// here creates a giant size file input control which is contained within a div and then
	// clipped for overflow. The effect is that we have a div (ctrl-container) we can position anywhere
	// which works as a file input. It will be set to opacity:0 and then we can do whatever we want with
	// interface "below".
	// XXX caution -- if the add file input changes size we won't match, unless we add some sort of event to catch this.
	_this.form = $j('<form class="mwe-upwiz-form"></form>')
			.append( visibleFilenameDiv )
			.append( _this.fileCtrlContainer
				.append( _this.fileInputCtrl ) 
			)
			.append( _this.filenameCtrl ).get( 0 );


	$j( _this.div ).append( _this.form );

	// XXX evil hardcoded
	// we don't really need filesdiv if we do it this way?
	$j( _this.div ).insertBefore( '#mwe-upwiz-upload-ctrls' ); // append( _this.div );

	// _this.progressBar = ( no progress bar for individual uploads yet )
	// we bind to the ui div since unbind doesn't work for non-DOM objects
	$j( _this.div ).bind( 'transportProgressEvent', function(e) { _this.showTransportProgress(); } );
	$j( _this.div ).bind( 'transportedEvent', function(e) { _this.showTransported(); } );

};


mw.UploadWizardUploadInterface.prototype = {
	/**
	 * Things to do to this interface once we start uploading
	 */
	start: function() {
		var _this = this;
		// remove hovering
		$j( _this.div )
			.unbind( 'mouseenter mouseover mouseleave mouseout' );

		// remove delete control 
		$j( _this.div )
			.find( '.mwe-upwiz-remove-ctrl' )
			.unbind( 'mouseenter mouseover mouseleave mouseout' )
			.remove();
	},

	busy: function() {
		var _this = this;
		// for now we implement this as looking like "100% progress"
		// e.g. an animated bar that takes up all the space
		// _this.showTransportProgress();
	},

	/**
 	 *
	 */ 
	showIndicatorMessage: function( classToRemove, classToAdd, msgKey ) {
		var _this = this;
		var $indicator = $j( _this.div ).find( '.mwe-upwiz-file-indicator' );
		if ( classToRemove ) {
			$indicator.removeClass( classToRemove );
		}
		if ( classToAdd ) {
			$indicator.addClass( classToAdd );
		}
		$indicator.html( gM( msgKey ) );
		$j( _this.div ).find( '.mwe-upwiz-visible-file-filename' )
				.css( 'margin-right', ( $indicator.outerWidth() + 24 ).toString() + 'px' );
		$indicator.css( 'visibility', 'visible' ); 
	},

	/**
	 * Put the visual state of an individual upload ito "progress"
	 * @param fraction	The fraction of progress. Float between 0 and 1
	 */
	showTransportProgress: function() {
		this.showIndicatorMessage( null, 'mwe-upwiz-status-progress', 'mwe-upwiz-uploading' );
		// update individual progress bar with fraction?
	},

	/**
	 * Execute when this upload is transported; cleans up interface. 
	 */
	showTransported: function() {
		this.showIndicatorMessage( 'mwe-upwiz-status-progress', 'mwe-upwiz-status-completed', 'mwe-upwiz-transported' );
	},

	/**
	 * Run this when the value of the file input has changed. Check the file for various forms of goodness.
	 * If okay, then update the visible filename (due to CSS trickery the real file input is invisible)
	 */
	fileChanged: function() {
		var _this = this;
		_this.clearErrors();
		_this.upload.extractLocalFileInfo( $j( _this.fileInputCtrl ).val() );
		if ( _this.isGoodExtension( _this.upload.extension ) ) {
			_this.updateFilename();
		} else {       
			//_this.error( 'bad-filename-extension', ext );
			alert("bad extension");
		}
	},

	/**
	 * Move the file input to cover a certain element on the page. 
	 * We use invisible file inputs because this is the only way to style a file input
	 * or otherwise get it to do what you want.
	 * It is helpful to sometimes move them to cover certain elements on the page, and 
	 * even to pass events like hover
	 * @param selector jquery-compatible selector, for a single element
	 */
	moveFileInputToCover: function( selector, offset ) {

		//mw.log( "moving to cover " + selector );
		var _this = this;
		var $covered = $j( selector ); 

		var topOffset, rightOffset, bottomOffset, leftOffset;
		topOffset = rightOffset = bottomOffset = leftOffset = 0;
		if (typeof offset != 'undefined' ) {
			topOffset = offset[0];
			rightOffset = offset[1];
			bottomOffset = offset[2];
			leftOffset = offset[3];
		};
		var widthOffset = rightOffset - leftOffset;
		var heightOffset = bottomOffset - topOffset;
		//mw.log( "position: " );
		//mw.log( $covered.position() );
		var position = $covered.position();
		_this.fileCtrlContainer
			.css( $covered.position() )
			.width( $covered.outerWidth() )
			.height( $covered.outerHeight() ); 
			/*
			{ 
				'top': (position['top'] + topOffset).toString() + 'px', 
				'left': (position['left'] + leftOffset).toString() + 'px'  
			} )
			.width( ($covered.outerWidth() + widthOffset).toString() + 'px' )
			.height( ($covered.outerHeight() + heightOffset).toString() + 'px' );
			*/
		
		// shift the file input over with negative margins, 
		// internal to the overflow-containing div, so the div shows all button
		// and none of the textfield-like input
		$j( _this.fileInputCtrl ).css( {
			'margin-left': '-' + ~~( $j( _this.fileInputCtrl).width() - $covered.outerWidth() - 10 ) + 'px',
			'margin-top' : '-' + ~~( $j( _this.fileInputCtrl).height() - $covered.outerHeight() - 10 ) + 'px'
		} );


	},

	/**
	 * this does two things: 
	 *   1 ) since the file input has been hidden with some clever CSS ( to avoid x-browser styling issues ), 
	 *      update the visible filename
	 *
	 *   2 ) update the filename desired when added to MediaWiki. This should be RELATED to the filename on the filesystem,
	 *      but it should be silently fixed so that it does not trigger uniqueness conflicts. i.e. if server has cat.jpg we change ours to cat_2.jpg.
	 *      This is hard to do in a scalable fashion on the client; we don't want to do 12 api calls to get cat_12.jpg. 
	 *      Ideally we should ask the SERVER for a decently unique filename related to our own. 
	 *	So, at the moment, this is hacked with a guaranteed - unique filename instead.  
	 */
	updateFilename: function() {
		var _this = this;
		var path = $j(_this.fileInputCtrl).attr('value');
		
	
		// visible filename	
		$j( _this.form ).find( '.mwe-upwiz-visible-file-filename-text' ).html( path );

		// desired filename 
		var filename = _this.convertPathToFilename( path );
		_this.upload.originalFilename = filename;
		// this is a hack to get a filename guaranteed unique.
		uniqueFilename = mw.getConfig( 'userName' ) + "_" + ( new Date() ).getTime() + "_" + filename;
		$j( _this.filenameCtrl ).attr( 'value', uniqueFilename );

		if ( ! _this.isFilled ) {
			var $div = $j( _this.div );
			_this.isFilled = true;
			$div.addClass( 'filled' );
		
				
 			// cover the div with the file input.
			// we use the visible-file div because it has the same offsetParent as the file input
			// the second argument offsets the fileinput to the right so there's room for the close icon to get mouse events
			_this.moveFileInputToCover( 	
				$div.find( '.mwe-upwiz-visible-file-filename' )
			)

			// Highlight the file on mouseover (and also show controls like the remove control).
			//
			// On Firefox there are bugs related to capturing mouse events on inputs, so we seem to miss the
			// mouseenter or mouseleave events randomly. It's only really bad if we miss mouseleave, 
			// and have two highlights visible. so we add another call to REALLY make sure that other highlights
			// are deactivated.
			// http://code.google.com/p/fbug/issues/detail?id=2075
			// 
			// ALSO: When file inputs are adjacent, Firefox misses the "mouseenter" and "mouseleave" events. 
			// Consequently we have to bind to "mouseover" and "mouseout" as well even though that's not as efficient.
			$div.bind( 'mouseenter mouseover', function() { 
				$div.addClass( 'hover' ); 
				$j( '#mwe-upwiz-files' )
					.children()
					.filter( function() { return this !== _this.div } )
					.removeClass('hover');
			}, false );
			$div.bind( 'mouseleave mouseout', function() { 
				$div.removeClass( 'hover' ); 	
			}, false );
			$j( _this.div ).trigger( 'filled' );
		} else {	
			$j( _this.div ).trigger( 'filenameAccepted' );
		}
	},

	/**
	 * Remove any complaints we had about errors and such
	 * XXX this should be changed to something Theme compatible
	 */
	clearErrors: function() {
		var _this = this;
		$j( _this.div ).removeClass( 'mwe-upwiz-upload-error ');
		$j( _this.errorDiv ).hide().empty();
	},

	/**
	 * Show an error with the upload
	 */
	error: function() {
		var _this = this;
		var args = Array.prototype.slice.call( arguments ); // copies arguments into a real array
		var msg = 'mwe-upwiz-upload-error-' + args[0];
		$j( _this.errorDiv ).append( $j( '<p class="mwe-upwiz-upload-error">' + gM( msg, args.slice( 1 ) ) + '</p>') );
		// apply a error style to entire did
		$j( _this.div ).addClass( 'mwe-upwiz-upload-error' );
		$j( _this.errorDiv ).show();
	},

	/**
	 * Get the extension of the path in fileInputCtrl
	 * @return extension as string 
	 */
	getExtension: function() {
		var _this = this;
		var path = $j(_this.fileInputCtrl).attr('value');
		return mw.UploadWizardUtil.getExtension(path);
	},

	/**
	 * XXX this is common utility code
	 * used when converting contents of a file input and coming up with a suitable "filename" for mediawiki
	 * test: what if path is length 0 
	 * what if path is all separators
	 * what if path ends with a separator character
	 * what if it ends with multiple separator characters
	 *
	 * @param path
	 * @return filename suitable for mediawiki as string
	 */
	convertPathToFilename: function( path ) {
		if (path === undefined || path == '') {
			return '';
		}
		
 		var lastFileSeparatorIdx = Math.max(path.lastIndexOf( '/' ), path.lastIndexOf( '\\' ));
	 	// lastFileSeparatorIdx is now -1 if no separator found, or some index in the string.
		// so, +1, that is either 0 ( beginning of string ) or the character after last separator.
		// caution! could go past end of string... need to be more careful
		var filename = path.substr( lastFileSeparatorIdx + 1 );
		return mw.UploadWizardUtil.pathToTitle( filename );


	
 	},

	/**
	 * XXX this is common utility code
	 * copied because we'll probably need it... stripped from old doDestinationFill
	 * this is used when checking for "bad" extensions in a filename. 
	 * @param ext
	 * @return boolean if extension was acceptable
	 */
	isGoodExtension: function( ext ) {
		var _this = this;
		var found = false;
		var extensions = mw.getConfig('fileExtensions');
		if ( extensions ) {
			for ( var i = 0; i < extensions.length; i++ ) {
				if ( extensions[i].toLowerCase() == ext ) {
					found = true;
				}
			}
		}
		return found;
	}

};	
	
/**
 * Object that represents an indvidual language description, in the details portion of Upload Wizard
 * @param languageCode
 */
mw.UploadWizardDescription = function( languageCode ) {
	var _this = this;

	// Logic copied from MediaWiki:UploadForm.js
	// Per request from Portuguese and Brazilian users, treat Brazilian Portuguese as Portuguese.
	if (languageCode == 'pt-br') {
		languageCode = 'pt';
	// this was also in UploadForm.js, but without the heartwarming justification
	} else if (languageCode == 'en-gb') {
		languageCode = 'en';
	}

	_this.languageMenu = mw.LanguageUpWiz.getMenu("lang", languageCode);
	$j(_this.languageMenu).addClass('mwe-upwiz-desc-lang-select');
	_this.description = $j('<textarea name="desc" rows="2" cols="36" class="mwe-upwiz-desc-lang-text"></textarea>')
				.attr( 'title', gM( 'mwe-upwiz-tooltip-description' ) )
				.growTextArea()
				.tipsyPlus( { plus: 'even more stuff' } );
	_this.div = $j('<div class="mwe-upwiz-desc-lang-container"></div>')
		       .append( _this.languageMenu )
	               .append( _this.description );
	
};

mw.UploadWizardDescription.prototype = {

	/**
	 * Obtain text of this description, suitable for including into Information template
	 * @return wikitext as a string
	 */
	getWikiText: function() {
		var _this = this;
		var language = $j( _this.languageMenu ).val().trim();
		var fix = mw.getConfig("languageTemplateFixups");
		if (fix[language]) {
			language = fix[language];
		}
		return '{{' + language + '|1=' + $j( _this.description ).val().trim() + '}}';
	}
};

/**
 * Object that represents the Details (step 2) portion of the UploadWizard
 * n.b. each upload gets its own details.
 * 
 * XXX a lot of this construction is not really the jQuery way. 
 * The correct thing would be to have some hidden static HTML
 * on the page which we clone and slice up with selectors. Inputs can still be members of the object
 * but they'll be found by selectors, not by creating them as members and then adding them to a DOM structure.
 *
 * XXX this should have styles for what mode we're in 
 *
 * @param UploadWizardUpload
 * @param containerDiv	The div to put the interface into
 */
mw.UploadWizardDetails = function( upload, containerDiv ) {

	var _this = this;
	_this.upload = upload;

	_this.descriptions = [];

	_this.div = $j( '<div class="mwe-upwiz-info-file"></div>' );

	_this.thumbnailDiv = $j( '<div class="mwe-upwiz-thumbnail mwe-upwiz-thumbnail-side"></div>' );
	
	_this.errorDiv = $j( '<div class="mwe-upwiz-details-error"></div>' );

	_this.dataDiv = $j( '<div class="mwe-upwiz-data"></div>' );

	// descriptions
	_this.descriptionsDiv = $j( '<div class="mwe-upwiz-details-descriptions mwe-upwiz-details-input"></div>' );
	
	_this.descriptionAdder = $j( '<a class="mwe-upwiz-more-options"/>' )
					.html( gM( 'mwe-upwiz-desc-add-0' ) )
					.click( function( ) { _this.addDescription(); } );
	
	_this.descriptionsContainerDiv = 
		$j( '<div class="mwe-upwiz-details-descriptions-container ui-helper-clearfix"></div>' )
			.append( $j( '<div class="mwe-upwiz-details-label">' + gM( 'mwe-upwiz-desc' ) + '</div>' ).requiredFieldLabel() )
			.append( _this.descriptionsDiv )
			.append( $j( '<div class="mwe-upwiz-details-descriptions-add"></div>' )
					.append( _this.descriptionAdder ) );
	// Commons specific help for titles 
	//    http://commons.wikimedia.org/wiki/Commons:File_naming
	//    http://commons.wikimedia.org/wiki/MediaWiki:Filename-prefix-blacklist
	//    XXX make sure they can't use ctrl characters or returns or any other bad stuff.
	_this.titleInput = $j( '<textarea type="text" rows="1" class="mwe-title mwe-long-textarea"></textarea>' )
		.attr( 'title', gM( 'mwe-upwiz-tooltip-title' ) )
		.tipsyPlus()
		.keyup( function() { 
			_this.setFilenameFromTitle();
		} )
		.growTextArea()
		.destinationChecked( {
			spinner: function(bool) { _this.toggleDestinationBusy(bool); },
			preprocess: function( name ) { return _this.getFilenameFromTitle(); }, // XXX this is no longer a pre-process
			processResult: function( result ) { _this.processDestinationCheck( result ); } 
		} );

	_this.titleErrorDiv = $j('<div class="mwe-upwiz-details-input mwe-error"></div>');

	_this.titleContainerDiv = $j('<div class="mwe-upwiz-details-label-input ui-helper-clearfix"></div>')
		.append(
			_this.titleErrorDiv, 
			$j( '<div class="mwe-upwiz-details-label"></div>' )
				.requiredFieldLabel()
				.append( gM( 'mwe-upwiz-title' ) ),
			$j( '<div class="mwe-upwiz-details-input"></div>' ).append( _this.titleInput ) 
		) 

	_this.deedDiv = $j( '<div class="mwe-upwiz-custom-deed" />' );

	_this.copyrightInfoFieldset = $j('<fieldset class="mwe-fieldset mwe-upwiz-copyright-info"></fieldset>')
		.hide()
		.append( 
			$j( '<legend class="mwe-legend">' ).append( gM( 'mwe-upwiz-copyright-info' ) ), 
			_this.deedDiv
		);
	
	_this.moreDetailsDiv = $j('<div class="mwe-more-details"></div>');

	_this.moreDetailsCtrlDiv = $j( '<div class="mwe-upwiz-details-more-options"></div>' );


	
	_this.dateInput = $j( '<input type="text" class="mwe-date" size="20"/>' );
	// XXX suddenly this isn't working. Seems to be a problem with monobook. If I datepicker-ify an input outside the 
	// content area, it works. Vector is fine
	$j( _this.dateInput ).datepicker( { 	
		dateFormat: 'yy-mm-dd', // oddly, this means yyyy-mm-dd
		buttonImage: mw.getMwEmbedPath() + 'skins/common/images/calendar.gif',
		buttonImageOnly: false  // XXX determine what this does, docs are confusing
	} );

	var dateInputDiv = $j( '<div class="mwe-upwiz-details-label-input ui-helper-clearfix"></div>' )
		.append( $j( '<div class="mwe-upwiz-details-label"></div>' ).append( gM( 'mwe-upwiz-date-created' ) ) )
		.append( $j( '<div class="mwe-upwiz-details-input"></div>' ).append( _this.dateInput ) ) ;

	_this.otherInformationInput = $j( '<textarea class="mwe-upwiz-other-textarea"></textarea>' )
		.growTextArea()
		.attr( 'title', gM( 'mwe-upwiz-tooltip-other' ) )
		.tipsyPlus();

	var otherInformationDiv = $j('<div></div>')	
		.append( $j( '<div class="mwe-upwiz-details-more-label">' ).append( gM( 'mwe-upwiz-other' ) ) ) 
		.append( _this.otherInformationInput );
	

	$j( _this.div )
		.addClass( 'ui-helper-clearfix' )
		.append( _this.thumbnailDiv )
		.append( _this.errorDiv )
		.append( $j( _this.dataDiv )
			.append( _this.descriptionsContainerDiv )
			.append( _this.titleContainerDiv )
			.append( _this.copyrightInfoFieldset )
			.append( _this.moreDetailsCtrlDiv )
			.append( $j( _this.moreDetailsDiv ) 
				.append( dateInputDiv )
				// location goes here
				.append( otherInformationDiv )
			)
		);

	mw.UploadWizardUtil.makeToggler( _this.moreDetailsCtrlDiv, _this.moreDetailsDiv );	

	_this.addDescription();
	$j( containerDiv ).append( _this.div );


};

mw.UploadWizardDetails.prototype = {

	/**
	 * check entire form for validity
	 */ 
	// return boolean if we are ready to go.
        // side effect: add error text to the page for fields in an incorrect state.
        valid: function() {
		var _this = this;
                // at least one description -- never mind, we are disallowing removal of first description
                // all the descriptions -- check min & max length

                // the title
		var titleInputValid = $j( _this.titleInput ).data( 'valid' );
		if ( typeof titleInputValid == 'undefined' ) {
			alert( "please wait, still checking the title for uniqueness..." );
			return false;
		}

		return titleInputValid;	
				
                // length restrictions
                // not already taken

                // the license, if any

                // pop open the 'more-options' if the date is bad
                // the date
                // other information
                // no validation required
        },



	/**
	 * toggles whether we use the 'macro' deed or our own
	 */
	useCustomDeedChooser: function() {
		var _this = this;
		_this.copyrightInfoFieldset.show();
		_this.upload.wizardDeedChooser = _this.upload.deedChooser;
		_this.upload.deedChooser = new mw.UploadWizardDeedChooser( 
			_this.deedDiv,
			[ new mw.UploadWizardDeedOwnWork(), 
			  new mw.UploadWizardDeedThirdParty() ]
		);
	},

	/**
	 * Sets the filename from the title plus this upload's extension.
	 */
	setFilenameFromTitle: function() {
		var _this = this;
		_this.filename = mw.getConfig( 'fileNamespace' ) + ':' + _this.getFilenameFromTitle();
		$j( '#mwe-upwiz-details-filename' ).text( _this.filename );		
			
	},

	/**
	 * Gets a filename from the human readable title, using upload's extension.
	 * @return Filename
	 */ 
	getFilenameFromTitle: function() {
		var _this = this;
		var name = $j( _this.titleInput ).val();
		return mw.UploadWizardUtil.pathToTitle( name ) + '.' + _this.upload.extension;
	},


	/**
	 * show file destination field as "busy" while checking 
	 * @param busy boolean true = show busy-ness, false = remove
	 */
	toggleDestinationBusy: function ( busy ) {
		var _this = this;
		if (busy) {
			_this.titleInput.addClass( "busy" );
			$j( _this.titleInput ).data( 'valid', undefined );
		} else {
			_this.titleInput.removeClass( "busy" );
		}
	},
	
	/**
	 * Process the result of a destination filename check.
	 * See mw.DestinationChecker.js for documentation of result format 
	 * XXX would be simpler if we created all these divs in the DOM and had a more jquery-friendly way of selecting
 	 * attrs. Instead we create & destroy whole interface each time. Won't someone think of the DOM elements?
	 * @param result
	 */
	processDestinationCheck: function( result ) {
		var _this = this;

		if ( result.isUnique ) {
			$j( _this.titleInput ).data( 'valid', true );
			_this.titleErrorDiv.hide().empty();
			_this.ignoreWarningsInput = undefined;
			return;
		}

		$j( _this.titleInput ).data( 'valid', false );

		// result is NOT unique
		var title = result.title;
		var img = result.img;
		var href = result.href;
	
		_this.titleErrorDiv.html( gM( 'mwe-upwiz-fileexists-replace', result.title ) ).show();

		/* temporarily commenting out the full thumbnail etc. thing. For now, we just want the user to change
                   to a different name 	
		_this.ignoreWarningsInput = $j("<input />").attr( { type: 'checkbox', name: 'ignorewarnings' } ); 
		var $fileAlreadyExists = $j('<div />')
			.append(				
				gM( 'mwe-upwiz-fileexists', 
					$j('<a />')
					.attr( { target: '_new', href: href } )
					.text( title )
				),
				$j('<br />'),
				_this.ignoreWarningsInput,
				gM('mwe-upwiz-overwrite')
			);
		
		var $imageLink = $j('<a />')
			.addClass( 'image' )
			.attr( { target: '_new', href: href } )
			.append( 
				$j( '<img />')
				.addClass( 'thumbimage' )
				.attr( {
					'width' : img.thumbwidth,
					'height' : img.thumbheight,
					'border' : 0,
					'src' : img.thumburl,
					'alt' : title
				} )
			);
			
		var $imageCaption = $j( '<div />' )
			.addClass( 'thumbcaption' )
			.append( 
				$j('<div />')
				.addClass( "magnify" )
				.append(
					$j('<a />' )
					.addClass( 'internal' )
					.attr( {
						'title' : gM('mwe-upwiz-thumbnail-more'),
						'href' : href
					} ),
					
					$j( '<img />' )
					.attr( {
						'border' : 0,
						'width' : 15,
						'height' : 11,
						'src' : mw.getConfig( 'images_path' ) + 'magnify-clip.png'
					} ), 
					
					$j('<span />')
					.html( gM( 'mwe-fileexists-thumb' ) )
				)													
			);

		$j( _this.titleErrorDiv ).html(
			$j('<span />')  // dummy argument since .html() only takes one arg
				.append(
					$fileAlreadyExists,
					$j( '<div />' )
						.addClass( 'thumb tright' )
						.append(
							$j( '<div />' )
							.addClass( 'thumbinner' )
							.css({
								'width' : ( parseInt( img.thumbwidth ) + 2 ) + 'px;'
							})
							.append( 
								$imageLink, 
								$imageCaption
							)					
						)
				)
		).show();
		*/


	}, 

	/**
	 * Do anything related to a change in the number of descriptions
	 */
	recountDescriptions: function() {
		var _this = this;
		// if there is some maximum number of descriptions, deal with that here
		$j( _this.descriptionAdder ).html( gM( 'mwe-upwiz-desc-add-' + ( _this.descriptions.length == 0 ? '0' : 'n' )  )  );
	},


	/**
	 * Add a new description
	 */
	addDescription: function() {
		var _this = this;
		var languageCode = _this.descriptions.length ? mw.LanguageUpWiz.UNKNOWN : mw.getConfig('userLanguage' );
		var description = new mw.UploadWizardDescription( languageCode  );

		/* the first description does not get a removal ctrl -- you have to have ONE */
		if ( _this.descriptions.length ) {
			$j( description.div  ).append( 
				 $j.fn.removeCtrl( 'mwe-upwiz-remove-description', function() { _this.removeDescription( description ) } )
			);
		} 

		$j( _this.descriptionsDiv ).append( description.div  );
		_this.descriptions.push( description  );
		_this.recountDescriptions();
	},

	/**
	 * Remove a description 
	 * @param description
	 */
	removeDescription: function( description  ) {
		var _this = this;
		$j( description.div ).remove();
		mw.UploadWizardUtil.removeItem( _this.descriptions, description  );
		_this.recountDescriptions();
	},

	/**
	 * Display an error with details
	 * XXX this is a lot like upload ui's error -- should merge
	 */
	error: function() {
		var _this = this;
		var args = Array.prototype.slice.call( arguments  ); // copies arguments into a real array
		var msg = 'mwe-upwiz-upload-error-' + args[0];
		$j( _this.errorDiv ).append( $j( '<p class="mwe-upwiz-upload-error">' + gM( msg, args.slice( 1 ) ) + '</p>' ) );
		// apply a error style to entire did
		$j( _this.div ).addClass( 'mwe-upwiz-upload-error' );
		$j( _this.dataDiv ).hide();
		$j( _this.errorDiv ).show();
	},

	/**
	 * Given the API result pull some info into the form ( for instance, extracted from EXIF, desired filename )
	 * @param result	Upload API result object
	 */
	populate: function() {
		var _this = this;
		mw.log( "populating details from upload" );
		_this.upload.setThumbnail( _this.thumbnailDiv );
		_this.prefillDate();
		_this.prefillSource();
		_this.prefillAuthor(); 
		_this.prefillTitle();
		_this.prefillFilename();
		_this.prefillLocation(); 
	},

	/**
	 * Check if we got an EXIF date back; otherwise use today's date; and enter it into the details 
	 * XXX We ought to be using date + time here...
	 * EXIF examples tend to be in ISO 8601, but the separators are sometimes things like colons, and they have lots of trailing info
	 * (which we should actually be using, such as time and timezone)
	 */
	prefillDate: function() {
		var _this = this;
		var yyyyMmDdRegex = /^(\d\d\d\d)[:\/-](\d\d)[:\/-](\d\d)\D.*/;
		var dateStr;
		var metadata = _this.upload.imageinfo.metadata;
		$j.each([metadata.datetimeoriginal, metadata.datetimedigitized, metadata.datetime, metadata['date']], 
			function( i, imageinfoDate ) {
				if ( imageinfoDate !== undefined ) {
					var d = imageinfoDate.trim();
					if ( d.match( yyyyMmDdRegex ) ) { 
						dateStr = d.replace( yyyyMmDdRegex, "$1-$2-$3" );
						return false; // break from $j.each
					}
				}
			}
		);
		// if we don't have EXIF or other metadata, let's use "now"
		// XXX if we have FileAPI, it might be clever to look at file attrs, saved 
		// in the upload object for use here later, perhaps
		function pad( n ) { 
			return n < 10 ? "0" + n : n;
		}

		if (dateStr === undefined) {
			d = new Date();
			dateStr = d.getUTCFullYear() + '-' + pad(d.getUTCMonth()) + '-' + pad(d.getUTCDate());
		}

		// ok by now we should definitely have a date string formatted in YYYY-MM-DD
		$j( _this.dateInput ).val( dateStr );
	},

	/**
	 * Set the title of the thing we just uploaded, visibly
	 * Note: the interface's notion of "filename" versus "title" is the opposite of MediaWiki
	 */
	prefillTitle: function() {
		var _this = this;
		var titleExt = mw.UploadWizardUtil.titleToPath( _this.upload.originalFilename );
		var title = titleExt.replace( /\.\w+$/, '' );
		$j( _this.titleInput ).val( title );
	},

	/**
	 * Set the title of the thing we just uploaded, visibly
	 * Note: the interface's notion of "filename" versus "title" is the opposite of MediaWiki
	 */
	prefillFilename: function() {
		var _this = this;
		_this.setFilenameFromTitle();
	},

	/**
 	 * Prefill location inputs (and/or scroll to position on map) from image info and metadata
	 *
	 * At least for my test images, the EXIF parser on MediaWiki is not giving back any data for
	 *  GPSLatitude, GPSLongitude, or GPSAltitudeRef. It is giving the lat/long Refs, the Altitude, and the MapDatum 
	 * So, this is broken until we fix MediaWiki's parser, OR, parse it ourselves somehow 
	 *
	 *    in Image namespace
	 *		GPSTag		Long ??
	 *
	 *    in GPSInfo namespace
	 *    GPSVersionID	byte*	2000 = 2.0.0.0
	 *    GPSLatitude	rational 
	 *    GPSLatitudeRef	ascii (N | S)  or North | South 
	 *    GPSLongitude	rational
	 *    GPSLongitudeRef   ascii (E | W)    or East | West 
	 *    GPSAltitude	rational
	 *    GPSAltitudeRef	byte (0 | 1)    above or below sea level
	 *    GPSImgDirection	rational
	 *    GPSImgDirectionRef  ascii (M | T)  magnetic or true north
	 *    GPSMapDatum 	ascii		"WGS-84" is the standard
	 *
	 *  A 'rational' is a string like this:
	 *	"53/1 0/1 201867/4096"	--> 53 deg  0 min   49.284 seconds 
	 *	"2/1 11/1 64639/4096"    --> 2 deg  11 min  15.781 seconds
	 *	"122/1"             -- 122 m  (altitude)
	 */
	prefillLocation: function() {
		var _this = this;
		var metadata = _this.upload.imageinfo.metadata;
		if (metadata === undefined) {
			return;
		}
		

	},

	/**
	 * Given a decimal latitude and longitude, return filled out {{Location}} template
	 * @param latitude decimal latitude ( -90.0 >= n >= 90.0 ; south = negative )
	 * @param longitude decimal longitude ( -180.0 >= n >= 180.0 ; west = negative )
	 * @param scale (optional) how rough the geocoding is. 
	 * @param heading (optional) what direction the camera is pointing in. (decimal 0.0-360.0, 0 = north, 90 = E)
	 * @return string with WikiText which will geotag this record
	 */
	coordsToWikiText: function(latitude, longitude, scale, heading) {
		//Wikipedia
		//http://en.wikipedia.org/wiki/Wikipedia:WikiProject_Geographical_coordinates#Parameters
		// http://en.wikipedia.org/wiki/Template:Coord
		//{{coord|61.1631|-149.9721|type:landmark_globe:earth_region:US-AK_scale:150000_source:gnis|name=Kulis Air National Guard Base}}
		
		//Wikimedia Commons
		//{{Coor dms|41|19|20.4|N|19|38|36.7|E}}
		//{{Location}}

	},

	/**
	 * If there is a way to figure out source from image info, do so here
	 * XXX user pref?
	 */
	prefillSource: function() {
		// we have no way to do this AFAICT
	},

	/**
	 * Prefill author (such as can be determined) from image info and metadata
	 * XXX user pref?
	 */
	prefillAuthor: function() {
		var _this = this;
		if (_this.upload.imageinfo.metadata.author !== undefined) {
			$j( _this.authorInput ).val( _this.upload.imageinfo.metadata.author );
		}
	
	},
	
	/**
	 * Prefill license (such as can be determined) from image info and metadata
	 * XXX user pref?
	 */
	prefillLicense: function() {
		var _this = this;
		var copyright = _this.upload.imageinfo.metadata.copyright;
		if (copyright !== undefined) {
			if (copyright.match(/\bcc-by-sa\b/i)) {
				// set license to be that CC-BY-SA
			} else if (copyright.match(/\bcc-by\b/i)) {
				// set license to be that
			} else if (copyright.match(/\bcc-zero\b/i)) {
				// set license to be that
				// XXX any other licenses we could guess from copyright statement
			} else {
				$j( _this.licenseInput ).val( copyright );
			}
		}
	},


	/**
	 * 
	showErrors: function() {
		var _this = this;
		$j.each( _this.errors, function() {

		} );
	},
	 */
	
	/**
	 * Convert entire details for this file into wikiText, which will then be posted to the file 
	 * XXX there is a WikiText sanitizer in use on UploadForm -- use that here, or port it 
	 * @return wikitext representing all details
	 */
	getWikiText: function() {
		var _this = this;
		
		// XXX validate!
		if ( ! _this.valid() ) {
			alert( "THIS DEED IS NOT READY" );
			return null;
		}



		wikiText = '';
	

		// http://commons.wikimedia.org / wiki / Template:Information
	
		// can we be more slick and do this with maps, applys, joins?
		var information = { 
			'description' : '',	 // {{lang|description in lang}}*   required
			'date' : '',		 // YYYY, YYYY-MM, or YYYY-MM-DD     required  - use jquery but allow editing, then double check for sane date.
			'source' : '',    	 // {{own}} or wikitext    optional 
			'author' : '',		 // any wikitext, but particularly {{Creator:Name Surname}}   required
			'permission' : '',       // leave blank unless OTRS pending; by default will be "see below"   optional 
			'other_versions' : '',   // pipe separated list, other versions     optional
			'other_fields' : ''      // ???     additional table fields 
		};
		
		// sanity check the descriptions -- do not have two in the same lang
		// all should be a known lang
		if ( _this.descriptions.length === 0 ) {
			// ruh roh
			// we should not even allow them to press the button ( ? ) but then what about the queue...
		}
		$j.each( _this.descriptions, function( i, desc ) {
			information['description'] += desc.getWikiText();
		} );	

		// XXX add a sanity check here for good date
		information['date'] = $j( _this.dateInput ).val().trim();

		var deed = _this.upload.deedChooser.deed;

		information['source'] = deed.getSourceWikiText();

		information['author'] = deed.getAuthorWikiText();
		
		var info = '';
		for ( var key in information ) {
			info += '|' + key + '=' + information[key] + "\n";	
		}	

		wikiText += "=={{int:filedesc}}==\n";

		wikiText += '{{Information\n' + info + '}}\n';

	
		wikiText += "=={{int:license-header}}==\n";
		
		wikiText += deed.getLicenseWikiText();

		// add a location template

		// add an "anything else" template if needed
		var otherInfoWikiText = $j( _this.otherInformationInput ).val().trim();
		if ( otherInfoWikiText != '' ) {
			wikiText += "=={{int:otherinfo}}==\n";
			wikiText += otherInfoWikiText;
		}

		return wikiText;	
	},

	/**
	 * Check if we are ready to post wikitext
	deedValid: function() {
		var _this = this;
		return _this.upload.deedChooser.deed.valid();

		// somehow, all the various issues discovered with this upload should be present in a single place
		// where we can then check on
		// perhaps as simple as _this.issues or _this.agenda
	},
	 */

	/**
	 * Post wikitext as edited here, to the file
	 * XXX This should be split up -- one part should get wikitext from the interface here, and the ajax call
	 * should be be part of upload
	 */
	submit: function( endCallback ) {
		var _this = this;


		// are we okay to submit?
		// all necessary fields are ready
		// check descriptions
		// the filename is in a sane state
		var desiredFilename = _this.filename;
		shouldRename = ( desiredFilename != _this.upload.title );

		// XXX check state of details for okayness ( license selected, at least one desc, sane filename )
		var wikiText = _this.getWikiText();
		mw.log( wikiText );
	
		var params = {
			action: 'edit',
			// XXX this is problematic, if the upload wizard is idle for a long time the token expires.
			// should obtain token just before uploading
			token: mw.getConfig( 'token' ),
			title: _this.upload.title,
			// section: 0, ?? causing issues?
			text: wikiText,
			summary: "User edited page with " + mw.UploadWizard.userAgent,
			// notminor: 1,
			// basetimestamp: _this.upload.imageinfo.timestamp,  ( conflicts? )
			nocreate: 1
		};

		var finalCallback = function() { 
			endCallback();
			_this.completeDetailsSubmission(); 
		};	

		mw.log( "editing!" );
		mw.log( params );
		var callback = function( result ) {
			mw.log( result );
			mw.log( "successful edit" );
			if ( shouldRename ) {
				_this.rename( desiredFilename, finalCallback );	
			} else {
				finalCallback();
			}
		};

		_this.upload.state = 'submitting-details';
		mw.getJSON( params, callback );
	},

	/**
	 * Rename the file
         *
	 *  THIS MAY NOT WORK ON ALL WIKIS. for instance, on Commons, it may be that only admins can move pages. This is another example of how
	 *  we need an "incomplete" upload status
	 *  we are presuming this File page is brand new, so let's not bother with the whole redirection deal. ('noredirect')
	 *
	 * use _this.ignoreWarningsInput (if it exists) to check if we can blithely move the file or if we have a problem if there
	 * is a file by that name already there
	 *
	 * @param filename to rename this file to
 	 */
	rename: function( title, endCallback ) {
		var _this = this;
		mw.log("renaming!");
		params = {
			action: 'move',
			from: _this.upload.title,
			to: title,
			reason: "User edited page with " + mw.UploadWizard.userAgent,
			movetalk: '',
			noredirect: '', // presume it's too new 
			token: mw.getConfig('token')
		};
		mw.log(params);
		// despite the name, getJSON magically changes this into a POST request (it has a list of methods and what they require).
		mw.getJSON( params, function( data ) {
			// handle errors later
			// possible error data: { code = 'missingtitle' } -- orig filename not there
			// and many more
	
			// which should match our request.
			// we should update the current upload filename
			// then call the uploadwizard with our progress

			// success is
			//  move =  from : ..., reason : ..., redirectcreated : ..., to : .... 
			if (data !== undefined && data.move !== undefined && data.move.to !== undefined) {
				_this.upload.title = data.move.to;
				_this.refreshImageInfo( _this.upload, _this.upload.title, endCallback );
			}
		} );
	},

	/** 
	 * Get new image info, for instance, after we renamed an image
	 *
	 * @param upload an UploadWizardUpload object
	 * @param title  title to look up remotely
	 * @param endCallback  execute upon completion
	 */
	refreshImageInfo: function( upload, title, endCallback ) {
		var params = {
                        'titles': title,
                        'prop':  'imageinfo',
                        'iiprop': 'timestamp|url|user|size|sha1|mime|metadata'
                };
		// XXX timeout callback?
		mw.getJSON( params, function( data ) {
			if ( data && data.query && data.query.pages ) {
				if ( ! data.query.pages[-1] ) {
					for ( var page_id in data.query.pages ) {
						var page = data.query.pages[ page_id ];
						if ( ! page.imageinfo ) {
							// not found? error
						} else {
							upload.extractImageInfo( page.imageinfo[0] );
						}
					}
				}	
			}
			endCallback();
		} );
	},

	completeDetailsSubmission: function() {
		var _this = this;
		_this.upload.state = 'complete';
		// de-spinnerize
		_this.upload.detailsProgress = 1.0;
	}
		
};


/**
 * Object that reperesents the entire multi-step Upload Wizard
 */
mw.UploadWizard = function() {

	this.uploads = [];

	// XXX need a robust way of defining default config 
	this.maxUploads = mw.getConfig( 'maxUploads' ) || 10;
	this.maxSimultaneousConnections = mw.getConfig( 'maxSimultaneousConnections' ) || 2;

};


mw.UploadWizard.userAgent = "UploadWizard (alpha)";


mw.UploadWizard.prototype = {
	stepNames: [ 'file', 'deeds', 'details', 'thanks' ],
	currentStepName: undefined,

	/*
	// list possible upload handlers in order of preference
	// these should all be in the mw.* namespace
	// hardcoded for now. maybe some registry system might work later, like, all
	// things which subclass off of UploadHandler
	uploadHandlers: [
		'FirefoggUploadHandler',
		'XhrUploadHandler',
		'ApiIframeUploadHandler',
		'SimpleUploadHandler',
		'NullUploadHandler'
	],

	 * We can use various UploadHandlers based on the browser's capabilities. Let's pick one.
	 * For example, the ApiUploadHandler should work just about everywhere, but XhrUploadHandler
	 *   allows for more fine-grained upload progress
	 * @return valid JS upload handler class constructor function
	getUploadHandlerClass: function() {
		// return mw.MockUploadHandler;
		return mw.ApiUploadHandler;
		var _this = this;
		for ( var i = 0; i < uploadHandlers.length; i++ ) {
			var klass = mw[uploadHandlers[i]];
			if ( klass != undefined && klass.canRun( this.config )) {
				return klass;
			}
		}
		// this should never happen; NullUploadHandler should always work
		return null;
	},
	*/

	/**
	 * Reset the entire interface so we can upload more stuff
	 * Depending on whether we split uploading / detailing, it may actually always be as simple as loading a URL
	 */
	reset: function() {
		window.location.reload();
	},

	
	/**
	 * create the basic interface to make an upload in this div
	 * @param div	The div in the DOM to put all of this into.
	 */
	createInterface: function( selector ) {
		var _this = this;
		var div = $j( selector ).get(0);
		// XXX move this to PHP
		div.innerHTML = 
			// begin css jello mold -- this allows layout to flex in size between a minimum and maximum
			// http://www.positioniseverything.net/articles/jello-expo.html
			// XXX including a style like this inline is a bit evil, but I wanted the rules + the IE-specific conditionals
			// to all be in one place. Perhaps better done with JS, then could be parameterized too.
			 '<style>'
		       + '#mwe-upwiz-jellobody { padding: 0 16em 0 16em; margin: 0; text-align: left; }'
		       + '#mwe-upwiz-jellosizer { margin: 0; padding: 0; width: 100%; max-width: 29em; }'
		       + '#mwe-upwiz-jelloexpander { margin: 0 -16em 0 -16em; min-width: 32em; position: relative; }'
		       + '#mwe-upwiz-jellofixer { width: 100%; margin: 0; padding: 0; }'
		       + '</style>'
		       + '<!--[if IE]>'
		       + '<style type="text/css">'
		       + '.mwe-upwiz-jellosizer { width:expression(document.body.clientWidth > 1004 ? "29em" : "100%" ); }'
		       + '</style>'
		       + '<![endif]-->'
		       + '<div id="mwe-upwiz-jellobody"><div id="mwe-upwiz-jellosizer"><div id="mwe-upwiz-jelloexpander"><div id="mwe-upwiz-jellofixer">'
			// end of CSS jello mold preamble

			// the arrow steps
		       + '<ul id="mwe-upwiz-steps">'
		       +   '<li id="mwe-upwiz-step-file"><div>' + gM('mwe-upwiz-step-file') + '</div></li>'
		       +   '<li id="mwe-upwiz-step-deeds"><div>'  + gM('mwe-upwiz-step-deeds')  + '</div></li>'
		       +   '<li id="mwe-upwiz-step-details"><div>'  + gM('mwe-upwiz-step-details')  + '</div></li>'
		       +   '<li id="mwe-upwiz-step-thanks"><div>'   + gM('mwe-upwiz-step-thanks')  +  '</div></li>'
		       + '</ul>'

			// the individual steps, all at once
		       + '<div id="mwe-upwiz-content">'

		       +   '<div class="mwe-upwiz-stepdiv ui-helper-clearfix" id="mwe-upwiz-stepdiv-file">'
		       +     '<div id="mwe-upwiz-intro">' + gM('mwe-upwiz-intro') + '</div>'
		       +     '<div id="mwe-upwiz-files">'
		       +       '<div id="mwe-upwiz-upload-ctrls" class="mwe-upwiz-file">'
		       +          '<div id="mwe-upwiz-add-file-container" class="mwe-upwiz-add-files-0">'
		       +            '<a id="mwe-upwiz-add-file">' + gM("mwe-upwiz-add-file-0") + '</a>'
		       +	  '</div>'
		       +          '<div id="proceed" class="mwe-upwiz-file-indicator">'
		       +          '</div>'
		       +       '</div>'
		       +       '<div id="mwe-upwiz-progress" class="ui-helper-clearfix"></div>'
		       +     '</div>'
		       +     '<div class="mwe-upwiz-buttons" style="display: none"/>'
		       +        '<button class="mwe-upwiz-button-next" />'
		       +     '</div>'
		       +   '</div>'

		       +   '<div class="mwe-upwiz-stepdiv" id="mwe-upwiz-stepdiv-deeds">'
		       +     '<div id="mwe-upwiz-deeds-intro"></div>'
		       +     '<div id="mwe-upwiz-deeds-thumbnails" class="ui-helper-clearfix"></div>'
		       +     '<div id="mwe-upwiz-deeds" class="ui-helper-clearfix"></div>'
		       +     '<div id="mwe-upwiz-deeds-custom" class="ui-helper-clearfix"></div>'
		       +     '<div class="mwe-upwiz-buttons"/>'
		       +        '<button class="mwe-upwiz-button-next" />'
		       +     '</div>'
                       +   '</div>'

		       +   '<div class="mwe-upwiz-stepdiv" id="mwe-upwiz-stepdiv-details">'
		       +     '<div id="mwe-upwiz-macro">'
		       +       '<div id="mwe-upwiz-macro-progress" class="ui-helper-clearfix"></div>'
		       +       '<div id="mwe-upwiz-macro-choice">' 
		       +  	 '<div>' + gM( 'mwe-upwiz-details-intro' ) + '</div>' 
		       +       '</div>'
		       +       '<div id="mwe-upwiz-macro-files"></div>'
		       +     '</div>'
		       +     '<div class="mwe-upwiz-buttons"/>'
		       +        '<button class="mwe-upwiz-button-next" />'
		       +     '</div>'
		       +   '</div>'

		       +   '<div class="mwe-upwiz-stepdiv" id="mwe-upwiz-stepdiv-thanks">'
		       +     '<div id="mwe-upwiz-thanks"></div>'
		       +     '<div class="mwe-upwiz-buttons"/>'
		       +        '<button class="mwe-upwiz-button-begin"></button>'
		       +        '<br/><button class="mwe-upwiz-button-home"></button>'
		       +     '</div>'		
                       +   '</div>'

		       + '</div>'

		       + '<div class="mwe-upwiz-clearing"></div>';
	
		       // end jellomold	
		       + '</div></div></div></div>'

		$j( '#mwe-upwiz-steps' )
			.addClass( 'ui-helper-clearfix ui-state-default ui-widget ui-helper-reset ui-helper-clearfix' )
			.arrowSteps();
 
		$j( '.mwe-upwiz-button-home' )
			.append( gM( 'mwe-upwiz-home' ) )
			.click( function() { window.location.href = '/' } );
		
		$j( '.mwe-upwiz-button-begin' )
			.append( gM( 'mwe-upwiz-upload-another' ) )
			.click( function() { _this.reset() } );
		


		// handler for next button
		$j( '#mwe-upwiz-stepdiv-file .mwe-upwiz-button-next')
			.append( gM( 'mwe-upwiz-next-file' ) )
			.click( function() {
			// check if there is an upload at all
			if ( _this.uploads.length === 0 ) {
				alert( gM( 'mwe-upwiz-file-need-file' ) );
				return;
			}

			_this.removeEmptyUploads();
			_this.startUploads( function() {  
			
				// okay all uploads are done, we're ready to go to the next step

				// do some last minute prep before advancing to the DEEDS page

				// these deeds are standard
				var deeds = [
					new mw.UploadWizardDeedOwnWork( _this.uploads.length ),
					new mw.UploadWizardDeedThirdParty( _this.uploads.length ),
				];
				
				// if we have multiple uploads, also give them the option to set 
				// licenses individually
				if ( _this.uploads.length > 1 ) {
					var customDeed = $j.extend( new mw.UploadWizardDeed(), {
						valid: function() { return true; },
						name: 'custom',
					} );
					deeds.push( customDeed );
				}

				_this.deedChooser = new mw.UploadWizardDeedChooser( 
					'#mwe-upwiz-deeds', 
					deeds,
					_this.uploads.length );
			
				$j( '<div>' ).html( gM( 'mwe-upwiz-deeds-macro-prompt', _this.uploads.length ) )
					.insertBefore ( _this.deedChooser.$selector.find( '.mwe-upwiz-deed-ownwork' ) );

				if ( _this.uploads.length > 1 ) {
					$j( '<div style="margin-top: 1em">' ).html( gM( 'mwe-upwiz-deeds-custom-prompt' ) ) 
						.insertBefore( _this.deedChooser.$selector.find( '.mwe-upwiz-deed-custom' ) );
				}

				
				_this.moveToStep( 'deeds' ); 

			} );		
		} );


		// DEEDS div

		$j( '#mwe-upwiz-deeds-intro' ).html( gM( 'mwe-upwiz-deeds-intro' ) );

		$j( '#mwe-upwiz-stepdiv-deeds .mwe-upwiz-button-next')
			.append( gM( 'mwe-upwiz-next-deeds' ) )
			.click( function() {
				// validate has the side effect of notifying the user of problems, or removing existing notifications.
				// if returns false, you can assume there are notifications in the interface.
				if ( _this.deedChooser.valid() ) {

					var lastUploadIndex = _this.uploads.length - 1; 

					$j.each( _this.uploads, function( i, upload ) {

						if ( _this.deedChooser.deed.name == 'custom' ) {
							upload.details.useCustomDeedChooser();
						} else {
							upload.deedChooser = _this.deedChooser;
						}

						/* put a border below every details div except the last */
						if ( i < lastUploadIndex ) {
							upload.details.div.css( 'border-bottom', '1px solid #e0e0e0' );
						}

						upload.details.titleInput.checkUnique();
					} );

					_this.moveToStep( 'details' );
				}
			} );


		// DETAILS div

		$j( '#mwe-upwiz-stepdiv-details .mwe-upwiz-button-next' )
			.append( gM( 'mwe-upwiz-next-details' ) )
			.click( function() {
				if ( _this.detailsValid() ) { 
					_this.detailsSubmit( function() { 
						_this.prefillThanksPage();
						_this.moveToStep( 'thanks' );
					} );
				}
			} );


	
		// WIZARD 
	
		// add one upload field to start (this is the big one that asks you to upload something)
		var upload = _this.newUpload( '#mwe-upwiz-add-file' );

		// "select" the first step - highlight, make it visible, hide all others
		_this.moveToStep( 'file', function() { 
			// XXX moving the file input doesn't seem to work at this point; we get its old position before
			// CSS is applied. Hence, using a timeout.
			// XXX using a timeout is lame, are there other options?
			// XXX Trevor suggests that using addClass() may queue stuff unnecessarily; use 'concrete' HTML
			setTimeout( function() {	
				upload.ui.moveFileInputToCover( '#mwe-upwiz-add-file' );
			}, 300 );
		} );

	},

	/**
	 * Advance one "step" in the wizard interface.
	 * It is assumed that the previous step to the current one was selected.
	 * We do not hide the tabs because this messes up certain calculations we'd like to make about dimensions, while elements are not 
	 * on screen. So instead we make the tabs zero height and, in CSS, they are already overflow hidden
	 * @param selectedStepName
	 * @param callback to do after layout is ready?
	 */
	moveToStep: function( selectedStepName, callback ) {
		var _this = this;
		$j.each( _this.stepNames, function(i, stepName) {
			
			// the step indicator	
			var step = $j( '#mwe-upwiz-step-' + stepName );
			
			// the step's contents
			var stepDiv = $j( '#mwe-upwiz-stepdiv-' + stepName );

			if ( _this.currentStepName == stepName ) {
				stepDiv.hide();
				// we hide the old stepDivs because we are afraid of some z-index elements that may interfere with later tabs
				// this will break if we ever allow people to page back and forth.
			} else {
				if ( selectedStepName == stepName ) {
					stepDiv.maskSafeShow();
				} else {
					stepDiv.maskSafeHide( 1000 );
				}
			}
			
		} );
			
		$j( '#mwe-upwiz-steps' ).arrowStepsHighlight( '#mwe-upwiz-step-' + selectedStepName );

		_this.currentStepName = selectedStepName;

		$j.each( _this.uploads, function(i, upload) {
			upload.state = selectedStepName;
		} );

		if ( callback ) {
			callback();
		}
	},

	/**
	 * add an Upload
	 *   we create the upload interface, a handler to transport it to the server,
	 *   and UI for the upload itself and the "details" at the second step of the wizard.
	 *   we don't yet add it to the list of uploads; that only happens when it gets a real file.
	 * @return boolean success
	 */
	newUpload: function() {
		var _this = this;
		if ( _this.uploads.length == _this.maxUploads ) {
			return false;
		}

		var upload = new mw.UploadWizardUpload( _this, '#mwe-upwiz-files' );
		_this.uploadToAdd = upload;

		upload.ui.moveFileInputToCover( '#mwe-upwiz-add-file' );
		// we bind to the ui div since unbind doesn't work for non-DOM objects

		$j( upload.ui.div ).bind( 'filenameAccepted', function(e) { _this.updateFileCounts();  e.stopPropagation(); } );
		$j( upload.ui.div ).bind( 'removeUploadEvent', function(e) { _this.removeUpload( upload ); e.stopPropagation(); } );
		$j( upload.ui.div ).bind( 'filled', function(e) { 
			_this.newUpload(); 
			_this.setUploadFilled(upload);
			e.stopPropagation(); 
		} );
		// XXX bind to some error state

	
		return upload;
	},

	/**
	 * When an upload is filled with a real file, accept it in the wizard's list of uploads
	 * and set up some other interfaces
	 * @param UploadWizardUpload
	 */
	setUploadFilled: function( upload ) {
		var _this = this;
		
		// XXX check if it has a file? 
		_this.uploads.push( upload );
		_this.updateFileCounts();
		
		upload.deedPreview = new mw.UploadWizardDeedPreview( upload );	

		// set up details
		upload.details = new mw.UploadWizardDetails( upload, $j( '#mwe-upwiz-macro-files' ));
	},


	/**
	 * Remove an upload from our array of uploads, and the HTML UI 
	 * We can remove the HTML UI directly, as jquery will just get the parent.
         * We need to grep through the array of uploads, since we don't know the current index. 
	 * We need to update file counts for obvious reasons.
	 *
	 * @param upload
	 */
	removeUpload: function( upload ) {
		var _this = this;
		// remove the div that passed along the trigger
		var $div = $j( upload.ui.div );
		$div.unbind(); // everything
		// sexily fade away
		$div.fadeOut('fast', function() { 
			$div.remove(); 
			// and do what we in the wizard need to do after an upload is removed
			mw.UploadWizardUtil.removeItem( _this.uploads, upload );
			_this.updateFileCounts();
		});
	},

	/**
	 * This is useful to clean out unused upload file inputs if the user hits GO.
	 * We are using a second array to iterate, because we will be splicing the main one, _this.uploads
	 */
	removeEmptyUploads: function() {
		var _this = this;
		var toRemove = [];

		for ( var i = 0; i < _this.uploads.length; i++ ) {
			if ( _this.uploads[i].ui.fileInputCtrl.value == "" ) {
				toRemove.push( _this.uploads[i] );
			}
		}

		for ( var i = 0; i < toRemove.length; i++ ) {
			toRemove[i].remove();
		}
	},

	/**
	 * Manage transitioning all of our uploads from one state to another -- like from "new" to "uploaded".
	 *
	 * @param beginState   what state the upload should be in before starting.
	 * @param progressState  the state to set the upload to while it's doing whatever 
	 * @param endState   the state to set the upload to after it's done whatever 
	 * @param starter	 function, taking single argument (upload) which starts the process we're interested in 
	 * @param endCallback    function to call when all uploads are in the end state.
	 */
	makeTransitioner: function( beginState, progressState, endState, starter, endCallback ) {
		
		var _this = this;

		var transitioner = function() {
			var uploadsToStart = _this.maxSimultaneousConnections;
			var endStateCount = 0;
			$j.each( _this.uploads, function(i, upload) {
				if ( upload.state == endState ) {
					endStateCount++;
				} else if ( upload.state == progressState ) {
					uploadsToStart--;
				} else if ( ( upload.state == beginState ) && ( uploadsToStart > 0 ) ) {
					starter( upload );
					uploadsToStart--;
				}
			} );

			// build in a little delay even for the end state, so user can see progress bar in a complete state.
			var nextAction = ( endStateCount == _this.uploads.length ) ? endCallback : transitioner;
	
			setTimeout( nextAction, _this.transitionerDelay );
		};

		transitioner();
	},

	transitionerDelay: 200,  // milliseconds


	/**
	 * Kick off the upload processes.
	 * Does some precalculations, changes the interface to be less mutable, moves the uploads to a queue, 
	 * and kicks off a thread which will take from the queue.
	 * @param endCallback   - to execute when uploads are completed
	 */
	startUploads: function( endCallback ) {
		var _this = this;
		// remove the upload button, and the add file button
		$j( '#mwe-upwiz-upload-ctrls' ).hide();
		$j( '#mwe-upwiz-add-file' ).hide();

		var allowCloseWindow = $j().preventCloseWindow( { 
			message: gM( 'mwe-prevent-close')
		} );


		var progressBar = new mw.GroupProgressBar( '#mwe-upwiz-progress', 
						           gM( 'mwe-upwiz-uploading' ), 
						           _this.uploads, 
						           'transported',  
							   'transportProgress', 
							   'transportWeight' );
		progressBar.start();
		

		// remove ability to change files
		// ideally also hide the "button"... but then we require styleable file input CSS trickery
		// although, we COULD do this just for files already in progress...

		// it might be interesting to just make this creational -- attach it to the dom element representing 
		// the progress bar and elapsed time	
		_this.makeTransitioner( 
			'new', 
			'transporting', 
			'transported', 
			function( upload ) {
				upload.start();
			},
		        function() {
				allowCloseWindow();
				$j().notify( gM( 'mwe-upwiz-files-complete' ) );
				endCallback();
		  	} 
		);
	},

	
	
	/**
	 * Occurs whenever we need to update the interface based on how many files there are 
	 * Thhere is an uncounted upload, waiting to be used, which has a fileInput which covers the
	 * "add an upload" button. This is absolutely positioned, so it needs to be moved if another upload was removed.
	 * The uncounted upload is also styled differently between the zero and n files cases
	 */
	updateFileCounts: function() {
		var _this = this;

		if ( _this.uploads.length ) {
			$j( '#mwe-upwiz-upload-ctrl' ).removeAttr( 'disabled' ); 
			$j( '#proceed' ).show();
			$j( '#mwe-upwiz-stepdiv-file .mwe-upwiz-buttons' ).show();
			$j( '#mwe-upwiz-add-file' ).html( gM( 'mwe-upwiz-add-file-n' ) );
			$j( '#mwe-upwiz-add-file-container' ).removeClass('mwe-upwiz-add-files-0');
			$j( '#mwe-upwiz-add-file-container' ).addClass('mwe-upwiz-add-files-n');
			$j( '#mwe-upwiz-files .mwe-upwiz-file.filled:odd' ).addClass( 'odd' );
			$j( '#mwe-upwiz-files .mwe-upwiz-file:filled:even' ).removeClass( 'odd' );
		} else {
			$j( '#mwe-upwiz-upload-ctrl' ).attr( 'disabled', 'disabled' ); 
			$j( '#proceed' ).hide();
			$j( '#mwe-upwiz-stepdiv-file .mwe-upwiz-buttons' ).hide();
			$j( '#mwe-upwiz-add-file' ).html( gM( 'mwe-upwiz-add-file-0' ) );
			$j( '#mwe-upwiz-add-file-container' ).addClass('mwe-upwiz-add-files-0');
			$j( '#mwe-upwiz-add-file-container' ).removeClass('mwe-upwiz-add-files-n');
		}

		if ( _this.uploads.length < _this.maxUploads ) {
			$j( '#mwe-upwiz-add-file' ).removeAttr( 'disabled' );
			$j( _this.uploadToAdd.ui.div ).show();
			_this.uploadToAdd.ui.moveFileInputToCover( '#mwe-upwiz-add-file' );
		} else {
			$j( '#mwe-upwiz-add-file' ).attr( 'disabled', true );
			$j( _this.uploadToAdd.ui.div ).hide();
		}


	},


	/**
	 * are all the details valid?
	 * @return boolean
	 */ 
	detailsValid: function() {
		var _this = this;
		var valid = true;
		$j.each( _this.uploads, function(i, upload) { 
			valid &= upload.details.valid();
		} );
		return valid;
	},

	/**
	 * Submit all edited details and other metadata
	 * Works just like startUploads -- parallel simultaneous submits with progress bar.
	 */
	detailsSubmit: function( endCallback ) {
		var _this = this;
		// some details blocks cannot be submitted (for instance, identical file hash)
		_this.removeBlockedDetails();

		// XXX validate all 

		// remove ability to edit details
		$j.each( _this.uploads, function( i, upload ) {
			upload.details.div.mask();
			upload.details.div.data( 'mask' ).loadingSpinner();
		} );

		// add the upload progress bar, with ETA
		// add in the upload count 
		_this.makeTransitioner(
			'details', 
			'submitting-details', 
			'complete', 
			function( upload ) {
				upload.details.submit( function() { 
					upload.details.div.data( 'mask' ).html() 
				} );
			},
			endCallback
		);
	},

	/**
	 * Removes(?) details that we can't edit for whatever reason -- might just advance them to a different state?
	 */
	removeBlockedDetails: function() {
		// TODO	
	},


	prefillThanksPage: function() {
		var _this = this;
		
		$j( '#mwe-upwiz-thanks' )
			.append( $j( '<h3 style="text-align: center;">' ).append( gM( 'mwe-upwiz-thanks-intro' ) ),
				 $j( '<p style="margin-bottom: 2em; text-align: center;">' )
					.append( gM( 'mwe-upwiz-thanks-explain', _this.uploads.length ) ) );
		
		$j.each( _this.uploads, function(i, upload) {
			var thanksDiv = $j( '<div class="mwe-upwiz-thanks ui-helper-clearfix" />' );
			_this.thanksDiv = thanksDiv;
			
			var thumbnailDiv = $j( '<div class="mwe-upwiz-thumbnail mwe-upwiz-thumbnail-side"></div>' )
			upload.setThumbnail( thumbnailDiv );
			thumbnailDiv.append( $j('<p/>').append( 
						$j( '<a />' )
							.attr( { target: '_new', 
								 href: upload.imageinfo.descriptionurl } )
							.text( upload.title ) 
					) );

			thanksDiv.append( thumbnailDiv );

			var thumbWikiText = "[[" + upload.title + "|thumb|Add caption here]]";

			thanksDiv.append(
				$j( '<div class="mwe-upwiz-data"></div>' )
					.append( 
						$j('<p/>').append( 
							gM( 'mwe-upwiz-thanks-wikitext' ),
							$j( '<br />' ),
						 	$j( '<textarea class="mwe-long-textarea" rows="2"/>' )
								.growTextArea()
								.readonly()
								.append( thumbWikiText ) 
								.trigger('resizeEvent')
						),
						$j('<p/>').append( 
							gM( 'mwe-upwiz-thanks-url' ),
							$j( '<br />' ),
						 	$j( '<textarea class="mwe-long-textarea" rows="2"/>' )
								.growTextArea()
								.readonly()
								.append( upload.imageinfo.descriptionurl ) 
								.trigger('resizeEvent')
						)
					)
			);

			$j( '#mwe-upwiz-thanks' ).append( thanksDiv );
		} ); 
	},

	/**
	 *
	 */
	pause: function() {

	},

	/**
	 *
	 */
	stop: function() {

	}
};


mw.UploadWizardDeedPreview = function(upload) {
	this.upload = upload;
};

mw.UploadWizardDeedPreview.prototype = {
	setup: function() {
		var _this = this;
		// add a preview on the deeds page
		var thumbnailDiv = $j( '<div class="mwe-upwiz-thumbnail-small"></div>' );
		$j( '#mwe-upwiz-deeds-thumbnails' ).append( thumbnailDiv );
		_this.upload.setThumbnail( thumbnailDiv, mw.getConfig( 'smallThumbnailWidth' ) );
	}
};

mw.UploadWizardNullDeed = $j.extend( new mw.UploadWizardDeed(), {
	valid: function() {
		return false;
	} 
} );

	
/**
 * Set up the form and deed object for the deed option that says these uploads are all the user's own work.
 * XXX these deeds are starting to turn into jquery fns
 */
mw.UploadWizardDeedOwnWork = function( uploadCount ) {
	uploadCount = uploadCount ? uploadCount : 1;

	var _this = new mw.UploadWizardDeed();

	_this.authorInput = $j( '<input />')
		.attr( { name: "author", type: "text" } )
		.addClass( 'mwe-upwiz-sign' );

	var licenseInputDiv = $j( '<div class="mwe-upwiz-deed-license"></div>' );
	_this.licenseInput = new mw.UploadWizardLicenseInput( licenseInputDiv );
	_this.licenseInput.setDefaultValues();

	return $j.extend( _this, { 

		name: 'ownwork',

		/**
		 * Is this correctly set, with side effects of causing errors to show in interface. 
		 * @return boolean true if valid, false if not
		 */
		valid: function() {
			return _this.$form.valid() && _this.licenseInput.valid();
		},

		getSourceWikiText: function() {
			return '{{own}}';
		},

		// XXX do we need to escape authorInput, or is wikitext a feature here?
		// what about scripts?
		getAuthorWikiText: function() {
			return "[[User:" + mw.getConfig('userName') + '|' + $j( _this.authorInput ).val() + ']]';
		},


		getLicenseWikiText: function() {
			var wikiText = '{{self';
			$j.each( _this.licenseInput.getTemplates(), function( i, template ) {
				wikiText += '|' + template;
			} );
			wikiText += '}}';
			return wikiText;
		},

		setFormFields: function( $selector ) {
			_this.$selector = $selector;

			_this.$form = $j( '<form/>' );
			var $standardDiv, $customDiv;

			var $standardDiv = $j( '<div />' ).append(
				$j( '<label for="author2" generated="true" class="mwe-error" style="display:block;"/>' ),
				$j( '<p>' )
					.html( gM( 'mwe-upwiz-source-ownwork-assert',
						   uploadCount,
						   '<span class="mwe-standard-author-input"></span>' )
					),
				$j( '<p class="mwe-small-print" />' ).append( gM( 'mwe-upwiz-source-ownwork-assert-note' ) )
			); 
			$standardDiv.find( '.mwe-standard-author-input' ).append( $j( '<input name="author2" type="text" class="mwe-upwiz-sign" />' ) );
			
			var $customDiv = $j('<div/>').append( 
				$j( '<label for="author" generated="true" class="mwe-error" style="display:block;"/>' ),
				$j( '<p>' )
					.html( gM( 'mwe-upwiz-source-ownwork-assert-custom', 
						uploadCount,
						'<span class="mwe-custom-author-input"></span>' ) ),
				licenseInputDiv
			);
			// have to add the author input this way -- gM() will flatten it to a string and we'll lose it as a dom object
			$customDiv.find( '.mwe-custom-author-input' ).append( _this.authorInput );


			var $crossfader = $j( '<div>' ).append( $standardDiv, $customDiv );
			var $toggler = $j( '<p class="mwe-more-options" style="text-align: right" />' )
				.append( $j( '<a />' )
					.append( gM( 'mwe-upwiz-license-show-all' ) )
					.click( function() {
						_this.formValidator.resetForm();
						if ( $crossfader.data( 'crossfadeDisplay' ) === $customDiv ) {
							_this.licenseInput.setDefaultValues();
							$crossfader.morphCrossfade( $standardDiv );
							$j( this ).html( gM( 'mwe-upwiz-license-show-all' ) )
						} else {
							$crossfader.morphCrossfade( $customDiv );
							$j( this ).html( gM( 'mwe-upwiz-license-show-recommended' ) )
						}
					} ) );

			var $formFields = $j( '<div class="mwe-upwiz-deed-form-internal" />' )
				.append( $crossfader, $toggler );
			

			// synchronize both username signatures
			// set initial value to configured username
			// if one changes all the others change (keyup event)
			//
			// also set tooltips ( the title, tipsy() )
			$formFields.find( '.mwe-upwiz-sign' )
				.attr( {
					title: gM( 'mwe-upwiz-tooltip-sign' ), 
					value: mw.getConfig( 'userName' ) 
				} )
				.tipsyPlus()
				.keyup( function() { 
					var thisInput = this;
					var thisVal = $j( thisInput ).val();
					$j.each( $formFields.find( '.mwe-upwiz-sign' ), function( i, input ) {
						if (thisInput !== input) {
							$j( input ).val( thisVal );
						}
					} );
				} );

			_this.$form.append( $formFields );
			$selector.append( _this.$form );
			
			// done after added to the DOM, so there are true heights
			$crossfader.morphCrossfader();


			// and finally, make it validatable
			_this.formValidator = _this.$form.validate( {
				rules: {
					author2: {
						required: function( element ) {
							return $crossfader.data( 'crossfadeDisplay' ).get(0) === $standardDiv.get(0);
						},
						minlength: mw.getConfig( 'minAuthorLength' ),
						maxlength: mw.getConfig( 'maxAuthorLength' )
					},
					author: {
						required: function( element ) {
							return $crossfader.data( 'crossfadeDisplay' ).get(0) === $customDiv.get(0);
						},
						minlength: mw.getConfig( 'minAuthorLength' ),
						maxlength: mw.getConfig( 'maxAuthorLength' )
					}
				},
				messages: {
					author2: {
						required: gM( 'mwe-upwiz-error-signature-blank' ),
						minlength: gM( 'mwe-upwiz-error-signature-too-short', mw.getConfig( 'minAuthorLength' ) ),
						maxlength: gM( 'mwe-upwiz-error-signature-too-long', mw.getConfig( 'maxAuthorLength' ) )
					},
					author: {
						required: gM( 'mwe-upwiz-error-signature-blank' ),
						minlength: gM( 'mwe-upwiz-error-signature-too-short', mw.getConfig( 'minAuthorLength' ) ),
						maxlength: gM( 'mwe-upwiz-error-signature-too-long', mw.getConfig( 'maxAuthorLength' ) )
					}
				}
			} );
		}


	} );

};

// XXX these deeds are starting to turn into jquery fns
mw.UploadWizardDeedThirdParty = function( uploadCount ) {
	var _this = new mw.UploadWizardDeed();

	_this.uploadCount = uploadCount ? uploadCount : 1;
	_this.sourceInput = $j('<textarea class="mwe-source mwe-long-textarea" name="source" rows="1" cols="40"></textarea>' )
				.growTextArea()
				.attr( 'title', gM( 'mwe-upwiz-tooltip-source' ) )
				.tipsyPlus();
	_this.authorInput = $j('<textarea class="mwe-author mwe-long-textarea" name="author" rows="1" cols="40"></textarea>' )
				.growTextArea()
				.attr( 'title', gM( 'mwe-upwiz-tooltip-author' ) )
				.tipsyPlus();
	licenseInputDiv = $j( '<div class="mwe-upwiz-deed-license"></div>' );
	_this.licenseInput = new mw.UploadWizardLicenseInput( licenseInputDiv );


	return $j.extend( _this, mw.UploadWizardDeed.prototype, {
		name: 'thirdparty',

		setFormFields: function( $selector ) {
			var _this = this;
			_this.$form = $j( '<form/>' );

			var $formFields = $j( '<div class="mwe-upwiz-deed-form-internal"/>' );

			if ( uploadCount > 1 ) { 
				$formFields.append( $j( '<div />' ).append( gM( 'mwe-upwiz-source-thirdparty-custom-multiple-intro' ) ) );
			}

			$formFields.append (
				$j( '<div class="mwe-upwiz-source-thirdparty-custom-multiple-intro" />' ),
				$j( '<label for="source" generated="true" class="mwe-error" style="display:block;"/>' ),
				$j( '<div class="mwe-upwiz-thirdparty-fields" />' )
					.append( $j( '<label for="source"/>' ).text( gM( 'mwe-upwiz-source' ) ), 
						 _this.sourceInput ),
				$j( '<label for="author" generated="true" class="mwe-error" style="display:block;"/>' ),
				$j( '<div class="mwe-upwiz-thirdparty-fields" />' )
					.append( $j( '<label for="author"/>' ).text( gM( 'mwe-upwiz-author' ) ),
						 _this.authorInput ),
				$j( '<div class="mwe-upwiz-thirdparty-license" />' )
					.append( gM( 'mwe-upwiz-source-thirdparty-license', uploadCount ) ),
				licenseInputDiv
			);

			_this.$form.validate( {
				rules: {
					source: { required: true, 
						  minlength: mw.getConfig( 'minSourceLength' ),
						  maxlength: mw.getConfig( 'maxSourceLength' ) },
					author: { required: true,
						  minlength: mw.getConfig( 'minAuthorLength' ),
						  maxlength: mw.getConfig( 'maxAuthorLength' ) },
				},
				messages: {
					source: {
						required: gM( 'mwe-upwiz-error-blank' ),
						minlength: gM( 'mwe-upwiz-error-too-short', mw.getConfig( 'minSourceLength' ) ),
						maxlength: gM( 'mwe-upwiz-error-too-long', mw.getConfig( 'maxSourceLength' ) )
					},
					author: {
						required: gM( 'mwe-upwiz-error-blank' ),
						minlength: gM( 'mwe-upwiz-error-too-short', mw.getConfig( 'minAuthorLength' ) ),
						maxlength: gM( 'mwe-upwiz-error-too-long', mw.getConfig( 'maxAuthorLength' ) )
					}
				}
			} );

			_this.$form.append( $formFields );			

			$selector.append( _this.$form );
		},

		valid: function() {
			return  this.$form.valid() & this.licenseInput.valid();
		}
	} );
}




/**
 * @param selector where to put this deed chooser
 * @param isPlural whether this chooser applies to multiple files (changes messaging mostly)
 */ 
mw.UploadWizardDeedChooser = function( selector, deeds, uploadCount ) {
	var _this = this;
	_this.$selector = $j( selector );
	_this.uploadCount = uploadCount ? uploadCount : 1;
	

	_this.$errorEl = $j( '<div class="mwe-error"></div>' );
	_this.$selector.append( _this.$errorEl );

	// name for radio button set
	_this.name = 'deedChooser' + (mw.UploadWizardDeedChooser.prototype.widgetCount++).toString();

	$j.each( deeds, function (i, deed) {
		var id = _this.name + '-' + deed.name;
 
		var $deedInterface = $j( 
			'<div class="mwe-upwiz-deed mwe-upwiz-deed-' + deed.name + '">'
		       +   '<div class="mwe-upwiz-deed-option-title">'
		       +     '<span class="mwe-upwiz-deed-header">'
		       +        '<input id="' + id +'" name="' + _this.name + '" type="radio" value="' + deed.name + '">'
		       +	  '<label for="' + id + '" class="mwe-upwiz-deed-name">'
		       +            gM( 'mwe-upwiz-source-' + deed.name, _this.uploadCount )
		       +          '</label>'
		       +        '</input>'
		       +     '</span>'
		       // +     ' <a class="mwe-upwiz-macro-deeds-return">' + gM( 'mwe-upwiz-change' ) + '</a>'
		       +   '</div>'
		       +   '<div class="mwe-upwiz-deed-form">'
		       + '</div>'
		);

		var $deedSelector = _this.$selector.append( $deedInterface );

		deed.setFormFields( $deedInterface.find( '.mwe-upwiz-deed-form' ) );

		$deedInterface.find( 'span.mwe-upwiz-deed-header input' ).click( function() {
			if ( $j( this ).is(':checked' )  ) {
				_this.choose( deed );
				_this.showDeed( $deedInterface );
			}
		} );

	} );

	/*
	$j( '.mwe-upwiz-macro-deeds-return' ).click( function() { 
		_this.choose( mw.UploadWizardNullDeed );
		_this.showDeedChoice(); 
	} );
	*/

	_this.choose( mw.UploadWizardNullDeed );
	_this.showDeedChoice();		
	

};


mw.UploadWizardDeedChooser.prototype = {

	/** 
	 * How many deed choosers there are (important for creating unique ids, element names)
	 */
	widgetCount: 0,

	/** 
	 * Check if this form is filled out correctly, with side effects of showing error messages if invalid
	 * @return boolean; true if valid, false if not
	 */
	valid: function() {
		var _this = this;
		// we assume there is always a deed available, even if it's just the null deed.
		var valid = _this.deed.valid();
		// the only time we need to set an error message is if the null deed is selected.
		// otherwise, we can assume that the widgets have already added error messages.
		if (valid) {
			_this.hideError();
		} else {
			if ( _this.deed === mw.UploadWizardNullDeed ) {			
				_this.showError( gM( 'mwe-upwiz-deeds-need-deed', _this.uploadCount ) );
				$j( _this ).bind( 'chooseDeed', function() {
					_this.hideError();
				} );
			}
		}
		return valid;
	},

	showError: function( error ) {
		this.$errorEl.html( error );
		this.$errorEl.fadeIn();
	},

	hideError: function() {
		this.$errorEl.fadeOut();	
		this.$errorEl.empty();
	},

	/** 
 	 * How many uploads this deed controls
	 */
	uploadCount: 0,

	
	// XXX it's impossible to choose the null deed if we stick with radio buttons, so that may be useless later
	choose: function( deed ) {
		var _this = this;
		_this.deed = deed;
		if ( deed === mw.UploadWizardNullDeed ) {
			$j( _this ).trigger( 'chooseNullDeed' );
			//_this.trigger( 'isNotReady' );
			_this.$selector
				.find( 'input.mwe-accept-deed' )
				.attr( 'checked', false )
		} else {
			$j( _this ).trigger( 'chooseDeed' );
		}
	},

	/**
	 * Go back to original source choice. 
	 */
	showDeedChoice: function() {
		var $allDeeds = this.$selector.find( '.mwe-upwiz-deed' );
		this.deselectDeed( $allDeeds );
		// $allDeeds.fadeTo( 'fast', 1.0 );   //maskSafeShow();
	},

	/** 
	 * From the deed choices, make a choice fade to the background a bit, hide the extended form
	 */
	deselectDeed: function( $deedSelector ) {
		$deedSelector.removeClass( 'selected' );
		// $deedSelector.find( 'a.mwe-upwiz-macro-deeds-return' ).hide();
		$deedSelector.find( '.mwe-upwiz-deed-form' ).slideUp( 500 );   //.maskSafeHide();
	},

	/**
	 * From the deed choice page, show a particular deed
	 */
	showDeed: function( $deedSelector ) {
		var $otherDeeds = $deedSelector.siblings().filter( '.mwe-upwiz-deed' );
		this.deselectDeed( $otherDeeds );
		// $siblings.fadeTo( 'fast', 0.5 ) // maskSafeHide();

		$deedSelector
			.addClass('selected')
			.fadeTo( 'fast', 1.0 )
			.find( '.mwe-upwiz-deed-form' ).slideDown( 500 ); // maskSafeShow(); 
		// $deedSelector.find( 'a.mwe-upwiz-macro-deeds-return' ).show();
	},

};



/**
 * Miscellaneous utilities
 */
mw.UploadWizardUtil = {

	/**
	 * Simple 'more options' toggle that opens more of a form.
	 *
	 * @param toggleDiv the div which has the control to open and shut custom options
	 * @param moreDiv the div containing the custom options
	 */
	makeToggler: function ( toggleDiv, moreDiv ) {
		var $toggleLink = $j( '<a>' )
		   	.addClass( 'mwe-upwiz-toggler mwe-upwiz-more-options' )
			.append( gM( 'mwe-upwiz-more-options' ) );
		$j( toggleDiv ).append( $toggleLink );


		var toggle = function( open ) {
			if ( typeof open === 'undefined' ) {
				open = ! ( $j( this ).data( 'open' ) ) ;
			}
			$j( this ).data( 'open', open );
			if ( open ) {
				moreDiv.maskSafeShow();
				/* when open, show control to close */
				$toggleLink.html( gM( 'mwe-upwiz-fewer-options' ) );
				$toggleLink.addClass( "mwe-upwiz-toggler-open" );
			} else {
				moreDiv.maskSafeHide();
				/* when closed, show control to open */
				$toggleLink.html( gM( 'mwe-upwiz-more-options' ) );
				$toggleLink.removeClass( "mwe-upwiz-toggler-open" );
			}
		};

		toggle(false);

		$toggleLink.click( function( e ) { e.stopPropagation(); toggle(); } );
		
		$j( moreDiv ).addClass( 'mwe-upwiz-toggled' );
	},

	/**
	 * remove an item from an array. Tests for === identity to remove the item
	 *  XXX the entire rationale for this file may be wrong. 
	 *  XXX The jQuery way would be to query the DOM for objects, not to keep a separate array hanging around
	 * @param items  the array where we want to remove an item
	 * @param item	 the item to remove
	 */
	removeItem: function( items, item ) {
		for ( var i = 0; i < items.length; i++ ) {
			if ( items[i] === item ) {
				items.splice( i, 1 );
				break;
			}
		}
	},

	/** 
	 * Capitalise first letter and replace spaces by underscores
	 * @param filename (basename, without directories)
	 * @return typical title as would appear on MediaWiki
	 */
	pathToTitle: function ( filename ) {
		return mw.ucfirst( $j.trim( filename ).replace(/ /g, '_' ) );
	},

	/** 
	 * Capitalise first letter and replace underscores by spaces
	 * @param title typical title as would appear on MediaWiki
	 * @return plausible local filename, with spaces changed to underscores.
	 */
	titleToPath: function ( title ) {
		return mw.ucfirst( $j.trim( title ).replace(/_/g, ' ' ) );
	},

	/** 
 	 * Slice extension off a path
	 * We assume that extensions are 1-4 characters in length
	 * @param path to file, like "foo/bar/baz.jpg"
	 * @return extension, like ".jpg" or undefined if it doesn't look lke an extension.
	 */
	getExtension: function( path ) {
		var extension = undefined;
		var idx = path.lastIndexOf( '.' );
		if (idx > 0 && ( idx > ( path.length - 5 ) ) && ( idx < ( path.length - 1 ) )  ) {
			extension = path.substr( idx + 1 ).toLowerCase();
		}
		return extension;
	},

	/**
	 * Last resort to guess a proper extension
	 */
	mimetypeToExtension: {
		'image/jpeg': 'jpg',
		'image/gif': 'gif'
		// fill as needed
	}


};

/**
 * Upper-case the first letter of a string. XXX move to common library
 * @param string
 * @return string with first letter uppercased.
 */
mw.ucfirst = function( s ) {
	return s.substring(0,1).toUpperCase() + s.substr(1);
};



/**
 * jQuery extension. Makes a textarea automatically grow if you enter overflow
 * (This feature was in the old Commons interface with a confusing arrow icon; it's nicer to make it automatic.)
 */
jQuery.fn.growTextArea = function( options ) {

	// this is a jquery-style object

	// in MSIE, this makes it possible to know what scrollheight is 
	// Technically this means text could now dangle over the edge, 
	// but it shouldn't because it will always grow to accomodate very quickly.

	if ($j.msie) {
		this.each( function(i, textArea) {
			textArea.style.overflow = 'visible';
		} );
	}

	var resizeIfNeeded = function() {
		// this is the dom element
		// is there a better way to do this?
		if (this.scrollHeight >= this.offsetHeight) {
			this.rows++;
			while (this.scrollHeight > this.offsetHeight) {
				this.rows++;	
			}
		}
		return this;
	};

	this.addClass( 'mwe-grow-textarea' );

	this.bind( 'resizeEvent', resizeIfNeeded );
	
	this.keyup( resizeIfNeeded );
	this.change( resizeIfNeeded );


	return this;
};

jQuery.fn.mask = function( options ) {

	// intercept clicks... 
	// Note: the size of the div must be obtainable. Hence, this cannot be a div without layout (e.g. display:none).
	// some of this is borrowed from http://code.google.com/p/jquery-loadmask/ , but simplified
	$j.each( this, function( i, el ) {
		
		if ( ! $j( el ).data( 'mask' ) ) {
			

			//fix for z-index bug with selects in IE6
			if ( $j.browser.msie && $j.browser.version.substring(0,1) === '6' ){
				el.find( "select" ).addClass( "masked-hidden" );
			}

			var mask = $j( '<div />' )
					.css( { 'position' : 'absolute',
						'top'      : '0px', 
						'left'     : '0px',
						'width'	   : el.offsetWidth + 'px',
						'height'   : el.offsetHeight + 'px',
						'z-index'  : 100 } )
					.click( function( e ) { e.stopPropagation(); } );

			$j( el ).css( { 'position' : 'relative' } )	
				.fadeTo( 'fast', 0.5 )
				.append( mask )
				.data( 'mask', mask );

			//auto height fix for IE -- not sure about this, i think offsetWidth + Height is a better solution. Test!
			/*
			if( $j.browser.msie ) {
				mask.height(el.height() + parseInt(el.css("padding-top")) + parseInt(el.css("padding-bottom")));
				mask.width(el.width() + parseInt(el.css("padding-left")) + parseInt(el.css("padding-right")));
			}
			*/

		} 

		// XXX bind to a custom event in case the div size changes : ?

	} );

	return this;

};

jQuery.fn.unmask = function( options ) {

	$j.each( this, function( i, el ) {
		if ( $j( el ).data( 'mask' ) ) {
			var mask = $j( el ).data( 'mask' );
			$j( el ).removeData( 'mask' ); // from the data
			mask.remove(); // from the DOM
			$j( el ).fadeTo( 'fast', 1.0 );
		}
	} );

	
	return this;
};


/** 
 * Safe hide and show
 * Rather than use display: none, this collapses the divs to zero height
 * This is good because then the elements in the divs still have layout and we can do things like mask and unmask (above)
 * XXX may be obsolete as we are not really doing this any more
 * disable form fields so we do not tab through them when hidden
 * XXX for some reason the disabling doesn't work with the date field.
 */ 

jQuery.fn.maskSafeHide = function( options ) {
	$j.each( this.find( ':enabled' ), function(i, input) {
		$j( input ).data( 'wasEnabled', true )
			   .attr( 'disabled', 'disabled' );
	} );
	return this.css( { 'height' : '0px', 'overflow' : 'hidden' } );
};

// may be causing scrollbar to appear when div changes size
// re-enable form fields (disabled so we did not tab through them when hidden)
jQuery.fn.maskSafeShow = function( options ) {
	$j.each( this.find( ':disabled' ), function (i, input) {
		if ($j( input ).data( 'wasEnabled' )) {
			$j( input ).removeAttr( 'disabled' )
				   .removeData( 'wasEnabled' ); 
		}
	} );
	return this.css( { 'height' : 'auto', 'overflow' : 'visible' } );
};


( function( $j ) {

	$j.fn.tipsyPlus = function( options ) {
		// use extend!
		var titleOption = 'title';
		var htmlOption = false;

		var options = $j.extend( 
			{ type: 'help', shadow: true },
			options
		);

		var el = this;

		if (options.plus) {
			htmlOption = true;
			titleOption = function() {
				return $j( '<span />' ).append(
					$j( this ).attr( 'original-title' ),
					$j( '<a class="mwe-upwiz-tooltip-link"/>' )
						.attr( 'href', '#' )
						.append( gM( 'mwe-upwiz-tooltip-more-info' ) )
						.mouseenter( function() {
							el.data('tipsy').sticky = true;
						} )
						.mouseleave( function() {
							el.data('tipsy').sticky = false;
						} )
						.click( function() {
							// show the wiki page with more
							alert( options.plus );
							// pass this in as a closure to be called on dismiss
							el.focus();
							el.data('tipsy').sticky = false;
						} )
				);
			};
		}

		return this.tipsy( { 
			gravity: 'w', 
			trigger: 'focus',
			title: titleOption,
			html: htmlOption,
			type: options.type,
			shadow: options.shadow
		} );

	};

	/**
	 * Create 'remove' control, an X which highlights in some standardized way.
	 */
	$j.fn.removeCtrl = function( tooltipMsgKey, callback ) {
		return $j( '<div class="mwe-upwiz-remove-ctrl ui-corner-all" />' )
			.attr( 'title', gM( tooltipMsgKey ) )
			.click( callback )
			.hover( function() { $j( this ).addClass( 'hover' ); },
				function() { $j( this ).removeClass( 'hover' ); } )
			.append( $j( '<span class="ui-icon ui-icon-close" />' ) );
	};

	/**
	 * Prevent the closing of a window with a confirm message (the onbeforeunload event seems to 
	 * work in most browsers 
	 * e.g.
	 *       var allowCloseWindow = jQuery().preventCloseWindow( { message: "Don't go away!" } );
	 *       // ... do stuff that can't be interrupted ...
	 *       allowCloseWindow();
	 *
	 * @param options 	object which should have a message string, already internationalized
	 * @return closure	execute this when you want to allow the user to close the window
	 */
	$j.fn.preventCloseWindow = function( options ) {
		if ( typeof options === 'undefined' ) {
			options = {};
		}

		if ( typeof options.message === 'undefined' ) {
			options.message = 'Are you sure you want to close this window?';
		}
		
		$j( window ).unload( function() { 
			return options.message;
		} );
		
		return function() { 
			$j( window ).removeAttr( 'unload' );
		};
				
	};


	$j.fn.notify = function ( message ) {
		// could do something here with Chrome's in-browser growl-like notifications.
		// play a sound?
		// if the current tab does not have focus, use an alert?
		// alert( message );
	};

	$j.fn.enableNextButton = function() {
		return this.find( '.mwe-upwiz-button-next' )
			.removeAttr( 'disabled' );
		//	.effect( 'pulsate', { times: 3 }, 1000 );
	};

	$j.fn.disableNextButton = function() {
		return this.find( '.mwe-upwiz-button-next' )
			.attr( 'disabled', true );
	};

	$j.fn.readonly = function() {
		return this.css( 'background', '#ffffff' ).attr( 'readonly', 'readonly' );
	};

	$j.fn.requiredFieldLabel = function() {
		return this.addClass( 'mwe-upwiz-required-field' ).prepend(' * ');
	};

} )( jQuery );
