<html>
<body>
<pre>
<?php

$xmlfile = simplexml_load_file('T8V72PA.xml');
$xmlsku=$xmlfile->content->system->product_numbers->prodnum;
echo $xmlsku;
$xmlimages = $xmlfile->images;
// print_r($xmlfile->images->image);
$fp = fopen('url.file', 'w');
foreach ($xmlimages as $xmlimage) {
	// print_r($xmlimage);
	foreach ( $xmlimage as $image ) {
		// print_r($image);
		if($image->pixel_height > 600 && $image->pixel_height < 2000 ) { 
			//echo $image->image_url_http . ' => ' . $image->pixel_height . '<br/>';
			$url = "wget $image->image_url_http\n";
			//echo $url;
		  
		  fwrite($fp, $url);
          
			//$cmd = "wget ".$url."";
			
			//file_put_contents($img, file_get_contents($url));
		}
	}
}


fclose($fp);

/*$command="chmod +x url.file";
exec($command, $output);
exec("./url.file");

/*$cmd = "./url.file";

while (@ ob_end_flush()); // end all output buffers if any

$proc = popen($cmd, 'r');
echo '<pre>';
while (!feof($proc))
{
    echo fread($proc, 4096);
    @ flush();
}
echo '</pre>';
*/
echo "<pre>download complete</pre>";
?>
</pre>
</body>
</html>
