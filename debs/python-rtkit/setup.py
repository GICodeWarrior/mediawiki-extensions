#!/usr/bin/env python

from setuptools import setup
import rtkit

setup(name="python-rtkit",
      version=rtkit.__version__,
      description="Python Api for Request Tracker's REST interface",
      long_description=open("README").read(),
      author=rtkit.__author__,
      author_email="martine@danga.com",
      maintainer="Andrea de Marco",
      maintainer_email="24erre@gmail.com",
      url="https://github.com/z4r/python-rtkit",
      download_url="https://github.com/z4r/python-rtkit/tarball/master",
      packages=["rtkit"],
      classifiers=rtkit.__classifiers__
     )
