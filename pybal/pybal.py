#!/usr/bin/python

"""
PyBal
Copyright (C) 2006 by Mark Bergsma <mark@nedworks.org>

LVS Squid balancer/monitor for managing the Wikimedia Squid servers using LVS

$Id$
"""

import os, sys

import ipvs, monitor

# TODO: make more dynamic
from monitors import *

class Server:
    """
    Class that maintains configuration and state of a single (real)server
    """
    
    # Defaults
    DEF_STATE = True
    DEF_WEIGHT = 10
    
    # Set of attributes allowed to be overridden in a server list
    allowedConfigKeys = [ ('host', str), ('weight', int), ('enabled', bool) ]
    
    def __init__(self, host):
        """Constructor"""        
        
        self.host = host
        self.port = 80
        
        self.monitors = []
        
        self.weight = self.DEF_WEIGHT
        self.up = self.DEF_STATE
        self.pooled = self.up
        self.enabled = self.up
        
    def addMonitor(self, monitor):
        """Adds a monitor instance to the list"""
        
        if monitor not in self.monitors:
            self.monitors.append(monitor)
    
    def removeMonitor(self, monitor):
        """Stops and removes a monitor instance from the list"""
        
        monitor.stop()
        self.monitors.remove(monitor)    # May raise exception if not exists
    
    def removeMonitors(self):
        """Removes all monitors"""
        
        for monitor in self.monitors:
            self.removeMonitor(monitor)
    
    def merge(self, server):
        """Merges in configuration attributes of another instance"""
        
        for key, value in server.__dict__.iteritems():
            if (key, type(value)) in self.allowedConfigKeys:
                self.__dict__[key] = value
    
    def buildServer(cls, configuration):
        """
        Factory method which builds a Server instance from a
        dictionary of (allowed) configuration attributes
        """

        for key, value in configuration.iteritems():
            if (key, type(value)) not in cls.allowedConfigKeys:
                del configuration[key]
        
        server = cls(configuration['host'])        # create a new instance...
        server.__dict__.update(configuration)      # ...and override attributes
        
        return server
    buildServer = classmethod(buildServer)

