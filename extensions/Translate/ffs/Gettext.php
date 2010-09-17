<?php
/**
 * Gettext file format handler for both old and new style message groups.
 *
 * @author Niklas Laxström
 * @author Siebrand Mazeland
 * @copyright Copyright © 2008-2010, Niklas Laxström, Siebrand Mazeland
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 * @file
 */

/**
 * Identifies Gettext plural exceptions.
 */
class GettextPluralException extends MwException {}

/**
 * Old-style parser for gettext file format.
 */
class GettextFormatReader extends SimpleFormatReader {
	protected $pot = false;

	public function setPotMode( $value ) {
		$this->pot = $value;
	}

	protected $prefix = '';

	public function setPrefix( $value ) {
		$this->prefix = $value;
	}

	/**
	 * Get authors from gettext file.
	 *
	 * @todo Implement this.
	 * return \array List of authors
	 */
	public function parseAuthors() {
		return array();
	}

	/**
	 * Returns static header of gettext file.
	 * Static part recognition is based on finding "# --" as beginning and
	 * "msgid" as end.
	 * return /string Static header of gettext file.
	 */
	public function parseStaticHeader() {
		if ( $this->filename === false ) {
			return '';
		}

		$data = file_get_contents( $this->filename );
		$start = (int) strpos( $data, '# --' );

		if ( $start ) {
			$start += 5;
		}

		$end = (int) strpos( $data, "msgid" );

		return substr( $data, $start, $end - $start );
	}

	public function parseFile() {
		if ( $this->filename === false ) {
			return array();
		}

		$data = file_get_contents( $this->filename );
		$parse = GettextFFS::parseGettextData( $data );

		return $parse['TEMPLATE'];
	}

	public function parseFileExt() {
		if ( $this->filename === false ) {
			return array();
		}

		$data = file_get_contents( $this->filename );

		return GettextFFS::parseGettextData( $data );
	}

	public function parseMessages( StringMangler $mangler ) {
		$defs = $this->parseFile();
		$messages = array();

		foreach ( $defs as $key => $def ) {
			if ( $this->pot ) {
				$messages[$key] = $def['id'];
			} else {
				if ( $def['str'] !== '' ) {
					$messages[$key] = $def['str'];
				}
			}
		}

		return $mangler->mangle( $messages );
	}
}

/**
 * Old-style writer for gettext file format.
 */
class GettextFormatWriter extends SimpleFormatWriter {
	protected $data = array();
	protected $plural = array( false, 0 );

	public function load( $code ) {
		$reader = $this->group->getReader( $code );
		$readerEn = $this->group->getReader( 'en' );

		if ( $reader instanceof GettextFormatReader ) {
			$this->addAuthors( $reader->parseAuthors(), $code );
			$this->staticHeader = $reader->parseStaticHeader();
			$this->owndata = $reader->parseFileExt();
		}

		if ( $readerEn instanceof GettextFormatReader ) {
			$this->data = $readerEn->parseFile();
		}
	}

