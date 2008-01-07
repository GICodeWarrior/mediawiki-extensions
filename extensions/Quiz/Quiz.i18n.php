<?php
/**
 * ***** BEGIN LICENSE BLOCK *****
 * This file is part of Quiz.
 * Copyright (c) 2007 Louis-Rémi BABE. All rights reserved.
 *
 * Quiz is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * Quiz is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Quiz; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 *
 * ***** END LICENSE BLOCK *****
 *
 * Quiz is a quiz tool for mediawiki.
 *
 * To activate this extension :
 * * Create a new directory named quiz into the directory "extensions" of mediawiki.
 * * Place this file and the files Quiz.i18n.php and quiz.js there.
 * * Add this line at the end of your LocalSettings.php file :
 * require_once 'extensions/quiz/Quiz.php';
 *
 * @version 1.0
 * @link http://www.mediawiki.org/wiki/Extension:Quiz
 *
 * @author BABE Louis-Rémi <lrbabe@gmail.com>
 */

/**
 * Messages list.
 */

$messages = array();

$messages['en'] = array(
	'quiz_addedPoints'	=> "Point(s) added for a correct answer",
	'quiz_cutoffPoints'	=> "Point(s) subtracted for a wrong answer",
	'quiz_ignoreCoef'	=> "Ignore the questions' coefficients",
	'quiz_shuffle'		=> "Shuffle questions",
	'quiz_colorRight'	=> "Right",
	'quiz_colorWrong'	=> "Wrong",
	'quiz_colorNA'		=> "Not answered",
	'quiz_colorError'	=> "Syntax error",
	'quiz_correction'	=> "Submit",
	'quiz_score'		=> "Your score is $1 / $2",
	'quiz_points'		=> "$1 | $2 point(s)",
	'quiz_reset'		=> "Reset"
);

$messages['ar'] = array(
	'quiz_addedPoints' => 'نقطة (نقاط) مضافة للإجابة الصحيحة',
	'quiz_cutoffPoints' => 'نقطة (نقاط) تخصم للإجابة الخاطئة',
	'quiz_ignoreCoef' => 'تجاهل معاملات الأسئلة',
	'quiz_shuffle' => 'أسئلة مختلطة',
	'quiz_colorRight' => 'صواب',
	'quiz_colorWrong' => 'خطأ',
	'quiz_colorNA' => 'لم تتم الإجابة عليه',
	'quiz_colorError' => 'خطأ صياغة',
	'quiz_correction' => 'تنفيذ',
	'quiz_score' => 'نتيجتك هي $1 / $2',
	'quiz_points' => '$1 | $2 نقطة(نقاط)',
	'quiz_reset' => 'إعادة ضبط',
);

$messages['bcl'] = array(
	'quiz_shuffle' => 'Balasahon an mga hapot',
	'quiz_colorRight' => 'Tamâ',
	'quiz_colorWrong' => 'Salâ',
	'quiz_correction' => 'Isumitir',
	'quiz_points' => '$1 | $2 punto(s)',
	'quiz_reset' => 'Ibalik',
);

/** Bulgarian (Български)
 * @author DCLXVI
 */
$messages['bg'] = array(
	'quiz_shuffle'    => 'Разбъркване на въпросите',
	'quiz_colorRight' => 'Правилно',
	'quiz_colorWrong' => 'Грешно',
	'quiz_colorError' => 'Синтактична грешка',
	'quiz_correction' => 'Изпращане',
);

$messages['de'] = array(
	'quiz_addedPoints'	=> "Pluspunkte für eine richtige Antwort",
	'quiz_cutoffPoints'	=> "Minuspunkte für eine falsche Antwort",
	'quiz_ignoreCoef'	=> "Ignoriere den Fragen-Koeffizienten",
	'quiz_shuffle'		=> "Fragen mischen",
	'quiz_colorRight'	=> "Richtig",
	'quiz_colorWrong'	=> "Falsch",
	'quiz_colorNA'		=> "Nicht beantwortet",
	'quiz_colorError'	=> "Syntaxfehler",
	'quiz_correction'	=> "Korrektur",
	'quiz_score'		=> "Punkte: $1 / $2",
	'quiz_points'		=> "$1 | $2 Punkte",
	'quiz_reset'		=> "Neustart"
);

