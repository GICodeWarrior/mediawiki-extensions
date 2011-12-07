// brion's

$(function() {

	$statusbar = $('#status-top');

	// Only do the rest if we have the statusbar!
	if ($statusbar.length > 0) {
		function updateOnlineStatusBar() {
			// ... code to fetch and update
			$.ajax({
			url: mw.config.get('wgScriptUrl') + '/api' + mw.config.get('wgScriptExtension'),
			params: {
			action: "query",
			prop: "onlinestatus",
			onlinestatususer: mw.config.get('wgTitle'),
			format: 'json'
		  },
		success: function(data) {
		// code to update the statusbar based on the returned message
  }
});
		}

		// Update the status every couple minutes if we leave the page open
		window.setInterval(updateOnlineStatusBar(), 120 * 1000);
	updateOnlineStatusBar();
}

});
