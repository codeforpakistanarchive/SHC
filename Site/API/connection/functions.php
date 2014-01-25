<?php
function connectToDB()
{
	$cn = mysql_connect(MYSQL_HOST, MYSQL_USERNAME, MYSQL_PASSWORD);
	if (!$cn) {
    	echo errorXML("Database Validation", "Failed to connect DB host.", 2001, $_REQUEST["format"]);
		exit();
	}
	if(!mysql_select_db(MYSQL_DATABASE))
	{
    	echo errorXML("Database Validation", "Failed to connect database.", 2002, $_REQUEST["format"]);
		exit();
	}
}

function returnFunction($xmlParentTag, $code='200', $message, $type='Success', $recordId, $format='xml')
{
	if($format=='json')
	{
		$erJSON = array("ResponseCode"=>$code, "Response"=>array("type"=>$type, "ResponseMessage"=>$message, "ResponseCode"=>$code, "RecordId"=>$recordId));
		$theOutPut = json_encode($erJSON);
	}
	else
	{
		$resultSetXML = '<records>
				<ResponseCode>'.$code.'</ResponseCode>
				<Type>'.$type.'</Type>
				<ResponseMessage>'.$message.'</ResponseMessage>
				<RecordId>'.$recordId.'</RecordId>
			</records>';
			
			$theOutPut = '<?xml version="1.0" encoding="utf-8"?>
			<'.$xmlParentTag.'>
			'.$resultSetXML.'
			</'.$xmlParentTag.'>';
	}
	return $theOutPut;
}

function errorXML($errorType, $errorMessage, $errorCode = '', $format='xml')
{
	if($format=='json')
	{
		$erJSON = array("ResponseCode"=>$errorCode, "Errors"=>array("error"=>array("type"=>$errorType, "message"=>$errorMessage, "code"=>$errorCode)));
		$erXML = json_encode($erJSON);
	}
	else
	{
		$erXML = '<?xml version="1.0" encoding="utf-8"?>
				<Errors>
					<error>
						<type>'.$errorType.'</type>
						<message>'.$errorMessage.'</message>
						<code>'.$errorCode.'</code>
					</error>
				</Errors>';
	}
	return $erXML;
}

function customResponse($errorType, $errorMessage, $errorCode = '', $format='xml')
{
	if($format=='json')
	{
		$erXML = '[{
				  "Custom": {
					"response": {
					  "type": "'.$errorType.'",
					  "message": "'.$errorMessage.'",
					  "code": "'.$errorCode.'"
					}
				  }
				}]';
	}
	else
	{
		$erXML = '<?xml version="1.0" encoding="utf-8"?>
				<Custom>
					<response>
						<type>'.$errorType.'</type>
						<message>'.$errorMessage.'</message>
						<code>'.$errorCode.'</code>
					</response>
				</Custom>';
	}
	return $erXML;
}

function forgotPwdXML($response, $username, $format='xml')
{
	if($format=='json')
	{
		$resXml = '[{
		  "forgotPassword": {
			"response": "'.$response.'",
			"username": "'.$username.'"
		  }
		}]';
	}
	else
	{
		$resXml = '<?xml version="1.0" encoding="utf-8"?>
			<forgotPassword>
				<response>'.$response.'</response>
				<username>'.$username.'</username>
			</forgotPassword>';
	}	
	return $resXml;	
}

function registerXML($response, $username, $message, $format='xml')
{
	if($format=='json')
	{
		$resXml = '[{
		  "register": {
			"response": "'.$response.'",
			"username": "'.$username.'",
			"message": "'.$message.'"
		  }
		}]';
	}
	else
	{
		$resXml = '<?xml version="1.0" encoding="utf-8"?>
			<register>
				<response>'.$response.'</response>
				<username>'.$username.'</username>
				<message>'.$message.'</message>
			</register>';
	}	
	return $resXml;	
}

