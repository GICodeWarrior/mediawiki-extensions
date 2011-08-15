<?php
/**
 * Internationalisation file for extension InlineScripts.
 *
 * @file
 * @ingroup Extensions
 */

$messages = array();

/** English
 * @author Victor Vasiliev
 */
$messages['en'] = array(
	'inlinescripts-desc' => 'Provides a build into wikitext scripting language',

	'inlinescripts-call-frommodule' => '$1::$2 called by $3::$4 at line $5',
	'inlinescripts-call-fromwikitext' => '$1::$2 called by wikitext',
	'inlinescripts-call-parse' => 'parse( "$1" )',

	'inlinescripts-error' => 'Following parsing {{plural:$1|error|errors}} detected:',
	'inlinescripts-codelocation' => 'in module $1 at line $2',

	'inlinescripts-exception-unexceptedtoken' => 'Unexpected token $2 $1: expected $3 (parser state $4)',
	'inlinescripts-exception-unclosedstring' => 'Unclosed string $1',
	'inlinescripts-exception-unrecognisedtoken' => 'Unrecognized token $1',
	'inlinescripts-exception-toomanytokens' => 'Exceeded tokens limit',
	'inlinescripts-exception-toomanyevals' => 'Exceeded evaluations limit $1',
	'inlinescripts-exception-recoverflow' => 'Too deep abstract syntax tree',
	'inlinescripts-exception-notanarray' => 'Tried to get or set an element of a non-array $1',
	'inlinescripts-exception-outofbounds' => 'Got out of array bounds $1',
	'inlinescripts-exception-notenoughargs' => 'Not enough arguments for function $1',
	'inlinescripts-exception-dividebyzero' => 'Division by zero $1',
	'inlinescripts-exception-break' => '"break" called outside of foreach $1',
	'inlinescripts-exception-continue' => '"continue" called outside of foreach $1',
	'inlinescripts-exception-emptyidx' => 'Trying to get a value of an empty index $1',
	'inlinescripts-exception-unknownvar' => 'Trying to use an undeclared variable $1',
	'inlinescripts-exception-unknownfunction' => 'Trying to use an unnknown function $2 $1',
	'inlinescripts-exception-notlist' => 'Trying to append an element to the end of \'\'associated\'\' array $1',
	'inlinescripts-exception-appendyield' => 'Trying to use append and yield in the same function $1',

	'inlinescripts-exception-notenoughargs-user' => 'Not enough arguments for function $2::$3 $1',
	'inlinescripts-exception-nonexistent-module' => 'Call to non-existent module $2 $1',
	'inlinescripts-exception-unknownfunction-user' => 'Trying to use an unnknown user function $2::$3 $1',
	'inlinescripts-exception-recursion' => 'Function loop detected when calling function $2::$3 $1',
	'inlinescripts-exception-toodeeprecursion' => 'The maximum function nesting limit of $2 exceeded $1',

	'inlinescripts-transerror-notenoughargs-user' => 'Not enough arguments for function $1::$2',
	'inlinescripts-transerror-nonexistent-module' => 'Call to non-existent module $1',
	'inlinescripts-transerror-unknownfunction-user' => 'Trying to use an unnknown user function $1::$2',
	'inlinescripts-transerror-recursion' => 'Function loop detected when calling function $1::$2',
	'inlinescripts-transerror-nofunction' => 'Missing function name when invoking the script',
	'inlinescripts-transerror-toodeeprecursion' => 'The maximum function nesting limit of $1 exceeded',
);
