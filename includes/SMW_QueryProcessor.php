<?php
/**
 * This file contains a static class for accessing functions to generate and execute
 * semantic queries and to serialise their results.
 * @file
 * @ingroup SMWQuery
 * @author Markus Krötzsch
 */

/**
 * Static class for accessing functions to generate and execute semantic queries
 * and to serialise their results.
 * @ingroup SMWQuery
 */
class SMWQueryProcessor {

	// "query contexts" define restrictions during query parsing and
	// are used to preconfigure query (e.g. special pages show no further
	// results link):
	const SPECIAL_PAGE = 0; // query for special page
	const INLINE_QUERY = 1; // query for inline use
	const CONCEPT_DESC = 2; // query for concept definition

	/**
	 * Parse a query string given in SMW's query language to create
	 * an SMWQuery. Parameters are given as key-value-pairs in the
	 * given array. The parameter $context defines in what context the
	 * query is used, which affects ceretain general settings.
	 * An object of type SMWQuery is returned.
	 *
	 * The format string is used to specify the output format if already
	 * known. Otherwise it will be determined from the parameters when
	 * needed. This parameter is just for optimisation in a common case.
	 *
	 * @return SMWQuery
	 */
	static public function createQuery( $querystring, array $params, $context = self::INLINE_QUERY, $format = '', $extraprintouts = array() ) {
		global $smwgQDefaultNamespaces, $smwgQFeatures, $smwgQConceptFeatures;
		
		// TODO: this is a hack
		// Idially one round of Validation would be done through Validator on this level
		// instead of on query printer level and then have weirdness here.
		$formatParam = new SMWParamFormat();
		$p = array();
		$formatParam->doManipulation( $format, new Parameter( 'format' ), $p );

		// parse query:
		$queryfeatures = ( $context == self::CONCEPT_DESC ) ? $smwgQConceptFeatures : $smwgQFeatures;
		$qp = new SMWQueryParser( $queryfeatures );
		$qp->setDefaultNamespaces( $smwgQDefaultNamespaces );
		$desc = $qp->getQueryDescription( $querystring );

		if ( $format == 'count' ) {
			$querymode = SMWQuery::MODE_COUNT;
		} elseif ( $format == 'debug' ) {
			$querymode = SMWQuery::MODE_DEBUG;
		} else {
			$printer = self::getResultPrinter( $format, $context );
			$querymode = $printer->getQueryMode( $context );
		}

		$mainlabel = array_key_exists( 'mainlabel', $params ) ? $params['mainlabel'] : ''; 
		if ( ( $querymode == SMWQuery::MODE_NONE ) ||
		     ( ( !$desc->isSingleton() || ( count( $desc->getPrintRequests() ) + count( $extraprintouts ) == 0 ) )
		       && ( trim( $mainlabel ) != '-' ) ) ) {
			$desc->prependPrintRequest( new SMWPrintRequest( SMWPrintRequest::PRINT_THIS, $mainlabel ) );
		}

		$query = new SMWQuery( $desc, ( $context != self::SPECIAL_PAGE ), ( $context == self::CONCEPT_DESC ) );
		$query->setQueryString( $querystring );
		$query->setExtraPrintouts( $extraprintouts );
		$query->setMainLabel( $mainlabel );
		$query->addErrors( $qp->getErrors() ); // keep parsing errors for later output

		// set mode, limit, and offset:
		$query->querymode = $querymode;
		if ( ( array_key_exists( 'offset', $params ) ) && ( is_int( $params['offset'] + 0 ) ) ) {
			$query->setOffset( max( 0, trim( $params['offset'] ) + 0 ) );
		}

		if ( $query->querymode == SMWQuery::MODE_COUNT ) { // largest possible limit for "count", even inline
			global $smwgQMaxLimit;
			$query->setOffset( 0 );
			$query->setLimit( $smwgQMaxLimit, false );
		} else {
			if ( ( array_key_exists( 'limit', $params ) ) && ( is_int( trim( $params['limit'] ) + 0 ) ) ) {
				$query->setLimit( max( 0, trim( $params['limit'] ) + 0 ) );
				if ( ( trim( $params['limit'] ) + 0 ) < 0 ) { // limit < 0: always show further results link only
					$query->querymode = SMWQuery::MODE_NONE;
				}
			} else {
				global $smwgQDefaultLimit;
				$query->setLimit( $smwgQDefaultLimit );
			}
		}

		// determine sortkeys and ascendings:
		if ( array_key_exists( 'order', $params ) ) {
			$orders = explode( ',', $params['order'] );

			foreach ( $orders as $key => $order ) { // normalise
				$order = strtolower( trim( $order ) );
				if ( ( $order == 'descending' ) || ( $order == 'reverse' ) || ( $order == 'desc' ) ) {
					$orders[$key] = 'DESC';
				} elseif ( ( $order == 'random' ) || ( $order == 'rand' ) ) {
					$orders[$key] = 'RANDOM';
				} else {
					$orders[$key] = 'ASC';
				}
			}
		} else {
			$orders = array();
		}

		reset( $orders );

		if ( array_key_exists( 'sort', $params ) ) {
			$query->sort = true;
			$query->sortkeys = array();

			foreach ( explode( ',', $params['sort'] ) as $sort ) {
				$propertyValue = SMWPropertyValue::makeUserProperty( trim( $sort ) );
				if ( $propertyValue->isValid() ) {
					$sortkey = $propertyValue->getDataItem()->getKey();
					$order = current( $orders );
					if ( $order === false ) { // default
						$order = 'ASC';
					}
					$query->sortkeys[$sortkey] = $order; // should we check for duplicate sort keys?
					next( $orders );
				} else {
					$query->addErrors( $propertyValue->getErrors() );
				}
			}

			if ( current( $orders ) !== false ) { // sort key remaining, apply to page name
				$query->sortkeys[''] = current( $orders );
			}
		} elseif ( $format == 'rss' ) { // unsorted RSS: use *descending* default order
			// TODO: the default sort field should be "modification date" (now it is the title, but
			// likely to be overwritten by printouts with label "date").
			$query->sortkeys[''] = ( current( $orders ) != false ) ? current( $orders ) : 'DESC';
		} else { // sort by page title (main column) by default
			$query->sortkeys[''] = ( current( $orders ) != false ) ? current( $orders ) : 'ASC';
		} // TODO: check and report if there are further order statements?

		return $query;
	}

