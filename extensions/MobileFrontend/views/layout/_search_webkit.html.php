<?php
global $wgExtensionAssetsPath, $wgMobileFrontendLogo;

$searchField = htmlspecialchars( self::$searchField );
$mainPageUrl = self::$mainPageUrl;
$randomPageUrl = self::$randomPageUrl;
$homeButton = self::$messages['mobile-frontend-home-button'];
$randomButton = self::$messages['mobile-frontend-random-button'];

$scriptUrl = wfScript();
$searchBoxDisplayNone = ( self::$hideSearchBox ) ? ' style="display: none;" ' : '';

$openSearchResults = ( self::$isBetaGroupMember ) ? '<div id="results"></div>' : '';

$languageSelection = self::buildLanguageSelection() . '<br/>';
$languageSelectionText = '<b>' . self::$messages['mobile-frontend-language'] . ':</b><br/>';
$languageSelectionDiv = ( self::$isBetaGroupMember ) ? '<div id="languageselectionsection">' . $languageSelectionText . $languageSelection . '</div>' : '';

$searchWebkitHtml = <<<EOD
<div id='header'>
	<div id='searchbox'>
	<img width="35" height="22" alt='Logo' id='logo' src='{$wgMobileFrontendLogo}' />
	<form action='{$scriptUrl}' class='search_bar' method='get' {$searchBoxDisplayNone}>
	  <input type="hidden" value="Special:Search" name="title" />
		<div id="sq" class="divclearable">
			<input type="text" name="search" id="search" size="22" value="{$searchField}" autocomplete="off" />
			<div class="clearlink" id="clearsearch"></div>
		</div>
	  <button id='goButton' type='submit'></button>
	</form>
	{$openSearchResults}
	</div>
	<div class='nav' id='nav'>
	{$languageSelectionDiv}
	<button onclick="javascript:location.href='{$mainPageUrl}';" type="submit" id="homeButton">{$homeButton}</button>
	<button onclick="javascript:location.href='{$randomPageUrl}';" type="submit" id="randomButton">{$randomButton}</button>
  </div>
</div>
EOD;