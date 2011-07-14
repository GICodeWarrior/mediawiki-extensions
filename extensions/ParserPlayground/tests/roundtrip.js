var fs = require('fs'),
	DumpReader = require('./dumpReader.js').DumpReader;

// Fetch up some of our wacky parser bits...

var basePath = '../modules/';
function _require(filename) {
	return require(basePath + filename);
}

function _import(filename, symbols) {
	var module = _require(filename);
	symbols.forEach(function(symbol) {
		global[symbol] = module[symbol];
	})
}

// For now most modules only need this for $.extend and $.each :)
global.$ = require('jquery');

// Local CommonJS-friendly libs
global.PEG = _require('lib.pegjs.js');

// Our code...
_import('ext.parserPlayground.serializer.js', ['MWTreeSerializer']);
_import('ext.parserPlayground.pegParser.js', ['PegParser']);

// Preload the grammar file...
PegParser.src = fs.readFileSync(basePath + 'pegParser.pegjs.txt', 'utf8');


function runTests() {
	var parser = new PegParser(),
		serializer = new MWTreeSerializer();

	function compareTest(a, b, msg) {
		if (a === b) {
			console.log('OK: ', msg);
			return true;
		} else {
			console.log('MISMATCH: ', msg);
			return false;
		}
	}
	function roundTripTest(text, msg) {
		parser.parseToTree(text, function(tree, err) {
			if (err) throw new Error(err);
			serializer.treeToSource(tree, function(newText, err) {
				if (err) throw new Error(err);
				compareTest(text, newText, msg)
			})
		})
	}

	roundTripTest('A plain single line paragraph.', 'single-line paragraph');
	//roundTripTest('A plain single line paragraph.\n\nA second paragraph after a blank.', 'two single-line paragraphs');

	var reader = new DumpReader();
	reader.on('end', function() {
		console.log('done!');
		process.exit();
	});
	reader.on('error', function(err) {
		console.log('error!', err);
		process.exit(1);
	});
	reader.on('revision', function(revision) {
		roundTripTest(revision.text, 'revision id ' + revision.id)
	});
	console.log('Reading!');
	process.stdin.setEncoding('utf8');
	process.stdin.resume();
	reader.read(process.stdin);

}

runTests();