function changePassXML($response, $username, $sessionId, $sessionPass, $format='xml')
{
	if($format=='json')
	{
		$resXml = '[{
				  "changePassword": {
					"response": "'.$response.'",
					"username": "'.$username.'",
					"sessionId": "'.$sessionId.'",
					"sessionPass": "'.$sessionPass.'"
				  }
				}]';
	}
	else
	{
		$resXml = '<?xml version="1.0" encoding="utf-8"?>
            <changePassword>
                <response>'.$response.'</response>
                <username>'.$username.'</username>
                <sessionId>'.$sessionId.'</sessionId>
                <sessionPass>'.$sessionPass.'</sessionPass>
            </changePassword>';
	}	
	return $resXml;	
}

function queryExec($sql, $cache=false)
{
	if($cache==false)
	{
		$resArr = array();
		$res = mysql_query($sql);
		if($res)
		{
			while($row = mysql_fetch_assoc($res))
			{
				$resArr[] = $row;
			}
			if(empty($resArr))
				return false;
			else
				return $resArr;		
		}
		else
		{
			return false;
		}
	}
	else
	{
		global $memcache;
		$key = md5('query'.$sql);
		$resultArray = $memcache->get($key);
		if(!$resultArray)
		{
			$resArr = array();
			$res = mysql_query($sql);
			if($res)
			{
				while($row = mysql_fetch_assoc($res))
				{
					$resArr[] = $row;
				}
				if(empty($resArr))
				{
					return false;
				}
				else
				{
					$memcache->set($key,$resArr,false,MEMCACHE_CACHE_TIME);
					return $resArr;	
				}	
			}
			else
			{
				return false;
			}
		}
		else
		{
			return $resultArray;
		}
	}
}

function secureConnection()
{
	if($_SERVER['HTTPS'] != "on")
		return false;
	else
		return true;
}

function sendSMS( $To , $Message, $smsType, $partnerDomain )
{
	
	$username = SMS_USER_NAME;
	$password = SMS_PASSWORD;
	
	$sms_url = '';
	$smstype = $smsType;
	
	$params = 'username='.$username.'&password='.$password.'&smstype='.$smsType.'&dest='.$To.'&text='.$Message;
	
	$ch = curl_init();

	curl_setopt($ch , CURLOPT_RETURNTRANSFER	, 1 );
	curl_setopt($ch , CURLOPT_URL				, $sms_url );
	curl_setopt($ch , CURLOPT_POST				, 1 );
	curl_setopt($ch , CURLOPT_HEADER			, 0 );
	curl_setopt($ch , CURLOPT_POSTFIELDS		, $params );
	curl_setopt($ch , CURLOPT_FOLLOWLOCATION	, 0);
	curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
	
	$raw_html_output = curl_exec($ch);

	//echo $raw_html_output;
	curl_close($ch);

	$data = $raw_html_output;
	$data = strip_tags($data);

}

function requiredField($field, $fname, $msg, $ecode, $format='xml')
{
	if( $_REQUEST[$field] == '' )
	{
		echo errorXML($fname, $msg, $ecode, $format);
		exit();
	}
	return true;
}

function httpRequest( $postfields , $url = '' , $extrainfo = false )
{
	$ch = curl_init();
	//curl_setopt($ch , CURLOPT_USERAGENT			, __userAgent );
	curl_setopt($ch , CURLOPT_RETURNTRANSFER	, 1 );
	curl_setopt($ch , CURLOPT_URL				, $url );
	curl_setopt($ch , CURLOPT_POST				, 1 );
	curl_setopt($ch , CURLOPT_HEADER			, 0 );
	curl_setopt($ch , CURLOPT_POSTFIELDS		, $postfields );
	curl_setopt($ch , CURLOPT_FOLLOWLOCATION	, 0);
	//curl_setopt($ch , CURLOPT_INTERFACE	, $_SERVER['SERVER_NAME'] );
	curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
	$raw_html_output = curl_exec($ch);
	$info =  curl_getinfo($ch);
	$request_header_info = curl_getinfo($ch, CURLINFO_HEADER_OUT);
	//echo $raw_html_output;
	curl_close($ch);
	return $raw_html_output;
}


function isValidEmail($input_value )
{
	if ( preg_match("/^[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)*\.\w{2,8}$/", $input_value) )
	{
		return true;
	}
	else
	{
		return false;
	}
}

function br2nl($string)
{
    return preg_replace('/\<br(\s*)?\/?\>/i', "\n", $string);
}

function dbEnc( $varName )
{
	return "'". $varName."'";
}
?>