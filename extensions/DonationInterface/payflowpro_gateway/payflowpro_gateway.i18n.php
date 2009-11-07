<?php
/**
 * Internationalization file for the Donation Interface - PayflowPro - extension
 *
 * @file
 * @ingroup Extensions
 */

$messages = array();

/** English */
$messages['en'] = array(
	'payflowprogateway' => 'Support Wikimedia',
	'payflowpro_gateway-desc' => 'PayPal Payflow Pro credit card processing',
	'payflowpro_gateway-accessible' => 'This page is only accessible from the donation page.',
	'payflowpro_gateway-form-message' => 'Contribute with your credit card.
There are <a href="http://wikimediafoundation.org/wiki/Donate/WaysToGive/en">other ways to give, including PayPal, check, or mail</a>.',
	'payflowpro_gateway-form-message-2' => 'To change amount or currency, return to <a href="/index.php?title=Donate">the donation page</a>',
	'payflowpro_gateway-donor-legend' => 'Donor information',
	'payflowpro_gateway-card-legend' => 'Credit card information',
	'payflowpro_gateway-amount-legend' => 'Donation amount:',
	'payflowpro_gateway-donor-amount' => 'Amount:',
	'payflowpro_gateway-donor-email' => 'E-mail address:',
	'payflowpro_gateway-donor-fname' => 'First name:',
	'payflowpro_gateway-donor-mname' => 'Middle name:',
	'payflowpro_gateway-donor-lname' => 'Last name:',
	'payflowpro_gateway-donor-name' => 'Name:',
	'payflowpro_gateway-donor-street' => 'Street:',
	'payflowpro_gateway-donor-city' => 'City:',
	'payflowpro_gateway-donor-state' => 'State:',
	'payflowpro_gateway-donor-postal' => 'Postal code:',
	'payflowpro_gateway-donor-country' => 'Country/Region:',
	'payflowpro_gateway-donor-address'=> 'Address:',
	'payflowpro_gateway-donor-card' => 'Credit card:',
	'payflowpro_gateway-donor-card-num' => 'Card number:',
	'payflowpro_gateway-donor-expiration' => 'Expiration date:',
	'payflowpro_gateway-donor-security' => 'Security code:',
	'payflowpro_gateway-donor-submit' => 'Donate',
	'payflowpro_gateway-donor-currency-msg' => 'This donation is being made in $1',
	'payflowpro_gateway-error-msg' => 'Please enter your $1',
	'payflowpro_gateway-error-msg-email' => '**Please enter a valid e-mail address**',
	'payflowpro_gateway-error-msg-amex' => '**Please enter a correct card number for American Express.**',
	'payflowpro_gateway-error-msg-mc' => '**Please enter a correct card number for MasterCard.**',
	'payflowpro_gateway-error-msg-visa' => '**Please enter a correct card number for Visa.**',
	'payflowpro_gateway-response-0' => 'Your transaction has been approved.
Thank you for your donation!',
	'payflowpro_gateway-response-126' => 'Your transaction is pending approval.',
	'payflowpro_gateway-response-12' => 'Please contact your credit card company for further information.',
	'payflowpro_gateway-response-13' => 'Your transaction requires voice authorization.
Please contact us to continue your transaction.', // This will not apply to Wikimedia accounts
	'payflowpro_gateway-response-114' => 'Please contact your credit card company for further information.',
	'payflowpro_gateway-response-23' => 'Your credit card number or expiration date is incorrect.',
	'payflowpro_gateway-response-4' => 'Invalid amount.',
	'payflowpro_gateway-response-24' => 'Your credit card number or expiration date is incorrect.',
	'payflowpro_gateway-response-112' => 'Your address or CVV number (security code) is incorrect.',
	'payflowpro_gateway-response-125' => 'Your transaction has been declined by Fraud Prevention Services.',
	'payflowpro_gateway-response-default' => 'There was an error processing your transaction.
Please try again later.',
	'php-response-declined' => 'Your transaction has been declined.',
	'payflowpro_gateway-post-transaction' => 'Transaction details',
	'payflowpro_gateway-submit-button' => 'Donate',
);

/** Message documentation (Message documentation)
 * @author EugeneZelenko
 * @author Fryed-peach
 * @author Siebrand
 */
$messages['qqq'] = array(
	'payflowpro_gateway-desc' => '{{desc}}',
	'payflowpro_gateway-donor-amount' => '{{Identical|Amount}}',
	'payflowpro_gateway-donor-email' => '{{Identical|E-mail address}}',
	'payflowpro_gateway-donor-name' => '{{Identical|Name}}',
	'payflowpro_gateway-donor-street' => '{{Identical|Street}}',
	'payflowpro_gateway-donor-city' => '{{Identical|City}}',
	'payflowpro_gateway-donor-state' => '{{Identical|State}}',
	'payflowpro_gateway-donor-address' => '{{Identical|Address}}',
	'payflowpro_gateway-donor-submit' => '{{Identical|Donate}}',
	'payflowpro_gateway-donor-currency-msg' => '* $1 is 3 letter currency code',
	'payflowpro_gateway-error-msg' => '{{doc-important|If grammatical issues in your language prevent you from translating this literally, translate the following: "The following field is required: $1".}}',
	'payflowpro_gateway-submit-button' => '{{Identical|Donate}}',
);

/** Afrikaans (Afrikaans)
 * @author Naudefj
 */
$messages['af'] = array(
	'payflowprogateway' => 'Ondersteun Wikipedia',
	'payflowpro_gateway-desc' => 'Kredietkaart-verwerking via PayPal se PayFlow Pro',
	'payflowpro_gateway-accessible' => 'Hierdie bladsy is slegs vanaf die donasie-bladsy toeganklik.',
	'payflowpro_gateway-form-message' => 'Dra by d.m.v. u kredietkaart.
Daar is <a href="http://wikimediafoundation.org/wiki/Donate/WaysToGive/en">andere maniere om te skenk - onder andere: PayPal, tjek of pos</a>.',
	'payflowpro_gateway-form-message-2' => 'Keer terug na die <a href="/index.php?title=Donate">skenkingsblad</a> om die bedrag of geldeenheid te wysig.',
	'payflowpro_gateway-donor-legend' => 'Skenker-inligting',
	'payflowpro_gateway-card-legend' => 'Kredietkaart-inligting',
	'payflowpro_gateway-amount-legend' => 'Bedrag:',
	'payflowpro_gateway-donor-amount' => 'Bedrag:',
	'payflowpro_gateway-donor-email' => 'E-posadres:',
	'payflowpro_gateway-donor-fname' => 'Voornaam:',
	'payflowpro_gateway-donor-mname' => 'Tussenvoegsel:',
	'payflowpro_gateway-donor-lname' => 'Van:',
	'payflowpro_gateway-donor-name' => 'Naam:',
	'payflowpro_gateway-donor-street' => 'Straat:',
	'payflowpro_gateway-donor-city' => 'Stad:',
	'payflowpro_gateway-donor-state' => 'Staat:',
	'payflowpro_gateway-donor-postal' => 'Poskode:',
	'payflowpro_gateway-donor-country' => 'Land:',
	'payflowpro_gateway-donor-address' => 'Adres:',
	'payflowpro_gateway-donor-card' => 'Kredietkaart:',
	'payflowpro_gateway-donor-card-num' => 'Kaartnommer:',
	'payflowpro_gateway-donor-expiration' => 'Vervaldatum:',
	'payflowpro_gateway-donor-security' => 'Beveiligingskode:',
	'payflowpro_gateway-donor-submit' => 'Skenk',
	'payflowpro_gateway-donor-currency-msg' => 'Hierdie skenking word gemaak in $1',
	'payflowpro_gateway-error-msg' => 'Voer asseblief u $1 in',
	'payflowpro_gateway-error-msg-email' => "**Voer asseblief 'n geldig e-posadres in**",
	'payflowpro_gateway-error-msg-amex' => "**Voer asseblief 'n geldige kaartnommer vir American Express in.**",
	'payflowpro_gateway-error-msg-mc' => "**Voer asseblief 'n geldige kaartnommer vir Mastercard in.**",
	'payflowpro_gateway-error-msg-visa' => "**Voer asseblief 'n geldige kaartnommer vir Visa in.**",
	'payflowpro_gateway-response-0' => 'U transaksie is goedgekeur.
Baie dankie vir u skenking!',
	'payflowpro_gateway-response-126' => 'U transaksie wag tans vir goedkeuring.',
	'payflowpro_gateway-response-12' => 'Kontak asseblief u kredietkaart-verskaffer vir verdere inligting.',
	'payflowpro_gateway-response-13' => 'U transaksie vereis mondelinge toestemming.
Kontak ons asseblief om voort te gaan met u transaksie.',
	'payflowpro_gateway-response-114' => 'Kontak asseblief u kredietkaart-verskaffer vir verdere inligting.',
	'payflowpro_gateway-response-23' => 'U kredietkaart-nommer of die vervaldatum is verkeerd.',
	'payflowpro_gateway-response-4' => 'Ongeldig bedrag.',
	'payflowpro_gateway-response-24' => 'Die kredietkaart-nommer of vervaldatum is verkeerd.',
	'payflowpro_gateway-response-112' => 'U adres of CVV-nommer (veiligheidskode) is verkeerd.',
	'payflowpro_gateway-response-125' => 'U transaksie is deur Bedrog-voorkomingsdienste afgekeur.',
	'payflowpro_gateway-response-default' => "Daar was 'n fout met die verwerking van u transaksie.
Probeer asseblief later weer.",
	'php-response-declined' => 'U transaksie is afgekeur.',
	'payflowpro_gateway-post-transaction' => 'Transaksiebesonderhede',
	'payflowpro_gateway-submit-button' => 'Skenk',
);

/** Arabic (العربية)
 * @author OsamaK
 */
$messages['ar'] = array(
	'payflowprogateway' => 'ادعم ويكيميديا',
	'payflowpro_gateway-desc' => 'معالجة PayPal Payflow Pro لبطاقات الائتمان',
	'payflowpro_gateway-accessible' => 'يمكن الوصول إلى هذه الصفحة فقط من صفحة التبرعات.',
	'payflowpro_gateway-form-message' => 'ساهم ببطاقة ائتمانك.
توجد <a href="http://wikimediafoundation.org/wiki/Donate/WaysToGive/ar">وسائل أخرى للتبرع من بينها PayPal والشيكات والبريد</a>.',
	'payflowpro_gateway-form-message-2' => 'لتغيير المقدار أو العملة، ارجع إلى <a href="/index.php?title=جمع_تبرعات">صفحة التبرعات</a>.',
	'payflowpro_gateway-donor-legend' => 'معلومات المُتبرع',
	'payflowpro_gateway-card-legend' => 'معلومات بطاقة الائتمان',
	'payflowpro_gateway-amount-legend' => 'مقدار التبرع:',
	'payflowpro_gateway-donor-amount' => 'المقدار:',
	'payflowpro_gateway-donor-email' => 'عنوان البريد الإلكتروني:',
	'payflowpro_gateway-donor-fname' => 'الاسم الأول:',
	'payflowpro_gateway-donor-mname' => 'الاسم الأوسط:',
	'payflowpro_gateway-donor-lname' => 'الاسم الأخير:',
	'payflowpro_gateway-donor-name' => 'الاسم:',
	'payflowpro_gateway-donor-street' => 'الشارع:',
	'payflowpro_gateway-donor-city' => 'المدينة:',
	'payflowpro_gateway-donor-state' => 'الولاية:',
	'payflowpro_gateway-donor-postal' => 'الرمز البريدي:',
	'payflowpro_gateway-donor-country' => 'الدولة/المنطقة:',
	'payflowpro_gateway-donor-address' => 'العنوان:',
	'payflowpro_gateway-donor-card' => 'بطاقة الائتمان:',
	'payflowpro_gateway-donor-card-num' => 'رقم البطاقة:',
	'payflowpro_gateway-donor-expiration' => 'تاريخ الإنتهاء:',
	'payflowpro_gateway-donor-security' => 'الرمز الأمني:',
	'payflowpro_gateway-donor-submit' => 'تبرّع',
	'payflowpro_gateway-donor-currency-msg' => 'يتم إجراء هذا التبرع ب$1',
	'payflowpro_gateway-error-msg' => 'من فضلك أدخل $1',
	'payflowpro_gateway-error-msg-email' => '**من فضلك أدخل عنوان بريد إلكتروني صالح**',
	'payflowpro_gateway-error-msg-amex' => '**من فضلك أدخل رقم بطاقة American Express صحيح.**',
	'payflowpro_gateway-error-msg-mc' => '**من فضلك أدخل رقم بطاقة Mastercard صحيح.**',
	'payflowpro_gateway-error-msg-visa' => '**من فضلك أدخل رقم بطاقة Visa صحيح.**',
	'payflowpro_gateway-response-0' => 'تمت الموافقة على تحويلك.
شكرا لك على التبرع!',
	'payflowpro_gateway-response-126' => 'تحويلك ينتظر الموافقة.',
	'payflowpro_gateway-response-12' => 'من فضلك اتصل بشركة بطاقة ائتمانك لمزيد من المعلومات.',
	'payflowpro_gateway-response-13' => 'يتطلب تحويلك الاستيثاق بالصوت.
من فضلك اتصل بنا لتكمل تحويلك.',
	'payflowpro_gateway-response-114' => 'من فضلك اتصل بشركة بطاقة ائتمانك لمزيد من المعلومات.',
	'payflowpro_gateway-response-23' => 'رقم بطاقة ائتمانك أو تاريخ انتهائها غير صحيح.',
	'payflowpro_gateway-response-4' => 'قيمة غير صالحة.',
	'payflowpro_gateway-response-24' => 'رقم بطاقة ائتمانك أو تاريخ انتهائها غير صالح.',
	'payflowpro_gateway-response-112' => 'عنوانك أو رقم CVV (كود الأمان) غير صحيح.',
	'payflowpro_gateway-response-125' => 'ألغت Fraud Prevention Services تحويلك.',
	'payflowpro_gateway-response-default' => 'ثمة خطأ أثناء تنفيذ التحويل.
من فضلك حاول مرة أخرى.',
	'php-response-declined' => 'ألغي تحويلك.',
	'payflowpro_gateway-post-transaction' => 'تفاصيل التحويل',
	'payflowpro_gateway-submit-button' => 'تبرّع',
);

