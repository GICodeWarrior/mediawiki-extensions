/**
 * InScript regular expression rules table for Tamil
 * @author Amir E. Aharoni ([[User:Amire80]])
 * based on the Malayalam map by
 * @author Junaid P V ([[User:Junaidpv]])
 * and Fedora Tamil keyboard layout:
 * http://fedoraproject.org/wiki/I18N/Indic/TamilKeyboardLayouts
 * @date 2011-11-29
 * License: GPLv3
 */
var rules = [
['`', '', 'ொ'],
['~', '', 'ஒ'],

['&', '', 'க்ஷ்'],

['\\(', '', '\u200D'], // ZWJ
['\\)', '', '\u200C'], // ZWNJ

['_', '', 'ஃ'],

['q', '', 'ௌ'],
['Q', '', 'ஔ'],
['w', '', 'ை'],
['W', '', 'ஐ'],
['e', '', 'ா'],
['E', '', 'ஆ'],
['r', '', 'ீ'],
['R', '', 'ஈ'],
['t', '', 'ூ'],
['T', '', 'ஊ'],
['u', '', 'ஹ'],
['U', '', 'ங'],
['p', '', 'ஜ'],
['\\}', '', 'ஞ்'],

['a', '', 'ோ'],
['A', '', 'ஓ'],
['s', '', 'ே'],
['S', '', 'ஏ'],
['d', '', '்'],
['D', '', 'அ'],
['f', '', 'ி'],
['F', '', 'இ'],
['g', '', 'ு'],
['G', '', 'உ'],
['h', '', 'ப'],
['j', '', 'ர'],
['J', '', 'ற'],
['k', '', 'க'],
['l', '', 'த'],
[';', '', 'ச'],
['\'', '', 'ட'],

['z', '', 'ெ'],
['Z', '', 'எ'],
['x', '', 'ஂ'],
['X', '', 'ௐ'], // Should be ext-shifted
['c', '', 'ம'],
['C', '', 'ண'],
['v', '', 'ந'],
['V', '', 'ன'],
['b', '', 'வ'],
['B', '', 'ழ'],
['n', '', 'ல'],
['N', '', 'ள'],
['m', '', 'ஸ'],
['M', '', 'ஶ'],
['<', '', 'ஷ'],
['/', '', 'ய']
];

jQuery.narayam.addScheme( 'ta-inscript', {
	'namemsg': 'narayam-ta-inscript',
	'extended_keyboard': false,
	'lookbackLength': 2,
	'keyBufferLength': 0,
	'rules': rules
} );
