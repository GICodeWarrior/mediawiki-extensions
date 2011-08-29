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

# Applies the `fitting' script to a batch of files
#
# author: Giovanni Luca Ciampaglia <gciampaglia@wikimedia.org>
#
# USAGE: fitting_batch.sh file1 file2 file3 ...
#
# This will produce the normal console output that fitting produces; PDF plots
# will be stored in file fit.pdf (please note: no check against overwriting
# existing versions is performed!)

if [[ -z `type -p fitting` ]] ; then
    echo 'error: could not find fitting script. Check your PATH'
    exit 1
fi

if [[ -e fit.pdf ]] ; then
    echo 'error: cannot overwrite file fit.pdf'
    exit 1
fi

O=`mktemp -d`
models="expon powerlaw stretchedexp"
files="$@"

for file in $files ; do
    for model in $models ; do
        fitting $model -force -loglog -batch $file -o $O/${file%.*}_$model.pdf 
        echo
        echo
    done
done

pdfs=`ls $O/*.pdf | sort`

gs -dNOPAUSE -sDEVICE=pdfwrite -sOUTPUTFILE=fit.pdf -dBATCH $pdfs &>/dev/null

if [[ $? = 0 ]] ; then
    echo 'images saved in fit.pdf'
else
    echo "error: problem saving fit.pdf. Individual image files in $O"
fi
