/**
 * SVGEdit extension: add 'Edit drawing' button
 * @copyright 2010 Brion Vibber <brion@pobox.com>
 */

$(document).ready(function() {
	// We probably should check http://www.w3.org/TR/SVG11/feature#SVG-dynamic
	// but Firefox is missing a couple random subfeatures.
	//
	// Chrome, Safari, Opera, and IE 9 preview all return true for it!
	//
	if (!document.implementation.hasFeature('http://www.w3.org/TR/SVG11/feature#Shape', '1.1')) {
		return;
	}

	if (wgCanonicalNamespace == 'File'
		&& wgAction == 'view'
		&& wgTitle.match(/\.svg$/i)) {

		var triggerSVGEdit = function(filename) {
			var svgedit;
			var pipe;
			var url = wgSVGEditEditor ||
				(wgScriptPath + '/extensions/SVGEdit/svg-edit/svg-editor.html');

			$('body')
				.append('<div id="mw-svgedit">' +
						'<div id="mw-svgedit-toolbar">' +
							'<label id="mw-svgedit-summary-label"></label> ' +
							'<input id="mw-svgedit-summary" size="60" /> ' +
							'<button id="mw-svgedit-save"></button> ' +
							'<button id="mw-svgedit-close"></button>' +
						'</div>' +
						'<iframe id="mw-svgedit-frame" width="100%" height="90%"></iframe>' +
						'<div id="mw-svgedit-spinner"></div>' +
						'</div>');

			$('#mw-svgedit-summary-label')
				.text(mediaWiki.msg('svgedit-summary-label'));

			$('#mw-svgedit-summary')
				.val(mediaWiki.msg('svgedit-summary-default') + ' ');

			$('#mw-svgedit-save')
				.text(mediaWiki.msg('svgedit-editor-save-close'))
				.click(function() {
					$('#mw-svgedit-spinner').show();
					svgedit.getSvgString()(function(svg) {
						var comment = $('#mw-svgedit-summary').val();
						mwSVG.saveSVG(filename, svg, comment, function(data, textStatus, xhr) {
							if (data.upload && data.upload.result == "Success") {
								// kill the editor so it doesn't prompt us to save
								$('#mw-svgedit-frame').remove();
								// refresh parent window
								window.location = window.location;
							} else if (data.error && data.error.info) {
								$('#mw-svgedit-spinner').hide();
								alert('Error saving file: ' + data.error.info);
							} else {
								$('#mw-svgedit-spinner').hide();
								alert('Possible error saving file...');
							}
						});
					});
				});

			$('#mw-svgedit-close')
				.text(mediaWiki.msg('svgedit-editor-close'))
				.click(function() {
					$('#mw-svgedit').remove();
				});

			$('#mw-svgedit-frame')
				.load(function() {
					svgedit = new embedded_svg_edit(this);

					// Load up the original file!
					mwSVG.fetchSVG(filename, function(xmlSource, textStatus, xhr) {
						svgedit.setSvgString(xmlSource)(function() {
							$('#mw-svgedit-spinner').hide();
						});
					});
				})
				.attr('src', url);
		};

		var tab = mediaWiki.util.addPortletLink('p-cactions',
			document.location + '#!action=svgedit',
			mediaWiki.msg('svgedit-edit-tab'),
			'ca-ext-svgedit',
			mediaWiki.msg('svgedit-edit-tab-tooltip'),
			'',
			document.getElementById('ca-edit'));

		$(tab).find('a').click(function(event) {
			triggerSVGEdit(wgTitle);
			event.preventDefault();
			return false;
		});

		var button = $('<button></button>')
			.text(mediaWiki.msg('svgedit-editbutton-edit'))
			.click(function() {
				triggerSVGEdit(wgTitle);
			});

		$('.fullMedia').append(button);

		if (document.location.hash.indexOf('!action=svgedit') != -1) {
			triggerSVGEdit(wgTitle);
		}
	}
});
