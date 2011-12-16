<?php

/**
 * SolrStore: The SolrStore Extesion is Semantic Mediawiki Searchprovieder based on Apache Solr.
 * 
 * This class should do all the Work with SOlr.
 * 
 * @defgroup SolrStore
 * @author Simon Bachenberg
 */
class SolrTalker {

    private $header = array("Content-type:text/xml; charset=utf-8");
    private $schema;

    /**
     *  Get the Schema from SOLR as XML
     *  This Includes all Dynamic Fields
     * 
     * @return type $xml schema
     */
    public function getSchema() {
        global $wgSolrUrl;
        $xml = $this->solrSend($wgSolrUrl . '/admin/luke?numTerms=0');

        try {
            $this->schema = $xml;
        } catch (Exception $exc) {
            return false;
        }

        return $this->schema;
    }

    public function encodeSolr($query) {
        //Using the urlencode from php doenst work!?, so we need to do it our self
        $query = str_replace('"', '%22', trim($query));
        $query = str_replace(' ', '+', $query);
        $query = str_replace('ü', '%FC', $query);
        $query = str_replace('Ü', '%DC', $query);
        $query = str_replace('ö', '%F6', $query);
        $query = str_replace('Ö', '%D6', $query);
        $query = str_replace('ä', '%E4', $query);
        $query = str_replace('ä', '%C4', $query);
        return $query;
    }

    /**
     * Perform a SolrSearch
     * 
     * @global type $wgSolrUrl
     * @param type $query   - Search Term
     * @param type $start   - Offset
     * @param type $end     - Limit
     * @return type $xml    - Solr Result as XML 
     * 
     */
    public function solrQuery($query, $start, $end, $highlight=false, $score=false) {
        global $wgSolrUrl;
        $query = trim($query);
        if (empty($query)) {
            $query = '*';
        }
        $url = $wgSolrUrl . '/select?q=' . $query . '&start=' . $start . '&rows=' . $end; //. '&fl=*%2Cscore';    No Score for now, ther seems to be a BUG
        if ($highlight) {
            $url.='&hl=on&hl.fl=*';
        }
        if ($score) {
            $url.='&fl=*%2Cscore';
        }
        return $this->solrSend($url);
    }

    /**
     * Find the real name of the Field in the SOlr schema
     * 
     * @param type $searchField
     * @param type $sort = ASC or DESC
     * @return type Name of the Field you are searching for
     */
    public function findField($searchField, $sort = 'ASC') {
        $xml = $this->getSchema();
        //$searchField = trim($searchField);
        $searchField = str_replace(' ', '_', trim($searchField));                               // Trim and Replace all Spaces with underscore for better matching
        $result = false;
        $stop = false;

        //TODO: Decide on ASC + DESC parameter for Max or Min Sort Field
        foreach ($xml->lst as $item) {
            if ($item['name'] == 'fields') {
                foreach ($item->lst as $field) {
                    if (count($field) > 2) {
                        $dynamicBase = substr($field->str[2], 1);                               // Get The dynamicbase of the Field eg. "*_dtmax"
                        $newField = str_replace($dynamicBase, '', $field['name']);              // Get the Fieldname without the dynamicbase
                        if (strcasecmp(str_replace(' ', '_', $newField), $searchField) == 0) {  // Replace all Spaces with underscore for better matching
                            if (stripos($dynamicBase, 'max') && stripos($sort, 'desc')) {
                                // For Descending Sorting use the MaX value Field
                                continue 2;    //we got the right Field Stop it!
                            } else if (stripos($dynamicBase, 'min') && stripos($sort, 'asc')) {
                                // For Ascending Sorting use the MIN value Field   
                                continue 2;   //we got the right Field Stop it!
                            }
                        } else if (strcasecmp(str_replace(' ', '_', $field['name']), $searchField) == 0) { // Replace all Spaces with underscore for better matching
                            $result = trim($searchField);
                        }
                    } else {
                        if (strcasecmp(trim($field['name']), trim($searchField)) == 0) {
                            $result = trim($field['name']);
                        }
                    }
                }
            }
        }
        return $result;
    }

