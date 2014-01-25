<?php
require_once('connection/config.php');
require_once('connection/mail.php');
$mod = $_REQUEST['m'];
$act = $_REQUEST['a'];
$crud = $_REQUEST['crud'];

if($mod == 'htmlpage')
{
	include($act.'.php');
}
else if($mod == 'api')
{
	include($act.'.php');
}
else if($mod == 'reports')
{
	
}
?>