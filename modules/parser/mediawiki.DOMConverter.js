/**
 * Conversions between HTML DOM and WikiDom
 * 
 * @class
 * @constructor
 */
function DOMConverter () {
}

// Quick HACK: define Node constants
// https://developer.mozilla.org/en/nodeType
var Node = {
	ELEMENT_NODE: 1,
    ATTRIBUTE_NODE: 2,
    TEXT_NODE: 3,
    CDATA_SECTION_NODE: 4,
    ENTITY_REFERENCE_NODE: 5,
    ENTITY_NODE: 6,
    PROCESSING_INSTRUCTION_NODE: 7,
    COMMENT_NODE: 8,
    DOCUMENT_NODE: 9,
    DOCUMENT_TYPE_NODE: 10,
    DOCUMENT_FRAGMENT_NODE: 11,
    NOTATION_NODE: 12
};

DOMConverter.prototype.getHTMLHandlerInfo = function ( nodeName ) {
	switch ( nodeName.toLowerCase() ) {
		case 'p':
			return {
				handler: this._convertHTMLLeaf, 
				type: 'paragraph'
			};
		case 'h1':
		case 'h2':
		case 'h3':
		case 'h4':
		case 'h5':
		case 'h6':
			var res = {
				handler: this._convertHTMLLeaf, 
				type: 'heading',
				attribs: { }
			};
			switch ( nodeName.toLowerCase() ) {
				case 'h1': res.attribs.level = 1; break;
				case 'h2': res.attribs.level = 2; break;
				case 'h3': res.attribs.level = 3; break;
				case 'h4': res.attribs.level = 4; break;
				case 'h5': res.attribs.level = 5; break;
				case 'h6': res.attribs.level = 6; break;
			}
			return res;
		case 'li':
		case 'dt':
		case 'dd':
			return {
				handler: this._convertHTMLBranch, 
				type: 'listItem'
			};
		case 'pre':
			return {
				handler: this._convertHTMLLeaf, 
				type: 'pre'
			};
		case 'table':
			return {
				handler: this._convertHTMLBranch, 
				type: 'table'
			};
		case 'tbody':
			return {
				handler: this._convertHTMLBranch, 
				type: 'tbody' // not in WikiDom!
			};
		case 'tr':
			return {
				handler: this._convertHTMLBranch, 
				type: 'tableRow'
			};
		case 'th':
			return {
				handler: this._convertHTMLBranch, 
				type: 'tableHeading'
			};
		case 'td':
			return {
				handler: this._convertHTMLBranch, 
				type: 'tableCell'
			};
		case 'caption':
			return {
				handler: this._convertHTMLBranch, 
				type: 'caption'
			};
		case 'table':
			return {
				handler: this._convertHTMLBranch, 
				type: 'table'
			};
		case 'hr':
			return {
				handler: this._convertHTMLLeaf, 
				type: 'horizontalRule' // XXX?
			};
		case 'ul':
		case 'ol':
		case 'dl':
			return {
				handler: this._convertHTMLBranch, 
				type: 'list'
			};
		case 'center':
			//XXX: center is block-level in HTML, not sure what it should be
			//in WikiDOM..
			return {
				handler: this._convertHTMLBranch, 
				type: 'center'
			};
		case 'blockquote':
			//XXX: blockquote is block-level in HTML, not sure what it should be
			//in WikiDOM..
			return {
				handler: this._convertHTMLBranch, 
				type: 'blockquote'
			};
		default:
			console.log( 'HTML to Wiki DOM conversion error. Unsupported node name ' +
					nodeName );
			return {
				handler: this._convertHTMLBranch, 
				type: nodeName.toLowerCase()
			};
	}
};

DOMConverter.prototype.getHTMLAnnotationType = function ( nodeName, warn ) {
	switch ( nodeName.toLowerCase() ) {
		case 'i':
			return 'textStyle/italic';
		case 'b':
			return 'textStyle/bold';
		case 'span':
			return 'textStyle/span';
		case 'a':
			return 'link/unknown'; // XXX: distinguish internal / external etc
		case 'template':
			return 'object/template';
		case 'ref':
			return 'object/hook';
		case 'includeonly':
			return 'object/includeonly'; // XXX
		default:
			if ( warn ) {
				console.log( 'HTML to Wiki DOM conversion error. Unsupported html annotation ' +
						nodeName );
			}
			return undefined;
	}
};