/** Belarusian (Taraškievica orthography) (Беларуская (тарашкевіца))
 * @author EugeneZelenko
 * @author Jim-by
 */
$messages['be-tarask'] = array(
	'payflowprogateway' => 'Падтрымаць фундацыю «Вікімэдыя»',
	'payflowpro_gateway-desc' => 'Апрацоўка крэдытных картак PayPal Payflow Pro',
	'payflowpro_gateway-accessible' => 'Гэта старонка даступна толькі са старонкі ахвяраваньняў.',
	'payflowpro_gateway-form-message' => 'Ахвяруйце з Вашай крэдытнай карткі.
Існуюць <a href="http://wikimediafoundation.org/wiki/Donate/WaysToGive/en">іншыя спосабы зрабіць ахвяраваньне, уключаючы PayPal, чэк ці паштовы перавод</a>.',
	'payflowpro_gateway-form-message-2' => 'Каб зьмяніць суму ці валюту, вярніцеся на <a href="/index.php?title=Donate">старонку ахвяраваньняў</a>',
	'payflowpro_gateway-donor-legend' => 'Зьвесткі пра ахвяравальніка',
	'payflowpro_gateway-card-legend' => 'Інфармацыя пра крэдытную картку',
	'payflowpro_gateway-amount-legend' => 'Сума ахвяраваньня:',
	'payflowpro_gateway-donor-amount' => 'Сума:',
	'payflowpro_gateway-donor-email' => 'Адрас электроннай пошты:',
	'payflowpro_gateway-donor-fname' => 'Імя:',
	'payflowpro_gateway-donor-mname' => 'Імя па бацьку:',
	'payflowpro_gateway-donor-lname' => 'Прозьвішча:',
	'payflowpro_gateway-donor-name' => 'Імя:',
	'payflowpro_gateway-donor-street' => 'Вуліца:',
	'payflowpro_gateway-donor-city' => 'Горад:',
	'payflowpro_gateway-donor-state' => 'Штат:',
	'payflowpro_gateway-donor-postal' => 'Паштовы індэкс:',
	'payflowpro_gateway-donor-country' => 'Краіна/Рэгіён:',
	'payflowpro_gateway-donor-address' => 'Адрас:',
	'payflowpro_gateway-donor-card' => 'Крэдытная картка:',
	'payflowpro_gateway-donor-card-num' => 'Нумар карткі:',
	'payflowpro_gateway-donor-expiration' => 'Дата сканчэньня дзеяньня:',
	'payflowpro_gateway-donor-security' => 'Код бясьпекі:',
	'payflowpro_gateway-donor-submit' => 'Ахвяраваць',
	'payflowpro_gateway-donor-currency-msg' => 'Гэтае ахвяраваньне робіцца ў $1',
	'payflowpro_gateway-error-msg' => 'Калі ласка, увядзіце $1',
	'payflowpro_gateway-error-msg-email' => '**Калі ласка, увядзіце слушны адрас электроннай пошты**',
	'payflowpro_gateway-error-msg-amex' => '**Калі ласка, увядзіце слушны нумар карткі American Express.**',
	'payflowpro_gateway-error-msg-mc' => '**Калі ласка, увядзіце слушны код карткі MasterCard.**',
	'payflowpro_gateway-error-msg-visa' => '**Калі ласка, увядзіце слушны код карткі Visa.**',
	'payflowpro_gateway-response-0' => 'Ваша транзакцыя была зацьверджаная.
Дзякуй за Вашае ахвяраваньне!',
	'payflowpro_gateway-response-126' => 'Ваша транзакцыя чакае пацьверджаньня.',
	'payflowpro_gateway-response-12' => 'Калі ласка, зьвяжыцеся з Вашай крэдытнай кампаніяй для дадатковай інфармацыі.',
	'payflowpro_gateway-response-13' => 'Вашая транзакцыя патрабуе галасавой аўтарызацыі.
Калі ласка, скантактуйцеся з намі каб працягнуць транзакцыю.',
	'payflowpro_gateway-response-114' => 'Калі ласка, скантактуйцеся з Вашай крэдытнай кампаніяй для дадатковай інфармацыі.',
	'payflowpro_gateway-response-23' => 'Нумар Вашай крэдытнай карткі альбо тэрмін сканчэньня яе дзеяньня зьяўляецца няслушным.',
	'payflowpro_gateway-response-4' => 'Няслушная сума.',
	'payflowpro_gateway-response-24' => 'Нумар Вашай крэдытнай карткі альбо тэрмін сканчэньня яе дзеяньня зьяўляецца няслушным.',
	'payflowpro_gateway-response-112' => 'Ваш адрас альбо нумар код бясьпекі зьяўляецца няслушным.',
	'payflowpro_gateway-response-125' => 'Ваша транзакцыя была адмененая Службай прадухіленьня махлярстваў.',
	'payflowpro_gateway-response-default' => 'Пад час апрацоўкі Вашай транзакцыі ўзьнікла памылка.
Калі ласка, паспрабуйце ізноў пазьней.',
	'php-response-declined' => 'Ваша транзакцыя была адменена.',
	'payflowpro_gateway-post-transaction' => 'Падрабязнасьці пра транзакцыю',
	'payflowpro_gateway-submit-button' => 'Ахвяраваць',
);

/** Breton (Brezhoneg)
 * @author Fohanno
 */
$messages['br'] = array(
	'payflowpro_gateway-donor-amount' => 'Sammad :',
	'payflowpro_gateway-donor-email' => "Chomlec'h postel :",
	'payflowpro_gateway-donor-fname' => 'Anv bihan :',
	'payflowpro_gateway-donor-lname' => 'Anv :',
	'payflowpro_gateway-donor-name' => 'Anv :',
	'payflowpro_gateway-donor-street' => 'Straed :',
	'payflowpro_gateway-donor-city' => 'Kêr :',
	'payflowpro_gateway-donor-state' => 'Stad :',
	'payflowpro_gateway-donor-postal' => 'Kod post :',
	'payflowpro_gateway-donor-country' => 'Bro/Rannvro :',
	'payflowpro_gateway-donor-address' => "Chomlec'h :",
	'payflowpro_gateway-response-4' => 'Sammad direizh.',
);

/** German (Deutsch)
 * @author Tbleher
 * @author Umherirrender
 */
$messages['de'] = array(
	'payflowprogateway' => 'Wikimedia unterstützen',
	'payflowpro_gateway-desc' => 'PayPal-Payflow-Pro-Kreditkartenabwicklung',
	'payflowpro_gateway-accessible' => 'Diese Seiten kann nur über die Spendenseite erreicht werden.',
	'payflowpro_gateway-form-message' => 'Spenden Sie mit Ihrer Kreditkarte.
Es gibt auch <a href="http://wikimediafoundation.org/wiki/Donate/WaysToGive/de">andere Wege zum Spenden, inklusive PayPal, Scheck oder Überweisung</a>.',
	'payflowpro_gateway-form-message-2' => 'Um den Betrag oder die Währung zu ändern, kehren Sie zur <a href="/index.php?title=Donate">Spendenseite</a> zurück.',
	'payflowpro_gateway-donor-legend' => 'Spender-Information',
	'payflowpro_gateway-card-legend' => 'Kreditkarten-Information',
	'payflowpro_gateway-amount-legend' => 'Spendenbetrag:',
	'payflowpro_gateway-donor-amount' => 'Betrag:',
	'payflowpro_gateway-donor-email' => 'E-Mail-Adresse:',
	'payflowpro_gateway-donor-fname' => 'Vorname:',
	'payflowpro_gateway-donor-mname' => '2. Vorname:',
	'payflowpro_gateway-donor-lname' => 'Nachname:',
	'payflowpro_gateway-donor-name' => 'Name:',
	'payflowpro_gateway-donor-street' => 'Straße:',
	'payflowpro_gateway-donor-city' => 'Stadt:',
	'payflowpro_gateway-donor-state' => 'Bundesland:',
	'payflowpro_gateway-donor-postal' => 'Postleitzahl:',
	'payflowpro_gateway-donor-country' => 'Land:',
	'payflowpro_gateway-donor-address' => 'Anschrift:',
	'payflowpro_gateway-donor-card' => 'Kreditkarte:',
	'payflowpro_gateway-donor-card-num' => 'Kreditkartennummer:',
	'payflowpro_gateway-donor-expiration' => 'gültig bis:',
	'payflowpro_gateway-donor-security' => 'Sicherheitscode:',
	'payflowpro_gateway-donor-submit' => 'Spenden',
	'payflowpro_gateway-donor-currency-msg' => 'Die Spende wird in $1 vorgenommen',
	'payflowpro_gateway-error-msg' => 'Das folgende Feld muss ausgefüllt sein: $1',
	'payflowpro_gateway-error-msg-email' => '** Bitte geben Sie eine gültige E-Mail-Adresse ein **',
	'payflowpro_gateway-error-msg-amex' => '** Bitte geben Sie eine korrekte American-Express-Kartennummer ein **',
	'payflowpro_gateway-error-msg-mc' => '** Bitte geben Sie eine korrekte Mastercard-Kartennummer ein **',
	'payflowpro_gateway-error-msg-visa' => '** Bitte geben Sie eine korrekte Visa-Kartennummer ein **',
	'payflowpro_gateway-response-0' => 'Ihre Transaktion wurde durchgeführt.
Vielen Dank für Ihre Spende.',
	'payflowpro_gateway-response-126' => 'Für Ihre Transaktion wird auf eine Freigabe gewartet.',
	'payflowpro_gateway-response-12' => 'Bitte nehmen Sie mit Ihrer kartenausgebenden Kreditinstitut Kontakt auf.',
	'payflowpro_gateway-response-13' => 'Ihre Transaktion benötigt eine manuelle Bearbeitung.
Bitte nehmen Sie mit uns Kontakt auf, um Ihre Transaktion abzuschließen.',
	'payflowpro_gateway-response-114' => 'Bitte nehmen Sie mit ihrem kartenausgebenden Kreditinstitut Kontakt auf.',
	'payflowpro_gateway-response-23' => 'Ihre Kreditkartennummer oder das Gültigkeitsdatum ist falsch.',
	'payflowpro_gateway-response-4' => 'Ungültiger Betrag.',
	'payflowpro_gateway-response-24' => 'Ihre Kreditkartennummer oder das Gültigkeitsdatum ist falsch.',
	'payflowpro_gateway-response-112' => 'Ihre Anschrift oder der Sicherheitscode (CVV) ist falsch.',
	'payflowpro_gateway-response-125' => 'Ihre Transaktion wurde durch den Betrugs-Vorbeuge-Service abgelehnt.',
	'payflowpro_gateway-response-default' => 'Es ist ein Verarbeitungsfehler aufgetreten.
Bitte versuchen Sie es später noch einmal.',
	'php-response-declined' => 'Ihre Transaktion wurde abgewiesen.',
	'payflowpro_gateway-post-transaction' => 'Transaktions-Details',
	'payflowpro_gateway-submit-button' => 'Spenden',
);

/** Lower Sorbian (Dolnoserbski)
 * @author Michawiki
 */