	public function exportLanguage( $handle, MessageCollection $messages ) {
		global $wgSitename, $wgServer, $wgTranslateDocumentationLanguageCode;

		$code = $messages->code;
		$this->load( $code );
		$lang = Language::factory( 'en' );

		$out = '';
		$now = wfTimestampNow();
		$label = $this->group->getLabel();
		$languageName = TranslateUtils::getLanguageName( $code );

		$headers = isset( $this->owndata['HEADERS'] ) ? $this->owndata['HEADERS'] : array();
		$headers['Project-Id-Version'] = $label;

		/**
		 * @todo Make this customisable or something
		 * $headers['Report-Msgid-Bugs-To'] = $wgServer;
		 */

		/** @todo sprintfDate doesn't support any time zone flags
		 * $headers['POT-Creation-Date']
		 */

		$headers['PO-Revision-Date'] = $lang->sprintfDate( 'xnY-xnm-xnd xnH:xni:xns+0000', $now );

		/**
		 * @todo Link to portal pages?
		 * $headers['Language-Team'] = $languageName;
		 */

		$headers['Content-Type'] = 'text/plain; charset=UTF-8';
		$headers['Content-Transfer-Encoding'] = '8bit';

		$headers['X-Generator'] = 'MediaWiki ' . SpecialVersion::getVersion() .
			"; Translate extension (" . TRANSLATE_VERSION . ")";

		$headers['X-Translation-Project'] = "$wgSitename at $wgServer";
		$headers['X-Language-Code'] = $code;
		$headers['X-Message-Group'] = $this->group->getId();

		$headerlines = array( '' );
		foreach ( $headers as $key => $value ) {
			$headerlines[] = "$key: $value\n";
		}

		fwrite( $handle, "# Translation of $label to $languageName\n#\n" );
		fwrite( $handle, $this->formatAuthors( "# Author@$wgSitename: ", $code ) );
		fwrite( $handle, "# --\n" );

		$header = preg_replace( '/^# translation of (.*) to (.*)$\n/im', '', $this->staticHeader );

		fwrite( $handle, $header );
		fwrite( $handle, $this->formatmsg( '', $headerlines  ) );

		$mangler = $this->group->getMangler();

		foreach ( $messages as $key => $m ) {
			$flags = array();

			$key = $mangler->unmangle( $key );

			$translation = $m->translation();
			# CASE2: no translation
			if ( $translation === null ) {
				$translation = '';
			}

			# CASE3: optional messages; accept only if different
			if ( $m->hasTag( 'optional' ) ) {
				$flags[] = 'x-optional';
			}

			# Remove explicit fuzzy markings from the translation before export
			$flags = array();
			$comments = array();
			if ( isset( $this->data[$key]['flags'] ) ) {
				$flags = $this->data[$key]['flags'];
			}

			if ( strpos( $translation, TRANSLATE_FUZZY ) !== false ) {
				$translation = str_replace( TRANSLATE_FUZZY, '', $translation );
				$flags[] = 'fuzzy';
			}

			$documentation = '';
			if ( $wgTranslateDocumentationLanguageCode ) {
				$documentation = TranslateUtils::getMessageContent( $key, $wgTranslateDocumentationLanguageCode );
			}

			$comments = array();
			if ( isset( $this->data[$key]['comments'] ) ) {
				$comments = $this->data[$key]['comments'];
			}

			fwrite( $handle, self::formatComments( $comments, $documentation, $flags ) );

			$ckey = '';
			if ( isset( $this->data[$key]['ctxt'] ) ) {
				$ckey = $this->data[$key]['ctxt'];
			}

			$pluralForms = false;
			if ( isset( $this->owndata['METADATA']['plural'] ) ) {
				$pluralForms = $this->owndata['METADATA']['plural'];
			}

			fwrite( $handle, $this->formatmsg( $m->definition(), $translation, $ckey, $pluralForms ) );
		}

		return $out;
	}

	protected function escape( $line ) {
		// There may be \ as a last character, for keeping trailing whitespace
		$line = preg_replace( '/\\\\$/', '', $line );
		$line = addcslashes( $line, '\\"' );
		$line = str_replace( "\n", '\n', $line );
		$line = '"' . $line . '"';

		return $line;
	}

	public static function formatComments( $comments, $documentation = false, $flags = false ) {
		if ( $documentation ) {
			foreach ( explode( "\n", $documentation ) as $line ) {
				$comments['.'][] = $line;
			}
		}

		if ( $flags ) {
			$comments[','][] = implode( ', ', $flags );
		}

		// Ensure there is always something
		if ( !count( $comments ) ) {
			$comments[':'][] = '';
		}

		$order = array( '', '.', ':', ',', '|' );
		$output = array();
		foreach ( $order as $type ) {
			if ( !isset( $comments[$type] ) ) {
				continue;
			}

			foreach ( $comments[$type] as $value ) {
				$output[] = "#$type $value";
			}
		}

		return implode( "\n", $output ) . "\n";
	}

