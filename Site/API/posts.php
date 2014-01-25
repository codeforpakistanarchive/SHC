<?
	$xmlParentTag = 'Posts';
	
	if( $crud == "c" )
	{
		$sql = "Insert into posts set
					heading = '".addslashes($_REQUEST["heading"])."',
					detail = '".addslashes($_REQUEST["detail"])."',
					mobile = '".addslashes($_REQUEST["mobile"])."',
					cat_id = '".addslashes($_REQUEST["cat_id"])."',
					createdDate = now()";
		
		mysql_query($sql);
		$insertedId = mysql_insert_id();
		
		$resultDocs = mysql_query("Select * from doctors where cat_id = '".$_REQUEST["cat_id"]."'");
		while($rowDocs = mysql_fetch_array($resultDocs))
		{
			/*
			// Send email
			*/
			$subject = "Patient need help.";
			$subject = "=?iso-8859-1?B?".base64_encode($subject)."?=";
			$subject = html_entity_decode ( $subject ) ;
			$EMAIL_message = 'Dear Doc.'.addslashes($rowDocs["name"]).'<br /><br />A patient need help. Details are as follows;<br /><br />
			<strong>Title:</strong> '.$_REQUEST["heading"].'<br />
			<strong>Deatils:</strong> '.$_REQUEST["detail"].'<br />
			<strong>Mobile:</strong> '.$_REQUEST["mobile"].' <strong style=color:#ff0000>(If you want to talk with patient.)</strong>
			<br /><br />Thank you<br />'.COMPANY_NAME.' Team';
			$EMAIL_message = html_entity_decode ( $EMAIL_message );
			$EMAIL_message = utf8_decode ( $EMAIL_message );
			
			$Mail->ClearAddresses();
			$Mail->AddAddress( $rowDocs["email"], "" );
			$Mail->CharSet = 'iso-8859-1';
			$Mail->Encoding = 'quoted-printable';
			$emailSent = $Mail->sendEmail( $subject, $EMAIL_message, true );
			/*
			// END Send email
			*/	
		}
			
		echo returnFunction($xmlParentTag, '200', 'Patient request addedd successfully.', 'Success', $insertedId, $_REQUEST["format"]);
		exit;
	}
	else
	{
		echo errorXML($xmlParentTag, "CRUD missing.", 20018, $_REQUEST["format"]);
		exit;
	}
?>