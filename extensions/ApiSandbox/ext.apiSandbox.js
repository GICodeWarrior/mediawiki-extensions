$( document ).ready( function() {
	var content = $( '#api-sandbox-content' );
	if ( !content.length ) {
		return;
	}
	content.show();	

	var action = $( '#api-sandbox-action' );
	var prop = $( '#api-sandbox-prop' );
	var propRow = $( '#api-sandbox-prop-row' );
	var help = $( '#api-sandbox-help' );
	var further = $( '#api-sandbox-further-inputs' );
	var actionCache = [];
	var propCache = [];
	var namespaces = [];

	// load namespaces
	$.getJSON( mw.config.get( 'wgScriptPath' ) + '/api' + mw.config.get( 'wgScriptExtension' ),
		{ format: 'json', action: 'query', meta: 'siteinfo', siprop: 'namespaces' },
		function( data ) {
			if ( isset( data.query ) && isset( data.query.namespaces ) ) {
				for ( var id in data.query.namespaces ) {
					var ns = data.query.namespaces[id]['*'];
					if ( ns == '' ) {
						ns = mw.msg( 'apisb-ns-main' );
					}
					namespaces.push( { key: id, value: ns } );
				}
			} else {
				showLoadError( further, 'apisb-namespaces-error' );
			}
		}
	);

	function isset( x ) {
		return typeof x != 'undefined';
	}

	function showLoading( element ) {
		element.html( mw.msg( 'apisb-loading' ) ); // @todo:
	}

	function showLoadError( element, message ) {
		element.html( mw.html.element( 'span', { 'class': 'error' }, mw.msg( message ) ) );
	}

	function parseParamInfo( data ) {
		further.text( '' );
		if ( !isset( data.paraminfo ) 
			|| ( !isset( data.paraminfo.modules ) && !isset( data.paraminfo.querymodules ) )
			)
		{
			showLoadError( further, 'apisb-load-error' );
			return;
		}
		if ( isset( data.paraminfo.modules ) ) {
			actionCache[data.paraminfo.modules[0].name] = data.paraminfo.modules[0];
			createInputs( actionCache[data.paraminfo.modules[0].name] );
		} else {
			propCache[data.paraminfo.querymodules[0].name] = data.paraminfo.querymodules[0];
			createInputs( propCache[data.paraminfo.querymodules[0].name] );
		}
	}

	function getQueryInfo( action, prop ) {
		var isQuery = action == 'query';
		if ( action == '-' || ( isQuery && prop == '-' ) ) {
			return;
		}
		var cached;
		if ( isQuery ) {
			cached = propCache[prop];
		} else {
			cached = actionCache[action];
		}
		if ( typeof cached != 'object' ) { // stupid FF adds watch() everywhere
			showLoading( further );
			var data = {
				format: 'json',
				action: 'paraminfo',
			};
			if (isQuery ) {
				data.querymodules = prop;
			} else {
				data.modules = action;
			}
			$.getJSON(
				mw.config.get( 'wgScriptPath' ) + '/api' + mw.config.get( 'wgScriptExtension' ),
				data,
				parseParamInfo
			);
		} else {
			createInputs( cached );
		}
	}

	function smartEscape( s ) {
		s = mw.html.escape( s );
		if ( s.indexOf( '\n ' ) >= 0 ) {
			s = s.replace( /^(.*?)((?:\n\s+\*?[^\n]*)+)(.*?)$/m, '$1<ul>$2</ul>$3' );
			s = s.replace( /\n\s+\*?([^\n]*)/g, '\n<li>$1</li>' );
		}
		s = s.replace( /\n(?!<)/, '\n<br/>' );
		return s;
	}

	function createInputs( info ) {
		help.html( smartEscape( info.description ) );
		var s = '<table class="api-sandbox-options">\n<tbody>';
		for ( var i = 0; i < info.parameters.length; i++ ) {
			var param = info.parameters[i];
			var name = info.prefix + param.name;

			s += '<tr><td class="api-sandbox-label"><label for="param-' + name + '">' + name + '=</label></td>'
				+ '<td class="api-sandbox-value">' + input( param, name )
				+ '</td><td>' + smartEscape( param.description ) + '</td></tr>';
		}
		s += '\n</tbody>\n</table>\n';
		further.html( s );
	}

	function input( param, name ) {
		var s = param.type;
		var value = '';
		switch ( param.type ) {
			case 'limit':
				value = 10;
			case 'user':
			case 'timestamp':
			case 'integer':
			case 'string':
				s = '<input class="api-sandbox-input" id="param-' + name + '" value="' + value + '"/>';
				break;
			case 'bool':
			case 'boolean':
				s = '<input id="param-' + name + '" type="checkbox"/>';
				break;
			case 'namespace':
				param.type = namespaces;
			default:
				if ( typeof param.type == 'object' ) {
					var id = 'param-' + name;
					var attributes = { 'id': id };
					if ( isset( param.multi ) ) {
						attributes.multiple = 'multiple';
						s = select( param.type, attributes, false );
					} else {
						s = select( param.type, attributes, true );
					}
				}
		}
		return s;
	}

	function select( values, attributes, selected ) {
		attributes['class'] = 'api-sandbox-input';
		if ( isset( attributes.multiple ) ) {
			attributes['size'] = values.length.toString();
		}
		var s = '';
		if ( typeof selected != 'array' ) {
			if ( selected ) {
				s += mw.html.element( 'option', { value: '', selected: 'selected' }, mw.msg( 'apisb-select-value' ) );
			}
			selected = [];
		}
		for ( var i = 0; i < values.length; i++ ) {
			var value = typeof values[i] == 'object' ? values[i].key : values[i];
			var face = typeof values[i] == 'object' ? values[i].value : values[i];
			var attrs = { 'value': value };
			if ( $.inArray( value, selected ) >= 0 ) {
				attrs.selected = 'selected';
			}
			s += '\n' + mw.html.element( 'option', attrs, face );
		}
		s = mw.html.element( 'select', attributes, new mw.html.Raw( s ) );
		return s;
	}
	
	function updateBasics() {
		var a = action.val();
		var p = prop.val();
		var isQuery = a == 'query';
		if ( isQuery ) {
			propRow.show();
		} else {
			propRow.hide();
		}
		further.text( '' );
		help.text( '' );
		getQueryInfo( a, p );
	}

	action.change( updateBasics );
	prop.change( updateBasics );
	

});