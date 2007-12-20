<?php
/** \file
* \brief Contains code for the ContributionScores Class (extends SpecialPage).
*/

///Special page class for the Contribution Scores extension
/**
 * Special page that generates a list of wiki contributors based
 * on edit diversity (unique pages edited) and edit volume (total
 * number of edits.
 *
 * @addtogroup Extensions
 * @author Tim Laqua <t.laqua@gmail.com>
 */
class ContributionScores extends IncludableSpecialPage
{
	public function __construct() {
		parent::__construct( 'ContributionScores' );
	}

	function getDescription() {
		return wfMsg( 'contributionscores' );
	}

	///Generates a "Contribution Scores" table for a given LIMIT and date range
	/**
	 * Function generates Contribution Scores tables in HTML format (not wikiText)
	 *
	 * @param $days int Days in the past to run report for
	 * @param $limit int Maximum number of users to return (default 50)
	 *
	 * @return HTML Table representing the requested Contribution Scores.
	 */
	function genContributionScoreTable( $days, $limit, $title = null, $options = 'none' ) {
		global $contribScoreIgnoreBots, $wgUser;

		$opts = explode(',', strtolower($options));
		
		$dbr = wfGetDB( DB_SLAVE );

		$userTable = $dbr->tableName('user');
		$userGroupTable = $dbr->tableName('user_groups');
		$revTable = $dbr->tableName('revision');
		
		$sqlWhere = "";
		
		if ( $days > 0 ) {
			$date = time() - (60*60*24*$days);
			$dateString = $dbr->timestamp($date);
			$sqlWhere .= " WHERE rev_timestamp > '$dateString' ";
		}

		if ( $contribScoreIgnoreBots ) {
			if (preg_match("/where/i", $sqlWhere)) {
				$sqlWhere .= "AND ";
			} else {
				$sqlWhere .= "WHERE ";
			}
			$sqlWhere .= "rev_user NOT IN (SELECT ug_user FROM {$userGroupTable} WHERE ug_group='bot') ";
		}

		$sqlMostPages = "SELECT rev_user, 
						 COUNT(DISTINCT rev_page) AS page_count, 
						 COUNT(rev_id) AS rev_count 
						 FROM {$revTable} 
						 {$sqlWhere}
						 GROUP BY rev_user 
						 ORDER BY page_count DESC
						 LIMIT {$limit}";

		$sqlMostRevs  = "SELECT rev_user, 
						 COUNT(DISTINCT rev_page) AS page_count, 
						 COUNT(rev_id) AS rev_count 
						 FROM {$revTable} 
						 {$sqlWhere}
						 GROUP BY rev_user 
						 ORDER BY rev_count DESC 
						 LIMIT {$limit}";
		
		$sql =  "SELECT user_id, " .
			"user_name, " .
			"page_count, " .
			"rev_count, " .
			"page_count+SQRT(rev_count-page_count)*2 AS wiki_rank " .
			"FROM $userTable u JOIN (($sqlMostPages) UNION ($sqlMostRevs)) s ON (user_id=rev_user) " .
			"ORDER BY wiki_rank DESC " .
			"LIMIT $limit";
			
		$res = $dbr->query($sql);
		
		$sortable = in_array('nosort', $opts) ? '' : ' sortable';
		
		$output = "<table class=\"wikitable plainlinks{$sortable}\" >\n".
			"<tr class='contributionscores-tableheadings'>\n".
			"<td class=\"contributionscores-headercell\">" . wfMsgHtml( 'contributionscores-score' ) . "</td>\n" .
			"<td class=\"contributionscores-headercell\">" . wfMsgHtml( 'contributionscores-pages' ) . "</td>\n" .
			"<td class=\"contributionscores-headercell\">" . wfMsgHtml( 'contributionscores-changes' ) . "</td>\n" .
			"<td class=\"contributionscores-headercell\">" . wfMsgHtml( 'contributionscores-username' ) . "</td>\n";

		$skin =& $wgUser->getSkin();
		$altrow = '';
		while ( $row = $dbr->fetchObject( $res ) ) {
			$output .= "</tr><tr class='{$altrow}'>\n<td class='contributionscores-contentcell'>" .
				round($row->wiki_rank,0) . "\n</td><td class='contributionscores-contentcell'>" .
				$row->page_count . "\n</td><td class='contributionscores-contentcell'>" .
				$row->rev_count . "\n</td><td class='contributionscores-contentcell'>" .
				$skin->userLink( $row->user_id, $row->user_name );
			
			# Option to not display user tools
			if ( !in_array( 'notools', $opts ) )
				$output .= $skin->userToolLinks( $row->user_id, $row->user_name );
			
			$output .= "</td>\n";
				
			if ($altrow == '')
				$altrow = 'contributionscores-altrow ';
			else
				$altrow = '';
		}
		$output .= "</tr></table>";
		$dbr->freeResult( $res );
		
		if ( !empty( $title ) )
			$output = "<table cellspacing='0' cellpadding='0' class='contributionscores-wrapper'>\n".
			"<tr>\n".
			"<td style='padding: 0px;'>{$title}</td>\n".
			"</tr>\n".
			"<tr>\n".
			"<td style='padding: 0px;'>{$output}</td>\n".
			"</tr>\n".
			"</table>";
		
		return $output;
	}

