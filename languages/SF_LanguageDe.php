<?php
/**
 * @author Dominik Rodler
 */

class SF_LanguageDe extends SF_Language {

	/* private */ var $m_SpecialProperties = array(
		//always start upper-case
		SF_SP_HAS_DEFAULT_FORM    => 'Hat Standardformular',
		SF_SP_HAS_ALTERNATE_FORM  => 'Hat Alternativformular'
	);
	
	var $m_Namespaces = array(
		SF_NS_FORM           => 'Formular',
		SF_NS_FORM_TALK      => 'Formular Diskussion'
	);

}

