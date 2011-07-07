import sys, MySQLdb, MySQLdb.cursors, argparse, os, logging, types
import wmf

def encode(v):
	if v == None: return "\N"
	
	if type(v) == types.LongType:     v = int(v)
	elif type(v) == types.UnicodeType: v = v.encode('utf-8')
	
	return str(v).encode("string-escape")


def main():
	parser = argparse.ArgumentParser(
		description='Gathers editor established period'
	)
	parser.add_argument(
		'min_edits',
		type=int, 
		help='the minimum number of edits that editors must have perfomed before being considered established'
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
		'-o', '--old',
		type=lambda fn:open(fn, 'r'), 
		help='an old output file to process (defaults to stdin)',
		default=sys.stdin
	)
	args = parser.parse_args()
	
	LOGGING_STREAM = sys.stderr
	logging.basicConfig(
		level=logging.DEBUG,
		stream=LOGGING_STREAM,
		format='%(asctime)s %(levelname)-8s %(message)s',
		datefmt='%b-%d %H:%M:%S'
	)
	
	processedUsers = set()
	args.old.readline() # dump headers
	for line in args.old:
		userId = int(line.strip().split("\t")[0])
		processedUsers.add(userId)
	
	
	logging.info("Connecting to %s:%s using %s." % (args.host, args.db, args.cnf))
	db = Database(
		host=args.host, 
		db=args.db, 
		read_default_file=args.cnf
	)
	headers = [
		'user_id',
		'user_name',
		'100th_edit',
		'last_edit'
	]
	print(
		"\t".join(headers)
	)
	
	logging.info("Processing users:")	
	for user in db.getUsers(minimumEdits=args.min_edits):
		if user['user_id'] in processedUsers: continue
		
		user['100th_edit'] = db.getHundredthEdit(user['user_id'])
		user['last_edit']  = db.getLastEdit(user['user_id'])
		LOGGING_STREAM.write(".")
		print("\t".join(encode(user[h]) for h in headers))
	
	LOGGING_STREAM.write("\n")

class Database:
	
	def __init__(self, *args, **kwargs):
		self.args   = args
		self.kwargs = kwargs
		self.conn   = MySQLdb.connect(*args, **kwargs)
	
	def getUsers(self, minEdits=0):
		cursor = self.conn.cursor(MySQLdb.cursors.DictCursor)
		cursor.execute(
			"""
			SELECT * FROM user 
			WHERE user_editcount >= %(min_edits)s
			""",
			{
				'min_edits': minEdits
			}
		)
		for user in cursor: yield user
	
	def getHundredthEdit(self, userId):
		userId = int(userId)
		cursor = self.conn.cursor(MySQLdb.cursors.DictCursor)
		cursor.execute(
			"""
			SELECT max(rev_timestamp), count(*) as revisions
			FROM (
				SELECT rev_timestamp
				FROM revision r2 
				WHERE r2.rev_user = %(user_id)s
				ORDER BY rev_timestamp LIMIT 100
			) AS foo
			ORDER BY rev_timestamp DESC
			LIMIT 1
			""",
			{
				'user_id': userId
			}
		)
		row = cursor.fetchone()
		if row = None:
			return None
		else:
			return row['rev_timestamp']
		
	
	def getLastEdit(self, userId):
		userId = int(userId)
		cursor = self.conn.cursor(MySQLdb.cursors.DictCursor)
		cursor.execute(
			"""
			SELECT rev_timestamp
			FROM revision r2 
			WHERE r2.rev_user = %(user_id)s
			ORDER BY rev_timestamp DESC 
			LIMIT 1
			""",
			{
				'user_id': userId
			}
		)
		row = cursor.fetchone()
		
		if row = None: return None
		else:          return row['rev_timestamp']
	
	
	
	
if __name__ == "__main__": main()
