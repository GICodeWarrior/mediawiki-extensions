# Makefile for profile collector package
# $Id: Makefile 12318 2005-12-31 15:34:46Z midom $
#
#MacOSX Fink library paths 
#CFLAGS+=-I/sw/include/
#LDFLAGS+=-L/sw/lib/

#MacOSX MacPorts library paths
CFLAGS+=-I/opt/local/include/
LDFLAGS+=-L/opt/local/lib/ -ldb-4.3 -lpthread

#LDFLAGS+=-ldb
CFLAGS+=-Wall -g

all: collector filter

collector: collector.h collector.c export.c

filter: filter.c
	cc -o filter filter.c

#export: collector.h export.c

clean:
	rm -f collector exporter
