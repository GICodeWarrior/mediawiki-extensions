import irclib
import time
import adminlog
import sys

targets=("#wikimedia-tech", "#wikimedia-operations")
nickserv="nickserv"
nick="nick"
nickpassword="password"
network="irc.freenode.net"
port=6667

authormap = { "TimStarling": "Tim", "_mary_kate_": "river", "yksinaisyyteni": "river", "flyingparchment": "river", "RobH": "RobH", "werdnum": "Andrew", "werdna": "Andrew", "werdnus": "Andrew", "aZaFred" : "Fred"  }
titlemap = { "Andrew": "junior", "RoanKattouw": "Mr. Obvious", "RobH": "RobH", "notpeter": "and now dispaching a T1000 to your position to terminate you.", "domas": "o lord of the trolls, my master, my love. I can't live with out you; oh please log to me some more!" }

def on_connect(con, event):
	con.privmsg(nickserv,"identify "+nickpassword)
	time.sleep(1)
	for target in targets:
		con.join(target)

def on_msg(con, event):
	if event.target() not in targets: return
	author,rest=event.source().split('!')
	if author in authormap: author=authormap[author]
	line=event.arguments()[0]
	if line.startswith("!log "):
		undef,message=line.split(" ",1);
		try: 
			adminlog.log(message,author)
			if author in titlemap: title = titlemap[author]
			else: title = "Master"
			server.privmsg(event.target(),"Logged the message, %s" % title)
		except: print sys.exc_info()
		

irc = irclib.IRC()
server = irc.server()
server.connect(network,port,nick)
server.add_global_handler("welcome", on_connect)
server.add_global_handler("pubmsg",on_msg)

irc.process_forever()

