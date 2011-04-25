#!/usr/bin/env python
# setup.py -- Setup file for mwclient
# Author: Baishampayan Ghose <b.ghose@gmail.com>
#         Yuvi Panda <yuvipanda@yuvi.in>
from setuptools import setup

setup(name='mwclient',
      version='0.6.5',
      license="MIT License",
      description='MediaWiki API client',
      author='Bryan Tong Minh',
      author_email='btongminh@users.sourceforge.net',
      url='http://sourceforge.net/projects/mwclient/',
      maintainer='Baishampayan Ghose',
      maintainer_email='b.ghose@gmail.com',
      keywords=('wikipedia', 'mediawiki'),
      packages=['mwclient']
     )
