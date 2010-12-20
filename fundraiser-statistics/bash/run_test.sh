#!/bin/bash

# RUN DONATION PROCESS TESTS HOURLY

cd /home/rfaulk/fundraiser-statistics/fundraiser-scripts

D=$(date +%Y%m)
day=$(date +%d)
hr=$(date +%H)
let hr=$((10#$hr))

let hr=hr-1

# check if new day
if [ $hr -lt 0 ]; then 
	hr=23
	let day=day-1
fi

# check hour field
if [ $hr -lt 10 ]; then
	T2="${D}${day}0${hr}5500"
else
	T2="${D}${day}${hr}5500"
fi

let hr=hr-1

# check if new day
if [ $hr -lt 0 ]; then
	hr=23
	let day=day-1 
fi

# check hour field
if [ $hr -lt 10 ]; then
	T1="${D}${day}0${hr}5500"
else
	T1="${D}${day}${hr}5500"
fi

# echo $T1
# echo $T2

python data_aggregation_script.py $T1 $T2 banner