$messages['el'] = array(
	'quiz_colorRight' => 'Σωστό',
	'quiz_colorWrong' => 'Λάθος',
	'quiz_score' => 'Η Βαθμολογία σας είναι $1 / $2',
	'quiz_points' => '$1 | $2 βαθμοί',
);

$messages['es'] = array(
	'quiz_addedPoints'	=> "Puntos por cada respuesta acertada",
	'quiz_cutoffPoints'	=> "Penalización por cada respuesta errónea",
	'quiz_ignoreCoef'	=> "Ignorar los puntos de cada pregunta",
	'quiz_shuffle'		=> "Desordenar preguntas",
	'quiz_colorRight'	=> "Acertadas",
	'quiz_colorWrong'	=> "Falladas",
	'quiz_colorNA'		=> "No contestadas",
	'quiz_colorError'	=> "Error de sintaxis",
	'quiz_correction'	=> "Contestar",
	'quiz_score'		=> "Tu puntuación es de $1 / $2",
	'quiz_points'		=> "$1 | $2 punto(s)",
	'quiz_reset'		=> "Empezar de nuevo"
);

	# فارسی (Huji)
$messages['fa'] = array(
	'quiz_addedPoints'  => 'امتیاز هر پاسخ درست',
	'quiz_cutoffPoints' => 'امتیاز منفی هر پاسخ نادرست',
	'quiz_ignoreCoef'   => 'نادیده گرفتن ضریب سوال‌ها',
	'quiz_shuffle'      => 'برزدن سوال‌ها',
	'quiz_colorRight'   => 'درست',
	'quiz_colorWrong'   => 'نادرست',
	'quiz_colorNA'      => 'پاسخ داده نشده',
	'quiz_colorError'   => 'خطای نحوی',
	'quiz_correction'   => 'ارسال',
	'quiz_score'        => 'امتیاز شما $1 از $2 است',
	'quiz_points'       => '$1 | $2 امتیاز',
	'quiz_reset'        => 'از نو',

);

/** Finnish (Suomi)
 * @author Str4nd
 */
$messages['fi'] = array(
	'quiz_colorRight' => 'Oikein',
	'quiz_colorWrong' => 'Väärin',
	'quiz_score'      => 'Tuloksesi on $1 / $2',
);

/**French (Français)
 *@author Grondin
 */
$messages['fr'] = array(
	'quiz_addedPoints'	=> "Point(s) ajouté(s) pour une réponse juste",
	'quiz_cutoffPoints'	=> "Point(s) retiré(s) pour une réponse erronée",
	'quiz_ignoreCoef'	=> "Ignorer les coefficients des questions",
	'quiz_shuffle'		=> "Mélanger les questions",
	'quiz_colorRight'	=> "Juste",
	'quiz_colorWrong'	=> "Faux",
	'quiz_colorNA'		=> "Non répondu",
	'quiz_colorError'	=> "Erreur de syntaxe",
	'quiz_correction'	=> "Correction",
	'quiz_score'		=> "Votre score est $1 / $2",
	'quiz_points'		=> "$1 | $2 point(s)",
	'quiz_reset'		=> "Réinitialiser"
);

$messages['gl'] = array(
	'quiz_addedPoints' => 'Punto(s) engadidos para unha resposta correcta',
	'quiz_cutoffPoints' => 'Punto(s) restado(s) por cada resposta errónea',
	'quiz_ignoreCoef' => 'Ignorar os coeficientes das preguntas',
	'quiz_shuffle' => 'Barallar as preguntas',
	'quiz_colorRight' => 'Ben',
	'quiz_colorWrong' => 'Mal',
	'quiz_colorNA' => 'Sen resposta',
	'quiz_colorError' => 'Erro de sintaxe',
	'quiz_correction' => 'Enviar',
	'quiz_score' => 'A súa puntuación é $1 / $2',
	'quiz_points' => '$1 | $2 punto(s)',
	'quiz_reset' => 'Limpar',
);

