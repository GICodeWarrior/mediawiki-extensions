/**
 * Creates an es.ContentSeries object.
 * 
 * A content series is an array of items which have a getLength method. 
 */
es.ContentSeries = function( items ) {
	var series = items || [];
	$.extend( series, this );
	return series;
};

es.ContentSeries.prototype.lookup = function( offset ) {
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

es.ContentSeries.prototype.rangeOf = function( item ) {
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

es.ContentSeries.prototype.getLengthOfItems = function() {
	var sum = 0;
	for ( var i = 0, length = this.length; i < length; i++ ) {
		sum += this[i].getLength();
	}
	return Math.max( 0, sum + this.length - 1 );
};

es.ContentSeries.prototype.select = function( start, end ) {
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
			inside = false;
		while ( i < length ) {
			right = left + this[i].getLength() + 1;
			if ( inside ) {
				items.push( {
					'item': this[i],
					'from': 0,
					'to': Math.min( right - left - 1, end - left )
				} );
				if ( end >= left && end < right ) {
					break;
				}
			} else if ( start >= left && start < right ) {
				inside = true;
				items.push( {
					'item': this[i],
					'from': Math.max( left, start ),
					'to': Math.min( right - 1, end )
				} );
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
