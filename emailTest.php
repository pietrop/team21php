<?php
$to = 'kjoshimail@gmail.com';
$subject = 'the subject';
$message = 'hello php testing';
$headers = 'From: -fwebmaster@example.com' . "\r\n" .
 'Reply-To: -fwebmaster@example.com' . "\r\n" .
 'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
?>