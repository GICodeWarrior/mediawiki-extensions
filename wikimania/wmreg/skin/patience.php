<?php
/* Prevent hacking */
if(!defined('TC_STARTED'))
{ die('Hacking Attempt'); }
?>

<script type="text/javascript">
//######################################################################################
// Author: ricocheting.com
// For: public release (freeware)
// Date: 4/24/2003 (update: 6/26/2009)
// Description: displays the amount of time until the "dateFuture" entered below.


// NOTE: the month entered must be one less than current month. ie; 0=January, 11=December
// NOTE: the hour is in 24 hour format. 0=12am, 15=3pm etc
// format: dateFuture = new Date(year,month-1,day,hour,min,sec)
// example: dateFuture = new Date(2003,03,26,14,15,00) = April 26, 2003 - 2:15:00 pm

dateFuture = new Date(1293840000000);

function GetCount(){

	dateNow = new Date();									//grab current date
	amount = dateFuture.getTime() - dateNow.getTime();		//calc milliseconds between dates
	delete dateNow;

	// time is already past
	if(amount < 0){
		document.getElementById('countbox').innerHTML="Now!";
	}
	// date is still good
	else{
		days=0;hours=0;mins=0;secs=0;
		out="Just ";

		amount = Math.floor(amount/1000);//kill the "milliseconds" so just secs

		days=Math.floor(amount/86400);//days
		amount=amount%86400;

		hours=Math.floor(amount/3600);//hours
		amount=amount%3600;

		mins=Math.floor(amount/60);//minutes
		amount=amount%60;

		secs=Math.floor(amount);//seconds

		if(days != 0){out += days +" day"+((days!=1)?"s":"")+", ";}
		if(days != 0 || hours != 0){out += hours +" hour"+((hours!=1)?"s":"")+", ";}
		if(days != 0 || hours != 0 || mins != 0){out += mins +" minute"+((mins!=1)?"s":"")+", ";}
		out += secs +" seconds left!";
		document.getElementById('countbox').innerHTML=out;

		setTimeout("GetCount()", 1000);
	}
}

window.onload=GetCount;//call when everything has loaded

</script>
<p style="text-align: center;"><img src="wikimania2011reg.png"
	alt="Wikimania 2011 Logo" /><br>
<br>
<big>Please be patient!</big></p>
<br>
<br>
<p style="text-align: center;"><a
	title="By Xander89 [CC-BY-SA-3.0,2.5,2.0,1.0 or GFDL], from Wikimedia Commons"
	href="http://commons.wikimedia.org/wiki/File:Hourglass_modern_2.svg"><img
	width='120px' alt="Hourglass modern 2"
	src="http://upload.wikimedia.org/wikipedia/commons/thumb/f/fe/Hourglass_modern_2.svg/120px-Hourglass_modern_2.svg.png"
	border='0' /></a>
<br>
<br>
<?php 
echo 'Wikimania 2011 Registration will open on '.gmdate('Y-m-d H:i',
$open_time). ' (UTC). ';
echo '<br> <p id="countbox" align="center"></p> ';?>
</p>