	/**
	 * Preprocess a query as given by an array of parameters as is typically
	 * produced by the #ask parser function. The parsing results in a querystring,
	 * an array of additional parameters, and an array of additional SMWPrintRequest
	 * objects, which are filled into call-by-ref parameters.
	 * $showmode is true if the input should be treated as if given by #show
	 */
	static public function processFunctionParams( array $rawparams, &$querystring, &$params, &$printouts, $showmode = false ) {
		global $wgContLang;

		$querystring = '';
		$printouts = array();
		$lastprintout = null;
		$params = array();

		foreach ( $rawparams as $name => $param ) {
			// special handling for arrays - this can happen if the
			// param came from a checkboxes input in Special:Ask
			if ( is_array( $param ) ) {
				$param = implode( ',', array_keys( $param ) );
			}

			if ( is_string( $name ) && ( $name != '' ) ) { // accept 'name' => 'value' just as '' => 'name=value'
				$param = $name . '=' . $param;
			}

			if ( $param == '' ) {
			} elseif ( $param { 0 } == '?' ) { // print statement
				$param = substr( $param, 1 );
				$parts = explode( '=', $param, 2 );
				$propparts = explode( '#', $parts[0], 2 );

				$data = null;

				if ( trim( $propparts[0] ) == '' ) { // print "this"
					$printmode = SMWPrintRequest::PRINT_THIS;
					$label = ''; // default
					$title = null;
				} elseif ( $wgContLang->getNsText( NS_CATEGORY ) == ucfirst( trim( $propparts[0] ) ) ) { // print categories
					$title = null;
					$printmode = SMWPrintRequest::PRINT_CATS;
					$label = $showmode ? '' : $wgContLang->getNSText( NS_CATEGORY ); // default
				} else { // print property or check category
					$title = Title::newFromText( trim( $propparts[0] ), SMW_NS_PROPERTY ); // trim needed for \n
					if ( $title === null ) { // too bad, this is no legal property/category name, ignore
						continue;
					}

					if ( $title->getNamespace() == NS_CATEGORY ) {
						$printmode = SMWPrintRequest::PRINT_CCAT;
						$data = $title;
						$label = $showmode ? '' : $title->getText();  // default
					} else { // enforce interpretation as property (even if it starts with something that looks like another namespace)
						$printmode = SMWPrintRequest::PRINT_PROP;
						$property = SMWPropertyValue::makeUserProperty( trim( $propparts[0] ) );
						$data = $property;
						$label = $showmode ? '' : $property->getWikiValue();  // default
					}
				}

				if ( count( $propparts ) == 1 ) { // no outputformat found, leave empty
					$propparts[] = false;
				} elseif ( trim( $propparts[1] ) == '' ) { // "plain printout", avoid empty string to avoid confusions with "false"
					$propparts[1] = '-';
				}

				if ( count( $parts ) > 1 ) { // label found, use this instead of default
					$label = trim( $parts[1] );
				}

				$lastprintout = new SMWPrintRequest( $printmode, $label, $data, trim( $propparts[1] ) );
				$printouts[] = $lastprintout;
			} elseif ( $param[0] == '+' ) { // print request parameter
				if ( $lastprintout !== null ) {
					$param = substr( $param, 1 );
					$parts = explode( '=', $param, 2 );
					if ( count( $parts ) == 2 ) {
						$lastprintout->setParameter( trim( $parts[0] ), $parts[1] );
					}
				}
			} else { // parameter or query
				$parts = explode( '=', $param, 2 );

				if ( count( $parts ) >= 2 ) {
					$params[strtolower( trim( $parts[0] ) )] = $parts[1]; // don't trim here, some params care for " "
				} else {
					$querystring .= $param;
				}
			}
		}

		$querystring = str_replace( array( '&lt;', '&gt;' ), array( '<', '>' ), $querystring );
		if ( $showmode ) {
			$querystring = "[[:$querystring]]";
		}
	}

