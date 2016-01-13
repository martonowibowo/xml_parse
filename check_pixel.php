<pre>
<?php
$xmlfile = simplexml_load_file('T8V72PA.xml');
$xmlimages = $xmlfile->images;
// print_r($xmlfile->images->image);
foreach ($xmlimages as $xmlimage) {
	// print_r($xmlimage);
	foreach ( $xmlimage as $image ) {
		// print_r($image);
		if($image->pixel_height > 600 && $image->pixel_height < 2000 ) { 
			echo $image->image_url_https . ' => ' . $image->pixel_height . '<br/>';
		}
	}
}

?>
<pre>
