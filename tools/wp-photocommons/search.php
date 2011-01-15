<?php
$path = dirname($_SERVER['PHP_SELF']);
// Standalone is used to develop this page directly, without having to load
// it in admin.
$standalone = empty($_GET['standalone']);

if ($standalone) : ?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="<?=$dir?>/css/ui-lightness/jquery-ui-1.8.5.custom.css" />
    <link rel="stylesheet" href="<?=$dir?>/css/jquery.suggestions.css" />
    <link rel="stylesheet" href="css/search.css" />
</head>
<body>
<?php endif; ?>

    <label for="wp-photoommons-search">Zoek:</label>
	<input type="search" id="wp-photocommons-search" />

	<ul id="wp-photocommons-results"></ul>

	<img src="<? echo $path; ?>/img/loading.gif" style="display:none;" id="wp-photocommons-loading" />

	<div id="wp-photocommons-images"></div>

<?php if ($standalone) : ?>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
	<script src="<? echo $path; ?>/js/jquery-ui-1.8.5.custom.min.js"></script>
	<script src="<? echo $path; ?>/js/search.js"></script>
	<script src="<? echo $path; ?>/js/jquery.suggestions.js"></script>
</body>
</html>
<?php endif; ?>