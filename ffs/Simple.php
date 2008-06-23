<?php
/**
 * Simple file format handler for testing import and export.
 *
 * @author Niklas Laxström
 * @copyright Copyright © 2008, Niklas Laxström
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 * @file
 */

class SimpleFormatReader {
	const SEPARATOR = '----';
	const AUTHORPREFIX = 'Author: ';

	// One reader per file
	protected $filename = false;

	public function __construct( $filename ) {
		if ( is_readable( $filename ) ) {
			$this->filename = $filename;
		}
	}

	protected $authors = null;
	protected $staticHeader = '';

	public function parseAuthors() {
		if ( $this->authors === null ) {
			$this->parseHeader();
		}
		return $this->authors;
	}

	public function parseStaticHeader() {
		if ( $this->staticHeader === '' ) {
			$this->parseHeader();
		}
		return $this->staticHeader;
	}

	protected function parseHeader() {
		$authors = array();
		$staticHeader = '';
		if ( $this->filename !== false ) {
			$handle = fopen( $this->filename, "rt" );
			$state = 0;

			while ( !feof($handle) ) {
				$line = fgets($handle);

				if ( $state === 0 ) {
					if ( $line === "\n" ) {
						$state = 1;
						continue;
					}

					$prefixLength = strlen(self::AUTHORPREFIX);
					$prefix = substr( $line, 0, $prefixLength );
					if ( strcasecmp( $prefix, self::AUTHORPREFIX ) === 0 ) {
						$authors[] = substr( $line, $prefixLength );
					}
				} elseif ( $state === 1 ) {
					if ( $line === self::SEPARATOR ) break; // End of static header, if any
					$staticHeader .= $line;
				}
			}
			fclose( $handle );
		}

		$this->authors = $authors;
		$this->staticHeader = $staticHeader;

	}

	protected $messagePattern = '/([^\0]+)\0([^\0]+)\0\n/U';
	public function parseMessages( StringMangler $mangler ) {

		$data = file_get_contents( $this->filename );
		$messages = array();
		$matches = array();

		$match = array();
		preg_match_all( $this->messagePattern, $data, $matches, PREG_SET_ORDER );
		foreach ( $matches as $match ) {
			list( , $key, $value ) = $match;
			$messages[$key] = $value;
		}

		return $messages;
		
	}


}

class SimpleFormatWriter {

	const SEPARATOR = '----';
	const AUTHORPREFIX = 'Author: ';

	// Stored objects
	protected $group;

	// Stored data
	protected $authors, $staticHeader;

	public function __construct( MessageGroup $group ) {
		$this->group = $group;
	}

	public function addAuthors( array $authors, $code ) {
		if ( $this->authors === null ) {
			$this->authors = array();
		}

		if ( !isset($this->authors[$code]) ) {
			$this->authors[$code] = array();
		}

		$this->authors[$code] = wfArrayMerge($this->authors[$code], $authors);
		$this->authors[$code] = array_unique($this->authors[$code]);
	}

	public function load( $code ) {
		$reader = $this->group->getReader( $code );
		if ( $reader ) {
			$this->addAuthors( $reader->parseAuthors(), $code );
			$this->staticHeader = $reader->parseStaticHeader();
		}
	}


	public function fileExport( array $languages, $targetDirectory ) {
		global $wgTranslateExtensionDirectory;
		foreach ( $languages as $code ) {
			$messages = $this->getMessagesForExport( $this->group, $code );
			$filename = $this->group->getMessageFile( $code );
			$target = $targetDirectory . '/' . $filename;

			wfMkdirParents( dirname( $target ) );
			$tHandle = fopen( $target, 'wt' );
			if ( $tHandle === false ) {
				throw new MWException( "Unable to open target for writing" );
			}

			$this->exportLanguage( $tHandle, $code, $messages );

			fclose( $tHandle );
		}
	}

	public function webExport( MessageCollection $collection ) {
		$code = $collection->code; // shorthand

		// Open temporary stream
		$filename = $this->group->getMessageFile( $code );
		$tHandle = fopen( 'php://temp', 'wt' );

		$this->addAuthors( $collection->getAuthors(), $code );
		$this->exportLanguage( $tHandle, $code, $collection );

		// Fetch data
		rewind( $tHandle );
		$data = stream_get_contents( $tHandle );
		fclose( $tHandle );
		return $data;
	}

	protected function getMessagesForExport( MessageGroup $group, $code ) {
		$collection = $this->group->initCollection( $code );
		$this->group->fillCollection( $collection );
		$this->addAuthors( $collection->getAuthors(), $code );
		return $collection;
	}

	protected function exportLanguage( $target, $code, MessageCollection $collection ) {
		$messages = $this->makeExportArray( $collection );
		$this->load( $code );
		$this->makeHeader( $target, $code );
		$this->exportStaticHeader( $target );
		$this->exportMessages( $target, $messages );
	}

	// Writing three
	protected function makeHeader( $handle, $code ) {
		fwrite( $handle, $this->formatAuthors( self::AUTHORPREFIX, $code ) );
		fwrite( $handle, self::SEPARATOR . "\n");
	}


	public function filterAuthors( array $authors, $code, $groupId ) {
		global $wgTranslateAuthorBlacklist;
		foreach ( $authors as $i => $v ) {
			$hash = "$groupId;$code;$v";

			$blacklisted = false;
			foreach ( $wgTranslateAuthorBlacklist as $rule ) {
				list( $type, $regex ) = $rule;
				if ( preg_match($regex, $hash) ) {
					if ( $type === 'white' ) {
						$blacklisted = false;
						break;
					} else {
						$blacklisted = true;
					}
				}
			}

			if ( $blacklisted ) {
				unset($authors[$i]);
			}

		}

		return $authors;

	}

	protected function formatAuthors( $prefix, $code ) {
		// Check if there is any authors at all
		if ( empty($this->authors[$code]) ) return '';

		$groupId = $this->group->getId();
		$authors = $this->authors[$code];
		$authors = $this->filterAuthors( $authors, $code, $groupId );

		$s = array();
		foreach ( $authors as $a ) {
			$s[] = $prefix . $a;
		}
		return implode( "\n", $s ) . "\n";
	}

	protected function exportStaticHeader( $target ) {
		if( $this->staticHeader ) {
			fwrite( $target, $this->staticHeader . "\n" );
		}
	}

	protected function exportMessages( $handle, array $messages ) {
		foreach ( $messages as $key => $value ) {
			fwrite( $handle, "$key\000$value\000\n" );
		}
	}

	protected function getLanguageNames( $code ) {
		$name = TranslateUtils::getLanguageName( $code );
		$native = TranslateUtils::getLanguageName( $code, true );
		return array( $name, $native );
	}

	/**
	 * Preprocesses MessageArray to suitable format and filters things that should
	 * not be exported.
	 *
	 * @param $array Reference of MessageArray.
	 */
	public function makeExportArray( MessageCollection $messages ) {
		// We copy only relevant translations to this new array
		$new = array();
		$mangler = $this->group->getMangler();
		foreach( $messages as $key => $m ) {
			$key = $mangler->unMangle( $key );

			$translation = $m->translation;
			# CASE2: no translation
			if ( $translation === null ) continue;

			# Remove fuzzy markings before export
			$translation = str_replace( TRANSLATE_FUZZY, '', $translation );

			# CASE3: optional messages; accept only if different
			if ( $m->optional && $translation === $m->definition ) continue;

			# CASE4: don't export non-translations unless translated in wiki
			if ( !$m->pageExists && $translation === $m->definition ) continue;

			# Otherwise it's good
			$new[$key] = $translation;
		}

		return $new;
	}
}