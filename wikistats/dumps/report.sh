#!/bin/bash

# Update English reports for project $1 whenever input csv files are newer than html reports
# Update reports for other 25+ languages at most once a month, to economize processing time 
# Whenever Englisgh reports have been updated run archive job

interval=30  # only update non-English reports once per 'interval' days 
force_run_report=0

function echo2 {
  echo $1
  echo $1 >> log_report_sh.txt
}

clear 
echo2 "---------------" 
echo2 "Start report.sh $1 $2"
date >> log_report_sh.txt

# Validate project code
if [ "$1" == "" ] ; then
  echo2 "Project code missing! Specify as 1st argument one of wb,wk,wn,wp,wq,ws,wv,wx"
  exit
fi  
 
# Abort when 2nd argument specifies a threshold in days, which is not met
# This prevents costly reporting step when new month has just started and most counting still needs to be done
abort_before=$2
day_of_month=$(date +"%d")
if [ $day_of_month -lt ${abort_before:=0} ] ; then
  echo2 "report.sh: day of month $day_of_month lt $abort_before - exit"
  exit
fi

if [ "$abort_before" != "" ] ; then
  echo2 "Day of month $day_of_month le $abort_before - continue"
fi  

# Once in a while update and cache language names in so many target languages
# Sources are TranslateWiki and interwiki links on English Wikipedia 
./sync_language_files.sh 

do_zip=0 # trigger archive step ?

case "$1" in 
  wb) project='Wikibooks' ;     dir='wikibooks' ;;
  wk) project='Wiktionaries' ;  dir='wiktionary' ;;
  wn) project='Wikinews' ;      dir='wikinews' ;;
  wp) project='Wikipedias' ;    dir='.' ;;
  wq) project='Wikiquotes' ;    dir='wikiquote' ;;
  ws) project='Wikisources' ;   dir='wikisource' ;;
  wv) project='Wikiversities' ; dir='wikiversity' ;;
  wx) project='Wikispecial' ;   dir='wikispecial' ;;
  *)  project='unknown' ;       dir='...' ;; 
esac  
echo2 "Generate and publish reports for project $project"

for x in en ast bg br ca cs da de eo es fr he hu id it ja nl nn pl pt ro ru sk sl sr sv wa zh ;
do

  echo2 ""
  echo2 "Language code $x"

  # Get timestamp last reports for language x
  x_upper=$( echo "$x" | tr '[:lower:]' '[:upper:]' )	
  file="/a/out/out_$1/$x_upper/#index.html"	
  now=`date +%s`
  prevrun=`stat -c %Y $file`
  let secs_out="$now - $prevrun" 
  let days_out="$secs_out/86400"
  echo2 "File $file generated $days_out days ago"
  
  # Get timestamp for most recent csv files 
  file="/a/wikistats/csv_$1/StatisticsLog.csv"	
  now=`date +%s`
  prevrun=`stat -c %Y $file`
  let secs_csv="$now - $prevrun" 
  let days_csv="$secs_csv/86400"
  echo2 "File $file generated $days_csv days ago"
  
  # Set source and destination paths for publishing reports
  out=/a/out/out_$1/$x_upper/ 
  htdocs=/mnt/htdocs/$dir/$x_upper

  # Check if reports need to be run now for language x
  run_report=0
  if [ $force_run_report -ne 0 ] ; then
    echo2 "Forced run of reports"					
    run_report=1		
    do_zip=1 
  else  
    if [ "$secs_csv" -lt "$secs_out" ] ; then
      echo2 "Csv files are newer than reports ... "

      if [ "$x" == "en" ] ; then
        do_zip=1
        run_report=1
      else  
        echo2 $days_out days since reports were generated, reporting interval is $interval days  
	if [ $days_out -gt $interval ] ; then
          run_report=1
        else
							if [ "$force_run_report" -ne 0 ] ; then
            echo2 "Skip reporting for non-English languages, only update these once every $interval days"
          fi							
        fi	
      fi  
    else
      echo2 "Reports for language code '$x' are up to date -> skip reporting"			
    fi  
  fi

  # If reporting needed now, do it now 
  if [ $run_report -eq 1 ] ; then
    echo2 "Run reporting for language $x"
    perl WikiReports.pl -m $1 -l $x -i /a/wikistats/csv_$1/ -o /a/out/out_$1

    echo2 ""
    echo2 "Copy new and updated files from $out -> $htdocs"
    rsync -a $out/* $htdocs/ >> log_report_sh.txt
    echo2 "List files from target folder older than a day"
    rsync -a $out/* $htdocs/ >> log_report_sh.txt
    find $htdocs/ -mtime +1 | xargs ls -l # rather than 'ls -l $htdocs'
  fi

done;

# Generate category overviews (deactivated, reports became too large)
# perl WikiReports.pl -c -m $1 -l en -i /a/wikistats/csv_$1/ -o /a/out/out_$1 

echo2 ""

# Archive English reports
if [ $do_zip -eq 1 ] ; then
  echo2 "Archive new English reports" 
  ./zip_out.sh $1
else
  echo2 "No English reports built. Skip zip phase"							
fi  

echo2 ""
echo2 "Ready" 
