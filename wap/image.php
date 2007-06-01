<?php # phpinfo();
	error_reporting(E_ALL);
# echo($_SERVER['QUERY_STRING']);
# echo($_SERVER['HTTP_ACCEPT']);
 	$img = (FALSE);
	$src = ($_SERVER['QUERY_STRING']);
	$sf = (strtolower(preg_replace('/^.*\./', '', $src)));
	switch($sf)
	{
		case 'gif' :
			$img = imagecreatefromgif($src);
			break;
		case 'jpg' :
		case 'jpeg' :
		case 'jfif' :
			$img = imagecreatefromjpeg($src);
			break;
		case 'svg' :
#			$img = imagecreatefromsvg($src);
#			break;
		case 'png' :
			$img = imagecreatefrompng($src);
			break;
		case 'bmp' :
			$img = imagecreatefrombmp($src);
			break;
		case 'xbm' :
			$img = imagecreatefromxbm($src);
			break;
		case 'xpm' :
			$img = imagecreatefromxpm($src);
			break;
		default :
			$img = imagecreatefromstring($src);
			break;
	}

	if($img)
	{
		$accept = isset( $_SERVER['HTTP_ACCEPT'] ) ? $_SERVER['HTTP_ACCEPT'] : '';
		$types = array_map( 'trim', explode( ',', $accept ) );
		$mozilla = substr( $_SERVER['HTTP_USER_AGENT'], 0, strlen( 'Mozilla' ) ) == 'Mozilla';
		if ( $mozilla || in_array( 'image/gif', $types ) ) {
			header('Content-Type: image/gif');
			imagegif($img);
		} else {
			header('Content-Type: image/vnd.wap.wbmp');
			imagewbmp($img);
		}
	}
?>
