/**
 * Creates a document context.
 * 
 * @class
 * @constructor
 * @property options
 * @property options.constants {Object} Behavioral switches, or other non-parametric inclusions
 * @property options.parameters {Object} Used during transclusion for template expansion
 * @property options.isPage {Function} Callback for checking if a page exists
 * @property options.getWikiDom {Function} Callback for getting the WikiDom of for a page
 */
es.Document.Context = function( options ) {
	this.options = $.extend({
		'constants': {},
		'parameters': {},
		'isPage': null,
		'getWikiDom': null
	}, options);
};

/* Methods */

/**
 * Checks if a page exists, used for rendering "new" links.
 * 
 * This method delegates to the isPage option passed through the constructor. If no such
 * option was given, this method will always return false.
 * 
 * @param name {String} Page namespace
 * @param name {String} Page title
 * @returns {Boolean} True if page exists
 */
es.Document.Context.prototype.isPage = function( namespace, title ) {
	return typeof this.options.isPage === 'function'
		? this.options.isPage( namespace, title ) : false;
};

/**
 * Gets the Document Object Model of a page.
 * 
 * This method delegates to the getWikiDom option passed through the constructor. If no such
 * option was given, this method will always return null.
 * 
 * @param name {String} Page namespace
 * @param name {String} Page title
 * @returns {Object} Page DOM (document object)
 */
es.Document.Context.prototype.getWikiDom = function( namespace, title ) {
	return typeof this.options.getWikiDom === 'function'
		? this.options.getWikiDom( namespace, title ) : null;
};

/**
 * Sets a constant.
 * 
 * @param name {String} Constant name
 * @param value {String} Constant value
 */
es.Document.Context.prototype.setConstant = function( name, value ) {
	this.options.constants[name] = value;
};

/**
 * Gets a constant.
 * 
 * @param name {String} Constant name
 * @returns {String} Constant value
 */
es.Document.Context.prototype.getConstant = function( name ) {
	return name in this.options.constants ? this.options.constants[name] : null;
};

/**
 * Sets a parameter.
 * 
 * @param name {String} Parameter name
 * @param value {Object} Parameter value (document object)
 */
es.Document.Context.prototype.setParameter = function( name, value ) {
	this.options.parameters[name] = value;
};

/**
 * Gets a parameter.
 * 
 * @param name {String} Parameter name
 * @returns {Object} Parameter value (document object)
 */
es.Document.Context.prototype.getParameter = function( name ) {
	return name in this.options.parameters ? this.options.parameters[name] : null;
};
