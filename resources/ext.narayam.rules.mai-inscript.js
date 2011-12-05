/**
 * InScript regular expression rules table for Maithili language
 * Based on CDAC's "Enhanced InScript Keyboard Layout 5.2" for Hindi
 * @author Santhosh Thottingal
 * @date 2011-02-12
 * License: GPLv3
 */

// copy the rules from hi_inscript.
mai_inscript_scheme = $.narayam.getScheme( 'hi-inscript' );
mai_inscript_scheme.namemsg = 'narayam-mai-inscript';
$.extend(mai_inscript_scheme.rules, [ ['z', '', '\u02BC'] ]); // apostrophe
jQuery.narayam.addScheme( 'mai-inscript', mai_inscript_scheme );

