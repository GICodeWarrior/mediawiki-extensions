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

es.EventEmitter.prototype.on = function( type, listener ) {
	this.addListener( type, listener );
};

es.EventEmitter.prototype.once = function( type, listener ) {
	var that = this;
	this.addListener( type, function g() {
		that.removeListener( type, g );
		listener.apply( that, arguments );
	} );
};

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

es.EventEmitter.prototype.removeAllListeners = function( type ) {
	if ( type in this.events ) {
		delete this.events[type];
	}
	return this;
};

es.EventEmitter.prototype.listeners = function( type ) {
	return type in this.events ? this.events[type] : [];
};
