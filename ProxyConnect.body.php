<?
class ProxyConnect extends SpecialPage {

    function __construct() {
        SpecialPage::SpecialPage( 'ProxyConnect' );
    }

    function execute ($par) {
		global $wgUser, $wgOut;
		$wgOut->disable();
		header("Content-type: text/plain;");
		if ($wgUser->getID() == 0)
			return;
		$result = "";
		$result .= "UniqueID={$wgUser->getID()}\n";
		$result .= "Name={$wgUser->getName()}\n";
		$result .= "Email={$wgUser->getEmail()}\n";
		wfDebug("ProxyConnect: returning $result\n");
		echo $result;
		return;
	}
}
