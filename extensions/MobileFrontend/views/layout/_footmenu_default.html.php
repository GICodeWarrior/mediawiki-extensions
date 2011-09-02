<?php

$regularSite = self::$messages['mobile-frontend-regular-site'];
$permStopRedirect = self::$messages['mobile-frontend-perm-stop-redirect'];
$copyright = self::$messages['mobile-frontend-copyright'];
$disableImages = self::$messages['mobile-frontend-disable-images'];
$enableImages = self::$messages['mobile-frontend-enable-images'];
$leaveFeedback = self::$messages['mobile-frontend-leave-feedback'];

$leaveFeedbackURL = self::$currentURL . '&mobileaction=leave_feedback';

$disableMobileSiteURL = self::$disableMobileSiteURL;
$viewNormalSiteURL = self::$viewNormalSiteURL;

if ( self::$disableImages == 0 ) {
	$imagesToggle = $disableImages;
	$imagesURL = self::$disableImagesURL;
} else {
	$imagesToggle = $enableImages;
	$imagesURL = self::$enableImagesURL;
}

$footerHtml = <<<EOD
    <div id='footer'> 
      <div class='nav' id='footmenu'> 
        <div class='mwm-notice'> 
          <a href="{$viewNormalSiteURL}">{$regularSite}</a> | <a href="{$imagesURL}">{$imagesToggle}</a> | <a href="{$leaveFeedbackURL}">{$leaveFeedback}</a>
            <div id="perm"> 
              <a href="{$disableMobileSiteURL}">{$permStopRedirect}</a> 
            </div> 
        </div> 
      </div> 
      <div id='copyright'>{$copyright}</div> 
    </div>

EOD;
