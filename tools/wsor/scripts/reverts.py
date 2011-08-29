from wmf import dump
from wmf.dump.processors import reverts
from multiprocessing import cpu_count
import time, types, argparse, sys, logging

def encode(v):
	if v == None:
		return "\\N"
	elif type(v) in (types.LongType, types.IntType):
		return str(int(v))
	elif type(v) == types.UnicodeType:
		return v.encode('utf-8').encode('string-escape')
	else:
		return str(v).encode('string-escape')


def main():
	parser = argparse.ArgumentParser(
		description='Gathers editor data for first and last session'
	)
	parser.add_argument(
		'-t', '--threads',
		type=int, 
		help='the number of parallel threads of processing to start',
		default=max(1, cpu_count() - 1)
	)
	parser.add_argument(
		'-p', '--output_prefix',
		type=str, 
		help='the prefix to prepend to output file names',
		default=str(int(time.time()))
	)
	parser.add_argument(
		'dump',
		type=str, 
		help='the XML dump file(s) to process',
		nargs="+"
	)
	args = parser.parse_args()
	
	LOGGING_STREAM = sys.stderr
	logging.basicConfig(
		level=logging.INFO,
		stream=LOGGING_STREAM,
		format='%(asctime)s %(levelname)-8s %(message)s',
		datefmt='%b-%d %H:%M:%S'
	)
	logging.info("Starting %s run..." % args.output_prefix)
	
	revertFile = open(args.output_prefix + "revert.tsv", "w")
	logging.info("Creating output file: %s" % (args.output_prefix + "revert.tsv"))
	
	revertedFile = open(args.output_prefix + "reverted.tsv", "w")
	logging.info("Creating output file: %s" % (args.output_prefix + "reverted.tsv"))
	
	print(args.dump)
	logging.info("Prcoessing...")
	for out in dump.map(args.dump, reverts.process, threads=args.threads):
		if out[0] == 'revert':
			revertFile.write("\t".join(encode(v) for v in out[1:]) + "\n")
			LOGGING_STREAM.write("|")
		elif out[0] == 'reverted':
			revertedFile.write("\t".join(encode(v) for v in out[1:]) + "\n")
			LOGGING_STREAM.write(".")
		
	
	revertFile.close()
	revertedFile.close()
	

if __name__ == "__main__":
	main()
