<?php

class WURFL_Storage_Mwmemcache extends WURFL_Storage_Base {

	private $expiration;
	private $namespace;

	private $defaultParams = array(
		"namespace" => "wurfl",
		"expiration" => 0
	);

	public function __construct($params=array()) {
		$currentParams = is_array($params) ? array_merge($this->defaultParams, $params) : $this->defaultParams;
		$this->toFields($currentParams);
	}

	private function toFields($params) {
		foreach($params as $key => $value) {
			$this->$key = $value;
		}
	}

	/**
	 * Saves the object.
	 *
	 * @param string $objectId
	 * @param mixed $object
	 * @return
	 */
	public function save($objectId, $object) {
		global $wgMemc;
		return $wgMemc->set( $this->encode( $this->namespace, $objectId ), $object, $this->expiration );
	}

	
	/**
	 * Load the object.
	 *
	 * @param string $objectId
	 * @param mixed $object
	 * @return
	 */
	public function load($objectId) {
		global $wgMemc;
		$value = $wgMemc->get( $this->encode( $this->namespace, $objectId ) );
		return $value;
	}


	public function clear() {
	}
}
