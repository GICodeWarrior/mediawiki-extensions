/**
 * Provides a basic editor with preview and cancel functionality.
 */
( function( $ ) { $.inlineEditor.basicEditor = {
	
	/**
	 * Creates a new hovering edit field.
	 */
	newField: function( $field, originalClickEvent ) {
		// create a new field
		var $newField = $( '<' + $field.get(0).nodeName + '/>' );
		$newField.addClass( 'editing' );
		
		// position the field floating on the page, at the same position the original field
		$newField.css( 'top', $field.position().top );
		
		// point to the original field using jQuery data 
		$newField.data( 'orig', $field );
		
		// make sure click and mousemove events aren't passed on
		$newField.click( function( event ) { event.stopPropagation(); } );
		$newField.mousemove( function( event ) { event.stopPropagation(); } );
		
		// add the field after the current field in code
		$field.after( $newField );
		return $newField;
	},
	
	/**
	 * Adds an edit bar to the field with preview and cancel functionality.
	 */
	addEditBar: function( $newSpan, wiki ) {
		// build the input field
		var $input = $( '<textarea></textarea>' );
		$input.text( wiki );
		
		// build preview and cancel buttons and add click events
		var $preview = $( '<input type="button" value="Preview" class="preview"/>' );
		var $cancel = $( '<input type="button" value="Cancel" class="cancel"/>' );
		$preview.click( $.inlineEditor.basicEditor.preview );
		$cancel.click( $.inlineEditor.basicEditor.cancel );
		
		// build a div for the buttons
		var $buttons = $( '<div class="buttons"></div> ');
		$buttons.append( $preview );
		$buttons.append( $cancel );
		
		// build the edit bar from the input field and buttons
		var $editBar = $( '<div class="editbar"></div>' );
		$editBar.append( $input );
		$editBar.append( $buttons );
		
		// append the edit bar to the new span
		$newSpan.append( $editBar );
		
		// automatically resize the textarea using the Elastic plugin
		$input.elastic();
		
		// focus on the input so you can start typing immediately
		$input.focus();
		
		return $editBar;
	},
	
	/**
	 * Default click handler for simple editors. Recommended to override.
	 */
	click: function( event ) {
		var $field = $(this);
		
		if( $field.hasClass( 'nobar' ) || event.pageX - $field.offset().left < 10 ) {
			// prevent clicks from reaching other elements
			event.stopPropagation();
			event.preventDefault();
		
			// disable the existing editing field if necessary
			$.inlineEditor.basicEditor.cancelAll();
			
			// find the element and retrieve the corresponding wikitext
			var wiki = $.inlineEditor.getTextById( $field.attr( 'id' ) );
			
			// create the edit field and build the edit bar
			var $newField = $.inlineEditor.basicEditor.newField( $field, $.inlineEditor.basicEditor.click );
			$.inlineEditor.basicEditor.addEditBar( $newField, wiki );
		}
	},
	
	/**
	 * Cancels the current edit operation.
	 */
	cancel: function( event ) {
		// prevent clicks from reaching other elements
		event.stopPropagation();
		event.preventDefault();
		
		// find the outer span, three parents above the buttons
		var $span = $(this).parent().parent().parent();
		
		// find the span with the original value
		var $orig = $span.data( 'orig' );
		
		// convert the span to it's original state
		$orig.removeClass( 'orig' );
		$orig.removeClass( 'hover' );
		
		// place the original span after the current span and remove the current span
		$span.after( $orig );
		$span.remove();
		
		// reload the editor to fix stuff that might or might not be broken
		$.inlineEditor.reload();
	},
	
	/**
	 * Previews the current edit operation.
	 */
	preview: function( event ) {
		// prevent clicks from reaching other elements
		event.stopPropagation();
		event.preventDefault();
		
		// find the span with class 'editbar', two parent above the buttons
		var $editbar = $(this).parent().parent();
		
		// the element is one level above the editbar
		var $element = $editbar.parent(); 
		
		// add a visual indicator to show the preview is loading 
		$element.addClass( 'saving' );
		var $overlay = $( '<div class="overlay"><div class="alpha"></div><img class="spinner" src="' + wgScriptPath + '/extensions/InlineEditor/ajax-loader.gif"/></div>' );
		$editbar.after( $overlay );
		
		// get the edited text and the id to save it to
		var text = $editbar.children( 'textarea' ).val();
		var id   = $element.data( 'orig' ).attr( 'id' );
		
		// let the inlineEditor framework handle the preview
		$.inlineEditor.previewTextById( text, id );
	},
	
	/**
	 * Cancel all basic editors.
	 */
	cancelAll: function() {
		$('.editing').find('.cancel').click();
	},
	
	/**
	 * Bind all required events.
	 */
	bindEvents: function( $elements ) {
		$elements.unbind();
		$elements.click( $.inlineEditor.basicEditor.click );
		$elements.mousemove( $.inlineEditor.basicEditor.mouseMove );
		$elements.mouseleave( $.inlineEditor.basicEditor.mouseLeave );
	},
	
	/**
	 * Do a javascript hover on the bars at the left.
	 */
	mouseMove: function( event ) {
		var $field = $( this );
		if( $field.hasClass( 'bar' ) ) {
			if( event.pageX - $field.offset().left < 10 ) {
				$field.addClass( 'hover' );
			}
			else {
				$field.removeClass( 'hover' );
			}
		}
	},
	
	/**
	 * Remove the hover class when leaving the element.
	 */
	mouseLeave: function( event ) {
		var $field = $( this );
		if( $field.hasClass( 'bar' ) ) {
			$field.removeClass( 'hover' );
		}
	}

}; } ) ( jQuery );
