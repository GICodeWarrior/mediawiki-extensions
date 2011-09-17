<?php

$attendance_costs = array(
'wikimedia_contributor' => array(
	'very_early_bird' => array( 'day' => 20, 'all' => 45 ),
	'early_bird' => array( 'day' => 25, 'all' => 55 ),
	'regular' => array( 'day' => 35, 'all' => 75 )
),
'regular_attendee' => array(
	'very_early_bird' => array( 'day' => 30, 'all' => 70 ),
	'early_bird' => array( 'day' => 40, 'all' => 90 ),
	'regular' => array( 'day' => 50, 'all' => 120 )
)
);

$accommodation_costs = array(

'hotel1' => array(// Dorm room
	'very_early_bird' => array( '1' => 20, '2' => 20 ),
	'early_bird' => array( '1' => 25, '2' => 25 ),
	'regular' => array( '1' => 30, '2' => 30 )
),
'hotel2' => array(// Ganei Dan
	'very_early_bird' => array( '1' => 84, '2' => 50 ),
	'early_bird' => array( '1' => 89, '2' => 58 ),
	'regular' => array( '1' => 97, '2' => 69 ),
),
'hotel3' => array(// Marom
	'very_early_bird' => array( '1' => 84, '2' => 50 ),
	'early_bird' => array( '1' => 89, '2' => 58 ),
	'regular' => array( '1' => 97, '2' => 69 ),
),
'hotel4' => array(// Har HaCarmel
	'very_early_bird' => array( '1' => 91, '2' => 50 ),
	'early_bird' => array( '1' => 96, '2' => 58 ),
	'regular' => array( '1' => 101, '2' => 69 ),
),
'hotel5' => array(// Nof
	'very_early_bird' => array( '1' => 100, '2' => 56 ),
	'early_bird' => array( '1' => 106, '2' => 63 ),
	'regular' => array( '1' => 116, '2' => 68 ),
),
'hotel6' => array(// Dan Panorama
	'very_early_bird' => array( '1' => 115, '2' => 70 ),
	'early_bird' => array( '1' => 125, '2' => 81 ),
	'regular' => array( '1' => 136, '2' => 91 ),
),
'hotel7' => array(// Crown Plaza
	'very_early_bird' => array( '1' => 162, '2' => 97 ),
	'early_bird' => array( '1' => 172, '2' => 108 ),
	'regular' => array( '1' => 182, '2' => 118 ),
),
'hotel8' => array(// Colony
	'very_early_bird' => array( '1' => 136, '2' => 84 ),
	'early_bird' => array( '1' => 146, '2' => 94 ),
	'regular' => array( '1' => 156, '2' => 104 ),
),
'hotel9' => array(// Gallery
	'very_early_bird' => array( '1' => 91, '2' => 58 ),
	'early_bird' => array( '1' => 96, '2' => 63 ),
	'regular' => array( '1' => 101, '2' => 68 ),
)
);

$usd_to_nis = 3.6;
$vat_rate = 0.16;

$early_registration_start = gmmktime( 0, 0, 0, /*april*/ 4, /*1st*/ 1, 2011 );
$regular_registration_start = gmmktime( 0, 0, 0, /*june*/ 6, /*1st*/ 1, 2011 );

$local_country = 'us'; /* Israel */
$local_currency = 'USD'; /* New Israeli Shekel */

