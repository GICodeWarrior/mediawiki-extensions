#!/bin/bash


for exp in {1..10}
do
    list=`find counts -iname 200?*_-$exp.npz`
    if [[ -n "$list" ]] ; then
        echo $list | xargs comprates -n 0 -n 1 -o rates/ns_main_talk/1e-$exp
        echo $list | xargs comprates -n 2 -n 3 -o rates/ns_user_usertalk/1e-$exp 
        echo $list | xargs comprates -n 4 -n 5 -o rates/ns_wikipedia_wikipediatalk/1e-$exp 
    fi
done
