<?php
# Copyright (C) 2008 Mark Johnston and Adam Mckaig
#
# This program is free software; you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation; either version 3 of the License, or
# (at your option) any later version.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
# GNU General Public License for more details.
#
# You should have received a copy of the GNU General Public License along
# with this program; if not, write to the Free Software Foundation, Inc.,
# 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.
#
# http://www.gnu.org/licenses/gpl-3.0.html

if (!defined('MEDIAWIKI'))
	die();

$wgExtensionCredits['other'][] = array(
	'path'           => __FILE__,
	'name'           => 'CustomToolbar',
	'author'         => array( 'Mark Johnston', 'Adam Mckaig', 'Evan Wheeler' ),
	'version'        => '0.1',
	'descriptionmsg' => 'ct-desc',
);

/* ---- INTERNATIONALIZATION ---- */
$wgExtensionMessagesFiles['CustomToolbar'] = dirname( __FILE__ ) . '/CustomToolbar.i18n.php';

//add file extensions for acceptable images and attachments
global $wgFileExtensions;
$wgFileExtensions = array( 'png', 'gif', 'jpg', 'jpeg', 'ogg', 'mp3', 'wav', 'doc', 'xls', 'csv', 'bmp', 'ppt', 'pdf', 'txt', 'rm', 'mov', 'avi' );

//these will get thumbnails and image links
$ct_uploadable_images = array('png', 'gif', 'jpg', 'jpeg' );
//these will get media links
//$ct_uploadable_attachments = array('ogg', 'mp3', 'wav', 'doc', 'xls', 'csv', 'bmp', 'ppt', 'pdf', 'txt', 'rm', 'mov', 'avi' );

$wgHooks['EditPage::showEditForm:initial'][] = "CustomToolbar_turnOffToolbar";
function CustomToolbar_turnOffToolbar() {
	global $wgUser, $wgHooks;

	/* if the user has the edit toolbar turned on, then turn
	 * it off (to hide the ugly toolbar), and add the BeforePageDisplay
	 * hook, too attach our replacement */
	if($wgUser->getOption('showtoolbar')) {
		$wgUser->setOption('showtoolbar', false);
		$wgHooks['BeforePageDisplay'][] = 'CustomToolbar_addAssets';
	}

	return true;
}

function CustomToolbar_addAssets(&$out) {
	global $wgScriptPath, $wgCustomToolbarMessages, $wgLanguageCode, $wgUser;

	/* add all messages for the current lang by iterating the
	 * global array, and converting it into a javascript hash */
	$js = "Uniwiki.i18n.add({\n";
	foreach ($wgCustomToolbarMessages[$wgLanguageCode] as $key => $str) {
		$js .= "\t'".$key."': \"".$str."\",\n";
	}

	// chop off last comma + newline, for IE
	$js = substr($js,0,strlen($js)-2)."})";
	$out->addInlineScript($js);

	$path = "$wgScriptPath/extensions/uniwiki/CustomToolbar";
	$out->addScript("<script type='text/javascript'>var AllowUserToUpload = ".($wgUser->isAllowed( 'upload' ) ? "true" : "false").";</script>\n");
	$out->addScript("<script type='text/javascript' src='$path/Element.Forms.js'></script>\n");
	$out->addScript("<script type='text/javascript' src='$path/CustomToolbar.js'></script>\n");
	$out->addScript("<style type='text/css'>@import '$path/style.css';</style>\n");
	return true;

}

$wgSpecialPages['CustomToolbarUpload'] = 'SpecialCustomToolbarUpload';

class SpecialCustomToolbarUpload extends SpecialPage {

	public function __construct(){
		parent::__construct( 'CustomToolbarUpload' );
	}

	function execute() {
		global $wgRequest;
		$form = new CustomToolbarUploadForm($wgRequest);
		$form->execute();
	}
}
$wgHooks['UploadComplete'][] = array('CustomToolbarUploadForm::showSuccess');
//XX TODO investigate FileUpload hook for attachment purposes
//$wgHooks['FileUpload'][] = array('CustomToolbarUploadForm::showSuccess', 'attachment');

require_once('includes/specials/SpecialUpload.php');

class CustomToolbarUploadForm extends UploadForm {
	/* Some code poached from Travis Derouin's <travis@wikihow.com>
	 * UploadPopup extension
	 */
	var $mType, $mSection, $mCaption, $mDestFile;

