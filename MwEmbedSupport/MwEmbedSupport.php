<?php 

return array(
	"mwEmbedStartup" => array( 
		'scripts' => array( 
			"mwEmbedSupport.js",
		),
		'dependencies' => array(
			// jQuery dependencies:
			'jquery.triggerQueueCallback',
			'jquery.mwEmbedUtil',
		),				
		'messageFile' => 'MwEmbedSupport.i18n.php',
	),	
	
	// All the mwEmbed Support components that are not needed for mwEmbed loader.js files:  
	// Right now this is only css files. 
	'mwEmbedSupport' => array(
		'styles' => 'skins/common/mw.style.mwCommon.css',	 
		'skinStyles' => array(
			/* shared jQuery ui skin styles */
			'darkness' => 'skins/jquery.ui.themes/darkness/jquery-ui-1.7.2.css',
			'kaltura-dark' => 'skins/jquery.ui.themes/kaltura-dark/jquery-ui-1.7.2.css',
			'le-frog' => 'skins/jquery.ui.themes/le-frog/jquery-ui-1.7.2.css',
			'redmond' => 'skins/jquery.ui.themes/redmond/jquery-ui-1.7.2.css',
			'start' => 'skins/jquery.ui.themes/start/jquery-ui-1.7.2.css',
			'sunny' => 'skins/jquery.ui.themes/sunny/jquery-ui-1.7.2.css',	
		)
	),
	'jquery.menu' => array(
		'scripts' => 'jquery.menu/jquery.menu.js',
		'styles' => 'jquery.menu/jquery.menu.css'
	),			
	"jquery.triggerQueueCallback"	=> array( 'scripts'=> "jquery/jquery.triggerQueueCallback.js" ),
	"jquery.mwEmbedUtil" => array( 'scripts' => "jquery/jquery.mwEmbedUtil.js" ),
);
