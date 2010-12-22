#!/bin/bash


# Get the date and hour
ymd=$(date +%Y-%m-%d)
hr=$(date +%H)
let hr=$((10#$hr)) # convert to decimal

# Look at the previous hour
if [ $hr -gt 0 ]; then
	let hr=hr-1
else
	hr=23
	ym=$(date +%Y-%m)
	day=$(date +%d)
	let day=$((10#$day))-1
	
	if [ $day -lt 10 ]; then
		day="0${day}"
	fi

	ymd="${ym}-${day}" 
fi

# Account for the 24hr clock
# determine if it is the afternoon
if [ $hr -gt 11 ]; then
	if [ $hr -ne 12 ]; then 
		let hr=hr-12
	fi
	part="PM"
else
	if [ $hr -eq 0 ]; then
		let hr=12
	fi
	part="AM"
fi

#echo $hr
#echo $part

# Form the identifier string
if [ $hr -lt 10 ]; then
	T="${ymd}-0${hr}${part}"
else
	T="${ymd}-${hr}${part}"
fi

#echo $T


cd /home/rfaulk/fundraiser-statistics/fundraiser-scripts/logs

sftp rfaulk@hume.wikimedia.org:/a/static/uncompressed/udplogs/landingpages-$T*
sftp rfaulk@hume.wikimedia.org:/a/static/uncompressed/udplogs/bannerImpressions-$T*

cd ..

python squid_miner_script.py l ./logs/landingpages-$T* 1>./mine-log/log-banimp-$T.txt 2>./mine-log/log-banimp-$T.txt
python squid_miner_script.py i ./logs/bannerImpressions-$T* 1>./mine-log/log-lp-$T.txt 2>./mine-log/log-lp-$T.txt

cp ./mine-log/log-banimp-$T.txt /srv/org.wikimedia.fundraising/stats/
cp ./mine-log/log-lp-$T.txt /srv/org.wikimedia.fundraising/stats/
