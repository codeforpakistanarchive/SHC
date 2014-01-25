<?
	$xmlParentTag = 'Signin';
	
	if( $crud == "r" )
	{
		requiredField("mobile", $xmlParentTag, "Mobile is a required parameter", 2026, $_REQUEST["format"]);
		requiredField("pwd", $xmlParentTag, "Password is a required parameter", 2026, $_REQUEST["format"]);
		
		$resultSet = queryExec("Select * from doctors where mobile = '".$_REQUEST["mobile"]."' and pwd = '".$_REQUEST["pwd"]."'");
		$resultSetXML="";
		if($resultSet)
		{
			$sessionValues = session_id();
			if($_REQUEST["format"] == 'json') 
			{
				// Specially applied to pass the session values
				foreach($resultSet as $row)
				{
					$resultSet = array("id"=>$row["id"], "name"=>$row["name"], "email"=>$row["email"], "pwd"=>md5($row["pwd"]), "sessionId"=>$sessionValues);
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
						<id>'.$row["id"].'</id>
						<user_name>'.$row["user_name"].'</user_name>
						<email>'.$row["email"].'</email>
						<pwd>'.md5($row["pwd"]).'</pwd>
						<sessionId>'.$sessionValues.'</sessionId>
						<created_date>'.$row["created_date"].'</created_date>
						<status>'.$row["status"].'</status>
					</records>';
				}
				
				$theOutPut = '<?xml version="1.0" encoding="utf-8"?>
				<'.$xmlParentTag.'>
				'.$resultSetXML.'
				</'.$xmlParentTag.'>';
			}
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