function calculate_cost( $register_data )
{
	global $attendance_costs, $accommodation_costs, $usd_to_nis, $vat_rate, $early_registration_start,
	 $regular_registration_start, $local_country, $local_currency;
	$attendee_type = 'regular_attendee';
	$period = 'very_early_bird';
	$currency = 'USD';
	$attendance_cost = 0;
	$accommodation_cost = 0;
	$vat_cost = 0;
	$n_main_days = 0;
	$people_in_room = 0;
	$hotel = '';

	if ( in_array( '3', $register_data['join_date'] ) )
		$n_main_days++;
	if ( in_array( '4', $register_data['join_date'] ) )
		$n_main_days++;
	if ( in_array( '5', $register_data['join_date'] ) )
		$n_main_days++;

	if ( time() > $early_registration_start )
		$period = 'early_bird';
	if ( time() > $regular_registration_start )
		$period = 'regular';

	if ( $register_data['wiki_id'] && $register_data['wiki_language'] && $register_data['wiki_project'] )
	{
		$attendee_type = 'wikimedia_contributor';
	}

	if ( $n_main_days == 3 )
	{
		$attendance_cost = $attendance_costs[$attendee_type][$period]['all'];
	}
	else
	{
		$attendance_cost = $attendance_costs[$attendee_type][$period]['day'] * $n_main_days;
	}

	$hotel = 'hotel' . $register_data['hotels'];
	if ( $register_data['room'] == 1 )
		$people_in_room = '1';
	else if ( $register_data['room'] == 2 || $register_data['room'] == 3 )
		$people_in_room = '2';
	$n_nights = count( $register_data['nights'] );

	$accommodation_cost = $accommodation_costs[$hotel][$period][$people_in_room] * $n_nights;

	if ( $register_data['country'] == $local_country )
	{
		$attendance_cost *= $usd_to_nis;
		$accommodation_cost *= $usd_to_nis;
		$vat_cost = $accommodation_cost * $vat_rate;
		$currency = $local_currency;
	}


	if ( substr( $register_data['discount_code'], 0, 7 ) == 'WMFFULL'
	&&	substr( md5( 'HAIFA2011' . substr( $register_data['discount_code'], 8, 2 ) ), 0, 4 ) == substr( $register_data['discount_code'], 10, 4 ) )
	{
		$attendance_cost = 0;
		$accommodation_cost = 0;
		$vat_cost = 0;
	}
	else if ( substr( $register_data['discount_code'], 0, 7 ) == 'WMITALY'
	&&	substr( md5( 'HAIFA2011ITALY' . substr( $register_data['discount_code'], 8, 2 ) ), 0, 4 ) == substr( $register_data['discount_code'], 10, 4 ) )
	{
		$attendance_cost = 0;
		$accommodation_cost = 0;
		$vat_cost = 0;
	}
	else if ( substr( $register_data['discount_code'], 0, 7 ) == 'WMGRMNY'
	&&	substr( md5( 'HAIFA2011GERMANY' . substr( $register_data['discount_code'], 8, 2 ) ), 0, 4 ) == substr( $register_data['discount_code'], 10, 4 ) )
	{
		$attendance_cost = 0;
		$accommodation_cost = 0;
		$vat_cost = 0;
	}
	else if ( substr( $register_data['discount_code'], 0, 7 ) == 'WMOESTR'
	&&	substr( md5( 'HAIFA2011AUSTRIA' . substr( $register_data['discount_code'], 8, 2 ) ), 0, 4 ) == substr( $register_data['discount_code'], 10, 4 ) )
	{
		$attendance_cost = 0;
		$accommodation_cost = 0;
		$vat_cost = 0;
	}
	else if ( substr( $register_data['discount_code'], 0, 7 ) == 'WMSWISS'
	&&	substr( md5( 'HAIFA2011SWITZERLAND' . substr( $register_data['discount_code'], 8, 2 ) ), 0, 4 ) == substr( $register_data['discount_code'], 10, 4 ) )
	{
		$attendance_cost = 0;
		$accommodation_cost = 0;
		$vat_cost = 0;
	}
	else if ( substr( $register_data['discount_code'], 0, 7 ) == 'WMRUSFD'
	&&	substr( md5( 'HAIFA2011RUSSIA' . substr( $register_data['discount_code'], 8, 2 ) ), 0, 4 ) == substr( $register_data['discount_code'], 10, 4 ) )
	{
		$attendance_cost = 0;
		$accommodation_cost = 0;
		$vat_cost = 0;
	}
	else if ( substr( $register_data['discount_code'], 0, 7 ) == 'WMFRNCE'
	&&	substr( md5( 'HAIFA2011FRANCE' . substr( $register_data['discount_code'], 8, 2 ) ), 0, 4 ) == substr( $register_data['discount_code'], 10, 4 ) )
	{
		$attendance_cost = 0;
		$accommodation_cost = 0;
		$vat_cost = 0;
	}
	else if ( substr( $register_data['discount_code'], 0, 7 ) == 'WMSTAFF'
	&&	substr( md5( 'HAIFA2011FOUNDATION' . substr( $register_data['discount_code'], 8, 2 ) ), 0, 4 ) == substr( $register_data['discount_code'], 10, 4 ) )
	{
		$attendance_cost = 0;
		$accommodation_cost = 0;
		$vat_cost = 0;
	}
	else if ( substr( $register_data['discount_code'], 0, 5 ) == 'PRESS'
	&&	substr( md5( 'HAIFA2011PRESS' . substr( $register_data['discount_code'], 6, 2 ) ), 0, 4 ) == substr( $register_data['discount_code'], 8, 4 ) )
	{
		$attendance_cost = 0;
		$accommodation_cost = 0;
		$vat_cost = 0;
	}
	else if ( substr( $register_data['discount_code'], 0, 4 ) == 'WMIL'
	&&	substr( md5( 'HAIFA2011ISRAEL' . substr( $register_data['discount_code'], 5, 2 ) ), 0, 4 ) == substr( $register_data['discount_code'], 7, 4 ) )
	{
		$attendance_cost = 0;
		$accommodation_cost = 0;
		$vat_cost = 0;
	}

	$attendance_cost = round( $attendance_cost, 2 );
	$accommodation_cost = round( $accommodation_cost, 2 );
	$vat_cost = round( $vat_cost, 2 );

	$cost_total = $attendance_cost + $accommodation_cost + $vat_cost;
	$cost_total = round( $cost_total, 2 );

	return array( 'attendance_cost' => $attendance_cost, 'accommodation_cost' => $accommodation_cost, 'vat_cost' => $vat_cost,
				'cost_total' => $cost_total, 'currency' => $currency );

}

?>