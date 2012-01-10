/**
 * Template and template argument handling, first cut.
 *
 * AsyncTokenTransformManager objects provide preprocessor-frame-like
 * functionality once template args etc are fully expanded, and isolate
 * individual transforms from concurrency issues. Template argument expansion
 * is performed using a structure managed in this extension.
 *
 * @author Gabriel Wicke <gwicke@wikimedia.org>
 * @author Brion Vibber <brion@wikimedia.org>
 */
var $ = require('jquery');


function TemplateHandler () {
	this.reset();
}

TemplateHandler.prototype.reset = function () {
	this.outstanding = 0;
};

// constants
TemplateHandler.prototype.rank = 1.1;

TemplateHandler.prototype.register = function ( manager ) {
	this.manager = manager;
	// Register for template and templatearg tag tokens
	manager.addTransform( this.onTemplate.bind(this), 
			this.rank, 'tag', 'template' );
	manager.addTransform( this.onTemplateArg.bind(this), 
			this.rank, 'tag', 'templatearg' );

	// Reset internal state when the parser pipeline is done
	manager.addTransform( this.reset.bind(this), 
			this.rank, 'end' );
};


/** 
 * Main template token handler
 *
 * Expands target and arguments (both keys and values) and either directly
 * calls or sets up the callback to _expandTemplate, which then fetches and
 * processes the template.
 */
TemplateHandler.prototype.onTemplate = function ( token, cb ) {
	
	this.parentCB = cb;
	this.origToken = token;

	// check for 'subst:'
	// check for variable magic names
	// check for msg, msgnw, raw magics
	// check for parser functions

	// create a new temporary frame for argument and title expansions
	var templateExpandData = {
			args: {},
			env: frame.env,
			outstanding: 0,
			cb: cb,
			origToken: token
		},
		transformCB,
		i = 0,
		kvs = [],
		res,
		kv;
	// XXX: transform the target
	transformCB = this._returnArgValue.bind( this, { frame: templateExpandData } );
	res = this.manager.transformTokens( token.target, transformCB );
	if ( res.async ) {
		newFrame.outstanding++;
	}
    newFrame.target = res.tokens;
	

	// transform each argument (key and value), and handle asynchronous returns
	for ( var key in token.args ) {
		if ( token.hasOwnProperty( key ) ) {
			kv = { key: [], value: [] };
			// transform the value
			transformCB = this._returnArgValue.bind( this, { frame: templateExpandData, index: i }  );
			res = this.manager.transformTokens( args[key], transformCB );
			if ( res.async ) {
				newFrame.outstanding++;
			}
			kv.value = res.tokens;

			// XXX: transform key too, and store it in the token's value for
			// the original key
			// For now, we assume the key to be a string.
			kv.key = key;

			// finally, append to kvs
			kvs.push( kv );
			i++;
		}
	}

	// Move the above to AttributeTransformer class

	
	if ( newFrame.outstanding === 0 ) {
		return this._expandTemplate ( newFrame );
	} else {
		return { async: true };
	}
};

/**
 * Callback for async argument value expansions
 */
TemplateHandler.prototype._returnArgValue = function ( ref, tokens, notYetDone ) {
	var frame = ref.frame;
	frame.args[ref.index].value.push( tokens );
	if ( ! notYetDone ) {
		frame.outstanding--;
		if ( frame.outstanding === 0 ) {
			// this calls back to frame.cb, so no return here.
			this._expandTemplate( frame );
		}
	}
};

/**
 * Callback for async argument key expansions
 */
TemplateHandler.prototype._returnArgKey = function ( ref, tokens, notYetDone ) {
	var frame = ref.frame;
	frame.args[ref.index].key.push( tokens );
	if ( ! notYetDone ) {
		frame.outstanding--;
		if ( frame.outstanding === 0 ) {
			// this calls back to frame.cb, so no return here.
			this._expandTemplate( frame );
		}
	}
};

/**
 * Callback for async target expansion
 */
TemplateHandler.prototype._returnTarget = function ( ref, tokens, notYetDone ) {
	var frame = ref.frame;
	frame.target.push( tokens );
	if ( ! notYetDone ) {
		frame.outstanding--;
		if ( frame.outstanding === 0 ) {
			// this calls back to frame.cb, so no return here.
			this._expandTemplate( frame );
		}
	}
};

/**
 * Fetch, tokenize and token-transform a template after all arguments and the
 * target were expanded in frame.
 */