    /**
     * Check the Query for existing fields
     * 
     * @param type $queryStr - Wiki QueryString
     * @return type $queryStr - Solr QueryString
     */
    public function queryChecker($queryStr) {
        $queryStr = str_replace('=', ':', $queryStr);                   // Now you can use = insted : for querying Fields
        if (strpos($queryStr, ':') !== false) {
            $queryParts = explode(" ", $queryStr);          //Split on Spaces and Search for Fields
            $queryStr = '';
            foreach ($queryParts as $value) {
                if (strpos($value, ':') !== false) {            //Value conatins a  ":" ?
                    $parts = split(':', $value);                                    //Split the Query part in Key (Parts[0]) and Value (Parts[1])
                    $solrField = $this->findField($parts[0]);                        //Search for a Solr Field for the Key
                    if ($solrField) {
                        $queryStr = $queryStr . ' ' . $solrField . ':' . $parts[1];
                    } else {
                        $queryStr = $queryStr . ' ' . $parts[0] . ' ' . $parts[1];
                    }
                } else {
                    $queryStr = $queryStr . ' ' . $value;
                }
            }
        }

        return $queryStr = $this->encodeSolr($queryStr);
    }

    /**
     * Transform a Wiki Query to a Solr Query
     * TODO: Do more Wiki2Solr transformation
     * 
     * @param type $queryStr - Wiki QueryString
     * @return type $queryStr - Solr QueryString
     */
    public function parseSolrQuery($queryStr) {
        //TODO: Parse the QueryString to make it work in Solr
        $queryParts = explode("[[", $queryStr);

        //Clean the queryStr
        $queryStr = '';
        foreach ($queryParts as $part) {
            if (stripos($part, '::')) {
                $parts = split('::', $part);                                    //Split the Query part in Key (Parts[0]) and Value (Parts[1])
                $parts[0] = $this->findField($parts[0]);                        //Search for a Solr Field for the Key
                $queryStr = $queryStr . ' ' . $parts[0] . ':' . $parts[1];        //Build Querystring
            } elseif (stripos($part, ':')) {
                $queryStr = $queryStr . ' category' . substr($part, stripos($part, ':'));
            } else {
                $queryStr = $queryStr . $part;
            }
        }
        $queryStr = str_replace('[', '', $queryStr);
        $queryStr = str_replace(']', '', $queryStr);

        return $queryStr;
    }

    /**
     * Add an XML Document to the Solr Index
     * 
     * @param $xmlcontent - Solr XML Document
     */
    public function solrAdd($xmlcontent) {
        global $wgSolrUrl;

        $url = $wgSolrUrl . '/update?commit=true';
        $xmlcontent = str_replace('&', '+', $xmlcontent);
        $xmlcontent = str_replace('&nbsp;', ' ', $xmlcontent);
        $xmlcontent = str_replace('&nbsp', ' ', $xmlcontent);
        $xmlcontent = str_replace('&amp;', ' ', $xmlcontent);
        $xmlcontent = str_replace('&amp', ' ', $xmlcontent);

        return $this->solrSend($url, $xmlcontent);
    }

    /**
     * Private Function for interactinig with Solr.
     * 
     * @param type $url
     * @param type $xmlcontent
     * @return SimpleXMLElement 
     */
    private function solrSend($url, $xmlcontent = false) {
        $ch = curl_init();

        $url = str_replace(' ', '+', $url);

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ch, CURLINFO_HEADER_OUT, 1);

