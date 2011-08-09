#!/usr/bin/env python
#
# htcpseqcheck.py
# measure HTCP multicast packet loss
# Written on 2011/08/05 by Mark Bergsma <mark@wikimedia.org>
#
# $Id$

import socket, getopt, sys, os, signal, pwd, grp, struct

debugging = False
sourceseq = {}
loss, total = 0, 0
sources = []

def createDaemon():
   """
   Detach a process from the controlling terminal and run it in the
   background as a daemon.
   """

   try:
      # Fork a child process so the parent can exit.  This will return control
      # to the command line or shell.  This is required so that the new process
      # is guaranteed not to be a process group leader.  We have this guarantee
      # because the process GID of the parent is inherited by the child, but
      # the child gets a new PID, making it impossible for its PID to equal its
      # PGID.
      pid = os.fork()
   except OSError, e:
      return((e.errno, e.strerror))     # ERROR (return a tuple)

   if (pid == 0):       # The first child.

      # Next we call os.setsid() to become the session leader of this new
      # session.  The process also becomes the process group leader of the
      # new process group.  Since a controlling terminal is associated with a
      # session, and this new session has not yet acquired a controlling
      # terminal our process now has no controlling terminal.  This shouldn't
      # fail, since we're guaranteed that the child is not a process group
      # leader.
      os.setsid()

      # When the first child terminates, all processes in the second child
      # are sent a SIGHUP, so it's ignored.
      signal.signal(signal.SIGHUP, signal.SIG_IGN)

      try:
         # Fork a second child to prevent zombies.  Since the first child is
         # a session leader without a controlling terminal, it's possible for
         # it to acquire one by opening a terminal in the future.  This second
         # fork guarantees that the child is no longer a session leader, thus
         # preventing the daemon from ever acquiring a controlling terminal.
         pid = os.fork()        # Fork a second child.
      except OSError, e:
         return((e.errno, e.strerror))  # ERROR (return a tuple)

      if (pid == 0):      # The second child.
         # Ensure that the daemon doesn't keep any directory in use.  Failure
         # to do this could make a filesystem unmountable.
         os.chdir("/")
         # Give the child complete control over permissions.
         os.umask(0)
      else:
         os._exit(0)      # Exit parent (the first child) of the second child.
   else:
      os._exit(0)         # Exit parent of the first child.

   # Close all open files.  Try the system configuration variable, SC_OPEN_MAX,
   # for the maximum number of open files to close.  If it doesn't exist, use
   # the default value (configurable).
   try:
      maxfd = os.sysconf("SC_OPEN_MAX")
   except (AttributeError, ValueError):
      maxfd = 256       # default maximum

   for fd in range(0, maxfd):
      try:
         os.close(fd)
      except OSError:   # ERROR (ignore)
         pass

   # Redirect the standard file descriptors to /dev/null.
   os.open("/dev/null", os.O_RDONLY)    # standard input (0)
   os.open("/dev/null", os.O_RDWR)       # standard output (1)
   os.open("/dev/null", os.O_RDWR)       # standard error (2)

   return(0)

def debug(msg):
    global debugging
    if debugging:
        print msg;

def receive_htcp(sock):
    portnr = sock.getsockname()[1];

    while 1:
        diagram, srcaddr = sock.recvfrom(2**14)
        if not diagram: break

        checkhtcpseq(diagram, srcaddr[0])

def checkhtcpseq(diagram, srcaddr):
    global sourceseq, loss, total, sources

    sources.append(srcaddr)
    transid = struct.unpack('!I', diagram[8:12])[0]
    try:
        diff = transid - sourceseq[srcaddr]
    except:
        return
    else:
        total += diff
        if diff != 1:
            loss += diff-1
            print "Out of order or", diff-1, "missing packet(s) from", srcaddr, "id", transid, "last received id was", sourceseq[srcaddr]
	    print "Last 10 sources:", " ".join(sources[-10:])
            print "%d/%d losses (%f%%), %d sources" % (loss, total, float(loss)*100/total, len(sourceseq.keys()))
    finally:
        sourceseq[srcaddr] = transid
	if total % 100 == 0: sources = sources[-10:]

def join_multicast_group(sock, multicast_group):
    import struct

    ip_mreq = struct.pack('!4sl', socket.inet_aton(multicast_group),
        socket.INADDR_ANY)
    sock.setsockopt(socket.IPPROTO_IP,
                    socket.IP_ADD_MEMBERSHIP,
                    ip_mreq)

    # We do not want to see our own messages back
    sock.setsockopt(socket.IPPROTO_IP, socket.IP_MULTICAST_LOOP, 0)

def print_help():
    print 'Usage:\n\thtcpseqcheck [ options ]\n'
    print 'Options:'
    print '\t-d\t\tFork into the background (become a daemon)'
    print '\t-p {portnr}\tUDP port number to listen on (default is 4827)'
    print '\t-j {mcast addr}\tMulticast group to join on startup'
    print '\t-u {username}\tChange uid'
    print '\t-g {group}\tChange group'
    print '\t-v\t\tBe more verbose'

if __name__ == '__main__':
    host = '0.0.0.0'
    portnr = 4827
    multicast_group = None
    daemon = False
    user = group = None
    opts = 'dhj:p:vu:g:'

    # Parse options
    options, arguments = getopt.getopt(sys.argv[1:], opts)
    for option, value in options:
        if option == '-j':
            multicast_group = value
        elif option == '-p':
            portnr = int(value)
        elif option == '-h':
            print_help()
            sys.exit()
        elif option == '-d':
            daemon = True
        elif option == '-u':
            user = value
        elif option == '-g':
            group = value
        elif option == '-v':
            debugging = True

    try:
        # Change uid and gid
        try:
            if group: os.setgid(grp.getgrnam(group).gr_gid)
            if user: os.setuid(pwd.getpwnam(user).pw_uid)
        except:
            print "Error: Could not change uid or gid."
            sys.exit(-1)

        # Become a daemon
        if daemon:
            createDaemon()

        # Open the UDP socket
        sock = socket.socket(socket.AF_INET, socket.SOCK_DGRAM, socket.IPPROTO_UDP)
	sock.setsockopt(socket.SOL_SOCKET, socket.SO_REUSEADDR, 1)
	sock.bind((host, portnr))
        
        # Join a multicast group if requested
        if multicast_group is not None:
            debug('Joining multicast group ' + multicast_group)
            join_multicast_group(sock, multicast_group)

        # Multiplex everything that comes in
        receive_htcp(sock)
    except socket.error, msg:
        print msg[1];
    except KeyboardInterrupt:
        pass

