<!-- s:<?php echo __FILE__ ?> -->
<noscript>
<style type="text/css">
/*<![CDATA[*/

#wpTableMultiEdit div div .createpage_input_file label,
#cp-infobox div .createpage_input_file label {
	float: left !important;
	background: #ffffff;
	border: none;
	color: black;
	cursor: auto;
}

#wpTableMultiEdit div div .createpage_input_file label span,
#cp-infobox div .createpage_input_file label span {
	display: none !important;
}

#wpTableMultiEdit div div .createpage_input_file label input,
#cp-infobox div .createpage_input_file label input {
	position: relative !important;
	font-size: 9pt !important;
	line-height: 12px !important;
	opacity: 100 !important;
	zoom: 1 !important;
	filter: alpha(opacity=100) !important;
}

/*]]>*/
</style>
</noscript>

<script type="text/javascript">
/*<![CDATA[*/

var NoCanDo = false;

YAHOO.Createpage.PreviewMode = '<?php echo !$ispreview ? 'No' : 'Yes' ?>';
YAHOO.Createpage.RedLinkMode = '<?php echo !$isredlink ? 'No' : 'Yes' ?>';

YAHOO.Createpage.RedirectCallback = {
	success: function( oResponse ) {
		window.location = wgServer + wgScript + '?title=' + escape( document.getElementById('Createtitle').value ) + '&action=edit&editmode=nomulti&createpage=true';
	},
	failure: function( oResponse ) {
	},
	timeout: 50000
};

YAHOO.Createpage.SubmitEnabled = false;

YAHOO.Createpage.ClearInput = function( o ) {
	var Cdone = false;
	var Infobox_callback = function( e, o ) {
		var previewarea = YAHOO.util.Dom.get('createpagepreview');
		if ( !Cdone && ( previewarea == null ) ) {
			Cdone = true;
			YAHOO.util.Dom.get('wpInfoboxPar' + o.num).value = '';
		}
	}
	YAHOO.util.Event.addListener( 'wpInfoboxPar' + o.num, 'focus', Infobox_callback, {num: o.num} );
};

YAHOO.Createpage.goToEdit = function( e ) {
	var oForm = YAHOO.util.Dom.get('createpageform');
	YAHOO.util.Event.preventDefault(e);
	YAHOO.util.Connect.setForm( oForm, false );
	YAHOO.util.Connect.asyncRequest( 'POST', wgScriptPath + '/index.php?action=ajax&rs=axCreatepageAdvancedSwitch', YAHOO.Createpage.RedirectCallback );
	YAHOO.Createpage.warningPanel.hide();
}

YAHOO.Createpage.goToLogin = function( e ) {
	YAHOO.util.Event.preventDefault(e);
	if ( YAHOO.Createpage.RedLinkMode ) {
		window.location = wgServer + wgScript + '?title=Special:UserLogin&returnto=' + escape( document.getElementById('Createtitle').value );
	} else {
		window.location = wgServer + wgScript + '?title=Special:UserLogin&returnto=Special:CreatePage';
	}
}

YAHOO.Createpage.hideWarningPanel = function( e ) {
	if ( YAHOO.Createpage.warningPanel ) {
		YAHOO.Createpage.warningPanel.hide();
	}
}

YAHOO.Createpage.showWarningPanel = function( e ) {
	YAHOO.util.Event.preventDefault(e);
	if ( document.getElementById('Createtitle').value != '' ) {
		if ( !YAHOO.Createpage.warningPanel ) {
			YAHOO.Createpage.buildWarningPanel();
		}
		YAHOO.Createpage.warningPanel.show();
		YAHOO.util.Dom.get('wpCreatepageWarningYes').focus();
	} else {
		YAHOO.util.Dom.get('cp-title-check').innerHTML = '<span style="color: red;"><?php echo wfMsg( 'createpage-give-title' ) ?></span>';
	}
}

YAHOO.Createpage.hideWarningLoginPanel = function( e ) {
	if ( YAHOO.Createpage.warningLoginPanel ) {
		YAHOO.Createpage.warningLoginPanel.hide();
	}
}

YAHOO.Createpage.showWarningLoginPanel = function( e ) {
	YAHOO.util.Event.preventDefault(e);
	if ( document.getElementById('Createtitle').value != '' ) {
		if ( !YAHOO.Createpage.warningLoginPanel ) {
			YAHOO.Createpage.buildWarningLoginPanel();
		}
		YAHOO.Createpage.warningLoginPanel.show();
		YAHOO.util.Dom.get('wpCreatepageWarningYes').focus();
	} else {
		YAHOO.util.Dom.get('cp-title-check').innerHTML = '<span style="color: red;"><?php echo wfMsg( 'createpage-give-title' ) ?></span>';
	}
}

YAHOO.Createpage.Abort = function( e, o ) {
	YAHOO.util.Connect.abort( o.request, o.callback );
}

YAHOO.Createpage.ToolbarButtons = [];

<?php
	$tool_arr = CreateMultiPage::getToolArray();
	$tool_num = 0;
	global $wgStylePath;
	foreach ( $tool_arr as $single_tool ) { ?>
		YAHOO.Createpage.ToolbarButtons[<?php echo $tool_num ?>] = [];
		YAHOO.Createpage.ToolbarButtons[<?php echo $tool_num ?>]['image'] = '<?php echo $wgStylePath . '/common/images/' . $single_tool['image'] ?>';
		YAHOO.Createpage.ToolbarButtons[<?php echo $tool_num ?>]['id'] = '<?php echo $single_tool['id'] ?>';
		YAHOO.Createpage.ToolbarButtons[<?php echo $tool_num ?>]['open'] = '<?php echo $single_tool['open'] ?>';
		YAHOO.Createpage.ToolbarButtons[<?php echo $tool_num ?>]['close'] = '<?php echo $single_tool['close'] ?>';
		YAHOO.Createpage.ToolbarButtons[<?php echo $tool_num ?>]['sample'] = '<?php echo $single_tool['sample'] ?>';
		YAHOO.Createpage.ToolbarButtons[<?php echo $tool_num ?>]['tip'] = '<?php echo $single_tool['tip'] ?>';
		YAHOO.Createpage.ToolbarButtons[<?php echo $tool_num ?>]['key'] = '<?php echo $single_tool['key'] ?>';
<?php
		$tool_num++;
	}
?>

