<?
	$xmlParentTag = 'Users';
	
	if( $crud == "c" )
	{
		//requiredField("user_name", $xmlParentTag, "User Name is a required parameter", 2026, $_REQUEST["format"]);
		requiredField("mobile", $xmlParentTag, "Mobile is a required parameter", 2026, $_REQUEST["format"]);
		//requiredField("pmdc_code", $xmlParentTag, "Password is a required parameter", 2026, $_REQUEST["format"]);
		
		$resultSet = queryExec("Select * from doctors where mobile = '".$_REQUEST["mobile"]."'");
		if($resultSet)
		{
			echo returnFunction($xmlParentTag, '400', 'Mobile already exists.', 'Fail', $insertedId, $_REQUEST["format"]);
			exit;
		}
		else
		{
			// $pwd = rand(1111,9999);
			$pwd = '1234';
			$sql = "Insert into doctors set
						name = '".addslashes($_REQUEST["name"])."',
						mobile = '".addslashes($_REQUEST["mobile"])."',
						pmdc_code = '".addslashes($_REQUEST["pmdc_code"])."',
						pwd = '".addslashes($pwd)."',
						createdDate = now()";
			
			mysql_query($sql);
			$insertedId = mysql_insert_id();
			
			/*
			// Send email
			*/
			/*$subject = "Welcome to ".COMPANY_NAME;
			$subject = "=?iso-8859-1?B?".base64_encode("Thank you for registering with SHC")."?=";
			$subject = html_entity_decode ( $subject ) ;
			$EMAIL_message = 'Dear '.addslashes($_REQUEST["name"]).'<br /><br />Thank you for registering at SHC, you can now start using app.<br />Thank you<br />'.COMPANY_NAME.' Team';
			$EMAIL_message = html_entity_decode ( $EMAIL_message );
			$EMAIL_message = utf8_decode ( $EMAIL_message );
			
			$Mail->ClearAddresses();
			$Mail->AddAddress( $_REQUEST["email"], "" );
			$Mail->CharSet = 'iso-8859-1';
			$Mail->Encoding = 'quoted-printable';
			$emailSent = $Mail->sendEmail( $subject, $EMAIL_message, true );*/
			/*
			// END Send email
			*/
				
			echo returnFunction($xmlParentTag, '200', 'Doctor added successfully.', 'Success', $insertedId, $_REQUEST["format"]);
			exit;
		}
	}
	else if( $crud == "r" )
	{
		if($_REQUEST["id"]!='')
			$filter = " and id = '".$_REQUEST["id"]."'"; // For Update Select Query
		else if($_REQUEST["status"]!='')
			$filter = " and status = '".$_REQUEST["status"]."'";
			
		/********************************
		// ORDER BY
		********************************/
		$orderByArray = array('id',
							'user_name',
							'email',
							'created_date',
							'status');
		
		if(in_array($_REQUEST["order_by"], $orderByArray))
		{
			$orderBy = $_REQUEST["order_by"];
			if($orderBy=="id")
				$orderBy = 'mainId';
		}
		else							
			$orderBy = 'mainId';
		
		// Order Type	
		if(strtolower($_REQUEST["order_type"])=="asc")
			$orderType = ' ASC';
		else
			$orderType = ' DESC';
		
		/********************************
		// END ORDER BY, but CHANGE "id" to "mainId" in SQL Query
		********************************/
		
		
		$sql = "SELECT 
					id as mainId,
					user_name,
					email,
					pwd,
					created_date,
					status
				FROM 
					eve_users
				WHERE
					1 = 1
					".$filter."
				ORDER BY 
					".$orderBy." ".$orderType."";
					
		$resultSet = queryExec($sql);
		
		$resultSetXML="";
		if($resultSet)
		{
			if($_REQUEST["format"] == 'json') 
			{
				$resultSet = array("ResponseCode"=>200, "Response"=>$resultSet);
				$theOutPut = json_encode($resultSet);
			}
			else 
			{
				foreach($resultSet as $row)
				{
					$resultSetXML .= '<records>
						<id>'.$row["mainId"].'</id>
						<user_name>'.$row["user_name"].'</user_name>
						<email>'.$row["email"].'</email>
						<pwd>'.$row["pwd"].'</pwd>
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
	else if( $crud == "u" )
	{
		requiredField("id", $xmlParentTag, "Id is a required parameter", 2026, $_REQUEST["format"]);
		requiredField("user_name", $xmlParentTag, "User Name is a required parameter", 2026, $_REQUEST["format"]);
		requiredField("pwd", $xmlParentTag, "Password is a required parameter", 2026, $_REQUEST["format"]);
		
		$sql = "Update eve_users set
					user_name = '".addslashes($_REQUEST["user_name"])."',
					pwd = '".addslashes($_REQUEST["pwd"])."',
					status = '".$_REQUEST["status"]."',
					updated_date = now()
				Where
					id = '".$_REQUEST["id"]."'";
		
		mysql_query($sql);
		$insertedId = $_REQUEST["id"];
		
		echo returnFunction($xmlParentTag, '200', 'User modified successfully.', 'Success', $insertedId, $_REQUEST["format"]);
		exit;
	}
	else if( $crud == "d" )
	{
	
	}
	else
	{
		echo errorXML($xmlParentTag, "CRUD missing.", 20018, $_REQUEST["format"]);
		exit;
	}
?>