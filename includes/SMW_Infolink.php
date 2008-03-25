<?php
/**
 * This file contains the SMWInfolink class.
 *
 * @author Markus Krötzsch
 */

/**
 * This class mainly is a container to store URLs for the factbox in a
 * clean way. The class provides methods for creating source code for
 * realising them in wiki or html contexts.
 *
 * @note AUTOLOAD
 */
class SMWInfolink {
	private $m_target;      // the actual link target
	private $m_caption;     // the label for the link
	private $m_style;       // CSS class of a span to embedd the link into, or
	                        // false if no extra style is required
	private $m_internal;    // indicates whether $target is a page name (true) or URL (false)
	private $m_params;      // array of parameters, format $name => $value, if any


	/**
	 * Create a new link to some internal page or to some external URL.
	 */
	public function __construct($internal, $caption, $target, $style=false, $params = array()) {
		$this->m_internal = $internal;
		$this->m_caption = $caption;
		$this->m_target = $target;
		$this->m_style = $style;
		$this->m_params = $params;
	}


	/**
	 * Create a new link to an internal page $target. All parameters are mere strings
	 * as used by wiki users
	 */
	public static function newInternalLink($caption, $target, $style=false, $params = array()) {
		return new SMWInfolink(true,$caption,$target,$style,$params);
	}

	/**
	 * Create a new link to an external location $url.
	 */
	public static function newExternalLink($caption, $url, $style=false, $params = array()) {
		return new SMWInfolink(false,$caption,$url,$style,$params);
	}

	/**
	 * Static function to construct links to property searches.
	 */
	public static function newPropertySearchLink($caption,$propertyname,$value,$style = 'smwsearch') {
		global $wgContLang;
		return new SMWInfolink(true,$caption,$wgContLang->getNsText(NS_SPECIAL) . ':SearchByProperty/' .  $propertyname . '::' . $value, $style);
	}

	/**
	 * Static function to construct links to inverse property searches.
	 */
	public static function newInversePropertySearchLink($caption,$subject,$propertyname,$style = false) {
		global $wgContLang;
		return new SMWInfolink(true,$caption,$wgContLang->getNsText(NS_SPECIAL) . ':PageProperty/' .  $subject . '::' . $propertyname, $style);
	}

	/**
	 * Static function to construct links to the browsing special.
	 */
	public static function newBrowsingLink($caption,$titletext,$style = 'smwbrowse') {
		global $wgContLang;
		return new SMWInfolink(true,$caption,$wgContLang->getNsText(NS_SPECIAL) . ':Browse/' .  $titletext, $style);
	}


	/**
	 * Returns a suitable text string for displaying this link in HTML or wiki, depending
	 * on whether $outputformat is SMW_OUTPUT_WIKI or SMW_OUTPUT_HTML.
	 *
	 * The parameter $linker controls linking of values such as titles and should
	 * be some Linker object (for HTML output). Some default linker will be created
	 * if needed and not provided.
	 */
	public function getText($outputformat, $linker = NULL) {
		if ($this->m_style !== false) {
			smwfRequireHeadItem(SMW_HEADER_STYLE); // make SMW styles available
			$start = "<span class=\"$this->m_style\">";
			$end = '</span>';
		} else {
			$start = '';
			$end = '';
		}
		if ($this->m_internal) {
			$title = Title::newFromText($this->m_target);
			if ($title !== NULL) {
				if ($outputformat == SMW_OUTPUT_WIKI) {
					$link = "[[$this->m_target|$this->m_caption]]";
				} else { // SMW_OUTPUT_HTML
					$link = $this->getLinker($linker)->makeKnownLinkObj($title, $this->m_caption);
				}
			} else { // Title creation failed, maybe illegal symbols or too long; make a direct URL link 
			         // (only possible if offending target parts belong to some parameter
			         //  that can be separated from title text,
			         //  e.g. as in Special:Bla/il<leg>al -> Special:Bla&p=il&lt;leg&gt;al)
				return '';
// 				if ($outputformat == SMW_OUTPUT_WIKI) {
// 					$link = '[' . SMWExporter::expandURI('&wikiurl;' . rawurlencode($this->m_target)) . " $this->m_caption]";
// 				} else {
// 					$link = '<a href="' . SMWExporter::expandURI('&wikiurl;' . rawurlencode($this->m_target)) . "\">$this->m_caption</a>";
// 				}
			}
		} else {
			if ($outputformat == SMW_OUTPUT_WIKI) {
				$link = "[$this->m_target $this->m_caption]";
			} else {
				$link = "<a href=\"$this->m_target\">$this->m_caption</a>";
			}
		}

		return $start . $link . $end;
	}


	/**
	 * Return a Linker object, using the parameter $linker if not NULL, and creatng a new one
	 * otherwise. $linker is usually a user skin object, while the fallback linker object is 
	 * not customised to user settings.
	 */
	protected function getLinker(&$linker = NULL) {
		if ($linker === NULL) {
			$linker = new Linker();
		} else {
			return $linker;
		}
	}