$messages['hr'] = array(
	'quiz_addedPoints' => 'Broj bodova za točan odgovor',
	'quiz_cutoffPoints' => 'Broj negativnih bodova (tj. bodova koji se oduzimaju) za netočan odgovor',
	'quiz_ignoreCoef' => 'Ignoriraj težinske koeficijente pitanja',
	'quiz_shuffle' => 'Promiješaj pitanja',
	'quiz_colorRight' => 'Točno',
	'quiz_colorWrong' => 'Netočno',
	'quiz_colorNA' => 'Neodgovoreno',
	'quiz_colorError' => 'Sintaksna greška',
	'quiz_correction' => 'Ocijeni kviz',
	'quiz_score' => 'Vaš rezultat je $1 / $2',
	'quiz_points' => '$1 | $2 {{PLURAL:$1|bod|boda|bodova}}',
	'quiz_reset' => 'Poništi kviz',
);

$messages['hsb'] = array(
	'quiz_addedPoints' => 'Plusdypki za prawu wotmołwu',
	'quiz_cutoffPoints' => 'Minusdypki za wopačnu wotmołwu',
	'quiz_ignoreCoef' => 'Prašenske koeficienty ignorować',
	'quiz_shuffle' => 'Prašenja měšeć',
	'quiz_colorRight' => 'Prawje',
	'quiz_colorWrong' => 'Wopak',
	'quiz_colorNA' => 'Žana wotmołwa',
	'quiz_colorError' => 'Syntaksowy zmylk',
	'quiz_correction' => 'Korektura',
	'quiz_score' => 'Twój hrajny staw je: $1 / $2',
	'quiz_points' => '$1 | $2 dypkow',
	'quiz_reset' => 'Znowastartowanje',
);

/** Hungarian (Magyar)
 * @author Bdanee
 * @author KossuthRad
 */
$messages['hu'] = array(
	'quiz_addedPoints'  => 'Helyes válasz esetén adott pont',
	'quiz_cutoffPoints' => 'Hibás válasz esetén levont pont',
	'quiz_ignoreCoef'   => 'Ne vegye figyelembe a kérdések együtthatóit',
	'quiz_shuffle'      => 'Kérdések összekeverése',
	'quiz_colorRight'   => 'Jó',
	'quiz_colorWrong'   => 'Rossz',
	'quiz_colorNA'      => 'Nem válaszoltál',
	'quiz_colorError'   => 'Szintaktikai hiba',
	'quiz_correction'   => 'Elküldés',
	'quiz_score'        => 'A pontszámod: $1 / $2',
	'quiz_points'       => '$1 | $2 pont',
	'quiz_reset'        => 'Újraindít',
);

$messages['id'] = array(
	'quiz_addedPoints'	=> "Penambahan angka untuk jawaban yang benar",
	'quiz_cutoffPoints'	=> "Pengurangan angka untuk jawaban yang salah",
	'quiz_ignoreCoef'	=> "Abaikan koefisien pertanyaan",
	'quiz_shuffle'		=> "Mengacak pertanyaan",
	'quiz_colorRight'	=> "Benar",
	'quiz_colorWrong'	=> "Salah",
	'quiz_colorNA'		=> "Tak dijawab",
	'quiz_colorError'	=> "Kesalahan sintaks",
	'quiz_correction'	=> "Koreksi",
	'quiz_score'		=> "Skor Anda adalah $1 / $2",
	'quiz_points'		=> "$1 | $2 poin",
	'quiz_reset'		=> "Reset"
);

$messages['is'] = array(
	'quiz_addedPoints' => 'Stig fyrir rétt svar',
	'quiz_cutoffPoints' => 'Stig dregin frá fyrir rangt svar',
	'quiz_shuffle' => 'Stokka svörin',
	'quiz_colorRight' => 'Rétt',
	'quiz_colorWrong' => 'Röng',
);

$messages['it'] = array(
	'quiz_addedPoints'	=> "Punti aggiunti per ogni risposta corretta",
	'quiz_cutoffPoints'		=> "Punti sottratti per ogni risposta errata",
	'quiz_ignoreCoef'		=> "Ignora i coefficienti di domanda",
	'quiz_shuffle'			=> "Mescola le domande",
	'quiz_colorRight'		=> "Giusto",
	'quiz_colorWrong'		=> "Sbagliato",
	'quiz_colorNA'			=> "Nessuna risposta",
	'quiz_colorError'		=> "Errore di sintassi",
	'quiz_correction'		=> "Correggi",
	'quiz_score'			=> "Il tuo punteggio è $1 / $2",
	'quiz_points'			=> "$1 | $2 punti",
	'quiz_reset'			=> "Reset"
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'quiz_addedPoints'  => 'Punkt(en) derbäi fir eng richteg Äntwert',
	'quiz_cutoffPoints' => 'Punkt(en) ofgezunn fir eng falsch Äntwert',
	'quiz_ignoreCoef'   => 'Koeffizient vun der Fro ignoréieren',
	'quiz_shuffle'      => 'Froe meschen',
	'quiz_colorRight'   => 'Richteg',
	'quiz_colorWrong'   => 'Falsch',
	'quiz_colorNA'      => 'Net beäntwert',
	'quiz_colorError'   => 'Syntaxfeeler',
	'quiz_correction'   => 'Verbesserung',
	'quiz_score'        => 'Punkten: $1 / $2',
	'quiz_points'       => '$1 | $2 Punkten',
	'quiz_reset'        => 'Zrécksetzen',
);

