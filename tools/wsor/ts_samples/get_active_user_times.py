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
		'first_edit',
		'last_edit',
		'fes_edits',
		'fes_reverted',
		'fes_vandalism',
		'fes_deleted',
		'last10_edits',
		'last10_reverted',
		'last10_vandalism',
		'last10_deleted'
	]
	print(
		"\t".join(headers)
	)
	
	logging.info("Processing users:")	
	for user in db.getUsers(minimumEdits=args.min_edits):
		firstSession = []
		last = None
		#logging.debug("Getting first edits for %s" % user['user_name'])
		for rev in db.getFirstEdits(user['user_id'], maximum=100):
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
		
		#logging.debug("Getting last edits for %s" % user['user_name'])
		last10 = list(db.getLastEdits(user['user_id'], maximum=10))
		logging.debug("%s(%s): %s %s" % (user['user_name'], user['user_id'], len(firstSession)*">", len(last10)*"<"))
		user['first_edit'] = firstSession[0]['rev_timestamp']
		user['last_edit']  = last10[0]['rev_timestamp']
		user['fes_edits']  = len(firstSession)
		user['fes_reverted'] = 0
		user['fes_vandalism'] = 0
		user['fes_deleted'] = 0
		for rev in firstSession:
			if rev['is_reverted']:  user['fes_reverted'] += 1
			if rev['is_vandalism']: user['fes_vandalism'] += 1
			if rev['deleted']:      user['fes_deleted'] += 1
		
		user['last10_edits'] = len(last10)
		user['last10_reverted'] = 0
		user['last10_vandalism'] = 0
		user['last10_deleted'] = 0
		for rev in last10:
			if rev['is_reverted']:  user['last10_reverted'] += 1
			if rev['is_vandalism']: user['last10_vandalism'] += 1
			if rev['deleted']:      user['last10_deleted'] += 1
			
		print("\t".join(encode(user[h]) for h in headers))


class Database:
	
	def __init__(self, *args, **kwargs):
		self.args   = args
		self.kwargs = kwargs
		self.conn   = MySQLdb.connect(*args, **kwargs)
	
	def getHundredthEdit(self, ):
		minimumEdits = int(minimumEdits)
		cursor = self.usersConn.cursor(MySQLdb.cursors.SSDictCursor)
		cursor.execute(
			"""
			SELECT 
				u.user_id,
				u.user_name,
				u.user_editcount as editcount
			FROM user u
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
		revisionCursor = self.revsConn.cursor(MySQLdb.cursors.SSDictCursor)
		archiveCursor  = self.archConn.cursor(MySQLdb.cursors.SSDictCursor)
		
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
			ORDER BY r.rev_timestamp """ + direction + """
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
				ar_rev_id    AS rev_id,
				ar_timestamp AS rev_timestamp,
				NULL         AS is_reverted,
				NULL         AS is_vandalism,
				True         AS deleted
			FROM archive
			WHERE ar_user = %(user_id)s
			ORDER BY ar_timestamp """ + direction + """
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
		
		revPointer = revisionCursor.fetchone()
		archPointer = archiveCursor.fetchone()
		count = 0
		while revPointer != None or archPointer != None: #still something to output
			if revPointer != None and archPointer != None: #both cursors still have something
				if order(revPointer['rev_timestamp'], archPointer['rev_timestamp']):
					yield revPointer
					revPointer = revisionCursor.fetchone()
				else:
					yield archPointer
					archPointer = archiveCursor.fetchone()
			elif revPointer != None: #only revisions left
				yield revPointer
				revPointer = revisionCursor.fetchone()
			elif archPointer != None: #only archives left
				yield archPointer
				archPointer = archiveCursor.fetchone()
			
			count += 1
			if count >= maximum: break
		
		revisionCursor.close()
		archiveCursor.close()
			
		
	
	def getFirstEdits(self, userId, maximum=10000):
		return self.getEdits(userId, maximum, chronologically=True)
	
	def getLastEdits(self, userId, maximum=10000):
		return self.getEdits(userId, maximum, chronologically=False)
	
	
if __name__ == "__main__": main()