YAHOO.Createpage.UploadCallback = function( oResponse ) {
	if( /^("(\\.|[^"\\\n\r])*?"|[,:{}\[\]0-9.\-+Eaeflnr-u \n\r\t])+?$/.test( oResponse.responseText ) ) {
		var aResponse = eval( '(' + oResponse.responseText + ')' );
	}
	var ProgressBar = YAHOO.util.Dom.get( 'createpage_upload_progress_section' + aResponse['num'] );

	if ( aResponse['error'] != 1 ) {
		ProgressBar.innerHTML = "<?php echo wfMsg( 'createpage-img-uploaded' ) ?>";
		var target_info = YAHOO.util.Dom.get( 'wpAllUploadTarget' + aResponse['num'] ).value;
		var target_tag = YAHOO.util.Dom.get( target_info );
		target_tag.value = '[[' + aResponse['msg'] + '|thumb]]';

		var ImageThumbnail = YAHOO.util.Dom.get( 'createpage_image_thumb_section' + aResponse['num'] );
		var thumb_container = YAHOO.util.Dom.get( 'createpage_main_thumb_section' + aResponse['num'] );
		var tempstamp = new Date();
		ImageThumbnail.src = aResponse['url'] + '?' + tempstamp.getTime();
		if ( YAHOO.util.Dom.get( 'wpAllLastTimestamp' + aResponse['num'] ).value == 'None' ) {
			var break_tag = document.createElement('br');
			thumb_container.style.display = '';
			var label_node = YAHOO.util.Dom.get( 'createpage_image_label_section' + aResponse['num'] );
			var par_node = label_node.parentNode;
			par_node.insertBefore( break_tag, label_node );
		}
		YAHOO.util.Dom.get( 'wpAllLastTimestamp' + oResponse.argument ).value = aResponse['timestamp'];
	} else if ( ( aResponse['error'] == 1 ) && ( aResponse['msg'] == 'cp_no_login' ) ) {
		ProgressBar.innerHTML = '<span style="color: red"><?php echo wfMsg( 'createpage-login-required' ) ?>' + '<a href="' + wgServer + wgScript +'?title=Special:Userlogin&returnto=Special:Createpage" id="createpage_login' + oResponse.argument + '"><?php echo wfMsg( 'createpage-login-href' ) ?></a>' + "<?php echo wfMsg( 'createpage-login-required2' ) ?></span>";
		YAHOO.util.Event.addListener( 'createpage_login' + oResponse.argument, 'click', YAHOO.Createpage.showWarningLoginPanel );
	} else {
		ProgressBar.innerHTML = '<span style="color: red">' + aResponse['msg'] + '</span>';
	}

	YAHOO.util.Dom.get( 'createpage_image_text_section' + oResponse.argument ).innerHTML = "<?php echo wfMsg( 'createpage-insert-image' ) ?>";
	YAHOO.util.Dom.get( 'createpage_upload_file_section' + oResponse.argument ).style.display = '';
	YAHOO.util.Dom.get( 'createpage_image_text_section' + oResponse.argument ).style.display = '';
	YAHOO.util.Dom.get( 'createpage_image_cancel_section' + oResponse.argument ).style.display = 'none';
};

YAHOO.Createpage.FailureCallback = function( oResponse ) {
	YAHOO.util.Dom.get( 'createpage_image_text_section' + oResponse.argument ).innerHTML = "<?php echo wfMsg( 'createpage-insert-image' ) ?>";
	YAHOO.util.Dom.get( 'createpage_upload_progress_section' + oResponse.argument ).innerHTML = "<?php echo wfMsg( 'createpage-upload-aborted' ) ?>";
	YAHOO.util.Dom.get( 'createpage_upload_file_section' + oResponse.argument ).style.display = '';
	YAHOO.util.Dom.get( 'createpage_image_text_section' + oResponse.argument ).style.display = '';
	YAHOO.util.Dom.get( 'createpage_image_cancel_section' + oResponse.argument ).style.display = 'none';
};

YAHOO.Createpage.RestoreSection = function( section, text ) {
	var section_content = YAHOO.util.Dom.getElementsBy( YAHOO.Createpage.OptionalContentTest, '', section );
	for( var i = 0; i < section_content.length; i++ ) {
		text = text.replace( section_content[i].id, '' );
	}
	section.style.display = 'block';
	return text;
}

YAHOO.Createpage.UnuseSection = function( section, text ) {
	var section_content = YAHOO.util.Dom.getElementsBy( YAHOO.Createpage.OptionalContentTest, '', section );
	var first = true;
	var ivalue = '';
	for( var i = 0; i < section_content.length; i++ ) {
		if ( first ) {
			if ( '' != text ) {
				ivalue += ',';
			}
			first = false;
		} else {
			ivalue += ',';
		}
		ivalue += section_content[i].id;
	}
	section.style.display = 'none';
	return text + ivalue;
}

YAHOO.Createpage.ToggleSection = function( e, o ) {
	var section = YAHOO.util.Dom.get( 'createpage_section_' + o.num );
	var input = YAHOO.util.Dom.get( 'wpOptionalInput' + o.num );
	var optionals = YAHOO.util.Dom.get( 'wpOptionals' );
	var ivalue = '';
	if ( input.checked ) {
		optionals.value = YAHOO.Createpage.RestoreSection( section, optionals.value );
	} else {
		optionals.value = YAHOO.Createpage.UnuseSection( section, optionals.value );
	}
}

YAHOO.Createpage.Upload = function( e, o ) {
	var oForm = YAHOO.util.Dom.get('createpageform');
	YAHOO.util.Event.preventDefault(e);
	YAHOO.util.Connect.setForm( oForm, true );

	var ProgressBar = YAHOO.util.Dom.get('createpage_upload_progress_section' + o.num);
	ProgressBar.style.display = 'block';
	ProgressBar.innerHTML = '<img src="' + wgServer + stylepath + '/skins/common/images/spinner.gif" width="16" height="16" alt="wait" border="0" />&nbsp;';

	var callback = {
		success: YAHOO.Createpage.UploadCallback,
		failure: YAHOO.Createpage.FailureCallback,
		argument: [o.num],
		timeout: 240000
	}

	var sent_request = YAHOO.util.Connect.asyncRequest( 'POST', wgScriptPath + '/index.php?action=ajax&rs=axMultiEditImageUpload&infix=All&num=' + o.num, callback );
	YAHOO.util.Dom.get( 'createpage_image_cancel_section' + o.num ).style.display = '';
	YAHOO.util.Dom.get( 'createpage_image_text_section' + o.num ).style.display = 'none';

	YAHOO.util.Event.addListener( 'createpage_image_cancel_section' + o.num, 'click', YAHOO.Createpage.Abort, {"request": sent_request, "callback": callback} );

	var neoInput = document.createElement( 'input' );
	var thisInput = YAHOO.util.Dom.get('createpage_upload_file_section' + o.num);
	var thisContainer = YAHOO.util.Dom.get('createpage_image_label_section' + o.num);
	thisContainer.removeChild( thisInput );

	neoInput.setAttribute( 'type', 'file' );
	neoInput.setAttribute( 'id', 'createpage_upload_file_section' + o.num );
	neoInput.setAttribute( 'name', 'wpAllUploadFile' + o.num );
	neoInput.setAttribute( 'tabindex', '-1' );

	thisContainer.appendChild( neoInput );
	YAHOO.util.Event.addListener( 'createpage_upload_file_section' + o.num, 'change', YAHOO.Createpage.Upload, {"num" : o.num } );

	YAHOO.util.Dom.get( 'createpage_upload_file_section' + o.num ).style.display = 'none';
}

