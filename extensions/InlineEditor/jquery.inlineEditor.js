/**
 * Client side framework of the InlineEditor. Facilitates publishing, previewing,
 * using specific editors, and undo/redo operations.
 */
( function( $ ) { $.inlineEditor = {
editors: {},

states: [],
currentState: 0,
lastState: 0,

/**
 * Adds the initial state from the current HTML and a wiki string.
 */
addInitialState: function( state ) {
	$.inlineEditor.currentState = 0;
	$.inlineEditor.states[$.inlineEditor.currentState] = { 
		'object': state.object,
		'texts': state.texts,
		'html': $( '#editContent' ).html()
	};
},

/**
 * Returns wikitext in the current state given an ID.
 */
getTextById: function( id ) {
	return $.inlineEditor.states[$.inlineEditor.currentState].texts[id];
},

/**
 * Previews given a new text for a given field by ID.
 */
previewTextById: function( text, id ) {
	// send out an AJAX request which will be handled by addNewState()
	var data = {
			'object': $.inlineEditor.states[$.inlineEditor.currentState].object,
			'lastEdit': { 'id': id, 'text': text }
	};
	
	var args = [ JSON.stringify( data ), wgPageName ];
	sajax_request_type = 'POST';
	sajax_do_call( 'InlineEditor::ajaxPreview', args, $.inlineEditor.addNewState );
},

/**
 * Adds a new state from an AJAX request.
 */
addNewState: function( request ) {
	state = JSON.parse( request.responseText );
	
	// restore the html to the current state, instantly remove the lastEdit,
	// and then add the new html
	$( '#editContent' ).html( $.inlineEditor.states[$.inlineEditor.currentState].html );
	$( '.lastEdit' ).removeClass( 'lastEdit' );
	$( '#' + state.partialHtml.id ).replaceWith( state.partialHtml.html );
	
	// add the new state
	$.inlineEditor.currentState += 1;
	$.inlineEditor.states[$.inlineEditor.currentState] = { 
		'object': state.object,
		'texts': state.texts,
		'html': $( '#editContent' ).html()
	};
	
	// clear out all states after the current state, because undo/redo would be broken
	var i = $.inlineEditor.currentState + 1;
	while( i <= $.inlineEditor.lastState ) {
		delete $.inlineEditor.states[i];
		i += 1;
	}
	$.inlineEditor.lastState = $.inlineEditor.currentState;
	
	// reload the current editor and update the edit counter
	$.inlineEditor.reload();
	$.inlineEditor.updateEditCounter();
},

/**
 * Reloads the current editor and finish some things in the HTML.
 */
reload: function() {
	$.inlineEditor.basicEditor.cancelAll();
	
	// bind all events of the basic editor
	$.inlineEditor.basicEditor.bindEvents( $( '.inlineEditorElement' ) );
	
	// reload the specific editors
	for( var optionNr in $.inlineEditor.editors) {
		$.inlineEditor.editors[optionNr].reload();
	}
	
	// remove all lastEdit elements
	$('.lastEdit').removeClass( 'lastEdit' );
	
	// make the links in the article unusable
	$( '#editContent a' ).click( function( event ) { event.preventDefault(); } );
},

/**
 * Moves back one state.
 */
undo: function( event ) {
	event.stopPropagation();
	event.preventDefault();
	
	// check if we can move backward one state and do it
	if( $.inlineEditor.currentState > 0 ) {
		$.inlineEditor.currentState -= 1;
		$( '#editContent' ).html( $.inlineEditor.states[$.inlineEditor.currentState].html );
		$.inlineEditor.reload();
	}
	
	// refresh the edit counter regardless of actually switching, this confirms
	// that the button works, even if there is nothing to switch to
	$.inlineEditor.updateEditCounter();
},

/**
 * Moves forward one state.
 */
redo: function( event ) {
	event.stopPropagation();
	event.preventDefault();
	
	// check if we can move forward one state and do it
	if( $.inlineEditor.currentState < $.inlineEditor.lastState ) {
		$.inlineEditor.currentState += 1;
		$('#editContent').html( $.inlineEditor.states[$.inlineEditor.currentState].html );
		$.inlineEditor.reload();
	}
	
	// refresh the edit counter regardless of actually switching, this confirms
	// that the button works, even if there is nothing to switch to
	$.inlineEditor.updateEditCounter();
},

/**
 * Updates the edit counter and makes it flash.
 */
updateEditCounter: function() {
	// update the value of the edit counter
	var $editCounter = $( '#editCounter' );
	$editCounter.text( '#' + $.inlineEditor.currentState );
	
	// remove everything from the editcounter, and have it fade again
	$editCounter.removeClass( 'changeHighlight' );
	$editCounter.attr( 'style', '' );
	$editCounter.addClass( 'changeHighlight' );
	$editCounter.removeClass( 'changeHighlight', 200 );
},

/**
 * Publishes the document in its current state.
 */
publish: function( event ) {
	event.stopPropagation();
	event.preventDefault();
	
	// get the wikitext from the state as it's currently on the screen
	var data = {
			'object': $.inlineEditor.states[$.inlineEditor.currentState].object
	};
	var json = JSON.stringify( data );
	
	// set and send the form
	$( '#json' ).val( json );
	$( '#editForm' ).submit();
},

/**
 * Initializes the editor.
 */
init : function() {
	$( '#publish' ).click( $.inlineEditor.publish );
	//$( '#undo' ).click( $.inlineEditor.undo );
	//$( '#redo' ).click( $.inlineEditor.redo );
	
	// reload the current editor
	$.inlineEditor.reload();
}

}; } ) ( jQuery );