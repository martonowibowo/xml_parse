<pre>
<?php
$xmlfile = simplexml_load_file('T8V72PA.xml');
$xmlimages = $xmlfile->images;
// print_r($xmlfile->images->image);
foreach ($xmlimages as $xmlimage) {
	// print_r($xmlimage);
	foreach ( $xmlimage as $image ) {
		// print_r($image);
		if($image->pixel_height > 600) { 
			// echo $image->image_url_https . ' => ' . $image->pixel_height . '<br/>';
			echo '<img src="' . $image->image_url_https . '" width="600" /> <br/>';
		}
	}
}
//$xml = simplexml_load_string('$xmlfile');
//$json = json_encode($xml);
//$array = json_decode($json,TRUE);
//print_r($array);
?>
</pre>