YAHOO.Createpage.buildWarningPanel = function( e ) {
	var editwarn = document.getElementById( 'createpage_advanced_warning' );
	var editwarn_copy = document.createElement( 'div' );
	editwarn_copy.id = 'createpage_warning_copy';
	editwarn_copy.innerHTML = editwarn.innerHTML;
	document.body.appendChild( editwarn_copy );
	YAHOO.Createpage.warningPanel = new YAHOO.widget.Panel('createpage_warning_copy', {
			width: '250px',
			modal: true,
			constraintoviewport: true,
			draggable: false,
			fixedcenter: true,
			underlay: 'none'
	} );
	YAHOO.Createpage.warningPanel.cfg.setProperty( 'zIndex', 1000 );
	YAHOO.Createpage.warningPanel.render( document.body );
	YAHOO.util.Event.addListener( 'wpCreatepageWarningYes', 'click', YAHOO.Createpage.goToEdit );
	YAHOO.util.Event.addListener( 'wpCreatepageWarningNo', 'click', YAHOO.Createpage.hideWarningPanel );
}

YAHOO.Createpage.buildWarningLoginPanel = function( e ) {
	var editwarn = document.getElementById( 'createpage_advanced_warning' );
	var editwarn_copy = document.createElement( 'div' );
	editwarn_copy.id = 'createpage_warning_copy2';
	editwarn_copy.innerHTML = editwarn.innerHTML;
	editwarn_copy.childNodes[1].innerHTML = "<?php echo wfMsg( 'login' ) ?>";
	editwarn_copy.childNodes[3].innerHTML = "<?php echo wfMsg( 'createpage-login-warning' ) ?>";
	document.body.appendChild( editwarn_copy );
	YAHOO.Createpage.warningLoginPanel = new YAHOO.widget.Panel('createpage_warning_copy2', {
			width: '250px',
			modal: true,
			constraintoviewport: true,
			draggable: false,
			fixedcenter: true,
			underlay: 'none'
	} );
	YAHOO.Createpage.warningLoginPanel.cfg.setProperty( 'zIndex', 1000 );
	YAHOO.Createpage.warningLoginPanel.render( document.body );
	YAHOO.util.Event.addListener( 'wpCreatepageWarningYes', 'click', YAHOO.Createpage.goToLogin );
	YAHOO.util.Event.addListener( 'wpCreatepageWarningNo', 'click', YAHOO.Createpage.hideWarningLoginPanel );
}

YAHOO.Createpage.onclickCategoryFn = function( cat, id ) {
	return function() {
		cloudRemove( escape( cat ), id );
		return false;
	}
}

YAHOO.Createpage.clearTitleMessage = function( e ) {
	YAHOO.util.Event.preventDefault(e);
	YAHOO.util.Dom.get('cp-title-check').innerHTML = '';
}

YAHOO.Createpage.UploadTest = function( el ) {
	if ( el.id.match( 'createpage_upload_file_section' ) ) {
		return true;
	} else {
		return false;
	}
}

YAHOO.Createpage.EditTextareaTest = function( el ) {
	if ( el.id.match( 'wpTextboxes' ) && ( el.style.display != 'none' ) ) {
		return true;
	} else {
		return false;
	}
}

YAHOO.Createpage.OptionalSectionTest = function( el ) {
	if ( el.id.match( 'wpOptionalInput' ) && ( el.style.display != 'none' ) ) {
		return true;
	} else {
		return false;
	}
}

YAHOO.Createpage.OptionalContentTest = function( el ) {
	if ( el.id.match( 'wpTextboxes' ) ) {
		return true;
	} else {
		return false;
	}
}

YAHOO.Createpage.UploadEvent = function( el ) {
	var j = parseInt( el.id.replace( 'createpage_upload_file_section', '' ) );
	YAHOO.util.Event.addListener( 'createpage_upload_file_section' + j, 'change', YAHOO.Createpage.Upload, {num : j } );
}

YAHOO.Createpage.TextareaAddToolbar = function( el ) {
	var el_id = parseInt( el.id.replace( 'wpTextboxes', '' ) );
	YAHOO.Createpage.multiEditTextboxes[YAHOO.Createpage.multiEditTextboxes.length] = el_id;
	YAHOO.Createpage.multiEditButtons[el_id] = [];
	YAHOO.Createpage.multiEditCustomButtons[el_id] = [];
	YAHOO.util.Event.addListener( el.id, 'focus', YAHOO.Createpage.showThisBox, {'toolbarId' : el_id } );

	YAHOO.util.Event.addListener( 'wpTextIncrease' + el_id, 'click', YAHOO.Createpage.resizeThisTextarea, {'textareaId' : el_id, 'numRows' : 1 } );
	YAHOO.util.Event.addListener( 'wpTextDecrease' + el_id, 'click', YAHOO.Createpage.resizeThisTextarea, {'textareaId' : el_id, 'numRows' : -1 } );

	for ( var i = 0; i < YAHOO.Createpage.ToolbarButtons.length; i++ ) {
		YAHOO.Createpage.addMultiEditButton(
			YAHOO.Createpage.ToolbarButtons[i]['image'],
			YAHOO.Createpage.ToolbarButtons[i]['tip'],
			YAHOO.Createpage.ToolbarButtons[i]['open'],
			YAHOO.Createpage.ToolbarButtons[i]['close'],
			YAHOO.Createpage.ToolbarButtons[i]['sample'],
			YAHOO.Createpage.ToolbarButtons[i]['id'] + el_id,
			el_id
		);
	}
}

YAHOO.Createpage.foundCategories = [];

YAHOO.Createpage.CheckCategoryCloud = function() {
	var cat_textarea = YAHOO.util.Dom.get('wpCategoryTextarea');
	if ( !cat_textarea ) {
		return;
	}

	var cat_full_section = YAHOO.util.Dom.get('createpage_cloud_section');

	var cloud_num = ( cat_full_section.childNodes.length - 1 ) / 2;
	var n_cat_count = cloud_num;
	var text_categories = new Array();
	for ( i = 0; i < cloud_num; i++ ) {
		var cloud_id = 'cloud' + i;
		var found_category = YAHOO.util.Dom.get(cloud_id).innerHTML;
		if ( found_category ) {
			YAHOO.Createpage.foundCategories[i] = found_category;
		}
	}

	var categories = cat_textarea.value;
	if ( '' == categories ) {
		return;
	}

	categories = categories.split("|");
	for ( i = 0; i < categories.length; i++ ) {
		text_categories [i] = categories[i];
	}

	for ( i = 0; i < text_categories.length;i++) {
		var c_found = false;
		for ( j in YAHOO.Createpage.foundCategories ) {
			var core_cat = text_categories[i].replace (/\|.*/,'');
			if ( YAHOO.Createpage.foundCategories[j] == core_cat ) {
				this_button = YAHOO.util.Dom.get('cloud' + j);
				var actual_cloud = YAHOO.Createpage.foundCategories[j];
				var cl_num = j;

				this_button.onclick = YAHOO.Createpage.onclickCategoryFn( text_categories[i], j );
				this_button.style.color = '#419636';
				c_found = true;
				break;
			}
		}
		if ( !c_found ) {
			var n_cat = document.createElement( 'a' );
			var s_cat = document.createElement( 'span' );
			n_cat_count++;
			var cat_num = n_cat_count - 1;
			n_cat.setAttribute( 'id', 'cloud' + cat_num );
			n_cat.setAttribute( 'href', '#' );
			n_cat.onclick = YAHOO.Createpage.onclickCategoryFn( text_categories[i], cat_num );
			n_cat.style.color = '#419636';
			n_cat.style.fontSize = '10pt';
			s_cat.setAttribute( 'id', 'tag' + n_cat_count );
			t_cat = document.createTextNode( core_cat );
			space = document.createTextNode( ' ' );
			n_cat.appendChild( t_cat );
			s_cat.appendChild( n_cat );
			s_cat.appendChild( space );
			cat_full_section.appendChild( s_cat );
		}
	}
}

