import string,cgi,time,urlparse,urllib2, urllib, cgi, copy
import re, time, math
from htmlentitydefs import name2codepoint
from os import curdir, sep
from BaseHTTPServer import BaseHTTPRequestHandler, HTTPServer
from urllib2 import URLError, HTTPError

search_host = { 'enwiki' : "srv79:8123", '<default>': 'srv80:8123' }

canon_namespaces = { 0 : '', 1: 'Talk', 2: 'User', 3: 'User_talk',
                    4 : 'Project', 5 : 'Project_talk', 6 : 'Image', 7 : 'Image_talk',
                    8 : 'MediaWiki', 9: 'MediaWiki_talk', 10: 'Template', 11: 'Template_talk',
                    12 : 'Help', 13: 'Help_talk', 14: 'Category', 15: 'Category_talk',
                    100: 'Portal', 101: 'Portal_talk' }
prefix_aliases = { 'm': 0, 'mt' : 1, 'u' : 2, 'ut' : 3, 'p': 4, 'pt':5, 'i':6, 'it':7,
                   'mw':8, 'mwt':9, 't':10, 'tt':11, 'h':12, 'ht':13, 'c':14, 'ct': 15}
 
def make_link(params,offset):
    ''' Duplicate existing query (denoted by params), but with a different offset '''
    dupl = copy.copy(params)
    dupl['offset'] = [offset]
    return "/search?"+urllib.urlencode(dupl,True)


def rewrite_callback(match):
    namespaces = []
    for prefix in match.group(1).split(','):
        # check for canonical namespace names
        iscanonical = False
        for ns,name in canon_namespaces.iteritems():
            if name.lower() == prefix:
                iscanonical = True # is there a way to continue outer loop in python?
                namespaces.append(str(ns))
                break
        if iscanonical:
            continue   
        # check aliases
        if prefix_aliases.has_key(prefix):
            namespaces.append(str(prefix_aliases[prefix]))
            continue
    
    if namespaces!=[]:
        return '[%s]:' % ','.join(namespaces)
    else:
        return match.group()
        

def rewrite_query(query):
    '''Rewrite query prefixes, port of php version in LuceneSearch extension'''
    query = query.decode('utf-8')
    prefix_re = re.compile('([a-zA-Z0-9_,]+):') # we will parse only canonical namespaces here
    
    return prefix_re.sub(rewrite_callback,query)

class MyHandler(BaseHTTPRequestHandler):        
    def do_GET(self):
        try:
            s = urlparse.urlparse(self.path)
            if s[2] == '/search':
                start_time = time.time()
                params = {}
                # parse key1=val1&key2=val2 syntax
                params = cgi.parse_qs(s[4])

                # defaults
                limit = 20
                offset = 0
                namespaces = []
                
                # parameters 
                for key,val in params.iteritems():
                    if key == 'dbname':
                        dbname = val[0]
                    elif key == 'query':
                        query = val[0]
                    elif key == 'limit':
                        limit = int(val[0])
                    elif key == 'offset':
                        offset = int(val[0])
                    elif key.startswith('ns'):
                        namespaces.append(key[2:])
                
                rewritten = rewrite_query(query)

                if search_host.has_key(dbname):
                    host = search_host[dbname]
                else:
                    host = search_host['<default>']

                # make search url for ls2
                search_url = 'http://%s/search/%s/%s' % (host,dbname,urllib.quote(rewritten.encode('utf-8')))
                search_params = urllib.urlencode({'limit' : limit, 'offset' : offset, 'namespaces' : ','.join(namespaces)}, True)
                
                # process search results
                try:    
                    results = urllib2.urlopen(search_url+"?"+search_params)
                    numhits = int(results.readline())
                    lasthit = min(offset+limit,numhits) 
                    # html headers
                    self.send_response(200)
                    self.send_header('Content-type','text/html')
                    self.end_headers()
                    self.wfile.write('<html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>')
                    self.wfile.write('<body>Query: %s <br>' % query)
                    
                    # generate next/prev searchbar
                    if offset != 0:
                        link = make_link(params,max(offset-limit,0))                        
                        prev = '<a href="%s">&lt; Previous %s</a>' % (link,limit)
                    else:
                        prev = "&lt; Previous"
                    if numhits > lasthit:
                        link = make_link(params,offset+limit)
                        next = '<a href="%s">Next %s &gt;</a>' % (link,limit)
                    else:
                        next = "Next &gt;"
                    searchbar = '<a href="/">New search</a> | %s -- %s  | Total results: %d' % (prev, next, numhits)
                    
                    # show upper search bar
                    self.wfile.write(searchbar)
                    self.wfile.write('<hr>Showing results %d - %d<br>' % (offset,lasthit))
                    
                    # show results
                    self.wfile.write('Score / Article<br>')
                    for line in results:
                        parts = line.split(' ')
                        score = float(parts[0])
                        ns = canon_namespaces[int(parts[1])]
                        if ns != '':
                            ns = ns +":"
                        title = ns+parts[2]
                        if dbname.endswith('wiktionary'):
                            link = 'http://%s.wiktionary.org/wiki/%s' % (dbname[0:2],title)
                        else:
                            link = 'http://%s.wikipedia.org/wiki/%s' % (dbname[0:2],title)
                        decoded = urllib.unquote(title.replace('_',' '))                        
                        self.wfile.write('%1.2f -- <a href="%s">%s</a><br>' % (score,link,decoded))
                    self.wfile.write('<hr>')
                    
                    # show lower search bar
                    self.wfile.write(searchbar)
                    self.wfile.write('</body></html>')
                except HTTPError:
                    self.send_error(400,'Bad request')
                    self.wfile.write("Error in query")
                except URLError:
                    self.send_error(500,'Internal Server Error')
                    self.wfile.write("Cannot connect to lucene search 2.0 daemon")
                delta_time = time.time() - start_time
                print '[%s] Processed query %s in %d ms' %(time.strftime("%Y-%m-%d %H:%M:%S"),self.path,int(delta_time*1000))
            else:
                # show the search form
                f = open(curdir + sep + "searchForm.html")
                search_form = f.read()
                f.close()
                self.send_response(200)
                self.send_header('Content-type','text/html')
                self.end_headers()
                self.wfile.write(search_form)
            return                
        except IOError:
            self.send_error(500,'Internal Server Error')
            self.wfile.write('<a href="/">Back</a>')
            

            
try:
    server = HTTPServer(('', 8080), MyHandler)
    print 'Started webinterface at 8080...'
    server.serve_forever()
except KeyboardInterrupt:
    print '^C received, shutting down server'
    server.socket.close()
  
