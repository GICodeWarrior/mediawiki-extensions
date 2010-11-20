<?php
$messages = array();
 
/** English
 * @author Church of emacs
 */
$messages['en'] = array( 
	'flagpage' => 'Flag a page',
	'flagpage-desc' => 'Flag page with predefined templates',
	'flagpage-templatelist' => '<!--
Edit this page to configure templates to use.
Examples:
* [[Template:Unsourced|The page does not cite any references]]
* [[Template:NPOV|The page is written in a biased way]]
* [[Template:Delete|The page should be deleted]]
-->',
	'flagpage-nopageselectedtitle' => 'No page selected',
	'flagpage-nopageselected' => 'You did not specify a page',
	'flagpage-emptylisttitle' => 'No templates configured',
	'flagpage-emptylist' => 'You need to configure your lists of templates. Edit [[{{ns:8}}:flagpage-templatelist]] to do so now.',
	'flagpage-preview' => 'Preview of the selected template:',
	'flagpage-confirmsave' => 'Please confirm your changes.',
	'flagpage-submitbutton' => 'Save page with this template',
	'flagpage-nonexistent'=> 'The page “$1” does not exist. Perhaps it has been [{{fullurl:Special:Log|page=$1}} moved or deleted].',
	'flagpage-summary' => 'Added template [[$1]] using FlagPage',
	'flagpage-success' => '[[$1]] has been added to the page [[$2]].',
	'flagpage-tab' => 'Flag'
);

/** Belarusian (Taraškievica orthography) (Беларуская (тарашкевіца))
 * @author EugeneZelenko
 * @author Jim-by
 * @author Wizardist
 */