/** Low German (Plattdüütsch)
 * @author Slomox
 */
$messages['nds'] = array(
	'quiz_colorRight' => 'Stimmt',
	'quiz_colorWrong' => 'Verkehrt',
);

/** Dutch (Nederlands)
 * @author Siebrand
 * @author SPQRobin
 */
$messages['nl'] = array(
	'quiz_addedPoints'  => 'Punt(en) toegevoegd voor een goed antwoord',
	'quiz_cutoffPoints' => 'Punt(en) afgetrokken voor een fout antwoord',
	'quiz_ignoreCoef'   => 'De coëfficienten van de vragen negeren',
	'quiz_shuffle'      => 'De vragen in willekeurige volgorde',
	'quiz_colorRight'   => 'Goed',
	'quiz_colorWrong'   => 'Fout',
	'quiz_colorNA'      => 'Niet beantwoord',
	'quiz_colorError'   => 'Algemene fout',
	'quiz_correction'   => 'Verbetering',
	'quiz_score'        => 'Uw score is $1 / $2',
	'quiz_points'       => '$1 | $2 punt(en)',
	'quiz_reset'        => 'Opnieuw',
);

$messages['no'] = array(
	'quiz_addedPoints' => 'Plusspoeng for korrekt svar',
	'quiz_cutoffPoints' => 'Minuspoeng for galt svar',
	'quiz_ignoreCoef' => 'Ignorer spørsmålets verdier',
	'quiz_shuffle' => 'Stokk spørsmålene',
	'quiz_colorRight' => 'Riktig',
	'quiz_colorWrong' => 'Galt',
	'quiz_colorNA' => 'Ikke besvart',
	'quiz_colorError' => 'Syntaksfeil',
	'quiz_correction' => 'Svar',
	'quiz_score' => 'Din poengsum er $1 av $2',
	'quiz_points' => '$1 | $2 poeng',
	'quiz_reset' => 'Resett',
);

$messages['oc'] = array(
	'quiz_addedPoints' => 'Punt(s) ajustat(s) per una responsa justa',
	'quiz_cutoffPoints' => 'Punt(s) levat(s) per una responsa erronèa',
	'quiz_ignoreCoef' => 'Ignorar los coeficients de las questions',
	'quiz_shuffle' => 'Mesclar las questions',
	'quiz_colorRight' => 'Just',
	'quiz_colorWrong' => 'Fals',
	'quiz_colorNA' => 'Pas respondut',
	'quiz_colorError' => 'Error de sintaxi',
	'quiz_correction' => 'Correccion',
	'quiz_score' => 'Vòstra marca es $1 / $2',
	'quiz_points' => '$1 | $2 punt(s)',
	'quiz_reset' => 'Reïnicializar',
);

$messages['pl'] = array(
	'quiz_addedPoints' => 'Punkty dodawane za właściwą odpowiedź',
	'quiz_cutoffPoints' => 'Punkty odejmowane za niewłaściwą odpowiedź',
	'quiz_ignoreCoef' => 'Ignoruj punktację pytań',
	'quiz_shuffle' => 'Losuj kolejność pytań',
	'quiz_colorRight' => 'Właściwa',
	'quiz_colorWrong' => 'Niewłaściwa',
	'quiz_colorNA' => 'Brak odpowiedzi',
	'quiz_colorError' => 'Błąd składni',
	'quiz_correction' => 'Wyślij',
	'quiz_score' => 'Twoje punty to $1 / $2',
	'quiz_points' => '$1 | $2 punktów',
	'quiz_reset' => 'Wyzeruj',
);

