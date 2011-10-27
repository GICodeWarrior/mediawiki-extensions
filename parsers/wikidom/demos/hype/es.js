$(document).ready( function() {
	window.wikiDom = {
		'type': 'document',
		'children': [
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
			}
		]
	};
	window.doc = es.DocumentModel.newFromPlainObject( window.wikiDom );
	window.surfaceModel = new es.SurfaceModel( window.doc );
	window.surfaceView = new es.SurfaceView( $( '#es-editor' ), window.surfaceModel );
} );