/**
 * Convert a HTML DOM to WikiDom
 *
 * @method
 * @param {Object} root of HTML DOM (usually the body element)
 * @returns {Object} WikiDom version
 */
DOMConverter.prototype.HTMLtoWiki = function ( node ) {
	var children = node.childNodes,
		out = {
			type: 'document',
			children: []
		};
	for ( var i = 0, l = children.length; i < l; i++ ) {
		var cnode = children[i];
		switch ( cnode.nodeType ) {
			case Node.ELEMENT_NODE:
				// Call a handler for the particular node type
				var hi = this.getHTMLHandlerInfo( cnode.nodeName );
				var res = hi.handler.call(this, cnode, hi.type );
				if ( hi.attribs ) {
					$.extend( res.node.attributes, hi.attribs );
				}
				out.children.push( res.node );
				break;
			case Node.TEXT_NODE:
				// Add text as content, and increment offset
				// BUT: Should not appear at toplevel!
				break;
			case Node.COMMENT_NODE:
				// Add a comment annotation to which text? Not clear how this
				// can be represented in WikiDom.
				break;
			default:
				console.log( "HTML to Wiki DOM conversion error. Unhandled node type " + 
						cnode.innerHTML );
				break;
		}
	}
	return out;
};

/**
 * Private HTML branch node handler
 *
 * @param {Object} HTML DOM element
 * @param {Int} WikiDom offset within a block
 * @returns {Object} WikiDom object
 */
DOMConverter.prototype._convertHTMLBranch = function ( node, type ) {

	var children = node.childNodes,
		wnode = {
			type: type,
			attributes: this._HTMLPropertiesToWikiAttributes( node ),
			children: [] 
		},
		parNode = null,
		offset = 0,
		res;

	function newPara () {
		offset = 0;
		parNode = { 
			type: 'paragraph', 
			content: {
				text: '',
				annotations: []
			}
		};
		wnode.children.push( parNode );
	}

	for ( var i = 0, l = children.length; i < l; i++ ) {
		var cnode = children[i];
		switch ( cnode.nodeType ) {
			case Node.ELEMENT_NODE:
				// Check if element type is an annotation
				var annotationtype = this.getHTMLAnnotationType( cnode.nodeName );
				if ( annotationtype ) {
					if ( !parNode ) {
						newPara();
					}
					offset = 0;
					res = this._convertHTMLAnnotation( cnode, 0, annotationtype );
					//console.log( 'res leaf: ' + JSON.stringify(res, null, 2));
					offset += res.text.length;
					parNode.content.text += res.text;
					//console.log( 'res annotations: ' + JSON.stringify(res, null, 2));
					parNode.content.annotations = parNode.content.annotations
														.concat( res.annotations );
				} else {
					// Close last paragraph, if still open.
					parNode = null;
					// Call a handler for the particular node type
					var hi = this.getHTMLHandlerInfo( cnode.nodeName );
					res = hi.handler.call(this, cnode, hi.type );
					if ( hi.attribs ) {
						$.extend( res.node.attributes, hi.attribs );
					}
					wnode.children.push( res.node );
					offset = res.offset;
				}
				break;
			case Node.TEXT_NODE:
				if ( !parNode ) {
					newPara();
				}
				parNode.content.text += cnode.data;
				offset += cnode.data.length;
				break;
			case Node.COMMENT_NODE:
				// add a comment node.
				break;
			default:
				console.log( "HTML to Wiki DOM conversion error. Unhandled node " + 
						cnode.innerHTML );
				break;
		}
	}
	return {
		offset: offset,
		node: wnode
	};
};

/**
 * Private HTML leaf node handler
 *
 * @param {Object} HTML DOM element
 * @param {Int} WikiDom offset within a block
 * @returns {Object} WikiDom object
 */
