<?php
/**
 * Create iCalendar exports
 * @file
 * @ingroup SemanticResultFormats
 */

/**
 * Printer class for creating iCalendar exports
 * 
 * @author Markus Krötzsch
 * @author Denny Vrandecic
 * @author Jeroen De Dauw
 * 
 * @ingroup SemanticResultFormats
 */
class SRFiCalendar extends SMWResultPrinter {
	
	protected $m_title;
	protected $m_description;

	protected function handleParameters( array $params, $outputmode ) {
		parent::handleParameters( $params, $outputmode );
		
		$this->m_params = trim( $params['title'] );
		$this->m_description = trim( $params['icalendardescription'] );
	}

	public function getMimeType( $res ) {
		return 'text/calendar';
	}

	public function getFileName( $res ) {
		if ( $this->m_title != '' ) {
			return str_replace( ' ', '_', $this->m_title ) . '.ics';
		} else {
			return 'iCalendar.ics';
		}
	}

	public function getQueryMode( $context ) {
		return ( $context == SMWQueryProcessor::SPECIAL_PAGE ) ? SMWQuery::MODE_INSTANCES : SMWQuery::MODE_NONE;
	}

	public function getName() {
		return wfMsg( 'srf_printername_icalendar' );
	}

	protected function getResultText( SMWQueryResult $res, $outputmode ) {
		return $outputmode == SMW_OUTPUT_FILE ? $this->getIcal( $res ) : $this->getIcalLink( $res, $outputmode );
	}
	
	/**
	 * Returns the query result in iCal.
	 * 
	 * @since 1.5.2
	 *  
	 * @param SMWQueryResult $res
	 * 
	 * @return string
	 */
	protected function getIcal( SMWQueryResult $res ) {
		$result = '';
		
		if ( $this->m_title == '' ) {
			global $wgSitename;
			$this->m_title = $wgSitename;
		}
		
		$result .= "BEGIN:VCALENDAR\r\n";
		$result .= "PRODID:-//SMW Project//Semantic Result Formats\r\n";
		$result .= "VERSION:2.0\r\n";
		$result .= "METHOD:PUBLISH\r\n";
		$result .= "X-WR-CALNAME:" . $this->m_title . "\r\n";
		
		if ( $this->m_description !== '' ) {
			$result .= "X-WR-CALDESC:" . $this->m_description . "\r\n";
		}
		
		// TODO: http://www.kanzaki.com/docs/ical/vtimezone.html
		// $result .= "BEGIN:VTIMEZONE\r\n";
		// $result .= "TZID:\r\n";

		$row = $res->getNext();
		while ( $row !== false ) {
			$result .= $this->getIcalForItem( $row );
			$row = $res->getNext();
		}
		
		// $result .= "END:VTIMEZONE\r\n";
		
		$result .= "END:VCALENDAR\r\n";

		return $result;
	}

	/**
	 * Returns html for a link to a query that returns the iCal.
	 * 
	 * @since 1.5.2
	 *  
	 * @param SMWQueryResult $res
	 * @param $outputmode
	 * 
	 * @return string
	 */	
	protected function getIcalLink( SMWQueryResult $res, $outputmode ) {
		if ( $this->getSearchLabel( $outputmode ) ) {
			$label = $this->getSearchLabel( $outputmode );
		} else {
			$label = wfMsgForContent( 'srf_icalendar_link' );
		}
		
		$link = $res->getQueryLink( $label );
		$link->setParameter( 'icalendar', 'format' );
		
		if ( $this->m_title !== '' ) {
			$link->setParameter( $this->m_title, 'title' );
		}
		
		if ( $this->m_description !== '' ) {
			$link->setParameter( $this->m_description, 'description' );
		}
		
		if ( array_key_exists( 'limit', $this->m_params ) ) {
			$link->setParameter( $this->m_params['limit'], 'limit' );
		} else { // use a reasonable default limit
			$link->setParameter( 20, 'limit' );
		}

		// yes, our code can be viewed as HTML if requested, no more parsing needed
		$this->isHTML = ( $outputmode == SMW_OUTPUT_HTML ); 
		return $link->getText( $outputmode, $this->mLinker );
	}
	
