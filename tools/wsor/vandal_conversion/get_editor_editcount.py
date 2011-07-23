import sys, MySQLdb, MySQLdb.cursors, argparse, os, logging, types
import wmf

def encode(v):
	if v == None: return "\N"
	
	if type(v) == types.LongType:     v = int(v)
	elif type(v) == types.UnicodeType: v = v.encode('utf-8')
	
	return str(v).encode("string-escape")


def main():
	parser = argparse.ArgumentParser(
		description='Gathers editor data for first and last session'
	)
	parser.add_argument(
		'min_edits',
		type=int, 
		help='the minimum number of edits that editors must have perfomed to be included'
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
	args = parser.parse_args()
	
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
		'edit_count'
	]
	print("\t".join(headers))
	
	logging.info("Processing users:")
	
	for user in db.getUsers(minimumEdits=args.min_edits):
		print("\t".join(encode(user[h]) for h in headers))
		LOGGING_STREAM.write(".")
	
	LOGGING_STREAM.write("\n")


class Database:
	
	def __init__(self, *args, **kwargs):
		self.args   = args
		self.kwargs = kwargs
		self.usersConn = MySQLdb.connect(*args, **kwargs)
		self.revsConn  = MySQLdb.connect(*args, **kwargs)
		self.archConn  = MySQLdb.connect(*args, **kwargs)
	
	def getUsers(self, minimumEdits=0):
		minimumEdits = int(minimumEdits)
		cursor = self.usersConn.cursor(MySQLdb.cursors.SSDictCursor)
		cursor.execute(
			"""
			SELECT 
				u.user_id,
				u.user_name,
				u.user_editcount as edit_count
			FROM user u
			WHERE u.user_editcount >= %(minimum_edits)s
			""",
			{
				'minimum_edits': minimumEdits
			}
		)
		for row in cursor:
			yield row
		
	
	def getFirstEdits(self, userId, maximum=10000):
		return self.getEdits(userId, maximum, chronologically=True)
	
	def getLastEdits(self, userId, maximum=10000):
		return self.getEdits(userId, maximum, chronologically=False)
	
	
if __name__ == "__main__": main()
