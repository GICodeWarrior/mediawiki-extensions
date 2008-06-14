<?php
/*
cortado_embed.php
all file checks and conditions should be checked prior to loading this page.
this page serves as a wrapper for the cortado java applet
*/
//load the http GETS:

// set the parent domain if provided
// needed before error_out can be called
$parent_domain = isset( $_GET['parent_domain'] ) ? wfEscapeJsString( $_GET['parent_domain'] ) : false;

$error='';
if(!function_exists('filter_input')){
	error_out('you version of php lacks <b>filter_input()</b> function</br>');
}
//default to null media in not provided:
$media_url = isset( $_GET['media_url'] ) ? htmlspecialchars( $_GET['media_url'] ) : false;
if( is_null($media_url) || $media_url===false || $media_url==''){
	error_out('not valid or missing media url');
}
//default duration to 30 seconds if not provided. (ideally cortado would read this from the video file)
//$duration = (isset($_GET['duration']))?$_GET['duration']:0;
$duration = filter_input(INPUT_GET, 'duration', FILTER_SANITIZE_NUMBER_INT);
if( is_null($duration) || $duration===false){
	$duration=0;
}

//id (set to random if none provided)
//$id = (isset($_GET['id']))?$_GET['id']:'vid_'.rand('10000000');
$id = isset($_GET['id']) ? htmlspecialchars( $_GET['id'] ) : false;
if( is_null($id) || $id===false){
	$id = 'vid_'.rand(0,10000000);
}

$width = filter_input(INPUT_GET, 'width', FILTER_SANITIZE_NUMBER_INT);
if( is_null($width) || $width===false){
	$width=320;
}
$height = filter_input(INPUT_GET, 'height', FILTER_SANITIZE_NUMBER_INT);
//default to video:
$stream_type = (isset($_GET['stream_type']))?$_GET['stream_type']:'video';
if($stream_type=='video'){
	$audio=$video='true';	
	if(is_null($height) || $height===false)
		$height = 240;
}
if($stream_type=='audio'){
	$audio='true';
	$video='false';
	if(is_null($height) || $height===false)
		$height = 20;	
}

//everything good output page: 
output_page();

/**
 * JS escape function copied from MediaWiki's Xml::escapeJsString()
 */
function wfEscapeJsString( $string ) {
	// See ECMA 262 section 7.8.4 for string literal format
	$pairs = array(
		"\\" => "\\\\",
		"\"" => "\\\"",
		'\'' => '\\\'',
		"\n" => "\\n",
		"\r" => "\\r",

		# To avoid closing the element or CDATA section
		"<" => "\\x3c",
		">" => "\\x3e",

		# To avoid any complaints about bad entity refs
		"&" => "\\x26",

		# Work around https://bugzilla.mozilla.org/show_bug.cgi?id=274152
		# Encode certain Unicode formatting chars so affected
		# versions of Gecko don't misinterpret our strings;
		# this is a common problem with Farsi text.
		"\xe2\x80\x8c" => "\\u200c", // ZERO WIDTH NON-JOINER
		"\xe2\x80\x8d" => "\\u200d", // ZERO WIDTH JOINER
	);
	return strtr( $string, $pairs );
}

function error_out($error=''){
	output_page($error);
	exit();
}
function output_page($error=''){
	global $id, $media_url, $audio, $video, $duration, $width, $height, $parent_domain;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>cortado_embed</title>
	<?if($parent_domain){?>
	<script type="text/javascript">
		window.DOMAIN = '<?=$parent_domain; ?>';
	</script>
	<?}?>
	<style type="text/css">
	<!--
	body {
		margin-left: 0px;
		margin-top: 0px;
		margin-right: 0px;
		margin-bottom: 0px;
	}
	-->
	</style></head>
	<body>
	<?if ($error==''){ ?>
		<applet id="<?=$id?>" code="com.fluendo.player.Cortado.class" archive="cortado-ovt-stripped_r34336.jar" width="<?=$width?>" height="<?=$height?>">
			<param name="url" value="<?=$media_url?>" />
			<param name="local" value="false"/>
			<param name="keepaspect" value="true" />
			<param name="video" value="<?=$audio?>" />
			<param name="audio" value="<?=$video?>" />
			<param name="seekable" value="true" />
			<? if($duration!=0){
				?>
				<param name="duration" value="<?=$duration?>" />
				<?
			 } ?>
			<param name="bufferSize" value="200" />
		</applet>
	<? }else{ ?>
		<b>Error:</b> <?=$error?>	
	<?
	}
	?>
	</body>
	</html>
<?
}
?>
