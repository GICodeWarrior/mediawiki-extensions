%{
	#include <stddef.h>
	#include <stdint.h>
	#include <stdlib.h>
	#include <assert.h>
	#define YY_NO_INPUT
	static int old_state;
	static int debug = 0;
	static int retcode = 0;
	#define ERRORLEVEL(x) if ((x) > retcode) { retcode = (x); }
	static char * filename;
	
	static void init_variable(const char* yytext, size_t yyleng);
	static void set_variable_offset(char* yytext, size_t yyleng);
%}

LNUM	[0-9]+
DNUM	([0-9]*"."[0-9]+)|([0-9]+"."[0-9]*)
EXPONENT_DNUM	(({LNUM}|{DNUM})[eE][+-]?{LNUM})
HNUM	"0x"[0-9a-fA-F]+
LABEL	[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*
WHITESPACE [ \n\r\t]
TABS_AND_SPACES [ \t]*
TOKENS [;:,.\[\]()|^&+-/*=%!~$<>?@]
ANY_CHAR [^]
NEWLINE ("\r"|"\n"|"\r\n")
NULL [Nn][Uu][Ll][Ll]
ARRAY array

 /* A string literal made with single quotes */
STRING_SINGLE '([^'\\]|\\[\\'])*'
 /* A string literal made by double quotes */
STRING_DOUBLE \"([^"$\\]|\\[nrtvf\\$"0-9A-Fa-f]|${LNUM})*\"

 /* Note we are rejecting HEREDOCs and NOWDOCs. The brackets shouldn't be necessary, but they are. */
STRING ({STRING_SINGLE}|{STRING_DOUBLE})

%s SCRIPTING LINE_COMMENT MULTILINE_COMMENT EQUALS RVALUE ARRAY ARRAY_ITEM_END ERROR
%pointer 

%%

<INITIAL>"<?php"([ \t]|{NEWLINE}) BEGIN(SCRIPTING);
<INITIAL>\xEF\xBB\xBF { fprintf(stderr, "%s: File contains UTF-8 BOM\n", filename); ERRORLEVEL(3); }
<INITIAL>([^<]|<[^?])+ { fprintf(stderr, "%s: Data before php tag\n", filename); ERRORLEVEL(3); }

<SCRIPTING,EQUALS,ARRAY,ARRAY_ITEM_END>"#"|"//" { old_state = YY_START; BEGIN(LINE_COMMENT); }

<SCRIPTING,EQUALS,ARRAY,ARRAY_ITEM_END>"/*"  { old_state = YY_START; BEGIN(MULTILINE_COMMENT); }
<MULTILINE_COMMENT>"\*/" BEGIN(old_state);

<LINE_COMMENT>\n BEGIN(old_state); ;

<LINE_COMMENT,MULTILINE_COMMENT>. ;

 /* In script mode we accept variables, both alone and with an offset 
  * They have to be followed by an equal plus another variable ($foo = $bar = ""),
  * a string literal or an array.
  */
<SCRIPTING>"$"{LABEL}"["{STRING}"]" { set_variable_offset(yytext, yyleng); BEGIN(EQUALS); }
<SCRIPTING,RVALUE>"$"{LABEL} { init_variable(yytext, yyleng); BEGIN(EQUALS); }
<EQUALS>"=" { BEGIN(RVALUE); }

 /* At the right side we accept null, single-quote strings and arrays */
<RVALUE>{STRING}{TABS_AND_SPACES}";" { BEGIN(SCRIPTING); }
<RVALUE>{NULL}{TABS_AND_SPACES}";" { BEGIN(SCRIPTING); }
<RVALUE>{ARRAY}{TABS_AND_SPACES}"(" BEGIN(ARRAY);
 /* End of array */
<ARRAY,ARRAY_ITEM_END>")"{TABS_AND_SPACES}";"  { BEGIN(SCRIPTING); }

 /* Array with key => value */
<ARRAY>{STRING}{WHITESPACE}*"=>"{WHITESPACE}*{STRING} BEGIN(ARRAY_ITEM_END);
<ARRAY_ITEM_END>"," BEGIN(ARRAY); /* After a key=>value either a , or a ) ending the array. */

{WHITESPACE}|{NEWLINE} ;
<ERROR>.* { fprintf(stderr, "near %s\n", yytext); ERRORLEVEL(5); return 1; }
. { fprintf(stderr, "%s: Error in state %d ", filename, YY_START); BEGIN(ERROR); unput(yytext[0]); if (0) goto find_rule; }

%%


struct variable {
	struct variable *next;
	uint8_t min, count;
	char name[];
};
static struct variable *variable_root = NULL;

static struct variable *find_variable(const char* name) {
	struct variable *var = variable_root;
	while (var) {
		if (!strcmp(var->name, name))
			return var;
		var = var->next;
	}
	return NULL;
}

/* Reset the count of each variable */
static void reset_variables(void) {
	struct variable *var = variable_root;
	while (var) {
		var->count = 0;
		var = var->next;
	}
}

static void init_variable(const char* yytext, size_t yyleng) {
	struct variable *v;
	
	if (debug) {
		printf(" Variable %s\n", yytext);
	}
		
	v = find_variable(yytext);
	if (!v) {
		v = malloc( sizeof(struct variable) + yyleng);
		v->next = variable_root;
		v->min = 0;
		v->count = 0; 
		strcpy(v->name, yytext);
		variable_root = v;
		if (debug) printf(" Registered variable %s\n", yytext);
	}
	
	v->count++;
	if (v->count > 1) {
		fprintf(stderr, " %s: %s is assigned several times\n", filename, yytext);
		ERRORLEVEL(1);
	}
}

static void set_variable_offset(char* yytext, size_t yyleng) {
	struct variable *v;
	char *p, tmp;
	
	
	if (debug) {
		printf(" Variable with offset %s\n", yytext); 
	}
	
	p = strchr(yytext,'[');
	assert(p);
	tmp = *p; *p = '\0';
	
	v = find_variable(yytext);
	if (!v || !v->count) {
		fprintf(stderr, " %s: %s is used uninitialized\n", filename, yytext);
		ERRORLEVEL(2);
	}
	*p = tmp;
}

static int usage() {
	puts("justMessages [-f specfile] [-d] [file [file ... ]]");
	puts("\nOptions:\n"
		 "	-d\n"
		 "	--debug\n"
		 "		Show each variable as it is found.\n"
		 "\n"
		 "	-f\n"
		 "		Provide a specfile listing which variables should appear on the files.\n"
		 "\n"
		 "	-h\n"
		 "	--help\n"
		 "		Show this help.\n"
		 );
	puts("Error codes:\n"
		 " 0: Everything went ok\n"
		 " 1: Variables assigned twice\n"
		 " 2: Minor issues which shouldn't affect a secure setup (register_globals/undefined vars)\n"
		 " 3: Leading data (gets output to the client)\n"
		 " 4: Missing file\n"
		 " 5: Unknown php constructs. May lead to code execution.\n"
		 );
	return 0;
}

int main(int argc, char** argv) {
	while (argc > 1) {
		argv++; argc--;
		if (!strcmp(argv[0], "-h") || !strcmp(argv[0], "--help")) {
			usage();
			continue;
		}
		if (!strcmp(argv[0], "-d") || !strcmp(argv[0], "--debug")) {
			debug = 1;
			continue;
		}
		if (!strcmp(argv[0], "-f")) {
			fprintf(stderr, "Unimplemented\n"); // TODO
			argv++; argc--;
			continue;
		}
		
		filename = argv[0];
		if (debug) {
			printf("Processing %s\n", filename);
		}
		
		yyin = fopen( filename, "r" );
		if (!yyin) {
			perror(argv[0]);
			ERRORLEVEL(4);
			continue;
		}
		
		if ( yylex() ) {
			yyrestart(yyin); /* We need to reset it manually (automatically done on EOF) */
		} else if (YY_START != SCRIPTING) {
			fprintf(stderr, "%s: File ends in wrong state %d\n", filename, YY_START);
			ERRORLEVEL(5);
		}
		/* yyrestart does not reset the start condition to INITIAL */
		BEGIN(INITIAL);
		reset_variables();
		
		fclose(yyin);
	}

	
	return retcode;
}

int yywrap() {
	return 1;
}

/* Shut up warning about yy_flex_strlen being unused */
int dummy() {
	return yy_flex_strlen("");
}

