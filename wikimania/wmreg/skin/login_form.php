<?php

/* Prevent hacking */
if ( !defined( 'TC_STARTED' ) )
{ die( 'Hacking Attempt' ); }

global $error_message, $register_data;

/* Fix XSS */
$register_data = array_map( 'htmlspecialchars', $register_data );
?>

<h1>Administration</h1>
<p id="special_pages"><a href="<?php echo $myself_url . 'index.php'?>"
	title="Return to Registration form">Registration Form</a> | <a
	href="<?php echo $myself_url . 'index.php?action=query'?>"
	title="You can query the registration status for Wikimania 2011 in here.">Query
your registration status</a></p>

<?php if ( !empty( $error_message ) )
echo '<div id="correction">' . "\n" . '<p>Wrong username or Password, can\'t login!</p>' . "\n" . '</div>' . "\n";
?>
<form method="post" action="<?php echo $myself_url?>index.php">

<table class="form_table">
	<colgroup>
		<col class="col_left" />
		<col class="col_right" />
	</colgroup>
	<tr>
		<td><label for="user_id" class="col_title">Username</label></td>
		<td><input name="user_id" type="text" id="user_id"
			value="<?php echo $register_data['user_id']; ?>" /></td>
	</tr>
	<tr>
		<td><label for="password" class="col_title">Password</label></td>
		<td><input name="password" type="password" id="password"
			value="<?php echo $register_data['password']; ?>" /></td>
	</tr>
</table>
<div id="button"><input type="submit" name="Submit" value="Login" /> <input
	name="reset" type="reset" id="reset" value="reset" /> <input
	type="hidden" name="action" value="admin_login" /> <?php if ( !$_COOKIE['wikimania'] ) echo '<input type="hidden" name="secret_id" value="' . $my_session->handle . '" />'; ?>
</div>
</form>
