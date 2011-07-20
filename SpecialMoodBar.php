<?php

class SpecialMoodBar extends SpecialPage {	
	function __construct() {
		parent::__construct( 'MoodBar', 'moodbar-view' );
	}
	
	function execute($par) {
		global $wgUser, $wgOut;
		
		if ( !$this->userCanExecute( $wgUser ) ) {
			$this->displayRestrictionError();
			return;
		}
		
		$wgOut->setPageTitle( wfMsg( 'moodbar-admin-title' ) );
		$wgOut->addWikiMsg( 'moodbar-admin-intro' );
		
		$sk = $wgUser->getSkin();
		$downloadTitle = $this->getTitle('csv');
		$downloadText = wfMsgExt( 'moodbar-admin-download', 'parseinline' );
		$downloadLink = $sk->link( $downloadTitle, $downloadText );
		$wgOut->addHTML( $downloadLink );
		
		$dbr = wfGetDB( DB_SLAVE );
		
		$res = $dbr->select( 'moodbar_feedback', '*', 1, __METHOD__,
			array( 'order by' => 'mb_timestamp desc' ) );
		
		if ( $par == 'csv' ) {
			$this->csvOutput( $res );
		} else {
			$this->tableOutput( $res );
		}
	}
	
	function tableOutput( $res ) {
		global $wgOut;
		$html = $this->tableHeader();
		$rows = '';
		
		foreach( $res as $row ) {
			$rows .= $this->showEntry( $row );
		}
		
		$html .= Xml::tags( 'tbody', null, $rows );
		
		$html = Xml::tags( 'table', array( 'class' => 'wikitable' ), $html );
		
		$wgOut->addHTML( $html );
	}
	
	function csvOutput( $res ) {
		global $wgOut, $wgRequest;
		
		$ts = wfTimestampNow();
		$filename = "moodbar_feedback_$ts.csv";
		$wgOut->disable();
		wfResetOutputBuffers();
		$wgRequest->response()->header( "Content-disposition: attachment;filename={$filename}" );
		$wgRequest->response()->header( "Content-type: text/csv; charset=utf-8" );
		$fh = fopen( 'php://output', 'w' );
		
		$this->csvHeader( $fh );
		
		foreach( $res as $row ) {
			$data = MBFeedbackItem::load( $row );
			$outData = array();
			
			foreach( $this->fields as $field ) {
				$outData[] = MoodBarFormatter::getInternalRepresentation( $data, $field );
			}
			
			fputcsv( $fh, $outData );
		}
		
		fclose( $fh );
	}
	
	function csvHeader( $fh ) {
		fputcsv( $fh, $this->fields );
	}
	
	function tableHeader( ) {
		$html = "<thead>";
		$row = '';
		foreach( $this->fields as $field ) {
			$msg = wfMsgExt( 'moodbar-header-'.$field, 'parseinline' );
			$row .= Xml::tags( 'th', null, $msg );
		}
		
		$html .= Xml::tags( 'tr', null, $row ) . '</thead>';
		
		return $html;
	}
	
	function showEntry( $row ) {
		$out = '';
		
		$data = MBFeedbackItem::load( $row );
		$outData = null;
		
		foreach( $this->fields as $field ) {
			$outData = MoodBarFormatter::getHTMLRepresentation( $data, $field );
			$out .= Xml::tags( 'td', null, $outData );
		}
		
		$out = Xml::tags( 'tr', null, $out );
		
		return $out;
	}
}

