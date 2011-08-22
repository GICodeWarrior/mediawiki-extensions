/**
 * Content selection, a pair of locations.
 * 
 * @class
 * @constructor
 * @param from {es.Location} Starting location
 * @param to {es.Location} Ending location
 * @property from {es.Location} Starting location
 * @property to {es.Location} Ending location
 * @property start {es.Location} Normalized starting location
 * @property end {es.Location} Normalized ending location
 */
es.Selection = function( from, to ) {
	this.from = from;
	this.to = to;
	this.start = from;
	this.end = to;
}

/* Methods */

/**
 * Sets start and end properties, ensuring start is always before end.
 * 
 * This should always be called before using the start or end properties. Do not call this unless
 * you are about to use these properties.
 * 
 * @method
 */
es.Selection.prototype.normalize = function() {
	if ( this.from.compareWith( this.to ) < 1 ) {
		this.start = this.from;
		this.end = this.to;
	} else {
		this.start = this.to;
		this.end = this.from;
	}
};

es.Selection.prototype.prepareInsert = function( content ) {
	this.normalize();
	if ( this.start ) {
		var mutation;
		if ( this.end && this.start.compareWith( end ) < 0 ) {
			mutation = this.prepareRemove();
		} else {
			mutation = new es.Mutation();
		}
		mutation.add( this.start.block.getIndex(), this.start.block.prepareInsert( content ) );
		return mutation;
	}
	throw 'Mutation preparation error. Can not insert content at undefined location.';
};

es.Selection.prototype.prepareRemove = function() {
	this.normalize();
	var mutation = new es.Mutation();
	if ( this.start.block === this.end.block ) {
		// Single block deletion
		mutation.add(
			this.start.block.getIndex(),
			this.start.block.prepareRemove( new es.Range( this.start.offset, this.end.offset ) )
		);
	} else {
		// Multiple block deletion
		var block = this.start.block.next();
		// First
		mutation.add(
			block.getIndex(),
			block.prepareRemove( new es.Range( this.start.offset, block.getLength() ) )
		);
		while ( ( block = block.next() ) !== this.end.block ) {
			// Middle
			mutation.add(
				block.getIndex(), block.prepareRemove( new es.Range( 0, block.getLength() ) )
			);
		}
		// Last
		mutation.add( block.getIndex(), block.prepareRemove( new es.Range( 0, this.end.offset ) ) );
	}
	return mutation;
};

es.Selection.prototype.prepareAnnotate = function() {
	this.normalize();
	var mutation = new es.Mutation();
	if ( this.start.block === this.end.block ) {
		// Single block annotation
		mutation.add(
			this.start.block.getIndex(), 
			this.start.block.prepareRemove( new es.Range( this.start.offset, this.end.offset ) )
		);
	} else {
		// Multiple block annotation
		var block = this.start.block.next();
		// First
		mutation.add(
			block.getIndex(),
			block.prepareAnnotate(
				annotation, new es.Range( this.start.offset, block.getLength() )
			)
		);
		while ( ( block = block.next() ) !== this.end.block ) {
			// Middle
			mutation.add(
				block.getIndex(), 
				block.prepareAnnotate( annotation, new es.Range( 0, block.getLength() ) )
			);
		}
		// Last
		mutation.add(
			block.getIndex(),
			block.prepareAnnotate( annotation, new es.Range( 0, this.end.offset ) )
		);
	}
	return mutation;
};
