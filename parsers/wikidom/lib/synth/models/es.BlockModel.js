/**
 * Creates an es.BlockModel object.
 * 
 * @class
 * @extends {es.EventEmitter}
 * @abstract
 * @constructor
 * @param traits {Array} List of trait names
 * @property traits {Array} List of trait names
 */
es.BlockModel = function( traits ) {
	es.EventEmitter.call( this );
	es.ContainerItem.call( this, 'document' );
	this.traits = traits || [];
};

/* Static Members */

/**
 * Registry of constructors, mapping symbolic block type names to block constructors.
 * 
 * @member
 * @static
 * @type {Object}
 */
es.BlockModel.constructors = {};

/* Static Methods */

/**
 * Creates an object that's a subclass of es.BlockModel from a plain block object.
 * 
 * @method
 * @static
 * @param obj {Object} Plain block object
 * @returns {es.BlockModel} Object that's a subclass of es.BlockModel, or null of type was unknown
 */
es.BlockModel.newFromPlainObject = function( obj ) {
	if ( obj.type in es.BlockModel.constructors ) {
		return new es.BlockModel.constructors[obj.type]( obj );
	}
	return null;
};

/* Methods */

/**
 * Checks for a trait.
 * 
 * Traits are boolean flags that indicate supported behavior
 * 
 * "hasContent": Has text content
 * "isAnnotatable": Content may be annotated
 * "isAggregate": Has more than one content object
 * "isDocumentContainer": Contains child documents
 * 
 * @method
 * @param trait {String} Trait name to check for
 * @returns {Boolean} If the block has the trait
 */
es.BlockModel.prototype.hasTrait = function( trait ) {
	return this.traits.indexOf( trait ) !== -1;
};

/**
 * Gets the length of all content.
 * 
 * @method
 * @returns {Integer} Length of all content
 */
es.BlockModel.prototype.getContentLength = function() {
	throw 'BlockModel.getContentLength not implemented in this subclass.';
};

/**
 * Inserts content at an offset.
 * 
 * @method
 * @param offset {Integer} Offset to insert content at
 * @param content {es.ContentModel} Content to insert
 */
es.BlockModel.prototype.insertContent = function( offset, content ) {
	throw 'BlockModel.insertContent not implemented in this subclass.';
};

/**
 * Removes a range of content.
 * 
 * @method
 * @param range {es.Range} Range of content to remove
 */
es.BlockModel.prototype.removeContent = function( range ) {
	throw 'BlockModel.removeContent not implemented in this subclass.';
};

/**
 * Removes all content.
 * 
 * @method
 */
es.BlockModel.prototype.clearContent = function() {
	throw 'BlockModel.clearContent not implemented in this subclass.';
};

/**
 * Applies annotation to a range of content.
 * 
 * @method
 * @param method {String} Method of annotation; "add", "remove" or "toggle"
 * @param range {es.Range} Range to annotate
 * @param annotation {Object} Annotation to apply
 */
es.BlockModel.prototype.annotateContent = function( method, range, annotation ) {
	throw 'BlockModel.annotateContent not implemented in this subclass.';
};

/**
 * Gets a list of all content objects.
 * 
 * @method
 * @returns {Array} List of content objects
 */
es.BlockModel.prototype.getContents = function() {
	throw 'BlockModel.getContents not implemented in this subclass.';
};

/**
 * Gets a plain text rendering of contents.
 * 
 * @method
 * @returns {String} Plain text rendering of contents.
 */
es.BlockModel.prototype.getText = function() {
	throw 'BlockModel.getText not implemented in this subclass.';
};

/**
 * Gets a range that surrounds the word closest to an offset.
 * 
 * @method
 * @param offset {Integer} Offset to find word boundaries for
 * @returns {es.Range} Range of word closest to offset
 */
es.BlockModel.getWordBoundaries = function( offset ) {
	throw 'BlockModel.getWordBoundaries not implemented in this subclass.';
};

/**
 * Gets a range that surrounds the section closest to an offset.
 * 
 * @method
 * @param offset {Integer} Offset to find section boundaries for
 * @returns {es.Range} Range of section closest to offset
 */
es.BlockModel.getSectionBoundaries = function( offset ) {
	throw 'BlockModel.getSectionBoundaries not implemented in this subclass.';
};

/**
 * Gets a plain object representation of block, for serialization.
 * 
 * @method
 * @returns {Object} Plain object representation
 */
es.BlockModel.prototype.getPlainObject = function() {
	throw 'BlockModel.getPlainObject not implemented in this subclass.';
};

es.extend( es.BlockModel, es.EventEmitter );
es.extend( es.BlockModel, es.ContainerItem );
