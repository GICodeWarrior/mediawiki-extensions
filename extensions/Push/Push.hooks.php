<?php

/**
 * Static class for hooks handled by the Push extension.
 * 
 * @since 0.1
 * 
 * @file Push.hooks.php
 * @ingroup Push
 * 
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
final class PushHooks {
	
	/**
	 * Adds a link to Admin Links page.
	 * 
	 * @since 0.1
	 * 
	 * @return true
	 */
	public static function addToAdminLinks( &$admin_links_tree ) {
	    $displaying_data_section = $admin_links_tree->getSection( wfMsg( 'smw_adminlinks_displayingdata' ) );
	
	    // Escape if SMW hasn't added links.
	    if ( is_null( $displaying_data_section ) ) return true;
	    $smw_docu_row = $displaying_data_section->getRow( 'smw' );
	
	    $maps_docu_label = wfMsg( 'adminlinks_documentation', wfMsg( 'maps_name' ) );
	    $smw_docu_row->addItem( AlItem::newFromExternalLink( 'http://mapping.referata.com/wiki/Maps', $maps_docu_label ) );
	
	    return true;
	}	
	
}