<?php
/**
 * SolrStore: The SolrStore Extesion is Semantic Mediawiki Searchprovieder based on Apache Solr.
 *
 * @defgroup SolrStore
 * @author Simon Bachenberg
 */
$messages = array();
$specialPageAliases = array();

$messages['en'] = array(
    'solrsearch' => 'SolrSearch',
    'searchFieldSets' => 'SolrSearch',
    'searchFieldSets-select' => 'Please select a SearchSet',
    'searchFieldSets-title' => 'SolrSearch: SearchSet Select',
);
$messages['de'] = array(
    'solrsearch' => 'SolrSuche',
    'searchFieldSets' => 'SolrSuche',
    'searchFieldSets-select' => 'Bitte wählen Sie ein SearchSet aus',
    'searchFieldSets-title' => 'SolrSearch: SearchSet Auswahl',
);

$specialPageAliases['en'] = array('solrsearch' => array('SolrSearch', 'SpecialSolrSearch'));
$specialPageAliases['de'] = array('solrsearch' => array('SolrSearch', 'SpecialSolrSearch'));
?>
