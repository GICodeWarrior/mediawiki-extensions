#!/bin/sh

$MYSQL_COMMAND $DATABASE_NAME < $DESTINATION_DIR/$NAME/sql/patch-antispoof.mysql.sql
