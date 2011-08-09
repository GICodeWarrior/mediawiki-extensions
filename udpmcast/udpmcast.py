#!/usr/bin/python
#
# udpcast.py
# application level udp multicaster/multiplexer
# Written on 2005/04/03 by Mark Bergsma <mark@nedworks.org>
#
# $Id$

import socket, getopt, sys, pwd, grp

debugging = False

def debug(msg):
    global debugging
    if debugging:
        print msg;

def multicast_diagrams(sock, addrrules):
    portnr = sock.getsockname()[1];

    while 1:
        diagram, srcaddr = sock.recvfrom(2**14)
        if not diagram: break

        try:
            addresses = addrrules[srcaddr[0]]
        except KeyError:
            addresses = addrrules[0]

        for addr in addresses:
            try:
                sock.sendto(diagram, 0, (addr, portnr))
                debug('Sent diagram to '+addr+' port '+str(portnr))
            except socket.error:
                debug('Error while sending diagram to '+addr)
                pass

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
    print 'Usage:\n\tudpmcast [ options ] { addresses | forward rules }\n'
    print 'Options:'
    print '\t-d\t\tFork into the background (become a daemon)'
    print '\t-p {portnr}\tUDP port number to listen on (default is 4827)'
    print '\t-j {mcast addr}\tMulticast group to join on startup'
    print '\t-u {username}\tChange uid'
    print '\t-g {group}\tChange group'
    print '\t-t {ttl}\tSet multicast TTL for outgoing multicast packets'
    print '\t-v\t\tBe more verbose'

if __name__ == '__main__':
    host = ''
    portnr = 4827
    multicast_group = None
    multicast_ttl = None
    daemon = False
    user = group = None
    opts = 'dhj:p:vu:g:t:'

    # Parse options
    options, arguments = getopt.getopt(sys.argv[1:], opts)
    if len(arguments) == 0:
        print_help()
        sys.exit()
    else:
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
            elif option == '-t':
                multicast_ttl = int(value)

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
            from util import createDaemon
            createDaemon()

        # Open the UDP socket
        sock = socket.socket(socket.AF_INET, socket.SOCK_DGRAM)
        sock.bind((host, portnr))
        
        # Set the multicast TTL if requested
        if multicast_ttl is not None:
            sock.setsockopt(socket.IPPROTO_IP,
                    socket.IP_MULTICAST_TTL,
                    multicast_ttl)  

        # Join a multicast group if requested
        if multicast_group is not None:
            debug('Joining multicast group ' + multicast_group)
            join_multicast_group(sock, multicast_group)

        # Parse the argument list
        addrrules = { 0: [] }
        for argument in arguments:
            if argument[0] == '{':
                # Forward rule
                addrrules.update(eval(argument))
            else:
                # Default forward
                addrrules[0].append(argument)

        debug('Forward rules: ' + str(addrrules))

        # Multiplex everything that comes in
        multicast_diagrams(sock, addrrules)
    except socket.error, msg:
        print msg[1];
    except KeyboardInterrupt:
        pass

