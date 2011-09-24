/**
 * Creates an es.ViewList object.
 * 
 * View lists follow the operations performed on a model lists and keep a list of views,
 * each correlating to a model in the model list.
 *
 * This will override this.$ (important in case of multiple inheritance).
 * 
 * @class
 * @constructor
 * @extends {es.EventEmitter}
 * @param model {es.ModelList} Model to observe
 * @param {jQuery} [$element=New DIV element] Element to use as a container
 * @property {es.ModelItem} model Model being observed
 * @property {jQuery} $ Container element
 */
es.ViewList = function( model, $element ) {
	var list = new es.AggregateArray();
	es.EventEmitter.call( list );
	
	// Extending this class will initialize it without any arguments, exiting early if no model
	// was given will prevent clogging up subclass prototypes with array methods
	if ( !model ) {
		return list;
	}
	
	list.model = model;
	list.$ = $element || $( '<div/>' );
	
	// Reusable function for passing update events upstream
	this.emitUpdate = function() {
		list.emit( 'update' );
	};
	
	// Observe and mimic changes on model
	model.addListenerMethods( list, {
		'push': 'onPush',
		'unshift': 'onUnshift',
		'pop': 'onPop',
		'shift': 'onShift',
		'splice': 'onSplice',
		'sort': 'onSort',
		'reverse': 'onReverse'
	} );
	
	// Append existing model items
	for ( var i = 0; i < model.length; i++ ) {
		this.onPush( model[i] );
	}
	
	// Extend native array with method and properties of this
	return $.extend( list, this );
};

es.ViewList.onPush = function( itemModel ) {
	var itemView = itemModel.createView();
	itemView.attach( this );
	itemView.on( 'update', this.emitUpdate );
	this.push( itemView );
	this.$.append( itemView.$ );
	this.emit( 'push', itemView );
	this.emit( 'update' );
};

es.ViewList.onUnshift = function( itemModel ) {
	var itemView = itemModel.createView();
	itemView.attach( this );
	itemView.on( 'update', this.emitUpdate );
	this.unshift( itemView );
	this.$.prepend( itemView.$ );
	this.emit( 'unshift', itemView );
	this.emit( 'update' );
};

es.ViewList.onPop = function() {
	var itemView = this.pop();
	itemView.detach();
	itemView.removeEventListener( 'update', this.emitUpdate );
	itemView.$.detach();
	this.emit( 'pop' );
	this.emit( 'update' );
};

es.ViewList.onShift = function() {
	var itemView = this.shift();
	itemView.detach();
	itemView.removeEventListener( 'update', this.emitUpdate );
	itemView.$.detach();
	this.emit( 'shift' );
	this.emit( 'update' );
};

es.ViewList.onSplice = function( index, howmany ) {
	var args = Array.prototype.slice( arguments, 0 ),
		added = args.slice( 2 ),
		removed = this.splice.apply( this, args );
	this.$.children().slice( index, index + howmany ).detach();
	var $added = $.map( added, function( itemView ) {
		return itemView.$;
	} );
	this.$.children().get( index ).after( $added );
	this.emit.apply( ['splice'].concat( args ) );
	this.emit( 'update' );
};

es.ViewList.onSort = function() {
	for ( var i = 0; i < this.model.length; i++ ) {
		for ( var j = 0; j < this.length; j++ ) {
			if ( this[j].getModel() === this.model[i] ) {
				var itemView = this[j];
				this.splice( j, 1 );
				this.push( itemView );
				this.$.append( itemView.$ );
			}
		}
	}
	this.emit( 'sort' );
	this.emit( 'update' );
};

es.ViewList.onReverse = function() {
	this.reverse();
	this.$.children().each( function() {
		$(this).prependTo( $(this).parent() );
	} );
	this.emit( 'reverse' );
	this.emit( 'update' );
};

/* Inheritance */

es.extend( es.ViewList, es.EventEmitter );
