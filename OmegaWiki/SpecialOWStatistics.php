<?php
	if ( !defined( 'MEDIAWIKI' ) ) die();

	$wgExtensionFunctions[] = 'wfSpecialOWStatistics';

	require_once( "Wikidata.php" );
	require_once( 'languages.php' );

	function wfSpecialOWStatistics() {
		class SpecialOWStatistics extends SpecialPage {
			function SpecialOWStatistics() {
				SpecialPage::SpecialPage( 'ow_statistics' );
			}

			function execute( $par ) {
				global $wgOut, $wgRequest;

				$wgOut->setPageTitle( wfMsg( 'ow_statistics' ) );

				$showstat = array_key_exists( 'showstat', $_GET ) ? $_GET['showstat']:'';

				$headerText = '<big><div style="text-align:center; background-color:#DDFFDD;">'
					. $this->linkHeader ( wfMsg('ow_DefinedMeaning'), "dm", $showstat ) . " — "
					. $this->linkHeader ( wfMsg('ow_Definition'), "def", $showstat ) . " — "
					. $this->linkHeader ( wfMsg('ow_Expression'), "exp", $showstat ) . " — "
					. $this->linkHeader ( "Syntrans", "syntrans", $showstat )
					. "</big></div><br /><br />" ;

				$wgOut->addHTML( $headerText ) ;

				if ( $showstat == 'dm' )
					$wgOut->addHTML( $this->getDefinedMeaningPerLanguage () );
				else if ( $showstat == 'def' )
					$wgOut->addHTML( $this->getDefinitionPerLanguage () );
				else if ( $showstat == 'syntrans' )
					$wgOut->addHTML( $this->getSyntransPerLanguage () );
				else // exp by default
					$wgOut->addHTML ( $this->getExpressionPerLanguage () ) ;
			}

			function linkHeader ( $text, $val , $showstat ) {
				global $wgArticlePath;
				if ( $showstat != $val ) {
					$url = str_replace( "$1", 'Special:Ow_statistics' , $wgArticlePath );
					return "<a href=\"$url&showstat=$val\">$text</a>" ;
				} else {
					return "<b>$text</b>" ;
				}
			}

			function getNumberOfDM ( ) {
				$dc = wdGetDataSetContext();
				$dbr = wfGetDB( DB_SLAVE );

				$sql = "SELECT COUNT(DISTINCT defined_meaning_id) as number " ;
				$sql .= "FROM " . "{$dc}_syntrans" . " WHERE remove_transaction_id IS NULL" ;

				$queryResult = $dbr->query( $sql );
				$row = $dbr->fetchObject( $queryResult ) ;
				$nbdm = $row->number ;

				return "$nbdm";
			}

			function getDefinedMeaningPerLanguage () {
				$dc = wdGetDataSetContext();
				$dbr = wfGetDB( DB_SLAVE );
				global $wgUploadPath ;

				$languageNames = getOwLanguageNames();

				// get number of DM with at least one translation for each language
				$sql = "SELECT language_id, count(DISTINCT {$dc}_syntrans.defined_meaning_id) as tot ";
				$sql .= " FROM {$dc}_expression, {$dc}_syntrans" ;
				$sql .= " WHERE {$dc}_expression.expression_id = {$dc}_syntrans.expression_id " ;
				$sql .= " AND {$dc}_syntrans.remove_transaction_id IS NULL " ;
				$sql .= " AND {$dc}_expression.remove_transaction_id IS NULL " ;
				$sql .= " group by language_id " ;

				$queryResult = $dbr->query( $sql );
				$nbDMArray = array () ;

				while ( $row = $dbr->fetchObject( $queryResult ) ) {
					$lang = $languageNames[$row->language_id] ;
					$nbDMArray[$lang] = $row->tot ;
				}
				$nblang = count ( $nbDMArray ) ;
				$nbdm = $this->getNumberOfDM() ;

				$tableLang = "<center><table class=\"sortable\">" ;
				$tableLang .= "<tr><th><b>" . wfMsg('ow_Language') . "</b></th><th><b>" . wfMsg('ow_DefinedMeaning') . "</b></th></tr>\n";

				arsort ( $nbDMArray ) ;
				$max = max ( $nbDMArray ) ;

				foreach ($nbDMArray as $lang => $dm) {
					$wi = ceil( ( ( $dm / $max ) * 500 ) );
					$per = ceil( ( ( $dm / $max ) * 100 ) );
					$tableLang .= "<tr><td>$lang</td><td align=right>$dm</td><td><img src=\"$wgUploadPath/sc1.png\" width=\"$wi\" height=15> $per % </td></tr>\n" ;
				}

				$tableLang .= "</table></center>" ;

				$output = "<center><big><table><tr><td>" . wfMsg('ow_DefinedMeaning') . " : </td><td><b>$nbdm</b></td></tr>" ;
				$output .= "<tr><td>" . wfMsg('ow_Language') . " : </td><td><b>$nblang</b></td></tr></table></big></center>" ;

				$output .= "<p>$tableLang</p>"  ;

				return $output ;
			}


			function getDefinitionPerLanguage () {
				$dc = wdGetDataSetContext();
				$dbr = wfGetDB( DB_SLAVE );
				global $wgUploadPath ;

				$languageNames = getOwLanguageNames();

				// get number of definitions for each language (note : a definition is always unique )
				$sql = "SELECT language_id, count(DISTINCT {$dc}_translated_content.text_id) as tot ";
				$sql .= " FROM {$dc}_translated_content, {$dc}_defined_meaning" ;
				$sql .= " WHERE {$dc}_translated_content.translated_content_id = {$dc}_defined_meaning.meaning_text_tcid " ;
				$sql .= " AND {$dc}_translated_content.remove_transaction_id IS NULL " ;
				$sql .= " AND {$dc}_defined_meaning.remove_transaction_id IS NULL " ;
				$sql .= " group by language_id " ;

				$queryResult = $dbr->query( $sql );
				$nbDefArray = array () ;

				while ( $row = $dbr->fetchObject( $queryResult ) ) {
					$lang = $languageNames[$row->language_id] ;
					$nbDefArray[$lang] = $row->tot ;
				}
				$nbDefTot = array_sum ( $nbDefArray ) ;
				$nblang = count ( $nbDefArray ) ;
				$nbdm = $this->getNumberOfDM() ;

				$tableLang = "<center><table class=\"sortable\">" ;
				$tableLang .= "<tr><th><b>" . wfMsg('ow_Language') . "</b></th><th><b>" . wfMsg('ow_Definition') . "</b></th></tr>\n";

				arsort ( $nbDefArray ) ;
				$max = max ( $nbDefArray ) ;
				foreach ($nbDefArray as $lang => $def) {
					$wi = ceil( ( ( $def / $max ) * 500 ) );
					$per = ceil( ( ( $def / $max ) * 100 ) );
					$tableLang .= "<tr><td>$lang</td><td align=right>$def</td><td><img src=\"$wgUploadPath/sc1.png\" width=\"$wi\" height=15> $per % </td></tr>\n" ;
				}

				$tableLang .= "</table></center>" ;

				$output = "<center><big><table><tr><td>" . wfMsg('ow_Definition') . " : </td><td><b>$nbDefTot</b></td></tr>" ;
				$output .= "<tr><td>" . wfMsg('ow_DefinedMeaning') . " : </td><td><b>$nbdm</b></td></tr>" ;
				$output .= "<tr><td>" . wfMsg('ow_Language') . " : </td><td><b>$nblang</b></td></tr></table></big></center>" ;

				$output .= "<p>$tableLang</p>"  ;

				return $output ;
			}


			function getExpressionPerLanguage () {
				$dc = wdGetDataSetContext();
				$dbr = wfGetDB( DB_SLAVE );
				global $wgUploadPath ;

				$sql = "SELECT language_id, count(DISTINCT {$dc}_expression.expression_id) as tot ";
				$sql .= " FROM {$dc}_expression, {$dc}_syntrans" ;
				$sql .= " WHERE {$dc}_expression.expression_id = {$dc}_syntrans.expression_id " ;
				$sql .= " AND {$dc}_syntrans.remove_transaction_id IS NULL " ;
				$sql .= " AND {$dc}_expression.remove_transaction_id IS NULL " ;
				$sql .= " group by language_id " ;

				$queryResult = $dbr->query( $sql );

				$languageNames = getOwLanguageNames();
				$nbexpArray = array () ;

				while ( $row = $dbr->fetchObject( $queryResult ) ) {
					$lang = $languageNames[$row->language_id] ;
					$nbexpArray[$lang] = $row->tot ;
				}
				$nbexptot = array_sum ( $nbexpArray ) ;
				$nbdm = $this->getNumberOfDM() ;
				$nblang = count ( $nbexpArray ) ;

				$tableLang = "<center><table class=\"sortable\">" ;
				$tableLang .= "<tr><th><b>" . wfMsg('ow_Language') . "</b></th><th><b>" . wfMsg('ow_Expression') . "</b></th></tr>\n";

				arsort ( $nbexpArray ) ;
				$max = max ( $nbexpArray ) ;
				foreach ($nbexpArray as $lang => $exp) {
					$wi = ceil( ( ( $exp / $max ) * 500 ) );
					$per = ceil( ( ( $exp / $max ) * 100 ) );
					$tableLang .= "<tr><td>$lang</td><td align=right>$exp</td><td><img src=\"$wgUploadPath/sc1.png\" width=\"$wi\" height=15> $per % </td></tr>\n" ;
				}

				$tableLang .= "</table></center>" ;

				$output = "<center><big><table><tr><td>" . wfMsg('ow_Expression') . " : </td><td><b>$nbexptot</b></td></tr>" ;
				$output .= "<tr><td>" . wfMsg('ow_DefinedMeaning') . " : </td><td><b>$nbdm</b></td></tr>" ;
				$output .= "<tr><td>" . wfMsg('ow_Language') . " : </td><td><b>$nblang</b></td></tr></table></big></center>" ;

				$output .= "<p>$tableLang</p>"  ;
				return $output ;
			}


			function getSyntransPerLanguage () {
				$dc = wdGetDataSetContext();
				$dbr = wfGetDB( DB_SLAVE );
				global $wgUploadPath ;

				$sql = "SELECT language_id, count(DISTINCT {$dc}_syntrans.syntrans_sid) as tot ";
				$sql .= " FROM {$dc}_expression, {$dc}_syntrans" ;
				$sql .= " WHERE {$dc}_expression.expression_id = {$dc}_syntrans.expression_id " ;
				$sql .= " AND {$dc}_syntrans.remove_transaction_id IS NULL " ;
				$sql .= " AND {$dc}_expression.remove_transaction_id IS NULL " ;
				$sql .= " group by language_id " ;

				$queryResult = $dbr->query( $sql );

				$languageNames = getOwLanguageNames();

				$nblang = 0 ;
				$nbexptot = 0 ;
				$nbSyntransArray = array () ;

				while ( $row = $dbr->fetchObject( $queryResult ) ) {
					$lang = $languageNames[$row->language_id] ;
					$nbSyntransArray[$lang] = $row->tot ;
				}
				$nbSyntransTot = array_sum ( $nbSyntransArray ) ;
				$nbdm = $this->getNumberOfDM() ;
				$nblang = count ( $nbSyntransArray ) ;

				$tableLang = "<center><table class=\"sortable\">" ;
				$tableLang .= "<tr><th><b>" . wfMsg('ow_Language') . "</b></th><th><b>Syntrans</b></th></tr>\n";

				arsort ( $nbSyntransArray ) ;
				$max = max ( $nbSyntransArray ) ;
				foreach ($nbSyntransArray as $lang => $syntrans) {
					$wi = ceil( ( ( $syntrans / $max ) * 500 ) );
					$per = ceil( ( ( $syntrans / $max ) * 100 ) );
					$tableLang .= "<tr><td>$lang</td><td align=right>$syntrans</td><td><img src=\"$wgUploadPath/sc1.png\" width=\"$wi\" height=15> $per % </td></tr>\n" ;
				}

				$tableLang .= "</table></center>" ;

				$output = "<center><big><table><tr><td>Syntrans : </td><td><b>$nbSyntransTot</b></td></tr>" ;
				$output .= "<tr><td>" . wfMsg('ow_DefinedMeaning') . " : </td><td><b>$nbdm</b></td></tr>" ;
				$output .= "<tr><td>" . wfMsg('ow_Language') . " : </td><td><b>$nblang</b></td></tr></table></big></center>" ;

				$output .= "<p>$tableLang</p>"  ;

				return $output ;
			}

		}
		SpecialPage::addPage( new SpecialOWStatistics );

	}