	/**
	 * Return hyperlink for this infolink in HTML format.
	 */
	public function getHTML($linker) {
		return $this->getText(SMW_OUTPUT_HTML, $linker);
// 		if ($this->m_style !== false) {
// 			smwfRequireHeadItem(SMW_HEADER_STYLE); // make SMW styles available
// 			$start = "<span class=\"$this->m_style\">";
// 			$end = '</span>';
// 		} else {
// 			$start = '';
// 			$end = '';
// 		}
// 		if ($this->m_internal) {
// 			$title = Title::newFromText($this->m_target);
// 			if ($title !== NULL) {
// 				return $start . $linker->makeKnownLinkObj(Title::newFromText($this->m_target), $this->m_caption) . $end;
// 			} else { // Title creation failed, maybe illegal symbols or too long
// 				return '';
// 			}
// 		} else {
// 			return $start . "<a href=\"$this->m_target\">$this->m_caption</a>" . $end;
// 		}
	}

	/**
	 * Return hyperlink for this infolink in wiki format.
	 */
	public function getWikiText($linker = NULL) {
		return $this->getText(SMW_OUTPUT_WIKI, $linker);
// 		if ($this->m_style !== false) {
// 			smwfRequireHeadItem(SMW_HEADER_STYLE); // make SMW styles available
// 			$start = "<span class=\"$this->m_style\">";
// 			$end = '</span>';
// 		} else {
// 			$start = '';
// 			$end = '';
// 		}
// 		if ($this->m_internal) {
// 			if (preg_match('/(.*)(\[|\]|<|>|&gt;|&lt;|\'\'|{|})(.*)/u', $this->m_target) != 0 ) {
// 				return ''; // give up if illegal characters occur,
// 				           /// TODO: we would need a skin to provide an ext URL in this case
// 			}
// 			return $start . "[[$this->m_target|$this->m_caption]]" . $end;
// 		} else {
// 			return $start . "[$this->m_target $this->m_caption]" . $end;
// 		}
	}

	/**
	 * Encode an array of parameters, formatted as $name => $value, to a parameter
	 * string that can be used for linking. If $forTitle is true (default), then the
	 * parameters are encoded for use in a MediaWiki page title (useful for making
	 * internal links to parameterised special pages), otherwise the parameters are
	 * encoded HTTP GET style. The parameter name "x" is used to collect parameters
	 * that do not have any string keys in GET, and hance "x" should never be used
	 * as a parameter name.
	 *
	 * The function SMWInfolink::decodeParameters() can be used to undo this encoding.
	 * It is strongly recommended to not create any code that depends on the concrete
	 * way of how parameters are encoded within this function, and to always use the
	 * respective encoding/decoding methods instead.
	 */
	static public function encodeParameters($params, $forTitle = true) {
		$result = '';
		if ($forTitle) {
			foreach ($params as $name => $value) {
				if ( is_string($name) && ($name != '') ) $value = $name . '=' . $value;
				$value = str_replace(array('/','=','-',',','%'),array('-2F','-3D','-2D','-2C','-'), rawurlencode($value));
				if ($result != '') $result .= '/';
				$result .= $value;
			}
		} else {
			$q = array(); // collect unlabelled query parameters here
			foreach ($params as $name => $value) {
				if ( is_string($name) && ($name != '') ) {
					$value = $name . '=' . rawurlencode($value);
					if ($result != '') $result .= '&';
					$result .= $value;
				} else {
					$q[] = $value;
				}
			}
			if (count($q)>0) { // prepend encoding for unlabelled parameters
				if ($result != '') $result = '&' . $result;
				$result = 'x=' . SMWInfolink::encodeParameters($q,true) . $result;
			}
		}
		return $result;
	}

	/**
	 * Obtain an array of parameters from the parameters given to some HTTP service.
	 * In particular, this function perfoms all necessary decoding as may be needed, e.g.,
	 * to recover the proper paramter strings after encoding for use in wiki title names
	 * as done by SMWInfolink::encodeParameters(). It is assumed that further data can be
	 * obtained from the global $wgRequest.
	 * 
	 * $titleparam is the string extracted by MediaWiki from special page calls of the 
	 * form Special:Something/titleparam
	 *
	 * The function SMWInfolink::encodeParameters() can be used to create a suitable 
	 * encoding. It is strongly recommended to not create any code that depends on the 
	 * concrete way of how parameters are encoded within this function, and to always use 
	 * the respective encoding/decoding methods instead.
	 */
	static public function decodeParameters($titleparam = '') {
		global $wgRequest;
		$result = $wgRequest->getValues();
		if (array_key_exists('x',$result)) { // considered to be part of the title param
			if ($titleparam != '') $titleparam .= '/';
			$titleparam .= $result['x'];
			unset($result['x']);
		}
		if ($titleparam != '') {
			// unescape $p; escaping scheme: all parameters rawurlencoded, "-" and "/" urlencoded, all "%" replaced by "-", parameters then joined with /
			$ps = explode('/', $titleparam); // params separated by / here (compatible with wiki link syntax)
			foreach ($ps as $p) {
				if ($p != '') {
					$p = rawurldecode(str_replace('-', '%', $p));
					$parts = explode('=',$p, 2);
					if (count($parts)>1) {
						$result[$parts[0]] = $parts[1];
					} else {
						$result[] = $parts[0];
					}
				}
			}
		}
		return $result;
	}

}
