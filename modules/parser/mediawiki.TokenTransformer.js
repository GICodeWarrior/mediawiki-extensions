/* Generic token transformation dispatcher with support for asynchronous token
 * expansion. Individual transformations register for the token types they are
 * interested in and are called on each matching token. 
 *
 * A transformer might return null, a single token, or an array of tokens.
 * - Null removes the token and stops further processing for this token. 
 * - A single token is further processed using the remaining transformations
 *   registered for this token, and finally placed in the output token list. 
 * - A list of tokens stops the processing for this token. Instead, processing
 *   restarts with the first returned token.
 * 
 * Additionally, transformers performing asynchronous actions on a token can
 * create a new TokenAccumulator using .newAccumulator(). This creates a new
 * accumulator for each asynchronous result, with the asynchronously processed
 * token last in its internal accumulator. This setup avoids the need to apply
 * operational-transform-like index transformations when parallel expansions
 * insert tokens in front of other ongoing expansion tasks.
 * */

function TokenTransformer( callback ) {
	this.cb = callback;	// Called with transformed token list when done
	this.transformers = {
		tag: {}, // for TAG, ENDTAG, SELFCLOSINGTAG, keyed on name
		text: [],
		newline: [],
		comment: [],
		end: [], // eof
		martian: [] // none of the above
	};
	this.reset();
	return this;
}

TokenTransformer.prototype.reset = function () {
	this.accum = new TokenAccumulator();
	this.firstaccum = this.accum;
	this.outstanding = 1;	// Number of outstanding processing steps 
							// (e.g., async template fetches/expansions)
};

TokenTransformer.prototype.appendListener = function ( listener, type, name ) {
	if ( type === 'tag' ) {
		if ( $.isArray(this.transformers.tag.name) ) {
			this.transformers.tag[name].push(listener);
		} else {
			this.transformers.tag[name] = [listener];
		}
	} else {
		this.transformers[type].push(listener);
	}
};

TokenTransformer.prototype.prependListener = function ( listener, type, name ) {
	if ( type === 'tag' ) {
		if ( $.isArray(this.transformers.tag.name) ) {
			this.transformers.tag[name].unshift(listener);
		} else {
			this.transformers.tag[name] = [listener];
		}
	} else {
		this.transformers[type].unshift(listener);
	}
};

TokenTransformer.prototype.removeListener = function ( listener, type, name ) {
	var i = -1;
	var ts;
	if ( type === 'tag' ) {
		if ( $.isArray(this.transformers.tag.name) ) {
			ts = this.transformers.tag[name];
			i = ts.indexOf(listener);
		}
	} else {
		ts = this.transformers[type];
		i = ts.indexOf(listener);
	}
	if ( i >= 0 ) {
		ts.splice(i, 1);
	}
};

/* Constructor for information context relevant to token transformers
 *
 * @param token The token to precess
 * @param accum {TokenAccumulator} The active TokenAccumulator.
 * @param processor {TokenTransformer} The TokenTransformer object.
 * @param lastToken Last returned token or {undefined}.
 * @returns {TokenContext}.
 */
function TokenContext ( token, accum, transformer, lastToken ) {
	this.token = token;
	this.accum = accum;
	this.transformer = transformer;
	this.lastToken = lastToken;
	return this;
}

/* Call all transformers on a tag.
 *
 * @param {TokenContext} The current token and its context.
 * @returns {TokenContext} Context with updated token and/or accum.
 */
TokenTransformer.prototype._transformTagToken = function ( tokenCTX ) {
	var ts = this.transformers.tag[tokenCTX.token.name];
	if ( ts ) {
		for (var i = 0, l = ts.length; i < l; i++ ) {
			// Transform token with side effects
			tokenCTX = ts[i]( tokenCTX );
			if ( tokenCTX.token === null || $.isArray(tokenCTX.token) ) {
				break;
			}

		}
	}
	return tokenCTX;
};

/* Call all transformers on other token types.
 *
 * @param tokenCTX {TokenContext} The current token and its context.
 * @param ts List of token transformers for this token type.
 * @returns {TokenContext} Context with updated token and/or accum.
 */
