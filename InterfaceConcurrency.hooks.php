<?php

class InterfaceConcurrencyHooks {
	/**
	 * Adds Interface Concurrency JS to the output
	 *
	 * @param $output OutputPage
	 * @param $skin Skin
	 */
	public static function beforePageDisplay( &$output, &$skin ) {
		$output->addModules( array( 'jquery.interfaceConcurrency' ) );
		return true;
	}

	/**
	 * Runs InterfaceConcurrency schema updates#
	 *
	 * @param $updater DatabaseUpdater
	 */
	public static function onLoadExtensionSchemaUpdates( $updater = null ) {
		$dir = dirname( __FILE__ ) . '/sql';

		$updater->addExtensionTable( 'concurrencycheck', "$dir/concurrencycheck.sql" );

		return true;
	}
}
