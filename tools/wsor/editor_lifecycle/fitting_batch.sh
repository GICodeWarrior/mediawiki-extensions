#!/bin/bash

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
