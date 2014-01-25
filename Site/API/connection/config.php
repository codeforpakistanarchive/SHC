<?
//error_reporting(5);
session_start();
if($_REQUEST["format"] != 'json' && $_REQUEST["m"] != 'htmlpage' && $_SERVER['PHP_SELF']!='/APIResponse/hotmailContacts.php' && $_SERVER['PHP_SELF']!='/APIResponse/gmailContacts.php')
	header ("Content-Type:text/xml;charset=iso-8859-1");
		
// MYSQL SETTINGS

if($_SERVER['HTTP_HOST']=='localhost' || $_SERVER['HTTP_HOST']=='192.168.20.250')
{
	define('MYSQL_HOST', 'localhost');
	define('MYSQL_USERNAME', 'root');
	define('MYSQL_PASSWORD', '');
	define('MYSQL_DATABASE', 'social_hackathon');
	
	// set application Host name
	define( '__app_host' , "localhost/SocialHackathon/" );
	define( '__app_ssl_host' , "localhost/SocialHackathon/" );

}
else
{
	define('MYSQL_HOST', 'localhost');
	define('MYSQL_USERNAME', 'webfurps_shc2');
	define('MYSQL_PASSWORD', 'h2f}zlRnk161');
	define('MYSQL_DATABASE', 'webfurps_shc');
	
	// set application Host name
	define( '__app_host' , "shc.webfurps.com/" );
	define( '__app_ssl_host' , "shc.webfurps.com/" );

}

define( '__apiaccessid' , 'php' );
define( '__passphrase' , '1234' );
define( '__app_normal_url' , "http://".__app_host );


// SMS SETTINGS
define('SMS_USER_NAME', 'php');
define('SMS_PASSWORD', '1234');

include("functions.php");

connectToDB();

define('SUPPORT_EMAIL', 'support@shc.webfurps.com');
define('SMS_FROM', 'SHC');
define('COMPANY_NAME', 'SHC');


define( '__smpt_host' , "shc.webfurps.com" );
define( '__smpt_port' , 25 );
define( '__smpt_username' , "support@shc.webfurps.com" );
define( '__smtp_password' , "12345" );

define( '__smtp_auth' , 1 );
define( '__smtp_fromemail' , 'support@shc.webfurps.com' );
define( '__smtp_fromname' , "SHC" );
define( '__smtp_wordwrap' , 500 );

// include("mail.php");
?>