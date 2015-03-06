<?php
/**
Class to generate and send emails
**/
class Email{
	
	var $email;
	var $firstName;
	var $lastName;
	var $subject;
	
	function __construct($email, $firstName, $lastName){
		$this->email = $email;
		$this->firstName = $firstName;
		$this->lastName = $lastName;	
		$subject = "Verify your email";
	}
	
	function sendEmail(){
		mail($email, $subject, "MY MESSAGE");	
	}
	
	
}
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>

<body>
</body>
</html>