	protected function formatmsg( $msgid, $msgstr, $msgctxt = false, $pluralForms = false ) {
		$output = array();

		// @todo Very ugly hack to allow gettext plurals to be exported.
		if ( $msgstr == '{{PLURAL:GETTEXT|}}' ) {
			return '';
		}

		if ( $msgctxt ) {
			$output[] = 'msgctxt ' . $this->escape( $msgctxt );
		}

		if ( preg_match( '/{{PLURAL:GETTEXT/i', $msgid ) ) {
			$forms = $this->splitPlural( $msgid, 2 );
			$output[] = 'msgid ' . $this->escape( $forms[0] );
			$output[] = 'msgid_plural ' . $this->escape( $forms[1] );

			try {
				$forms = $this->splitPlural( $msgstr, $pluralForms );
				foreach ( $forms as $index => $form ) {
					$output[] = "msgstr[$index] " . $this->escape( $form );
				}
			} catch ( GettextPluralException $e ) {
				$output[] = "# Plural problem";
			}
		} else {
			$output[] = 'msgid ' . $this->escape( $msgid );

			// Special case for the header
			if ( is_array( $msgstr ) ) {
				$output[] = 'msgstr ""';
				foreach ( $msgstr as $line )
					$output[] = $this->escape( $line );
			} else {
				$output[] = 'msgstr ' . $this->escape( $msgstr );
			}
		}

		$out = implode( "\n", $output ) . "\n\n";

		return $out;

	}

	protected function splitPlural( $text, $forms ) {
		if ( $forms === 1 ) {
			return $text;
		} elseif ( !$forms ) {
			$forms = (int) $forms;
			throw new GettextPluralException( "Don't know how to split $text into $forms forms" );
		}

		$splitPlurals = array();
		for ( $i = 0; $i < $forms; $i++ ) {
			$plurals = array();
			$match = preg_match_all( '/{{PLURAL:GETTEXT\|(.*)}}/iU', $text, $plurals );

			if ( !$match ) {
				throw new GettextPluralException( "Failed to parse plural for: $text" );
			}

			$pluralForm = $text;
			foreach ( $plurals[0] as $index => $definition ) {
				$parsedFormsArray = explode( '|', $plurals[1][$index] );
				if ( !isset( $parsedFormsArray[$i] ) ) {
					error_log( "Too few plural forms in: $text" );
					$pluralForm = '';
				} else {
					$pluralForm = str_replace( $pluralForm, $definition, $parsedFormsArray[$i] );
				}
			}
			$splitPlurals[$i] = $pluralForm;
		}

		return $splitPlurals;
	}
}

/**
 * New-style FFS class that implements support for gettext file format.
 * @ingroup FFS
 */
class GettextFFS extends SimpleFFS {
	protected $offlineMode = false;

	public function setOfflineMode( $value ) {
		$this->offlineMode = $value;
	}

	public function readFromVariable( $data ) {
		$authors = array();

		# Authors first
		$matches = array();
		preg_match_all( '/^#\s*Author:\s*(.*)$/m', $data, $matches );
		$authors = $matches[1];

		# Then messages and everything else
		$parsedData = $this->parseGettext( $data );
		$parsedData['AUTHORS'] = $authors;

		foreach ( $parsedData['MESSAGES'] as $key => $value ) {
			if ( $value === '' ) unset( $parsedData['MESSAGES'][$key] );
		}

		return $parsedData;
	}

	public function parseGettext( $data ) {
		$mangler = $this->group->getMangler();
		$useCtxtAsKey = isset( $this->extra['CtxtAsKey'] ) && $this->extra['CtxtAsKey'];
		return self::parseGettextData( $data, $useCtxtAsKey, $mangler );
	}

