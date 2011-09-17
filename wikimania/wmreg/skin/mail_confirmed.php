<?php
/* Prevent hacking */
if(!defined('TC_STARTED')) 
{ die('Hacking Attempt'); }

$mail_confirmed_content = <<<EOM
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<body>

<p><img src="http://upload.wikimedia.org/wikipedia/commons/0/0c/Haifa_wikimania_3.png" width=600 /></p>

<h2>Wikimania 2011 - Registration Confirmed</h2>

<p>Dear $1,</p>

<p>Thank you for joining Wikimania 2011, hich will be held at the Haifa Auditorium in Haifa, Israel on August 4-7, 2011.</p>
 
<p>Your registration has been confirmed!</p>

<h4>Further questions</h4>

<p>If you have any questions about your registration, please make sure to visit our conference website at <a href="http://wikimania2011.wikimedia.org">http://wikimania2011.wikimedia.org</a>. 
Should you have any specific requests (including accommodation, payment, cancellation or modfications), please email the Wikiminia 2011 team at <a href="mailto:wikimania-registration@wikimedia.org" title="Send mail to wikimania-registration@wikimedia.org">wikimania-registration@wikimedia.org</a>, 
with the registration details listed below.</p>

<ul> 
<li>Confirmation Number: $2</li>
<li>Name: $1</li>
<li>Email: $4</li> 
<li>Accommodation: $5</li>
<li>Accommodation choice: $6</li>
</ul>

<p>We look forward to welcoming you in Haifa,</p>

<p>The Wikimania 2011 team</p> 
</body>
</html>
EOM;
?>
