<?php
/**
* Class to represent all student related information in a Student object
*/
class Student {
	
	var $email;
	var $firstName;
	var $lastName;
	var $password;

	function __construct($email, $firstName, $lastName, $password){
		$this->email = $email;
		$this->firstName = $firstName;
		$this->lastName = $lastName;
		$this->password = $password;
	}

	function getEmail(){
		return $this->email;
	}

	function getFirstName(){
		return $this->firstName;
	}

	function getLastName(){
		return $this->lastName;
	}

	function getPassword(){
		return $this->password;
	}

	/**
	* Generation of SQL query for adding student details to "students" table
	*/
	function createInsertQuery(){
		if ($this->email != null){
			return 'INSERT INTO students(email, firstName, lastName, password)
		 VALUES ("'.$this->email.'","'.$this->firstName.'","'.$this->lastName.'","'.$this->password.'")';
		} else {
			return null;
		}
	}
	/**
	* Generation of SQL query for adding student details to "students" table
	*/
	function createDeleteQuery($deleteEmail){
		if ($this->email != null){
			return 'DELETE FROM students WHERE email = "'.$deleteEmail.'"';
		} else {
			return null;
		}
	}
	/**
	* Generation of SQL quey for showing all students stored in the database
	*/
	function createSelectQuery(){
		return 'SELECT * FROM students';
	}
}

?>