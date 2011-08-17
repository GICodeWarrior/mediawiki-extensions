#!/bin/bash

# This scripts writes to output a list of registered, not-flagged-as-bot users,
# sorted by time of first edit. Each item in the list comprises:
#
# 1. user_id
# 2. user_name
# 3. first_timestamp
# 4. editcount
#
# For the SQL query, check file userlist.sql.

srcdir=`dirname $(type -p $0)`
mysql -BN < $srcdir/userlist.sql | sort -h -k3 -t $'\t'