	function __construct(&$request) {
		$this->mType = $request->getVal('type');
		$this->mCaption = $request->getText('wpCaption');
		$this->mSection = $request->getVal('section');
		UploadForm::UploadForm($request);
	}

	function execute() {
		// override MW's UploadForm with only the bits we want
		global $wgOut, $wgStylePath, $wgRequest;
		$wgOut->setArticleBodyOnly(true);
		$wgOut->addHTML("
 			<html>
                <head>
                    <title>". wfMsg('ct_upload', htmlspecialchars( $this->mType ) ) . " </title>
                </head>
            	<body>");
		$wgOut->addHTML("<h2>". wfMsg('ct_upload', htmlspecialchars( $this->mType ) ) . " </h2>");
		UploadForm::execute();
		$titleObj = SpecialPage::getTitleFor( 'CustomToolbarUpload' );
        $wgOut->addHTML("
				<script type='text/javascript'>
				var myForm = document.getElementById('uploadwarning');
				if(myForm != null) {
					myForm.action='".$titleObj->getLocalURL( 'action=submit' )."';
					var el = document.createElement('input');
				    el.type = 'hidden';
				    el.name = 'wpDestFileWarningAck';
				    el.value = '".$wgRequest->GetVal("wpDestFileWarningAck")."';
					el.id = 'wpDestFileWarningAck'
				    myForm.appendChild(el);
					
					var el2 = document.createElement('input');
				    el2.type = 'hidden';
				    el2.name = 'wpDestFile';
				    el2.value = '".$wgRequest->GetVal("wpDestFile")."';
					el2.id = 'wpDestFile'
				    myForm.appendChild(el2);
					
					var el3 = document.createElement('input');
				    el3.type = 'hidden';
				    el3.name = 'type';
				    el3.value = '".$wgRequest->GetVal("type")."';
					el3.id = 'type'
				    myForm.appendChild(el3);
				}
				</script>
				</body>
        	</html>");
	}

	function mainUploadForm( $msg = '') {
		global $wgOut, $wgScriptPath, $wgStylePath, $wgRequest;
		if ( '' != $msg ) {
			$sub = wfMsgHtml( 'uploaderror' );
			$wgOut->addHTML( "<h2>{$sub}</h2>\n" .
			  "<span class='error'>{$msg}</span>\n" );
		}

		$source_filename = wfMsg('ct_select', $this->mType);
		$destination_filename = wfMsgHtml( 'destfilename' );
		$caption = $this->mType == 'image' ? wfMsg('ct_caption') : wfMsg('ct_link');
		$linkname = wfMsg('ct_link');
		$submit = wfMsg('ct_submit');

		$upload_button = wfMsgHtml( 'uploadbtn' );
		$cancel_button = wfMsg('cancel');

		$titleObj = SpecialPage::getTitleFor( 'CustomToolbarUpload' );
		$action = $titleObj->escapeLocalURL();

		$encDestFile = htmlspecialchars( $this->mDestFile );

		$icon_path = "{$wgScriptPath}/extensions/uniwiki/CustomToolbar/images/numbers/";
		/* The following form contains a strange hack for passing the section index id
		 * through the upload function so we know where to insert the file tag.
		 * This info is passed as wpDestFileWarningAck and retrieved from the returned,
		 * uploaded object as $image->mDestWarningAck (see includes/SpecialUpload.php)
		 * This parameter doesn't seem to be used for anything other than raising warnings,
		 * all of which we are ignoring ... for better or for worse
		 */
		 
		//Fixed the 3rd table row, since it was missing it's <tr> and </tr> tags! -- Tom Maaswinkel
		$wgOut->addHTML( "
				<form id='upload' name='uploadform' method='post' enctype='multipart/form-data' action=\"$action\">
					<table border='0'>
						<tr>
							<td align='left'><img src='{$icon_path}1.png' alt='1.' />
								<label for='wpUploadFile'>{$source_filename}</label></td>
							<td align='left'>
								<input type='file' name='wpUploadFile' id='wpUploadFile' "
								. ($this->mDestFile?"":"onchange=\"opener.Uniwiki.CustomToolbar.fillDestFilename(document.getElementById('wpUploadFile').value, document.getElementById('wpDestFile') )\" ") . "size='40' />
							</td>
						</tr>
						<tr>
				            <td align='left'><img src='{$icon_path}2.png' alt='2.' />
								<label for='wpCaption'>{$caption}</label></td>
				            <td align='left'>
				        			<input type='text' name=\"wpCaption\" size='40' />
				        	</td>
						</tr>
						<tr>
							<td align='left'><img src='{$icon_path}3.png' alt='3.' />
								<label for='wpUpload'>{$submit}</label></td>
							<td align='left'><input type='submit' name='wpUpload' value=\"{$upload_button}\" />
							<input type='button' name='wpCancel' onclick='window.close()' value=\"{$cancel_button}\"/></td>
						</tr>
						<tr>
							<td></td>
							<td>
								
								<input type='hidden' name='wpDestFileWarningAck' id='wpDestFileWarningAck' value='{$this->mSection}'/>
								<input type='hidden' name='wpDestFile' id='wpDestFile' />
								<input type='hidden' name='type' id='type' value='".$wgRequest->getVal("type")."' />
							</td>
						</tr>
					</table>
				</form>
		");
	}

	function showSuccess(&$file) {
		global $wgOut, $ct_uploadable_images, $ct_uploadable_attachments,$wgRequest;

		//styles copied from monobook/main.css
		//modified to not float the whole preview to the right
		$wgOut->addHTML("
		<style>
		/* thumbnails */
		div.thumb {
			margin-bottom: .5em;
			border-style: solid;
			border-color: white;
			width: auto;
		}
		div.thumbinner {
			border: 1px solid #ccc;
			padding: 3px !important;
			background-color: #f9f9f9;
			font-size: 94%;
			text-align: center;
			overflow: hidden;
		}
		html .thumbimage {
			border: 1px solid #ccc;
		}
		html .thumbcaption {
			border: none;
			text-align: left;
			line-height: 1.4em;
			padding: 3px !important;
			font-size: 94%;
		}
		div.magnify {
			float: right;
			border: none !important;
			background: none !important;
		}
		div.magnify a, div.magnify img {
			display: block;
			border: none !important;
			background: none !important;
		}
		div.tright {
			border-width: .5em 0 .8em 1.4em;
		}
		div.tleft {
			margin-right: .5em;
			border-width: .5em 1.4em .8em 0;
		}
		img.thumbborder {
			border: 1px solid #dddddd;
		}
		.hiddenStructure {
			display: none;
		}
		</style>
		");
		$wgOut->redirect('');
		$wgOut->addHTML("<h2>" . wfMsg('ct_success') . "</h2>");

		//make wiki markup for the file
		$ext = explode('.', $file->mDestName );
		$extension = $ext[count( $ext ) - 1];
		$filelink = "";
		
		//Fix by Tom Maaswinkel for bug #16535
		//If the file has an image extension and you are uploading an image (not an attachment)
		//Then use the Image tag
		if (in_array(strtolower($extension), $ct_uploadable_images ) && strtolower($wgRequest->getVal("type")) == "image" ){
			$file_link = '[[' . 'Image:' . $file->mDestName .  '|thumb|' . $file->mCaption . ']]';
		}
		else // Otherwise use the Media tag (we're uploading an attachment)
		{
        	$file_link = '[[' . 'Media:' . $file->mDestName . '|' . $file->mCaption . ']]';
		}

		$titleObj = SpecialPage::getTitleFor( 'CustomToolbarUpload' );
		//insert the wiki markup in the appropriate section
		//or the classic-mode textarea if we are in classic-mode
		if($file->mDestWarningAck != 'wpTextbox1'){
			$insertion = 'opener.Uniwiki.CustomToolbar.insertIntoSection(section, file_link)';
		}else{
			$insertion = 'opener.Uniwiki.CustomToolbar.insertIntoClassic(file_link)';
		}
			$wgOut->addHTML( "
	              	<script type='text/javascript'>
		                var file_link = \"{$file_link}\";
		                var caption = \"{$file->mCaption}\";
		                var section =\"{$file->mDestWarningAck}\";
						{$insertion};
					</script>
	        ");

		//show a thumbnail of the image as it will appear on the page
		$wgOut->addWikiText($file_link);
		$wgOut->addHTML("
				<a href='#' onclick='window.close()'>" . wfMsg('ct_close') . "</a>
				</div>
        ");
		/* The UploadComplete hook is placed before the usual MW redirection
		 * that follows a successful upload, so in order to show our success
		 * page and insert the markup, we dump this output and kill the process
		 * to avoid redirection to the file's page.
		 */
		print($wgOut->output());
		exit;
	}

	//XX TODO make a prettier error page
	//function showError() {
	//}
}