	/**
	 * Ugly hack to avoid code duplication between old and new style FFS.
	 * @todo Refactor method into smaller parts.
	 */
	public static function parseGettextData( $data, $useCtxtAsKey = false, $mangler ) {
		$potmode = false;

		// Normalise newlines, to make processing easier lates
		$data = str_replace( "\r\n", "\n", $data );

		/* Delimit the file into sections, which are separated by two newlines.
		 * We are permissive and accept more than two. This parsing method isn't
		 * efficient wrt memory, but was easy to implement */
		$sections = preg_split( '/\n{2,}/', $data );

		/* First one isn't an actual message. We'll handle it specially below */
		$headerSection = array_shift( $sections );
		/* Since this is the header section, we are only interested in the tags
		 * and msgid is empty. Somewhere we should extract the header comments
		 * too */
		$match = self::expectKeyword( 'msgstr', $headerSection );
		if ( $match !== null ) {
			$headerBlock = self::formatForWiki( $match, 'trim' );
			$headers = self::parseHeaderTags( $headerBlock );

			// Check for pot-mode by checking if the header is fuzzy
			$flags = self::parseFlags( $headerSection );
			if ( in_array( 'fuzzy', $flags, true ) ) $potmode = true;
		} else {
			throw new MWException( "Gettext file header was not found:\n\n$data" );
		}

		// Extract some metadata from headers for easier use
		$metadata = array();
		if ( isset( $headers['X-Language-Code'] ) ) {
			$metadata['code'] = $headers['X-Language-Code'];
		}

		if ( isset( $headers['X-Message-Group'] ) ) {
			$metadata['group'] = $headers['X-Message-Group'];
		}

		/* At this stage we are only interested how many plurals forms we should
		 * be expecting when parsing the rest of this file. */
		$pluralCount = false;
		if ( isset( $headers['Plural-Forms'] ) ) {
			if ( preg_match( '/nplurals=([0-9]+).*;/', $headers['Plural-Forms'], $matches ) ) {
				$pluralCount = $metadata['plural'] = $matches[1];
			}
		}

		// Then parse the messages
		foreach ( $sections as $section ) {
			if ( trim( $section ) === '' ) {
				continue;
			}

			/* These inactive section are of no interest to us. Multiline mode
			 * is needed because there may be flags or other annoying stuff
			 * before the commented out sections.
			 */
			if ( preg_match( '/^#~/m', $section ) ) continue;

			$item = array(
				'ctxt'  => '',
				'id'    => '',
				'str'   => '',
				'flags' => array(),
				'comments' => array(),
			);

			$match = self::expectKeyword( 'msgid', $section );
			if ( $match !== null ) {
				$item['id'] = self::formatForWiki( $match );
			} else {
				throw new MWException( "Unable to parse msgid:\n\n$section" );
			}

			$match = self::expectKeyword( 'msgctxt', $section );
			if ( $match !== null ) {
				$item['ctxt'] = self::formatForWiki( $match );
			} elseif ( $useCtxtAsKey ) { // Invalid message
				$metadata['warnings'][] = "Ctxt missing for {$item['id']}";
				error_log( "Ctxt missing for {$item['id']}" );
			}


			$pluralMessage = false;
			$match = self::expectKeyword( 'msgid_plural', $section );
			if ( $match !== null ) {
				$pluralMessage = true;
				$plural = self::formatForWiki( $match );
				$item['id'] = "{{PLURAL:GETTEXT|{$item['id']}|$plural}}";
			}

			if ( $pluralMessage ) {
				$actualForms = array();
				for ( $i = 0; $i < $pluralCount; $i++ ) {
					$match = self::expectKeyword( "msgstr\\[$i\\]", $section );
					if ( $match !== null ) {
						$actualForms[] = self::formatForWiki( $match );
					} else {
						$actualForms[] = '';
						error_log( "Plural $i not found, expecting total of $pluralCount for {$item['id']}" );
					}
				}

				// Keep the translation empty if no form has translation
				if ( array_sum( array_map( 'strlen', $actualForms ) ) > 0 ) {
					$item['str'] = '{{PLURAL:GETTEXT|' . implode( '|', $actualForms ) . '}}';
				}
			} else {
				$match = self::expectKeyword( 'msgstr', $section );
				if ( $match !== null ) {
					$item['str'] = self::formatForWiki( $match );
				} else {
					throw new MWException( "Unable to parse msgstr:\n\n$section" );
				}
			}

			// Parse flags
			$flags = self::parseFlags( $section );
			foreach ( $flags as $key => $flag ) {
				if ( $flag === 'fuzzy' ) {
					$item['str'] = TRANSLATE_FUZZY . $item['str'];
					unset( $flags[$key] );
				}
			}
			$item['flags'] = $flags;
		
			// Rest of the comments
			$matches = array();
			if ( preg_match_all( '/^#(.?) (.*)$/m', $section, $matches, PREG_SET_ORDER ) ) {
				foreach ( $matches as $match ) {
					if ( $match[1] !== ',' && strpos( $match[1], '[Wiki]' ) !== 0 ) {
						$item['comments'][$match[1]][] = $match[2];
					}
				}
			}

			if ( $useCtxtAsKey ) {
				$key = $item['ctxt'];
			} else {
				$key = self::generateKeyFromItem( $item );
			}

			$key = $mangler->mangle( $key );

			$messages[$key] = $potmode ? $item['id'] : $item['str'];
			$template[$key] = $item;
		}

		return array(
			'MESSAGES' => $messages,
			'TEMPLATE' => $template,
			'METADATA' => $metadata,
			'HEADERS' => $headers
		);
	}

