<html>
<body>
<pre>
<?php
exec("ls -a | grep .xml",$output);
$fp = fopen('url.file', 'w');
foreach($output as $xmlfle)
{
//Parse XML File-----------------------------------//
$xmlfile = simplexml_load_file($xmlfle);
$xmlsku=$xmlfile->content->system->product_numbers->prodnum;
echo $xmlsku;
$xmlimages = $xmlfile->images;
// print_r($xmlfile->images->image);

foreach ($xmlimages as $xmlimage) {
	// print_r($xmlimage);
	foreach ( $xmlimage as $image ) {
		// print_r($image);
		if($image->pixel_height > 600 && $image->pixel_height < 2000 ) { 
			//echo $image->image_url_http . ' => ' . $image->pixel_height . '<br/>';
			$url = "wget -P $xmlsku $image->image_url_http\n";
			//echo $url;
		  fwrite($fp, $url);
		}
	}
}
}
fclose($fp);
echo "<pre>download complete</pre>";
//---------------------------------------------------------------------------------------//

?>
</pre>
</body>
</html>
