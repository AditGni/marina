<?php 
function youtube($url){
	$link=str_replace('http://www.youtube.com/watch?v=', '', $url);
	$link=str_replace('https://www.youtube.com/watch?v=', '', $link);
	$data='<object width="100%" height="350" data="http://www.youtube.com/v/'.$link.'" type="application/x-shockwave-flash">
	<param name="src" value="http://www.youtube.com/v/'.$link.'" />
	</object>';
	return $data;
}
 
?>