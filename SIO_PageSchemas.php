<?php

/**
 * Functions for handling Semantic Internal Objects data within the Page Schemas
 * extension.
 * 
 * @author Yaron Koren
 * @file SIO_PageSchemas.php
 * @ingroup SIO
 */

class SIOPageSchemas {

	/**
	 * Returns the display info for the property (if any is defined)
	 * for a single field in the Page Schemas XML.
	 */
	function getPropertyDisplayInfo( $templateXML, &$text_object ) {
		foreach ( $templateXML->children() as $tag => $child ) {
			if ( $tag == "semanticinternalobjects_MainProperty" ) {
				$propName = $child->attributes()->name;
				$values = array();
				$text_object['sio'] = array( 'Internal property', $propName, '#FF8', $values );
				break;
			}
		}
		return true;
	}

	/**
	 * Constructs XML for the SIO property, based on what was submitted
	 * in the 'edit schema' form.
	 */
	function getTemplateXML( $request, &$xmlArray ) {
		$fieldNum = -1;
		$templatePerField = array();
		foreach ( $request->getValues() as $var => $val ) {
			if ( substr( $var, 0, 18 ) == 'sio_property_name_' ) {
				$templateNum = substr( $var, 18 );
				$xml = '<semanticinternalobjects_MainProperty name="' . $val . '" />';
				$xmlPerTemplate[$templateNum] = $xml;
			}
		}
		$xmlArray['sio'] = $xmlPerTemplate;
		return true;
	}

	/**
	 * Returns the HTML necessary for getting information about the
	 * semantic property within the Page Schemas 'editschema' page.
	 */
	function getTemplateHTML( $template, &$text_extensions ) {
		$prop_array = array();
		$hasExistingValues = false;
		if ( !is_null( $template ) ) {
			$sio_array = $template->getObject('semanticinternalobjects_MainProperty');
			if ( array_key_exists( 'sio', $sio_array ) ) {
				$prop_array = $sio_array['sio'];
				$hasExistingValues = true;
			}
		}
		$html_text = '<p>' . 'Name of property to connect this template\'s fields to the rest of the page (should only be used if this template can have multiple instances):' . ' ';
		if ( array_key_exists( 'name', $prop_array ) ) {
			$propName = $prop_array['name'];
		} else {
			$propName = null;
		}
		$html_text .= Html::input( 'sio_property_name_num', $propName, array( 'size' => 15 ) ) . "\n";

		$text_extensions['sio'] = array( 'Internal property', '#FF8', $html_text, $hasExistingValues );

		return true;
	}

	/**
	 * Returns the property based on the XML passed from the Page Schemas
	 * extension.
	*/
	function createPageSchemasObject( $objectName, $xmlForField, &$object ) {
		$sio_array = array();
		if ( $objectName == "semanticinternalobjects_MainProperty" ) {
			foreach ( $xmlForField->children() as $tag => $child ) {
				if ( $tag == $objectName ) {
					$propName = $child->attributes()->name;
					$sio_array['name'] = (string)$propName;
					$count = 0;
					foreach ( $child->children() as $prop => $value ) {
						$sio_array[$prop] = (string)$value;
					}
					$object['sio'] = $sio_array;
					return true;
				}
			}
		}
		return true;
	}

	function getInternalObjectPropertyName ( $psTemplate ) {
		// TODO - there should be a more direct way to get
		// this data.
		$sioPropertyObj = $psTemplate->getObject( 'semanticinternalobjects_MainProperty' );
		if ( !array_key_exists( 'sio', $sioPropertyObj ) ) {
			return null;
		}
		if ( !array_key_exists( 'name', $sioPropertyObj['sio'] ) ) {
			return null;
		}
		return $sioPropertyObj['sio']['name'];
	}

	function getPageList( $psSchemaObj , &$genPageList ) {
		$templates = $psSchemaObj->getTemplates();
		foreach ( $templates as $template ) {
			$sioPropertyName = self::getInternalObjectPropertyName( $template );
			if ( is_null( $sioPropertyName ) ) {
				continue;
			}
			$title = Title::makeTitleSafe( SMW_NS_PROPERTY, $sioPropertyName );
			$genPageList[] = $title;
		}
		return true;
	}

        function generatePages( $psSchemaObj, $toGenPageList ) {
		global $smwgContLang;

		$datatypeLabels = $smwgContLang->getDatatypeLabels();
		$pageTypeLabel = $datatypeLabels['_wpg'];

		$templates = $psSchemaObj->getTemplates();
		foreach ( $templates as $template ) {
			$sioPropertyName = self::getInternalObjectPropertyName( $template );
			if ( is_null( $sioPropertyName ) ) {
				continue;
			}
			$title = Title::makeTitleSafe( SMW_NS_PROPERTY, $sioPropertyName );
			$key_title = PageSchemas::titleString( $title );
			if ( !in_array( $key_title, $toGenPageList ) ) {
				continue;
			}
			SMWPageSchemas::createProperty( $sioPropertyName, $pageTypeLabel, null );
		}
		return true;
	}
}
