$(document).ready( function() {
	window.wikiDom = {
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
				'type': 'paragraph',
				'content': { 'text': 'Test 1' }
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
						'content': {
							'text': 'Test 4444'
						}
					},
					{
						'type': 'listItem',
						'attributes': {
							'styles': ['bullet', 'bullet']
						},
						'content': {
							'text': 'Test 55555'
						}
					},
					{
						'type': 'listItem',
						'attributes': {
							'styles': ['number']
						},
						'content': {
							'text': 'Test 666666'
						}
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
												'content': {
													'text': 'Test 4444'
												}
											},
											{
												'type': 'listItem',
												'attributes': {
													'styles': ['bullet', 'bullet']
												},
												'content': {
													'text': 'Test 55555'
												}
											},
											{
												'type': 'listItem',
												'attributes': {
													'styles': ['number']
												},
												'content': {
													'text': 'Test 666666'
												}
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
					},
				]
			}
		]
	};
	window.doc = es.DocumentModel.newFromPlainObject( window.wikiDom );
	window.surfaceModel = new es.SurfaceModel( window.doc );
	window.surfaceView = new es.SurfaceView( $( '#es-editor' ), window.surfaceModel );
} );
