#!/bin/sh

repository="http://svn.wikimedia.org/svnroot/mediawiki/trunk/testing/util/"

cd $DESTINATION_DIR
if test -n "$REVISION"; then
	svn checkout -r $REVISION $repository
else
	svn checkout $repository
fi
