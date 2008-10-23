/*
 * mv_sequencer.js Created on Oct 17, 2007
 *
 * All Metavid Wiki code is Released under the GPL2
 * for more info visit http:/metavid.ucsc.edu/code
 * 
 * @author Michael Dale
 * @email dale@ucsc.edu
 * @url http://metavid.ucsc.edu
 *
 * 
 * mv_sequencer.js 
 * 	is a basic embedable sequencer. 
 *  extends the playlist with drag/drop/sortable/add/remove functionality
 *  editing of annotative content (mostly for wiki)
 *  enables more dynamic layouts
 *  exports back out to json or inline format
 */
 
gMsg['menu_welcome']='Welcome';
gMsg['menu_cliplib']='Clip Library';
gMsg['menu_transition']='Transitions';
gMsg['menu_soundtrack']='Soundtrack';
		
gMsg['zoom_in']='Zoom In';
gMsg['zoom_out']='Zoom Out';
gMsg['cut_clip']='Cut Clips';
gMsg['expand_track']='Expand Track';
gMsg['colapse_track']='Colapse Track';
gMsg['play_clip']='Play From Playline Position';
gMsg['pixle2sec']='pixles to seconds';
gMsg['rmclip']='Remove Clip';
gMsg['clip_in']='clip in';
gMsg['clip_out']='clip out';

 //used to set default values and validate the passed init object
