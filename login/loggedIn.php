<?php
	function loggedIn(){
		if (!isset($_SESSION['email'])){
			header("Location: ../login/index.php");	
		}
	}
	
?>