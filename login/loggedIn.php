<?php
	function loggedIn(){
		if (!isset($_SESSION['email'])){
			return false;
		} else {
			return true;	
		}
	}
	
	function isAdmin() {
		$result;
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