import os

import settings
#from utils import namespace_downloader as nd
#nd.launch_downloader()


#def which(program):
#    import os
#    def is_exe(fpath):
#        return os.path.exists(fpath) and os.access(fpath, os.X_OK)
#
#    fpath, fname = os.path.split(program)
#    if fpath:
#        if is_exe(program):
#            return program
#    else:
#        for path in os.environ["PATH"].split(os.pathsep):
#            exe_file = os.path.join(path, program)
#            if is_exe(exe_file):
#                return exe_file
#
#    return None
#
#
#result = which('7z.exe')
#print result

#from database import launcher
#launcher.launcher()
from utils import sort
input = os.path.join(settings.XML_FILE_LOCATION, 'en', 'wiki', 'txt')
output = os.path.join(settings.XML_FILE_LOCATION, 'en', 'wiki', 'sorted')
dbname = 'enwiki'
#sort.debug_mergesort_feeder(input, output)
#sort.mergesort_launcher(input, output)
sort.mergesort_external_launcher(dbname, output, output)