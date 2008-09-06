<?php

class MantisMessageGroup extends MessageGroup {
	protected $label = 'Mantis (web-based bugtracking system)';
	protected $id    = 'out-mantis';
	protected $type  = 'mantis';

	protected   $fileDir  = '__BUG__';

	public function getPath() { return $this->fileDir; }
	public function setPath( $value ) { $this->fileDir = $value; }

	protected $codeMap = array(
		'bg' => 'bulgarian',
		'ca' => 'catalan',
		'cs' => 'czech',
		'da' => 'danish',
		'de' => 'german',
		'el' => 'greek',
		'en' => 'english',
		'es' => 'spanish',
		'et' => 'estonian',
		'fi' => 'finnish',
		'fr' => 'french',
		'he' => 'hebrew',
		'hr' => 'croatian',
		'hu' => 'hungarian',
		'is' => 'icelandic',
		'it' => 'italian',
		'ja' => 'japanese',
		'ko' => 'korean',
		'lt' => 'lithuanian',
		'lv' => 'latvian',
		'nl' => 'dutch',
		'no' => 'norwegian',
		'pl' => 'polish',
		'pt' => 'portuguese_standard',
		'pt-br' => 'portuguese_brazil',
		'ro' => 'romanian',
		'ru' => 'russian',
		'sk' => 'slovak',
		'sl' => 'slovene',
		'sr-ec' => 'serbian',
		'sv' => 'swedish',
		'tr' => 'turkish',
		'uk' => 'ukrainian',
		'ur' => 'urdu',
		'zh-hans' => 'chinese_simplified',
		'zh-hant' => 'chinese_traditional',
	);

	protected $optional = array(
		's_sponsorship_process_url',
	);

	public function getMessageFile( $code ) {
		if ( isset($this->codeMap[$code]) ) {
			$code = $this->codeMap[$code];
		}
		return "strings_$code.txt";
	}

	protected function getFileLocation( $code ) {
		return $this->fileDir . '/' . $this->getMessageFile( $code );
	}

	public function getReader( $code ) {
		return new PhpVariablesFormatReader( $this->getFileLocation( $code ) );
	}

	public function getWriter() {
		return new PhpVariablesFormatWriter( $this );
	}
}
