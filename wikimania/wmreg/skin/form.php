<script type="text/javascript">
function disable(idarray){
	for (x in idarray)
	{
	document.getElementById(idarray[x]).disabled = true;
	}
}

function enable(idarray){
	for (x in idarray)
	{
	document.getElementById(idarray[x]).disabled = false;
	}
}

function flip(idarray) {
	for (x in idarray)
	{
	document.getElementById(idarray[x]).disabled = !document.getElementById(idarray[x]).disabled;
	}
}

function popup(mylink, windowname) {
	if (! window.focus)return true;
	var href;
	if (typeof(mylink) == 'string')
	   href=mylink;
	else
	   href=mylink.href;
	window.open(href, windowname, 'width=800,height=600,scrollbars=yes');
	return false;
}
var RecaptchaOptions = {
	    theme : 'clean'
};
</script>

<?php
/* Prevent hacking */
if ( !defined( 'TC_STARTED' ) )
{
	die( 'Hacking Attempt' );
}
global $WikimediaLanguages, $WikimediaOrgs, $WikimediaProjects, $error_message, $register_data, $lang_countries, $myself_url, $_COOKIE, $my_session,
		$lang_register_form, $userLanguage, $available_languages, $recaptcha_publickey, $mock;

/* Fix XSS */
// $register_data = array_map('htmlspecialchars', $register_data);

$key_array = array( 'join_date', 'showname', 'nights' );
foreach ( $key_array as $key )
{
	if ( !is_array( $register_data[$key] ) || !isset( $register_data[$key] ) )
	{
		$register_data[$key] = array();
	}
}

