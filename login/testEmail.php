<?php
include "email.php";

$email = "asset.nurbakimov.09@ucl.ac.uk";
$firstName = "Asset";
$lastName = "Nurbakimov";
$emailObj = new Email($email, $firstName, $lastName);

$headers = "From: achita.n@me.com\r\n";
$headers .= 'Content-Type: text/plain; charset=utf-8';
$headers .= "\r\nReply-To: $email";

$success = mail($email, "Trial with php mailing", "Dear Asset,\r\n Everything went well\r\n", $headers, '-fachita.n@me.com');
if (isset($success) && $success){
	echo "Mail sent";
} else {
	echo "Smth went wrong";	
}
?>

<?php
/*$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
if ($email) {
   $headers .= "\r\nReply-To: $email";
}*/
?>