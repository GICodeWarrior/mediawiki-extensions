// brion's

$(function() {

	$statusbar = $('#status-top');
	$iconbar = $('.onlinestatusbaricon');

	// Only do the rest if we have the statusbar!
	if ($statusbar.length > 0) {
		function updateOnlineStatusBar() {
			// ... code to fetch and update
			$.ajax({
			url: mw.config.get('wgScriptPath') + '/api' + mw.config.get('wgScriptExtension'),
			data: {
			action: "query",
			prop: "onlinestatus",
			onlinestatususer: mw.config.get('wgTitle'),
			format: 'json'
		  },
		success: function(data) {
		// code to update the statusbar based on the returned message
		$icon = $("<img>").attr("src",mw.config.values.wgScriptPath+"/extensions/OnlineStatusBar/status"+({offline:'red',online:'green',away:'orange'})[data.onlinestatus.result]+'.png');
		$statusbar.html(mw.msg('onlinestatusbar-line', wgTitle,$icon,data.onlinestatus.result));
		//$statusbar.text(mw.config.values.wgTitle +" is now ").append($("<img>").attr("src",mw.config.values.wgScriptPath+"/extensions/OnlineStatusBar/status"+({offline:'red',online:'green',away:'orange'})[data.onlinestatus.result]+'.png')).append(data)
  }
});
		}

		// Update the status every couple minutes if we leave the page open
		window.setInterval(updateOnlineStatusBar, 120 * 1000);
	updateOnlineStatusBar();
}

});