YAHOO.Createpage.multiEditTextboxes = [];
YAHOO.Createpage.multiEditButtons = [];
YAHOO.Createpage.multiEditCustomButtons = [];

YAHOO.Createpage.addMultiEditButton = function( imageFile, speedTip, tagOpen, tagClose, sampleText, imageId, toolbarId ) {
	YAHOO.Createpage.multiEditButtons[toolbarId][YAHOO.Createpage.multiEditButtons[toolbarId].length] = {
		'imageId': imageId,
		'toolbarId': toolbarId,
		'imageFile': imageFile,
		'speedTip': speedTip,
		'tagOpen': tagOpen,
		'tagClose': tagClose,
		'sampleText': sampleText
	};
}

YAHOO.Createpage.showThisBox = function( e, o ) {
	YAHOO.util.Event.preventDefault(e);
	YAHOO.util.Dom.get('toolbar' + o.toolbarId).style.display = '';
	YAHOO.Createpage.hideOtherBoxes(o.toolbarId);
}

YAHOO.Createpage.resizeThisTextarea = function( e, o ) {
	YAHOO.util.Event.preventDefault(e);
	var r_textarea = YAHOO.util.Dom.get( 'wpTextboxes' + o.textareaId );
	if (
		!( ( r_textarea.rows < 4 ) && ( o.numRows < 0 ) ) &&
		!( ( r_textarea.rows > 10 ) && ( o.numRows > 0 ) )
	) {
		r_textarea.rows = r_textarea.rows + o.numRows;
	}
}

YAHOO.Createpage.hideOtherBoxes = function( box_id ) {
	for ( var i = 0; i < YAHOO.Createpage.multiEditTextboxes.length; i++ ) {
		if ( YAHOO.Createpage.multiEditTextboxes[i] != box_id ) {
			YAHOO.util.Dom.get( 'toolbar' + YAHOO.Createpage.multiEditTextboxes[i] ).style.display = 'none';
		}
	}
}

YAHOO.Createpage.multiEditSetupToolbar = function() {
	for ( var j = 0; j < YAHOO.Createpage.multiEditButtons.length; j++ ) {
		var toolbar = document.getElementById( 'toolbar' + j );
		if ( toolbar ) {
			var textbox = document.getElementById( 'wpTextboxes' + j );
			if ( !textbox ) {
				return false;
			}
			if ( !( document.selection && document.selection.createRange )
					&& textbox.selectionStart === null
			) {
				return false;
			}

			for ( var i = 0; i < YAHOO.Createpage.multiEditButtons[j].length; i++ ) {
				YAHOO.Createpage.insertMultiEditButton( toolbar, YAHOO.Createpage.multiEditButtons[j][i] );
			}
		}
	}
	return true;
}

YAHOO.Createpage.multiEditSetupOptionalSections = function() {
	var snum = 0;
	if ( YAHOO.util.Dom.get( 'createpage_optionals_content' ) ) {
		var optionals = YAHOO.util.Dom.getElementsBy( YAHOO.Createpage.OptionalSectionTest, 'input', YAHOO.util.Dom.get( 'createpage_optionals_content' ) );
		var optionalsElements = YAHOO.util.Dom.get( 'wpOptionals' );
		for ( i = 0; i < optionals.length; i++ ) {
			snum = optionals[i].id.replace( 'wpOptionalInput', '' );
			if ( !YAHOO.util.Dom.get( 'wpOptionalInput' + snum ).checked ) {
				optionalsElements.value = YAHOO.Createpage.UnuseSection( YAHOO.util.Dom.get( 'createpage_section_' + snum ), optionalsElements.value );
			}
			YAHOO.util.Event.addListener( optionals[i], 'change', YAHOO.Createpage.ToggleSection, {num: snum} );
		}
	}
}

YAHOO.Createpage.insertMultiEditButton = function( parent, item ) {
	var image = document.createElement( 'img' );
	image.width = 23;
	image.height = 22;
	image.className = 'mw-toolbar-editbutton';
	if ( item.imageId ) {
		image.id = item.imageId;
	}
	image.src = item.imageFile;
	image.border = 0;
	image.alt = item.speedTip;
	image.title = item.speedTip;
	image.style.cursor = 'pointer';

	parent.appendChild( image );
	YAHOO.util.Event.addListener(
		item.imageId,
		'click',
		YAHOO.Createpage.insertTags, {
			'tagOpen' : item.tagOpen,
			'tagClose' : item.tagClose,
			'sampleText' : item.sampleText,
			'textareaId' : 'wpTextboxes' + item.toolbarId
		}
	);
	return true;
}

YAHOO.Createpage.insertTags = function( e, o ) {
	YAHOO.util.Event.preventDefault(e);
	var textarea = YAHOO.util.Dom.get( o.textareaId );
	if ( !textarea ) {
		return;
	}
	var selText, isSample = false;

	if ( document.selection && document.selection.createRange ) {
		if ( document.documentElement && document.documentElement.scrollTop ) {
			var winScroll = document.documentElement.scrollTop;
		} else if ( document.body ) {
			var winScroll = document.body.scrollTop;
		}
		textarea.focus();
		var range = document.selection.createRange();
		selText = range.text;
		checkSelectedText();
		range.text = o.tagOpen + selText + o.tagClose;
		if ( isSample && range.moveStart ) {
			if ( window.opera ) {
				o.tagClose = o.tagClose.replace(/\n/g,'');
			}
			range.moveStart('character', - o.tagClose.length - selText.length);
			range.moveEnd('character', - o.tagClose.length);
		}
		range.select();
		if ( document.documentElement && document.documentElement.scrollTop ) {
			document.documentElement.scrollTop = winScroll;
		} else if ( document.body ) {
			document.body.scrollTop = winScroll;
		}
	} else if ( textarea.selectionStart || textarea.selectionStart == '0' ) {
		var textScroll = textarea.scrollTop;
		textarea.focus();
		var startPos = textarea.selectionStart;
		var endPos = textarea.selectionEnd;
		selText = textarea.value.substring( startPos, endPos );
		checkSelectedText();
		textarea.value = textarea.value.substring( 0, startPos )
				+ o.tagOpen + selText + o.tagClose
				+ textarea.value.substring( endPos, textarea.value.length );
		if ( isSample ) {
			textarea.selectionStart = startPos +o.tagOpen.length;
			textarea.selectionEnd = startPos + o.tagOpen.length + selText.length;
		} else {
			textarea.selectionStart = startPos + o.tagOpen.length + selText.length + o.tagClose.length;
			textarea.selectionEnd = textarea.selectionStart;
		}
		textarea.scrollTop = textScroll;
	}

	function checkSelectedText() {
		if ( !selText ) {
			selText = o.sampleText;
			isSample = true;
		} else if ( selText.charAt( selText.length - 1 ) == ' ' ) {
			selText = selText.substring( 0, selText.length - 1 );
			o.tagClose += ' ';
		}
	}
}