class Coordinator:
    """
    Class that coordinates the configuration, state and status reports
    for a single LVS instance
    """
    
    serverConfigURL = 'file:///etc/pybal/squids'
    
    intvLoadServers = 60
    
    def __init__(self, lvsservice, configURL):
        """Constructor"""
        
        self.lvsservice = lvsservice
        self.servers = {}
        self.pooledDownServers = []
        self.configHash = None
        self.serverConfigURL = configURL
        
        # Start a periodic server list update task
        from twisted.internet import task
        task.LoopingCall(self.loadServers).start(self.intvLoadServers)
    
    def assignServers(self, servers):
        """
        Takes a new set of servers (as a host->Server dict) and
        hands them over to LVSService
        """
                
        self.servers = servers
        
        # Hand over enabled servers to LVSService
        self.lvsservice.assignServers(
            dict([(server.host, server) for server in servers.itervalues() if server.enabled]))
    
    def createMonitoringInstances(self, servers=None):
        """Creates and runs monitoring instances for a list of Servers"""        
        
        # Use self.servers by default
        if servers is None:
            servers = self.servers.itervalues()
        
        for server in servers:
            if not server.enabled: continue
            
            try:
                monitorlist = eval(self.lvsservice.configuration['monitors'])
            except KeyError:
                print "LVS service", self.lvsservice.name, "does not have a 'monitors' configuration option set."

            if type(monitorlist) != list:
                print "option 'monitors' in LVS service section", self.lvsservice.name, \
                    "is not a Python list."
            else:                
                for monitorname in monitorlist:
                    try:
                        # FIXME: this is a hack?
                        monitormodule = getattr(sys.modules['monitors'], monitorname.lower())
                        monitorclass = getattr(monitormodule , monitorname + 'MonitoringProtocol' )
                        server.addMonitor(monitorclass(self, server, self.lvsservice.configuration))
                    except AttributeError:
                        print "Monitor", monitorname, "does not exist."
                
            # Set initial status
            #server.up = self.calcStatus(server)
            
            # Run all instances
            for monitor in server.monitors:
                monitor.run()

    def resultDown(self, monitor, reason=None):
        """
        Accepts a 'down' notification status result from a single monitoring instance
        and acts accordingly.
        """
        
        server = monitor.server
        
        print 'Monitoring instance', monitor.name(), 'reports server', server.host, 'down:', (reason or '(reason unknown)')
        
        if server.up:
            server.up = False
            self.depool(server)

    def resultUp(self, monitor):
        """
        Accepts a 'up' notification status result from a single monitoring instance
        and acts accordingly.
        """
        
        server = monitor.server
    
        if not server.up and self.calcStatus(server):
            server.up = True
            self.repool(server)
            
            print 'Server', server.host, 'is up'
    
    def calcStatus(self, server):
        """AND quantification of monitor.up over all monitoring instances of a single Server"""
        
        # Global status is up iff all monitors report up
        return reduce(lambda b,monitor: b and monitor.up, server.monitors, server.monitors != [])            

    def depool(self, server):
        """Depools a single Server, if possible"""
        
        if not server.pooled: return
        
        if self.canDepool(server):
            self.lvsservice.removeServer(server)
            try: self.pooledDownServers.remove(server)
            except ValueError: pass
        else:
            if server not in self.pooledDownServers:
                self.pooledDownServers.append(server)
            print 'Could not depool server', server.host, 'because of too many down!'
    
    def repool(self, server):
        """
        Repools a single server. Also depools previously downed Servers that could
        not be depooled then because of too many hosts down.
        """
        
        if not server.pooled and server.enabled:
            self.lvsservice.addServer(server)
        
        # If it had been pooled in down state before, remove it from the list
        try: self.pooledDownServers.remove(server)
        except ValueError: pass

        # See if we can depool any servers that could not be depooled before
        for server in self.pooledDownServers:
            if self.canDepool(server):
                self.depool(server)
            else:    # then we can't depool any further servers either...
                break

    def canDepool(self, server):
        """Returns a boolean denoting whether another server can be depooled"""
        
        # Construct a list of servers that have status 'down'
        downServers = [server for server in self.servers.itervalues() if not server.up]
        
        # Only allow depooling if less than half of the total amount of servers are down
        return len(downServers) <= len(self.servers) / 2
    
    def loadServers(self, configURL=None):
        """Periodic task to load a new server list/configuration file from a specified URL."""
        
        configURL = configURL or self.serverConfigURL
        
        if configURL.startswith('http://'):
            # Retrieve file over HTTP
            from twisted.web import client
            client.getPage(configURL).addCallback(self._configReceived)
        elif configURL.startswith('file://'):
            # Read the text file
            try:
                self._configReceived(open(configURL[7:], 'r').read())
            except IOError, e:
                print e
        else:
            raise ValueError, "Invalid configuration URL"
    
    def _configReceived(self, configuration):
        """
        Compares the MD5 hash of the new configuration vs. the old one,
        and calls _parseConfig if it's different.
        """
        
        import md5
        newHash = md5.new(configuration)
        if not self.configHash or self.configHash.digest() != newHash.digest():
            print 'New configuration received'
            
            self.configHash = newHash        
            self._parseConfig(configuration.splitlines())
    
    def _parseConfig(self, lines):
        """Parses the server list and changes the state accordingly."""
        
        delServers = self.servers.copy()    # Shallow copy
        setupMonitoring = []
             
        for line in lines:
            line = line.rstrip('\n').strip()
            if line.startswith('#') or line == '': continue
            
            serverdict = eval(line)
            if type(serverdict) == dict and 'host' in serverdict:
                host = serverdict['host']
                if host in self.servers:
                    # Existing server. merge
                    server = delServers.pop(host)
                    newServer = Server.buildServer(serverdict)

                    print "Merging server %s, weight %d" % ( host, newServer.weight )

                    # FIXME: Doesn't "enabled" mean "monitored, but not pooled"?
                    if not newServer.enabled and server.enabled:
                        server.removeMonitors()
                    elif newServer.enabled and not server.enabled:
                        setupMonitoring.append(newServer)

                    server.merge(newServer)
                else:
                    # New server
                    server = Server.buildServer(serverdict)
                    self.servers[host] = server
                    
                    print "New server %s, weight %d" % ( host, server.weight )
                    
                    setupMonitoring.append(server)
        
        self.createMonitoringInstances(setupMonitoring)
        
        # Remove old servers
        for host, server in delServers.iteritems():
            server.enabled = False
            server.removeMonitors()
            del self.servers[host]
        
        self.assignServers(self.servers)    # FIXME        

def parseCommandLine(configuration):
    """
    Parses the command line arguments, and sets configuration options
    in dictionary configuration.
    """
    
    import sys, getopt

    options = 'hn'
    long_options = [ 'help', 'dryrun' ]
    
    for o, a in getopt.gnu_getopt(sys.argv, options, long_options)[0]:
        if o in ('-h', '--help'):
            printHelp()
            sys.exit(0)
        elif o in ('-n', '--dryrun'):
            configuration['dryrun'] = True

def printHelp():
    """Prints a help screen"""
    
    print "Usage:"
    print "\tpybal [ options ]"
    print "\t\t-h\t--help\t\tThis help message"
    print "\t\t-n\t--dryrun\tDry Run mode, do not actually update"
    print "\t\t\t\t\tLVS configuration/state, but print commands"
    
def main():
    from twisted.internet import reactor
    from ConfigParser import SafeConfigParser
    
    # Read the configuration file
    configFile = '/etc/pybal/pybal.conf'
    
    config = SafeConfigParser()
    config.read(configFile)
    
    services, cliconfig = {}, {}
    
    # Parse the command line
    parseCommandLine(cliconfig)
    
    for section in config.sections():
        cfgtuple = (
            config.get(section, 'protocol'),
            config.get(section, 'ip'),
            config.getint(section, 'port'),
            config.get(section, 'scheduler'))
            
        # Read the custom configuration options of the LVS section
        configdict = dict(config.items(section))
        
        # Override with command line options
        configdict.update(cliconfig)
                
        services[section] = ipvs.LVSService(section, cfgtuple, configuration=configdict)
        crd = Coordinator(services[section],
            configURL=config.get(section, 'config'))
        print "Created LVS service '%s'" % section
    
    reactor.run()

if __name__ == '__main__':
    main()