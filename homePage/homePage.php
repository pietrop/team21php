<?php
session_start();
$_SESSION['username'] = 'dilbert';
echo 'You are logged in as '.$_SESSION['username'];




?>
