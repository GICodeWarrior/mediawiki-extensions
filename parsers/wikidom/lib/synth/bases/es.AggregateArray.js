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

es.AggregateArray.prototype.select = function( start, end ) {
	// Support es.Range object as first argument
	if ( typeof start.from === 'number' && typeof start.to === 'number') {
		start.normalize();
		end = start.end;
		start = start.start;
	}
	var items = [];
	if ( this.length ) {
		var i = 0,
			length = this.length,
			left = 0,
			right,
			inside = false,
			from,
			to;
		while ( i < length ) {
			right = left + this[i].getLength() + 1;
			if ( inside ) {
				// Append items until we reach the end
				from = 0;
				to = Math.min( right - left - 1, end - left );
				if ( from !== to ) {
					items.push( { 'item': this[i], 'from': from, 'to': to } );
				}
				if ( end >= left && end < right ) {
					break;
				}
			} else if ( start >= left && start < right ) {
				inside = true;
				// Append first item
				from = start - left;
				to = Math.min( right - 1, end - left );
				if ( from !== to ) {
					items.push( { 'item': this[i], 'from': from, 'to': to } );
				}
				if ( right >= end ) {
					break;
				}
			}
			left = right;
			i++;
		}
	}
	return items;
};
