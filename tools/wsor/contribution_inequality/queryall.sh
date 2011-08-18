#!/bin/bash

wd=`pwd`
mkdir results
pushd results
for args in {2001..2010}' '{4..5}; do
        xargs -I {} $wd/query_top100.py {} $args < $wd/pages.txt
done
