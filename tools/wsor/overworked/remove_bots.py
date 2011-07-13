import sys, argparse


def main(args):
	
	bots = set()
	args.bots.readline() #strip off header
	for line in args.bots:
		bots.add(int(line.strip()))
	
	headerLine = args.input.readline().strip()
	headers = headerLine.split("\t")
	print(headerLine)
	
	for line in args.input:
		row = dict(zip(headers, line.strip().split("\t")))
		if int(row['user_id']) not in bots:
			print(line.strip())
		
	


if __name__ == "__main__":
	parser = argparse.ArgumentParser(
		description='Removes bot editors from patrollers file'
	)
	parser.add_argument(
		'bots',
		metavar="<path>",
		type=lambda fn:open(fn, "r"), 
		help='the path to the bots file'
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
