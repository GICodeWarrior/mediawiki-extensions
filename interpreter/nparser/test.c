#include <stdio.h>
#include <stdlib.h>

#include "scanner.h"
#include "parser.h"
#include "stack.h"

#define BUFFERSIZE 1024

void printNodesRec( ws_parser_tree* tree, ws_parser_node_id id, int rec ) {
	int i;
	ws_parser_node* node;

	for( i = 0; i < rec; i++ )
		printf( " " );

	node = tree->nodes + id;
	if( node->type == WS_PARSER_NONTERM ) {
		printf( "Nonterm type: %s;\n", ws_parser_nonterminal_names[node->value] );
		ws_parser_tree_children ch = ws_parser_tree_search_children( tree, id );
		for( i = 0; i < ch.count; i++ ) {
			printNodesRec( tree, (ch.links + i)->child, rec + 1 );
		}
	} else {
		printf( "Term type: %s; ", ws_scanner_token_name( node->value ) );
		if( tree->symbols[id] )
				printf( "Symbol: %s;", tree->symbols[id] );
		printf( "\n" );
	}
}

int main( int argc, char** argv ) {
	long i, j;
	char* line = malloc( BUFFERSIZE );

	fgets( line, BUFFERSIZE, stdin );

	//for( i = 0; i < 1000000; i++ ) {
		ws_parser_output out;
		ws_parser_tree* tree;
		out = ws_parse( line );
		if( out.errno ) {
			printf( "Error: %i %i\n", out.errno, out.errarg );
			return EXIT_FAILURE;
		}
		tree = out.tree;
		printNodesRec( tree, tree->root, 0 );
		ws_parser_tree_free( tree );
	//}

	free( line );

	return EXIT_SUCCESS;
}
