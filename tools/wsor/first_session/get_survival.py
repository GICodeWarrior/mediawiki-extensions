import sys, MySQLdb, MySQLdb.cursors, argparse, os, logging, types
import wmf

def encode(v):
	if v == None: return "\N"
	
	if type(v) == types.LongType:     v = int(v)
	elif type(v) == types.UnicodeType: v = v.encode('utf-8')
	
	return str(v).encode("string-escape")

def decode(v):
	if v == "\N": return None
	else: return v.decode("string-escape")


def main():
	parser = argparse.ArgumentParser(
		description='Gathers editor data for first and last session'
	)
	parser.add_argument(
		'after',
		type=int, 
		help='the minimum time (in seconds) after the first session an editor must edit to be considered "suviving"'
	)
	parser.add_argument(
		'sunset',
		type=int, 
		help='the time (in seconds) of an artificial sunset beyond which to stop looking for surving editors'
	)
	parser.add_argument(
		'-c', '--cnf',
		metavar="<path>",
		type=str, 
		help='the path to MySQL config info (defaults to ~/.my.cnf)',
		default=os.path.expanduser("~/.my.cnf")
	)
	parser.add_argument(
		'-s', '--host',
		type=str, 
		help='the database host to connect to (defaults to localhost)',
		default="localhost"
	)
	parser.add_argument(
		'-d', '--db',
		type=str, 
		help='the language db to run the query in (defaults to enwiki)',
		default="enwiki"
	)
	parser.add_argument(
		'-i', '--input',
		type=lambda fn:open(fn, 'r'), 
		help='an old input file from get_first_n_sessions (defaults to stdin)',
		default=sys.stdin
	)
	parser.add_argument(
		'-o', '--out',
		type=lambda fn:open(fn, 'w'), 
		help='an output file to write to (defaults to stdout)',
		default=sys.stdout
	)
	args = parser.parse_args()
	assert not args.input.isatty(), "An input file must be specified"
	
	LOGGING_STREAM = sys.stderr
	logging.basicConfig(
		level=logging.DEBUG,
		stream=LOGGING_STREAM,
		format='%(asctime)s %(levelname)-8s %(message)s',
		datefmt='%b-%d %H:%M:%S'
	)
	
	logging.info("Connecting to %s:%s using %s." % (args.host, args.db, args.cnf))
	db = Database(
		host=args.host, 
		db=args.db, 
		read_default_file=args.cnf
	)
	headers = [
		'user_id',
		'user_name',
		'surviving'
	]
	
	
	print("\t".join(headers))
	
	logging.info("Processing users...")
	for user in usersFromFile(args.input):
		
		user['surviving'] = db.getSurviving(user['user_id'], user['es_0_end'], args.after, args.sunset)
		if user['surviving']:
			LOGGING_STREAM.write("s")
		else:
			LOGGING_STREAM.write(".")
		
		args.out.write("\t".join(encode(user.get(h)) for h in headers) + "\n")
	
	LOGGING_STREAM.write("\n")
	
	
	

def usersFromFile(f):
	headers = [decode(v) for v in f.readline().strip().split("\t")]
	for line in f:
		yield dict(
			zip(
				headers,
				[decode(v) for v in line.strip().split("\t")]
			)
		)


class Database:
	
	def __init__(self, *args, **kwargs):
		self.args   = args
		self.kwargs = kwargs
		self.conn = MySQLdb.connect(*args, **kwargs)
		
	
	def getSurviving(self, userId, endOfSession, after, before):
		userId       = int(userId)
		after        = int(after)
		before       = int(before)
		if endOfSession == None:
			return False
		else: 
			endOfSession = int(endOfSession)
		
		cursor = self.conn.cursor(MySQLdb.cursors.DictCursor)
		
		cursor.execute(
			"""
			SELECT 1 
			FROM revision
			WHERE rev_user = %(user_id)s
			AND rev_timestamp BETWEEN FROM_UNIXTIME(%(after)s) AND FROM_UNIXTIME(%(before)s)
			LIMIT 1;
			""",
			{
				'user_id':        userId,
				'after':          endOfSession + after,
				'before':         endOfSession + before
			}
		)
		for row in cursor:
			return True
	
	
		cursor.execute(
			"""
			SELECT
				1
			FROM archive
			WHERE ar_user = %(user_id)s
			AND ar_timestamp BETWEEN FROM_UNIXTIME(%(after)s) AND FROM_UNIXTIME(%(before)s)
			LIMIT 1;
			""",
			{
				'user_id':        userId,
				'end_of_session': endOfSession,
				'after':          after,
				'before':         before
			}
		)
		for row in cursor:
			return True
		
		return False
	
	
if __name__ == "__main__": main()
