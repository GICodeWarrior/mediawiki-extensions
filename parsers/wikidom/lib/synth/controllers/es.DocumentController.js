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

es.DocumentController.prototype.prepareInsertBlock = function( index, block ) {
	// generate transaction
};

es.DocumentController.prototype.prepareRemoveBlock = function( index ) {
	// generate transaction
};

es.DocumentController.prototype.prepareMoveBlock = function( index, index ) {
	// generate transaction
};

es.DocumentController.prototype.prepareSplitBlocks = function( offset ) {
	// generate transaction
};

es.DocumentController.prototype.prepareMergeBlocks = function( range ) {
	// generate transaction
};

es.DocumentController.prototype.prepareConvertBlock = function( index, type ) {
	// generate transaction
};
