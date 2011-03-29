<?php

/*
 * WebVideoTranscode provides:
 *  encode keys
 *  encode settings  
 *  
 * 	extends api to return all the streams
 *  extends video tag output to provide all the available sources
 */


/*
 * Main WebVideoTranscode Class hold some constants and config values
 */
class WebVideoTranscode {
	
	/**
	* Key constants for the derivatives,
	* this key is appended to the derivative file name
	*
	* If you update the wgDerivativeSettings for one of these keys
	* and want to re-generate the video you should also update the
	* key constant. ( Or just run a maintenance script to delete all
	* the assets for a given profile )
	* 
	* Msg keys for derivatives are set as follows: 
	* $messages['timedmedia-derivative-200_200kbs.ogv'] => 'Ogg 200';
	*/
	
	// Ogg Profiles
	const ENC_OGV_2MBS = '220_200kbs.ogv';
	const ENC_OGV_4MBS = '360_400kbs.ogv';
	const ENC_OGV_6MBS = '480_600kbs.ogv';
	const ENC_OGV_HQ_VBR = '720_VBR.ogv';
	
	// WebM profiles: 	
	const ENC_WEBM_6MBS = '480_600kbs.webm';
	const ENC_WEBM_HQ_VBR = '720_VBR.webm';

	/**
	* Encoding parameters are set via firefogg encode api
	*
	* For clarity and compatibility with passing down
	* client side encode settings at point of upload
	*
	* http://firefogg.org/dev/index.html
	*/
	public static $derivativeSettings = array(
		WebVideoTranscode::ENC_OGV_2MBS =>
			array(
				'maxSize'			=> '220',
				'videoBitrate'		=> '160',
				'audioBitrate'		=> '32',
				'samplerate'		=> '22050',
				'framerate'			=> '18',
				'channels'			=> '1',
				'noUpscaling'		=> 'true',
				'twopass' 			=> 'true',
				'keyframeInterval'	=> '64',
				'bufDelay'			=> '128',
				'videoCodec' 		=> 'theora',
			),
		WebVideoTranscode::ENC_OGV_4MBS =>
			array(
				'maxSize'			=> '480',
				'videoBitrate'		=> '512',
				'audioBitrate'		=> '48',
				'noUpscaling'		=> 'true',
				'twopass'			=> 'true',
				'keyframeInterval'	=> '128',
				'bufDelay'			=> '256',
				'videoCodec' 			=> 'theora',
			),
		WebVideoTranscode::ENC_OGV_6MBS =>
			array(
				'maxSize'			=> '640',
				'videoBitrate'		=> '786',
				'audioBitrate'		=> '96',
				'noUpscaling'		=> 'true',
				'twopass'			=> 'true',
				'keyframeInterval'	=> '128',
				'bufDelay'			=> '256',
				'videoCodec' 			=> 'theora',
			),

		WebVideoTranscode::ENC_OGV_HQ_VBR =>
			array(
				'maxSize'			=> '1280',
				'videoQuality'		=> 6,
				'audioQuality'		=> 3,
				'noUpscaling'		=> 'true',
				'keyframeInterval'	=> '128',
				'videoCodec' 			=> 'theora',
			),	

			
		// WebM transcode:
		WebVideoTranscode::ENC_WEBM_6MBS =>
			array(
			 	'maxSize'			=> '640',
				'videoBitrate'		=> '786',
				'audioBitrate'		=> '96',
				'noUpscaling'		=> 'true',
				'twopass'			=> 'true',
				'keyframeInterval'	=> '128',
				'bufDelay'			=> '256',
				'videoCodec' 			=> 'vp8',
			),
		WebVideoTranscode::ENC_WEBM_HQ_VBR =>
			 array(
				'maxSize'			=> '1280',
				'videoQuality'		=> 7,
				'audioQuality'		=> 3,
				'noUpscaling'		=> 'true',
				'videoCodec' 		=> 'vp8',
			)
	);
	
	static public function getDerivativeFilePath( &$file, $transcodeKey){
		return dirname( 
				$file->getThumbPath(
					$file->thumbName( array() )
				)
			) . '/' . 
			$file->getName() . '.' .
			$transcodeKey ;
	}
	
