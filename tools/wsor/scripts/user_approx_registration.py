import sys, MySQLdb, MySQLdb.cursors, argparse, os, logging, types

def encode(v):
	if v == None: return "\N"
	
	if type(v) == types.LongType:     v = int(v)
	elif type(v) == types.UnicodeType: v = v.encode('utf-8')
	
	return str(v).encode("string-escape")


def main():
	parser = argparse.ArgumentParser(
		description='Gathers approximate registration date by walking ' + 
		'backwards through the user table and guessing at registration ' + 
		'dates based on user_id.  Assumes user_id is ordered.'
	)
	parser.add_argument(
		'date',
		type=str, 
		help='the date to start querying for users with dumb registration dates'
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
		'user_registration'
	]
	
	lowestDate = args.date
	for user in db.getUsersBefore(args.date):
		if user['user_registration'] == None:
			LOGGING_STREAM.write("!")
			user['user_registration'] = lowestDate
			print("\t".join(str(user[h]) for h in headers))
		else:
			LOGGING_STREAM.write(".")
		
		lowestDate = min(user['user_registration'], lowestDate)
	
	LOGGING_STREAM.write("\n")
	



class Database:
	
	def __init__(self, *args, **kwargs):
		self.args   = args
		self.kwargs = kwargs
		self.usersConn = MySQLdb.connect(*args, **kwargs)
	
	def getUsersBefore(self, date):
		cursor = self.usersConn.cursor(MySQLdb.cursors.SSDictCursor)
		cursor.execute(
			"""
			SELECT 
				user_id,
				user_registration
			FROM user
			WHERE user_registration <= %(date)s
			OR user_registration IS NULL
			ORDER BY user_id DESC
			""",
			{
				'date': date
			}
		)
		for row in cursor:
			yield row
	
if __name__ == "__main__": main()
