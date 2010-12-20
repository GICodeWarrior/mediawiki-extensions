#!/bin/bash

# This script finds the last complete run (with or without errors) for each 
# project and pushes the files out to Google storage. 
#
# Usage: gbackup-xml-lastruns.sh [YYYYMMDD]
#
# Without the date, a bucket name is generated based on the current date.
# Use an argument instead in order to resume backup from a previous run.
# Make sure any partially uploaded files from that run are removed from
# Google storage before resuming.
#
# NOTE: This script relies on gsutil, which can be downloaded here:
# http://commondatastorage.googleapis.com/pub/gsutil.tar.gz
# Make sure you have already initialized your gsutil credentials:
# run the command "gsutil ls" from the command line and 
# when it prompts you for your access key and your secret key, 
# enter them.  They are stored in your home directory in the config
# file ".boto"

dumpbasepath="/data/xmldatadumps/public"
#backuplistsbasepath="/data/xmldatadumps/googlebackups"
backuplistsbasepath="/home/ariel/googlestorage/googlebackups"

list=`echo $dumpbasepath/*`

usage() {
  echo "Usage: $0 [rundate]"
  echo "The optional argument rundate may be specified in order to"
  echo "resume backups to google of a previous set of complete runs."
  echo "The argument should be in UTC time,  YYYYMMDD format"
  echo
  echo "For example:"
  echo "$0 20101215";
  echo
  echo "If you want to resume a previous backup you should also remove any partially"
  echo "uploaded files before resuming, as this script will refuse to re-upload any"
  echo "already existing files."
  echo
  echo "Without the argument, a new list of most recently completed dumps (the most recent"
  echo "for each public wiki project) will be generated, stored in $backuplistsbasepath/"
  echo "with a name based on the day this script was run, and subsequently all dumps in"
  echo "that list will be uploaded to google in a new bucket with that date."
  echo
  echo "Note that even if a copy of a dump already exists in a previous bucket, if it's"
  echo "the most recent complete dump for that project we will copy it again; this makes"
  echo "things easier for the user and for us if we ever need to retrieve the data."
  exit 1
}

listlatestdumpforproject() {
    # cannot rely on timestamp. sometimes we have rerun a phase in 
    # some earlier dump and have it completed later than a later dump,
    # or we may have two en pedia runs going at once in different 
    # phases.
    dirs=`ls -r $project | grep -v latest`
    for day in $dirs; do
	# skip the bad and archive dirs, those won't be good runs
	if [ "$project" == "$dumpbasepath/bad" -o "$project" == "$dumpbasepath/archive" ]; then
	    continue
	fi
	# we have a bunch of cruft in there like index files, etc.
	# also a bunch of things that aren't dump dirs, like
	# tools, mw, static...
	if [ -d "$project/$day" ]; then
	    complete=`grep "Dump complete" "$project/$day/status.html" 2>/dev/null`
	    if [ ! -z "$complete" ]; then
		echo "$project/$day" >> "$listtobackup"
		break
	    fi
	fi
    done
}

createbackuplist() {
    > "$listtobackup"
    list=`echo $dumpbasepath/*`
    for project in $list; do
#	echo doing $project
	listlatestdumpforproject
    done
    echo "created backup list $listtobackup"
}

checkifbackedupalready() {
    result=`gsutil ls "$googlebucketname/$googlefilename" 2>&1 | grep InvalidUriError`
    if [ -z "$result" ]; then
	alreadydone=1
    else
	alreadydone=0
    fi
}

if [ ! -z "$1"  ]; then
    rundate="$1"
    googlebucketname="gs://wikimedia-xmldumps-completeruns-$rundate"
    result=`gsutil ls "$googlebucketname" 2>&1 | grep "Not Found"`
    if [ ! -z "$result" ]; then
	echo "No such google bucket $googlebucketname"
	usage
    fi
    listtobackup="$backuplistsbasepath/backtheseup-$rundate.txt"
    if [ ! -e "$listtobackup" ]; then
	echo "no list of things to back up for the run date $rundate"
	echo "Are you sure this is a backup to be resumed?"
	usage
    fi
else
    rundate=`date -u +%Y%m%d`
    googlebucketname="gs://wikimedia-xmldumps-completeruns-$rundate"
    gsutil mb "$googlebucketname"
    listtobackup="$backuplistsbasepath/backtheseup-$rundate.txt"
    createbackuplist
fi

# ok now we have a list of directories and projects to back up.
# let's do them one file at a time, using the gsutil cp -R won't give
# us quite the right filenames.

while read line
do
    filenames=`echo $line/*`
    for f in $filenames; do
	# put together the right filename for google
	googlefilename=`echo $f | sed -e "s|$dumpbasepath/||;"`
	checkifbackedupalready
	if [ "$alreadydone" -eq "0" ]; then
	    # push it over
	    gsutil cp -a "public-read" "$f" "$googlebucketname/$googlefilename"
	fi
    done
done < "$listtobackup"
echo "finished copy to google of directories in $listtobackup"
