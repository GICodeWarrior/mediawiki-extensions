<?php

if ( !defined( 'MEDIAWIKI' ) ) die();

$wgExtensionFunctions[] = 'wfSpecialDatasearch';

require_once( "Wikidata.php" );
require_once( "WikiDataGlobals.php" );

function wfSpecialDatasearch() {
	class SpecialDatasearch extends SpecialPage {
		protected $externalIdentifierAttribute;
		protected $collectionAttribute;
		protected $collectionMemberAttribute;
		protected $externalIdentifierMatchStructure;

		protected $spellingAttribute;
		protected $languageAttribute;

		protected $expressionStructure;
		protected $expressionAttribute;

		protected $definedMeaningAttribute;
		protected $definitionAttribute;

		protected $meaningStructure;
		protected $meaningAttribute;

		function SpecialDatasearch() {
			parent::__construct( 'DataSearch' );
		}

		function execute( $parameter ) {
			global $wgOut;

			initializeOmegaWikiAttributes( new ViewInformation() );

			global
				$definedMeaningReferenceType,
				$wgDefinedMeaning;

			require_once( "WikiDataGlobals.php" );
			require_once( "forms.php" );
			require_once( "type.php" );
			require_once( "ViewInformation.php" );
			require_once( "WikiDataAPI.php" );
			require_once( "OmegaWikiAttributes.php" );
			require_once( "OmegaWikiRecordSets.php" );
			require_once( "OmegaWikiEditors.php" );

			$wgOut->setPageTitle( wfMsg( 'search' ) );

			$this->spellingAttribute = new Attribute( "found-word", wfMsg( 'datasearch_found_word' ), "short-text" );
			$this->languageAttribute = new Attribute( "language", wfMsg( 'ow_Language' ), "language" );

			$this->expressionStructure = new Structure( $this->spellingAttribute, $this->languageAttribute );
			$this->expressionAttribute = new Attribute( "expression", wfMsg( 'ow_Expression' ), $this->expressionStructure );

			$this->definedMeaningAttribute = new Attribute( $wgDefinedMeaning, wfMsg( 'ow_DefinedMeaning' ), $definedMeaningReferenceType );
			$this->definitionAttribute = new Attribute( "definition", wfMsg( 'ow_Definition' ), "definition" );

			$this->meaningStructure = new Structure( $this->definedMeaningAttribute, $this->definitionAttribute );
			$this->meaningAttribute = new Attribute( "meaning", wfMsg( 'datasearch_meaning' ), $this->meaningStructure );

			$this->externalIdentifierAttribute = new Attribute( "external-identifier", wfMsg( 'datasearch_ext_identifier' ), "short-text" );
			$this->collectionAttribute = new Attribute( "collection", wfMsg( 'ow_Collection' ), $definedMeaningReferenceType );
			$this->collectionMemberAttribute = new Attribute( "collection-member", wfMsg( 'ow_CollectionMember' ), $definedMeaningReferenceType );

			$this->externalIdentifierMatchStructure = new Structure(
				$this->externalIdentifierAttribute,
				$this->collectionAttribute,
				$this->collectionMemberAttribute
			);

			if ( array_key_exists( 'search-text', $_GET ) ) {
				$searchText = ltrim( $_GET['search-text'] );
			} else {
				$searchText = null;
			}

			if ( isset( $_GET['go'] ) )
				$this->go( $searchText );
			else
				$this->search( $searchText );
		}

		function go( $searchText ) {
			global
				$wgScript, $wgOut;

			$expressionMeaningIds = getExpressionMeaningIds( $searchText );

			if ( count( $expressionMeaningIds ) > 0 ) {
				if ( count( $expressionMeaningIds ) == 1 )
					$wgOut->redirect( definedMeaningIdAsURL( $expressionMeaningIds[0] ) );
				else
					$wgOut->redirect( spellingAsURL( $searchText ) );
			}
			else {
				$collectionMemberId = getAnyDefinedMeaningWithSourceIdentifier( $searchText );

				if ( $collectionMemberId != 0 )
					$wgOut->redirect( definedMeaningIdAsURL( $collectionMemberId ) );
				else
					$wgOut->redirect( spellingAsURL( $searchText ) );
			}
		}

		function search( $searchText ) {
			global
				$wgOut, $wgRequest, $wgFilterLanguageId,
				$wgSearchWithinWordsDefaultValue, $wgSearchWithinExternalIdentifiersDefaultValue,
				$wgShowSearchWithinExternalIdentifiersOption, $wgShowSearchWithinWordsOption;

			$collectionId = $wgRequest->getInt( "collection" );
			$languageId = $wgRequest->getInt( "language" );
			$withinWords = $wgRequest->getBool( "within-words" );
			$withinExternalIdentifiers = $wgRequest->getBool( "within-external-identifiers" );

			if ( !$withinWords && !$withinExternalIdentifiers ) {
				$withinWords = $wgSearchWithinWordsDefaultValue;
				$withinExternalIdentifiers = $wgSearchWithinExternalIdentifiersDefaultValue;
			}

			$languageName = languageIdAsText( $languageId );
			$options = array();
			$options[wfMsg( 'datasearch_search_text' )] = getTextBox( 'search-text', $searchText );

			if ( $wgFilterLanguageId == 0 )
				$options[wfMsg( 'datasearch_language' )] = getSuggest( 'language', "language", array(), $languageId, $languageName );
			else
				$languageId = $wgFilterLanguageId;

			$options[wfMsg( 'ow_Collection_colon' )] = getSuggest( 'collection', 'collection', array(), $collectionId, collectionIdAsText( $collectionId ) );

			if ( $wgShowSearchWithinWordsOption )
				$options[wfMsg( 'datasearch_within_words' )] = getCheckBox( 'within-words', $withinWords );
			else
				$withinWords = $wgSearchWithinWordsDefaultValue;

			if ( $wgShowSearchWithinExternalIdentifiersOption )
				$options[wfMsg( 'datasearch_within_ext_ids' )] = getCheckBox( 'within-external-identifiers', $withinExternalIdentifiers );
			else
				$withinExternalIdentifiers = $wgSearchWithinExternalIdentifiersDefaultValue;

			$wgOut->addHTML( getOptionPanel( $options ) );

			if ( $withinWords ) {
				if ( $languageId != 0 && $languageName != "" )
					$wgOut->addHTML( '<h1>' . wfMsg( 'datasearch_match_words_lang', $languageName, $searchText ) . '</h1>' );
				else
					$wgOut->addHTML( '<h1>' . wfMsg( 'datasearch_match_words', $searchText ) . '</h1>' );

				$resultCount = $this->searchWordsCount( $searchText, $collectionId, $languageId ) ;
				$wgOut->addHTML( '<p>' . wfMsgExt( 'datasearch_showing_only', 'parsemag', 100 , $resultCount ) . '</p>' );

				$wgOut->addHTML( $this->searchWords( $searchText, $collectionId, $languageId ) );
			}

			if ( $withinExternalIdentifiers ) {
				$wgOut->addHTML( '<h1>' . wfMsg( 'datasearch_match_ext_ids', $searchText ) . '</i></h1>' );
				$wgOut->addHTML( '<p>' . wfMsgExt( 'datasearch_showing_only', 'parsemag', 100 ) . '</p>' );

				$wgOut->addHTML( $this->searchExternalIdentifiers( $searchText, $collectionId ) );
			}
		}

		function getSpellingRestriction( $spelling, $tableColumn ) {
			$dbr = wfGetDB( DB_SLAVE );

			if ( trim( $spelling ) != '' )
				return " AND " . $tableColumn . " LIKE " . $dbr->addQuotes( "%$spelling%" );
			else
				return "";
		}

		function getSpellingOrderBy( $spelling ) {
			if ( trim( $spelling ) != '' )
				return "position ASC, ";
			else
				return "";
		}

		function getPositionSelectColumn( $spelling, $tableColumn ) {
			$dbr = wfGetDB( DB_SLAVE );

			if ( trim( $spelling ) != '' )
				return "INSTR(LCASE(" . $tableColumn . "), LCASE(" . $dbr->addQuotes( "$spelling" ) . ")) as position, ";
			else
				return "";
		}

		function searchWords( $text, $collectionId, $languageId ) {
			$dc = wdGetDataSetContext();
			$dbr = wfGetDB( DB_SLAVE );

			$sql =
				"SELECT " . $this->getPositionSelectColumn( $text, "{$dc}_expression.spelling" ) . " {$dc}_syntrans.defined_meaning_id AS defined_meaning_id, {$dc}_expression.spelling AS spelling, {$dc}_expression.language_id AS language_id " .
				"FROM {$dc}_expression, {$dc}_syntrans ";

			if ( $collectionId > 0 )
				$sql .= ", {$dc}_collection_contents ";

			$sql .=
		    	"WHERE {$dc}_expression.expression_id={$dc}_syntrans.expression_id AND {$dc}_syntrans.identical_meaning=1 " .
				" AND " . getLatestTransactionRestriction( "{$dc}_syntrans" ) .
				" AND " . getLatestTransactionRestriction( "{$dc}_expression" ) .
				$this->getSpellingRestriction( $text, 'spelling' );

			if ( $collectionId > 0 )
				$sql .=
					" AND {$dc}_collection_contents.member_mid={$dc}_syntrans.defined_meaning_id " .
					" AND {$dc}_collection_contents.collection_id=" . $collectionId .
					" AND " . getLatestTransactionRestriction( "{$dc}_collection_contents" );

			if ( $languageId > 0 )
				$sql .=
					" AND {$dc}_expression.language_id=$languageId";

			$sql .=
				" ORDER BY " . $this->getSpellingOrderBy( $text ) . "{$dc}_expression.spelling ASC limit 100";

			$queryResult = $dbr->query( $sql );
			$recordSet = $this->getWordsSearchResultAsRecordSet( $queryResult );
			$editor = $this->getWordsSearchResultEditor();

			return $editor->view( new IdStack( "words" ), $recordSet );
		}

/**
* Gives the exact number of results (not limited to 100)
*/
		function searchWordsCount( $text, $collectionId, $languageId ) {
			$dc = wdGetDataSetContext();
			$dbr = wfGetDB( DB_SLAVE );

			$sql =
				"SELECT COUNT(*) " .
				"FROM {$dc}_expression, {$dc}_syntrans ";

			if ( $collectionId > 0 )
				$sql .= ", {$dc}_collection_contents ";

			$sql .=
		    	"WHERE {$dc}_expression.expression_id={$dc}_syntrans.expression_id AND {$dc}_syntrans.identical_meaning=1 " .
				" AND " . getLatestTransactionRestriction( "{$dc}_syntrans" ) .
				" AND " . getLatestTransactionRestriction( "{$dc}_expression" ) .
				$this->getSpellingRestriction( $text, 'spelling' );

			if ( $collectionId > 0 )
				$sql .=
					" AND {$dc}_collection_contents.member_mid={$dc}_syntrans.defined_meaning_id " .
					" AND {$dc}_collection_contents.collection_id=" . $collectionId .
					" AND " . getLatestTransactionRestriction( "{$dc}_collection_contents" );

			if ( $languageId > 0 )
				$sql .=
					" AND {$dc}_expression.language_id=$languageId";

			$queryResult_r = mysql_query( $sql );
			$queryResult_a = mysql_fetch_row( $queryResult_r );
			$queryResultCount = $queryResult_a[0];

			return $queryResultCount ;
		}

		function getWordsSearchResultAsRecordSet( $queryResult ) {

			$o = OmegaWikiAttributes::getInstance();

			$dbr = wfGetDB( DB_SLAVE );
			$recordSet = new ArrayRecordSet( new Structure( $o->definedMeaningId, $this->expressionAttribute, $this->meaningAttribute ), new Structure( $o->definedMeaningId ) );

			while ( $row = $dbr->fetchObject( $queryResult ) ) {
				$expressionRecord = new ArrayRecord( $this->expressionStructure );
				$expressionRecord->setAttributeValue( $this->spellingAttribute, $row->spelling );
				$expressionRecord->setAttributeValue( $this->languageAttribute, $row->language_id );

				$meaningRecord = new ArrayRecord( $this->meaningStructure );
				$meaningRecord->setAttributeValue( $this->definedMeaningAttribute, getDefinedMeaningReferenceRecord( $row->defined_meaning_id ) );
				$meaningRecord->setAttributeValue( $this->definitionAttribute, getDefinedMeaningDefinition( $row->defined_meaning_id ) );

				$recordSet->addRecord( array( $row->defined_meaning_id, $expressionRecord, $meaningRecord ) );
			}

			return $recordSet;
		}

		function getWordsSearchResultEditor() {

			$expressionEditor = new RecordTableCellEditor( $this->expressionAttribute );
			$expressionEditor->addEditor( new SpellingEditor( $this->spellingAttribute, new SimplePermissionController( false ), false ) );
			$expressionEditor->addEditor( new LanguageEditor( $this->languageAttribute, new SimplePermissionController( false ), false ) );

			$meaningEditor = new RecordTableCellEditor( $this->meaningAttribute );
			$meaningEditor->addEditor( new DefinedMeaningReferenceEditor( $this->definedMeaningAttribute, new SimplePermissionController( false ), false ) );
			$meaningEditor->addEditor( new TextEditor( $this->definitionAttribute, new SimplePermissionController( false ), false, true, 75 ) );

			$editor = createTableViewer( null );
			$editor->addEditor( $expressionEditor );
			$editor->addEditor( $meaningEditor );

			return $editor;
		}

		function searchExternalIdentifiers( $text, $collectionId ) {
			$dc = wdGetDataSetContext();
			$dbr = wfGetDB( DB_SLAVE );

			$sql =
				"SELECT " . $this->getPositionSelectColumn( $text, "{$dc}_collection_contents.internal_member_id" ) . " {$dc}_collection_contents.member_mid AS member_mid, {$dc}_collection_contents.internal_member_id AS external_identifier, {$dc}_collection.collection_mid AS collection_mid " .
				"FROM {$dc}_collection_contents, {$dc}_collection ";

			$sql .=
		    	"WHERE {$dc}_collection.collection_id={$dc}_collection_contents.collection_id " .
				" AND " . getLatestTransactionRestriction( "{$dc}_collection" ) .
				" AND " . getLatestTransactionRestriction( "{$dc}_collection_contents" ) .
				$this->getSpellingRestriction( $text, "{$dc}_collection_contents.internal_member_id" );

			if ( $collectionId > 0 )
				$sql .=
					" AND {$dc}_collection.collection_id=$collectionId ";

			$sql .=
				" ORDER BY " . $this->getSpellingOrderBy( $text ) . "{$dc}_collection_contents.internal_member_id ASC limit 100";

			$queryResult = $dbr->query( $sql );
			$recordSet = $this->getExternalIdentifiersSearchResultAsRecordSet( $queryResult );
			$editor = $this->getExternalIdentifiersSearchResultEditor();

			return $editor->view( new IdStack( "external-identifiers" ), $recordSet );
		}

		function getExternalIdentifiersSearchResultAsRecordSet( $queryResult ) {
			$dbr = wfGetDB( DB_SLAVE );

			$externalIdentifierMatchStructure = new Structure( $this->externalIdentifierAttribute, $this->collectionAttribute, $this->collectionMemberAttribute );
			$recordSet = new ArrayRecordSet( $externalIdentifierMatchStructure, new Structure( $this->externalIdentifierAttribute ) );

			while ( $row = $dbr->fetchObject( $queryResult ) ) {
				$record = new ArrayRecord( $this->externalIdentifierMatchStructure );
				$record->setAttributeValue( $this->externalIdentifierAttribute, $row->external_identifier );
				$record->setAttributeValue( $this->collectionAttribute, $row->collection_mid );
				$record->setAttributeValue( $this->collectionMemberAttribute, $row->member_mid );

				$recordSet->add( $record );
			}

			expandDefinedMeaningReferencesInRecordSet( $recordSet, array( $this->collectionAttribute, $this->collectionMemberAttribute ) );

			return $recordSet;
		}

		function getExternalIdentifiersSearchResultEditor() {
			$editor = createTableViewer( null );
			$editor->addEditor( createShortTextViewer( $this->externalIdentifierAttribute ) );
			$editor->addEditor( createDefinedMeaningReferenceViewer( $this->collectionMemberAttribute ) );
			$editor->addEditor( createDefinedMeaningReferenceViewer( $this->collectionAttribute ) );

			return $editor;
		}
	}

	SpecialPage::addPage( new SpecialDatasearch() );
}
