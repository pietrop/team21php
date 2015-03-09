<?php
	function loggedIn(){
		if (!isset($_SESSION['email'])){
			echo "Not logged in";
			return false;
		} else {
			echo "logged in";
			return true;	
		}
	}
	
	function isAdmin() {
		if (!isset($_SESSION['admin'])){
			$result = false;
		} else if ($_SESSION['admin'] == 1){
			$result = true;
		} else {
			$result = false;	
		}
		return $result;
	}
	
?>