import sys, argparse

def encode(val):
	return str(val).encode("string_escape")

def main(args):
	headers = [eval(v) for v in args.input.readline().strip().split("\t")]
	print("\t".join(encode(v) for v in headers))
	
	for line in args.input:
		vals = [eval(v) for v in line.strip().split("\t")]
		print("\t".join(encode(v) for v in vals))
		
	


if __name__ == "__main__":
	parser = argparse.ArgumentParser(
		description='Removes quotes from dataset'
	)
	parser.add_argument(
		'-i', '--input',
		metavar="<path>",
		type=lambda fn:open(fn, "r"), 
		help='the path of the file to filter (defaults to stdin)',
		default=sys.stdin
	)
	args = parser.parse_args()
	main(args)
