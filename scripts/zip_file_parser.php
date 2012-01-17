<?php
die( "Dying for safety, because nobody should actually use this.\nIf you disagree, you'll need to uncomment line 2.\n" );
//just don't commit it uncommented. >:[

$IP = getenv( 'MW_INSTALL_PATH' );
if ( $IP === false ) {
	$IP = dirname( _FILE_ ) . '/../../..';
}

//If you get errors on this next line, set (and export) your MW_INSTALL_PATH var. 
require_once( "$IP/maintenance/Maintenance.php" );

class ZipFileParser extends Maintenance {
	
	protected $rep_lookup_cache = array();
	
	function execute(){
		$skip_up_to = 0;
		if ( !empty( $_SERVER['argv'][1] ) && is_numeric( $_SERVER['argv'][1] ) ){
			$skip_up_to = $_SERVER['argv'][1];
		}
		$function = 'fillOutNulls';
		if ( !empty( $_SERVER['argv'][1] ) && $_SERVER['argv'][1] === 'findSplits' ){
			$function = 'findSplits';
		}
		
		switch ( $function ){
			case 'fillOutNulls':
				$this->fill_out_nulls( $skip_up_to );
				break;
			case 'findSplits':
				$this->find_split_zipcodes( $skip_up_to );
				break;			
		}
		
		echo "Done\n";
	}
	
	function fill_out_nulls( $skip_up_to ){
		//get the "missing" zipcodes
		$missing_zips = $this->getMissingZipcodes();
		
		//load the file
		//I know this is a terrible way to do this, but basically, I'm going to.
			//Leaving this here because my laptop failed to explode when I ran 
			//the thing, and that's where I'm doing all the data gymnastics 
			//anyway. Results have been combined into the .sql files in the data 
			//directory, so nobody else should ever have to do this.
		$zipfile = file( 'zipcode_map.txt', FILE_SKIP_EMPTY_LINES );
		$zipmap = array();
		foreach ( $zipfile as $line=>$val ){
			$val = explode(' ', $val);
			$zipgroup = $val[0];
			$val_2 = explode('-', $val[1]);
			
			$state = $val_2[0];
			$district = $val_2[1];
			
			$zipmap[$zipgroup] = $this->get_rep_ids($state, $district);
			//echo "Zipgroup = $zipgroup, State = $state, District = $district";
		}
		
		//so, now we have an array of missing zips, and a map of zips to their representative. 
		//how to mash them together? 

		ksort( $zipmap, SORT_STRING ); //this actually makes sense. 
		ksort( $missing_zips, SORT_NUMERIC );
		
		$unset_counter = 0;
		foreach ( $zipmap as $zipgroup => $whatever ){
			$sortme = array( $zipgroup, $skip_up_to );
			sort($sortme, SORT_STRING);
			if ( $sortme[0] === $zipgroup ){
				if (strpos( (string)$skip_up_to, (string)$zipgroup ) === 0){
					continue;
				} else {
					unset( $zipmap[$zipgroup] );
					++$unset_counter;
				}
			} else {
				break;
			}
		}
		echo "Unset $unset_counter entries in the file lookup. Whee!\n";
		
		foreach ( $missing_zips as $zip => $whatever ){		
			$found_zip = array();
			if ( $zip < $skip_up_to ){
				echo "Skipping $zip\n";
				continue;
			}
			$start = microtime( true );
			$zip = $this->make_zip_string($zip);
			
			$counter = 0;
			$foundflag = false;
			$last_zipgroup = '';
			foreach ( $zipmap as $zipgroup => $rep_array ){
				if (!$foundflag){
					if ( strpos( (string)$zip, (string)$zipgroup ) === 0 ){
						echo "Found zip $zip in $zipgroup.\n";
						$found_zip[$zipgroup] = $rep_array;
						if ( $zipgroup != $last_zipgroup && $last_zipgroup != '' ){
							unset( $zipmap[$last_zipgroup] ); //speeeeed...
						}
						$foundflag = true;
					}
				}
			}
			
			//things we have to deal with: 
			//split zipcodes. 
			if (!empty($found_zip)){
				if ( count( $found_zip ) > 1 ){
					echo "Split zipcode! Not dealing with this right now. $zip \n";
				} elseif ( count( $found_zip ) == 0 ){
					echo "Nothing there at all. Weird... $zip \n";
				} else {
					//drill down: We know there's only one. 
					foreach( $found_zip as $reps ){
						if ( is_array($reps) && count( $reps ) > 0 ){
							foreach ( $reps as $rep_id ){
								echo "$zip Rep ID: $rep_id\n";
								$this->insert_rep( $zip, $rep_id );
							}
						} else {
							echo "We got no reps in a really odd way.\n";
							//TODO: Not this, like, 1000 times. 
						}
					}
				}
			} else {
				echo "Nothing found for $zip\n";
			}
			$now = microtime( true );
			$duration = $now - $start;
			echo "Time: " . $duration . "\n";
		}
		
	}	
	
	
	function find_split_zipcodes( $skip_up_to ){
		//get the "missing" zipcodes
		//$missing_zips = $this->getMissingZipcodes();
		
		//load the file
		//Still a terrible way to do this. 
		$zipfile = file( 'zipcode_map.txt', FILE_SKIP_EMPTY_LINES );
		$zipmap = array();
		foreach ( $zipfile as $line=>$val ){
			$val = explode(' ', $val);
			$zipgroup = $val[0];
			$extended = '';
			$exploded_zipgroup = explode( '-', $zipgroup );
			$original_zipgroup = $zipgroup;
			
			if ( count( $exploded_zipgroup ) > 1 ){
				$zipgroup = $exploded_zipgroup[0];
				$extended = $exploded_zipgroup[1];
			}
			
			$val_2 = explode('-', $val[1]);
			
			$state = $val_2[0];
			$district = trim($val_2[1]);
			
			$zipmap[$zipgroup][$state . '-' . $district][] = $original_zipgroup;
			//echo "Zipgroup = $zipgroup, State = $state, District = $district";
		}
		//echo print_r( $zipmap, true );
		//die();
		
		$splits = array();
		foreach ( $zipmap as $group => $districts ){
			if (count($districts) > 1){
				$splits[$group] = count($districts);
			} else {
				unset( $zipmap[$group] );
			}
		}
		
		echo print_r( $splits, true );
		echo count( $splits ) . " split zipcodes found, out of... I don't know. 40 thousand or something.\n";
		
		die("Hurr!");
	}
	
