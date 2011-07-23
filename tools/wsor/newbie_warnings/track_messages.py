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
		'user_id',
		type=int, 
		help='the user_id of the editor whose talk postings should be tracked'
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
		'-o', '--out',
		type=lambda fn:open(fn, 'a+'), 
		help='Where should output be appended',
		default=sys.stdout
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
	
	args.out.write(
		"\t".join(
			[db.getTime()]+
			[
				":".join(
					[
						encode(e['user_id']),
						encode(e['user_name']),
						encode(e['messages_waiting'])
					]
				) for e in db.getEditorsWithTalk(args.user_id)
			]
		) + "\n"
	)
	
	
	


class Database:
	
	def __init__(self, *args, **kwargs):
		self.args   = args
		self.kwargs = kwargs
		self.usersConn = MySQLdb.connect(*args, **kwargs)
	
	def getTime(self):
		cursor = self.usersConn.cursor(MySQLdb.cursors.DictCursor)
		cursor.execute(
			"""
			SELECT SQL_NO_CACHE rc_timestamp AS time 
			FROM recentchanges 
			ORDER BY rc_timestamp DESC 
			LIMIT 1
			"""
		)
		return cursor.fetchone()['time']
		
	
	def getEditorsWithTalk(self, userId):
		userId = int(userId)
		cursor = self.usersConn.cursor(MySQLdb.cursors.DictCursor)
		cursor.execute(
			"""
			SELECT  
				reciever.user_id, 
				reciever.user_name, 
				count(*) AS messages_waiting
			FROM (	
				SELECT DISTINCT p.page_title
				FROM revision r
				INNER JOIN page p
					ON r.rev_page = p.page_id
				WHERE r.rev_user = %(user_id)s
				AND p.page_namespace = 3
			) AS tp
			INNER JOIN user reciever
				ON reciever.user_name = REPLACE(tp.page_title, "_", " ")
			INNER JOIN user_newtalk nt
				ON reciever.user_id = nt.user_id
			GROUP BY reciever.user_id, reciever.user_name
			""",
			{
				'user_id': userId
			}
		)
		
		for user in cursor:
			yield user
		
		cursor.execute(
			"""
			SELECT  
				NULL AS user_id,
				tp.page_title AS user_name,
				count(*) AS messages_waiting
			FROM (	
			SELECT DISTINCT p.page_title
			FROM revision r
			INNER JOIN page p
				ON r.rev_page = p.page_id
			WHERE r.rev_user = %(user_id)s
			AND p.page_namespace = 3
			) AS tp
			INNER JOIN user_newtalk nt
				ON tp.page_title = nt.user_ip
			GROUP BY tp.page_title
			""",
			{
				'user_id': userId
			}
		)
		
		for user in cursor:
			yield user
		
			
		
	
	def getFirstEdits(self, userId, maximum=10000):
		return self.getEdits(userId, maximum, chronologically=True)
	
	def getLastEdits(self, userId, maximum=10000):
		return self.getEdits(userId, maximum, chronologically=False)
	
	
if __name__ == "__main__": main()
