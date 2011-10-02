<script type="text/javascript">
/*<![CDATA[*/

// data = [ div, link ]
YAHOO.WRequest.toggle = function( e, data ) {
	YAHOO.util.Event.preventDefault(e);

	var display = '';
	var text    = '';

	if ( 'none' != YAHOO.util.Dom.getStyle( data[0], 'display' ) ) {
		display = 'none';
		text    = <?php echo Xml::encodeJsVar( wfMsg( 'createpage-show' ) ) ?>;
		opacity =  0;

		onFadeEnd = function() {
			YAHOO.util.Dom.setStyle(data[0], 'display', display);
			YAHOO.util.Dom.get(data[1]).innerHTML = text;
		}

		var fade = new YAHOO.util.Anim(YAHOO.util.Dom.get(data[0]), {opacity: {to: opacity}}, 0.5);
		fade.onComplete.subscribe(onFadeEnd);
		fade.animate();
	} else {
		display = 'block';
		text    = <?php echo Xml::encodeJsVar( wfMsg( 'createpage-hide' ) ) ?>;
		opacity =  1;

		YAHOO.util.Dom.setStyle(data[0], 'opacity', 0);

		YAHOO.util.Dom.setStyle(data[0], 'display', display);
		YAHOO.util.Dom.get(data[1]).innerHTML = text;

		var fade = new YAHOO.util.Anim(YAHOO.util.Dom.get(data[0]), {opacity: {to: opacity}}, 0.5);
		fade.animate();
	}

};

YAHOO.util.Event.addListener('cp-chooser-toggle', 'click', YAHOO.WRequest.toggle, ['cp-chooser', 'cp-chooser-toggle']);

// FIXME onAvailable?
var listeners = YAHOO.util.Event.getListeners('cp-infobox-toggle');
if ( listeners ) {
	for ( var i = 0; i < listeners.length; ++i ) {
		var listener = listeners[i];
		if ( listener.type != 'click' ) {
			YAHOO.util.Event.addListener('cp-infobox-toggle', 'click', YAHOO.WRequest.toggle, ['cp-infobox', 'cp-infobox-toggle']);
		}
	}
} else {
	YAHOO.util.Event.addListener('cp-infobox-toggle', 'click', YAHOO.WRequest.toggle, ['cp-infobox', 'cp-infobox-toggle']);
}
/*]]>*/
</script>