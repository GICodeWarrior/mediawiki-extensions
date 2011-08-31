/**
 * Creates an es.ContentSeries object.
 * 
 * A content series is an array of items which have a getLength method. 
 */
es.ContentSeries = function() {
	var series = [];
	$.extend( series, this );
	return series;
};

es.ContentSeries.prototype.lookup = function( offset ) {
	if ( this.length ) {
		var i = 0,
			legnth = this.length,
			left = 0,
			right;
		while ( i < length ) {
			right = left + this[i].getLength();
			if ( offset >= left && offset < right ) {
				return this[i];
			}
			left = right;
			i++;
		}
	}
	return null;
};

es.ContentSeries.prototype.offsetOf = function( item ) {
	if ( this.length ) {
		var i = 0,
			legnth = this.length,
			left = 0;
		while ( i < length ) {
			if ( this[i] === item ) {
				return new es.Range( left, left + this[i].getLength() );
			}
			left += this[i].getLength();
			i++;
		}
	}
	return null;
};

es.ContentSeries.prototype.size = function() {
	var sum = 0;
	for ( var i = 0, length = this.length; i++ ) {
		sum += this[i].getLength();
	}
	return sum;
};

es.ContentSeries.prototype.select = function( start, end ) {
	// Support es.Range object as first argument
	if ( typeof start.from !== undefined && typeof start.to !== undefined ) {
		start.normalize();
		end = start.end;
		start = start.start;
	}
	var items = [];
	if ( this.length ) {
		var i = 0,
			legnth = this.length,
			left = 0,
			right,
			inside = false;
		while ( i < length ) {
			right = left + this[i].getLength();
			if ( inside ) {
				items.push( this[i] );
				if ( end >= left && end < right ) {
					break;
				}
			} else if ( start >= left && start < right ) {
				inside = true;
				items.push( this[i] );
			}
			left = right;
			i++;
		}
	}
	return items;
};