function create_label( $label_id, $col_title = false ) {
	global $lang_register_form;
	// mandatory_fields  is an an array containing fields names of the fields that the user should input
	$mandatory_fields = array( "given_name", "surname", "sex", "country",
							  "langn", "email", "join_date",  "showname", "size", "color", "captcha" );
	if ( !in_array( $label_id, array_keys( $lang_register_form ) ) )
	{ return false; }
	if ( in_array( $label_id, $mandatory_fields ) )
	{
		if ( !$col_title )
			echo '<label for="' . $label_id . '">' . $lang_register_form[$label_id] . '*</label>';
		else
			echo '<label for="' . $label_id . '" class="col_title">' . $lang_register_form[$label_id] . '*</label>';
	}
	else
	{
		if ( !$col_title )
			echo '<label for="' . $label_id . '">' . $lang_register_form[$label_id] . '</label>';
		else
			echo '<label for="' . $label_id . '" class="col_title">' . $lang_register_form[$label_id] . '</label>';
	}
}
function get_lang( $lang_id )
{
	global $lang_register_form;
	if ( !in_array( $lang_id, array_keys( $lang_register_form ) ) )
		return false;
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

<?php if ( $mock == true ) { ?>
<p class="notice">
This is a mock registration site only, use it just for
testing.<br>
Please <a href="mailto:wikimania-registration@wikimedia.org">e-mail us</a>
about any problems you encounter with it.</p>
<?php } ?>

<h1><?php get_lang( 'registration_title' ); ?></h1>
<p>
	<?php foreach ( $available_languages as $name => $value )
	{
		echo '<a href="' . $myself_url . 'index.php?uselang=' . $name . '" title="' . $name . ' (' . $value . ')">' . $value . '</a> |' . "\n";
	} ?>
	<br><small>Want to translate this form into another language? Write us <a href=mailto:wikimania-registration@wikimedia.org>here</a></small>
</p>
<p id="special_pages">
	<?php
	if ( $userLanguage == 'ar' || $userLanguage == 'fa' || $userLanguage == 'he' )
	{
		echo '<div align="left">';
	} ?>
	<a href="<?= $myself_url . 'index.php?action=admin'?>" title="Enter the management system">Admin</a>
	|
	<a href="<?= $myself_url . 'index.php?action=query&uselang=' . $userLanguage?>" title="<?php get_lang( 'query_title' )?>"><?php get_lang( 'query' )?></a>
	<?php
	if ( $userLanguage == 'ar' || $userLanguage == 'fa' || $userLanguage == 'he' )
	{
		echo '</div>';
	} ?>
</p>
<?php if ( !empty( $error_message ) )
{
	echo '<div id="correction"><p>';
	get_lang( 'correction' );
	echo '</p>' . $error_message . '</div>';
} ?>

<form method="post" action="<?= $myself_url . 'index.php'; ?>" >
<fieldset class="record">
<legend><?php get_lang( 'legend1' ) ?></legend>
<table class="form_table">
	<colgroup>
		<col class="col_left" />
		<col class="col_right" />
	</colgroup>
	<tr>
		<th colspan="2"> <?php get_lang( 'title1' ); ?></th>
	</tr>
	<tr>
		<td><?php create_label( 'given_name', true ); ?></td>
		<td><input name="given_name" type="text" size="24"  value="<?= $register_data['given_name']; ?>" /></td>
	</tr>
	<tr>
		<td><?php create_label( 'surname', true ); ?></td>
		<td>
			<input name="surname" type="text" size="24"  value="<?= $register_data['surname']; ?>"/>
		</td>
	</tr>
	<tr>
		<td><?php create_label( 'sex', true ); ?></td>
		<td>
			<input type="radio" name="sex" value="m" id="sex1" <?php if ( $register_data['sex'] == 'm' ) echo 'checked="checked"'; ?> /><?php create_label( 'sex1' ); ?>
			<input type="radio" name="sex" value="f" id="sex2" <?php if ( $register_data['sex'] == 'f' ) echo 'checked="checked"'; ?> /><?php create_label( 'sex2' ); ?>
			<input type="radio" name="sex" value="d" id="sex3" <?php if ( $register_data['sex'] == 'd' ) echo 'checked="checked"'; ?> /><?php create_label( 'sex3' ); ?>
		</td>
	</tr>
	<tr>
		<td><?php create_label( 'country', true )?></td>
		<td>
			<select name="country" id="country">
			<option value=""><?php get_lang( 'select' ); ?></option>
			<?php foreach ( $lang_countries as $lang_country => $lang_country_name )
			{
				if ( $register_data['country'] == $lang_country )
				echo '<option value="' . $lang_country . '" selected="selected">' . $lang_country_name . ' (' . $lang_country . ')</option>' . "\n";
				else
					echo '<option value="' . $lang_country . '">' . $lang_country_name . ' (' . $lang_country .  ')</option>' . "\n";
			} ?>
			</select>
		</td>
	</tr>
	<tr>
		<th colspan="2"> <?php get_lang( 'title2' ); ?></th>
	</tr>
	<tr>
		<td><?php create_label( 'langn', true )?></td>
		<td>
			<select name="langn" id="langn">
				<option value=""><?php get_lang( 'select' ); ?></option>
				<?php foreach ( $WikimediaLanguages as $WikimediaLanguage => $WikimediaLanguageName )
				{
					if ( $register_data['langn'] == $WikimediaLanguage )
					echo '<option value="' . $WikimediaLanguage . '" selected="selected">' . $WikimediaLanguage . ' ' . $WikimediaLanguageName . '</option>' . "\n";
					else
					echo '<option value="' . $WikimediaLanguage . '">' . $WikimediaLanguage . ' ' . $WikimediaLanguageName . '</option>' . "\n";
				} ?>
			</select>
		</td>
	</tr>
	<tr>
		<td><?php create_label( 'lang' ); ?></td>
		<td>
			<?php for ( $i = 1; $i <= 3; $i++ )
			{
				echo '<p class="langline"><select name="lang' . $i . '">' . "\n" . '<option value="">' . $lang_register_form['select_lang'] . '</option>' . "\n";
				foreach ( $WikimediaLanguages as $WikimediaLanguage => $WikimediaLanguageName )
				{
					if ( $register_data['lang' . $i] == $WikimediaLanguage )
						echo '<option value="' . $WikimediaLanguage . '" selected="selected">' . $WikimediaLanguage . ' ' . $WikimediaLanguageName . '</option>' . "\n";
					else
						echo '<option value="' . $WikimediaLanguage . '">' . $WikimediaLanguage . ' ' . $WikimediaLanguageName . '</option>' . "\n";
				}
				echo'</select>' . "\n" . '<select name="lang' . $i . '-level">' . "\n" . ' <option value="">' . $lang_register_form['select_level'] . '</option>' . "\n";
				if ( $register_data['lang' . $i . '-level'] == '1' )
					echo '<option value="1" selected="selected">' . $lang_register_form['lang_level1'] . '</option>' . "\n";
				else
					echo '<option value="1">' . $lang_register_form['lang_level1'] . '</option>' . "\n";
				if ( $register_data['lang' . $i . '-level'] == '2' )
					echo '<option value="2" selected="selected">' . $lang_register_form['lang_level2'] . '</option>' . "\n";
				else
					echo '<option value="2">' . $lang_register_form['lang_level2'] . '</option>' . "\n";
				if ( $register_data['lang' . $i . '-level'] == '3' )
					echo '<option value="3" selected="selected">' . $lang_register_form['lang_level3'] . '</option>' . "\n";
				else
					echo '<option value="3">' . $lang_register_form['lang_level3'] . '</option>' . "\n";
				if ( $register_data['lang' . $i . '-level'] == '4' )
					echo '<option value="4" selected="selected">' . $lang_register_form['lang_level4'] . '</option>' . "\n";
				else
					echo '<option value="4">' . $lang_register_form['lang_level4'] . '</option>' . "\n";
				echo'</select>' . "\n";
				echo'</p>' . "\n";
			} ?>
			</td>
	</tr>
	<tr>
		<th colspan="2"><?php get_lang( 'title3' ); ?></th>
	</tr>
	<tr>
		<td><?php create_label( 'wiki_id', true )?></td>
		<td>
			<input name="wiki_id" type="text" size="15" id="wiki_id" value="<?= $register_data['wiki_id']; ?>" />
			@
			<select name="wiki_language">
				<option value=""><?php get_lang( 'select' ); ?></option>
				<?php foreach ( $WikimediaLanguages as $WikimediaLanguage => $dummy )
				if ( $WikimediaLanguage == $register_data['wiki_language'] )
					echo '<option value="' . $WikimediaLanguage . '" selected="selected">' . $WikimediaLanguage . '</option>' . "\n";
				else
					echo '<option value="' . $WikimediaLanguage . '">' . $WikimediaLanguage . '</option>' . "\n";
				?>
				<option value="">----</option>
				<?php foreach ( $WikimediaOrgs as $WikimediaOrg )
				if ( $WikimediaOrg == $register_data['wiki_language'] )
					echo '<option value="' . $WikimediaOrg . '" selected="selected">' . $WikimediaOrg . '</option>' . "\n";
				else
					echo '<option value="' . $WikimediaOrg . '">' . $WikimediaOrg . '</option>' . "\n";
				?>
			</select>
			.
			<select name="wiki_project">
				<option value=""><?php get_lang( 'select' ); ?></option>
				<?php foreach ( $WikimediaProjects as $WikimediaProject )
				if ( $WikimediaProject == $register_data['wiki_project'] )
					echo '<option value="' . $WikimediaProject . '" selected="selected">' . $WikimediaProject . '</option>' . "\n";
				else
					echo '<option value="' . $WikimediaProject . '">' . $WikimediaProject . '</option>' . "\n";
				?>
			</select>
			.org
		</td>
	</tr>
	<tr>
		<td><?php create_label( 'email', true )?></td>
		<td><input name="email" type="text" size="40" id="email" value="<?= $register_data['email']; ?>" /></td>
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
		<td>
			<?php create_label( 'join_date' ); ?>
		</td>
		<td>
			<?php get_lang( 'hackingdays' ); ?>:<br>
			<input type="checkbox" value="1" name="join_date[]" id="join1" <?php if ( in_array( 1, $register_data['join_date'] ) ) echo 'checked="checked"'; ?>/>
			<a href="https://wikimania2011.wikimedia.org/wiki/Schedule#Developer_meetings" onClick="return popup(this, 'join1')"><?php get_lang( 'join1' ); ?></a><br>
			<input type="checkbox" value="2" name="join_date[]" id="join2" <?php if ( in_array( 2, $register_data['join_date'] ) ) echo 'checked="checked"'; ?>/>
			<a href="https://wikimania2011.wikimedia.org/wiki/Schedule#Developer_meetings" onClick="return popup(this, 'join2')"><?php get_lang( 'join2' ); ?></a><br>
			<strong><?php get_lang( 'maindays' ); ?>:<br>
			<input type="checkbox" value="3" name="join_date[]" id="join3" <?php if ( in_array( 3, $register_data['join_date'] ) ) echo 'checked="checked"'; ?>/>
			<a href="https://wikimania2011.wikimedia.org/wiki/Schedule#Thursday.2C_August_4th" onClick="return popup(this, 'join3')"><?php get_lang( 'join3' ); ?></a><br>
			<input type="checkbox" value="4" name="join_date[]" id="join4" <?php if ( in_array( 4, $register_data['join_date'] ) ) echo 'checked="checked"'; ?>/>
			<a href="https://wikimania2011.wikimedia.org/wiki/Schedule#Friday.2C_August_5th" onClick="return popup(this, 'join4')"><?php get_lang( 'join4' ); ?></a><br>
			<input type="checkbox" value="5" name="join_date[]" id="join5" <?php if ( in_array( 5, $register_data['join_date'] ) ) echo 'checked="checked"'; ?>/>
			<a href="https://wikimania2011.wikimedia.org/wiki/Schedule#Saturday.2C_August_6th" onClick="return popup(this, 'join5')"><?php get_lang( 'join5' ); ?></a><br>
			</strong><?php get_lang( 'tourdays' ); ?>:<br>
			<input type="checkbox" value="6" name="join_date[]" id="join6" <?php if ( in_array( 6, $register_data['join_date'] ) ) echo 'checked="checked"'; ?> onclick='flip(["tour0","tour1","tour2","tour3","tour4","tour5"])'/>
			<a href="https://wikimania2011.wikimedia.org/wiki/Schedule#Sunday.2C_August_7th" onClick="return popup(this, 'join6')"><?php get_lang( 'join6' ); ?></a><br>
		</td>
	</tr>
	<tr>
		<td>
			<?php create_label( 'picktour' ); ?>
		</td>
		<td>
			<input type="radio" value="0" name="tours" id="tour0" <?php if ( $register_data['tours'] == 0 || empty( $register_data['tour'] ) ) echo 'checked="checked"'; ?> <?php if ( !in_array( 6, $register_data['join_date'] ) ) echo 'disabled=True'; ?>/>
			<?php get_lang( 'tour0' ); ?><br>
			<input type="radio" value="1" name="tours" id="tour1" <?php if ( $register_data['tours'] == 1 ) echo 'checked="checked"'; ?><?php if ( !in_array( 6, $register_data['join_date'] ) ) echo 'disabled=True'; ?>/>
			<a href="https://wikimania2011.wikimedia.org/wiki/Tours/Nazareth_and_the_Galilee" onClick="return popup(this, 'tour1')"><?php get_lang( 'tour1' ); ?></a><br>
			<input type="radio" value="2" name="tours" id="tour2" <?php if ( $register_data['tours'] == 2 ) echo 'checked="checked"'; ?><?php if ( !in_array( 6, $register_data['join_date'] ) ) echo 'disabled=True'; ?>/>
			<a href="https://wikimania2011.wikimedia.org/wiki/Tours/Jerusalem" onClick="return popup(this, 'tour2')"><?php get_lang( 'tour2' ); ?></a><br>
			<input type="radio" value="3" name="tours" id="tour3" <?php if ( $register_data['tours'] == 3 ) echo 'checked="checked"'; ?><?php if ( !in_array( 6, $register_data['join_date'] ) ) echo 'disabled=True'; ?>/>
			<a href="https://wikimania2011.wikimedia.org/wiki/Tours/Acre_(Acco)"  onClick="return popup(this, 'tour3')"><?php get_lang( 'tour3' ); ?></a><br>
			<input type="radio" value="4" name="tours" id="tour4" <?php if ( $register_data['tours'] == 4 ) echo 'checked="checked"'; ?> <?php if ( !in_array( 6, $register_data['join_date'] ) ) echo 'disabled=True'; ?>/>
			<a href="https://wikimania2011.wikimedia.org/wiki/Tours/The_Baha%27i_Gardens"  onClick="return popup(this, 'tour4')"><?php get_lang( 'tour4' ); ?></a><br>
			<input type="radio" value="5" name="tours" id="tour5" <?php if ( $register_data['tours'] == 5 ) echo 'checked="checked"'; ?> <?php if ( !in_array( 6, $register_data['join_date'] ) ) echo 'disabled=True'; ?>/>
			<a href="https://wikimania2011.wikimedia.org/wiki/Tours/Druze_villages"  onClick="return popup(this, 'tour5')"><?php get_lang( 'tour5' ); ?></a><br>
		</td>
	<tr>
		<td><?php create_label( 'showname', true ) ?></td>
		<td>
			<input type="checkbox" name="showname[]" value="1" id="showname1" <?php if ( in_array( 1, $register_data['showname'] ) || empty( $register_data['showname'] ) ) echo 'checked="checked"'; ?> /><?php create_label( 'showname1' ); ?>
			<input type="checkbox" name="showname[]" value="2" id="showname2" <?php if ( in_array( 2, $register_data['showname'] ) ) echo 'checked="checked"'; ?> /><?php create_label( 'showname2' ); ?>
			<input type="checkbox" name="showname[]" value="3" id="showname3" <?php if ( in_array( 3, $register_data['showname'] ) ) echo 'checked="checked"'; ?> onclick='flip(["custom_showname"])'/><?php create_label( 'showname3' ); ?>
			<input type="text" name="custom_showname" id ="custom_showname" size="32"  value="<?= $register_data['custom_showname']; ?>" <?php if ( !in_array( 3, $register_data['showname'] ) ) echo 'disabled=True'; ?>/>
		</td>
	</tr>
	<tr>
		<td><?php create_label( 'size' ); ?></td>
		<td>
			<input type="radio" name="size" value="XXS" id="e1" <?php if ( $register_data['size'] == 'XXS' ) echo 'checked="checked"'; ?> /><label for="e1">XXS</label>
			<input type="radio" name="size" value="XS" id="e2" <?php if ( $register_data['size'] == 'XS' ) echo 'checked="checked"'; ?> /><label for="e2">XS</label>
			<input type="radio" name="size" value="S" id="e3" <?php if ( $register_data['size'] == 'S' ) echo 'checked="checked"'; ?> /><label for="e3">S</label>
			<input type="radio" name="size" value="M" id="e4" <?php if ( $register_data['size'] == 'M' ) echo 'checked="checked"'; ?> /><label for="e4">M</label>
			<input type="radio" name="size" value="L" id="e5" <?php if ( $register_data['size'] == 'L' ) echo 'checked="checked"'; ?> /><label for="e5">L</label>
			<input type="radio" name="size" value="XL" id="e6" <?php if ( $register_data['size'] == 'XL' ) echo 'checked="checked"'; ?> /><label for="e6">XL</label>
			<input type="radio" name="size" value="XXL" id="e7" <?php if ( $register_data['size'] == 'XXL' ) echo 'checked="checked"'; ?> /><label for="e7">XXL</label>
			<input type="radio" name="size" value="XXXL" id="e8" <?php if ( $register_data['size'] == 'XXXL' ) echo 'checked="checked"'; ?> /><label for="e8">XXXL</label>
		</td>
	<tr>
		<td><?php create_label( 'food' ); ?></td>
		<td>
			<input type="radio" value="0" name="food" id="food0" <?php if ( $register_data['food'] == 0 ) echo 'checked="checked"'; ?> onclick='disable(["food_other"])'/> <?php create_label( 'food0' ); ?><br>
			<input type="radio" value="1" name="food" id="food1" <?php if ( $register_data['food'] == 1 ) echo 'checked="checked"'; ?> onclick='disable(["food_other"])'/> <?php create_label( 'food1' ); ?><br>
			<input type="radio" value="2" name="food" id="food2" <?php if ( $register_data['food'] == 2 ) echo 'checked="checked"'; ?> onclick='disable(["food_other"])' /> <?php create_label( 'food2' ); ?><br>
			<input type="radio" value="3" name="food" id="food3" <?php if ( $register_data['food'] == 3 ) echo 'checked="checked"'; ?> onclick='enable(["food_other"])' /> <?php create_label( 'food_other' ); ?>
			<input type="text" name="food_other" id="food_other" value="<?= $register_data['food_other']; ?>" <?php if ( !$register_data['food'] == 3 ) echo 'disabled=True'; ?> />
		</td>
	</tr>
	<tr>
		<th colspan="2"><?php get_lang( 'title_visa' ); ?></th>
	</tr>
	<tr>
		<td><?php create_label( 'visa_assistance' ); ?></td>
		<td>
			<input type="checkbox" name="visa_assistance" value="1" id="need_visa_assistance" <?php if ( $register_data['visa_assistance'] == 1 ) echo 'checked="checked"'; ?>  onclick='flip(["nationality","passport","passport_day","passport_month", "passport_year","passport_issued","day","month","year","countryofbirth","homeaddress","visa_assistance_description"])' />
			<?php create_label( 'need_visa_assistance' ); ?>
		</td>
	</tr>
	<tr>
		<td><?php create_label( 'nationality' )?></td>
		<td>
			<select name="nationality" id="nationality" <?php if ( !$register_data['visa_assistance'] ) echo 'disabled=True'; ?>>
			<option value=""><?php get_lang( 'select' ); ?></option>
			<?php foreach ( $lang_countries as $lang_country => $lang_country_name )
			{
				if ( $register_data['nationality'] == $lang_country )
					echo '<option value="' . $lang_country . '" selected="selected">' . $lang_country_name . ' (' . $lang_country . ')</option>' . "\n";
				else
					echo '<option value="' . $lang_country . '">' . $lang_country_name . ' (' . $lang_country .  ')</option>' . "\n";
			} ?>
			</select>
		</td>
	<tr>
		<td><?php create_label( 'passport' )?></td>
		<td>
			<input type="text" name="passport" id="passport" size="24" value="<?= $register_data['passport']; ?>" <?php if ( !$register_data['visa_assistance'] ) echo 'disabled=True'; ?>  />
		</td>
	</tr>
	<tr>
		<td>
			<label for="year"><?php create_label( 'passport_valid' )?></label>
		</td>
		<td>
			<input name="passport_day" id="passport_day" type="text" size="2" maxlength="2" value="<?= $register_data['passport_day']; ?>"  <?php if ( !$register_data['visa_assistance'] ) echo 'disabled=True'; ?> /><?php get_lang( 'day' ); ?>
			<select name="passport_month" id="passport_month" <?php if ( !$register_data['visa_assistance'] ) echo 'disabled=True'; ?>>
				<option value=""><?php get_lang( 'select' ); ?></option>
				<?php for ( $i = 1; $i <= 12; $i++ )
				{
					if ( $register_data['passport_month'] == $i )
					echo '<option value="' . $i . '" selected="selected">' . $lang_register_form['months'][$i] . '</option>' . "\n";
					else
					echo '<option value="' . $i . '">' . $lang_register_form['months'][$i] . '</option>' . "\n";
				} ?>
			</select>
			<?php get_lang( 'year1' ); ?> <input name="passport_year" id="passport_year" type="text" size="4" maxlength="4" id="year" value="<?= $register_data['passport_year']; ?>" <?php if ( !$register_data['visa_assistance'] ) echo 'disabled=True'; ?>  /><?php get_lang( 'year' ); ?>
		</td>
	</tr>
	<tr>
		<td><?php create_label( 'passport_issued' )?></td>
		<td>
			<input type="text" name="passport_issued" id="passport_issued" size="24" value="<?= $register_data['passport_issued']; ?>" <?php if ( !$register_data['visa_assistance'] ) echo 'disabled=True'; ?>  />
		</td>
	</tr>
	<tr>
		<td>
			<label for="year"><?php create_label( 'birthday' )?></label>
		</td>
		<td>
			<input name="day" id="day" type="text" size="2" maxlength="2" value="<?= $register_data['day']; ?>"  <?php if ( !$register_data['visa_assistance'] ) echo 'disabled=True'; ?> /><?php get_lang( 'day' ); ?>
			<select name="month" id="month" <?php if ( !$register_data['visa_assistance'] ) echo 'disabled=True'; ?>>
				<option value=""><?php get_lang( 'select' ); ?></option>
				<?php for ( $i = 1; $i <= 12; $i++ )
				{
					if ( $register_data['month'] == $i )
					echo '<option value="' . $i . '" selected="selected">' . $lang_register_form['months'][$i] . '</option>' . "\n";
					else
					echo '<option value="' . $i . '">' . $lang_register_form['months'][$i] . '</option>' . "\n";
				} ?>
			</select>
			<?php get_lang( 'year1' ); ?> <input name="year" id="year" type="text" size="4" maxlength="4" id="year" value="<?= $register_data['year']; ?>" <?php if ( !$register_data['visa_assistance'] ) echo 'disabled=True'; ?>  /><?php get_lang( 'year' ); ?>
		</td>
	</tr>
	<tr>
		<td><?php create_label( 'countryofbirth', True )?></td>
		<td>
			<select name="countryofbirth" id="countryofbirth" <?php if ( !$register_data['visa_assistance'] ) echo 'disabled=True'; ?>>
			<option value=""><?php get_lang( 'select' ); ?></option>
			<?php foreach ( $lang_countries as $lang_country => $lang_country_name )
			{
				if ( $register_data['countryofbirth'] == $lang_country )
					echo '<option value="' . $lang_country . '" selected="selected">' . $lang_country_name . ' (' . $lang_country . ')</option>' . "\n";
				else
					echo '<option value="' . $lang_country . '">' . $lang_country_name . ' (' . $lang_country .  ')</option>' . "\n";
			} ?>
			</select>
		</td>
	</tr>
	<tr>
		<td><?php create_label( 'homeaddress', True ) ?></td>
		<td>
			<textarea name="homeaddress" id="homeaddress" <?php if ( !$register_data['visa_assistance'] ) echo 'disabled=True'; ?>><?= $register_data['homeaddress'] ?></textarea>
		</td>
	</tr>
	<tr>
		<td><?php create_label( 'visa_assistance_description', True ) ?></td>
		<td>
			<textarea name="visa_assistance_description" id="visa_assistance_description" <?php if ( !$register_data['visa_assistance'] ) echo 'disabled=True'; ?>><?= $register_data['visa_assistance_description'] ?></textarea>
		</td>
	</tr>
	<tr>
		<th colspan="2"><?php get_lang( 'title5' ); ?></th>
	</tr>
	<tr>
		<td><?php create_label( 'accommodation' ); ?></td>
		<td>
		<?php
		for ( $i = 1; $i <= 8; $i++ )
		{
			if ( in_array( $i, $register_data['nights'] ) )
				echo '<input type="checkbox" value="' . $i . '" name="nights[]" id="night' . $i . '" checked="checked"/>';
			else
				echo '<input type="checkbox" value="' . $i . '" name="nights[]" id="night' . $i . '" />';
			create_label( 'night' . $i );
			echo "<br>";
		} ?>
		</td>
	</tr>
	<tr>
		<td><?php get_lang( 'room' ); ?></td>
		<td>
		<input type="radio" value="1" name="room" id="room1" <?php if ( $register_data['room'] == 1 ) echo 'checked="checked"'; ?> onclick='disable(["room_partner"])'/> <?php create_label( 'room1' ); ?><br>
		<input type="radio" value="2" name="room" id="room2" <?php if ( $register_data['room'] == 2 ) echo 'checked="checked"'; ?> onclick='disable(["room_partner"])' /> <?php create_label( 'room2' ); ?><br>
		<input type="radio" value="3" name="room" id="room3" <?php if ( $register_data['room'] == 3 ) echo 'checked="checked"'; ?> onclick='enable(["room_partner"])' /> <?php create_label( 'room3' ); ?>
		<input name="room_partner" id="room_partner" type="text" value="<?= $register_data['room_partner']; ?>" <?php if ( !$register_data['room'] == 3 ) echo 'disabled=True'; ?> />
		</td>
	</tr>
	<tr>
		<td><?php create_label( 'room_requests', True ) ?></td>
		<td>
			<textarea name="room_requests" id="room_requests"><?= $register_data['room_requests'] ?></textarea>
		</td>
	</tr>
	<tr>
		<td><?php create_label( 'accommodation_hotel' ); ?></td>
		<td>
			<input type="radio" value="1" name="hotels" id="hotel1" <?php if ( $register_data['hotels'] == 1 ) echo 'checked="checked"'; ?> disabled=True/>
			<a href="https://wikimania2011.wikimedia.org/wiki/Accommodation/Dorms" onClick="return popup(this, 'hotel1')"><?php create_label( 'hotel1' ); ?></a><br>
			<?php get_lang( 'hotel3stars' ); ?>:<br>
			<input type="radio" value="2" name="hotels" id="hotel2" <?php if ( $register_data['hotels'] == 2 ) echo 'checked="checked"'; ?> disabled=True/>
			<a href="https://wikimania2011.wikimedia.org/wiki/Accommodation/Three_Stars_Hotels#Dan_Gardens_.28.2A.2A.2A.29"  onClick="return popup(this, 'hotel2')"><?php create_label( 'hotel2' ); ?></a><br>
			<?php get_lang( 'hotel4stars' ); ?>:<br>
			<input type="radio" value="4" name="hotels" id="hotel4" <?php if ( $register_data['hotels'] == 4 ) echo 'checked="checked"'; ?> disabled=True/>
			<a href="https://wikimania2011.wikimedia.org/wiki/Accommodation/Four_Stars_Hotels#Mount_Carmel_.28.2A.2A.2A.2A.29"  onClick="return popup(this, 'hotel4')"><?php create_label( 'hotel4' ); ?></a><br>
			<input type="radio" value="5" name="hotels" id="hotel5" <?php if ( $register_data['hotels'] == 5 ) echo 'checked="checked"'; ?> disabled=True/>
			<a href="https://wikimania2011.wikimedia.org/wiki/Accommodation/Four_Stars_Hotels#Nof_.28.2A.2A.2A.2A.29"  onClick="return popup(this, 'hotel5')"><?php create_label( 'hotel5' ); ?></a><br>
			<?php get_lang( 'hotel5stars' ); ?>:<br>
			<input type="radio" value="6" name="hotels" id="hotel6" <?php if ( $register_data['hotels'] == 6 ) echo 'checked="checked"'; ?>/>
			<a href="https://wikimania2011.wikimedia.org/wiki/Accommodation/Five_Stars_Hotels#Dan_Panorama_.28.2A.2A.2A.2A.2A.29"  onClick="return popup(this, 'hotel6')"><?php create_label( 'hotel6' ); ?></a><br>
			<?php
			?>
		</td>
	</tr>
	<tr>
		<th colspan="2"><?php get_lang( 'title6' ); ?></th>
	</tr>
	<tr>
		<td><?php create_label( 'discount_code' )?></td>
		<td>
			<input type="text" name="discount_code" id="discount_code" size="24" value="<?= $register_data['discount_code']; ?>">
		</td>
	</tr>
	<tr>
		<th colspan="2"><?php get_lang( 'title7' ); ?></th>
	</tr>
	<tr>
		<td><?php create_label( 'captcha' )?></td>
		<td>
			<?php
			  require_once( 'recaptchalib.php' );
			  echo recaptcha_get_html( $recaptcha_publickey );
			?>
		</td>
	</tr>
</table>
</fieldset>


<ul id="submit_notice">
<?php get_lang( 'submit_notice' ); ?>
<?php get_lang( 'asterix_meaning' ); ?>
</ul>

<div id="button">
	<input type="submit" name="submit" value="<?php get_lang( 'submit' ); ?>" />
	<input type="reset"  name="reset" value="<?php get_lang( 'reset' ); ?>" />
	<input type="hidden" name="uselang" value="<?= $userLanguage?>" />
	<input type="hidden" name="action" value="confirm" />
	<?php if ( !$_COOKIE['wikimania'] )
		echo '<input type="hidden" name="secret_id" value="' . $my_session->handle . '" />';
	?>
</div>
</form>
<?php
if ( $userLanguage == 'ar' || $userLanguage == 'fa' || $userLanguage == 'he' )
{
echo '</div>';
} ?>
