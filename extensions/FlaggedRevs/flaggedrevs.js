/* -- (c) Aaron Schulz, Daniel Arnold 2008 */

/* Every time you change this JS please bump $wgFlaggedRevStyleVersion in FlaggedRevs.php */

var FlaggedRevs = {
	/* Hide rating clutter */
	'enableShowhide': function() {
		var toggle = document.getElementById('mw-revisiontoggle');
		if( !toggle ) return;
		toggle.style.display = 'inline';
		var ratings = document.getElementById('mw-revisionratings');
		if( !ratings ) return;
		ratings.style.display = 'none';
	},
	
	/* Toggles ratings */
	'toggleRevRatings': function() {
		var ratings = document.getElementById('mw-revisionratings');
		if( !ratings ) return;
		if( ratings.style.display == 'none' ) {
			ratings.style.display = 'inline';
		} else {
			ratings.style.display = 'none';
		}
	},
	
	/*
	* a) Disable submit in case of invalid input.
	* b) Update colors when select changes (Opera already does this).
	* c) Also remove comment box clutter in case of invalid input.
	*/
	'updateRatingForm': function() {
		var ratingform = document.getElementById('mw-ratingselects');
		if( !ratingform ) return;
		var disabled = document.getElementById('fr-rating-controls-disabled');
		if( disabled ) return;
	
		var quality = true;
		var allzero = true;
		var somezero = false;
	
		for( tag in wgFlaggedRevsParams.tags ) {
			var controlName = "wp" + tag;
			var levels = document.getElementsByName(controlName);
			if( !levels.size ) continue;
			var selectedlevel = 0; // default
	
			if( levels[0].nodeName == 'SELECT' ) {
				selectedlevel = levels[0].selectedIndex;
				// Update color. Opera does this already, and doing so
				// seems to kill custom pretty opera skin form styling.
				if( navigator.appName != 'Opera') {
					value = levels[0].getElementsByTagName('option')[selectedlevel].value;
					levels[0].className = 'fr-rating-option-' + value;
				}
			} else if( levels[0].type == 'radio' ) {
				for( i = 0; i < levels.length; i++ ) {
					if( levels[i].checked ) {
						selectedlevel = i;
						break;
					}
				}
			} else if( levels[0].type == 'checkbox' ) {
				selectedlevel = (levels[0].checked) ? 1: 0;
			} else {
				return; // error: should not happen
			}
	
			// Get quality level for this tag
			qualityLevel = wgFlaggedRevsParams.tags[tag];
	
			if( selectedlevel < qualityLevel ) {
				quality = false; // not a quality review
			}
			if( selectedlevel > 0 ) {
				allzero = false;
			} else {
				somezero = true;
			}
		}
		// Show note box only for quality revs
		var notebox = document.getElementById('mw-notebox');
		if( notebox ) {
			notebox.style.display = quality ? 'inline' : 'none';
		}
		// If only a few levels are zero, don't show submit link
		var submit = document.getElementById('mw-submitreview');
		if( submit ) {
			submit.disabled = ( somezero && !allzero ) ? 'disabled' : '';
		}
		// Clear note box data if not shown
		var notes = document.getElementById('wpNotes');
		if( notes ) {
			notes.value = quality ? notes.value : '';
		}
	}
};

addOnloadHook(FlaggedRevs.enableShowhide);
addOnloadHook(FlaggedRevs.updateRatingForm);

// dependencies:
// * ajax.js:
  /*extern sajax_init_object, sajax_do_call */
// * wikibits.js:
  /*extern hookEvent, jsMsg */
// These should have been initialized in the generated js
if( typeof wgAjaxReview === "undefined" || !wgAjaxReview ) {
	wgAjaxReview = {
		sendMsg: "Submit",
		sendingMsg: "Submitting...",
		flagMsg: "Mark reviewed",
		unflagMsg: "Mark unreviewed",
		titleFlagMsg: "revreview-tt-review",
		titleUnflagMsg: "revreview-tt-unreview",
		actioncomplete: "Action complete",
		actionfailed: "Action failed"
	};
}

wgAjaxReview.supported = true; // supported on current page and by browser
wgAjaxReview.inprogress = false; // ajax request in progress
wgAjaxReview.timeoutID = null; // see wgAjaxReview.ajaxCall

