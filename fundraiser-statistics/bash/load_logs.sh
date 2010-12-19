#!/bin/bash

cd /home/rfaulk/fundraiser-scripts

# get date from command line args
day=$1  # start day
start_hr=$2  # start hour 
N=$3  # number of logs


#day=13
#start_hr=9
#N=4

#for i in {1..N}
for (( i=0; i<N; i++ ))
do

	let hr=start_hr+i
	
	#echo $hr

	if [ $hr -gt 23 ]; then
		let start_hr=-i
		hr=0	
		let day=day+1
	fi

	#echo $hr

	# assign part of day string
	if [ $hr -lt 12 ]; then	
		part="AM"
		if [ $hr -eq 0 ]; then
			hr=12
		fi
	else
		if [ $hr -gt 12 ]; then
			let hr=hr-12
		fi
		part="PM"	
	fi

	#echo $hr

	T=$(date +%Y-%m-)

	if [ $hr -lt 10 ]; then
		T="${T}${day}-0${hr}${part}*"
	else
		T="${T}${day}-${hr}${part}*"	
	fi

	sftp rfaulk@hume.wikimedia.org:/a/static/uncompressed/udplogs/landingpages-$T* ./logs
	sftp rfaulk@hume.wikimedia.org:/a/static/uncompressed/udplogs/bannerImpressions-$T ./logs
	#sftp rfaulk@locke.wikimedia.org:/a/squid/fundraising/logs/toProcess/landingpages-$T* ./logs
        #sftp rfaulk@locke.wikimedia.org:/a/squid/fundraising/logs/toProcess/bannerImpressions-$T ./logs
	
	python squid_miner_script.py i ./logs/bannerImpressions-$T 
	python squid_miner_script.py l ./logs/landingpages-$T*
   	echo $T
done