window.onresize = function() {
	if ( YAHOO.Createpage.Overlay && ( YAHOO.util.Dom.get('createpageoverlay').style.visibility != 'hidden' ) ) {
		YAHOO.Createpage.ResizeOverlay( 0 );
	}
};

YAHOO.CreatepageInfobox.UploadCallback = function( oResponse ) {
	if( /^("(\\.|[^"\\\n\r])*?"|[,:{}\[\]0-9.\-+Eaeflnr-u \n\r\t])+?$/.test( oResponse.responseText ) ) {
		var aResponse = eval( '(' + oResponse.responseText + ')' );
	}
	var ProgressBar = YAHOO.util.Dom.get( 'createpage_upload_progress' + oResponse.argument );
	if ( aResponse['error'] != 1 ) {
		var xInfoboxText = YAHOO.util.Dom.get( 'wpInfoboxValue' ).value;
		var xImageHelper = YAHOO.util.Dom.get( 'wpInfImg' + oResponse.argument ).value;
		YAHOO.util.Dom.get( 'wpInfImg' + oResponse.argument ).value = aResponse['msg'];
		YAHOO.util.Dom.get( 'wpNoUse' + oResponse.argument ).value = 'Yes';
		ProgressBar.innerHTML = "<?php echo wfMsg( 'createpage-img-uploaded' ) ?>";
		var ImageThumbnail = YAHOO.util.Dom.get( 'createpage_image_thumb' + oResponse.argument );
		var thumb_container = YAHOO.util.Dom.get( 'createpage_main_thumb' + oResponse.argument );
		var tempstamp = new Date();
		ImageThumbnail.src = aResponse['url'] + '?' + tempstamp.getTime();
		if ( YAHOO.util.Dom.get( 'wpLastTimestamp' + oResponse.argument ).value == 'None' ) {
			var break_tag = document.createElement( 'br' );
			thumb_container.style.display = '';
			var label_node = YAHOO.util.Dom.get( 'createpage_image_label' + oResponse.argument );
			var par_node = label_node.parentNode;
			par_node.insertBefore( break_tag, label_node );
		}
		YAHOO.util.Dom.get( 'wpLastTimestamp' + oResponse.argument ).value = aResponse['timestamp'];
	} else if ( ( aResponse['error'] == 1 ) && ( aResponse['msg'] == 'cp_no_login' ) ) {
		ProgressBar.innerHTML = '<span style="color: red"><?php echo wfMsg( 'createpage-login-required' ) ?>' + '<a href="' + wgServer + wgScript + '?title=Special:UserLogin&returnto=Special:CreatePage" id="createpage_login_infobox' + oResponse.argument + '" ><?php echo wfMsg( 'createpage-login-href' ) ?></a>' + "<?php echo wfMsg( 'createpage-login-required2' ) ?></span>";
		YAHOO.util.Event.addListener('createpage_login_infobox' + oResponse.argument, 'click', YAHOO.Createpage.showWarningLoginPanel );
	} else {
		ProgressBar.innerHTML = '<span style="color: red">' + aResponse['msg'] + '</span>';
	}
	YAHOO.util.Dom.get( 'createpage_image_text' + oResponse.argument ).innerHTML = "<?php echo wfMsg( 'createpage-insert-image' ) ?>";
	YAHOO.util.Dom.get( 'createpage_upload_file' + oResponse.argument ).style.display = '';
	YAHOO.util.Dom.get( 'createpage_image_text' + oResponse.argument ).style.display = '';
	YAHOO.util.Dom.get( 'createpage_image_cancel' + oResponse.argument ).style.display = 'none';
};

YAHOO.CreatepageInfobox.FailureCallback = function( oResponse ) {
	YAHOO.util.Dom.get( 'createpage_image_text' + oResponse.argument ).innerHTML = "<?php echo wfMsg( 'createpage-insert-image' ) ?>";
	YAHOO.util.Dom.get( 'createpage_upload_progress' + oResponse.argument ).innerHTML = "<?php echo wfMsg( 'createpage-upload-aborted' ) ?>";
	YAHOO.util.Dom.get( 'createpage_upload_file' + oResponse.argument ).style.display = '';
	YAHOO.util.Dom.get( 'createpage_image_text' + oResponse.argument ).style.display = '';
	YAHOO.util.Dom.get( 'createpage_image_cancel' + oResponse.argument ).style.display = 'none';
};

YAHOO.CreatepageInfobox.Abort = function( e, o ) {
	YAHOO.util.Connect.abort( o.request, o.callback );
}

YAHOO.CreatepageInfobox.Upload = function( e, o ) {
	var n = o.num;
	var oForm = YAHOO.util.Dom.get( 'createpageform' );
	if ( oForm ) {
		YAHOO.util.Event.preventDefault(e);
		YAHOO.util.Connect.setForm( oForm, true );
		var ProgressBar = YAHOO.util.Dom.get( 'createpage_upload_progress' + o.num );
		ProgressBar.style.display = 'block';
		ProgressBar.innerHTML = '<img src="' + wgServer + stylepath + '/common/images/spinner.gif" width="16" height="16" alt="wait" border="0" />&nbsp;';

		var callback = {
			upload: YAHOO.CreatepageInfobox.UploadCallback,
			failure: YAHOO.CreatepageInfobox.FailureCallback,
			timeout: 60000,
			argument: [n]
		};

		var sent_request = YAHOO.util.Connect.asyncRequest( 'POST', wgScriptPath + '/index.php?action=ajax&rs=axMultiEditImageUpload&num=' + n, callback );
		YAHOO.util.Dom.get( 'createpage_image_cancel' + o.num ).style.display = '';
		YAHOO.util.Dom.get( 'createpage_image_text' + o.num ).style.display = 'none';

		YAHOO.util.Event.addListener( 'createpage_image_cancel' + o.num, 'click', YAHOO.CreatepageInfobox.Abort, {"request": sent_request, "callback": callback} );

		var neoInput = document.createElement( 'input' );
		var thisInput = YAHOO.util.Dom.get( 'createpage_upload_file' + o.num );
		var thisContainer = YAHOO.util.Dom.get( 'createpage_image_label' + o.num );
		thisContainer.removeChild( thisInput );

		neoInput.setAttribute( 'type', 'file' );
		neoInput.setAttribute( 'id', 'createpage_upload_file' + o.num );
		neoInput.setAttribute( 'name', 'wpUploadFile' + o.num );
		neoInput.setAttribute( 'tabindex', '-1' );

		thisContainer.appendChild( neoInput );
		YAHOO.util.Event.addListener( 'createpage_upload_file' + o.num, 'change', YAHOO.CreatepageInfobox.Upload, {"num" : o.num } );

		YAHOO.util.Dom.get( 'createpage_upload_file' + o.num ).style.display = 'none';
	}
}