$messages['pms'] = array(
	'quiz_addedPoints' => 'Pont da dé për n\'aspòsta giusta',
	'quiz_cutoffPoints' => 'Pont da gavé për n\'aspòsta nen giusta',
	'quiz_ignoreCoef' => 'Pa dovré ij coeficent dle domande',
	'quiz_shuffle' => 'Mës-cé le domande',
	'quiz_colorRight' => 'Giust',
	'quiz_colorWrong' => 'Pa giust',
	'quiz_colorNA' => 'Anco\' nen d\'arspòsta',
	'quiz_colorError' => 'Eror ëd sintassi',
	'quiz_correction' => 'Manda',
	'quiz_score' => 'A l\'ha pijait $1 pont ansima a $2',
	'quiz_points' => '$1 | $2 pont',
	'quiz_reset' => 'Aseré',
);

$messages['pt'] = array(
	'quiz_addedPoints' => 'Ponto(s) adicionados por cada resposta certa',
	'quiz_cutoffPoints' => 'Ponto(s) subtraídos por cada resposta errada',
	'quiz_ignoreCoef' => 'Ignorar os coeficientes das questões',
	'quiz_shuffle' => 'Baralhar as questões',
	'quiz_colorRight' => 'Correctas',
	'quiz_colorWrong' => 'Erradas',
	'quiz_colorNA' => 'Não respondidas',
	'quiz_colorError' => 'Erro de sintaxe',
	'quiz_correction' => 'Enviar',
	'quiz_score' => 'Pontuação actual: $1 certas em $2',
	'quiz_points' => '$1 | $2 ponto(s)',
	'quiz_reset' => 'Repor a zero',
);

/** Message documentation (Message documentation)
 * @author .:Ajvol:.
 */
$messages['qqq'] = array(
	'quiz_shuffle' => 'Button title. See http://en.wikiversity.org/wiki/Help:Quiz',
);

/** Russian (Русский)
 * @author .:Ajvol:.
 */
$messages['ru'] = array(
	'quiz_addedPoints'  => 'очко(ов) добавлено за правильный ответ',
	'quiz_cutoffPoints' => 'очко(ов) вычтено за неправильный ответ',
	'quiz_ignoreCoef'   => 'Пренебрегать коэффициентами вопросов',
	'quiz_shuffle'      => 'Перемешать вопросы',
	'quiz_colorRight'   => 'Правильно',
	'quiz_colorWrong'   => 'Ошибка',
	'quiz_colorNA'      => 'Нет ответа',
	'quiz_colorError'   => 'Синтаксическая ошибка',
	'quiz_correction'   => 'Отправить',
	'quiz_score'        => 'Вы набрали $1 очков из $2',
	'quiz_points'       => '$1 | $2 очко(ов)',
	'quiz_reset'        => 'Сбросить',
);

/* Slovenčina*/
$messages['sk'] = array(
	'quiz_addedPoints' => 'Bod(y) pričítané za správnu odpoveď',
	'quiz_cutoffPoints' => 'Bod(y) odčítané za nesprávnu odpoveď',
	'quiz_ignoreCoef' => 'Ignorovať koeficienty otázok',
	'quiz_shuffle' => 'Náhodný výber otázok',
	'quiz_colorRight' => 'Správne',
	'quiz_colorWrong' => 'Nesprávne',
	'quiz_colorNA' => 'Nezodpovedané',
	'quiz_colorError' => 'Syntaktická chyba',
	'quiz_correction' => 'Oprava',
	'quiz_score' => 'Vaše skóre je $1 / $2',
	'quiz_points' => '$1 | $2 bodov',
	'quiz_reset' => 'Reset',#identical but defined
);

/** Albanian (Shqip)
 * @author Ergon
 */
$messages['sq'] = array(
	'quiz_colorRight' => 'Korrekt',
	'quiz_colorWrong' => 'Gabim',
);

/** ћирилица (ћирилица)
 * @author Sasa Stefanovic
 */
$messages['sr-ec'] = array(
	'quiz_addedPoints'  => 'Поени додати за тачан одговор',
	'quiz_cutoffPoints' => 'Поени одузети због погрешног одговора',
	'quiz_ignoreCoef'   => 'Игнориши коефицијенте питања',
	'quiz_shuffle'      => 'Измешај питања',
	'quiz_colorRight'   => 'Тачно',
	'quiz_colorWrong'   => 'Погрешно',
	'quiz_colorNA'      => 'Није одговорено',
	'quiz_colorError'   => 'Грешка у синтакси',
	'quiz_correction'   => 'Постави',
	'quiz_score'        => 'Ваш резултат је $1 / $2',
	'quiz_points'       => '$1 | $2 поен(а)',
	'quiz_reset'        => 'Ресетуј',
);

