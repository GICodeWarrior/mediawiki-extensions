import os
import sys

from classes import singleton

class Path:
    __metaclass__ = singleton.Singleton

    def __init__(self):
        self.cwd = self.determine_working_directory()
        self.update_python_path()

    def determine_working_directory(self):
        cwd = os.getcwd()
        if not cwd.endswith('editor_trends%s' % os.sep):
            pos = cwd.find('editor_trends') + 14
            cwd = cwd[:pos]
        return cwd

    def update_python_path(self):
        IGNORE_DIRS = ['wikistats', 'zips', 'datasets', 'mapreduce', 'logs',
                        'statistics', 'js_scripts', 'deployment',
                        'documentation', 'data', 'code-snippets']
        dirs = [name for name in os.listdir(self.cwd) if
            os.path.isdir(os.path.join(self.cwd, name))]
        for subdirname in dirs:
            if not subdirname.startswith('.') and subdirname not in IGNORE_DIRS:
                sys.path.append(os.path.join(self.cwd, subdirname))

Path()
