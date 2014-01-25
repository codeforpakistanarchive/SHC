<?
session_start();
if($_SERVER['HTTP_HOST']=="localhost")
{
	$sel = mysql_connect("localhost", "root", "") or die(mysql_error());
	$db = mysql_select_db("social_hackathon", $sel) or die(mysql_error());
}
else
{
	$sel = mysql_connect("localhost", "webfurps_shc2", "h2f}zlRnk161") or die(mysql_error());
	$db = mysql_select_db("webfurps_shc", $sel) or die(mysql_error());
}
?>