es.Mutation = function( transactions ) {
	this.transactions = transactions || [];
};

es.Mutation.prototype.add = function( id, transaction ) {
	this.transactions.push( { 'block': id, 'transaction': transaction } );
};

es.Mutation.prototype.commit = function() {
	
};

es.Mutation.prototype.rollback = function() {
	
};
