<?php

$dir = dirname( __FILE__ );
$wgAutoloadClasses['TrustedMath'] = "$dir/TrustedMath_body.php";
$wgAutoloadClasses['TrustedMathHooks'] = "$dir/TrustedMathHooks.php";

$wgExtensionMessagesFiles['TrustedMath'] = "$dir/TrustedMath.i18n.php";

$wgExtensionFunctions[] = 'TrustedMathHooks::initGlobals';
$wgHooks['ParserFirstCallInit'][] = 'TrustedMathHooks::onParserFirstCallInit';
#Broken
#$wgHooks['ParserAfterStrip'][] = 'TrustedMathHooks::onParserAfterStrip';


$wgTrustedMathLatexPath = null;
$wgTrustedMathDviPngPath = null;
$wgTrustedMathDirectory = null;
$wgTrustedMathPath = null;
$wgTrustedMathUnsafeMode = false;
$wgTrustedMathNamespace = 262;