/**
 * ***** BEGIN LICENSE BLOCK *****
 * This file is part of WikiSync.
 *
 * WikiSync is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * WikiSync is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with WikiSync; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 *
 * ***** END LICENSE BLOCK *****
 *
 * WikiSync allows an AJAX-based synchronization of revisions and files between
 * global wiki site and it's local mirror.
 *
 * To activate this extension :
 * * Create a new directory named WikiSync into the directory "extensions" of MediaWiki.
 * * Place the files from the extension archive there.
 * * Add this line at the end of your LocalSettings.php file :
 * require_once "$IP/extensions/WikiSync/WikiSync.php";
 *
 * @version 0.2.1
 * @link http://www.mediawiki.org/wiki/Extension:WikiSync
 * @author Dmitriy Sintsov <questpc@rambler.ru>
 * @addtogroup Extensions
 */

var WikiSync = {

	_WikiSync : '', // WikiSync context

	// by default, synchronize from remote to local
	directionToLocal : true,

	// address of source and destination wikis
	srcWikiRoot : '',
	dstWikiRoot : '',

	// revision ids of source wiki (dichotomy search)
	// note that all of these should be numbers, while API/callback parameters should be string
	srcFirstId : null, // very first revid
	srcLoId : null, // current first revid
	srcMidId : null, // current "middle" revid
	srcHiId : null, // current last revid
	srcLastId : null, // very last revid

	srcSyncId : null, // source revision to start exporting from into destination wiki

	// current "middle" revision of source wiki
	srcRev : null,

	// import token for destination wiki
	dstImportToken : '',

	// continuation revision id for exporting from source wiki into destination wiki
	xmlContinueStartId : null,

	syncPercents : null, // xml chunks transfer progress indicator
	filesPercents : null, // file transfer progress indicator

	// list of files to synchronize and their index
	syncFiles : false, // true, when files should be synched as well
	fileList : [],  // list of files in format of {'title':,'size':,'timestamp':}
	fileListIdx : 0, // current index of the list of files
	// currently _accumulated_ size of all files in fileList (counted in chunks, file by fule)
	fileListSize : 0,
	// currently accumulated offset (which is also a current size) of currently transferred file
	currFileOffset : 0,

	// {{{ remote login context
	remoteContext : {
		'wikiroot' : '', 
		'userid' : '',
		'username' : '',
		'logintoken' : '',
		'cookieprefix' : '',
		'sessionid' : ''
	},
	// }}}

	// result of AJAX call will be placed here (in JSON format)
	AJAXresult : {},

	// progress indicator min, max and current value
	iterations : {
		'curr' : 0,
		'min' : 0,
		'max' : 0
	},

	// localized UI messages
	localMessages : null,

	setLocalNames : function( localMessages ) {
		this.localMessages = localMessages;
	},

	formatMessage : function() {
		var formatted = this.localMessages[ arguments[0] ];
		var indexes = [];
		var pos;
		var j;
		// going in reverse order is very important for the next for loop to be correct
		for ( var i = arguments.length - 1; i > 0; i-- ) {
			if ( ( pos = formatted.indexOf( '$' + i ) ) !== -1 ) {
				indexes.push( pos );
			}
		}
		for ( i = 0; i < indexes.length; i++ ) {
			pos = indexes[i];
			j = formatted.charAt( pos + 1 );
			formatted = formatted.slice( 0, pos ) + arguments[j] + formatted.slice( pos + 2 );
		}
		return formatted;
	},

	mathLogBase : function( x, base ) {
		return Math.log( x ) / Math.log( base );
	},

	showIframe : function( url ) {
		var text = document.createTextNode( url );
		var locElem = document.getElementById( 'wikisync_iframe_location' );
		var iframe = document.getElementById( 'wikisync_iframe' );
		if ( locElem.firstChild === null ) {
			locElem.appendChild( text );
		} else {
			locElem.replaceChild( text, locElem.firstChild );
		}
		iframe.style.display = (url === '') ? 'none' : 'block';
		iframe.src = url;
	},

	log : function( s, color, type ) {
		var logContainer = document.getElementById( 'wikisync_remote_log' );
		var span = document.createElement( 'SPAN' );
		if ( typeof s === 'object' ) {
			s = JSON.stringify( s );
		}
		if ( typeof type !== 'undefined' ) {
			var b = document.createElement( 'B' );
			b.appendChild( document.createTextNode( type + ': ' ) );
			span.appendChild( b );
		}
		span.appendChild( document.createTextNode( s ) );
		if ( typeof color !== 'undefined' ) {
			span.style.color = color;
		}
		logContainer.appendChild( span );
		logContainer.appendChild( document.createElement( 'HR' ) );
		logContainer.scrollTop = logContainer.scrollHeight;
	},

	sourceLog : function( s, type ) {
		var t = 'source';
		if ( typeof type !== 'undefined' ) {
			t += ' ' + type;
		}
		this.log( s, 'teal', t );
	},

	destinationLog : function( s, type ) {
		var t = 'destination';
		if ( typeof type !== 'undefined' ) {
			t += ' ' + type;
		}
		this.log( s, 'maroon', t );
	},

	clearLog : function() {
		document.getElementById( 'wikisync_remote_log' ).innerHTML = '';
		return false;
	},

	error : function( s, type ) {
		if ( typeof type !== 'undefined' ) {
			this.log( s, 'red', type );
		} else {
			this.log( s, 'red' );
		}
	},

	setDirection : function( eventObj ) {
		eventObj.blur();
		if ( this.directionToLocal = !this.directionToLocal ) {
			eventObj.value = '<=';
		} else {
			eventObj.value = '=>';
		}
		return false;
	},

	setSyncFiles : function( eventObj ) {
		eventObj.blur();
		this.syncFiles = eventObj.checked;
		return false;
	},

	remoteRootChange : function( eventObj ) {
		var textNode = document.createTextNode( eventObj.value );
		var wrr = document.getElementById( 'wikisync_remote_root' );
		wrr.replaceChild( textNode , wrr.firstChild );
		return false;
	},

	submitRemoteLogin : function( form ) {
		this.remoteContext.wikiroot = form.remote_wiki_root.value;
		this.setSyncFiles( form.ws_sync_files );
		sajax_do_call( 'WikiSyncClient::remoteLogin',
			[this.remoteContext.wikiroot, form.remote_wiki_user.value, form.remote_wiki_pass.value],
			WikiSync.remoteLogin );
		return false;
	},

	/*
	 * initializes everything in remoteContext except of wikiroot
	 */
	setRemoteContext : function( login ) {
		this.remoteContext.userid = login.userid;
		this.remoteContext.username = login.username;
		this.remoteContext.logintoken = login.token;
		this.remoteContext.cookieprefix = login.cookieprefix;
		this.remoteContext.sessionid = login.sessionid;
	},

	getResponseError : function( request ) {
		return 'status=' + request.status + ', text=' + request.responseText;
	},

	/**
	 * enables or disables UI buttons
	 * arguments[0] - boolean true to disable selected buttons, false to enable
	 *     (every unlisted button will be set to _inverse_ value)
	 * arguments[1..n] - string list of buttons to set to arguments[0] value
	 */
	setButtons : function() {
		var set = arguments[0] === true;
		var ids = ['wikisync_submit_button', 'wikisync_direction_button', 'wikisync_synchronization_button', 'ws_sync_files' ];
		var button;
		for ( var i = 0; i < ids.length; i++ ) {
			var current = !set;
			for ( var j = 1; j < arguments.length; j++ ) {
				if ( arguments[j] === ids[i] ) {
					current = !current;
					break;
				}
			}
			button = document.getElementById( ids[i] );
			button.disabled = current;
		}
	},

	/*
	 * @param request.responsetext - login "final" response
	 */
	remoteLogin : function( request ) {
		// {{{ switch the context
		if ( typeof this._WikiSync === 'undefined' ) {
			return WikiSync.remoteLogin.call( WikiSync, request );
		}
		// switch the context }}}
		var syncButton = document.getElementById( 'wikisync_synchronization_button' );
		syncButton.disabled = true;
		if ( request.status != 200 ) {
			this.error( 'Invalid AJAX response from local wiki server in WikiSync.remoteLogin, ' + this.getResponseError( request ) );
			return;
		}
//		this.log( request.responseText );
		try {
			var loginResult = JSON.parse( request.responseText );
		} catch (e) {
			this.error( 'Local wiki server returned invalid JSON data in WikiSync.remoteLogin: '+e );
			return;
		}
		if ( loginResult.ws_status != '1' ) {
			this.error( loginResult.ws_code + ':' + loginResult.ws_msg );
			return;
		}
		// logged in
		this.log( loginResult.ws_msg );
		syncButton.disabled = false;
		this.setRemoteContext( loginResult );
	},

	retryAJAX : function( AJAXresult ) {
		return AJAXresult.ws_status != '1' &&
			confirm( this.formatMessage( 'last_op_error', AJAXresult.ws_code, AJAXresult.ws_msg ) )
	},

	_localAPIget : function( APIparams, operation ) {
		sajax_do_call( 'WikiSyncClient::localAPIget',
			[ JSON.stringify( APIparams ) ],
			function() {
				var r = WikiSync.getAJAXresult.call( WikiSync, arguments[0] );
				if ( (typeof r.ws_auto_retry !== 'undefined') || WikiSync.retryAJAX.call( WikiSync, r ) ) {
					r = null; // IE closure purge
					WikiSync.log( 'retrying last call to _localAPIget' );
					WikiSync._localAPIget.call( WikiSync, APIparams, operation );
					return;
				}
				WikiSync.AJAXresult[operation.opcode] = r;
				r = null; // IE closure purge
				WikiSync[operation.fname].call( WikiSync, operation );
			}
		);
	},

	/**
	 * call WikiSync client API method via AJAX
	 * @param method PHP method name
	 * @param clientParams params to pass to PHP client method
	 * @param operation callback in form { 'fname': , 'opcode', ... }  to call on AJAX event completion
	 */
	_wsAPI : function( method, clientParams, operation ) {
		sajax_do_call( 'WikiSyncClient::' + method,
			[ JSON.stringify( this.remoteContext ), JSON.stringify( clientParams ) ],
			function() {
				var r = WikiSync.getAJAXresult.call( WikiSync, arguments[0] );
				if ( (typeof r.ws_auto_retry !== 'undefined') || WikiSync.retryAJAX.call( WikiSync, r ) ) {
					r = null; // IE closure purge
					WikiSync.log( 'retrying last call to ' + method );
					WikiSync.wsAPI.call( WikiSync, method, clientParams, operation );
					return;
				}
				WikiSync.AJAXresult[operation.opcode] = r;
				r = null; // IE closure purge
				WikiSync[operation.fname].call( WikiSync, operation );
			}
		);
	},

	wsAPI : function( method, clientParams, operation ) {
		clientParams.direction_to_local = this.directionToLocal;
		this._wsAPI( method, clientParams, operation );
	},

	sourceAPIget : function( APIparams, operation ) {
		operation.opcode = 'src_'+operation.opcode;
		if ( this.directionToLocal ) {
			return this._wsAPI( 'remoteAPIget', APIparams, operation );
		} else {
			return this._localAPIget( APIparams, operation );
		}
	},

	destinationAPIget : function( APIparams, operation ) {
		operation.opcode = 'dst_' + operation.opcode;
		if ( this.directionToLocal ) {
			return this._localAPIget( APIparams, operation );
		} else {
			return this._wsAPI( 'remoteAPIget', APIparams, operation );
		}
	},

	/**
	 * parses and validates AJAX result
	 * always, even in case of error should return _parsed_ JSON
	 * @param request AJAX result
	 * @return parsed JSON result (JS nested object)
	 */
	getAJAXresult : function( request ) {
		var AJAXres = { 'ws_status' : '0', 'ws_code' : 'uninitialized', 'ws_msg' : 'uninitialized' };
		if ( request.status != 200 ) {
			AJAXres.ws_code = 'http';
			AJAXres.ws_msg = 'Request error ' + this.getResponseError( request );
			return AJAXres;
		}
//		this.log( 'getAJAXresult:' + request.responseText );
		try {
			AJAXres = JSON.parse( request.responseText );
		} catch (e) {
//			this.error( 'Local wiki server returned invalid JSON data in WikiSync.getAJAXresult: ' + request.responseText );
			AJAXres.ws_code = 'ajax';
			AJAXres.ws_msg = request.responseText;
		}
		return AJAXres;
	},

	/**
	 * scans this.AJAXresult whether AJAX events with
	 * assigned operation.opcode names got an response from server
	 * allows to check for multiple events at once, in case of concurrent AJAX calls
	 * @param arguments list of operation.opcode names
	 */
	isAJAXresult : function() {
		var found = 0;
		for ( var i = 0; i < arguments.length; i++ ) {
			if ( typeof this.AJAXresult[ arguments[i] ] !== 'undefined' ) {
				found++;
			}
		}
		return found == arguments.length;
	},

	errorDefaultAction : function() {
		this.syncPercents.reset();
		this.filesPercents.setVisibility( false );
		this.filesPercents.reset();
		this.showIframe( '' );
		// enable all but synchronization buttons
		this.setButtons( true, 'wikisync_synchronization_button' );
	},

	/**
	 * scans this.AJAXresult for unsuccessful events which have returned errors
	 * @return true, when there are errors; false otherwise
	 */
	assertAJAXerrors : function() {
		var result = false;
		for ( var key in this.AJAXresult ) {
			if ( this.AJAXresult[key].ws_status != '1' ) {
				this.error( this.AJAXresult[key].ws_code + ': ' + this.AJAXresult[key].ws_msg, key );
				delete this.AJAXresult[key];
				result = true;
			}
		}
		if ( result ) {
			this.errorDefaultAction();
		}
		return result;
	},

	/**
	 * "pops" AJAX event result in parsed JSON format (JS nested object)
	 * with selected operation.opcode from this.AJAXresult
	 * should be called only on successful results
	 * after the checking with assertAJAXerrors()
	 * @param key operation.opcode
	 * @param nested_props - an JS object "path" of nested properties to return
	 * @return JS nested object (in parsed JSON format)
	 */
	popAJAXresult : function( key, nested_props ) {
		var r = this.AJAXresult[key];
		// remote event from the list
		delete this.AJAXresult[key];
		if ( typeof nested_props === 'undefined' ) {
			return r;
		}
		if ( typeof nested_props === 'string' ) {
			return r[nested_props];
		}
		for ( var i = 0; i < nested_props.length; i++ ) {
			r = r[nested_props[i]];
		}
		return r;
	},

	getImportToken : function( operation ) {
		if ( typeof operation === 'undefined' || typeof operation.opcode === 'undefined' ) {
			this.error( 'Bug: No operation.opcode in WikiSync.getImportToken' );
			return;
		}
		switch ( operation.opcode ) {
		case 'start' :
			// get sample page title for token importing
			var APIparams = {
				'action' : 'query',
				'format' : 'json',
				'list' : 'allpages',
				'aplimit' : '1'
			};
			var params = {
				'fname' : 'getImportToken',
				'opcode' : 'get_import_token'
			};
			if ( typeof operation.next_title !== 'undefined' ) {
				if ( operation.next_title === '{}' ) {
					this.error( 'Cannot get valid title for import token' );
					return;
				}
				APIparams.apfrom = operation.next_title;
			}
			// will fire AJAX event 'dst_get_import_token' (based on params)
			this.destinationAPIget( APIparams, params );
			return;
		case 'dst_get_import_token' :
			// get import token for destination wiki
			this.destinationLog( this.AJAXresult[operation.opcode] );
			if ( this.assertAJAXerrors() ) { return; /* there were AJAX errors, no go */ }
			var result = this.popAJAXresult( operation.opcode );
			var sampleTitle = result.query.allpages[0].title;
			var nextTitle = '{}';
			if ( typeof result['query-continue'] !== 'undefined' ) {
				nextTitle = result['query-continue'].allpages.apfrom;
			}
			this.destinationLog( sampleTitle, 'sample title' );
			var APIparams = {
				'action' : 'query',
				'format' : 'json',
				'prop' : 'info',
				'intoken' : 'import',
				'titles' : sampleTitle
			};
			var params = {
				'fname' : 'getImportToken',
				'opcode' : 'set_import_token',
				'next_title' : nextTitle
			};
			// will fire AJAX event 'dst_set_import_token' (based on params)
			this.destinationAPIget( APIparams, params );
			return;
		case 'dst_set_import_token' :
			// set import token for destination wiki
			this.destinationLog( this.AJAXresult[operation.opcode] );
			if ( this.assertAJAXerrors() ) { return; /* there were AJAX errors, no go */ }
			var result = this.popAJAXresult( operation.opcode );
			var pages = result.query.pages;
			for ( var i in pages ) {
				if ( typeof pages[i].importtoken === 'undefined' ) {
					if ( typeof pages[i].invalid !== 'undefined' ) {
						// current title is invalid thus offers no token, try next title
						var params = {
							'opcode': 'start',
							'next_title': operation.next_title
						};
						this.getImportToken( params );
						return;
					}
					this.error( 'Cannot get import token for destination wiki' );
					return;
				}
				this.dstImportToken = pages[i].importtoken;
				break;
			}
			if ( typeof result.warnings !== 'undefined' ) {
				this.error( result.warnings );
				return;
			}
			this.destinationLog( this.dstImportToken, 'import token' );
			var params = {
				'fname' : 'synchronize',
				'opcode' : 'xml_chunk',
				'startid' : '' + this.srcSyncId
			};
			this.syncPercents.display( { 'desc' : this.formatMessage( 'revision', this.srcSyncId ), 'curr' : this.srcSyncId, 'min' : this.srcSyncId, 'max' : this.srcLastId } );
			this.synchronize( params );
			return;
		}
	},

	/**
	 * transfer one file in blocks of specified length
	 */
	transferFile : function( operation ) {
		if ( typeof operation === 'undefined' || typeof operation.opcode === 'undefined' ) {
			this.error( 'Bug: No operation.opcode in WikiSync.transferFile' );
			return;
		}
		switch ( operation.opcode ) {
		case 'start_upload' :
			this.currFileOffset = 0;
			if ( typeof operation.file_idx !== 'undefined' ) {
				this.fileListIdx = operation.file_idx;
			}
			// set progress title
			this.filesPercents.display( { 'desc' : this.fileList[this.fileListIdx].title } );
			this.transferFile( { 'opcode' : 'get_block', 'offset' : 0 } );
			return;
		case 'get_block' :
			// transfer the files, one by one, in chunks
			if ( typeof operation.offset !== 'undefined' ) {
				this.currFileOffset = operation.offset;
			}
			var clientParams = {
				'title' : this.fileList[this.fileListIdx].title,
				'timestamp' : this.fileList[this.fileListIdx].timestamp, // timestamp of requested archived file
				'offset' : this.currFileOffset, // chunk's start position
				// please do not use larger blocklen value because it can cause php memory exhaust errors and timeouts
				'blocklen' : 1024 * 1024
			};
			var nextOp = {
				'fname' : 'transferFile',
				'opcode' : 'file_block_result',
			};
			this.wsAPI( 'transferFileBlock', clientParams, nextOp );
			return;
		case 'file_block_result' :
			this.log( this.AJAXresult[operation.opcode] );
			if ( this.assertAJAXerrors() ) { return; /* there were AJAX errors, no go */ }
			var result = this.popAJAXresult( operation.opcode );
			this.currFileOffset += result.numread;
			this.fileListSize += result.numread;
			// set progress current position
			this.filesPercents.display( { 'curr' : this.fileListSize } );
			if ( typeof result.done === 'undefined' ) {
				// transfer next chunk
				this.transferFile( { 'opcode' : 'get_block' } );
				return;
			}
			// all the chunks of current file were transferred succesfully, upload the file
			var clientParams = {
				'file_name' : result.chunk_fname,
				'file_timestamp' : this.fileList[this.fileListIdx].timestamp,
				'file_size' : this.fileList[this.fileListIdx].size // simple bugcheck for temporary file consistency
			};
			var nextOp = {
				'fname' : 'transferFile',
				'opcode' : 'local_upload_result',
			};
			this.wsAPI( 'uploadLocalFile', clientParams, nextOp );
			return;
		case 'local_upload_result' :
			this.log( this.AJAXresult[operation.opcode] );
			if ( this.assertAJAXerrors() ) { return; /* there were AJAX errors, no go */ }
			var result = this.popAJAXresult( operation.opcode );
			// simple bugcheck for temporary file consistency
			if ( result.tmp_file_size !== this.fileList[this.fileListIdx].size ) {
				alert( this.formatMessage( 'file_size_mismatch', result.chunk_fpath, result.tmp_file_size, this.fileList[this.fileListIdx].size, this.fileList[this.fileListIdx].title ) );
			}
			this.fileListIdx++;
			if ( this.fileListIdx >= this.fileList.length ) {
				// the file list is over; try to synchronize next xml chunk
				if ( this.xmlContinueStartId === null ) {
					// synchronization is complete
					this.synchronize( { 'opcode' : 'success' } );
					return;
				}
				var nextOp = {
					'fname' : 'synchronize',
					'opcode' : 'xml_chunk',
					'startid' : '' + this.xmlContinueStartId
				};
				this.synchronize( nextOp );
				return;
			}
			// upload next file in the list
			this.transferFile( { 'opcode' : 'start_upload' } );
			return;
		}
	},

	/**
	 * update new files currently available in chunk (if any)
	 */
	updateNewFiles : function( operation ) {
		if ( typeof operation === 'undefined' || typeof operation.opcode === 'undefined' ) {
			this.error( 'Bug: No operation.opcode in WikiSync.updateNewFiles' );
			return;
		}
		switch ( operation.opcode ) {
		case 'new_files_result' :
			this.log( this.AJAXresult[operation.opcode] );
			if ( this.assertAJAXerrors() ) { return; /* there were AJAX errors, no go */ }
			var result = this.popAJAXresult( operation.opcode );
			// fileList will contain the list of only new files in chunk (which has to be updated)
			this.fileList = [];
			if ( typeof result.new_files === 'undefined' ) {
				// no files to update
				if ( this.xmlContinueStartId === null ) {
					// synchronization is complete
					this.synchronize( { 'opcode' : 'success' } );
					return;
				}
				// try to synchronize next chunk
				var params = {
					'fname' : 'synchronize',
					'opcode' : 'xml_chunk',
					'startid' : '' + this.xmlContinueStartId
				};
				this.synchronize( params );
				return;
			}
			this.fileList = result.new_files;
			this.fileListSize = 0;
			// total size of all files in the list, used for progress indicator
			var fileListTotalSize = 0;
			for ( var i = 0; i < this.fileList.length; i++ ) {
				fileListTotalSize += this.fileList[i].size;
			}
			this.filesPercents.setVisibility( true );
			// set progress dimenstions
			this.filesPercents.display( { 'curr' : 0, 'min' : 0, 'max' : fileListTotalSize } );
			this.transferFile( { 'opcode' : 'start_upload', 'file_idx': 0 } );
			return;
		}
	},

	/**
	 * synchronize xml chunks in blocks (optionally with passing through file update)
	 */
	synchronize : function( operation ) {
		if ( typeof operation === 'undefined' || typeof operation.opcode === 'undefined' ) {
			this.error( 'Bug: No operation.opcode in WikiSync.synchronize' );
			return;
		}
		switch ( operation.opcode ) {
		case 'start' :
			this.srcSyncId = operation.revid;
			this.showIframe( this.srcWikiRoot + '/index.php?oldid=' + operation.revid );
			if ( !confirm( this.formatMessage( 'synchronization_confirmation', this.srcWikiRoot, this.dstWikiRoot, operation.revid ) ) ) {
				this.log( 'Operation was cancelled' );
				this.syncPercents.reset();
				// enable all buttons
				this.setButtons( true );
				return;
			}
			this.getImportToken( operation ); // will use operation.opcode : 'start'
			this.log( 'Trying to synchronize from revision ' + operation.revid );
			return;
		case 'xml_chunk' :
			var clientParams = {
				'startid' : parseInt( operation.startid ),
				// please do not use larger value because it can cause memory exhaust errors and php timeouts
				'limit' : 10,
				'dst_import_token' : this.dstImportToken
			};
			var nextOp = {
				'fname' : 'synchronize',
				'opcode' : 'xml_chunk_result'
			};
			this.syncPercents.display( { 'desc' : this.formatMessage( 'revision', operation.startid ), 'curr' : operation.startid } );
			this.wsAPI( 'syncXMLchunk', clientParams, nextOp );
			return;
		case 'xml_chunk_result' :
			/* recieve source or destination revisions list (single) */
			this.log( this.AJAXresult[operation.opcode] );
			if ( this.assertAJAXerrors() ) { return; /* there were AJAX errors, no go */ }
			var result = this.popAJAXresult( operation.opcode );
			this.xmlContinueStartId = (typeof result.ws_continue_startid) === 'undefined' ? null : result.ws_continue_startid;
			if ( this.xmlContinueStartId === null ) {
				this.syncPercents.display( { 'desc' : '', 'curr' : 'max' } );
			}
			if ( this.syncFiles && typeof result.files !== 'undefined' ) {
				var clientParams = {
					// result.files contains the list of all chunk files (some might be already updated)
					'chunk_files' : result.files
				};
				var nextOp = {
					'fname' : 'updateNewFiles',
					'opcode' : 'new_files_result'
				};
				this.wsAPI( 'findNewFiles', clientParams, nextOp );
				return;
			}
			if ( this.xmlContinueStartId === null ) {
				// synchronization is complete
				this.synchronize( { 'opcode' : 'success' } );
				return;
			}
			// try to synchronize next chunk
			var params = {
				'fname' : 'synchronize',
				'opcode' : 'xml_chunk',
				'startid' : '' + this.xmlContinueStartId
			};
			this.synchronize( params );
			return;
		case 'success' :
			this.filesPercents.setVisibility( false );
			this.syncPercents.display( { 'desc' : '', 'curr' : 'max' } );
			alert( this.formatMessage( 'synchronization_success' ) );
			// enable all buttons
			this.setButtons( true );
			return;
		}
	},

	/**
	 * find least common revid in destination wiki taken from source wiki via binary search
	 */
	findCommonRev : function( operation ) {
		if ( typeof operation === 'undefined' || typeof operation.opcode === 'undefined' ) {
			this.error( 'Bug: No operation.opcode in WikiSync.findCommonRev' );
			return;
		}
		switch ( operation.opcode ) {
		case 'start' :
			var len = this.srcHiId - this.srcLoId;
			var center = (len > 1) ? ( len ) / 2 : 1;
			this.srcMidId = Math.floor( this.srcLoId + center );
			var eventCbParams = {
				'fname' : 'getSrcRev',
				'opcode' : 'start',
				'dir' : 'newer', // look-up top
				'startid' : '' + this.srcMidId
			};
			this.getSrcRev( eventCbParams );
			return;
		case 'search_in_dst' :
			// look for match of this.srcRev in destination wiki
			var APIparams = {
				'action' : 'similarrev',
				'format' : 'json',
				'limit' : '100',
				'usertext' : this.srcRev.usertext,
				'timestamp' : this.srcRev.timestamp,
			};
			var eventCbParams = {
				'fname' : 'findCommonRev',
				'opcode' : 'search_results',
				'textlen' : '' + this.srcRev.textlen
			};
			this.destinationAPIget( APIparams, eventCbParams );
			return;
		case 'dst_search_results' :
			/* recieve source "middle" revision search results */
			this.destinationLog( this.AJAXresult[operation.opcode], 'search results' );
			if ( this.assertAJAXerrors() ) { return; /* there were AJAX errors, no go */ }
			var dstRevs = this.popAJAXresult( operation.opcode, ['query', 'similarrev'] );
			// also look for matching source textlen in destination wiki (for a better match and less probability of screw-up)
			var matches = 0;
			for ( var i = 0; i < dstRevs.length; i++ ) {
				if ( dstRevs[i].textlen === operation.textlen ) {
					matches++;
				}
			}
			var prevLen = this.srcHiId - this.srcLoId;
			this.syncPercents.display( { 'curr' : 'next' } );
			if ( matches > 0 ) {
				if ( matches > 1 ) {
					this.destinationLog( 'Warning: more than one match for source revision id' );
				}
				// source "middle" revision has a match in destination wiki, look-up top
				this.srcLoId = this.srcMidId;
			} else {
				// source "middle" revision has no match in destination wiki, look-up bottom
				this.srcHiId = this.srcMidId;
			}
			var currLen = this.srcHiId - this.srcLoId;
			if ( currLen <= 0 || prevLen === currLen ) {
				// binary search is complete
				this.syncPercents.display( { 'desc' : '', 'curr' : 'max' } );
				if ( this.srcHiId === this.srcLastId && matches > 0 ) {
					alert( this.formatMessage( 'already_synchronized' ) );
					// enable all buttons
					this.setButtons( true );
					return;
				}
				this.log( 'Synchronizing from ' + this.srcHiId );
				this.synchronize( { 'opcode' : 'start', 'revid' : '' + this.srcHiId } );
				return;
			}
			var eventCbParams = {
				'fname' : 'findCommonRev',
				'opcode' : 'start'
			};
			this.findCommonRev( eventCbParams );
			return;
		}
	},

	/**
	 * get (last and first in parallel) or any single (with top or down look-up) source wiki revision ids
	 */
	getSrcRev : function( operation ) {
		if ( typeof operation === 'undefined' || typeof operation.opcode === 'undefined' ) {
			this.error( 'Bug: No operation.opcode in WikiSync.getSrcRev' );
			return;
		}
		switch ( operation.opcode ) {
		case 'start' :
			var APIparams = {
				'action' : 'revisionhistory',
				'format' : 'json',
				'dir' : 'older',
				'limit' : '1'
			};
			var eventCbParams = {
				'fname': 'getSrcRev',
				'opcode': 'rev'
			};
			if ( typeof operation.dir !== 'undefined' ) {
				APIparams.dir = operation.dir;
			}
			if ( typeof operation.startid !== 'undefined' ) {
				// start from selected revision instead of first / last one
				APIparams.startid = operation.startid;
				eventCbParams.startid = operation.startid;
				// look up down or top
				eventCbParams.opcode += APIparams.dir == 'older' ? '_down' : '_top';
			} else {
				// will get first and last revisions in parallel
				eventCbParams.opcode += APIparams.dir === 'older' ? '_last' : '_first';
			}
			this.sourceAPIget( APIparams, eventCbParams );
			return;
		case 'src_rev_down' :
		case 'src_rev_top' :
			/* recieve single source revision  (top or down look-up) */
			this.sourceLog( this.AJAXresult[operation.opcode] );
			if ( this.assertAJAXerrors() ) { return; /* there were AJAX errors, no go */ }
			this.srcRev = this.popAJAXresult( operation.opcode, ['query', 'revisionhistory', 0] );
			var correctedId = parseInt( this.srcRev.revid );
			if ( this.srcMidId !== correctedId ) {
				this.sourceLog( 'Warning: closest match for calculated source revid = ' + this.srcMidId + ' is actual revid = ' + correctedId );
			}
			// this possible correction requires additional check when binary search is complete
			this.srcMidId = correctedId;
			this.findCommonRev( { 'opcode' : 'search_in_dst' } );
			return;
		case 'src_rev_first' :
		case 'src_rev_last' :
			/* recieve source and destination revisions lists (both) */
			if ( !this.isAJAXresult( 'src_rev_first', 'src_rev_last' ) ) { return; /* not all of fired AJAX events are completed */ }
			this.sourceLog( this.AJAXresult['src_rev_first'], 'first revision' );
			this.sourceLog( this.AJAXresult['src_rev_last'], 'last revision' );
			if ( this.assertAJAXerrors() ) { return; /* there were AJAX errors, no go */ }
			this.srcFirstId = this.srcLoId = parseInt( this.popAJAXresult( 'src_rev_first', ['query', 'revisionhistory', 0, 'revid'] ) );
			this.srcLastId = this.srcHiId = parseInt( this.popAJAXresult( 'src_rev_last', ['query', 'revisionhistory', 0, 'revid'] ) );
			// uncomment next line for "live" debugging
			// this.srcLastId = this.srcHiId = 75054;
			this.syncPercents.display( { 'desc' : this.localMessages['diff_search'], 'curr' : 0, 'min' : 0, 'max' : Math.ceil( this.mathLogBase( this.srcLastId - this.srcFirstId, 2 ) ) } );
			this.findCommonRev( { 'opcode' : 'start' } );
			return;
		}
	},

	/**
	 * "Synchronize" button click handler
	 */
	process : function() {
		if ( wgServer.indexOf( this.remoteContext.wikiroot ) !== -1 ||
				this.remoteContext.wikiroot.indexOf( wgServer ) !== -1 ) {
			alert( this.formatMessage( 'sync_to_itself' ) );
			return;
		}
		// setup direction of synchronization
		if ( this.directionToLocal ) {
			this.srcWikiRoot = this.remoteContext.wikiroot;
			this.dstWikiRoot = wgServer;
		} else {
			this.srcWikiRoot = wgServer;
			this.dstWikiRoot = this.remoteContext.wikiroot;
		}
		// disable all buttons
		this.setButtons( false );
		this.syncPercents.setVisibility( true );
		/* get first and last source revision in parallel */
		this.getSrcRev( { 'opcode' : 'start' } );
		this.getSrcRev( { 'opcode' : 'start', 'dir' : 'newer' } );
		return false;
	},

	onloadHandler : function() {
		// {{{ switch the context
		if ( typeof this._WikiSync === 'undefined' ) {
			return WikiSync.onloadHandler.call( WikiSync );
		}
		// }}}
		this.syncPercents = new WikiSyncPercentsIndicator( 'wikisync_xml_percents' );
		this.filesPercents = new WikiSyncPercentsIndicator( 'wikisync_files_percents' );
		this.syncPercents.setVisibility( false );
		this.filesPercents.setVisibility( false );
		this.showIframe( '' );
		this.errorDefaultAction();
	}

}
