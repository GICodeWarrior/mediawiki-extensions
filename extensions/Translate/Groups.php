<?php

interface MessageGroup {
	public function getConfiguration();

	public function getId();
	public function getLabel();
	public function getDescription();
	public function getNamespace();

	public function isMeta();
	public function exists();

	public function getFFS();
	public function getChecker();
	public function getMangler();

	public function initCollection( $code );
	public function load( $code );
}

abstract class MessageGroupBase implements MessageGroup {
	protected $conf;
	protected $namespace;

	protected function __construct() {}
	
	public static function factory( $conf ) {
		$obj = new $conf['BASIC']['class']();
		$obj->conf =  $conf;
		$obj->namespace = $obj->parseNamespace();
		return $obj;
	}

	public function getConfiguration() { return $this->conf; }

	public function getId() { return $this->getFromConf( 'BASIC', 'id' ); }
	public function getLabel() { return $this->getFromConf( 'BASIC', 'label' ); }
	public function getDescription() { return $this->getFromConf( 'BASIC', 'description' ); }
	public function getNamespace() { return $this->namespace; }

	public function isMeta() { return $this->getFromConf( 'BASIC', 'meta' ); }

	protected function getFromConf( $section, $key ) {
		return isset($this->conf[$section][$key]) ? $this->conf[$section][$key] : null;
	}

	public function getFFS() {
		$class = $this->getFromConf( 'FILES','class' );
		if ( $class === null ) return null;
		if ( !class_exists($class) ) throw new MWException( "FFS class $class does not exists" );
		return new $class( $this );
	}

	public function getChecker() {
		$class = $this->getFromConf( 'CHECKER','class' );
		if ( $class === null ) return null;
		if ( !class_exists($class) ) throw new MWException( "Checker class $class does not exists" );

		$checker = new $class();
		$checks = $this->getFromConf( 'CHECKER','checks' );
		if ( !is_array($checks) ) throw new MWException( "Checker class $class not supplied with proper checks" );

		foreach ( $checks as $check ) {
			$checker->addCheck( array( $checker, $check ) );
		}

		return $checker;
	}

	public function getMangler() {
		if ( !isset($this->mangler) ) {

			$class = $this->getFromConf( 'MANGLER','class' );
			if ( $class === null ) {
				$this->mangler = StringMatcher::emptyMatcher();
				return $this->mangler;
			}

			if ( !class_exists($class) ) throw new MWException( "Mangler class $class does not exists" );

			// TODO: branch handling, merge with upper branch keys
			$class = $this->getFromConf( 'MANGLER','class' );
			$this->mangler = new $class($this->conf['MANGLER']);
		}

		return $this->mangler;
	}

	public function initCollection( $code ) {
		$namespace = $this->getNamespace();
		$messages = $this->load( 'en' );
		$definitions = new MessageDefinitions( $namespace, $messages );
		$collection = MessageCollection::newFromDefinitions( $definitions, $code );
		$collection->setInfile( $this->load( $code ) );
		$this->setTags( $collection );
		return $collection;
	}

	public function load( $code ) {
		if ( $this->exists() ) {
			$cache = new MessageGroupCache( $this->getId() );
			if ( !$cache->exists($code) ) return array();
			$messages = array();
			foreach ( $cache->getKeys($code) as $key ) {
				$messages[$key] = $cache->get($key);
			}
			return $messages;
		} else {
			throw new MWException( 'Not configured properly' );
		}
	}

	protected function setTags( MessageCollection $collection ) {
		if ( isset($this->conf['TAGS']) ) {
			$tags = $this->conf['TAGS'];
			if ( !is_array($tags) ) throw new MWException( 'Tags is not an array' );

			$cache = new MessageGroupCache( $this->getId() );
			$messageKeys = $cache->getKeys();

			// Loop trough all tag types
			foreach ( $tags as $type => $patterns ) {
				$matches = array();

				// Collect exact keys, no point running them trough string matcher
				foreach ( $patterns as $index => $pattern ) {
					if ( strpos( $pattern, '*' ) === false ) {
						$matches[] = $pattern;
						unset($patterns[$index]);
					}
				}

				if ( count($patterns) ) {
					// Rest of the keys contain wildcards
					$conf = array( 'patterns' => $patterns );
					$mangler = new StringMatcher( $conf );

					// Use mangler to find messages that match
					foreach ( $messageKeys as $key ) {
						if ( $mangler->match($key) ) $matches[] = $key;
					}
				}

				// Add the combined matches
				$collection->setTags( $type, $matches );
			}
		}
	}

