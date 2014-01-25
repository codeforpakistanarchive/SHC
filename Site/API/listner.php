<?
	$xmlParentTag = 'Listner';
	if( $crud == "c" )
	{
		$post_body = file_get_contents('php://input');
		
		$result = json_decode($post_body);
		
		if($result->user_id=="")
		{
			requiredField("user_id", $xmlParentTag, "User is a required parameter", 2026, $_REQUEST["format"]);
		}
		if($result->event_id=="")
		{
			requiredField("event_id", $xmlParentTag, "Event is a required parameter", 2026, $_REQUEST["format"]);
		}
		
		$user_id = $result->user_id;
		$event_id = $result->event_id;
		
		foreach($result->emails as $getEmail)
		{
			$sql = "Insert into eve_users_events_invite set
					event_id = '".$event_id."',
					user_id = '".$user_id."',
					email = '".$getEmail."',
					status = '0',
					created_date = now(),
					updated_date = now()";
		
			mysql_query($sql);
			
			$resultUser = mysql_query("Select user_name from eve_users where id = '".$user_id."'");
			$rowUser = mysql_fetch_array($resultUser);
			$user_name = $rowUser["user_name"];
			
			$resultEvent = mysql_query("Select title from eve_users_events where id = '".$event_id."' and user_id='".$user_id."'");
			$rowEvent = mysql_fetch_array($resultEvent);
			$event_title = $rowEvent["title"];
			/*
			// Send email
			*/
			$subject = $user_name." invited you to event ".$event_title." at ".COMPANY_NAME;
			$subject = "=?iso-8859-1?B?".base64_encode($subject)."?=";
			$subject = html_entity_decode ( $subject ) ;
			$EMAIL_message = $user_name." invited you to event ".$event_title." at ".COMPANY_NAME;
			$EMAIL_message = html_entity_decode ( $EMAIL_message );
			$EMAIL_message = utf8_decode ( $EMAIL_message );
			
			$Mail->ClearAddresses();
			$Mail->AddAddress( $getEmail, "" );
			$Mail->CharSet = 'iso-8859-1';
			$Mail->Encoding = 'quoted-printable';
			$emailSent = $Mail->sendEmail( $subject, $EMAIL_message, true );
			/*
			// END Send email
			*/
		}
		
		echo returnFunction($xmlParentTag, '200', 'Event invitation sent successfully.', 'Success', $insertedId, $_REQUEST["format"]);
		exit;
	}
	else
	{
		echo errorXML($xmlParentTag, "CRUD missing.", 20018, $_REQUEST["format"]);
		exit;
	}
?>