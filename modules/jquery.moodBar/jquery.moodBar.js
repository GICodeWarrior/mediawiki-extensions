/**
 * jquery.moodbar.js
 * JavaScript interface for the MoodBar backend.
 *
 * @author Andrew Garrett
 */
( function( $ ) {
	$.moodBar = {
		/**
		 * Submit a MoodBar feedback item.
		 * @param params Object: Named parameters:
		 * comment: The comments submitted
		 * bucket: A bucket, for A/B testing.
		 * anonymize: Boolean, whether or not to mark as anonymous
		 * callback: A function, accepts a single 'data' parameter, to call when the
		 *     request completes.
		 * @return null
		 */
		'submit' : function( params ) {
			var clientData = $.client.profile();

			var apiRequest =
			{
				'action' : 'moodbar',
				'page' : mw.config.get('wgPageName'),
				'comment' : params.comment,
				'anonymize' : params.anonymize,
				'editmode' : (wgAction == 'edit') ? 1 : 0,
				'useragent' : clientData.name + '/' + clientData.versionBase,
				'system' : clientData.platform,
				'bucket' : mb.conf.bucketKey,
				'type' : params.type,
				'token' : mw.user.tokens.get('editToken'),
				'format' : 'json'
			};
			
			var path = mediaWiki.util.wikiScript('api');
			
			$j.post( path, apiRequest,
				function(data) {
					if (params.callback) {
						params.callback(data);
					}
				}, 'json' );
		}
	};
} ) ( jQuery );