$messages['be-tarask'] = array(
	'flagpage' => 'Пазначыць старонку',
	'flagpage-desc' => 'Пазначыць старонку ўжо вызначаным шаблёнам',
	'flagpage-templatelist' => "<!--
Рэдагаваць гэтую старонку для ўстаноўкі шаблёнаў для выкарыстаньня.
Прыклады:
* [[Template:Няма крыніц|Старонка не спасылаецца ні на якія крыніцы]]
* [[Template:Неаб'ектыўна|Старонка напісаная неаб’ектыўна]]
* [[Template:Выдаліць|Старонка павінна быць выдаленая]]
-->",
	'flagpage-nopageselectedtitle' => 'Старонка не выбраная',
	'flagpage-nopageselected' => 'Вы не пазначылі старонку',
	'flagpage-emptylisttitle' => 'Шаблёны не сканфігураваныя',
	'flagpage-emptylist' => 'Вам трэба сканфігураваць сьпісы шаблёнаў. Адрэдагуйце [[{{ns:8}}:flagpage-templatelist]] адпаведным чынам.',
	'flagpage-preview' => 'Прагляд абранага шаблёну:',
	'flagpage-confirmsave' => 'Пацьвердзіце Вашыя зьмены.',
	'flagpage-submitbutton' => 'Захаваць старонку з гэтым шаблёнам',
	'flagpage-nonexistent' => 'Старонка «$1» не існуе. Магчыма, яна была [{{fullurl:Special:Log|page=$1}} перанесеная ці выдаленая].',
	'flagpage-summary' => 'дададзены шаблён [[$1]] праз FlagPage',
	'flagpage-success' => '[[$1]] быў дададзены на старонку [[$2]].',
	'flagpage-tab' => 'Пазначыць',
);

/** German (Deutsch)
 * @author Kghbln
 */
$messages['de'] = array(
	'flagpage' => 'FlagPage',
	'flagpage-desc' => 'Ermöglicht das Kennzeichnen von Seiten mit Hilfe von Vorlagen',
	'flagpage-templatelist' => '<!--
Diese Seite bearbeiten, um die zur Kennzeichnung verfügbaren Vorlagen festzulegen.
Beispiele:
* [[Vorlage:Belege fehlen|Diese Seite ist nicht hinreichend mit Belegen (bspw. Einzelnachweisen) ausgestattet.]]
* [[Vorlage:Neutralität|Die Neutralität dieses Artikels ist umstritten.]]
* [[Vorlage:Löschen|Diese Seite wurde zum sofortigen Löschen vorgeschlagen.]]
-->',
	'flagpage-nopageselectedtitle' => 'Keine Seite ausgewählt',
	'flagpage-nopageselected' => 'Es wurde keine Seite ausgewählt.',
	'flagpage-emptylisttitle' => 'Keine Vorlagen festgelegt',
	'flagpage-emptylist' => 'Es sind verwendbare Vorlagen festzulegen. Hierfür ist die Seite [[{{ns:8}}:flagpage-templatelist]] zu bearbeiten.',
	'flagpage-preview' => 'Vorschau der ausgewählten Vorlage',
	'flagpage-confirmsave' => 'Bitte die Änderungen bestätigen.',
	'flagpage-submitbutton' => 'Seite einschließlich dieser Vorlage speichern.',
	'flagpage-nonexistent' => 'Die Seite „$1“ ist nicht vorhanden. Vielleicht wurde sie [{{fullurl:Special:Log|page=$1}} verschoben oder gelöscht].',
	'flagpage-summary' => 'Vorlage [[$1]] hinzugefügt (mit FlagPage)',
	'flagpage-success' => '[[$1]] wurde zur Seite [[$2]] hinzugefügt.',
	'flagpage-tab' => 'Kennzeichnen',
);

/** French (Français)
 * @author Peter17
 */
$messages['fr'] = array(
	'flagpage' => 'Marquer une page',
	'flagpage-desc' => 'Marquer la page avec les modèles prédéfinis',
	'flagpage-templatelist' => '<!--
Modifier cette page pour configurer les modèles à utiliser.
Exemples :
* [[Template:Unsourced|L’article ne site aucune référence]]
* [[Template:NPOV|L’article est écrit d’une manière biaisée]]
* [[Template:Delete|L’article devrait être supprimé]]
-->',
	'flagpage-nopageselectedtitle' => 'Aucune page sélectionnée',
	'flagpage-nopageselected' => 'Vous n’avez pas spécifié de page',
	'flagpage-emptylisttitle' => 'Aucun modèle configuré',
	'flagpage-emptylist' => 'Vous devez configurer vos listes de modèles. Modifiez [[{{ns:8}}:flagpage-templatelist]] pour le faire maintenant.',
	'flagpage-preview' => 'Aperçu du modèle sélectionné :',
	'flagpage-confirmsave' => 'Veuillez confirmer vos modifications.',
	'flagpage-submitbutton' => 'Enregistrer la page avec ce modèle',
	'flagpage-nonexistent' => "La page « $1 » n'existe pas. Elle a peut-être été [{{fullurl:Special:Log|page=$1}} déplacée ou supprimée].",
	'flagpage-summary' => "Ajout du modèle [[$1]] à l'aide de FlagPage",
	'flagpage-success' => '[[$1]] a été ajouté à la page [[$2]].',
	'flagpage-tab' => 'Marquer',
);

/** Interlingua (Interlingua)
 * @author McDutchie
 */
$messages['ia'] = array(
	'flagpage' => 'Marcar un pagina',
	'flagpage-desc' => 'Marcar pagina con patronos predefinite',
	'flagpage-templatelist' => '<!--
Modifica iste pagina pro configurar le patronos a usar.
Exemplos:
* [[Template:Unsourced|Le articulo non cita referentias]]
* [[Template:NPOV|Le articulo es scribite in forma partial]]
* [[Template:Delete|Le articulo debe esser delite]]
-->',
	'flagpage-nopageselectedtitle' => 'Nulle pagina seligite',
	'flagpage-nopageselected' => 'Tu non specificava un pagina',
	'flagpage-emptylisttitle' => 'Nulle patrono configurate',
	'flagpage-emptylist' => 'Tu debe configurar le listas de patronos. Modifica [[{{ns:8}}:flagpage-templatelist]] pro facer lo ora.',
	'flagpage-preview' => 'Previsualisation del patrono seligite:',
	'flagpage-confirmsave' => 'Per favor confirma le modificationes.',
	'flagpage-submitbutton' => 'Salveguardar le pagina con iste patrono',
	'flagpage-nonexistent' => 'Le pagina "$1" non existe. Illo ha forsan essite [{{fullurl:Special:Log|page=$1}} renominate o delite].',
	'flagpage-summary' => 'Patrono [[$1]] addite usante FlagPage',
	'flagpage-success' => '[[$1]] ha essite addite al pagina [[$2]].',
	'flagpage-tab' => 'Marcar',
);

/** Indonesian (Bahasa Indonesia)
 * @author IvanLanin
 */
$messages['id'] = array(
	'flagpage' => 'Tandai halaman',
	'flagpage-desc' => 'Menandai halaman dengan templat standar',
	'flagpage-templatelist' => '<!--
Sunting halaman ini untuk mengatur templat yang digunakan.
Contoh:
* [[Template:Unsourced|Halaman ini tidak mencantumkan rujukan apa pun]]
* [[Template:NPOV|Halaman ini ditulis dengan gaya tidak netral]]
* [[Template:Delete|Halaman ini harus dihapus]]
-->',
	'flagpage-nopageselectedtitle' => 'Tidak ada halaman yang dipilih',
	'flagpage-nopageselected' => 'Anda tidak menentukan halaman',
	'flagpage-emptylisttitle' => 'Belum ada templat yang ditentukan',
	'flagpage-emptylist' => 'Anda perlu mengonfigurasi daftar templat Anda. Sunting [[{{ns:8}}:flagpage-templatelist]] untuk melakukannya sekarang.',
	'flagpage-preview' => 'Pratayang dari templat yang dipilih:',
	'flagpage-confirmsave' => 'Silakan konfirmasikan perubahan.',
	'flagpage-submitbutton' => 'Simpan halaman dengan templat ini',
	'flagpage-nonexistent' => 'Halaman "$1" tidak ada. Mungkin sudah [{{fullurl:Special:Log|page=$1}} dipindahkan atau dihapus].',
	'flagpage-summary' => 'Menambahkan templat [[$1]] dengan menggunakan FlagPage',
	'flagpage-success' => '[[$1]] telah ditambahkan ke halaman [[$2]].',
	'flagpage-tab' => 'Tanda',
);

/** Japanese (日本語)
 * @author 青子守歌
 */
$messages['ja'] = array(
	'flagpage' => 'ページにフラグを設定',
	'flagpage-desc' => '定義済みテンプレートでページにフラグを設定',
	'flagpage-templatelist' => '<!--
使用するテンプレートをこのページで設定してください。
* [[テンプレート:情報源がない|ページに参考文献が1つもない]]
* [[テンプレート:中立的な観点|ページが偏った観点から書かれている]]
* [[テンプレート:削除|ページは削除されるべき]]
-->',
	'flagpage-nopageselectedtitle' => 'ページが選択されていません',
	'flagpage-nopageselected' => 'ページを指定していません',
	'flagpage-emptylisttitle' => 'テンプレートが設定されていません',
	'flagpage-emptylist' => 'テンプレートの一覧を設定する必要があります。[[{{ns:8}}:flagpage-templatelist]]を編集してください。',
	'flagpage-preview' => '選択されたテンプレートのプレビュー：',
	'flagpage-confirmsave' => '変更内容を確認してください。',
	'flagpage-submitbutton' => 'このテンプレートを使用してページを保存',
	'flagpage-nonexistent' => 'ページ「$1」は存在しません。[{{fullurl:Special:Log|page=$1}} 移動または削除]されたかもしれません。',
	'flagpage-summary' => 'テンプレート[[$1]]を追加（FlagPageによる）',
	'flagpage-success' => '[[$1]]はページ[[$2]]に追加されました。',
	'flagpage-tab' => 'フラグ',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'flagpage' => 'Eng Säit markéieren',
	'flagpage-desc' => 'Eng Säit mat enger virdefinéierter Schabloun markéieren',
	'flagpage-nopageselectedtitle' => 'Keng Säit erausgesicht',
	'flagpage-nopageselected' => 'Dir hutt keng Säit uginn',
	'flagpage-emptylisttitle' => 'Keng Schabloun festgeluecht',
	'flagpage-emptylist' => 'Dir musst Är Lëscht vu Schabloune festleeën. Ännert [[{{ns:8}}:flagpage-templatelist]] fir dat elo ze maachen.',
	'flagpage-preview' => 'Déi erausgesichte Schabloune gesinn esou aus:',
	'flagpage-confirmsave' => 'Confirméiert Är Ännerunge w.e.g..',
	'flagpage-submitbutton' => 'Säit mat dëser Schabloun späicheren',
);

/** Macedonian (Македонски)
 * @author Bjankuloski06
 */
$messages['mk'] = array(
	'flagpage' => 'Означи страница',
	'flagpage-desc' => 'Означи страница со предодредени шаблони',
	'flagpage-templatelist' => '<!--
Уредете ја страницава за да ги поставите шаблоните што ќе се користат.
Примери:
* [[Template:Unsourced|Статијата не наведува никакви извори]]
* [[Template:NPOV|Статијата е пристрасна]]
* [[Template:Delete|Статијата треба да се избрише]]
-->',
	'flagpage-nopageselectedtitle' => 'Немате избрано страница',
	'flagpage-nopageselected' => 'Не наведовте страница',
	'flagpage-emptylisttitle' => 'Нема утврдено шаблони',
	'flagpage-emptylist' => 'Ќе треба да утврдите список со шаблони. Утврдете го на [[{{ns:8}}:flagpage-templatelist]].',
	'flagpage-preview' => 'Преглед на избраниот шаблон:',
	'flagpage-confirmsave' => 'Потврдете ги извршените промени.',
	'flagpage-submitbutton' => 'Зачувај ја страницата со овој шаблон.',
	'flagpage-nonexistent' => 'Страницата „$1“ не постои. Можеби е [{{fullurl:Special:Log|page=$1}} преместена или избришана].',
	'flagpage-summary' => 'Поставен шаблонот [[$1]] користејќи ОзначиСтраница',
	'flagpage-success' => '[[$1]] е поставен на страницата [[$2]].',
	'flagpage-tab' => 'Означи',
);

/** Dutch (Nederlands)
 * @author Siebrand
 */
$messages['nl'] = array(
	'flagpage' => 'Pagina markeren',
	'flagpage-desc' => 'Pagina markeren met vooringestelde sjablonen',
	'flagpage-templatelist' => '<!--
Bewerk deze pagina om te gebruiken sjablonen toe te voegen
Voorbeelden:
* [[Sjabloon:Geenbron|De pagina heeft geen referenties]]
* [[Sjabloon:NPOV|De pagina is geschreven op een eenzijdige manier]]
* [[Sjabloon:Verwijderen|De pagina moet verwijderd worden]]
-->',
	'flagpage-nopageselectedtitle' => 'Geen pagina geselecteerd',
);

/** Polish (Polski)
 * @author Sp5uhe
 */
$messages['pl'] = array(
	'flagpage' => 'Oznacz szablonem stronę',
	'flagpage-desc' => 'Oznacz stronę wcześniej zdefiniowanymi szablonami',
	'flagpage-templatelist' => '<!--
Zmień treść tej strony, aby skonfigurować wykorzystywane szablony.
Przykłady:
* [[Szablon:Źródła|Strona nie zawiera żadnych źródeł]]
* [[Szablon:NPOV|Tekst napisany w sposób tendencyjny]]
* [[Szablon:EK|Strona powinna zostać usunięta]]
-->',
	'flagpage-nopageselectedtitle' => 'Nie wybrano żadnej strony',
	'flagpage-nopageselected' => 'Nie określiłeś żadnej strony',
	'flagpage-emptylisttitle' => 'Nie skonfigurowano szablonów',
	'flagpage-emptylist' => 'Należy skonfigurować listę szablonów. Edytuj [[{{ns:8}}:flagpage-templatelist]] jeśli chcesz to zrobić.',
);

/** Piedmontese (Piemontèis)
 * @author Dragonòt
 */
$messages['pms'] = array(
	'flagpage' => 'Marca na pàgina',
	'flagpage-desc' => 'Marca na pàgina con stamp predefinì',
	'flagpage-templatelist' => "<!--
Modìfica sta pàgina për configuré jë stamp da dovré.
Esempi:
* [[Template:Sensa sorziss|La pàgina a sita pa gnun-e referense]]
* [[Template:NPOV|La pàgina a l'é scrivùa an manera ëd part]]
* [[Template:Delete|La pàgina a dovrìa esse scanselà]]
-->",
	'flagpage-nopageselectedtitle' => 'Pa gnun-e pàgine selessionà',
	'flagpage-nopageselected' => "It l'has pa specificà gnun-e pàgine",
	'flagpage-emptylisttitle' => 'Pa gnun stamp configurà',
	'flagpage-emptylist' => 'It deuve configuré toa lista dë stamp. Modìfica [[{{ns:8}}:flagpage-templatelist]] për fé parèj adess.',
	'flagpage-preview' => 'Preuva dlë stamp selessionà:',
	'flagpage-confirmsave' => 'Për piasì conferma ij tò cambi.',
	'flagpage-submitbutton' => 'Salva pàgina con sto stamp',
	'flagpage-nonexistent' => 'La pàgina "$1" a esist pa. Miraco a l\'é stàita [{{fullurl:Special:Log|page=$1}} tramudà o scanselà].',
	'flagpage-summary' => 'Gionta stamp [[$1]] an dovrand FlagPage',
	'flagpage-success' => "[[$1]] a l'é stàit giontà a la pàgina [[$2]].",
	'flagpage-tab' => 'Marca',
);

/** Portuguese (Português)
 * @author Hamilton Abreu
 */
$messages['pt'] = array(
	'flagpage' => 'Assinalar uma página',
	'flagpage-desc' => 'Assinalar uma página usando predefinições configuradas',
	'flagpage-templatelist' => '<!--
Editar esta página para configurar as predefinições que podem ser usadas.
Exemplos:
* [[Predefinição:Sem referências|A página não cita nenhuma referência]]
* [[Predefinição:Princípio da imparcialidade|A página não está escrita de uma perspectiva neutra]]
* [[Predefinição:Eliminar|A página deve ser eliminada]]
-->',
	'flagpage-nopageselectedtitle' => 'Nenhuma página seleccionada',
	'flagpage-nopageselected' => 'Não especificou uma página',
	'flagpage-emptylisttitle' => 'Não foi configurada nenhuma predefinição',
	'flagpage-emptylist' => 'Precisa de configurar uma lista de predefinições. Edite [[{{ns:8}}:flagpage-templatelist]] para configurá-la agora.',
	'flagpage-preview' => 'Antevisão da predefinição escolhida:',
	'flagpage-confirmsave' => 'Confirme as alterações, por favor.',
	'flagpage-submitbutton' => 'Gravar a página com esta predefinição',
	'flagpage-nonexistent' => 'A página “$1” não existe. Pode ter sido [{{fullurl:Special:Log|page=$1}} movida ou eliminada].',
	'flagpage-summary' => 'Foi adicionada a predefinição [[$1]] usando Assinalar Página',
	'flagpage-success' => '[[$1]] foi acrescentada à página [[$2]].',
	'flagpage-tab' => 'Assinalar',
);

/** Brazilian Portuguese (Português do Brasil)
 * @author Giro720
 */
$messages['pt-br'] = array(
	'flagpage' => 'Marcar uma página',
	'flagpage-desc' => 'Marcar a página com uma predefinição',
	'flagpage-templatelist' => '<!--
Edite está página para configurar a predefinição a ser usada.
Exemplos:
* [[Template:Unsourced|Este artigo não cita nenhuma referência]]
* [[Template:NPOV|O artigo está escrito de forma parcial]]
* [[Template:Delete|O artigo deve ser eliminado]]
-->',
	'flagpage-nopageselectedtitle' => 'Nenhuma página selecionada',
	'flagpage-nopageselected' => 'Você não especificou uma página',
	'flagpage-emptylisttitle' => 'Nenhuma predefinição configurada',
	'flagpage-emptylist' => 'Você precisa configurar a sua lista de predefinições. Edite [[{{ns:8}}:flagpage-templatelist]] para fazer isso.',
	'flagpage-preview' => 'Previsualização da predefinição selecioanda:',
	'flagpage-confirmsave' => 'Confirme suas alterações, por favor.',
	'flagpage-submitbutton' => 'Salvar a página com esta predefinição',
	'flagpage-nonexistent' => 'A página "$1" não existe. Talvez ela tenha sido [{{fullurl:Special:Log|page=$1}} movida ou eliminada].',
	'flagpage-summary' => 'Adicionar a predefinição [[$1]] usando FlagPage',
	'flagpage-success' => '[[$1]] foi adicionada a página [[$2]].',
	'flagpage-tab' => 'Marcar',
);

