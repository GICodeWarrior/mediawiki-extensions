<?php
/**
 * Special:UploadWizard
 *
 * Easy to use multi-file upload page.
 *
 * @file
 * @ingroup SpecialPage
 * @ingroup Upload
 */

class SpecialUploadWizard extends SpecialPage {
	// the HTML form without javascript
	private $simpleForm;

	// $request is the request (usually wgRequest)
	// $par is everything in the URL after Special:UploadWizard. Not sure what we can use it for
	public function __construct( $request=null, $par=null ) {
		global $wgRequest;
		// here we would configure ourselves based on stuff in $request and $wgRequest, but so far, we
		// don't have such things

		parent::__construct( 'UploadWizard', 'upload' );

		// create a simple form for non-JS fallback, which targets the old Special:Upload page.
		// at some point, if we completely subsume its functionality, change that to point here again,
	 	// but then we'll need to process non-JS uploads in the same way Special:Upload does.
		$this->simpleForm = new UploadWizardSimpleForm();
		$this->simpleForm->setTitle( 
			SpecialPage::getPage( 'Upload' )->getTitle() 
		);
	}

	/**
	 * Replaces default execute method
	 * Checks whether uploading enabled, user permissions okay, 
	 * @param subpage, e.g. the "foo" in Special:UploadWizard/foo. 
	 */
	public function execute( $subPage ) {
		global $wgLang, $wgUser, $wgOut, $wgExtensionAssetsPath,
		       $wgUploadWizardDebug, $wgUploadWizardDisableResourceLoader;

		// side effects: if we can't upload, will print error page to wgOut 
		// and return false
		if (! ( $this->isUploadAllowed() && $this->isUserUploadAllowed( $wgUser ) ) ) {
			return;
		}

		$this->setHeaders();
		$this->outputHeader();
			

		// fallback for non-JS
		$wgOut->addHTML('<noscript>');
		$wgOut->addHTML( '<p class="errorbox">' . wfMsg( 'mwe-upwiz-js-off' ) . '</p>' );
		$this->simpleForm->show();
		$wgOut->addHTML('</noscript>');


		// global javascript variables	
		$this->addJsVars( $subPage );
		
		// dependencies (css, js)	
		if ( !$wgUploadWizardDisableResourceLoader && class_exists( 'ResourceLoader' ) ) {
			$wgOut->addModules( 'ext.uploadWizard' );
		} else {
			$basepath = "$wgExtensionAssetsPath/UploadWizard";
			$dependencyLoader = new UploadWizardDependencyLoader( $wgLang->getCode() );
			if ( $wgUploadWizardDebug ) {
				// each file as an individual script or style
				$dependencyLoader->outputHtmlDebug( $wgOut, $basepath );
			} else {
				// combined & minified
				$dependencyLoader->outputHtml( $wgOut, $basepath );
			}
		}
		
		// where the uploadwizard will go
		// TODO import more from UploadWizard's createInterface call.
		$wgOut->addHTML( self::getWizardHtml() );
 	
	}

	/**
	 * Adds some global variables for our use, as well as initializes the UploadWizard
	 * @param subpage, e.g. the "foo" in Special:UploadWizard/foo
	 */
	public function addJsVars( $subPage ) {
		global $wgUser, $wgOut;
		global $wgUseAjax, $wgAjaxLicensePreview, $wgEnableAPI;
		global $wgEnableFirefogg, $wgFileExtensions;
		global $wgUploadWizardDebug;

		$wgOut->addScript( Skin::makeVariablesScript( array(
			'wgUploadWizardDebug' => (bool)$wgUploadWizardDebug,

			// uncertain if this is relevant. Can we do license preview with API?
			'wgAjaxLicensePreview' => $wgUseAjax && $wgAjaxLicensePreview,

			'wgEnableFirefogg' => (bool)$wgEnableFirefogg,

			// what is acceptable in this wiki
			'wgFileExtensions' => $wgFileExtensions,

			'wgSubPage' => $subPage

			// XXX need to have a better function for testing viability of a filename
			// 'wgFilenamePrefixBlacklist' => UploadBase::getFilenamePrefixBlacklist()

		) ) );

	}