$messages['dsb'] = array(
	'payflowprogateway' => 'Wikimediju pódprěś',
	'payflowpro_gateway-desc' => 'Pśeźěłowanje kreditoweje kórty PayPal Payflow Pro',
	'payflowpro_gateway-accessible' => 'Toś ten bok jo jano wót bok darow pśistupny.',
	'payflowpro_gateway-form-message' => 'Pśinosuj ze swójeju kreditoweju kórtu.
Su <a href="http://wikimediafoundation.org/wiki/Donate/WaysToGive/en">druge pósćiwańske móžnosći, na pś. PayPal, šek abo post</a>.',
	'payflowpro_gateway-form-message-2' => 'Aby změnił sumu abo pjenjeze, wroś se k <a href="/index.php?title=Donate">bokoju darow</a>',
	'payflowpro_gateway-donor-legend' => 'Informacije wó darje',
	'payflowpro_gateway-card-legend' => 'Informacije wó kreditowej kórśe',
	'payflowpro_gateway-amount-legend' => 'Pósćiwańska suma:',
	'payflowpro_gateway-donor-amount' => 'Suma:',
	'payflowpro_gateway-donor-email' => 'E-mailowa adresa:',
	'payflowpro_gateway-donor-fname' => 'Pśedmě:',
	'payflowpro_gateway-donor-mname' => 'Druge mě:',
	'payflowpro_gateway-donor-lname' => 'Familijowe mě:',
	'payflowpro_gateway-donor-name' => 'Mě:',
	'payflowpro_gateway-donor-street' => 'Droga:',
	'payflowpro_gateway-donor-city' => 'Město:',
	'payflowpro_gateway-donor-state' => 'Stat:',
	'payflowpro_gateway-donor-postal' => 'Postowa licba:',
	'payflowpro_gateway-donor-country' => 'Kraj/Region:',
	'payflowpro_gateway-donor-address' => 'Adresa:',
	'payflowpro_gateway-donor-card' => 'Kreditowa kórta:',
	'payflowpro_gateway-donor-card-num' => 'Kórtowy numer:',
	'payflowpro_gateway-donor-expiration' => 'Datum spadnjenja:',
	'payflowpro_gateway-donor-security' => 'Wěstotny kod:',
	'payflowpro_gateway-donor-submit' => 'Pósćiś',
	'payflowpro_gateway-donor-currency-msg' => 'Toś ten dar jo se cynił w $1',
	'payflowpro_gateway-error-msg' => 'Pšosym wupołni pólo: $1',
	'payflowpro_gateway-error-msg-email' => ' **Pšosym zapódaj płaśiwu e-mailowu adresu**',
	'payflowpro_gateway-error-msg-amex' => ' **Pšosym zapódaj korektne kórtowe cysło za American Express.**',
	'payflowpro_gateway-error-msg-mc' => ' **Pšosym zapódaj korektne kórtowe cysło za Mastercard.**',
	'payflowpro_gateway-error-msg-visa' => ' **Pšosym zapódaj korektne kórtowe cysło za Visa.**',
	'payflowpro_gateway-response-0' => 'Twója transakcija jo se pśizwóliła.
Źěkujomy s za twój dar!',
	'payflowpro_gateway-response-126' => 'Twója transakcija caka na pśizwólenje.',
	'payflowpro_gateway-response-12' => 'Pšosym staj se ze swójim pśedewześim kreditoweje kórty za dalšne informacije do zwiska.',
	'payflowpro_gateway-response-13' => 'Twója transakcija pomina se głosowu awtorizaciju.
Pšosym staj se z nami do zwiska, aby z transakciju pókšacował.',
	'payflowpro_gateway-response-114' => 'Pšosym staj se ze swójim pśedewześim kreditoweje kórty za dalšne informacije do zwiska.',
	'payflowpro_gateway-response-23' => 'Cysło twójeje kreditoweje kórty abo datum spadnjenja jo wopak.',
	'payflowpro_gateway-response-4' => 'Njepłaśiwa suma.',
	'payflowpro_gateway-response-24' => 'Cysło twójeje kreditoweje kórty abo datum spadnjenja jo wopak.',
	'payflowpro_gateway-response-112' => 'Twója adresa abo CVV-cysło (wěstotny kod) jo wopak.',
	'payflowpro_gateway-response-125' => 'Twója transakcija jo se wot Fraud Prevention Services wótpokazała.',
	'payflowpro_gateway-response-default' => 'Pśi pśeźěłowanju twójeje transakcije jo zmólka nastała.
Pšosym wopytaj pózdźej hyšći raz.',
	'php-response-declined' => 'Twója transakcija jo se wótpokazała.',
	'payflowpro_gateway-post-transaction' => 'Drobnostki transakcije',
	'payflowpro_gateway-submit-button' => 'Pósćiś',
);

/** French (Français)
 * @author PieRRoMaN
 */
$messages['fr'] = array(
	'payflowprogateway' => 'Soutenez Wikimedia',
	'payflowpro_gateway-desc' => 'Traitement par carte de crédit PayPal Payflow Pro',
	'payflowpro_gateway-accessible' => "Cette page n'est accessible que depuis la page de donation.",
	'payflowpro_gateway-form-message' => 'Contribuez avec votre carte de crédit.
Il y a <a href="http://wikimediafoundation.org/wiki/Donate/WaysToGive/fr">d\'autres moyens de donner, notamment PayPal, par chèque ou par courrier postal</a>.',
	'payflowpro_gateway-form-message-2' => 'Pour changer le montant ou la devise, retournez à <a href="/index.php?title=Donate">la page de donation</a>',
	'payflowpro_gateway-donor-legend' => 'Informations sur le donateur',
	'payflowpro_gateway-card-legend' => 'Informations sur la carte de crédit',
	'payflowpro_gateway-amount-legend' => 'Montant du don :',
	'payflowpro_gateway-donor-amount' => 'Montant :',
	'payflowpro_gateway-donor-email' => 'Adresse de courriel :',
	'payflowpro_gateway-donor-fname' => 'Prénom :',
	'payflowpro_gateway-donor-mname' => 'Deuxième prénom :',
	'payflowpro_gateway-donor-lname' => 'Nom de famille :',
	'payflowpro_gateway-donor-name' => 'Nom :',
	'payflowpro_gateway-donor-street' => 'Rue :',
	'payflowpro_gateway-donor-city' => 'Ville :',
	'payflowpro_gateway-donor-state' => 'État :',
	'payflowpro_gateway-donor-postal' => 'Code postal :',
	'payflowpro_gateway-donor-country' => 'Pays/Région :',
	'payflowpro_gateway-donor-address' => 'Adresse :',
	'payflowpro_gateway-donor-card' => 'Carte de crédit :',
	'payflowpro_gateway-donor-card-num' => 'Numéro de carte :',
	'payflowpro_gateway-donor-expiration' => "Date d'expiration :",
	'payflowpro_gateway-donor-security' => 'Code de sécurité :',
	'payflowpro_gateway-donor-submit' => 'Faire un don',
	'payflowpro_gateway-donor-currency-msg' => 'Ce don est effectué en $1',
	'payflowpro_gateway-error-msg' => 'Veuillez entrer votre $1',
	'payflowpro_gateway-error-msg-email' => '**Veuillez entrer une adresse de courriel valide**',
	'payflowpro_gateway-error-msg-amex' => '**Veuillez entrer un numéro de carte American Express correct.**',
	'payflowpro_gateway-error-msg-mc' => '**Veuillez entrer un numéro de carte Mastercard correct.**',
	'payflowpro_gateway-error-msg-visa' => '**Veuillez entrer un numéro de carte Visa correct.**',
	'payflowpro_gateway-response-0' => 'Votre transaction a été approuvée.
Merci pour votre don !',
	'payflowpro_gateway-response-126' => "Votre transaction est en cours d'approbation.",
	'payflowpro_gateway-response-12' => "Veuillez contacter le fournisseur de votre carte de crédit pour plus d'information.",
	'payflowpro_gateway-response-13' => 'Votre transaction requiert une autorisation vocale.
Veuillez nous contacter pour poursuivre votre transaction.',
	'payflowpro_gateway-response-114' => "Veuillez contacter le fournisseur de votre carte de crédit pour plus d'information.",
	'payflowpro_gateway-response-23' => "La date d'expiration de votre numéro de carte de crédit est incorrecte.",
	'payflowpro_gateway-response-4' => 'Montant invalide.',
	'payflowpro_gateway-response-24' => "Votre numéro de carte de crédit ou date d'expiration est incorrect(e).",
	'payflowpro_gateway-response-112' => 'Votre adresse ou numéro CVV (code de sécurité) est incorrect(e).',
	'payflowpro_gateway-response-125' => 'Votre transaction a été déclinée par les Services de prévention des fraudes.',
	'payflowpro_gateway-response-default' => 'Une erreur est survenue lors du traitement de votre transaction.
Veuillez réessayer plus tard.',
	'php-response-declined' => 'Votre transaction a été déclinée.',
	'payflowpro_gateway-post-transaction' => 'Détails de la transaction',
	'payflowpro_gateway-submit-button' => 'Faire un don',
);

/** Galician (Galego)
 * @author Toliño
 */
$messages['gl'] = array(
	'payflowprogateway' => 'Apoia a Wikimedia',
	'payflowpro_gateway-desc' => 'Procesamento por tarxeta de crédito PayPal Payflow Pro',
	'payflowpro_gateway-accessible' => 'Esta páxina só é accesible a través da páxina de doazóns.',
	'payflowpro_gateway-form-message' => 'Contribúe coa túa tarxeta de crédito.
Existen outros <a href="http://wikimediafoundation.org/wiki/Donate/WaysToGive/gl">xeitos de doar, incluíndo o PayPal, os cheques ou o correo postal</a>.',
	'payflowpro_gateway-form-message-2' => 'Para cambiar a cantidade ou a moeda, volta á <a href="/index.php?title=Donate">páxina de doazóns</a>',
	'payflowpro_gateway-donor-legend' => 'Información do doante',
	'payflowpro_gateway-card-legend' => 'Información da tarxeta de crédito',
	'payflowpro_gateway-amount-legend' => 'Importe da doazón:',
	'payflowpro_gateway-donor-amount' => 'Cantidade:',
	'payflowpro_gateway-donor-email' => 'Enderezo de correo electrónico:',
	'payflowpro_gateway-donor-fname' => 'Nome:',
	'payflowpro_gateway-donor-mname' => 'Segundo nome:',
	'payflowpro_gateway-donor-lname' => 'Apelidos:',
	'payflowpro_gateway-donor-name' => 'Nome:',
	'payflowpro_gateway-donor-street' => 'Rúa:',
	'payflowpro_gateway-donor-city' => 'Cidade:',
	'payflowpro_gateway-donor-state' => 'Estado:',
	'payflowpro_gateway-donor-postal' => 'Código postal:',
	'payflowpro_gateway-donor-country' => 'País/Rexión:',
	'payflowpro_gateway-donor-address' => 'Enderezo:',
	'payflowpro_gateway-donor-card' => 'Tarxeta de crédito:',
	'payflowpro_gateway-donor-card-num' => 'Número da tarxeta:',
	'payflowpro_gateway-donor-expiration' => 'Data de caducidade:',
	'payflowpro_gateway-donor-security' => 'Código de seguridade:',
	'payflowpro_gateway-donor-submit' => 'Doar',
	'payflowpro_gateway-donor-currency-msg' => 'Esta doazón se está efectuando en $1',
	'payflowpro_gateway-error-msg' => 'Por favor, introduce o teu $1',
	'payflowpro_gateway-error-msg-email' => '**Por favor, escribe un enderezo de correo electrónico válido**',
	'payflowpro_gateway-error-msg-amex' => '**Por favor, escribe un número de tarxeta American Express correcto.**',
	'payflowpro_gateway-error-msg-mc' => '**Por favor, escribe un número de tarxeta Mastercard correcto.**',
	'payflowpro_gateway-error-msg-visa' => '**Por favor, escribe un número de tarxeta Visa correcto.**',
	'payflowpro_gateway-response-0' => 'A túa transacción foi aprobada.
Grazas pola doazón!',
	'payflowpro_gateway-response-126' => 'A túa transacción está pendente de aprobación.',
	'payflowpro_gateway-response-12' => 'Ponte en contacto coa empresa da túa tarxeta de crédito para obter máis información.',
	'payflowpro_gateway-response-13' => 'A túa transacción esixe unha autorización de voz.
Ponte en contacto connosco para continuar con esta operación.',
	'payflowpro_gateway-response-114' => 'Ponte en contacto coa empresa da túa tarxeta de crédito para obter máis información.',
	'payflowpro_gateway-response-23' => 'O número da túa tarxeta de crédito ou a data de caducidade é incorrecto.',
	'payflowpro_gateway-response-4' => 'A cantidade non é válida.',
	'payflowpro_gateway-response-24' => 'O número da túa tarxeta de crédito ou a data de caducidade é incorrecto.',
	'payflowpro_gateway-response-112' => 'O teu enderezo ou número CVV (código de seguridade) é incorrecto.',
	'payflowpro_gateway-response-125' => 'A túa transacción foi rexeitada polo servizo de prevención de fraudes.',
	'payflowpro_gateway-response-default' => 'Houbo un erro ao procesar a túa transacción.
Por favor, inténteo de novo máis tarde.',
	'php-response-declined' => 'A túa transacción foi rexeitada.',
	'payflowpro_gateway-post-transaction' => 'Detalles da transacción',
	'payflowpro_gateway-submit-button' => 'Doar',
);

/** Swiss German (Alemannisch)
 * @author Als-Holder
 */
