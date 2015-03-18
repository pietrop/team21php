<?php
	function connectToDB(){
		static $conn; //static used to make sure only one connection is created
		
		if (!isset($conn)){
			$config = parse_ini_file("../config.ini"); //Sensitive information stored in config.ini file
			$conn = mysqli_connect($config['hostname'], $config['user'], $config['password']);
		}

		if ($conn === false){
			return mysqli_connect_error();
		}
		return $conn;
	}
?>