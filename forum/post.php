<?php

class Post{

// var $postID;
var $student_ID;
var $parentPost_ID;
var $post;

// function __construct($student_ID,$parentPost_id, $post ){
// 		$this->student_ID = $student_ID;
// 		$this->parentPost_ID = $parentPost_ID;
// 		$this->post = $post;
// }
function __construct($student_ID, $parentPost_ID, $post ){
		// $this->postID = $postID;
		$this->student_ID = $student_ID;
		 $this->parentPost_ID = $parentPost_ID;
		$this->post = $post;
}
//does overloading work in php?
// function __construct($student_id, $post ){
// 		$this->student_ID = $student_ID;
// 		$this->post = $post;
// }
	/**
	* Generation of SQL query for adding Assesment details to "Assesment" table
	*/
	function createInsertQuery(){
		if ($this->student_ID != null){
			return 'INSERT INTO forum(student_ID, parentPost_ID, post)
		 VALUES ("'.$this->student_ID.'", "'.$this->parentPost_ID.'", "'.$this->post.'")';
		} else {
			return null;
		}
	}


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