	public static function parseFlags( $section ) {
		$matches = array();
		if ( preg_match( '/^#,(.*)$/mu', $section, $matches ) ) {
			return array_map( 'trim', explode( ',', $matches[1] ) );
		} else {
			return array();
		}
	}

	public static function expectKeyword( $name, $section ) {
		/* Catches the multiline textblock that comes after keywords msgid,
		 * msgstr, msgid_plural, msgctxt.
		 */
		$poformat = '".*"\n?(^".*"$\n?)*';

		$matches = array();
		if ( preg_match( "/^$name\s($poformat)/mx", $section, $matches ) ) {
			return $matches[1];
		} else {
			return null;
		}
	}

	/**
	 * Generates unique key for each message. Changing this WILL BREAK ALL
	 * existing pages!
	 */
	public static function generateKeyFromItem( $item ) {
		$lang = Language::factory( 'en' );

		global $wgLegalTitleChars;

		$hash = sha1( $item['ctxt'] . $item['id'] );
		$snippet = $item['id'];
		$snippet = preg_replace( "/[^$wgLegalTitleChars]/", ' ', $snippet );
		$snippet = preg_replace( "/[:&%\/_]/", ' ', $snippet );
		$snippet = preg_replace( "/ {2,}/", ' ', $snippet );
		$snippet = $lang->truncate( $snippet, 30, '' );
		$snippet = str_replace( ' ', '_', trim( $snippet ) );

		return "$hash-$snippet";
	}

	/**
	 * This parses the Gettext text block format. Since trailing whitespace is
	 * not allowed in MediaWiki pages, the default action is to append
	 * \-character at the end of the message. You can also choose to ignore it
	 * and use the trim action instead.
	 */
	public static function formatForWiki( $data, $whitespace = 'mark' ) {
		$quotePattern = '/(^"|"$\n?)/m';
		$data = preg_replace( $quotePattern, '', $data );
		$data = stripcslashes( $data );

		if ( preg_match( '/\s$/', $data ) ) {
			if ( $whitespace === 'mark' )
				$data .= '\\';
			elseif ( $whitespace === 'trim' )
				$data = rtrim( $data );
			else
				// @todo Only triggered if there is trailing whitespace
				throw new MWException( 'Unknown action for whitespace' );
		}

		return $data;
	}

	public static function parseHeaderTags( $headers ) {
		$tags = array();
		foreach ( explode( "\n", $headers ) as $line ) {
			list( $key, $value ) = explode( ': ', $line, 2 );
			$tags[$key] = $value;
		}

		return $tags;
	}

	protected function writeReal( MessageCollection $collection ) {
		$pot = $this->read( 'en' );
		$template = $this->read( $collection->code );
		$pluralCount = false;
		$output = $this->doGettextHeader( $collection, $template, $pluralCount );

		foreach ( $collection as $key => $m ) {
			$transTemplate = isset( $template['TEMPLATE'][$key] ) ?
				$template['TEMPLATE'][$key] : array();
			$potTemplate = isset( $pot['TEMPLATE'][$key] ) ?
				$pot['TEMPLATE'][$key] : array();
			
			$output .= $this->formatMessageBlock( $key, $m, $transTemplate, $potTemplate, $pluralCount );
		}

		return $output;
	}

