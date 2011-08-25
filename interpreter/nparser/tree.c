#include "parser.h"
#include <stdlib.h>
#include <memory.h>

ws_parser_tree* ws_parser_tree_init() {
	ws_parser_tree* tree;

	tree = malloc( sizeof( ws_parser_tree ) );
	if( !tree ) {
		return NULL;
	}
	memset( tree, '\0', sizeof( ws_parser_tree ) );

	tree->nodes = malloc( WS_TREE_SIZE_INIT * sizeof( ws_parser_node ) );
	tree->allocated = WS_TREE_SIZE_INIT;
	if( !tree->nodes ) {
		ws_parser_tree_free( tree );
		return NULL;
	}

	tree->links = malloc( WS_TREE_SIZE_INIT * sizeof( ws_parser_node_link ) );
	if( !tree->links ) {
		ws_parser_tree_free( tree );
		return NULL;
	}
	// Since 0 may be a valid link ID, we fill it with ~0
	memset( tree->links, UCHAR_MAX, WS_TREE_SIZE_INIT * sizeof( ws_parser_node_link ) );

	tree->symbols = malloc( WS_TREE_SIZE_INIT * sizeof( char* ) );
	if( !tree->symbols ) {
		ws_parser_tree_free( tree );
		return NULL;
	}

	tree->singleprods = malloc( WS_TREE_SIZE_INIT * sizeof( bool ) );
	if( !tree->singleprods ) {
		ws_parser_tree_free( tree );
		return NULL;
	}
	memset( tree->singleprods, '\0', WS_TREE_SIZE_INIT * sizeof( bool ) );

	return tree;
}

ws_parser_node_id ws_parser_tree_add(ws_parser_tree* tree, ws_parser_node node, char* symbol) {
	if( tree->finalized )
		return false;
	if( tree->allocated == tree->count ) {
		ws_parser_node_id newcount = tree->allocated + WS_TREE_SIZE_STEP;

		ws_parser_node* nodes;
		nodes = realloc( tree->nodes, newcount * sizeof( ws_parser_node ) );
		if( !nodes ) {
			return WS_NODE_ID_INVALID;
		}
		tree->nodes = nodes;

		ws_parser_node_link* links;
		links = realloc( tree->links, newcount * sizeof( ws_parser_node_link ) );
		if( !links ) {
			return WS_NODE_ID_INVALID;
		}
		tree->links = links;
		memset( tree->links + tree->count, UCHAR_MAX, WS_TREE_SIZE_STEP * sizeof( ws_parser_node_link ) );

		char** symbols;
		symbols = realloc( tree->symbols, newcount * sizeof( char* ) );
		if( !symbols ) {
			return WS_NODE_ID_INVALID;
		}
		tree->symbols = symbols;

		bool* singleprods;
		singleprods = realloc( tree->singleprods, newcount * sizeof( bool ) );
		if( !singleprods ) {
			return WS_NODE_ID_INVALID;
		}
		tree->singleprods = singleprods;
		memset( tree->singleprods + tree->count, '\0', WS_TREE_SIZE_STEP * sizeof( bool ) );

		tree->allocated += WS_TREE_SIZE_STEP;
	}

	ws_parser_node_id id = tree->count;
	tree->nodes[id] = node;
	if( symbol ) {
		tree->symbols[id] = malloc( strlen( symbol ) + 1 );
		if( !tree->symbols[id] ) {
			return WS_NODE_ID_INVALID;
		}
		strcpy( tree->symbols[id], symbol );	// Could be unsafe, but here we allocate memory based on strlen()
	} else {
		tree->symbols[id] = NULL;
	}
	tree->count++;
	return id;
}

bool ws_parser_tree_link(ws_parser_tree* tree, ws_parser_node_id parent, ws_parser_node_id child, uint8_t number) {
	if( tree->finalized || parent >= tree->count || child >= tree->count )
		return false;

	tree->links[child].parent = parent;
	tree->links[child].child = child;
	tree->links[child].number = number;
	return true;
}

void ws_parser_tree_set_root(ws_parser_tree* tree, ws_parser_node_id root) {
	tree->root = root;
}

int ws_parser_tree_compare_links(const void *link1_p, const void *link2_p) {
	ws_parser_node_link* link1 = (ws_parser_node_link*) link1_p;
	ws_parser_node_link* link2 = (ws_parser_node_link*) link2_p;
	if( link1->parent == link2->parent ) {
		return link1->number - link2->number;
	} else {
		return link1->parent - link2->parent;
	}
}

