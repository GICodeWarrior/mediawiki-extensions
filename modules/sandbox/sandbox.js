$(document).ready( function() {
	window.wikiDom = {
		'type': 'document',
		'children': [
			{
				'type': 'heading',
				'attributes': { 'level': 1 },
				'content': { 'text': 'Direct manipulation interface' }
			},
			{
				'type': 'paragraph',
				'content': {
					'text': 'In computer science, direct manipulation is a human-computer interaction style which involves continuous representation of objects of interest, and rapid, reversible, incremental actions and feedback. The intention is to allow a user to directly manipulate objects presented to them, using actions that correspond at least loosely to the physical world. An example of direct-manipulation is resizing a graphical shape, such as a rectangle, by dragging its corners or edges with a mouse.',
					'annotations': [
						{
							'type': 'link/internal',
							'data': {
								'title': 'Computer_science'
							},
							'range': {
								'start': 3,
								'end': 19
							}
						},
						{
							'type': 'link/internal',
							'data': {
								'title': 'Human-computer interaction'
							},
							'range': {
								'start': 46,
								'end': 72
							}
						}
					]
				}
			},
			{
				'type': 'paragraph',
				'content': { 'text': 'Having real-world metaphors for objects and actions can make it easier for a user to learn and use an interface (some might say that the interface is more natural or intuitive), and rapid, incremental feedback allows a user to make fewer errors and complete tasks in less time, because they can see the results of an action before completing the action, thus evaluating the output and compensating for mistakes.' }
			},
			{
				'type': 'paragraph',
				'content': {
					'text': 'The term was introduced by Ben Shneiderman in 1983 within the context of office applications and the desktop metaphor.  Individuals in academia and computer scientists doing research on future user interfaces often put as much or even more stress on tactile control and feedback, or sonic control and feedback than on the visual feedback given by most GUIs. As a result the term direct manipulation interface has been more widespread in these environments. ',
					'annotations': [
						{
							'type': 'link/internal',
							'data': {
								'title': 'Ben_Shneiderman'
							},
							'range': {
								'start': 27,
								'end': 42
							}
						},
						{
							'type': 'link/internal',
							'data': {
								'title': 'GUI'
							},
							'range': {
								'start': 352,
								'end': 356
							}
						},
						{
							'type': 'object/hook',
							'data': {
								'html': '<sup><small><a href="#">[1]</a></small></sup>'
							},
							'range': {
								'start': 118,
								'end': 119
							}
						},
						{
							'type': 'object/template',
							'data': {
								'html': '<sup><small>[<a href="#">citation needed</a>]</small></sup>'
							},
							'range': {
								'start': 456,
								'end': 457
							}
						}
					]
				}
			},
			{
				'type': 'heading',
				'attributes': { 'level': 2 },
				'content': { 'text': 'In contrast to WIMP/GUI interfaces' }
			},
			{
				'type': 'paragraph',
				'content': {
					'text': 'Direct manipulation is closely associated with interfaces that use windows, icons, menus, and a pointing device (WIMP GUI) as these almost always incorporate direct manipulation to at least some degree. However, direct manipulation should not be confused with these other terms, as it does not imply the use of windows or even graphical output. For example, direct manipulation concepts can be applied to interfaces for blind or vision-impaired users, using a combination of tactile and sonic devices and software.',
					'annotations': [
						{
							'type': 'link/internal',
							'data': {
								'title': 'WIMP_(computing)'
							},
							'range': {
								'start': 113,
								'end': 117
							}
						}
					]
				}
			},
			{
				'type': 'paragraph',
				'content': {
					'text': 'It is also possible to design a WIMP interface that intentionally does not make use of direct manipulation. For example, most versions of windowing interfaces (e.g. Microsoft Windows) allowed users to reposition a window by dragging it with the mouse, but would not continually redraw the complete window at intermediate positions during the drag. Instead, for example, a rectangular outline of the window might be drawn during the drag, with the complete window contents being redrawn only once the user had released the mouse button. This was necessary on older computers that lacked the memory and/or CPU power to quickly redraw data behind a window that was being dragged.',
					'annotations': [
						{
							'type': 'link/internal',
							'data': {
								'title': 'Microsoft_Windows'
							},
							'range': {
								'start': 165,
								'end': 182
							}
						}
					]
				}
			},
			{
				'type': 'pre',
				'content': { 'text': 'A lot of text goes here... and at some point it wraps.. A lot of text goes here... and at some point it wraps.. A lot of text goes here... and at some point it wraps.. A lot of text goes here... and at some point it wraps.. A lot of text goes here... and at some point it wraps..' }
			},
			{
				'type': 'heading',
				'attributes': { 'level': 1 },
				'content': {
					'text': 'This is a heading (level 1)',
					'annotations': [
						{
							'type': 'textStyle/italic',
							'range': {
								'start': 10,
								'end': 17
							}
						}
					]	
				}
			},
			{
				'type': 'heading',
				'attributes': { 'level': 2 },
				'content': {
					'text': 'This is a heading (level 2)',
					'annotations': [
						{
							'type': 'textStyle/italic',
							'range': {
								'start': 10,
								'end': 17
							}
						}
					]	
				}
			},
			{
				'type': 'heading',
				'attributes': { 'level': 3 },
				'content': {
					'text': 'This is a heading (level 3)',
					'annotations': [
						{
							'type': 'textStyle/italic',
							'range': {
								'start': 10,
								'end': 17
							}
						}
					]	
				}
			},
			{
				'type': 'heading',
				'attributes': { 'level': 4 },
				'content': {
					'text': 'This is a heading (level 4)',
					'annotations': [
						{
							'type': 'textStyle/italic',
							'range': {
								'start': 10,
								'end': 17
							}
						}
					]	
				}
			},
			{
				'type': 'heading',
				'attributes': { 'level': 5 },
				'content': {
					'text': 'This is a heading (level 5)',
					'annotations': [
						{
							'type': 'textStyle/italic',
							'range': {
								'start': 10,
								'end': 17
							}
						}
					]	
				}
			},
			{
				'type': 'heading',
				'attributes': { 'level': 6 },
				'content': {
					'text': 'This is a heading (level 6)',
					'annotations': [
						{
							'type': 'textStyle/italic',
							'range': {
								'start': 10,
								'end': 17
							}
						}
					]	
				}
			},
			{
				'type': 'paragraph',
				'content': {
					'text': 'In text display, line wrap is the feature of continuing on a new line when a line is full, such that each line fits in the viewable window, allowing text to be read from top to bottom without any horizontal scrolling.\nWord wrap is the additional feature of most text editors, word processors, and web browsers, of breaking lines between and not within words, except when a single word is longer than a line.',
					'annotations': [
						// 'In text display' should be bold
						{ 'type': 'textStyle/bold', 'range': { 'start': 0, 'end': 15 } },
						// 'line wrap' should be italic
						{ 'type': 'textStyle/italic', 'range': { 'start': 17, 'end': 26 } },
						// 'wrap is' should be a link to '#'
						{
							'type': 'link/external',
							'data': { 'href': '#' },
							'range': { 'start': 22, 'end': 29 }
						}
					]
				}
			},
			{
				'type': 'paragraph',
				'content': { 'text': 'Test 22' }
			},
			{
				'type': 'paragraph',
				'content': { 'text': 'Test 333' }
			},
			{
				'type': 'list',
				'children': [
					{
						'type': 'listItem',
						'attributes': {
							'styles': ['bullet']
						},
						'children' : [
							{
								'type': 'paragraph',
								'content': { 'text': 'Test 4444' }
							}
						]
					},
					{
						'type': 'listItem',
						'attributes': {
							'styles': ['bullet', 'bullet']
						},
						'children' : [
							{
								'type': 'paragraph',
								'content': { 'text': 'Test 55555' }
							}
						]
					},
					{
						'type': 'listItem',
						'attributes': {
							'styles': ['bullet', 'bullet', 'bullet']
						},
						'children' : [
							{
								'type': 'paragraph',
								'content': { 'text': 'Test 666666' }
							}
						]
					},
					{
						'type': 'listItem',
						'attributes': {
							'styles': ['number']
						},
						'children' : [
							{
								'type': 'paragraph',
								'content': { 'text': 'Test 7777777' }
							}
						]
					},
					{
						'type': 'listItem',
						'attributes': {
							'styles': ['number', 'number']
						},
						'children' : [
							{
								'type': 'paragraph',
								'content': { 'text': 'Test 88888888' }
							}
						]
					},
					{
						'type': 'listItem',
						'attributes': {
							'styles': ['term']
						},
						'children' : [
							{
								'type': 'paragraph',
								'content': { 'text': 'Test 999999999' }
							}
						]
					},
					{
						'type': 'listItem',
						'attributes': {
							'styles': ['definition']
						},
						'children' : [
							{
								'type': 'paragraph',
								'content': { 'text': 'Test 0000000000' }
							}
						]
					}
				]
			},
			{
				'type': 'table',
				'attributes': { 'html/style': 'width: 600px; border: solid 1px;' },
				'children': [
					{
						'type': 'tableRow',
						'children': [
							{
								'type': 'tableCell',
								'attributes': { 'html/style': 'border: solid 1px;' },
								'children': [
									{
										'type': 'paragraph',
										'content': { 'text': 'row 1 & cell 1' }
									},
									{
										'type': 'list',
										'children': [
											{
												'type': 'listItem',
												'attributes': {
													'styles': ['bullet']
												},
												'children' : [
													{
														'type': 'paragraph',
														'content': { 'text': 'Test 4444' }
													}
												]												
											},
											{
												'type': 'listItem',
												'attributes': {
													'styles': ['bullet', 'bullet']
												},
												'children' : [
													{
														'type': 'paragraph',
														'content': { 'text': 'Test 55555' }
													}
												]												
											},
											{
												'type': 'listItem',
												'attributes': {
													'styles': ['number']
												},
												'children' : [
													{
														'type': 'paragraph',
														'content': { 'text': 'Test 666666' }
													}
												]												
											}
										]
									}
								]
							},
							{
								'type': 'tableCell',
								'attributes': { 'html/style': 'border: solid 1px;' },
								'children': [
									{
										'type': 'paragraph',
										'content': { 'text': 'row 1 & cell 2' }
									}
								]
							}
						]
					}
				]
			}
		]
	};
	window.doc = es.DocumentModel.newFromPlainObject( window.wikiDom );
	window.surfaceModel = new es.SurfaceModel( window.doc );
	window.surfaceView = new es.SurfaceView( $( '#es-editor' ), window.surfaceModel );
	window.toolbarView = new es.ToolbarView( $( '#es-toolbar' ), window.surfaceView );

	/*
	var tools = {
		'textStyle/bold': $( '#es-toolbar-bold' ),
		'textStyle/italic': $( '#es-toolbar-italic' ),
		'link/internal': $( '#es-toolbar-link' )
	};
	surfaceView.on( 'select', function( range ) {
		for ( var key in tools ) {
			tools[key].removeClass( 'es-toolbarTool-down' );
		}
		var annotations = range.getLength() ?
			doc.getAnnotationsFromRange( range ) : doc.getAnnotationsFromOffset( range.start );
		if ( annotations.length ) {
			for ( var i = 0; i < annotations.length; i++ ) {
				if ( annotations[i].type in tools ) {
					tools[annotations[i].type].addClass( 'es-toolbarTool-down' );
				}
			}
		}
	} );
	*/
} );
