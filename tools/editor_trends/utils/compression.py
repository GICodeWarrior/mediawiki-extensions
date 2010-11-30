
__author__ = '''\n'''.join(['Diederik van Liere (dvanliere@gmail.com)', ])
__author__email = 'dvanliere at gmail dot com'
__date__ = '2010-11-27'
__version__ = '0.1'

import sys
import subprocess
import os
sys.path.append('..')

import configuration
settings = configuration.Settings()
import utils
import exceptions

class Compressor(object):

    def __init__(self, location, file, output=None):
        self.extension = utils.determine_file_extension(file)
        self.file = file
        self.location = location
        self.path = os.path.join(self.file, self.location)
        self.output = None
        self.name = None
        self.program = []
        self.compression = '7z'

    def __str__(self):
        return self.name

    def support_extension(self, extension):
        if extension in self.extensions:
            return True
        else:
            return False

    def compress(self):
        '''
        @path is the absolute path to the zip program
        @location is the directory where to store the compressed file
        @source is the name of the zipfile
        '''
        if self.program == []:
            self.init_compression_tool(self.extension, 'compress')

        if self.program_installed == None:
            raise exceptions.CompressionNotSupportedError

        args = {'7z': ['%s' % self.program_installed, 'a', '-scsUTF-8', '-t%s' % self.compression, '%s' % self.output, '%s' % self.input],
                }

        commands = args.get(self.name, None)
        if commands != None:
            p = subprocess.Popen(commands, shell=True).wait()
        else:
            raise exceptions.CompressionNotSupportedError


    def extract(self):
        '''
        @location is the directory where to store the compressed file
        @source is the name of the archive
        @extension is a helper variable to identify which tool to use.
        '''
        if self.program == []:
            self.init_compression_tool(self.extension, 'extract')

        if self.program_installed == None:
            raise exceptions.CompressionNotSupportedError

        print self.location
        print self.file
        if not utils.check_file_exists(self.location, self.file):
            raise exceptions.FileNotFoundException(self.location, self.file)



        args = {'7z': ['%s' % self.program_installed, 'e', '-y', '-o%s' % self.location, '%s' % self.path],
                'bunzip2': ['%s' % self.program_installed, '-k', '%s' % self.path],
                'zip': ['%s' % self.program_installed, '-o', '%s' % self.path],
                'gz': ['%s' % self.program_installed, '-xzvf', '%s' % self.path],
                'tar': ['%s' % self.program_installed, '-xvf', '%s' % self.path]
                }
        commands = args.get(self.name, None)
        if commands != None:
            p = subprocess.Popen(commands, shell=True).wait()
        else:
            raise exceptions.CompressionNotSupportedError

#        if self.name == '7z':
#            p = subprocess.Popen(['%s' % tool.extract_installed, 'e', '-o%s' % location, '%s' % input], shell=True).wait()
#        elif tool_extract_installed.endswith('bunzip2'):
#            p = subprocess.Popen(['%s' % tool.extract_installed, '-k', '%s' % input], shell=True).wait()
#        elif tool.extract_installed.endswith('zip'):
#            p = subprocess.Popen(['%s' % tool.extract_installed, '-o', '%s' % input], shell=True).wait()
#        elif tool.extract_installed.endswith('gz'):
#            p = subprocess.Popen(['%s' % tool.extract_installed, '-xzvf', '%s' % input], shell=True).wait()
#        elif tool.extract_installed.endswith('tar'):
#            p = subprocess.Popen([])
#        else:
#            raise exceptions.CompressionNotSupportedError

    def init_compression_tool(self, extension, action):
        compression = {'gz': [['tar', 'tar'], ['7z', '7z']],
        'bz2': [['bzip2', 'bunzip2'], ['7z', '7z']],
        '7z': [['7z', '7z']],
        'zip': [['zip', 'unzip'], ['7z', '7z']],
        'tar': [['tar', 'tar'], ['7z', '7z']],
        }

        for ext in compression[extension]:
            archive, extract = ext[0], ext[1]
            if action == 'extract':
                self.program.append(extract)
            else:
                self.program.append(extract)

        for p in self.program:
            path = settings.detect_installed_program(p)
            if path != None:
                self.name = p
                self.program_installed = path


if __name__ == '__main__':
    c = Compressor(settings.input_location, 'test.zip')
    c.extract()
