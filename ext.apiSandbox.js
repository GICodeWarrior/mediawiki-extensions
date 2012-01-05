jQuery( function( $ ) {
	/**
	 * Class that creates inputs for a query and builds request data
	 *
	 * Constructor
	 * @param $container {jQuery} Container to put UI into
	 * @param info {Object} Query information
	 * @param prefix {String} Additional prefix for parameter names
	 */
	function UiBuilder( $container, info, prefix, params ) {
		this.$container = $container;
		this.info = info;
		this.prefix = prefix + info.prefix;
		this.params = isset( params ) ? params : info.parameters;

		this.createInputs();
	}

	UiBuilder.prototype = {
		/**
		 * Creates inputs and places them into container
		 */
		createInputs: function() {
			var $table, i, length, param, name;

			$table = $( '<table class="api-sandbox-options">' );
			for ( i = 0, length = this.params.length; i < length; i += 1 ) {
				param = this.params[i];
				name = this.prefix + param.name;

				$( '<tr>' )
					.append(
						$( '<td class="api-sandbox-label">' )
							.html( mw.html.element( 'label',
								{ 'for': 'param-' + name }, name + '=' )
						)
					)
					.append( $( '<td class="api-sandbox-value">' ).html( this.input( param, name ) ) )
					.append( $( '<td>' ).html( smartEscape( param.description ) ) )
					.appendTo( $table );
			}
			this.$container.html( $table );
		},

		/**
		 * Adds module help to a container
		 * @param $container {jQuery} Container to  use
		 */
		setHelp: function( $container ) {
			var desc = smartEscape( this.info.description );
			if ( isset( this.info.helpurls ) && isset( this.info.helpurls[0] ) && this.info.helpurls[0] ) {
				desc = desc.replace( /^([^\r\n\.]*)/,
					mw.html.element( 'a', { 'target': '_blank', 'href': this.info.helpurls[0] }, '$1' )
				);
			}
			$container.html( desc );
		},

		input: function( param, name ) {
			var s,
				value = '';
			switch ( param.type ) {
				case 'limit':
					value = '10';
				case 'user':
				case 'timestamp':
				case 'integer':
				case 'string':
					s = mw.html.element( 'input', { 'class': 'api-sandbox-input', 'id': 'param-' + name, 'value': value } );
					break;
				case 'bool':
					param.type = 'boolean'; // normalisation for later use
				case 'boolean':
					s = mw.html.element( 'input', { 'id': 'param-' + name, 'type': 'checkbox' } );
					break;
				case 'namespace':
					param.type = namespaces;
				default:
					if ( typeof param.type == 'object' ) {
						var id = 'param-' + name,
							attributes = { 'id': id };
						if ( isset( param.multi ) ) {
							attributes.multiple = 'multiple';
							s = this.select( param.type, attributes, false );
						} else {
							s = this.select( param.type, attributes, true );
						}
					} else {
						s = mw.html.element( 'code', {}, mw.msg( 'parentheses', param.type ) );
					}
			}
			return s;
		},

		select: function( values, attributes, selected ) {
			var s = '', i, length, value, face, attrs;

			attributes['class'] = 'api-sandbox-input';
			if ( isset( attributes.multiple ) ) {
				attributes['size'] = Math.min( values.length, 10 );
			}
			if ( typeof selected != 'array' ) {
				if ( selected ) {
					s += mw.html.element( 'option', { value: '', selected: 'selected' }, mw.msg( 'apisb-select-value' ) );
				}
				selected = [];
			}

			for ( i = 0, length = values.length; i < length; i += 1 ) {
				value = typeof values[i] == 'object' ? values[i].key : values[i];
				face = typeof values[i] == 'object' ? values[i].value : values[i];
				attrs = { 'value': value };

				if ( $.inArray( value, selected ) >= 0 ) {
					attrs.selected = 'selected';
				}

				s += '\n' + mw.html.element( 'option', attrs, face );
			}
			s = mw.html.element( 'select', attributes, new mw.html.Raw( s ) );
			return s;
		},

		getRequestData: function() {
			var params = '', i, length, param, name, $node;
			for ( i = 0, length = this.params.length; i < length; i += 1 ) {
				param = this.params[i];
				name = this.prefix + param.name;
				$node = $( '#param-' + name );
				if ( param.type == 'boolean' ) {
					if ( $node.is( ':checked' ) ) {
						params += '&' + name;
					}
				} else {
					var value = $node.val();
					if ( !isset( value ) || value == '' || value == null ) {
						continue;
					}
					if ( $.isArray( value ) ) {
						value = value.join( '|' );
					}
					params += '&' + encodeURIComponent( name ) + '=' + encodeURIComponent( value );
				}
			}
			return params;
		}
	} // end of UiBuilder.prototype

	var $content = $( '#api-sandbox-content' );
	if ( !$content.length ) {
		return;
	}
	$content.show();

	// page elements
	var $format = $( '#api-sandbox-format' ),
	    $action = $( '#api-sandbox-action' ),
	    $query = $( '#api-sandbox-query' ),
	    $queryRow = $( '#api-sandbox-query-row' ),
	    $help = $( '#api-sandbox-help' ),
	    $mainContainer = $( '#api-sandbox-main-inputs' ),
		$genericContainer, // will be set later
		$generatorContainer = $( '#api-sandbox-generator-inputs' ),
		$queryContainer = $( '#api-sandbox-query-inputs' ),
		$generatorBox = $( '#api-sandbox-generator-parameters' ),
	    $submit = $( '#api-sandbox-submit' ),
	    $requestUrl = $( '#api-sandbox-url' ),
	    $requestPost = $( '#api-sandbox-post' ),
	    $output = $( '#api-sandbox-output' ),
	    $postRow = $( '#api-sandbox-post-row' );

	// UiBuilder objects
	var mainRequest,
		genericRequest,
		generatorRequest,
		queryRequest;

	// cached stuff
	var paramInfo = { modules: {}, querymodules: {} },
	    namespaces = [];

	// load namespaces
	$.getJSON( mw.util.wikiScript( 'api' ),
		{ format: 'json', action: 'query', meta: 'siteinfo', siprop: 'namespaces' },
		function( data ) {
			if ( isset( data.query ) && isset( data.query.namespaces ) ) {
				for ( var id in data.query.namespaces ) {
					if ( id < 0 ) {
						continue;
					}
					var ns = data.query.namespaces[id]['*'];
					if ( ns == '' ) {
						ns = mw.msg( 'apisb-ns-main' );
					}
					namespaces.push( { key: id, value: ns } );
				}
			} else {
				showLoadError( $mainContainer, 'apisb-namespaces-error' );
			}
		}
	);

	// load stuff we need from the beginning
	getParamInfo( { mainmodule: 1, pagesetmodule: 1, modules: 'query' },
		function() {},
		function() {
			paramInfo.mainmodule.parameters = paramInfo.mainmodule.parameters.slice( 2 ); // remove format and action
			paramInfo.modules.query.parameters = paramInfo.modules.query.parameters.slice( 3 );
			$genericContainer = $( '#api-sandbox-generic-inputs > div' );
			genericRequest = new UiBuilder( $genericContainer, paramInfo.mainmodule, '' );
			queryRequest = new UiBuilder( $queryContainer, paramInfo.modules.query, '',
				[].concat( paramInfo.modules.query.parameters, paramInfo.pagesetmodule.parameters )
			);
		},
		function() {}
	);

	$action.change( updateUI );
	$query.change( updateUI );

	$( '#param-generator' ).live( 'change', function() {
		var generator = $( '#param-generator' ).val();
		if ( generator == '' ) {
			$generatorBox.hide();
		} else {
			$generatorBox.show();
			getParamInfo( { querymodules: generator },
				function() { showLoading( $generatorContainer ); },
				function() {
					generatorRequest = new UiBuilder( $generatorContainer, paramInfo.querymodules[generator], 'g' );
				},
				function() {
					showLoadError( $generatorContainer, 'apisb-request-error' );
				}
			);
		}
	} );


	$( '#api-sandbox-form' ).submit( function( e ) {
		e.preventDefault();
		if ( !$submit.is( ':enabled' ) ) {
			return;
		}
		var url = mw.util.wikiScript( 'api' ) + '?action=' + $action.val(),
		    params = mainRequest.getRequestData(),
		    mustBePosted = isset( mainRequest.info.mustbeposted );
		if ( $action.val() == 'query' ) {
			url += '&' + $query.val();
			params += queryRequest.getRequestData();
		}
		url += '&format=' + $format.val();

		params += genericRequest.getRequestData();
		if ( $( '#param-generator' ).length &&  $( '#param-generator' ).val() != '' ) {
			params += generatorRequest.getRequestData();
		}

		showLoading( $output );
		if ( mustBePosted ) {
			$requestUrl.val( url );
			if ( params.length > 0 ) {
				params = params.substr( 1 ); // remove leading &
			}
			$requestPost.val( params );
			$postRow.show();
		} else {
			$requestUrl.val( url + params );
			$postRow.hide();
		}
		url = url.replace( /(&format=[^&]+)/, '$1fm' );
		var data = {
			url: url,
			data: params,
			dataType: 'text',
			type: mustBePosted ? 'POST' : 'GET',
			success: function( data ) {
				var match = data.match( /<pre>[\s\S]*<\/pre>/ );
				if ( $.isArray( match ) ) {
					data = match[0];
				} else {
					// some actions don't honor user-specified format
					data = '<pre>' + mw.html.escape( data ) + '</pre>';
				}
				$output.html( data );
			},
			error: function( jqXHR, textStatus, errorThrown ) {
				showLoadError( $output, 'apisb-request-error' );
			}
		};
		$.ajax( data );
	});

	/**
	 * Shamelessly borrowed from PHP
	 */
	function isset( x ) {
		return typeof x != 'undefined';
	}

	function showLoading( $element ) {
		$element.html(
			mw.html.element( 'img',
				{ src: mw.config.get( 'stylepath' ) + '/common/images/spinner.gif', alt: '' } )
			+ mw.html.escape( mw.msg( 'apisb-loading' ) ) );
	}

	function showLoadError( $element, message ) {
		$element.html( mw.html.element( 'span', { 'class': 'error' }, mw.msg( message ) ) );
	}

	function getParamInfo( what, loadCallback, completeCallback, errorCallback ) {
		var needed = {};
		for ( var param in what ) {
			if ( !isset( paramInfo[param] ) ) {
				needed[param] = what[param];
			} else if (typeof needed[param] == 'object' ) {
				for ( var subParam in param ) {
					if ( !isset( paramInfo[param][subParam] ) ) {
						needed[param][subParam] = what[param][subParam];
					}
				}
			} else {
				needed[param] = what[param];
			}
		}
		if ( $.isEmptyObject( needed ) ) {
			completeCallback();
		} else {
			loadCallback();
			needed.format = 'json';
			needed.action = 'paraminfo';
			$.getJSON(
				mw.util.wikiScript( 'api' ),
				needed,
				function( data ) {
					if ( data.error || !data.paraminfo ) {
						errorCallback();
						return;
					}
					for ( var prop in data.paraminfo ) {
						if ( !isset( paramInfo[prop] ) ) {
							paramInfo[prop] = data.paraminfo[prop];
						} else {
							for ( var i = 0; i < data.paraminfo[prop].length; i++ ) {
								var info = data.paraminfo[prop][i];
								if ( !paramInfo[prop][info.name] ) {
									paramInfo[prop][info.name] = info;
								}
							}
						}
					}
					completeCallback();
				}
			).error( errorCallback );
		}
	}

	function updateQueryInfo( action, query ) {
		var isQuery = action == 'query';
		if ( action == '-' || ( isQuery && query == '-' ) ) {
			$submit.attr( 'disabled', 'disabled' );
			return;
		}
		query = query.replace( /^.*=/, '' );
		var data = {};
		if (isQuery ) {
			data.querymodules = query;
		} else {
			data.modules = action;
		}
		getParamInfo( data,
			function() {
				showLoading( $mainContainer );
				$submit.attr( 'disabled', 'disabled' );
			},
			function() {
				var info;
				if ( isQuery ) {
					info = paramInfo.querymodules[query];
				} else {
					info = paramInfo.modules[action];
				}
				mainRequest = new UiBuilder( $mainContainer, info, '' );
				mainRequest.setHelp( $help );
				$submit.removeAttr( 'disabled' );
			},
			function() {
				$submit.removeAttr( 'disabled' );
				showLoadError( $mainContainer, 'apisb-load-error' );
			}
		);
	}

	/**
	 * HTML-escapes and pretty-formats an API description string
	 *
	 * @param s {String} String to escape
	 * @return {String}
	 */
	function smartEscape( s ) {
		if ( !s ) {
			return ''; // @todo: fully verify paraminfo output
		}
		s = mw.html.escape( s );
		if ( s.indexOf( '\n ' ) >= 0 ) {
			// turns *-bulleted list into a HTML list
			s = s.replace( /^(.*?)((?:\n\s+\*?[^\n]*)+)(.*?)$/m, '$1<ul>$2</ul>$3' ); // outer tags
			s = s.replace( /\n\s+\*?([^\n]*)/g, '\n<li>$1</li>' ); // <li> around bulleted lines
		}
		s = s.replace( /\n(?!<)/, '\n<br/>' );
		s = s.replace( /(?:https?:)?\/\/[^\s<>]+/g, function( s ) {
			// linkify URLs, input is already HTML-escaped above
			return '<a href="' + s + '">' + s + '</a>';
		} );
		return s;
	}

	/**
	 * Updates UI after basic query parameters have been changed
	 */
	function updateUI() {
		var a = $action.val(),
		    q = $query.val(),
		    isQuery = a == 'query';
		if ( isQuery ) {
			$queryRow.show();
			if ( q != '-' ) {
				$queryContainer.show();
			} else {
				$queryContainer.hide();
			}
		} else {
			$queryRow.hide();
			$queryContainer.hide();
		}
		$mainContainer.text( '' );
		$help.text( '' );
		updateQueryInfo( a, q );
		$generatorBox.hide();
	}

});
