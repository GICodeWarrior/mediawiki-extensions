import json, urllib2, re, argparse, os, MySQLdb, MySQLdb.cursors, sys
import logging, urllib, types, time

def main():
	parser = argparse.ArgumentParser(
		description='Gathers huggle messages after a specified date that contain experimental comments'
	)
	parser.add_argument(
		'since',
		type=str, 
		help='a date string to search for hugglings after'
	)
	parser.add_argument(
		'-u', '--uri',
		type=str, 
		help='the uri for the mediawiki API',
		default="http://en.wikipedia.org/w/api.php"
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
	wp = WPAPI(args.uri)
	
	headers = [
		'id',
		'timestamp',
		'poster_id',
		'poster_name',
		'recipient',
		'personal',
		'teaching',
		'image'
	]
	print("\t".join(headers))
	
	logging.info("Getting huggling messages.")
	for post in db.getHugglingsSince(args.since):
		diff = wp.getRevisionDiff(post['id'])
		condition = getConditionFromDiff(diff)
		if condition == None:
			logging.debug("%(timestamp)s: non-experimental posting by %(poster_name)s to %(recipient)s" % post)
		else:
			logging.debug("%(timestamp)s: experimental posting by %(poster_name)s to %(recipient)s" % post)
			post.update(condition)
			print("\t".join(encode(post[h]) for h in headers))
		
	

		
	
	



class Database:
	
	def __init__(self, *args, **kwargs):
		self.args   = args
		self.kwargs = kwargs
		self.conn = MySQLdb.connect(*args, **kwargs)
	
	def getHugglingsSince(self, timestamp):
		cursor = self.conn.cursor(MySQLdb.cursors.DictCursor)
		cursor.execute("""
			SELECT 
				rc_this_oldid               AS id,
				rc_timestamp                AS timestamp,
				rc_user                     AS poster_id,
				rc_user_text                AS poster_name,
				rc_comment                  AS comment,
				REPLACE(rc_title, "_", " ") AS recipient
			FROM recentchanges r
			WHERE rc_namespace = 3
			AND rc_new IN (0, 1)
			AND rc_timestamp >= %(timestamp)s
			AND rc_comment LIKE %(huggle)s
			""",
			{
				'timestamp': timestamp,
				'huggle':    "Message re." + "%" + "[[WP:HG" + "%"
			}
		)
		for post in cursor:
			yield post
		

class WPAPI:
	
	def __init__(self, uri):
		self.uri = uri
	
	def getRevisionDiff(self, revId, retries=10):
		attempt = 0
		while attempt < retries:
			try:
				response = urllib2.urlopen(
					self.uri,
					urllib.urlencode({
						'action': 'query',
						'prop': 'revisions',
						'revids': revId,
						'rvprop': 'ids',
						'rvdiffto': 'prev',
						'format': 'json'
					})
				)
				result = json.load(response)
				return result['query']['pages'].values()[0]['revisions'][0]['diff']['*']
			except urllib2.HTTPError as e:
				time.sleep(attempt*2)
				attempt += 1
				

WARNINGS = {
	"personal-teaching1-noimage": {
		'personal': True,
		'teaching': True,
		'image':    False
	},
	"teaching1-noimage": {
		'personal': False,
		'teaching': True,
		'image':    False
	},
	"personal1-noimage": {
		'personal': True,
		'teaching': False,
		'image':    False
	},
	"default1-noimage": {
		'personal': False,
		'teaching': False,
		'image':    False
	},
	"personal-teaching1": {
		'personal': True,
		'teaching': True,
		'image':    True
	},
	"teaching1": {
		'personal': False,
		'teaching': True,
		'image':    True
	},
	"personal1": {
		'personal': True,
		'teaching': False,
		'image':    True
	},
	"default1": {
		'personal': False,
		'teaching': False,
		'image':    True
	}
}
WARNING_RE = re.compile(r"&lt;!-- Template:uw-(" + "|".join(WARNINGS.keys()) + ") --&gt;")

#DIFF_ADD_RE = re.compile(r'<td class="diff-addedline">([^<]|(<[^/]|(</[^t]|(</t[^d]|</td[^>]))))+</td>')
DIFF_ADD_RE = re.compile(r'<td class="diff-addedline"><div>(.+)</div></td>')

def getAddedContent(diff):
	return "\n".join(match.group(1) for match in DIFF_ADD_RE.finditer(diff))

def getCondition(message):
	match = WARNING_RE.search(message)
	if match == None:
		return None
	else:
		return WARNINGS[match.group(1)]
	
def getConditionFromDiff(diff):
	content = getAddedContent(diff)
	return getCondition(content)


def encode(v):
	if v == None: return "\N"
	
	if type(v) == types.LongType:     v = int(v)
	elif type(v) == types.UnicodeType: v = v.encode('utf-8')
	
	return str(v).encode("string-escape")

	
	
if __name__ == "__main__": main()
