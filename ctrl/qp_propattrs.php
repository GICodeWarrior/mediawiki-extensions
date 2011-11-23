<?php

if ( !defined( 'MEDIAWIKI' ) ) {
	die( "This file is part of the QPoll extension. It is not a valid entry point.\n" );
}

/**
 * Get attributes from source (raw) proposal line or from DB field.
 * Build raw proposal line from existing attributes.
 */
class qp_PropAttrs {

	# code of error after getting attributes
	# 0 means there is no error
	public $error;
	# proposal name (for interpretation scripts);
	# '' means there is no name
	public $name;
	# count of required categories for question type="text";
	# null means there is no 'catreq' attribute defined
	# (will use question/poll default)
	public $catreq;
	# qpoll tag source text of proposal:
	#   * with source cat_parts / prop_parts
	#   * without proposal attributes
	public $cpdef;
	# text of proposal prepared to be stored into DB
	#   * without proposal attributes
	#   * contains parsed cat_parts / prop_parts for question type="text"
	#   * does not contain parsed cat_parts for another types of questions
	public $dbText;

	public function getFromDB( $proposal_text ) {
		$this->getFromSource( $proposal_text );
		$this->dbText = $this->cpdef;
		$this->cpdef = null;
		# assume that DB state is always consistant
		$this->error = 0;
	}

	/**
	 * Get proposal attributes from raw proposal text (source page text or DB field)
	 *
	 * @param  $proposal_text  string  raw proposal text
	 */
	public function getFromSource( $proposal_text ) {
		# set default values of properties
		$this->error = 0;
		$this->name = '';
		$this->dbText =
		$this->catreq = null;
		$this->cpdef = $proposal_text;
		$matches = array();
		# try to match the raw proposal name (without specific attributes)
		preg_match( '`^:\|\s*(.+?)\s*\|\s*(.+?)\s*$`u', $this->cpdef, $matches );
		if ( count( $matches ) < 3 ||
				( $this->name = $matches[1] ) === '' ) {
			# raw proposal name is not defined or empty
			return;
		}
		# check, whether raw proposal name will fit into the corresponding DB field
		if ( strlen( $this->getAttrDef() ) >= qp_Setup::$field_max_len['proposal_text'] ) {
			$this->setError( qp_Setup::ERROR_TOO_LONG_PROPNAME );
			return;
		}
		# try to get xml-like attributes;
		$paramkeys = qp_Setup::getXmlLikeAttributes( $this->name, array( 'name', 'catreq' ) );
		if ( $paramkeys['name'] !== null ) {
			# name attribute found
			$this->name = trim( $paramkeys['name'] );
		}
		if ( $paramkeys['catreq'] !== null ) {
			$this->catreq = self::getSaneCatReq( $paramkeys['catreq'] );
		}
		if ( is_numeric( $this->name ) ) {
				$this->setError( qp_Setup::ERROR_NUMERIC_PROPNAME );
			return;
		}
		# remove raw proposal name from proposal definition
		$this->cpdef = $matches[2];
	}

	/**
	 * Get sanitized 'catreq' attribute value.
	 */
	public static function getSaneCatReq( $attr_val ) {
		$attr_val = trim( $attr_val );
		if ( is_numeric( $attr_val ) ) {
			# return count of categories to be filled
			return ( $attr_val > 0 ) ? intval( $attr_val ) : 0;
		}
		# require all categories to be filled
		return 'all';
	}

	/**
	 * Set error state.
	 * Make sure $this->cpdef contains the full raw proposal line,
	 * otherwise the output of $this->__toString() will be incorrect.
	 */
	protected function setError( $code ) {
		$this->error = $code;
		$this->name = '';
		$this->catreq = null;
	}

	/**
	 * Return attributes part of raw proposal line.
	 */
	public function getAttrDef() {
		# we do not store 'catreq' attribute because:
		# 1. it's not used in qp_QuestionData
		# 2. we do not store poll's/question's catreq anyway
		return ( $this->name === '' ) ? '' : ":|{$this->name}|";
		/*
		if ( $this->catreq === null ) {
			if ( $this->name === '' ) {
				return '';
			} else {
				return ":|{$this->name}|";
			}
		} else {
			if ( $this->name === '' ) {
				return ":|catreq=\"{$this->catreq}\"|";
			} else {
				return ":|name=\"{$this->name}\" catreq=\"{$this->catreq}\"|";
			}
		}
		*/
	}

	/**
	 * Return raw proposal text to be stored in DB (if any)
	 */
	public function __toString() {
		if ( $this->dbText === null ) {
			throw new MWException( 'dbText is uninitialized in ' . __METHOD__ );
		}
		return $this->getAttrDef() . $this->dbText;
	}

} /* end of qp_PropAttrs class */
