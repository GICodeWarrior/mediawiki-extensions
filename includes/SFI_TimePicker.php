<?php

/**
 * File holding the SFI_TimePicker class
 * 
 * @author Stephan Gambke
 * @file
 * @ingroup SemanticFormsInputs
 */
if ( !defined( 'SFI_VERSION' ) ) {
	die( 'This file is part of the SemanticFormsInputs extension, it is not a valid entry point.' );
}

/**
 * The SFITimePicker class.
 *
 * @ingroup SemanticFormsInputs
 */
class SFITimePicker extends SFFormInput {
	
	/**
	 * Constructor.
	 *
	 * @param String $input_number
	 *		The number of the input in the form.
	 * @param String $cur_value
	 *		The current value of the input field.
	 * @param String $input_name
	 *		The name of the input.
	 * @param String $disabled
	 *		Is this input disabled?
	 * @param Array $other_args
	 *		An associative array of other parameters that were present in the
	 *		input definition.
	 */
	public function __construct( $input_number, $cur_value, $input_name, $disabled, $other_args ) {
		
		global $sfigSettings;
		
		parent::__construct( $input_number, $cur_value, $input_name, $disabled, $other_args );
		
		// third: if the timepicker is not disabled set up JS attributes ans assemble JS call
		if ( !$this->mIsDisabled ) {

			self::setup();

			// set min time if valid, else use default
			if ( array_key_exists( 'mintime', $other_args )
					&& ( preg_match( '/^\d+:\d\d$/', trim( $other_args['mintime'] ) ) == 1 ) ) {
					$minTime = trim( $other_args[ 'mintime' ] );
			} elseif ( $sfigSettings->timePickerMinTime != null ) {
				$minTime = $sfigSettings->timePickerMinTime	;
			} else {
				$minTime = '00:00';
			}

			// set max time if valid, else use default
			if ( array_key_exists( 'maxtime', $other_args )
					&& ( preg_match( '/^\d+:\d\d$/', trim( $other_args['maxtime'] ) ) == 1 ) ) {
					$maxTime = trim( $other_args[ 'maxtime' ] );
			} elseif ( $sfigSettings->timePickerMaxTime != null ) {
				$maxTime = $sfigSettings->timePickerMaxTime	;
			} else {
				$maxTime = '23:59';
			}

			// set interval if valid, else use default
			if ( array_key_exists( 'interval', $other_args )
					&& preg_match( '/^\d+$/', trim( $other_args['interval'] ) ) == 1 ) {
					$interval = trim( $other_args[ 'interval' ] );
			} else {
				$interval = '15';
			}

			// build JS code from attributes array
			$jsattribs = array(
				"minTime" => $minTime,
				"maxTime" => $maxTime,
				"interval" => $interval,
				"format" => "hh:mm"
			);

			if ( array_key_exists( 'part of dtp', $other_args ) ) {
				$jsattribs['partOfDTP'] = $other_args['part of dtp'];
			}

			$jstext = Xml::encodeJsVar( $jsattribs );

			$this->addJsInitFunctionData( 'SFI_TP_init', $jstext );
		}
	}

	/**
	 * Returns the name of the input type this class handles: menuselect.
	 *
	 * This is the name to be used in the field definition for the "input type"
	 * parameter.
	 *
	 * @return String The name of the input type this class handles.
	 */
	public static function getName() {
		return 'timepicker';
	}

	/**
	 * Static setup method for input type "menuselect".
	 * Adds the Javascript code and css used by all menuselects.
	*/
	static private function setup() {

		global $wgOut;
		global $sfigSettings;

		static $hasRun = false;

		if ( !$hasRun ) {
			$hasRun = true;
			
			$wgOut->addScript( '<script type="text/javascript" src="' . $sfigSettings->scriptPath . '/libs/timepicker.js"></script> ' );
			$wgOut->addExtensionStyle( $sfigSettings->scriptPath . '/skins/SFI_Timepicker.css' );
			
		}

	}
	
