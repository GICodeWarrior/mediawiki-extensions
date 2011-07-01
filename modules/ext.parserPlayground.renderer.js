/**
 * @param {ParserContext} context
 */
function MWTreeRenderer(context) {
	// whee
	this.context = context || {};
}

/**
 * @param {object} tree
 * @param {function(domnode, error)} callback
 * @param {HashMap} inspectorMap
 */
MWTreeRenderer.prototype.treeToHtml = function(tree, callback, inspectorMap) {
	var self = this;
	var subParseArray = function(listOfTrees, node) {
		$.each(listOfTrees, function(i, subtree) {
			self.treeToHtml(subtree, function(subnode, err) {
				if (subnode) {
					node.append(subnode);
				}
			}, inspectorMap);
		});
	};
	var node;
	switch (tree.type) {
		case 'page':
			// A sequence of block-level elements...
			var page = $('<div class="parseNode"></div>');
			subParseArray(tree.content, page);
			if (self.context.refs) {
				// We're at the end; drop all the remaining refs!
				subParseArray([{
					type: 'ext',
					name: 'references'
				}], page);
			}
			node = page[0];
			break;
		case 'para':
			// A single-line paragraph.
			var para = $('<p class="parseNode"></p>');
			subParseArray(tree.content, para);
			node = para[0];
			break;
		case 'break':
			// Just a stub in the parse tree.
			break;
		case 'text':
			// hack hack
			node = document.createTextNode(tree.text);
			break;
		case 'link':
			var link = $('<a class="parseNode"></a>');
			link.text(tree.text || tree.target);
			link.attr('href', '/wiki/' + tree.target); // hack
			node = link[0];
			break;
		case 'extlink':
			var link = $('<a class="parseNode"></a>');
			link.text(tree.text || tree.target); // fixme? #d links, freelinks etc
			link.attr('href', tree.target); // hack: validate etc
			node = link[0];
			break;
		case 'h':
			var h = $('<h' + tree.level + ' class="parseNode"></h' + tree.level + '>').text(tree.text);
			node = h[0];
			break;
		case 'b':
			var h = $('<b class="parseNode"></b>').text(tree.text); // hack -- use contents[]
			node = h[0];
			break;
		case 'i':
			var h = $('<i class="parseNode"></i>').text(tree.text); // hack -- use contents[]
			node = h[0];
			break;
		case 'template':
			var t = $('<span class="parseNode template"></span>').text('{{' + tree.target);
			if ('params' in tree) {
				$.each(tree.params, function(i, param) {
					var str = param.contents;
					if ('name' in param) {
						str = param.name + '=' + str;
					}
					var p = $('<span></span>').text('|' + str);
					t.append(p);
				});
			}
			t.append('}}');
			node = t[0];
			break;
		case 'ext':
			if (tree.name == 'ref') {
				// Save the reference for later!
				// @fixme names etc?
				if (self.context.refs === undefined) {
					self.context.refs = [];
				}
				self.context.refs.push(tree);
				var refNum = self.context.refs.length;
				var ref = $('<span class="ref parseNode">[</span>');
				$('<a></a>')
					.text(refNum + '')
					.attr('src', '#ref-' + refNum)
					.appendTo(ref);
				ref.append(']');
				node = ref[0];
			} else if (tree.name == 'references') {
				// Force inline expansion of references with a given group
				// @fixme support multiple groups etc
				var references = $('<ol class="references parseNode"></ol>');
				var oldRefs = self.context.refs;
				self.context.refs = [];
				$.each(oldRefs, function(i, subtree) {
					var ref = $('<li class="ref parseNode" id="ref-' + i + '"></li>');
					if ('content' in subtree) {
						subParseArray(subtree.content, ref);
					}
					references.append(ref);
				});
				node = references[0];
			} else if (tree.name == 'cite') {
				// Kinda like a ref but inline.
				// @fixme validate and output the tag parameters
				var cite = $('<span class="cite parseNode"></span>');
				if ('content' in tree) {
					subParseArray(tree.content, cite);
				}
				node = cite[0];
			} else {
				// @fixme unrecognized exts should output as text + rendered contents?
				callback(null, 'Unrecognized extension in parse tree');
				return;
			}
			break;
		case 'comment':
			var h = $('<span class="parseNode comment"></span>').text('<!--' + tree.text + '-->');
			node = h[0];
			break;
		default:
			callback(null, 'Unrecognized parse tree node');
			return;
	}
	if (node) {
		if (node.nodeType == 1) {
			$(node).data('parseNode', tree); // assign the node for the tree inspector
			if (inspectorMap) {
				inspectorMap.put(tree, node); // store for reverse lookup
			}
		}
		callback(node);
	} else {
		callback(null); // hmmmm
	}
};