	static public function getTargetEncodePath( &$file, $transcodeKey ){
		// TODO probably should use some other temporary non-web accessible location for 
		// in-progress encodes.
		$filePath = self::getDerivativeFilePath( $file, $transcodeKey );
		$ext = strtolower( pathinfo( "$filePath", PATHINFO_EXTENSION ) );
		return "{$filePath}.queue.{$ext}";
	}
	/**
	 * Get the max size of the web stream ( constant bitrate ) 
	 */
	static public function getMaxSizeWebStream(){
		global $wgEnabledTranscodeSet;
		$maxSize = 0;
		foreach( $wgEnabledTranscodeSet as $transcodeKey ){
			if( isset( self::$derivativeSettings[$transcodeKey]['videoBitrate'] ) ){
				$maxSize = self::$derivativeSettings[$transcodeKey]['maxSize'];
			}
		}
		return $maxSize;
	}
	/** 
	 * Static function to get the set of video assets 
	 * 
	 * Based on the $wgEnabledTranscodeSet set of enabled derivatives 
	 * 
	 * In progress assets have .tmp extension and we don't add jobQueue for them. 
	 * 	This assumes "cheap" stat calls and "costly" jobQueue sql queries
	 * 	
	 * If no transcode is in progress or ready add the job to the jobQueue
	 * 
	 * @param {Object} File object
	 * @param {Object} Options, a set of options:
	 * 					'nodata' Strips the data- attribute, useful when your output is not html
	 * @returns an associative array of sources suitable for <source> tag output
	 */
	static public function getSources( &$file , $options=array() ){
		global $wgEnabledTranscodeSet, $wgLang;
		$sources = array();
		
		// Setup options
		$dataPrefix = in_array( 'nodata', $options )? '': 'data-';
				
		// Add the original file: 
		$source = array(
			'src' => $file->getUrl(),
			'title' => wfMsg('timedmedia-source-file-desc',  
								$file->getHandler()->getMetadataType(),
								$wgLang->formatNum( $file->getWidth() ),
								$wgLang->formatNum( $file->getHeight() ),
								$wgLang->formatBitrate( $file->getHandler()->getBitrate( $file ) )
							),
			"{$dataPrefix}shorttitle" => wfMsg('timedmedia-source-file', wfMsg( 'timedmedia-' . $file->getHandler()->getMetadataType() ) ),
							
			"{$dataPrefix}width" => $file->getWidth(),
			"{$dataPrefix}height" => $file->getHeight(),
			// TODO add some title and data about the file
		);

		// Just directly return audio sources ( No transcoding for audio ) 
		if( $file->getHandler()->isAudio( $file ) ){
			return $sources;
		}
		// For video include bitrate and framerate: 
		$bitrate = $file->getHandler()->getBitrate( $file );
		if( $bitrate ) $source["{$dataPrefix}bandwidth"] = round ( $bitrate );
		
		$framerate = $file->getHandler()->getFramerate( $file );
		if( $framerate ) $source["{$dataPrefix}framerate"] = $framerate;		
		
		// Add the source to the sources array
		$sources[] = $source;
		// Setup local variables 
		$fileName = $file->getName();
		
		$addOggFlag = false;
		$addWebMFlag = false;
		
		$ext = pathinfo("$fileName", PATHINFO_EXTENSION);
		// Check the source file for .webm extension 
		if( strtolower( $ext )== 'webm' ) {
			$addWebMFlag = true;
		} else {
			// If not webm assume ogg as the source file 	
			$addOggFlag = true;
		}
		
		foreach( $wgEnabledTranscodeSet as $transcodeKey ){
			$derivativeFile = self::getDerivativeFilePath( $file, $transcodeKey);
			$codec =  self::$derivativeSettings[$transcodeKey]['videoCodec'];
			// Check if we should add derivative to job queue 
			// Skip if we have both an Ogg & WebM and if target encode larger than source
			if( self::isTargetLargerThanFile( $file, self::$derivativeSettings[$transcodeKey]['maxSize']) ){				
				continue;
			}			
			// if we are checking for this derivative, update codec flags: 
			if( $codec == 'theora' ){
				$addOggFlag = true;
			}
			if( $codec == 'vp8' ){
				$addWebMFlag = true;
			}
			// Try and add the source
			self::tryAddSource( $file, $sources, $transcodeKey, $dataPrefix );
		}
		// Make sure we got at least one ogg and webm encode 
		if( !$addOggFlag || !$addWebMFlag){
			foreach( $wgEnabledTranscodeSet as $transcodeKey ){
				if( !$addOggFlag && self::$derivativeSettings[$transcodeKey]['videoCodec'] == 'theora' ){
					self::tryAddSource( $file, $sources, $transcodeKey, $dataPrefix );
					$addOggFlag = true;
				}
				if( !$addWebMFlag && self::$derivativeSettings[$transcodeKey]['videoCodec'] == 'vp8' ){
					self::tryAddSource( $file, $sources, $transcodeKey, $dataPrefix );
					$addWebMFlag = true;
				}
			}
		}
		return $sources;
	}
	/**
	 * Try to add a source to the sources param
	 * if the source is not found update the job queue
	 */
	public static function tryAddSource( &$file, &$sources, $transcodeKey, $dataPrefix=''){
		global $wgLang;
		$derivativeFile = self::getDerivativeFilePath( $file, $transcodeKey);
		
		$thumbName = $file->thumbName( array() );
		$thumbUrl = $file->getThumbUrl( $thumbName );
		$thumbUrlDir = dirname( $thumbUrl );
	
		// if the source size is < $transcodeKey assume source size: 
		if( is_file( $derivativeFile ) ){
			// Estimate bandwidth: 
			$bandwidth = round( intval( filesize( $derivativeFile ) /  $file->getLength() ) * 8 );
			
			list( $width, $height ) = WebVideoTranscode::getMaxSizeTransform( 
						$file, 
						self::$derivativeSettings[$transcodeKey]['maxSize'] 
					);
					
			$framerate = ( isset( self::$derivativeSettings[$transcodeKey]['framerate'] ) )? 
						self::$derivativeSettings[$transcodeKey]['framerate'] :
						$file->getHandler()->getFramerate( $file );
			$sources[] = array(
				'src' => $thumbUrlDir . '/' .$file->getName() . '.' . $transcodeKey,
				'title' => wfMsg('timedmedia-derivative-desc-' . $transcodeKey ),
				"{$dataPrefix}shorttitle" => wfMsg('timedmedia-derivative-' . $transcodeKey),
				
				// Add data attributes per emerging DASH / webTV adaptive streaming attributes
				// eventually we will define a manifest xml entry point.
				"{$dataPrefix}width" => $width,
				"{$dataPrefix}height" => $height,
				"{$dataPrefix}bandwidth" => $bandwidth,
				"{$dataPrefix}framerate" => $framerate,					
			);
		} else {
			self::updateJobQueue($file, $transcodeKey); 				
		}
	}
	
