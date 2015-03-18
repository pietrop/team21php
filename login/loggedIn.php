<?php
	//Function required to check if user is logged in
	function loggedIn(){
		if (!isset($_SESSION['email'])){
			return false;
		} else {
			return true;	
		}
	}
	//Function required to check if user is an admin
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