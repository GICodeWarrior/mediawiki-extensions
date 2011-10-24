$(document).ready( function() {
	var doc = es.DocumentModel.newFromPlainObject( {
		'type': 'document',
		'children': [
		{
			'type': 'heading',
			'attributes': { 'level': 1 },
			'content': {
				'text': 'This is a heading (level 1)',
				'annotations': [
					{
						'type': 'italic',
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
						'type': 'italic',
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
						'type': 'italic',
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
						'type': 'italic',
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
						'type': 'italic',
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
						'type': 'italic',
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
					{ 'type': 'bold', 'range': { 'start': 0, 'end': 15 } },
					// 'line wrap' should be italic
					{ 'type': 'italic', 'range': { 'start': 17, 'end': 26 } },
					// 'wrap is' should be a link to '#'
					{
						'type': 'xlink',
						'data': { 'href': '#' },
						'range': { 'start': 22, 'end': 29 }
					}
				]
			}
		},
		{
			'type': 'paragraph',
			'content': {
				'text': 'It is usually done on the fly when viewing or printing a document, so no line break code is manually entered, or stored.  If the user changes the margins, the editor will either automatically reposition the line breaks to ensure that all the text will "flow" within the margins and remain visible, or provide the typist some convenient way to reposition the line breaks.\nA soft return is the break resulting from line wrap or word wrap, whereas a hard return is an intentional break, creating a new paragraph.',
				'annotations': [
					// '[citation needed]' should be super
					{
						'type': 'template',
						'data': {
							'html': '<sup><small><a href="#">[citation needed]</a></small></sup>'
						},
						'range': { 'start': 120, 'end': 121 }
					}
				]
			}
		},
		{
			'type': 'paragraph',
			'content': { 'text': 'The soft returns are usually placed after the ends of complete words, or after the punctuation that follows complete words. However, word wrap may also occur following a hyphen.\nWord wrap following hyphens is sometimes not desired, and can be avoided by using a so-called non-breaking hyphen instead of a regular hyphen. On the other hand, when using word processors, invisible hyphens, called soft hyphens, can also be inserted inside words so that word wrap can occur following the soft hyphens.\nSometimes, word wrap is not desirable between words. In such cases, word wrap can usually be avoided by using a hard space or non-breaking space between the words, instead of regular spaces.\nOccasionallyThereAreWordsThatAreSoLongTheyExceedTheWidthOfTheLineAndEndUpWrappingBetweenMultipleLines.\nText might have\ttabs\tin it too. Not all text will end in a line breaking character' }
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
				},
				{
					'type': 'tableRow',
					'children': [
						{
							'type': 'tableCell',
							'attributes': { 'html/style': 'border: solid 1px;' },
							'children': [
								{
									'type': 'paragraph',
									'content': { 'text': 'row 2 & cell 1' }
								}
							]
						},
						{
							'type': 'tableCell',
							'attributes': { 'html/style': 'border: solid 1px;' },
							'children': [
								{
									'type': 'paragraph',
									'content': { 'text': 'row 2 & cell 2' }
								},
								{
									'type': 'table',
									'attributes': { 'html/style': 'width: 150px; border: solid 1px;' },
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
															'content': { 'text': '#1 #1 #1' }
														}
													]
												},
												{
													'type': 'tableCell',
													'attributes': { 'html/style': 'border: solid 1px;' },
													'children': [
														{
															'type': 'paragraph',
															'content': { 'text': '#2 #2 #2' }
														}
													]
												}
											]
										},
										{
											'type': 'tableRow',
											'children': [
												{
													'type': 'tableCell',
													'attributes': { 'html/style': 'border: solid 1px;' },
													'children': [
														{
															'type': 'paragraph',
															'content': { 'text': '#3 #3 #3' }
														}
													]
												},
												{
													'type': 'tableCell',
													'attributes': { 'html/style': 'border: solid 1px;' },
													'children': [
														{
															'type': 'paragraph',
															'content': { 'text': '#4 #4 #4' }
														}								
													]
												}
											]
										}
									]
								},
								{
									'type': 'list',
									'attributes': { 'style': 'number' },
									'children': [
										{
											'type': 'listItem',
											'content': { 'text': 'First item' },
											'children': [ // FIXME?!?
												{
													'attributes': { 'style': 'bullet'},
													'children': [
														{ 'content': { 'text': 'First subitem' } },
														{ 'content': { 'text': 'Second subitem' } }
													]
												}
											]
										},
										{
											'type': 'listItem',
											'content': {
												'text': 'Second item',
												'annotations': [
													{
														'type': 'italic',
														'range': {
															'start': 0,
															'end': 6
														}
													}
												]
											}
										},
										{
											'type': 'listItem',
											'content': {
												'text': 'Third item',
												'annotations': [
													{
														'type': 'bold',
														'range': {
															'start': 0,
															'end': 5
														}
													}
												]
											}
										},
										{
											'type': 'listItem',
											'content': {
												'text': 'Fourth item',
												'annotations': [
													{
														'type': 'ilink',
														'range': {
															'start': 7,
															'end': 11
														},
														'data': { 'title': 'User:JohnDoe' }
													}
												]
											}
										}
									]
								}
							]
						}
					]
				}
			]
		},
		{
			'type': 'list',
			'attributes': { 'style': 'number' },
			'children': [
				{
					'type': 'listItem',
					'content': { 'text': 'Operating Systems' },
					'children': [ // FIXME?!?
						{
							'attributes': { 'style': 'bullet' },
							'children': [
								{
									'type': 'listItem',
									'content': { 'text': 'Linux' },
									'children': [ // FIXME?!?
										{
											'attributes': { 'style': 'bullet' },
											'children': [
												{
													'type': 'listItem',
													'content': { 'text': 'Ubuntu' },
													'children': [ //FIXME?!?
														{
															'attributes': { 'style': 'bullet' },
															'children': [
																{
																	'type': 'listItem',
																	'content': {
																		'text': 'Desktop: Intuitive office apps, safe and fast web browsing, and seamless integration.  Ubuntu brings the very best technologies straight to the desktop.',
																		'annotations': [
																			// "[citation needed 2]" should be super
																			{
																				'type': 'template',
																				'data': {
																					'html': '<sup><small><a href="#">[citation needed 2]</a></small></sup>'
																				},
																				'range': { 'start': 85, 'end': 86 }
																			}
																		]
																	}
																},
																{ 'type': 'listItem', 'content': { 'text': 'Server: Secure, fast and powerful, Ubuntu Server is transforming IT environments worldwide. Realise the full potential of your infrastructure with a reliable, easy-to-integrate technology platform. Lorem ipsum.. Lorem ipsum.. Lorem ipsum.. Lorem ipsum.. Lorem ipsum.. Lorem ipsum.. Lorem ipsum.. Lorem ipsum.. Lorem ipsum.. Lorem ipsum.. ' } },
																{ 'type': 'listItem', 'content': { 'text': 'Cloud: Ubuntu cloud computing puts you in control of your IT infrastructure. It helps you access computing power as and when you need it so you can meet user demand more effectively.' } }
															]
														}
													]
												},
												{ 'type': 'listItem', 'content': { 'text': 'Fedora' } },
												{ 'type': 'listItem', 'content': { 'text': 'Gentoo' } }
											]
										}
									]
								},
								{ 'type': 'listItem', 'content': { 'text': 'Windows' } },
								{ 'type': 'listItem', 'content': { 'text': 'Mac' } }
							]
						}
					]
				},
				{
					'type': 'listItem',
					'content': {
						'text': 'Second item',
						'annotations': [
							{
								'type': 'italic',
								'range': {
									'start': 0,
									'end': 6
								}
							}
						]
					}
				},
				{
					'type': 'listItem',
					'content': {
						'text': 'Third item',
						'annotations': [
							{
								'type': 'bold',
								'range': {
									'start': 0,
									'end': 5
								}
							}
						]
					}
				},
				{
					'type': 'listItem',
					'content': {
						'text': 'Fourth item',
						'annotations': [
							{
								'type': 'ilink',
								'range': {
									'start': 7,
									'end': 11
								},
								'data': { 'title': 'User:JohnDoe' }
							}
						]
					}
				}
			]
		}
	] } );
	var surfaceView = new es.SurfaceView( $( '#es-editor' ), new es.SurfaceModel( doc ) );
	// Use the global space for debugging purposes
	window.surfaceView = surfaceView;
} );
