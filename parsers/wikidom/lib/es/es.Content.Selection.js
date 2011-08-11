/**
 * Creates a selection of content objects.
 * 
 * @class
 * @constructor
 * @extends {es.EventEmitter}
 * @param contents {Array} List of content objects to append
 * @property contents {Array} List of content objects in selection
 */
es.Content.Selection = function( contents ) {
	es.EventEmitter.call( this );
	this.contents = contents || [];
};

/**
 * Gets the first content object in the selection.
 * 
 * @method
 * @returns {es.Content} First child object
 */
es.Content.Selection.prototype.first = function() {
	return this.contents.length ? this.contents[0] : null;
};

/**
 * Gets the last content object in the selection.
 * 
 * @method
 * @returns {es.Content} Last child object
 */
es.Content.Selection.prototype.last = function() {
	return this.contents.length ? this.contents[this.contents.length - 1] : null;
};

/**
 * Iterates over content objects, executing a callback for each.
 * 
 * Returning false in the callback will stop iteration.
 * 
 * @method
 * @param callback {Function} Function to call on each content object which takes content and index
 * arguments
 */
es.Content.Selection.prototype.each = function( callback ) {
	for ( var i = 0; i < this.contents.length; i++ ) {
		if ( !callback( this.contents[i], i ) ) {
			break;
		}
	}
};

/**
 * Adds a content object to the end of the selection.
 * 
 * @method
 * @param content {es.Content} Content to append
 * @emits "update"
 */
es.Content.Selection.prototype.append = function( content ) {
	var selection = this;
	content.on( 'update', function() {
		selection.emit( 'update' );
	} );
	this.contents.push( content );
	this.emit( 'update' );
};

/**
 * Adds a content object to the beginning of the selection.
 * 
 * @method
 * @param content {es.Content} Content to prepend
 * @emits "update"
 */
es.Content.Selection.prototype.prepend = function( content ) {
	var selection = this;
	content.on( 'update', function() {
		selection.emit( 'update' );
	} );
	this.contents.unshift( content );
	this.emit( 'update' );
};

/**
 * Adds a content object to the selection after an existing one.
 * 
 * @method
 * @param content {es.Content} Content to insert
 * @param before {es.Content} Content to insert before, if null content will be inserted at the end
 * @emits "update"
 */
es.Content.Selection.prototype.insertBefore = function( content, before ) {
	var selection = this;
	content.on( 'update', function() {
		selection.emit( 'update' );
	} );
	if ( before ) {
		this.contents.splice( before.getIndex(), 0, content );
	} else {
		this.contents.push( content );
	}
	this.emit( 'update' );
};
/**
 * Adds a content object to the selection after an existing one.
 * 
 * @method
 * @param content {Object} Content to insert
 * @param after {Object} Content to insert after, if null content will be inserted at the end
 * @emits "update"
 */
es.Content.Selection.prototype.insertAfter = function( content, after ) {
	var selection = this;
	content.on( 'update', function() {
		selection.emit( 'update' );
	} );
	if ( after ) {
		this.contents.splice( after.getIndex() + 1, 0, content );
	} else {
		this.contents.push( content );
	}
	this.emit( 'update' );
};

/**
 * Removes a content object from the selection.
 * 
 * Also detaches item's Element object to the DOM and removes all listeners its "update" events.
 * 
 * @method
 * @param content {Object} Content to remove
 * @emits "update"
 */
es.Content.Selection.prototype.remove = function( content ) {
	content.removeAllListeners( 'update' );
	this.contents.splice( content.getIndex(), 1 );
	this.emit( 'update' );
};

/* Inheritance */

es.extend( es.Content.Selection, es.EventEmitter );