	/**
	 * Returns the iCal for a single item.
	 * 
	 * @since 1.5.2
	 * 
	 * @param array $row
	 * 
	 * @return string
	 */
	protected function getIcalForItem( array $row ) {
		$result = '';
		
		$wikipage = $row[0]->getResultSubject(); // get the object
		
		// As of SMW 1.6, a SMWDiWikiPage object will be provided instead of a SMWWikiPageValue.
		if ( class_exists( 'SMWDiWikiPage' ) && $wikipage instanceof SMWDiWikiPage ) {
			$wikipage = SMWDataValueFactory::newDataItemValue( $wikipage, null );
		}
		
		$startdate = false;
		$enddate = false;
		$location = '';
		$description = '';
		
		foreach ( $row as /* SMWResultArray */ $field ) {
			// later we may add more things like a generic
			// mechanism to add whatever you want :)
			// could include funny things like geo, description etc. though
			$req = $field->getPrintRequest();
			$label = strtolower( $req->getLabel() );
			
			if ( $label == 'start' && $req->getTypeID() == '_dat' ) {
				$startdate = efSRFGetNextDV( $field ); // save only the first
			}
			else if ( $label == 'end' && $req->getTypeID() == '_dat' ) {
				$enddate = efSRFGetNextDV( $field ); // save only the first
			}
			else if ( $label == 'location' ) {
				$value = efSRFGetNextDV( $field ); // save only the first
				if ( $value !== false ) {
					$location = $value->getShortWikiText();
				}
			}
			else if ( $label == 'description' ) {
				$value = efSRFGetNextDV( $field ); // save only the first
				if ( $value !== false ) {
					$description = $value->getShortWikiText();
				}
			}
		}
		
		$title = $wikipage->getTitle();
		$article = new Article( $title );
		$url = $title->getFullURL();
		
		$result .= "BEGIN:VEVENT\r\n";
		$result .= "SUMMARY:" . $wikipage->getShortWikiText() . "\r\n";
		$result .= "URL:$url\r\n";
		$result .= "UID:$url\r\n";
		
		if ( $startdate != false ) $result .= "DTSTART:" . $this->parsedate( $startdate ) . "\r\n";
		if ( $enddate != false )   $result .= "DTEND:" . $this->parsedate( $enddate, true ) . "\r\n";
		if ( $location != "" )  $result .= "LOCATION:$location\r\n";
		if ( $description != "" )  $result .= "DESCRIPTION:$description\r\n";
		
		$t = strtotime( str_replace( 'T', ' ', $article->getTimestamp() ) );
		$result .= "DTSTAMP:" . date( "Ymd", $t ) . "T" . date( "His", $t ) . "\r\n";
		$result .= "SEQUENCE:" . $title->getLatestRevID() . "\r\n";
		$result .= "END:VEVENT\r\n";
		
		return $result;
	}

	/**
	 * Extract a date string formatted for iCalendar from a SMWTimeValue object.
	 */
	static private function parsedate( SMWTimeValue $dv, $isend = false ) {
		$year = $dv->getYear();
		if ( ( $year > 9999 ) || ( $year < - 9998 ) ) return ''; // ISO range is limited to four digits
		
		$year = number_format( $year, 0, '.', '' );
		$time = str_replace( ':', '', $dv->getTimeString( false ) );
		
		if ( ( $time == false ) && ( $isend ) ) { // increment by one day, compute date to cover leap years etc.
			$dv = SMWDataValueFactory::newTypeIDValue( '_dat', $dv->getWikiValue() . 'T00:00:00-24:00' );
		}
		
		$month = $dv->getMonth();
		if ( strlen( $month ) == 1 ) $month = '0' . $month;
		
		$day = $dv->getDay();
		if ( strlen( $day ) == 1 ) $day = '0' . $day;
		
		$result = $year . $month . $day;
		
		if ( $time != false ) $result .= "T$time";
		
		return $result;
	}

	public function getParameters() {
		$params = array_merge( parent::getParameters(), $this->exportFormatParameters() );
		
		$params['title'] = new Parameter( 'title' );
		$params['title']->setMessage( 'srf_paramdesc_icalendartitle' );
		$params['title']->setDefault( '' );
		
		$params['description'] = new Parameter( 'description' );
		$params['description']->setMessage( 'srf_paramdesc_icalendardescription' );
		$params['description']->setDefault( '' );
		
		return $params;
	}

}
