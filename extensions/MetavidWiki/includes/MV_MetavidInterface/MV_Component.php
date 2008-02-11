<?php
if ( !defined( 'MEDIAWIKI' ) )  die( 1 );
/*
 * Created on Jun 28, 2007
 *
 * All Metavid Wiki code is Released Under the GPL2
 * for more info visit http:/metavid.ucsc.edu/code
 * 
 * the base component class
 */
 class MV_Component{
 	var $name = 'MV_Component';
 	var $mv_interface=null;
 	//default values: 
 	var $status='ok';
 	var $innerHTML ='';
 	var $js_eval=false;  	 	
 	var $req = '';
 	var $mvd_tracks=array();
 	
 	function __construct($init=array()){
 		foreach($init as $k=>$v){
 			$this->$k=$v;
 		}
 	} 	
 	//proccess the request set (load from settings if not set in url 
	//@@todo would be good to allow user-set prefrence in the future)
	function procMVDReqSet(){
		global $wgRequest;
		global $mvMVDTypeDefaultDisp, $mvMVDTypeAllAvailable;
		if(count($this->mvd_tracks)!=0)return $this->mvd_tracks;
		$user_tracks = $wgRequest->getVal('tracks');
		//print "USER TRACKS: " . $user_tracks;
		if($user_tracks!=''){
			$user_set = explode(',',$user_tracks);			
			foreach($user_set as $tk){
				if(in_array($tk, $mvMVDTypeAllAvailable)){
					$this->mvd_tracks[]= $tk;	
				}	
			}
		}else{			
			//do reality check on settings: 
			foreach($mvMVDTypeDefaultDisp as $tk){
				if(!in_array($tk, $mvMVDTypeAllAvailable)){
					global $wgOut;
					$wgOut->errorPage('mvd_default_mismatch','mvd_default_mismatchtext');
				}	
			}
			//just set to global default: 
			$this->mvd_tracks = $mvMVDTypeDefaultDisp;		
		}
	}
	function getMVDReqString(){
		return implode(',',$this->mvd_tracks);
	}
 	function getReqStreamName(){ 
 		if(isset($this->mv_interface->article))
 			return $this->mv_interface->article->mvTitle->getStreamName();
 		return null;
 	} 	
 	function setReq($req, $q=''){ 		
 		$this->req=$req; 	
 		if($q!=''){
 			$this->q=$q;
 		}
 	}
 	/* to be overwitten by class */
	function getHTML(){
		global $wgOut;
		$wgOut->addHTML( get_class($this) . ' component html');
	}
	function render_menu(){
		return get_class($this) . ' component menu';
	}
 	function render_full(){
 		global $wgOut;
 		//"<div >" .
 		$wgOut->addHTML("<fieldset id=\"".get_class($this)."\" >\n" .
 					"<legend id=\"mv_leg_".get_class($this)."\">".$this->render_menu()."</legend>\n"); 				
 		//do the implemented html 
 		$this->getHTML(); 
 		$wgOut->addHTML("</fieldset>\n");
	}
 }
?>