	/**
	 * Check if anyone can upload (or if other sitewide config prevents this)
	 * Side effect: will print error page to wgOut if cannot upload.
	 * @return boolean -- true if can upload
	 */
	private function isUploadAllowed() {
		global $wgOut, $wgEnableAPI;

		// Check uploading enabled
		if( !UploadBase::isEnabled() ) {
			$wgOut->showErrorPage( 'uploaddisabled', 'uploaddisabledtext' );
			return false;
		}

		// XXX does wgEnableAPI affect all uploads too?

		// Check whether we actually want to allow changing stuff
		if( wfReadOnly() ) {
			$wgOut->readOnlyPage();
			return false;
		}	

		// we got all the way here, so it must be okay to upload
		return true;
	}

	/**
	 * Check if the user can upload 
	 * Side effect: will print error page to wgOut if cannot upload.
	 * @param User
	 * @return boolean -- true if can upload
	 */
	private function isUserUploadAllowed( $user ) {
		global $wgOut, $wgGroupPermissions;

		if( !$user->isAllowed( 'upload' ) ) {
			if( !$user->isLoggedIn() && ( $wgGroupPermissions['user']['upload']
				|| $wgGroupPermissions['autoconfirmed']['upload'] ) ) {
				// Custom message if logged-in users without any special rights can upload
				$wgOut->showErrorPage( 'uploadnologin', 'uploadnologintext' );
			} else {
				$wgOut->permissionRequired( 'upload' );
			}
			return false;
		}

		// Check blocks
		if( $user->isBlocked() ) {
			$wgOut->blockedPage();
			return false;
		}

		// we got all the way here, so it must be okay to upload
		return true;
	}

