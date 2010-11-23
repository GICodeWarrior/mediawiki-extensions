/*
 * Script for Article Feedback (beta)
 */

$.fn.articleFeedback = function() {
	$(this).each( function() {
		var context = $(this).data( 'context' );
		if ( !context || typeof context == 'undefined' ) {
			context = {
				$ui = $(this);
			};
			// Setup user interface
			$ui.append(  );
			// Save context
			$(this).data( 'wikiEditor-context', context );
		}
		// Proceed with handling input
	} );
	return $(this);
}

$.articleFeedback = {
	/*
	function updateSubmitButton() {
		$( '.af-ui-drawer-form-submit button' )
			.attr( 'disabled', !$ui.find( '.af-ui-form-rating-control[state=new]' ).length );
	}
	function setClassesFromRadios() {
		$(this).find( 'input:radio:checked' ).each( function() {
			var $label = $ui.find( 'label[for=' + $(this).attr( 'id' ) + ']' );
			$label.prevAll( 'label' ).add( $label ).addClass( 'af-ui-form-rating-control-selected' );
			$label.nextAll( 'label' ).removeClass( 'af-ui-form-rating-control-selected' );
		} );
	}

	$ui.find( '.af-ui-drawer[rel=form] label' ).hover(
		function() {
			$(this).prevAll( 'label' ).add( $(this) ).addClass( 'af-ui-form-rating-control-selected' );
			$(this).nextAll( 'label' ).removeClass( 'af-ui-form-rating-control-selected' );
		},
		function() {
			$(this).prevAll( 'label' ).add( $(this) ).removeClass( 'af-ui-form-rating-control-selected' );
		}
	);
	$ui.find( '.af-ui-form-rating-control' )
		.each( function() {
			var $radio = $(this).find( 'input:radio:checked' );
			$(this).data( 'initial', {
				'state': $(this).attr( 'state' ),
				'value': $radio.length ? $radio.val() : 0
			} )
			setClassesFromRadios.call( $(this) );
		} )
		.hover(
			function() {
				$(this).data( 'state', $(this).attr( 'state' ) );
				$(this).attr( 'state', 'new' );
			},
			function() {
				$(this).attr( 'state', $(this).data( 'state' ) );
				setClassesFromRadios.call( $(this) )
			}
		);
	$ui.find( '.af-ui-form-rating-control input:radio' ).click( function() {
		$(this).closest( '.af-ui-form-rating-control' ).data( 'state', 'new' );
		updateSubmitButton();
	} );
	$ui.find( '.af-ui-drawer-form-clear a' )
		.click( function( e ) {
			$ui.find( '.af-ui-drawer[rel=form] input:radio' ).attr( 'checked', false );
			$ui.find( '.af-ui-form-rating-control label' )
				.removeClass( 'af-ui-form-rating-control-selected' );
			$ui.find( '.af-ui-form-rating-control' ).attr( 'state', 'new' );
			updateSubmitButton();
			e.preventDefault();
			return false;
		} )
		.mousedown( function( e ) {
			e.preventDefault();
			return false;
		} );
	$ui.find( '.af-ui-drawer-form-reset a' )
		.click( function( e ) {
			$ui.find( '.af-ui-form-rating-control' ).each( function() {
				$(this).attr( 'state', $(this).data( 'initial' ).state );
				if ( $(this).data( 'initial' ).value ) {
					$(this).find( 'input:radio[value=' + $(this).data( 'initial' ).value + ']' )
						.attr( 'checked', true );
				} else {
					$(this).find( 'input:radio' ).attr( 'checked', false );
				}
				setClassesFromRadios.call( $(this) )
			} );
			updateSubmitButton();
			e.preventDefault();
			return false;
		} )
		.mousedown( function( e ) {
			e.preventDefault();
			return false;
		} );
	$ui.find( '.af-ui-handle' ).click( function( e ) {
		var drawers = {
			'from': $ui.find( '.af-ui-drawer[rel!=' + $(this).attr( 'rel' ) +']' ),
			'to': $ui.find( '.af-ui-drawer[rel=' + $(this).attr( 'rel' ) +']' )
		};
		var handles = {
			'from': $ui.find( '.af-ui-handle[rel=' + $(this).attr( 'rel' ) +']' ),
			'to': $ui.find( '.af-ui-handle[rel!=' + $(this).attr( 'rel' ) +']' )
		};
		for ( d in drawers ) {
			drawers[d].css( 'overflow', 'hidden' );
		}
		drawers.from.animate( { 'width': 'hide' }, 'fast', function() {
			$(this).css( 'overflow', 'visible' );
		} );
		drawers.to.animate( { 'width': 'show' }, 'fast', function() {
			$(this).css( 'overflow', 'visible' );
		} );
		handles.from.hide();
		handles.to.show();
		e.preventDefault();
		return false;
	} );
	$( '.af-ui-form-rating-label a, .af-ui-drawer-chart-bar-label a' )
		.tipsy( { 'gravity': 'sw', 'opacity': 1, 'delayIn': 100, 'delayOut': 200 } )
		.bind( 'click mousedown', function( e ) {
			e.preventDefault();
			return false;
		} );
	updateSubmitButton();
	*/
};

// Activation
$( '#catlinks' ).before( $( '<div></div>' ).articleFeedback() );