	protected function doGettextHeader( MessageCollection $collection, $template, &$pluralCount ) {
		global $wgSitename, $wgServer;
		$code = $collection->code;
		$name = TranslateUtils::getLanguageName( $code );
		$native = TranslateUtils::getLanguageName( $code, true );
		$authors = $this->doAuthors( $collection );
		if ( isset( $this->extra['header'] ) ) {
			$extra = "# --\n" . $this->extra['header'];
		} else {
			$extra = '';
		}

		$output = <<<PHP
# Translation of {$this->group->getLabel()} to $name ($native)
# Expored from $wgSitename
#
$authors$extra
PHP;

		// Make sure there is no empty line before msgid
		$output = trim( $output ) . "\n";

		/// @todo twn specific
		$portal = Title::makeTitle( NS_PORTAL, $code )->getFullUrl();

		$specs = isset( $template['HEADERS'] ) ? $template['HEADERS'] : array();

		$specs['Project-Id-Version'] = $this->group->getLabel();
		$specs['Report-Msgid-Bugs-To'] = $wgSitename;
		$specs['PO-Revision-Date'] = self::formatTime( wfTimestampNow() );
		$specs['X-POT-Import-Date'] = self::formatTime( $this->getPotTime() );
		$specs['Language-Team'] = "$name <$portal>";
		$specs['Content-Type'] = 'text/plain; charset=UTF-8';
		$specs['Content-Transfer-Encoding'] = '8bit';
		$specs['X-Generator'] = $this->getGenerator();
		$specs['X-Translation-Project'] = "$wgSitename at $wgServer";
		$specs['X-Language-Code'] = $code;
		// Prepend # so that message import does not think this is a file it can import
		$specs['X-Message-Group'] = '#' . $this->group->getId();
		$plural = self::getPluralRule( $code );
		if ( $plural ) {
			$specs['Plural-Forms'] = $plural;
		} elseif( !isset( $specs['Plural-Forms'] ) ) {
			$specs['Plural-Forms'] = 'nplurals=2; plural=(n != 1);';
		}

		$match = array();
		preg_match( '/nplurals=(\d+);/', $specs['Plural-Forms'], $match );
		$pluralCount = $match[1];

		$output .= 'msgid ""' . "\n";
		$output .= 'msgstr ""' . "\n";
		$output .= '""' . "\n";

		foreach ( $specs as $k => $v ) {
			$output .= self::escape( "$k: $v\n" ) . "\n";
		}

		$output .= "\n";

		return $output;
	}

	protected function doAuthors( MessageCollection $collection ) {
		$output = '';
		$authors = $collection->getAuthors();
		$authors = $this->filterAuthors( $authors, $collection->code );

		foreach ( $authors as $author ) {
			$output .= "# Author: $author\n";
		}

		return $output;
	}

	protected function formatMessageBlock( $key, $m, $trans, $pot, $pluralCount ) {
		$header = $this->formatDocumentation( $key );
		$content = '';

		$comments = self::chainGetter( 'comments', $pot, $trans, array() );
		foreach ( $comments as $type => $typecomments ) {
			foreach ( $typecomments as $comment ) {
				$header .= "#$type $comment\n";
			}
		}

		$flags = self::chainGetter( 'flags', $pot, $trans, array() );
		$flags = array_merge( $m->getTags(), $flags );

		$ctxt = self::chainGetter( 'ctxt', $pot, $trans, false );
		if ( $ctxt ) {
			$content .= 'msgctxt ' . self::escape( $ctxt ) . "\n";
		}

		$msgid = $m->definition();
		$msgstr = $m->translation();
		if ( strpos( $msgstr, TRANSLATE_FUZZY ) !== false ) {
			$msgstr = str_replace( TRANSLATE_FUZZY, '', $msgstr );
			// Might by fuzzy infile
			$flags[] = 'fuzzy';
		}

		if ( preg_match( '/{{PLURAL:GETTEXT/i', $msgid ) ) {
			$forms = $this->splitPlural( $msgid, 2 );
			$content .= 'msgid ' . $this->escape( $forms[0] ) . "\n";
			$content .= 'msgid_plural ' . $this->escape( $forms[1] ) . "\n";

			try {
				$forms = $this->splitPlural( $msgstr, $pluralCount );
				foreach ( $forms as $index => $form ) {
					$content .= "msgstr[$index] " . $this->escape( $form ) . "\n";
				}
			} catch ( GettextPluralException $e ) {
				$flags[] = 'invalid-plural';
				for ( $i = 0; $i < $pluralCount; $i++ ) {
					$content .= "msgstr[$i] \"\"\n";
				}
			}

		} else {
			$content .= 'msgid ' . self::escape( $msgid ) . "\n";
			$content .= 'msgstr ' . self::escape( $msgstr ) . "\n";
		}

		if ( $flags ) {
			sort( $flags );
			$header .= "#, " . implode( ', ', array_unique( $flags ) ) . "\n";
		}

		$output = $header ? $header : "#\n";
		$output .= $content . "\n";
		return $output;
	}

