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

	// Extending this class will initialize it without any arguments, exiting early if no model
	// was given will prevent clogging up subclass prototypes with array methods
	if ( !model ) {
		return this;
	}
	
	// Extension
	var node = es.extendObject( [], this );
	
	// Properties
	node.model = model;
	node.$ = $element || $( '<div/>' );
	
	// Reusable function for passing update events upstream
	node.emitUpdate = function() {
		node.emit( 'update' );
	};
	
	// Append existing model children
	for ( var i = 0; i < model.length; i++ ) {
		node.onAfterPush( model[i] );
	}
	
	// Observe and mimic changes on model
	node.addListenerMethods( node, {
		'afterPush': 'onAfterPush',
		'afterUnshift': 'onAfterUnshift',
		'afterPop': 'onAfterPop',
		'afterShift': 'onAfterShift',
		'afterSplice': 'onAfterSplice',
		'afterSort': 'onAfterSort',
		'afterReverse': 'onAfterReverse'
	} );
	
	return node;
};

es.ViewNode.prototype.onAfterPush = function( childModel ) {
	var childView = childModel.createView();
	this.emit( 'beforePush', childView );
	childView.attach( this );
	childView.on( 'update', this.emitUpdate );
	this.push( childView );
	this.$.append( childView.$ );
	this.emit( 'afterPush', childView );
	this.emit( 'update' );
};

es.ViewNode.prototype.onAfterUnshift = function( childModel ) {
	var childView = childModel.createView();
	this.emit( 'beforeUnshift', childView );
	childView.attach( this );
	childView.on( 'update', this.emitUpdate );
	this.unshift( childView );
	this.$.prepend( childView.$ );
	this.emit( 'afterUnshift', childView );
	this.emit( 'update' );
};

es.ViewNode.prototype.onAfterPop = function() {
	this.emit( 'beforePop' );
	var childView = this.pop();
	childView.detach();
	childView.removeEventListener( 'update', this.emitUpdate );
	childView.$.detach();
	this.emit( 'afterPop' );
	this.emit( 'update' );
};

es.ViewNode.prototype.onAfterShift = function() {
	this.emit( 'beforeShift' );
	var childView = this.shift();
	childView.detach();
	childView.removeEventListener( 'update', this.emitUpdate );
	childView.$.detach();
	this.emit( 'afterShift' );
	this.emit( 'update' );
};

es.ViewNode.prototype.onAfterSplice = function( index, howmany ) {
	var args = Array.prototype.slice( arguments, 0 );
	this.emit.apply( ['beforeSplice'].concat( args ) );
	this.$.children()
		// Removals
		.slice( index, index + howmany ).detach()
		// Insertions
		.get( index ).after( $.map( args.slice( 2 ), function( childView ) {
			return childView.$;
		} ) );
	this.emit.apply( ['afterSplice'].concat( args ) );
	this.emit( 'update' );
};

es.ViewNode.prototype.onAfterSort = function() {
	this.emit( 'beforeSort' );
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
	this.emit( 'afterSort' );
	this.emit( 'update' );
};

es.ViewNode.prototype.onAfterReverse = function() {
	this.emit( 'beforeReverse' );
	this.reverse();
	this.$.children().each( function() {
		$(this).prependTo( $(this).parent() );
	} );
	this.emit( 'afterReverse' );
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

es.extendClass( es.ViewNode, es.EventEmitter );
