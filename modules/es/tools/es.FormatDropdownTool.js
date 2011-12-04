es.FormatDropdownTool = function( toolbar, name ) {
	// Inheritance
	es.DropdownTool.call( this, toolbar, name, [
		{ 
			'name': 'paragraph',
			'label': 'Paragraph',
			'type' : 'paragraph'
		},
		{
			'name': 'heading-1',
			'label': 'Heading 1',
			'type' : 'heading',
			'attributes': { 'level': 1 }
		},
		{
			'name': 'heading-2',
			'label': 'Heading 2',
			'type' : 'heading',
			'attributes': { 'level': 2 }
		},
		{
			'name': 'heading-3',
			'label': 'Heading 3',
			'type' : 'heading',
			'attributes': { 'level': 3 }
		},
		{
			'name': 'heading-4',
			'label': 'Heading 4',
			'type' : 'heading',
			'attributes': { 'level': 4 }
		},
		{
			'name': 'heading-5',
			'label': 'Heading 5',
			'type' : 'heading',
			'attributes': { 'level': 5 }
		},
		{
			'name': 'heading-6',
			'label': 'Heading 6',
			'type' : 'heading',
			'attributes': { 'level': 6 }
		},
		{
			'name': 'pre',
			'label': 'Preformatted',
			'type' : 'pre'
		}
	] );

	var _this = this;
	this.$.bind( {
		'mousedown': function( e ) {
			if ( e.button === 0 ) {
				e.preventDefault();
				return false;
			}
		},
		'mouseup': function( e ) {
			if ( e.button === 0 ) {
				_this.menuView.setPosition( es.Position.newFromElementPagePosition( _this.$ ) );
				_this.menuView.toggle();
			}
		}
	} );
};

/* Methods */

es.FormatDropdownTool.prototype.onSelect = function( item ) {
	var txs = this.toolbar.surfaceView.model.getDocument().prepareLeafConversion(
		this.toolbar.surfaceView.currentSelection,
		item.type,
		item.attributes
	);
	for ( var i = 0; i < txs.length; i++ ) {
		this.toolbar.surfaceView.model.transact( txs[i] );
	}
};

es.FormatDropdownTool.prototype.updateState = function( annotations, nodes ) {
	// Get type and attributes of the first node
	var i,
		format = {
			'type': nodes[0].getElementType(),
			'attributes': nodes[0].getElement().attributes
		};
	// Look for mismatches, in which case format should be null
	for ( i = 1; i < nodes.length; i++ ) {
		if ( format.type != nodes[i].getElementType() ||
			!es.compareObjects( format.attributes, nodes[i].element.attributes ) ) {
			format = null;
			break;
		}
	}
	
	if ( format === null ) {
		this.$.html( '&nbsp;' );
	} else {
		var items = this.menuView.getItems();
		for ( i = 0; i < items.length; i++ ) {
			if (
				format.type === items[i].type &&
				es.compareObjects( format.attributes, items[i].attributes )
			) {
				this.$.text( items[i].label );
				break;
			}
		}
	}
};

/* Registration */

es.Tool.tools.format = {
	'constructor': es.FormatDropdownTool,
	'name': 'format'
};

/* Inheritance */

es.extendClass( es.FormatDropdownTool, es.DropdownTool );