	protected function parseNamespace() {
		$ns = $this->getFromConf( 'BASIC', 'namespace' );
		if ( is_int($ns) ) return $ns;
		if ( defined($ns) ) return constant($ns);

		global $wgContLang;
		$index = $wgContLang->getNsIndex( $ns );
		if ( !$index ) throw new MWException( "No valid namespace defined, got $ns" );
		return $index;
	}


}

class FileBasedMessageGroup extends MessageGroupBase {
	public function exists() {
		$ffs = $this->getFFS();
		if ( !$ffs ) throw new MWException( 'No FFS defined' );
		$data = $ffs->read( 'en' );
		return $data && count($data['MESSAGES']);
	}

	public function load( $code ) {
		$cache = new MessageGroupCache( $this->getId() );
		if ( $cache->exists() ) {
			return parent::load( $code );
		} else {
			// Short-circuit cache
			$ffs = $this->getFFS();
			if ( !$ffs ) throw new MWException( 'No FFS defined' );
			$data = $ffs->read( $code );
			
			return $data ? $data['MESSAGES'] : array();
		}
	}

	public function getSourceFilePath( $code ) {
		if ( $code === 'en' ) {
			$pattern = $this->getFromConf( 'FILES', 'definitionFile' );
			if ( $pattern !== null ) return $this->replaceVariables( $pattern, $code );
		}

		$pattern = $this->getFromConf( 'FILES', 'sourcePattern' );
		if ( $pattern === null ) throw new MWException( 'No source file pattern defined' );
		return $this->replaceVariables( $pattern, $code );
	}

	public function getTargetFilename( $code ) {
		$pattern = $this->getFromConf( 'FILES', 'targetPattern' );
		if ( $pattern === null ) throw new MWException( 'No target file pattern defined' );
		return $this->replaceVariables( $pattern, $code );
	}

	protected function replaceVariables( $pattern, $code ) {
		global $IP, $wgTranslateGroupRoot;
		$variables = array(
			'%CODE%' => $this->mapCode( $code ),
			'%MWROOT%' => $IP,
			'%GROUPROOT%' => $wgTranslateGroupRoot,
		);
		return str_replace( array_keys($variables), array_values($variables), $pattern );
	}

	protected function mapCode( $code ) {
		if ( isset($this->conf['FILES']['codeMap'][$code]) ) {
			return $this->conf['FILES']['codeMap'][$code];
		} else {
			return $code;
		}
	}
}

/*class CollectionMessageGroup extends MessageGroupBase {
	
}*/

class MediaWikiMessageGroup extends FileBasedMessageGroup {
	protected function mapCode( $code ) {
		return ucfirst( str_replace( '-', '_', parent::mapCode($code) ) );
	}

	protected function setTags( MessageCollection $collection ) {
		$path = $this->getFromConf( 'BASIC', 'metadataPath' );
		if ( $path === null ) throw new MWException( "metadataPath is not configured" );

		$filename = "$path/messageTypes.inc";
		if ( !is_readable($filename) ) throw new MWException( "$filename is not readable" );

		$data = file_get_contents($filename);
		if ( $data === false ) throw new MWException( "Failed to read $filename" );

		$reader = new ConfEditor( $data );
		$vars = $reader->getVars();
		$collection->setTags( 'optional', $vars['wgOptionalMessages'] );
		$collection->setTags( 'ignored', $vars['wgIgnoredMessages'] );

		parent::setTags( $collection );
	}
}