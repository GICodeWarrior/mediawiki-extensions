<?php
class TranslateYaml {

	public static function loadString( $text ) {
		global $wgTranslateYamlLibrary;
		switch ($wgTranslateYamlLibrary) {
		case 'spyc':
			require_once( dirname(__FILE__).'/../spyc/spyc.php' );
			return spyc_load( $text );
		case 'syck':
			return self::syckLoad( $text );
		default:
			throw new MWException( "Unknown Yaml library" );
		}
	}

	public static function load( $file ) {
		$text = file_get_contents( $file );
		return self::loadString( $text );
	}

	public static function dump( $text ) {
		global $wgTranslateYamlLibrary;
		switch ($wgTranslateYamlLibrary) {
		case 'spyc':
			require_once( dirname(__FILE__).'/../spyc/spyc.php' );
			return Spyc::YAMLDump( $text );
		case 'syck':
			return self::syckDump( $text );
		default:
			throw new MWException( "Unknown Yaml library" );
		}
	}

	protected static function syckLoad( $data ) {
		# Make temporary file
		$td = wfTempDir();
		$tf = tempnam( $td, 'yaml-load-' );

		# Write to file
		file_put_contents( $tf, $data );

		$cmd = "perl -MYAML::Syck=LoadFile -MPHP::Serialization=serialize -le '" .
		       "my \$yaml = LoadFile(\"$tf\");" .
		       "open my \$fh, q[>], q[$tf.serialized] or die qq[Can not open $tf.serialized];" .
		       "print \$fh serialize(\$yaml);" .
		       "close(\$fh);'";
		$ret = shell_exec($cmd);
		if (!isset($ret)) {
			die("The command '$cmd' died in execution");
		}

		$serialized = file_get_contents("$tf.serialized");
		$php_data = unserialize($serialized);

		unlink($tf);
		unlink("$tf.serialized");
		
		return $php_data;
	}

	protected function syckDump( $data ) {
		# Make temporary file
		$td = wfTempDir();
		$tf = tempnam( $td, 'yaml-load-' );

		# Write to file
		$sdata = serialize( $data );
		file_put_contents( $tf, $sdata );

		$cmd = "perl -MYAML::Syck=DumpFile -MPHP::Serialization=unserialize -MFile::Slurp=slurp -le '" .
		       "my \$serialized = slurp(\"$tf\");" .
			   "DumpFile(q[$tf.yaml], \$serialized);'";
		$ret = shell_exec($cmd);
		if (!isset($ret)) {
			die("The command '$cmd' died in execution");
		}

		$yaml = file_get_contents("$tf.yaml");

		unlink($tf);
		unlink("$tf.yaml");
		
		return $yaml;
	}
}

// BC
class TranslateSpyc extends TranslateYaml {}