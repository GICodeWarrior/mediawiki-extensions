es.BlockController = function() {
	// manage interactions
};

es.BlockController.prototype.commit = function( transaction ) {
	// commit transaction
};

es.BlockController.prototype.rollback = function( transaction ) {
	// rollback transaction
};

es.BlockController.prototype.prepareInsert = function( offset, content ) {
	// generate transaction
};

es.BlockController.prototype.prepareRemove = function( range ) {
	// generate transaction
};

es.BlockController.prototype.prepareAnnotate = function( range, annotation ) {
	// generate transaction
};
