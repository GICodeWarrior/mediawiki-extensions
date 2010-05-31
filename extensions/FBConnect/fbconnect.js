/*
 * Copyright � 2010 Garrett Brown <http://www.mediawiki.org/wiki/User:Gbruin>
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License along
 * with this program. If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * fbconnect.js and fbconnect-min.js
 * 
 * FBConnect relies on several different libraries and frameworks for its
 * JavaScript code. Each framework has its own method to verify that the proper
 * code won't be called before it's ready. (Below, lambda represents a named or
 * anonymous function.)
 * 
 * MediaWiki:                addOnloadHook(lambda);
 *     This function manages an array of window.onLoad event handlers to be
 *     called be called by a MediaWiki script when the window is fully loaded.
 *     Because the DOM may be ready before the window (due to large images to
 *     be downloaded), a faster alternative is JQuery's document-ready function.
 * 
 * Facebook JavaScript SDK:  window.fbAsyncInit = lambda;
 *     This global variable is called when the JavaScript SDK is fully
 *     initialized asynchronously to the document's state. This might be long
 *     after the document is finished rendering the first time the script is
 *     downloaded. Subsequently, it may even be called before the DOM is ready.
 * 
 * jQuery:                   $(document).ready(lambda);
 *     Self-explanatory; to be called when the DOM is ready to be manipulated.
 *     Typically this should occur sooner than MediaWiki's addOnloadHook
 *     function is called.
 */

/**
 * After the Facebook JavaScript SDK has been asynchronously loaded,
 * it looks for the global fbAsyncInit and executes the function when found.
 */
window.fbAsyncInit = function() {
	// Initialize the library with the API key
	FB.init({
		appId : window.fbAppId, // See $wgFbAppId in config.php
		session: window.fbSession, // Don't re-fetch the session if PHP provides it
		status : true, // Check login status
		cookie : true, // Enable cookies to allow the server to access the session
		xfbml  : window.fbUseMarkup // Whether XFBML should be automatically parsed
	});

	// NOTE: Auth.login doesn't appear to work anymore.
	// The onlogin attribute of the fb:login-buttons is being used instead.
	
	// Register a function for when the user logs out of Facebook
	FB.Event.subscribe('auth.logout', function(response) {
		// TODO: Internationalize
		var login = confirm("Not logged in.\n\nYou have been loggout out of " +
                            "Facebook. Press OK to log in via Facebook Connect " +
                            "again, or press Cancel to stay on the current page.");
		if (login) {
			window.location = window.wgArticlePath.replace(/\$1/, "Special:Connect");
		}
	});
};

/**
 * jQuery code to be run when the DOM is ready to be manhandled.
 */
$(document).ready(function() {
	// Add a pretty logo to Facebook links
	$('#pt-fbconnect,#pt-fblink,#pt-fbconvert').addClass('mw-fblink');
	
	// Add the logout behavior to the "Logout of Facebook" button
	$('#pt-fblogout').click(function() {
		// TODO: Where did the fancy DHTML window go? Maybe consider jQuery Alert Dialogs:
		// http://abeautifulsite.net/2008/12/jquery-alert-dialogs/
		var logout = confirm("You are logging out of both this site and Facebook.");
		if (logout) {
			FB.logout(function(response) {
				window.location = window.fbLogoutURL;
			});
		}
	});
});

/**
 * An optional handler to use in fbOnLoginJsOverride for when a user logs in
 * via Facebook Connect. This will redirect to Special:Connect with the
 * returnto variables configured properly.
 *
 * TODO: Also set the value for 'returntoquery'!!
 */
function sendToConnectOnLogin(){
	var destUrl = wgServer + wgScript + "?title=Special:Connect&returnto=" + wgPageName + "&returntoquery=" + wgPagequery;
	window.location.href = destUrl;
}
