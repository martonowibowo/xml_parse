<html>
<body>

<?php
exec("ls -a uploads/| grep .xml",$output);
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
			$url = "wget -P download/$xmlsku $image->image_url_http\n";
			//echo $url;
		  fwrite($fp, $url);
		}
	}
}
}
fwrite($fp, "zip -r download.zip download");
fclose($fp);
exec("chmod +x url.file");
exec("./url.file ");
exec("rm -rf uploads/* | rm -rf url.file | rm -rf download/");
echo '<h4><a href="http://172.16.0.20/xml_image/download.zip" target="_blank">Download all image in zip</h4>';
//---------------------------------------------------------------------------------------//

?>
</body>
</html>
