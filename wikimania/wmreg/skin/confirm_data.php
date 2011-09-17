<?php
/* Prevent hacking */
if ( !defined( 'TC_STARTED' ) )
{
	die( 'Hacking Attempt' );
}

global $WikimediaLanguages, $WikimediaOrgs, $WikimediaProjects,
$error_message, $register_data, $lang_countries, $myself_url,
$_COOKIE, $my_session, $lang_register_form, $lang_messages, $userLanguage;

/* Fix XSS */
foreach ( $register_data as $key => $val )
{
	if ( !is_array( $val ) )
		$val = htmlspecialchars( $val );
}

function get_lang( $lang_id ) {
	global $lang_register_form;
	if ( !in_array( $lang_id, array_keys( $lang_register_form ) ) )
	{
		return false;
	}
	echo $lang_register_form[$lang_id];
}
?>
<?php
if ( $userLanguage == 'ar' || $userLanguage == 'fa' || $userLanguage == 'he' )
{
echo '<div dir="rtl">';
}
?>
<p style="text-align:center;"><img src="wikimania2011reg.png" alt="Wikimania 2011 Logo" /></p>
<h1><?php get_lang( 'confirm' ); ?></h1>
<p><?php get_lang( 'confirm_description' ); ?></p>
<form method="post" action="<?php echo $myself_url . 'index.php'; ?>" >
<fieldset class="record">
<legend class="title"><?php get_lang( 'legend1' ) ?></legend>
<table class="form_table">
<colgroup>
	<col class="col_left" />
	<col class="col_right" />
</colgroup>
	<tr>
		<th colspan="2"> <?php get_lang( 'title1' ); ?></th>
	</tr>
		<tr>
		<td><?php get_lang( 'given_name' ); ?></td>
		<td><?php echo $register_data['given_name']; ?></td>
	</tr>
	<tr>
		<td><?php get_lang( 'surname' ); ?></td>
		<td><?php echo $register_data['surname']; ?></td>
	</tr>
	<tr>
		<td><?php get_lang( 'sex' ); ?></td>
		<td>
			<?php
			if ( $register_data['sex'] == 'm' ) get_lang( 'sex1' );
			if ( $register_data['sex'] == 'f' ) get_lang( 'sex2' );
			if ( $register_data['sex'] == 'd' ) get_lang( 'sex3' );
			?>
		</td>
	</tr>
	<tr>
		<td><?php get_lang( 'country' )?></td>
		<td>
			<?php echo $lang_countries[$register_data['country']]; ?>
		</td>
	</tr>
	<tr>
		<th colspan="2"><?php get_lang( 'title2' ); ?></th>
	</tr>
	<tr>
		<td><?php get_lang( 'langn' )?></td>
		<td>
			<?php echo $WikimediaLanguages[$register_data['langn']]; ?>
		</td>
	</tr>
	<tr>
		<td><?php get_lang( 'lang' ); ?></td>
		<td>
			<?php for ( $i = 1; $i <= 3; $i++ )
			{
				echo '<p class="langline">';
				echo $WikimediaLanguages[$register_data['lang' . $i]] . ' - ';
				get_lang( 'lang_level' . $register_data['lang' . $i . '-level'] );
				echo'</p>' . "\n";
			}
			?>
		</td>
	</tr>
	<tr>
		<th colspan="2"><?php get_lang( 'title3' ); ?></th>
	</tr>
	<tr>
		<td><?php get_lang( 'wiki_id' )?></td>
		<td>
			<?php if ( $register_data['wiki_id'] ) echo $register_data['wiki_id'] . '@' . $register_data['wiki_language'] . '.' . $register_data['wiki_project'] . '.org'; ?>
		</td>
	</tr>
	<tr>
		<td><?php get_lang( 'email' )?></td>
		<td><?php echo $register_data['email']; ?></td>
	</tr>