	protected static function chainGetter( $key, $a, $b, $default ) {
		if ( isset( $a[$key] ) ) {
			return $a[$key];
		} elseif ( isset( $b[$key] ) ) {
			return $b[$key];
		} else {
			return $default;
		}
	}

	protected static function formatTime( $time ) {
		$lang = Language::factory( 'en' );
		return $lang->sprintfDate( 'xnY-xnm-xnd xnH:xni:xns+0000', $time );
	}

	protected function getPotTime() {
		$defs = new MessageGroupCache( $this->group );
		return $defs->exists() ? $defs->getTimestamp() : wfTimestampNow();
	}

	protected function getGenerator() {
		return 'MediaWiki ' . SpecialVersion::getVersion() .
			"; Translate extension (" . TRANSLATE_VERSION . ")";
	}

	protected function formatDocumentation( $key ) {
		global $wgTranslateDocumentationLanguageCode;

		if ( !$this->offlineMode ) return '';

		$code = $wgTranslateDocumentationLanguageCode;
		if ( !$code ) return '';

		$documentation = TranslateUtils::getMessageContent( $key, $code, $this->group->getNamespace() );
		if ( !is_string( $documentation ) ) return '';

		$lines = explode( "\n", $documentation );
		$out = '';
		foreach ( $lines as $line ) {
			$out .= "#. [Wiki] $line\n";
		}
		return $out;
	}

	protected static function escape( $line ) {
		// There may be \ as a last character, for keeping trailing whitespace
		$line = preg_replace( '/\\\\$/', '', $line );
		$line = addcslashes( $line, '\\"' );
		$line = str_replace( "\n", '\n', $line );
		$line = '"' . $line . '"';

		return $line;
	}

	/**
	 * Returns plural rule for Gettext.
	 * @param $code \string Language code.
	 * @return \string
	 */
	public static function getPluralRule( $code ) {
		$rulefile = dirname( __FILE__ ) . '/../data/plural-gettext.txt';
		$rules = file_get_contents( $rulefile );
		foreach ( explode( "\n", $rules ) as $line ) {
			if ( trim( $line ) === '' ) continue;
			list( $rulecode, $rule ) = explode( "\t", $line );
			if ( $rulecode === $code ) return $rule;
		}
		return '';
	}

	protected function splitPlural( $text, $forms ) {
		if ( $forms === 1 ) {
			return $text;
		}

		$splitPlurals = array();
		for ( $i = 0; $i < $forms; $i++ ) {
			$plurals = array();
			$match = preg_match_all( '/{{PLURAL:GETTEXT\|(.*)}}/iU', $text, $plurals );

			if ( !$match ) {
				throw new GettextPluralException( "Failed to parse plural for: $text" );
			}

			$pluralForm = $text;
			foreach ( $plurals[0] as $index => $definition ) {
				$parsedFormsArray = explode( '|', $plurals[1][$index] );
				if ( !isset( $parsedFormsArray[$i] ) ) {
					error_log( "Too few plural forms in: $text" );
					$pluralForm = '';
				} else {
					$pluralForm = str_replace( $pluralForm, $definition, $parsedFormsArray[$i] );
				}
			}
			$splitPlurals[$i] = $pluralForm;
		}

		return $splitPlurals;
	}

}
