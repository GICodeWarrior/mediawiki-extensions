<?php
/**
 * Hooks for ResearchTools extension
 * 
 * @file
 * @ingroup Extensions
 */

class ResearchToolsHooks {

	/* Protected Static Members */

	protected static $modules = array(
		'ext.researchTools' => array(
			'scripts' => 'ext.researchTools/ext.researchTools.js',
			'styles' => 'ext.researchTools/ext.researchTools.css',
		),
	);

	/*
	 * ResourceLoaderRegisterModules hook
	 */
	public static function resourceLoaderRegisterModules( &$resourceLoader ) {
		global $wgExtensionAssetsPath;
		$localpath = dirname( __FILE__ ) . '/modules';
		$remotepath = "$wgExtensionAssetsPath/ResearchTools/modules";
		foreach ( self::$modules as $name => $resources ) {
			$resourceLoader->register(
				$name, new ResourceLoaderFileModule( $resources, $localpath, $remotepath )
			);
		}
		return true;
	}
}
