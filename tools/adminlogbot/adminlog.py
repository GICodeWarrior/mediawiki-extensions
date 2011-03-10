site=('https', "wikitech.leuksman.com")
path="/"
user="More Bots"
password="..."
logname="Server admin log"

import mwclient
import datetime
import re

months=["January","February","March","April","May","June","July","August","September","October","November","December"]

def log(message,author):
	site=mwclient.Site(site, path=path)
	site.login(user,password)
	page=site.Pages[logname]
	text=page.edit()
	lines=text.split('\n')
	position=0
	# Try extracting latest date header
	for line in lines:
		position+=1
		if line.startswith("=="):
			undef,month,day,undef=line.split(" ",3)
			break

	# Add some formatting to the message to link revision and bug numbers
	message = re.sub( r'\b[rR](\d+)\b', r'[[rev:\1|r\1]]', message )
	message = re.sub( r'\bbug ?(\d+)\b', r'[[bugzilla:\1|bug \1]]', message )

	# Um, check the date
	now=datetime.datetime.utcnow()
	logline="* %02d:%02d %s: %s" % ( now.hour, now.minute, author, message )
	if months[now.month-1]!=month or now.day!=int(day):
		lines.insert(0,"")
		lines.insert(0,logline)
		lines.insert(0,"== %s %d =="%(months[now.month-1],now.day))
	else:
		lines.insert(position,logline)
	page.save('\n'.join(lines),"%s (%s)"%(message,author))
