<?php
/**
 * @author Yaron Koren
 */

class SF_LanguageEn extends SF_Language {

/* private */ var $m_ContentMessages = array(
	'sf_property_isattribute' => 'Este � um atributo to tipo $1.',
	'sf_property_isproperty' => 'Esta � uma propriedade do tipo $1.',
	'sf_property_allowedvals' => 'Os valores permitidos para este atributo ou propriedade s�o:',
	'sf_property_isrelation' => 'Esta � uma rela��o.',
	'sf_template_docu' => 'Esta � a \'$1\' predefini��o. Ela deve ser chamada no seguinte formato:',
	'sf_template_docufooter' => 'Edite a p�gina para ver o texto da predefini��o.',
	'sf_form_docu' => 'Este � o \'$1\' formul�rio. Para adicionar uma p�gina com esse formul�rio, adicione o nome da p�gina abaixo; se j� existir uma p�gina com o mesmo nome, voc� ser� enviado para um formul�rio para editar a p�gina.',
	'sf_category_hasdefaultform' => 'Esta categoria usa o formul�rio $1.',
	 'sf_category_desc' => 'Esta � a $1 categoria.',
	// month names are already defined in MediaWiki, but unfortunately
	// there they're defined as user messages, and here they're
	// content messages
	'sf_january' => 'Janeiro', 
	'sf_february' => 'Fevereiro',
	'sf_march' => 'Mar�o',
	'sf_april' => 'Abril',
	'sf_may' => 'Maio',
	'sf_june' => 'Junho',
	'sf_july' => 'Julho',
	'sf_august' => 'Agosto',
	'sf_september' => 'Setembro',
	'sf_october' => 'Outubro',
	'sf_november' => 'Novembro',
	'sf_december' => 'Dezembro',
	'sf_blank_namespace' => 'Principal'
);

/* private */ var $m_UserMessages = array(
	'createproperty' => 'Cria uma propriedade',
	'sf_createproperty_allowedvalsinput' => 'Se voc� quer que somente determinados valores sejam permitidos nesse campo, entre com a lista dos valores permitidos, separados por v�rgulas (se um valor cont�m v�rgula, substitua por "\,"):',
	'sf_createproperty_propname' => 'Nome:',
	'sf_createproperty_proptype' => 'Tipo:',
	'templates' => 'Predefini��es',
	'sf_templates_docu' => 'As seguintes predefini��es existem na wiki.',
	'sf_templates_definescat' => 'define categoria:',
	'createtemplate' => 'Cria uma predefini��o',
	'sf_createtemplate_namelabel' => 'Nome da predefini��o:',
	'sf_createtemplate_categorylabel' => 'Categoria definida por predefini��o (opcional):',
	'sf_createtemplate_templatefields' => 'Campos da predefini��o',
	'sf_createtemplate_fieldsdesc' => 'Para ter os campos nesta predefini��o n�o � necess�rio o nome dos campos, simplesmente entre com o �ndice de cada campo (e.g. 1, 2, 3, etc.) como nome, ao inv�s de um nome atual.',
	'sf_createtemplate_fieldname' => 'Nome do Campo:',
	'sf_createtemplate_displaylabel' => 'Exibir r�tulo:',
	'sf_createtemplate_semanticproperty' => 'Propriedade sem�ntica:',
	'sf_createtemplate_fieldislist' => 'Este campo pode manter uma lista de valores, separados por v�rgulas',
	'sf_createtemplate_aggregation' => 'Agrega��o',
	'sf_createtemplate_aggregationdesc' => 'Para listar, em qualquer p�gina usando essa predefini��o, todos os artigos que tem uma determinada propriedade apontando para aquela p�gina, especifique a propriedade apropriada abaixo:',
	'sf_createtemplate_aggregationlabel' => 'T�tulo para a lista:',
	'sf_createtemplate_outputformat' => 'Formato de sa�da:',
	'sf_createtemplate_standardformat' => 'Padr�o',
	'sf_createtemplate_infoboxformat' => 'Right-hand-side infobox',
	'sf_createtemplate_addfield' => 'Adicionar campo',
	'sf_createtemplate_deletefield' => 'Deletar',
	  'sf_createtemplate_addtemplatebeforesave' => 'Voc� deve adicionar ao menos uma predefini��o para este formul�rio antes de salvar.',
	'forms' => 'Formul�rios',
	'sf_forms_docu' => 'Os seguintes formul�rios existem na wiki.',
	'createform' => 'Criar um formul�rio',
	'sf_createform_nameinput' => 'Nome do formul�rio (convention is to name the form after the main template it populates):',
	'sf_createform_template' => 'Predefini��o:',
	'sf_createform_templatelabelinput' => 'T�tulo da predefini��o (opcional):',
	'sf_createform_allowmultiple' => 'Permitir v�rias inst�ncias (ou zero) dessa predefini��o na p�gina criada',
	'sf_createform_field' => 'Campo:',
	'sf_createform_fieldattr' => 'Este campo define o atributo $1, do tipo $2.',
	'sf_createform_fieldattrlist' => 'Este campo define uma lista de elementos que tem o atributo $1, do tipo $2.',
	'sf_createform_fieldattrunknowntype' => 'Estte campo define o atributo $1, de um tipo n�o especificado.',
	'sf_createform_fieldrel' => 'Este campo define uma rela��o $1.',
	'sf_createform_fieldrellist' => 'Este campo define uma lista de elementos que tem a rela��o $1.',
	'sf_createform_fieldprop' => 'Este campo define a propriedade $1, do tipo $2.',
	'sf_createform_fieldproplist' => 'Este campo define uma lista de elementos que tem a propriedade $1, do tipo $2.',
	'sf_createform_fieldpropunknowntype' => 'Este campo define a propriedade $1, de um tipo n�o especificado.',
	'sf_createform_inputtype' =>  'Input type:',
	'sf_createform_inputtypedefault' =>  '(padr�o)',
	'sf_createform_formlabel' => 'T�tulo do formul�rio:',
	'sf_createform_hidden' =>  'Escondido',
	'sf_createform_restricted' =>  'Restrito (somente usu�rios sysop podem modificar isto)',
	'sf_createform_mandatory' =>  '	Obrigat�rio',
	'sf_createform_removetemplate' => 'Remover predefini��o',
	'sf_createform_addtemplate' => 'Adicionar predefini��o:',
	'sf_createform_beforetemplate' => 'Predefini��o anterior:',
	'sf_createform_atend' => 'No final',
	'sf_createform_add' => 'Adicionar',
	'sf_createform_choosefield' => 'Escolha um campo para adicionar',
	'createcategory' => 'Cria uma categoria',
	'sf_createcategory_name' => 'Nome:',
	'sf_createcategory_defaultform' => 'Formul�rio padr�o:',
	'sf_createcategory_makesubcategory' => 'Faz desta uma subcategoria de outra categoria (opcional):',
	'addpage' => 'Adicionar p�gina',
	'sf_addpage_badform' => 'Erro: nenhum formul�rio de p�gina foi encontrado em $1',
	'sf_addpage_docu' => 'Entre com o nome da p�gina aqui, para ser editado com o formul�rio \'$1\'. Se esta p�gina j� existir, voc� ser� direcionado para o formul�rio para editar a p�gina. Sen�o, voc� ser� direcionado para o formul�rio para adicionar a p�gina.',
	'sf_addpage_noform_docu' => 'Entre com o nome da p�gina aqui, e selecione o formul�rio na qual a p�gina ser� editada. Se esta p�gina j� existir, voc� ser� direcionado para o formul�rio para editar a p�gina.  Sen�o, voc� ser� direcionado para o formul�rio para adicionar a p�gina.',
	'addoreditdata' => 'Adicionar ou editar',
	'adddata' => 'Adicionar dados',
	'sf_adddata_title' => 'Adicionar $1: $2',
	'sf_adddata_badurl' => 'Esta � a p�gina para adicionar dados. Voc� deve especificar ambos um nome de formul�rio e uma p�gina alvo na URL; deve ser semelhante a \'Special:AddData?form=&lt;form name&gt;&target=&lt;target page&gt;\' or  \'Special:AddData/&lt;form name&gt;/&lt;target page&gt;\'.',
	'sf_adddata_altforms' => 'Voc� tamb�m pode adicionar est� p�gina com um dos seguintes formul�rios:',
	'sf_adddata_altformsonly' => 'Por favor selecione atrav�s de um dos seguintes formul�rios para adicionar esta p�gina:',
	'sf_forms_adddata' => 'Adicionar dados com o seguinte formul�rio',
	'editdata' => 'Editar dados',
	'form_edit' => 'Editar com formul�rio',
	'edit_source' => 'Editar fonte',
	'sf_editdata_title' => 'Editar $1: $2',
	'sf_editdata_badurl' => 'Est� � a p�gina para editar dados. Voc� deve especificar ambos um nome de formul�rio e uma p�gina alvo na URL; deve ser semelhante a \'Special:EditData?form=&lt;form name&gt;&target=&lt;target page&gt;\' or  \'Special:EditData/&lt;form name&gt;/&lt;target page&gt;\'.',
	'sf_editdata_formwarning' => 'Perigo: Esta p�gina <a href="$1">already exists</a>, mas n�o use esse formul�rio.',
	'sf_editdata_remove' => 'Remover',
	'sf_editdata_addanother' => 'Adicionar outro',
	'sf_editdata_freetextlabel' => 'Texto livre',

	'sf_blank_error' => 'N�o pode ficar em branco',
	'sf_bad_url_error' => 'deve ter o formato correto da URL, come�ando com \'http\'', 
    'sf_bad_email_error' => 'deve ter um formato v�lido de email', 
    'sf_bad_number_error' => 'deve ser um n�mero v�lido',
    'sf_bad_integer_error' => 'deve ser um v�lido integer', 
    'sf_bad_date_error' => 'deve ser uma data v�lida'
);

/* private */ var $m_SpecialProperties = array(
        //always start upper-case
        SF_SP_HAS_DEFAULT_FORM  => 'Has default form',
        SF_SP_HAS_ALTERNATE_FORM  => 'Has alternate form'
);

var $m_Namespaces = array(
	SF_NS_FORM           => 'Form',
	SF_NS_FORM_TALK      => 'Form_talk'
);

}

?>