	/**
	 * Returns the HTML code to be included in the output page for this input.
	 *
	 * Ideally this HTML code should provide a basic functionality even if the
	 * browser is not Javascript capable. I.e. even without Javascript the user
	 * should be able to input values.
	 *
	 */
	public function getHtmlText(){

		global $sfigSettings;

		// The timepicker is created in four steps:
		// first: set up HTML attributes
		// second: assemble HTML


		// first: set up HTML attributes
		$inputFieldDisabled =
			array_key_exists( 'disable input field', $this->mOtherArgs )
			|| ( !array_key_exists( 'enable input field', $this->mOtherArgs ) && $sfigSettings->timePickerDisableInputField )
			|| $this->mIsDisabled	;

		if ( array_key_exists( 'class', $this->mOtherArgs ) ) $userClasses = $this->mOtherArgs['class'];
		else $userClasses = "";

		// second: assemble HTML
		// create visible input field (for display) and invisible field (for data)
		$html = SFIUtils::textHTML( $this->mCurrentValue, '', array_key_exists('mandatory', $this->mOtherArgs ), $inputFieldDisabled, $this->mOtherArgs, "input_{$this->mInputNumber}_tp_show", null, "createboxInput" );

		if ( ! array_key_exists( 'part of dtp', $this->mOtherArgs ) ) {
			$html .= Xml::element( "input", array(
					'id' => "input_{$this->mInputNumber}",
					'type' => 'hidden',
					'name' => $input_name,
					'value' => $this->mCurrentValue
				) );
		}

		// append time picker button
		if ( $this->mIsDisabled ) {

			$html .= Xml::openElement(
					"button",
					array(
					'type' => 'button',
					'class' => 'createboxInput ' . $userClasses,
					'disabled' => '1',
					'id' => "input_{$this->mInputNumber}_button"
					) )

					. Xml::element(
					"image",
					array( 'src' => $sfigSettings->scriptPath . '/images/TimePickerButtonDisabled.gif'	)
					)

					. Xml::closeElement( "button" );

		} else {

			$html .= "<button "
					. Xml::expandAttributes ( array(
					'type' => 'button',
					'class' => 'createboxInput ' . $userClasses,
					'name' => "button",
					) )
					. " onclick=\"document.getElementById(this.id.replace('_button','_tp_show')).focus();\""
					. ">"

					. Xml::element(
					"image",
					array( 'src' => $sfigSettings->scriptPath . '/images/TimePickerButton.gif'	)
					)

					. Xml::closeElement( "button" );

		}

		// append reset button (if selected)
		if ( ! array_key_exists( 'part of dtp', $this->mOtherArgs ) &&
				( array_key_exists( 'show reset button', $this->mOtherArgs ) ||
					$sfigSettings->timePickerShowResetButton && !array_key_exists( 'hide reset button', $this->mOtherArgs )
				)
			)  {

			if ( $this->mIsDisabled ) {

				$html .= Xml::openElement(
						"button",
						array(
						'type' => 'button',
						'class' => 'createboxInput ' . $userClasses,
						'disabled' => '1',
						'id' => "input_{$this->mInputNumber}_resetbutton"
						) )

						. Xml::element(
						"image",
						array( 'src' => $sfigSettings->scriptPath . '/images/TimePickerResetButtonDisabled.gif'	)

						)
						. Xml::closeElement( "button" );

			} else {

				$html .= "<button "
						. Xml::expandAttributes ( array(
						'type' => 'button',
						'class' => 'createboxInput ' . $userClasses,
						'name' => "resetbutton",
						) )
						. " onclick=\"document.getElementById(this.id.replace('_resetbutton','')).value='';"
						. "document.getElementById(this.id.replace('_resetbutton','_tp_show')).value='';\""
						. ">"

						. Xml::element(
						"image",
						array( 'src' => $sfigSettings->scriptPath . '/images/TimePickerResetButton.gif'	)

						)
						. Xml::closeElement( "button" );

			}
		}

		// wrap in span (e.g. used for mandatory inputs)
		if ( ! array_key_exists( 'part of dtp', $this->mOtherArgs ) ) {
			$html = '<span class="inputSpan' . ( array_key_exists( 'mandatory', $this->mOtherArgs )? ' mandatoryFieldSpan' : '') . '">' .$html . '</span>';
		}


		return $html;

	}

	/**
	 * Returns the set of SMW property types which this input can
	 * handle, but for which it isn't the default input.
	 */
	public static function getOtherPropTypesHandled() {
		return array( '_str', '_dat' );
	}

	/**
	 * Returns the set of parameters for this form input.
	 * 
	 * TODO: Specify parameters specific for menuselect.
	 */
	public static function getParameters() {
		
		global $sfigSettings;
		
		$params = parent::getParameters();
		$params[] = array(
			'name' => 'mintime',
			'type' => 'string',
			'description' => wfMsg( 'semanticformsinputs-timepicker-mintime' ),
		);
		$params[] = array(
			'name' => 'maxtime',
			'type' => 'string',
			'description' => wfMsg( 'semanticformsinputs-timepicker-maxtime' ),
		);
		$params[] = array(
			'name' => 'interval',
			'type' => 'int',
			'description' => wfMsg( 'semanticformsinputs-timepicker-interval' ),
		);
		$params[] = array(
			'name' => $sfigSettings->timePickerDisableInputField?'enable input field':'disable input field',
			'type' => 'boolean',
			'description' => wfMsg( 'semanticformsinputs-timepicker-enableinputfield' ),
		);
		$params[] = array(
			'name' => $sfigSettings->timePickerShowResetButton?'hide reset button':'show reset button',
			'type' => 'boolean',
			'description' => wfMsg( 'semanticformsinputs-timepicker-showresetbutton' ),
		);

		return $params;
	}	
}
