<?
define( '__phpmailer', 'phpmailer/' );
require_once( __phpmailer . 'class.phpmailer.php' );

class EventoEmail extends PHPMailer
{
	function __construct( )
	{
		$this->PluginDir = __phpmailer;
		$this->IsSMTP();			   // set mailer to use SMTP
		$this->Host     = __smpt_host; // specify main and backup server
		$this->SMTPAuth = true;		   // turn on SMTP authentication
		$this->Username = __smpt_username; // SMTP username
		$this->Password = __smtp_password; // SMTP password
		$this->Port     = __smpt_port;
		$this->From     = __smtp_fromemail;
		$this->FromName = __smtp_fromname;
		$this->WordWrap = __smtp_wordwrap; // set word wrap to 50 characters
		$this->IsHTML( true );		   // set email format to HTML
		$this->error = "";			   // SMTP ERROR while sending email
	}

	// ==============================================
	// Send Email major function
	// ==============================================
	function sendEmail( $subject = "", $body = "", $htmlformat = true, $fromname = __smtp_fromname, $fromemail = __smtp_fromemail )
	{
		$this->From     = $this->From;
		$this->FromName = $this->FromName;
		$this->Subject  = $subject;
		$this->Body     = $body;
		$this->IsHTML( $htmlformat );

		if ( $this->Send() ) {

			return true;

		} else {

			$this->error = $this->ErrorInfo;
			return false;
		}
	}
}

$Mail = new EventoEmail();
?>