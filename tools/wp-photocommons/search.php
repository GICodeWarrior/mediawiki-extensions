<?php
 if ( basename( $_SERVER['SCRIPT_FILENAME'] ) == 'search.php' ) : ?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
	<script src="js/jquery-ui-1.8.5.custom.min.js"></script>
	<script src="search.js"></script>
    <link rel="stylesheet" href="css/ui-lightness/jquery-ui-1.8.5.custom.css" />
</head>
<body>
<?php endif; ?>


	<input type="search" id="wp-photocommons-search" />

	<ul id="wp-photocommons-results"></ul>

	<img src="img/loading.gif" style="display:none;" id="wp-photocommons-loading" />

	<div id="wp-photocommons-images"></div>




<?php if ( basename( $_SERVER['SCRIPT_FILENAME'] ) == 'search.php' ) : ?>
</body>
</html>
<?php endif; ?>