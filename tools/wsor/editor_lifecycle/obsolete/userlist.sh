#!/bin/bash

# Copyright (C) 2011 GIOVANNI LUCA CIAMPAGLIA, GCIAMPAGLIA@WIKIMEDIA.ORG
# This program is free software; you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation; either version 2 of the License, or
# (at your option) any later version.
# 
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
# GNU General Public License for more details.
# 
# You should have received a copy of the GNU General Public License along
# with this program; if not, write to the Free Software Foundation, Inc.,
# 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.
# http://www.gnu.org/copyleft/gpl.html

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