YAHOO.CreatepageInfobox.InputTest = function( el ) {
	if ( el.id.match( 'wpInfoboxPar' ) ) {
		return true;
	} else {
		return false;
	}
}

YAHOO.CreatepageInfobox.InputEvent = function( el ) {
	var j = parseInt( el.id.replace( 'wpInfoboxPar', '' ) );
	YAHOO.util.Event.onContentReady( 'wpInfoboxPar' + j, YAHOO.Createpage.ClearInput, {num: j} );
}

YAHOO.CreatepageInfobox.UploadTest = function( el ) {
	if ( el.id.match( 'createpage_upload_file' ) ) {
		return true;
	} else {
		return false;
	}
}

YAHOO.Createpage.InitialRound = function() {
	YAHOO.util.Dom.get('Createtitle').setAttribute('autocomplete', 'off');
	if ( ( YAHOO.Createpage.PreviewMode == 'No' ) && ( YAHOO.Createpage.RedLinkMode == 'No' ) ) {
		YAHOO.Createpage.ContentOverlay();
	} else {
		var catlink = YAHOO.util.Dom.get( 'catlinks' );
		if ( catlink ) {
			var newCatlink = document.createElement( 'div' );
			newCatlink.setAttribute( 'id', 'catlinks' );
			newCatlink.innerHTML = catlink.innerHTML;
			catlink.parentNode.removeChild( catlink );
			var previewArea = YAHOO.util.Dom.get( 'createpagepreview' );
			previewArea.insertBefore( newCatlink, YAHOO.util.Dom.get( 'createpage_preview_delimiter' ) );
		}
	}

	var edit_textareas = YAHOO.util.Dom.getElementsBy( YAHOO.Createpage.EditTextareaTest, 'textarea', YAHOO.util.Dom.get('wpTableMultiEdit'), YAHOO.Createpage.TextareaAddToolbar );
	if ( ( 'Yes' == YAHOO.Createpage.RedLinkMode ) && ( 'wpTextboxes0' == edit_textareas[0].id ) ) {
		edit_textareas[0].focus();
	} else {
		var el_id = parseInt( edit_textareas[0].id.replace( 'wpTextboxes', '' ) );
		YAHOO.util.Dom.get('toolbar' + el_id).style.display = '';
		YAHOO.Createpage.hideOtherBoxes( el_id );
	}
	YAHOO.Createpage.multiEditSetupToolbar();
	YAHOO.Createpage.multiEditSetupOptionalSections();
	YAHOO.Createpage.CheckCategoryCloud();
}

YAHOO.Createpage.ContentOverlay = function() {
	YAHOO.Createpage.Overlay = new YAHOO.widget.Overlay('createpageoverlay');
	YAHOO.Createpage.ResizeOverlay( 20 );
	YAHOO.Createpage.Overlay.render();
	var helperButton = YAHOO.util.Dom.get('wpRunInitialCheck');
	YAHOO.util.Event.addListener( helperButton, 'click', YAHOO.WRequest.watchTitle );
	helperButton.style.display = '';
}

YAHOO.Createpage.appendHeight = function( elem_height, number ) {
	var x_fixed_height = elem_height.replace('px', '');
	x_fixed_height = parseFloat( x_fixed_height ) + number;
	x_fixed_height = x_fixed_height.toString() + 'px';
	return x_fixed_height;
}

YAHOO.Createpage.ResizeOverlay = function( number ) {
	var cont_elem = new YAHOO.util.Element('cp-restricted');
	var fixed_height;
	var fixed_width;
	if ( cont_elem.getStyle( 'height' ) == 'auto' ) {
		fixed_height = YAHOO.util.Dom.get( 'cp-restricted' ).offsetHeight + number;
		fixed_width = YAHOO.util.Dom.get( 'cp-restricted' ).offsetWidth;
	} else {
		fixed_height = cont_elem.getStyle( 'height' );
		fixed_height = YAHOO.Createpage.appendHeight( fixed_height, number );
		fixed_width = cont_elem.getStyle( 'width' );
	}

	YAHOO.Createpage.Overlay.cfg.setProperty( 'height', fixed_height );
	YAHOO.Createpage.Overlay.cfg.setProperty( 'width', fixed_width );
}

YAHOO.util.Event.onContentReady( 'cp-multiedit', YAHOO.Createpage.InitialRound );

YAHOO.CreatepageInfobox.UploadEvent = function( el ) {
	var j = parseInt( el.id.replace( 'createpage_upload_file', '' ) );
	YAHOO.util.Event.addListener( 'createpage_upload_file' + j, 'change', YAHOO.CreatepageInfobox.Upload, {'num' : j } );
}

YAHOO.util.Event.addListener( 'wpAdvancedEdit', 'click', YAHOO.Createpage.showWarningPanel );
YAHOO.util.Event.addListener( 'Createtitle', 'focus', YAHOO.Createpage.clearTitleMessage );

function cloudAdd( category, num ) {
	category_text = YAHOO.util.Dom.get('wpCategoryTextarea');

	if ( category_text.value == '' ) {
		category_text.value += unescape( category );
	} else {
		category_text.value += '|' + unescape( category );
	}
	this_button = document.getElementById('cloud' + num);
	this_button.onclick = function() {
		eval("cloudRemove('" + category + "'," + num + ")");
		return false;
	}
	this_button.style['color'] = '#419636';
	return false;
};

function cloudInputAdd() {
	category_input = YAHOO.util.Dom.get('wpCategoryInput');
	category_text = YAHOO.util.Dom.get('wpCategoryTextarea');
	var category = category_input.value;
	if ( '' != category_input.value ) {
		if ( category_text.value == '' ) {
			category_text.value += unescape( category );
		} else {
			category_text.value += '|' + unescape( category );
		}
		category_input.value = '';
		var c_found = false;
		var core_cat = category.replace(/\|.*/,'');
		for ( j in YAHOO.Createpage.foundCategories ) {
			if ( YAHOO.Createpage.foundCategories[j] == core_cat ) {
				this_button = YAHOO.util.Dom.get( 'cloud' + j );
				var actual_cloud = YAHOO.Createpage.foundCategories[j];
				var cl_num = j;

				this_button.onclick = YAHOO.Createpage.onclickCategoryFn( core_cat, j );
				this_button.style.color = '#419636';
				c_found = true;
				break;
			}
		}
		if ( !c_found ) {
			var n_cat = document.createElement( 'a' );
			var s_cat = document.createElement( 'span' );
			n_cat_count = YAHOO.Createpage.foundCategories.length;

			var cat_full_section = YAHOO.util.Dom.get('createpage_cloud_section');
			var cat_num = n_cat_count;
			n_cat.setAttribute( 'id', 'cloud' + cat_num );
			n_cat.setAttribute( 'href', '#' );
			n_cat.onclick = YAHOO.Createpage.onclickCategoryFn( core_cat, cat_num );
			n_cat.style.color = '#419636';
			n_cat.style.fontSize = '10pt';
			s_cat.setAttribute( 'id', 'tag' + cat_num );
			t_cat = document.createTextNode( core_cat );
			space = document.createTextNode( ' ' );
			n_cat.appendChild( t_cat );
			s_cat.appendChild( n_cat );
			s_cat.appendChild( space );
			cat_full_section.appendChild( s_cat );
			YAHOO.Createpage.foundCategories[n_cat_count] = core_cat;
		}
	}
}

