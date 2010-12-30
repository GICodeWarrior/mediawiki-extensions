/**
 * Javascript code to be used with input type datepicker.
 *
 * @author Stephan Gambke
 * @version 0.4 alpha
 *
 */

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

	enable = true

	disabledDates = jQuery( input ).datepicker( "option", "disabledDates" );

	if ( disabledDates ) {
		for ( i = 0; i < disabledDates.length; ++i ) {
			if ( (date >= disabledDates[i][0] ) && ( date <= disabledDates[i][1] ) ) {
				enable = false;
				break;
			}
		}
	}

	disabledDays = jQuery( input ).datepicker( "option", "disabledDays" );

	if ( disabledDays ) {
		enable = enable && !disabledDays[ date.getDay() ];
	}

	highlightedDates = jQuery( input ).datepicker( "option", "highlightedDates" );
	highlight = "";

	if ( highlightedDates ) {
		for ( i = 0; i < highlightedDates.length; ++i ) {
			if ( ( date >= highlightedDates[i][0] ) && ( date <= highlightedDates[i][1] ) ) {
				highlight = "ui-state-highlight";
				break;
			}
		}
	}

	highlightedDays = jQuery( input ).datepicker( "option", "highlightedDays" );

	if ( highlightedDays ) {
		if ( highlightedDays[ date.getDay() ] ) {
			highlight = "ui-state-highlight";
		}
	}

	return [ enable, highlight, "" ];
}

