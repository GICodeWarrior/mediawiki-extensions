#
# Regular cron jobs for the oggvideotools package
#
0 4	* * *	root	[ -x /usr/bin/oggvideotools_maintenance ] && /usr/bin/oggvideotools_maintenance