$messages['gsw'] = array(
	'payflowprogateway' => 'Wikimedia unterstitze',
	'payflowpro_gateway-desc' => 'Kreditcharte verwände iber PayPal Payflow Pro',
	'payflowpro_gateway-accessible' => 'Uf die Syte cha mer nume uus zuegryfe vu dr Spändesyte.',
	'payflowpro_gateway-form-message' => 'Iber Dyy Kreditcharte spände.
S het au <a href="http://wikimediafoundation.org/wiki/Donate/WaysToGive/en">andri Megligkeite, wie mer cha spände, zem Byschpel iber PayPal, Scheck oder Poscht</a>.',
	'payflowpro_gateway-form-message-2' => 'Go d Hechi oder d Währig vum Betrag ändere, gang zruck uf <a href="/index.php?title=Donate">d Spändesyte</a>',
	'payflowpro_gateway-donor-legend' => 'Spänderinformation',
	'payflowpro_gateway-card-legend' => 'Kreditcharteninformation',
	'payflowpro_gateway-amount-legend' => 'Betrag:',
	'payflowpro_gateway-donor-amount' => 'Betrag:',
	'payflowpro_gateway-donor-email' => 'E-Mailadräss:',
	'payflowpro_gateway-donor-fname' => 'Vorname:',
	'payflowpro_gateway-donor-mname' => 'Zweiter Vorname:',
	'payflowpro_gateway-donor-lname' => 'Nochname:',
	'payflowpro_gateway-donor-name' => 'Name:',
	'payflowpro_gateway-donor-street' => 'Stroß:',
	'payflowpro_gateway-donor-city' => 'Stadt:',
	'payflowpro_gateway-donor-state' => 'Staat:',
	'payflowpro_gateway-donor-postal' => 'Poschtleitzahl:',
	'payflowpro_gateway-donor-country' => 'Land:',
	'payflowpro_gateway-donor-address' => 'Adräss:',
	'payflowpro_gateway-donor-card' => 'Kreditcharte:',
	'payflowpro_gateway-donor-card-num' => 'Chartenummere:',
	'payflowpro_gateway-donor-expiration' => 'Verfallsdatum:',
	'payflowpro_gateway-donor-security' => 'Gheimnummere:',
	'payflowpro_gateway-donor-submit' => 'Spände',
	'payflowpro_gateway-donor-currency-msg' => 'D Spände isch in $1 gmacht wore',
	'payflowpro_gateway-error-msg' => 'Bitte gib Dyy $1 yy',
	'payflowpro_gateway-error-msg-email' => '**Bitte gib e giltigi E-Mailadräss yy**',
	'payflowpro_gateway-error-msg-amex' => '**Bitte gib e giltigi Chartenumme yy fir American Express**',
	'payflowpro_gateway-error-msg-mc' => '**Bitte gib e giltigi Chartenumme yy fir Mastercard.**',
	'payflowpro_gateway-error-msg-visa' => '**Bitte gib e giltigi Chartenumme yy fir Visa.**',
	'payflowpro_gateway-response-0' => 'Dyy Transaktion isch uusgfiert wore.
Dankschen fir Dyy Spände!',
	'payflowpro_gateway-response-126' => 'Dyy Transaktion isch no hängig.',
	'payflowpro_gateway-response-12' => 'Bitte nimm Kontakt uf zue Dyyre Charte-Firma fir meh Informatione.',
	'payflowpro_gateway-response-13' => 'Fir Dyy Transaktion brucht s e Stimmeerchännig.
Bitte nimm Kontakt zuen is uf go Dyy Transaktio wyterfiere.',
	'payflowpro_gateway-response-114' => 'Bitte nimm Kontakt uf zue Dyyre Kreditcharte-Firma fir meh Informatione.',
	'payflowpro_gateway-response-23' => 'Dyy Kreditchartenummere oder s Verfallsdatum isch nit korrekt.',
	'payflowpro_gateway-response-4' => 'Nit giltige Betrag.',
	'payflowpro_gateway-response-24' => 'Dyy Kreditchartenummere oder s Verfallsdatum isch nit korrekt.',
	'payflowpro_gateway-response-112' => 'Dyy Adräss oder d CVV-Nummere (Gheimnummere) isch nit korrekt.',
	'payflowpro_gateway-response-125' => 'Dyy Transaktion isch dur Fraud Prevention Services abbroche wore.',
	'payflowpro_gateway-response-default' => 'S het e Fähler gee bi dr Uusfierig vu Dyyre Transaktion.
Bitte versuech s speter nonemol.',
	'php-response-declined' => 'Dyy Transaktion isch abbroche wore.',
	'payflowpro_gateway-post-transaction' => 'Transaktions-Detail',
	'payflowpro_gateway-submit-button' => 'Spände',
);

/** Upper Sorbian (Hornjoserbsce)
 * @author Michawiki
 */
$messages['hsb'] = array(
	'payflowprogateway' => 'Wikimediju podpěrać',
	'payflowpro_gateway-desc' => 'PayPal Payflow Pro předźěłowanje kreditneje karty',
	'payflowpro_gateway-accessible' => 'Tuta stronje je jenož wot strony darow přistupna.',
	'payflowpro_gateway-form-message' => 'Přinošujće z pomocu swojeje kreditneje karty.
Su tež <a href="http://wikimediafoundation.org/wiki/Donate/WaysToGive/en">druhe móžnosće, zo byšće darił, na přikład PayPal, šek abo póst</a>.',
	'payflowpro_gateway-form-message-2' => 'Zo byšće sumu abo měnu změnił, wróćće so k <a href="/index.php?title=Donate">stronje darow</a>',
	'payflowpro_gateway-donor-legend' => 'Darjenske informacije',
	'payflowpro_gateway-card-legend' => 'Informacije kreditneje karty',
	'payflowpro_gateway-amount-legend' => 'Darjenska suma:',
	'payflowpro_gateway-donor-amount' => 'Suma:',
	'payflowpro_gateway-donor-email' => 'E-mejlowa adresa:',
	'payflowpro_gateway-donor-fname' => 'Předmjeno:',
	'payflowpro_gateway-donor-mname' => 'Druhe mjeno:',
	'payflowpro_gateway-donor-lname' => 'Swójbne mjeno:',
	'payflowpro_gateway-donor-name' => 'Mjeno:',
	'payflowpro_gateway-donor-street' => 'Hasa:',
	'payflowpro_gateway-donor-city' => 'Město:',
	'payflowpro_gateway-donor-state' => 'Stat:',
	'payflowpro_gateway-donor-postal' => 'Postowe wodźenske čisło:',
	'payflowpro_gateway-donor-country' => 'Kraj/Region:',
	'payflowpro_gateway-donor-address' => 'Adresa:',
	'payflowpro_gateway-donor-card' => 'Kreditna karta:',
	'payflowpro_gateway-donor-card-num' => 'Kartowe čisło:',
	'payflowpro_gateway-donor-expiration' => 'Datum spadnjenja:',
	'payflowpro_gateway-donor-security' => 'Wěstotny kod:',
	'payflowpro_gateway-donor-submit' => 'Darić',
	'payflowpro_gateway-donor-currency-msg' => 'Tutón dar je w $1',
	'payflowpro_gateway-error-msg' => 'Prošu wupjelń polo: $1',
	'payflowpro_gateway-error-msg-email' => ' **Prošu zapodaj płaćiwu e-mejlowu adresu**',
	'payflowpro_gateway-error-msg-amex' => ' **Prošu zapodaj prawe kartowe čisło za American Express.**',
	'payflowpro_gateway-error-msg-mc' => ' **Prošu zapodaj prawe kartowe čisło za MasterCard.**',
	'payflowpro_gateway-error-msg-visa' => ' **Prošu zapodaj prawe kartowe čisło za Visa.**',
	'payflowpro_gateway-response-0' => 'Waša transakcija bu schwalena.
Dźakujemy so za waš dar!',
	'payflowpro_gateway-response-126' => 'Waša transakcija hišće na schwalenje čaka.',
	'payflowpro_gateway-response-12' => 'Prošu stajće so ze swojim předewzaćom kreditneje karty za dalše informacije do zwiska.',
	'payflowpro_gateway-response-13' => 'Waša transakcija wužaduje hłosowu awtorizaciju.
Prošu stajće so z nami do zwiska, zo byšće ze swoju transakciju pokročował.',
	'payflowpro_gateway-response-114' => 'Prošu stajće so ze swojim předewzaćom kreditneje karty za dalše informacije do zwiska.',
	'payflowpro_gateway-response-23' => 'Čisło wašeje kreditneje karty abo datum spadnjenja je wopak.',
	'payflowpro_gateway-response-4' => 'Njepłaćiwa suma.',
	'payflowpro_gateway-response-24' => 'Čisło wašeje kreditneje karty abo datum spadnjenja je wopak.',
	'payflowpro_gateway-response-112' => 'Waša adresa abo CVV-čisło (wěstotny kod) je wopak.',
	'payflowpro_gateway-response-125' => 'Waša transakcija bu wot Fraud Prevention Services wotpokazana.',
	'payflowpro_gateway-response-default' => 'Při předźěłowanju wašeje transakcije je zmylk wustupił.
Prošu spytajće pozdźišo hišće raz.',
	'php-response-declined' => 'Twoja transakcija bu wotpokazana.',
	'payflowpro_gateway-post-transaction' => 'Podrobnosće transakcije',
	'payflowpro_gateway-submit-button' => 'Darić',
);

/** Hungarian (Magyar)
 * @author Dani
 * @author Glanthor Reviol
 */
$messages['hu'] = array(
	'payflowprogateway' => 'Támogasd a Wikimédiát',
	'payflowpro_gateway-desc' => 'PayPal Payflow Pro hitelkártya feldolgozása',
	'payflowpro_gateway-accessible' => 'Ez a lap csak az adományozás lapról érhető el.',
	'payflowpro_gateway-form-message' => 'Közreműködés a hitelkártyád segítségével.
Ne feledd, <a href="http://wikimediafoundation.org/wiki/Donate/WaysToGive/en">számos más módon adakozhatsz, például PayPalon, csekkel vagy levélen keresztül is</a>.',
	'payflowpro_gateway-form-message-2' => 'Az összeg vagy a pénznem megváltoztatásához lépj vissza <a href="/index.php?title=Donate">az adományozási lapra</a>',
	'payflowpro_gateway-donor-legend' => 'Adományozói információk',
	'payflowpro_gateway-card-legend' => 'Hitelkártya információk',
	'payflowpro_gateway-amount-legend' => 'Adomány nagysága:',
	'payflowpro_gateway-donor-amount' => 'Összeg:',
	'payflowpro_gateway-donor-email' => 'E-mail cím:',
	'payflowpro_gateway-donor-fname' => 'Keresztnév:',
	'payflowpro_gateway-donor-mname' => 'Második utónév:',
	'payflowpro_gateway-donor-lname' => 'Családi név:',
	'payflowpro_gateway-donor-name' => 'Név:',
	'payflowpro_gateway-donor-street' => 'Utca:',
	'payflowpro_gateway-donor-city' => 'Város:',
	'payflowpro_gateway-donor-state' => 'Állam/Megye:',
	'payflowpro_gateway-donor-postal' => 'Irányítószám:',
	'payflowpro_gateway-donor-country' => 'Ország/Régió:',
	'payflowpro_gateway-donor-address' => 'Cím:',
	'payflowpro_gateway-donor-card' => 'Hitelkártya:',
	'payflowpro_gateway-donor-card-num' => 'Kártyaszám:',
	'payflowpro_gateway-donor-expiration' => 'Lejárat dátuma:',
	'payflowpro_gateway-donor-security' => 'Biztonsági kód:',
	'payflowpro_gateway-donor-submit' => 'Adomány elküldése',
	'payflowpro_gateway-donor-currency-msg' => 'Az adomány pénzneme: $1',
	'payflowpro_gateway-error-msg' => 'A következő mező kitöltése kötelező: $1',
	'payflowpro_gateway-error-msg-email' => '** Kérlek érvényes e-mail címet adj meg **',
	'payflowpro_gateway-error-msg-amex' => '** Kérlek helyes American Express kártyaszámot adj meg. **',
	'payflowpro_gateway-error-msg-mc' => '** Kérlek, helyes MasterCard kártyaszámot adj meg. **',
	'payflowpro_gateway-error-msg-visa' => '** Kérlek helyes Visa kártyaszámot adj meg. **',
	'payflowpro_gateway-response-0' => 'A tranzakció elfogadva.
Köszönjük az adományt!',
	'payflowpro_gateway-response-126' => 'A tranzakciód elfogadásra vár.',
	'payflowpro_gateway-response-12' => 'További információért lépj kapcsolatba a bankkártyát kibocsátó céggel.',
	'payflowpro_gateway-response-13' => 'A tranzakcióhoz szóbeli megerősítés szükséges.
Kérünk vedd fel velünk a kapcsolatot a tranzakció folytatásához.',
	'payflowpro_gateway-response-114' => 'További információkért vedd fel a kapcsolatot a hitelkártya kibocsátójával.',
	'payflowpro_gateway-response-23' => 'A hitelkártyaszám vagy a lejárati dátum helytelen.',
	'payflowpro_gateway-response-4' => 'Érvénytelen összeg.',
	'payflowpro_gateway-response-24' => 'A bankkártyád száma vagy lejárati dátuma érvénytelen.',
	'payflowpro_gateway-response-112' => 'A cím vagy a CVV szám (biztonsági kód) helytelen.',
	'payflowpro_gateway-response-125' => 'A tranzakciódat visszautasította a Fraud Prevention Services.',
	'payflowpro_gateway-response-default' => 'Hiba történt a tranzakció feldolgozásakor.
Később próbáld meg újra.',
	'php-response-declined' => 'A tranzakció elutasítva.',
	'payflowpro_gateway-post-transaction' => 'Tranzakció részletei',
	'payflowpro_gateway-submit-button' => 'Adomány elküldése',
);

/** Interlingua (Interlingua)
 * @author McDutchie
 */