function cloudRemove( category, num ) {
	category_text = YAHOO.util.Dom.get('wpCategoryTextarea');
	this_pos = category_text.value.indexOf( unescape( category ) );
	if ( this_pos != -1 ) {
		category_text.value = category_text.value.substr( 0, this_pos - 1 ) + category_text.value.substr( this_pos + unescape( category ).length );
	}
	this_button = document.getElementById('cloud' + num);
	this_button.onclick = function() {
		eval("cloudAdd('" + category + "'," + num + ")");
		return false;
	};
	this_button.style['color'] = '';
	return false;
};

function cloudBuild( o ) {
	var categories = o.value;
	new_text = '';
	categories = categories.split('|');
	for ( i = 0; i < categories.length; i++ ) {
		if ( categories[i] != '' ) {
			new_text += '[[Category:' + categories[i] + ']]';
		}
	}
	return new_text;
};

/*]]>*/
</script>

<?php if ( !$ispreview ) { ?>

<div id="templateThumbs">
<?php } ?>
		<?php $elements_for_yui = array();
			if ( !$ispreview ) {
?>

		<?php foreach ( $data as $e => $element ): ?>
			<?php $name = $element['page']; ?>
			<?php $label = str_replace( ' Page', '', $element['label'] ); ?>

			<?php $elements_for_yui[] = "'cp-template-{$name}'"; ?>

			<?php
			$thumb = '';
			if ( !empty( $element['preview'] ) ) {
				$thumb = "<img id=\"cp-template-$name-thumb\" src=\"" . $element['preview'] . "\" alt=\"$name\" />";
			} else {
			}
			?>

	<div class="templateFrame<?php if ( $e == count( $data ) - 1 ) { ?> templateFrameLast<?php } ?><?php if ( $selected[$name] == 'checked' ) { ?> templateFrameSelected<?php } ?>" id="cp-template-<?php echo $name ?>">
		<label for="cp-template-<?php echo $name ?>-radio">
		<?php echo $thumb ?>
		</label>
		<div>
			<input type="radio" name="createplates" id="cp-template-<?php echo $name ?>-radio" value="<?php echo $name ?>" <?php echo $selected[$name] ?> />
			<label for="cp-template-<?php echo $name ?>-radio"><?php echo $label ?></label>
		</div>
	</div>
		<?php endforeach; ?>
</div>

<?php } ?>

<div style="clear: both"></div>

<script type="text/javascript">
/*<![CDATA[*/

var myid = 0;

YAHOO.Createpage.TestInfoboxToggle = function() {
	var listeners = YAHOO.util.Event.getListeners('cp-infobox-toggle');
	if ( listeners ) {
		for ( var i = 0; i < listeners.length; ++i ) {
			var listener = listeners[i];
			if ( listener.type != 'click' ) {
				YAHOO.util.Event.addListener( 'cp-infobox-toggle', 'click', YAHOO.WRequest.toggle, ['cp-infobox', 'cp-infobox-toggle'] );
			}
		}
	} else {
		YAHOO.util.Event.addListener( 'cp-infobox-toggle', 'click', YAHOO.WRequest.toggle, ['cp-infobox', 'cp-infobox-toggle'] );
	}
}

YAHOO.Createpage.MultiEdit = function() {
	var elements = [<?php echo join( ', ', $elements_for_yui ) ?>];
	var callback = 	{
		success: function( e ) {
			YAHOO.util.Dom.get('cp-multiedit').innerHTML = '';

			if( /^("(\\.|[^"\\\n\r])*?"|[,:{}\[\]0-9.\-+Eaeflnr-u \n\r\t])+?$/.test( e.responseText ) ) {
				var res = eval( '(' + e.responseText + ')' );
			}
			if ( '' != res ) {
				YAHOO.util.Dom.get('cp-multiedit').innerHTML = res;
			}

			var i;
			for ( i in elements ) {
				YAHOO.util.Dom.get( elements[i] ).className = 'templateFrame';
			}

			YAHOO.util.Dom.get( myid ).className += ' templateFrameSelected';

			YAHOO.util.Event.onAvailable( 'cp-infobox-toggle', YAHOO.Createpage.TestInfoboxToggle );

			var infobox_root = YAHOO.util.Dom.get('cp-infobox');
			var infobox_inputs = YAHOO.util.Dom.getElementsBy( YAHOO.CreatepageInfobox.InputTest, 'input', infobox_root, YAHOO.CreatepageInfobox.InputEvent );
			var infobox_uploads = YAHOO.util.Dom.getElementsBy( YAHOO.CreatepageInfobox.UploadTest, 'input', infobox_root, YAHOO.CreatepageInfobox.UploadEvent );
			var content_root = YAHOO.util.Dom.get( 'wpTableMultiEdit' );
			var section_uploads = YAHOO.util.Dom.getElementsBy( YAHOO.Createpage.UploadTest, 'input', content_root, YAHOO.Createpage.UploadEvent );

			var cloud_div = YAHOO.util.Dom.get( 'createpage_cloud_div' );
			if ( null != cloud_div ) {
				cloud_div.style.display = 'block';
			}
			YAHOO.Createpage.CheckCategoryCloud();

			var cont_elem = new YAHOO.util.Element( 'cp-restricted' );

			if ( YAHOO.Createpage.Overlay && ( YAHOO.util.Dom.get('createpageoverlay').style.visibility != 'hidden' ) ) {
				YAHOO.Createpage.ResizeOverlay( 20 );
			}

			YAHOO.Createpage.multiEditTextboxes = [];
			YAHOO.Createpage.multiEditButtons = [];
			YAHOO.Createpage.multiEditCustomButtons = [];

			var edit_textareas = YAHOO.util.Dom.getElementsBy( YAHOO.Createpage.EditTextareaTest, 'textarea', content_root, YAHOO.Createpage.TextareaAddToolbar );
			// Link Suggest
			/*var link_sugg_area = YAHOO.util.Dom.get( 'wpTextbox1_container' );
			if ( link_sugg_area ) {
				if( YAHOO.env.ua.ie > 0 || YAHOO.env.ua.gecko > 0 ) {
					var oDS = new YAHOO.widget.DS_XHR( wgServer + wgScriptPath, ['results', 'title', 'title_org'] );
					oDS.scriptQueryAppend = 'action=ajax&rs=getLinkSuggest';

					var content_root = YAHOO.util.Dom.get( 'wpTableMultiEdit' );
					var edit_textareas = YAHOO.util.Dom.getElementsBy(function( el ) {
							if ( el.id.match( 'wpTextboxes' ) && ( el.style.display != 'none' ) ) {
								return true;
							} else {
								return false;
							}
						}, 'textarea', content_root, function( el ) {
							LS_PrepareTextarea( el.id, oDS );
					});
				}
			}*/

			if ( ( 'Yes' == YAHOO.Createpage.RedLinkMode ) && ( 'wpTextboxes0' == edit_textareas[0].id ) ) {
				edit_textareas[0].focus();
			} else {
				var el_id = parseInt( edit_textareas[0].id.replace( 'wpTextboxes', '' ) );
				YAHOO.util.Dom.get( 'toolbar' + el_id ).style.display = '';
				YAHOO.Createpage.hideOtherBoxes( el_id );
			}

			var edittools_div = YAHOO.util.Dom.get( 'createpage_editTools' );
			if ( edittools_div ) {
				if ( 'cp-template-Blank' != myid ) {
					edittools_div.style.display = 'none';
				} else {
					edittools_div.style.display = '';
				}
			}

			YAHOO.Createpage.multiEditSetupToolbar();
			YAHOO.Createpage.multiEditSetupOptionalSections();
		},
		failure: function(e) {
			YAHOO.util.Dom.get('cp-multiedit').innerHTML = '';
		},
		timeout: 50000
	};

	return {
		init: function() {
			YAHOO.util.Event.addListener( elements, 'click', this.switchTemplate );

			var i, src, tt;
			for ( i in elements ) {
				YAHOO.util.Dom.setStyle( elements[i] + '-radio', 'display', 'none' );
			}
		},
		switchTemplate: function( e ) {
			myid = this.id;
			YAHOO.util.Event.preventDefault(e);

			YAHOO.util.Dom.get('cp-multiedit').innerHTML = '<img src="' + wgServer + wgScriptPath + '/extensions/CreateAPage/images/progress_bar.gif" width="70" height="11" alt="<?php echo wfMsg( 'createpage-please-wait' ) ?>" border="0" />';
			if ( YAHOO.Createpage.Overlay ) {
				YAHOO.Createpage.ResizeOverlay( 20 );
			}
			YAHOO.util.Connect.asyncRequest('GET', ajaxpath + '?action=ajax&rs=axMultiEditParse&template=' + this.id.replace('cp-template-', ''), callback);
		}
	};
}();

