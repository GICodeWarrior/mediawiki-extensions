

'''
Copyright (C) 2010 by Diederik van Liere (dvanliere@gmail.com)
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License version 2
as published by the Free Software Foundation.
This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
See the GNU General Public License for more details, at
http://www.fsf.org/licenses/gpl.html
'''

__author__ = '''\n'''.join(['Diederik van Liere (dvanliere@gmail.com)', ])
__author__email = 'dvanliere at gmail dot com'
__date__ = 'Oct 27, 2010'
__version__ = '0.1'

import languages
import dump_downloader as dd
import settings

PATH = '/w/api.php?action=query&meta=siteinfo&siprop=namespaces|namespacealiases&format=json'
LOCATION = settings.NAMESPACE_LOCATION

def retrieve_json_namespace():
    visited = set()
    for language in languages.MAPPING:
        language = languages.MAPPING[language]
        filename = '%s_ns.json' % language
        if language not in visited:
            domain = 'http://%s.wikipedia.org' % language   
            dd.download_wiki_file(domain, PATH, filename, LOCATION, 'w', True)
        visited.add(language)

    
def launch_downloader():
    retrieve_json_namespace()


if __name__ == '__main__':
    launch_downloader()