<?php
/**
* Class that represents single forum post
**/
class Post{

	var $student_ID;
	var $parentPost_ID;
	var $post;
	
	function __construct($student_ID, $parentPost_ID, $post ){
		$this->student_ID = $student_ID;
		$this->parentPost_ID = $parentPost_ID;
		$this->post = $post;
	}

	/**
	* Generation of SQL query for adding new forum post details to "Forum" table
	*/
	function createInsertQuery(){
		if ($this->student_ID != null){
			return 'INSERT INTO forum(student_ID, parentPost_ID, post)
		 VALUES ("'.$this->student_ID.'", "'.$this->parentPost_ID.'", "'.$this->post.'")';
		} else {
			return null;
		}
	}

	/**
	* Generation of SQL query for adding new forum reply details to "Forum" table
	*/
	function createInsertQueryNoParentPost_ID(){
		if ($this->student_ID != null){
			return 'INSERT INTO forum(student_ID, post)
		 VALUES ("'.$this->student_ID.'", "'.$this->post.'")';
		} else {
			return null;
		}
	}

}
?>