TokenTransformer.prototype._transformToken = function ( tokenCTX, ts ) {
	if ( ts ) {
		for (var i = 0, l = ts.length; i < l; i++ ) {
			tokenCTX = ts[i]( tokenCTX );
			if ( tokenCTX.token === null || $.isArray(tokenCTX.token) ) {
				break;
			}
		}
	}
	return tokenCTX;
};

/* Transform and expand tokens.
 *
 * Normally called with undefined accum. Asynchronous expansions will call
 * this with their known accum, which allows expanded tokens to be spliced in
 * at the appropriate location in the token list, which is always at the tail
 * end of the current accumulator.
 *
 * @param tokens {List of tokens} Tokens to process.
 * @param accum {TokenAccumulator} object. Undefined for first call, set to
 *				accumulator with expanded token at tail for asynchronous 
 *				expansions.
 * @returns nothing: Calls back registered callback if there are no more
 *					outstanding asynchronous expansions.
 * */
TokenTransformer.prototype.transformTokens = function ( tokens, accum ) {
	if ( accum === undefined ) {
		this.reset();
		accum = this.accum;
	} else {
		// Prepare to replace the last token in the current accumulator.
		accum.pop();
	}
	var tokenCTX = new TokenContext(undefined, accum, this, undefined);
	for ( var i = 0, l = tokens.length; i < l; i++ ) {
		tokenCTX.lastToken = tokenCTX.token;
		tokenCTX.token = tokens[i];
		var ts;
		switch(tokenCTX.token.type) {
			case 'TAG':
			case 'ENDTAG':
			case 'SELFCLOSINGTAG':
				tokenCTX = this._transformTagToken( tokenCTX );
				break;
			case 'TEXT':
				tokenCTX = this._transformToken( tokenCTX, this.transformers.text );
				break;
			case 'COMMENT':
				tokenCTX = this._transformToken( tokenCTX, this.transformers.comment);
				break;
			case 'NEWLINE':
				tokenCTX = this._transformToken( tokenCTX, this.transformers.newline );
				break;
			case 'END':
				tokenCTX = this._transformToken( tokenCTX, this.transformers.end );
				break;
			default:
				tokenCTX = this._transformToken( tokenCTX, this.transformers.martian );
				break;
		}
		if( $.isArray(tokenCTX.token) ) {
			// Splice in the returned tokens (while replacing the original
			// token), and process them next.
			[].splice.apply(tokens, [i, 1].concat(tokenCTX.token));
			l += res.token.length - 1;
			i--; // continue at first inserted token
		} else if (tokenCTX.token) {
			// push to accumulator (not necessarily the last one)
			accum.push(tokenCTX.token);
		}
		// Update current accum, in case a new one was spliced in by a
		// transformation starting asynch work.
		accum = tokenCTX.accum;
	}
	this.finish();
};

TokenTransformer.prototype.finish = function ( ) {
	this.outstanding--;
	if ( this.outstanding === 0 ) {
		// Join the token accumulators back into a single token list
		var a = this.firstaccum;
		var tokens = a.accum;
		while ( a.next !== undefined ) {
			a = a.next;
			tokens.concat(a.accum);
		}
		// Call our callback with the flattened token list
		this.cb(tokens);
	}
};

/* Start a new accumulator for asynchronous work. */
TokenTransformer.prototype.newAccumulator = function ( ) {
	this.outstanding++;
	return this.accum.insertAccumulator( );
};

// Token accumulators in a linked list. Using a linked list simplifies async
// callbacks for template expansions.
function TokenAccumulator ( next, tokens ) {
	this.next = next;
	if ( tokens )
		this.accum = tokens;
	else
		this.accum = [];
}

TokenAccumulator.prototype.push = function ( token ) {
	this.accum.push(token);
};

TokenAccumulator.prototype.pop = function ( ) {
	return this.accum.pop();
};

TokenAccumulator.prototype.insertAccumulator = function ( ) {
	this.next = new TokenAccumulator(this.next, tokens);
	return this.next;
};

if (typeof module == "object") {
	module.exports.TokenTransformer = TokenTransformer;
}
