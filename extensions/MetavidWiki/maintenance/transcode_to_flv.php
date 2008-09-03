<?php
//dependent on mounted sources
/*
 	ssh mounts commands: 
	sshfs dale@128.114.20.64:/metavid/video_archive /media/mv_ssh_oggMediaStorage/
	sshfs dale@mvbox2.cse.ucsc.edu:/metavid/video_archive /media/mv_ssh_flvMediaStorage/
	
	if running locally just link it ie on mvbox2:
	ln -s /metavid/video_archive /media/mv_ssh_flvMediaStorage 
*/
$mvMountedSource = '/media/mv_ssh_oggMediaStorage/';
//mvbox2.cse.ucsc.edu
$mvMountedDest	 = '/media/mv_ssh_flvMediaStorage/';

//include commandLine.inc from the mediaWiki maintance dir: 
require_once ('../../../maintenance/commandLine.inc');

//for gennerate flv metadata:
include_once('../skins/mv_embed/flvServer/MvFlv.php');

define('MV_BASE_MEDIA_SERVER_PATH', 'http://mvbox2.cse.ucsc.edu/mvFlvServer.php/');

$flvEncodeCommand = 'ffmpeg -i $input -ar 22050 -aspect 4:3 -f flv  -acodec libmp3lame -ac 1 -ab 32k -b 250k -s 400x300 $output';

$doneWithTrascode=false;
while($doneWithTrascode==false){
	//get directory listing for $mvMountedSource
	$sorce_dir_ary = scandir($mvMountedSource);
	if(!$sorce_dir_ary)
		die('could not read '.$sorce_dir_ary);
		
	//get directory listing for $mvMountedDest
	$dest_dir_ary = scandir($mvMountedDest);
	if(!$dest_dir_ary)
		die('could not read '. $dest_dir_ary);
		
	//check for HQ oggs that lack flash files
	foreach($sorce_dir_ary as $source_file){
		
		if(substr($source_file, -7)=='.HQ.ogg'){
			print "on HQ_File: {$mvMountedSource}{$source_file} \n";
			//gennerate flash file name: 
			$stream_name = substr( $source_file,0,(strlen($source_file)-7)); 
			$local_fl =$mvMountedDest . $stream_name . '.flv';
			if(!is_file($local_fl)){
				print "flv NOT found run trascode for: $source_file\n";
				//replace input: 
				$flvEncodeCommand = str_replace('$input', $mvMountedSource . $source_file, $flvEncodeCommand);
				//replace output
				$flvEncodeCommand = str_replace('$output', $local_fl, $flvEncodeCommand);				
				$pid = simple_run_background($flvEncodeCommand);
				sleep(1); //give time for the proccess to start up
				while(is_process_running($pid)){
					clearstatcache();
					print "running trascode: ". hr_bytes(filesize($local_fl)). "\n";
					sleep(10);
				}
				//now it should be there
				if(is_file($local_fl)){
					//flv is found
					print "flv found: " . $mvMountedDest . $stream_name . ".flv \n";
					//check for .meta
					if(!is_file($local_fl .META_DATA_EXT)){				
						echo "gennerating flv metadata for $local_fl \n";		
						$flv = new MyFLV();
						try {
							$flv->open( $local_fl );
						} catch (Exception $e) {
							die("<pre>The following exception was detected while trying to open a FLV file:\n" . $e->getMessage() . "</pre>");
						}
						$flv->getMetaData();
						echo "done with .meta (" . filesize($local_fl.META_DATA_EXT).") \n";
					}
					//update db: 
					update_flv_pointer_db($stream_name);			
					break; //break out of forloop					
				}
			}			
		 }
	}
	print "done with current pass ... will run again in 2 seconds \n";
	sleep(2);
}
function update_flv_pointer_db($stream_name){
	$dbr = wfGetDB(DB_READ);
	$dbw = wfGetDB(DB_WRITE);
		
	//get stream name: 
	$res = $dbr->select('mv_streams', '*', array( 'name'=>$stream_name));
	$stream = $dbr->fetchObject($res);
		
	$resFcheck = $dbr->select('mv_stream_files', '*', array(
					'stream_id'=>$stream->id,
					'file_desc_msg'=> 'mv_flash_low_quality'
					)
				);
	if($dbr->numRows($resFcheck)==0){
		//grab duration from mv_ogg_low_quality
		$sql = " SELECT * FROM `mv_stream_files` WHERE `stream_id`='".$stream->id."' " .
		 		" AND `file_desc_msg`='mv_ogg_low_quality'";
		$rdur = $dbr->query($sql);
		$dur_val =0;
		if($dbr->numRows($rdur)){
			$ogg_file = $dbr->fetchObject($rdur);
			$dur_val = $ogg_file->duration;
		}				
		$dbw->insert('mv_stream_files', 
							array('stream_id'=>$stream->id,
								'duration'=>$dur_val,
								'file_desc_msg'=>'mv_flash_low_quality',
								'path_type'=>'url_anx',
								'path'=>MV_BASE_MEDIA_SERVER_PATH . $stream->name .".flv")
						 );
		print $dbw->lastQuery();
		print "insert {$stream->name}.flv\n";				
		//$dbw->query($sql);
	}else{
		$file = $dbr->fetchObject($resFcheck);
		$dbr->update('mv_stream_files', 
			array('path'=>MV_BASE_MEDIA_SERVER_PATH . $stream->name .'.flv'),
			array('id'=>$file->id),
			__METHOD__,
			array('LIMIT'=>1));		
		$dbw->query($sql);				
	}					
}
function simple_run_background($command){
	$PID = shell_exec("nohup $command > /dev/null & echo $!");
	return $PID;
}
//Verifies if a process is running in linux
function is_process_running($PID){
	$ProcessState='';
	exec("ps $PID", $ProcessState);
	return(count($ProcessState) >= 2);
}
function hr_bytes($size) {
		$size = (int)$size;
        $a = array("B", "KB", "MB", "GB", "TB", "PB");
        $pos = 0;        
        while ($size >= 1024) {
                $size /= 1024;
                $pos++;
        }
        return round($size,2)." ".$a[$pos];
}
?>