</table>
</fieldset>
<fieldset class="record">
<legend class="title"><?php get_lang( 'legend2' ) ?></legend>
<table class="form_table">
<colgroup>
	<col class="col_left" />
	<col class="col_center" />
	<col class="col_right" />
</colgroup>
	<tr>
		<th colspan="2"><?php get_lang( 'title4' ); ?></th>
	</tr>
	<tr>
		<td><?php get_lang( 'join_date' ); ?></td>
		<td>
			<?php
			for ( $i = 1; $i <= 6; $i++ )
			{
				if ( in_array( $i, $register_data['join_date'] ) )
				{
					get_lang( 'join' . $i );
					echo '<br>';
				}
			}
			?>
		</td>
	</tr>
	<tr>
		<td><?php get_lang( 'picktour' ); ?></td>
		<td>
			<?php
			if ( $register_data['tours'] >= 0 && $register_data['tours'] <= 5 )
			{
				get_lang( 'tour' . $register_data['tours'] );
			}
			?>
		</td>
	</tr>
	<tr>
		<td><?php get_lang( 'showname' ); ?></td>
		<td>
			<?php
			for ( $i = 1; $i <= 3; $i++ )
			{
				if ( in_array( $i, $register_data['showname'] ) )
				{
					get_lang( 'showname' . $i );
					if ( $i == 3 )
					{
						echo ' : ' . $register_data['custom_showname'];
					}
					else
					{
						echo ', ';
					}
				}
			}
			?>
		</td>
	</tr>
	<tr>
		<td><?php get_lang( 'size' ); ?></td>
		<td>
			<?php echo $register_data['size']; ?>
		</td>
	</tr>
	<tr>
		<td><?php get_lang( 'food' ); ?></td>
		<td>
			<?php
			if ( $register_data['food'] >= 1 && $register_data['food'] <= 2 )
			{
				get_lang( 'food' . $register_data['food'] );
			}
			if ( $register_data['food'] == 3 )
			{
				get_lang( 'food_other' );
				echo $register_data['food_other'];
			} ?>
		</td>
	</tr>
	<tr>
		<th colspan="2"><?php get_lang( 'title_visa' ); ?></th>
	</tr>
	<tr>
		<td><?php get_lang( 'visa_assistance' ); ?></td>
		<td><?php if ( $register_data['visa_assistance'] ) get_lang( 'need_visa_assistance' ); ?></td>
	</tr>
	<tr>
		<td><?php get_lang( 'nationality' ); ?></td>
		<td><?php if ( $register_data['visa_assistance'] ) echo $register_data['nationality']; ?></td>
	</tr>
	<tr>
		<td><?php get_lang( 'passport' ); ?></td>
		<td><?php if ( $register_data['visa_assistance'] ) echo $register_data['passport']; ?></td>
	</tr>
	<tr>
		<td><?php get_lang( 'passport_issued' ); ?></td>
		<td><?php if ( $register_data['visa_assistance'] ) echo $register_data['passport_issued']; ?></td>
	</tr>
	<tr>
		<td><?php get_lang( 'countryofbirth' ); ?></td>
		<td><?php if ( $register_data['visa_assistance'] ) echo $register_data['countryofbirth']; ?></td>
	</tr>
	<tr>
		<td><?php get_lang( 'homeaddress' ); ?></td>
		<td><?php if ( $register_data['visa_assistance'] ) echo $register_data['homeaddress']; ?></td>
	</tr>
	<tr>
		<td><?php get_lang( 'visa_assistance_description' ); ?></td>
		<td><?php if ( $register_data['visa_assistance'] ) echo $register_data['visa_assistance_description'] ?></td>
	</tr>
	<tr>
		<th colspan="2"><?php get_lang( 'title5' ); ?></th>
	</tr>
	<tr>
		<td><?php get_lang( 'accommodation' ); ?></td>
		<td>
			<?php
			if ( is_array( $register_data['nights'] ) ) {
				for ( $i = 1; $i <= 8; $i++ )
				{
					if ( in_array( $i, $register_data['nights'] ) )
					{
						get_lang( 'night' . $i );
						echo '<br>';
					}
				}
			} ?>
		</td>
	</tr>
	<tr>
		<td><?php get_lang( 'accommodation_hotel' ); ?></td>
		<td>
			<?php
			if ( $register_data['hotels'] >= 1 && $register_data['hotels'] <= 9 )
			{
				get_lang( 'hotel' . $register_data['hotels'] );
			} ?>
		</td>
	</tr>
	<tr>
		<td><?php get_lang( 'room' ); ?></td>
		<td>
		<?php
		if ( $register_data['room'] >= 1 && $register_data['room'] <= 3 )
		{
			get_lang( 'room' . $register_data['room'] );
		}
		if ( $register_data['room'] == 3 )
		{
			echo $register_data['room_partner'];
		}
		?>
		</td>
	</tr>
	<tr>
		<td><?php get_lang( 'room_requests' ); ?></td>
		<td><?php echo $register_data['room_requests']; ?></td>
	</tr>
	<tr>
		<th colspan="2"><?php get_lang( 'title6' ); ?></th>
	</tr>
	<tr>
		<td><?php echo $lang_messages['attendance_cost']; ?></td>
		<td><?php echo $register_data['currency'] . ' ' . $register_data['attendance_cost']; ?></td>
	</tr>
	<tr>
		<td><?php echo $lang_messages['accommodation_cost']; ?></td>
		<td><?php echo $register_data['currency'] . ' ' . $register_data['accommodation_cost']; ?></td>
	</tr>
	<tr>
		<td><?php echo $lang_messages['vat_cost']; ?></td>
		<td><?php echo $register_data['currency'] . ' ' . $register_data['vat_cost']; ?></td>
	</tr>
	<tr>
		<td><?php echo $lang_messages['total_cost']; ?></td>
		<td><?php echo $register_data['currency'] . ' ' . $register_data['cost_total']; ?></td>
	</tr>
