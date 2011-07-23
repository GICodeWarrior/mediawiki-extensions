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
		'n',
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
	parser.add_argument(
		'-o', '--out',
		type=lambda fn:open(fn, 'w'), 
		help='an output file to write to (defaults to stdout)',
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
	headers = [
		'user_id',
		'user_name',
		'first_edit',
		'last_edit',
		'edit_count'
	]
	for i in range(0, args.n):
		headers.append("es_%s_start" % i)
		headers.append("es_%s_end" % i)
		headers.append("es_%s_edits" % i)
		headers.append("es_%s_reverted" % i)
		headers.append("es_%s_vandalism" % i)
		headers.append("es_%s_deleted" % i)
	
			
	print("\t".join(headers))
	
	logging.info("Loading users:")
	
	users = []
	for user in db.getSampledUsers():
		users.append(user)
		LOGGING_STREAM.write(".")
	LOGGING_STREAM.write("\n")
	
	logging.info("Processing users:")
	for user in users:
		i = 0
		for session in sessions(db.getEdits(user['user_id']), args.session):
			user['es_%s_start' % i] = session[0]['timestamp']
			user['es_%s_end' % i] = session[-1]['timestamp']
			user['es_%s_edits' % i] = len(session)
			user['es_%s_reverted' % i] = 0
			user['es_%s_vandalism' % i] = 0
			user['es_%s_deleted' % i] = 0
			
			for edit in session:
				user['es_%s_reverted' % i] += edit['is_reverted']
				user['es_%s_vandalism' % i] += edit['is_vandalism']
				user['es_%s_deleted' % i] += edit['deleted']
			
			i += 1
			if i >= args.n:
				break
			
		
		args.out.write("\t".join(encode(user.get(h)) for h in headers) + "\n")
		LOGGING_STREAM.write(".")
	
	LOGGING_STREAM.write("\n")
			

def sessions(edits, sessionThreshold=3600):
	sessionEdits = []
	for edit in edits:
		edit['timestamp'] = wmf.wp2Timestamp(edit['rev_timestamp'])
		if len(sessionEdits) == 0:
			sessionEdits.append(edit)
		elif (edit['timestamp'] - sessionEdits[-1]['timestamp']) < sessionThreshold:
			sessionEdits.append(edit)
		else:
			yield sessionEdits
			sessionEdits = [edit]
		
	
	if len(sessionEdits) > 0:
		yield sessionEdits
	
		


class Database:
	
	def __init__(self, *args, **kwargs):
		self.args   = args
		self.kwargs = kwargs
		self.usersConn = MySQLdb.connect(*args, **kwargs)
		self.revsConn  = MySQLdb.connect(*args, **kwargs)
		self.archConn  = MySQLdb.connect(*args, **kwargs)
	
	def getSampledUsers(self):
		cursor = self.usersConn.cursor(MySQLdb.cursors.SSDictCursor)
		cursor.execute(
			"""
			SELECT 
				u.user_id,
				u.user_name,
				um.first_edit,
				um.last_edit,
				u.user_editcount as edit_count
			FROM halfak.user_session_sample us
			INNER JOIN user u
				ON u.user_id = us.user_id
			INNER JOIN halfak.user_meta_20110715 um
				ON u.user_id = um.user_id
			"""
		)
		for row in cursor:
			yield row
			
		
	
	def getEdits(self, userId, chronologically=True):
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
			""",
			{
				'user_id': userId
			}
		)
		archiveCursor.execute(
			"""
			SELECT
				ar_rev_id    AS rev_id,
				ar_timestamp AS rev_timestamp,
				False        AS is_reverted,
				False        AS is_vandalism,
				True         AS deleted
			FROM archive
			WHERE ar_user = %(user_id)s
			ORDER BY ar_timestamp """ + direction + """
			""",
			{
				'user_id': userId
			}
		)
		if chronologically:
			order = lambda t1, t2:t1 < t2
		else:
			order = lambda t1, t2:t1 > t2
		
		revPointer = revisionCursor.fetchone()
		archPointer = archiveCursor.fetchone()
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
		
		revisionCursor.close()
		archiveCursor.close()
			
		
	
	def getFirstEdits(self, userId, maximum=10000):
		return self.getEdits(userId, maximum, chronologically=True)
	
	def getLastEdits(self, userId, maximum=10000):
		return self.getEdits(userId, maximum, chronologically=False)
	
	
if __name__ == "__main__": main()
