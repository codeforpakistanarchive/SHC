<?php
$callerid =  $argv[1];
$treeid =  $argv[2];
$FilePath   $argv[3];=

$con = mysql_connect("localhost","root","yourpassword");
if (!$con){
	die('Could not connect: ' . mysql_error());
}
$filepath = "localhost/downloader.php?filename=".$FilePath."";

$con = mysql_connect("localhost","root","1022AmirDavid");
if (!$con){
	die('Could not connect: ' . mysql_error());
}
mysql_select_db("IVRLogs", $con);
$query = "INSERT INTO cdrs (callerid, treeid, filename) VALUES ('$callerid','$treeid','$filepath');";
$result = mysql_query(query);
echo $query;
mysql_close($con);
?>

