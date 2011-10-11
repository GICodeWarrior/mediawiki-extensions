import sys, subprocess, os, random, logging, argparse
from StringIO import StringIO

staeiouScriptPrefix = "/home/staeiou/contribs-peachy/REL0_1BETA/contribs-"

def isDir(d):
	d = os.path.expanduser(d)
	assert os.path.isdir(d)
	return d

def tense(s):
	assert s in ('before', 'after')
	return s

def main():
	
	parser = argparse.ArgumentParser(
		description='Gathers a user\'s contribs surrounding a date into an html file'
	)
	parser.add_argument(
		'tense',
		type=tense,
		help='the chronological direction to look for contribs (before or after)'
	)
	parser.add_argument(
		'-u', '--uri',
		type=str, 
		help='the uri for the mediawiki API',
		default="http://en.wikipedia.org/w/api.php"
	)
	parser.add_argument(
		'-i', '--input',
		type=lambda fn:open(os.path.expanduser(fn), "r"), 
		help='the input file to find users and timestamps (defaults to stdin)',
		default=sys.stdin
	)
	parser.add_argument(
		'-o', '--output_dir',
		type=isDir, 
		help='Where should the output files be written (defaults to current directory)',
		default=os.getcwd()
	)
	args = parser.parse_args()
	
	LOGGING_STREAM = sys.stderr
	logging.basicConfig(
		level=logging.DEBUG,
		stream=LOGGING_STREAM,
		format='%(asctime)s %(levelname)-8s %(message)s',
		datefmt='%b-%d %H:%M:%S'
	)
	
	scriptName = staeiouScriptPrefix + args.tense + ".php"
	
	logging.debug("Script name: %s" % scriptName)
	
	successes = 0
	errors = 0
	for line in args.input.read().split("\n"):
		try:
			userText, timestamp = line.strip().split("\t")
		except Exception as e:
			logging.error("Error occured while processing line %s:'%s' in input: %s" % (successes+errors+1,line, e))
			raise e
		
		outFileName = os.path.join(args.output_dir, str(round(random.random(), 7))[2:] + ".html")
		while os.path.exists(outFileName):
			logging.warning("File name mismatch, re-randomizing.")
			outFileName = os.path.join(args.output_dir, str(round(random.random(), 7))[2:] + ".html")
		
		try:
			outFile = open(outFileName, "w")
			process = subprocess.Popen(
				" ".join(['php', scriptName, userText, timestamp, ">", outFileName]), 
				shell=True,
				stderr=open('/dev/null', "w")
			)
			#error = process.stderr.read()
			if process.wait() != 0:
				logging.error("The subscript exited with an error: %s" % error)
				errors += 1
				LOGGING_STREAM.write("!")
			else:
				successes += 1
				LOGGING_STREAM.write(".")
		except Exception as e:
			logging.error("An error occurred while running subscript: %s" % e)
			LOGGING_STREAM.write("!")
			errors += 1
		
		
		#if (successes + errors) % 100 == 0:
		#	logging.info("Processed %s users.  %s successful and %s errorred" % (successes + errors, successes, errors))
		
	


if __name__ == "__main__":
	main()
