import sys, MySQLdb, MySQLdb.cursors, argparse
import wmf


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
		'session',
		type=int, 
		help='maximum time between session edits (in seconds)'
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
	
	print(
		"\t".join([
			'user_id',
			'user_name',
			'first_edit',
			'fes_edits',
			'fes_reverted',
			'fes_vandalism',
			'fes_deleted',
			'last10_edits',
			'last10_reverted',
			'last10_vandalism',
			'last10_deleted'
		])
	)
	
	logging.info("Processing users:")	
	for user in db.getUsers(minimumEdits=args.min_edits):
		firstSession = []
		last = None
		for rev in db.getFirstEdits(user['user_id']):
			if last != None:
				diff = wmf.wp2Timestamp(rev['rev_timestamp']) - wmf.wp2Timestamp(last['rev_timestamp'])
				assert diff >= 0
				if diff < args.session:
					firstSession.append(rev)
				else:
					break
				
			else:
				firstSession.append(rev)
			
			last = rev
		
		last10 = list(db.getLastEdits(user['user_id'], maximum=10))
		logging.debug("%s(%s): %s %s" % (user['user_name'], user['user_id'], len(firstSession)*">", len(last10)*"<"))
		print(
			"\t".join(
				str(v).encode("string-escape") for v in [
					user['user_id'],
					user['user_name'],
					user['editcount'],
					firstSession[0]['rev_timestamp'],
					len(firstSession),
					len([r for r in firstSession if r['is_reverted']]),
					len([r for r in firstSession if r['is_vandalism']]),
					len([r for r in firstSession if r['deleted']]),
					len(last10),
					len([r for r in last10 if r['is_reverted']]),
					len([r for r in last10 if r['is_vandalism']]),
					len([r for r in last10 if r['deleted']])
				]
			)
		)
			
				



class Database:
	
	def __init__(self, *args, **kwargs):
		self.args   = args
		self.kwargs = kwargs
		self.usersConn = MySQLdb.connect(*args, **kwargs)
		self.editsConn = MySQLdb.connect(*args, **kwargs)
	
	def getUsers(self, minimumEdits=0):
		minimumEdits = int(minimumEdits)
		cursor = self.usersConn.cursor(MySQLdb.cursors.SSDictCursor)
		cursor.execute(
			"""
			SELECT 
				u.user_id,
				u.user_name,
				um.first_edit,
				u.user_editcount as editcount
			FROM user u
			INNER JOIN halfak.user_meta um USING (user_id)
			WHERE u.user_editcount >= %(minimum_edits)s
			""",
			{
				'minimum_edits': minimumEdits
			}
		)
		for row in cursor:
			yield row
			
		
	
	def getEdits(self, userId, maximum=10000, chronologically=True):
		userId = int(userId)
		revisionCursor = self.editsConn.cursor(MySQLdb.cursors.SSDictCursor)
		archiveCursor  = self.editsConn.cursor(MySQLdb.cursors.SSDictCursor)
		
		if chronologically: direction = "ASC"
		else:               direction = "DESC"
		
		revisionCursor.execute(
			"""
			SELECT 
				r.rev_id,
				r.rev_timestamp,
				rvtd.revision_id IS NOT NULL AS is_reverted,
				rvtd.is_vandalism IS NOT NULL AND rvtd.is_vandalism = TRUE AS is_vandalism,
				False AS deleted
			FROM revision r
			LEFT JOIN halfak.reverted_20110115 rvtd
				ON r.rev_id = rvtd.revision_id
			WHERE rev_user = %(user_id)s
			ORDER BY r.timestamp """ + direction + """
			LIMIT %(maximum)s;
			""",
			{
				'user_id': userId,
				'maximum': maximum
			}
		)
		archiveCursor.execute(
			"""
			SELECT
				ar.ar_rev_id    AS rev_id,
				ar.ar_timestamp AS rev_timestamp,
				NULL            AS is_reverted,
				NULL            AS is_vandalism,
				True            AS deleted
			FROM archive ar
			WHERE ar_user = %(user_id)s
			ORDER BY ar.timestamp """ + direction + """
			LIMIT %(maximum)s;
			""",
			{
				'user_id': userId,
				'maximum': maximum
			}
		)
		if chronologically:
			order = lambda t1, t2:t1 < t2
		else:
			order = lambda t1, t2:t1 > t2
		
		revPointer = revisionCursor.fetchrow()
		archPointer = archiveCursor.fetchrow()
		count = 0
		while revPointer != None or archPointer != None: #still something to output
			if revPointer != None and archPointer != None: #both cursors still have something
				if order(revPointer['rev_timestamp'], archPointer['rev_timestamp']):
					yield revPointer
					revPointer = revisionCursor.fetchrow()
				else:
					yield archPointer
					archPointer = archiveCursor.fetchrow()
			elif revPointer != None: #only revisions left
				yield revPointer
				revPointer = revisionCursor.fetchrow()
			elif archPointer != None:
				yield archPointer
				archPointer = archiveCursor.fetchrow()
			
			count += 1
			if count >= maximum: break
			
		
	
			
		
	
	def getFirstEdits(self, userId, maximum=10000):
		return self.getEdits(userId, maximum, chronologically=True)
	
	def getLastEdits(self, userId, maximum=10000):
		return self.getEdits(userId, maximum, chronologically=False)
	
	
if __name__ == "__main__":
	main()
