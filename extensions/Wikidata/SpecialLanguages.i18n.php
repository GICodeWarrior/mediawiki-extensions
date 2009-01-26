<?php
/**
 * Internationalisation file for Language Manager extension.
 *
 * @addtogroup Extensions
 */

$wdMessages = array();

/** English
 */
$wdMessages['en'] = array(
	'languages'                             => 'Wikidata: Language manager',
	'langman_title'                         => 'Language manager',
	'langman_not_allowed'					=> 'You do not have permission to change language settings.',
	'langman_header'						=> 'Type the language code and its English name below:',
	'langman_req_fields'					=> 'Both language name and ISO 639-3 code are required!',
	'langman_adding'						=> 'Adding language $1 with key $2.',
	'langman_langname'						=> 'Language name:',
	'langman_iso639-3'						=> 'ISO 639-3 code:',
	'langman_iso639-2'						=> 'ISO 639-2 code:',
	'langman_wikimedia'						=> 'Wikimedia code:',
	'langman_field_optional'				=> '(optional)',
	'langman_addlang'						=> 'Add language',

	'importlangnames'						=> 'Wikidata: Import language names',
	'importlangnames_title'					=> 'Import Language Names',
	'importlangnames_not_allowed'			=> 'You do not have permission to import language names.',
	'importlangnames_added'					=> 'Language names for "$1" added.',
	'importlangnames_not_found'				=> '<strong>No language entry for "$1" found!</strong>',

	'datasearch'                            => 'Wikidata: Data search',
	'addcollection'							=> 'Wikidata: Add collection',
	'ow_save'                               => 'Save',
	'ow_history'                            => 'History',
	'ow_datasets'                           => 'Data-set selection',
	'ow_noedit_title'                       => 'No permission to edit',
	'ow_noedit'                             => 'You are not permitted to edit pages in the dataset "$1".
Please see [[{{MediaWiki:Ow editing policy url}}|our editing policy]].',
	'ow_editing_policy_url'                 => 'Project:Permission policy',
	'ow_uipref_datasets'                    => 'Default view:',
	'ow_uiprefs'                            => 'Wikidata',
	'ow_none_selected'                      => 'None selected',
	'ow_conceptmapping_help'                => '<p>possible actions: <ul>
<li>&action=insert&<data_context_prefix>=<defined_id>&...  insert a mapping</li>
<li>&action=get&concept=<concept_id>  read a mapping back</li>
<li>&action=list_sets  return a list of possible data context prefixes and what they refer to.</li>
<li>&action=get_associated&dm=<defined_meaning_id>&dc=<dataset_context_prefix> for one defined meaning in a concept, return all others</li>
<li>&action=help   Show helpful help.</li>
</ul></p>',
	'ow_conceptmapping_uitext'              => '<p>Concept Mapping allows you to identify which defined meaning in one dataset is identical	to defined meanings in other datasets.</p>',
	'ow_conceptmapping_no_action_specified' => 'Action "$1" is not supported.',
	'ow_dm_OK'                              => 'OK',
	'ow_dm_not_present'                     => 'not entered',
	'ow_dm_not_found'                       => 'not found in database or malformed',
	'ow_mapping_successful'                 => 'Mapped all fields marked with [OK]<br />',
	'ow_mapping_unsuccessful'               => 'Need to have at least two defined meanings before they can be linked.',
	'ow_will_insert'                        => 'Will insert the following:',
	'ow_contents_of_mapping'                => 'Contents of mapping',
	'ow_available_contexts'                 => 'Available contexts',
	'ow_add_concept_link'                   => 'Add link to other concepts',
	'ow_concept_panel'                      => 'Concept Panel',
	'ow_dm_badtitle'                        => 'This page does not point to any DefinedMeaning (concept).
Please check the web address.',
	'ow_dm_missing'                         => 'This page seems to point to a non-existent DefinedMeaning (concept).
Please check the web address.',
	'ow_AddHint'   							=> 'Enter new rows to add',
	'ow_AlternativeDefinition'              => 'Alternative definition',
	'ow_AlternativeDefinitions'             => 'Alternative definitions',
	'ow_Annotation'                         => 'Annotation',
	'ow_ApproximateMeanings'                => 'Approximate meanings',
	'ow_Class'  			                => 'Class',
	'ow_ClassAttributeAttribute'            => 'Attribute',
	'ow_ClassAttributes'                    => 'Class attributes',
	'ow_ClassAttributeLevel'                => 'Level',
	'ow_ClassAttributeType'                 => 'Type',
	'ow_ClassMembership'                    => 'Class membership',
	'ow_Collection'                         => 'Collection',
	'ow_Collection_colon'					=> 'Collection:',
	'ow_CollectionMembership'               => 'Collection membership',
	'ow_Definition'                         => 'Definition',
	'ow_DefinedMeaningAttributes'           => 'Annotation',
	'ow_DefinedMeaning'                     => 'Defined meaning',
	'ow_DefinedMeaningReference'            => 'Defined meaning',
	'ow_ExactMeanings'                      => 'Exact meanings',
	'ow_Expression'                         => 'Expression',
	'ow_ExpressionMeanings'                 => 'Expression meanings',
	'ow_Expressions'                        => 'Expressions',
	'ow_IdenticalMeaning'                   => 'Identical meaning?',
	'ow_IncomingRelations'                  => 'Incoming relations',
	'ow_GotoSource'                         => 'Go to source',
	'ow_Language'                           => 'Language',
	'ow_LevelAnnotation'                    => 'Annotation',
	'ow_Multiple_meanings' 					=> 'Multiple meanings:',
	'ow_NewExactMeaning'					=> 'New exact meaning',
	'ow_OptionAttribute'                    => 'Property',
	'ow_OptionAttributeOption'              => 'Option',
	'ow_OptionAttributeOptions'             => 'Options',
	'ow_OptionAttributeValues'              => 'Option values',
	'ow_OtherDefinedMeaning'                => 'Other defined meaning',
	'ow_PopupAnnotation'                    => 'Annotation',
	'ow_Relations'                          => 'Relations',
	'ow_RelationType'                       => 'Relation type',
	'ow_Remove'								=> 'Remove',
	'ow_RemoveHint'							=> 'Mark rows to remove',
	'ow_Spelling'                           => 'Spelling',
	'ow_SuggestHint'						=> 'Click to change selection',
	'ow_Synonyms'                           => 'Synonyms',
	'ow_SynonymsAndTranslations'            => 'Synonyms and translations',
	'ow_Source'                             => 'Source',
	'ow_SourceIdentifier'                   => 'Source identifier',
	'ow_TextAttribute'                      => 'Property',
	'ow_Text'                               => 'Text',
	'ow_TextAttributeValues'                => 'Plain texts',
	'ow_TranslatedTextAttribute'            => 'Property',
	'ow_TranslatedText'                     => 'Translated text',
	'ow_TranslatedTextAttributeValue'       => 'Text',
	'ow_TranslatedTextAttributeValues'      => 'Translatable texts',
	'ow_LinkAttribute'                      => 'Property',
	'ow_LinkAttributeValues'                => 'Links',
	'ow_Property'                           => 'Property',
	'ow_Value'                              => 'Value',
	'ow_meaningsoftitle'                    => 'Meanings of "$1"',
	'ow_meaningsofsubtitle'                 => '<em>Wiki link:</em> [[$1]]',
	'ow_Permission_denied'                  => '<h2>Permission denied</h2>',
	'ow_copy_no_action_specified'           => 'Please specify an action',
	'ow_copy_help'                          => 'Help is not implemented yet.',
	'ow_please_proved_dmid'                 => 'It seems your input is missing a "?dmid=<ID>" (dmid=Defined Meaning ID)<br />
Please contact a server administrator.',
	'ow_please_proved_dc1'                  => 'It seems your input is missing a "?dc1=<something>" (dc1=dataset context 1, dataset to copy FROM)<br />
Please contact a server administrator.',
	'ow_please_proved_dc2'                  => 'It seems your input is missing a "?dc2=<something>" (dc2=dataset context 2, dataset to copy TO)<br />
Please contact a server administrator.',
	'ow_copy_successful'                    => "<h2>Copy successful</h2>
Your data appears to have been copied successfully.
Do not forget to doublecheck to make sure!",
	'ow_copy_unsuccessful'                  => '<h3>Copy unsuccessful</h3>
No copy operation has taken place.',
	'ow_no_action_specified'                => "<h3>No action was specified</h3>
Perhaps you came to this page directly? Normally you do not need to be here.",
	'ow_db_consistency_not_found'          => "<h2>Error</h2>
There is an issue with database consistency, wikidata cannot find valid data connected to this defined meaning ID.
It might be lost.
Please contact the server operator or administrator.",
	'ow_needs_xlation_title'			=> 'Expressions needing translation',
	'ow_needs_xlation_source_lang'		=> 'Source language:',
	'ow_needs_xlation_dest_lang'		=> 'Destination language:',
	'ow_needs_xlation_no_dest_lang'		=> 'Please specify a destination language.',
	'ow_show'							=> 'Show',
	'ow_create'							=> 'Create',
	'ow_collection_added'				=> '<strong>Collection $1 added.</strong>',
	'ow_suggest_previous'				=> 'Previous',
	'ow_suggest_next'					=> 'Next',
	'ow_suggest_clear'					=> 'Clear',
);

/** Message documentation (Message documentation)
 * @author EugeneZelenko
 * @author Fryed-peach
 * @author Jon Harald Søby
 * @author Malafaya
 * @author Siebrand
 */
$wdMessages['qqq'] = array(
	'languages' => 'Name of special page (see [http://www.omegawiki.org/Special:Specialpages http://www.omegawiki.org/Special:Specialpages])',
	'langman_title' => 'Title in Language manager special page ([http://www.omegawiki.org/Special:Languages http://www.omegawiki.org/Special:Languages])',
	'langman_header' => 'Translate the word "English"; don\'t change it to your own language!',
	'langman_adding' => "$1 is the language name; $2 is the language's ISO 639-3 code.",
	'importlangnames' => 'Name of special page (see [http://www.omegawiki.org/Special:Specialpages http://www.omegawiki.org/Special:Specialpages])',
	'datasearch' => 'Name of special page (see [http://www.omegawiki.org/Special:Specialpages http://www.omegawiki.org/Special:Specialpages])',
	'addcollection' => 'Name of special page (see [http://www.omegawiki.org/Special:Specialpages http://www.omegawiki.org/Special:Specialpages])',
	'ow_save' => '{{Identical|Save}}',
	'ow_history' => '{{Identical|History}}',
	'ow_none_selected' => '{{Identical|None selected}}',
	'ow_conceptmapping_no_action_specified' => '* $1 is a parameter that is not supported (for example manually changed in a URL). It can be anything that has been provided by a client.',
	'ow_dm_OK' => '{{Identical|OK}}',
	'ow_dm_not_present' => 'Used on [http://www.omegawiki.org/index.php?title=Special:ConceptMapping Special:ConceptMapping]',
	'ow_AddHint' => 'Hint that shows up when the mouse hovers the plus sign in table rows (such as Synonyms and Translations) while editing',
	'ow_Annotation' => '{{Identical|Annotation}}',
	'ow_ClassAttributeType' => '{{Identical|Type}}',
	'ow_Collection' => '{{Identical|Collection}}',
	'ow_Collection_colon' => '{{Identical|Collection}}',
	'ow_DefinedMeaningAttributes' => '{{Identical|Annotation}}',
	'ow_DefinedMeaning' => '{{Identical|Defined meaning}}',
	'ow_DefinedMeaningReference' => '{{Identical|Defined meaning}}',
	'ow_Language' => '{{Identical|Language}}',
	'ow_LevelAnnotation' => '{{Identical|Annotation}}',
	'ow_OptionAttribute' => '{{Identical|Property}}',
	'ow_OptionAttributeOptions' => '{{Identical|Options}}',
	'ow_PopupAnnotation' => 'The small link next to elements which can be annotated, such as Synonyms and Translations.
This is visible when a SynTrans is annotated, or while editing a page.
{{Identical|Annotation}}',
	'ow_Remove' => 'Header caption for the selection boxes used to remove a row from a table (such as in Synonyms and Translations)
{{Identical|Remove}}',
	'ow_RemoveHint' => 'Hint that shows up when the mouse hovers the Remove column header while editing',
	'ow_SuggestHint' => 'Hint that shows up when the mouse hovers a choice box containing items such as languages, annotation types, etc.',
	'ow_Source' => '{{Identical|Source}}',
	'ow_TextAttribute' => '{{Identical|Property}}',
	'ow_Text' => '{{Identical|Text}}',
	'ow_TranslatedTextAttribute' => '{{Identical|Property}}',
	'ow_TranslatedTextAttributeValue' => '{{Identical|Text}}',
	'ow_LinkAttribute' => '{{Identical|Property}}',
	'ow_LinkAttributeValues' => '{{Identical|Links}}',
	'ow_Property' => '{{Identical|Property}}',
	'ow_Value' => '{{Identical|Value}}',
	'ow_Permission_denied' => "Visible on [http://www.omegawiki.org/Special:Copy this OmegaWiki page] (make sure you're not logged in)
{{Identical|Permission denied}}",
	'ow_needs_xlation_title' => 'Visible on this [http://www.omegawiki.org/Special:NeedsTranslation OmegaWiki page].',
	'ow_needs_xlation_source_lang' => 'Visible on this [http://www.omegawiki.org/Special:NeedsTranslation OmegaWiki page].',
	'ow_needs_xlation_dest_lang' => 'Visible on this [http://www.omegawiki.org/Special:NeedsTranslation OmegaWiki page].',
	'ow_needs_xlation_no_dest_lang' => 'Visible on this [http://www.omegawiki.org/Special:NeedsTranslation OmegaWiki page].',
	'ow_show' => 'Button text to show results.
Visible on this [http://www.omegawiki.org/Special:NeedsTranslation OmegaWiki page].
{{Identical|Show}}',
	'ow_create' => '{{Identical|Create}}',
	'ow_suggest_previous' => '{{Identical|Previous}}',
);

/** Karelian (Karjala)
 * @author Flrn
 */
$wdMessages['krl'] = array(
	'ow_LinkAttributeValues' => 'Viippaukset',
);

/** Niuean (ko e vagahau Niuē)
 * @author Jose77
 */
$wdMessages['niu'] = array(
	'ow_history' => 'Liu onoono atu ki tua',
);

/** Afrikaans (Afrikaans)
 * @author Arnobarnard
 * @author Naudefj
 * @author SPQRobin
 */
$wdMessages['af'] = array(
	'langman_title' => 'Taalbestuurder',
	'ow_save' => 'Stoor',
	'ow_history' => 'Geskiedenis',
	'ow_noedit_title' => 'Geen regte om te wysig',
	'ow_dm_OK' => 'OK',
	'ow_dm_not_present' => 'nie ingevoer',
	'ow_AlternativeDefinition' => 'Alternatiewe definisie',
	'ow_AlternativeDefinitions' => 'Alternatiewe definisies',
	'ow_Annotation' => 'Annotasie',
	'ow_ClassAttributeType' => 'Tipe',
	'ow_Collection' => 'Versameling',
	'ow_Definition' => 'Definisie',
	'ow_DefinedMeaningAttributes' => 'Annotasie',
	'ow_Expression' => 'Uitdrukking',
	'ow_Expressions' => 'Uitdrukkings',
	'ow_GotoSource' => 'Gaan na bron',
	'ow_Language' => 'Taal',
	'ow_LevelAnnotation' => 'Annotasie',
	'ow_OptionAttributeOption' => 'Opsie',
	'ow_OptionAttributeOptions' => 'Opsies',
	'ow_PopupAnnotation' => 'Annotasie',
	'ow_Spelling' => 'Spelling',
	'ow_Synonyms' => 'Sinonieme',
	'ow_Source' => 'Bron',
	'ow_Text' => 'Teks',
	'ow_TranslatedText' => 'Vertaalde teks',
	'ow_TranslatedTextAttributeValue' => 'Teks',
	'ow_TranslatedTextAttributeValues' => 'Vertaalbare teks',
	'ow_LinkAttributeValues' => 'Skakels',
	'ow_Value' => 'Waarde',
);

/** Amharic (አማርኛ)
 * @author Codex Sinaiticus
 */
$wdMessages['am'] = array(
	'ow_history' => 'ታሪክ',
	'ow_dm_OK' => 'እሺ',
	'ow_ClassAttributeLevel' => 'ደረጃ',
	'ow_Language' => 'ቋንቋ',
	'ow_OptionAttributeOptions' => 'ምርጫዎች',
	'ow_Text' => 'ጽሕፈት',
	'ow_TranslatedTextAttributeValue' => 'ጽሕፈት',
);

/** Aragonese (Aragonés)
 * @author Juanpabl
 */
$wdMessages['an'] = array(
	'datasearch' => 'Wikidata: Mirar datos',
	'ow_dm_OK' => 'OK',
);

/** Arabic (العربية)
 * @author Meno25
 */
$wdMessages['ar'] = array(
	'languages' => 'ويكي داتا: مدير اللغة',
	'langman_title' => 'مدير اللغة',
	'datasearch' => 'ويكي داتا: بحث البيانات',
	'ow_save' => 'حفظ',
	'ow_history' => 'تاريخ',
	'ow_datasets' => 'اختيار مجموعة البيانات',
	'ow_noedit_title' => 'لا سماح للتعديل',
	'ow_noedit' => 'أنت غير مسموح لك بتعديل الصفحات في مجموعة البيانات "$1".
من فضلك انظر [[{{MediaWiki:Ow editing policy url}}|سياسة التحرير الخاصة بنا]].',
	'ow_uipref_datasets' => 'عرض افتراضي',
	'ow_uiprefs' => 'ويكي داتا',
	'ow_none_selected' => 'لا شيء تم اختياره',
	'ow_conceptmapping_help' => '<p>الأفعال الممكنة: <ul>
<li>&action=insert&<data_context_prefix>=<defined_id>&...  إدراج رابطة</li>
<li>&action=get&concept=<concept_id>  قراءة رابطة</li>
<li>&action=list_sets عرض قائمة لبوادىء سياقات البيانات الممكنة وما الذي تشير إليه.</li>
<li>&action=get_associated&dm=<defined_meaning_id>&dc=<dataset_context_prefix> لمعنى معرف واحد في مبدأ، يعرض الآخرون كلهم</li>
<li>&action=help  عرض مساعدة مفيدة.</li>
</ul></p>',
	'ow_conceptmapping_uitext' => '<p>ربط المبدأ يسمح لك بتعرف أي معنى معرف في مجموعة بيانات مطابق لمعاني معرفة في مجموعات بيانات أخرى.</p>',
	'ow_conceptmapping_no_action_specified' => 'الفعل "$1" غير مدعوم.',
	'ow_dm_OK' => 'موافق',
	'ow_dm_not_present' => 'غير مدخل',
	'ow_dm_not_found' => 'غير موجود في قاعدة البيانات أو لم يتم عمله بطريقة صحيحة',
	'ow_mapping_successful' => 'ربط كل الحقول المعلمة ب [OK]<br />',
	'ow_mapping_unsuccessful' => 'يجب أن يكون هناك معنيان معرفان على الأقل قبل أن يمكن وصلهما.',
	'ow_will_insert' => 'سيدرج التالي:',
	'ow_contents_of_mapping' => 'محتويات الربط',
	'ow_available_contexts' => 'السياقات المتوفرة',
	'ow_add_concept_link' => 'أضف وصلة إلى مبادىء أخرى',
	'ow_concept_panel' => 'لوحة المبدأ',
	'ow_dm_badtitle' => 'هذه الصفحة لا تشير إلى أي معنى معرف (مبدأ).
من فضلك تحقق من عنوان الويب.',
	'ow_dm_missing' => 'هذه الصفحة على ما يبدو تشير إلى معنى معرف غير موجود (مبدأ).
من فضلك تحقق من عنوان الويب.',
	'ow_AlternativeDefinition' => 'تعريف بديل',
	'ow_AlternativeDefinitions' => 'تعريفات بديلة',
	'ow_Annotation' => 'هامش',
	'ow_ApproximateMeanings' => 'معاني تقريبية',
	'ow_ClassAttributeAttribute' => 'نسب',
	'ow_ClassAttributes' => 'نسب الرتبة',
	'ow_ClassAttributeLevel' => 'مستوى',
	'ow_ClassAttributeType' => 'نوع',
	'ow_ClassMembership' => 'عضوية الرتبة',
	'ow_Collection' => 'مجموعة',
	'ow_CollectionMembership' => 'عضوية المجموعة',
	'ow_Definition' => 'تعريف',
	'ow_DefinedMeaningAttributes' => 'هامش',
	'ow_DefinedMeaning' => 'معنى معرف',
	'ow_DefinedMeaningReference' => 'معنى معرف',
	'ow_ExactMeanings' => 'معاني مطابقة',
	'ow_Expression' => 'تعبير',
	'ow_ExpressionMeanings' => 'معاني التعبير',
	'ow_Expressions' => 'تعبيرات',
	'ow_IdenticalMeaning' => 'معنى مطابق؟',
	'ow_IncomingRelations' => 'علاقات داخلة',
	'ow_GotoSource' => 'اذهب إلى المصدر',
	'ow_Language' => 'اللغة',
	'ow_LevelAnnotation' => 'هامش',
	'ow_OptionAttribute' => 'خاصية',
	'ow_OptionAttributeOption' => 'خيار',
	'ow_OptionAttributeOptions' => 'خيارات',
	'ow_OptionAttributeValues' => 'قيم الخيار',
	'ow_OtherDefinedMeaning' => 'معنى معرف آخر',
	'ow_PopupAnnotation' => 'هامش',
	'ow_Relations' => 'علاقات',
	'ow_RelationType' => 'نوع العلاقة',
	'ow_Spelling' => 'إملاء',
	'ow_Synonyms' => 'متقاربات',
	'ow_SynonymsAndTranslations' => 'متقاربات وترجمات',
	'ow_Source' => 'مصدر',
	'ow_SourceIdentifier' => 'معرف المصدر',
	'ow_TextAttribute' => 'خاصية',
	'ow_Text' => 'نص',
	'ow_TextAttributeValues' => 'نصوص صريحة',
	'ow_TranslatedTextAttribute' => 'خاصية',
	'ow_TranslatedText' => 'نص مترجم',
	'ow_TranslatedTextAttributeValue' => 'نص',
	'ow_TranslatedTextAttributeValues' => 'نصوص قابلة للترجمة',
	'ow_LinkAttribute' => 'خاصية',
	'ow_LinkAttributeValues' => 'وصلات',
	'ow_Property' => 'خاصية',
	'ow_Value' => 'قيمة',
	'ow_meaningsoftitle' => 'معاني "$1"',
	'ow_meaningsofsubtitle' => '<em>وصلة ويكي:</em> [[$1]]',
	'ow_Permission_denied' => '<h2>السماح مرفوض</h2>',
	'ow_copy_no_action_specified' => 'من فضلك حدد فعلا',
	'ow_copy_help' => 'المساعدة ليست مطبقة حاليا.',
	'ow_please_proved_dmid' => 'على ما يبدو دخلك يفقد ?dmid=<something>  (dmid=رقم المعنى المعرف)<br />
من فضلك اتصل بإداري خادم.',
	'ow_please_proved_dc1' => 'على ما يبدو دخلك يفقد ?dc1=<something>  (dc1=سياق مجموعة البيانات 1، مجموعة البيانات للنسخ منها)<br />
من فضلك اتصل بإداري خادم.',
	'ow_please_proved_dc2' => 'على ما يبدو فدخلك يفقد ?dc2=<something>  (dc2=سياق مجموعة البيانات 2، مجموعة البيانات للنسخ منها)<br />
من فضلك اتصل بإداري خادم.',
	'ow_copy_successful' => '<h2>النسخ نجح</h2>
بياناتك يبدو أنها قد تم نسخها بنجاح.
لا تنس أن تتحقق ثانية للتأكد!',
	'ow_copy_unsuccessful' => '<h3>النسخ لم ينجح</h3>
لم تحدث أية عملية نسخ.',
	'ow_no_action_specified' => '<h3>لا فعل تم تحديده</h3>
ربما أتيت إلى هذه الصفحة مباشرة؟ عادة أنت لا تحتاج إلى أن تكون هنا.',
	'ow_db_consistency_not_found' => '<h2>خطأ</h2>
توجد مشكلة في ثبات قاعدة البيانات، ويكي داتا لا يمكنها العثور على بيانات صحيحة تتصل برقم المعنى المعرف هذا.
ربما يكون قد ضاع.
من فضلك اتصل بمشغل أو إداري الخادم.',
);

/** Egyptian Spoken Arabic (مصرى)
 * @author Meno25
 * @author Ramsis II
 */
$wdMessages['arz'] = array(
	'languages' => 'ويكى داتا: مدير اللغة',
	'langman_title' => 'مدير اللغة',
	'datasearch' => 'ويكى داتا: بحث البيانات',
	'ow_save' => 'حفظ',
	'ow_history' => 'تاريخ',
	'ow_datasets' => 'اختيار مجموعة البيانات',
	'ow_noedit_title' => 'لا سماح للتعديل',
	'ow_noedit' => 'أنت غير مسموح لك بتعديل الصفحات فى مجموعة البيانات "$1".
من فضلك انظر [[{{MediaWiki:Ow editing policy url}}|سياسة التحرير الخاصة بنا]].',
	'ow_uipref_datasets' => 'عرض افتراضي',
	'ow_uiprefs' => 'ويكى داتا',
	'ow_none_selected' => 'لا شيء تم اختياره',
	'ow_conceptmapping_help' => '<p>الأفعال الممكنة: <ul>
<li>&action=insert&<data_context_prefix>=<defined_id>&...  إدراج رابطة</li>
<li>&action=get&concept=<concept_id>  قراءة رابطة</li>
<li>&action=list_sets عرض قائمة لبوادىء سياقات البيانات الممكنة وما الذى تشير إليه.</li>
<li>&action=get_associated&dm=<defined_meaning_id>&dc=<dataset_context_prefix> لمعنى معرف واحد فى مبدأ، يعرض الآخرون كلهم</li>
<li>&action=help  عرض مساعدة مفيدة.</li>
</ul></p>',
	'ow_conceptmapping_uitext' => '<p>ربط المبدأ يسمح لك بتعرف أى معنى معرف فى مجموعة بيانات مطابق لمعانى معرفة فى مجموعات بيانات أخرى.</p>',
	'ow_conceptmapping_no_action_specified' => 'العمليه "$1" مش مدعومه.',
	'ow_dm_OK' => 'موافق',
	'ow_dm_not_present' => 'غير مدخل',
	'ow_dm_not_found' => 'غير موجود فى قاعدة البيانات أو لم يتم عمله بطريقة صحيحة',
	'ow_mapping_successful' => 'ربط كل الحقول المعلمة ب [OK]<br />',
	'ow_mapping_unsuccessful' => 'لازم يكون في ع الاقل معنيين متعرفين قبل ما نقدر نوصلهم ببعض.',
	'ow_will_insert' => 'سيدرج التالي:',
	'ow_contents_of_mapping' => 'محتويات الربط',
	'ow_available_contexts' => 'السياقات المتوفرة',
	'ow_add_concept_link' => 'أضف وصلة إلى مبادىء أخرى',
	'ow_concept_panel' => 'لوحة المبدأ',
	'ow_dm_badtitle' => 'هذه الصفحة لا تشير إلى أى معنى معرف (مبدأ).
من فضلك تحقق من عنوان الويب.',
	'ow_dm_missing' => 'هذه الصفحة على ما يبدو تشير إلى معنى معرف غير موجود (مبدأ).
من فضلك تحقق من عنوان الويب.',
	'ow_AlternativeDefinition' => 'تعريف بديل',
	'ow_AlternativeDefinitions' => 'تعريفات بديلة',
	'ow_Annotation' => 'هامش',
	'ow_ApproximateMeanings' => 'معانى تقريبية',
	'ow_ClassAttributeAttribute' => 'نسب',
	'ow_ClassAttributes' => 'نسب الرتبة',
	'ow_ClassAttributeLevel' => 'مستوى',
	'ow_ClassAttributeType' => 'نوع',
	'ow_ClassMembership' => 'عضوية الرتبة',
	'ow_Collection' => 'مجموعة',
	'ow_CollectionMembership' => 'عضوية المجموعة',
	'ow_Definition' => 'تعريف',
	'ow_DefinedMeaningAttributes' => 'هامش',
	'ow_DefinedMeaning' => 'معنى معرف',
	'ow_DefinedMeaningReference' => 'معنى معرف',
	'ow_ExactMeanings' => 'معانى مطابقة',
	'ow_Expression' => 'تعبير',
	'ow_ExpressionMeanings' => 'معانى التعبير',
	'ow_Expressions' => 'تعبيرات',
	'ow_IdenticalMeaning' => 'معنى مطابق؟',
	'ow_IncomingRelations' => 'علاقات داخلة',
	'ow_GotoSource' => 'اذهب إلى المصدر',
	'ow_Language' => 'اللغة',
	'ow_LevelAnnotation' => 'هامش',
	'ow_OptionAttribute' => 'خاصية',
	'ow_OptionAttributeOption' => 'خيار',
	'ow_OptionAttributeOptions' => 'خيارات',
	'ow_OptionAttributeValues' => 'قيم الخيار',
	'ow_OtherDefinedMeaning' => 'معنى معرف آخر',
	'ow_PopupAnnotation' => 'هامش',
	'ow_Relations' => 'علاقات',
	'ow_RelationType' => 'نوع العلاقة',
	'ow_Spelling' => 'إملاء',
	'ow_Synonyms' => 'متقاربات',
	'ow_SynonymsAndTranslations' => 'متقاربات وترجمات',
	'ow_Source' => 'مصدر',
	'ow_SourceIdentifier' => 'معرف المصدر',
	'ow_TextAttribute' => 'خاصية',
	'ow_Text' => 'نص',
	'ow_TextAttributeValues' => 'نصوص صريحة',
	'ow_TranslatedTextAttribute' => 'خاصية',
	'ow_TranslatedText' => 'نص مترجم',
	'ow_TranslatedTextAttributeValue' => 'نص',
	'ow_TranslatedTextAttributeValues' => 'نصوص قابلة للترجمة',
	'ow_LinkAttribute' => 'خاصية',
	'ow_LinkAttributeValues' => 'وصلات',
	'ow_Property' => 'خاصية',
	'ow_Value' => 'قيمة',
	'ow_meaningsoftitle' => 'معانى "$1"',
	'ow_meaningsofsubtitle' => '<em>وصلة ويكي:</em> [[$1]]',
	'ow_Permission_denied' => '<h2>السماح مرفوض</h2>',
	'ow_copy_no_action_specified' => 'من فضلك حدد فعلا',
	'ow_copy_help' => 'المساعدة لسه ما اشتغلتش.',
	'ow_please_proved_dmid' => 'على ما يبدو دخلك يفقد ?dmid=<something>  (dmid=رقم المعنى المعرف)<br />
من فضلك اتصل بإدارى خادم.',
	'ow_please_proved_dc1' => 'على ما يبدو دخلك يفقد ?dc1=<something>  (dc1=سياق مجموعة البيانات 1، مجموعة البيانات للنسخ منها)<br />
من فضلك اتصل بإدارى خادم.',
	'ow_please_proved_dc2' => 'على ما يبدو فدخلك يفقد ?dc2=<something>  (dc2=سياق مجموعة البيانات 2، مجموعة البيانات للنسخ منها)<br />
من فضلك اتصل بإدارى خادم.',
	'ow_copy_successful' => '<h2>النسخ نجح</h2>
بياناتك يبدو أنها قد تم نسخها بنجاح.
لا تنس أن تتحقق ثانية للتأكد!',
	'ow_copy_unsuccessful' => '<h3>النسخ لم ينجح</h3>
لم تحدث أية عملية نسخ.',
	'ow_no_action_specified' => '<h3>لا فعل تم تحديده</h3>
ربما أتيت إلى هذه الصفحة مباشرة؟ عادة أنت لا تحتاج إلى أن تكون هنا.',
	'ow_db_consistency_not_found' => '<h2>خطأ</h2>
توجد مشكلة فى ثبات قاعدة البيانات، ويكى داتا لا يمكنها العثور على بيانات صحيحة تتصل برقم المعنى المعرف هذا.
ربما يكون قد ضاع.
من فضلك اتصل بمشغل أو إدارى الخادم.',
);

/** Asturian (Asturianu)
 * @author Esbardu
 */
$wdMessages['ast'] = array(
	'ow_Language' => 'Llingua',
);

/** Kotava (Kotava)
 * @author Sab
 * @author Wikimistusik
 */
$wdMessages['avk'] = array(
	'languages' => 'Wikidata : avapofesiki',
	'langman_title' => 'Avapofesiki',
	'datasearch' => 'Wikidata : Origaneyara',
	'ow_save' => 'Giwara',
	'ow_history' => 'Izvot',
	'ow_datasets' => 'Rebara va origlospa',
	'ow_noedit_title' => 'Me betararictara',
	'ow_noedit' => 'Rin me zorictal ta bubetara koe "$1" origlospa. Va [[{{MediaWiki:Ow editing policy url}}|betaraverteem]] vay wil !',
	'ow_uipref_datasets' => 'Omavawira',
	'ow_uiprefs' => 'Wikidata',
	'ow_none_selected' => 'Mecoba rebana',
	'ow_conceptmapping_help' => '<p>rotisa tegira se : <ul>
<li>&action=insert&<data_context_prefix>=<defined_id>&...  walbura va skura</li>
<li>&action=get&concept=<concept_id>  sutera va dimskura</li>
<li>&action=list_sets  va vexala dem rotisa orkafa osta yo is sinafa vuestera buldar.</li>
<li>&action=get_associated&dm=<defined_meaning_id>&dc=<dataset_context_prefix> tori tanoya tentunafa sugdala ke envaks, va kotar buldar</li>
<li>&action=help  Nedira va pomapara.</li>
</ul></p>',
	'ow_conceptmapping_uitext' => '<p>Envaksskura pu rin rictal da inde tentunafa sugdala koe tanoya origlospa tir milkafa gu tentunafa sugdala se koe ara origlospa yo ropilkomodal.</p>',
	'ow_conceptmapping_no_action_specified' => 'Skalewé ! Jin me grupaskí inde "$1".',
	'ow_dm_OK' => 'Ená !',
	'ow_dm_not_present' => 'me geltsuteyen',
	'ow_dm_not_found' => 'me trasiyin koe origak ok tazukajayan',
	'ow_mapping_successful' => 'Kota rapta tcalayana kan [OK] skuyuna <br />',
	'ow_mapping_unsuccessful' => 'Abdi gluyara icle toloya tentunafa sugdala tid adrafa.',
	'ow_will_insert' => 'Batcoba walbutur va :',
	'ow_contents_of_mapping' => 'Skuracek',
	'ow_available_contexts' => 'Roderaykana orka se',
	'ow_add_concept_link' => 'Loplekura va gluyasiki ben ar envaks',
	'ow_concept_panel' => 'Envaksspert',
	'ow_dm_badtitle' => 'Batu bu va mek DefinedMeaning (envaks) eckindar. Va internetmane vay stujel !',
	'ow_dm_missing' => 'Batu bu va metis DefinedMeaning (envaks) nuvelason eckindar. Va internetmane vay stujel !',
	'ow_AlternativeDefinition' => 'Okafa tentura',
	'ow_AlternativeDefinitions' => 'Okafa tentura se',
	'ow_Annotation' => 'Stragara',
	'ow_ApproximateMeanings' => 'Vanpokefa sugdala se',
	'ow_ClassAttributeAttribute' => 'Pilkovoy',
	'ow_ClassAttributes' => 'Pulapilkovoyeem',
	'ow_ClassAttributeLevel' => 'Eka',
	'ow_ClassAttributeType' => 'Ord',
	'ow_ClassMembership' => 'Pulolkeem',
	'ow_Collection' => 'Dotay',
	'ow_CollectionMembership' => 'Dotayolkeem',
	'ow_Definition' => 'Tentura',
	'ow_DefinedMeaningAttributes' => 'Stragara',
	'ow_DefinedMeaning' => 'Tentunafa sugdala',
	'ow_DefinedMeaningReference' => 'Tentunafa sugdala',
	'ow_ExactMeanings' => 'Tageltafa sugdala se',
	'ow_Expression' => 'Muxaks',
	'ow_ExpressionMeanings' => 'Muxarasugdala se',
	'ow_Expressions' => 'Muxaks yo',
	'ow_IdenticalMeaning' => 'Milkafa sugdala ?',
	'ow_IncomingRelations' => 'Kofa skedara se',
	'ow_GotoSource' => 'Lanira ko klita',
	'ow_Language' => 'Ava',
	'ow_LevelAnnotation' => 'Stragara',
	'ow_OptionAttribute' => 'Pilkaca',
	'ow_OptionAttributeOption' => 'Rotisaca',
	'ow_OptionAttributeOptions' => 'Rotisaceem',
	'ow_OptionAttributeValues' => 'Rotisacavodeem',
	'ow_OtherDefinedMeaning' => 'Ara tentunafa sugdala',
	'ow_PopupAnnotation' => 'Straga',
	'ow_Relations' => 'Skedareem',
	'ow_RelationType' => 'Skedarord',
	'ow_Spelling' => 'Suteka',
	'ow_Synonyms' => 'Milsugdalaca yo',
	'ow_SynonymsAndTranslations' => 'Se milsugdalaca is kalavaks',
	'ow_Source' => 'Klita',
	'ow_SourceIdentifier' => 'Klitavrutasiki',
	'ow_TextAttribute' => 'Pilkaca',
	'ow_Text' => 'Krent',
	'ow_TextAttributeValues' => 'Opelaf krent yo',
	'ow_TranslatedTextAttribute' => 'Pilkaca',
	'ow_TranslatedText' => 'Kalavayan krent',
	'ow_TranslatedTextAttributeValue' => 'Krent',
	'ow_TranslatedTextAttributeValues' => 'Romalavan krent yo',
	'ow_LinkAttribute' => 'Pilkaca',
	'ow_LinkAttributeValues' => 'Gluyasikieem',
	'ow_Property' => 'Pilkaca',
	'ow_Value' => 'Voda',
	'ow_meaningsoftitle' => 'Sugdala se ke "$1"',
	'ow_meaningsofsubtitle' => '<em>Wiki gluyasiki :</em> [[$1]]',
	'ow_Permission_denied' => '<h2>VEWANA RICTARA</h2>',
	'ow_copy_no_action_specified' => 'Va tegira vay bazel !',
	'ow_copy_help' => 'Konviele va rin rotir pomatav.',
	'ow_please_proved_dmid' => 'Nuvelar da "?dmid=<ID>" (dmid=Defined Meaning ID) koe rinafa geltsutera gracer<br /> Va ristusik va zanisiko vay uzeral !',
	'ow_please_proved_dc1' => 'Nuvelar da "?dc1=<koncoba>" (dc1=dataset context 1, origlospa ta MALksudara) koe rinafa geltsutera gracer<br />Va ristusik va zanisiko vay uzeral !',
	'ow_please_proved_dc2' => 'Nuvelar da "?dc2=<koncoba>" (dc2=dataset context 2, origlospa ta KALksudara) koe rinafa geltsutera gracer<br />Va ristusik va zanisiko vay uzeral !',
	'ow_copy_successful' => '<h2>Ksudanhara !</h2>Rinaf origeem su zo ksudanhayar. Me vulkul da lanon tolstujel !',
	'ow_copy_unsuccessful' => '<h3>Ksudajara</h3> Ksudaraskura metuwadayana.',
	'ow_no_action_specified' => '<h3>Meka tegira zo bazeyer</h3> Rotir ko batu bu rontion artpil ? Nelkon batlize vol co-til.',
	'ow_db_consistency_not_found' => '<h2>Rokla</h2>Tir uum icde duga ke origak, Wikidata va wadaf orig skedas va bata ID tentunafa sugdala me rotrasir. Rotir batcoba tir griawiyisa. Va ristusik va zanisiko vay uzeral !',
);

/** Bikol Central (Bikol Central)
 * @author Filipinayzd
 */
$wdMessages['bcl'] = array(
	'datasearch' => 'Wikidata: Data search',
	'languages' => 'Wikidata: Manager kan tataramon',
);

/** Belarusian (Taraškievica orthography) (Беларуская (тарашкевіца))
 * @author EugeneZelenko
 * @author Jim-by
 * @author Red Winged Duck
 */
$wdMessages['be-tarask'] = array(
	'languages' => 'Вікізьвесткі: кіраваньне мовамі',
	'langman_title' => 'Кіраваньне мовамі',
	'langman_not_allowed' => 'Вы ня маеце правоў на зьмену настроек моваў.',
	'langman_header' => 'Увядзіце код мовы і яе ангельскую назву ніжэй:',
	'langman_req_fields' => 'Патрабуюцца назва мовы і код ISO 639-3!',
	'langman_adding' => 'Дададзеная мова $1 з ключом $2.',
	'langman_langname' => 'Назва мовы:',
	'langman_iso639-3' => 'Код ISO 639-3:',
	'langman_iso639-2' => 'Код ISO 639-2:',
	'langman_wikimedia' => 'Код Вікімэдыя:',
	'langman_field_optional' => '(дадаткова)',
	'langman_addlang' => 'Дадаць мову',
	'importlangnames' => 'ВікіЗьвесткі: Імпартаваць назвы моваў',
	'importlangnames_title' => 'Імпартаваць назвы моваў',
	'importlangnames_not_allowed' => 'Вы ня маеце правоў на імпарт назваў моваў.',
	'importlangnames_added' => 'Дададзеная назва мовы для «$1».',
	'importlangnames_not_found' => '<strong>Ня знойдзены элемэнт для мовы «$1»!</strong>',
	'datasearch' => 'Вікізьвесткі: пошук зьвестак',
	'addcollection' => 'ВікіЗьвесткі: Дадаць калекцыю',
	'ow_save' => 'Захаваць',
	'ow_history' => 'Гісторыя',
	'ow_datasets' => 'Выбар набору зьвестак',
	'ow_noedit_title' => 'Няма правоў для рэдагаваньня',
	'ow_noedit' => 'Вам не дазволена рэдагаваць старонкі ў наборы зьвестак «$1».
Калі ласка, паглядзіце [[{{MediaWiki:Ow editing policy url}}|нашы правілы рэдагаваньня]].',
	'ow_uipref_datasets' => 'Выгляд па змоўчваньні',
	'ow_uiprefs' => 'Вікізьвесткі',
	'ow_none_selected' => 'Нічога ня выбрана',
	'ow_conceptmapping_help' => '<p>магчымыя дзеяньні: <ul>
<li>&action=insert&<data_context_prefix>=<defined_id>&...  уставіць адпаведнасьць</li>
<li>&action=get&concept=<concept_id>  прачытаць адпаведнасьць</li>
<li>&action=list_sets  паказаць сьпіс магчымых прыставак кантэкстаў зьвестак і куды яны спасылаюцца.</li>
<li>&action=get_associated&dm=<defined_meaning_id>&dc=<dataset_context_prefix> для аднаго вызначанага значэньня ў кантэксьце, вывесьці ўсе іншыя</li>
<li>&action=help  Паказаць дапамогу.</li>
</ul></p>',
	'ow_conceptmapping_uitext' => '<p>Усталяваньне адпаведнасьцяў канцэпцыяў дазваляе Вам пазначыць, якое пэўнае значэньне ў адным наборы зьвестак ідэнтычна іншым наборам зьвестак.</p>',
	'ow_conceptmapping_no_action_specified' => 'Дзеяньне «$1» не падтрымліваецца.',
	'ow_dm_OK' => 'Добра',
	'ow_dm_not_present' => 'ня ўведзена',
	'ow_dm_not_found' => 'ня знойдзена ў базе зьвестак альбо няслушны фармат',
	'ow_mapping_successful' => 'Усталяваная адпаведнасьць для ўсіх палёў пазначаных [OK]<br />',
	'ow_mapping_unsuccessful' => 'Неабходна мець хаця б два вызначаныя значэньні, каб было магчыма іх злучыць.',
	'ow_will_insert' => 'Будзе ўстаўлена наступнае:',
	'ow_contents_of_mapping' => 'Зьмест адпаведнасьці',
	'ow_available_contexts' => 'Даступныя кантэксты',
	'ow_add_concept_link' => 'Дадаць спасылку на іншыя канцэпцыі',
	'ow_concept_panel' => 'Панэль канцэпцыяў',
	'ow_dm_badtitle' => 'Гэта старонка не вядзе ні да аднаго пэўнага значэньня (канцэпцыі).
Калі ласка, праверце вэб-адрас.',
	'ow_dm_missing' => 'Гэта старонка, верагодна, вядзе да неіснуючага пэўнага значэньня (канцэпцыі).
Калі ласка, праверце вэб-адрас.',
	'ow_AddHint' => 'Увядзіце новы радок, каб дадаць яго',
	'ow_AlternativeDefinition' => 'Альтэрнатыўнае вызначэньне',
	'ow_AlternativeDefinitions' => 'Альтэрнатыўныя вызначэньні',
	'ow_Annotation' => 'Анатацыя',
	'ow_ApproximateMeanings' => 'Прыблізныя значэньні',
	'ow_ClassAttributeAttribute' => 'Атрыбут',
	'ow_ClassAttributes' => 'Атрыбуты клясы',
	'ow_ClassAttributeLevel' => 'Узровень',
	'ow_ClassAttributeType' => 'Тып',
	'ow_ClassMembership' => 'Удзел у клясах',
	'ow_Collection' => 'Калекцыя',
	'ow_Collection_colon' => 'Калекцыя:',
	'ow_CollectionMembership' => 'Удзел у калекцыях',
	'ow_Definition' => 'Вызначэньне',
	'ow_DefinedMeaningAttributes' => 'Анатацыя',
	'ow_DefinedMeaning' => 'Вызначанае значэньне',
	'ow_DefinedMeaningReference' => 'Вызначанае значэньне',
	'ow_ExactMeanings' => 'Дакладныя значэньні',
	'ow_Expression' => 'Выраз',
	'ow_ExpressionMeanings' => 'Значэньні выразаў',
	'ow_Expressions' => 'Выразы',
	'ow_IdenticalMeaning' => 'Ідэнтычныя значэньні?',
	'ow_IncomingRelations' => 'Уваходзячыя залежнасьці',
	'ow_GotoSource' => 'Перайсьці да крыніцы',
	'ow_Language' => 'Мова',
	'ow_LevelAnnotation' => 'Анатацыя',
	'ow_OptionAttribute' => 'Уласьцівасьць',
	'ow_OptionAttributeOption' => 'Опцыя',
	'ow_OptionAttributeOptions' => 'Опцыі',
	'ow_OptionAttributeValues' => 'Значэньне опцыяў',
	'ow_OtherDefinedMeaning' => 'Іншае вызначанае значэньне',
	'ow_PopupAnnotation' => 'Анатацыя',
	'ow_Relations' => 'Залежнасьці',
	'ow_RelationType' => 'Тып залежнасьці',
	'ow_Remove' => 'Выдаліць',
	'ow_RemoveHint' => 'Пазначце радок, каб выдаліць яго',
	'ow_Spelling' => 'Артаграфія',
	'ow_SuggestHint' => 'Націсьніце, каб зьмяніць выбар',
	'ow_Synonyms' => 'Сынонімы',
	'ow_SynonymsAndTranslations' => 'Сынонімы і пераклады',
	'ow_Source' => 'Крыніца',
	'ow_SourceIdentifier' => 'Ідэнтыфікатар крыніцы',
	'ow_TextAttribute' => 'Уласьцівасьць',
	'ow_Text' => 'Тэкст',
	'ow_TextAttributeValues' => 'Простыя тэксты',
	'ow_TranslatedTextAttribute' => 'Уласьцівасьць',
	'ow_TranslatedText' => 'Перакладзены тэкст',
	'ow_TranslatedTextAttributeValue' => 'Тэкст',
	'ow_TranslatedTextAttributeValues' => 'Тэксты, якія магчыма перакласьці',
	'ow_LinkAttribute' => 'Уласьцівасьць',
	'ow_LinkAttributeValues' => 'Спасылкі',
	'ow_Property' => 'Уласьцівасьць',
	'ow_Value' => 'Значэньне',
	'ow_meaningsoftitle' => 'Значэньне «$1»',
	'ow_meaningsofsubtitle' => '<em>Вікі-спасылка:</em> [[$1]]',
	'ow_Permission_denied' => '<h2>Доступ забаронены</h2>',
	'ow_copy_no_action_specified' => 'Калі ласка, пазначце дзеяньне',
	'ow_copy_help' => 'Дапамога яшчэ ня зьдзейсьнена.',
	'ow_please_proved_dmid' => 'Падобна, што ва ўведзеных зьвестках адсутнічае «?dmid=<ID>» (dmid=Ідэнтыфікатар вызначанага значэньня)<br />
Калі ласка, зьвяжыцеся з адміністратарам сэрвэра.',
	'ow_please_proved_dc1' => 'Падобна, што ва ўведзеных зьвестках адсутнічае «?dc1=<something>» (dc1=кантэкст набору зьвестак 1, набор зьвестак адкуль капіяваць)<br />
Калі ласка, зьвяжыцеся з адміністратарам сэрвэра.',
	'ow_please_proved_dc2' => 'Падобна, што ва ўведзеных зьвестках адсутнічае "?dc2=<something>" (dc2=кантэкст набору зьвестак 2, набор зьвестак куды капіяваць)<br />
Калі ласка, зьвяжыцеся з адміністратарам сэрвэра.',
	'ow_copy_successful' => '<h2>Капіяваньне прайшло пасьпяхова</h2>
Вашыя зьвесткі былі пасьпяхова скапіяваныя.
Але не забудзьце праверыць яшчэ раз, каб быць упэўненымі!',
	'ow_copy_unsuccessful' => '<h3>Капіяваньне не адбылася</h3>
Апэрацыя капіяваньня не была праведзена.',
	'ow_no_action_specified' => '<h3>Не пазначана ніякіх дзеяньняў</h3>
Верагодна Вы зайшлі непасрэдна на гэту старонку? Звычайна Вы не павінны былі сюды трапіць.',
	'ow_db_consistency_not_found' => '<h2>Памылка</h2>
У сувязі з парушэньнем цэльнасьці базы зьвестак, Вікізьвесткі ня могуць знайсьці слушных зьвестак злучаных з пазначаным ідэнтыфікатарам.
Магчыма яны страчаны.
Калі ласка, зьвяжыцеся з адміністратарам сэрвэра.',
	'ow_needs_xlation_title' => 'Выразы, якія патрабуюць перакладу',
	'ow_needs_xlation_source_lang' => 'Мова, зь якой ажыцьцяўляецца пераклад:',
	'ow_needs_xlation_dest_lang' => 'Мова, на якую ажыцьцяўляецца пераклад:',
	'ow_needs_xlation_no_dest_lang' => 'Калі ласка, пазначце на якую мову ажыцьцяўляецца пераклад.',
	'ow_show' => 'Паказаць',
	'ow_create' => 'Стварыць',
	'ow_collection_added' => '<strong>Дададзеная калекцыя $1.</strong>',
	'ow_suggest_previous' => 'Папярэдняя',
	'ow_suggest_next' => 'Наступная',
	'ow_suggest_clear' => 'Ачысьціць',
);

/** Bulgarian (Български)
 * @author DCLXVI
 */
$wdMessages['bg'] = array(
	'datasearch' => 'Уикиданни: Търсене на данни',
	'ow_save' => 'Съхранение',
	'ow_history' => 'История',
	'ow_noedit_title' => 'Необходими са права за редактиране',
	'ow_uiprefs' => 'Уикиданни',
	'ow_none_selected' => 'Нищо не е избрано',
	'ow_conceptmapping_no_action_specified' => 'Действието „$1“ не се поддържа от системата.',
	'ow_dm_OK' => 'Добре',
	'ow_will_insert' => 'Ще бъде вмъкнато следното:',
	'ow_AlternativeDefinition' => 'Алтернативно определение',
	'ow_AlternativeDefinitions' => 'Алтернативни определения',
	'ow_Annotation' => 'Анотация',
	'ow_ClassAttributeAttribute' => 'Атрибут',
	'ow_ClassAttributeLevel' => 'Ниво',
	'ow_ClassAttributeType' => 'Вид',
	'ow_Definition' => 'Определение',
	'ow_DefinedMeaningAttributes' => 'Анотация',
	'ow_ExactMeanings' => 'Точни значения',
	'ow_Expression' => 'Израз',
	'ow_Expressions' => 'Изрази',
	'ow_IncomingRelations' => 'Входящи релации',
	'ow_Language' => 'Език',
	'ow_LevelAnnotation' => 'Анотация',
	'ow_OptionAttributeOptions' => 'Настройки',
	'ow_PopupAnnotation' => 'Анотация',
	'ow_Relations' => 'Релации',
	'ow_RelationType' => 'Тип релация',
	'ow_Synonyms' => 'Синоними',
	'ow_SynonymsAndTranslations' => 'Синоними и преводи',
	'ow_Source' => 'Източник',
	'ow_Text' => 'Текст',
	'ow_TranslatedText' => 'Преведен текст',
	'ow_TranslatedTextAttributeValue' => 'Текст',
	'ow_LinkAttributeValues' => 'Препратки',
	'ow_Value' => 'Стойност',
	'ow_meaningsofsubtitle' => '<em>Уики-препратка:</em> [[$1]]',
	'ow_Permission_denied' => '<h2>ДОСТЪПЪТ Е ОТКАЗАН</h2>',
	'ow_copy_no_action_specified' => 'Необходимо е да се посочи действие',
	'ow_copy_successful' => '<h2>Копирането беше успешно</h2>Данните изглежда са копирани успешно. Уверите, че това наистина е така!',
	'ow_copy_unsuccessful' => '<h3>Копирането беше неуспешно</h3>
Не беше извършено копиране.',
	'ow_no_action_specified' => '<h3>Не е посочено действие</h3> Вероятно сте попаднали тук директно? Обикновено не се налага да идвате тук.',
);

/** Bengali (বাংলা)
 * @author Bellayet
 */
$wdMessages['bn'] = array(
	'datasearch' => 'Wikidata: তথ্য অনুসন্ধান',
	'langman_title' => 'ভাষা ব্যবস্থাপক',
	'languages' => 'Wikidata: ভাষা ব্যবস্থাপক',
);

/** Breton (Brezhoneg)
 * @author Fulup
 */
$wdMessages['br'] = array(
	'languages' => 'Wikidata: Merer yezhoù',
	'langman_title' => 'Merer yezhoù',
	'datasearch' => 'Wikidata: Klask roadennoù',
	'ow_save' => 'Enrollañ',
	'ow_history' => 'Istor',
	'ow_datasets' => 'Dibab an diaz',
	'ow_noedit_title' => "N'oc'h ket aotreet da zegas kemmoù",
	'ow_noedit' => 'N\'oc\'h ket aotreet da zegas kemmoù war pajennoù an diaz "$1". Sellit ouzh [[{{MediaWiki:Ow editing policy url}}|ar reolennoù kemmañ]].',
	'ow_uipref_datasets' => 'Gwel dre ziouer',
	'ow_uiprefs' => 'Roadennoù wiki',
	'ow_none_selected' => 'Netra diuzet',
	'ow_conceptmapping_help' => "<p>oberoù posupl : <ul> <li>&action=insert&<data_context_prefix>=<defined_id>&... ensoc'hañ ul liamm</li> <li>&action=get&concept=<concept_id> adkavout ul liamm</li> <li>&action=list_sets degas ur rollad rakgerioù eus kendestennoù roadennoù posupl, hag ar pezh a reont dave dezhañ.</li> <li>&action=get_associated&dm=<defined_meaning_id>&dc=<dataset_context_prefix> evit ur ster termenet en ur gendestenn, degas an holl re all</li> <li>&action=help Diskouez ar skoazell.</li> </ul></p>",
	'ow_conceptmapping_uitext' => "<p>Dre liammañ ar meizadoù e c'haller lakaat war wel sterioù termenet ur strobad roadennoù heñvel ouzh sterioù termenet strobadoù roadennoù all.</p>",
	'ow_conceptmapping_no_action_specified' => 'Fazi, dibosupl ober "$1"',
	'ow_dm_OK' => 'Mat eo',
	'ow_dm_not_present' => "n'emañ ket e-barzh",
	'ow_dm_not_found' => "n'eo ket bet kavet en diaz titouroù, pe stummet fall eo",
	'ow_mapping_successful' => 'Liammet eo bet an holl vaeziennoù merket gant [Mat eo]<br />',
	'ow_mapping_unsuccessful' => 'Ret eo kaout da nebeutañ daou ster termenet a-raok gellout liammañ anezho.',
	'ow_will_insert' => 'a verko an destenn-mañ :',
	'ow_contents_of_mapping' => 'Hollad al liammoù',
	'ow_available_contexts' => 'Kendestennoù hegerzh',
	'ow_add_concept_link' => 'Ouzhpennañ liammoù war-du meizadoù all',
	'ow_concept_panel' => 'Merañ ar Meizadoù',
	'ow_dm_badtitle' => "Ne gas ket ar bajenn-mañ da SterTermenet ebet (meizad). Gwiriit chomlec'h an URL mar plij.",
	'ow_dm_missing' => 'Evit doare ne gas ar bajenn-mañ da SterTermenet ebet (meizad). Gwiriit an URL mar plij.',
	'ow_AlternativeDefinition' => 'Termenadur all',
	'ow_AlternativeDefinitions' => 'Termenadurioù all',
	'ow_Annotation' => 'Notennadur',
	'ow_ApproximateMeanings' => 'Sterioù damheñvel',
	'ow_ClassAttributeAttribute' => 'Perzh',
	'ow_ClassAttributes' => 'Perzhioù ar rummad',
	'ow_ClassAttributeLevel' => 'Live',
	'ow_ClassAttributeType' => 'Seurt',
	'ow_ClassMembership' => 'Rummadoù',
	'ow_Collection' => 'Dastumad',
	'ow_CollectionMembership' => 'Dastumadoù',
	'ow_Definition' => 'Termenadur',
	'ow_DefinedMeaningAttributes' => 'Notennadur',
	'ow_DefinedMeaning' => 'Ster termenet',
	'ow_DefinedMeaningReference' => 'Ster termenet',
	'ow_ExactMeanings' => 'Talvoudegezh rik',
	'ow_Expression' => 'Termen',
	'ow_ExpressionMeanings' => 'Sterioù an termen',
	'ow_Expressions' => 'Termenoù',
	'ow_IdenticalMeaning' => 'Termen kevatal-rik ?',
	'ow_IncomingRelations' => 'Darempredoù o tont tre',
	'ow_GotoSource' => "Mont d'ar vammenn",
	'ow_Language' => 'Yezh',
	'ow_LevelAnnotation' => 'Notennadur',
	'ow_OptionAttribute' => 'Perzh',
	'ow_OptionAttributeOption' => 'Dibarzh',
	'ow_OptionAttributeOptions' => 'Dibaboù',
	'ow_OptionAttributeValues' => 'Talvoudegezh an dibarzhioù',
	'ow_OtherDefinedMeaning' => 'Ster termenet all',
	'ow_PopupAnnotation' => 'Notennadur',
	'ow_Relations' => 'Darempredoù',
	'ow_RelationType' => 'Seurt darempred',
	'ow_Spelling' => 'Reizhskrivañ',
	'ow_Synonyms' => 'Heñvelsterioù',
	'ow_SynonymsAndTranslations' => 'Heñvelsterioù ha troidigezhioù',
	'ow_Source' => 'Mammenn',
	'ow_SourceIdentifier' => 'Daveer ar vammenn',
	'ow_TextAttribute' => 'Perzh',
	'ow_Text' => 'Testenn',
	'ow_TextAttributeValues' => 'Skrid plaen',
	'ow_TranslatedTextAttribute' => 'Perzh',
	'ow_TranslatedText' => 'Testenn troet',
	'ow_TranslatedTextAttributeValue' => 'Testenn',
	'ow_TranslatedTextAttributeValues' => 'Testennoù da dreiñ',
	'ow_LinkAttribute' => 'Perzh',
	'ow_LinkAttributeValues' => 'Liammoù',
	'ow_Property' => 'Perzh',
	'ow_Value' => 'Talvoudenn',
	'ow_meaningsoftitle' => 'Sterioù "$1"',
	'ow_meaningsofsubtitle' => '<em>Liamm Wiki :</em> [[$1]]',
	'ow_Permission_denied' => "<h2>AOTRE NAC'HET</h2>",
	'ow_copy_no_action_specified' => 'Spisait un ober mar plij',
	'ow_copy_help' => "Un deiz bennak e vimp gouest d'o skoazellañ...",
	'ow_please_proved_dmid' => 'Mankout a ra un ?dmid=<...> (dmid=SterTermenet ID)<br />Kit e darempred gant merour ar servijer.',
	'ow_please_proved_dc1' => 'Mankout a ra un ?dc1=<...> (dc1=kendestenn an diaz 1, diaz a eiler ADAL dezhañ)<br />Kit e darempred gant merour ar servijer.',
	'ow_please_proved_dc2' => 'Mankout a ra un ?dc2=<...> (dc1=kendestenn an diaz 2, diaz a eiler ADAL dezhañ)<br />Kit e darempred gant merour ar servijer.',
	'ow_copy_successful' => '<h2>Eilskrid aet da benn vat</h2>Evit doare eo bet eilet mat ho roadennoù (gwiriit memes tra).',
	'ow_copy_unsuccessful' => "<h3>C'hwitet eo an eiladenn</h3> N'eus bet graet eiladenn ebet.",
	'ow_no_action_specified' => "<h3>N'eus bet spisaet oberiadenn ebet</h3> Marteze oc'h deuet war-eeun war ar bajenn-mañ ? N'oc'h ket sañset dont amañ koulskoude.",
	'ow_db_consistency_not_found' => "<h2>Fazi</h2>Evit doare eo brein an diaz titouroù, n'hall ket wikidata kavout roadennoù reizh liammet ouzh ar ster termenet-mañ (ID). Marteze eo bet kollet. Kit e darempred gant oberiataer pe merer ar servijer.",
);

/** Bosnian (Bosanski)
 * @author CERminator
 */
$wdMessages['bs'] = array(
	'languages' => 'Wikidata: Upravljač jezika',
	'langman_title' => 'Upravitelj jezika',
	'datasearch' => 'Wikidata: Pretraga podataka',
	'ow_save' => 'Spremi',
	'ow_history' => 'Historija',
	'ow_datasets' => 'Odabir seta podataka',
	'ow_noedit_title' => 'Nema dopuštenja za uređivanje',
	'ow_noedit' => 'Nije Vam dopušteno da uređujete stranice u setu podataka "$1".
Molimo pogledajte [[{{MediaWiki:Ow editing policy url}}|našu politiku uređivanja]].',
	'ow_uipref_datasets' => 'Pretpostavljeni pogled:',
	'ow_uiprefs' => 'Wikidata',
	'ow_none_selected' => 'Ništa nije odabrano',
	'ow_conceptmapping_help' => '<p>moguće akcije: <ul>
<li>&action=insert&<data_context_prefix>=<defined_id>&...  ubacivanje mappinga</li>
<li>&action=get&concept=<concept_id>  ponovno čitanje mappinga</li>
<li>&action=list_sets  vraća spisak mogućih podataka u kontekstu prefiksa i na što se odnose.</li>
<li>&action=get_associated&dm=<defined_meaning_id>&dc=<dataset_context_prefix> za jedno definisano značenje u konceptu, vraća sva ostala</li>
<li>&action=help  Prikazivanje pomoći.</li>
</ul></p>',
	'ow_conceptmapping_uitext' => '<p>Concept Mapping omogućava Vam da odredite koje je definisano značenje u jednom setu podataka isto sa određenim značenjima u drugim setovima podataka.</p>',
	'ow_conceptmapping_no_action_specified' => 'Akcija "$1" nije podržana.',
	'ow_dm_OK' => 'U redu',
	'ow_dm_not_present' => 'nije uneseno',
	'ow_dm_not_found' => 'nije pronađeno u bazi podataka ili je uništeno',
	'ow_mapping_successful' => 'Sva mapirana polja su označena sa [OK]<br />',
	'ow_mapping_unsuccessful' => 'Potrebno je imati bar dva definisana značenja prije nego se mogu povezati.',
	'ow_will_insert' => 'Ubaciće se slijedeće:',
	'ow_contents_of_mapping' => 'Sadržaji mappinga',
	'ow_available_contexts' => 'Dostupni konteksti',
	'ow_add_concept_link' => 'Dodaj link ka drugim konceptima',
	'ow_dm_badtitle' => 'Ova stranica ne pokazuje na bilo koji DefinedMeaning (koncept).
Molimo provjerite web adresu.',
	'ow_AlternativeDefinition' => 'Moguća definicija',
	'ow_AlternativeDefinitions' => 'Moguće definicije',
	'ow_ApproximateMeanings' => 'Približna značenja',
	'ow_ClassAttributeAttribute' => 'Osobina',
	'ow_ClassAttributes' => 'Atributi klase',
	'ow_ClassAttributeLevel' => 'nivo',
	'ow_ClassAttributeType' => 'Vrsta',
	'ow_ClassMembership' => 'Članstvo klase',
	'ow_Collection' => 'Zbirka',
	'ow_CollectionMembership' => 'Članstvo u zbirci',
	'ow_Definition' => 'Definicija',
	'ow_DefinedMeaning' => 'Određeno značenje',
	'ow_DefinedMeaningReference' => 'Određeno značenje',
	'ow_ExactMeanings' => 'Tačna značenja',
	'ow_Expression' => 'Izraz',
	'ow_ExpressionMeanings' => 'Značenja izraza',
	'ow_Expressions' => 'Izrazi',
	'ow_IdenticalMeaning' => 'Isto značenje?',
	'ow_IncomingRelations' => 'Dolazeći odnosi',
	'ow_GotoSource' => 'Idi na izvor',
	'ow_Language' => 'Jezik',
	'ow_OptionAttribute' => 'Svojstvo',
	'ow_OptionAttributeOption' => 'Mogućnosti',
	'ow_OptionAttributeOptions' => 'Opcije',
	'ow_OptionAttributeValues' => 'Moguće vrijednosti',
	'ow_OtherDefinedMeaning' => 'Ostala definisana značenja',
	'ow_Relations' => 'Relacije',
	'ow_RelationType' => 'Tip odnosa',
	'ow_Spelling' => 'Pravopis',
	'ow_Synonyms' => 'Sinonomi',
	'ow_SynonymsAndTranslations' => 'Sinonimi i prijevodi',
	'ow_Source' => 'Izvor',
	'ow_TextAttribute' => 'Svojstvo',
	'ow_Text' => 'Tekst',
	'ow_TextAttributeValues' => 'Obični tekstovi',
	'ow_TranslatedTextAttribute' => 'Svojstvo',
	'ow_TranslatedText' => 'Prevedeni tekst',
	'ow_TranslatedTextAttributeValue' => 'Tekst',
	'ow_TranslatedTextAttributeValues' => 'Tekstovi koji se mogu prevoditi',
	'ow_LinkAttribute' => 'Svojstvo',
	'ow_LinkAttributeValues' => 'Linkovi',
	'ow_Property' => 'Svojstvo',
	'ow_Value' => 'Vrijednost',
	'ow_meaningsoftitle' => 'Značenje od "$1"',
	'ow_meaningsofsubtitle' => '<em>Wiki link:</em> [[$1]]',
	'ow_Permission_denied' => '<h2>Pristup onemogućen</h2>',
	'ow_copy_no_action_specified' => 'Molimo Vas da odredite akciju',
	'ow_copy_help' => 'Pomoć još nije implementirana.',
	'ow_please_proved_dmid' => 'Izgleda da Vašem unosu nedostaje "?dmid=<ID>" (dmid=Defined Meaning ID)<br />
Molimo kontaktirajte administratora servera.',
	'ow_copy_successful' => '<h2>Kopiranje uspješno</h2>
Vaši podaci su uspješno kopirani.
Ne zaboravite da to još jednom provjerite!',
	'ow_copy_unsuccessful' => '<h3>Kopiranje neuspješno</h3>
Operacija kopiranja nije izvedena.',
	'ow_db_consistency_not_found' => '<h2>Greška</h2>
Desila se greška u samoj bazi podataka, wikidata ne može naći valjane podatke koji su povezani sa ovim naznačenim ID značenjem.
Moguće je su izgubljeni.
Molimo kontaktirajte operatora servera ili administratora.',
	'ow_suggest_previous' => 'Prethodni',
	'ow_suggest_next' => 'Slijedeći',
	'ow_suggest_clear' => 'Očisti',
);

/** Catalan (Català)
 * @author Jordi Roqué
 * @author Toniher
 */
$wdMessages['ca'] = array(
	'ow_save' => 'Desa',
	'ow_history' => 'Historial',
	'ow_dm_OK' => "D'acord",
	'ow_ClassAttributeLevel' => 'Nivell',
	'ow_ClassAttributeType' => 'Tipus',
	'ow_Language' => 'Idioma',
	'ow_OptionAttributeOptions' => 'Opcions',
);

/** Czech (Česky)
 * @author Matěj Grabovský
 */
$wdMessages['cs'] = array(
	'languages' => 'Wikidata: Správce jazyků',
	'langman_title' => 'Správce jazyků',
	'datasearch' => 'Wikidata: Hledání údajů',
	'ow_save' => 'Uložit',
	'ow_history' => 'Historie',
	'ow_datasets' => 'Výběr množiny dat',
	'ow_noedit_title' => 'Nemáte povolení upravovat',
	'ow_noedit' => 'Nemáte oprávnění upravovat stránky v množine dat „$1“.
Prosím, podívejte se na [[{{MediaWiki:Ow editing policy url}}|naše pravidla ohledně upravování]].',
	'ow_uipref_datasets' => 'Standardní zobrazení',
	'ow_uiprefs' => 'Wikidata',
	'ow_none_selected' => 'žádné vybrané',
	'ow_conceptmapping_help' => '<p>možné činnosti: <ul>
<li>&action=insert&<data_context_prefix>=<defined_id>&...  vložit mapování</li>
<li>&action=get&concept=<concept_id>  přečíst mapování</li>
<li>&action=list_sets  vrátit seznam možných předpon datových kontextů a na co odkazují</li>
<li>&action=get_associated&dm=<defined_meaning_id>&dc=<dataset_context_prefix>  pro jeden definovaný význam v rámci pojmu, vrátit všechny ostatní</li>
<li>&action=help  zobrazit nápovědu</li>
</ul></p>',
	'ow_conceptmapping_uitext' => '<p>Mapování pojmů vám umožňuje určit, který definovaný význam v jedné množině dat je shodný s definovanými významy v ostatních možinách dat.</p>',
	'ow_conceptmapping_no_action_specified' => 'Akce „$1“ není podporována.',
	'ow_dm_OK' => 'OK',
	'ow_dm_not_present' => 'nezadané',
	'ow_dm_not_found' => 'nenalezeno v databázi nebo ve špatném tvaru',
	'ow_mapping_successful' => 'Všechna pole označená [OK] byla namapována<br />',
	'ow_mapping_unsuccessful' => 'Potřebujeme alespoň dva definované významy, abychom je mohli spojit.',
	'ow_will_insert' => 'Vloží následující:',
	'ow_contents_of_mapping' => 'Obsah mapování',
	'ow_available_contexts' => 'Dostupné kontexty',
	'ow_add_concept_link' => 'Přidat odkaz na ostatní pojmy',
	'ow_concept_panel' => 'Panel pojmu',
	'ow_dm_badtitle' => 'Tato stránka neukazuje na žádný definovaný význam (pojem). Prosím, zkontrolujte URL.',
	'ow_dm_missing' => 'Zdá se, že tato stránka ukazuje na neexistující definovaný význam (pojem). Prosím, zkontrolujte URL.',
	'ow_AlternativeDefinition' => 'Alternativní definice',
	'ow_AlternativeDefinitions' => 'Alternativní definice',
	'ow_Annotation' => 'Poznámka',
	'ow_ApproximateMeanings' => 'Přibližné významy',
	'ow_ClassAttributeAttribute' => 'Atribut',
	'ow_ClassAttributes' => 'Atributy třídy',
	'ow_ClassAttributeLevel' => 'Úroveň',
	'ow_ClassAttributeType' => 'Typ',
	'ow_ClassMembership' => 'Členství ve třídě',
	'ow_Collection' => 'Kolekce',
	'ow_CollectionMembership' => 'Členství v kolekci',
	'ow_Definition' => 'Definice',
	'ow_DefinedMeaningAttributes' => 'Poznámka',
	'ow_DefinedMeaning' => 'Definovaný význam',
	'ow_DefinedMeaningReference' => 'Definovaný význam',
	'ow_ExactMeanings' => 'Přesné významy',
	'ow_Expression' => 'Výraz',
	'ow_ExpressionMeanings' => 'Významy výrazu',
	'ow_Expressions' => 'Výrazy',
	'ow_IdenticalMeaning' => 'Shodný význam?',
	'ow_IncomingRelations' => 'Vstupující vztahy',
	'ow_GotoSource' => 'Přejít na zdroj',
	'ow_Language' => 'Jazyk',
	'ow_LevelAnnotation' => 'Poznámka',
	'ow_OptionAttribute' => 'Vlastnost',
	'ow_OptionAttributeOption' => 'Možnost',
	'ow_OptionAttributeOptions' => 'Možnosti',
	'ow_OptionAttributeValues' => 'Hodnoty možností',
	'ow_OtherDefinedMeaning' => 'Jiný definovaný význam',
	'ow_PopupAnnotation' => 'Poznámka',
	'ow_Relations' => 'Vztahy',
	'ow_RelationType' => 'Typ vztahu',
	'ow_Spelling' => 'Pravopis',
	'ow_Synonyms' => 'Synonyma',
	'ow_SynonymsAndTranslations' => 'Synonyma a překlady',
	'ow_Source' => 'Zdroj',
	'ow_SourceIdentifier' => 'Identifikátor zdroje',
	'ow_TextAttribute' => 'Vlastnost',
	'ow_Text' => 'Text',
	'ow_TextAttributeValues' => 'Prostý text',
	'ow_TranslatedTextAttribute' => 'Vlastnost',
	'ow_TranslatedText' => 'Přeložený text',
	'ow_TranslatedTextAttributeValue' => 'Text',
	'ow_TranslatedTextAttributeValues' => 'Přeložený text',
	'ow_LinkAttribute' => 'Vlastnost',
	'ow_LinkAttributeValues' => 'Odkazy',
	'ow_Property' => 'Vlastnost',
	'ow_Value' => 'Hodnota',
	'ow_meaningsoftitle' => 'Významy „$1“',
	'ow_meaningsofsubtitle' => '<em>Wikiodkaz:</em> [[$1]]',
	'ow_Permission_denied' => '<h2>NEMÁTE POTŘEBNÉ OPRÁVNĚNÍ</h2>',
	'ow_copy_no_action_specified' => 'Prosím, zadejte činnost',
	'ow_copy_help' => 'Jednoho dne vám možná pomůžeme.',
	'ow_please_proved_dmid' => 'Zdá se, že ve vašem vstupu chybí „?dmid=<ID>“ (dmid = ID definovaného významu)<br />
Prosím kontaktujte správce serveru.',
	'ow_please_proved_dc1' => 'Zdá se, že jste zapomněli zadat „?dc1=<něco>“ (dcl = kontext množiny dat 1, z které se kopíruje)<br />
Prosím kontaktujte správce serveru.',
	'ow_please_proved_dc2' => 'Zdá se, že jste zapomněli zadat „?dc2=<něco>“ (dcl = kontext množiny dat 1, do které se kopíruje)<br />
Prosím kontaktujte správce serveru.',
	'ow_copy_successful' => '<h2>Kopírování proběhlo úspěšně</h2>
Zdá se, že vaše data byla zkopírována úspěšně. Nezapomeňte to pro jistotu ještě jednou zkontrolovat!',
	'ow_copy_unsuccessful' => '<h3>Kopírování neúspěšné</h3>
Operace kopírování se neuskutečnila.',
	'ow_no_action_specified' => '<h3>Nebyla uvedena činnost</h3>
Možná jste se snažili na tuto stránku přistupovat přímo. Běžně se sem nemůžete dostat.',
	'ow_db_consistency_not_found' => '<h2>Chyba</h2>
Nastal problém s konzistencí databáze. Wikidata nemůže najít platné údaje spojené s tímto ID definovaného významu. Je možné, že jsou ztracené. Prosím kontaktujte správce serveru.',
);

/** Church Slavic (Словѣ́ньскъ / ⰔⰎⰑⰂⰡⰐⰠⰔⰍⰟ)
 * @author ОйЛ
 */
$wdMessages['cu'] = array(
	'ow_Language' => 'ѩꙁꙑ́къ',
	'ow_LinkAttributeValues' => 'съвѧ́ꙁи',
);

/** Danish (Dansk)
 * @author Jon Harald Søby
 */
$wdMessages['da'] = array(
	'ow_history' => 'Historik',
	'ow_dm_OK' => 'OK',
	'ow_Language' => 'Sprog',
	'ow_Source' => 'Kilde',
	'ow_Text' => 'Tekst',
	'ow_TranslatedTextAttributeValue' => 'Tekst',
);

/** German (Deutsch)
 * @author Als-Holder
 * @author Purodha
 * @author Revolus
 * @author Umherirrender
 */
$wdMessages['de'] = array(
	'languages' => 'Wikidata: Sprachen-Manager',
	'langman_title' => 'Sprachmanager',
	'langman_not_allowed' => 'Du hast nicht die Berechtigung die Spracheneinstellungen zu ändern.',
	'langman_header' => 'Gib den Sprachencode ein und darunter seinen englischsprachigen Namen:',
	'langman_req_fields' => 'Sowohl der Sprachennamen als auch der ISO-639-3-Code sind erforderlich!',
	'langman_adding' => 'Sprache $1 mit Code $2 hinzugefügt.',
	'langman_langname' => 'Sprachenname:',
	'langman_iso639-3' => 'ISO-639-3-Code:',
	'langman_iso639-2' => 'ISO-639-2-Code:',
	'langman_wikimedia' => 'Wikimedia-Code:',
	'langman_field_optional' => '(optional)',
	'langman_addlang' => 'Sprache hinzufügen',
	'importlangnames' => 'Wikidata: Sprachennamen importieren',
	'importlangnames_title' => 'Sprachennamen importieren',
	'importlangnames_not_allowed' => 'Du hast keine Berechtigung um Sprachennamen zu importieren.',
	'importlangnames_added' => 'Sprachennamen für „$1“ wurde hinzugefügt.',
	'importlangnames_not_found' => '<strong>Keinen Spracheneintrag für „$1“ gefunden!</strong>',
	'datasearch' => 'Wikidata: Datensuche',
	'addcollection' => 'Wikidata: Sammlung hinzufügen',
	'ow_save' => 'Speichern',
	'ow_history' => 'Versionen/Autoren',
	'ow_datasets' => 'Auswahl des Datasets',
	'ow_noedit_title' => 'Keine Editiererlaubnis',
	'ow_noedit' => 'Du hast nicht die Erlaubnis Seiten im Dataset „$1“ zu editieren.
Siehe [[{{MediaWiki:Ow editing policy url}}|unsere Richtlinien]].',
	'ow_uipref_datasets' => 'Standardansicht:',
	'ow_uiprefs' => 'Wikidata',
	'ow_none_selected' => 'nichts ausgewählt',
	'ow_conceptmapping_help' => '<p>Mögliche Aktionen: <ul>
<li>&action=insert&<data_context_prefix>=<defined_id>&… Eine Verknüpfung hinzufügen</li>
<li>&action=get&concept=<concept_id> Eine Verknüpfung abrufen</li>
<li>&action=list_sets Zeige eine Liste von möglichen Datenkontextpräfixen und auf was sie sich beziehen</li>
<li>&action=get_associated&dm=<defined_meaning_id>&dc=<dataset_context_prefix> für eine DefinedMeaning in einem Kontext, zeige alle anderen</li>
<li>&action=help Hilfe anzeigen.</li>
</ul></p>',
	'ow_conceptmapping_uitext' => '<p>Mit Concept Mapping kann festgelegt werden, welche DefinedMeaning in einem Dataset mit anderen DefinedMeanings aus anderen Datasets identisch ist.</p>',
	'ow_conceptmapping_no_action_specified' => 'Die Aktion „$1“ wird nicht unterstützt.',
	'ow_dm_OK' => 'OK',
	'ow_dm_not_present' => 'nicht eingegeben',
	'ow_dm_not_found' => 'nicht in der Datenbank gefunden oder fehlerhaft',
	'ow_mapping_successful' => 'Alle mit [OK] markierten Felder wurden zugeordnet<br />',
	'ow_mapping_unsuccessful' => 'Es werden mindestens zwei DefinedMeanings zum Verknüpfen benötigt.',
	'ow_will_insert' => 'Folgendes wird eingesetzt:',
	'ow_contents_of_mapping' => 'Inhalte der Verknüpfung',
	'ow_available_contexts' => 'Verfügbare Kontexte',
	'ow_add_concept_link' => 'Link zu anderen Konzepten hinzufügen',
	'ow_concept_panel' => 'Konzeptschaltfläche',
	'ow_dm_badtitle' => 'Diese Seite weist nicht zu einer DefinedMeaning (Konzept). Bitte überprüfe die Webadresse.',
	'ow_dm_missing' => 'Diese Seite weist zu einer nicht existierenden DefinedMeaning (Konzept). Bitte überprüfe die Webadresse.',
	'ow_AddHint' => 'Neue Zeilen einfügen',
	'ow_AlternativeDefinition' => 'Alternative Definition',
	'ow_AlternativeDefinitions' => 'Alternative Definitionen',
	'ow_Annotation' => 'Annotation',
	'ow_ApproximateMeanings' => 'Ungefähre Bedeutungen',
	'ow_ClassAttributeAttribute' => 'Attribut',
	'ow_ClassAttributes' => 'Klassenattribute',
	'ow_ClassAttributeLevel' => 'Level',
	'ow_ClassAttributeType' => 'Typ',
	'ow_ClassMembership' => 'Klassenzugehörigkeit',
	'ow_Collection' => 'Sammlung',
	'ow_Collection_colon' => 'Sammlung:',
	'ow_CollectionMembership' => 'Sammlungszugehörigkeit',
	'ow_Definition' => 'Definition',
	'ow_DefinedMeaningAttributes' => 'Annotation',
	'ow_DefinedMeaning' => 'DefinedMeaning',
	'ow_DefinedMeaningReference' => 'DefinedMeaning',
	'ow_ExactMeanings' => 'Exakte Bedeutungen',
	'ow_Expression' => 'Ausdruck',
	'ow_ExpressionMeanings' => 'Ausdrucksbedeutungen',
	'ow_Expressions' => 'Ausdrücke',
	'ow_IdenticalMeaning' => 'Identische Bedeutung?',
	'ow_IncomingRelations' => 'Eingehende Relationen',
	'ow_GotoSource' => 'Gehe zur Quelle',
	'ow_Language' => 'Sprache',
	'ow_LevelAnnotation' => 'Annotation',
	'ow_OptionAttribute' => 'Eigenschaft',
	'ow_OptionAttributeOption' => 'Option',
	'ow_OptionAttributeOptions' => 'Optionen',
	'ow_OptionAttributeValues' => 'Optionswerte',
	'ow_OtherDefinedMeaning' => 'Andere DefinedMeaning',
	'ow_PopupAnnotation' => 'Annotation',
	'ow_Relations' => 'Relationen',
	'ow_RelationType' => 'Relationstyp',
	'ow_Remove' => 'Entfernen',
	'ow_RemoveHint' => 'Markiere zu entfernende Zeilen',
	'ow_Spelling' => 'Schreibweise',
	'ow_SuggestHint' => 'Klicke um die Auswahl zu ändern',
	'ow_Synonyms' => 'Synonyme',
	'ow_SynonymsAndTranslations' => 'Synonyme und Übersetzungen',
	'ow_Source' => 'Quelle',
	'ow_SourceIdentifier' => 'Quellenbezeichner',
	'ow_TextAttribute' => 'Eigenschaft',
	'ow_Text' => 'Text',
	'ow_TextAttributeValues' => 'Plaintext',
	'ow_TranslatedTextAttribute' => 'Eigenschaft',
	'ow_TranslatedText' => 'Übersetzter Text',
	'ow_TranslatedTextAttributeValue' => 'Text',
	'ow_TranslatedTextAttributeValues' => 'Übersetzbarer Text',
	'ow_LinkAttribute' => 'Eigenschaft',
	'ow_LinkAttributeValues' => 'Links',
	'ow_Property' => 'Eigenschaft',
	'ow_Value' => 'Wert',
	'ow_meaningsoftitle' => 'Bedeutungen von „$1“',
	'ow_meaningsofsubtitle' => '<em>Wikilink:</em> [[$1]]',
	'ow_Permission_denied' => '<h2>ERLAUBNIS VERWEIGERT</h2>',
	'ow_copy_no_action_specified' => 'Bitte lege eine Aktion fest.',
	'ow_copy_help' => 'Es ist keine Hilfe implementiert.',
	'ow_please_proved_dmid' => 'Deiner Eingabe fehlt „?dmid=<something>“ (dmid=Defined Meaning ID)<br />
Bitte kontaktiere den Serveradminstrator.',
	'ow_please_proved_dc1' => 'Deiner Eingabe fehlt „?dc1=<something>“ (dc1=dataset context 1, dataset to copy FROM)<br />
Bitte kontaktiere den Serveradminstrator.',
	'ow_please_proved_dc2' => 'Deiner Eingabe fehlt „?dc2=<something>“ (dc2=dataset context 2, dataset to copy TO) <br />
Bitte kontaktiere den Serveradminstrator.',
	'ow_copy_successful' => '<h2>Kopieren erfolgreich</h2>Deine Daten scheinen erfolgreich kopiert worden zu sein. Bitte vergiss nicht nochmals zu prüfen um sicherzugehen!',
	'ow_copy_unsuccessful' => '<h3>Kopieren nicht erfolgreich</h3> Es hat keine Kopieraktion stattgefunden.',
	'ow_no_action_specified' => '<h3>Es wurde keine Aktion angegeben</h3> Vielleicht kamst du direkt zu dieser Seite?',
	'ow_db_consistency_not_found' => '<h2>Fehler</h2>Die Datenbank ist nicht mehr konsistent. Wikidata kann keine gültigen Daten zu der ID finden. Bitte kontaktiere den Server-Administrator.',
	'ow_needs_xlation_title' => 'Ausdruck benötigt Übersetzung',
	'ow_needs_xlation_source_lang' => 'Quellsprache:',
	'ow_needs_xlation_dest_lang' => 'Zielsprache:',
	'ow_needs_xlation_no_dest_lang' => 'Bitte eine Zielsprache angeben.',
	'ow_show' => 'Einblenden',
	'ow_create' => 'Erstellen',
	'ow_collection_added' => '<strong>Sammlung $1 wurde hinzugefügt.</strong>',
	'ow_suggest_previous' => 'Vorherige',
	'ow_suggest_next' => 'Nächste',
	'ow_suggest_clear' => 'Leeren',
);

/** German (formal address) (Deutsch (Sie-Form))
 * @author Umherirrender
 */
$wdMessages['de-formal'] = array(
	'langman_not_allowed' => 'Sie haben nicht die Berechtigung die Spracheneinstellungen zu ändern.',
	'importlangnames_not_allowed' => 'Sie haben keine Berechtigung um Sprachennamen zu importieren.',
	'ow_noedit' => 'Sie haben nicht die Erlaubnis, Seiten im Dataset „$1“ zu bearbeiten.
Siehe [[{{MediaWiki:Ow editing policy url}}|unsere Richtlinien]].',
	'ow_dm_badtitle' => 'Diese Seite weist nicht zu einer DefinedMeaning (Konzept).
Bitte überprüfen Sie die Webadresse.',
	'ow_dm_missing' => 'Diese Seite weist zu einer nicht existierenden DefinedMeaning (Konzept).
Bitte überprüfen Sie die Webadresse.',
	'ow_copy_no_action_specified' => 'Bitte legen Sie eine Aktion fest.',
	'ow_copy_help' => 'Eines Tages können wir Ihnen helfen.',
	'ow_please_proved_dmid' => 'Ihrer Eingabe fehlt „?dmid=<something>“ (dmid=Defined Meaning ID)<br />
Bitte kontaktieren Sie den Serveradminstrator.',
	'ow_please_proved_dc1' => 'Ihrer Eingabe fehlt „?dc1=<something>“ (dc1=dataset context 1, dataset to copy FROM)<br />
Bitte kontaktieren Sie den Serveradminstrator.',
	'ow_please_proved_dc2' => 'Ihrer Eingabe fehlt „?dc2=<something>“ (dc2=dataset context 2, dataset to copy TO) <br />
Bitte kontaktieren Sie den Serveradminstrator.',
	'ow_copy_successful' => '<h2>Kopieren erfolgreich</h2>
Ihre Daten scheinen erfolgreich kopiert worden zu sein.
Bitte vergessen Sie nicht nochmals zu prüfen um sicherzugehen!',
	'ow_no_action_specified' => '<h3>Es wurde keine Aktion angegeben</h3>
Vielleicht kamen Sie direkt zu dieser Seite?',
);

/** Lower Sorbian (Dolnoserbski)
 * @author Michawiki
 */
$wdMessages['dsb'] = array(
	'languages' => 'Wikidata: Zastojnik rěcow',
	'langman_title' => 'Zastojnik rěcow',
	'langman_not_allowed' => 'Njamaš pšawo rěcne nastajenja změniś.',
	'langman_header' => 'Zapódaj rěcny kod a jogo engelske mě:',
	'langman_req_fields' => 'Ako rěcne mě tak teke kod ISO 639-3 stej trěbnej!',
	'langman_adding' => 'Rěc $1 z kodom $2 se pśidawa.',
	'langman_langname' => 'Mě rěcy:',
	'langman_iso639-3' => 'Kod ISO 639-3:',
	'langman_iso639-2' => 'Kod ISO 639-2:',
	'langman_wikimedia' => 'Wikimedijowy kod:',
	'langman_field_optional' => '(opcionalny)',
	'langman_addlang' => 'Rěc pśidaś',
	'importlangnames' => 'Wikidata: Rěcne mjenja importěrowaś',
	'importlangnames_title' => 'Rěcne mjenja importěrowaś',
	'importlangnames_not_allowed' => 'Njamaš pšawo rěcne mjenja importěrowaś.',
	'importlangnames_added' => 'Rěcne mjenja za "$1" pśidane.',
	'importlangnames_not_found' => '<strong>Žeden rěcny zapisk za "$1" namakany!</strong>',
	'datasearch' => 'Wikidata: Pytanje datow',
	'addcollection' => 'Wikidata: Zběrku pśidaś',
	'ow_save' => 'Składowaś',
	'ow_history' => 'Wersije/Awtory',
	'ow_datasets' => 'Wuběrk datoweje sajźby',
	'ow_noedit_title' => 'Žedne pšawo za wobźěłanje',
	'ow_noedit' => 'Njamaš pšawo boki w datowej sajźbje "$1" wobźěłaś.
Pšosym glědaj [[{{MediaWiki:Ow editing policy url}}|naše wobźěłowańske zasady]].',
	'ow_uipref_datasets' => 'Standardny naglěd:',
	'ow_uiprefs' => 'Wikidata',
	'ow_none_selected' => 'žedne wubrane',
	'ow_conceptmapping_uitext' => '<p>Concept Mapping zmóžnja identificěrowaś, kótary definěrowany wóznam jo identiski z definěrowanym wóznamom w drugich datowych sajźbach.</p>',
	'ow_conceptmapping_no_action_specified' => 'Akcija "$1" se njepódpěra.',
	'ow_dm_OK' => 'W pórěźe',
	'ow_dm_not_present' => 'njezapódany',
	'ow_dm_not_found' => 'w datowej bance njenamakany abo njewuraźony',
	'ow_mapping_successful' => 'Wše póla markěrowane z [W pórěźe] su se zwobraznili<br />',
	'ow_mapping_unsuccessful' => 'Za wótkazowanje nanejmjenjej dwa definěrowanej wóznama stej trěbnej',
	'ow_will_insert' => 'Slědujuce buźo se zasajźiś:',
	'ow_contents_of_mapping' => 'Wopśimjeśe zwobraznjenja',
	'ow_available_contexts' => 'K dispoziciji stojece konteksty',
	'ow_add_concept_link' => 'Wótkaz k drugim zapśimjeśam pśidaś',
	'ow_concept_panel' => 'Płonina zapśimjeśow',
	'ow_dm_badtitle' => 'Toś ten bok njepokazujo na DefinedMeaning (zapśimjeśe).
Pšosym pśekontrolěruj webadresu.',
	'ow_dm_missing' => 'Toś ten bok zda se na njeeksistěrujucy DefinedMeaning (zapśimjeśe) pokazaś.
Pšosym pśekontrolěruj webadresu.',
	'ow_AddHint' => 'Zapódaj nowe smugi, kótarež maju se pśidaś',
	'ow_AlternativeDefinition' => 'Alternatiwna definicija',
	'ow_AlternativeDefinitions' => 'Alternatiwne definicije',
	'ow_Annotation' => 'Anotacija',
	'ow_ApproximateMeanings' => 'Pśibližne wóznamy',
	'ow_ClassAttributeAttribute' => 'Atribut',
	'ow_ClassAttributes' => 'Klasowe atributy',
	'ow_ClassAttributeLevel' => 'Niwow',
	'ow_ClassAttributeType' => 'Typ',
	'ow_ClassMembership' => 'Klasowe cłonkojstwo',
	'ow_Collection' => 'Zběrka',
	'ow_Collection_colon' => 'Zběrka:',
	'ow_CollectionMembership' => 'Cłonkojstwo w zběrce',
	'ow_Definition' => 'Definicija',
	'ow_DefinedMeaningAttributes' => 'Anotacija',
	'ow_DefinedMeaning' => 'Definěrowany wóznam',
	'ow_DefinedMeaningReference' => 'Definěrowany wóznam',
	'ow_ExactMeanings' => 'Eksaktne wóznamy',
	'ow_Expression' => 'Wuraz',
	'ow_ExpressionMeanings' => 'Wurazowe wóznamy',
	'ow_Expressions' => 'Wuraze',
	'ow_IdenticalMeaning' => 'Identiski wóznam?',
	'ow_IncomingRelations' => 'Dochadajuce póśěgi',
	'ow_GotoSource' => 'Źi k žrědłoju',
	'ow_Language' => 'Rěc',
	'ow_LevelAnnotation' => 'Anotacija',
	'ow_OptionAttribute' => 'Kakosć',
	'ow_OptionAttributeOption' => 'Opcija',
	'ow_OptionAttributeOptions' => 'Opcije',
	'ow_OptionAttributeValues' => 'Opciske gódnoty',
	'ow_OtherDefinedMeaning' => 'Drugi definěrowany wóznam',
	'ow_PopupAnnotation' => 'Anotacija',
	'ow_Relations' => 'Póśěgi',
	'ow_RelationType' => 'Póśěgowy typ',
	'ow_Remove' => 'Wótpóraś',
	'ow_RemoveHint' => 'Smugi markěrowaś, kótarež maju se wótpóraś',
	'ow_Spelling' => 'Pšawopis',
	'ow_SuggestHint' => 'Klikni, aby změnił wuběrk',
	'ow_Synonyms' => 'Synonymy',
	'ow_SynonymsAndTranslations' => 'Synonymy a pśełožki',
	'ow_Source' => 'Žrědło',
	'ow_SourceIdentifier' => 'Žrědłowy identifikator',
	'ow_TextAttribute' => 'Kakosć',
	'ow_Text' => 'Tekst',
	'ow_TextAttributeValues' => 'Lutne teksty',
	'ow_TranslatedTextAttribute' => 'Kakosć',
	'ow_TranslatedText' => 'Pśestajony tekst',
	'ow_TranslatedTextAttributeValue' => 'Tekst',
	'ow_TranslatedTextAttributeValues' => 'Pśełožujobny tekst',
	'ow_LinkAttribute' => 'Kakosć',
	'ow_LinkAttributeValues' => 'Wótkaze',
	'ow_Property' => 'Kakosć',
	'ow_Value' => 'Gódnota',
	'ow_meaningsoftitle' => 'Wóznamy zapśimjeśa "$1"',
	'ow_meaningsofsubtitle' => '<em>Wikijowy wótkaz:</em> [[$1]]',
	'ow_Permission_denied' => '<h2>Dowólenje wótpokazane</h2>',
	'ow_copy_no_action_specified' => 'Pšosym pódaj akciju',
	'ow_copy_help' => 'Pomoc hyšći njejo implementěrowana.',
	'ow_please_proved_dmid' => 'Zda se, až twójo zapódaśe njama "?dmid=<ID>" (dmid=Defined Meaning ID)<br />
Pšosym staj se ze serwerowym administratorom do zwiska.',
	'ow_needs_xlation_title' => 'Wuraze, kótarež maju se pśełožowaś',
	'ow_needs_xlation_source_lang' => 'Žrědłowa rěc:',
	'ow_needs_xlation_dest_lang' => 'Celowa rěc:',
	'ow_needs_xlation_no_dest_lang' => 'Pšosym pódaj celowu rěc.',
	'ow_show' => 'Pokazaś',
	'ow_create' => 'Napóraś',
	'ow_collection_added' => '<strong>Zběrka $1 pśidana.</strong>',
	'ow_suggest_previous' => 'Pjerwjejšny',
	'ow_suggest_next' => 'Pśiducy',
	'ow_suggest_clear' => 'Wuprozniś',
);

/** Greek (Ελληνικά)
 * @author Consta
 */
$wdMessages['el'] = array(
	'datasearch' => 'Βικιδεδομένα: Αναζήτηση δεδομένων',
	'langman_title' => 'Διαχειριστής γλώσσας',
	'languages' => 'Wikidata: Διαχειριστής γλώσσας',
	'ow_save' => 'Αποθηκεύστε',
	'ow_uiprefs' => 'Βικιδεδομένα',
	'ow_Annotation' => 'Σχολιασμός',
	'ow_ClassAttributeLevel' => 'Επίπεδο',
	'ow_ClassAttributeType' => 'Τύπος',
	'ow_Collection' => 'Συλλογή',
	'ow_DefinedMeaningAttributes' => 'Σχολιασμός',
	'ow_Language' => 'Γλώσσα',
	'ow_LevelAnnotation' => 'Σχολιασμός',
	'ow_OptionAttribute' => 'Ιδιότητα',
	'ow_OptionAttributeOption' => 'Επιλογή',
	'ow_OptionAttributeOptions' => 'Επιλογές',
	'ow_PopupAnnotation' => 'Σχολιασμός',
	'ow_Relations' => 'Σχέσεις',
	'ow_Synonyms' => 'Συνώνυμα',
	'ow_SynonymsAndTranslations' => 'Συνώνυμα και μεταφράσεις',
	'ow_Source' => 'Πηγή',
	'ow_TextAttribute' => 'Ιδιότητα',
	'ow_Text' => 'Κείμενο',
	'ow_TranslatedTextAttribute' => 'Ιδιότητα',
	'ow_TranslatedText' => 'Μεταφρασμένο κείμενο',
	'ow_TranslatedTextAttributeValue' => 'Κείμενο',
	'ow_LinkAttribute' => 'Ιδιότητα',
	'ow_LinkAttributeValues' => 'Σύνδεσμοι',
	'ow_Property' => 'Ιδιότητα',
);

/** Esperanto (Esperanto)
 * @author Yekrats
 */
$wdMessages['eo'] = array(
	'languages' => 'Vikidatenoj: Lingva administrilo',
	'langman_title' => 'Lingva administrilo',
	'ow_save' => 'Konservi',
	'ow_history' => 'Historio',
	'ow_datasets' => 'Datumara selekto',
	'ow_noedit_title' => 'Neniu permeso por redakti',
	'ow_noedit' => 'Vi ne estas permesita redakti paĝojn en la datenaro "$1".
Bonvolu legi [[{{MediaWiki:Ow editing policy url}}|nian redaktadan regularon]].',
	'ow_uipref_datasets' => 'Defaŭlta vido',
	'ow_uiprefs' => 'Vikidatenoj',
	'ow_none_selected' => 'Nenio elektita',
	'ow_conceptmapping_no_action_specified' => 'Bedaŭrinde, mi ne scias kiel "$1".',
	'ow_dm_OK' => 'Ek!',
	'ow_dm_not_present' => 'ne enigita',
	'ow_dm_not_found' => 'ne trovis en datenbazo aŭ estis misformita',
	'ow_will_insert' => 'Enmetos la jenajn:',
	'ow_contents_of_mapping' => 'Enhavo de mapado',
	'ow_available_contexts' => 'Haveblaj kuntekstoj',
	'ow_add_concept_link' => 'Aldoni ligilon al aliaj konceptoj',
	'ow_AlternativeDefinition' => 'Alternativa difino',
	'ow_AlternativeDefinitions' => 'Alternativaj difinoj',
	'ow_Annotation' => 'Prinotado',
	'ow_ApproximateMeanings' => 'Similaj signifoj',
	'ow_ClassAttributeAttribute' => 'Atribuo',
	'ow_ClassAttributes' => 'Klasaj atribuoj',
	'ow_ClassAttributeLevel' => 'Nivelo',
	'ow_ClassAttributeType' => 'Speco',
	'ow_ClassMembership' => 'Klasa membreco',
	'ow_Collection' => 'Kolekto',
	'ow_CollectionMembership' => 'Membreco de kolekto',
	'ow_Definition' => 'Difino',
	'ow_DefinedMeaningAttributes' => 'Prinotado',
	'ow_DefinedMeaning' => 'Difinita signifo',
	'ow_DefinedMeaningReference' => 'Difinita signifo',
	'ow_ExactMeanings' => 'Precizaj signifoj',
	'ow_Expression' => 'Esprimo',
	'ow_ExpressionMeanings' => 'Esprimaj signifoj',
	'ow_Expressions' => 'Esprimoj',
	'ow_IdenticalMeaning' => 'Identa signifo?',
	'ow_IncomingRelations' => 'Enigantaj rilatoj',
	'ow_GotoSource' => 'Iri al fonto',
	'ow_Language' => 'Lingvo',
	'ow_LevelAnnotation' => 'Prinotado',
	'ow_OptionAttribute' => 'Eco',
	'ow_OptionAttributeOption' => 'Opcio',
	'ow_OptionAttributeOptions' => 'Preferoj',
	'ow_OptionAttributeValues' => 'Valutoj de opcioj',
	'ow_OtherDefinedMeaning' => 'Alia difinita signifo',
	'ow_PopupAnnotation' => 'Prinotado',
	'ow_Relations' => 'Rilatoj',
	'ow_RelationType' => 'Rilata tipo',
	'ow_Spelling' => 'Literumado',
	'ow_Synonyms' => 'Sinonimoj',
	'ow_SynonymsAndTranslations' => 'Sinonimoj kaj tradukoj',
	'ow_Source' => 'Fonto',
	'ow_SourceIdentifier' => 'Identigilo de fontoj',
	'ow_TextAttribute' => 'Eco',
	'ow_Text' => 'Teksto',
	'ow_TextAttributeValues' => 'Ordinaraj tekstoj',
	'ow_TranslatedTextAttribute' => 'Eco',
	'ow_TranslatedText' => 'Tradukita teksto',
	'ow_TranslatedTextAttributeValue' => 'Teksto',
	'ow_TranslatedTextAttributeValues' => 'Tradukeblaj tekstoj',
	'ow_LinkAttribute' => 'Eco',
	'ow_LinkAttributeValues' => 'Ligiloj',
	'ow_Property' => 'Eco',
	'ow_Value' => 'Valuto',
	'ow_meaningsoftitle' => 'Signifoj de "$1"',
	'ow_meaningsofsubtitle' => '<em>Vikiligilo:</em> [[$1]]',
	'ow_Permission_denied' => '<h2>PERMESO NEITA</h2>',
	'ow_copy_no_action_specified' => 'Bonvolu specifigi agon',
	'ow_copy_help' => 'Iutage, ne eble helpos vin.',
	'ow_copy_successful' => '<h2>Kopio sukcesis</h2>
Viaj datenoj verŝajne estis kopiitaj sukcese.
Ne forgesu rekontroli por certigi!',
	'ow_copy_unsuccessful' => '<h3>Kopio malsukcesis</h3>
Neniu kopia operacio okazis.',
	'ow_no_action_specified' => '<h3>Neniu ago estis specifigita</h3>
Ĉu eble vi alvenis ĉi tiun paĝon rekte? Norme vi ne bezonus esti ĉi tie.',
);

/** Spanish (Español)
 * @author Ascánder
 * @author Kobazulo
 * @author Sanbec
 */
$wdMessages['es'] = array(
	'languages' => 'Wikidata: Gestor de lenguas',
	'langman_title' => 'Gestor de lenguas',
	'datasearch' => 'Wikidata: Búsqueda de datos',
	'ow_save' => 'Guardar',
	'ow_history' => 'Historial',
	'ow_datasets' => 'Selección de la base',
	'ow_noedit_title' => 'No se permite modificar',
	'ow_noedit' => 'No tienes permiso de modificar las páginas de la base "$1". Mira [[{{MediaWiki:Ow editing policy url}}|nuestras reglas de modificación]].',
	'ow_uipref_datasets' => 'Vista por defecto',
	'ow_uiprefs' => 'Wikidata',
	'ow_none_selected' => 'No hay nada seleccionado',
	'ow_conceptmapping_help' => '<p>acciones posibles: <ul>
<li>&action=insert&<data_context_prefix>=<defined_id>&...  insertar una correspondencia</li>
<li>&action=get&concept=<concept_id>  leer una correspondencia almacenada</li>
<li>&action=list_sets  devuelve una lista de posibles prefijos de contexto de datos y a qué se pueden referir</li>
<li>&action=get_associated&dm=<defined_meaning_id>&dc=<dataset_context_prefix> para un sentido definido en un concepto, devuelve todos los otros</li>
<li>&action=help  Muestra un mensaje de ayuda.</li>
</ul></p>',
	'ow_conceptmapping_uitext' => '<p>Ligar los conceptos permite identificar los sentidos definidos en un juego de datos que son idénticos a sentidos definidos en otros juegos de datos.</p>',
	'ow_conceptmapping_no_action_specified' => 'La acción «$1» no está soportada.',
	'ow_dm_OK' => 'Aceptar',
	'ow_dm_not_present' => 'ausente',
	'ow_dm_not_found' => 'No encontrado en la base de datos o con errores de representación',
	'ow_mapping_successful' => 'Todos los campos marcados con [OK] fueron enlazados',
	'ow_mapping_unsuccessful' => 'Se necesitan al menos dos significados definidos antes de poderlos enlazar.',
	'ow_will_insert' => 'Insertará el texto siguiente:',
	'ow_contents_of_mapping' => 'Contenido del mapeo',
	'ow_available_contexts' => 'Conceptos disponibles',
	'ow_add_concept_link' => 'Enlazar otros conceptos',
	'ow_concept_panel' => 'Tablero de conceptos',
	'ow_dm_badtitle' => 'Esta pagina no enlaza ningún SentidoDefinido (concepto). Verifica el RUL.',
	'ow_dm_missing' => 'Esta página se dirige hacia un SentidoDefinido (concepto) inexistente. Verifica el URL.',
	'ow_AlternativeDefinition' => 'Definición alterna',
	'ow_AlternativeDefinitions' => 'Definiciones alternas',
	'ow_Annotation' => 'Anotación',
	'ow_ApproximateMeanings' => 'Sentidos aproximados',
	'ow_ClassAttributeAttribute' => 'Atributo',
	'ow_ClassAttributes' => 'Atributos de clase',
	'ow_ClassAttributeLevel' => 'Nivel',
	'ow_ClassAttributeType' => 'Tipo',
	'ow_ClassMembership' => 'Clases',
	'ow_Collection' => 'Compilación',
	'ow_CollectionMembership' => 'Colecciones',
	'ow_Definition' => 'Definición',
	'ow_DefinedMeaningAttributes' => 'Notas',
	'ow_DefinedMeaning' => 'Sentido definido',
	'ow_DefinedMeaningReference' => 'Sentido definido',
	'ow_ExactMeanings' => 'Sentidos exactos',
	'ow_Expression' => 'Expresión',
	'ow_ExpressionMeanings' => 'Significados de expresión',
	'ow_Expressions' => 'Expresiones',
	'ow_IdenticalMeaning' => '¿Idéntico sentido?',
	'ow_IncomingRelations' => 'Relaciones entrantes',
	'ow_GotoSource' => 'Ir a la fuente',
	'ow_Language' => 'Idioma',
	'ow_LevelAnnotation' => 'Nota',
	'ow_OptionAttribute' => 'Propiedad',
	'ow_OptionAttributeOption' => 'Opción',
	'ow_OptionAttributeOptions' => 'Opciones',
	'ow_OptionAttributeValues' => 'Valores',
	'ow_OtherDefinedMeaning' => 'Otro sentido definido',
	'ow_PopupAnnotation' => 'Nota',
	'ow_Relations' => 'Relaciones',
	'ow_RelationType' => 'Tipo de relación',
	'ow_Spelling' => 'Ortografía',
	'ow_Synonyms' => 'Sinónimos',
	'ow_SynonymsAndTranslations' => 'Sinónimos y traducciones',
	'ow_Source' => 'Fuente',
	'ow_SourceIdentifier' => 'Fuente',
	'ow_TextAttribute' => 'Propiedad',
	'ow_Text' => 'Texto',
	'ow_TextAttributeValues' => 'Textos libres',
	'ow_TranslatedTextAttribute' => 'Propiedad',
	'ow_TranslatedText' => 'Texto traducido',
	'ow_TranslatedTextAttributeValue' => 'Texto',
	'ow_TranslatedTextAttributeValues' => 'Textos traducibles',
	'ow_LinkAttribute' => 'Propiedad',
	'ow_LinkAttributeValues' => 'Enlaces',
	'ow_Property' => 'Propiedad',
	'ow_Value' => 'Valor',
	'ow_meaningsoftitle' => 'Significado de "$1"',
	'ow_meaningsofsubtitle' => '<em>Wiki enlace:</em> [[$1]]',
	'ow_Permission_denied' => '<h2>PERMISO NEGADO</h2>',
	'ow_copy_no_action_specified' => 'Especifique una acción por favor',
	'ow_copy_help' => 'La ayuda no está implementada aún.',
	'ow_please_proved_dmid' => 'Falta un ?dmid=<...> (dmid=Id de SentidoDefinido)
Favor contactar al administrador.',
	'ow_please_proved_dc1' => 'Falta un ?dc1=<...> (dc1=contexto de la base DESDE la cual se copia)<br />Contacta a un administrador.',
	'ow_please_proved_dc2' => 'Falta un ?dc2=<...> (dc1=Contexto de la segunda base, hacia la cual se copia)
Favor contactar al administrador.',
	'ow_copy_successful' => '<h2>Copia exitosa</h2>Sus datos han sido copiados exitosamente (Favor verificar de todas formas).',
	'ow_copy_unsuccessful' => '<h3>Copia fallida</h3> La copia no se realizó.',
	'ow_no_action_specified' => '<h3>No se especificó ninguna acción</h3> ¿Puede que hayas llegado a esta página directamente? Normalmente, no necesitas venir hasta aquí.',
	'ow_db_consistency_not_found' => '<h2>Error</h2>
Hay un problema con la consistencia de esta base de datos, wikidata no puede encontrar datos válidos conectados con este ID de sentido definido.
Puede que esté perdido.
Contacta por favor el operador o el administrador del servicio.',
);

/** Estonian (Eesti)
 * @author Avjoska
 */
$wdMessages['et'] = array(
	'datasearch' => 'Wikiandmed: andmeotsing',
	'langman_title' => 'Keele haldaja',
	'languages' => 'Wikiandmed: keele haldaja',
	'ow_save' => 'Salvesta',
	'ow_history' => 'Ajalugu',
	'ow_none_selected' => 'Midagi ei valitud',
	'ow_dm_OK' => 'OK',
	'ow_dm_not_present' => 'ei ole sisestatud',
	'ow_ApproximateMeanings' => 'Ligilähedased tähendused',
	'ow_ClassAttributeAttribute' => 'Tunnus',
	'ow_ClassAttributes' => 'Klassi tunnused',
	'ow_ClassAttributeLevel' => 'Tase',
	'ow_ClassAttributeType' => 'Tüüp',
	'ow_ClassMembership' => 'Klassi liikmelisus',
	'ow_Spelling' => 'Õigekiri',
	'ow_Synonyms' => 'Sünonüümid',
	'ow_SynonymsAndTranslations' => 'Sünonüümid ja tõlked',
	'ow_Source' => 'Allikas',
	'ow_Text' => 'Tekst',
	'ow_TranslatedText' => 'Tõlgitud tekst',
	'ow_TranslatedTextAttributeValue' => 'Tekst',
	'ow_TranslatedTextAttributeValues' => 'Tõlgitavad tekstid',
	'ow_LinkAttribute' => 'Omand',
	'ow_LinkAttributeValues' => 'Lingid',
	'ow_Property' => 'Omand',
	'ow_Value' => 'Väärtus',
	'ow_meaningsoftitle' => '"$1" tähendus',
);

/** Basque (Euskara)
 * @author An13sa
 * @author Kobazulo
 * @author Pi
 * @author Theklan
 */
$wdMessages['eu'] = array(
	'languages' => 'WIkidata: Hizkuntza administraria',
	'langman_title' => 'Hizkuntza kudeatzailea',
	'datasearch' => 'Wikidata:Datu bilaketa',
	'ow_save' => 'Gorde',
	'ow_history' => 'Historia',
	'ow_datasets' => 'Data bilduma',
	'ow_noedit_title' => 'Ez da baimenik behar aldatzeko',
	'ow_noedit' => 'Ez duzu baimenik "$1" datubilduman orrialdeak aldatzeko.
Mesedez ikus [[{{MediaWiki:Ow editing policy url}}|gure aldatzeko arauak]].',
	'ow_uipref_datasets' => 'Berezko ikuspegia',
	'ow_uiprefs' => 'Wikidatua',
	'ow_none_selected' => 'Bat ere ez da aukeratu',
	'ow_conceptmapping_no_action_specified' => '"$1" ekintza ez da onartzen.',
	'ow_dm_OK' => 'Ondo',
	'ow_dm_not_present' => 'ez da sartu',
	'ow_dm_not_found' => 'ez da datubasean aurkitu edo gaizki formateaturik dago',
	'ow_mapping_successful' => '[OK] marka duten esparru guztiak mapeatu dira<br />',
	'ow_mapping_unsuccessful' => 'Gutxienez definitutako bi esanahi izan behar dituzu nik horiek lotu aurretik.',
	'ow_will_insert' => 'Honakoa sartuko dut:',
	'ow_contents_of_mapping' => 'Mapeatze edukiak',
	'ow_available_contexts' => 'Dauden kontestuak',
	'ow_add_concept_link' => 'Gehitu lotura beste kontzeptu batzuei',
	'ow_concept_panel' => 'Kontzeptu panela',
	'ow_dm_badtitle' => 'Orrialde honek ez du DefinedMeaning (kontzeptu) bakar bat ere lotzen.
Ziurtatu ezazu berriro web helbidea, mesedez.',
	'ow_AlternativeDefinition' => 'Definizio alternatiboa',
	'ow_AlternativeDefinitions' => 'Definizio alternatiboak',
	'ow_Annotation' => 'Anotazioa',
	'ow_ApproximateMeanings' => 'Gutxi gora beherako esanahiak',
	'ow_ClassAttributeAttribute' => 'Atributoa',
	'ow_ClassAttributes' => 'Klase atributoak',
	'ow_ClassAttributeLevel' => 'Maila',
	'ow_ClassAttributeType' => 'Mota',
	'ow_ClassMembership' => 'Klase kidetza',
	'ow_Collection' => 'Biltegia',
	'ow_CollectionMembership' => 'Bilduma kidetza',
	'ow_Definition' => 'Definizioa',
	'ow_DefinedMeaningAttributes' => 'Anotazioa',
	'ow_DefinedMeaning' => 'Definitutako esanahia',
	'ow_DefinedMeaningReference' => 'Definitutako esanahia',
	'ow_ExactMeanings' => 'Esanahi zehatza',
	'ow_Expression' => 'Esamoldea',
	'ow_ExpressionMeanings' => 'Esamoldearen esanahiak',
	'ow_Expressions' => 'Esanahiak',
	'ow_IdenticalMeaning' => 'Bi esanahi zehazki berdinak?',
	'ow_IncomingRelations' => 'Sartzen diren erlazioak',
	'ow_GotoSource' => 'Iturburura joan',
	'ow_Language' => 'Hizkuntza',
	'ow_LevelAnnotation' => 'Anotazioak',
	'ow_OptionAttribute' => 'Propietateak',
	'ow_OptionAttributeOption' => 'Aukera',
	'ow_OptionAttributeOptions' => 'Aukerak',
	'ow_OptionAttributeValues' => 'Aukeren balioak',
	'ow_OtherDefinedMeaning' => 'Beste esanahi definituak',
	'ow_PopupAnnotation' => 'Anotazioa',
	'ow_Relations' => 'Harremanak',
	'ow_RelationType' => 'Harreman motak',
	'ow_Spelling' => 'Letreiatu',
	'ow_Synonyms' => 'Sinonimoak',
	'ow_SynonymsAndTranslations' => 'Sinonimoak eta itzulpenak',
	'ow_Source' => 'Jatorria',
	'ow_SourceIdentifier' => 'Jatorriaren identifikazioa',
	'ow_TextAttribute' => 'Ezaugarria',
	'ow_Text' => 'Testua',
	'ow_TextAttributeValues' => 'Testu lauak',
	'ow_TranslatedTextAttribute' => 'Ezaugarria',
	'ow_TranslatedText' => 'Itzulitako testua',
	'ow_TranslatedTextAttributeValue' => 'Testua',
	'ow_TranslatedTextAttributeValues' => 'Itzul daitezkeen testuak',
	'ow_LinkAttribute' => 'Ezaugarria',
	'ow_LinkAttributeValues' => 'Loturak',
	'ow_Property' => 'Ezaugarria',
	'ow_Value' => 'Balioa',
	'ow_meaningsoftitle' => '"$1"en esanahiak',
	'ow_meaningsofsubtitle' => '<em>Wiki lotura:</em> [[$1]]',
	'ow_Permission_denied' => '<h2>Baimena ukatua</h2>',
	'ow_copy_no_action_specified' => 'Zehaztu ezazu ekintza bat, mesedez',
	'ow_copy_help' => 'Sentitzen dugu, oraindik ez dugu laguntza abian jarri.',
	'ow_copy_successful' => '<h2>Behar bezala kopiatu da</h2>
Dirudienez zure datuak behar bezala kopiatu dira.
Berriz egiaztatzea ez ahaztu ziurtatzeko!',
	'ow_db_consistency_not_found' => '<h2>Errorea</h2>
Errore bat dago datu-base koherentziarekin, wikidata ez da zehazturiko esanahi IDarekin konektaturiko baliozko daturik aurkitzeko gai.
Galdu egingo ziren.
Mesedez harremanetan ipini zerbitzari operadore edo administratzailearekin.',
);

/** Persian (فارسی)
 * @author Huji
 * @author Mardetanha
 */
$wdMessages['fa'] = array(
	'langman_title' => 'مدیریت زبان',
	'ow_save' => 'ذخیره',
	'ow_history' => 'تاریخچه',
	'ow_noedit_title' => 'شما اجازه ویرایش ندارید',
	'ow_none_selected' => 'هیچ‌کدام انتخاب نشده‌اند',
	'ow_dm_not_present' => 'وارد نشده',
	'ow_AlternativeDefinition' => 'معنی دیگر',
	'ow_AlternativeDefinitions' => 'معانی دیگر',
	'ow_Annotation' => 'یادداشت',
	'ow_ApproximateMeanings' => 'معانی حدودی',
	'ow_ClassAttributeAttribute' => 'صفت',
	'ow_ClassAttributeLevel' => 'سطح',
	'ow_ClassAttributeType' => 'نوع',
	'ow_Definition' => 'تعریف',
	'ow_DefinedMeaningAttributes' => 'یادداشت',
	'ow_DefinedMeaning' => 'معنی تعریف شده',
	'ow_DefinedMeaningReference' => 'معنی تعریف شده',
	'ow_ExactMeanings' => 'معانی دقیق',
	'ow_Expression' => 'اصطلاح',
	'ow_ExpressionMeanings' => 'معانی اصطلاح',
	'ow_Expressions' => 'اصطلاحات',
	'ow_IdenticalMeaning' => 'هم‌‌معنی؟',
	'ow_GotoSource' => 'به منبع بروید',
	'ow_Language' => 'زبان',
	'ow_LevelAnnotation' => 'یادداشت',
	'ow_OptionAttribute' => 'خاصیت',
	'ow_OptionAttributeOption' => 'گزینه',
	'ow_OptionAttributeOptions' => 'گزینه‌ها',
	'ow_PopupAnnotation' => 'یادداشت',
	'ow_Relations' => 'روابط',
	'ow_RelationType' => 'نوع رابطه',
	'ow_Spelling' => 'املا',
	'ow_Synonyms' => 'مترادف‌ها',
	'ow_Source' => 'منبع',
	'ow_TextAttribute' => 'خاصیت',
	'ow_Text' => 'متن',
	'ow_TextAttributeValues' => 'متون ساده',
	'ow_TranslatedTextAttribute' => 'خاصیت',
	'ow_TranslatedTextAttributeValue' => 'متن',
	'ow_TranslatedTextAttributeValues' => 'متن‌های ترجمه شدنی',
	'ow_LinkAttribute' => 'خاصیت',
	'ow_LinkAttributeValues' => 'پیوندها',
	'ow_Property' => 'خاصیت',
	'ow_Value' => 'ارزش',
);

/** Finnish (Suomi)
 * @author Crt
 * @author Mobe
 * @author Nike
 * @author Silvonen
 * @author Str4nd
 */
$wdMessages['fi'] = array(
	'languages' => 'Wikidata: kielten hallinta',
	'langman_title' => 'Kielten hallinta',
	'datasearch' => 'Wikidata: tiedon haku',
	'ow_save' => 'Tallenna',
	'ow_history' => 'Historia',
	'ow_datasets' => 'Tietojoukon valinta',
	'ow_noedit_title' => 'Ei muokkausoikeutta',
	'ow_noedit' => 'Sinulla ei ole muokkausoikeutta tietojoukon $1 sivuihin.
Lisätietoja on [[{{MediaWiki:Ow editing policy url}}|muokkauskäytännöistä]].',
	'ow_uipref_datasets' => 'Oletusnäkymä',
	'ow_uiprefs' => 'Wikidata',
	'ow_none_selected' => 'Ei yhtään valittu',
	'ow_conceptmapping_no_action_specified' => 'Tuntematon toiminto: $1.',
	'ow_dm_OK' => 'OK',
	'ow_dm_not_present' => 'ei tallennettu',
	'ow_dm_not_found' => 'ei löydy tietokannasta tai väärin muotoiltu',
	'ow_will_insert' => 'Lisätään seuraavat:',
	'ow_AlternativeDefinition' => 'Vaihtoehtoinen määritelmä',
	'ow_AlternativeDefinitions' => 'Vaihtoehtoiset määritelmät',
	'ow_Annotation' => 'Annotaatiot',
	'ow_ClassAttributeAttribute' => 'Ominaisuus',
	'ow_ClassAttributes' => 'Luokkaominaisuudet',
	'ow_ClassAttributeLevel' => 'Taso',
	'ow_ClassAttributeType' => 'Tyyppi',
	'ow_Collection' => 'Kokoelma',
	'ow_Definition' => 'Määritelmä',
	'ow_DefinedMeaningAttributes' => 'Huomautus',
	'ow_ExactMeanings' => 'Tarkat merkityset',
	'ow_Expression' => 'Ilmaisu',
	'ow_Expressions' => 'Ilmaisut',
	'ow_IdenticalMeaning' => 'Identtinen merkitys',
	'ow_Language' => 'Kieli',
	'ow_LevelAnnotation' => 'Annotaatio',
	'ow_OptionAttribute' => 'Ominaisuus',
	'ow_OptionAttributeOptions' => 'Asetukset',
	'ow_Spelling' => 'Kirjoitusasu',
	'ow_SynonymsAndTranslations' => 'Synonyymit ja käännökset',
	'ow_Source' => 'Lähde',
	'ow_SourceIdentifier' => 'Lähdetunnus',
	'ow_TextAttribute' => 'Ominaisuus',
	'ow_Text' => 'Teksti',
	'ow_TranslatedTextAttribute' => 'Ominaisuus',
	'ow_TranslatedText' => 'Käännetty teksti',
	'ow_TranslatedTextAttributeValue' => 'Teksti',
	'ow_TranslatedTextAttributeValues' => 'Käännettävä teksti',
	'ow_LinkAttribute' => 'Ominaisuus',
	'ow_LinkAttributeValues' => 'Linkit',
	'ow_Property' => 'Ominaisuus',
	'ow_Value' => 'Arvo',
	'ow_meaningsofsubtitle' => '<em>Wikilinkki:</em> [[$1]]',
	'ow_Permission_denied' => '<h2>Käyttö estetty</h2>',
);

/** French (Français)
 * @author Crochet.david
 * @author Grondin
 * @author IAlex
 * @author Meithal
 * @author Sherbrooke
 * @author Urhixidur
 */
$wdMessages['fr'] = array(
	'languages' => 'Wikidata: Gestion des langues',
	'langman_title' => 'Gestion des langues',
	'langman_not_allowed' => "Vous n'avez pas la permission de modifier les paramètres des langues.",
	'langman_header' => 'Entrez le code de langue ainsi que son nom anglais ci-dessous :',
	'langman_req_fields' => 'Le nom de langue ainsi que son code ISO 639-3 sont requis !',
	'langman_adding' => 'La langue $1 avec la clé $2 a été ajoutée.',
	'langman_langname' => 'Nom de la langue :',
	'langman_iso639-3' => 'Code ISO 639-3 :',
	'langman_iso639-2' => 'Code ISO 639-2 :',
	'langman_wikimedia' => 'Code de Wikimedia :',
	'langman_field_optional' => '(optionnel)',
	'langman_addlang' => 'Ajouter la langue',
	'importlangnames' => 'Wikidata : Importer les noms des langues',
	'importlangnames_title' => 'Importer le nom des langues',
	'importlangnames_not_allowed' => "Vous n'avez pas la permission d'importer le nom des langues.",
	'importlangnames_added' => 'Nom de langues pour « $1 » ajoutés.',
	'importlangnames_not_found' => "<strong>Aucune entrée de langue n'a été trouvée pour « $1 » !</strong>",
	'datasearch' => 'Wikidata: Recherche de données',
	'addcollection' => 'Wikidata : Ajouter une collection',
	'ow_save' => 'Sauvegarder',
	'ow_history' => 'Historique',
	'ow_datasets' => 'Sélection des données définies',
	'ow_noedit_title' => "Aucune permission d'éditer.",
	'ow_noedit' => "Vous n'êtes pas autorisé d'éditer les pages dans les données préétablies « $1 ».
Veuillez voir [[{{MediaWiki:Ow editing policy url}}|nos règles d'édition]].",
	'ow_uipref_datasets' => 'Vue par défaut :',
	'ow_uiprefs' => 'Données wiki',
	'ow_none_selected' => 'Aucune sélection',
	'ow_conceptmapping_help' => '<p>actions possibles : <ul>
<li>&action=insert&<data_context_prefix>=<defined_id>&...  insérer une correspondance</li>
<li>&action=get&concept=<concept_id>  revoir une correspondance</li>
<li>&action=list_sets  retourner une liste des préfixes de contextes possibles et à quoi ils réfèrent.</li>
<li>&action=get_associated&dm=<defined_meaning_id>&dc=<dataset_context_prefix> pour une définition d’un concept, retourner toutes les autres.</li>
<li>&action=help  Voir l’aide complète.</li>
</ul></p>',
	'ow_conceptmapping_uitext' => "<p>Le carte des concepts vous permet d'identifier quel sens défini d'un ensemble de données est identique aux sens définis pour les autres ensembles de données.</p>",
	'ow_conceptmapping_no_action_specified' => "L'action « $1 » n'est supportée.",
	'ow_dm_OK' => 'Valider',
	'ow_dm_not_present' => 'non inscrit',
	'ow_dm_not_found' => 'non trouvé dans la base de données ou mal rédigé',
	'ow_mapping_successful' => 'Tous les champs marqués avec [OK] ont été insérés<br />',
	'ow_mapping_unsuccessful' => 'Il faut qu’au moins deux sens soient définis avant qu’ils ne puissent être reliés.',
	'ow_will_insert' => 'Insèrera les suivants :',
	'ow_contents_of_mapping' => 'Correspondances',
	'ow_available_contexts' => 'Contextes disponibles',
	'ow_add_concept_link' => 'Ajouter un lien aux autres concepts',
	'ow_concept_panel' => 'Éventail de concepts',
	'ow_dm_badtitle' => "Cette page ne pointe sur aucun concept ou sens défini. Veuillez vérifier l'adresse internet.",
	'ow_dm_missing' => "Cette page semble pointer vers un concept ou un sens inexistant. Veuillez vérifier l'adresse Web.",
	'ow_AddHint' => 'Entrez une nouvelle ligne à ajouter',
	'ow_AlternativeDefinition' => 'Définition alternative',
	'ow_AlternativeDefinitions' => 'Définitions alternatives',
	'ow_Annotation' => 'Annotation',
	'ow_ApproximateMeanings' => 'Sens approximatifs',
	'ow_ClassAttributeAttribute' => 'Attribut',
	'ow_ClassAttributes' => 'Attributs de classe',
	'ow_ClassAttributeLevel' => 'Niveau',
	'ow_ClassAttributeType' => 'Type',
	'ow_ClassMembership' => 'Classes',
	'ow_Collection' => 'Collection',
	'ow_Collection_colon' => 'Collection :',
	'ow_CollectionMembership' => 'Collections',
	'ow_Definition' => 'Définition',
	'ow_DefinedMeaningAttributes' => 'Annotation',
	'ow_DefinedMeaning' => 'Sens défini',
	'ow_DefinedMeaningReference' => 'Sens défini',
	'ow_ExactMeanings' => 'Sens exacts',
	'ow_Expression' => 'Expression',
	'ow_ExpressionMeanings' => 'Sens des expressions',
	'ow_Expressions' => 'Expressions',
	'ow_IdenticalMeaning' => 'Sens identique ?',
	'ow_IncomingRelations' => 'Relations entrantes',
	'ow_GotoSource' => 'Voir la source',
	'ow_Language' => 'Langue',
	'ow_LevelAnnotation' => 'Annotation',
	'ow_OptionAttribute' => 'Propriété',
	'ow_OptionAttributeOption' => 'Option',
	'ow_OptionAttributeOptions' => 'Options',
	'ow_OptionAttributeValues' => 'Valeurs des options',
	'ow_OtherDefinedMeaning' => 'Autre sens défini',
	'ow_PopupAnnotation' => 'Annotation',
	'ow_Relations' => 'Relations',
	'ow_RelationType' => 'Type de relation',
	'ow_Remove' => 'Retirer',
	'ow_RemoveHint' => 'Marquer les lignes à retirer',
	'ow_Spelling' => 'Orthographe',
	'ow_SuggestHint' => 'Cliquez pour changer la sélection',
	'ow_Synonyms' => 'Synonymes',
	'ow_SynonymsAndTranslations' => 'Synonymes et traductions',
	'ow_Source' => 'Source',
	'ow_SourceIdentifier' => 'Identificateur de source',
	'ow_TextAttribute' => 'Propriété',
	'ow_Text' => 'Texte',
	'ow_TextAttributeValues' => 'Texte libre',
	'ow_TranslatedTextAttribute' => 'Propriété',
	'ow_TranslatedText' => 'Texte traduit',
	'ow_TranslatedTextAttributeValue' => 'Texte',
	'ow_TranslatedTextAttributeValues' => 'Textes traduisibles',
	'ow_LinkAttribute' => 'Attribut',
	'ow_LinkAttributeValues' => 'Liens',
	'ow_Property' => 'Propriété',
	'ow_Value' => 'Valeur',
	'ow_meaningsoftitle' => 'Sens de « $1 »',
	'ow_meaningsofsubtitle' => '<em>lien wiki :</em> [[$1]]',
	'ow_Permission_denied' => '<h2>PERMISSION REFUSÉE</h2>',
	'ow_copy_no_action_specified' => 'Merci de spécifier une action',
	'ow_copy_help' => "L'aide n'a pas encore été implémentée.",
	'ow_please_proved_dmid' => 'Il manque un ?dmid=<...> (dmid=SensDéfini ID)<br />Contactez l’administrateur.',
	'ow_please_proved_dc1' => 'Il manque un ?dc1=<...> (dc1=contexte de la base 1, base DEPUIS laquelle on copie)<br />Contactez l’administrateur.',
	'ow_please_proved_dc2' => 'Il manque un ?dc2=<...> (dc1=contexte de la base 2, base VERS laquelle on copie)<br />Contactez l’administrateur.',
	'ow_copy_successful' => "<h2>Succès de la copie</h2>Vos données ont été copiées avec succès. Veuillez vérifiez que c'est bien le cas.",
	'ow_copy_unsuccessful' => "<h3>Copie infructueuse</h3> Aucune opération de copie n'a pris place.",
	'ow_no_action_specified' => "<h3>Aucune action n'a été spécifiée</h3> Peut-être êtes-vous venu sur cette page directement ? Vous n'avez pas, en principe, à être ici.",
	'ow_db_consistency_not_found' => "<h2>Erreur</h2>La base de données semble corrompue, wikidata ne peut trouver des données valides liées à l'identificateur (ID) du sens défini. Il pourrait être détruit. Veuillez contacter l'opérateur ou l'administrateur du serveur.",
	'ow_needs_xlation_title' => 'Des expressions nécessitent des traductions',
	'ow_needs_xlation_source_lang' => 'Langue source :',
	'ow_needs_xlation_dest_lang' => 'Langue de destination :',
	'ow_needs_xlation_no_dest_lang' => 'Vous devez spécifiez une langue de destination.',
	'ow_show' => 'Afficher',
	'ow_create' => 'Créer',
	'ow_collection_added' => '<strong>Collection $1 ajoutée.</strong>',
	'ow_suggest_previous' => 'Précédent',
	'ow_suggest_next' => 'Suivant',
	'ow_suggest_clear' => 'Effacer',
);

/** Western Frisian (Frysk)
 * @author Snakesteuben
 */
$wdMessages['fy'] = array(
	'ow_save' => 'Fêstlizze',
	'ow_Source' => 'Boarne',
);

/** Irish (Gaeilge)
 * @author Alison
 */
$wdMessages['ga'] = array(
	'datasearch' => 'Vicísonraí: Cuardaigh sonraí',
	'langman_title' => 'Bainisteoir teangacha',
	'languages' => 'Vicísonraí: Bainisteoir teangacha',
	'ow_save' => 'Sábháil',
	'ow_history' => 'Stair',
	'ow_noedit_title' => 'Ní chead chun chur in eagar',
	'ow_uiprefs' => 'Vicísonraí',
	'ow_Annotation' => 'Anótáil',
	'ow_ClassAttributeAttribute' => 'Tréith',
	'ow_ClassAttributeLevel' => 'Leibhéal',
	'ow_ClassAttributeType' => 'Cineál',
	'ow_Language' => 'Teanga',
	'ow_OptionAttribute' => 'Airí',
	'ow_OptionAttributeOption' => 'Rogha',
	'ow_OptionAttributeOptions' => 'Roghanna',
	'ow_Spelling' => 'Litriú',
	'ow_Synonyms' => 'Comhchiallaigh',
	'ow_SynonymsAndTranslations' => 'Comhchiallaigh agus aistriúcháin',
	'ow_Source' => 'Foinse',
	'ow_TextAttribute' => 'Airí',
	'ow_Text' => 'Téacs',
	'ow_TextAttributeValues' => 'Gnáth-théacs',
	'ow_TranslatedTextAttribute' => 'Airí',
	'ow_TranslatedTextAttributeValue' => 'Téacs',
	'ow_LinkAttribute' => 'Airí',
	'ow_LinkAttributeValues' => 'Naisc',
	'ow_Property' => 'Airí',
);

/** Galician (Galego)
 * @author Alma
 * @author Toliño
 * @author Xosé
 */
$wdMessages['gl'] = array(
	'languages' => 'Wikidata: Xestor de linguas',
	'langman_title' => 'Xestor de linguas',
	'importlangnames' => 'Wikidata: Importar nomes de linguas',
	'importlangnames_title' => 'Importar nomes de linguas',
	'importlangnames_not_allowed' => 'Non ten os permisos necesarios para importar nomes de linguas.',
	'importlangnames_added' => 'Engadíronse os nomes de lingua de "$1".',
	'importlangnames_not_found' => '<strong>Non se atopou ningunha entrada de lingua de "$1"!</strong>',
	'datasearch' => 'Wikidata: Procura de datos',
	'addcollection' => 'Wikidata: Engadir unha colección',
	'ow_save' => 'Gardar',
	'ow_history' => 'Historial',
	'ow_datasets' => 'Selección de datos fixados',
	'ow_noedit_title' => 'Non ten permisos para editar',
	'ow_noedit' => 'Non ten permiso para editar páxinas de datos fixados "$1".
Por favor, vexa [[{{MediaWiki:Ow editing policy url}}|a nosa política de edición]].',
	'ow_uipref_datasets' => 'Vista por defecto',
	'ow_uiprefs' => 'Wikidatos',
	'ow_none_selected' => 'Ningún seleccionado',
	'ow_conceptmapping_help' => '<p>accións posibles: <ul>
<li>&action=insert&<data_context_prefix>=<defined_id>&...  inserir un mapa</li>
<li>&action=get&concept=<concept_id>  ler un mapa</li>
<li>&action=list_sets  devolver unha lista cos prefixos de contexto posibles e a que se refiren.</li>
<li>&action=get_associated&dm=<defined_meaning_id>&dc=<dataset_context_prefix> para unha definición dun concepto, devolver todo o demais</li>
<li>&action=help  Amosar a axuda útil.</li>
</ul></p>',
	'ow_conceptmapping_uitext' => '<p>O mapa de conceptos permítelle identificar cal é a definición nun conxunto de datos que é idéntico ás definicións noutros conxuntos.</p>',
	'ow_conceptmapping_no_action_specified' => 'A acción "$1" non está soportada.',
	'ow_dm_OK' => 'De acordo',
	'ow_dm_not_present' => 'non introducido',
	'ow_dm_not_found' => 'non atopado na base de datos ou malformado',
	'ow_mapping_successful' => 'Mapeados todos os campos marcados con [OK]<br />',
	'ow_mapping_unsuccessful' => 'Precísanse ter, polo menos, dúas definicións antes de poderen ser ligadas.',
	'ow_will_insert' => 'Insertará o seguinte:',
	'ow_contents_of_mapping' => 'Contidos do trazado dun mapa',
	'ow_available_contexts' => 'Contextos dispoñíbeis',
	'ow_add_concept_link' => 'Engadir ligazón a outros conceptos',
	'ow_concept_panel' => 'Panel de conceptos',
	'ow_dm_badtitle' => 'Esta páxina non sinala cara a ningunha definición (concepto).
Por favor, comprobe o enderezo da páxina web.',
	'ow_dm_missing' => 'Esta páxina parece que sinala cara a unha definición (concepto) que non existe.
Por favor, comprobe o enderezo da páxina web.',
	'ow_AddHint' => 'Insira novas ringleiras a engadir',
	'ow_AlternativeDefinition' => 'Definición alternativa',
	'ow_AlternativeDefinitions' => 'Definicións alternativas',
	'ow_Annotation' => 'Anotación',
	'ow_ApproximateMeanings' => 'Significados aproximados',
	'ow_ClassAttributeAttribute' => 'Atributo',
	'ow_ClassAttributes' => 'Clase de atributos',
	'ow_ClassAttributeLevel' => 'Nivel',
	'ow_ClassAttributeType' => 'Tipo',
	'ow_ClassMembership' => 'Clase de membros',
	'ow_Collection' => 'Recompilación',
	'ow_Collection_colon' => 'Colección:',
	'ow_CollectionMembership' => 'Recompilación dos membros',
	'ow_Definition' => 'Definición',
	'ow_DefinedMeaningAttributes' => 'Anotación',
	'ow_DefinedMeaning' => 'Significado definido',
	'ow_DefinedMeaningReference' => 'Significado definido',
	'ow_ExactMeanings' => 'Significados exactos',
	'ow_Expression' => 'Expresión',
	'ow_ExpressionMeanings' => 'Significados da expresión',
	'ow_Expressions' => 'Expresións',
	'ow_IdenticalMeaning' => 'significado idéntico?',
	'ow_IncomingRelations' => 'Relacións entrantes',
	'ow_GotoSource' => 'Ir á orixe',
	'ow_Language' => 'Lingua',
	'ow_LevelAnnotation' => 'Anotación',
	'ow_OptionAttribute' => 'Característica',
	'ow_OptionAttributeOption' => 'Opción',
	'ow_OptionAttributeOptions' => 'Opcións',
	'ow_OptionAttributeValues' => 'Valores de opción',
	'ow_OtherDefinedMeaning' => 'Outro significado definido',
	'ow_PopupAnnotation' => 'Anotación',
	'ow_Relations' => 'Relacións',
	'ow_RelationType' => 'Tipo de relación',
	'ow_Remove' => 'Eliminar',
	'ow_RemoveHint' => 'Marque as fileiras a eliminar',
	'ow_Spelling' => 'Ortografía',
	'ow_SuggestHint' => 'Prema para cambiar a selección',
	'ow_Synonyms' => 'Sinónimos',
	'ow_SynonymsAndTranslations' => 'Sinónimos e traducións',
	'ow_Source' => 'Orixe',
	'ow_SourceIdentifier' => 'Identificador da Orixe',
	'ow_TextAttribute' => 'Característica',
	'ow_Text' => 'Texto',
	'ow_TextAttributeValues' => 'Textos sinxelos',
	'ow_TranslatedTextAttribute' => 'Característica',
	'ow_TranslatedText' => 'Texto traducido',
	'ow_TranslatedTextAttributeValue' => 'Texto',
	'ow_TranslatedTextAttributeValues' => 'Textos traducíbeis',
	'ow_LinkAttribute' => 'Propiedade',
	'ow_LinkAttributeValues' => 'Ligazóns',
	'ow_Property' => 'Propiedade',
	'ow_Value' => 'Valor',
	'ow_meaningsoftitle' => 'Significados de "$1"',
	'ow_meaningsofsubtitle' => '<em>Ligazón Wiki:</em> [[$1]]',
	'ow_Permission_denied' => '<h2>PERMISO DENEGADO</h2>',
	'ow_copy_no_action_specified' => 'Precisar unha acción',
	'ow_copy_help' => 'Os contidos de axuda aínda non foron redactados.',
	'ow_please_proved_dmid' => 'Parace que na súa contribución falta "?dmid=<ID>" (dmid=Definición ID)<br />
Por favor, póñase en contacto cun administrador do servidor.',
	'ow_please_proved_dc1' => 'Parace que na súa contribución falta "?dc1=<algo>" (dc1=contexto do conxunto de datos 1, conxunto de datos DO cual copiar)<br />
Por favor, póñase en contacto cun administrador do servidor.',
	'ow_please_proved_dc2' => 'Parace que na súa contribución falta "?dc2=<algo>" (dc2=contexto do conxunto de datos 2, conxunto de datos AO cual copiar)<br />
Por favor, póñase en contacto cun administrador do servidor.',
	'ow_copy_successful' => '<h2>Copia exitosa</h2>
Parece que os seus datos foron copiados con éxito.
Non esqueza volvelos comprobar para asegurarse!',
	'ow_copy_unsuccessful' => '<h3>Copia sen éxito</h3> Ningunha operación de copiado tivo lugar.',
	'ow_no_action_specified' => '<h3>Non foi especificada ningunha acción</h3> Quizais veu a esta páxina directamente? Normalmente non precisa estar aquí.',
	'ow_db_consistency_not_found' => '<h2>Erro</h2>
Hai un erro coa constancia da base de datos e os datos wiki non poden atopar datos válidos conectados con esta definición ID.
Pode que se perderan.
Por favor, póñase en contacto cun operador ou administrador do servidor.',
	'ow_needs_xlation_title' => 'Expresións que necesitan dunha tradución',
	'ow_needs_xlation_source_lang' => 'Lingua de orixe:',
	'ow_needs_xlation_dest_lang' => 'Lingua de destino:',
	'ow_needs_xlation_no_dest_lang' => 'Por favor, especifique unha lingua de destino.',
	'ow_show' => 'Mostrar',
	'ow_create' => 'Crear',
	'ow_collection_added' => '<strong>Engadiuse a colección $1.</strong>',
);

/** Ancient Greek (Ἀρχαία ἑλληνικὴ)
 * @author Crazymadlover
 * @author LeighvsOptimvsMaximvs
 */
$wdMessages['grc'] = array(
	'ow_history' => 'Αἱ προτέραι',
	'ow_dm_OK' => 'εἶεν',
	'ow_ClassAttributeType' => 'Τύπος',
	'ow_Language' => 'Γλῶττα',
	'ow_OptionAttributeOptions' => 'Ἐπιλογαί',
	'ow_Source' => 'Πηγή',
	'ow_Value' => 'Τιμή',
);

/** Swiss German (Alemannisch)
 * @author Als-Holder
 */
$wdMessages['gsw'] = array(
	'languages' => 'Wikidata: Sproche-Manager',
	'langman_title' => 'Sprochmanager',
	'langman_not_allowed' => 'Du derfsch d Sprochenyystellige nit ändere.',
	'langman_header' => 'Gib dr Sprochcode yy un drunter dr änglisch Name:',
	'langman_req_fields' => 'S bruucht dr Sprochname un au dr ISO-639-3-Code!',
	'langman_adding' => 'Sproch $1 mit Code $2 dezuegfiegt.',
	'langman_langname' => 'Sprochname:',
	'langman_iso639-3' => 'ISO-639-3-Code:',
	'langman_iso639-2' => 'ISO-639-2-Code:',
	'langman_wikimedia' => 'Wikimedia-Code:',
	'langman_field_optional' => '(optional)',
	'langman_addlang' => 'Sproch zuefiege',
	'importlangnames' => 'Wikidata: Importier Sprochnäme',
	'importlangnames_title' => 'Importier Sprochnäme',
	'importlangnames_not_allowed' => 'Du hesch kei Berächtigung Sprochnäme z importiere.',
	'importlangnames_added' => 'Sprochnäme fir "$1" dezuegfiegt.',
	'importlangnames_not_found' => '<strong>Kei Sprochyytrag fir "$1" gfunde!</strong>',
	'datasearch' => 'Wikidata: Datesuech',
	'addcollection' => 'Wikidata: Sammlig zuefiege',
	'ow_save' => 'Spychere',
	'ow_history' => 'Versione/Autore',
	'ow_datasets' => 'Uswahl vum Dataset',
	'ow_noedit_title' => 'Du derfsch die Syte nit bearbeite',
	'ow_noedit' => 'Du derfsch Syte im Dataset „$1“ nit bearbeite.
Lueg [[{{MediaWiki:Ow editing policy url}}|unseri Richtlinie]].',
	'ow_uipref_datasets' => 'Standardaasicht:',
	'ow_uiprefs' => 'Wikidata',
	'ow_none_selected' => 'Nyt usgwehlt',
	'ow_conceptmapping_help' => '<p>Megligi Aktione: <ul>
<li>&action=insert&<data_context_prefix>=<defined_id>&… E Verchnipfig zuefiege</li>
<li>&action=get&concept=<concept_id> E Verchnipfig abruefe</li>
<li>&action=list_sets Zeig e Lischt vu meglige Datekontextpräfix un uf was si sich bezien</li>
<li>&action=get_associated&dm=<defined_meaning_id>&dc=<dataset_context_prefix> fir e DefinedMeaning in eme Kontext, zeig alli andere</li>
<li>&action=help Hilf aazeige.</li>
</ul></p>',
	'ow_conceptmapping_uitext' => '<p>Mit Concept Mapping cha mer feschtlege, weli DefinedMeaning in eme Dataset mit andere DefinedMeanings us andere Dataset identisch isch.</p>',
	'ow_conceptmapping_no_action_specified' => 'D Aktion „$1“ wird nit unterstitzt.',
	'ow_dm_OK' => 'In Ornig',
	'ow_dm_not_present' => 'nit yygee',
	'ow_dm_not_found' => 'nit in dr Datebank gfunde oder fählerhaft',
	'ow_mapping_successful' => 'Alli mit [OK] markierte Fälder sin zuegordnet wore<br />',
	'ow_mapping_unsuccessful' => 'S bruucht zmindescht zwoo DefinedMeaning zum Verchnipfe.',
	'ow_will_insert' => 'Des wird yygsetzt',
	'ow_contents_of_mapping' => 'Inhalt vu dr Verchnipfig',
	'ow_available_contexts' => 'Verfiegbari Kontext',
	'ow_add_concept_link' => 'Gleicher zue andere Konzäpt zuefiege',
	'ow_concept_panel' => 'Konzäptschaltflächi',
	'ow_dm_badtitle' => 'Die Syte wyst nit zuen ere DefinedMeaning (Konzäpt). Bitte iberprief d Netzadräss.',
	'ow_dm_missing' => 'Die Syte wyst zuen ere DefinedMeaning (Konzäpt), wu s nit git. Bitte iberprief d Netzadräss.',
	'ow_AddHint' => 'Gib neji Zyyle yy zum zuefiege',
	'ow_AlternativeDefinition' => 'Alternativi Definition',
	'ow_AlternativeDefinitions' => 'Alternativi Definitione',
	'ow_Annotation' => 'Annotation',
	'ow_ApproximateMeanings' => 'Unggfähri Bedytige',
	'ow_ClassAttributeAttribute' => 'Attribut',
	'ow_ClassAttributes' => 'Chlassenattribut',
	'ow_ClassAttributeLevel' => 'Ebeni',
	'ow_ClassAttributeType' => 'Typ',
	'ow_ClassMembership' => 'Chlassezuegherigkeit',
	'ow_Collection' => 'Sammlig',
	'ow_Collection_colon' => 'Sammlig:',
	'ow_CollectionMembership' => 'Sammligszuegherigkeit',
	'ow_Definition' => 'Definition',
	'ow_DefinedMeaningAttributes' => 'Annotation',
	'ow_DefinedMeaning' => 'DefinedMeaning',
	'ow_DefinedMeaningReference' => 'DefinedMeaning',
	'ow_ExactMeanings' => 'Exakti Bedytige',
	'ow_Expression' => 'Uusdruck',
	'ow_ExpressionMeanings' => 'Uusdrucksbedytige',
	'ow_Expressions' => 'Uusdrick',
	'ow_IdenticalMeaning' => 'Identischi Bedytig?',
	'ow_IncomingRelations' => 'Relatione, wu yygange sin',
	'ow_GotoSource' => 'Gang zue dr Quälle',
	'ow_Language' => 'Sproch',
	'ow_LevelAnnotation' => 'Annotation',
	'ow_OptionAttribute' => 'Eigeschaft',
	'ow_OptionAttributeOption' => 'Option',
	'ow_OptionAttributeOptions' => 'Optione',
	'ow_OptionAttributeValues' => 'Optionswärt',
	'ow_OtherDefinedMeaning' => 'Anderi DefinedMeaning',
	'ow_PopupAnnotation' => 'Annotation',
	'ow_Relations' => 'Relatione',
	'ow_RelationType' => 'Relationstyp',
	'ow_Remove' => 'Useneh',
	'ow_RemoveHint' => 'Markier Zyyle zum si useneh',
	'ow_Spelling' => 'Schryybwyys',
	'ow_SuggestHint' => 'Klick go d Uuswahl ändere',
	'ow_Synonyms' => 'Synonym',
	'ow_SynonymsAndTranslations' => 'Synonym un Ibersetzige',
	'ow_Source' => 'Quälle',
	'ow_SourceIdentifier' => 'Quällebezeichner',
	'ow_TextAttribute' => 'Eigeschaft',
	'ow_Text' => 'Täxt',
	'ow_TextAttributeValues' => 'Plaintäxt',
	'ow_TranslatedTextAttribute' => 'Eigeschaft',
	'ow_TranslatedText' => 'Ibersetzter Täxt',
	'ow_TranslatedTextAttributeValue' => 'Täxt',
	'ow_TranslatedTextAttributeValues' => 'Ibersetzbarer Täxt',
	'ow_LinkAttribute' => 'Eigeschaft',
	'ow_LinkAttributeValues' => 'Gleicher',
	'ow_Property' => 'Eigeschaft',
	'ow_Value' => 'Wärt',
	'ow_meaningsoftitle' => 'Bedytige vu „$1“',
	'ow_meaningsofsubtitle' => '<em>Wikilink:</em> [[$1]]',
	'ow_Permission_denied' => '<h2>ERLAUBNIS VERWEIGERET</h2>',
	'ow_copy_no_action_specified' => 'Bitte leg e Aktion fescht.',
	'ow_copy_help' => 'S isch kei Hilf implementiert.',
	'ow_please_proved_dmid' => 'In Dyynere Yygab fählt „?dmid=<something>“ (dmid=Defined Meaning ID)<br />
Bitte kontaktier dr Serveradminschtrator.',
	'ow_please_proved_dc1' => 'In Dyynere Yygab fählt „?dc1=<something>“ (dc1=dataset context 1, dataset to copy FROM)<br />
Bitte kontaktier dr Serveradminschtrator.',
	'ow_please_proved_dc2' => 'In Dyynere Yygab fählt „?dc2=<something>“ (dc2=dataset context 2, dataset to copy TO) <br />
Bitte kontaktier dr Serveradminschtrator.',
	'ow_copy_successful' => '<h2>Kopiere erfolgryych</h2>Dyni Date sin schyyns erfolgryych kopiert wore. Bitte vergiss nit nomol z priefe zum sicher z syy!',
	'ow_copy_unsuccessful' => '<h3>Kopiere nit erfolgryych</h3> S het kei Kopieraktion gee.',
	'ow_no_action_specified' => '<h3>S isch kei Aktion aagee wore</h3> Villicht bisch diräkt zue däre Syte chu?',
	'ow_db_consistency_not_found' => '<h2>Fähler</h2>D Datebank isch nimi konsischtent. Wikidata cha keini giltige Date zue dr ID finde. Bitte kontaktier dr Server-Adminischtrator.',
	'ow_needs_xlation_title' => 'Uusdrick wu no ibersetzt mien wäre',
	'ow_needs_xlation_source_lang' => 'Ursprungssproch:',
	'ow_needs_xlation_dest_lang' => 'Ziilsproch:',
	'ow_needs_xlation_no_dest_lang' => 'Bitte gib e Ziilsproch aa',
	'ow_show' => 'Zeige',
	'ow_create' => 'Aalege',
	'ow_collection_added' => '<strong>Sammlig $1 zuegfiegt.</strong>',
	'ow_suggest_previous' => 'Vorigi',
	'ow_suggest_next' => 'Negschti',
	'ow_suggest_clear' => 'Lääre',
);

/** Manx (Gaelg)
 * @author MacTire02
 */
$wdMessages['gv'] = array(
	'langman_title' => 'Reireyder çhengey',
	'languages' => 'Wikidata: Reireyder çhengey',
	'ow_save' => 'Sauail',
	'ow_history' => 'Shennaghys',
	'ow_uiprefs' => 'Wikidata',
	'ow_dm_OK' => 'OK',
	'ow_ClassAttributeLevel' => 'Corrym',
	'ow_ClassAttributeType' => 'Sorçh',
	'ow_Language' => 'Çhengey',
	'ow_Text' => 'Teks',
	'ow_TranslatedTextAttributeValue' => 'Teks',
	'ow_LinkAttributeValues' => 'Kianglaghyn',
);

/** Hakka (Hak-kâ-fa)
 * @author Hakka
 */
$wdMessages['hak'] = array(
	'ow_Source' => 'Lòi-ngièn',
);

/** Hawaiian (Hawai`i)
 * @author Kalani
 * @author Singularity
 */
$wdMessages['haw'] = array(
	'ow_history' => 'Mo‘olelo',
	'ow_dm_OK' => 'Hiki nō',
	'ow_Language' => 'ʻŌlelo',
);

/** Hebrew (עברית)
 * @author Rotemliss
 * @author YaronSh
 */
$wdMessages['he'] = array(
	'languages' => 'ויקי־דאטא: מנהל השפות',
	'langman_title' => 'מנהל השפות',
	'datasearch' => 'ויקי־דאטא: חיפוש נתונים',
	'ow_save' => 'שמירה',
	'ow_history' => 'היסטוריה',
	'ow_datasets' => 'בחירת ערכת נתונים',
	'ow_noedit_title' => 'אין הרשאות עריכה',
	'ow_noedit' => 'אינכם מורשים לערוך דפים בערכת הנתונים "$1".
אנא עיינו ב[[{{MediaWiki:Ow editing policy url}}|מדיניות העריכה שלנו]].',
	'ow_uipref_datasets' => 'תצוגת ברירת המחדל',
	'ow_uiprefs' => 'ויקי־דאטא',
	'ow_none_selected' => 'לא נבחרו',
	'ow_conceptmapping_help' => '<p>פעולות אפשריות: <ul>
<li>&action=insert&<data_context_prefix>=<defined_id>&...  הוספת מיפוי</li>
<li>&action=get&concept=<concept_id>  קריאת מיפוי בחזרה</li>
<li>&action=list_sets  החזרת רשימה של קידומות הקשר אפשריות ולמה הן מפנות.</li>
<li>&action=get_associated&dm=<defined_meaning_id>&dc=<dataset_context_prefix> עבור משמעות אחת מוגדרת ברעיון, החזרת כל השאר</li>
<li>&action=help  הצגת עזרה מועילה.</li>
</ul></p>',
	'ow_conceptmapping_uitext' => '<p>מיפוי תפיסתי מאפשר לכם לזהות איזו משמעות מוגדרת בערכת נתונים אחת זהה למשמעויות מוגדרות בערכות נתונים אחרות.</p>',
	'ow_conceptmapping_no_action_specified' => 'הפעולה "$1" אינה נתמכת.',
	'ow_dm_OK' => 'מאושר',
	'ow_dm_not_present' => 'לא הוכנס',
	'ow_dm_not_found' => 'לא נמצא במסד הנתונים או שהוא פגום',
	'ow_mapping_successful' => 'כל השדות שמופו סומנו ב[מאושר]<br />',
	'ow_mapping_unsuccessful' => 'דרושות לפחות שתי משמעויות מוגדרות לפני שאפשר יהיה לקשר ביניהן.',
	'ow_will_insert' => 'יוסיף את הנ"ל:',
	'ow_contents_of_mapping' => 'תכני המיפוי',
	'ow_available_contexts' => 'הקשרים זמינים',
	'ow_add_concept_link' => 'הוספת קישור לתפיסות אחרות',
	'ow_concept_panel' => 'חלונית התפיסה',
	'ow_dm_badtitle' => 'דף זה אינו מפנה למשמעות מוגדרת (DefinedMeaning - תפיסה) כלשהי.
אנא בדקו את כתובת האינטרנט.',
	'ow_dm_missing' => 'נראה כי דף זה מפנה למשמעות מוגדרת (DefinedMeaning - תפיסה) שאינה קיימת.
אנא בדקו את כתובת האינטרנט.',
	'ow_AlternativeDefinition' => 'משמעות חלופית',
	'ow_AlternativeDefinitions' => 'משמעויות חלופיות',
	'ow_Annotation' => 'פירוש',
	'ow_ApproximateMeanings' => 'משמעויות משוערכות',
	'ow_ClassAttributeAttribute' => 'מאפיין',
	'ow_ClassAttributes' => 'מאפייני מחלקות',
	'ow_ClassAttributeLevel' => 'רמה',
	'ow_ClassAttributeType' => 'סוג',
	'ow_ClassMembership' => 'חברות במחלקה',
	'ow_Collection' => 'אוסף',
	'ow_CollectionMembership' => 'חברות באוסף',
	'ow_Definition' => 'הגדרה',
	'ow_DefinedMeaningAttributes' => 'פירוש',
	'ow_DefinedMeaning' => 'משמעות מוגדרת',
	'ow_DefinedMeaningReference' => 'משמעות מוגדרת',
	'ow_ExactMeanings' => 'משמעויות מדויקות',
	'ow_Expression' => 'ביטוי',
	'ow_ExpressionMeanings' => 'משמעויות הביטוי',
	'ow_Expressions' => 'ביטויים',
	'ow_IdenticalMeaning' => 'משמעות זהה?',
	'ow_IncomingRelations' => 'קשרים נכנסים',
	'ow_GotoSource' => 'מעבר למקור',
	'ow_Language' => 'שפה',
	'ow_LevelAnnotation' => 'פירוש',
	'ow_OptionAttribute' => 'מאפיין',
	'ow_OptionAttributeOption' => 'אפשרות',
	'ow_OptionAttributeOptions' => 'אפשרויות',
	'ow_OptionAttributeValues' => 'ערכי האפשרות',
	'ow_OtherDefinedMeaning' => 'משמעות מוגדרת אחרת',
	'ow_PopupAnnotation' => 'פירוש',
	'ow_Relations' => 'קשרים',
	'ow_RelationType' => 'סוג הקשר',
	'ow_Spelling' => 'איות',
	'ow_Synonyms' => 'מילים נרדפות',
	'ow_SynonymsAndTranslations' => 'מילים נרדפות ותרגומים',
	'ow_Source' => 'מקור',
	'ow_SourceIdentifier' => 'מזהה המקור',
	'ow_TextAttribute' => 'מאפיין',
	'ow_Text' => 'טקסט',
	'ow_TextAttributeValues' => 'טקסטים פשוטים',
	'ow_TranslatedTextAttribute' => 'מאפיין',
	'ow_TranslatedText' => 'טקסט מתורגם',
	'ow_TranslatedTextAttributeValue' => 'טקסט',
	'ow_TranslatedTextAttributeValues' => 'טקסטים הניתנים לתרגום',
	'ow_LinkAttribute' => 'מאפיין',
	'ow_LinkAttributeValues' => 'קישורים',
	'ow_Property' => 'מאפיין',
	'ow_Value' => 'ערך',
	'ow_meaningsoftitle' => 'המשמעויות של "$1"',
	'ow_meaningsofsubtitle' => '<em>קישור ויקי:</em> [[$1]]',
	'ow_Permission_denied' => '<h2>הגישה נדחתה</h2>',
	'ow_copy_no_action_specified' => 'אנא הגדירו פעולה',
	'ow_copy_help' => 'אפשרות העזרה לא פותחה עדיין.',
	'ow_please_proved_dmid' => 'נראה שלקלט שלכם חסר "<span dir="ltr">?dmid=<ID></span>" (הפירוש של dmid: מספר משמעות מוגדרת)<br />
אנא צרו קשר עם מנהל השרת.',
	'ow_please_proved_dc1' => "נראה שלקלט שלכם חסר \"<span dir=\"ltr\">?dc1=<something></span>\" (הפירוש של dc1: הקשר ערכת נתונים 1, ערכת נתונים שיש להעתיק '''ממנה''')<br />
אנא צרו קשר עם מנהל השרת.",
	'ow_please_proved_dc2' => "נראה שלקלט שלכם חסר \"<span dir=\"ltr\">?dc2=<something></span>\" (הפירוש של dc2: הקשר ערכת נתונים 2, ערכת נתונים שיש להעתיק '''אליה''')<br />
אנא צרו קשר עם מנהל השרת.",
	'ow_copy_successful' => '<h2>ההעתקה הושלמה בהצלחה</h2>
נראה שהנתונים שלכם הועתקו בהצלחה.
אל תשכחו לבדוק שנית כדי לוודא זאת!',
	'ow_copy_unsuccessful' => '<h3>ההעתקה נכשלה</h3>
לא בוצעה פעולת העתקה.',
	'ow_no_action_specified' => '<h3>לא צוינה פעולת העתקה</h3>
האם הגעתם לדף זה ישירות? בדרך כלל אינכם אמורים להגיע לכאן.',
	'ow_db_consistency_not_found' => '<h2>שגיאה</h2>
ישנה בעיית עקביות בבסיס הנתונים. ויקי־דאטא לא הצליחה למצוא נתונים תקפים המקושרים למספר המשמעות המוגדרת הזה.
ייתכן שהם אבדו.
אנא צרו קשר עם המפעיל או המנהל של השרת.',
);

/** Hindi (हिन्दी)
 * @author Ashishbhatnagar72
 * @author Kaustubh
 */
$wdMessages['hi'] = array(
	'datasearch' => 'Wikidata: आंकडा़ खोज',
	'langman_title' => 'भाषा प्रबंधक',
	'languages' => 'Wikidata: भाषा प्रबंधक',
	'ow_save' => 'संजोयें',
	'ow_history' => 'इतिहास',
	'ow_noedit_title' => 'संपादन की अनुमति नहीं है',
	'ow_noedit' => 'आपको डाटासेट "$1" में पन्ने संपादन करने की अनुमति नहीं है. कृपया हमारी [[{{MediaWiki:Ow editing policy url}}|संपादन नीति]] देखें.',
	'ow_none_selected' => 'कुछ चयनित नहीं',
	'ow_dm_OK' => 'ओके',
	'ow_dm_not_present' => 'प्रवेश नहीं किया गया',
	'ow_will_insert' => 'निम्न को अन्तर्निविष्ट करेगा:',
	'ow_AlternativeDefinition' => 'वैकल्पिक परिभाषा',
	'ow_AlternativeDefinitions' => 'वैकल्पिक परिभाषाएं',
	'ow_ApproximateMeanings' => 'सन्निकट अर्थ',
	'ow_ClassAttributeLevel' => 'स्तर',
	'ow_ClassAttributeType' => 'प्रकार',
	'ow_Collection' => 'कलेक्शन',
	'ow_Definition' => 'परिभाषा',
	'ow_Language' => 'भाषा',
	'ow_OptionAttributeOption' => 'विकल्प',
	'ow_OptionAttributeOptions' => 'विकल्प',
	'ow_Relations' => 'संबन्ध',
	'ow_Source' => 'स्रोत',
	'ow_Permission_denied' => '<h2>अनुमति नहीं दी</h2>',
);

/** Hiligaynon (Ilonggo)
 * @author Jose77
 */
$wdMessages['hil'] = array(
	'ow_history' => 'Saysay',
);

/** Croatian (Hrvatski)
 * @author Dalibor Bosits
 */
$wdMessages['hr'] = array(
	'ow_save' => 'Spremi',
);

/** Upper Sorbian (Hornjoserbsce)
 * @author Michawiki
 */
$wdMessages['hsb'] = array(
	'languages' => 'Wikidata: Zrjadowak rěčow',
	'langman_title' => 'Zrjadowak rěčow',
	'langman_not_allowed' => 'Nimaš prawa rěčne nastajenja změnić.',
	'langman_header' => 'Zapodaj rěčny kod a jeho jendźelske mjeno:',
	'langman_req_fields' => 'Rěčne mjeno kaž tež kod ISO 639-3 stej trěbnej!',
	'langman_adding' => 'Rěč $1 z klučom $2 so přidawa.',
	'langman_langname' => 'Mjeno rěče:',
	'langman_iso639-3' => 'Kod ISO 639-3:',
	'langman_iso639-2' => 'Kod ISO 639-2:',
	'langman_wikimedia' => 'Wikimedijowy kod:',
	'langman_field_optional' => '(opcionalny)',
	'langman_addlang' => 'Rěč přidać',
	'importlangnames' => 'Wikidata: Rěčne mjena importować',
	'importlangnames_title' => 'Rěčne mjena importować',
	'importlangnames_not_allowed' => 'Nimaš prawo rěčne mjena importować.',
	'importlangnames_added' => 'Rěčne mjena za "$1" přidate.',
	'importlangnames_not_found' => '<strong>Žadyn rěčny zapisk za "$1" namakany!</strong>',
	'datasearch' => 'Wikidata: Pytanje datow',
	'addcollection' => 'Wikidata: Zběrku přidać',
	'ow_save' => 'Składować',
	'ow_history' => 'Stawizny',
	'ow_datasets' => 'Mnóstwo datow wubrać',
	'ow_noedit_title' => 'Žana dowolnosć za wobdźěłowanje',
	'ow_noedit' => 'Njesměš strony w sadźbje datow "$1" wobdźěłować. Prošu hlej [[{{MediaWiki:Ow editing policy url}}|naše směrnicy za wobdźěłowanje]].',
	'ow_uipref_datasets' => 'Standardny napohlad:',
	'ow_uiprefs' => 'Wikidaty',
	'ow_none_selected' => 'Ničo wubrane',
	'ow_conceptmapping_help' => '<p>Móžne akcije: <ul>
<li>&action=insert&<data_context_prefix>=<defined_id>&...  Zwjazanje zasunyć</li>
<li>&action=get&concept=<concept_id>  Zwjazanje wotwołać</li>
<li>&action=list_sets  Lisćinu móžnych prefiksow konteksta datow pokazać  a na štož so poćahuja.</li>
<li>&action=get_associated&dm=<defined_meaning_id>&dc=<dataset_context_prefix> Za definowany woznam w konteksće wšě druhe pokazać</li>
<li>&action=help  Wužitnu pomoc pokazać.</li>
</ul></p>',
	'ow_conceptmapping_uitext' => '<p>Concept mapping ći dowola identifikować, kotry definowany woznam en sadźbje datow je identiski z definowanymi woznami w druhich sadźbach datow.</p>',
	'ow_conceptmapping_no_action_specified' => 'Akcija "$1" so njepodpěruje.',
	'ow_dm_OK' => 'W porjadku',
	'ow_dm_not_present' => 'njezapodaty',
	'ow_dm_not_found' => 'w datowej bance njenamakany abo ze zmylkami',
	'ow_mapping_successful' => 'Wšě pola markěrowane z [OK] přirjadowane<br />',
	'ow_mapping_unsuccessful' => 'Stej znajmjeńša dwaj definowanej woznamaj za wotkazowanje trěbnej.',
	'ow_will_insert' => 'Slědowace so zasunje:',
	'ow_contents_of_mapping' => 'Wobsah zwobraznjenja',
	'ow_available_contexts' => 'K dispoziciji stejace konteksty',
	'ow_add_concept_link' => 'Wotkazy k druhim konceptam přidać',
	'ow_concept_panel' => 'Konceptowy panel',
	'ow_dm_badtitle' => 'Tuta strona njepokazuje na DefinedMeaning (koncept). Prošu přepruwuj webadresu.',
	'ow_dm_missing' => 'Tuta strona pokazuje po wšěm zdaću na njeeksistowacy DefinedMeaning (koncept). Prošu přepruwuj webadresu.',
	'ow_AddHint' => 'Nowe rjadki zapodać, kotrež maja so přidać',
	'ow_AlternativeDefinition' => 'Alternatiwna definicija',
	'ow_AlternativeDefinitions' => 'Alternatiwne definicije',
	'ow_Annotation' => 'Anotacija',
	'ow_ApproximateMeanings' => 'Přibližne woznamy',
	'ow_ClassAttributeAttribute' => 'Atribut',
	'ow_ClassAttributes' => 'Klasowe atributy',
	'ow_ClassAttributeLevel' => 'Runina',
	'ow_ClassAttributeType' => 'Typ',
	'ow_ClassMembership' => 'Klasowa přisłušnosć',
	'ow_Collection' => 'Zběrka',
	'ow_Collection_colon' => 'Zběrka:',
	'ow_CollectionMembership' => 'Přisłušnosć zběrki',
	'ow_Definition' => 'Definicija',
	'ow_DefinedMeaningAttributes' => 'Anotacija',
	'ow_DefinedMeaning' => 'Definowany woznam',
	'ow_DefinedMeaningReference' => 'Definowany woznam',
	'ow_ExactMeanings' => 'Eksaktne woznamy',
	'ow_Expression' => 'Wuraz',
	'ow_ExpressionMeanings' => 'Wurazowe woznamy',
	'ow_Expressions' => 'Wurazy',
	'ow_IdenticalMeaning' => 'Identiski woznam?',
	'ow_IncomingRelations' => 'Dochadźace poćahi',
	'ow_GotoSource' => 'Dźi k žórłu',
	'ow_Language' => 'Rěč',
	'ow_LevelAnnotation' => 'Anotacija',
	'ow_OptionAttribute' => 'Kajkosć',
	'ow_OptionAttributeOption' => 'Opcija',
	'ow_OptionAttributeOptions' => 'Opcije',
	'ow_OptionAttributeValues' => 'Opciske hódnoty',
	'ow_OtherDefinedMeaning' => 'Druhi definowany woznam',
	'ow_PopupAnnotation' => 'Anotacija',
	'ow_Relations' => 'Poćahi',
	'ow_RelationType' => 'Poćahowy typ',
	'ow_Remove' => 'Wotstronić',
	'ow_RemoveHint' => 'Rjadki markěrować, kotrez maja so wotstronić',
	'ow_Spelling' => 'Prawopis',
	'ow_SuggestHint' => 'Klikń, zo by wuběr změnił',
	'ow_Synonyms' => 'Synonymy',
	'ow_SynonymsAndTranslations' => 'Synonymy a přełožki',
	'ow_Source' => 'Žórło',
	'ow_SourceIdentifier' => 'Žóřłowy identifikator',
	'ow_TextAttribute' => 'Kajkosć',
	'ow_Text' => 'Tekst',
	'ow_TextAttributeValues' => 'Lute teksty',
	'ow_TranslatedTextAttribute' => 'Kajkosć',
	'ow_TranslatedText' => 'Přełoženy tekst',
	'ow_TranslatedTextAttributeValue' => 'Tekst',
	'ow_TranslatedTextAttributeValues' => 'Přełožujomny tekst',
	'ow_LinkAttribute' => 'Kajkosć',
	'ow_LinkAttributeValues' => 'Wotkazy',
	'ow_Property' => 'Kajkosć',
	'ow_Value' => 'Hódnota',
	'ow_meaningsoftitle' => 'Woznamy za "$1"',
	'ow_meaningsofsubtitle' => '<em>Wikiwotkaz:</em> [[$1]]',
	'ow_Permission_denied' => '<h2>DOWOLNOSĆ ZAPOWĚDŹENA</h2>',
	'ow_copy_no_action_specified' => 'Podaj prošu akciju',
	'ow_copy_help' => 'Pomoc hišće njeje implementowana.',
	'ow_please_proved_dmid' => 'Zda so, zo w twojim zapodaću "?dmid=<ID>" (dmid=Defined Meaning ID) faluje.<br />Prošu skontaktuj serweroweho administratora.',
	'ow_please_proved_dc1' => 'Zda so, zo w twojim zapodaću "?dc1=<something>" (dc1=dataset context 1, dataset to copy FROM)<br />Prošu skontaktuj serweroweho administratora.',
	'ow_please_proved_dc2' => 'Zda so, zo w twojim zapodaću "?dc2=<something>" (dc2=dataset context 2, dataset to copy TO)<br />Prošu skontaktuj serweroweho administratora.',
	'ow_copy_successful' => '<h2>Kopěrowanje wuspěšne</h2>Zda so, zo twoje daty su so wušpěšnje kopěrowali. Njezabudź hišće raz pruwować, zo by zawěsće był.',
	'ow_copy_unsuccessful' => '<h3>Kopěrowanje njewuspěšne</h3> Žana kopěrowanska operacija njeje so wotměła.',
	'ow_no_action_specified' => '<h3>Žana akcija podata</h3> Sy ty snano direktnje k tutej stronje přišoł? W normalny padźe njetrjebaš tu być.',
	'ow_db_consistency_not_found' => '<h2>Zmylk</h2>Je problem z konsistencu datoweje banki, wikidata njemóže płaćiwe daty namakać, kotrež su z tutym ID definedMeaning zwjazane. Snano su so zhubili. Prošu skontaktuj serweroweho operatora abo administratora.',
	'ow_needs_xlation_title' => 'Wurazy, kotrež maja so přełožować',
	'ow_needs_xlation_source_lang' => 'Žórłowa rěč:',
	'ow_needs_xlation_dest_lang' => 'Cilowa rěč:',
	'ow_needs_xlation_no_dest_lang' => 'Prošu podaj cilowu rěč.',
	'ow_show' => 'Pokazać',
	'ow_create' => 'Wutworić',
	'ow_collection_added' => '<strong>Zběrka $1 přidata.</strong>',
	'ow_suggest_previous' => 'Předchadny',
	'ow_suggest_next' => 'Přichodny',
	'ow_suggest_clear' => 'Wuprózdnić',
);

/** Hungarian (Magyar)
 * @author Bdamokos
 * @author Dani
 * @author Gondnok
 */
$wdMessages['hu'] = array(
	'langman_title' => 'Nyelv kezelő',
	'ow_save' => 'Mentés',
	'ow_history' => 'Történet',
	'ow_uipref_datasets' => 'Alapértelmezett nézet',
	'ow_dm_OK' => 'OK',
	'ow_AlternativeDefinitions' => 'Más definíciók',
	'ow_Annotation' => 'Jegyzetek',
	'ow_ApproximateMeanings' => 'Megközelítő jelentések',
	'ow_ClassAttributeAttribute' => 'Tulajdonság',
	'ow_ClassAttributes' => 'Osztály tulajdonságok',
	'ow_ClassAttributeLevel' => 'Szint',
	'ow_ClassAttributeType' => 'Típus',
	'ow_ClassMembership' => 'Osztály tagság',
	'ow_Collection' => 'Gyűjtemény',
	'ow_CollectionMembership' => 'Gyűjtemény tagság',
	'ow_Definition' => 'Definíció',
	'ow_DefinedMeaningAttributes' => 'Jegyzetek',
	'ow_DefinedMeaning' => 'Definiált jelentés',
	'ow_DefinedMeaningReference' => 'Definiált jelentés',
	'ow_ExactMeanings' => 'Pontos jelentések',
	'ow_Expression' => 'Kifejezés',
	'ow_ExpressionMeanings' => 'Kifejezés jelentések',
	'ow_Expressions' => 'Kifejezések',
	'ow_IdenticalMeaning' => 'Megegyező jelentés?',
	'ow_IncomingRelations' => 'Bejövő kapcsolatok',
	'ow_GotoSource' => 'Menj a forráshoz',
	'ow_Language' => 'Nyelv',
	'ow_LevelAnnotation' => 'Annotáció',
	'ow_OptionAttribute' => 'Tulajdon',
	'ow_OptionAttributeOption' => 'Opció',
	'ow_OptionAttributeOptions' => 'Opciók',
	'ow_OptionAttributeValues' => 'Opció értékek',
	'ow_OtherDefinedMeaning' => 'Egyéb definiált jelentés',
	'ow_PopupAnnotation' => 'Annotáció',
	'ow_Relations' => 'Relációk',
	'ow_RelationType' => 'Reláció típusa',
	'ow_Spelling' => 'Helyesírás',
	'ow_Synonyms' => 'Szinonímák',
	'ow_SynonymsAndTranslations' => 'Szinonímák és fordítások',
	'ow_Source' => 'Forrás',
	'ow_SourceIdentifier' => 'Forrásazonosító',
	'ow_TextAttribute' => 'Tulajdonság',
	'ow_Text' => 'Szöveg',
	'ow_TextAttributeValues' => 'Egyszerű szövegek',
	'ow_TranslatedTextAttribute' => 'Tulajdonság',
	'ow_TranslatedText' => 'Lefordított szöveg',
	'ow_TranslatedTextAttributeValue' => 'Szöveg',
	'ow_TranslatedTextAttributeValues' => 'Fordítandó szöveg',
	'ow_LinkAttribute' => 'Tulajdonság',
	'ow_LinkAttributeValues' => 'Hivatkozások',
	'ow_Property' => 'Tulajdonság',
	'ow_Value' => 'Érték',
	'ow_meaningsoftitle' => '„$1” jelentései',
	'ow_meaningsofsubtitle' => '<em>Wiki hivatkozás:</em> [[$1]]',
	'ow_Permission_denied' => '<h2>Engedély megtagadva</h2>',
	'ow_copy_no_action_specified' => 'Kérlek adj meg egy akciót',
	'ow_copy_help' => 'Egy nap, lehet hogy segítünk neked.',
	'ow_please_proved_dmid' => 'Úgy tűnik, hiányzik egy „?dmid=<ID>” (dmid= Defined Meaning ID, definiált jelentés azonosító) abból, amit megadtál.<br />
Kérlek lépj kapcsolatba egy szerveradminisztrátorral.',
);

/** Interlingua (Interlingua)
 * @author Malafaya
 * @author McDutchie
 */
$wdMessages['ia'] = array(
	'languages' => 'Wikidatos: Gestion de linguas',
	'langman_title' => 'Gestion de linguas',
	'datasearch' => 'Wikidatos: Recerca de datos',
	'ow_save' => 'Immagazinar',
	'ow_history' => 'Historia',
	'ow_datasets' => 'Selection de collection de datos',
	'ow_noedit_title' => 'Nulle permission de modificar',
	'ow_noedit' => 'Tu non ha le permission de modificar paginas in le collection de datos "$1".
Per favor vide [[{{MediaWiki:Ow editing policy url}}|nostre politica de modification]].',
	'ow_uipref_datasets' => 'Vista predefinite',
	'ow_uiprefs' => 'Wikidatos',
	'ow_none_selected' => 'Nihil seligite',
	'ow_conceptmapping_help' => '<p>actiones possibile: <ul>
<li>&action=insert&<data_context_prefix>=<defined_id>&...  inserer un correspondentia</li>
<li>&action=get&concept=<concept_id>  revider un correspondentia</li>
<li>&action=list_sets  retornar un lista de possibile prefixos de contexto de datos e a que illos refere.</li>
<li>&action=get_associated&dm=<defined_meaning_id>&dc=<dataset_context_prefix> pro un significato definite in un concepto, retornar tote le alteres</li>
<li>&action=help  Monstrar adjuta utile.</li>
</ul></p>',
	'ow_conceptmapping_uitext' => '<p>Le carta de conceptos te permitte identificar qual significato definite in un collection de datos es identic a significatos definite in altere collectiones de datos.</p>',
	'ow_conceptmapping_no_action_specified' => 'Le action "$1" non es supportate.',
	'ow_dm_OK' => 'OK',
	'ow_dm_not_present' => 'non entrate',
	'ow_dm_not_found' => 'non trovate in le base de datos o mal formate',
	'ow_mapping_successful' => 'Insereva tote le campos marcate con [OK]<br />',
	'ow_mapping_unsuccessful' => 'Debe haber al minus duo significatos definite ante que io pote ligar los.',
	'ow_will_insert' => 'Inserera lo sequente:',
	'ow_contents_of_mapping' => 'Correspondentias',
	'ow_available_contexts' => 'Contextos disponibile',
	'ow_add_concept_link' => 'Adder un ligamine a altere conceptos',
	'ow_concept_panel' => 'Pannello de conceptos',
	'ow_dm_badtitle' => 'Iste pagina non puncta verso alcun Significato Definite (concepto).
Per favor verifica le adresse web.',
	'ow_dm_missing' => 'Iste pagina pare punctar verso un Significato Definite (concepto) non existente.
Per favor verifica le adresse web.',
	'ow_AlternativeDefinition' => 'Definition alternative',
	'ow_AlternativeDefinitions' => 'Definitiones alternative',
	'ow_Annotation' => 'Annotation',
	'ow_ApproximateMeanings' => 'Significatos approximative',
	'ow_ClassAttributeAttribute' => 'Attributo',
	'ow_ClassAttributes' => 'Attributos de classe',
	'ow_ClassAttributeLevel' => 'Nivello',
	'ow_ClassAttributeType' => 'Typo',
	'ow_ClassMembership' => 'Membrato de classe',
	'ow_Collection' => 'Collection',
	'ow_CollectionMembership' => 'Membrato de collection',
	'ow_Definition' => 'Definition',
	'ow_DefinedMeaningAttributes' => 'Annotation',
	'ow_DefinedMeaning' => 'Significato definite',
	'ow_DefinedMeaningReference' => 'Significato definite',
	'ow_ExactMeanings' => 'Significatos exacte',
	'ow_Expression' => 'Expression',
	'ow_ExpressionMeanings' => 'Significatos de expression',
	'ow_Expressions' => 'Expressiones',
	'ow_IdenticalMeaning' => 'Significato identic?',
	'ow_IncomingRelations' => 'Relationes entrante',
	'ow_GotoSource' => 'Ir al fonte',
	'ow_Language' => 'Lingua',
	'ow_LevelAnnotation' => 'Annotation',
	'ow_OptionAttribute' => 'Proprietate',
	'ow_OptionAttributeOption' => 'Option',
	'ow_OptionAttributeOptions' => 'Optiones',
	'ow_OptionAttributeValues' => 'Valores de option',
	'ow_OtherDefinedMeaning' => 'Altere significato definite',
	'ow_PopupAnnotation' => 'Annotation',
	'ow_Relations' => 'Relationes',
	'ow_RelationType' => 'Typos de relation',
	'ow_Spelling' => 'Orthographia',
	'ow_Synonyms' => 'Synonymos',
	'ow_SynonymsAndTranslations' => 'Synonymos e traductiones',
	'ow_Source' => 'Fonte',
	'ow_SourceIdentifier' => 'Identificator de fonte',
	'ow_TextAttribute' => 'Proprietate',
	'ow_Text' => 'Texto',
	'ow_TextAttributeValues' => 'Textos simple',
	'ow_TranslatedTextAttribute' => 'Proprietate',
	'ow_TranslatedText' => 'Texto traducite',
	'ow_TranslatedTextAttributeValue' => 'Texto',
	'ow_TranslatedTextAttributeValues' => 'Textos traducibile',
	'ow_LinkAttribute' => 'Proprietate',
	'ow_LinkAttributeValues' => 'Ligamines',
	'ow_Property' => 'Proprietate',
	'ow_Value' => 'Valor',
	'ow_meaningsoftitle' => 'Significatos de "$1"',
	'ow_meaningsofsubtitle' => '<em>Ligamine Wiki:</em> [[$1]]',
	'ow_Permission_denied' => '<h2>Permission refusate</h2>',
	'ow_copy_no_action_specified' => 'Per favor specifica un action',
	'ow_copy_help' => 'Le adjuta non es ancora implementate.',
	'ow_please_proved_dmid' => 'Pare que manca un "?dmid=<ID>" a tu entrata (dmid=ID del Significato Definite)<br />
Per favor contacta un administrator del servitor.',
	'ow_please_proved_dc1' => 'Pare que manca un "?dc1=<alcun cosa>" a tu entrata (dc1=contexto de collection de datos 1, le collection de datos AB le qual se copia)<br />
Per favor contacta un administrator de servitor.',
	'ow_please_proved_dc2' => 'Pare que manca un "?dc2=<alcun cosa>" a tu entrata (dc2=contexto de collection de datos 2, le collection de datos VERSO le qual se copia)<br />
Per favor contacta un administrator del servitor.',
	'ow_copy_successful' => '<h2>Copia succedite</h2>
Tu datos pare haber essite copiate con successo.
Non oblida de verificar isto ben!',
	'ow_copy_unsuccessful' => '<h3>Copia non succedite</h3>
Nulle operation de copia ha essite executate.',
	'ow_no_action_specified' => '<h3>Nulle action specificate</h3>
Per favor tu ha venite a iste pagina directemente? Normalmente tu non necessita esser hic.',
	'ow_db_consistency_not_found' => '<h2>Error</h2>
Il ha un problema con le consistentia del base de datos. Wikidatos non pote trovar datos valide connectite a iste ID de significato definite.
Illo pote esser perdite.
Per favor contacta le operator o administrator del servitor.',
);

/** Indonesian (Bahasa Indonesia)
 * @author Irwangatot
 * @author Rex
 */
$wdMessages['id'] = array(
	'languages' => 'Wikidata: Pengelola bahasa',
	'langman_title' => 'Pengelola bahasa',
	'datasearch' => 'Wikidata: Pencarian data',
	'ow_save' => 'Simpan',
	'ow_history' => 'Versi',
	'ow_datasets' => 'Pemilihan set-data',
	'ow_noedit_title' => 'Tidak memiliki hak untuk menyunting',
	'ow_noedit' => 'Anda tidak diizinkan menyunting halaman-halaman di set data "$1".
Lihat: [[{{MediaWiki:Ow editing policy url}}|Kebijakan penyuntingan kami]].',
	'ow_uipref_datasets' => 'Tampilan baku',
	'ow_uiprefs' => 'Wikidata',
	'ow_none_selected' => 'Belum dipilih',
	'ow_conceptmapping_no_action_specified' => 'Maaf, sistem tidak mengerti untuk "$1".',
	'ow_dm_OK' => 'OK',
	'ow_dm_not_present' => 'tidak dimasukkan',
	'ow_Language' => 'Bahasa',
	'ow_OptionAttributeOptions' => 'Pilihan',
);

/** Ido (Ido)
 * @author Malafaya
 */
$wdMessages['io'] = array(
	'ow_save' => 'Registragar',
	'ow_history' => 'Versionaro',
	'ow_uiprefs' => 'Wikidata',
	'ow_conceptmapping_no_action_specified' => 'Pardonez! Me ne savas quale "$1".',
	'ow_Annotation' => 'Noto',
	'ow_ClassAttributeAttribute' => 'Atributo',
	'ow_ClassAttributes' => 'Atributi di klaso',
	'ow_ClassAttributeLevel' => 'Nivelo',
	'ow_ClassAttributeType' => 'Tipo',
	'ow_ClassMembership' => 'Klaso-membrari',
	'ow_Collection' => 'Kolektajo',
	'ow_CollectionMembership' => 'Kolektajo-membrari',
	'ow_Definition' => 'Defino',
	'ow_DefinedMeaningAttributes' => 'Noto',
	'ow_IdenticalMeaning' => 'Identa senco?',
	'ow_GotoSource' => 'Irar al fonto',
	'ow_Language' => 'Linguo',
	'ow_LevelAnnotation' => 'Noto',
	'ow_OptionAttribute' => 'Proprajo',
	'ow_OptionAttributeOption' => 'Selekto',
	'ow_OptionAttributeOptions' => 'Selekti',
	'ow_PopupAnnotation' => 'Noto',
	'ow_Relations' => 'Relati',
	'ow_Spelling' => 'Espelado',
	'ow_Synonyms' => 'Sinonimi',
	'ow_SynonymsAndTranslations' => 'Sinonimi e tradukuri',
	'ow_Source' => 'Fonto',
	'ow_TextAttribute' => 'Proprajo',
	'ow_Text' => 'Texto',
	'ow_TranslatedTextAttribute' => 'Proprajo',
	'ow_TranslatedTextAttributeValue' => 'Texto',
	'ow_LinkAttribute' => 'Proprajo',
	'ow_LinkAttributeValues' => 'Ligili',
	'ow_Property' => 'Proprajo',
	'ow_Value' => 'Valoro',
	'ow_meaningsoftitle' => 'Senci di "$1"',
);

/** Icelandic (Íslenska)
 * @author S.Örvarr.S
 */
$wdMessages['is'] = array(
	'ow_save' => 'Vista',
	'ow_uipref_datasets' => 'Sjálfgefið útlit',
	'ow_uiprefs' => 'Wikigögn',
	'ow_dm_OK' => 'Í lagi',
);

/** Italian (Italiano)
 * @author Darth Kule
 * @author Melos
 * @author Nemo bis
 */
$wdMessages['it'] = array(
	'ow_save' => 'Salva',
	'ow_history' => 'Cronologia',
	'ow_Language' => 'Lingua',
	'ow_OptionAttributeOptions' => 'Opzioni',
	'ow_Value' => 'Valore',
	'ow_Permission_denied' => '<h2>Permesso negato</h2>',
);

/** Japanese (日本語)
 * @author Aotake
 * @author Fryed-peach
 * @author Hosiryuhosi
 * @author JtFuruhata
 */
$wdMessages['ja'] = array(
	'languages' => 'ウィキデータ: 言語マネージャ',
	'langman_title' => '言語マネージャ',
	'datasearch' => 'ウィキデータ: データ検索',
	'ow_save' => '保存',
	'ow_history' => '履歴',
	'ow_datasets' => 'データセット',
	'ow_noedit_title' => '編集権限がありません',
	'ow_noedit' => 'データセット "$1" の編集権限がありません。[[{{MediaWiki:Ow editing policy url}}|編集方針]]をご覧ください。',
	'ow_uipref_datasets' => 'デフォルト表示:',
	'ow_uiprefs' => 'ウィキデータ',
	'ow_none_selected' => '（選択なし）',
	'ow_conceptmapping_help' => '<p>可能な操作: <ul>
<li>&action=insert&<data_context_prefix>=<defined_id>&...  関連付けを作成</li>
<li>&action=get&concept=<concept_id>  関連する内容を取得</li>
<li>&action=list_sets  取得可能なデータの接頭辞とその関連項目の一覧を取得</li>
<li>&action=get_associated&dm=<defined_meaning_id>&dc=<dataset_context_prefix> ある概念に対する意味定義の一つから他の意味定義すべてを取得</li>
<li>&action=help  ヘルプの表示</li>
</ul></p>',
	'ow_conceptmapping_uitext' => '<p>コンセプトマップでは、あるデータセットに登録されている意味定義と他のデータセットにある同一概念の意味定義を関連付けることが可能です。</p>',
	'ow_conceptmapping_no_action_specified' => '"$1" という操作はサポートされていません。',
	'ow_dm_OK' => 'OK',
	'ow_dm_not_present' => '指定がありません',
	'ow_dm_not_found' => 'データベースに存在しないか、不正な指定です',
	'ow_mapping_successful' => '関連する全てのフィールドを[OK]とマークしました<br />',
	'ow_mapping_unsuccessful' => '関連付けを作成するには、少なくとも意味定義が2つ登録されている必要があります。',
	'ow_will_insert' => '以下の内容で作成します:',
	'ow_contents_of_mapping' => '関連付けの内容',
	'ow_available_contexts' => '有効な関連内容',
	'ow_add_concept_link' => '他の概念とのリンクを作成',
	'ow_concept_panel' => '概念パネル',
	'ow_dm_badtitle' => 'このページが指し示す意味定義（概念）は何もありません。URLの指定が正しいか確認してください。',
	'ow_dm_missing' => 'このページは存在しない意味定義（概念）を指し示しているように見えます。URLの指定が正しいか確認してください。',
	'ow_AlternativeDefinition' => '代替定義',
	'ow_AlternativeDefinitions' => '代替定義',
	'ow_Annotation' => '注釈',
	'ow_ApproximateMeanings' => 'おおよその意味',
	'ow_ClassAttributeAttribute' => '属性',
	'ow_ClassAttributes' => 'クラス属性',
	'ow_ClassAttributeLevel' => 'レベル',
	'ow_ClassAttributeType' => 'タイプ',
	'ow_ClassMembership' => 'クラス帰属',
	'ow_Collection' => 'コレクション',
	'ow_Definition' => '定義',
	'ow_DefinedMeaningAttributes' => '注釈',
	'ow_Expression' => '表現',
	'ow_Expressions' => '表現',
	'ow_Language' => '言語',
	'ow_LevelAnnotation' => '注釈',
	'ow_OptionAttribute' => 'プロパティ',
	'ow_OptionAttributeOption' => 'オプション',
	'ow_OptionAttributeOptions' => 'オプション',
	'ow_Relations' => '関係',
	'ow_RelationType' => '関係型',
	'ow_Remove' => '除去',
	'ow_Spelling' => 'スペル',
	'ow_Synonyms' => '同義語',
	'ow_SynonymsAndTranslations' => '同義語と翻訳語',
	'ow_Source' => 'ソース',
	'ow_TextAttribute' => 'プロパティ',
	'ow_Text' => 'テキスト',
	'ow_TextAttributeValues' => 'プレーンテキスト',
	'ow_TranslatedTextAttribute' => 'プロパティ',
	'ow_TranslatedText' => '翻訳文',
	'ow_TranslatedTextAttributeValue' => 'テキスト',
	'ow_TranslatedTextAttributeValues' => '翻訳可能なテキスト',
	'ow_LinkAttribute' => 'プロパティ',
	'ow_LinkAttributeValues' => 'リンク',
	'ow_Property' => 'プロパティ',
	'ow_Value' => '値',
	'ow_meaningsoftitle' => '「$1」の意味',
	'ow_meaningsofsubtitle' => '<em>ウィキリンク:</em> [[$1]]',
	'ow_Permission_denied' => '<h2>不許可</h2>',
	'ow_copy_no_action_specified' => '操作を指定してください',
	'ow_copy_successful' => '<h2>コピー成功</h2>
あなたのデータのコピーは成功したようです。確実性のためには二重に確認することを忘れないでください。',
	'ow_copy_unsuccessful' => '<h3>コピー失敗</h3>
コピー処理は行われませんでした。',
	'ow_no_action_specified' => '<h3>操作が指定されていません</h3>
もしかすると、あなたは直接このページに来たのでしょうか？通常はあなたがここにいる必要はありません。',
	'ow_show' => '表示',
	'ow_create' => '作成',
);

/** Javanese (Basa Jawa)
 * @author Meursault2004
 * @author Pras
 */
$wdMessages['jv'] = array(
	'languages' => 'Wikidata: Pangurus basa',
	'langman_title' => 'Pangurus basa',
	'datasearch' => 'Wikidata: Panggolèkan data',
	'ow_save' => 'Simpen',
	'ow_history' => 'Sajarah',
	'ow_datasets' => 'Sèlèksi data-set',
	'ow_noedit_title' => 'Ora ana idin kanggo nyunting',
	'ow_noedit' => 'Panjenengan ora diparengaké nyunting kaca-kaca ing dataset "$1".
Mangga mirsani [[{{MediaWiki:Ow editing policy url}}|kawicaksanan panyuntingan kita]].',
	'ow_uipref_datasets' => 'Pamandhangan baku',
	'ow_uiprefs' => 'Wikidata',
	'ow_none_selected' => 'Ora ana sing disèlèksi',
	'ow_conceptmapping_help' => "<p>tumindak sing bisa diayahi: <ul>
<li>&action=insert&<data_context_prefix>=<defined_id>&...  nyisipaké pamétaan (''mapping'')</li>
<li>&action=get&concept=<concept_id>  waca pamétaan ''mapping'' manèh</li>
<li>&action=list_sets  mbalêkaké dhaptar awalan kontèks data sing bisa lan apa sing dirujuk.</li>
<li>&action=get_associated&dm=<defined_meaning_id>&dc=<dataset_context_prefix> kanggo siji makna ing konsèp, balèkaké kabèh liyané</li>
<li>&action=help  Tuduhaké pitulung.</li>
</ul></p>",
	'ow_conceptmapping_uitext' => '<p>Pamétaan konsèp agawé panjenengan bisa ngenali makna  endi jroning sèt-data  padha karo makna jroning sèt-data liya.</p>',
	'ow_conceptmapping_no_action_specified' => 'Nuwun sèwu, aku ora ngerti carané "$1".',
	'ow_dm_OK' => 'OK',
	'ow_dm_not_present' => 'ora dilebokaké',
	'ow_dm_not_found' => 'ora ditemokaké ing basis data utawa rusak',
	'ow_mapping_successful' => "Métakaké kabèh kothak (''field'') sing ditndhani [OK]<br />",
	'ow_mapping_unsuccessful' => 'Kudu duwé saora-orané loro makna sadurungé bisa disambungaké',
	'ow_will_insert' => 'Bakal nyisipaké:',
	'ow_contents_of_mapping' => "Isi pamétaan (''mapping'')",
	'ow_available_contexts' => 'Kontèks sing ana',
	'ow_add_concept_link' => 'Nambah pranala menyang konsèp liyané',
	'ow_concept_panel' => 'Panèl Konsèp',
	'ow_dm_badtitle' => "Kaca iki ora nunjuk sawijining makna (''DefinedMeaning'') (konsèp).
Mangga priksa alamat wèb-é.",
	'ow_dm_missing' => 'Kaca iki kayané nunjuk marang makna (konsèp) sing ora ana.
Mangga priksa alamat wèb.',
	'ow_AlternativeDefinition' => 'Définisi alternatif',
	'ow_AlternativeDefinitions' => 'Définisi alternatif',
	'ow_Annotation' => 'Anotasi',
	'ow_ApproximateMeanings' => 'Makna kira-kira',
	'ow_ClassAttributeAttribute' => 'Atribut',
	'ow_ClassAttributes' => 'Atribut klas',
	'ow_ClassAttributeLevel' => 'Tingkatan',
	'ow_ClassAttributeType' => 'Jenis',
	'ow_ClassMembership' => 'Kaanggotaan klas',
	'ow_Collection' => 'Kolèksi',
	'ow_CollectionMembership' => 'Kaanggotan kolèksi',
	'ow_Definition' => 'Définisi',
	'ow_DefinedMeaningAttributes' => 'Anotasi',
	'ow_DefinedMeaning' => 'Arti sing didéfinisi',
	'ow_DefinedMeaningReference' => 'Arti sing didéfinisi',
	'ow_ExactMeanings' => 'Makna sing persis',
	'ow_Expression' => 'Èksprèsi',
	'ow_ExpressionMeanings' => 'Makna èksprèsi',
	'ow_Expressions' => 'Èksprèsi',
	'ow_IdenticalMeaning' => 'Tegesé mèmper?',
	'ow_IncomingRelations' => 'Rélasi sing teka mlebu',
	'ow_GotoSource' => 'Menyang sumber',
	'ow_Language' => 'Basa',
	'ow_LevelAnnotation' => 'Anotasi',
	'ow_OptionAttribute' => 'Sifat',
	'ow_OptionAttributeOption' => 'Opsi',
	'ow_OptionAttributeOptions' => 'Opsi',
	'ow_OptionAttributeValues' => 'Bijih opsi',
	'ow_OtherDefinedMeaning' => 'Makna liyané',
	'ow_PopupAnnotation' => 'Anotasi',
	'ow_Relations' => 'Relasi',
	'ow_RelationType' => 'Jenis rélasi',
	'ow_Spelling' => 'Pasang aksara (éjaan)',
	'ow_Synonyms' => 'Sinonim',
	'ow_SynonymsAndTranslations' => 'Sinonim lan jarwa',
	'ow_Source' => 'Sumber',
	'ow_SourceIdentifier' => 'Idèntifikator sumber',
	'ow_TextAttribute' => 'Sifat',
	'ow_Text' => 'Tèks',
	'ow_TextAttributeValues' => 'Tèks-tèks prasaja',
	'ow_TranslatedTextAttribute' => 'Sifat',
	'ow_TranslatedText' => 'Tèks sing wis dipertal',
	'ow_TranslatedTextAttributeValue' => 'Tèks',
	'ow_TranslatedTextAttributeValues' => 'Tèks sing bisa dipertal',
	'ow_LinkAttribute' => 'Sifat',
	'ow_LinkAttributeValues' => 'Pranala',
	'ow_Property' => 'Sifat',
	'ow_Value' => 'Bijih',
	'ow_meaningsoftitle' => 'Arti saka "$1"',
	'ow_meaningsofsubtitle' => '<em>Pranala wiki:</em> [[$1]]',
	'ow_Permission_denied' => '<h2>IDIN DITOLAK</h2>',
	'ow_copy_no_action_specified' => 'Tulung rincèkna sawijining aksi',
	'ow_copy_help' => 'Ing sawijining dina ing tembé, kita mbok-menawa bisa nulungi panjenengan.',
	'ow_please_proved_dmid' => 'Katonané input panjenengan kakurangan "?dmid=<ID>" (dmid=Defined Meaning ID)<br />
Mangga ngubungi administrator server.',
	'ow_please_proved_dc1' => 'Katonané input panjenengan kakuranagan "?dc1=<something>" (dc1=dataset context 1, dataset to copy FROM)<br />
Mangga ngubungi administrator server.',
	'ow_please_proved_dc2' => 'Katonané input panjenengan kakurangan "?dc2=<something>" (dc2=dataset context 2, dataset to copy TO)<br />
Mangga ngubungi administrator server.',
	'ow_copy_successful' => '<h2>Kopi suksès</h2>
Data panjenengan katoné wis dikopi sacara suksès.
Aja lali mriksa manèh supaya pasti!',
	'ow_copy_unsuccessful' => '<h3>Kopi ora suksès</h3>
Ora ana operasi kopi sing wis dumadi.',
	'ow_no_action_specified' => '<h3>Ora ana aksi sing dispésifikasi</h3>
Mbok-menawa panjenengan langsung tekan kaca iki? Biasané panjenengan ora perlu ing kéné.',
	'ow_db_consistency_not_found' => '<h2>Kasalahan</h2>
Ana masalah bab konsistènsi basis data, wikidata ora bisa nemokaké data valid sing kagandhèng karo makna iki ID.
Manawa ilang.
Mangga hubungi operator server utawa pangurus.',
);

/** Georgian (ქართული)
 * @author Malafaya
 * @author Sopho
 */
$wdMessages['ka'] = array(
	'languages' => 'ვიკიდატა: ენების მენეჯერი',
	'langman_title' => 'ენების მენეჯერი',
	'datasearch' => 'ვიკიდატა: მონაცემთა ძიება',
	'ow_save' => 'შენახვა',
	'ow_history' => 'ისტორია',
	'ow_datasets' => 'მონაცემთა ნაკრების შერჩევა',
	'ow_noedit_title' => 'თქვენ არ გაქვთ რედაქტირების უფლება',
	'ow_noedit' => 'თქვენ არ გაქვთ მონაცემთა ნაკრებში "$1" გვერდების რედაქტირების ნებართვა. იხილეთ [[{{MediaWiki:Ow editing policy url}}|ჩვენი სარედაქციო პოლიტიკა]].',
	'ow_uipref_datasets' => 'სტანდარტული ჩვენება',
	'ow_uiprefs' => 'ვიკიდატა',
	'ow_none_selected' => 'არაფერია შერჩეული',
	'ow_conceptmapping_uitext' => '<p>ცნებათა შესაბამისობა (Concept Mapping) საშუალებას გაძლევთ დაადგინოთ, ამა თუ იმ მონაცემთა ნაკრებში რომელი განსაზღვრული მნიშვნელობაა სხვა მონაცემთა ნაკრებებში არსებულ განსაზღვრულ მნიშვნელობათა იდენტური.</p>',
	'ow_conceptmapping_no_action_specified' => 'მოქმედება "$1" არ არის გათვალისწინებული.',
	'ow_dm_not_present' => 'არ არის შეტანილი',
	'ow_mapping_unsuccessful' => 'საჭიროა მინიმუმ ორი განსაზღვრული მნიშვნელობა იმისათვის, რათა მოხდეს მათი ერთმანეთთან დაკავშირება.',
	'ow_will_insert' => 'დაემატება შემდეგი:',
	'ow_available_contexts' => 'არსებული კონტექსტები',
	'ow_add_concept_link' => 'სხვა ცნებებზე ბმულის დამატება',
	'ow_concept_panel' => 'ცნებების პანელი',
	'ow_dm_badtitle' => 'ეს გვერდი არ უთითებს არცერთ განსაზღვრულ მნიშვნელობას (ცნებას). თუ შეიძლება, შეამოწმეთ ვებ-მისამართი.',
	'ow_dm_missing' => 'ეს გვერდი, როგორც ჩანს, უთითებს არარსებულ განსაზღვრულ მნიშვნელობას (ცნებას). თუ შეიძლება, შეამოწმეთ ვებ-მისამართი.',
	'ow_AddHint' => 'შეიყვანეთ ახალი მწკრივები დასამატებლად',
	'ow_AlternativeDefinition' => 'ალტერნატიული განსაზღვრება',
	'ow_AlternativeDefinitions' => 'ალტერნატიული განსაზღვრებები',
	'ow_Annotation' => 'შენიშვნა',
	'ow_ApproximateMeanings' => 'მიახლოებითი მნიშვნელობები',
	'ow_ClassAttributeAttribute' => 'ატრიბუტი',
	'ow_ClassAttributes' => 'კლასის ატრიბუტები',
	'ow_ClassAttributeLevel' => 'დონე',
	'ow_ClassAttributeType' => 'ტიპი',
	'ow_ClassMembership' => 'გაერთიანებული კლასებში',
	'ow_Collection' => 'კოლექცია',
	'ow_Collection_colon' => 'კოლექცია:',
	'ow_CollectionMembership' => 'გაერთიანებული კოლექციებში',
	'ow_Definition' => 'განსაზღვრება',
	'ow_DefinedMeaningAttributes' => 'შენიშვნა',
	'ow_DefinedMeaning' => 'განსაზღვრული მნიშვნელობა',
	'ow_DefinedMeaningReference' => 'განსაზღვრული მნიშვნელობა',
	'ow_ExactMeanings' => 'ზუსტი მნიშვნელობები',
	'ow_Expression' => 'გამოთქმა',
	'ow_ExpressionMeanings' => 'გამოთქმის მნიშვნელობა',
	'ow_Expressions' => 'გამოთქმები',
	'ow_IdenticalMeaning' => 'იდენტური მნიშვნელობა?',
	'ow_IncomingRelations' => 'შემომავალი ურთიერთობები',
	'ow_GotoSource' => 'იხილეთ წყარო',
	'ow_Language' => 'ენა',
	'ow_LevelAnnotation' => 'შენიშვნა',
	'ow_OptionAttribute' => 'თვისება',
	'ow_OptionAttributeOption' => 'პარამეტრი',
	'ow_OptionAttributeOptions' => 'პარამეტრები',
	'ow_OptionAttributeValues' => 'პარამეტრების მნიშვნელობები',
	'ow_OtherDefinedMeaning' => 'სხვა განსაზღვრული მნიშვნელობა',
	'ow_PopupAnnotation' => 'შენიშვნა',
	'ow_Relations' => 'ურთიერთობები',
	'ow_RelationType' => 'ურთიერთობის ტიპი',
	'ow_Remove' => 'წაშლა',
	'ow_RemoveHint' => 'მონიშნეთ წასაშლელი მწკრივები',
	'ow_Spelling' => 'ორთოგრაფია',
	'ow_SuggestHint' => 'დააწკაპუნეთ მონიშვნის შესაცვლელად',
	'ow_Synonyms' => 'სინონიმები',
	'ow_SynonymsAndTranslations' => 'სინონიმები და თარგმანი',
	'ow_Source' => 'წყარო',
	'ow_SourceIdentifier' => 'წყაროს იდენტიფიკატორი',
	'ow_TextAttribute' => 'თვისება',
	'ow_Text' => 'ტექსტი',
	'ow_TextAttributeValues' => 'უბრალო ტექსტები',
	'ow_TranslatedTextAttribute' => 'თვისება',
	'ow_TranslatedText' => 'თარგმნილი ტექსტი',
	'ow_TranslatedTextAttributeValue' => 'ტექსტი',
	'ow_TranslatedTextAttributeValues' => 'თარგმნადი ტექსტები',
	'ow_LinkAttribute' => 'თვისება',
	'ow_LinkAttributeValues' => 'ბმულები',
	'ow_Property' => 'თვისება',
	'ow_Value' => 'მნიშვნელობა',
	'ow_meaningsoftitle' => '"$1"-ის მნიშვნელობები',
	'ow_meaningsofsubtitle' => '<em>ვიკი ბმული:</em> [[$1]]',
	'ow_copy_no_action_specified' => 'თუ შეიძლება, მიუთითეთ მოქმედება',
	'ow_copy_help' => 'დახმარება ჯერ არ მოქმედებს.',
	'ow_please_proved_dmid' => 'როგორც ჩანს, თქვენს მიერ შეტანილ მონაცემებს აკლია "?dmid=<ID>" (dmid=განსაზღვრული მნიშვნელობის იდენტიფიკატორი)<br />თუ შეიძლება დაუკავშირდით სერვერის ადმინისტრატორს.',
	'ow_please_proved_dc1' => 'როგორც ჩანს, თქვენს მიერ შეტანილ მონაცემებს აკლია "?dc1=<რაღაცა>" (dc1=მონაცემთა ნაკრების კონტექსტი 1, მონაცემთა ნაკრები, საიდანაც უნდა მოხდეს კოპირება)<br />თუ შეიძლება დაუკავშირდით სერვერის ადმინისტრატორს.',
	'ow_please_proved_dc2' => 'როგორც ჩანს, თქვენს მიერ შეტანილ მონაცემებს აკლია "?dc2=<რაღაცა>" (dc2=მონაცემთა ნაკრების კონტექსტი 2, მონაცემთა ნაკრები, სადაც უნდა მოხდეს კოპირება)<br />თუ შეიძლება დაუკავშირდით სერვერის ადმინისტრატორს.',
	'ow_no_action_specified' => '<h3>მოქმედება არ იყო მითითებული</h3> იქნებ ამ გვერდზე პირდაპირ შემოხვედით? ნორმალური მუშაობის პირობებში აქ არ უნდა აღმოჩენილიყავით.',
	'ow_needs_xlation_title' => 'სათარგმნი გამოთქმები',
	'ow_needs_xlation_source_lang' => 'საწყისი ენა:',
	'ow_needs_xlation_dest_lang' => 'სამიზნე ენა:',
	'ow_needs_xlation_no_dest_lang' => 'თუ შეიძლება, მიუთითეთ სამიზნე ენა.',
	'ow_show' => 'ჩვენება',
);

/** Kazakh (China) (‫قازاقشا (جۇنگو)‬) */
$wdMessages['kk-cn'] = array(
	'langman_title' => 'تٴىلدەردٴى مەڭگەرۋ',
);

/** Kazakh (Kazakhstan) (‪Қазақша (Қазақстан)‬) */
$wdMessages['kk-kz'] = array(
	'langman_title' => 'Тілдерді меңгеру',
);

/** Kazakh (Turkey) (‪Qazaqşa (Türkïya)‬) */
$wdMessages['kk-tr'] = array(
	'langman_title' => 'Tilderdi meñgerw',
);

/** Khmer (ភាសាខ្មែរ)
 * @author Chhorran
 * @author Lovekhmer
 * @author Thearith
 * @author គីមស៊្រុន
 */
$wdMessages['km'] = array(
	'languages' => 'Wikidata: អ្នកគ្រប់គ្រង​ភាសា',
	'langman_title' => 'អ្នកគ្រប់គ្រង​ភាសា',
	'datasearch' => 'Wikidata: ស្វែងរក​ទិន្នន័យ',
	'ow_save' => 'រក្សាទុក',
	'ow_history' => 'ប្រវត្តិ',
	'ow_noedit_title' => 'មិនអនុញ្ញាត​ឱ្យ​កែប្រែទេ',
	'ow_uipref_datasets' => 'បង្ហាញ​តាមលំនាំដើម',
	'ow_uiprefs' => 'ទិន្នន័យ​វិគី',
	'ow_none_selected' => 'គ្មានអ្វីត្រូវបានជ្រើសយកទេ',
	'ow_conceptmapping_no_action_specified' => 'អភ័យទោស, ខ្ញុំមិនដឹងពីរបៀប "$1" ទេ។',
	'ow_dm_OK' => 'យល់ព្រម',
	'ow_dm_not_present' => 'មិនបានបញ្ចូល',
	'ow_will_insert' => 'នឹង​ដាក់បញ្ចូល​ដូចតទៅ:',
	'ow_available_contexts' => 'បរិបទ​ដែល​អាចរកបាន',
	'ow_AlternativeDefinition' => 'និយមន័យ​ឆ្លាស់',
	'ow_AlternativeDefinitions' => 'និយមន័យ​ឆ្លាស់',
	'ow_Annotation' => 'ចំណារពន្យល់',
	'ow_ApproximateMeanings' => 'អត្ថន័យ​ប្រហាក់ប្រហែល',
	'ow_ClassAttributeAttribute' => 'សេចក្តីកំណត់',
	'ow_ClassAttributes' => 'ថ្នាក់​គុណលក្ខណៈ',
	'ow_ClassAttributeLevel' => 'កម្រិត',
	'ow_ClassAttributeType' => 'ប្រភេទ',
	'ow_ClassMembership' => 'ថ្នាក់​សមាជិកភាព',
	'ow_Collection' => 'ការប្រមូលផ្តុំ',
	'ow_CollectionMembership' => 'ការប្រមូលផ្តុំសមាជិកភាព',
	'ow_Definition' => 'និយមន័យ',
	'ow_DefinedMeaningAttributes' => 'ចំណារពន្យល់',
	'ow_DefinedMeaning' => 'ន័យដែលបានកំណត់',
	'ow_DefinedMeaningReference' => 'ន័យដែលបានកំណត់',
	'ow_ExactMeanings' => 'ន័យចំ',
	'ow_Expression' => 'កន្សោមពាក្យ',
	'ow_ExpressionMeanings' => 'ន័យរបស់កន្សោមពាក្យ',
	'ow_Expressions' => 'កន្សោមពាក្យ',
	'ow_IdenticalMeaning' => 'អត្ថន័យដូចគ្នា ?',
	'ow_GotoSource' => 'ទៅកាន់ប្រភព',
	'ow_Language' => 'ភាសា',
	'ow_LevelAnnotation' => 'ចំណារពន្យល់',
	'ow_OptionAttribute' => 'លក្ខណៈ',
	'ow_OptionAttributeOption' => 'ជម្រើស',
	'ow_OptionAttributeOptions' => 'ជម្រើស​នានា',
	'ow_OptionAttributeValues' => 'តម្លៃ​នានា​នៃ​ជម្រើស',
	'ow_OtherDefinedMeaning' => 'ន័យដែលត្រូវបានកំណត់ផ្សេងទៀត',
	'ow_PopupAnnotation' => 'ចំណារពន្យល់',
	'ow_Relations' => 'ទំនាក់ទំនង',
	'ow_RelationType' => 'ប្រភេទ​ទំនាក់ទំនង',
	'ow_Spelling' => 'ការប្រកប',
	'ow_Synonyms' => 'វេវចនសព្ទ',
	'ow_SynonymsAndTranslations' => 'វេវចនសព្ទ និង ការបកប្រែ',
	'ow_Source' => 'ប្រភព',
	'ow_SourceIdentifier' => 'គ្រឿងសម្គាល់​ប្រភព',
	'ow_TextAttribute' => 'លក្ខណៈ',
	'ow_Text' => 'អត្ថបទ',
	'ow_TextAttributeValues' => 'អត្ថបទធម្មតា',
	'ow_TranslatedTextAttribute' => 'លក្ខណៈ',
	'ow_TranslatedText' => 'អត្ថបទ​ត្រូវបានប្រែសម្រួល',
	'ow_TranslatedTextAttributeValue' => 'អត្ថបទ',
	'ow_TranslatedTextAttributeValues' => 'អត្ថបទដែលអាចបកប្រែបាន',
	'ow_LinkAttribute' => 'លក្ខណៈ',
	'ow_LinkAttributeValues' => 'តំណភ្ជាប់នានា',
	'ow_Property' => 'លក្ខណៈ',
	'ow_Value' => 'តម្លៃ',
	'ow_meaningsoftitle' => 'និយមន័យ របស់ "$1"',
	'ow_meaningsofsubtitle' => '<em>តំណភ្ជាប់វិគី៖</em> [[$1]]',
	'ow_Permission_denied' => '<h2>សិទ្ធិ​បាន​បដិសេធ</h2>',
	'ow_copy_no_action_specified' => 'សូម សំដៅ មួយសកម្មភាព',
	'ow_copy_help' => 'យើង​អាចជួយអ្នក​នៅ​ថ្ងៃណាមួយ',
	'ow_copy_successful' => '<h2>ចម្លង​ដោយជោគជ័យ</h2>

ទិន្នន័យ​របស់​អ្នក​បង្ហាញ​ថា ត្រូវ​បាន​ចម្លង​ដោយជោគជ័យ​ហើយ​។

ចូរ​កុំ​ភ្លេច​ពិនិត្យ​ឡើងវិញ​ដើម្បី​ឱ្យ​រឹតតែ​ច្បាស់​!',
	'ow_copy_unsuccessful' => '<h3>ចម្លង​បាន​បរាជ័យ</h3>
គ្មាន​សកម្មភាព​ចម្លង​ត្រូវ​បាន​ដាក់ជំនួស​ទេ​។',
	'ow_no_action_specified' => '<h3>គ្មាន​សកម្មភាព​ត្រូវ​បាន​បញ្ជាក់​ទេ</h3>
ប្រហែលជា អ្នក​បាន​ចូលមក​ទំព័រ​នេះ​ដោយផ្ទាល់​? ជាធម្មតា អ្នក​មិនចាំបាច់​ចូលមក​ទីនេះ​ទេ​។',
);

/** Krio (Krio)
 * @author Jose77
 */
$wdMessages['kri'] = array(
	'ow_history' => 'Istri',
);

/** Kinaray-a (Kinaray-a)
 * @author Jose77
 */
$wdMessages['krj'] = array(
	'ow_history' => 'Kasaysayan',
	'ow_dm_OK' => 'OK dun',
);

/** Ripoarisch (Ripoarisch)
 * @author Purodha
 */
$wdMessages['ksh'] = array(
	'languages' => 'Sproche verwallde för Wikidata.',
	'langman_title' => 'Sproche-Verwaldung',
	'datasearch' => 'Wikidata: Date söke',
	'ow_save' => 'Afspeichere',
	'ow_history' => 'Versione',
	'ow_datasets' => 'Date-Knubbel ußsöke',
	'ow_noedit_title' => 'De darfs hee nit ändere',
	'ow_noedit' => 'Do häs kei Jenehmijung, öm em Date-Knubbel „$1“ jet ze ändere.
Jangk Der de [[{{MediaWiki:Ow editing policy url}}|Räjelle un wat nüdesch es zom Ändere]] beloore.',
	'ow_uipref_datasets' => 'Standat-Ansich',
	'ow_uiprefs' => 'Wikidata',
	'ow_none_selected' => 'Nix ußjewählt',
	'ow_conceptmapping_help' => '<p>Müjjelesche Akßjuhne: <ul>
<li><code>&action=insert&<data_context_prefix>=<defined_id>&... </code> donn en Afbelldung dobei</li>
<li><code>&action=get&concept=<concept_id> </code> liß en Afbelldung zerök</li>
<li><code>&action=list_sets </code> jif en Leß met müjjelesche data context prefixes uß, un woh se sesch drop betrecke.</li>
<li><code>&action=get_associated&dm=<defined_meaning_id>&dc=<dataset_context_prefix> </code> jif all andere defined meanings uß för ein bestemmpte defined meaning en enem Konzep</li>
<li><code>&action=help </code> Zeich Hülp.</li>
</ul></p>',
	'ow_conceptmapping_uitext' => '<p>Met em <i lang="en">Concept Mapping</i> läsch mer faß, wat för en <i lang="en">DefinedMeaning</i> em eine <i lang="en">Dataset</i> desellve sin, wi ander <i lang="en">DefinedMeanings</i> en andere <i lang="en">Datasets</i>.</p>',
	'ow_conceptmapping_no_action_specified' => 'Deit mer leid, mer weße nit, wie „$1“ don.',
	'ow_dm_not_present' => 'nit enjejovve',
	'ow_dm_not_found' => 'nit en de Datebank, udder kappott',
	'ow_mapping_successful' => 'Alle met [{{int:Ow dm OK}}] makeete Fellder sin zojeoodenet.<br />',
	'ow_mapping_unsuccessful' => 'Mer möße ald zwei <i lang="en">DefinedMeanings</i> han, ih dat mer se meddenein verlinke kann.',
	'ow_will_insert' => 'Dat hee weed enjesaz:',
	'ow_contents_of_mapping' => 'Ennhallde fun de Afbelldung',
	'ow_available_contexts' => 'Müjjelesche Zosammehäng',
	'ow_add_concept_link' => 'Ene Link op annder Konzeppte dobei don',
	'ow_concept_panel' => 'Konzep Schaltfläsch',
	'ow_dm_badtitle' => 'Di Sigg hee zeich nit op en DefinedMeaning (Konzepp).
Don ens noh dä Webaddress loore.',
	'ow_dm_missing' => 'Di Sigg hee zeich op en <i lang="en">DefinedMeaning</i> (Konzepp) wat et nit jit.
Don ens noh dä Webaddress loore.',
	'ow_Annotation' => 'Aanmerkung',
	'ow_ApproximateMeanings' => 'Onjefähr Bedügninge',
	'ow_ClassAttributeAttribute' => 'Eijeschaff',
	'ow_ClassAttributeType' => 'Tüp',
	'ow_Collection' => 'Aansamlung',
	'ow_DefinedMeaningAttributes' => 'Aanmerkung',
	'ow_DefinedMeaning' => 'Bedüggning',
	'ow_DefinedMeaningReference' => 'Bedüggning',
	'ow_ExactMeanings' => 'Akoraat Bedüggninge',
	'ow_Expression' => 'Ußdrok',
	'ow_ExpressionMeanings' => 'Däm Ußdrok sing Bedüggninge',
	'ow_Expressions' => 'Ußdrök',
	'ow_IdenticalMeaning' => 'Akoraat ejaale Bedüggning?',
	'ow_GotoSource' => 'Jangk noh de Quell',
	'ow_Language' => 'Sprooch',
	'ow_LevelAnnotation' => 'Aanmerkung',
	'ow_OptionAttribute' => 'Eijeschaff',
	'ow_OtherDefinedMeaning' => 'Ander Bedüggning',
	'ow_PopupAnnotation' => 'Aanmerkung',
	'ow_Spelling' => 'Schriefwieß',
	'ow_Synonyms' => 'Wööt met ätwa de sellve Bedüggning',
	'ow_SynonymsAndTranslations' => 'Övversätzunge, un Wööt met ätwa de sellve Bedüggning',
	'ow_Source' => 'Quell',
	'ow_TextAttribute' => 'Eijeschaff',
	'ow_Text' => 'Tex',
	'ow_TextAttributeValues' => 'Eijfach Tex',
	'ow_TranslatedTextAttribute' => 'Eijeschaff',
	'ow_TranslatedText' => 'Övversäzte Tex',
	'ow_TranslatedTextAttributeValue' => 'Tex',
	'ow_TranslatedTextAttributeValues' => 'Övvesazbaa Tex',
	'ow_LinkAttribute' => 'Eijeschaff',
	'ow_LinkAttributeValues' => 'Links',
	'ow_Property' => 'Eijeschaff',
	'ow_Value' => 'Wäät',
	'ow_meaningsoftitle' => 'Bedüggninge fun „$1“',
	'ow_meaningsofsubtitle' => '<em>Wikilink:</em> [[$1]]',
	'ow_Permission_denied' => '<h2>Nit Zojelohße</h2>',
	'ow_copy_no_action_specified' => 'Beß esu joot un donn en Akßjuhn faßlääje',
	'ow_copy_help' => 'Künnt sinn, mer künn Der spääder ens hellefe.',
	'ow_please_proved_dmid' => "'''Verdammp!''' Et süht esu uß, wi wenn en Dingem Oprof hee en
„<code>?dmid=<i>öhnzjät</i></code>“ fähle däät.
Dat <code>dmid</code> bedügg de <i lang=\"en\">defined meaning id</i>,
de Nommer fun dä Bedüggning, woh et dröm jeiht.<br />
Bes esu joot, un saach dat enem Administrator fun däm Server.",
	'ow_please_proved_dc1' => "'''Jösses!''' Et süht esu uß, wi wenn en Dingem Oprof hee en
„<code>?dc1=<i>öhnzjät</i></code>“ fähle däät.
Dat <code>dc1</code> bedügg <i lang=\"en\">dataset content 1</i>,
dä Datesatz för fun ze kopeere.<br />
Bes esu joot, un donn dat enem Administrator fun däm Server wigger sahre.",
	'ow_please_proved_dc2' => "'''Auwieh!''' Et süht esu uß, wi wenn en Dingem Oprof hee en
„<code>?dc2=<i>öhnzjät</i></code>“ fähle däät.
Dat <code>dc2</code> bedügg <i lang=\"en\">dataset content 2</i>,
dä Datesatz för drop ze kopeere.<br />
Bes esu joot, un donn dat enem Administrator fun däm Server verzälle.",
	'ow_copy_successful' => '<h2>Et Koppeere hät jeflupp</h2>
Et süht esu uß, wi wenn Ding Date reschtesch koppeet woode wöhre.
Dengk ävver draan, dat norr_enß nohzeloore!',
	'ow_copy_unsuccessful' => '<h3>Et Kopeere es donevve jejange</h3>
Kein Kopie es jemaat woode.',
	'ow_no_action_specified' => '<h3>Do es keine Opdraach (<code>action</code>) aanjejovve</h3>
Velleisch bes De tiräk op di Sigg hee jespronge?
Nomaal sullt me hee nit hen kumme.',
	'ow_db_consistency_not_found' => '<h2>Fähler</h2>
De Datebangk es nit mieh konsistent.
Wikidata kunnt kein jöltije Date fenge, di met dä Nommer för en DefindeMeaning zosamme passe däte.
Bes esu joot, un saach dat enem Wiki-Köbes, udder ennem Administrator fun däm Server.',
);

/** Kurdish (Latin) (Kurdî / كوردی (Latin))
 * @author Bangin
 */
$wdMessages['ku-latn'] = array(
	'ow_history' => 'Dîrok',
	'ow_Source' => 'Çavkanî',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$wdMessages['lb'] = array(
	'languages' => 'Wikidata: Sproochmanager',
	'langman_title' => 'Sproochmanager',
	'importlangnames' => 'Wikidata: Nimm vun de Sproochen importéieren',
	'importlangnames_title' => 'Nimm vu Sproochen importéieren',
	'importlangnames_not_allowed' => "Dir hutt net déi néideg Rechter fir Nimm vu Sproochen z'importéieren",
	'importlangnames_added' => 'Sproochenimm fir "$1" derbäigesat',
	'datasearch' => 'Wikidata: Date sichen',
	'addcollection' => 'Wikidata: Sammlung derbäisetzen',
	'ow_save' => 'Späicheren',
	'ow_history' => 'Versiounen',
	'ow_datasets' => 'Auswiel vun den Donnéeën',
	'ow_noedit_title' => "Keng Erlabniss fir z'änneren",
	'ow_uipref_datasets' => 'Standard Astellung',
	'ow_uiprefs' => 'Wikidata',
	'ow_none_selected' => 'Näischt ausgewielt',
	'ow_conceptmapping_no_action_specified' => 'D\'Aktioun "$1" gëtt net ënnerstetzt.',
	'ow_dm_OK' => 'OK',
	'ow_dm_not_present' => 'net aginn',
	'ow_dm_not_found' => 'net an der Datebank fonnt oder net richteg',
	'ow_will_insert' => 'Dëst drasetzen:',
	'ow_available_contexts' => 'Disponibel Kontexter',
	'ow_add_concept_link' => 'E Link op déi aner Konzepter derbäisetzen',
	'ow_AlternativeDefinition' => 'Alternativ Definitioun',
	'ow_AlternativeDefinitions' => 'Alternativ Definitiounen',
	'ow_Annotation' => 'Notiz',
	'ow_ApproximateMeanings' => 'Ongeféier Bedeitungen',
	'ow_ClassAttributeAttribute' => 'Attribut',
	'ow_ClassAttributes' => 'Klassenattributer',
	'ow_ClassAttributeLevel' => 'Niveau',
	'ow_ClassAttributeType' => 'Typ',
	'ow_ClassMembership' => 'Member vun der Klass',
	'ow_Collection' => 'Sammlung',
	'ow_Collection_colon' => 'Sammlung:',
	'ow_CollectionMembership' => 'Member vun der Sammlung',
	'ow_Definition' => 'Definitioun',
	'ow_DefinedMeaningAttributes' => 'Notiz',
	'ow_DefinedMeaning' => 'Definéierte Sënn',
	'ow_DefinedMeaningReference' => 'Definéierte Sënn',
	'ow_ExactMeanings' => 'Genee Bedeitungen',
	'ow_Expression' => 'Ausdrock',
	'ow_ExpressionMeanings' => 'Bedeitunge vun den Ausdréck',
	'ow_Expressions' => 'Ausdréck',
	'ow_IdenticalMeaning' => 'Déi selwescht Bedeitung?',
	'ow_GotoSource' => "Zréck op d'Quell",
	'ow_Language' => 'Sprooch',
	'ow_LevelAnnotation' => 'Notiz',
	'ow_OptionAttribute' => 'Eegeschaft',
	'ow_OptionAttributeOption' => 'Optioun',
	'ow_OptionAttributeOptions' => 'Optiounen',
	'ow_OptionAttributeValues' => 'Werter vun den Optiounen',
	'ow_OtherDefinedMeaning' => 'Aner definéiert Bedeitung',
	'ow_PopupAnnotation' => 'Notiz',
	'ow_Relations' => 'Relatiounen',
	'ow_RelationType' => 'Typ vu Relatioun',
	'ow_Remove' => 'Ewechhuelen',
	'ow_Spelling' => 'Schreifweis',
	'ow_Synonyms' => 'Synonymen',
	'ow_SynonymsAndTranslations' => 'Synonymer an Iwwersetzungen',
	'ow_Source' => 'Quell',
	'ow_TextAttribute' => 'Eegeschaft',
	'ow_Text' => 'Text',
	'ow_TextAttributeValues' => 'Fräi Texter',
	'ow_TranslatedTextAttribute' => 'Eegeschaft',
	'ow_TranslatedText' => 'Iwwersatenen Text',
	'ow_TranslatedTextAttributeValue' => 'Text',
	'ow_TranslatedTextAttributeValues' => 'Iwwersetzbaren Text',
	'ow_LinkAttribute' => 'Eegeschaft',
	'ow_LinkAttributeValues' => 'Linken',
	'ow_Property' => 'Eegeschaft',
	'ow_Value' => 'Wert',
	'ow_meaningsoftitle' => 'Bedeitung vun "$1"',
	'ow_meaningsofsubtitle' => '<em>Wiki-Link:</em> [[$1]]',
	'ow_Permission_denied' => '<h2>ERLAABNIS REFUSÉIERT</h2>',
	'ow_copy_no_action_specified' => 'Gitt w.e.g. eng Aktioun un',
	'ow_copy_help' => "D'Hellëf gouf nach net implementéiert.",
	'ow_needs_xlation_title' => 'Ausdréck déi iwwersat musse ginn',
	'ow_show' => 'Weisen',
	'ow_create' => 'Uleeën',
	'ow_collection_added' => '<strong>Sammlung $1 derbäigesat.</strong>',
);

/** Lingua Franca Nova (Lingua Franca Nova)
 * @author Malafaya
 */
$wdMessages['lfn'] = array(
	'ow_save' => 'Fisa',
	'ow_history' => 'Istoria',
	'ow_dm_OK' => 'Oce',
	'ow_Annotation' => 'Nota',
	'ow_ClassAttributeLevel' => 'Nivel',
	'ow_ClassAttributeType' => 'Tipo',
	'ow_Collection' => 'Colieda',
	'ow_Definition' => 'Defini',
	'ow_DefinedMeaningAttributes' => 'Nota',
	'ow_Language' => 'Lingua',
	'ow_LevelAnnotation' => 'Nota',
	'ow_OptionAttribute' => 'Propria',
	'ow_PopupAnnotation' => 'Nota',
	'ow_Relations' => 'Relatas',
	'ow_RelationType' => 'Tipo de relata',
	'ow_Spelling' => 'Spele',
	'ow_Synonyms' => 'Sinonimes',
	'ow_SynonymsAndTranslations' => 'Sinonimes e traduis',
	'ow_TextAttribute' => 'Propria',
	'ow_Text' => 'Testo',
	'ow_TranslatedTextAttribute' => 'Propria',
	'ow_TranslatedTextAttributeValue' => 'Testo',
	'ow_LinkAttribute' => 'Propria',
	'ow_LinkAttributeValues' => 'Lias',
	'ow_Property' => 'Propria',
	'ow_Value' => 'Valua',
	'ow_meaningsoftitle' => 'Sinifias de "$1"',
	'ow_meaningsofsubtitle' => '<em>Lia vici:</em> [[$1]]',
);

/** Limburgish (Limburgs)
 * @author Ooswesthoesbes
 */
$wdMessages['li'] = array(
	'ow_save' => 'Opslaon',
);

/** Lithuanian (Lietuvių)
 * @author Matasg
 */
$wdMessages['lt'] = array(
	'datasearch' => 'Wikidata: Duomenų paieška',
);

/** Maithili (मैथिली)
 * @author Ggajendra
 */
$wdMessages['mai'] = array(
	'datasearch' => 'विकी सूचनाकोष: सूचनाकोष ताकू',
	'langman_title' => 'भाषा प्रबंधक',
);

/** Eastern Mari (Олык Марий)
 * @author Сай
 */
$wdMessages['mhr'] = array(
	'ow_save' => 'Аралаш',
	'ow_history' => 'Историй',
	'ow_LinkAttributeValues' => 'Ссылке-влак',
);

/** Macedonian (Македонски)
 * @author Brest
 */
$wdMessages['mk'] = array(
	'ow_save' => 'Зачувај',
	'ow_history' => 'Историја',
	'ow_uipref_datasets' => 'Основен поглед',
	'ow_uiprefs' => 'Викидата',
	'ow_none_selected' => 'Ништо не е селектирано',
	'ow_AlternativeDefinition' => 'Алтернативна дефиниција',
	'ow_AlternativeDefinitions' => 'Алтернативни дефиниции',
	'ow_Annotation' => 'Забелешка',
	'ow_ClassAttributeAttribute' => 'Атрибут',
	'ow_ClassAttributes' => 'Класа атрибути',
	'ow_ClassAttributeLevel' => 'Ниво',
	'ow_ClassAttributeType' => 'Тип',
	'ow_ClassMembership' => 'Членство во класа',
	'ow_Collection' => 'Колекција',
	'ow_CollectionMembership' => 'Член во колекција',
	'ow_Definition' => 'Дефиниција',
	'ow_DefinedMeaningAttributes' => 'Забелешка',
	'ow_DefinedMeaning' => 'Дефинирано значење',
	'ow_DefinedMeaningReference' => 'Дефинирано значење',
	'ow_ExactMeanings' => 'Точно значење',
	'ow_Expression' => 'Израз',
	'ow_ExpressionMeanings' => 'Значења на израз',
	'ow_Expressions' => 'Изрази',
	'ow_IdenticalMeaning' => 'Идентично значење?',
	'ow_IncomingRelations' => 'Доаѓачки релации',
	'ow_GotoSource' => 'Иди на извор',
	'ow_Language' => 'Јазик',
	'ow_LevelAnnotation' => 'Забелешка',
	'ow_OptionAttribute' => 'Својство',
	'ow_OptionAttributeOption' => 'Опција',
	'ow_OptionAttributeOptions' => 'Опции',
	'ow_OptionAttributeValues' => 'Изборни вредности',
	'ow_OtherDefinedMeaning' => 'Друго дефинирано значење',
	'ow_PopupAnnotation' => 'Забелешка',
	'ow_Relations' => 'Релации',
	'ow_RelationType' => 'Тип на релација',
	'ow_Spelling' => 'Изговор',
	'ow_Synonyms' => 'Синоними',
	'ow_SynonymsAndTranslations' => 'Синоними и преводи',
	'ow_Source' => 'Извор',
	'ow_SourceIdentifier' => 'Идентификатор на извор',
	'ow_TextAttribute' => 'Својство',
	'ow_Text' => 'Текст',
	'ow_TranslatedTextAttribute' => 'Својство',
	'ow_TranslatedText' => 'Преведен текст',
	'ow_TranslatedTextAttributeValue' => 'Текст',
	'ow_LinkAttribute' => 'Својство',
	'ow_LinkAttributeValues' => 'Врски',
	'ow_Property' => 'Својство',
	'ow_Value' => 'Вредност',
	'ow_meaningsoftitle' => 'Значења на "$1"',
	'ow_meaningsofsubtitle' => '<em>Вики врска:</em> [[$1]]',
);

/** Malayalam (മലയാളം)
 * @author Shijualex
 */
$wdMessages['ml'] = array(
	'langman_title' => 'ഭാഷാ പരിപാലകന്‍',
	'ow_save' => 'സേവ് ചെയ്യുക',
	'ow_history' => 'നാള്‍വഴി',
	'ow_noedit_title' => 'തിരുത്തുവാനുള്ള അനുമതി ഇല്ല',
	'ow_uipref_datasets' => 'സ്വതവെയുള്ള കാഴ്ച',
	'ow_uiprefs' => 'വിക്കിഡാറ്റ',
	'ow_none_selected' => 'ഒന്നും തിരഞ്ഞെടുത്തിട്ടില്ല',
	'ow_conceptmapping_no_action_specified' => 'ക്ഷമിക്കുക, എനിക്ക് "$1" ചെയ്യുന്നതു എങ്ങനെയെന്നു അറിയില്ല.',
	'ow_dm_OK' => 'ശരി',
	'ow_AlternativeDefinition' => 'വേറൊരു നിര്‍‌വചനം',
	'ow_AlternativeDefinitions' => 'മറ്റ് നിര്‍‌വചനങ്ങള്‍',
	'ow_ClassAttributeType' => 'തരം',
	'ow_Collection' => 'ശേഖരം',
	'ow_Definition' => 'നിര്‍‌വചനം',
	'ow_DefinedMeaning' => 'നിര്‍‌വചിച്ച അര്‍‌ത്ഥം',
	'ow_DefinedMeaningReference' => 'നിര്‍‌വചിച്ച അര്‍‌ത്ഥം',
	'ow_ExactMeanings' => 'ശരിക്കുള്ള അര്‍‌ത്ഥം',
	'ow_IdenticalMeaning' => 'സമാനമായ അര്‍ത്ഥങ്ങള്‍?',
	'ow_Language' => 'ഭാഷ',
	'ow_Source' => 'സ്രോതസ്സ്',
	'ow_Value' => 'മൂല്യം',
	'ow_meaningsoftitle' => '"$1"ന്റെ അര്‍ത്ഥങ്ങള്‍',
	'ow_Permission_denied' => '<h2>പ്രവേശനം നിഷേധിച്ചിരിക്കുന്നു</h2>',
);

/** Marathi (मराठी)
 * @author Kaustubh
 * @author Mahitgar
 */
$wdMessages['mr'] = array(
	'languages' => 'विकिविदा:भाषाप्रबंधक',
	'langman_title' => 'भाषा प्रबंधक',
	'datasearch' => 'विकिविदा:विदा शोध',
	'ow_save' => 'जतन करा',
	'ow_history' => 'इतिहास',
	'ow_datasets' => 'विदा-संच निवड',
	'ow_noedit_title' => 'संपादनाकरिता परवानगी नाही',
	'ow_noedit' => 'विदासंच "$1"मधील पाने संपादीत करण्याची तुम्हाला परवानगी नाही.कृपया [[{{MediaWiki:Ow editing policy url}}|आमची संपादन निती]]पहा.',
	'ow_uipref_datasets' => 'अविचल दृश्य',
	'ow_uiprefs' => 'विकिविदा',
	'ow_none_selected' => 'कोणतेही निवडले नाही',
	'ow_conceptmapping_help' => '<p>शक्य क्रिया: <ul>
<li>&action=insert&<data_context_prefix>=<defined_id>&...  एक मॅपिंग टाका</li>
<li>&action=get&concept=<concept_id>  एक मॅपिंग वाचा</li>
<li>&action=list_sets  शक्य असलेले डाटा कन्टेक्स्ट उपपदांची यादी व ती काय दर्शवितात त्याच्यासकट द्या.</li>
<li>&action=get_associated&dm=<defined_meaning_id>&dc=<dataset_context_prefix> एखाद्या विशिष्ट अर्थासाठी, इतर सर्व द्या</li>
<li>&action=help  माहितीपूर्ण मदत दाखवा.</li>
</ul></p>',
	'ow_conceptmapping_uitext' => '<p>कन्सेप्ट मॅपिंग मुळे तुम्हाला एखाद्या डाटाबेस मध्ये असणारा अर्थ दुसर्‍या डाटाबेस मधल्या कुठल्या अर्थाशी तंतोतंत जुळतो हे कळते.</p>',
	'ow_conceptmapping_no_action_specified' => '"$1" कसे करावे मला ठावूक नाही,क्षमस्व',
	'ow_dm_OK' => 'ठीक',
	'ow_dm_not_present' => 'भरले नाही',
	'ow_dm_not_found' => 'विदेत सापडले नाही अथवा बरोबर नाही',
	'ow_mapping_successful' => '[OK] लिहिलेले सर्व रकाने जोडले<br />',
	'ow_mapping_unsuccessful' => 'जोडण्यापूर्वी कमीतकमी दोन अर्थ असणे आवश्यक आहे.',
	'ow_will_insert' => 'खालील भर घातली जाईल',
	'ow_contents_of_mapping' => 'मॅपिंगचे कंटेन्ट्स',
	'ow_available_contexts' => 'उपलब्ध संदर्भ',
	'ow_add_concept_link' => 'इतर कन्सेप्ट्सना दुवा द्या',
	'ow_concept_panel' => 'संकल्पना दल',
	'ow_dm_badtitle' => 'हे पान कुठल्याही DefinedMeaning (कन्सेप्ट) कडे निर्देश देत नाही.
कृपया संकेतस्थळाचा पत्ता तपासा.',
	'ow_dm_missing' => 'हे पान अस्तित्वात नसलेल्या DefinedMeaning (कन्सेप्ट) कडे निर्देश देते.
कृपया संकेतस्थळाचा पत्ता तपासा.',
	'ow_AlternativeDefinition' => 'दुसरी व्याख्या',
	'ow_AlternativeDefinitions' => 'दुसर्‍या व्याख्या',
	'ow_Annotation' => 'टीका-टिप्पणी',
	'ow_ApproximateMeanings' => 'जवळजवळ अर्थ',
	'ow_ClassAttributeAttribute' => 'एट्रिब्यूट',
	'ow_ClassAttributes' => 'क्लास एट्रिब्यूट',
	'ow_ClassAttributeLevel' => 'पातळी',
	'ow_ClassAttributeType' => 'प्रकार',
	'ow_ClassMembership' => 'क्लास सदस्यत्व',
	'ow_Collection' => 'कलेक्शन',
	'ow_CollectionMembership' => 'कलेक्शन सदस्यत्व',
	'ow_Definition' => 'व्याख्या',
	'ow_DefinedMeaningAttributes' => 'टीका-टिप्पणी',
	'ow_DefinedMeaning' => 'दिलेला अर्थ',
	'ow_DefinedMeaningReference' => 'दिलेला अर्थ',
	'ow_ExactMeanings' => 'नेमका अर्थ',
	'ow_Expression' => 'एक्स्प्रेशन',
	'ow_ExpressionMeanings' => 'एक्स्प्रेशन अर्थ',
	'ow_Expressions' => 'एक्स्प्रेशन्स',
	'ow_IdenticalMeaning' => 'सारखा अर्थ?',
	'ow_IncomingRelations' => 'येते संबध',
	'ow_GotoSource' => 'स्रोताकडे जा',
	'ow_Language' => 'भाषा',
	'ow_LevelAnnotation' => 'टीका-टिप्पणी',
	'ow_OptionAttribute' => 'वैशिष्ट्य',
	'ow_OptionAttributeOption' => 'पर्याय',
	'ow_OptionAttributeOptions' => 'पर्याय',
	'ow_OptionAttributeValues' => 'पर्याय मुल्ये',
	'ow_OtherDefinedMeaning' => 'इअतर व्यक्त अर्थ',
	'ow_PopupAnnotation' => 'टीका-टिप्पणी',
	'ow_Relations' => 'नाते',
	'ow_RelationType' => 'नाते प्रकार',
	'ow_Spelling' => 'स्पेलींग',
	'ow_Synonyms' => 'समानार्थी शब्द',
	'ow_SynonymsAndTranslations' => 'समानार्थी शब्द आणि भाषांतरे',
	'ow_Source' => 'स्रोत',
	'ow_SourceIdentifier' => 'स्रोत जाणकार',
	'ow_TextAttribute' => 'मालमत्ता',
	'ow_Text' => 'मसुदा',
	'ow_TextAttributeValues' => 'केवळ साधा मजकुर',
	'ow_TranslatedTextAttribute' => 'वैशिष्ट्य',
	'ow_TranslatedText' => 'भाषांतरीत मजकुर',
	'ow_TranslatedTextAttributeValue' => 'मजकुर',
	'ow_TranslatedTextAttributeValues' => 'भाशांतरकरण्या योग्य मजकुर',
	'ow_LinkAttribute' => 'वैशिष्ट्य',
	'ow_LinkAttributeValues' => 'दुवे',
	'ow_Property' => 'मालमत्ता',
	'ow_Value' => 'मुल्य',
	'ow_meaningsoftitle' => '"$1"चे अर्थ',
	'ow_meaningsofsubtitle' => '<em>विकिदुवा:</em> [[$1]]',
	'ow_Permission_denied' => '<h2>परवानगी नाकारली</h2>',
	'ow_copy_no_action_specified' => 'कृपया कृती निर्देशीत करा',
	'ow_copy_help' => 'एकदिवस आम्ही तुम्हाला मदत करु शकु',
	'ow_please_proved_dmid' => 'असं दिसतंय की तुमच्या इनपुट मध्ये एक "?dmid=<ID>" (dmid=दिलेल्या अर्थाचा क्र) दिलेला नाही<br />
कृपया सर्व्हर प्रबंधकाशी संपर्क करा.',
	'ow_please_proved_dc1' => 'असं दिसतंय की तुमच्या इनपुट मध्ये एक "?dc1=<something>" (dc1=डाटासेट कन्टेक्स्ट 1, डाटासेट कुठून प्रत करायचा ते ठिकाण) दिलेले नाही<br />
कृपया सर्व्हर प्रबंधकाशी संपर्क करा.',
	'ow_please_proved_dc2' => 'असं दिसतंय की तुमच्या इनपुट मध्ये एक "?dc2=<something>" (dc2=डाटासेट कन्टेक्स्ट 2, डाटासेट कुठे प्रत करायचा ते ठिकाण) दिलेले नाही<br />
कृपया सर्व्हर प्रबंधकाशी संपर्क करा.',
	'ow_copy_successful' => '<h2>नक्कल यशस्वी</h2>तुमची विदा यशस्वीपणे नकलली गेल्याचे दिसते.निश्चित करण्यासाठी पुन्हाएकदा पडताळून पहा!',
	'ow_copy_unsuccessful' => '<h3>नक्कल अयशस्वी</h3> नकलण्याचे कोणतेही काम झाले नाही.',
	'ow_no_action_specified' => '<h3>कोणतीही कृती सांगीतली नाही</h3>काय तुम्ही या पानापाशी सरळच पोहचले आहात? सर्वसाधारणता तुम्ही येथे पोहचण्याची आवशकता नाही.',
	'ow_db_consistency_not_found' => '<h2>त्रूटी</h2>विदेच्या सुरळीतपणाचा प्रश्न आहे ,विकिविदा या व्यक्त ID शी संबधीत सुयोग्य विदा शोधूशकत नाही.ती हरवली असण्याची शक्यता आहे.कृपया प्रचालक अथवा प्रबंधकांशी संपर्क करा.',
);

/** Malay (Bahasa Melayu)
 * @author Aurora
 */
$wdMessages['ms'] = array(
	'ow_dm_OK' => 'OK',
);

/** Maltese (Malti)
 * @author Roderick Mallia
 */
$wdMessages['mt'] = array(
	'ow_Language' => 'Lingwa',
);

/** Mirandese (Mirandés)
 * @author Malafaya
 */
$wdMessages['mwl'] = array(
	'ow_Language' => 'Lhéngua',
);

/** Erzya (Эрзянь)
 * @author Botuzhaleny-sodamo
 */
$wdMessages['myv'] = array(
	'datasearch' => 'Викидата: Датань вешнэма',
	'langman_title' => 'Келень кирдий',
	'languages' => 'Келень кирдий',
	'ow_save' => 'Ванстомс',
	'ow_history' => 'Путовкст-юртт',
	'ow_uiprefs' => 'Викидата',
	'ow_none_selected' => 'Вейкеяк апакКочка',
	'ow_dm_not_present' => 'апак совавто',
	'ow_dm_not_found' => 'датабазасто а муеви эли берянь хвормазо',
	'ow_Collection' => 'Пурнавкс',
	'ow_Definition' => 'Чарькодевтема',
	'ow_DefinedMeaning' => 'АравтоньЧарькодевкс',
	'ow_DefinedMeaningReference' => 'Аравтонь чарькодевкс',
	'ow_ExactMeanings' => 'Цяр вравты чарькодевкс',
	'ow_Language' => 'Кель',
	'ow_Spelling' => 'Сёрмадома лувозо',
	'ow_Synonyms' => 'Синонимат',
	'ow_SynonymsAndTranslations' => 'Ютавтовкс марто синонимат',
	'ow_Source' => 'Лисьмапрязо',
	'ow_Text' => 'Текст',
	'ow_TranslatedText' => 'Ютавтонь текст',
	'ow_TranslatedTextAttributeValue' => 'Текст',
	'ow_LinkAttributeValues' => 'Сюлмавома пенеть',
	'ow_meaningsoftitle' => '"$1" чарькодеви',
);

/** Nahuatl (Nāhuatl)
 * @author Fluence
 */
$wdMessages['nah'] = array(
	'ow_save' => 'Ticpiyāz',
	'ow_history' => 'Tlahcuilōlloh',
	'ow_uiprefs' => 'Huiquidatah',
	'ow_dm_OK' => 'Cualli',
	'ow_Language' => 'Tlahtōlli',
	'ow_Synonyms' => 'Neneuhtlahtōl',
	'ow_SynonymsAndTranslations' => 'Neneuhtlahtōl īhuān tlahtōlcuepaliztli',
	'ow_Source' => 'Īhuīcpa:',
	'ow_Text' => 'Tlahcuilōlli',
	'ow_TranslatedText' => 'Tlahtōlli ōmotlahtōlcuep',
	'ow_TranslatedTextAttributeValue' => 'Tlahcuilōlli',
	'ow_LinkAttributeValues' => 'Tzonhuiliztli',
	'ow_meaningsofsubtitle' => '<em>Huiquitzonhuiliztli:</em> [[$1]]',
	'ow_copy_help' => 'Quēmmaniyān, hueliz timitzpālēhuīzqueh.',
);

/** Low German (Plattdüütsch)
 * @author Slomox
 */
$wdMessages['nds'] = array(
	'ow_save' => 'Spiekern',
	'ow_history' => 'Historie',
	'ow_uiprefs' => 'Wikidata',
	'ow_dm_OK' => 'OK',
	'ow_dm_not_present' => 'nich ingeven',
	'ow_dm_not_found' => 'nich funnen in de Datenbank oder fehlerhaft',
	'ow_ClassAttributeType' => 'Typ',
	'ow_DefinedMeaning' => 'Defineert Bedüden',
	'ow_DefinedMeaningReference' => 'Defineert Bedüden',
	'ow_ExactMeanings' => 'Exakt Bedüden',
	'ow_Expression' => 'Utdruck',
	'ow_ExpressionMeanings' => 'Utdrucksbedüden',
	'ow_Expressions' => 'Utdrück',
	'ow_GotoSource' => 'Na’n Born gahn',
	'ow_Language' => 'Spraak',
	'ow_OptionAttribute' => 'Egenschop',
	'ow_Synonyms' => 'Synonymen',
	'ow_Source' => 'Born',
	'ow_TextAttribute' => 'Egenschop',
	'ow_Text' => 'Text',
	'ow_TranslatedTextAttribute' => 'Egenschop',
	'ow_TranslatedText' => 'Översett Text',
	'ow_TranslatedTextAttributeValue' => 'Text',
	'ow_TranslatedTextAttributeValues' => 'Översettbor Text',
	'ow_LinkAttribute' => 'Egenschop',
	'ow_Property' => 'Egenschop',
	'ow_meaningsoftitle' => 'Bedüden vun „$1“',
);

/** Dutch (Nederlands)
 * @author GerardM
 * @author SPQRobin
 * @author Siebrand
 * @author Tvdm
 */
$wdMessages['nl'] = array(
	'languages' => 'Wikidata: Taalmanager',
	'langman_title' => 'Taalmanager',
	'langman_not_allowed' => 'U hebt geen rechten om taalinstellingen te wijzigen.',
	'langman_header' => 'Geef de taalcode in en voer hieronder de vertaling in het Engels in:',
	'langman_req_fields' => 'Zowel de naam van de taal als de ISO 639-3-code zijn verplicht!',
	'langman_adding' => 'Bezig met het toevoegen van de taal $1 met code $2.',
	'langman_langname' => 'Naam taal:',
	'langman_iso639-3' => 'ISO 639-3-code:',
	'langman_iso639-2' => 'ISO 639-2-code:',
	'langman_wikimedia' => 'Wikimedia-code:',
	'langman_field_optional' => '(optioneel)',
	'langman_addlang' => 'Taal toevoegen',
	'importlangnames' => 'Wikidata: Taalnamen importeren',
	'importlangnames_title' => 'Taalnamen importeren',
	'importlangnames_not_allowed' => 'U hebt geen rechten om taalnamen te importeren.',
	'importlangnames_added' => 'De taalnamen voor "$1" zijn toegevoegd.',
	'importlangnames_not_found' => '<stong>De taal "$1" is niet aangetroffen!</strong>',
	'datasearch' => 'Wikidata: Gegevens zoeken',
	'addcollection' => 'Wikidata: Collectie toevoegen',
	'ow_save' => 'Opslaan',
	'ow_history' => 'Geschiedenis',
	'ow_datasets' => 'Gegevenssetselectie',
	'ow_noedit_title' => 'Geen toestemming om te bewerken',
	'ow_noedit' => 'U hebt geen rechten om pagina\'s te bewerken in de dataset "$1".
Zie [[{{MediaWiki:Ow editing policy url}}|ons bewerkingsbeleid]].',
	'ow_uipref_datasets' => 'Standaard overzicht:',
	'ow_uiprefs' => 'Wikidata',
	'ow_none_selected' => 'Geen selectie',
	'ow_conceptmapping_help' => '<p>mogelijke handelingen:<ul>
<li>&action=insert&<data_context_prefix>=<defined_id>&...  een mapping toevoegen</li>
<li>&action=get&concept=<concept_id>  een mapping teruglezen</li>
<li>&action=list_sets  geeft een lijst met mogelijke gegevenscontextvoorvoegsels terug en waar ze naar verwijzen.</li>
<li>&action=get_associated&dm=<defined_meaning_id>&dc=<dataset_context_prefix> voor een bepaalde betekenis in een concept, geeft alle overige weer</li>
<li>&action=help  Zinvolle hulptekst weergeven.</li>
</ul></p>',
	'ow_conceptmapping_uitext' => '<p>ConceptMapping maakt het mogelijk om bepaalde betekenissen in meerdere gegevenssets als identiek te markeren.</p>',
	'ow_conceptmapping_no_action_specified' => 'De handeling "$1" wordt niet ondersteund.',
	'ow_dm_OK' => 'OK',
	'ow_dm_not_present' => 'niet ingevoerd',
	'ow_dm_not_found' => 'niet aangetroffen in de database of verminkt',
	'ow_mapping_successful' => 'Wat met [OK] gemarkeerd is, is gemapt.<br />',
	'ow_mapping_unsuccessful' => 'Er zijn minstens twee bepaalde betekenissen nodig voordat ze gekoppeld kunnen worden.',
	'ow_will_insert' => 'Zal het volgende toevoegen:',
	'ow_contents_of_mapping' => 'Inhoud van de mapping',
	'ow_available_contexts' => 'Beschikbare contexten',
	'ow_add_concept_link' => 'Verwijzing toevoegen aan andere concepten',
	'ow_concept_panel' => 'Conceptpaneel',
	'ow_dm_badtitle' => 'Deze pagina wijst niet naar enige BepaaldeBetekenis (concept).
Controleer het webadres.',
	'ow_dm_missing' => 'Deze pagina lijkt te wijzen naar een niet-bestaande DefinedMeaning (concept). Controleer alstublieft het webadres.',
	'ow_AddHint' => 'Nieuwe rijen toevoegen',
	'ow_AlternativeDefinition' => 'Alternatieve definitie',
	'ow_AlternativeDefinitions' => 'Alternatieve definities',
	'ow_Annotation' => 'Annotatie',
	'ow_ApproximateMeanings' => 'Niet-exacte betekenissen',
	'ow_ClassAttributeAttribute' => 'Attribuut',
	'ow_ClassAttributes' => 'Klasseattributen',
	'ow_ClassAttributeLevel' => 'Niveau',
	'ow_ClassAttributeType' => 'Type',
	'ow_ClassMembership' => 'Klasselidmaatschap',
	'ow_Collection' => 'Verzameling',
	'ow_Collection_colon' => 'Verzameling:',
	'ow_CollectionMembership' => 'Verzamelingslidmaatschap',
	'ow_Definition' => 'Definitie',
	'ow_DefinedMeaningAttributes' => 'Annotatie',
	'ow_DefinedMeaning' => 'Bepaalde betekenis',
	'ow_DefinedMeaningReference' => 'Bepaalde betekenis',
	'ow_ExactMeanings' => 'Exacte betekenissen',
	'ow_Expression' => 'Uitdrukking',
	'ow_ExpressionMeanings' => 'Uitdrukkingsbetekenissen',
	'ow_Expressions' => 'Uitdrukkingen',
	'ow_IdenticalMeaning' => 'Identieke betekenis?',
	'ow_IncomingRelations' => 'Binnenkomende relaties',
	'ow_GotoSource' => 'Naar bron gaan',
	'ow_Language' => 'Taal',
	'ow_LevelAnnotation' => 'Annotatie',
	'ow_OptionAttribute' => 'Eigenschap',
	'ow_OptionAttributeOption' => 'Optie',
	'ow_OptionAttributeOptions' => 'Opties',
	'ow_OptionAttributeValues' => 'Optiewaarden',
	'ow_OtherDefinedMeaning' => 'Andere bepaalde betekenis',
	'ow_PopupAnnotation' => 'Annotatie',
	'ow_Relations' => 'Relaties',
	'ow_RelationType' => 'Relatietype',
	'ow_Remove' => 'Verwijderen',
	'ow_RemoveHint' => 'Geef de te verwijderen rijen aan',
	'ow_Spelling' => 'Spelling',
	'ow_SuggestHint' => 'Klik om de selectie te wijzigen',
	'ow_Synonyms' => 'Synoniemen',
	'ow_SynonymsAndTranslations' => 'Synoniemen en vertalingen',
	'ow_Source' => 'Bron',
	'ow_SourceIdentifier' => 'Bronidentificatie',
	'ow_TextAttribute' => 'Eigenschap',
	'ow_Text' => 'Tekst',
	'ow_TextAttributeValues' => 'Platte tekst',
	'ow_TranslatedTextAttribute' => 'Eigenschap',
	'ow_TranslatedText' => 'Vertaalde tekst',
	'ow_TranslatedTextAttributeValue' => 'Tekst',
	'ow_TranslatedTextAttributeValues' => 'Vertaalbare tekst',
	'ow_LinkAttribute' => 'Eigenschap',
	'ow_LinkAttributeValues' => 'Verwijzingen',
	'ow_Property' => 'Eigenschap',
	'ow_Value' => 'Waarde',
	'ow_meaningsoftitle' => 'Betekenissen van "$1"',
	'ow_meaningsofsubtitle' => '<em>Wikiverwijzing:</em> [[$1]]',
	'ow_Permission_denied' => '<h2>Toestemming geweigerd</h2>',
	'ow_copy_no_action_specified' => 'Geef alstublieft een handeling aan',
	'ow_copy_help' => 'Een hulpfunctie is nog niet beschikbaar.',
	'ow_please_proved_dmid' => 'Uw invoer mist een "?dmid=<ID>" (dmid=Defined Meaning-ID)<br />Neem alstublieft contact op met een systeembeheerder.',
	'ow_please_proved_dc1' => 'Uw invoer mist een "?dc1=<iets>" (dc1=datasetcontext 1, dataset WAARVAN te kopiëren)<br />Neem alstublieft contact op met een systeembeheerder.',
	'ow_please_proved_dc2' => 'Uw invoer mist een "?dc2==<iets>" (dc2=datasetcontext 2, dataset WAARNAAR te kopiëren)<br />Neem alstublieft contact op met een systeembeheerder.',
	'ow_copy_successful' => '<h2>Kopiëren uitgevoerd</h2>Het lijkt erop dat het kopiëren van de gegevens goed gegaan is.
Vergeet niet om dit te controleren!',
	'ow_copy_unsuccessful' => '<h3>Kopiëren mislukt</h3> Er is niets gekopieerd.',
	'ow_no_action_specified' => '<h3>Er is geen handeling opgegeven</h3> Mogelijk bent u direct naar deze pagina gekomen. Normaliter hoort dat niet te gebeuren.',
	'ow_db_consistency_not_found' => '<h2>Fout</h2>Er is een probleem met de consistentie van de database. Wikidata kan geen valide gegevens vinden die met dit Defined Meaning-ID zijn verbonden. Wellicht zijn die gegevens verloren gegaan. Neem alstublieft contact op met een systeembeheerder.',
	'ow_needs_xlation_title' => 'Expressies zonder vertaling',
	'ow_needs_xlation_source_lang' => 'Brontaal:',
	'ow_needs_xlation_dest_lang' => 'Doeltaal:',
	'ow_needs_xlation_no_dest_lang' => 'Geef een doeltaal op.',
	'ow_show' => 'Weergeven',
	'ow_create' => 'Aanmaken',
	'ow_collection_added' => '<strong>De verzameling $1 is toegevoegd</strong>',
	'ow_suggest_previous' => 'Vorige',
	'ow_suggest_next' => 'Volgende',
	'ow_suggest_clear' => 'Opschonen',
);

/** Norwegian Nynorsk (‪Norsk (nynorsk)‬)
 * @author Eirik
 * @author Harald Khan
 */
$wdMessages['nn'] = array(
	'languages' => 'Wikidata: Språkhandsamar',
	'langman_title' => 'Språkhandsamar',
	'langman_not_allowed' => 'Du har ikkje løyve til å endra språkinnstillingar.',
	'langman_header' => 'Skriv inn språkkoden og det engelske namnet under:',
	'langman_req_fields' => 'Både språknamn og ISO 639-3-kode er påkravd.',
	'langman_langname' => 'Språknamn:',
	'langman_iso639-3' => 'ISO 639-3-kode:',
	'langman_iso639-2' => 'ISO 639-2-kode:',
	'langman_wikimedia' => 'Wikimedia-kode:',
	'langman_field_optional' => '(valfritt)',
	'langman_addlang' => 'Legg til språk',
	'importlangnames' => 'Wikidata: Importer språknamn',
	'importlangnames_title' => 'Importer språknamn',
	'importlangnames_not_allowed' => 'Du har ikkje løyve til å importera språknamn.',
	'importlangnames_added' => 'Språknamn for «$1» lagt til.',
	'importlangnames_not_found' => '<strong>Fann ikkje noko språkelement for «$1»!</strong>',
	'datasearch' => 'Wikidata: Datasøk',
	'addcollection' => 'Wikidata: Legg til samling',
	'ow_save' => 'Lagre',
	'ow_history' => 'Historikk',
	'ow_datasets' => 'Val for vising av data',
	'ow_noedit_title' => 'Du har ikkje tilgang til å endre',
	'ow_noedit' => 'Du har ikkje tilgang til å endre sider i datavalet «$1». Ver venleg og sjå [[{{MediaWiki:Ow editing policy url}}|retningslinene våre for endring]].',
	'ow_uipref_datasets' => 'Standardvising:',
	'ow_uiprefs' => 'Wikidata',
	'ow_none_selected' => 'Ingen er valde',
	'ow_conceptmapping_help' => '<p>moglege handlingar: <ul>
<li>&action=insert&<data_context_prefix>=<defined_id>&...  set inn eit kart</li>
<li>&action=get&concept=<concept_id>  sjå att eit kart</li>
<li>&action=list_sets  viser ei liste over moglege datakontekst-prefiks og kva dei refererer til.</li>
<li>&action=get_associated&dm=<defined_meaning_id>&dc=<dataset_context_prefix> viser alle andre for ei definert tyding i eit konsept</li>
<li>&action=help  Viser hjelp.</li>
</ul></p>',
	'ow_conceptmapping_uitext' => '<p>Kart over konsept lèt deg finne ut kva definert tyding i ei datavising som er lik definerte tydingar i andre datavisingar.</p>',
	'ow_conceptmapping_no_action_specified' => 'Handlinga «$1» er ikkje støtta.',
	'ow_dm_OK' => 'OK',
	'ow_dm_not_present' => 'ikkje oppgjeve',
	'ow_dm_not_found' => 'ikkje funne i databasen eller feillaga',
	'ow_mapping_successful' => 'La alle felta som var merka med [OK] til kart<br />',
	'ow_mapping_unsuccessful' => 'Ein må oppgje minst to definerte tydingar dersom dei skal lenkast.',
	'ow_will_insert' => 'Legg til dette:',
	'ow_contents_of_mapping' => 'Innhaldet i kartet',
	'ow_available_contexts' => 'Tilgjengelege kontekstar',
	'ow_add_concept_link' => 'Legg til lenkje til andre konsept',
	'ow_concept_panel' => 'Konseptpanel',
	'ow_dm_badtitle' => 'Denne sida viser ikkje til nokon «DefinedMeaning» (definerte tydingar, konsept). Ver venleg og sjekk nettadressa.',
	'ow_dm_missing' => 'Denne sida ser ut til å vise til ei «DefinedMeaning» (definerte tydingar, konsept) som ikkje finst. Ver venleg og sjekk nettadressa.',
	'ow_AlternativeDefinition' => 'Alternativ definisjon',
	'ow_AlternativeDefinitions' => 'Alternative definisjonar',
	'ow_Annotation' => 'Merknad',
	'ow_ApproximateMeanings' => 'Omtrentlege tydingar',
	'ow_ClassAttributeAttribute' => 'Attributt',
	'ow_ClassAttributes' => 'Klasseattributt',
	'ow_ClassAttributeLevel' => 'Nivå',
	'ow_ClassAttributeType' => 'Type',
	'ow_ClassMembership' => 'Medlemsskap i klasse',
	'ow_Collection' => 'Samling',
	'ow_Collection_colon' => 'Samling:',
	'ow_CollectionMembership' => 'Medlemsskap i samling',
	'ow_Definition' => 'Definisjon',
	'ow_DefinedMeaningAttributes' => 'Merknad',
	'ow_DefinedMeaning' => 'Definert tyding',
	'ow_DefinedMeaningReference' => 'Definert tyding',
	'ow_ExactMeanings' => 'Nøyaktig tyding',
	'ow_Expression' => 'Uttrykk',
	'ow_ExpressionMeanings' => 'Tydingar av uttrykk',
	'ow_Expressions' => 'Uttrykk',
	'ow_IdenticalMeaning' => 'Same tyding?',
	'ow_IncomingRelations' => 'Innkomande slektskap',
	'ow_GotoSource' => 'Gå til kjelda',
	'ow_Language' => 'Språk',
	'ow_LevelAnnotation' => 'Merknad',
	'ow_OptionAttribute' => 'Eigedom',
	'ow_OptionAttributeOption' => 'Innstilling',
	'ow_OptionAttributeOptions' => 'Innstillingar',
	'ow_OptionAttributeValues' => 'Innstillingsverdiar',
	'ow_OtherDefinedMeaning' => 'Anna definert tyding',
	'ow_PopupAnnotation' => 'Merknad',
	'ow_Relations' => 'Slektskap',
	'ow_RelationType' => 'Slektskapstype',
	'ow_Remove' => 'Fjern',
	'ow_RemoveHint' => 'Marker rekkjer som skal verte fjerna',
	'ow_Spelling' => 'Staving',
	'ow_SuggestHint' => 'Trykk for å endre val',
	'ow_Synonyms' => 'Synonym',
	'ow_SynonymsAndTranslations' => 'Synonym og omsetjingar',
	'ow_Source' => 'Kjelde',
	'ow_SourceIdentifier' => 'Kjeldeidentifiserar',
	'ow_TextAttribute' => 'Eigedom',
	'ow_Text' => 'Tekst',
	'ow_TextAttributeValues' => 'Enkle tekstar',
	'ow_TranslatedTextAttribute' => 'Eigedom',
	'ow_TranslatedText' => 'Omsett tekst',
	'ow_TranslatedTextAttributeValue' => 'Tekst',
	'ow_TranslatedTextAttributeValues' => 'Omsettbare tekstar',
	'ow_LinkAttribute' => 'Eigedom',
	'ow_LinkAttributeValues' => 'Lenkjer',
	'ow_Property' => 'Eigedom',
	'ow_Value' => 'Verdi',
	'ow_meaningsoftitle' => 'Tydingar av «$1»',
	'ow_meaningsofsubtitle' => '<em>Wikilenkje:</em> [[$1]]',
	'ow_Permission_denied' => '<h2>TILGANG FORBODE</h2>',
	'ow_copy_no_action_specified' => 'Ver venleg og oppgje ei handling',
	'ow_copy_help' => 'Hjelp er ikkje implementert enno.',
	'ow_please_proved_dmid' => 'Det ser ut som bidraget ditt manglar ein «?dmid=<ID>» (dmid=Defined Meaning ID, nummer på definert tyding)<br />Ver venleg og ta kontakt med ein administrator på tenaren.',
	'ow_please_proved_dc1' => 'Det ser ut som bidraget ditt manglar ein «?dc1=<noko>» (dc1=dataset context 1, dataval å kopiere FRÅ)<br />Ver venleg og ta kontakt med ein administrator på tenaren.',
	'ow_please_proved_dc2' => 'Det ser ut som bidraget ditt manglar ein «?dc2=<noko>» (dc2=dataset context 2, dataval å kopiere TIL)<br />Ver venleg og ta kontakt med ein administrator på tenaren.',
	'ow_copy_successful' => '<h2>Kopiering fullført</h2>Dei data du oppgav ser ut til å vere kopierte. Ikkje gløym å dobbelsjekke for å vere sikker!',
	'ow_copy_unsuccessful' => '<h3>Kopiering feila</h3> Inga kopiering har funne stad.',
	'ow_no_action_specified' => '<h3>Inga handling vart oppgjeve</h3> Kanskje kom du direkte til denne sida? Normalt skal du ikkje kome hit.',
	'ow_db_consistency_not_found' => '<h2>Feil</h2>Det er noko gale med oppbygginga av databasen, wikidata finn ikkje gyldige data som er knytte til dette nummeret på ei definert tyding. Ho kan vere tapt. Ver venleg og ta kontakt med ein administrator på tenaren.',
	'ow_needs_xlation_title' => 'Uttrykk som treng omsetjing',
	'ow_needs_xlation_source_lang' => 'Kjeldespråk:',
	'ow_needs_xlation_dest_lang' => 'Målspråk:',
	'ow_needs_xlation_no_dest_lang' => 'Oppgje eit målspråk.',
	'ow_show' => 'Syna',
	'ow_create' => 'Opprett',
	'ow_suggest_previous' => 'Førre',
	'ow_suggest_next' => 'Neste',
);

/** Norwegian (bokmål)‬ (‪Norsk (bokmål)‬)
 * @author Jon Harald Søby
 */
$wdMessages['no'] = array(
	'languages' => 'Wikidata: Språkbehandler',
	'langman_title' => 'Språkbehandler',
	'datasearch' => 'Wikidata: Datasøk',
	'ow_save' => 'Lagre',
	'ow_history' => 'Historikk',
	'ow_datasets' => 'Valg av datasett',
	'ow_noedit_title' => 'Ingen tilgang til å redigere',
	'ow_noedit' => 'Du har ikke tilgang til å redigere sider i datasettet «$1». Se [[{{MediaWiki:Ow editing policy url}}|våre retningslinjer for redigering]].',
	'ow_uipref_datasets' => 'Standardvisning',
	'ow_uiprefs' => 'Wikidata',
	'ow_none_selected' => 'Ingen valgt',
	'ow_conceptmapping_help' => '<p>mulige handlinger: <ul>
<li>&action=insert&<datakontekstprefiks>=<definert_id>&... sett inn et kart</li>
<li>&action=get&concept=<konsept-id> se igjen et kart</li>
<li>&action=list_sets viser en liste over mulige datakontekstprefiks og hva de refererer til.</li>
<li>&action=get_associated&dm=<definert_betydnings-ID>&dc=<datavisningskontekstprefiks> viser alle andre for en definert betydning i et konspet</li>
<li>&action=help Viser hjelp.</li>
</ul></p>',
	'ow_conceptmapping_uitext' => '<p>Kart over konsept lar deg finne ut hvilken definert betydning i en datavisning som er lik definerte betydninger i andre datavisninger.</p>',
	'ow_conceptmapping_no_action_specified' => 'Beklager, jeg vet ikke hvordan man «$1».',
	'ow_dm_OK' => 'OK',
	'ow_dm_not_present' => 'ikke skrevet inn',
	'ow_dm_not_found' => 'ikke funnet i databasen, eller misformet',
	'ow_mapping_successful' => 'La alle feltene være merket med [OK] til kart<br />',
	'ow_mapping_unsuccessful' => 'Må ha minst to definerte betydninger før jeg kan lenke dem til hverandre.',
	'ow_will_insert' => 'Vil sette inn følgende:',
	'ow_contents_of_mapping' => 'Innholdet i kartet',
	'ow_available_contexts' => 'Tilgjengelige kontekster',
	'ow_add_concept_link' => 'Legg til lenke til andre konsepter',
	'ow_concept_panel' => 'Konseptpanel',
	'ow_dm_badtitle' => 'Denne siden viser ikke til noen definert betydning (konsept). Vennligst sjekk internettadressen.',
	'ow_dm_missing' => 'Denne siden viser til en ikke-eksisterende definert mening (konsept). Vennligst sjekk internettadressen.',
	'ow_AlternativeDefinition' => 'Alternativ definisjon',
	'ow_AlternativeDefinitions' => 'Alternative definisjoner',
	'ow_Annotation' => 'Merknad',
	'ow_ApproximateMeanings' => 'Tilnærmede betydninger',
	'ow_ClassAttributeAttribute' => 'Attributt',
	'ow_ClassAttributes' => 'Klasseattributter',
	'ow_ClassAttributeLevel' => 'Nivå',
	'ow_ClassAttributeType' => 'Type',
	'ow_ClassMembership' => 'Klassemedlemskap',
	'ow_Collection' => 'Samling',
	'ow_CollectionMembership' => 'Samlingsmedlemskap',
	'ow_Definition' => 'Definisjon',
	'ow_DefinedMeaningAttributes' => 'Merknad',
	'ow_DefinedMeaning' => 'Definert betydning',
	'ow_DefinedMeaningReference' => 'Definert betydning',
	'ow_ExactMeanings' => 'Eksakt betydning',
	'ow_Expression' => 'Uttrykk',
	'ow_ExpressionMeanings' => 'Utrykksbetydninger',
	'ow_Expressions' => 'Uttrykk',
	'ow_IdenticalMeaning' => 'Identisk betydning?',
	'ow_IncomingRelations' => 'Innkommende relasjoner',
	'ow_GotoSource' => 'Gå til kilde',
	'ow_Language' => 'Språk',
	'ow_LevelAnnotation' => 'Merknad',
	'ow_OptionAttribute' => 'Egenskap',
	'ow_OptionAttributeOption' => 'Valg',
	'ow_OptionAttributeOptions' => 'Alternativer',
	'ow_OptionAttributeValues' => 'Valgverdier',
	'ow_OtherDefinedMeaning' => 'Annen definert betydning',
	'ow_PopupAnnotation' => 'Merknad',
	'ow_Relations' => 'Relasjoner',
	'ow_RelationType' => 'Relasjonstype',
	'ow_Spelling' => 'Staving',
	'ow_Synonyms' => 'Synonymer',
	'ow_SynonymsAndTranslations' => 'Synonymer og oversettelser',
	'ow_Source' => 'Kilde',
	'ow_SourceIdentifier' => 'Kildeidentifikator',
	'ow_TextAttribute' => 'Egenskap',
	'ow_Text' => 'Tekst',
	'ow_TextAttributeValues' => 'Rene tekster',
	'ow_TranslatedTextAttribute' => 'Egenskap',
	'ow_TranslatedText' => 'Oversatt tekst',
	'ow_TranslatedTextAttributeValue' => 'Tekst',
	'ow_TranslatedTextAttributeValues' => 'Oversettelige tekster',
	'ow_LinkAttribute' => 'Egenskap',
	'ow_LinkAttributeValues' => 'Lenker',
	'ow_Property' => 'Egenskap',
	'ow_Value' => 'Verdi',
	'ow_meaningsoftitle' => 'Betydninger av «$1»',
	'ow_meaningsofsubtitle' => '<em>Wikilenke:</em> [[$1]]',
	'ow_Permission_denied' => '<h2>TILGANG NEKTET</h2>',
	'ow_copy_no_action_specified' => 'Vennligst angi en handling',
	'ow_copy_help' => 'En dag vil vi kunne hjelpe deg.',
	'ow_please_proved_dmid' => 'Det virker som om teksten din mangler en «?dmid=<ID>» (dmid=ID for definert betydning)<br />Vennligst kontakt en systemadministrator.',
	'ow_please_proved_dc1' => 'Det virker som om teksten din mangler en «?dc1=<noe>» (dc1=datasettkontekst 1, datasett det skal kopieres FRA)<br />Vennligst kontakt en systemadministrator.',
	'ow_please_proved_dc2' => 'Det virker som om teksten din mangler en «?dc2=<noe>» (dc2=datasettkontekst 2, datasett å kopiere TIL)<br />Vennligst kontakt en systemadministrator.',
	'ow_copy_successful' => '<h2>Kopiering fullført</h2>Dataene dine er kopiert. Ikke glem å dobbeltsjekke for å være sikker!',
	'ow_copy_unsuccessful' => '<h3>Kopiering ikke fullført</h3> Ingen kopiering har funnet sted.',
	'ow_no_action_specified' => '<h3>Ingen handling ble angitt</h3> Kanskje du kom direkte til denne siden? Vanligvis trenger du ikke å være her.',
	'ow_db_consistency_not_found' => '<h2>Feil</h2>Det er noe galt med oppbygningen av databasen, wikidata finner ikke gyldige data som er tilknyttet dette nummeret på en definert betydning. Dataene kan være tapt. Vennligst kontakt en administrtor på tjeneren.',
);

/** Northern Sotho (Sesotho sa Leboa)
 * @author Mohau
 */
$wdMessages['nso'] = array(
	'ow_GotoSource' => 'Eya go mothopo',
	'ow_Language' => 'Polelo',
	'ow_Spelling' => 'Mopeleto',
	'ow_Synonyms' => 'Mahlalošêtšagotee',
	'ow_Source' => 'Mothopo',
	'ow_Text' => 'Dihlaka',
	'ow_TranslatedTextAttributeValue' => 'Dihlaka',
	'ow_LinkAttributeValues' => 'Hlomaganyo',
	'ow_meaningsoftitle' => 'Hlaloso tša "$1"',
	'ow_meaningsofsubtitle' => '<em>Hlomaganyo ya Wiki:</em> [[$1]]',
	'ow_Permission_denied' => '<h2>TUMELLO E LATOTŠWE</h2>',
	'ow_copy_no_action_specified' => 'Ka kgopela kgetha seo o nyakago gose phetha',
	'ow_copy_help' => 'Ka tšatši le lengwe, re ka go thuša.',
);

/** Occitan (Occitan)
 * @author Cedric31
 */
$wdMessages['oc'] = array(
	'languages' => 'Wikidata: Gestion de las lengas',
	'langman_title' => 'Gestion de las lengas',
	'datasearch' => 'Wikidata: Recèrca de donadas',
	'ow_save' => 'Salvar',
	'ow_history' => 'Istoric',
	'ow_datasets' => 'Seleccion de las donadas definidas',
	'ow_noedit_title' => "Cap de permission d'editar.",
	'ow_noedit' => "Sètz pas autorizat a editar las paginas dins las donadas preestablidas « $1 ».
Vejatz [[{{MediaWiki:Ow editing policy url}}|nòstras règlas d'edicion]].",
	'ow_uipref_datasets' => 'Vista per defaut',
	'ow_uiprefs' => 'Donadas wiki',
	'ow_none_selected' => 'Cap de seleccion',
	'ow_conceptmapping_help' => "<p>accions possiblas : <ul>
<li>&action=insert&<data_context_prefix>=<defined_id>&...  inserir una mapa</li>
<li>&action=get&concept=<concept_id>  tornar veire una mapa</li>
<li>&action=list_sets  retorna una lista dels prefixes de contèxtes possibles e sus qué se referisson.</li>
<li>&action=get_associated&dm=<defined_meaning_id>&dc=<dataset_context_prefix> per un definit dins lo sens d'un concèpte, retorna totes los autres.</li>
<li>&action=help  Vejatz l’ajuda completa.</li>
</ul></p>",
	'ow_conceptmapping_uitext' => "<p>La mapa dels concèptes vos permet d'identificar
que lo sens definit dins una donada siá identic
als senses definits dins las autras donadas.</p>",
	'ow_conceptmapping_no_action_specified' => "L'accion « $1 » es pas suportada.",
	'ow_dm_OK' => 'Validar',
	'ow_dm_not_present' => 'pas inscrich',
	'ow_dm_not_found' => 'pas trobat dins la banca de donadas o mal redigit',
	'ow_mapping_successful' => 'Planifica totes los camps marcats amb [Validar]<br />',
	'ow_mapping_unsuccessful' => "Cal al mens qu'un dels dos senses sián definits abans que pòscan èsser religats.",
	'ow_will_insert' => 'Inserirà los seguents :',
	'ow_contents_of_mapping' => 'Contengut de la planificacion',
	'ow_available_contexts' => 'Contèxtes disponibles',
	'ow_add_concept_link' => 'Apond un ligam als autres concèptes',
	'ow_concept_panel' => 'Ventalh de concèptes',
	'ow_dm_badtitle' => "Aquesta pagina punta pas sus cap de concèpte o sens definit. Verificatz l'adreça internet.",
	'ow_dm_missing' => "Aquesta pagina sembla puntar pas cap a un concèpte o sens inexistent. Verificatz l'adreça internet.",
	'ow_AlternativeDefinition' => 'Definicion alternativa',
	'ow_AlternativeDefinitions' => 'Definicions alternativas',
	'ow_Annotation' => 'Anotacion',
	'ow_ApproximateMeanings' => 'Senses aproximatius',
	'ow_ClassAttributeAttribute' => 'Atribut',
	'ow_ClassAttributes' => 'Atributs de classa',
	'ow_ClassAttributeLevel' => 'Nivèl',
	'ow_ClassAttributeType' => 'Tipe',
	'ow_ClassMembership' => 'Classas',
	'ow_Collection' => 'Colleccion',
	'ow_CollectionMembership' => 'Colleccions',
	'ow_Definition' => 'Definicion',
	'ow_DefinedMeaningAttributes' => 'Anotacion',
	'ow_DefinedMeaning' => 'Sens definit',
	'ow_DefinedMeaningReference' => 'Sens definit',
	'ow_ExactMeanings' => 'Senses exactes',
	'ow_Expression' => 'Expression',
	'ow_ExpressionMeanings' => 'Sens de las expressions',
	'ow_Expressions' => 'Expressions',
	'ow_IdenticalMeaning' => 'Sens identic ?',
	'ow_IncomingRelations' => 'Relacions entrantas',
	'ow_GotoSource' => 'Veire la font',
	'ow_Language' => 'Lenga',
	'ow_LevelAnnotation' => 'Anotacion',
	'ow_OptionAttribute' => 'Proprietat',
	'ow_OptionAttributeOption' => 'Opcion',
	'ow_OptionAttributeOptions' => 'Opcions',
	'ow_OptionAttributeValues' => 'Valors de las opcions',
	'ow_OtherDefinedMeaning' => 'Autre sens definit',
	'ow_PopupAnnotation' => 'Anotacion',
	'ow_Relations' => 'Relacions',
	'ow_RelationType' => 'Tipe de relacion',
	'ow_Spelling' => 'Ortografia',
	'ow_Synonyms' => 'Sinonims',
	'ow_SynonymsAndTranslations' => 'Sinonims e traduccions',
	'ow_Source' => 'Font',
	'ow_SourceIdentifier' => 'Identificador de font',
	'ow_TextAttribute' => 'Proprietat',
	'ow_Text' => 'Tèxt',
	'ow_TextAttributeValues' => 'Tèxt liure',
	'ow_TranslatedTextAttribute' => 'Proprietat',
	'ow_TranslatedText' => 'Tèxt traduch',
	'ow_TranslatedTextAttributeValue' => 'Tèxt',
	'ow_TranslatedTextAttributeValues' => 'Tèxtes tradusibles',
	'ow_LinkAttribute' => 'Proprietat',
	'ow_LinkAttributeValues' => 'Ligams',
	'ow_Property' => 'Proprietat',
	'ow_Value' => 'Valor',
	'ow_meaningsoftitle' => 'Sens de "$1"',
	'ow_meaningsofsubtitle' => '<em>ligam wiki :</em> [[$1]]',
	'ow_Permission_denied' => '<h2>PERMISSION REFUSADA</h2>',
	'ow_copy_no_action_specified' => "Mercé d'especificar una accion",
	'ow_copy_help' => "L'ajuda es pas encara estada implementada.",
	'ow_please_proved_dmid' => 'Sembla que manca un "?dmid=<...>" (dmid=SensDefinit ID)<br />Contactatz l’administrator del servidor.',
	'ow_please_proved_dc1' => 'Sèmbla que manca un "?dc1=<quicòm>" (dc1=contèxt de la banca 1, banca DEMPUÈI la quala òm copia)<br />
Contactatz l’administrator.',
	'ow_please_proved_dc2' => 'Sembla que manca un "?dc2=<quicòm>" (dc2=contèxt de la banca 2, banca CAP A la quala òm copia)<br />
Contactatz l’administrator.',
	'ow_copy_successful' => '<h2>Capitada de la còpia</h2>Vòstras donadas son estadas copiadas amb succès (verificatz çaquelà).',
	'ow_copy_unsuccessful' => "<h3>Còpia infructuosa</h3> Cap d'operacion de còpia a pas pres plaça.",
	'ow_no_action_specified' => "<h3>Cap d'accion es pas estada especificada</h3> Benlèu, seriatz vengut sus aquesta pagina dirèctament ? Avètz pas besonh, en principi, d'èsser aicí.",
	'ow_db_consistency_not_found' => "<h2>Error</h2> Un problèma es estat trobat dins la banca de donadas. Wikidata pòt pas trobar de donadas validas ligadas al numèro de sens definit. Poiriá èsser perdut. Contactatz l'operator o l'administrator del servidor.",
);

/** Oriya (ଓଡ଼ିଆ)
 * @author Jose77
 */
$wdMessages['or'] = array(
	'ow_history' => 'ଇତିହାସ',
);

/** Ossetic (Иронау)
 * @author Amikeco
 */
$wdMessages['os'] = array(
	'ow_history' => 'Истори',
	'ow_dm_OK' => 'Афтæ уæд!',
	'ow_ClassAttributeType' => 'Тип',
	'ow_Language' => 'Æвзаг',
	'ow_Text' => 'Текст',
	'ow_LinkAttributeValues' => 'Æрвитæнтæ',
);

/** Polish (Polski)
 * @author Derbeth
 * @author Masti
 * @author Sp5uhe
 * @author Wpedzich
 */
$wdMessages['pl'] = array(
	'languages' => 'Wikidata: Menadżer języków',
	'langman_title' => 'Menadżer języków',
	'datasearch' => 'Wikidata: Wyszukiwanie danych',
	'ow_save' => 'Zapisz',
	'ow_history' => 'Historia',
	'ow_datasets' => 'Wybór zbioru danych',
	'ow_noedit_title' => 'Brak uprawnień do wykonania edycji',
	'ow_noedit' => 'Nie masz uprawnień do wykonania edycji w zbiorze danych „$1”. Zobacz [[{{MediaWiki:Ow editing policy url}}|zasady nadawania uprawnień do edycji]].',
	'ow_uipref_datasets' => 'Widok domyślny',
	'ow_uiprefs' => 'Dane wiki',
	'ow_none_selected' => 'Nic nie zaznaczono',
	'ow_conceptmapping_help' => '<p>możliwe działania: <ul>
<li>&action=insert&<data_context_prefix>=<defined_id>&...  wstawia mapowanie</li>
<li>&action=get&concept=<concept_id>  odczytuje mapowanie</li>
<li>&action=list_sets  zwraca listę możliwych prefiksów kontekstu danych i ich odnośników</li>
<li>&action=get_associated&dm=<defined_meaning_id>&dc=<dataset_context_prefix> w odniesieniu do  jednego zdefiniowanego znaczenia w pojęciu zwraca pozostałe definicje</li>
<li>&action=help  pokazuje pomoc</li>
</ul></p>',
	'ow_conceptmapping_uitext' => '<p>Odwzorowywanie pojęć pozwala na identyfikację tego, które ze zdefiniowanych w jednym zestawie danych znaczeń są identyczne do znaczeń zdefiniowanych w drugim zestawie danych.</p>',
	'ow_conceptmapping_no_action_specified' => 'Akcja „$1” nie jest obsługiwana.',
	'ow_dm_OK' => 'OK',
	'ow_dm_not_present' => 'nie wprowadzono',
	'ow_dm_not_found' => 'obiektu nie odnaleziono w bazie lub jest nieprawidłowo uformowany',
	'ow_mapping_successful' => 'Odwzorowano wszystkie pola oznaczone jako [OK]<br />',
	'ow_mapping_unsuccessful' => 'Zanim nastąpi połączenie dwóch znaczeń, muszą zostać one zdefiniowane.',
	'ow_will_insert' => 'Wstawia nastepujące dane:',
	'ow_contents_of_mapping' => 'Zawartość odwzorowania',
	'ow_available_contexts' => 'Dostępne konteksty',
	'ow_add_concept_link' => 'Dodaj linki do innych pojęć',
	'ow_concept_panel' => 'Panel pojęć',
	'ow_dm_badtitle' => 'Ta strona nie prowadzi do żadnego obiektu typu DefinedMeaning. Sprawdź poprawność adresu.',
	'ow_dm_missing' => 'Ta strona prowadzi do nieistniejącego obiektu DefinedMeaning. Sprawdź poprawność adresu.',
	'ow_AlternativeDefinition' => 'Inna defnicja',
	'ow_AlternativeDefinitions' => 'Alternatywne definicje',
	'ow_Annotation' => 'Adnotacja',
	'ow_ApproximateMeanings' => 'Zbliżone znaczenia',
	'ow_ClassAttributeAttribute' => 'Atrybut',
	'ow_ClassAttributes' => 'Atrybuty klas',
	'ow_ClassAttributeLevel' => 'Poziom',
	'ow_ClassAttributeType' => 'Typ',
	'ow_ClassMembership' => 'Członkostwo w klasie',
	'ow_Collection' => 'Kolekcja',
	'ow_CollectionMembership' => 'Członkostwo w kolekcji',
	'ow_Definition' => 'Definicja',
	'ow_DefinedMeaningAttributes' => 'Adnotacja',
	'ow_DefinedMeaning' => 'Zdefiniowane znaczenie',
	'ow_DefinedMeaningReference' => 'Zdefiniowane znaczenie',
	'ow_ExactMeanings' => 'Dokładne znaczenia',
	'ow_Expression' => 'Wyrażenie',
	'ow_ExpressionMeanings' => 'Znaczenia wyrażenia',
	'ow_Expressions' => 'Wyrażenia',
	'ow_IdenticalMeaning' => 'Takie samo znaczenie?',
	'ow_IncomingRelations' => 'Zależności wchodzące',
	'ow_GotoSource' => 'Idź do źródła',
	'ow_Language' => 'Język',
	'ow_LevelAnnotation' => 'Adnotacja',
	'ow_OptionAttribute' => 'Właściwość',
	'ow_OptionAttributeOption' => 'Opcja',
	'ow_OptionAttributeOptions' => 'Opcje',
	'ow_OptionAttributeValues' => 'Wartość opcji',
	'ow_OtherDefinedMeaning' => 'Inaczej zdefiniowane pojęcie',
	'ow_PopupAnnotation' => 'Adnotacja',
	'ow_Relations' => 'Zależności',
	'ow_RelationType' => 'Typ zależności',
	'ow_Spelling' => 'Ortografia',
	'ow_Synonyms' => 'Snonimy',
	'ow_SynonymsAndTranslations' => 'Synonimy i tłumaczenia',
	'ow_Source' => 'Źródło',
	'ow_SourceIdentifier' => 'Identyfikator źródła',
	'ow_TextAttribute' => 'Właściwość',
	'ow_Text' => 'Tekst',
	'ow_TextAttributeValues' => 'Tekst bez formatowania',
	'ow_TranslatedTextAttribute' => 'Właściwość',
	'ow_TranslatedText' => 'Przetłumaczony tekst',
	'ow_TranslatedTextAttributeValue' => 'Tekst',
	'ow_TranslatedTextAttributeValues' => 'Teksty możliwe do przetłumaczenia',
	'ow_LinkAttribute' => 'Właściwość',
	'ow_LinkAttributeValues' => 'Linki',
	'ow_Property' => 'Właściwość',
	'ow_Value' => 'Wartość',
	'ow_meaningsoftitle' => 'Znaczenia „$1”',
	'ow_meaningsofsubtitle' => '<em>Link wiki:</em> [[$1]]',
	'ow_Permission_denied' => '<h2>DOSTĘP ZABRONIONY</h2>',
	'ow_copy_no_action_specified' => 'Określ akcję',
	'ow_copy_help' => 'Pomoc nie została jeszcze zaimplementowana.',
	'ow_please_proved_dmid' => 'We wprowadzonych danych nie odnaleziono wpisu „?dmid=<ID>” (dmid=Defined Meaning ID)<br />Skontaktuj się z administratorem serwera.',
	'ow_please_proved_dc1' => 'We wprowadzonych danych nie odnaleziono wpisu „?dc1=<jakieś_dane>” (dc1=dataset context 1, zestaw danych Z KTÓREGO ma nastąpić kopiowanie)<br />Skontaktuj się z administratorem serwera.',
	'ow_please_proved_dc2' => 'We wprowadzonych danych nie odnaleziono wpisu „?dc2=<jakieś_dane>” (dc2=dataset context 2, zestaw danych DO KTÓREGO ma nastąpić kopiowanie)<br />Skontaktuj się z administratorem serwera.',
	'ow_copy_successful' => '<h2>Kopiowanie powiodło się</h2>Dane najprawdopodobniej udało się bezpiecznie skopiować. Zalecane jest jednak sprawdzenie poprawności wykonania kopii.',
	'ow_copy_unsuccessful' => '<h3>Kopiowanie nie powiodło się</h3>Nie przeprowadzono operacji kopiowania.',
	'ow_no_action_specified' => '<h3>Nie podano działania</h3>Może przeszedłeś do tej strony bezpośrednio? Zazwyczaj użytkownicy nie muszą tu zaglądać.',
	'ow_db_consistency_not_found' => '<h2>Błąd</h2>Wystąpił błąd spójności bazy danych. Dane wiki nie są w stanie odnaleźć odpowiednich danych skojarzonych z określonym identyfikatorem. Dane mogły zostać utracone. Skontaktuj sie z operatorem serwera, lub jego administratorem.',
);

/** Piedmontese (Piemontèis)
 * @author Bèrto 'd Sèra
 */
$wdMessages['pms'] = array(
	'datasearch' => 'Wikidata: Arsërca antra ij dat',
	'langman_title' => 'Gestor dle lenghe',
	'languages' => 'Wikidata: Gestor dle lenghe',
	'ow_save' => 'Salvé',
	'ow_datasets' => 'Base dat',
	'ow_AlternativeDefinition' => 'Definission alternativa',
	'ow_AlternativeDefinitions' => 'Definission alternative',
	'ow_Annotation' => 'Nòta',
	'ow_ApproximateMeanings' => 'Sust a truch e branca',
	'ow_ClassMembership' => 'Part ëd la class',
	'ow_Collection' => 'Colession',
	'ow_CollectionMembership' => 'Part ëd la colession',
	'ow_Definition' => 'Sust',
	'ow_DefinedMeaningAttributes' => 'Nòta',
	'ow_DefinedMeaning' => 'Sust definì',
	'ow_DefinedMeaningReference' => 'Sust definì',
	'ow_ExactMeanings' => 'Àutri sust daspërlor',
	'ow_Expression' => 'Espression',
	'ow_Expressions' => 'Espression',
	'ow_IdenticalMeaning' => 'Istess sust?',
	'ow_IncomingRelations' => "Relassion ch'a rivo",
	'ow_Language' => 'Lenga',
	'ow_LevelAnnotation' => 'Nòta',
	'ow_OtherDefinedMeaning' => 'Àutri sust',
	'ow_PopupAnnotation' => 'Nòta',
	'ow_Relations' => 'Relassion',
	'ow_RelationType' => 'Sòrt ëd relassion',
	'ow_Spelling' => 'Forma',
	'ow_Synonyms' => 'Sinònim',
	'ow_SynonymsAndTranslations' => 'Sinònim e viragi',
	'ow_Source' => 'Sorgiss',
	'ow_SourceIdentifier' => 'Identificativ dla sorgiss',
	'ow_Text' => 'Test',
	'ow_TranslatedTextAttributeValue' => 'Test',
	'ow_Property' => 'Proprietà',
	'ow_Value' => 'Valor',
);

/** Pashto (پښتو)
 * @author Ahmed-Najib-Biabani-Ibrahimkhel
 */
$wdMessages['ps'] = array(
	'langman_title' => 'د ژبې سمبالګر',
	'languages' => 'Wikidata: د ژبې سمبالګر',
	'ow_save' => 'خوندي کول',
	'ow_history' => 'پېښليک',
	'ow_uiprefs' => 'ويکيډاټا',
	'ow_none_selected' => 'هېڅ هم نه دی ټاکل شوی',
	'ow_conceptmapping_help' => '<p>شونې کړنې: <ul>
<li>&action=insert&<data_context_prefix>=<defined_id>&...  insert a mapping</li>
<li>&action=get&concept=<concept_id>  read a mapping back</li>
<li>&action=list_sets  return a list of possible data context prefixes and what they refer to.</li>
<li>&action=get_associated&dm=<defined_meaning_id>&dc=<dataset_context_prefix> for one defined meaning in a concept, return all others</li>
<li>&action=help  Show helpful help.</li>
</ul></p>',
	'ow_conceptmapping_no_action_specified' => 'بښنه غواړم، زه نه پوهېږم چې څنګه "$1".',
	'ow_dm_not_present' => 'نه دی ورکړ شوی',
	'ow_ApproximateMeanings' => 'نژدې ماناګانې',
	'ow_ClassAttributeLevel' => 'کچه',
	'ow_ClassAttributeType' => 'ډول',
	'ow_Collection' => 'غونډ',
	'ow_Definition' => 'پېژند',
	'ow_DefinedMeaning' => 'پېژندل شوې مانا',
	'ow_DefinedMeaningReference' => 'پېژندل شوې مانا',
	'ow_GotoSource' => 'سرچينې ته ورځه',
	'ow_Language' => 'ژبه',
	'ow_OptionAttribute' => 'ځانتيا',
	'ow_Synonyms' => 'هممانيزونه',
	'ow_SynonymsAndTranslations' => 'هممانيزونه او ژباړې',
	'ow_Source' => 'سرچينه',
	'ow_TextAttribute' => 'ځانتيا',
	'ow_Text' => 'متن',
	'ow_TranslatedTextAttribute' => 'ځانتيا',
	'ow_TranslatedText' => 'ژباړل شوی متن',
	'ow_TranslatedTextAttributeValue' => 'متن',
	'ow_TranslatedTextAttributeValues' => 'د ژباړلو وړ متن',
	'ow_LinkAttribute' => 'ځانتيا',
	'ow_LinkAttributeValues' => 'تړنې',
	'ow_Property' => 'ځانتيا',
	'ow_Value' => 'ارزښت',
	'ow_meaningsoftitle' => 'د "$1" ماناګانې',
	'ow_Permission_denied' => '<h2>د اجازې غوښتنه مو رد شوه</h2>',
	'ow_copy_no_action_specified' => 'لطفاً يوه کړنه ځانګړې کړی',
	'ow_copy_help' => 'يوه ورځ به موږ ستاسو سره مرسته وکړو.',
);

/** Portuguese (Português)
 * @author Malafaya
 * @author Waldir
 */
$wdMessages['pt'] = array(
	'languages' => 'Wikidata: Gestor de línguas',
	'langman_title' => 'Gestor de línguas',
	'langman_not_allowed' => 'Você não tem permissão para alterar a configuração das línguas.',
	'langman_header' => 'Introduza abaixo o código da língua e o seu nome em inglês:',
	'langman_req_fields' => 'Ambos o nome da língua e o código ISO 639-3 são obrigatórios!',
	'langman_adding' => 'A adicionar língua $1 com chave $2.',
	'langman_langname' => 'Nome da língua:',
	'langman_iso639-3' => 'Código ISO 639-3:',
	'langman_iso639-2' => 'Código ISO 639-2:',
	'langman_wikimedia' => 'Código Wikimedia:',
	'langman_field_optional' => '(opcional)',
	'langman_addlang' => 'Adicionar língua',
	'importlangnames' => 'Wikidata: Importar nomes de línguas',
	'importlangnames_title' => 'Importar Nomes de Línguas',
	'importlangnames_not_allowed' => 'Você não tem permissão para importar nomes de línguas.',
	'importlangnames_added' => 'Nomes de língua para "$1" adicionados.',
	'importlangnames_not_found' => '<strong>Nenhuma entrada de língua para "$1" encontrada!</strong>',
	'datasearch' => 'Wikidata: Pesquisa de dados',
	'addcollection' => 'Wikidata: Adicionar colecção',
	'ow_save' => 'Gravar',
	'ow_history' => 'História',
	'ow_datasets' => 'Selecção do conjunto de dados',
	'ow_noedit_title' => 'Não tem permissões para editar',
	'ow_noedit' => 'Não está autorizado a editar páginas no conjunto de dados "$1". Por favor, veja [[{{MediaWiki:Ow editing policy url}}|a nossa política de edição]].',
	'ow_uipref_datasets' => 'Vista padrão:',
	'ow_uiprefs' => 'Wikidata',
	'ow_none_selected' => 'Nenhum seleccionado',
	'ow_conceptmapping_help' => '<p>acções possíveis:
<ul>
 <li>&action=insert&<data_context_prefix>=<defined_id>&... inserir um mapeamento</li>
 <li>&action=get&concept=<concept_id> ler um mapeamento de volta</li>
 <li>&action=list_sets retornar uma lista de prefixos de contexto de dados possíveis e a que se referem.</li>
 <li>&action=get_associated&dm=<defined_meaning_id>&dc=<dataset_context_prefix> para um significado definido num conceito, retornar todos os outros</li>
 <li>&action=help Mostrar ajuda preciosa.</li>
</ul>
</p>',
	'ow_conceptmapping_uitext' => '<p>O Mapeamento de Conceitos permite-lhe identificar que significado definido num conjunto de dados é idêntico a outros significados definidos noutro conjunto de dados.</p>',
	'ow_conceptmapping_no_action_specified' => 'A acção "$1" não é suportada.',
	'ow_dm_OK' => 'OK',
	'ow_dm_not_present' => 'não introduzido',
	'ow_dm_not_found' => 'não encontrado na base de dados ou mal formado',
	'ow_mapping_successful' => 'Mapeados todos os campos marcados com [OK]<br />',
	'ow_mapping_unsuccessful' => 'É necessário ter pelo menos dois significados definidos antes de poder ligá-los.',
	'ow_will_insert' => 'Será inserido o seguinte:',
	'ow_contents_of_mapping' => 'Conteúdo de mapeamento',
	'ow_available_contexts' => 'Contextos disponíveis',
	'ow_add_concept_link' => 'Adicionar ligação para outros conceitos',
	'ow_concept_panel' => 'Painel de Conceitos',
	'ow_dm_badtitle' => 'Esta página não aponta para nenhum Significado Definido (conceito). Por favor, verifique o endereço web.',
	'ow_dm_missing' => 'Esta página parece apontar para um Significado Definido (conceito) inexistente. Por favor, verifique o endereço web.',
	'ow_AddHint' => 'Introduza novas linhas a adicionar',
	'ow_AlternativeDefinition' => 'Definição alternativa',
	'ow_AlternativeDefinitions' => 'Definições alternativas',
	'ow_Annotation' => 'Anotação',
	'ow_ApproximateMeanings' => 'Significados aproximados',
	'ow_ClassAttributeAttribute' => 'Atributo',
	'ow_ClassAttributes' => 'Atributos de classe',
	'ow_ClassAttributeLevel' => 'Nível',
	'ow_ClassAttributeType' => 'Tipo',
	'ow_ClassMembership' => 'Associação a classes',
	'ow_Collection' => 'Colecção',
	'ow_Collection_colon' => 'Colecção:',
	'ow_CollectionMembership' => 'Associação a colecções',
	'ow_Definition' => 'Definição',
	'ow_DefinedMeaningAttributes' => 'Anotação',
	'ow_DefinedMeaning' => 'Significado definido',
	'ow_DefinedMeaningReference' => 'Significado definido',
	'ow_ExactMeanings' => 'Significados exactos',
	'ow_Expression' => 'Expressão',
	'ow_ExpressionMeanings' => 'Significados da expressão',
	'ow_Expressions' => 'Expressões',
	'ow_IdenticalMeaning' => 'Significado idêntico?',
	'ow_IncomingRelations' => 'Relações afluentes',
	'ow_GotoSource' => 'Ir para fonte',
	'ow_Language' => 'Língua',
	'ow_LevelAnnotation' => 'Anotação',
	'ow_OptionAttribute' => 'Propriedade',
	'ow_OptionAttributeOption' => 'Opção',
	'ow_OptionAttributeOptions' => 'Opções',
	'ow_OptionAttributeValues' => 'Valores da opção',
	'ow_OtherDefinedMeaning' => 'Outro significado definido',
	'ow_PopupAnnotation' => 'Anotação',
	'ow_Relations' => 'Relações',
	'ow_RelationType' => 'Tipo de relação',
	'ow_Remove' => 'Remover',
	'ow_RemoveHint' => 'Assinale as linhas a remover',
	'ow_Spelling' => 'Ortografia',
	'ow_SuggestHint' => 'Clique para alterar a selecção',
	'ow_Synonyms' => 'Sinónimos',
	'ow_SynonymsAndTranslations' => 'Sinónimos e traduções',
	'ow_Source' => 'Fonte',
	'ow_SourceIdentifier' => 'Identificador da fonte',
	'ow_TextAttribute' => 'Propriedade',
	'ow_Text' => 'Texto',
	'ow_TextAttributeValues' => 'Textos simples',
	'ow_TranslatedTextAttribute' => 'Propriedade',
	'ow_TranslatedText' => 'Texto traduzido',
	'ow_TranslatedTextAttributeValue' => 'Texto',
	'ow_TranslatedTextAttributeValues' => 'Textos traduzíveis',
	'ow_LinkAttribute' => 'Propriedade',
	'ow_LinkAttributeValues' => 'Ligações',
	'ow_Property' => 'Propriedade',
	'ow_Value' => 'Valor',
	'ow_meaningsoftitle' => 'Significados de "$1"',
	'ow_meaningsofsubtitle' => '<em>Ligação Wiki:</em> [[$1]]',
	'ow_Permission_denied' => '<h2>PERMISSÃO NEGADA</h2>',
	'ow_copy_no_action_specified' => 'Por favor, especifique uma acção',
	'ow_copy_help' => 'A ajuda ainda não está implementada.',
	'ow_please_proved_dmid' => 'Epá, parece que está a faltar um "?dmid=<qualquercoisa>" (dmid=ID do Significado Definido) aos dados introduzidos<br />
Por favor, contacte um administrador do servidor.',
	'ow_please_proved_dc1' => 'Epá, parece que está a faltar um "?dc1=<qualquercoisa>" (dc1=contexto de conjunto de dados 1, conjunto de dados DO qual copiar) aos dados introduzidos<br />
Por favor, contacte um administrador do servidor.',
	'ow_please_proved_dc2' => 'Epá, parece que está a faltar um "?dc2=<qualquercoisa>" (dc2=contexto de conjunto de dados 2, conjunto de dados PARA o qual copiar) aos dados introduzidos<br />
Por favor, contacte um administrador do servidor.',
	'ow_copy_successful' => '<h2>Cópia com Sucesso</h2>
Os seus dados aparentam ter sido copiados com sucesso. Não se esqueça de verificar para ter a certeza!',
	'ow_copy_unsuccessful' => '<h3>Cópia sem sucesso</h3> Não houve lugar a nenhuma operação de cópia.',
	'ow_no_action_specified' => '<h3>Nenhuma acção foi especificada</h3> Talvez tenha vindo a esta página directamente? Em condições normais, não precisaria de estar aqui.',
	'ow_db_consistency_not_found' => '<h2>Erro</h2>Há um problema com a consistência da base de dados, wikidata não consegue encontrar dados válidos relacionados com o ID deste significado definido, poderá ter-se perdido. Por favor, contacte o operador ou administrador do servidor.',
	'ow_needs_xlation_title' => 'Expressões sem tradução',
	'ow_needs_xlation_source_lang' => 'Língua origem:',
	'ow_needs_xlation_dest_lang' => 'Língua destino:',
	'ow_needs_xlation_no_dest_lang' => 'Por favor, especifique uma língua destino.',
	'ow_show' => 'Mostrar',
	'ow_create' => 'Criar',
	'ow_collection_added' => '<strong>Colecção $1 adicionada.</strong>',
	'ow_suggest_previous' => 'Anterior',
	'ow_suggest_next' => 'Posterior',
	'ow_suggest_clear' => 'Limpar',
);

/** Brazilian Portuguese (Português do Brasil)
 * @author Heldergeovane
 */
$wdMessages['pt-br'] = array(
	'languages' => 'Wikidata: Gestor de línguas',
	'langman_title' => 'Gestor de línguas',
	'datasearch' => 'Wikidata: Pesquisa de dados',
	'ow_save' => 'Salvar',
	'ow_history' => 'Histórico',
	'ow_datasets' => 'Seleção de conjunto de dados',
	'ow_noedit_title' => 'Não tem permissão para editar',
	'ow_noedit' => 'Você não está autorizado a editar páginas no conjunto de dados "$1".
Por favor, veja [[{{MediaWiki:Ow editing policy url}}|nossa política de edição]].',
	'ow_uipref_datasets' => 'Exibição padrão:',
	'ow_uiprefs' => 'Wikidata',
	'ow_none_selected' => 'Nenhum selecionado',
	'ow_conceptmapping_help' => '<p>ações possíveis: <ul>
<li>&action=insert&<data_context_prefix>=<defined_id>&...  inserir um mapeamento</li>
<li>&action=get&concept=<concept_id>  ler um mapeamento de volta</li>
<li>&action=list_sets  retornar uma lista de prefixos de contexto de dados possíveis e a que se referem.</li>
<li>&action=get_associated&dm=<defined_meaning_id>&dc=<dataset_context_prefix>  para um significado definido num conceito, retornar todos os outros</li>
<li>&action=help  Mostrar ajuda preciosa.</li>
</ul>
</p>',
	'ow_conceptmapping_uitext' => '<p>O Mapeamento de Conceitos permite-lhe identificar que significado definido em um conjunto de dados é idêntico a significados definidos em outro conjunto de dados.</p>',
	'ow_conceptmapping_no_action_specified' => 'A ação "$1" não é suportada.',
	'ow_dm_OK' => 'OK',
	'ow_dm_not_present' => 'não introduzido',
	'ow_dm_not_found' => 'não encontrado no banco de dados ou mal formado',
	'ow_mapping_successful' => 'Mapeados todos os campos marcados com [OK]<br />',
	'ow_mapping_unsuccessful' => 'É necessário ter pelo menos dois significados definidos antes de poder ligá-los.',
	'ow_will_insert' => 'Será inserido o seguinte:',
	'ow_contents_of_mapping' => 'Conteúdo do mapeamento',
	'ow_available_contexts' => 'Contextos disponíveis',
	'ow_add_concept_link' => 'Adicionar ligação para outros conceitos',
	'ow_concept_panel' => 'Painel de Conceitos',
	'ow_dm_badtitle' => "Esta página não aponta para nenhum Significado Definido (conceito).
Por favor, verifique o endereço ''web''.",
	'ow_dm_missing' => "Esta página parece apontar para um Significado Definido (conceito) inexistente.
Por favor, verifique o endereço ''web''.",
	'ow_AlternativeDefinition' => 'Definição alternativa',
	'ow_AlternativeDefinitions' => 'Definições alternativas',
	'ow_Annotation' => 'Anotação',
	'ow_ApproximateMeanings' => 'Significados aproximados',
	'ow_ClassAttributeAttribute' => 'Atributo',
	'ow_ClassAttributes' => 'Atributos da classe',
	'ow_ClassAttributeLevel' => 'Nível',
	'ow_ClassAttributeType' => 'Tipo',
	'ow_ClassMembership' => 'Associação a classes',
	'ow_Collection' => 'Coleção',
	'ow_CollectionMembership' => 'Associação a coleções',
	'ow_Definition' => 'Definição',
	'ow_DefinedMeaningAttributes' => 'Anotação',
	'ow_DefinedMeaning' => 'Significado definido',
	'ow_DefinedMeaningReference' => 'Significado definido',
	'ow_ExactMeanings' => 'Significados exatos',
	'ow_Expression' => 'Expressão',
	'ow_ExpressionMeanings' => 'Significados da expressão',
	'ow_Expressions' => 'Expressões',
	'ow_IdenticalMeaning' => 'Significado idêntico?',
	'ow_IncomingRelations' => 'Relações afluentes',
	'ow_GotoSource' => 'Ir para fonte',
	'ow_Language' => 'Idioma',
	'ow_LevelAnnotation' => 'Anotação',
	'ow_OptionAttribute' => 'Propriedade',
	'ow_OptionAttributeOption' => 'Opção',
	'ow_OptionAttributeOptions' => 'Opções',
	'ow_OptionAttributeValues' => 'Valores da opção',
	'ow_OtherDefinedMeaning' => 'Outro significado definido',
	'ow_PopupAnnotation' => 'Anotação',
	'ow_Relations' => 'Relações',
	'ow_RelationType' => 'Tipo de relação',
	'ow_Spelling' => 'Ortografia',
	'ow_Synonyms' => 'Sinônimos',
	'ow_SynonymsAndTranslations' => 'Sinônimos e traduções',
	'ow_Source' => 'Fonte',
	'ow_SourceIdentifier' => 'Identificador da fonte',
	'ow_TextAttribute' => 'Propriedade',
	'ow_Text' => 'Texto',
	'ow_TextAttributeValues' => 'Textos simples',
	'ow_TranslatedTextAttribute' => 'Propriedade',
	'ow_TranslatedText' => 'Texto traduzido',
	'ow_TranslatedTextAttributeValue' => 'Texto',
	'ow_TranslatedTextAttributeValues' => 'Textos traduzíveis',
	'ow_LinkAttribute' => 'Propriedade',
	'ow_LinkAttributeValues' => 'Ligações',
	'ow_Property' => 'Propriedade',
	'ow_Value' => 'Valor',
	'ow_meaningsoftitle' => 'Significados de "$1"',
	'ow_meaningsofsubtitle' => '<em>Ligação wiki:</em> [[$1]]',
	'ow_Permission_denied' => '<h2>Permissão negada</h2>',
	'ow_copy_no_action_specified' => 'Por favor, especifique uma ação',
	'ow_copy_help' => 'A ajuda ainda não está implementada.',
	'ow_please_proved_dmid' => 'Parece que em sua entrada está faltando um "?dmid=<qualquercoisa>" (dmid=ID do Significado Definido)<br />
Por favor, contate um administrador do servidor.',
	'ow_please_proved_dc1' => 'Parece que em sua entrada está faltando um "?dc1=<qualquercoisa>" (dc1=contexto de conjunto de dados 1, conjunto de dados DO QUAL copiar)<br />
Por favor, contate um administrador do servidor.',
	'ow_please_proved_dc2' => 'Parece que em sua entrada está faltando um "?dc2=<qualquercoisa>" (dc2=contexto de conjunto de dados 2, conjunto de dados PARA O QUAL copiar)<br />
Por favor, contate um administrador do servidor.',
	'ow_copy_successful' => '<h2>Sucesso na cópia</h2>
Os seus dados parecem ter sido copiados com sucesso.
Não se esqueça de verificar para ter a certeza!',
	'ow_copy_unsuccessful' => '<h3>Falha na cópia</h3>
Não houve nenhuma operação de cópia.',
	'ow_no_action_specified' => '<h3>Nenhuma ação foi especificada</h3>
Talvez você tenha vindo a esta página diretamente? Normalmente você não precisaria estar aqui.',
	'ow_db_consistency_not_found' => '<h2>Erro</h2>
Há um problema com a consistência do banco de dados, wikidata não consegue encontrar dados válidos relacionados com o ID deste significado definido.
Pode ter sido perdido.
Por favor, contate o operador ou administrador do servidor.',
);

/** Tarifit (Tarifit)
 * @author Jose77
 */
$wdMessages['rif'] = array(
	'ow_history' => 'Amzruy',
	'ow_LinkAttributeValues' => 'Tiẓdyin',
);

/** Romanian (Română)
 * @author KlaudiuMihaila
 */
$wdMessages['ro'] = array(
	'datasearch' => 'Wikidata: Căutare de date',
	'ow_save' => 'Salvează',
	'ow_history' => 'Istoric',
	'ow_noedit_title' => 'Fără permisiune de modificare',
	'ow_conceptmapping_no_action_specified' => 'Scuze, nu ştiu cum să "$1".',
	'ow_dm_OK' => 'OK',
	'ow_available_contexts' => 'Contexte disponibile',
	'ow_AlternativeDefinition' => 'Definiţie alternativă',
	'ow_AlternativeDefinitions' => 'Definiţii alternative',
	'ow_Annotation' => 'Adnotare',
	'ow_ApproximateMeanings' => 'Sensuri aproximative',
	'ow_ClassAttributeAttribute' => 'Atribut',
	'ow_ClassAttributeLevel' => 'Nivel',
	'ow_ClassAttributeType' => 'Tip',
	'ow_Collection' => 'Colecţie',
	'ow_Definition' => 'Definiţie',
	'ow_DefinedMeaningAttributes' => 'Adnotare',
	'ow_Expression' => 'Expresie',
	'ow_Expressions' => 'Expresii',
	'ow_IdenticalMeaning' => 'Sens identic?',
	'ow_Language' => 'Limbă',
	'ow_LevelAnnotation' => 'Adnotare',
	'ow_OptionAttribute' => 'Proprietate',
	'ow_OptionAttributeOption' => 'Opţiune',
	'ow_OptionAttributeOptions' => 'Opţiuni',
	'ow_PopupAnnotation' => 'Adnotare',
	'ow_Relations' => 'Relaţii',
	'ow_RelationType' => 'Tipul relaţiei',
	'ow_Synonyms' => 'Sinonime',
	'ow_SynonymsAndTranslations' => 'Sinonime şi traduceri',
	'ow_Source' => 'Sursă',
	'ow_TextAttribute' => 'Proprietate',
	'ow_Text' => 'Text',
	'ow_TranslatedTextAttribute' => 'Proprietate',
	'ow_TranslatedText' => 'Text tradus',
	'ow_TranslatedTextAttributeValue' => 'Text',
	'ow_TranslatedTextAttributeValues' => 'Texte traductibile',
	'ow_LinkAttribute' => 'Proprietate',
	'ow_LinkAttributeValues' => 'Legături',
	'ow_Property' => 'Proprietate',
	'ow_Value' => 'Valoare',
	'ow_Permission_denied' => '<h2>Permisiune refuzată</h2>',
	'ow_copy_no_action_specified' => 'Vă rugăm să specificaţi o acţiune',
	'ow_copy_help' => 'Într-o zi vă vom putea ajuta.',
	'ow_copy_successful' => '<h2>Copiere cu succes</h2>
Datele par a fi fost copiate cu succes.
Nu uitaţi să verificaţi pentru a fi siguri!',
	'ow_copy_unsuccessful' => '<h3>Copiere fără succes</h3>
Nici o operaţie de copiere nu a avut loc.',
	'ow_no_action_specified' => '<h3>Nici o acţiune nu a fost specificată</h3>
Poate aţi ajuns la această pagină direct? În mod normal nu ar trebui să fiţi aici.',
);

/** Tarandíne (Tarandíne)
 * @author Joetaras
 */
$wdMessages['roa-tara'] = array(
	'ow_save' => 'Reggìstre',
	'ow_history' => 'Storie',
	'ow_noedit_title' => 'Non ge tine le permesse pe fà cangiaminde',
	'ow_uiprefs' => 'Uicchidate',
	'ow_none_selected' => 'Nisciuna selezione',
	'ow_dm_OK' => 'OK',
	'ow_dm_not_present' => "non g'è 'nzerite ninde",
	'ow_dm_not_found' => "non ge l'agghje acchiete jndr'à 'u database o jè malformete",
	'ow_Annotation' => 'Annotazziune',
	'ow_ClassAttributeAttribute' => 'Attribbute',
	'ow_ClassAttributes' => "Attribbute d'a classe",
	'ow_ClassAttributeLevel' => 'Levèlle',
	'ow_ClassAttributeType' => 'Tipe',
	'ow_DefinedMeaningAttributes' => 'Annotazziune',
	'ow_Expression' => 'Espressione',
	'ow_Language' => 'Lènghe',
	'ow_OptionAttribute' => 'Proprietà',
	'ow_OptionAttributeOption' => 'Opzione',
	'ow_OptionAttributeOptions' => 'Opzione',
	'ow_TextAttribute' => 'Proprietà',
	'ow_Text' => 'Teste',
	'ow_TranslatedTextAttribute' => 'Proprietà',
	'ow_TranslatedText' => 'Teste tradotte',
	'ow_TranslatedTextAttributeValue' => 'Teste',
	'ow_TranslatedTextAttributeValues' => 'Teste ca ponne essere tradotte',
	'ow_LinkAttribute' => 'Proprietà',
	'ow_LinkAttributeValues' => 'Collegaminde',
	'ow_Property' => 'Proprietà',
	'ow_Value' => 'Valore',
	'ow_meaningsoftitle' => 'Significhete de "$1"',
	'ow_meaningsofsubtitle' => '<em>Collegamende de Uicchi:</em> [[$1]]',
	'ow_Permission_denied' => '<h2>Permesse neghete</h2>',
	'ow_copy_help' => "L'aiute angore non g'è presende.
<!-- Quacche giurne, pò essere ca v'aiuteme. -->",
);

/** Russian (Русский)
 * @author Aleksandrit
 * @author Kaganer
 * @author Александр Сигачёв
 */
$wdMessages['ru'] = array(
	'languages' => 'Викиданные: Языковой менеджер',
	'langman_title' => 'Языковой менеджер',
	'datasearch' => 'Викиданные: Поиск данных',
	'ow_save' => 'Сохранить',
	'ow_history' => 'История',
	'ow_datasets' => 'Выбор набора данных',
	'ow_noedit_title' => 'Нет прав для редактирования',
	'ow_noedit' => 'Вам не разрешено редактировать страницы в наборе данных «$1». Обратите внимание на [[{{MediaWiki:Ow editing policy url}}|наши правила редактирования]].',
	'ow_uipref_datasets' => 'Вид по умолчанию',
	'ow_uiprefs' => 'Викиданные',
	'ow_none_selected' => 'Ничего не выбрано',
	'ow_conceptmapping_help' => '<p>возможные действия: <ul>
<li>&action=insert&<data_context_prefix>=<defined_id>&...  вставить соответствие</li>
<li>&action=get&concept=<concept_id>  прочитать соответствие</li>
<li>&action=list_sets  вывести список возможных приставок контекстов данных и мест, куда они ссылаются.</li>
<li>&action=get_associated&dm=<defined_meaning_id>&dc=<dataset_context_prefix> для одного определённого значения в концепте вывести все остальные</li>
<li>&action=help  вывести спрвочную информацию.</li>
</ul></p>',
	'ow_conceptmapping_uitext' => '<p>Установка соответствий концептов позволяет вам указать какое определённое значение в одном наборе данных тождественно определённым значениям в других наборах данных.</p>',
	'ow_conceptmapping_no_action_specified' => 'Не поддерживается действие «$1».',
	'ow_dm_OK' => 'OK',
	'ow_dm_not_present' => 'не введено',
	'ow_dm_not_found' => 'не найдено в базе данных или неформат',
	'ow_mapping_successful' => 'Подключенны все поля, помеченные [OK]<br />',
	'ow_mapping_unsuccessful' => 'Нужно иметь по крайней мере два определённых значения, прежде чем они смогут быть связаны между собой.',
	'ow_will_insert' => 'Будет добавлено следующее:',
	'ow_contents_of_mapping' => 'Содержание отображения',
	'ow_available_contexts' => 'Доступные контексты',
	'ow_add_concept_link' => 'Добавить ссылку на другие концепты',
	'ow_concept_panel' => 'Панель концептов',
	'ow_dm_badtitle' => 'Эта страница не указывает ни на одно ОпределённоеЗначение (концепт). Пожалуйста, проверьте веб-адрес.',
	'ow_dm_missing' => 'По видимому, эта страница указывает на несуществующее ОпределённоеЗначение (концепт). Пожалуйста, проверьте веб-адрес.',
	'ow_AlternativeDefinition' => 'Альтернативное определение',
	'ow_AlternativeDefinitions' => 'Альтернативные определения',
	'ow_Annotation' => 'Аннотация',
	'ow_ApproximateMeanings' => 'Приблизительные значения',
	'ow_ClassAttributeAttribute' => 'Свойство',
	'ow_ClassAttributes' => 'Свойства класса',
	'ow_ClassAttributeLevel' => 'Уровень',
	'ow_ClassAttributeType' => 'Тип',
	'ow_ClassMembership' => 'Членство в классах',
	'ow_Collection' => 'Коллекция',
	'ow_CollectionMembership' => 'Присутствует в коллекциях',
	'ow_Definition' => 'Определение',
	'ow_DefinedMeaningAttributes' => 'Аннотация',
	'ow_DefinedMeaning' => 'Определённое значение',
	'ow_DefinedMeaningReference' => 'Определённое значение',
	'ow_ExactMeanings' => 'Точные значения',
	'ow_Expression' => 'Выражение',
	'ow_ExpressionMeanings' => 'Значения выражений',
	'ow_Expressions' => 'Выражения',
	'ow_IdenticalMeaning' => 'тождественное значение?',
	'ow_IncomingRelations' => 'Входящие отношения',
	'ow_GotoSource' => 'Перейти к исходнику',
	'ow_Language' => 'Язык',
	'ow_LevelAnnotation' => 'Аннотация',
	'ow_OptionAttribute' => 'Свойство',
	'ow_OptionAttributeOption' => 'Параметр',
	'ow_OptionAttributeOptions' => 'Параметры',
	'ow_OptionAttributeValues' => 'Значения параметров',
	'ow_OtherDefinedMeaning' => 'Другое определённое значение',
	'ow_PopupAnnotation' => 'Аннотация',
	'ow_Relations' => 'Отношения',
	'ow_RelationType' => 'Тип отношения',
	'ow_Spelling' => 'Правописание',
	'ow_Synonyms' => 'Синонимы',
	'ow_SynonymsAndTranslations' => 'Синонимы и переводы',
	'ow_Source' => 'Источник',
	'ow_SourceIdentifier' => 'Идентификатор источника',
	'ow_TextAttribute' => 'Свойство',
	'ow_Text' => 'Текст',
	'ow_TextAttributeValues' => 'Простые тексты',
	'ow_TranslatedTextAttribute' => 'Свойство',
	'ow_TranslatedText' => 'Переведённый текст',
	'ow_TranslatedTextAttributeValue' => 'Текст',
	'ow_TranslatedTextAttributeValues' => 'Переводимые тексты',
	'ow_LinkAttribute' => 'Свойство',
	'ow_LinkAttributeValues' => 'Ссылки',
	'ow_Property' => 'Свойство',
	'ow_Value' => 'Значение',
	'ow_meaningsoftitle' => 'Значение «$1»',
	'ow_meaningsofsubtitle' => '<em>Вики-ссылка:</em> [[$1]]',
	'ow_Permission_denied' => '<h2>Доступ запрещён</h2>',
	'ow_copy_no_action_specified' => 'Пожалуйста, укажите действие',
	'ow_copy_help' => 'Справка ещё не реализована.',
	'ow_please_proved_dmid' => 'Похоже, что во входных данных отсутствует «?dmid=<ID>» (dmid — идентификатор определённого значения)<br /> Пожалуйста, свяжитесь с администратором сервера.',
	'ow_please_proved_dc1' => 'Похоже, что во входных данных отсутствует «?dc1=<something>» (dc1 — контекст набора данных; набор данных, откуда копировать)<br /> Пожалуйста, свяжитесь с администратором сервера.',
	'ow_please_proved_dc2' => 'Похоже, что во входных данных отсутствует «dc2=<something>» (dc2 — контекст набора данных; набор данных куда копировать)<br /> Пожалуйста, свяжитесь с администратором сервера.',
	'ow_copy_successful' => '<h2>Копирование успешно выполнено</h2>Похоже, что ваши данные были успешно скопированы. Но будет нелишним проверить это ещё раз.',
	'ow_copy_unsuccessful' => '<h3>Копирование неудачно</h3> Не было выполнено операции копирования.',
	'ow_no_action_specified' => '<h3>Не было указано действие</h3> Возможно, вы зашли непосредственно на эту страницу? В ходе нормальной работы вы не должны были здесь очутиться.',
	'ow_db_consistency_not_found' => '<h2>Ошибка</h2>В связи с нарушением целостности базы данных, Викиданные не могут найти верных данных, связанных с этим значением идентификатора. Возможно, они потеряны. Пожалуйста, свяжитесь с оператором сервера или администратором.',
);

/** Slovak (Slovenčina)
 * @author Helix84
 */
$wdMessages['sk'] = array(
	'languages' => 'Wikidata: Správca jazykov',
	'langman_title' => 'Správca jazykov',
	'datasearch' => 'Wikidata: Hľadanie údajov',
	'ow_save' => 'Uložiť',
	'ow_history' => 'História',
	'ow_datasets' => 'Výber množiny dát',
	'ow_noedit_title' => 'Nemáte povolenie upravovať',
	'ow_noedit' => 'Nemáte oprávnenie upravovať stránky v množine dát „$1“.
Prosím, pozrite si [[{{MediaWiki:Ow editing policy url}}|našu politiku ohľadne upravovania]].',
	'ow_uipref_datasets' => 'Štandardné zobrazenie',
	'ow_uiprefs' => 'Wikidata',
	'ow_none_selected' => 'žiadne vybrané',
	'ow_conceptmapping_help' => '<p>možné činnosti: <ul>
<li>&action=insert&<data_context_prefix>=<defined_id>&...  vložiť mapovanie</li>
<li>&action=get&concept=<concept_id>  prečítať mapovanie</li>
<li>&action=list_sets  vrátiť zoznam možných predpon dátových kontextov a na čo odkazujú.</li>
<li>&action=get_associated&dm=<defined_meaning_id>&dc=<dataset_context_prefix> pre jeden Definovaný význam v rámci pojmu, vrátiť všetky ostatné</li>
<li>&action=help  Zobraziť pomocníka.</li>
</ul></p>',
	'ow_conceptmapping_uitext' => '<p>Mapovanie pojmov vám umožňuje určiť, ktorý Definovaný význam v jednej množine dát je zhodný s Definovanými významami v ostatných množinách dát.</p>',
	'ow_conceptmapping_no_action_specified' => 'Operácia „$1“ nie je podporovaná.',
	'ow_dm_OK' => 'OK',
	'ow_dm_not_present' => 'nezadané',
	'ow_dm_not_found' => 'nenájdené v databáze alebo v zlom tvare',
	'ow_mapping_successful' => 'Všetky polia označené [OK] boli namapované<br />',
	'ow_mapping_unsuccessful' => 'Je potrebné mať aspoň dva Definované významy, aby ich bolo možné spojiť.',
	'ow_will_insert' => 'Vloží nasledovné:',
	'ow_contents_of_mapping' => 'Obsah mapovania',
	'ow_available_contexts' => 'Dostupné kontexty',
	'ow_add_concept_link' => 'Pridať odkaz na ostatné pojmy',
	'ow_concept_panel' => 'Panel pojmu',
	'ow_dm_badtitle' => 'Táto stránka neukazuje na žiadny Definovaný význam (pojem). Prosím, skontrolujte URL.',
	'ow_dm_missing' => 'Zdá sa, že táto stránka ukazuje na neexistujúci Definovaný význam (pojem). Prosím, skontrolujte URL.',
	'ow_AlternativeDefinition' => 'Alternatívna definícia',
	'ow_AlternativeDefinitions' => 'Alternatívne definície',
	'ow_Annotation' => 'Poznámka',
	'ow_ApproximateMeanings' => 'Približné významy',
	'ow_ClassAttributeAttribute' => 'Atribút',
	'ow_ClassAttributes' => 'Atribúty triedy',
	'ow_ClassAttributeLevel' => 'Úroveň',
	'ow_ClassAttributeType' => 'Typ',
	'ow_ClassMembership' => 'Členstvo v triede',
	'ow_Collection' => 'Kolekcia',
	'ow_CollectionMembership' => 'Členstvo v kolekcii',
	'ow_Definition' => 'Definícia',
	'ow_DefinedMeaningAttributes' => 'Poznámka',
	'ow_DefinedMeaning' => 'Definovaný význam',
	'ow_DefinedMeaningReference' => 'Definovaný význam',
	'ow_ExactMeanings' => 'Presné významy',
	'ow_Expression' => 'Výraz',
	'ow_ExpressionMeanings' => 'Významy výrazu',
	'ow_Expressions' => 'Výrazy',
	'ow_IdenticalMeaning' => 'Zhodný význam?',
	'ow_IncomingRelations' => 'Vstupujúce vzťahy',
	'ow_GotoSource' => 'Prejsť na zdroj',
	'ow_Language' => 'Jazyk',
	'ow_LevelAnnotation' => 'Poznámka',
	'ow_OptionAttribute' => 'Vlastnosť',
	'ow_OptionAttributeOption' => 'Možnosť',
	'ow_OptionAttributeOptions' => 'Možnosti',
	'ow_OptionAttributeValues' => 'Hodnoty možností',
	'ow_OtherDefinedMeaning' => 'Iný definovaný význam',
	'ow_PopupAnnotation' => 'Poznámka',
	'ow_Relations' => 'Vzťahy',
	'ow_RelationType' => 'Typ vzťahu',
	'ow_Spelling' => 'Pravopis',
	'ow_Synonyms' => 'Synonymá',
	'ow_SynonymsAndTranslations' => 'Synonymá a preklady',
	'ow_Source' => 'Zdroj',
	'ow_SourceIdentifier' => 'Identifikátor zdroja',
	'ow_TextAttribute' => 'Vlastnosť',
	'ow_Text' => 'Text',
	'ow_TextAttributeValues' => 'Čistý text',
	'ow_TranslatedTextAttribute' => 'Vlastnosť',
	'ow_TranslatedText' => 'Preložený text',
	'ow_TranslatedTextAttributeValue' => 'Text',
	'ow_TranslatedTextAttributeValues' => 'Preložiteľný text',
	'ow_LinkAttribute' => 'Vlastnosť',
	'ow_LinkAttributeValues' => 'Odkazy',
	'ow_Property' => 'Vlastnosť',
	'ow_Value' => 'Hodnota',
	'ow_meaningsoftitle' => 'Významy „$1“',
	'ow_meaningsofsubtitle' => '<em>Wiki odkaz:</em> [[$1]]',
	'ow_Permission_denied' => '<h2>NEMÁTE POTREBNÉ OPRÁVNENIE</h2>',
	'ow_copy_no_action_specified' => 'Prosím, zadajte činnosť',
	'ow_copy_help' => 'Pomocník zatiaľ nie je implementovaný.',
	'ow_please_proved_dmid' => 'Zdá sa, že vo vašom vstupe chýba „?dmid=<ID>“ (dmid=ID Definovaného významu)<br />Prosím kontaktujte správcu servera.',
	'ow_please_proved_dc1' => 'Zdá sa, že ste zabudli zadať „?dc1=<niečo>“ (dcl=kontext množiny dát 1, z ktorej sa kopíruje)<br />Prosím, kontaktujte správcu servera.',
	'ow_please_proved_dc2' => 'Zdá sa že ste zabudli zadať „?dc2=<niečo>“ (dcl=kontext množiny dát 2, do ktorej sa kopíruje)<br />Prosím kontaktujte správcu servera.',
	'ow_copy_successful' => '<h2>Kopírovanie prebehlo úspešne</h2>Zdá sa, že vaše dáta boli skopírované úspešne. Nezabudnite to pre istotu ešte raz skontrolovať!',
	'ow_copy_unsuccessful' => '<h3>Kopírovanie neúspešné</h3> Operácia kopírovania sa neuskutočnila.',
	'ow_no_action_specified' => '<h3>Nebola uvedená činnosť</h3> Možno ste sa snažili na túto stránku pristupovať priamo. Bežne sa sem nemáte dostať.',
	'ow_db_consistency_not_found' => '<h2>Chyba</h2>Nastal problém s konzistenciou databázy. Wikidata nemôže nájsť platné údaje spojené s týmto ID Definovaného významu. Je možné, že sú stratené. Prosím kontaktujte správcu servera.',
);

/** Somali (Soomaaliga)
 * @author Yariiska
 */
$wdMessages['so'] = array(
	'ow_save' => 'Kaydi',
	'ow_history' => 'Taariikh',
);

/** Albanian (Shqip)
 * @author Puntori
 */
$wdMessages['sq'] = array(
	'ow_save' => 'Ruaje',
	'ow_history' => 'Historia',
	'ow_dm_OK' => 'Mirë',
	'ow_ClassAttributeAttribute' => 'Atributi',
	'ow_ClassAttributeLevel' => 'Niveli',
	'ow_ClassAttributeType' => 'Lloji',
	'ow_Collection' => 'Koleksioni',
);

/** Serbian Cyrillic ekavian (ћирилица)
 * @author Millosh
 */
$wdMessages['sr-ec'] = array(
	'ow_save' => 'Сачувај',
	'ow_history' => 'Историја',
	'ow_datasets' => 'Одабир скупа података',
	'ow_noedit_title' => 'Без дозволе за уређивање',
	'ow_noedit' => 'Није ти дозвољено да мењаш стране у скупу података "$1". Види [[{{MediaWiki:Ow editing policy url}}|нашу уређивачку политику]].',
	'ow_uipref_datasets' => 'Подразумевани поглед',
	'ow_uiprefs' => 'Викидата',
	'ow_none_selected' => 'Ништа није означено',
	'ow_conceptmapping_help' => '<p>могуће акције: <ul> <li>&action=insert&<data_context_prefix>=<defined_id>&... унеси мапирање</li> <li>&action=get&concept=<concept_id> поново прочитај мапирање</li> <li>&action=list_sets врати листу могућих контекстуалних префикса и оног на шта упућују.</li> <li>&action=get_associated&dm=<defined_meaning_id>&dc=<dataset_context_prefix> за једно дефинисано значење у концепту врати сва остала</li> <li>&action=help Прикажи помоћ.</li> </ul></p>',
	'ow_conceptmapping_uitext' => '<p>Мапирање концепата ти омогућава да установиш које је дефинисано значење у једном скупу података истоветно с дефинисаним значењима у другим скуповима података.</p>',
	'ow_conceptmapping_no_action_specified' => 'Извињавам се, не знам како да урадим "$1".',
	'ow_dm_OK' => 'Уреду',
	'ow_dm_not_present' => 'није унесено',
	'ow_dm_not_found' => 'није пронађено у бази података или је лоше обликовано',
	'ow_mapping_successful' => 'Сва поља означена са [Уреду]<br />',
	'ow_mapping_unsuccessful' => 'Потребна су бар два дефинисана значења пре него што их могу повезати.',
	'ow_will_insert' => 'Унеће се следеће:',
	'ow_contents_of_mapping' => 'Садржај мапирања',
	'ow_available_contexts' => 'Могући контексти',
	'ow_add_concept_link' => 'Додај линк у друге концепте',
	'ow_concept_panel' => 'Табла концепата',
	'ow_dm_badtitle' => 'Ова страна не показује на ДефинисаноЗначење (концепт). Провери веб адресу.',
	'ow_dm_missing' => 'Ова страна показује на непостојеће ДефинисаноЗначење (концепт). Провери веб адресу.',
	'ow_AlternativeDefinition' => 'Алтернативна дефиниција',
	'ow_AlternativeDefinitions' => 'Алтернативне дефиниције',
	'ow_Annotation' => 'Коментар',
	'ow_ApproximateMeanings' => 'Приближна значења',
	'ow_ClassAttributeAttribute' => 'Особина',
	'ow_ClassAttributes' => 'Класа особина',
	'ow_ClassAttributeLevel' => 'Ниво',
	'ow_ClassAttributeType' => 'Тип',
	'ow_ClassMembership' => 'Класа чланство',
	'ow_Collection' => 'Збирка',
	'ow_CollectionMembership' => 'Збирка чланство',
	'ow_Definition' => 'Дефиниција',
	'ow_DefinedMeaningAttributes' => 'Коментар',
	'ow_DefinedMeaning' => 'Дефинисано значење',
	'ow_DefinedMeaningReference' => 'Дефинисано значење',
	'ow_ExactMeanings' => 'Тачна значења',
	'ow_Expression' => 'Израз',
	'ow_ExpressionMeanings' => 'Значења израза',
	'ow_Expressions' => 'Значења',
	'ow_IdenticalMeaning' => 'Истоветно значење',
	'ow_IncomingRelations' => 'Долазеће релације',
	'ow_GotoSource' => 'Иди на извор',
	'ow_Language' => 'Језик',
	'ow_LevelAnnotation' => 'Коментар',
	'ow_OptionAttribute' => 'Особина',
	'ow_OptionAttributeOption' => 'Опција',
	'ow_OptionAttributeOptions' => 'Опције',
	'ow_OptionAttributeValues' => 'Вредности опције',
	'ow_OtherDefinedMeaning' => '(Неко) друго дефинисано значење',
	'ow_PopupAnnotation' => 'Коментар',
	'ow_Relations' => 'Релације',
	'ow_RelationType' => 'Тип релације',
	'ow_Spelling' => 'Правопис',
	'ow_Synonyms' => 'Синоними',
	'ow_SynonymsAndTranslations' => 'Синоними и преводи',
	'ow_Source' => 'Извор',
	'ow_SourceIdentifier' => 'Означавалац извора',
	'ow_TextAttribute' => 'Особина',
	'ow_Text' => 'Текст',
	'ow_TextAttributeValues' => 'Равни текстови',
	'ow_TranslatedTextAttribute' => 'Особина',
	'ow_TranslatedText' => 'Преведен текст',
	'ow_TranslatedTextAttributeValue' => 'Текст',
	'ow_TranslatedTextAttributeValues' => 'Текстови за превођење',
	'ow_LinkAttribute' => 'Особина',
	'ow_LinkAttributeValues' => 'Линкови',
	'ow_Property' => 'Особина',
	'ow_Value' => 'Вредност',
	'ow_meaningsoftitle' => 'Значења "$1"',
	'ow_meaningsofsubtitle' => '<em>Вики линк:</em> [[$1]]',
	'ow_Permission_denied' => '<h2>ПРИСТУП НИЈЕ ДОЗВОЉЕН</h2>',
	'ow_copy_no_action_specified' => 'Одреди акцију',
	'ow_copy_help' => 'Можда ћемо моћи да ти помогнемо једног дана.',
	'ow_please_proved_dmid' => 'Ух, изгледа да у твом уносу недостаје ?dmid=<something> (dmid=Defined Meaning ID)<br />Хмм... Контактирај администратора сервера.',
	'ow_please_proved_dc1' => 'Ух, изгледа да у твом уносу недостаје ?dc1=<something> (dc1=dataset context 1, dataset to copy FROM)<br />Хмм... Контактирај администратора сервера.',
	'ow_please_proved_dc2' => 'Ух, изгледа да у твом уносу недостаје ?dc2=<something> (dc2=dataset context 2, dataset to copy TO)<br />Хмм... Контактирај администратора сервера.',
	'ow_copy_successful' => '<h2>Умножавање успешно</h2>Чини се да су твоји подаци успешно умножени. Не заборави два пута да провериш!',
);

/** Seeltersk (Seeltersk)
 * @author Pyt
 */
$wdMessages['stq'] = array(
	'languages' => 'Wikidata: Sproakmanager',
	'langman_title' => 'Sproakmanager',
	'datasearch' => 'Wikidata: Doatensäike',
	'ow_save' => 'Spiekerje',
	'ow_history' => 'Versione/Autore',
	'ow_datasets' => 'Uutwoal fon dän Doataset',
	'ow_noedit_title' => 'Neen Ferlof toun Edierjen',
	'ow_noedit' => 'Du hääst nit dät Ferlof Sieden in dän Dataset "$1" tou editierjen. Sjuch [[{{MediaWiki:Ow editing policy url}}|uus Gjuchtlienjen]].',
	'ow_uipref_datasets' => 'Standoardansicht',
	'ow_uiprefs' => 'Wikidoata',
	'ow_none_selected' => 'niks uutwääld',
	'ow_conceptmapping_help' => '<p>Muugelke Aktione: <ul> <li>&action=insert&<data_context_prefix>=<defined_id>&... Ne Ferknättenge bietoutouföigjen</li> <li>&action=get&concept=<concept_id> Ne Ferknättenge ouroupe</li> <li>&action=list_sets Wies ne Lieste fon muugelke Doatenkontextpräfixe un ap wät jo sik beluuke</li> <li>&action=get_associated&dm=<defined_meaning_id>&dc=<dataset_context_prefix> foar ne DefinedMeaning in n Kontext, wies aal uur</li> <li>&action=help Hälpe anwiese.</li> </ul></p>',
	'ow_conceptmapping_uitext' => '<p>Mäd Concept Mapping kon fäästlaid wäide, wäkke DefinedMeaning in n Doataset mäd uur DefinedMeanings uut uur Doatasets identisk is.</p>',
	'ow_conceptmapping_no_action_specified' => 'Ju Aktion "$1" wäd nit unnerstutsed.',
	'ow_dm_OK' => 'OK',
	'ow_dm_not_present' => 'nit ienroat',
	'ow_dm_not_found' => 'nit in ju Doatenboank fuunen of failerhaft',
	'ow_mapping_successful' => 'Aal do mäd [OK] markierde Fäildere wuuden tou-oardend<br />',
	'ow_mapping_unsuccessful' => 'Deer sunt mindestens two DefinedMeanings toun Ferknätten nöödich.',
	'ow_will_insert' => 'Dät Foulgjende wäd iensät:',
	'ow_contents_of_mapping' => 'Inhoolde fon ju Ferknättenge',
	'ow_available_contexts' => 'Ferföigboare Kontexte',
	'ow_add_concept_link' => 'Link tou uur Konzepte bietouföigje',
	'ow_concept_panel' => 'Konzeptschaltfläche',
	'ow_dm_badtitle' => 'Disse Siede wiest nit ätter ne DefinedMeaning (Konzept). Wröich ju Webadresse.',
	'ow_dm_missing' => 'Disse Siede wiest ätter ne nit existierjende DefinedMeaning (Konzept). Wröich ju Webadresse.',
	'ow_AlternativeDefinition' => 'Alternative Definition',
	'ow_AlternativeDefinitions' => 'Alternative Definitione',
	'ow_Annotation' => 'Annotation',
	'ow_ApproximateMeanings' => 'Uungefääre Betjuudengen',
	'ow_ClassAttributeAttribute' => 'Attribut',
	'ow_ClassAttributes' => 'Klassenattribute',
	'ow_ClassAttributeLevel' => 'Level',
	'ow_ClassAttributeType' => 'Typ',
	'ow_ClassMembership' => 'Klassentouheeregaid',
	'ow_Collection' => 'Sammelenge',
	'ow_CollectionMembership' => 'Sammelengstouheeregaid',
	'ow_Definition' => 'Definition',
	'ow_DefinedMeaningAttributes' => 'Annotation',
	'ow_DefinedMeaning' => 'DefinedMeaning',
	'ow_DefinedMeaningReference' => 'DefinedMeaning',
	'ow_ExactMeanings' => 'Exakte Betjuudengen',
	'ow_Expression' => 'Uutdruk',
	'ow_ExpressionMeanings' => 'Uutdruksbetjuudengen',
	'ow_Expressions' => 'Uutdrukke',
	'ow_IdenticalMeaning' => 'Identiske Betjuudenge?',
	'ow_IncomingRelations' => 'Iengungende Relatione',
	'ow_GotoSource' => 'Gung ätter ju Wälle',
	'ow_Language' => 'Sproake',
	'ow_LevelAnnotation' => 'Annotation',
	'ow_OptionAttribute' => 'Oainskup',
	'ow_OptionAttributeOption' => 'Option',
	'ow_OptionAttributeOptions' => 'Optione',
	'ow_OptionAttributeValues' => 'Optionswäide',
	'ow_OtherDefinedMeaning' => 'Uur DefinedMeaning',
	'ow_PopupAnnotation' => 'Annotation',
	'ow_Relations' => 'Relatione',
	'ow_RelationType' => 'Relationstyp',
	'ow_Spelling' => 'Schrieuwwiese',
	'ow_Synonyms' => 'Synonyme',
	'ow_SynonymsAndTranslations' => 'Synonyme un Uursättengen',
	'ow_Source' => 'Wälle',
	'ow_SourceIdentifier' => 'Wällenbeteekener',
	'ow_TextAttribute' => 'Oainskup',
	'ow_Text' => 'Text',
	'ow_TextAttributeValues' => 'Plaintext',
	'ow_TranslatedTextAttribute' => 'Oainskup',
	'ow_TranslatedText' => 'Uursätten Text',
	'ow_TranslatedTextAttributeValue' => 'Text',
	'ow_TranslatedTextAttributeValues' => 'Uursätboaren Text',
	'ow_LinkAttribute' => 'Oainskup',
	'ow_LinkAttributeValues' => 'Links',
	'ow_Property' => 'Oainskup',
	'ow_Value' => 'Wäid',
	'ow_meaningsoftitle' => 'Betjuudengen fon "$1"',
	'ow_meaningsofsubtitle' => '<em>Wikilink:</em> [[$1]]',
	'ow_Permission_denied' => '<h2>FERLOF FERWÄIGERD</h2>',
	'ow_copy_no_action_specified' => 'Lääs ne Aktion fääst.',
	'ow_copy_help' => 'Der is noch neen Hälpe implementierd.',
	'ow_please_proved_dmid' => 'Dät lät, dät an dien Iengoawe failt "?dmid=<ID>" (dmid=Defined Meaning ID)<br />
Kontaktier dän Serveradminstrator.',
	'ow_please_proved_dc1' => 'Dät lät, as wan an dien Iengoawe  failt "?dc1=<something>" (dc1=dataset context 1, dataset to copy FROM)<br />
Kontaktier dän Serveradminstrator.',
	'ow_please_proved_dc2' => 'Dät lät, as wan an dien Iengoawe failt "?dc2=<something>" (dc2=dataset context 2, dataset to copy TO) <br />
Kontaktier dän Serveradminstrator.',
	'ow_copy_successful' => '<h2>Kopierjen mäd Ärfoulch</h2>Dien Doaten schiene mäd Ärfoulch kopierd wuuden tou weesen. Ferjät nit noch moal tou wröigjen uum sichertougungen!',
	'ow_copy_unsuccessful' => '<h3>Kopierjen sunner Ärfoulch</h3> Der is neen Kopieraktion geböärd.',
	'ow_no_action_specified' => '<h3>Der wuud neen Aktion ounroat</h3> Fielicht koomst du fluks tou disse Siede?',
	'ow_db_consistency_not_found' => '<h2>Failer</h2>Ju Doatenboank is nit moor konsistent. Wikidata kon neen gultige Doaten tou ju ID fiende. Kontaktier dän Server-Administrator.',
);

/** Sundanese (Basa Sunda)
 * @author Irwangatot
 */
$wdMessages['su'] = array(
	'ow_save' => 'Simpen',
	'ow_history' => 'Jujutan',
	'ow_Language' => 'Basa',
);

/** Swedish (Svenska)
 * @author Lokal Profil
 * @author M.M.S.
 * @author Sannab
 */
$wdMessages['sv'] = array(
	'languages' => 'Wikidata: Språkhanterare',
	'langman_title' => 'Språkhanterare',
	'datasearch' => 'Wikidata: Datasökning',
	'ow_save' => 'Spara',
	'ow_history' => 'Historia',
	'ow_datasets' => 'Val av datauppsättning',
	'ow_noedit_title' => 'Ingen tillåtelse till redigering',
	'ow_noedit' => 'Du har inte tillåtelse att redigera sidor i datauppsättningen "$1". Läs [[{{MediaWiki:Ow editing policy url}}|våra redigeringsriktlinjer]].',
	'ow_uipref_datasets' => 'Förvald visning',
	'ow_uiprefs' => 'Wikidata',
	'ow_none_selected' => 'Ingen vald',
	'ow_conceptmapping_help' => '<p>möjliga handlingar: <ul>
<li>&action=insert&<datakontextprefix>=<definerad_id>&... ange en motsvarighet</li>
<li>&action=get&concept=<koncept-id> hämta motsvarigheter</li>
<li>&action=list_sets visar en lista över möjliga datakontextprefix och vad de refererar till.</li>
<li>&action=get_associated&dm=<definerat_betydnings-ID>&dc=<datavisningskontextprefix> för en given definierad betydelse så visas alla andra definierade betydelser inom ett begrepp</li>
<li>&action=help Visar hjälp.</li>
</ul></p>',
	'ow_conceptmapping_uitext' => '<p>Begreppskartläggning låter dig hitta vilken definierad betydelse i en datauppsättning som motsvarar definierade betydelser i andra datauppsättningar.</p>',
	'ow_conceptmapping_no_action_specified' => 'Handlingen "$1" stöds inte.',
	'ow_dm_OK' => 'OK',
	'ow_dm_not_present' => 'inte angivet',
	'ow_dm_not_found' => 'inte hittat i databasen eller felaktigt formaterat',
	'ow_mapping_successful' => 'Alla fälten märkta med [OK] länkades till begreppskartan<br />',
	'ow_mapping_unsuccessful' => 'Det måste finnas åtminstone två definierade betydelser innan de kan länkas.',
	'ow_will_insert' => 'Kommer sätta in följande:',
	'ow_contents_of_mapping' => 'Innehållet i begreppskartan',
	'ow_available_contexts' => 'Tillgängliga sammanhang',
	'ow_add_concept_link' => 'Lägg till länk till andra koncept',
	'ow_concept_panel' => 'Konceptpanel',
	'ow_dm_badtitle' => 'Den här sidan visar inte till några definierade betydelser (koncept).
Var god kolla webbadressen.',
	'ow_dm_missing' => 'Den här sidan visar en ej existerande definierad mmening (koncept).
Var god kolla webbadressen.',
	'ow_AlternativeDefinition' => 'Alternativ definition',
	'ow_AlternativeDefinitions' => 'Alternativa definitioner',
	'ow_Annotation' => 'Notering',
	'ow_ApproximateMeanings' => 'Ungefärliga betydelser',
	'ow_ClassAttributeAttribute' => 'Attribut',
	'ow_ClassAttributes' => 'Klassattribut',
	'ow_ClassAttributeLevel' => 'Nivå',
	'ow_ClassAttributeType' => 'Typ',
	'ow_ClassMembership' => 'Klassmedlemskap',
	'ow_Collection' => 'Samling',
	'ow_CollectionMembership' => 'Samlingsmedlemskap',
	'ow_Definition' => 'Definition',
	'ow_DefinedMeaningAttributes' => 'Notering',
	'ow_DefinedMeaning' => 'Definierad betydelse',
	'ow_DefinedMeaningReference' => 'Definierad betydelse',
	'ow_ExactMeanings' => 'Exakt betydelse',
	'ow_Expression' => 'Uttryck',
	'ow_ExpressionMeanings' => 'Uttrycksbetydelser',
	'ow_Expressions' => 'Uttryck',
	'ow_IdenticalMeaning' => 'Identisk betydelse?',
	'ow_IncomingRelations' => 'Inkommande släktskap',
	'ow_GotoSource' => 'Gå till källa',
	'ow_Language' => 'Språk',
	'ow_LevelAnnotation' => 'Notering',
	'ow_OptionAttribute' => 'Attribut',
	'ow_OptionAttributeOption' => 'Alternativ',
	'ow_OptionAttributeOptions' => 'Alternativ',
	'ow_OptionAttributeValues' => 'Alternativvärden',
	'ow_OtherDefinedMeaning' => 'Annan definierad betydelse',
	'ow_PopupAnnotation' => 'Notering',
	'ow_Relations' => 'Släktskap',
	'ow_RelationType' => 'Släktskapstyp',
	'ow_Spelling' => 'Stavning',
	'ow_Synonyms' => 'Synonymer',
	'ow_SynonymsAndTranslations' => 'Synonymer och översättningar',
	'ow_Source' => 'Källa',
	'ow_SourceIdentifier' => 'Källidentifierare',
	'ow_TextAttribute' => 'Attribut',
	'ow_Text' => 'Text',
	'ow_TextAttributeValues' => 'Klara texter',
	'ow_TranslatedTextAttribute' => 'Attribut',
	'ow_TranslatedText' => 'Översatt text',
	'ow_TranslatedTextAttributeValue' => 'Text',
	'ow_TranslatedTextAttributeValues' => 'Översättbara texter',
	'ow_LinkAttribute' => 'Attribut',
	'ow_LinkAttributeValues' => 'Länkar',
	'ow_Property' => 'Attribut',
	'ow_Value' => 'Värde',
	'ow_meaningsoftitle' => 'Betydelser av "$1"',
	'ow_meaningsofsubtitle' => '<em>Wiki länk:</em> [[$1]]',
	'ow_Permission_denied' => '<h2>TILLTRÄDE NEKAS</h2>',
	'ow_copy_no_action_specified' => 'Var god ange en handling',
	'ow_copy_help' => 'Hjälp är ännu inte implementerat.',
	'ow_please_proved_dmid' => 'Det verkar som att din text har missat en "?dmid=<ID>" (dmid=ID för definierad betydelse)<br />
Var god kontakta en serveradministratör.',
	'ow_please_proved_dc1' => 'Det verkar som att din text har missat en "?dc1=<något>" (dc1=datauppsättningskontext 1, datauppsättningen ska kopieras FRÅN)<br />
Var god kontakta en serveradministratör.',
	'ow_please_proved_dc2' => 'Det verkar som att din text har missat en "?dc2=<något>" (dc2=datauppsättningskontext 2, datauppsättning att kopiera TILL)<br />
Var god kontakta en systemadministratör.',
	'ow_copy_successful' => '<h2>Kopiering genomförd</h2>
Det verkar som dina data kopierats utan problem.
Glöm inte att dubbelkolla för att vara säker!',
	'ow_copy_unsuccessful' => '<h3>Kopiering inte genomförd</h3>
Ingenting har kopierats.',
	'ow_no_action_specified' => '<h3>Ingen handling angiven</h3>
Kanske kom du direkt till den här sidan? Vanligtvis ska du inte vara här.',
	'ow_db_consistency_not_found' => '<h2>Fel</h2>
Det är något fel med databasintegriteten, wikidata hittar inte giltig data som är knuten till detta ID för en definierad betydelse.
Datan kan ha gått förlorad.
Var god kontakta serveroperatören eller systemadministratören.',
);

/** Silesian (Ślůnski)
 * @author Herr Kriss
 * @author Lajsikonik
 */
$wdMessages['szl'] = array(
	'languages' => 'Wikidata:Menadżyr godek',
	'langman_title' => 'Menadżyr godek',
	'datasearch' => 'Wikidata:Sznupańy za danymi',
	'ow_save' => 'Naszkryflej',
	'ow_history' => 'Historjo',
	'ow_datasets' => 'Wybjerańy zbjora danych',
	'ow_noedit_title' => 'Brak uprowńyń do uůnaczyńo sprowjyń',
	'ow_noedit' => 'Ńy mosz uprowńyń coby sprowjać zbjůr danych "$1". Uobejzdrzij [[{{MediaWiki:Ow editing policy url}}|rule nadowańo uprowńyń do sprowjańo]].',
	'ow_uipref_datasets' => 'Widok důmyślny',
	'ow_uiprefs' => 'Dane wiki',
	'ow_none_selected' => 'Ńic ńy je zaznoczůne',
	'ow_conceptmapping_help' => '<p>możliwe dziołańo: <ul>
<li>&action=insert&<data_context_prefix>=<defined_id>&...  wstowjo mapowańy</li>
<li>&action=get&concept=<concept_id>  uodczytujy mapowańy</li>
<li>&action=list_sets  zwroco lista możliwych prefiksůw kůnteksta danych a jeich uodnośńikůw</li>
<li>&action=get_associated&dm=<defined_meaning_id>&dc=<dataset_context_prefix> w uodńyśeńu do jednygo zdefińjowanygo znoczyńo w pojyńću zwroco pozostołe definicyje</li>
<li>&action=help  pokozuje půmoc</li>
</ul></p>',
	'ow_conceptmapping_uitext' => '<p>Uodwzorowywańy pojyńć dozwalo na identyfikacyjo tego, kere ze zdefińjowanych w jednym zestowj danych znoczyń sům identyczne do znoczy0ń zdefińjowanych we drugim zestowje danych.</p>',
	'ow_conceptmapping_no_action_specified' => 'Wyboczće, ńy wjym, jako zuůnaczyć "$1".',
	'ow_dm_OK' => 'OK',
	'ow_dm_not_present' => 'ńy wkludzůno',
	'ow_dm_not_found' => 'uobjekta ńy znejdźůno we baźe abo je uůn felerńe uformowany',
	'ow_mapping_successful' => 'Uodwzorowano wszysjstke pola uoznaczůne kej [OK]<br />',
	'ow_mapping_unsuccessful' => 'Ńym bydźe można skuplować dwa zdefińjowane znoczyńa, muszům być uůne podane.',
	'ow_will_insert' => 'Wstowjo nastympujůnce dane:',
	'ow_contents_of_mapping' => 'Zawartość uodwzorowańo',
	'ow_available_contexts' => 'Dostympne kůnteksty',
	'ow_add_concept_link' => 'Dodej link ku inkszym pojyńćom',
	'ow_concept_panel' => 'Panel pojyńć',
	'ow_dm_badtitle' => 'Ta zajta ńy prowadźi ku żodnymu uobjektowi typu DefineMeaning.
Sprowdź czy jeij adres ńy je felerny.',
	'ow_dm_missing' => 'Ta zajta prowadźi ku ńyistńijůncymi uobjektowi DefineMeaning.
Sprowdź eli jeij adres je poprawny.',
	'ow_AlternativeDefinition' => 'Inkszo definicyjo',
	'ow_AlternativeDefinitions' => 'Inksze definicyje',
	'ow_Annotation' => 'Adnotacyjo',
	'ow_ApproximateMeanings' => 'Zbliżůne znoczyńa',
	'ow_ClassAttributeAttribute' => 'Atrybut',
	'ow_ClassAttributes' => 'Atrybuty klasůw',
	'ow_ClassAttributeLevel' => 'Poźům',
	'ow_ClassAttributeType' => 'Typ',
	'ow_ClassMembership' => 'Człůnkostwo we klaśe',
	'ow_Collection' => 'Kůlekcyjo',
	'ow_CollectionMembership' => 'Człunkostwo we kůlekcyji',
	'ow_Definition' => 'Defińicyjo',
	'ow_DefinedMeaningAttributes' => 'Adnotacyjo',
	'ow_DefinedMeaning' => 'Zdefińjowane znoczyńe',
	'ow_DefinedMeaningReference' => 'Zdefińjowane znoczyńe',
	'ow_ExactMeanings' => 'Gynau prawe znoczyńa',
	'ow_Expression' => 'Wyrażyńy',
	'ow_ExpressionMeanings' => 'Znoczyńe wyrażyńa',
	'ow_Expressions' => 'Wyrażyńa',
	'ow_IdenticalMeaning' => 'Te same znoczyńe?',
	'ow_IncomingRelations' => 'Zależnośći wchodzůnce',
	'ow_GotoSource' => 'Lyź ku zdrzůdłu',
	'ow_Language' => 'Godka',
	'ow_LevelAnnotation' => 'Adnotacyjo',
	'ow_OptionAttribute' => 'Właśćiwość',
	'ow_OptionAttributeOption' => 'Uopcyja',
	'ow_OptionAttributeOptions' => 'Uopcyje',
	'ow_OptionAttributeValues' => 'Wert uopcyji',
	'ow_OtherDefinedMeaning' => 'Inakszy sdefińjowane pojyńće',
	'ow_PopupAnnotation' => 'Adnotacyjo',
	'ow_Relations' => 'Zależnośći',
	'ow_RelationType' => 'Typ zoleżnośći',
	'ow_Spelling' => 'Uortografijo',
	'ow_Synonyms' => 'Synůńimy',
	'ow_SynonymsAndTranslations' => 'Synůńimy a tuplikowańo',
	'ow_Source' => 'Zdrzůdło',
	'ow_SourceIdentifier' => 'Identyfikator zdrzůdła',
	'ow_TextAttribute' => 'Właśćiwość',
	'ow_Text' => 'Tekst',
	'ow_TextAttributeValues' => 'Tekst ńysformatowany',
	'ow_TranslatedTextAttribute' => 'Właśćiwość',
	'ow_TranslatedText' => 'Przetuplikowany tekst',
	'ow_TranslatedTextAttributeValue' => 'Tekst',
	'ow_TranslatedTextAttributeValues' => 'Teksty kere idźe przetuplikować',
	'ow_LinkAttribute' => 'Właśćiwość',
	'ow_LinkAttributeValues' => 'Linki',
	'ow_Property' => 'Właśćiwość',
	'ow_Value' => 'Wert',
	'ow_meaningsoftitle' => 'Znoczyńo "$1"',
	'ow_meaningsofsubtitle' => '<em>Link wiki:</em> [[$1]]',
	'ow_Permission_denied' => '<h2>DOSTYMP ZAKOZANY</h2>',
	'ow_copy_no_action_specified' => 'Uokryśl akcyjo',
	'ow_copy_help' => 'Kedyś może Ćebje pomogymy.',
	'ow_please_proved_dmid' => 'We wkludzůnych danych ńy znejdźůno wpisa „?dmid=<ID>” (dmid=Defined Meaning ID)<br />Skůntaktuj śe s admińistratorym serwera.',
	'ow_please_proved_dc1' => 'We wkludzůnych danych ńy znejdźůno wpisa „?dc1=<jakeś_dane>” (dc1=dataset context 1, zestow danych S KERYGO mo nastůmpić kopjowańy)<br />Skůntaktuj śe s admińistratorym serwera.',
	'ow_please_proved_dc2' => 'We wkludzůnych danych ńy znejdźůno wpisa „?dc2=<jakeś_dane>” (dc2=dataset context 2, zestow danych DO KERYGO mo nastůmpić kopjowańy)<br />Skůntaktuj śe s admińistratorym serwera.',
	'ow_copy_successful' => '<h2>Kopjowańy je fertig</h2>Dane nojrowdopodobńij udało śe bezpjeczńt skopjować. Zalecane je nale sprowdzyńe aże kopijo je zuůnaczůne do porzůndku.',
	'ow_copy_unsuccessful' => '<h3>Kopjowańy ńy udoło śe</h3>Ńy zuůnaczůno uoperacyji kopjowańo.',
	'ow_no_action_specified' => '<h3>Ńy podano dźołańo</h3>Może przelozżeś do tyj zajty bezpostrzedńo? Nojczyńśćij użytkowńiki ńy majům potrzeby coby tu filować.',
	'ow_db_consistency_not_found' => '<h2>Feler</h2>Zdorzył śe feler we spůjnośći bazy danych. Dane wiki ńy poradzům znejść uopowjedńich danych skojarzůnych s uokreślůnym identyfikatorym. Dane mogům być utracůne Skůntaktuj śe s uoperatorym abo admińistratorym serwera.',
);

/** Tamil (தமிழ்)
 * @author Trengarasu
 */
$wdMessages['ta'] = array(
	'ow_save' => 'சேமி',
);

/** Telugu (తెలుగు)
 * @author Mpradeep
 * @author Veeven
 */
$wdMessages['te'] = array(
	'datasearch' => 'వికీడాటా: డాటా అన్వేషణ',
	'langman_title' => 'భాషా నిర్వహణ',
	'languages' => 'వికీడాటా: భాషా నిర్వహణ',
	'ow_save' => 'భద్రపరచు',
	'ow_history' => 'చరిత్ర',
	'ow_datasets' => 'డాటాసెట్ ఎంపిక',
	'ow_noedit_title' => 'మార్చడానికి అనుమతి లేదు',
	'ow_uiprefs' => 'వికీడాటా',
	'ow_none_selected' => 'ఏమీ ఎంచుకోలేదు',
	'ow_conceptmapping_no_action_specified' => 'క్షమాపణలు, "$1"ని ఎలా చేయాలో నాకు తెలియదు.',
	'ow_dm_OK' => 'సరే',
	'ow_available_contexts' => 'అందుబాటులో ఉన్న సందర్భాలు',
	'ow_add_concept_link' => 'ఇతర భావనలకు లింకు చేర్చండి',
	'ow_AlternativeDefinition' => 'ప్రత్యామ్నాయ నిర్వచనం',
	'ow_AlternativeDefinitions' => 'ప్రత్యామ్నాయ నిర్వచనాలు',
	'ow_ApproximateMeanings' => 'సమానార్థాలు',
	'ow_ClassAttributes' => 'తరగతి స్వభావాలు',
	'ow_ClassAttributeLevel' => 'స్థాయి',
	'ow_ClassAttributeType' => 'రకం',
	'ow_ClassMembership' => 'తరగతి సభ్యత్వం',
	'ow_Collection' => 'సేకరణ',
	'ow_CollectionMembership' => 'సేకరణ సభ్యత్వం',
	'ow_Definition' => 'నిర్వచనం',
	'ow_DefinedMeaning' => 'నిర్వచిత అర్థం',
	'ow_DefinedMeaningReference' => 'నిర్వచిత అర్థం',
	'ow_ExactMeanings' => 'ఖచ్చిత అర్థాలు',
	'ow_Expression' => 'వ్యక్తీకరణ',
	'ow_ExpressionMeanings' => 'వ్యక్తీకరణ అర్ధాలు',
	'ow_Expressions' => 'వ్యక్తీకరణలు',
	'ow_GotoSource' => 'మూలానికి వెళ్ళు',
	'ow_Language' => 'భాష',
	'ow_OptionAttribute' => 'లక్షణం',
	'ow_OptionAttributeOption' => 'ఎంపిక',
	'ow_OptionAttributeOptions' => 'ఎంపికలు',
	'ow_OptionAttributeValues' => 'ఎంపిక విలువలు',
	'ow_OtherDefinedMeaning' => 'ఇతర నిర్వచిత అర్థం',
	'ow_Relations' => 'సంబంధాలు',
	'ow_RelationType' => 'సంబంధ రకం',
	'ow_Spelling' => 'వర్ణక్రమం',
	'ow_Synonyms' => 'సమానార్థాలు',
	'ow_SynonymsAndTranslations' => 'సమానార్థాలు మరియు అనువాదాలు',
	'ow_Source' => 'మూలం',
	'ow_TextAttribute' => 'లక్షణం',
	'ow_Text' => 'పాఠ్యం',
	'ow_TextAttributeValues' => 'సాదా పాఠ్యాలు',
	'ow_TranslatedTextAttribute' => 'లక్షణం',
	'ow_TranslatedText' => 'అనువాదిత పాఠ్యం',
	'ow_TranslatedTextAttributeValue' => 'పాఠ్యం',
	'ow_TranslatedTextAttributeValues' => 'అనువదించదగ్గ పాఠ్యాలు',
	'ow_LinkAttribute' => 'లక్షణం',
	'ow_LinkAttributeValues' => 'లింకులు',
	'ow_Property' => 'లక్షణం',
	'ow_Value' => 'విలువ',
	'ow_meaningsoftitle' => '"$1" యొక్క అర్థాలు',
	'ow_meaningsofsubtitle' => '<em>వికీ లింకు:</em> [[$1]]',
	'ow_Permission_denied' => '<h2>అనుమతి నిరాకరించాం</h2>',
	'ow_copy_no_action_specified' => 'దయచేసి ఒక చర్యని స్పష్టంచెయ్యండి',
	'ow_copy_help' => 'ఏదో ఒక రోజు, మీకు సహాయపడగలం.',
	'ow_copy_successful' => '<h2>కాపీ విజయవంతం</h2>మీ భోగట్టా విజయవంతంగా కాపీ అయింది. కానీ మరోసారి సరిచూచుకోవడం మర్చిపోకండి!',
);

/** Tetum (Tetun)
 * @author MF-Warburg
 */
$wdMessages['tet'] = array(
	'ow_history' => 'Istória',
	'ow_dm_OK' => 'OK',
	'ow_Language' => 'Lian',
	'ow_Text' => 'Testu',
	'ow_TranslatedTextAttributeValue' => 'Testu',
);

/** Tajik (Cyrillic) (Тоҷикӣ (Cyrillic))
 * @author Ibrahim
 */
$wdMessages['tg-cyrl'] = array(
	'languages' => 'Викидода: Идоракуни забон',
	'langman_title' => 'Идоракуни забон',
	'datasearch' => 'Викидода: Ҷустуҷӯи дода',
	'ow_save' => 'Захира кардан',
	'ow_history' => 'Таърих',
	'ow_noedit_title' => 'Барои вироиш иҷозат нест',
	'ow_uipref_datasets' => 'Намуди пешфарз',
	'ow_uiprefs' => 'Викидода',
	'ow_conceptmapping_no_action_specified' => 'Бахшиш, ман чӣ тавр "$1" карданро намедонам.',
	'ow_dm_not_found' => 'дар пойгоҳи додаҳо ёфт нашуд ё ноқис аст',
	'ow_will_insert' => 'Зеринро хоҳад ҷой дод:',
	'ow_available_contexts' => 'Матнҳои дастрас',
	'ow_Annotation' => 'Тафсир',
	'ow_ApproximateMeanings' => 'Маъниҳои тақрибӣ',
	'ow_ClassAttributeLevel' => 'Сатҳ',
	'ow_ClassAttributeType' => 'Навъ',
	'ow_Collection' => 'Гирдовард',
	'ow_CollectionMembership' => 'Узвияти гирдоварӣ',
	'ow_Definition' => 'Таъриф',
	'ow_DefinedMeaningAttributes' => 'Тафсир',
	'ow_DefinedMeaning' => 'Мазмуни мушаххасшуда',
	'ow_DefinedMeaningReference' => 'Мазмуни мушаххасшуда',
	'ow_ExactMeanings' => 'Маъниҳои дақиқ',
	'ow_IncomingRelations' => 'Робитаи воридшаванда',
	'ow_GotoSource' => 'Рафтан ба манбаъ',
	'ow_Language' => 'Забон',
	'ow_LevelAnnotation' => 'Тафсир',
	'ow_OptionAttribute' => 'Хосият',
	'ow_OptionAttributeOption' => 'Ихтиёр',
	'ow_OptionAttributeOptions' => 'Ихтиёрот',
	'ow_OptionAttributeValues' => 'Қиматҳои ихтиёр',
	'ow_PopupAnnotation' => 'Тафсир',
	'ow_Relations' => 'Равобит',
	'ow_RelationType' => 'Навъи робита',
	'ow_Spelling' => 'Имло',
	'ow_Synonyms' => 'Синонимҳо',
	'ow_SynonymsAndTranslations' => 'Синонимҳо ва тарҷумаҳо',
	'ow_Source' => 'Манбаъ',
	'ow_SourceIdentifier' => 'Ташхискунандаи манбаъ',
	'ow_TextAttribute' => 'Хосият',
	'ow_Text' => 'Матн',
	'ow_TextAttributeValues' => 'Матнҳои ҳамвор',
	'ow_TranslatedTextAttribute' => 'Хосият',
	'ow_TranslatedText' => 'Матни тарҷумашуда',
	'ow_TranslatedTextAttributeValue' => 'Матн',
	'ow_TranslatedTextAttributeValues' => 'Матнҳои қобили тарҷума',
	'ow_LinkAttribute' => 'Хосият',
	'ow_LinkAttributeValues' => 'Пайвандҳо',
	'ow_Property' => 'Хосият',
	'ow_Value' => 'Қимат',
	'ow_meaningsoftitle' => 'Маъниҳои "$1"',
	'ow_meaningsofsubtitle' => '<em>Вики пайванд:</em> [[$1]]',
	'ow_Permission_denied' => '<h2>ИҶОЗА РАД ШУД</h2>',
	'ow_copy_no_action_specified' => 'Лутфан амалеро мушаххас кунед',
	'ow_copy_help' => 'Рӯзе, мо битавонем ба шумо кӯмак кунем.',
	'ow_copy_successful' => '<h2>Нусхабардории Муваффақ</h2>
Додаҳои шум ба назар мерасанд, ки бо муваффақият нусхабардорӣ шуданд.
Барои мутмаин будна дубора барраси карданро фаромӯш накунед!',
	'ow_copy_unsuccessful' => '<h3>Нусхабардории номуваффақ</h3>
Ҳеҷ амалӣ нусхабардорӣ иҷро нашуд.',
	'ow_no_action_specified' => '<h3>Ҳеҷ амале мушаххас нашудааст</h3>
Шояд шумо бевосита ба ин саҳифа омадед? Маъмулан шумо ниёз дар инҷо буданро надоред.',
);

/** Thai (ไทย)
 * @author Manop
 * @author Octahedron80
 * @author Passawuth
 */
$wdMessages['th'] = array(
	'ow_save' => 'บันทึก',
	'ow_history' => 'ประวัติ',
	'ow_dm_OK' => 'ตกลง',
	'ow_ClassAttributeLevel' => 'ระดับ',
	'ow_ClassAttributeType' => 'ชนิด',
	'ow_OptionAttribute' => 'คุณสมบัติ',
	'ow_OptionAttributeOption' => 'ตัวเลือก',
	'ow_OptionAttributeOptions' => 'ตัวเลือก',
	'ow_Relations' => 'ความสัมพันธ์',
	'ow_Spelling' => 'การสะกด',
	'ow_Source' => 'แหล่งที่มา',
	'ow_Text' => 'ข้อความ',
	'ow_TextAttributeValues' => 'ข้อความเรียบ',
	'ow_TranslatedTextAttributeValue' => 'ข้อความ',
	'ow_LinkAttribute' => 'คุณสมบัติ',
	'ow_LinkAttributeValues' => 'ลิงก์',
	'ow_Value' => 'ค่า',
	'ow_meaningsoftitle' => 'ความหมายของ "$1"',
);

/** Turkmen (Türkmen)
 * @author Runningfridgesrule
 */
$wdMessages['tk'] = array(
	'ow_history' => 'Geçmiş',
);

/** Tagalog (Tagalog)
 * @author AnakngAraw
 */
$wdMessages['tl'] = array(
	'languages' => 'Wikidata: Tagapamahala ng wika',
	'langman_title' => 'Tagapamahala ng wika',
	'datasearch' => 'Wikidata: Paghahanap ng dato',
	'ow_save' => 'Sagipin',
	'ow_history' => 'Kasaysayan',
	'ow_datasets' => 'Pampili ng pangkat ng dato',
	'ow_noedit_title' => 'Wala kang pahintulot upang makagawa ng pagbabago',
	'ow_noedit' => 'Wala kang pahintulot para makapagbago ng mga pahina sa loob ng pangkat ng datong "$1". 
Pakitingnan ang [[{{MediaWiki:Ow editing policy url}}|aming patakaran sa pamamatnugot]].',
	'ow_uipref_datasets' => 'Nakatakdang tanawin',
	'ow_uiprefs' => 'Wikidata',
	'ow_none_selected' => 'Walang pinili',
	'ow_conceptmapping_help' => '<p>mga maaaring gawin: <ul>
<li>&action=insert&<data_context_prefix>=<defined_id>&...  magsingit ng isang pagmamapa</li>
<li>&action=get&concept=<concept_id>  magbasa ng isang pagmamapang pabalik</li>
<li>&action=list_sets  magbalik ng isang talaan ng mga maaaring maging unlaping kontekstong pangdato at kung ano ang tinutukoy nila.</li>
<li>&action=get_associated&dm=<defined_meaning_id>&dc=<dataset_context_prefix> para sa isang tinukoy/nilarawang kahulugan sa loob ng isang diwa o konsepto, ibalik ang lahat ng iba pa</li>
<li>&action=help  Ipakita ang mga nakakatulong na pantulong.</li>
</ul></p>',
	'ow_conceptmapping_uitext' => "<p>Nagpapahintulot ang Pagmamapa ng Konsepto o ng Diwa (''Concept Mapping'') na matukoy mo kung anong nilarawang kahulugang nagmula sa isang pangkat ng dato ang katulad sa nilarawang mga kahulugang nasa iba pang mga kapangkatan ng dato.</p>",
	'ow_conceptmapping_no_action_specified' => 'Hindi tinatangkilik/sinusuportahan ang galaw na "$1".',
	'ow_dm_OK' => "Sige/Ayos 'yan",
	'ow_dm_not_present' => 'hindi nakapasok',
	'ow_dm_not_found' => 'hindi natagpuan sa kalipunan ng dato o mali/masama ang anyo',
	'ow_mapping_successful' => "Naisamapa/napagugnay-ugnay na ang lahat ng mga hanay na may tatak na [Sige/Ayos 'yan]",
	'ow_mapping_unsuccessful' => 'Kinakailangang magkaroon ng kahit na dalawang mga kahulugang pinakahuluganan bago sila maikawing.',
	'ow_will_insert' => 'Isisingit ang mga sumusunod:',
	'ow_contents_of_mapping' => 'Mga nilalaman ng pagmamapa',
	'ow_available_contexts' => 'Makukuhang mga konteksto',
	'ow_add_concept_link' => 'Magdagdag ng kawing sa iba pang mga konsepto/diwa',
	'ow_concept_panel' => 'Kalipunan/Lupon ng Konsepto',
	'ow_dm_badtitle' => 'Hindi tumuturo ang pahinang ito sa anumang NilarawangKahulugan (konsepto/diwa)
Pakisuri ang adres na pangweb.',
	'ow_dm_missing' => 'Tila tumuturo patungo sa isang hindi umiiral na NilarawangKahulugan (konsepto/diwa) ang pahinang ito.
Pakisuri ang adres na pangweb.',
	'ow_AlternativeDefinition' => 'Pamalit na kahulugan',
	'ow_AlternativeDefinitions' => 'Pamalit na mga kahulugan',
	'ow_Annotation' => 'Anotasyon (paliwanag)',
	'ow_ApproximateMeanings' => 'Tinatayang mga kahulugan',
	'ow_ClassAttributeAttribute' => 'Katangian',
	'ow_ClassAttributes' => 'Mga katangian ng klase (uri)',
	'ow_ClassAttributeLevel' => 'Antas',
	'ow_ClassAttributeType' => 'Uri/Tipo',
	'ow_ClassMembership' => 'Klase ng Kasapian/Pagkakasapi',
	'ow_Collection' => 'Kalipunan',
	'ow_CollectionMembership' => 'Pagkakasaping Pangkalipunan',
	'ow_Definition' => 'Kahulugan',
	'ow_DefinedMeaningAttributes' => 'Anotasyon (paliwanag)',
	'ow_DefinedMeaning' => 'Nilarawang kahulugan',
	'ow_DefinedMeaningReference' => 'Nilarawang kahulugan',
	'ow_ExactMeanings' => 'Tumpak/Eksaktong mga kahulugan',
	'ow_Expression' => 'Pagsasaad (ekspresyon)',
	'ow_ExpressionMeanings' => 'Mga kahulugan ng mga pagsasaad',
	'ow_Expressions' => 'Mga pagsasaad (ekspresyon)',
	'ow_IdenticalMeaning' => 'Katulad na kahulugan?',
	'ow_IncomingRelations' => 'Padating/papasok na mga ugnayan',
	'ow_GotoSource' => 'Puntahan ang pinagmulan',
	'ow_Language' => 'Wika',
	'ow_LevelAnnotation' => 'Anotasyon (paliwanag)',
	'ow_OptionAttribute' => 'Pag-aari',
	'ow_OptionAttributeOption' => 'Pagpipilian',
	'ow_OptionAttributeOptions' => 'Mga pagpipilian',
	'ow_OptionAttributeValues' => 'Mga halaga ng pagpipilian',
	'ow_OtherDefinedMeaning' => 'Iba pang nilarawang kahulugan',
	'ow_PopupAnnotation' => 'Anotasyon (paliwanag)',
	'ow_Relations' => 'Mga kaugnayan',
	'ow_RelationType' => 'Uri ng kaugnayan',
	'ow_Spelling' => 'Pagbabaybay',
	'ow_Synonyms' => 'Mga kasingkahulugan',
	'ow_SynonymsAndTranslations' => 'Mga kasingkahulugan at mga salinwika',
	'ow_Source' => 'Pinagmulan',
	'ow_SourceIdentifier' => 'Pangkilala ng pinagmulan',
	'ow_TextAttribute' => 'Pag-aari',
	'ow_Text' => 'Teksto',
	'ow_TextAttributeValues' => 'Payak na mga teksto',
	'ow_TranslatedTextAttribute' => 'Pag-aari',
	'ow_TranslatedText' => 'Tekstong naisalinwika',
	'ow_TranslatedTextAttributeValue' => 'Teksto',
	'ow_TranslatedTextAttributeValues' => 'Mga tekstong maisasalinwika',
	'ow_LinkAttribute' => 'Pag-aari',
	'ow_LinkAttributeValues' => 'Mga kawing',
	'ow_Property' => 'Pag-aari',
	'ow_Value' => 'Halaga',
	'ow_meaningsoftitle' => 'Mga kahulugan ng "$1"',
	'ow_meaningsofsubtitle' => '<em>Wiki-kawing:</em> [[$1]]',
	'ow_Permission_denied' => '<h2>Tinanggihan ang pagpapahintulot</h2>',
	'ow_copy_no_action_specified' => 'Pakitukoy ang isang galaw',
	'ow_copy_help' => 'Hindi pa naisasakatuparan ang pagtulong.',
	'ow_please_proved_dmid' => 'Tila may kulang na "?dmid=<ID>" (dmid=ID ng Nilarawang Kahulugan) ang ipinasok mong puhunan (impormasyon)<br />
Makipagugnayan sa isang tagapangasiwa ng serbidor',
	'ow_please_proved_dc1' => 'Tila may kulang na isang "?dc1=<isang bagay>" (dc1=konteksto bilang 1 ng pangkat ng dato, PAGMUMULANG pangkat ng dato) ang ipinasok mong puhunan (impormasyon)<br />
Makipagugnayan sa isang tagapangasiwa ng serbidor',
	'ow_please_proved_dc2' => 'Tila may kulang na "?dc2=<isang bagay>" (dc2=konteksto bilang 2 ng pangkat ng dato, PATUTUNGUHANG pangkat ng dato)<br />
Makipagugnayan sa isang tagapangasiwa ng serbidor.',
	'ow_copy_successful' => '<h2>Matagumpay ang pagkopya</h2>
Tila matagumpay ang pagkopya ng iyong dato.
Huwag kalimutang suriin uli para makatiyak!',
	'ow_copy_unsuccessful' => '<h3>Hindi matagumpay ang pagkopya</h3>
Walang naganap na pagsasakatuparan ng pagkopya',
	'ow_no_action_specified' => '<h3>Walang tinukoy na galaw</h3>
Maaaring tuwiran kang nakarating sa pahinang ito?  Sa karaniwan, hindi mo kailangang magparito.',
	'ow_db_consistency_not_found' => "<h2>Kamalian</h2>
Mayroong suliranin hinggil sa pagkakasundu-sundo ng kalipunan ng dato, hindi matagpuan ng ''wikidata'' (dato ng wiki/wikidato) ang tanggap na datong may kaugnayan sa ID (pagkakakilanlan) ng nilarawang kahulugang ito.
Maaaring nawala ito.
Makipagugnayan sa isang tagapamalakad/tagapagpatakbo ng serbidor o tagapangasiwa.",
);

/** Turkish (Türkçe)
 * @author Karduelis
 */
$wdMessages['tr'] = array(
	'langman_title' => 'Lisan idarecisi',
	'languages' => 'Wikidata: Lisan idarecisi',
	'ow_save' => 'Kaydet',
	'ow_history' => 'Geçmiş',
	'ow_dm_OK' => 'Tamam',
	'ow_ClassAttributeLevel' => 'Seviye',
	'ow_Collection' => 'Koleksiyon',
	'ow_Language' => 'Dil',
	'ow_Synonyms' => 'Eş anlamlılar',
	'ow_Source' => 'Kaynak',
	'ow_Text' => 'Metin',
	'ow_TranslatedTextAttributeValue' => 'Metin',
);

/** Ukrainian (Українська)
 * @author AS
 * @author Ahonc
 * @author Aleksandrit
 */
$wdMessages['uk'] = array(
	'languages' => 'Вікідані: Мовний менеджер',
	'langman_title' => 'Мовний менеджер',
	'datasearch' => 'Вікідані: Пошук даних',
	'ow_save' => 'Зберегти',
	'ow_history' => 'Історія',
	'ow_datasets' => 'Вибір набору даних',
	'ow_noedit_title' => 'Нема права редагувати',
	'ow_noedit' => 'Вам не дозволено редагувати сторінки з набору даних "$1".
Можете глянути [[{{MediaWiki:Ow editing policy url}}|наші правила редагування]].',
	'ow_uipref_datasets' => 'Звичайний вигляд',
	'ow_uiprefs' => 'Вікідані',
	'ow_none_selected' => 'Нічого не обрано',
	'ow_conceptmapping_help' => '<p>можливі дії: <ul>
<li>&action=insert&<data_context_prefix>=<defined_id>&...  вставити відповідність</li>
<li>&action=get&concept=<concept_id>  зчитати відповідність</li>
<li>&action=list_sets  вивести список можливих префісів контекстів даних і місць, куди вони посилаються.</li>
<li>&action=get_associated&dm=<defined_meaning_id>&dc=<dataset_context_prefix> для одного визначеного значення у формулюванні вивести всі інші</li>
<li>&action=help  Показати довідку.</li>
</ul></p>',
	'ow_conceptmapping_uitext' => '<p>Встановлення відповідностей концептів дозволяє вам вказати яке певне значення в одному наборі даних тотожне певним значенням в інших наборах даних.</p>',
	'ow_conceptmapping_no_action_specified' => 'Вибачте, я не знаю, що таке «$1».',
	'ow_dm_OK' => 'Гаразд',
	'ow_dm_not_present' => 'не введено',
	'ow_dm_not_found' => 'не знайдено в базі даних або неформат',
	'ow_mapping_successful' => 'Подключенні всі поля, позначені [OK]<br />',
	'ow_mapping_unsuccessful' => "Потрібно мати принаймні два певних значення, перш ніж вони зможуть бути пов'язані між собою.",
	'ow_will_insert' => 'Буде додано наступне:',
	'ow_contents_of_mapping' => 'Зміст відображення',
	'ow_available_contexts' => 'Доступні контексти',
	'ow_add_concept_link' => 'Додати посилання на інші концепти',
	'ow_concept_panel' => 'Панель концептів',
	'ow_dm_badtitle' => 'Ця сторінка не вказує ні на одне ПевнеЗначення (концепт). Будь-ласка, перевірте веб-адресу.',
	'ow_dm_missing' => 'Напевно, ця сторінка вказує на неіснуюче ПевнеЗначення (концепт). Будь-ласка, перевірте веб-адресу.',
	'ow_AlternativeDefinition' => 'Альтернативне визначення',
	'ow_AlternativeDefinitions' => 'Альтернативні визначення',
	'ow_Annotation' => 'Анотація',
	'ow_ApproximateMeanings' => 'Приблизні значення',
	'ow_ClassAttributeAttribute' => 'Атрибут',
	'ow_ClassAttributes' => 'Атрибути класу',
	'ow_ClassAttributeLevel' => 'Рівень',
	'ow_ClassAttributeType' => 'Тип',
	'ow_ClassMembership' => 'Членство у класах',
	'ow_Collection' => 'Колекція',
	'ow_CollectionMembership' => 'Присутні в колекціях',
	'ow_Definition' => 'Визначення',
	'ow_DefinedMeaningAttributes' => 'Анотація',
	'ow_DefinedMeaning' => 'Задане значення',
	'ow_DefinedMeaningReference' => 'Задане значення',
	'ow_ExactMeanings' => 'Точне значення',
	'ow_Expression' => 'Вираз',
	'ow_ExpressionMeanings' => 'Значення виразів',
	'ow_Expressions' => 'Вирази',
	'ow_IdenticalMeaning' => 'Тотожне значення?',
	'ow_IncomingRelations' => 'Вхідне відношення',
	'ow_GotoSource' => 'Перейти до початкового коду',
	'ow_Language' => 'Мова',
	'ow_LevelAnnotation' => 'Анотація',
	'ow_OptionAttribute' => 'Властивість',
	'ow_OptionAttributeOption' => 'Параметр',
	'ow_OptionAttributeOptions' => 'Параметри',
	'ow_OptionAttributeValues' => 'Значення параметрів',
	'ow_OtherDefinedMeaning' => 'Інше задане значення',
	'ow_PopupAnnotation' => 'Анотація',
	'ow_Relations' => 'Відношення',
	'ow_RelationType' => 'Тип відношення',
	'ow_Spelling' => 'Правопис',
	'ow_Synonyms' => 'Синоніми',
	'ow_SynonymsAndTranslations' => 'Синоніми і переклади',
	'ow_Source' => 'Джерело',
	'ow_SourceIdentifier' => 'Ідентифікатор джерела',
	'ow_TextAttribute' => 'Властивість',
	'ow_Text' => 'Текст',
	'ow_TextAttributeValues' => 'Прості тексти',
	'ow_TranslatedTextAttribute' => 'Властивість',
	'ow_TranslatedText' => 'Перекладений текст',
	'ow_TranslatedTextAttributeValue' => 'Текст',
	'ow_TranslatedTextAttributeValues' => 'Тексти для перекладу',
	'ow_LinkAttribute' => 'Властивість',
	'ow_LinkAttributeValues' => 'Посилання',
	'ow_Property' => 'Властивість',
	'ow_Value' => 'Значення',
	'ow_meaningsoftitle' => 'Значення «$1»',
	'ow_meaningsofsubtitle' => '<em>Вікі-посилання:</em> [[$1]]',
	'ow_Permission_denied' => '<h2>Доступ заборонений</h2>',
	'ow_copy_no_action_specified' => 'Будь ласка, зазначте дію',
	'ow_copy_help' => 'Довідка ще не реалізована.',
	'ow_please_proved_dmid' => "Схоже, що у вхідних даних відсутнє «?dmid=<ID>» (dmid — ідентифікатор певного значення)<br /> 
Будь ласка, зв'яжіться з адміністратором сервера.",
	'ow_please_proved_dc1' => "Схоже, що у вхідних даних відсутнє «?dc1=<щось>» (dc1 — контекст набору даних; набір даних, звідки копіювати)<br /> Будь ласка, зв'яжіться з адміністратором сервера.",
	'ow_copy_unsuccessful' => '<h3>Копіювання невдале</h3>
Не була виконана операція копіювання.',
);

/** Vietnamese (Tiếng Việt)
 * @author Minh Nguyen
 * @author Vinhtantran
 */
$wdMessages['vi'] = array(
	'datasearch' => 'Wikidata: Tìm kiếm cho dữ liệu',
	'langman_title' => 'Quản lý ngôn ngữ',
	'languages' => 'Wikidata: Quản lý ngôn ngữ',
	'ow_save' => 'Lưu',
	'ow_history' => 'Lịch sử',
	'ow_noedit_title' => 'Không có quyền sửa đổi',
	'ow_dm_OK' => 'Được',
	'ow_AlternativeDefinition' => 'Định nghĩa khác',
	'ow_AlternativeDefinitions' => 'Các định nghĩa khác',
	'ow_Annotation' => 'Chú thích',
	'ow_ApproximateMeanings' => 'Ý nghĩa gần',
	'ow_ClassAttributeLevel' => 'Cấp',
	'ow_ClassAttributeType' => 'Loại',
	'ow_Collection' => 'Tập hợp',
	'ow_Definition' => 'Định nghĩa',
	'ow_DefinedMeaningAttributes' => 'Chú thích',
	'ow_DefinedMeaning' => 'Định nghĩa',
	'ow_DefinedMeaningReference' => 'Định nghĩa',
	'ow_Language' => 'Ngôn ngữ',
	'ow_LevelAnnotation' => 'Chú thích',
	'ow_OptionAttributeOptions' => 'Tùy chọn',
	'ow_PopupAnnotation' => 'Chú thích',
	'ow_Relations' => 'Các mối quan hệ',
	'ow_Spelling' => 'Chính tả',
	'ow_Synonyms' => 'Từ đồng âm',
	'ow_SynonymsAndTranslations' => 'Từ đồng âm và cách dịch',
	'ow_Source' => 'Nguồn',
	'ow_Text' => 'Văn bản',
	'ow_TranslatedText' => 'Văn bản dịch',
	'ow_TranslatedTextAttributeValue' => 'Văn bản',
	'ow_Value' => 'Giá trị',
	'ow_meaningsoftitle' => 'Các ý nghĩa của “$1”',
	'ow_meaningsofsubtitle' => '<em>Liên kết wiki:</em> [[$1]]',
);

/** Volapük (Volapük)
 * @author Malafaya
 * @author Smeira
 */
$wdMessages['vo'] = array(
	'datasearch' => 'Wikidata: Nünodisuk',
	'ow_save' => 'Dakipolöd',
	'ow_history' => 'Jenotem',
	'ow_noedit_title' => 'Däl nonik ad redakön',
	'ow_uipref_datasets' => 'Logam kösömik',
	'ow_uiprefs' => 'Wikidata',
	'ow_none_selected' => 'Nos pevälon',
	'ow_conceptmapping_no_action_specified' => 'Dun: „$1“ no mögon.',
	'ow_add_concept_link' => 'Läükön yümi tikädes votik',
	'ow_concept_panel' => 'Tikädafremül',
	'ow_Annotation' => 'Penet',
	'ow_ClassAttributeLevel' => 'Nivod',
	'ow_ClassAttributeType' => 'Sot',
	'ow_ClassMembership' => 'Kladalimanam',
	'ow_Collection' => 'Konlet',
	'ow_CollectionMembership' => 'Konletalimanam',
	'ow_Definition' => 'Miedet',
	'ow_DefinedMeaningAttributes' => 'Penet',
	'ow_DefinedMeaning' => 'Sinif pemiedetöl',
	'ow_DefinedMeaningReference' => 'Sinif pemiedetöl',
	'ow_ExactMeanings' => 'Sinifs kuratik',
	'ow_Expression' => 'Notod',
	'ow_ExpressionMeanings' => 'Notodotasinifs',
	'ow_Expressions' => 'Notods',
	'ow_IdenticalMeaning' => 'Sinif ot?',
	'ow_Language' => 'Pük',
	'ow_LevelAnnotation' => 'Penet',
	'ow_OptionAttribute' => 'Patöf',
	'ow_OptionAttributeOption' => 'Välot',
	'ow_OptionAttributeOptions' => 'Välots',
	'ow_PopupAnnotation' => 'Penet',
	'ow_Spelling' => 'Tonatam',
	'ow_Source' => 'Fonät',
	'ow_TextAttribute' => 'Patöf',
	'ow_Text' => 'Vödem',
	'ow_TranslatedTextAttribute' => 'Patöf',
	'ow_TranslatedText' => 'Vödem petradutöl',
	'ow_TranslatedTextAttributeValue' => 'Vödem',
	'ow_TranslatedTextAttributeValues' => 'Vödems tradutovik',
	'ow_LinkAttribute' => 'Patöf',
	'ow_LinkAttributeValues' => 'Liuds',
	'ow_Property' => 'Patöf',
	'ow_Value' => 'Völad',
	'ow_meaningsoftitle' => 'Sinifs ela „$1“',
	'ow_meaningsofsubtitle' => '<em>Vükayüm:</em> [[$1]]',
	'ow_Permission_denied' => '<h2>Däl no pegevon</h2>',
	'ow_copy_help' => 'Yuf no nog gebidon.',
	'ow_show' => 'Jonolöd',
);

/** Simplified Chinese (‪中文(简体)‬)
 * @author Gaoxuewei
 * @author Wmr89502270
 */
$wdMessages['zh-hans'] = array(
	'languages' => 'Wikidata: 语言管理员',
	'langman_title' => '语言管理员',
	'datasearch' => 'Wikidata: 数据搜寻',
	'ow_save' => '保存',
	'ow_history' => '历史',
	'ow_datasets' => '选择数据集',
	'ow_noedit_title' => '无权进行编辑',
	'ow_noedit' => '您无权在 "$1" 中编辑页面。
请见[[{{MediaWiki:Ow editing policy url}}|我们的编辑政策]]。',
	'ow_uipref_datasets' => '默认视图',
	'ow_uiprefs' => 'Wiki数据',
	'ow_none_selected' => '未选择',
	'ow_conceptmapping_help' => '<p>可能的action： <ul>
<li>&action=insert&<data_context_prefix>=<defined_id>&...  插入一个映射</li>
<li>&action=get&concept=<concept_id>  阅读映射返回</li>
<li>&action=list_sets  返回一个关于可能的背景前缀和他们可能提到的列表。</li>
<li>&action=get_associated&dm=<defined_meaning_id>&dc=<dataset_context_prefix> 为一个已经定义的概念返回所有其他的</li>
<li>&action=help  阅读帮助</li>
</ul></p>',
	'ow_OptionAttributeOption' => '选择',
	'ow_OptionAttributeOptions' => '选项',
	'ow_Source' => '来源',
	'ow_Text' => '文本',
);

/** Traditional Chinese (‪中文(繁體)‬) */
$wdMessages['zh-hant'] = array(
	'datasearch' => 'Wikidata: 資料搜尋',
	'langman_title' => '語言管理員',
	'languages' => 'Wikidata: 語言管理員',
);