	function execute( $par ) {
		global $wgRequest, $wgVersion, $wgOut, $wgHooks;
		
		$wgHooks['BeforePageDisplay'][] = 'efContributionScores_addHeadScripts';
		
		if( version_compare( $wgVersion, '1.11', '>=' ) )
			wfLoadExtensionMessages( 'ContributionScores' );
		
		$this->setHeaders();

		if( $this->including() ) {
			$this->showInclude( $par );
		} else {
			$this->showPage();
		}
		return true;
	}

	function showInclude( $par ) {
		global $wgOut;

		$days = null;
		$limit = null;
		$options = 'none';
		
		if ( !empty( $par ) ) {
			$params = explode('/', $par);
			
			$limit = intval( $params[0] );
			
			if ( isset( $params[1] ) )
				$days = intval( $params[1] );
			
			if ( isset( $params[2] ) )
				$options = $params[2];
		}
			
		if ( empty( $limit ) || $limit < 1 || $limit > CONTRIBUTIONSCORES_MAXINCLUDELIMIT )
			$limit = 10;
		if ( is_null( $days ) || $days < 0 )
			$days = 7;
		
		if ( $days > 0 ) {
			$reportTitle = wfMsg( 'contributionscores-days', $days );
		} else {
			$reportTitle = wfMsg( 'contributionscores-allrevisions' );
		}
		$reportTitle .= " " . wfMsg( 'contributionscores-top', $limit );
		$title = Xml::element( 'h4', array( 'class' => 'contributionscores-title' ), $reportTitle ) . "\n";
		$wgOut->addHtml( $this->genContributionScoreTable( $days, $limit, $title, $options ) );
	}
	
	function showPage() {
		global $wgOut, $contribScoreReports;
		
		if (!is_array($contribScoreReports)) {
			$contribScoreReports = array(
				array(7,50),
				array(30,50),
				array(0,50));
		}

		$wgOut->addWikiText( wfMsg( 'contributionscores-info' ) );

		foreach ( $contribScoreReports as $scoreReport) {
			if ( $scoreReport[0] > 0 ) {
				$reportTitle = wfMsg( 'contributionscores-days', $scoreReport[0] );
			} else {
				$reportTitle = wfMsg( 'contributionscores-allrevisions' );
			}
			$reportTitle .= " " . wfMsg('contributionscores-top', $scoreReport[1] );
			$title = Xml::element( 'h2', array( 'class' => 'contributionscores-title' ), $reportTitle ) . "\n";
			$wgOut->addHtml( $title );
			$wgOut->addHtml( $this->genContributionScoreTable( $scoreReport[0], $scoreReport[1] ) );
		}
	}
}
