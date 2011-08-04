
jQuery( document ).ready( function() {
	// add "magic" to Language template parser for keywords
	var options = { magic: { 'SITENAME' : wgSiteName } };
	
	window.gM = mediaWiki.language.getMessageFunction( options );
	$j.fn.msg = mediaWiki.language.getJqueryMessagePlugin( options );
} );
