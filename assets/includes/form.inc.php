<?php

if (function_exists('nukeMagicQuotes')) {
	nukeMagicQuotes();
}

// process email
if (array_key_exists('send' , $_POST)) {
	$to = 'jcrosenthal@gmail.com';
	$subject = 'Craig Delorenzo, Website Inquiry';
	
	$expected = array('name', 'email', 'dayphone', 'comments');
  	// set required fields
	$required = array('name', 'email');
	
	// create empty array for any missing fields
	$missing = array();
	
	// assume that there is nothing suspect
	$create = false;
	
	// create a pattern to locate suspect phrases
	$pattern = '/Content-Type:|Bcc:|Cc:/i';
	
	// function to check for suspect phrases
	function isSuspect($val, $pattern, &$suspect) {
		// if the variable is an array, loop through each element and pass it recursively back to the same function
		if (is_array($val)) {
			foreach ($val as $item) {
				isSuspect($item, $pattern, $suspect);
				}
			}
			else {
				// if one of the suspect phrases is found, set Boolean to true
				if (preg_match($pattern, $val)) {
					$suspect = true;
					}
				}
			}
	
	// check the $_POST array and any subarrays for suspect content
	isSuspect($_POST, $pattern, $suspect);
	
	if ($suspect) {
		$mailSent = false;
		unset($missing);
		}
	else {
	// process the $_POST variables
	foreach ($_POST as $key => $value) {
		
		// assign to temporary variable and strip whitespace if not an array
		$temp = is_array($value) ? $value : trim($value);
		
		// if empty and required, add to $missing array
		if (empty($temp) && in_array($key, $required)) {
			array_push($missing, $key);
		}
		
		// otherwise, assign to a variable of the same as $key
		elseif (in_array($key, $expected)) {
			${$key} = $temp;
			}
		}
	}
	
	// validate the email address
		if (!empty($email)) {
	  	// regex to ensure no illegal characters in email address 
		$checkEmail = '/^[^@]+@[^\s\r\n\'";,@%]+$/';
		// reject the email address if it doesn't match
		if (!preg_match($checkEmail, $email)) {
		array_push($missing, 'email');
		}
	}
	
	// go ahead only if not suspect and all required fields OK
	if (!$suspect && empty($missing)) {
		
		// build the message
		$message = "Someone filled in the CraigDelorenzo.com inquiry form, details below... \n\n";
		$message .= "Name: $name\n\n";
		$message .= "Email: $email\n\n";
		$message .= "Telephone: $dayphone \n\n";
		$message .= "Comments: $comments\n\n";
	
		// limit the line length to 100 characters
		$message = wordwrap($message, 100);
		
		// create additional headers
		$additionalHeaders = "From: $name <$email>\r\n";
		$additionalHeaders .= 'Cc:';
		if (!empty($email)) {
		  $additionalHeaders .= "\r\nReply-To: $email";
		  }
	
	
    // send it  
    $mailSent = mail($to, $subject, $message, $additionalHeaders);
	if ($mailSent) {
	  // $missing is no longer needed if the email is sent, so unset it
	  unset($missing);
	  }
    }
}
?>