$messages['ia'] = array(
	'payflowprogateway' => 'Supporta Wikimedia',
	'payflowpro_gateway-desc' => 'Processamento per carta de credito PayPal Payflow Pro',
	'payflowpro_gateway-accessible' => 'Iste pagina es solmente accessibile ab le pagina de donation.',
	'payflowpro_gateway-form-message' => 'Contribue con tu carta de credito.
Il ha <a href="http://wikimediafoundation.org/wiki/Donate/WaysToGive/ia">altere modos de donar, como PayPal, cheque o posta</a>.',
	'payflowpro_gateway-form-message-2' => 'Pro cambiar le quantitate o le moneta, retorna al <a href="/index.php?title=Donate">pagina de donation</a>',
	'payflowpro_gateway-donor-legend' => 'Informationes del donator',
	'payflowpro_gateway-card-legend' => 'Informationes del carta de credito',
	'payflowpro_gateway-amount-legend' => 'Amonta del donation:',
	'payflowpro_gateway-donor-amount' => 'Amonta:',
	'payflowpro_gateway-donor-email' => 'Adresse de e-mail:',
	'payflowpro_gateway-donor-fname' => 'Prenomine:',
	'payflowpro_gateway-donor-mname' => 'Secunde prenomine:',
	'payflowpro_gateway-donor-lname' => 'Nomine de familia:',
	'payflowpro_gateway-donor-name' => 'Nomine:',
	'payflowpro_gateway-donor-street' => 'Strata:',
	'payflowpro_gateway-donor-city' => 'Citate:',
	'payflowpro_gateway-donor-state' => 'Stato:',
	'payflowpro_gateway-donor-postal' => 'Codice postal:',
	'payflowpro_gateway-donor-country' => 'Pais/Region:',
	'payflowpro_gateway-donor-address' => 'Adresse:',
	'payflowpro_gateway-donor-card' => 'Carta de credito:',
	'payflowpro_gateway-donor-card-num' => 'Numero del carta:',
	'payflowpro_gateway-donor-expiration' => 'Data de expiration:',
	'payflowpro_gateway-donor-security' => 'Codice de securitate:',
	'payflowpro_gateway-donor-submit' => 'Donar',
	'payflowpro_gateway-donor-currency-msg' => 'Iste donation es facite in $1',
	'payflowpro_gateway-error-msg' => 'Per favor entra tu $1',
	'payflowpro_gateway-error-msg-email' => '**Per favor entra un adresse de e-mail valide**',
	'payflowpro_gateway-error-msg-amex' => '**Per favor entra un numero correcte de carta American Express.**',
	'payflowpro_gateway-error-msg-mc' => '**Per favor entra un numero correcte de carta Mastercard.**',
	'payflowpro_gateway-error-msg-visa' => '**Per favor entra un numero correcte de carta Visa.**',
	'payflowpro_gateway-response-0' => 'Le transaction ha essite approbate.
Gratias pro tu donation!',
	'payflowpro_gateway-response-126' => 'Le transaction attende approbation.',
	'payflowpro_gateway-response-12' => 'Per favor contacta tu compania de carta de credito pro ulterior informationes.',
	'payflowpro_gateway-response-13' => 'Iste transaction require un autorisation vocal.
Per favor contacta nos pro continuar le transaction.',
	'payflowpro_gateway-response-114' => 'Per favor contacta tu compania de carta de credito pro ulterior information.',
	'payflowpro_gateway-response-23' => 'Le numero de carta de credito o le data de expiration es incorrecte.',
	'payflowpro_gateway-response-4' => 'Amonta invalide.',
	'payflowpro_gateway-response-24' => 'Le numero de carta de credito o le data de expiration es incorrecte.',
	'payflowpro_gateway-response-112' => 'Le adresse o le numero CVV (codice de securitate) es incorrecte.',
	'payflowpro_gateway-response-125' => 'Le transaction ha essite refusate per Fraud Prevention Services.',
	'payflowpro_gateway-response-default' => 'Un error occurreva durante le tractamento de tu transaction.
Per favor reproba plus tarde.',
	'php-response-declined' => 'Le transaction ha essite refusate.',
	'payflowpro_gateway-post-transaction' => 'Detalios del transaction',
	'payflowpro_gateway-submit-button' => 'Donar',
);

/** Indonesian (Bahasa Indonesia)
 * @author IvanLanin
 */
$messages['id'] = array(
	'payflowprogateway' => 'Dukung Wikimedia',
	'payflowpro_gateway-desc' => 'Pemrosesan kartu credit PayPal Payflow Pro',
	'payflowpro_gateway-accessible' => 'Halaman ini hanya dapat diakses dari halaman donasi.',
	'payflowpro_gateway-form-message' => 'Berkontribusi dengan kartu kredit Anda.
Ada <a href="http://wikimediafoundation.org/wiki/Donate/WaysToGive/en">cara lain untuk menyumbang, termasuk PayPal, cek, atau surat.</a>',
	'payflowpro_gateway-form-message-2' => 'Untuk mengganti nilai atau mata uang, kembali ke <a href="/index.php?title=Donate">halaman donasi</a>',
	'payflowpro_gateway-donor-legend' => 'Informasi donor',
	'payflowpro_gateway-card-legend' => 'Informasi kartu kredit',
	'payflowpro_gateway-amount-legend' => 'Nilai donasi:',
	'payflowpro_gateway-donor-amount' => 'Nilai:',
	'payflowpro_gateway-donor-email' => 'Alamat surel:',
	'payflowpro_gateway-donor-fname' => 'Nama depan:',
	'payflowpro_gateway-donor-mname' => 'Nama tengah:',
	'payflowpro_gateway-donor-lname' => 'Nama belakang:',
	'payflowpro_gateway-donor-name' => 'Nama:',
	'payflowpro_gateway-donor-street' => 'Alamat:',
	'payflowpro_gateway-donor-city' => 'Kota:',
	'payflowpro_gateway-donor-state' => 'Negara bagian:',
	'payflowpro_gateway-donor-postal' => 'Kode pos:',
	'payflowpro_gateway-donor-country' => 'Negara/Wilayah:',
	'payflowpro_gateway-donor-address' => 'Alamat:',
	'payflowpro_gateway-donor-card' => 'Kartu kredit:',
	'payflowpro_gateway-donor-card-num' => 'Nomor kartu:',
	'payflowpro_gateway-donor-expiration' => 'Tanggal kadaluarsa:',
	'payflowpro_gateway-donor-security' => 'Kode keamanan:',
	'payflowpro_gateway-donor-submit' => 'Donasikan',
	'payflowpro_gateway-donor-currency-msg' => 'Donasi ini dibuat dalam $1',
	'payflowpro_gateway-error-msg' => 'Tolong masukkan $1 Anda',
	'payflowpro_gateway-error-msg-email' => '**Tolong masukkan alamat surel yang valid**',
	'payflowpro_gateway-error-msg-amex' => '**Tolong masukkan nomor kartu yang benar untuk American Express.**',
	'payflowpro_gateway-error-msg-mc' => '**Tolong masukkan nomor kartu yang benar untuk Mastercard.**',
	'payflowpro_gateway-error-msg-visa' => '**Tolong masukkan nomor kartu yang benar untuk Visa.**',
	'payflowpro_gateway-response-0' => 'Transaksi Anda telah disetujui.
Terima kasih atas sumbangan Anda!',
	'payflowpro_gateway-response-126' => 'Transaksi Anda menunggu persetujuan.',
	'payflowpro_gateway-response-12' => 'Silakan hubungi penyedia kartu kredit Anda untuk informasi lebih lanjut.',
	'payflowpro_gateway-response-13' => 'Transaksi Anda membutuhkan otorisasi suara.
Silakan hubungi kami untuk melanjutkan transaksi Anda.',
	'payflowpro_gateway-response-114' => 'Silakan hubungi penyedia kartu kredit Anda untuk informasi lebih lanjut.',
	'payflowpro_gateway-response-23' => 'Nomor atau tanggal kadaluarsa kartu kredit Anda salah.',
	'payflowpro_gateway-response-4' => 'Nilai tidak benar.',
	'payflowpro_gateway-response-24' => 'Nomor atau tanggal kadaluarsa kartu kredit Anda salah.',
	'payflowpro_gateway-response-112' => 'Alamat atau nomor CVV (kode keamanan) Anda salah.',
	'payflowpro_gateway-response-125' => 'Transaksi Anda telah ditolak oleh Fraud Prevention Services.',
	'payflowpro_gateway-response-default' => 'Terjadi kesalahan dalam pemrosesan transaksi Anda.
Silakan coba lagi nanti.',
	'php-response-declined' => 'Transaksi Anda telah ditolak.',
	'payflowpro_gateway-post-transaction' => 'Detail transaksi',
	'payflowpro_gateway-submit-button' => 'Donasikan',
);

/** Japanese (日本語)
 * @author Fryed-peach
 */
$messages['ja'] = array(
	'payflowprogateway' => 'ウィキメディアを支援する',
	'payflowpro_gateway-desc' => 'PayPal Payflow Pro クレジットカード処理',
	'payflowpro_gateway-accessible' => 'このページは寄付ページからのみ参照できます。',
	'payflowpro_gateway-form-message' => 'クレジットカードで寄付してください。
<a href="http://wikimediafoundation.org/wiki/Donate/WaysToGive/en">PayPal や小切手、郵便など他の送金方法</a>もあります。',
	'payflowpro_gateway-form-message-2' => '金額や通貨を変更するには、<a href="/index.php?title=Donate">寄付ページ</a>に戻ってください',
	'payflowpro_gateway-donor-legend' => '寄付者情報',
	'payflowpro_gateway-card-legend' => 'クレジットカード情報',
	'payflowpro_gateway-amount-legend' => '寄付金額:',
	'payflowpro_gateway-donor-amount' => '金額:',
	'payflowpro_gateway-donor-email' => '電子メールアドレス:',
	'payflowpro_gateway-donor-fname' => 'ファーストネーム:',
	'payflowpro_gateway-donor-mname' => 'ミドルネーム:',
	'payflowpro_gateway-donor-lname' => 'ラストネーム:',
	'payflowpro_gateway-donor-name' => '名前:',
	'payflowpro_gateway-donor-street' => '番地:',
	'payflowpro_gateway-donor-city' => '市町村:',
	'payflowpro_gateway-donor-state' => '都道府県:',
	'payflowpro_gateway-donor-postal' => '郵便番号:',
	'payflowpro_gateway-donor-country' => '国:',
	'payflowpro_gateway-donor-address' => '住所:',
	'payflowpro_gateway-donor-card' => 'クレジットカード:',
	'payflowpro_gateway-donor-card-num' => 'カード番号:',
	'payflowpro_gateway-donor-expiration' => '有効期限:',
	'payflowpro_gateway-donor-security' => '暗証番号:',
	'payflowpro_gateway-donor-submit' => '寄付',
	'payflowpro_gateway-donor-currency-msg' => 'この寄付は$1で行われています',
	'payflowpro_gateway-error-msg' => 'あなたの$1を入力してください',
	'payflowpro_gateway-error-msg-email' => '**有効な電子メールアドレスを入力してください**',
	'payflowpro_gateway-error-msg-amex' => '**アメリカン・エキスプレスの正確なカード番号を入力してください。**',
	'payflowpro_gateway-error-msg-mc' => '**マスターカードの正確なカード番号を入力してください。**',
	'payflowpro_gateway-error-msg-visa' => '**VISAの正確なカード番号を入力してください。**',
	'payflowpro_gateway-response-0' => 'あなたの取引は承認されました。
ご寄付ありがとうございます！',
	'payflowpro_gateway-response-126' => 'あなたの取引は承認待ちです。',
	'payflowpro_gateway-response-12' => 'より詳しい情報はクレジットカード会社にお問い合わせください。',
	'payflowpro_gateway-response-13' => 'あなたの取引には音声による認証が必要です。
取引を続けるには私どもにお問い合わせください。',
	'payflowpro_gateway-response-114' => 'より詳しい情報はクレジットカード会社にお問い合わせください。',
	'payflowpro_gateway-response-23' => 'クレジットカード番号あるいは有効期限が正しくありません。',
	'payflowpro_gateway-response-4' => '金額が無効です。',
	'payflowpro_gateway-response-24' => 'クレジットカード番号あるいは有効期限が正しくありません。',
	'payflowpro_gateway-response-112' => '住所あるいは暗証番号（セキュリティコード）が正しくありません。',
	'payflowpro_gateway-response-125' => 'あなたの取引は詐欺防止サービスによって拒否されました。',
	'payflowpro_gateway-response-default' => 'あなたの取引を処理している際にエラーがおきました。
後で再び試行してください。',
	'php-response-declined' => 'あなたの取引は拒否されました。',
	'payflowpro_gateway-post-transaction' => '取引詳細',
	'payflowpro_gateway-submit-button' => '寄付',
);

