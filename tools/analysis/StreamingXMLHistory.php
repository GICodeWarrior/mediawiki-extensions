#!/usr/bin/php -q
<?php
//keep PHP 5.3 happy
date_default_timezone_set("UTC");

if(count($argv) < 3){
	print("\n\tUsage: $argv[0] <inputfile> <outputfile> [pagelog]\n");
	exit(-1);		
}

$parser = new StreamingXMLHistoryParser($argv[1], $argv[2], isset($argv[3]) ? $argv[3] : null);
$parser->run();


 class Edit{
 	public $isAccepted;
 	
 	public function __construct($isAccepted){
 		$this->isAccepted = $isAccepted;
 	}
 	
 	public function accept(){
 		$this->isAccepted = true;
 	}
 	
 	public function reject(){
 		$this->isAccepted = false;
 	}
 	
 }

 class PageAction{
 	public $isAccepted;
 	public function __construct($accepted = true){
 		$this->isAccepted = $accepted;
 	}
 }
 
 
 class Revert{
	public $revertToIndex;
	public $selfIndex;
	public $isAccepted; //true = accepted, false = rejected
	public $revTypes;
	
	public function setStatus( $status ){
		$this->isAccepted = $status;
		$this->updateHistory();
	}
	
	public function updateHistory(){
		for($i = ($this->selfIndex -1); $i > $this->revertToIndex; $i--){
			if(get_class( $this->revTypes[$i] ) == "Revert" ){
				$this->revTypes[$i]->setStatus( !$this->isAccepted );	
			}
			else{
				//we're accepting a revert, which means rejecting everything in between
				$this->revTypes[$i]->isAccepted = !$this->isAccepted;
			}	
		}
	}
	
	public function __construct($selfIndex, &$revTypes, $isAccepted, $revertToIndex){
		$this->selfIndex = $selfIndex;
		$this->revTypes = &$revTypes;
		$this->isAccepted = $isAccepted;
		$this->revertToIndex = $revertToIndex;
	}
}


class StreamingXMLHistoryParser{

	public $inputFileName;
	public $outputFileName;
	public $outputFile;
	public $pagelog;
	public $pagelogFile;
	public $nextLog;
	public $articleName;
	
	//page log reader
	public $logreader;
	
	//md5 hashes of the revision texts
	public $md5History;
	
	//revision types
	public $revTypes;
	
	//size of previous revision
	public $oldSize;
	
	public function __construct( $inputFN, $outputFN, $pagelog){
		$this->inputFileName = $inputFN;
		$this->outputFileName = $outputFN;
		$this->outputFile = fopen($this->outputFileName, "w+");
		$this->md5History = array();
		$this->revTypes = array();
		$this->pagelog = $pagelog;
		if($pagelog){
			$this->logreader = new XMLReader();
			$this->logreader->open($this->pagelog);
		}
		$this->oldSize = 0;
	}

	public function writeRevisionStatus(){
		$csvOutput = fopen($this->outputFileName.".REVSTATUS", "w+");
		fputcsv($csvOutput, array("status"));
		
		$counter = 0;
		foreach($this->revTypes as $i){
			$csvLine = "";
			
			switch(get_class($i)){
				case "Revert":
					if( ($i->selfIndex - $i->revertToIndex) == 1){
						$csvLine .= "status-change-";
					}
					else{
						$csvLine .= "Revert-";	
					}
					break;
				case "PageAction":
					$csvLine .= "PageAction-";
					break;	
			}
			$csvLine .= ($i->isAccepted)?"accepted":"rejected";
			$csvData = array( $csvLine );
			fputcsv($csvOutput, $csvData);
			$counter++;
		}
		
		fclose($csvOutput);
	}
		
	public function writeCSVHeader(){
		$csvData = array(
			"Rev ID",
			"UNIX Timestamp",
			"Contributor ID", 
			"Comment",
			"Revision MD5",
			"new?",
			"edit size",
			"net size change",
			"anonymous?",
			"log action"
		);
		fputcsv($this->outputFile, $csvData);
	}
	
	public function run(){
		$reader = new XMLReader();
		$reader->open($this->inputFileName);		
		$this->writeCSVHeader();
		$current_rev = 0;
		
		//get article title
		while($reader->read()){
			if($reader->nodeType == XMLREADER::ELEMENT
				&& $reader->localName == "title"){
					$this->articleName = $reader->readInnerXml();
					echo "Reading ".$this->articleName."\n";
					break;
				}
		}
		
		//get first log
		if($this->pagelog){
			$this->nextLog = $this->getNextLogDataLine();
		}
		
		//read each revision
		while ( $reader->read()){
			if ( $reader->nodeType == XMLREADER::ELEMENT
				&& $reader->localName == "revision") {
					$current_rev++;
					$this->parseRev($reader->readOuterXML());
				}//revision	
		} //while
		
		if($this->pagelog && $this->nextLog){
			//note: assumes more page revisions exist than log action items		
			while ( $this->nextLog ){
			    fputcsv( $this->outputFile, $this->nextLog );
			    $this->md5History[] = $md5;
			    $this->revTypes[] = new PageAction();
			    $this->nextLog = $this->getNextLogDataLine();
			  }
		}
		
		
		$this->writeRevisionStatus();
		
	}
	
	public function getNextLogDataLine(){
		while($this->logreader->read()){
			if ($this->logreader->nodeType == XMLREADER::ELEMENT
				&& $this->logreader->localName == "logitem") {
				$logitem = new SimpleXMLElement($this->logreader->readOuterXml());
				if(strcmp($logitem->logtitle, $this->articleName)==0){
					return array(
						$logitem->id,
						strtotime($logitem->timestamp),
						$logitem->contributor->username,
						$logitem->params,
						"",
						"",
						"",
						"",
						"",
						$logitem->action
					);
				}
			}
		}
	}
	
	
	//foreach revision...
	public function parseRev($xmlTEXT){
		
		if(!$xmlTEXT){
			return;
		}
		
		$revision = new SimpleXMLElement($xmlTEXT);
		$textSize = strlen($revision->text);
		
		$md5 = md5($revision->text);
		
		$revertIndex = array_search($md5, $this->md5History);
		
		$isNew = "no";
		
	    if($revertIndex === FALSE ){
			$isNew = "yes";
		}
	
		$csvData = array(
			$revision->id,
			strtotime($revision->timestamp),
			isset($revision->contributor->username)?
				$revision->contributor->username : $revision->contributor->ip, 
			isset($revision->comment) ?
				(preg_replace("[\n|\r]", " ", $revision->comment)) : "",
			$md5,
			$isNew,
			$textSize,
			$textSize - $this->oldSize,
			isset($revision->contributor->username)? "no":"yes",
			""
		);
		$this->oldSize = $textSize;
		
		if($this->pagelog && $this->nextLog){		
			while (( $this->nextLog ) 
				&& ( $csvData[1] > $this->nextLog[1] )){
			    fputcsv( $this->outputFile, $this->nextLog );
			    $this->md5History[] = $md5;
			    $this->revTypes[] = new PageAction();
			    $this->nextLog = $this->getNextLogDataLine();
			  }
		}
		fputcsv($this->outputFile, $csvData);
		
		if($revertIndex === FALSE ){
			$this->revTypes[] = new Edit(true);
		}
		else{
			$revert = new Revert(count($this->revTypes), $this->revTypes, true, $revertIndex);
			$this->revTypes[] = $revert;
			$revert->updateHistory();
		}
		$this->md5History[] = $md5;	
	}
}



