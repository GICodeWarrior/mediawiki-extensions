<?php

/**
 * Class file for the ProfileMonitor extension
 *
 * @file
 * @ingroup Extensions
 * @author Rob Church <rob.church@mintrasystems.com>
 */

class ProfileMonitor extends SpecialPage {

	public function __construct() {
		parent::__construct( 'Profiling' );
	}

	public function execute( $par ) {
		global $wgOut, $wgRequest, $wgExtensionAssetsPath;

		$this->setHeaders();

		$process = $wgRequest->getText( 'process' );
		$wild = $wgRequest->getCheck( 'wildcard' );

		$wgOut->addExtensionStyle( $wgExtensionAssetsPath . '/ProfileMonitor/ProfileMonitor.css' );
		$wgOut->addHTML( $this->makeSearchForm( $process, $wild ) );

		if( $wgRequest->getCheck( 'submit' ) ) {
			$dbr = wfGetDB( DB_SLAVE );
			$res = $dbr->query( $this->makeSql( $dbr, $process, $wild ), __METHOD__ );
			if( $res && $dbr->numRows( $res ) > 0 ) {
				while( $row = $dbr->fetchObject( $res ) )
					$data[] = $row;
				$dbr->freeResult( $res );
				$wgOut->addHTML( '<h2>' . wfMsgHtml( 'profiling-data', htmlspecialchars( $process ) ) . '</h2>' );
				$wgOut->addHTML( $this->makeTable( $data ) );
			} else {
				$wgOut->addWikiText( wfMsg( 'profiling-no-data' ) );
			}
		}
	}

	private function makeSearchForm( $process, $wild = false ) {
		$self = SpecialPage::getTitleFor( 'Profiling' );
		$html  = Xml::openElement( 'form', array( 'method' => 'post', 'action' => $self->getLocalUrl() ) );
		$html .= '<table><tr><td>' . wfMsgHtml( 'profiling-process' ) . '</td><td>';
		$html .= Xml::input( 'process', 50, $process ) . '</td></tr><td align="right">' . Xml::check( 'wildcard', $wild ) . '</td>';
		$html .= '<td>' . wfMsgHtml( 'profiling-wildcard' ) . '</td></tr>';
		$html .= '<tr><td>&#160;</td><td>' . Xml::submitButton( wfMsg( 'profiling-ok' ), array( 'name' => 'submit' ) ) . '</td></table></form>';
		return $html;
	}

	private function makeSql( &$dbr, $process, $wild = false ) {
		$profiling = $dbr->tableName( 'profiling' );
		return "SELECT * FROM {$profiling} WHERE " . $this->makeWhereClause( $dbr, $process, $wild );
	}

	private function makeWhereClause( &$dbr, $process, $wild = false ) {
		if( $wild )
			if( strpos( $process, '%' ) === false )
				$process .= '%';
		$process = $dbr->addQuotes( $process );
		return $wild
				? "pf_name LIKE {$process}"
				: "pf_name = {$process}";
	}

	private function makeTable( $data ) {
		$table  = '<table class="profiledata"><tr>';
		$table .= '<th>' . wfMsgHtml( 'profiling-data-process' ) . '</th>';
		$table .= '<th>' . wfMsgHtml( 'profiling-data-count' ) . '</th>';
		$table .= '<th>' . wfMsgHtml( 'profiling-data-time' ) . '</th>';
		$table .= '<th>' . wfMsgHtml( 'profiling-data-average' ) . '</th>';
		$table .= '</tr>';
		foreach( $data as $row ) {
			$table .= '<tr>';
			$table .= '<td>' . htmlspecialchars( $row->pf_name ) . '</td>';
			$table .= '<td class="right">' . number_format( $row->pf_count, 0, '.', ',' ) . '</td>';
			$table .= '<td class="right">' . number_format( $row->pf_time, 3 ) . '</td>';
			$table .= '<td class="right">' . number_format( $row->pf_time / $row->pf_count, 3 ) . '</td>';
			$table .= '</tr>';
		}
		$table .= '</table>';
		return $table;
	}
}
