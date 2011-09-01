es.BlockController = function() {
	// manage interactions
};

es.BlockController.prototype.commit = function( transaction ) {
	// commit transaction
};

es.BlockController.prototype.rollback = function( transaction ) {
	// rollback transaction
};

es.BlockController.prototype.prepareInsertContent = function( offset, content ) {
	// generate transaction
};

es.BlockController.prototype.prepareRemoveContent = function( range ) {
	// generate transaction
};

es.BlockController.prototype.prepareAnnotateContent = function( range, annotation ) {
	// generate transaction
};
