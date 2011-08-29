from distutils.core import setup

'''
Copyright (C) 2011 GIOVANNI LUCA CIAMPAGLIA, GCIAMPAGLIA@WIKIMEDIA.ORG
This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License along
with this program; if not, write to the Free Software Foundation, Inc.,
51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.
http://www.gnu.org/copyleft/gpl.html
'''

__author__ = "Giovanni Luca Ciampaglia"
__email__ = "gciampaglia@wikimedia.org"

setup(
        name='lifecycle',
        description='code for analysing activity of contributors',
        version='0.1',
        author='Giovanni Luca Ciampaglia',
        author_email='gciampaglia@wikimedia.org',
        packages=['src/lifecycle'],
        scripts=[
            'src/fetchrates',
            'src/mkcohort',
            'src/comprates',
            'src/plotpeak',
            'src/normplot.py',
            'src/rateperedits.py',
            'src/comppeak',
            'src/sefit',
            'src/mrtchart',
            'src/timechart',
            'src/fitting',
        ]
)