TemplateHandler.prototype._expandTemplate = function ( frame ) {
	// First, check the target for loops
	this.manager.loopCheck.check( frame.target );

	// Create a new nested transformation pipeline for the input type
	// (includes the tokenizer and synchronous stage-1 transforms for
	// 'text/wiki' input). 
	// Returned pipe (for now):
	// { first: tokenizer, last: AsyncTokenTransformManager }
	this.inputPipeline = this.manager.newChildPipeline( inputType, args );

	// Hook up the AsyncTokenTransformManager output events to call back our
	// parentCB.
	this.inputPipeline.last.addListener( 'chunk', this._onChunk.bind ( this ) );
	this.inputPipeline.last.addListener( 'end', this._onEnd.bind ( this ) );
	

	// Resolve a possibly relative link
	var templateName = this.env.resolveTitle( this.target, 'Template' );
	this._fetchTemplateAndTitle( templateName, this._processTemplateAndTitle.bind( this ) );

	// Set up a pipeline:
	// fetch template source -> tokenizer 
	// getInputPipeline( inputType )
	//     normally tokenizer -> transforms 1/2
	//     encapsulation by default, generic de-encapsulation in phase 3
	//     { type: 'object', name: 'template', value: [tokens] }
	//     -> then un-wrap and replace with contents in phase 3 if for-viewing
	//        mode
	// -> TokenTransformDispatcher (phase 1/2 only, with frame passed in)
	// -> frame.cb( tokens )
	

	// XXX: notes from brion's mediawiki.parser.environment
	// resolve template name
	// load template w/ canonical name
	// load template w/ variant names
	// recursion depth check
	// fetch from DB or interwiki
	// infinte loop check
	//
	// TODO: template fetching is already implemented there, copy this over!
};


/**
 * Convert AsyncTokenTransformManager output chunks to parent callbacks
 */
TemplateHandler.prototype._onChunk = function( chunk ) {
	// We encapsulate the output by default, so collect tokens here.
	this.resultTokens = this.resultTokens.concat( chunk );
};

/**
 * Handle the end event by calling our parentCB with notYetDone set to false.
 */
TemplateHandler.prototype._onEnd = function( ) {
	// Encapsulate the template in a single token, which contains all the
	// information needed for the editor.
	var res = {
		type: 'container',
		tokens: this.resultTokens, // The editor needs HTML serialization instead
		args: this.manager.args, // Here, the editor needs wikitext.
		attribs: this.origToken.attribs // Hmm..

	};
	this.parentCB( res, false );
};



/**
 * Process a fetched template source
 */
TemplateHandler.prototype._processTemplateAndTitle = function( src, title ) {
	// Feed the pipeline. XXX: Support different formats.
	this.inputPipeline.process ( src );
};



/**
 * Fetch a template
 */
TemplateHandler.prototype._fetchTemplateAndTitle = function( title, callback ) {
	// @fixme normalize name?
	if (title in this.pageCache) {
		// @fixme should this be forced to run on next event?
		callback( this.pageCache[title], title );
	} else {
		// whee fun hack!
		console.log(title);
		console.log(this.pageCache);
		$.ajax({
			url: this.manager.env.wgScriptPath + '/api' + this.manager.env.wgScriptExtension,
			data: {
				format: 'json',
			action: 'query',
			prop: 'revisions',
			rvprop: 'content',
			titles: name
			},
			success: function(data, xhr) {
				var src = null, title = null;
				$.each(data.query.pages, function(i, page) {
					if (page.revisions && page.revisions.length) {
						src = page.revisions[0]['*'];
						title = page.title;
					}
				});
				if (typeof src !== 'string') {
					callback(null, null, 'Page not found');
				} else {
					callback(src, title);
				}
			},
			error: function(msg) {
				callback(null, null, 'Page/template fetch failure');
			},
			dataType: 'json',
			cache: false // @fixme caching, versions etc?
		}, 'json');
	}
};


/**
 * Expand template arguments with tokens from the containing frame.
 */
TemplateHandler.prototype.onTemplateArg = function ( token, cb, frame ) {
	var argName = token.attribs[0][1]; // XXX: do this properly!
	if ( argName in frame.args ) {
		// return tokens for argument
		return { tokens: frame.args[argName] };
	} else {
		if ( token.attribs.length > 1 ) {
			return token.attribs[1][1]; // default value, XXX: use key
		} else {
			return { token: { type: 'TEXT', value: '{{{' + argName + '}}}' } };
		}
	}
};


if (typeof module == "object") {
	module.exports.TemplateHandler = TemplateHandler;
}
