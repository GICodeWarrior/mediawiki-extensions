window.WikiSyncUtils = {
	// browser-independent addevent function
	addEvent : function ( obj, type, fn ) {
		if ( document.getElementById && document.createTextNode ) {
			if (obj.addEventListener) {
				obj.addEventListener( type, fn, false );
			}
			else if (obj.attachEvent) {
				obj["e"+type+fn] = fn;
				obj[type+fn] = function() { obj["e"+type+fn]( window.event ); }
				obj.attachEvent( "on"+type, obj[type+fn] );
			}
			else {
				obj["on"+type] = obj["e"+type+fn];
			}
		}
	},

	getEventObj : function ( event, stopPropagation ) {
		var obj;
		if ( typeof event.target !== 'undefined' ) {
			obj = event.target;
			if ( stopPropagation ) {
				event.stopPropagation();
			}
		} else {
			obj = event.srcElement;
			if ( stopPropagation ) {
				event.cancelBubble = true;
			}
		}
		return obj;
	}

};

/**
 * percents indicator class
 * @param id - id of table container for percents indicator
 */
window.WikiSyncPercentsIndicator = function( id ) {
	this.topElement = document.getElementById( id );
	var tr1 = this.topElement.firstChild.firstChild;
	// description line will be stored there
	this.descriptionContainer = tr1.firstChild;
	var tr2 = tr1.nextSibling;
	// td1 and td2 are used together as percent indicators
	this.td1 = tr2.firstChild;
	this.td2 = this.td1.nextSibling;
	this.reset();
}
WikiSyncPercentsIndicator.prototype.setVisibility = function( visible ) {
	this.topElement.style.display = visible ? 'table' : 'none';
}
/**
 * @access private
 */
WikiSyncPercentsIndicator.prototype.setPercents = function( element, percent ) {
	element.style.display = (percent > 0) ? 'table-cell' : 'none';
	element.style.width = percent + '%';
}
WikiSyncPercentsIndicator.prototype.reset = function() {
	this.iterations = { 'desc' : '', 'curr' : 0, 'min' : 0, 'max' : 0 };
	this.display();
},
WikiSyncPercentsIndicator.prototype.display = function( indicator ) {
	if ( typeof indicator !== 'undefined' ) {
		if ( typeof indicator.desc !== 'undefined' ) {
			this.iterations.desc = '' + indicator.desc;
		}
		if ( typeof indicator.curr !== 'undefined' ) {
			if ( indicator.curr === 'max' ) {
				this.iterations.curr = this.iterations.max;
			} else if ( indicator.curr === 'next' ) {
				this.iterations.curr++;
			} else {
				this.iterations.curr = parseInt( indicator.curr );
			}
		}
		if ( typeof indicator.min !== 'undefined' ) {
			this.iterations.min = parseInt( indicator.min );
		}
		if ( typeof indicator.max !== 'undefined' ) {
			this.iterations.max = parseInt( indicator.max );
		}
	}
	// display process description
	var text = document.createTextNode( this.iterations.desc );
	if ( this.descriptionContainer.firstChild === null ) {
		this.descriptionContainer.appendChild( text );
	} else {
		this.descriptionContainer.replaceChild( text, this.descriptionContainer.firstChild );
	}
	// calculate percent
	var percent;
	var len = this.iterations.max - this.iterations.min;
	if ( len === 0 ) {
		percent = 0;
	} else {
		percent = ( this.iterations.curr - this.iterations.min ) / len * 100;
	}
	if ( percent < 0 ) { percent = 0 }
	if ( percent > 100 ) { percent = 100 }
	// show percent
	this.setPercents( this.td1, percent );
	this.setPercents( this.td2, 100 - percent );
} /* end of WikiSyncPercentsIndicator class */