var sequencerDefaultValues = {
	
	instance_name:'mvSeq', //for now only one instance by name mvSeq is allowed	
	sequence_container_id:'null',//text value (so that its a valid property) 
	video_container_id:'mv_video_container',
	
	video_width : 400,
	video_height: 300,	
	
	sequence_tools_id:'mv_sequence_tools',
	timeline_id:'mv_timeline',
	plObj_id:'seq_plobj',
	plObj_clone:null,

	track_timeline_format:'boxes', //boxes (imovie like) or timeline ( finalCut like) 
	
	timeline_scale:.25, //in pixel to second ratio ie 100pixles for every ~30seconds
	timeline_duration:500, //default timeline length in seconds
	playline_time:0,
	track_thumb_height:60,
	track_text_height:20,
	//possible options:block rendering?
	// note some options will be lost in block rendering mode (like cutting clips etc) 	
	timeline_mode:'time', 
	//Msg are all the language specific values ... 
	// (@@todo overwrite by msg values preloaded in the page)	
	//tack/clips can be pushed via json or inline playlist format
	inline_playlist:'null', //text value so its a valid property 
	inline_playlist_id:'null',
	mv_pl_src:'null',
	//the edit stack:
	edit_stack:new Array(),
	
	//trackObj used to payload playlist Track Object (when inline not present) 
	tracks:{}
}
var mvSequencer = function(initObj) {		
	return this.init(initObj);
};
//set up the mvSequencer object
mvSequencer.prototype = {			
	plObj:null,	
	init:function(initObj){	
		//set the default values:
		for(i in sequencerDefaultValues){
			this[i]=sequencerDefaultValues[i];
		}
		//@@todo deal with multi-dimensional object updates 
		// (ie one word in wfMsg does not replace the whole wfMsg default set)
		for(i in initObj){
			//js_log('on '+ i + ' :' + initObj[i]);
			if(sequencerDefaultValues[i]){ //make sure its a valid property
				this[i]=initObj[i];
			}
		}		
		if(this.sequence_container_id==null)
			return js_log('Error: no sequence_container_id');
			
		//check for sequence_container
		if(this.sequence_container_id!='null'){
			
			//$j('#'+this.sequence_container_id).css('position', 'relative');
			this['base_width']=$j('#'+this.sequence_container_id).width();
			this['base_height']=$j('#'+this.sequence_container_id).height();
			
			/*
			var vid_width = (Math.round(this['base_width']*.5)>320)?
						  Math.round(this['base_width']*.5):320;
			var vid_height =  Math.round(vid_width*.75)+30;
			*/
			//var vid_width=320;
			//var vid_height=240+30;
			
			
			//add the container divs (with basic layout) 
			$j('#'+this.sequence_container_id).html(''+
				'<div id="'+this.video_container_id+'" style="position:absolute;right:0px;top:0px;' +
					'width:'+this.video_width+'px;height:'+this.video_height+'px;border:solid thin blue;background:#FFF;font-color:black;"/>'+
				'<div id="'+this.sequence_tools_id+'" style="position:absolute;' +
					'left:0px;right:'+(this.video_width+10)+'px;top:0px;height:'+this.video_height+'px;border:solid thin black;"/>'+
				'<div id="'+this.timeline_id+'" style="position:absolute;' + 
					'left:0px;right:0px;top:'+(this.video_height+10)+'px;bottom:0px;border:solid thin red;"/>');
			
			js_log('set: '+this.sequence_container_id + ' html to:'+ "\n"+
				$j('#'+this.sequence_container_id).html()
			);
			//add some sample tool content: (not translated since sequence_tools_id is generally overwritten
			var menu_items = {
				'welcome':1,
				'cliplib':1,
				'transition':1,
				'soundtrack':1
			};
			var menu_html = '<ul style="list-style-type:none;list-style-position:outside;display:block;">';
			for(var i in menu_items){
				menu_html+='<li style="display:inline;padding:10px;"><a style="color:#fff" href="javascript:'+this.instance_name+'.disp(\''+i+'\')">'+getMsg('menu_'+i)+'</a></li>';
			}
			menu_html+='</ul>';
			$j('#'+this.sequence_tools_id).html( menu_html + 
				'<div id="seq_tool_disp_'+this.instance_name+'">Welcome to The sequencer demo<br>' +
					'Select your editor preferance:<br> '+
					'<blockquote><input type="radio" value="A" name="radio_button">simple editor </blockquote>' +
					'<blockquote><input type="radio" value="A" name="radio_button" checked>advanced editor </blockquote>' +																	
				'</div>'
			);
			
		}		
		//add html content for timeline
		$j('#'+this.timeline_id).html(''+
			'<div id="'+this.timeline_id+'_left_cnt" class="mv_tl_left_cnt">'+
				'<div id="'+this.timeline_id+'_head_control" style="position:absolute;top:0px;left:0px;right:0px;height:30px;">' +
					'<a title="'+getMsg('play_clip')+'" href="javascript:'+this.instance_name+'.play_jt()">'+
						'<img style="width:16px;height:16px;border:0" src="' + mv_embed_path + 'images/control_play_blue.png">'+												
					'</a>'+
					'<a title="'+getMsg('zoom_in')+'" href="javascript:'+this.instance_name+'.zoom_in()">'+
						'<img style="width:16px;height:16px;border:0" src="' + mv_embed_path + 'images/zoom_in.png">'+															
					'</a>'+
					'<a title="'+getMsg('zoom_out')+'" href="javascript:'+this.instance_name+'.zoom_out()">'+
						'<img style="width:16px;height:16px;border:0" src="' + mv_embed_path + 'images/zoom_out.png">'+					
					'</a>'+
					'<a title="'+getMsg('cut_clip')+'" href="javascript:'+this.instance_name+'.cut_mode()">'+
						'<img style="width:16px;height:16px;border:0" src="' + mv_embed_path + 'images/cut.png">'+		
					'</a>'+					
				'</div>' +			
			'</div>' + 
			'<div id="'+this.timeline_id+'_tracks" class="mv_seq_tracks">' +
				'<div id="'+this.timeline_id+'_head_jump" class="mv_head_jump" style="position:absolute;top:0px;left:0px;height:20px;"></div>'+
				'<div id="'+this.timeline_id+'_playline" class="mv_playline"></div>'+
			'</div>'
		);			
		//add src based pl: 
		if( this.mv_pl_src != 'null' ) {
			js_log( ' pl src:: '+ this.mv_pl_src );			
			var src_attr=' src="'+ this.mv_pl_src+'" ';
		}else{
			js_log( ' null playlist src .. (start empty) '); 
			var src_attr='';
		}	
		$j('#'+this.video_container_id).html('<playlist ' + src_attr +
			' style="width:'+this.video_width+'px;height:'+this.video_height+'px;" '+
			' sequencer="true" id="'+this.plObj_id+'" />');
		 
		rewrite_by_id( this.plObj_id );	
		setTimeout(this.instance_name +'.checkReadyPlObj()', 25);
	},
	//once playlist is ready continue 
	checkReadyPlObj:function(){		
		this.plObj = $j('#'+ this.plObj_id ).get(0);
		if( this.plObj )
			if( ! this.plObj.loading )
				this.plReadyInit();
						
		//else keep checking for the playlist to be ready 
		if( this.plObj.loading ){ 
			if(this.plReadyTimeout==200){
				js_error('error playlist never ready');
			}else{
				this.plReadyTimeout++;
				setTimeout(this.instance_name +'.checkReadyPlObj()', 25);
			}
		}		
	},
	plReadyInit:function(){
		js_log('plReadyInit');		
		js_log( this.plObj );					
		//update playlist (since if its empty right now) 
		if(this.plObj.getClipCount()==0){
			$j('#'+this.plObj_id).html('empty playlist');
		}						
		//add playlist hook to update timeline
		this.plObj.update_tl_hook = this.instance_name+'.update_tl_hook';		
		var this_sq = this;
		var top_pos=25;		
		//add tracks:
		for(i in this.plObj.tracks){
			var track = this.plObj.tracks[i];
			//js_log("on track: "+ i + ' t:'+ $j('#'+this.timeline_id+'_left_cnt').html() );
			//set up track based on disp type
			switch(track.disp_mode){
				case 'thumb':
					var track_height=60;
					var exc_img = 'opened';
					var exc_action='close';
					var exc_msg = getMsg('colapse_track');
				break;
				case 'text':
					var track_height=20;
					var exc_img = 'closed';
					var exc_action='open';
					var exc_msg = getMsg('expand_track');
				break;
			}
			//add track name:
			$j('#'+this.timeline_id+'_left_cnt').append(
				'<div id="track_cnt_'+i+'" style="top:'+top_pos+'px;height:'+track_height+'px;" class="track_name">'+
					'<a id="mv_exc_'+i+'" title="'+exc_msg+'" href="javascript:'+this_sq.instance_name+'.exc_track('+i+',\''+exc_action+'\')">'+
						'<img id="'+this_sq.timeline_id+'_close_expand" style="width:16px;height:16px;border:0" '+ 
							' src="'+mv_embed_path + 'images/'+exc_img+'.png">'+
					'</a>'+
				track.title+'</div>'
			);
			//also render the clips in the trackset container: (thumb or text view)
			$j('#'+this.timeline_id+'_tracks').append(
				'<div id="container_track_'+i+'" style="top:'+top_pos+'px;height:'+(track_height+2)+'px;" class="container_track">' +					
				'</div>'
			);		
			top_pos+=track_height+10;		
		}					
		this.do_render_timeline();
	},
	update_tl_hook:function(jh_time_ms){			
		//put into seconds scale: 
		var jh_time_sec_float = jh_time_ms/1000;
		//render playline at given time
		//js_log('tl scale: '+this.timeline_scale);
		$j('#'+this.timeline_id+'_playline').css('left', Math.round(jh_time_sec_float/this.timeline_scale)+'px' );
		//js_log('at time:'+ jh_time_sec + ' px:'+ Math.round(jh_time_sec_float/this.timeline_scale));
	},
	/*returns a inline or json format for current sequence */
	getSeqText:function(mode){
		if(!mode)mode='json';
		switch(mode){
			case'json':
				return this.plObj.tracks.toSource();
			break;
			case 'xml':
				return "@@todo xml output";
			break;
		}		
	},
	//add clips to the pl object: (by default to the end of the track) 
	addClip:function(clip_init){
		js_log("seq: add clip");
		this_seq = this;
		var track_inx = (typeof clip_init.track_id !='undefined')?clip_init.track_id:0;				
		//set defaults if not present: 	
		if(!clip_init.order)clip_init.order=this.plObj.tracks[track_inx].clips.length;	
		if(!clip_init.id)clip_init.id = 'p_'+this.plObj.id+'_c_'+clip_init.order;
		clip_init.pp = this.plObj;
		//set up current clip Object: 
		var cur_clip = new mvClip(clip_init);	
		//do any special per-type processing before doAddClip
		switch(cur_clip.type){
			case 'srcClip':
				this_seq.doAddClip(cur_clip, track_inx);
			break;
			case 'mvClip':										
				//check if we need to get remote data: 
				if(!cur_clip.src){
					cur_clip.getRemoteData(function(){						
						this_seq.doAddClip(cur_clip, track_inx);
					});		
				}else{
					this_seq.doAddClip(cur_clip, track_inx);
				}
			break;			
		}
	},
	doAddClip:function(cur_clip, track_inx){
		//add clip to track:
		this.plObj.addCliptoTrack(cur_clip, track_inx);	
		//set up embed: 
		cur_clip.setUpEmbedObj();
		//update playlist: 
		this.plObj.getHTML();
		//update tracks:
		this.render_tracks(track_inx);
		js_log('called render tracks: length:'+ this.plObj.tracks[track_inx].clips.length );
		this.plObj.pl_duration=null;
		//update playlist desc:
		this.plObj.updateTitle();
						
	},
	removeClip:function(track_inx, clip_inx){
		//fade out fast: 
		var this_seq = this;
		$j('#track_'+track_inx+'_clip_'+clip_inx).fadeOut("fast",function(){
			this_seq.plObj.tracks[track_inx].clips.splice(clip_inx, 1);
			//reorder:
			for(k in this_seq.plObj.tracks[track_inx].clips){
				if(typeof this_seq.plObj.tracks[track_inx].clips[i]!= 'undefined'){
					this_seq.plObj.tracks[track_inx].clips[i].order=k;
				}
			}
			//re-render tracks: 
			this_seq.render_tracks(track_inx);			
			
			if(this_seq.plObj.tracks[track_inx].clips.length==0){
				this_seq.plObj.getHTML();
			}else{
				//update playlist desc: 		
				this_seq.plObj.pl_duration=null;
				this_seq.plObj.updateTitle();	
			}
		});	
	},
	doEdit:function(editObj){
		//add the current editObj to the edit stack
		this.edit_stack.push(editObj);
		//make the adjustments
		this.makeAdjustment(editObj);		
	},
	makeAdjustment:function(e){	
		switch(e.type){
			case 'resize_start':				
				this.plObj.tracks[e.track_inx].clips[e.clip_inx].doAdjust('start', e.delta);
			break;
			case 'resize_end':
				 this.plObj.tracks[e.track_inx].clips[e.clip_inx].doAdjust('end', e.delta);
			break;
		}
		js_log('re render: '+e.track_inx);
		//re-render the video track
		this.render_tracks(e.track_inx);
	},
	undoEdit:function(){
		var editObj = this.edit_stack.pop();
		//invert the delta
		
	},
	exc_track:function(inx,req){	
		this_seq = this;			
		if(req=='close'){
			$j('#mv_exc_'+inx).attr('href', 'javascript:'+this.instance_name+'.exc_track('+inx+',\'open\')');
			$j('#mv_exc_'+inx + ' > img').attr('src',mv_embed_path + 'images/closed.png');
			$j('#track_cnt_'+inx+',#container_track_'+inx).animate({height:this.track_text_height}, "slow",'',
				function(){
					this_seq.plObj.tracks[inx].disp_mode='text';
					this_seq.render_tracks(inx);
				});
		}else if(req=='open'){
			$j('#mv_exc_'+inx).attr('href', 'javascript:'+this.instance_name+'.exc_track('+inx+',\'close\')');
			$j('#mv_exc_'+inx + ' > img').attr('src',mv_embed_path + 'images/opened.png');
			$j('#track_cnt_'+inx+',#container_track_'+inx).animate({height:this.track_thumb_height}, "slow",'',
				function(){
					this_seq.plObj.tracks[inx].disp_mode='thumb';
					this_seq.render_tracks(inx);
				});
			
		}
	},
	//adds tracks 
	add_track:function(inx, track){
		
	},
	//toggle cut mode (change icon to cut)
	cut_mode:function(){
		js_log('do cut mode');
		//add cut layer ontop of clips
	},
	//renders updates the timeline based on the current scale
	render_tracks:function(track_inx){		
		js_log("render track: "+track_inx);
		if(!track_inx)track_inx=-1;
		var this_seq = this;
		//inject the tracks into the timeline (if not already there)
		for(track_id in this.plObj.tracks){	
			if(track_inx==track_id || track_inx==-1){
				//empty out the track container: 
				//$j('#container_track_'+track_id).empty();
				var track_html=droppable_html='';		
				//set up per track vars:
				var track = this.plObj.tracks[track_id];
				var cur_clip_time=0;
				//for each clip: 
				for(var j in track.clips){
					clip = track.clips[j];
					//var img = clip.getClipImg('icon');					
					//do per display type rendering: 
					if(this.timeline_mode=='time'){
						clip.left_px = Math.round( cur_clip_time/this.timeline_scale);					
						clip.width_px = Math.round( Math.round( clip.getDuration() )/this.timeline_scale);
						js_log('at time:' + cur_clip_time + ' left: ' +clip.left_px + ' clip dur: ' +  Math.round( clip.getDuration() ) + ' clip wdith:' + clip.width_px);
												
						//for every clip_width pixle output image 
						if(track.disp_mode=='thumb'){
							track_html+='<span id="track_'+track_id+'_clip_'+j+'" style="left:'+clip.left_px+'px;width:'+clip.width_px+'px;" class="mv_time_clip mv_clip_drag">';	
							track_html+= this.render_clip_frames( clip );																				
						}else if(track.disp_mode=='text'){
							//'+left_px+
							track_html+='<span id="track_'+track_id+'_clip_'+j+'" style="left:'+clip.left_px+'px;'+
								'width:'+clip.width_px+'px;background:'+clip.getColor()+
									'" class="mv_time_clip_text mv_clip_drag">'+clip.title;	
						}																																										
							//add in per clip controls
							track_html+='<div title="'+getMsg('clip_in')+' '+clip.embed.start_ntp+'" class="ui-resizable-w ui-resizable-handle" style="width: 16px; height: 16px; left: 0px; top: 2px;background:url(\''+mv_embed_path+'images/application_side_contract.png\');"></div>'+"\n";
							track_html+='<div title="'+getMsg('clip_out')+' '+clip.embed.end_ntp+'" class="ui-resizable-e ui-resizable-handle" style="width: 16px; height: 16px; right: 0px; top: 2px;background:url(\''+mv_embed_path+'images/application_side_expand.png\');"></div>'+"\n";
							track_html+='<div title="'+getMsg('rmclip')+'" onClick="'+this.instance_name+'.removeClip('+track_id+','+j+')" style="position:absolute;cursor:pointer;width: 16px; height: 16px; left: 0px; bottom:2px;background:url(\''+mv_embed_path+'images/delete.png\');"></div>'+"\n";
							track_html+='<span style="display:none;" class="mv_clip_stats"></span>';	
																													
						track_html+='</span>';	
						//droppable_html+='<div id="dropBefore_'+i+'_c_'+j+'" class="mv_droppable" style="height:'+this.track_thumb_height+'px;left:'+clip.left_px+'px;width:'+Math.round(clip.width_px/2)+'px"></div>';
						//droppable_html+='<div id="dropAfter_'+i+'_c_'+j+'" class="mv_droppable" style="height:'+this.track_thumb_height+'px;left:'+(clip.left_px+Math.round(clip.width_px/2))+'px;width:'+(clip.width_px/2)+'px"></div>';
					}
					cur_clip_time+=Math.round( clip.getDuration() ); //increment time
				}	
				//js_log("new htmL for track i: "+track_id + ' html:'+track_html);
				$j('#container_track_'+track_id).html(track_html);
				//add in control hooks: 				
				
				$j('.ui-resizable-handle').mousedown( function(){
					js_log('hid: ' +  $j(this).attr('class'));
					this_seq.resize_mode = ($j(this).attr('class').indexOf('ui-resizable-e')!=-1)?
									'resize_end':'resize_start';
				});			
				var insert_key='na';
				//add resize and drag hooks:					
				for(j in track.clips){			
					$j('#track_'+track_id+'_clip_'+j).draggable({ 		
						axis:'x', 
						containment:'#container_track_'+track_id,
						opacity:50,
						handle: ":not(.clip_control)",
						scroll:true,
						drag:function(e, ui){
							//animate re-arrange by left position: 
							//js_log('left: '+ui.position.left);
							//locate clip (based on clip durration not annimate) 	
							var id_parts = this.id.split('_');						
							var track_inx = id_parts[1];
							var clip_inx = id_parts[3];
							var clips = this_seq.plObj.tracks[track_inx].clips;
							var cur_drag_clip = clips[clip_inx];		
							var return_org = true;
							$j(this).css('zindex',10);
							//find out where we are inserting and set left border to solid red thick
							for(k in clips){
								if(	ui.position.left > clips[k].left_px &&
									ui.position.left < (clips[k].left_px + clips[k].width_px)){
									if(clip_inx!=k){
										//also make sure we are not where we started
										if(k-1!=clip_inx){
											$j('#track_'+track_inx+'_clip_'+k).css('border-left', 'solid thick red');									
											insert_key=k;
										}else{
											insert_key='na';
										}
									}else{
										insert_key='na';
									}
								}else{
									$j('#track_'+track_inx+'_clip_'+k).css('border-left', 'solid thin white');
								}
							}	
							//if greater than the last k insert after	
							if(ui.position.left > (clips[k].left_px + clips[k].width_px) &&
								k!=clip_inx ){
									$j('#track_'+track_inx+'_clip_'+k).css('border-right', 'solid thick red');
									insert_key='end';
							}else{
								$j('#track_'+track_inx+'_clip_'+k).css('border-right', 'solid thin white');
							}
						},
						start:function(e,ui){
							js_log('start drag:' + this.id);
							//make sure we are ontop
							$j(this).css({top:'0px',zindex:10});		
						},
						stop:function(e, ui){
							$j(this).css({top:'0px',zindex:0});
							
							var id_parts = this.id.split('_');						
							var track_inx = id_parts[1];
							var clip_inx = id_parts[3];
							var clips = this_seq.plObj.tracks[track_inx].clips;	
							var cur_drag_clip = clips[clip_inx];	
							
							//@@todo we could animate transformations later
							if(insert_key!='na' && insert_key!='end' ){						
								cur_drag_clip.order=insert_key-.5;							
							}else if (insert_key=='end'){
								cur_drag_clip.order=clips.length;
							}							
							//reorder array based on new order
							clips.sort(sort_func);
							function sort_func(a, b){								
								return a.order - b.order;
							}
							//assign keys back to order:
							for(k in clips){
								clips[k].order=k;
							}																												
							//redraw clips: 
							this_seq.render_tracks(track_inx);
						}
					});
					$j('#track_'+track_id+'_clip_'+j).resizable({		
						minWidth:10,
						maxWidth:6000,
						start: function(e,ui) {									
							//set border to red
							$j(this).css({'border':'solid thin red'});
							//fade In Time stats (end or start based on handle) 							
							//dragging east (adjusting end time) 	
							js_log( 'append to: '+ this.id);												
							$j('#' + this.id + ' > .mv_clip_stats').fadeIn("fast");
						},
						stop: function(e,ui) {
							//restore border
							$j(this).css('border', 'solid thin white');
							//remove stats
							var clip_drag = this;
							$j('#'+this.id+' > .mv_clip_stats').fadeOut("fast",function(){
								var id_parts = clip_drag.id.split('_');		
								var track_inx = id_parts[1];
								var clip_inx = id_parts[3];
								//update clip 
								this_seq.doEdit({
									type:this_seq.resize_mode,
									delta:this_seq.edit_delta,
									track_inx:track_inx,
									clip_inx:clip_inx})
								});							
						},
						resize: function(e,ui) {												
							//update time stats / render images: 
							this_seq.update_clip_resize(this);
						}		
					});
				}			
				$j('#container_track_'+track_id).width(Math.round(	this.timeline_duration / this.timeline_scale));
			}
		}
	},
	//renders clip frames
	render_clip_frames:function(clip, frame_offset_count){
		js_log('f:render_clip_frames: ' + clip.id + ' foc:' + frame_offset_count); 
		var clip_frames_html='';					
		var frame_width = Math.round(this.track_thumb_height*1.3333333);

		var pint = (frame_offset_count==null)?0:frame_offset_count*frame_width;		
		
		//js_log("pinit: "+ pint+ ' < '+clip.width_px+' ++'+frame_width);
		for(var p=pint;p<clip.width_px;p+=frame_width){								
			var clip_time = (p==0)?0:Math.round(p*this.timeline_scale);
			js_log('rendering clip frames: p:' +p+' '+ (p*this.timeline_scale)+' ' + clip_time);
			clip_frames_html+='<img src="'+clip.getClipImg(clip_time, 'icon')+'" ' +
				'height="'+this.track_thumb_height+'" ' +
				'width="'+frame_width+'">';
		}	
		//js_log('render_clip_frames:'+clip_frames_html);
		return clip_frames_html;
	},
	update_clip_resize:function(clip_element){
		//js_log('update_clip_resize');
		var this_seq = this;
		var id_parts = clip_element.id.split('_');		
		track_inx = id_parts[1];
		clip_inx = id_parts[3];
		//set clip:
		var clip = this.plObj.tracks[track_inx].clips[clip_inx];		
		var clip_desc ='';
		//would be nice if getting the width did not flicker the border
		//@@todo do a work around e in resize function has some screen based offset values
		clip.width_px = $j(clip_element).width();
		var width_dif = clip.width_px - Math.round( Math.round( clip.getDuration() )/this.timeline_scale);		
		//var left_px = $j(clip_element).css('left');
		
		var new_clip_dur = Math.round( clip.width_px*this.timeline_scale );
		var clip_dif = (new_clip_dur - clip.getDuration() );
		var clip_dif_str = (clip_dif >0)?'+'+clip_dif:clip_dif;
		//set the edit global delta
		this.edit_delta = clip_dif;
		
		//get new length: 
		clip_desc+='length: ' + seconds2ntp(new_clip_dur) +'('+clip_dif_str+')';	
		if(this_seq.resize_mode=='resize_end'){	
			//expanding right		
			var new_end = seconds2ntp(ntp2seconds(clip.embed.end_ntp)+clip_dif);
			clip_desc+='<br>end time: ' + new_end;		
			//also shift all the other clips (after the current) 
			//js_log("track_inx: " + track_inx + ' clip inx:'+clip_inx);
			//$j('#container_track_'+track_inx+' > .mv_clip_drag :gt('+clip_inx+')').each(function(){
			$j('#container_track_'+track_inx+' > :gt('+clip_inx+')').each(function(){
				var move_id_parts = this.id.split('_');	
				var move_clip = this_seq.plObj.tracks[move_id_parts[1]].clips[move_id_parts[3]];		
				//js_log('should move:'+ this.id);
				$j(this).css('left', move_clip.left_px + width_dif);
			});
		}else{
			//expanding left (resize_start)
			var new_start = seconds2ntp(ntp2seconds(clip.embed.start_ntp)+clip_dif);
			clip_desc+='<br>start time: ' + new_start;					
		}
		
		//update clip stats:
		$j('#'+clip_element.id+' > .mv_clip_stats').html(clip_desc);
		var frame_width = Math.round(this.track_thumb_height*1.3333333);
		//check if we need to append some images:
		var frame_count = $j('#'+clip_element.id+' > img').length;
		if(clip.width_px > (frame_count *  frame_width) ){
			//if dragging left append 
			js_log('width_px:'+clip.width_px+' framecount:'+frame_count+' Xcw='+(frame_count *  frame_width));
			$j('#'+clip_element.id).append(this.render_clip_frames(clip, frame_count));						
		}
		
	},
	//renders cnt_time
	render_head_jump:function(){
		//render out time stamps and time "jump" links 
		//first get total width
		
		//set width based on pixle to time and current length:
		pixle_length = Math.round(	this.timeline_duration / this.timeline_scale);
		$j('#'+this.timeline_id+'_head_jump').width(pixle_length);
		//output times every 50pixles 
		var out='';
		//output time-desc every 50pixles and jump links every 10 pixles
		var n=0;
		for(i=0;i<pixle_length;i+=10){
			out+='<div onclick="'+this.instance_name+'.jt('+i*this.timeline_scale+');"' +
					' style="z-index:2;position:absolute;left:'+i+'px;width:10px;height:20px;top:0px;"></div>';			
			if(n==0)				
				out+='<span style="position:absolute;left:'+i+'px;">|'+seconds2ntp(Math.round(i*this.timeline_scale))+'</span>';						
			n++;
			if(n==10)n=0;
		}	
		$j('#'+this.timeline_id+'_head_jump').html(out);
	},
	jt:function( jh_time ){
		js_log('jt:' + jh_time);
		var this_seq = this;
		this.playline_time = jh_time;
		js_log('time: ' + seconds2ntp(jh_time) + ' ' + Math.round(jh_time/this.timeline_scale));
		//render playline at given time
		$j('#'+this.timeline_id+'_playline').css('left', Math.round(jh_time/this.timeline_scale)+'px' );
		//@@ in the future this will render the state at that time point (combining tracks etc) 
		cur_pl_time=0;
		//update the thumb with the requested time: 		
		this.plObj.updateThumbTime( jh_time );		
	},
	//adjusts the current scale
	zoom_in:function(){
		this.timeline_scale = this.timeline_scale*.75;
		this.do_render_timeline();
		js_log('zoomed in:'+this.timeline_scale);
	},	
	zoom_out:function(){		
		this.timeline_scale = this.timeline_scale*(1+(1/3));
		this.do_render_timeline();
		js_log('zoom out: '+this.timeline_scale);
	},
	do_render_timeline:function(){		
		this.render_head_jump();
		this.render_tracks();
		this.jt(this.playline_time);
	}
		
}
/* extension to mvPlayList to support smil properties */
var mvSeqPlayList = function( element ){
	return this.init( element );
}
mvSeqPlayList.prototype = {
	init:function(element){
		var myPlObj = new mvPlayList(element);
		//inherit mvClip		
		for(method in myPlObj){			
			if(typeof this[method] != 'undefined' ){				
				this['parent_'+method]=myPlObj[method];				
			}else{		
				this[method] = myPlObj[method];
			}		
		}
		//do specific mods:(controls and title are managed by the sequencer)  
		this.pl_layout.title_bar_height=0;
		this.pl_layout.control_height=0;
	},
	//override renderDisplay
	renderDisplay:function(){
		//setup layout for title and dc_ clip container  
		$j(this).html('<div id="dc_'+this.id+'" style="width:'+this.width+'px;' +
				'height:'+(this.height)+'px;position:relative;" />');			
				
		this.setupClipDisplay();
	}
}
