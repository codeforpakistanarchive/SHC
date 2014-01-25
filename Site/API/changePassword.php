<?
	$xmlParentTag = 'ChangePassword';
	
	if( $crud == "u" )
	{
		requiredField("id", $xmlParentTag, "Id is a required parameter", 2026, $_REQUEST["format"]);
		requiredField("oldPwd", $xmlParentTag, "Password is a required parameter", 2026, $_REQUEST["format"]);
		requiredField("pwd", $xmlParentTag, "Password is a required parameter", 2026, $_REQUEST["format"]);
		
		$resultSet = queryExec("Select * from eve_users where email = '".$_REQUEST["email"]."' and pwd = '".$_REQUEST["oldPwd"]."'");
		$resultSetXML="";
		if($resultSet)
		{
			$sql = "Update eve_users set
					pwd = '".addslashes($_REQUEST["pwd"])."',
					updated_date = now()
				Where
					id = '".$_REQUEST["id"]."'";
		
			mysql_query($sql);
			$insertedId = $_REQUEST["id"];
			
			/*
			// Send email
			*/
			$subject = COMPANY_NAME." Password Changed";
			$subject = "=?iso-8859-1?B?".base64_encode($subject)."?=";
			$subject = html_entity_decode ( $subject ) ;
			$EMAIL_message = 'Dear User password updated at evento, <br />Password is: '.$_REQUEST["pwd"].'<br />Thank you<br />'.COMPANY_NAME.' Team';
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
			
			echo returnFunction($xmlParentTag, '200', 'Password updated successfully.', 'Success', $insertedId, $_REQUEST["format"]);
			exit;	
		}
		else
		{
			echo errorXML($xmlParentTag, 'Old password not matched.', 20018, $_REQUEST["format"]);
			exit;
		}
	}
	else
	{
		echo errorXML($xmlParentTag, "CRUD missing.", 20018, $_REQUEST["format"]);
		exit;
	}
?>