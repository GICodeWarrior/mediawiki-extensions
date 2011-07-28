/**
 * Event emitter.
 * 
 * @class
 * @constructor
 * @property events {Object}
 */
es.EventEmitter = function() {
	this.events = {};
}

/* Methods */

/**
 * Emits an event.
 * 
 * @method
 * @param type {String} Type of event
 * @param args {Mixed} First in a list of variadic arguments passed to event handler (optional)
 * @returns {Boolean} If event was handled by at least one listener
 */
es.EventEmitter.prototype.emit = function( type ) {
	if ( type === 'error' && !( 'error' in this.events ) ) {
		throw 'Missing error handler error.';
	}
	if ( !( type in this.events ) ) {
		return false;
	}
	var listeners = this.events[type].slice();
	var args = Array.prototype.slice.call( arguments, 1 );
	for ( var i = 0; i < listeners.length; i++ ) {
		listeners[i].apply( this, args );
	}
	return true;
};

/**
 * Adds a listener to events of a specific type.
 * 
 * @method
 * @param type {String} Type of event to listen to
 * @param listener {Function} Listener to call when event occurs
 * @returns {es.EventEmitter} This object
 * @throws "Invalid listener error" if listener argument is not a function
 */
es.EventEmitter.prototype.addListener = function( type, listener ) {
	if ( typeof listener !== 'function' ) {
		throw 'Invalid listener error. Function expected.';
	}
	this.emit( 'newListener', type, listener );
	if ( type in this.events ) {
		this.events[type].push( listener );
	} else {
		this.events[type] = [listener];
	}
	return this;
};

/**
 * Alias for addListener
 * 
 * @method
 */
es.EventEmitter.prototype.on = es.EventEmitter.prototype.addListener;

/**
 * Adds a one-time listener to a specific event.
 * 
 * @method
 * @param type {String} Type of event to listen to
 * @param listener {Function} Listener to call when event occurs
 * @returns {es.EventEmitter} This object
 */
es.EventEmitter.prototype.once = function( type, listener ) {
	var eventEmitter = this;
	return this.addListener( type, function listenerWrapper() {
		that.removeListener( type, listenerWrapper );
		listener.apply( eventEmitter, arguments );
	} );
};

/**
 * Removes a specific listener from a specific event.
 * 
 * @method
 * @param type {String} Type of event to remove listener from
 * @param listener {Function} Listener to remove
 * @returns {es.EventEmitter} This object
 * @throws "Invalid listener error" if listener argument is not a function
 */
es.EventEmitter.prototype.removeListener = function( type, listener ) {
	if ( typeof listener !== 'function' ) {
		throw 'Invalid listener error. Function expected.';
	}
	if ( !( type in this.events ) || !this.events[type].length ) {
		return this;
	}
	var handlers = this.events[type];
	if ( handlers.length == 1 && handlers[0] === listener ) {
		delete this.events[type];
	} else {
		var i = handlers.indexOf( listener );
		if ( i < 0 ) {
			return this;
		}
		handlers.splice( i, 1 );
		if ( handlers.length == 0 ) {
			delete this.events[type];
		}
	}
	return this;
};

/**
 * Removes all listeners from a specific event.
 * 
 * @method
 * @param type {String} Type of event to remove listeners from
 * @returns {es.EventEmitter} This object
 */
es.EventEmitter.prototype.removeAllListeners = function( type ) {
	if ( type in this.events ) {
		delete this.events[type];
	}
	return this;
};

/**
 * Gets a list of listeners attached to a specific event.
 * 
 * @method
 * @param type {String} Type of event to get listeners for
 * @returns {Array} List of listeners to an event
 */
es.EventEmitter.prototype.listeners = function( type ) {
	return type in this.events ? this.events[type] : [];
};