/** Ripoarisch (Ripoarisch) */
$messages['ksh'] = array(
	'payflowpro_gateway-donor-currency-msg' => 'Di Spende es en $1 jemaat woode.',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'payflowprogateway' => 'Ënnerstetzt Wikimedia',
	'payflowpro_gateway-desc' => 'Behandele vun der Kreditkaart PayPal Payflow Pro',
	'payflowpro_gateway-accessible' => 'Dës Säit ass nëmmen vun der Säit vun den Donë méiglech.',
	'payflowpro_gateway-form-message' => 'Maacht en Don mat Ärer Kreditkaart.
Et gëtt <a href="http://wikimediafoundation.org/wiki/Donate/WaysToGive/en">aner Méiglechkeete fir eppes ze ginn, PayPal, Scheck oder Mail</a>.',
	'payflowpro_gateway-form-message-2' => "Fir de Betrag oder d'Währung z'änneren gitt w.e.g. zréck op <a href=\"/index.php?title=Donate\">d'Säit vum Don</a>",
	'payflowpro_gateway-donor-legend' => 'Informatiounen iwwer den Donateur',
	'payflowpro_gateway-card-legend' => "Informatiounen iwwert d'Kreditkaart",
	'payflowpro_gateway-amount-legend' => 'Betrag vum Don:',
	'payflowpro_gateway-donor-amount' => 'Betrag:',
	'payflowpro_gateway-donor-email' => 'E-Mailadress:',
	'payflowpro_gateway-donor-fname' => 'Virnumm:',
	'payflowpro_gateway-donor-mname' => 'Zweete Virnumm:',
	'payflowpro_gateway-donor-lname' => 'Familjennumm:',
	'payflowpro_gateway-donor-name' => 'Numm:',
	'payflowpro_gateway-donor-street' => 'Strooss:',
	'payflowpro_gateway-donor-city' => 'Stad:',
	'payflowpro_gateway-donor-state' => 'Staat:',
	'payflowpro_gateway-donor-postal' => 'Post-Code:',
	'payflowpro_gateway-donor-country' => 'Land/Regioun:',
	'payflowpro_gateway-donor-address' => 'Adress:',
	'payflowpro_gateway-donor-card' => 'Kreditkaart',
	'payflowpro_gateway-donor-card-num' => 'Nummer vun der Kaart:',
	'payflowpro_gateway-donor-expiration' => 'Datum vun der Expiratioun:',
	'payflowpro_gateway-donor-security' => 'Sécherheetscode:',
	'payflowpro_gateway-donor-submit' => 'Maacht en Don',
	'payflowpro_gateway-donor-currency-msg' => 'Dësen don gëtt an $1 gemaach',
	'payflowpro_gateway-error-msg' => 'Gitt w.e.g. Är(e) $1 an',
	'payflowpro_gateway-error-msg-email' => '**Gitt w.e.g eng valabel E-Mailadress an**',
	'payflowpro_gateway-error-msg-amex' => '**Gitt w.e.g. eng korrekt Kaartenummer fir American Express an**',
	'payflowpro_gateway-error-msg-mc' => '**Gitt w.e.g. eng korrekt Nummer fir Mastercard an**',
	'payflowpro_gateway-error-msg-visa' => '**Gitt w.e.g. eng korrekt Nummer fir Visa an**',
	'payflowpro_gateway-response-0' => 'Är Transaktioun gouf kzeptéiert.
Merci fir Ären Don!',
	'payflowpro_gateway-response-126' => 'Är Transaktiun muss nach akzeptéiert ginn.',
	'payflowpro_gateway-response-12' => "Kontaktéiert d'Firma vun Ärer Krditkaart fir weider Informatiounen.",
	'payflowpro_gateway-response-13' => 'Är Transaktioun muss duerch STëmmenerkennung autoriséiert ginn.
Kontaktéiert eis w.e.g. fir mat Ärer Transaktioun weiderzefueren.',
	'payflowpro_gateway-response-114' => "Kontaktéiert d'Firma vun Ärer Kreditkaart fir méi Informatiounen.",
	'payflowpro_gateway-response-23' => "D'Nummer vun Ärer Kreditkaart oder den Datum wou d'Kaart ofleeft si falsch.",
	'payflowpro_gateway-response-4' => 'Net valabele Betrag.',
	'payflowpro_gateway-response-24' => "D'Nummer vun Ärer Kreditkaart oder den Datum wou d'Kaart ofleeft si falsch.",
	'payflowpro_gateway-response-112' => 'Är Adress oder CVV-Nummer (Sécherheetscode) ass net richteg.',
	'payflowpro_gateway-response-125' => "Är Transaktioun gouf net vun de Servicer, déi sech ëm d'Verhënnerung vun der Fraude bekëmmeren, akzeptéiert.",
	'payflowpro_gateway-response-default' => 'Et gouf e Feeler beim Verschaffe vun Ärer Transaktioun.
Probéiert et w.e.g. spéider nach eng Kéier.',
	'php-response-declined' => 'Är Transactioun gouf net akzeptéiert.',
	'payflowpro_gateway-post-transaction' => 'Detailer vun der Transaktioun',
	'payflowpro_gateway-submit-button' => 'Maacht en Don',
);

/** Macedonian (Македонски)
 * @author Bjankuloski06
 */
$messages['mk'] = array(
	'payflowprogateway' => 'Поддржете ја Викимедија',
	'payflowpro_gateway-desc' => 'PayPal Payflow Pro обработка на податоците за плаќање со кредитна картичка',
	'payflowpro_gateway-accessible' => 'До оваа страница се доаѓа само преку страницата за донирање.',
	'payflowpro_gateway-form-message' => 'Дајте придонес со кредитна картичка.
Има и <a href="http://wikimediafoundation.org/wiki/Donate/WaysToGive/mk">други начини за донирање, како на пример преку PayPal, со чек, или по пошта</a>.',
	'payflowpro_gateway-form-message-2' => 'За да го промените износот или валутата, вратете се на <a href="/index.php?title=Donate">страницата за донирање</a>',
	'payflowpro_gateway-donor-legend' => 'Податоци за дарителот',
	'payflowpro_gateway-card-legend' => 'Податоци за кредитната картичка',
	'payflowpro_gateway-amount-legend' => 'Износ на донацијата:',
	'payflowpro_gateway-donor-amount' => 'Износ:',
	'payflowpro_gateway-donor-email' => 'Е-пошта:',
	'payflowpro_gateway-donor-fname' => 'Име:',
	'payflowpro_gateway-donor-mname' => 'Средно име:',
	'payflowpro_gateway-donor-lname' => 'Презиме:',
	'payflowpro_gateway-donor-name' => 'Име:',
	'payflowpro_gateway-donor-street' => 'Улица:',
	'payflowpro_gateway-donor-city' => 'Град:',
	'payflowpro_gateway-donor-state' => 'Покраина:',
	'payflowpro_gateway-donor-postal' => 'Поштенски број:',
	'payflowpro_gateway-donor-country' => 'Земја/Регион:',
	'payflowpro_gateway-donor-address' => 'Адреса:',
	'payflowpro_gateway-donor-card' => 'Кредитна картичка:',
	'payflowpro_gateway-donor-card-num' => 'Број на картичката:',
	'payflowpro_gateway-donor-expiration' => 'Важи до:',
	'payflowpro_gateway-donor-security' => 'Сигурносен код:',
	'payflowpro_gateway-donor-submit' => 'Донирајте',
	'payflowpro_gateway-donor-currency-msg' => 'Оваа донација се врши во $1',
	'payflowpro_gateway-error-msg' => 'Внесете $1',
	'payflowpro_gateway-error-msg-email' => '**Внесете правилна е-пошта**',
	'payflowpro_gateway-error-msg-amex' => '**Внесете правилен број на American Express картичка.**',
	'payflowpro_gateway-error-msg-mc' => '**Внесете правилен број на Mastercard картичка.**',
	'payflowpro_gateway-error-msg-visa' => '**Внесете правилен број на Visa картичка.**',
	'payflowpro_gateway-response-0' => 'Вашето плаќање е одобрено.
Ви благодариме на донацијата!',
	'payflowpro_gateway-response-126' => 'Вашето плаќање чека одобрение.',
	'payflowpro_gateway-response-12' => 'Контактирајте го издавачот на кредитната картичка за повеќе информации.',
	'payflowpro_gateway-response-13' => 'Вашето плаќање бара гласовно овластување.
Контактирајте нè за да продолжите со плаќањето.',
	'payflowpro_gateway-response-114' => 'Контактирајте го издавачот на кредитната картичка за повеќе информации.',
	'payflowpro_gateway-response-23' => 'Бројот на кредитната картичка или датумот на истекување е погрешен.',
	'payflowpro_gateway-response-4' => 'Неважечки износ.',
	'payflowpro_gateway-response-24' => 'Бројот на кредитната картичка или датумот на истекување е погрешен.',
	'payflowpro_gateway-response-112' => 'Вашата адреса или CVV број (сигурносен код) е неправилен.',
	'payflowpro_gateway-response-125' => 'Вашето плаќање е одбиено од страна на Службата за спречување на финансиски криминал (Fraud Prevention Services)',
	'payflowpro_gateway-response-default' => 'Настана грешка при обработката на плаќањето.
Обидете се повторно.',
	'php-response-declined' => 'Плаќањето беше одбиено.',
	'payflowpro_gateway-post-transaction' => 'Податоци за плаќањето',
	'payflowpro_gateway-submit-button' => 'Донирајте',
);

/** Malayalam (മലയാളം)
 * @author Praveenp
 */
$messages['ml'] = array(
	'payflowprogateway' => 'വിക്കിമീഡിയയെ പിന്തുണയ്ക്കുക',
	'payflowpro_gateway-accessible' => 'സംഭാവനാ താളിൽ നിന്നുമാത്രമേ ഈ താൾ ലഭ്യമാവുകയുള്ളു.',
	'payflowpro_gateway-form-message-2' => 'തുകയോ നാണയമോ മാറ്റാനായി <a href="/index.php?title=Donate">സംഭാവനാ താളിലേയ്ക്ക്</a> തിരിച്ചുപോവുക',
	'payflowpro_gateway-donor-legend' => 'സംഭാവന ചെയ്യുന്നയാളുടെ വിവരങ്ങൾ',
	'payflowpro_gateway-card-legend' => 'ക്രെഡിറ്റ് കാർഡ് വിവരങ്ങൾ',
	'payflowpro_gateway-amount-legend' => 'സംഭാവന തുക:',
	'payflowpro_gateway-donor-amount' => 'തുക:',
	'payflowpro_gateway-donor-email' => 'ഇമെയിൽ വിലാസം:',
	'payflowpro_gateway-donor-fname' => 'പ്രഥമ നാമം:',
	'payflowpro_gateway-donor-mname' => 'മദ്ധ്യ നാമം:',
	'payflowpro_gateway-donor-lname' => 'അവസാന നാമം:',
	'payflowpro_gateway-donor-name' => 'പേര്:',
	'payflowpro_gateway-donor-street' => 'തെരുവ്:',
	'payflowpro_gateway-donor-city' => 'പട്ടണം:',
	'payflowpro_gateway-donor-state' => 'സംസ്ഥാനം:',
	'payflowpro_gateway-donor-postal' => 'തപാൽ കോഡ്:',
	'payflowpro_gateway-donor-country' => 'രാജ്യം/പ്രദേശം:',
	'payflowpro_gateway-donor-address' => 'വിലാസം:',
	'payflowpro_gateway-donor-card' => 'ക്രെഡിറ്റ് കാർഡ്:',
	'payflowpro_gateway-donor-card-num' => 'കാർഡ് നമ്പർ:',
	'payflowpro_gateway-donor-submit' => 'സംഭാവന ചെയ്യുക',
	'payflowpro_gateway-donor-currency-msg' => 'ഈ സംഭാവന $1 ആയി നൽകിയിരിക്കുന്നു',
	'payflowpro_gateway-error-msg' => 'ദയവായി താങ്കളുടെ $1 നൽകുക',
	'payflowpro_gateway-error-msg-email' => '**ദയവായി സാധുവായ ഇമെയിൽ വിലാസം നൽകുക**',
	'payflowpro_gateway-response-4' => 'തുക അസാധുവാണ്.',
	'payflowpro_gateway-submit-button' => 'സംഭാവന ചെയ്യുക',
);

/** Dutch (Nederlands)
 * @author Siebrand
 */
$messages['nl'] = array(
	'payflowprogateway' => 'Steun Wikimedia',
	'payflowpro_gateway-desc' => 'Creditcardverwerking via PayPal PayFlow Pro',
	'payflowpro_gateway-accessible' => 'Deze pagina is alleen toegankelijk via de donateurspagina.',
	'payflowpro_gateway-form-message' => 'Draag bij via uw creditcard.
Er zijn <a href="http://wikimediafoundation.org/wiki/Donate/WaysToGive/en">andere manieren om te geven, waaronder PayPal, per cheque of per post</a>.',
	'payflowpro_gateway-form-message-2' => 'Keer terug naar de <a href="/index.php?title=Donate">donateurspagina</a> om het bedrag of de valuta te wijzigen.',
	'payflowpro_gateway-donor-legend' => 'Donateursinformatie',
	'payflowpro_gateway-card-legend' => 'Creditcardinformatie',
	'payflowpro_gateway-amount-legend' => 'Bedrag:',
	'payflowpro_gateway-donor-amount' => 'Bedrag:',
	'payflowpro_gateway-donor-email' => 'E-mailadres:',
	'payflowpro_gateway-donor-fname' => 'Voornaam:',
	'payflowpro_gateway-donor-mname' => 'Tussenvoegsel:',
	'payflowpro_gateway-donor-lname' => 'Achternaam:',
	'payflowpro_gateway-donor-name' => 'Naam:',
	'payflowpro_gateway-donor-street' => 'Straat:',
	'payflowpro_gateway-donor-city' => 'Plaats:',
	'payflowpro_gateway-donor-state' => 'Staat:',
	'payflowpro_gateway-donor-postal' => 'Postcode:',
	'payflowpro_gateway-donor-country' => 'Land:',
	'payflowpro_gateway-donor-address' => 'Adres:',
	'payflowpro_gateway-donor-card' => 'Creditcard:',
	'payflowpro_gateway-donor-card-num' => 'Kaartnummer:',
	'payflowpro_gateway-donor-expiration' => 'Vervaldatum:',
	'payflowpro_gateway-donor-security' => 'Beveiligingscode:',
	'payflowpro_gateway-donor-submit' => 'Doneren',
	'payflowpro_gateway-donor-currency-msg' => 'Deze donatie wordt gemaakt in $1',
	'payflowpro_gateway-error-msg' => 'Voer alstublieft uw $1 in',
	'payflowpro_gateway-error-msg-email' => '**Voer alstublieft een geldig e-mailadres in**',
	'payflowpro_gateway-error-msg-amex' => '**Voer alstublieft een geldig kaartnummer voor  American Express in.**',
	'payflowpro_gateway-error-msg-mc' => '**Voer alstublieft een geldig kaartnummer voor Mastercard in.**',
	'payflowpro_gateway-error-msg-visa' => '**Voer alstublieft een geldig kaartnummer voor Visa in.**',
	'payflowpro_gateway-response-0' => 'Uw transactie is goedgekeurd.
Dank u wel voor uw donatie!',
	'payflowpro_gateway-response-126' => 'Uw transactie wacht op goedkeuring.',
	'payflowpro_gateway-response-12' => 'Neem alstublieft contact op met uw creditcardmaatschappij voor meer informatie.',
	'payflowpro_gateway-response-13' => 'Voor uw transactie is mondelinge toestemming vereist.
Neem alstublieft contact met ons op voor uw transactie.',
	'payflowpro_gateway-response-114' => 'Neem alstublieft contact op met uw creditcardmaatschappij voor meer informatie.',
	'payflowpro_gateway-response-23' => 'Het opgegeven creditcardnummer of de vervaldatum is onjuist.',
	'payflowpro_gateway-response-4' => 'Ongeldig bedrag.',
	'payflowpro_gateway-response-24' => 'Het opgegeven creditcardnummer of de vervaldatum is onjuist.',
	'payflowpro_gateway-response-112' => 'Uw adres of CVV-nummer (veiligheidscode) is onjuist.',
	'payflowpro_gateway-response-125' => 'Uw transactie is geweigers door Fraud Prevention Services.',
	'payflowpro_gateway-response-default' => 'Er is een fout opgetreden bij het verwerken van uw transactie.
Probeer het later nog een keer.',
	'php-response-declined' => 'Uw transactie is geweigerd.',
	'payflowpro_gateway-post-transaction' => 'Transactiedetails',
	'payflowpro_gateway-submit-button' => 'Doneren',
);

