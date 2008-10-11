/*
* vlc embed based on: http://people.videolan.org/~damienf/plugin-0.8.6.html
* javascript api: http://www.videolan.org/doc/play-howto/en/ch04.html
*  assume version > 0.8.5.1
*/
var vlcEmbed = { 
	instanceOf:'vlcEmbed',
    supports: {'play_head':true, 
	    'play_or_pause':true, 
	    'stop':true, 
	    'fullscreen':true, 
	    'time_display':true, 
	    'volume_control':false,
	    
	    'playlist_driver':true, //if the object supports playlist functions
	    'overlay':false
    },
	//init vars: 
	monitorTimerId : 0,
	prevState : 0,
	currentTime:0,
	duration:0,	
    userSlide:false,    
    getEmbedHTML : function(){
		//give VLC 150ms to initialize before we start playback 
		//@@todo should be able to do this as an ready event
		setTimeout('document.getElementById(\''+this.id+'\').postEmbedJS()', 150);
	   	return this.getEmbedObj();
	},
	getEmbedObj:function(){
		return '<object classid="clsid:9BE31822-FDAD-461B-AD51-BE1D1C159921" '+
			'codebase="http://downloads.videolan.org/pub/videolan/vlc/latest/win32/axvlc.cab#Version=0,8,6,0" '+
			'id="'+this.pid+'" events="True" height="'+this.height+'" width="'+this.width+'">'+
	            '<param name="MRL" value="">'+
	            '<param name="ShowDisplay" value="True">'+
	            '<param name="AutoLoop" value="False">'+
	            '<param name="AutoPlay" value="False">'+
	            '<param name="Volume" value="50">'+
	            '<param name="StartTime" value="0">'+
	            '<embed pluginspage="http://www.videolan.org" type="application/x-vlc-plugin" '+
	            'progid="VideoLAN.VLCPlugin.2" name="'+this.pid+'" height="'+this.height+'" width="'+this.width+'">'+
	        '</object>';
	},
    
    /*
    * some java script to start vlc playback after the embed:
    */
    postEmbedJS : function(){
        //load a pointer to the vlc into the object (this.vlc)
    	this.getVLC();
    	if(this.vlc.log){
	    	//manipulate the dom object to make sure vlc has the correct size: 
	    	this.vlc.style.width=this.width;
	    	this.vlc.style.height=this.height;       
	    	this.vlc.playlist.items.clear();
	    	//@@todo if client supports seeking no need to send seek_offset to URI
	    	js_log('vlc play:' + this.media_element.selected_source.getURI(this.seek_time_sec));   
	    	var itemId = this.vlc.playlist.add( this.media_element.selected_source.getURI(this.seek_time_sec) );
	    	if( itemId != -1 ){
	    		//play
	    		this.vlc.playlist.playItem(itemId);
	    	}else{
	    		js_log("error:cannot play at the moment !");
	    	}
	    	//if controls enabled start up javascript interface and monitor:
			if(this.controls){				
				//activate the slider: scriptaculus based)
				//this.activateSlider();  
				//start doing status updates every 1/10th of a second			   	    		
			}		
			setTimeout('$j(\'#'+this.id+'\').get(0).monitor()',100);						
    	}else{
    		js_log('vlc not ready');
    		setTimeout('document.getElementById(\''+this.id+'\').postEmbedJS()',100);	
    	}
    },   
	doSeek : function(value){
		//if( ! this.inputTrackerIgnoreChange ){
			if( (this.vlc.input.state == 3) && (this.vlc.input.position != value) )
	        {
        	    this.vlc.input.position = value;
            	document.getElementById("info_" + this.id ).innerHTML = 'seeking'
	        }				
		//}
	},
	playMovieAt : function (order){
		//@@todo add clips to playlist after (order) and then play
		this.play();
	},
    /* 
    * updates the status time
    */
    monitor : function(){
    	this.getVLC();
    	if(this.vlc.log){
    		//js_log( 'state:' + this.vlc.input.state);
			//js_log('time: ' + this.vlc.input.time);
			//js_log('pos: ' + this.vlc.input.position);
			if( this.vlc.log.messages.count > 0 ){
	        	// there is one or more messages in the log
	        	var iter = this.vlc.log.messages.iterator();
	        	while( iter.hasNext ){
	 	           var msg = iter.next();
	        	   var msgtype = msg.type.toString();
		           if( (msg.severity == 1) && (msgtype == "input") )
	        	   {
	               		js_log( msg.message );
	               }
	        	}
		        // clear the log once finished to avoid clogging
	        	this.vlc.log.messages.clear();
	    	}
	    	var newState = this.vlc.input.state;
	    	if( this.prevState != newState ){
	       		if( newState == 0 )
		        {
	        	    // current media has stopped 
		            this.onStop();
		            //assume we reached the end: (since it was not a js call to stop) 
   		        	this.onClipDone();
	        	}
		        else if( newState == 1 )
	        	{
		            // current media is opening/connecting
	        	    this.onOpen();
		        }
		        else if( newState == 2 )
	        	{
		            // current media is buffering data
	        	    this.onBuffer();
		        }
		        else if( newState == 3 )
	        	{
		           // current media is now playing
	        	   this.onPlay();
		        }
	       		else if( this.vlc.input.state == 4 )
		        {
	        	    // current media is now paused
		            this.onPause();
	        	}
	        	this.prevState = newState;
		    }else if( newState == 3 ){
		        // current media is playing
		        this.onPlaying();
		    }
    	}
    	//do monitor update: 
	    if( ! this.monitorTimerId ){
	    	if(document.getElementById(this.id)){
	        	this.monitorTimerId = setInterval('document.getElementById(\''+this.id+'\').monitor()', 250);
	    	}
	    }
    },
/* events */
    onOpen : function(){
    	this.setStatus("Opening...");
    	//document.getElementById("info_"+this.id).innerHTML = "Opening...";
		//document.getElementById("PlayOrPause").disabled = true;
    	//document.getElementById("Stop").disabled = false;
    },
    onBuffer : function(){
	    this.setStatus("Buffering...");
    	//document.getElementById("info_"+this.id).innerHTML = "Buffering...";
    	//document.getElementById("PlayOrPause").disabled = true;
    	//document.getElementById("Stop").disabled = false;
    },
    onPlay : function(){
    	//document.getElementById("PlayOrPause").value = "Pause";
		//document.getElementById("PlayOrPause").disabled = false;
		//document.getElementById("Stop").disabled = false;
		this.onPlaying();		
    },
    liveFeedRoll : 0,
    onPlaying : function(){
		if(this.seek_time_sec != 0 && !this.media_element.selected_source.supports_url_time_encoding)
		{
			// VLC seems to have a problem seeking into the future this way
			var ms_difference = this.seek_time_sec * 1000 - this.vlc.input.time;
			if(ms_difference <= 0)
			{
				js_log('Seeking to ' + this.seek_time_sec);
				this.vlc.input.time = this.seek_time_sec * 1000;
				this.vlc.input.rate=1.0;
				this.seek_time_sec = 0;
			}
			else if (this.vlc.input.rate == 1.0)
			{
				var rate = Math.max(2, ms_difference / 500)
				js_log('setting rate to: ' + rate);
				this.vlc.input.rate=rate;
			}
		}
    	//for now trust the duration from url over vlc input.length
		if(!this.media_element.selected_source.end_ntp && this.vlc.input.length>0)
		{
			js_log('setting duration to ' + this.vlc.input.length /1000);
			this.media_element.selected_source.setDuration(this.vlc.input.length /1000);
		}

    	this.duration = (this.getDuration())?this.getDuration():this.vlc.input.length /1000;
    	/*if(this.duration!=this.vlc.input.length /1000){
	        this.duration = this.vlc.input.length /1000;   
    	}*/     
       	//update the currentTime attribute 
       	this.currentTime =this.vlc.input.time/1000;       	
        if( this.duration > 0 || this.vlc.input.time > 0){                             				     					
			this.start_offset=this.media_element.selected_source.start_offset;		
			
			//if we have media duration procceed
			if(this.duration){
			//as long as the user is not interacting with the playhead update:
				if(! this.userSlide){									
					//slider pos is not accurate with flash: 
					if(this.vlc.input.position!=0 && this.media_element.selected_source.mime_type!='video/x-flv'){
						/*js_log(' set slider via input.position: ' + 
							this.media_element.selected_source.mime_type + ' pos:'+ this.vlc.input.position);
						*/
						this.setSliderValue(this.vlc.input.position);
					}else{
						//set via time:
						/*js_log('t:' +(this.vlc.input.time/1000) +' - so:'+this.start_offset+
							' set slider:' + ((this.vlc.input.time/1000)-this.start_offset) + ' / ' + this.duration +
							' ='+  ((this.vlc.input.time/1000)-this.start_offset)/this.duration );
						*/
						this.setSliderValue( ((this.vlc.input.time/1000) -this.start_offset) / this.duration);
					}  	    
					//js_log('set status: '+ seconds2ntp(this.currentTime) + ' e:'+seconds2ntp(this.duration+this.start_offset));    
					this.setStatus(seconds2ntp(this.currentTime) + '/' + seconds2ntp(this.duration+this.start_offset) );					
			   }
			}
        }else{        	        	
        	//@@todo hide playhead remove the slider (its a live stream)     
            this.setStatus('live');
        }
   },
   onPause : function(){
   	//document.getElementById("PlayOrPause").value = " Play ";
   },
   onStop : function(){	
   		//
	    // disable logging
	    this.vlc.log.verbosity = -1;
	    //document.getElementById("Stop").disabled = true;
		if(this.controls){
		    this.setSliderValue(0);
		    this.setStatus("-:--:--/-:--:--");
		}
		//stop updates: 
		if( this.monitorTimerId != 0 )
	    {
	        clearInterval(this.monitorTimerId);
	        this.monitorTimerId = 0;
	    }
	    //document.getElementById("PlayOrPause").value = " Play ";
	    //document.getElementById("PlayOrPause").disabled = false;
    },
   /* js hooks/controls */
    play : function(){
    	js_log('f:vlcPlay');
 	   	this.getVLC();
    	if(!this.vlc || this.thumbnail_disp){
	    	//call the parent
    		this.parent_play();
    	}else{    	
    		//plugin is already being present send play call: 
    		// clear the message log and enable error logging
	        this.vlc.log.verbosity = 1;
    	    this.vlc.log.messages.clear();
			this.vlc.playlist.play();
			this.monitor();
			this.paused=false;
    	}    	
    },
    stop : function(){
    	js_log(this.vlc);
    	if(typeof this.vlc != 'undefined' ){
    		if(typeof this.vlc.playlist != 'undefined'){
	    		this.vlc.playlist.stop();
		    	if( this.monitorTimerId != 0 )
			    {
			        clearInterval(this.monitorTimerId);
			        this.monitorTimerId = 0;
			    }
    		}
    	}
	    //this.onStop();
	    //do parent stop
	    this.parent_stop();
    },
    pause : function(){
		this.vlc.playlist.togglePause();
    },
    fullscreen : function(){
		if(this.vlc){
			if(this.vlc.video)
				this.vlc.video.toggleFullscreen();
		}
    },
    /* returns current time in float seconds 
     * as per html5 we should just have an attribute by name of CurrentTime
     * http://www.whatwg.org/specs/web-apps/current-work/#currenttime
    currentTime : function(){
		if(typeof this.vlc != 'undefined' ){
			if(typeof this.vlc.input != 'undefined' ){
				return this.vlc.input.time/1000;	
			}
		}
		return '0';
    },
    */
    // get the embed vlc object 
    getVLC : function(){
    	this.vlc = this.getPluginEmbed();   		
    }
}

