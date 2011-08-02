var MWParserEnvironment = function(opts) {
	var options = {
		tagHooks: {},
		parserFunctions: {}
	};
	$.extend(options, opts);
	this.tagHooks = options.tagHooks;
	this.parserFunctions = options.parserFunctions;
};

$.extend(MWParserEnvironment.prototype, {
	// Does this need separate UI/content inputs?
	formatNum: function( num ) {
		return num + '';
	},

	getVariable: function( varname, options ) {
		//
	},

	/**
	 * @return MWParserFunction
	 */
	getParserFunction: function( name ) {
		if (name in this.parserFunctions) {
			return new this.parserFunctions[name]( this );
		} else {
			return null;
		}
	},

	/**
	 * @return MWParserTagHook
	 */
	getTagHook: function( name ) {
		if (name in this.tagHooks) {
			return new this.tagHooks[name](this);
		} else {
			return null;
		}
	}
	
});



/**
 * @parm MWParserEnvironment env
 * @constructor
 */
MWParserTagHook = function( env ) {
	if (!env) {
		throw new Error( 'Tag hook requires a parser environment.' );
	}
	this.env = env;
};

/**
 * @param string text (or a parse tree?)
 * @param object params map of named parameters (strings or parse frames?)
 * @return either a string or a parse frame -- finalize this?
 */
MWParserTagHook.execute = function( text, params ) {
	return '';
};


MWParserFunction = function( env) {
	if (!env) {
		throw new Error( 'Parser funciton requires a parser environment.');
	}
	this.env = env;
};

/**
 * @param string text (or a parse tree?)
 * @param object params map of named parameters (strings or parse frames?)
 * @return either a string or a parse frame -- finalize this?
 */
MWParserFunction.execute = function( text, params ) {
	return '';
};

if (typeof module == "object") {
	module.exports.MWParserEnvironment = MWParserEnvironment;
}