bool ws_parser_tree_finalize(ws_parser_tree* tree) {
	ws_parser_node_id i, j;

	// Reduce long single-member production branches
	for( i = 0; i < tree->count; i++ ) {
		if( tree->links[i].parent == WS_NODE_ID_INVALID )
			continue;

		ws_parser_node_id parentid = tree->links[i].parent;
		ws_parser_node *parent = tree->nodes + parentid;
		ws_parser_node *child  = tree->nodes + i;

		if( tree->singleprods[parentid] &&	// Parent has a single child
			tree->links[parentid].parent != WS_NODE_ID_INVALID && // Parent has parent
			child->type == WS_PARSER_NONTERM && 	// Child is a non-terminal
			strstr( ws_parser_nonterminal_names[parent->value], "expr" ) &&	// Both are expr nodes
			strstr( ws_parser_nonterminal_names[child->value],  "expr" ) )
		{
			// Relink
			tree->links[i].parent = tree->links[parentid].parent;
			tree->links[i].number = tree->links[parentid].number;

			// Destroy old link
			memset( &tree->links[parentid], UCHAR_MAX, sizeof( ws_parser_node_link ) );
			
			// There may be more nodes
			i--;
		}
	}

	free( tree->singleprods );
	tree->singleprods = NULL;

	// Remove orphan nodes and move the node at the end to the place of the removed ones
	for( i = 0; i < tree->count; i++ ) {
		if( tree->links[i].parent == WS_NODE_ID_INVALID && i != tree->root ) {
			ws_parser_node_id oldid = tree->count - 1;

			if( i == oldid ) {
				// It is a node at the end. Just discard it.
				tree->count--;
			} else {
				// Move it
				tree->nodes[i] = tree->nodes[oldid];
				tree->links[i] = tree->links[oldid];
				tree->symbols[i] = tree->symbols[oldid];

				// Update references
				tree->links[i].child = i;
				// FIXME: can this be optimized?
				for( j = 0; j < tree->count - 1; j++ ) {
					if( tree->links[j].parent == oldid )
						tree->links[j].parent = i;
				}
				if( oldid == tree->root ) {
					tree->root = i;
				}

				// Decrease counters and repeat step
				tree->count--;
				i--;
			}
		}
	}

	// Remove the empty link for the root node...
	tree->links[tree->root] = tree->links[tree->count - 1];
	// ...and sort them!
	qsort( tree->links, tree->count - 1, sizeof( ws_parser_node_link ), ws_parser_tree_compare_links );

	// Reallocate memory
	tree->nodes = realloc( tree->nodes, tree->count * sizeof( ws_parser_node ) );
	tree->links = realloc( tree->links, ( tree->count - 1 ) * sizeof( ws_parser_node_link ) );
	tree->symbols = realloc( tree->symbols, tree->count * sizeof( char* ) );

	// We are done
	tree->finalized = true;

	return true;
}

ws_parser_tree_children ws_parser_tree_search_children(ws_parser_tree* tree, ws_parser_node_id node) {
	ws_parser_tree_children result;
	ws_parser_node_link target;
	ws_parser_node_link* first;

	if( !tree->finalized || node >= tree->count ) {
		result.count = 0;
		result.links = NULL;
		return result;
	}

	target.parent = node;
	target.number = 0;
	first = bsearch( &target, tree->links, tree->count - 1, sizeof( ws_parser_node_link ), ws_parser_tree_compare_links );
	if( first ) {
		result.links = first;
		result.count = 0;

		ws_parser_node_link* cur;
		for( cur = first; cur < tree->links + tree->count - 1; cur++ ) {
			if( cur->parent == node )
				result.count++;
		}
	} else {
		result.count = 0;
		result.links = NULL;
	}

	return result;
}

void ws_parser_tree_free(ws_parser_tree* tree) {
	if( tree ) {
		if( tree->nodes )
			free( tree->nodes );

		if( tree->links )
			free( tree->links );

		if( tree->symbols ) {
			int i;

			for( i = 0; i < tree->count; i++ ) {
				if( tree->symbols[i] ) 
					free( tree->symbols[i] );
			}
			free( tree->symbols );
		}

		if( tree->singleprods ) {
			free( tree->singleprods );
		}

		free( tree );
	}
}