	/**
	 * Process and answer a query as given by an array of parameters as is
	 * typically produced by the #ask parser function. The result is formatted
	 * according to the specified $outputformat. The parameter $context defines
	 * in what context the query is used, which affects ceretain general settings.
	 *
	 * The main task of this function is to preprocess the raw parameters to
	 * obtain actual parameters, printout requests, and the query string for
	 * further processing.
	 */
	static public function getResultFromFunctionParams( array $rawparams, $outputmode, $context = self::INLINE_QUERY, $showmode = false ) {
		self::processFunctionParams( $rawparams, $querystring, $params, $printouts, $showmode );
		return self::getResultFromQueryString( $querystring, $params, $printouts, SMW_OUTPUT_WIKI, $context );
	}

	/**
	 * Process a query string in SMW's query language and return a formatted
	 * result set as specified by $outputmode. A parameter array of key-value-pairs
	 * constrains the query and determines the serialisation mode for results. The
	 * parameter $context defines in what context the query is used, which affects
	 * certain general settings. Finally, $extraprintouts supplies additional
	 * printout requests for the query results.
	 */
	static public function getResultFromQueryString( $querystring, array $params, $extraprintouts, $outputmode, $context = self::INLINE_QUERY ) {
		wfProfileIn( 'SMWQueryProcessor::getResultFromQueryString (SMW)' );

		$format = array_key_exists( 'format', $params ) ? $params['format'] : '';
		$query  = self::createQuery( $querystring, $params, $context, $format, $extraprintouts );
		$result = self::getResultFromQuery( $query, $params, $extraprintouts, $outputmode, $context, $format );

		wfProfileOut( 'SMWQueryProcessor::getResultFromQueryString (SMW)' );

		return $result;
	}

	static public function getResultFromQuery( SMWQuery $query, array $params, $extraprintouts, $outputmode, $context = self::INLINE_QUERY, $format = '' ) {
		wfProfileIn( 'SMWQueryProcessor::getResultFromQuery (SMW)' );

		// TODO: this is a hack
		// Idially one round of Validation would be done through Validator on this level
		// instead of on query printer level and then have weirdness here.
		$formatParam = new SMWParamFormat();
		$p = array();
		$formatParam->doManipulation( $format, new Parameter( 'format' ), $p );		

		// Query routing allows extensions to provide alternative stores as data sources
		// The while feature is experimental and is not properly integrated with most of SMW's architecture. For instance, some query printers just fetch their own store.
		// @todo FIXME: case-insensitive
		global $smwgQuerySources;

		if ( array_key_exists( 'source', $params ) && array_key_exists( $params['source'], $smwgQuerySources ) ) {
			$store = new $smwgQuerySources[$params['source']]();
			$query->params = $params; // this is a hack
		} else {
			$store = smwfGetStore(); // default store
		}

		$res = $store->getQueryResult( $query );

		if ( ( $query->querymode == SMWQuery::MODE_INSTANCES ) || ( $query->querymode == SMWQuery::MODE_NONE ) ) {
			wfProfileIn( 'SMWQueryProcessor::getResultFromQuery-printout (SMW)' );

			if ( $format == '' ) {
				$format = self::getResultFormat( $params );
			}

			$printer = self::getResultPrinter( $format, $context, $res );
			$result = $printer->getResult( $res, $params, $outputmode );

			wfProfileOut( 'SMWQueryProcessor::getResultFromQuery-printout (SMW)' );
			wfProfileOut( 'SMWQueryProcessor::getResultFromQuery (SMW)' );

			return $result;
		} else { // result for counting or debugging is just a string
			if ( is_string( $res ) ) {
				if ( array_key_exists( 'intro', $params ) ) {
					$res = str_replace( '_', ' ', $params['intro'] ) . $res;
				}
				if ( array_key_exists( 'outro', $params ) ) {
					$res .= str_replace( '_', ' ', $params['outro'] );
				}
				
				$result = $res . smwfEncodeMessages( $query->getErrors() );
			}
			else {
				// When no valid result was obtained, $res will be a SMWQueryResult.
				$result = smwfEncodeMessages( $query->getErrors() );
			}
			
			wfProfileOut( 'SMWQueryProcessor::getResultFromQuery (SMW)' );
			
			return $result;
		}
	}

	/**
	 * Find suitable SMWResultPrinter for the given format. The context in which the query is to be
	 * used determines some basic settings of the returned printer object. Possible contexts are
	 * SMWQueryProcessor::SPECIAL_PAGE, SMWQueryProcessor::INLINE_QUERY, SMWQueryProcessor::CONCEPT_DESC.
	 *
	 * @param string $format
	 * @param $context
	 *
	 * @return SMWResultPrinter
	 */
	static public function getResultPrinter( $format, $context = self::SPECIAL_PAGE ) {
		global $smwgResultFormats;

		$formatClass = array_key_exists( $format, $smwgResultFormats ) ? $smwgResultFormats[$format] : 'SMWAutoResultPrinter';

		return new $formatClass( $format, ( $context != self::SPECIAL_PAGE ) );
	}

}