        if ($xmlcontent) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $this->header);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $xmlcontent);
        }

        $data = curl_exec($ch);

        if (curl_errno($ch)) {

        } else {
            curl_close($ch);
        }

        try {
            $xml = new SimpleXMLElement($data);
        } catch (Exception $exc) {
            return false;
        }

        return $xml;
    }

    //SOLR Functions

    /**
     * Add a Document to the SolrIndex
     * @param SolrDoc $file 
     */
    public function addDoc(SolrDoc $file) {
        $filekopf = "<add><doc>";
        $filefuss = "</doc></add>";
        $xmlcontent = $filekopf . $file->printFields() . $filefuss;
        return $this->solrAdd($xmlcontent);
    }

    /**
     * Remove a Document with the $id from the SolrIndex
     * @param type $id 
     * @return type $xml - Response from Solr
     */
    public function deleteDocId($id) {
        $filekopf = "<delte><id>";
        $filefuss = "</id></delte>";
        $xmlcontent = $filekopf . $id . $filefuss;
        return $this->solrAdd($xmlcontent);
    }

    /**
     * Delete all Documents found by this Query
     * @param type $query 
     * @return type $xml - Response from Solr
     */
    public function deleteDocQuery($query) {
        $filekopf = "<delte><query>";
        $filefuss = "</query></delte>";
        $xmlcontent = $filekopf . $query . $filefuss;
        return $this->solrAdd($xmlcontent);
    }

    /**
     * DELETE ALL DOCS FROM SOLR INDEX!!!
     * @return type $xml - Response from Solr
     */
    public function deleteAllDocs() {
        $xmlcontent = '<delete><query>*:*</query></delete>';
        return $this->solrAdd($xmlcontent);
    }

    /**
     * This Function is used for Storing an SMWSemanticData Item in the Solr Index
     *
     * @param SMWSemanticData $data 
     */
    public function parseSemanticData(SMWSemanticData $data) {
        $solritem = new SolrDoc ();

        $solritem->addField("pagetitle", $data->getSubject()->getTitle()->getText());
        $solritem->addField("namespace", $data->getSubject()->getNamespace());
        $solritem->addField("dbkey", $data->getSubject()->getDBkey());
        $solritem->addField("interwiki", $data->getSubject()->getInterwiki());
        $solritem->addField("subobjectname", $data->getSubject()->getSubobjectName());

        foreach ($data->getProperties() as $property) {
            if (( $property->getKey() == '_SKEY' ) || ( $property->getKey() == '_REDI' )) {
                continue; // skip these here, we store them differently
            }

            $propertyName = $property->getLabel();

            foreach ($data->getPropertyValues($property) as $di) {
                if ($di instanceof SMWDIError) { // error values, ignore
                    continue;
                }
                switch ($di->getDIType()) {
                    case 0:
//      /// Data item ID that can be used to indicate that no data item class is appropriate
//	const TYPE_NOTYPE    = 0;
                        break;

                    case 1:
//	/// Data item ID for SMWDINumber
//	const TYPE_NUMBER    = 1;
                        $solritem->addField($propertyName . '_i', $di->getNumber());
                        $solritem->addSortField($propertyName . '_i', $di->getNumber());
                        break;

                    case 2:
//	/// Data item ID for SMWDIString
//	const TYPE_STRING    = 2;
                        $solritem->addField($propertyName . '_t', $di->getString());
                        $solritem->addSortField($propertyName . '_t', $di->getString());
                        break;

                    case 3:
//	///  Data item ID for SMWDIBlob
//	const TYPE_BLOB      = 3;
                        $solritem->addField($propertyName . '_t', $di->getString());
                        $solritem->addSortField($propertyName . '_t', $di->getString());
                        break;

                    case 4:
//	///  Data item ID for SMWDIBoolean
//	const TYPE_BOOLEAN   = 4;
                        $solritem->addField($propertyName . '_b', $di->getBoolean());
                        $solritem->addSortField($propertyName . '_b', $di->getBoolean());
                        break;

                    case 5:
//	///  Data item ID for SMWDIUri
//	const TYPE_URI       = 5;
                        $solritem->addField($propertyName . '_t', $di->getURI());
                        $solritem->addSortField($propertyName . '_t', $di->getURI());
                        break;

                    case 6:
//	///  Data item ID for SMWDITimePoint
//	const TYPE_TIME      = 6;
                        $date = $di->getYear() . '-' . $di->getMonth() . '-' . $di->getDay() . 'T' . $di->getHour() . ':' . $di->getMinute() . ':' . $di->getSecond() . 'Z';
                        $solritem->addField($propertyName . '_dt', $date);
                        $solritem->addSortField($propertyName . '_dt', $date);
                        break;

                    case 7:
//	///  Data item ID for SMWDIGeoCoord
//	const TYPE_GEO       = 7;
                        //TODO: Implement range Search in SOLR
                        $solritem->addField($propertyName . '_lat', $di->getLatitude());
                        $solritem->addField($propertyName . '_lng', $di->getLongitude());
                        break;

                    case 8:
//	///  Data item ID for SMWDIContainer
//	const TYPE_CONTAINER = 8
                        //TODO: What the Hell is this used for ???
                        $data->getSubject()->getTitle()->getText() . " : ";
                        break;

                    case 9:
//	///  Data item ID for SMWDIWikiPage
//	const TYPE_WIKIPAGE  = 9;
                        $ns = $di->getNamespace();
                        if ($ns == 0) {
                            $solritem->addField($propertyName . '_s', $di->getTitle());
                        } elseif ($ns == 14) {
                            $title = $di->getTitle();
                            $solritem->addField('category', substr($title, stripos($title, ':') + 1));
                        } 
                        break;

                    case 10:
//	///  Data item ID for SMWDIConcept
//	const TYPE_CONCEPT   = 10;
                        $data->getSubject()->getTitle()->getText() . " : ";
                        break;

                    case 11:
//	///  Data item ID for SMWDIProperty
//	const TYPE_PROPERTY  = 11;
                        $data->getSubject()->getTitle()->getText() . " : ";
                        break;

                    case 12:
//	///  Data item ID for SMWDIError
//	const TYPE_ERROR     = 12;
                        $data->getSubject()->getTitle()->getText() . " : ";
                        break;
                    default:
                        break;
                }
            }
        }
        $this->addDoc($solritem);
    }

}

?>
