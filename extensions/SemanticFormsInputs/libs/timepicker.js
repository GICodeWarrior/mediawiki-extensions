/**
 * Javascript code to be used with input type timepicker.
 *
 * @author Stephan Gambke
 * @version 0.4 alpha
 *
 */

/**
 * Initializes a timepicker input
 *
 * @param inputID (String) the id of the input to initialize
 * @param minTime (String) the minimum time to be shown (format hh:mm)
 * @param maxTime (String) the maximum time to be shown (format hh:mm)
 * @param interval (String) the interval between selectable times in minutes
 * @param format (String) a format string (unused) (do we even need it?)
 *
 */
function SFI_TP_init( inputID, minTime, maxTime, interval, format ) {

	// sanitize inputs
	re = /^\d+:\d\d$/;

	if ( re.test( minTime ) ) {

		min = minTime.split( ':', 2 );
		minh = Number( min[0] );
		minm = Number( min[1] );

		if ( minm > 59 ) minm = 59;

	} else {
		minh = 0;
		minm = 0;
	}

	if ( re.test( maxTime ) ) {

		max = maxTime.split( ':', 2 );
		maxh = Number( max[0] );
		maxm = Number( max[1] );

		if ( maxm > 59 ) maxm = 59;

	} else {
		maxh = 23;
		maxm = 59;
	}

	interv = Number( interval );
	
	if ( interv < 1 ) interv = 1;
	else if ( interv > 60 ) interv = 60;

	// build html structure
	sp = jQuery( "<span class='SFI_timepicker' id='" + inputID + "_tree' ></span>" ).insertAfter( "#" + inputID );

	ulh = jQuery( "<ul>" ).appendTo( sp );


	for ( h = minh; h <= maxh; ++h ) {

		lih = jQuery( "<li class='ui-state-default'>" + ( ( h < 10 ) ? "0" : "" ) + h + "</li>" ).appendTo( ulh );

		//TODO: Replace value for "show" by formatted string
		lih
		.data( "value", ( ( h < 10 ) ? "0" : "" ) + h + ":00" )
		.data( "show", ( ( h < 10 ) ?"0" : "" ) + h + ":00" );

		ulm = jQuery( "<ul>" ).appendTo( lih );

		for ( m = ( (h == minh) ? minm : 0 ) ; m <= ( (h == maxh) ? maxm : 59 ); m += interv ) {

			lim = jQuery( "<li class='ui-state-default'>" + ( ( m < 10 ) ? "0" : "" ) + m  + "</li>" ).appendTo( ulm );

			//TODO: Replace value for "show" by formatted string
			lim
			.data( "value", ( ( h < 10 ) ? "0" : "" ) + h + ":" + ( ( m < 10 ) ? "0" : "") + m )
			.data( "show", ( ( h < 10 ) ? "0" : "") + h + ":" + ( ( m < 10 ) ? "0" : "" ) + m );

		}

	}

	// initially hide everything
	jQuery("#" + inputID + "_tree ul")
	.hide();

	// attach event handlers
	jQuery("#" + inputID + "_tree li") // hours
	.mouseover(function(evt){

		// clear any timeout that may still run on the last list item
		clearTimeout(jQuery(evt.currentTarget).data("timeout"));

		jQuery(evt.currentTarget)

		// switch classes to change display style
		.removeClass("ui-state-default")
		.addClass("ui-state-hover")

		// set timeout to show minutes for selected hour
		.data("timeout", setTimeout(
			function(){
				//console.log("mouseover timer " + jQuery(evt.currentTarget).text());
				jQuery(evt.currentTarget).children().fadeIn();
			},400));

	});

	jQuery("#" + inputID + "_tree li") // hours
	.mouseout(function(evt){

		// clear any timeout that may still run on this jQuery list item
		clearTimeout(jQuery(evt.currentTarget).data("timeout"));

		jQuery(evt.currentTarget)

		// switch classes to change display style
		.removeClass("ui-state-hover")
		.addClass("ui-state-default")

		// hide minutes after a short pause
		.data("timeout", setTimeout(
			function(){
				//console.log("mouseout timer " + jQuery(evt.currentTarget).text());
				jQuery(evt.currentTarget).children().fadeOut();
			},400));

	});

	jQuery("#" + inputID + "_tree li") // hours, minutes
	.mousedown(function(){
		// set values and leave input
		jQuery("#" + inputID + "_show").attr("value", jQuery(this).data("show")).blur();
		jQuery("#" + inputID ).attr("value", jQuery(this).data("value"));
		return false;
	});

	// show timepicker when input gets focus
	jQuery("#" + inputID + "_show").focus(function() {
		jQuery("#" + inputID + "_tree>ul").fadeIn();
    });

	// hide timepicker when input loses focus
	jQuery("#" + inputID + "_show").blur(function() {
		jQuery("#" + inputID + "_tree ul").fadeOut();
	});

	jQuery("#" + inputID + "_show").change(function() {
		jQuery("#" + inputID ).attr("value", jQuery(this).attr("value"));
	});

}