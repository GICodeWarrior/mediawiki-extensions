"""
__skeleton__.py
Copyright (C) 2006-2008 by Mark Bergsma <mark@nedworks.org>

Copy and modify this file to write a new PyBal monitor.
It contains the minimum imports and base methods that need
to be implemented.

$Id$
"""

from pybal import monitor

from twisted.internet import reactor

class SkeletonMonitoringProtocol(monitor.MonitoringProtocol):
    """
    Description.
    """
    
    __name__ = 'Skeleton'
    
    def __init__(self, coordinator, server, configuration):
        """Constructor"""

        # Call ancestor constructor        
        super(SkeletonMonitoringProtocol, self).__init__(coordinator, server, configuration)
        
        # Install cleanup handler
        reactor.addSystemEventTrigger('before', 'shutdown', self.stop)
    
    def run(self):
        """Start the monitoring""" 
        pass
    
    def stop(self):
        """Stop the monitoring"""
        pass
