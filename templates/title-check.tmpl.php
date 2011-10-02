<script type="text/javascript">
/*<![CDATA[*/
YAHOO.namespace('WRequest');
YAHOO.namespace('Createpage');
YAHOO.namespace('CreatepageInfobox');

var DisabledCr = false;

var ajaxpath = wgScriptPath + '/index.php';

YAHOO.WRequest.callbackTitle = {
	success:
		function( r ) {
			YAHOO.util.Dom.get('cp-title-check').innerHTML = '';
			if( /^("(\\.|[^"\\\n\r])*?"|[,:{}\[\]0-9.\-+Eaeflnr-u \n\r\t])+?$/.test( r.responseText ) ) {
				var res = eval( '(' + r.responseText + ')' );
			}
			if ( ( false != res['text'] ) && ( true != res['empty'] ) ) {
				var url  = res['url' ].replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
				var text = res['text'].replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');

				YAHOO.util.Dom.get('cp-title-check').innerHTML = '<span style="color: red;"><?php echo wfMsg( 'createpage-article-exists' ) ?> <a href="' + url + '?action=edit" title="' + text + '">' + text + '</a><?php echo wfMsg( 'createpage-article-exists2' ) ?></span>';
				if ( YAHOO.Createpage.Overlay ) {
					YAHOO.Createpage.Overlay.show();
					var helperButton = YAHOO.util.Dom.get( 'wpRunInitialCheck' );
					helperButton.style.display = '';
				} else {
					YAHOO.Createpage.ContentOverlay();
				}
			} else if ( true == res['empty'] ) {
				YAHOO.util.Dom.get('cp-title-check').innerHTML = '<span style="color: red;"><?php echo wfMsg( 'createpage-title-invalid' ) ?></span>';
				if ( YAHOO.Createpage.Overlay ) {
					YAHOO.Createpage.ResizeOverlay( 0 );
					YAHOO.Createpage.Overlay.show();
					var helperButton = YAHOO.util.Dom.get( 'wpRunInitialCheck' );
					helperButton.style.display = '';
				} else {
					YAHOO.Createpage.ContentOverlay();
				}
			} else {
				if ( YAHOO.Createpage.Overlay ) {
					YAHOO.Createpage.Overlay.hide();
					var helperButton = YAHOO.util.Dom.get( 'wpRunInitialCheck' );
					helperButton.style.display = 'none';
				}
			}
			NoCanDo = false;
		},
	failure:
		function( r ) {
			YAHOO.util.Dom.get('cp-title-check').innerHTML = '';
		},
	timeout: 50000
};

YAHOO.WRequest.watchTitle = function( e ) {
	YAHOO.util.Dom.get('cp-title-check').innerHTML = '<img src="' + wgServer + wgScriptPath + '/extensions/CreateAPage/images/process_bar.gif" width="70" height="11" alt="<?php echo wfMsg( 'createpage-please-wait' ) ?>" border="0" />';
	NoCanDo = true;
	YAHOO.util.Connect.asyncRequest( 'GET', ajaxpath + '?action=ajax&rs=axTitleExists&title=' + YAHOO.util.Dom.get('Createtitle').value, YAHOO.WRequest.callbackTitle );
};

YAHOO.util.Event.addListener( 'Createtitle', 'change', YAHOO.WRequest.watchTitle );
/*]]>*/
</script>