/** Occitan (Occitan)
 * @author Cedric31
 */
$messages['oc'] = array(
	'payflowprogateway' => 'Sostenètz Wikimedia',
	'payflowpro_gateway-desc' => 'Tractament par carta de credit PayPal Payflow Pro',
	'payflowpro_gateway-accessible' => 'Aquesta pagina es pas accessibla que dempuèi la pagina de donacion.',
	'payflowpro_gateway-form-message' => 'Contribuissètz amb vòstre carta de credit.
I a <a href="http://wikimediafoundation.org/wiki/Donate/WaysToGive/oc">d\'autres mejans de donar, notadament PayPal, per chèc o per corrièr postal</a>.',
	'payflowpro_gateway-form-message-2' => 'Per cambiar lo montant o la devisa, tornatz a <a href="/index.php?title=Donate">la pagina de donacion</a>',
	'payflowpro_gateway-donor-legend' => 'Informacions sul donator',
	'payflowpro_gateway-card-legend' => 'Informacions sus la carta de credit',
	'payflowpro_gateway-amount-legend' => 'Montant del don :',
	'payflowpro_gateway-donor-amount' => 'Montant :',
	'payflowpro_gateway-donor-email' => 'Adreça electronica :',
	'payflowpro_gateway-donor-fname' => 'Pichon nom :',
	'payflowpro_gateway-donor-mname' => 'Segond pichon nom :',
	'payflowpro_gateway-donor-lname' => "Nom d'ostal :",
	'payflowpro_gateway-donor-name' => 'Nom :',
	'payflowpro_gateway-donor-street' => 'Carrièra :',
	'payflowpro_gateway-donor-city' => 'Vila :',
	'payflowpro_gateway-donor-state' => 'Estat :',
	'payflowpro_gateway-donor-postal' => 'Còde postal :',
	'payflowpro_gateway-donor-country' => 'País / Region :',
	'payflowpro_gateway-donor-address' => 'Adreça :',
	'payflowpro_gateway-donor-card' => 'Carta de credit :',
	'payflowpro_gateway-donor-card-num' => 'Numèro de carta :',
	'payflowpro_gateway-donor-expiration' => "Data d'expiracion :",
	'payflowpro_gateway-donor-security' => 'Còde de seguretat :',
	'payflowpro_gateway-donor-submit' => 'Far un don',
	'payflowpro_gateway-donor-currency-msg' => 'Aqueste don es efectuat en $1',
	'payflowpro_gateway-error-msg' => 'Picatz vòstre $1',
	'payflowpro_gateway-error-msg-email' => '**Picatz una adreça de corrièl valida**',
	'payflowpro_gateway-error-msg-amex' => '**Picatz un numèro de carta American Express corrècte.**',
	'payflowpro_gateway-error-msg-mc' => '**Picatz un numèro de carta Mastercard corrècte.**',
	'payflowpro_gateway-error-msg-visa' => '**Picatz un numèro de carta Visa corrècte.**',
	'payflowpro_gateway-response-0' => 'Vòstre transaccion es estada aprovada.
Mercés per vòstre don !',
	'payflowpro_gateway-response-126' => "Vòstra transaccion es en cors d'aprovacion.",
	'payflowpro_gateway-response-12' => "Contactatz lo provesidor de vòstra carta de credit per mai d'entresenhas.",
	'payflowpro_gateway-response-13' => 'Vòstra transaccion requerís una autorizacion vocala.
Contactatz-nos per perseguir vòstra transaccion.',
	'payflowpro_gateway-response-114' => "Contactatz lo provesidor de vòstra carta de credit per mai d'entresenhas.",
	'payflowpro_gateway-response-23' => "La data d'expiracion de vòstre numèro de carta de credit es incorrècte.",
	'payflowpro_gateway-response-4' => 'Montant invalid.',
	'payflowpro_gateway-response-24' => "Vòstre numèro de carta de credit o data d'expiracion es incorrècte(a).",
	'payflowpro_gateway-response-112' => 'Vòstra adreça o numèro CVV (còde de seguretat) es incorrècte(a).',
	'payflowpro_gateway-response-125' => 'Vòstra transaccion es estada refusada pels Servicis de prevencion de las fraudas.',
	'payflowpro_gateway-response-default' => "Una error s'es producha al moment del tractament de vòstra transaccion.
Tornatz ensajar mai tard.",
	'php-response-declined' => 'Vòstra transaccion es estada refusada.',
	'payflowpro_gateway-post-transaction' => 'Detalhs de la transaccion',
	'payflowpro_gateway-submit-button' => 'Far un don',
);

/** Russian (Русский)
 * @author Александр Сигачёв
 */
$messages['ru'] = array(
	'payflowprogateway' => 'Поддержка Викимедиа',
	'payflowpro_gateway-desc' => 'Обработка кредитных карт PayPal Payflow Pro',
	'payflowpro_gateway-accessible' => 'Эта страница доступна только со страницы сбора пожертвований.',
	'payflowpro_gateway-form-message' => 'Сделайте пожертвование с вашей кредитной карты.
Существуют <a href="http://wikimediafoundation.org/wiki/Donate/WaysToGive/ru">другие способы сделать пожертвование, в том числе PayPal, чек, банковский перевод</a>.',
	'payflowpro_gateway-form-message-2' => 'Чтобы изменить сумму или валюту, вернитесь к <a href="/index.php?title=Donate">странице пожертвований</a>',
	'payflowpro_gateway-donor-legend' => 'Сведения о жертвователе',
	'payflowpro_gateway-card-legend' => 'Информация о кредитной карте',
	'payflowpro_gateway-amount-legend' => 'Сумма пожертвования:',
	'payflowpro_gateway-donor-amount' => 'Сумма:',
	'payflowpro_gateway-donor-email' => 'Адрес электронной почты:',
	'payflowpro_gateway-donor-fname' => 'Имя:',
	'payflowpro_gateway-donor-mname' => 'Среднее имя или отчество:',
	'payflowpro_gateway-donor-lname' => 'Фамилия:',
	'payflowpro_gateway-donor-name' => 'Имя:',
	'payflowpro_gateway-donor-street' => 'Улица:',
	'payflowpro_gateway-donor-city' => 'Город:',
	'payflowpro_gateway-donor-state' => 'Штат:',
	'payflowpro_gateway-donor-postal' => 'Почтовый индекс:',
	'payflowpro_gateway-donor-country' => 'Страна / регион:',
	'payflowpro_gateway-donor-address' => 'Адрес:',
	'payflowpro_gateway-donor-card' => 'Кредитная карта:',
	'payflowpro_gateway-donor-card-num' => 'Номер карты:',
	'payflowpro_gateway-donor-expiration' => 'Срок окончания действия:',
	'payflowpro_gateway-donor-security' => 'Код безопасности:',
	'payflowpro_gateway-donor-submit' => 'Пожертвовать',
	'payflowpro_gateway-donor-currency-msg' => 'Это пожертвование делается в $1',
	'payflowpro_gateway-error-msg' => 'Пожалуйста, введите $1',
	'payflowpro_gateway-error-msg-email' => '** Пожалуйста, введите правильный адрес электронной почты **',
	'payflowpro_gateway-error-msg-amex' => '** Пожалуйста, введите правильный номер карты American Express. **',
	'payflowpro_gateway-error-msg-mc' => '** Пожалуйста, введите правильный номер карты Mastercard. **',
	'payflowpro_gateway-error-msg-visa' => '** Пожалуйста, введите правильный номер карты Visa. **',
	'payflowpro_gateway-response-0' => 'Ваша транзакция была санкционирована.
Спасибо за ваше пожертвование!',
	'payflowpro_gateway-response-126' => 'Ваша транзакция ожидает санкционирования.',
	'payflowpro_gateway-response-12' => 'Пожалуйста, свяжитесь с компанией, выдавшей кредитную карту, для получения дополнительной информации.',
	'payflowpro_gateway-response-13' => 'Ваша транзакция требует голосовой авторизации.
Пожалуйста, свяжитесь с нами, чтобы продолжить операцию.',
	'payflowpro_gateway-response-114' => 'Пожалуйста, свяжитесь с компанией, выдавшей кредитную карту, для получения дополнительной информации.',
	'payflowpro_gateway-response-23' => 'Номер вашей кредитной карты и срок окончания её действия является неверным.',
	'payflowpro_gateway-response-4' => 'Некорректная сумма.',
	'payflowpro_gateway-response-24' => 'Номер вашей кредитной карты и срок окончания её действия является неверным.',
	'payflowpro_gateway-response-112' => 'Ваш адрес или номер CVV (код безопасности) является неправильным.',
	'payflowpro_gateway-response-125' => 'Ваша транзакция была отклонена Службой предотвращения мошенничества.',
	'payflowpro_gateway-response-default' => 'При обработке вашей транзакции возникла ошибка.
Пожалуйста, повторите попытку позже.',
	'php-response-declined' => 'Ваша транзакция была отклонена.',
	'payflowpro_gateway-post-transaction' => 'Сведения о транзакции',
	'payflowpro_gateway-submit-button' => 'Пожертвовать',
);

/** Turkish (Türkçe)
 * @author Joseph
 */
$messages['tr'] = array(
	'payflowprogateway' => "Wikimedia'yı destekleyin",
	'payflowpro_gateway-desc' => 'PayPal Payflow Pro kredi kartı işlemi',
	'payflowpro_gateway-accessible' => 'Bu sayfa sadece bağış sayfasından erişilebilirdir.',
	'payflowpro_gateway-form-message' => 'Kredi kartınızla katkıda bulunun.
<a href="http://wikimediafoundation.org/wiki/Donate/WaysToGive/en">Vermenin başka yolları da vardır, PayPal, çek, ya da posta gibi</a>.',
	'payflowpro_gateway-form-message-2' => 'Miktarı ya da para birimini değiştirmek için <a href="/index.php?title=Donate">bağış sayfasına</a> geri dönün',
	'payflowpro_gateway-donor-legend' => 'Bağışçı bilgisi',
	'payflowpro_gateway-card-legend' => 'Kredi kartı bilgisi',
	'payflowpro_gateway-amount-legend' => 'Bağış miktarı:',
	'payflowpro_gateway-donor-amount' => 'Miktar:',
	'payflowpro_gateway-donor-email' => 'E-posta adresi:',
	'payflowpro_gateway-donor-fname' => 'İlk ad:',
	'payflowpro_gateway-donor-mname' => 'Orta ad:',
	'payflowpro_gateway-donor-lname' => 'Soyisim:',
	'payflowpro_gateway-donor-name' => 'İsim:',
	'payflowpro_gateway-donor-street' => 'Cadde:',
	'payflowpro_gateway-donor-city' => 'Şehir:',
	'payflowpro_gateway-donor-state' => 'Eyalet:',
	'payflowpro_gateway-donor-postal' => 'Posta kodu:',
	'payflowpro_gateway-donor-country' => 'Ülke/Bölge:',
	'payflowpro_gateway-donor-address' => 'Adres:',
	'payflowpro_gateway-donor-card' => 'Kredi kartı:',
	'payflowpro_gateway-donor-card-num' => 'Kart numarası:',
	'payflowpro_gateway-donor-expiration' => 'Son kullanma tarihi:',
	'payflowpro_gateway-donor-security' => 'Güvenlik kodu:',
	'payflowpro_gateway-donor-submit' => 'Bağışla',
	'payflowpro_gateway-donor-currency-msg' => 'Bu bağış $1 para biriminde yapılıyor',
	'payflowpro_gateway-error-msg' => 'Şu alan gereklidir: $1',
	'payflowpro_gateway-error-msg-email' => '**Lütfen geçerli bir e-posta adresi girin**',
	'payflowpro_gateway-error-msg-amex' => '**Lütfen American Express için doğru bir kart numarası girin.**',
	'payflowpro_gateway-error-msg-mc' => '**Lütfen MasterCard için doğru bir kart numarası girin.**',
	'payflowpro_gateway-error-msg-visa' => '**Lütfen Visa için doğru bir kart numarası girin.**',
	'payflowpro_gateway-response-0' => 'İşleminiz onaylandı.
Bağışınız için teşekkürler!',
	'payflowpro_gateway-response-126' => 'İşleminiz onay bekliyor.',
	'payflowpro_gateway-response-12' => 'Daha fazla bilgi için lütfen kredi kartı şirketinizle irtibata geçin.',
	'payflowpro_gateway-response-13' => 'İşleminiz ses yetkilendirmesi istiyor.
İşleminize devam edebilmek için lütfen bizimle irtibata geçin.',
	'payflowpro_gateway-response-114' => 'Daha fazla bilgi için lütfen kredi kartı şirketinizle irtibata geçin.',
	'payflowpro_gateway-response-23' => 'Kredi kartı numaranız ya da son kullanma tarihi doğru değil.',
	'payflowpro_gateway-response-4' => 'Geçersiz miktar.',
	'payflowpro_gateway-response-24' => 'Kredi kartı numaranız ya da son kullanma tarihi doğru değil.',
	'payflowpro_gateway-response-112' => 'Adresiniz ya da CVV numaranız (güvenlik kodu) doğru değil.',
	'payflowpro_gateway-response-125' => 'İşleminiz Fraud Prevention Services tarafından reddedildi.',
	'payflowpro_gateway-response-default' => 'İşleminiz işlenirken bir hata oluştu.
Lütfen daha sonra tekrar deneyin.',
	'php-response-declined' => 'İşleminiz reddedildi.',
	'payflowpro_gateway-post-transaction' => 'İşlem detayları',
	'payflowpro_gateway-submit-button' => 'Bağışla',
);

