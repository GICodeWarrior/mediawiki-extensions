<?php
/**
 * File holding the SolrDoc class
 *
 * @ingroup SolrStore
 * @file
 * @author Simon Bachenberg
 */

/**
 * Class for saving Documents for sending to Solr
 *
 * @ingroup SolrStore
 */
class SolrDoc {
	private $output;
	private $min = array ();
	private $max = array ();

	/**
	 * Add a Field to the SolrDoc
	 *
	 * @param type $name of the Field
	 * @param type $value of the Field
	 */
	public function addField( $name, $value ) {
			$this->output .= '<field name="' . $name . '">' . $value . '</field>' ;
	}

	/**
	 * This Function gets a Multivalued Field and splits it into a max and a min value for Sorting
	 *
	 * @param type $name of the Field
	 * @param type $value of the Field
	 */
	public function addSortField( $name, $value ) {
		// Does a min/max Field with this name exist ?
		if ( isset ( $this->min[$name] ) && isset ( $this->max[$name] ) ) {
			if ( strcasecmp( $this->min[$name], $value ) > 0 ) {
			// If the new String is Less the Old one replace them
				$this->min[$name] = $value;
			}
			if ( strcasecmp( $this->max[$name], $value ) < 0 ) {
			// If the new String is Bigger than Old one replace them
				$this->max[$name] = $value;
			}
		} else {
			$this->min[$name] = $value;
			$this->max[$name] = $value;
		}
	}

	public function printFields() {
		$all = $this->output;

		foreach ( $this->min as $name => $value ) {
			$all .= '<field name="' . $name . 'min">' . $value . '</field>' ;
		}
		foreach ( $this->max as $name => $value ) {
			$all .= '<field name="' . $name . 'max">' . $value . '</field>' ;
		}

		return $all;
	}
}
