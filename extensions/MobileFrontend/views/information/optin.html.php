<?php
$optInHtml = <<<EOT
 <h1> 
          {$optInMessage}
        </h1> 
        <p> 
          {$explainOptIn}
        </p> 
        <div id='disableButtons'> 
          <form action='/' method='get'> 
            <input name='mobileaction' type='hidden' value='opt_in_cookie' /> 
            <button id='disableButton' type='submit'>{$yesButton}</button> 
          </form> 
          <form action='/' method='get'> 
            <button id='backButton' type='submit'>{$noButton}</button> 
          </form> 
        </div>
EOT;
