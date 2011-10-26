#!/bin/sh
FOLDER="../ToolserverI18N/language/messages"
JUSTMESSAGES="justMessages"

if [ ! -z "$1" ]; then
   FOLDER="$1"
fi

if ! which "$JUSTMESSAGES" 2> /dev/null 1>&2; then
  DIRNAME=$(dirname $0)
  if [ -z "$DIRNAME" ]; then
    DIRNAME="."
  fi
  JUSTMESSAGES="$DIRNAME/$JUSTMESSAGES"
fi

set -e
LOCKFILE="$FOLDER/.svn/lock"
( set -C; printf "" > "$LOCKFILE" ) 2> /dev/null
trap 'rm "$LOCKFILE"' EXIT
TEMP=`mktemp -d`
rsync -a "$FOLDER"/ "$TEMP"
rm "$TEMP/.svn/lock"
svn up "$TEMP"
find "$TEMP" -name "*.php" -exec "$JUSTMESSAGES" \{\} +
touch "$TEMP/.svn/lock"
rsync -a --delete "$TEMP"/ "$FOLDER"
# $LOCKFILE removed on exit

