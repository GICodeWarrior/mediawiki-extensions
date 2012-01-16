<?php

/**
 * Static class with utility functions for the Education Program extension.
 *
 * @since 0.1
 *
 * @file EPUtils.php
 * @ingroup EducationProgram
 *
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class EPUtils {

	public static function log( array $info ) {
		$user = array_key_exists( 'user', $info ) ? $info['user'] : $GLOBALS['wgUser'];
		
		if ( $info !== false ) {
			if ( class_exists( 'ManualLogEntry' ) ) {
				$logEntry = new ManualLogEntry( $info['type'], $info['subtype'] );

				$logEntry->setPerformer( $user );
				$logEntry->setTarget( $info['title'] );
				
				if ( array_key_exists( 'comment', $info ) ) {
					$logEntry->setComment( $info['comment'] );
				}
				
				if ( array_key_exists( 'parameters', $info ) ) {
					$logEntry->setParameters( $info['parameters'] );
				}

				$logid = $logEntry->insert();
				$logEntry->publish( $logid );
			}
			else {
				// Compatibility with MediaWiki 1.18.
				$log = new LogPage( $info['type'] );
				
				$log->addEntry(
					$info['subtype'],
					$info['title'],
					array_key_exists( 'comment', $info ) ? $info['comment'] : '',
					array_key_exists( 'parameters', $info ) ? $info['parameters'] : array(),
					$user
				);
			}
		}
	}
	
}
