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

for exp in {1..10}
do
    list=`find counts -iname 200?*_-$exp.npz`
    if [[ -n "$list" ]] ; then
        echo $list | xargs comprates -n 0 -n 1 -o rates/ns_main_talk/1e-$exp
        echo $list | xargs comprates -n 2 -n 3 -o rates/ns_user_usertalk/1e-$exp 
        echo $list | xargs comprates -n 4 -n 5 -o rates/ns_wikipedia_wikipediatalk/1e-$exp 
    fi
done
