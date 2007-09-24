<?php
/**
 * TemplateLink extension - shows a template as a new page
 *
 * @package MediaWiki
 * @subpackage Extensions
 * @author Magnus Manske
 * @copyright © 2007 Magnus Manske
 * @licence GNU General Public Licence 2.0 or later
 */

class TemplateLink extends SpecialPage
{
        function TemplateLink(){
                SpecialPage::SpecialPage("TemplateLink");
                self::loadMessages();
        }
 
        function execute( $par ){
                global $wgOut, $wgRequest;

                $this->setHeaders();
                $template = $wgRequest->getText('template');
 
                # Check if parameter is empty
                $template = trim( $template );
                if( $template == '' ){
                  $wgOut->addWikiText( wfMsg('templatelink_empty') );
                  return;
                }
 
                # Expand template
                $wikitext = '{{' . $template. '}}';

                # Output
#                $wgOut->addWikiText( $wikitext ); # This works, but is not recommended on mediawiki.org...
                $wgOut->addHTML( $this->sandboxParse( $wikitext ) ); # ...so we'll use this one.
                

                # Setting page tatle based on used template, except if there's a title argument passed
                $title = $wgRequest->getText('newtitle');
                if( $title == '' ){
                  $title = ucfirst( trim( array_shift( explode( '|', $template, 2 ) ) ) );
                  $wgOut->setPageTitle( wfMsg( 'templatelink_newtitle' , $title ) );
                } else {
                  $wgOut->setPageTitle( $title );
                }
                
        }
        
        function sandboxParse($wikiText){
          global $wgTitle, $wgUser;
          $myParser = new Parser();
          $myParserOptions = new ParserOptions();
          $myParserOptions->initialiseFromUser($wgUser);
          $result = $myParser->parse($wikiText, $wgTitle, $myParserOptions);
          return $result->getText();
        }
 
        function loadMessages(){
                static $messagesLoaded = false;
                global $wgMessageCache;
                if( $messagesLoaded )return;
                $messagesLoaded = true;
 
                require( dirname( __FILE__ ). '/TemplateLink.i18n.php' );
                foreach( $allMessages as $lang => $langMessages ){
                        $wgMessageCache->addMessages( $langMessages, $lang );
                }
                return true;
        }
}
