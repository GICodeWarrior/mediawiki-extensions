es.DocumentController = function() {
	// manage interactions
};

es.DocumentController.prototype.commit = function( transaction ) {
	// commit transaction
};

es.DocumentController.prototype.rollback = function( transaction ) {
	// rollback transaction
};

es.DocumentController.prototype.prepareInsertContent = function( offset, content ) {
	// generate transaction
};

es.DocumentController.prototype.prepareRemoveContent = function( range ) {
	// generate transaction
};

es.DocumentController.prototype.prepareAnnotateContent = function( range, annotation ) {
	// generate transaction
};
