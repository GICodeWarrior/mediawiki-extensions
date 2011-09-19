es.ContentController = function( contentView ) {
	this.contentView = contentView;
};

es.ContentController.prototype.commit = function( transaction ) {
	// commit transaction
};

es.ContentController.prototype.rollback = function( transaction ) {
	// rollback transaction
};

es.ContentController.prototype.prepareInsertContent = function( offset, content ) {
	// generate transaction
};

es.ContentController.prototype.prepareRemoveContent = function( range ) {
	// generate transaction
};

es.ContentController.prototype.prepareAnnotateContent = function( range, annotation ) {
	// generate transaction
};

/* Inheritance */

es.extend( es.ContentController );