	/**
	 * Return the basic HTML structure for the entire page 
	 * Will be enhanced by the javascript to actually do stuff
	 * @return {String} html
	 */
	function getWizardHtml() {
		// TODO loading spinner, hide these by default till enhanced?
		return
		  '<div id="upload-wizard" class="upload-section">'

		    // the arrow steps
		.   '<ul id="mwe-upwiz-steps">'
		.     '<li id="mwe-upwiz-step-tutorial"><div>' . wfMsg('mwe-upwiz-step-tutorial') . '</div></li>'
		.     '<li id="mwe-upwiz-step-file"><div>' . wfMsg('mwe-upwiz-step-file') . '</div></li>'
		.     '<li id="mwe-upwiz-step-deeds"><div>'  . wfMsg('mwe-upwiz-step-deeds')  . '</div></li>'
		.     '<li id="mwe-upwiz-step-details"><div>'  . wfMsg('mwe-upwiz-step-details')  . '</div></li>'
		.     '<li id="mwe-upwiz-step-thanks"><div>'   . wfMsg('mwe-upwiz-step-thanks')  .  '</div></li>'
		.   '</ul>'

		    // the individual steps, all at once
		.   '<div id="mwe-upwiz-content">'

		.     '<div class="mwe-upwiz-stepdiv" id="mwe-upwiz-stepdiv-tutorial">'
		.       '<div id="mwe-upwiz-tutorial">' 
		.  	   UploadWizardTutorial::getHtml()
		.       '</div>'
		.       '<div class="mwe-upwiz-buttons">'
		.          '<button class="mwe-upwiz-button-next">' . wfMsg( "mwe-upwiz-next" )  . '</button>'
		.       '</div>'		
		.     '</div>'

		.     '<div class="mwe-upwiz-stepdiv ui-helper-clearfix" id="mwe-upwiz-stepdiv-file">'
		.       '<div id="mwe-upwiz-files">'
		.	  '<div id="mwe-upwiz-filelist" class="ui-corner-all"></div>'
		.         '<div id="mwe-upwiz-upload-ctrls" class="mwe-upwiz-file ui-helper-clearfix">'
		.            '<div id="mwe-upwiz-add-file-container" class="mwe-upwiz-add-files-0">'
		.              '<button id="mwe-upwiz-add-file">' . wfMsg("mwe-upwiz-add-file-0") . '</button>'
		.  	     '</div>'
		.	     '<div id="mwe-upwiz-upload-ctrl-container">'
		.		'<button id="mwe-upwiz-upload-ctrl">' . wfMsg( "mwe-upwiz-upload" ) . '</button>'
		.	     '</div>'
		.         '</div>'
		.         '<div id="mwe-upwiz-progress" class="ui-helper-clearfix"></div>'
		.         '<div id="mwe-upwiz-continue" class="ui-helper-clearfix"></div>'
		.       '</div>'
		.       '<div class="mwe-upwiz-buttons">'
		.	   '<div class="mwe-upwiz-file-next-all-ok mwe-upwiz-file-endchoice">' 
		.             wfMsg( "mwe-upwiz-file-all-ok" )   
		.             '<button class="mwe-upwiz-button-next">' . wfMsg( "mwe-upwiz-next-file" )  . '</button>'
		.          '</div>'
		.	   '<div class="mwe-upwiz-file-next-some-failed mwe-upwiz-file-endchoice">' 
		.             wfMsg( "mwe-upwiz-file-some-failed" )   
		.             '<button class="mwe-upwiz-button-retry">' . wfMsg( "mwe-upwiz-file-retry" )  . '</button>'
		.             '<button class="mwe-upwiz-button-next">' . wfMsg( "mwe-upwiz-next-file-despite-failures" )  . '</button>'
		.          '</div>'
		.	   '<div class="mwe-upwiz-file-next-all-failed mwe-upwiz-file-endchoice">' 
		.             wfMsg( "mwe-upwiz-file-all-failed" )   
		.             '<button class="mwe-upwiz-button-retry"> ' . wfMsg( "mwe-upwiz-file-retry" )  . '</button>'
		.          '</div>'
		.       '</div>'
		.     '</div>'

		.     '<div class="mwe-upwiz-stepdiv" id="mwe-upwiz-stepdiv-deeds">'
		.       '<div id="mwe-upwiz-deeds-intro"></div>'
		.       '<div id="mwe-upwiz-deeds-thumbnails" class="ui-helper-clearfix"></div>'
		.       '<div id="mwe-upwiz-deeds" class="ui-helper-clearfix"></div>'
		.       '<div id="mwe-upwiz-deeds-custom" class="ui-helper-clearfix"></div>'
		.       '<div class="mwe-upwiz-buttons"/>'
		.          '<button class="mwe-upwiz-button-next">' . wfMsg( "mwe-upwiz-next-deeds" )  . '</button>'
		.       '</div>'
		.     '</div>'

		.     '<div class="mwe-upwiz-stepdiv" id="mwe-upwiz-stepdiv-details">'
		.       '<div id="mwe-upwiz-macro">'
		.         '<div id="mwe-upwiz-macro-progress" class="ui-helper-clearfix"></div>'
		.         '<div id="mwe-upwiz-macro-choice">' 
		.    	 '<div>' . wfMsg( 'mwe-upwiz-details-intro' ) . '</div>' 
		.         '</div>'
		.         '<div id="mwe-upwiz-macro-files"></div>'
		.       '</div>'
		.       '<div class="mwe-upwiz-buttons"/>'
		.          '<button class="mwe-upwiz-button-next">' . wfMsg( "mwe-upwiz-next-details" )  . '</button>'
		.       '</div>'
		.     '</div>'

		.     '<div class="mwe-upwiz-stepdiv" id="mwe-upwiz-stepdiv-thanks">'
		.       '<div id="mwe-upwiz-thanks"></div>'
		.       '<div class="mwe-upwiz-buttons"/>'
		.          '<button class="mwe-upwiz-button-home">' . wfMsg( "mwe-upwiz-home" ) . '</button>'
		.          '<button class="mwe-upwiz-button-begin">' . wfMsg( "mwe-upwiz-upload-another" )  . '</button>'
		.       '</div>'
		.     '</div>'

		.   '</div>'

		.   '<div class="mwe-upwiz-clearing"></div>'

		. '</div>';
	}
 
}


/**
 * This is a hack on UploadForm, to make one that works from UploadWizard when JS is not available.
 */
class UploadWizardSimpleForm extends UploadForm {

	/*
 	 * Normally, UploadForm adds its own Javascript.
 	 * We wish to prevent this, because we want to control the case where we have Javascript.
 	 * So, we make the addUploadJS a no-op.
	 */
	protected function addUploadJS( ) { }

}


