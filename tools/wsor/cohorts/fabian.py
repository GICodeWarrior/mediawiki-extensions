import sys, MySQLdb, MySQLdb.cursors, argparse, os, logging, types
import wmf

def encode(v):
	if v == None: return "\N"
	
	if type(v) == types.LongType:     v = int(v)
	elif type(v) == types.UnicodeType: v = v.encode('utf-8')
	
	return str(v).encode("string-escape")

def pos(v):
	if v > 0:
		return v
	else:
		return 0
def neg(v):
	if v < 0:
		return v
	else:
		return 0

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
		'-o', '--output',
		type=lambda fn:open(fn, 'w'), 
		help='an output file to write to (defaults to stdout)',
		default=sys.stdout
	)
	parser.add_argument(
		'-i', '--input',
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
		'user_id',
		'rev_year',
		'rev_month',
		'namespace',
		'first_edit',
		'first_edit_year',
		'first_edit_month',
		'edits',
		'bytes_added',
		'bytes_removed'
	]
			
	args.output.write("\t".join(headers) + "\n")
	
	logging.info("Processing revisions:")
	agg = {'key': None}
	for r in db.getOrderedRevisions():
		key = hash((r[key] for key in ('user_id','rev_year','rev_month','namespace'))
		
		if key == agg['key']: 
			#Update the current aggregation
			agg['edits']       += 1
			agg['len_added']   += pos(r['len_change'])
			agg['len_removed'] += neg(r['len_change'])
		
		else:
			if agg['key'] != None: 
				#Dump the current aggregation
				args.output.write("\t".join(agg[h] for h in headers) + "\n")
				LOGGING_STREAM.write("|")
			
			#Start a new agg
			agg = {
				k:r[k] for k in 
				(
					'user_id',
					'rev_year',
					'rev_month',
					'namespace',
					'first_edit',
					'first_edit_year',
					'first_edit_month'
				)
			}
			agg['edits']       = 1
			agg['len_added']   = pos(r['len_change'])
			agg['len_removed'] = neg(r['len_change'])
			
			#Log some things
			if count % 10000 == 0 or count == 0  :
				LOGGING_STREAM.write("\n%09d" % count)
			if count % 100 == 0:
				LOGGING_STREAM.write(".")
			last = revision
			count += 1
		
	#Do the last one if there were any at all.
	if agg['key'] != None: 
		args.output.write("\t".join(agg[h] for h in headers) + "\n")
	
	LOGGING_STREAM.write("\n")
	






class Database:
	
	def __init__(self, *args, **kwargs):
		self.args   = args
		self.kwargs = kwargs
		self.conn = MySQLdb.connect(*args, **kwargs)
		self.revConn = MySQLdb.connect(*args, **kwargs)
	
	
	def getOrderedRevisions(self, ):
		cursor = self.conn.cursor(MySQLdb.cursors.SSCursor)
		cursor.execute(
			"""
			SELECT
				rev_id,
				rev_timestamp,
				user_id,
				rev_year,
				rev_month,
				namespace,
				u.first_edit,
				YEAR(u.first_edit) AS first_edit_year,
				MONTH(u.first_edit) as first_edit_month,
				len_change
			FROM halfak.rev_len_changed_namespace rlc
			INNER JOIN halfak.user_meta_20110715 u USING(user_id)
			WHERE user_id > 38427984
			AND rev_year > 2001
			AND rev_month > 2002
			AND namespace > 3
			ORDER BY
				user_id,
				rev_year,
				rev_month,
				namespace;
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
