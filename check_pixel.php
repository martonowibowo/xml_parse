<?php
$servername = "localhost";
$username = "root";
$password = "secure";
$dbname = "xml_image";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT url FROM url";
$result = mysqli_query($conn, $sql);

$data = array();
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
      list($width, $height, $type, $attr) = getimagesize($row["url"]);
	  echo "Height: " .$height. "url: " . $row["url"]. "<br />";
	 
	 if ($height > 100 && $height < 400)
	 {
		 $data[] = $row["url"];
	 }
	 
	 
	  
	  //$sql_insert = 'INSERT INTO url_fix (url) VALUES ("'. $row[url] .'")';
		//mysqli_query($conn, $sql_insert);
	  //echo "url: " . $row["url"]. "Width: " .$width."<br>" ;
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
print_r($data);


//list($width, $height, $type, $attr) = getimagesize("http://h10003.www1.hp.com/digmedialib/prodimg/lowres/c04898865.png");

//echo "Width: " .$width. "<br />";
//echo "Height: " .$height. "<br />";
//echo "Type: " .$type. "<br />";
//echo "Attribute: " .$attr. "<br />";
//$img = get_headers("http://h10003.www1.hp.com/digmedialib/prodimg/lowres/c04898865.png", 1);
//print $img["Content-Length"];

?>