	function insert_rep( $zip, $rep_id ){
		$dbr = wfGetDB( DB_SLAVE );
		$dbr->update( 'cl_zip5',
			array( 
				'clz5_rep_id' => $rep_id,
			),
			array( 
				'clz5_zip' => $zip,
			)
		);
		echo "Updated $zip to include rep id $rep_id\n";
	}
	
	
	function make_zip_string( $zip ){
		$zip = (string)$zip;
		if ( strlen( $zip ) < 5 ){
			$zeroes = 5 - strlen( $zip );
			for ( $i = 0; $i < $zeroes; ++$i ){
				$zip = '0' . $zip;
			}
		}
		return $zip;
	}

	
	function getMissingZipcodes(){
		$dbr = wfGetDB( DB_SLAVE );
		
		//for the record, I'd much rather just do this directly...
//		$query = "select floor(z5.sz5_zip/100) as zgroup, z5.sz5_zip, z5.sz5_rep_id, z3.sz3_state from cl_zip5 z5
//			LEFT JOIN cl_zip3 z3 on (floor(z5.sz5_zip/100)) = z3.sz3_zip
//			WHERE z5.sz5_rep_id IS NULL ORDER BY z5.sz5_zip ASC";
		$state_map = array();
		$results = $dbr->select(
			'cl_zip3', 
			array(
				'clz3_zip',
				'clz3_state'
			)
		);
		if ( $results ){
			foreach ( $results as $row ){
				$state_map[ $row->clz3_zip ] = $row->clz3_state;
			}
		}
		
		$null_zips = array();
		$results = $dbr->select( 
			'cl_zip5', 
			array(
				'clz5_zip',
			), 
			array( 'clz5_rep_id' => NULL )
		);
		if ( $results ){
			foreach ( $results as $row ){
				$zip = $row->clz5_zip;
				$zipgroup = (int)floor($row->clz5_zip/100);
				if ( $zipgroup && array_key_exists( $zipgroup, $state_map) ){
					$null_zips[$zip] = array( 'state' => $state_map[ $zipgroup ] );
				} else {
					$null_zips[$zip] = array( 'state' => NULL );
				}
			}
		}
		
		echo count($null_zips) . "\n";
		return $null_zips;
	}
	
	function get_rep_ids( $state, $district ){
		$district = (int)$district;
		if ( array_key_exists( $state, $this->rep_lookup_cache) && array_key_exists( $district, $this->rep_lookup_cache[$state]) ){
			return $this->rep_lookup_cache[$state][$district];
		} else {
			$dbr = wfGetDB( DB_SLAVE );
			
			$results = $dbr->select(
				'cl_house', 
				array(
					'clh_id',
				),
				array(
					'clh_state' => $state,
					'clh_district' => $district
				)
			);
			if ( $results ){
				foreach ( $results as $row ){
					$rep_id = $row->clh_id;
					$this->rep_lookup_cache[$state][$district][] = $rep_id;
				}
			}
			if ( array_key_exists( $state, $this->rep_lookup_cache) && array_key_exists( $district, $this->rep_lookup_cache[$state])){
				if ( count($this->rep_lookup_cache[$state][$district]) > 1 ){
					echo "How on Earth did we find more than one for $state $district?\n" . print_r($this->rep_lookup_cache[$state][$district], true);
				}
				return $this->rep_lookup_cache[$state][$district];
			} else {
				echo "Didn't get anything for $state, $district.\n";
				$this->rep_lookup_cache[$state][$district] = NULL;
				return NULL;
			}
		}
	}
	
}

$maintClass = "ZipFileParser";
require_once( "$IP/maintenance/doMaintenance.php" );