YAHOO.Createpage.MultiEdit.init();

YAHOO.Createpage.CheckExistingTitle = function( e ) {
	if ( YAHOO.util.Dom.get('Createtitle').value == '' ) {
		YAHOO.util.Event.preventDefault(e);
		YAHOO.util.Dom.get('cp-title-check').innerHTML = '<span style="color: red;"><?php echo wfMsg( 'createpage-give-title' ) ?></span>';
		window.location.hash = 'title_loc';
		YAHOO.Createpage.SubmitEnabled = false;
	} else if ( true == NoCanDo ) {
		TitleDialog = new YAHOO.widget.SimpleDialog("dlg", {
			width: "20em",
			effect: {effect:YAHOO.widget.ContainerEffect.FADE,
			duration:0.4},
			fixedcenter:true,
			modal:true,
			visible:false,
			draggable:false });
		TitleDialog.setHeader("<?php echo wfMsg( 'createpage-title-check-header' ); ?>");
		TitleDialog.setBody("<?php echo wfMsg( 'createpage-title-check-text' ); ?>");
		TitleDialog.cfg.setProperty( 'icon', YAHOO.widget.SimpleDialog.ICON_WARN );
		TitleDialog.cfg.setProperty( 'zIndex', 1000 );
		TitleDialog.render( document.body );
		TitleDialog.show();
		YAHOO.util.Event.preventDefault(e);
		YAHOO.Createpage.SubmitEnabled = false;
	}
	if (
		( YAHOO.Createpage.SubmitEnabled !== true ) ||
		( YAHOO.Createpage.Overlay && ( YAHOO.util.Dom.get('createpageoverlay').style.visibility != 'hidden' ) )
	) {
		YAHOO.util.Event.preventDefault(e);
	}
}

YAHOO.Createpage.SubmitEnable = function( e ) {
	YAHOO.Createpage.SubmitEnabled = true;
}

YAHOO.util.Event.addListener( 'createpageform', 'submit', YAHOO.Createpage.CheckExistingTitle );
YAHOO.util.Event.addListener( 'wpSave', 'click', YAHOO.Createpage.SubmitEnable );
YAHOO.util.Event.addListener( 'wpPreview', 'click', YAHOO.Createpage.SubmitEnable );
YAHOO.util.Event.addListener( 'wpCancel', 'click', YAHOO.Createpage.SubmitEnable );

/*]]>*/
</script>
<?php if ( !$ispreview ) { ?>
</div>
</fieldset>
<?php } ?>
<div style="display: none;" id="createpage_advanced_warning">
	<div class="boxHeader color1"><?php echo wfMsg( 'createpage-edit-normal' ) ?></div>
		<div class="warning_text"><?php echo wfMsg( 'createpage-advanced-warning' ) ?></div>
		<div class="warning_buttons">
			<input type="submit" id="wpCreatepageWarningYes" name="wpCreatepageWarningYes" value="<?php echo wfMsg( 'createpage-yes' ) ?>" style="font-weight:bolder" />
			<input type="submit" id="wpCreatepageWarningNo" name="wpCreatepageWarningNo" value="<?php echo wfMsg( 'createpage-no' ) ?>" />
		</div>
</div>
	<div id="createpage_createplate_list"></div>
	<noscript>
		<div class="actionBar">
			<input type="submit" name="wpSubmitCreateplate" id="wpSubmitCreateplate" value="<?php echo wfMsg( 'createpage-button-createplate-submit' ) ?>" class="button color1"/>
		</div>
	</noscript>

<br />
<div class="actionBar">
<a name="title_loc"></a>
<?php if ( !$isredlink ) { ?>
<label for="Createtitle" id="Createtitlelabel"><?php echo wfMsg( 'createpage-title-caption' ) ?></label>
<input name="Createtitle" id="Createtitle" size="50" value="<?php echo htmlspecialchars( $createtitle ) ?>" maxlength="250" />
<?php } else { ?>
<div id="createpageinfo"><?php echo $aboutinfo ?></div>
<input type="hidden" name="Createtitle" id="Createtitle" value="<?php echo $createtitle ?>" />
<input type="hidden" name="Redlinkmode" id="Redlinkmode" value="<?php echo $isredlink ?>" />
<?php } ?>
<input id="wpRunInitialCheck" class="button color1" type="button" value="<?php echo wfMsg( 'createpage-initial-run' ) ?>" style="display: none;" />
<?php if ( !$isredlink ) { ?>
<input type="submit" id="wpAdvancedEdit" name="wpAdvancedEdit" value="<?php echo wfMsg( 'createpage-edit-normal' ) ?>" class="button color1" />
<?php } ?>
<div id="cp-title-check">&nbsp;</div>
</div>
<br />
<!-- e:<?php echo __FILE__ ?> -->