/** Seeltersk (Seeltersk)
 * @author Pyt
 */
$messages['stq'] = array(
	'quiz_shuffle'    => 'Froagen miskje',
	'quiz_correction' => 'Korrektuur',
	'quiz_score'      => 'Punkte: $1 / $2',
	'quiz_points'     => '$1 | $2 Punkte',
	'quiz_reset'      => 'Näistart',
);

/** Swedish (Svenska)
 * @author Lejonel
 */
$messages['sv'] = array(
	'quiz_addedPoints'  => 'Poäng för rätt svar',
	'quiz_cutoffPoints' => 'Poängavdrag för fel svar',
	'quiz_ignoreCoef'   => 'Använd inte frågornas koefficienter',
	'quiz_shuffle'      => 'Blanda om frågorna',
	'quiz_colorRight'   => 'Rätt',
	'quiz_colorWrong'   => 'Fel',
	'quiz_colorNA'      => 'Besvarades ej',
	'quiz_colorError'   => 'Syntaxfel',
	'quiz_correction'   => 'Skicka',
	'quiz_score'        => 'Din poäng är $1 av $2',
	'quiz_points'       => '$1: $2 poäng',
	'quiz_reset'        => 'Återställ',
);
/** Volapük (Volapük)
 * @author Malafaya
 */
$messages['vo'] = array(
	'quiz_colorRight' => 'Verätik',
	'quiz_colorWrong' => 'Neverätik',
);

$messages['yue'] = array(
	'quiz_addedPoints'	=> "答啱咗加上嘅分數",
	'quiz_cutoffPoints'	=> "答錯咗減去嘅分數",
	'quiz_ignoreCoef'	=> "略過問題嘅系數",
	'quiz_shuffle'		=> "撈亂問題",
	'quiz_colorRight'	=> "啱",
	'quiz_colorWrong'	=> "錯",
	'quiz_colorNA'		=> "未答",
	'quiz_colorError'	=> "語法錯咗",
	'quiz_correction'	=> "遞交",
	'quiz_score'		=> "你嘅分數係 $1 / $2",
	'quiz_points'		=> "$1 | $2 分",
	'quiz_reset'		=> "重設"
);

$messages['zh-hans'] = array(
	'quiz_addedPoints'	=> "答对加上的分数",
	'quiz_cutoffPoints'	=> "答错减去的分数",
	'quiz_ignoreCoef'	=> "略过问题的系数",
	'quiz_shuffle'		=> "随机问题",
	'quiz_colorRight'	=> "对",
	'quiz_colorWrong'	=> "错",
	'quiz_colorNA'		=> "未回答",
	'quiz_colorError'	=> "语法错误",
	'quiz_correction'	=> "递交",
	'quiz_score'		=> "您的分数是 $1 / $2",
	'quiz_points'		=> "$1 | $2 分",
	'quiz_reset'		=> "重设"
);

$messages['zh-hant'] = array(
	'quiz_addedPoints'	=> "答對加上的分數",
	'quiz_cutoffPoints'	=> "答錯減去的分數",
	'quiz_ignoreCoef'	=> "略過問題的系數",
	'quiz_shuffle'		=> "隨機問題",
	'quiz_colorRight'	=> "對",
	'quiz_colorWrong'	=> "錯",
	'quiz_colorNA'		=> "未回答",
	'quiz_colorError'	=> "語法錯誤",
	'quiz_correction'	=> "遞交",
	'quiz_score'		=> "您的分數是 $1 / $2",
	'quiz_points'		=> "$1 | $2 分",
	'quiz_reset'		=> "重設"
);

$messages['zh'] = $messages['zh-hans'];
$messages['zh-cn'] = $messages['zh-hans'];
$messages['zh-hk'] = $messages['zh-hant'];
$messages['zh-sg'] = $messages['zh-hans'];
$messages['zh-tw'] = $messages['zh-hant'];
$messages['zh-yue'] = $messages['yue'];