wgAjaxReview.ajaxCall = function() {
	if( !wgAjaxReview.supported ) {
		return true;
	} else if( wgAjaxReview.inprogress ) {
		return false;
	}
	if( !wfSupportsAjax() ) {
		// Lazy initialization so we don't toss up
		// ActiveX warnings on initial page load
		// for IE 6 users with security settings.
		wgAjaxReview.supported = false;
		return true;
	}
	var form = document.getElementById("mw-reviewform");
	var notes = document.getElementById("wpNotes");
	var reason = document.getElementById("wpReason");
	if( !form ) {
		return false;
	}
	wgAjaxReview.inprogress = true;
	// Build up arguments
	var args = [];
	var inputs = form.getElementsByTagName("input");
	for( var i=0; i < inputs.length; i++) {
		// Different input types may occur depending on tags...
		if( inputs[i].name == "title" || inputs[i].name == "action" ) {
			// No need to send these...
		} else if( inputs[i].type == "submit" ) {
			inputs[i].value = wgAjaxReview.sendingMsg;
		} else if( inputs[i].type == "checkbox" ) {
			args.push( inputs[i].name + "|" + (inputs[i].checked ? inputs[i].value : 0) );
		} else if( inputs[i].type != "radio" || inputs[i].checked ) {
			args.push( inputs[i].name + "|" + inputs[i].value );
		}
		inputs[i].disabled = "disabled";
	}
	if( notes ) {
		args.push( notes.name + "|" + notes.value );
		notes.disabled = "disabled";
	}
	var selects = form.getElementsByTagName("select");
	for( var i=0; i < selects.length; i++) {
		// Get the selected tag level...
		if( selects[i].selectedIndex >= 0 ) {
			var soption = selects[i].getElementsByTagName("option")[selects[i].selectedIndex];
			args.push( selects[i].name + "|" + soption.value );
		}
		selects[i].disabled = "disabled";
	}
	// Send!
	var old = sajax_request_type;
	sajax_request_type = "POST";
	sajax_do_call( "RevisionReview::AjaxReview", args, wgAjaxReview.processResult );
	sajax_request_type = old;
	// If the request isn't done in 30 seconds, allow user to try again
	wgAjaxReview.timeoutID = window.setTimeout(
		function() { wgAjaxReview.inprogress = false; wgAjaxReview.unlockForm(); },
		30000
	);
	return false;
};

wgAjaxReview.unlockForm = function() {
	var form = document.getElementById("mw-reviewform");
	var submit = document.getElementById("mw-submitreview");
	var notes = document.getElementById("wpNotes");
	var reason = document.getElementById("wpReason");
	if( !form || !submit ) {
		return false;
	}
	submit.disabled = "";
	var inputs = form.getElementsByTagName("input");
	for( var i=0; i < inputs.length; i++) {
		inputs[i].disabled = "";
	}
	if( notes ) {
		notes.disabled = "";
	}
	if( reason ) {
		reason.disabled = "";
	}
	var selects = form.getElementsByTagName("select");
	for( var i=0; i < selects.length; i++) {
		selects[i].disabled = "";
	}
	return true;
};

wgAjaxReview.processResult = function(request) {
	if( !wgAjaxReview.supported ) {
		return;
	}
	var response = request.responseText;
	if( (msg = response.substr(6)) ) {
		jsMsg( msg, 'review' ); // success notice
		window.scroll(0,0); // scroll up to notice
		tagBox = document.getElementById('mw-revisiontag');
		if( tagBox ) tagBox.style.display = 'none'; // remove tag from draft
	}
	wgAjaxReview.inprogress = false;
	if( wgAjaxReview.timeoutID ) {
		window.clearTimeout(wgAjaxReview.timeoutID);
	}
	var submit = document.getElementById("mw-submitreview");
	var binaryState = document.getElementById("mw-reviewstate");
	var legend = document.getElementById("mw-reviewformlegend");
	var diffNotice = document.getElementById("mw-difftostable");
	// On success...
	if( response.indexOf('<suc#>') == 0 ) {
		document.title = wgAjaxReview.actioncomplete;
		if( submit ) {
			// If flagging is just binary, flip the form
			if( binaryState ) {
				binaryState.value = (binaryState.value ==1 ) ? 0 : 1;
				// Revision was unflagged - switch to flagging form
				if( binaryState.value == 1 ) {
					legend.innerHTML = '<strong>'+wgAjaxReview.flagLegMsg+'</strong>';
					submit.value = wgAjaxReview.flagMsg;
				// Revision was flagged - switch to unflagging form
				} else {
					legend.innerHTML = '<strong>'+wgAjaxReview.unflagLegMsg+'</strong>';
					submit.value = wgAjaxReview.unflagMsg;
				}
			} else {
				submit.value = wgAjaxReview.sendMsg; // back to normal
			}
		}
		// Hide "review this" box on diffs
		if( diffNotice ) diffNotice.style.display = 'none';
	// On failure...
	} else {
		document.title = wgAjaxReview.actionfailed;
		if( submit ) {
			if( binaryState ) {
				submit.value = binaryState.value ?
					wgAjaxReview.flagMsg : wgAjaxReview.unflagMsg; // back to normal
			} else {
				submit.value = wgAjaxReview.sendMsg;
			}
		}
	}
	wgAjaxReview.unlockForm();
};

wgAjaxReview.onLoad = function() {
	var submit = document.getElementById("mw-submitreview");
	if( submit ) {
		submit.onclick = wgAjaxReview.ajaxCall;
	}
};

hookEvent("load", wgAjaxReview.onLoad);