	/**
	 * Update the job queue if the file is not already in the job queue:
	 */	
	public static function updateJobQueue( &$file, $transcodeKey ){
		$target =  self::getTargetEncodePath( $file, $transcodeKey );
		// TranscodeKey not found ( check if the file is in progress ) ( tmp transcode location ) 
		if( is_file( $target ) ) {
			// file in progress / in queue
			// TODO We could check date and flag as failure somewhere
		} else {		
			// no in-progress file add to job queue and touch the target
			$job = new WebVideoTranscodeJob( $file->getTitle(), array(
				'transcodeMode' => 'derivative',
				'transcodeKey' => $transcodeKey,
			) );					
			$jobId = $job->insert();
			if( $jobId ){
				// Make the thumb target directory 
				if( ! is_dir( dirname( $target ) )){
					wfMkdirParents( dirname( $target ) );
				}
				// Touch the target file
				touch( $target );
			}
		}
	}
	
	/**
	 * Transforms the size per a given "maxSize" 
	 *  if maxSize is > file, file size is used
	 */
	public static function getMaxSizeTransform( &$file, $targetMaxSize ){		
		$sourceWidth = $file->getWidth();
		$sourceHeight = $file->getHeight();
		if( WebVideoTranscode::isTargetLargerThanFile( $file, $targetMaxSize) ){
			return array(
				$sourceWidth,
				$sourceHeight
			);
		}
		// Get the aspect ratio percentage
		$ar = intval( $sourceWidth ) / intval( $sourceHeight );
		if ( $sourceWidth > $targetMaxSize ) {
			return array(
				intval( $targetMaxSize ),
				intval( $targetMaxSize / $ar)
			);
		} else {
			return array(
				intval( $targetMaxSize ),
				intval( $targetMaxSize * $ar)
			);
      	}
	}
	/**
	 * Test if a given transcode target is larger than the source file
	 * 
	 * @param $transcodeKey The static transcode key
	 * @param $file {Object} File object
	 */
	public static function isTargetLargerThanFile( &$file, $targetMaxSize ){
		$largerSize = ( $file->getWidth() > $file->getHeight() )?$file->getWidth(): $file->getHeight();		
		return ( $targetMaxSize > $largerSize );
	}
}

