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
		type=lambda fn:open(fn, 'w'), 
		help='an output file to write to (defaults to stdout)',
		default=sys.stdout
	)
	parser.add_argument(
		'-a', '--after',
		type=int,
		help="The page_id to start after.  (Defaults to zero)",
		default=0
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
		'rev_id',
		'rev_timestamp',
		'rev_year',
		'rev_month',
		'rev_len',
		'user_id',
		'user_text',
		'page_id',
		'namespace',
		'parent_id',
		'len_change'
	]
			
	print("\t".join(headers))
	
	logging.info("Processing revisions:")
	count = 0
	for page in db.getPages(afterId=args.after):
		LOGGING_STREAM.write("|")
		last = None
		for revision in db.getPageRevisions(page['page_id']):
			
			revision['namespace'] = page['page_namespace']
			
			if last == None:
				revision['parent_id'] = None
				revision['len_change'] = revision['rev_len']
			else:
				revision['parent_id'] = last['rev_id']
				revision['len_change'] = revision['rev_len'] - last['rev_len']
			
			print("\t".join(encode(revision[h]) for h in headers))
			
			if count % 10000 == 0 or count == 0  :
				LOGGING_STREAM.write("\n%09d" % count)
			if count % 1000 == 0:
				LOGGING_STREAM.write(".")
			last = revision
			count += 1
	
	LOGGING_STREAM.write("\n")
	






class Database:
	
	def __init__(self, *args, **kwargs):
		self.args   = args
		self.kwargs = kwargs
		self.conn = MySQLdb.connect(*args, **kwargs)
		self.revConn = MySQLdb.connect(*args, **kwargs)
	
	def getPages(self, afterId=0, bufferSize=10000):
		counter = 1 #not zero
		while counter > 0:
			cursor = self.conn.cursor(MySQLdb.cursors.DictCursor)
			cursor.execute(
				"""
				SELECT * FROM page
				WHERE page_id > %(page_id)s
				ORDER BY page_id
				LIMIT %(limit)s
				""",
				{
					'page_id': afterId,
					'limit':   bufferSize
				}
			)
			counter = 0
			for row in cursor:
				yield row
				afterId = row['page_id']
				counter += 1
			
		
	def getPageRevisions(self, pageId):
		cursor = self.revConn.cursor()
		cursor.execute(
			"""
			SELECT 
				rev_id,
				rev_timestamp,
				YEAR(rev_timestamp) as rev_year,
				MONTH(rev_timestamp) as rev_month,
				rev_len,
				rev_user as user_id,
				rev_user_text as user_text,
				rev_page as page_id,
				IFNULL(rev_len, 0) as rev_len
			FROM revision r
			WHERE rev_page = %(page_id)s
			ORDER BY rev_id
			""",
			{
				'page_id': pageId
			}
		)
		for row in cursor:
			yield dict(
				zip(
					[d[0] for d in cursor.description],
					row
				)
			)
	
	def getRevisions(self):
		cursor = self.conn.cursor(MySQLdb.cursors.SSCursor)
		cursor.execute(
			"""
			SELECT 
				rev_id,
				rev_timestamp,
				YEAR(rev_timestamp) as rev_year,
				MONTH(rev_timestamp) as rev_month,
				rev_len,
				rev_user as user_id,
				rev_user_text as user_text,
				rev_page as page_id,
				p.page_namespace as namespace,
				IFNULL(rev_len, 0) as rev_len
			FROM revision r
			INNER JOIN page p
				ON r.rev_page = p.page_id
			ORDER BY p.page_id, rev_id
			"""
		)
		for row in cursor:
			yield dict(
				zip(
					[d[0] for d in cursor.description],
					row
				)
			)
	
if __name__ == "__main__": main()
