<?
	$xmlParentTag = 'ForgotPassword';
	
	if( $crud == "r" )
	{
		requiredField("email", $xmlParentTag, "Email is a required parameter", 2026, $_REQUEST["format"]);
		
		$resultSet = queryExec("Select * from eve_users where email = '".$_REQUEST["email"]."' and status=1");
		$resultSetXML="";
		if($resultSet)
		{
			$sessionValues = session_id();
			if($_REQUEST["format"] == 'json') 
			{
				// Specially applied to pass the session values
				foreach($resultSet as $row)
				{
					$resultSet = array("user_name"=>$row["user_name"], "email"=>$row["email"], "pwd"=>$row["pwd"]);
				}
				// END Specially applied to pass the session values
			
				$resultSet = array("ResponseCode"=>200, "Response"=>$resultSet);
				$theOutPut = json_encode($resultSet);
			}
			else 
			{
				foreach($resultSet as $row)
				{
					$resultSetXML .= '<records>
						<user_name>'.$row["user_name"].'</user_name>
						<email>'.$row["email"].'</email>
						<pwd>'.$row["pwd"].'</pwd>
					</records>';
				}
				
				$theOutPut = '<?xml version="1.0" encoding="utf-8"?>
				<'.$xmlParentTag.'>
				'.$resultSetXML.'
				</'.$xmlParentTag.'>';
			}
			
			/*
			// Send email
			*/
			$subject = "Password recovery";
			$subject = "=?iso-8859-1?B?".base64_encode($subject)."?=";
			$subject = html_entity_decode ( $subject ) ;
			$EMAIL_message = 'Dear User following is your password<br />Username: '.$row["user_name"].'<br />Email: '.$row["email"].'<br />Password: '.$row["pwd"].'<br /><br />Thank you<br />'.COMPANY_NAME.' Team';
			$EMAIL_message = html_entity_decode ( $EMAIL_message );
			$EMAIL_message = utf8_decode ( $EMAIL_message );
			
			$Mail->ClearAddresses();
			$Mail->AddAddress( $_REQUEST["email"], "" );
			$Mail->CharSet = 'iso-8859-1';
			$Mail->Encoding = 'quoted-printable';
			$emailSent = $Mail->sendEmail( $subject, $EMAIL_message, true );
			/*
			// END Send email
			*/
			
			echo $theOutPut;
		}
		else
		{
			echo errorXML($xmlParentTag, 'No record found.', 20018, $_REQUEST["format"]);
			exit;
		}
		
	}
	else
	{
		echo errorXML($xmlParentTag, "CRUD missing.", 20018, $_REQUEST["format"]);
		exit;
	}
?>