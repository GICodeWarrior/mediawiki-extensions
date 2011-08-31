/**
 * Creates an es.HorizontalRuleBlockModel object.
 * 
 * @class
 * @constructor
 */
es.HorizontalRuleBlockModel = function() {
	es.BlockModel.call( this );
};

/* Static Methods */

/**
 * Creates an HorizontalRuleBlockModel object from a plain object.
 * 
 * @method
 * @static
 * @param obj {Object}
 */
es.HorizontalRuleBlockModel.newFromPlainObject = function( obj ) {
	return new es.HorizontalRuleBlockModel();
};

/* Methods */

/**
 * Gets the length of all content - always 0.
 * 
 * @method
 * @returns {Integer} Length of all content - always 0
 */
es.HorizontalBlockModel.prototype.getContentLength = function() {
	return 0;
};

/**
 * Gets a plain horizontal rule block object.
 * 
 * @method
 * @returns obj {Object}
 */
es.HorizontalRuleBlockModel.prototype.getPlainObject = function() {
	return { 'type': 'horizontal-rule' };
};

// Register constructor
es.BlockModel.constructors['horizontal-rule'] = es.HorizontalRuleBlockModel;

/* Inheritance */

es.extend( es.HorizontalRuleBlockModel, es.BlockModel );