DOMConverter.prototype._convertHTMLLeaf = function ( node, type ) {
	var offset = 0;

	var children = node.childNodes,
		wnode = {
			type: type,
			attributes: this._HTMLPropertiesToWikiAttributes( node ),
			content: { 
				text: '',
				annotations: []
			}
		};
	//console.log( 'res wnode: ' + JSON.stringify(wnode, null, 2));
	for ( var i = 0, l = children.length; i < l; i++ ) {
		var cnode = children[i];
		switch ( cnode.nodeType ) {
			case Node.ELEMENT_NODE:
				// Call a handler for the particular annotation node type
				var annotationtype = this.getHTMLAnnotationType( cnode.nodeName, true );
				if ( annotationtype ) {
					var res = this._convertHTMLAnnotation( cnode, offset, annotationtype );
					//console.log( 'res leaf: ' + JSON.stringify(res, null, 2));
					offset += res.text.length;
					wnode.content.text += res.text;
					//console.log( 'res annotations: ' + JSON.stringify(res, null, 2));
					wnode.content.annotations = wnode.content.annotations
														.concat( res.annotations );
				}
				break;
			case Node.TEXT_NODE:
				// Add text as content, and increment offset
				wnode.content.text += cnode.data;
				offset += cnode.data.length;
				break;
			case Node.COMMENT_NODE:
				// add a comment annotation?
				break;
			default:
				console.log( "HTML to Wiki DOM conversion error. Unhandled node " + 
						cnode.innerHTML );
				break;
		}
	}
	return {
		offset: offset,
		node: wnode
	};
};

DOMConverter.prototype._convertHTMLAnnotation = function ( node, offset, type ) {
	var children = node.childNodes,
		text = '',
		annotations = [
				{
					type: type,
					data: this._HTMLPropertiesToWikiData( node ),
					range: {
						start: offset,
						end: offset
					}
				}
		];
	for ( var i = 0, l = children.length; i < l; i++ ) {
		var cnode = children[i];
		switch ( cnode.nodeType ) {
			case Node.ELEMENT_NODE:
				// Call a handler for the particular annotation node type
				var annotationtype = this.getHTMLAnnotationType(cnode.nodeName, true);
				if ( annotationtype ) {
					var res = this._convertHTMLAnnotation( cnode, offset, annotationtype );
					//console.log( 'res annotations 2: ' + JSON.stringify(res, null, 2));
					text += res.text;
					offset += res.text.length;
					annotations = annotations.concat( res.annotations );
				}
				break;
			case Node.TEXT_NODE:
				// Add text as content, and increment offset
				text += cnode.data;
				offset += cnode.data.length;
				break;
			case Node.COMMENT_NODE:
				// add a comment annotation?
				break;
			default:
				console.log( "HTML to Wiki DOM conversion error. Unhandled node " + 
						cnode.innerHTML );
				break;
		}
	}
	annotations[0].range.end = offset;
	return	{
		text: text,
		annotations: annotations
	};
};

DOMConverter.prototype._HTMLPropertiesToWikiAttributes = function ( elem ) {
	var attribs = elem.attributes,
		out = {};
	for ( var i = 0, l = attribs.length; i < l; i++ ) {
		var attrib = attribs.item(i),
			key = attrib.name;
		if ( key.match( /^data-json-/ ) ) {
			// strip data- prefix from data-*
			out[key.replace( /^data-json-/, '' )] = JSON.parse(attrib.value);
		} else if ( key.match( /^data-/ ) ) {
			// strip data- prefix from data-*
			out[key.replace( /^data-/, '' )] = attrib.value;
		} else {
			// prefix html properties with html/
			out['html/' + key] = attrib.value;
		}
	}
	return out;
};

DOMConverter.prototype._HTMLPropertiesToWikiData = function ( elem ) {
	var attribs = elem.attributes,
		out = {};
	for ( var i = 0, l = attribs.length; i < l; i++ ) {
		var attrib = attribs.item(i),
			key = attrib.name;
		if ( key.match( /^data-json-/ ) ) {
			// strip data- prefix from data-*
			out[key.replace( /^data-json-/, '' )] = JSON.parse(attrib.value);
		} else if ( key.match( /^data-/ ) ) {
			// strip data- prefix from data-*
			out[key.replace( /^data-/, '' )] = attrib.value;
		} else {
			// pass through a few whitelisted keys
			// XXX: This subsets html DOM
			if ( ['title'].indexOf(key) != -1 ) {
				out[key] = attrib.value;
			} else {
				// prefix key with 'html/'
				out['html/' + key] = attrib.value;
			}
		}
	}
	return out;
};


if (typeof module == "object") {
	module.exports.DOMConverter = DOMConverter;
}
