/**
 * Creates an es.ViewNode object.
 * 
 * es.ViewNode extends native JavaScript Array objects, without changing Array.prototype by
 * dynamically extending an array literal with the methods of es.ViewNode.
 * 
 * View nodes follow the operations performed on model nodes and keep elements in the DOM in sync.
 * 
 * Child objects must extend es.ViewNode.
 * 
 * @class
 * @constructor
 * @extends {es.EventEmitter}
 * @param model {es.ModelNode} Model to observe
 * @param {jQuery} [$element=New DIV element] Element to use as a container
 * @property {es.ModelItem} model Model being observed
 * @property {jQuery} $ Container element
 */
es.ViewNode = function( model, $element ) {
	// Inheritance
	es.EventEmitter.call( this );
	var node = [];
	
	// Extending this class will initialize it without any arguments, exiting early if no model
	// was given will prevent clogging up subclass prototypes with array methods
	if ( !model ) {
		return this;
	}
	
	this.model = model;
	this.$ = $element || $( '<div/>' );
	
	// Reusable function for passing update events upstream
	this.emitUpdate = function() {
		node.emit( 'update' );
	};
	
	// Append existing model children
	for ( var i = 0; i < model.length; i++ ) {
		this.onPush( model[i] );
	}
	
	// Observe and mimic changes on model
	this.addListenerMethods( node, {
		'push': 'onPush',
		'unshift': 'onUnshift',
		'pop': 'onPop',
		'shift': 'onShift',
		'splice': 'onSplice',
		'sort': 'onSort',
		'reverse': 'onReverse'
	} );
	
	// Extend native array with method and properties of this
	return $.extend( node, this );
};

es.ViewNode.onPush = function( childModel ) {
	var childView = childModel.createView();
	childView.attach( this );
	childView.on( 'update', this.emitUpdate );
	this.push( childView );
	this.$.append( childView.$ );
	this.emit( 'push', childView );
	this.emit( 'update' );
};

es.ViewNode.onUnshift = function( childModel ) {
	var childView = childModel.createView();
	childView.attach( this );
	childView.on( 'update', this.emitUpdate );
	this.unshift( childView );
	this.$.prepend( childView.$ );
	this.emit( 'unshift', childView );
	this.emit( 'update' );
};

es.ViewNode.onPop = function() {
	var childView = this.pop();
	childView.detach();
	childView.removeEventListener( 'update', this.emitUpdate );
	childView.$.detach();
	this.emit( 'pop' );
	this.emit( 'update' );
};

es.ViewNode.onShift = function() {
	var childView = this.shift();
	childView.detach();
	childView.removeEventListener( 'update', this.emitUpdate );
	childView.$.detach();
	this.emit( 'shift' );
	this.emit( 'update' );
};

es.ViewNode.onSplice = function( index, howmany ) {
	var args = Array.prototype.slice( arguments, 0 ),
		added = args.slice( 2 ),
		removed = this.splice.apply( this, args );
	this.$.children().slice( index, index + howmany ).detach();
	var $added = $.map( added, function( childView ) {
		return childView.$;
	} );
	this.$.children().get( index ).after( $added );
	this.emit.apply( ['splice'].concat( args ) );
	this.emit( 'update' );
};

es.ViewNode.onSort = function() {
	for ( var i = 0; i < this.model.length; i++ ) {
		for ( var j = 0; j < this.length; j++ ) {
			if ( this[j].getModel() === this.model[i] ) {
				var childView = this[j];
				this.splice( j, 1 );
				this.push( childView );
				this.$.append( childView.$ );
			}
		}
	}
	this.emit( 'sort' );
	this.emit( 'update' );
};

es.ViewNode.onReverse = function() {
	this.reverse();
	this.$.children().each( function() {
		$(this).prependTo( $(this).parent() );
	} );
	this.emit( 'reverse' );
	this.emit( 'update' );
};


/**
 * Gets a reference to the model this node observes.
 * 
 * @method
 * @returns {es.ModelNode} Reference to the model this node observes
 */
es.ViewNode.prototype.getModel = function() {
	return this.model;
};

/**
 * Gets a reference to this node's parent.
 * 
 * @method
 * @returns {es.ViewNode} Reference to this node's parent
 */
es.ViewNode.prototype.getParent = function() {
	return this.parent;
};

/**
 * Attaches node as a child to another node.
 * 
 * @method
 * @param {es.ViewNode} parent Node to attach to
 * @emits attach (parent)
 */
es.ViewNode.prototype.attach = function( parent ) {
	this.parent = parent;
	this.emit( 'attach', parent );
};

/**
 * Detaches node from it's parent.
 * 
 * @method
 * @emits detach (parent)
 */
es.ViewNode.prototype.detach = function() {
	var parent = this.parent;
	this.parent = null;
	this.emit( 'detach', parent );
};

/* Inheritance */

es.extend( es.ViewNode, es.EventEmitter );