/** Ukrainian (Українська)
 * @author Prima klasy4na
 */
$messages['uk'] = array(
	'payflowpro_gateway-donor-amount' => 'Сума:',
);

/** Vèneto (Vèneto)
 * @author Candalua
 */
$messages['vec'] = array(
	'payflowprogateway' => 'Juta Wikimedia',
	'payflowpro_gateway-form-message' => 'Contribuissi co la to carta de credito.
Ghe xe anca <a href="http://wikimediafoundation.org/wiki/Donate/WaysToGive/en">altre maniere par donar, come PayPal, co un assegno, o par posta</a>.',
	'payflowpro_gateway-donor-legend' => 'Informassion sul donator',
	'payflowpro_gateway-card-legend' => 'Informassion su la carta de credito',
	'payflowpro_gateway-amount-legend' => 'Inporto de la donassion:',
	'payflowpro_gateway-donor-amount' => 'Inporto:',
	'payflowpro_gateway-donor-email' => 'Indirisso e-mail:',
	'payflowpro_gateway-donor-fname' => 'Nome de batezo:',
	'payflowpro_gateway-donor-mname' => 'Secondo nome:',
	'payflowpro_gateway-donor-lname' => 'Cognome:',
	'payflowpro_gateway-donor-name' => 'Nome:',
	'payflowpro_gateway-donor-street' => 'Via:',
	'payflowpro_gateway-donor-city' => 'Sità:',
	'payflowpro_gateway-donor-state' => 'Stato:',
	'payflowpro_gateway-donor-postal' => 'Còdese postal:',
	'payflowpro_gateway-donor-country' => 'Paese/Region:',
	'payflowpro_gateway-donor-address' => 'Indirisso:',
	'payflowpro_gateway-donor-card' => 'Carta de credito:',
	'payflowpro_gateway-donor-card-num' => 'Nùmaro de carta:',
	'payflowpro_gateway-donor-expiration' => 'Data de scadensa:',
	'payflowpro_gateway-donor-security' => 'Còdese de sicuressa;',
	'payflowpro_gateway-donor-submit' => 'Dona',
	'payflowpro_gateway-donor-currency-msg' => 'Sta donassion la vien fata in $1',
	'payflowpro_gateway-error-msg' => 'Par piaser inserissi el to $1',
	'payflowpro_gateway-error-msg-email' => '**Par piaser, inserissi un indirisso e-mail valido**',
	'payflowpro_gateway-error-msg-amex' => '**Par piaser, inserissi un nùmaro de carta de credito American Express.**',
	'payflowpro_gateway-error-msg-mc' => '**Par piaser, inserissi un nùmaro de carta de credito MasterCard.**',
	'payflowpro_gateway-error-msg-visa' => '**Par piaser, inserissi un nùmaro de carta de credito Visa.**',
	'payflowpro_gateway-response-0' => 'La to transazion la xe stà aprovà.
Grassie de la to donassion!',
	'payflowpro_gateway-response-126' => 'La to transazion la xe drio spetar de vegner aprovà.',
	'payflowpro_gateway-response-12' => 'Par piaser, parla co la to conpagnia de carte de credito par savérghene piassè.',
	'payflowpro_gateway-response-13' => 'La to transazion la richiede na autorisassion a voce.
Par piaser ciàmene par continuar la transazion.',
	'payflowpro_gateway-response-23' => 'El to nùmaro de carta de credito o la data de scadensa i xe sbajà.',
	'payflowpro_gateway-response-4' => 'Inporto mia valido.',
	'payflowpro_gateway-response-24' => 'El to nùmaro de carta de credito o la data de scadensa i xe sbajà.',
	'payflowpro_gateway-response-default' => 'Ghe xe stà un eror durante el tratamento de la to transazion.
Par piaser, ripròa de novo tra un tocheto.',
	'php-response-declined' => 'La to transazion la xe stà rifiutà.',
	'payflowpro_gateway-post-transaction' => 'Detaji de la transazion',
	'payflowpro_gateway-submit-button' => 'Dona',
);

/** Vietnamese (Tiếng Việt)
 * @author Vinhtantran
 */
$messages['vi'] = array(
	'payflowprogateway' => 'Hỗ trợ Wikimedia',
	'payflowpro_gateway-desc' => 'Xử lý thẻ tín dụng PayPal Payflow Pro',
	'payflowpro_gateway-accessible' => 'Trang này chỉ truy cập được từ trang quyên góp.',
	'payflowpro_gateway-form-message' => 'Đóng góp bằng thẻ tín dụng của bạn.
Cũng có <a href="http://wikimediafoundation.org/wiki/Donate/WaysToGive/en">những cách khác để tặng tiền, bao gồm PayPal, séc, hoặc thư</a>.',
	'payflowpro_gateway-form-message-2' => 'Để thay đổi số tiền hoặc loại tiền, trở lại <a href="/index.php?title=Donate">trang quyên góp</a>',
	'payflowpro_gateway-donor-legend' => 'Thông tin người tặng',
	'payflowpro_gateway-card-legend' => 'Thông tin thẻ tín dụng',
	'payflowpro_gateway-amount-legend' => 'Số tiền gửi tặng:',
	'payflowpro_gateway-donor-amount' => 'Số tiền:',
	'payflowpro_gateway-donor-email' => 'Địa chỉ thư điện tử:',
	'payflowpro_gateway-donor-fname' => 'Tên:',
	'payflowpro_gateway-donor-mname' => 'Họ lót:',
	'payflowpro_gateway-donor-lname' => 'Họ:',
	'payflowpro_gateway-donor-name' => 'Tên:',
	'payflowpro_gateway-donor-street' => 'Đường:',
	'payflowpro_gateway-donor-city' => 'Thành phố:',
	'payflowpro_gateway-donor-state' => 'Bang:',
	'payflowpro_gateway-donor-postal' => 'Mã bưu chính:',
	'payflowpro_gateway-donor-country' => 'Quốc gia/Lãnh thổ:',
	'payflowpro_gateway-donor-address' => 'Địa chỉ:',
	'payflowpro_gateway-donor-card' => 'Thẻ tín dụng:',
	'payflowpro_gateway-donor-card-num' => 'Số thẻ:',
	'payflowpro_gateway-donor-expiration' => 'Ngày hết hạn:',
	'payflowpro_gateway-donor-security' => 'Mã an ninh:',
	'payflowpro_gateway-donor-submit' => 'Quyên góp',
	'payflowpro_gateway-donor-currency-msg' => 'Lần quyên góp này được trả bằng $1',
	'payflowpro_gateway-error-msg' => 'Xin nhập $1 của bạn',
	'payflowpro_gateway-error-msg-email' => '**Xin nhập vào một địa chỉ thư điện tử hợp lệ**',
	'payflowpro_gateway-error-msg-amex' => '**Xin nhập vào số thẻ đúng dành cho American Express.**',
	'payflowpro_gateway-error-msg-mc' => '**Xin nhập vào số thẻ đúng dành cho Mastercard.**',
	'payflowpro_gateway-error-msg-visa' => '**Xin nhập vào số thẻ đúng dành cho Visa.**',
	'payflowpro_gateway-response-0' => 'Giao dịch của bạn đã được chứng nhận.
Cảm ơn sự đóng góp của bạn!',
	'payflowpro_gateway-response-126' => 'Giao dịch của bạn đang chờ được chứng nhận.',
	'payflowpro_gateway-response-12' => 'Xin liên hệ với công ty thẻ tín dụng của bạn để biết thêm chi tiết.',
	'payflowpro_gateway-response-23' => 'Số thẻ tín dụng của bạn hoặc ngày hết hạn không đúng.',
	'payflowpro_gateway-response-4' => 'Số tiền không hợp lệ.',
	'payflowpro_gateway-response-24' => 'Số thẻ tín dụng hoặc ngày hết hạn không đúng.',
	'payflowpro_gateway-response-112' => 'Địa chỉ hoặc mã an ninh của bạn không đúng.',
	'payflowpro_gateway-response-125' => 'Giao dịch của bạn đã bị Dịch vụ Ngăn chặn Giả mạo từ chối.',
	'payflowpro_gateway-response-default' => 'Có lỗi khi xử lý giao dịch của bạn.
Xin hãy thử lại vào lần sau.',
	'php-response-declined' => 'Giao dịch của bạn đã bị từ chối.',
	'payflowpro_gateway-post-transaction' => 'Chi tiết giao dịch',
	'payflowpro_gateway-submit-button' => 'Đóng góp',
);

/** Simplified Chinese (‪中文(简体)‬)
 * @author Bencmq
 */
$messages['zh-hans'] = array(
	'payflowprogateway' => '支持维基媒体',
	'payflowpro_gateway-desc' => 'PayPal Payflow Pro信用卡处理',
	'payflowpro_gateway-accessible' => '本页只能从资助页面访问',
	'payflowpro_gateway-form-message' => '用您的信用卡捐助。
此外还可以通过<a href="http://wikimediafoundation.org/wiki/Donate/WaysToGive/zh-hans">其他途径捐助，包括PayPal，支票或邮件</a>。',
	'payflowpro_gateway-form-message-2' => '要更改数额或币种，请返回<a href="/index.php?title=Donate">资助页面</a>',
	'payflowpro_gateway-donor-legend' => '捐助人信息',
	'payflowpro_gateway-card-legend' => '信用卡信息',
	'payflowpro_gateway-amount-legend' => '捐助数额：',
	'payflowpro_gateway-donor-amount' => '总额：',
	'payflowpro_gateway-donor-email' => '电子邮箱地址：',
	'payflowpro_gateway-donor-fname' => '名：',
	'payflowpro_gateway-donor-mname' => '中间名：',
	'payflowpro_gateway-donor-lname' => '姓：',
	'payflowpro_gateway-donor-name' => '姓名：',
	'payflowpro_gateway-donor-street' => '街道',
	'payflowpro_gateway-donor-city' => '城市：',
	'payflowpro_gateway-donor-state' => '州或省：',
	'payflowpro_gateway-donor-postal' => '邮编：',
	'payflowpro_gateway-donor-country' => '国家/地区：',
	'payflowpro_gateway-donor-address' => '地址：',
	'payflowpro_gateway-donor-card' => '信用卡：',
	'payflowpro_gateway-donor-card-num' => '信用卡号码：',
	'payflowpro_gateway-donor-expiration' => '到期日：',
	'payflowpro_gateway-donor-security' => '安全码：',
	'payflowpro_gateway-donor-submit' => '捐助',
	'payflowpro_gateway-donor-currency-msg' => '这笔捐款使用的币种是$1',
	'payflowpro_gateway-error-msg' => '请输入您的$1',
	'payflowpro_gateway-error-msg-email' => '**请输入有效的电子邮件地址**',
	'payflowpro_gateway-error-msg-amex' => '**请输入正确的美国运通（American Express）信用卡安全码。**',
	'payflowpro_gateway-error-msg-mc' => '**请输入正确的万事达卡（Mastercard）安全码。**',
	'payflowpro_gateway-error-msg-visa' => '**请输入正确的维萨卡（Visa）安全码。**',
	'payflowpro_gateway-response-0' => '您的交易已经成功。
感谢您的捐助！',
	'payflowpro_gateway-response-126' => '您的交易正在等待确认中。',
	'payflowpro_gateway-response-12' => '请向您的信用卡公司咨询更多信息。',
	'payflowpro_gateway-response-13' => '您的交易需要语音授权。
请联系我们以完成您的这笔交易。',
	'payflowpro_gateway-response-114' => '请向您的信用卡公司咨询更多信息。',
	'payflowpro_gateway-response-23' => '您的信用卡号码或有效期有误。',
	'payflowpro_gateway-response-4' => '无效的数额。',
	'payflowpro_gateway-response-24' => '您的信用卡号或有效期有误。',
	'payflowpro_gateway-response-112' => '您的地址或CVV码（安全码）有误。',
	'payflowpro_gateway-response-125' => '反欺诈系统拒绝了您的捐献。',
	'payflowpro_gateway-response-default' => '在处理交易的过程中出错。
请稍后再试。',
	'php-response-declined' => '您的交易被拒绝。',
	'payflowpro_gateway-post-transaction' => '交易详情',
	'payflowpro_gateway-submit-button' => '捐助',
);

