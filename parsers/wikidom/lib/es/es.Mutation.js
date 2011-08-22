es.Mutation = function( transactions ) {
	this.transactions = transactions || [];
};

es.Mutation.prototype.add = function( index, transaction ) {
	this.transactions.push( { 'block': index, 'transaction': transaction } );
};

es.Mutation.prototype.commit = function( document ) {
	for ( var i = 0; i < this.transactions.length; i++ ) {
		this.transactions[i].transaction.commit( document.get( this.transactions[i].block ) );
	}
};

es.Mutation.prototype.rollback = function( document ) {
	for ( var i = 0; i < this.transactions.length; i++ ) {
		this.transactions[i].transaction.rollback( document.get( this.transactions[i].block ) );
	}
};
