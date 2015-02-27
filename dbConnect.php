<?php
	function connectToDB(){
		static $conn;

		if (!isset($conn)){
			$config = parse_ini_file("../config.ini");
			$conn = mysqli_connect($config['hostname'], $config['user'], $config['password']);
		}

		if ($conn === false){
			return mysqli_connect_error();
		}
		return $conn;
	}
?>