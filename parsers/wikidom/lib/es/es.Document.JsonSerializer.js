/**
 * Serializes a WikiDom into JSON.
 * 
 * @class
 * @constructor
 * @extends {es.Document.Serializer}
 * @param context {es.WikiContext} Context of the wiki the document is a part of
 */
es.Document.JsonSerializer = function( context ) {
	es.Document.Serializer.call( this, context );
};

/* Methods */

es.Document.JsonSerializer.prototype.serializeDocument = function( doc ) {
	return FormatJSON( doc );
};

/* Registration */

es.Document.serializers.json = function( doc, context ) {
	var serializer = new es.Document.JsonSerializer( context )
	return serializer.serializeDocument( doc );
};

/* Inheritance */

es.extend( es.Document.JsonSerializer, es.Document.Serializer );