</table>
</fieldset>



<div id="button">
	<?php
		for ( $i = 1; $i <= 6; $i++ )
		{
			if ( in_array( $i, $register_data['join_date'] ) )
 			{
				echo '<input type="hidden" name="join_date[]" value="' . $i . '" />' . "\n";
			}
		}
		unset( $register_data['join_date'] );
		for ( $i = 1; $i <= 3; $i++ )
		{
			if ( in_array( $i, $register_data['showname'] ) )
 			{
				echo '<input type="hidden" name="showname[]" value="' . $i . '" />' . "\n";
			}
		}
		unset( $register_data['showname'] );
		if ( is_array( $register_data['nights'] ) )
		{
			for ( $i = 1; $i <= 8; $i++ )
			{
				if ( in_array( $i, $register_data['nights'] ) )
	 			{
					echo '<input type="hidden" name="nights[]" value="' . $i . '" />' . "\n";
				}
			}
		}
		unset( $register_data['nights'] );
		foreach ( $register_data as $name => $value )
		{
			echo '<input type="hidden" name="' . $name . '" value="' . $value . '" />' . "\n";
		}
	?>
	<input type="submit" name="submit" value="<?php get_lang( 'submit' ); ?>" />
	<input type="submit" name="submit" value="<?php get_lang( 'reset' ); ?>" />
	<input type="hidden" name="uselang" value="<?php echo $userLanguage?>" />
	<input type="hidden" name="action" value="submit" />
	<?php if ( !$_COOKIE['wikimania'] ) echo '<input type="hidden" name="secret_id" value="' . $my_session->handle . '" />'; ?>
	<input type="hidden" name="secert_id2" value="<?echo $_SESSION['secret']; ?>" />
</div>
</form>
<?php
if ( $userLanguage == 'ar' || $userLanguage == 'fa' || $userLanguage == 'he' )
{
echo '</div>';
} ?>