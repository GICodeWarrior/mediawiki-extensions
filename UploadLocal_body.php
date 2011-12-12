<?php

class UploadLocal extends SpecialPage {
	function __construct() {
		parent::__construct( 'UploadLocal',  'uploadlocal' );
		wfLoadExtensionMessages( 'UploadLocal' );
	}

	function execute( $par ) {
		global $wgRequest, $wgUploadLocalDirectory, $wgMessageCache;
		wfLoadExtensionMessages( 'UploadLocal' );
		
		$prefix = 'extensions/UploadLocal/';
		require($prefix . 'UploadLocalDirectory.php');
		require($prefix . 'UploadLocalForm.php');
		
		$directory = new UploadLocalDirectory($wgRequest, $wgUploadLocalDirectory);
		$directory->execute();
	}
}
