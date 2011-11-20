<?php
/**
 * Input definitions for the Semantic Forms Inputs extension.
 *
 * @author Stephan Gambke
 * @author Sanyam Goyal
 * @author Yaron Koren
 *
 */

if ( !defined( 'SFI_VERSION' ) ) {
	die( 'This file is part of a MediaWiki extension, it is not a valid entry point.' );
}

class SFIUtils {

	/**
	 * Creates the html text for an input.
	 *
	 * Common attributes for input types are set according to the parameters.
	 * The parameters are the standard parameters set by Semantic Forms'
	 * InputTypeHook plus some optional.
	 *
	 * @param string $cur_value
	 * @param string $input_name
	 * @param boolean $is_mandatory
	 * @param boolean $is_disabled
	 * @param array $other_args
	 * @param string $input_id (optional)
	 * @param int $tabindex (optional)
	 * @param string $class
	 * @return string the html text of an input element
	 */
	static function textHTML ( $cur_value, $input_name, $is_mandatory, $is_disabled, $other_args, $input_id = null, $tabindex = null, $class = "" ) {

		global $sfgFieldNum, $sfgTabIndex;

		// array of attributes to pass to the input field
		$attribs = array(
				"name" => $input_name,
				"class" => $class,
				"value" => $cur_value,
				"type" => "text"
		);

		// set size attrib
		if ( array_key_exists( 'size', $other_args ) ) {
			$attribs['size'] = $other_args['size'];
		}

		// set maxlength attrib
		if ( array_key_exists( 'maxlength', $other_args ) ) {
			$attribs['maxlength'] = $other_args['maxlength'];
		}

		// modify class attribute for mandatory form fields
		if ( $is_mandatory ) {
			$attribs["class"] .= ' mandatoryField';
		}

		// add user class(es) to class attribute of input field
		if ( array_key_exists( 'class', $other_args ) ) {
			$attribs["class"] .= ' ' . $other_args['class'];
		}

		// set readonly attrib
		if ( $is_disabled ) {
			$attribs["readonly"] = "1";
		}

		// if no special input id is specified set the Semantic Forms standard
		if ( $input_id == null ) {
			$attribs[ 'id' ] = "input_" . $sfgFieldNum;
		} else {
			$attribs[ 'id' ] = $input_id;
		}


		if ( $tabindex == null ) $attribs[ 'tabindex' ] = $sfgTabIndex;
		else $attribs[ 'tabindex' ] = $tabindex;

		// $html = Html::element( "input", $attribs );
		$html = Xml::element( "input", $attribs );

		return $html;

	}
}
