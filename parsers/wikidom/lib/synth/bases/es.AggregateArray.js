/**
 * Creates an es.AggregateArray object.
 * 
 * A content series is an array of items which have a getLength method. 
 */
es.AggregateArray = function( items ) {
	var series = items || [];
	$.extend( series, this );
	return series;
};

es.AggregateArray.prototype.lookup = function( offset ) {
	if ( this.length ) {
		var i = 0,
			length = this.length,
			left = 0,
			right;
		while ( i < length ) {
			right = left + this[i].getLength() + 1;
			if ( offset >= left && offset < right ) {
				return this[i];
			}
			left = right;
			i++;
		}
	}
	return null;
};

es.AggregateArray.prototype.offsetOf = function( item ) {
	if ( this.length ) {
		var offset = 0;
		for( var i = 0; i < this.length; i++ ) {
			if ( this[i] === item ) {
				return offset;
			}
			offset += this[i].getLength() + 1;
		}
	}
	return null;
};

es.AggregateArray.prototype.rangeOf = function( item ) {
	if ( this.length ) {
		var i = 0,
			length = this.length,
			left = 0;
		while ( i < length ) {
			if ( this[i] === item ) {
				return new es.Range( left, left + this[i].getLength() );
			}
			left += this[i].getLength() + 1;
			i++;
		}
	}
	return null;
};

es.AggregateArray.prototype.getLengthOfItems = function() {
	var sum = 0;
	for ( var i = 0, length = this.length; i < length; i++ ) {
		sum += this[i].getLength();
	}
	return Math.max( 0, sum + this.length - 1 );
};

es.AggregateArray.prototype.select = function( start, end, off ) {
	var	result = { 'on': [], 'off': [] },
		left = 0,
		right,
		items = [];
	off = off || false;

	if ( typeof start.from === 'number' && typeof start.to === 'number') {
		start.normalize();
		end = start.end;
		start = start.start;
	}

	for ( var i = 0, length = this.length; i < length; i++ ) {
		right = left + this[i].getLength() + 1;
		if ( start >= left && start < right ) {
			if ( end < right ) {
				result.on.push( {
					'item': this[i],
					'from': start - left,
					'to': end - left
				} );
				if ( off === false ) {
					break;
				}
			} else {
				result.on.push( {
					'item': this[i],
					'from': start - left,
					'to': right - left - 1
				} );	
			}
		} else if ( end >= left && end < right ) {
			result.on.push( {
				'item': this[i],
				'from': 0,
				'to': end - left
			} );
			if ( off === false ) {
				break;
			}
		} else if ( left >= start && right <= end ) {
			result.on.push( {
				'item': this[i],
				'from': 0,
				'to': right - left - 1
			} );
		} else if( off === true ) {
			result.off.push( this[i] );
		}
		left = right;
	}

	return result;
};