<?php

/**
 * Class for the 'declare' parser functions.
 * 
 * @since 1.5.3
 * 
 * @file SMW_Declare.php
 * @ingroup SMW
 * @ingroup ParserHooks
 * 
 * @author Markus Krötzsch
 * @author Jeroen De Dauw
 */
class SMWDeclare {
	
	/**
	 * Method for handling the declare parser function.
	 * 
	 * @since 1.5.3
	 * 
	 * @param Parser $parser
	 */
	public static function render( Parser &$parser ) {
		if ( $frame->isTemplate() ) {
			foreach ( $args as $arg )
				if ( trim( $arg ) != '' ) {
					$expanded = trim( $frame->expand( $arg ) );
					$parts = explode( '=', $expanded, 2 );

					if ( count( $parts ) == 1 ) {
						$propertystring = $expanded;
						$argumentname = $expanded;
					} else {
						$propertystring = $parts[0];
						$argumentname = $parts[1];
					}

					$property = SMWPropertyValue::makeUserProperty( $propertystring );
					$argument = $frame->getArgument( $argumentname );
					$valuestring = $frame->expand( $argument );

					if ( $property->isValid() ) {
						$type = $property->getPropertyTypeID();

						if ( $type == '_wpg' ) {
							$matches = array();
							preg_match_all( '/\[\[([^\[\]]*)\]\]/', $valuestring, $matches );
							$objects = $matches[1];

							if ( count( $objects ) == 0 ) {
								if ( trim( $valuestring ) != '' ) {
									SMWParseData::addProperty( $propertystring, $valuestring, false, $parser, true );
								}
							} else {
								foreach ( $objects as $object ) {
									SMWParseData::addProperty( $propertystring, $object, false, $parser, true );
								}
							}
						} else {
							if ( trim( $valuestring ) != '' ) {
								SMWParseData::addProperty( $propertystring, $valuestring, false, $parser, true );
							}
						}

						$value = SMWDataValueFactory::newPropertyObjectValue( $property, $valuestring );
						// if (!$value->isValid()) continue;
					}
				}
		} else {
			// @todo Save as metadata
		}

		SMWOutputs::commitToParser( $parser ); // Not obviously required, but let us be sure.
		return '';		
	}
	
}