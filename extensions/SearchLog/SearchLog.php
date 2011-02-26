<?php
# Extension:SearchLog{{php}}{{Category:Extensions|SearchLog}}
# - Licenced under LGPL (http://www.gnu.org/copyleft/lesser.html)
# - Author: [http://www.organicdesign.co.nz/nad User:Nad]
# - Started: 2007-05-16
 
if (!defined('MEDIAWIKI')) die('Not an entry point.');
 
define('SEARCHLOG_VERSION','1.0.8, 2008-2-08');
 
$wgSearchLogPath          = dirname(__FILE__);
$wgSearchLogFile = "$wgSearchLogPath/logs/".preg_replace('/^www./',,$_SERVER['SERVER_NAME']);
$wgSearchLogEntireLog     = 'Entire log'; # Should be a message
$wgSearchLogDateFormat    = '%b %Y';
$wgSearchLogReportHeading = "Search keywords used over '''\$1''' period"; # Should be a message
$wgSearchLogGroup         = ''; # restrict viewing to a particular group by setting this
$wgExtensionFunctions[]   = 'wfSetupSearchLog';
 
$wgExtensionCredits['specialpage'][] = array(
	'name'        => 'Special:SearchLog',
	'author'      => '[http://www.organicdesign.co.nz/nad User:Nad]',
	'description' => 'Logs usage of the search box and allows reporting of keyword totals during given time periods',
	'url'         => 'http://www.mediawiki.org/wiki/Extension:SearchLog',
	'version'     => SEARCHLOG_VERSION
	);
 
require_once "$IP/includes/SpecialPage.php";
 
class SpecialSearchLog extends SpecialPage {
 
	# Constructor
	function SpecialSearchLog() {
		global $wgSearchLogGroup;
		SpecialPage::SpecialPage('SearchLog',$wgSearchLogGroup);
		}
 
	# Override SpecialPage::execute()
	function execute() {
		global $wgOut,$wgSearchLogFile,$wgSearchLogEntireLog,$wgSearchLogReportHeading,$wgSearchLogDateFormat,$wgRequest;
		$this->setHeaders();
		$title  = Title::makeTitle(NS_SPECIAL,'SearchLog');
		$period = isset($_REQUEST['period']) ? $_REQUEST['period'] : false;
		$error  = '';
 
		# Get the dates of the first and last entries for the dropdown list range
		if ($fh = fopen($wgSearchLogFile,'r')) {
			if (preg_match('/^([0-9]{4})([0-9]{2})[0-9]{2},/',fread($fh,16),$match)) list(,$y1,$m1) = $match;
			$len = fstat($fh);
			$len = $len['size'] % 1024;
			fseek($fh,-$len,SEEK_END);
			$end = explode("\n",fread($fh,$len));
			$end = $end[count($end)-2];
			if (preg_match('/^([0-9]{4})([0-9]{2})[0-9]{2},/',$end,$match)) list(,$y2,$m2) = $match;
			fclose($fh);
			}
 
                # Construct a list of months if first and last successfully obtained
                $months = '';
                if ($y1 && $y2) while (($y1*100+$m1) <= ($y2*100+$m2)) {
                        $p = strftime($wgSearchLogDateFormat,mktime(0,0,0,$m1,1,$y1));
                        $selected = $p == $period ? ' selected' : '';
                        $months .= "<option$selected>$p</option>\n";
                        if ($m1 == 12) { $m1 = 1; $y1++; } else $m1++;
                        }
 
		# Render the months as a dropdown-list
		$wgOut->addHTML(
				"<fieldset><legend>Select time period: </legend>"
				. wfElement('form',array('action' => $title->getLocalURL('action=submit'),'method' => 'POST'),null)
				. "<select name=\"period\"><option>$wgSearchLogEntireLog</option>$months</select>"
				. wfElement('input',array('type' => 'submit'))
				. "<br /><br />"
				. wfCheckLabel("Display raw Unicode","wpEscapeChars", "wpEscapeChars", $checked = true)
				. '</form></fieldset>'
			);
 
		# Generate a report if a period was specified
		if ($period === false) $period = $wgSearchLogEntireLog;
		if ($period) {
			$heading = str_replace('$1',$period,$wgSearchLogReportHeading);
			$wgOut->addWikiText("== $heading ==",true);
			if ($fh = fopen($wgSearchLogFile,'r')) {
 
				# Scan the file and sum the search phrases over the period
				$total = array();
				while (!feof($fh)) {
					if (preg_match('/^([0-9]{4})([0-9]{2})([0-9]{2}),(.+?),(.+?),(.+?),(.+)$/',fgets($fh),$match)) {
						list(,$y,$m,$d,$time,$user,$type,$phrase) = $match;
						$p = strftime($wgSearchLogDateFormat,mktime(0,0,0,$m,1,$y));
						$i = strtolower(trim($phrase));
						if ($period == $wgSearchLogEntireLog || $period == $p) $total[$i] = isset($total[$i]) ? ++$total[$i] : 1;
						}
					}
				fclose($fh);
 
                                # Render the totals in a table
                                $table  = "\n<table class=\"sortable\" id=\"searchlog\">\n";
                                $table .= "<tr><th>Search phrase</th><th>Number of occurences during period</th></tr>";
                                foreach ($total as $k => $v) {
				  if($wgRequest->getBool('wpEscapeChars')) {
				    $k = preg_replace("/&/", "&#38;", $k);
				  }
				  $table .= "<tr><td>[[$k]]</td><td>$v</td></tr>\n";
				}
				  $table .= "</table>\n";
 
				} else $error = "Couldn't open log file <tt>$wgSearchLogFile</tt>";
			if ($error) $wgOut->addWikiText($error,true);
			else $wgOut->addWikiText($table,true);
			}
		}
 
	}
 
# Called from $wgExtensionFunctions array when initialising extensions
function wfSetupSearchLog() {
	global $wgLanguageCode,$wgMessageCache,$wgSearchLogFile,$wgUser;
 
	# If a search has been posted, log the info
	if (isset($_REQUEST['search'])) {
		$search = $_REQUEST['search'];
		if (isset($_REQUEST['fulltext'])) $type = 'fulltext';
		elseif (isset($_REQUEST['go'])) $type = 'go';
		else $type = 'other';
 
		# Append the data to the file
		if (empty($search)) $search = $_REQUEST[$type];
		if ($fh = fopen($wgSearchLogFile,'a')) {
			$text = date('Ymd,H:i:s,').$wgUser->getName().",$type,$search";
			fwrite($fh,"$text\n");
			fclose($fh);
			}
		}
 
	# Add the messages used by the specialpage
	$wgMessageCache->addMessages(array('searchlog' => 'Search Log'));
 
	# Add the specialpage to the environment
	SpecialPage::addPage(new SpecialSearchLog());
	}
