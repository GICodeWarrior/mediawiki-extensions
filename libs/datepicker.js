/**
 * Javascript code to be used with input type datepicker.
 *
 * @author Stephan Gambke
 * @version 0.4 alpha
 *
 */

function SFI_DP_init ( input_id, params ) {

	var input = jQuery("#" + input_id + "_show");

	input.datepicker( {
		"showOn": "both", 
		"buttonImage": params.buttonImage,
		"buttonImageOnly": false, 
		"changeMonth": true, 
		"changeYear": true, 
		"altFormat": "yy/mm/dd", 
		// Today button does not work (http://dev.jqueryui.com/ticket/4045)
		// do not show button panel for now
		// TODO: show date picker button panel when bug is fixed
		"showButtonPanel": false, 
		"firstDay": params.firstDay,
		"showWeek": params.showWeek,
		"dateFormat": params.dateFormat,
		"altField": "#" + input_id,
		"beforeShowDay": function (date) {return SFI_DP_checkDate("#" + input_id + "_show", date);}
	} );

	if ( params.minDate ) {
		input.datepicker( "option", "minDate",
			jQuery.datepicker.parseDate("yy/mm/dd", params.minDate, null) );
	}

	if ( params.maxDate ) {
		input.datepicker( "option", "maxDate",
			jQuery.datepicker.parseDate("yy/mm/dd", params.maxDate, null) );
	}

	if ( params.userClass ) {
		input.datepicker("widget").addClass( params.userClass );
		jQuery("#" + input_id + "_show + button").addClass( params.userClass );
	}

	if ( params.disabledDates ) {

		var disabledDates = params.disabledDates.map(function(range) {
			return [new Date(range[0], range[1], range[2]), new Date(range[3], range[4], range[5])]
		});

		input.datepicker("option", "disabledDates", disabledDates);
	}

	if ( params.highlightedDates ) {

		var highlightedDates = params.highlightedDates.map(function(range) {
			return [new Date(range[0], range[1], range[2]), new Date(range[3], range[4], range[5])]
		});

		input.datepicker("option", "highlightedDates", highlightedDates);
	}

	if (params.disabledDays) {
		input.datepicker("option", "disabledDays", params.disabledDays);
	}

	if (params.highlightedDays) {
		input.datepicker("option", "highlightedDays", params.highlightedDays);
	}

	//input.datepicker("option", "beforeShowDay", function (date) {return SFI_DP_checkDate("#" + input_id + "_show", date);});

	try {

		var re = /\d{4}\/\d{2}\/\d{2}/
		if ( ! re.test( params.currValue ) ) {
			throw "Wrong date format!";
		}
		input.datepicker( "setDate", jQuery.datepicker.parseDate( "yy/mm/dd", params.currValue, null ) );
		
	} catch (e) {
		input.attr( "value", params.currValue );
		jQuery( "#" + input_id).attr( "value", params.currValue );
	}

}

/**
 * Checks a date if it is to be enabled or highlighted
 *
 * This function is a callback function given to the jQuery datepicker to be
 * called for every date before it is displayed.
 *
 * @param input the input the datepicker works on
 * @param date the date object that is to be displayed
 * @return Array(Boolean enabled, Boolean highlighted, "") determining the style and behaviour
 */
function SFI_DP_checkDate( input, date ) {

	var enable = true

	var disabledDates = jQuery( input ).datepicker( "option", "disabledDates" );

	if ( disabledDates ) {
		for ( i = 0; i < disabledDates.length; ++i ) {
			if ( (date >= disabledDates[i][0] ) && ( date <= disabledDates[i][1] ) ) {
				enable = false;
				break;
			}
		}
	}

	var disabledDays = jQuery( input ).datepicker( "option", "disabledDays" );

	if ( disabledDays ) {
		enable = enable && !disabledDays[ date.getDay() ];
	}

	var highlightedDates = jQuery( input ).datepicker( "option", "highlightedDates" );
	var highlight = "";

	if ( highlightedDates ) {
		for ( var i = 0; i < highlightedDates.length; ++i ) {
			if ( ( date >= highlightedDates[i][0] ) && ( date <= highlightedDates[i][1] ) ) {
				highlight = "ui-state-highlight";
				break;
			}
		}
	}

	var highlightedDays = jQuery( input ).datepicker( "option", "highlightedDays" );

	if ( highlightedDays ) {
		if ( highlightedDays[ date.getDay() ] ) {
			highlight = "ui-state-highlight";
		}
	}

	return [ enable, highlight, "" ];
}

