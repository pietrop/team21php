<?php
/**
* Class to represent all assesment related information in a Assesment * object
* @author: Pietro
* @date: 13Feb2015
*/

class Assesment{

	var $assesmentID;  //is this default field, auto increment?
	var $criteria;
	var $mark;
	var $comment;

function __construct($assesmentID, $criteria, $mark, $comment){
		$this->assesmentID = $assesmentID; 
		$this->criteria = $criteria;
		$this->mark = $mark;
		$this->comment = $comment;
	}

	function getAssesmentID(){ //????
		return $this->assesmentID;
	}

	function getCriteria(){
		return $this->criteria;
	}

	function getMark(){
		return $this->mark;
	}

	function getComment(){
		return $this->comment;
	}

	/**
	* Generation of SQL query for adding Assesment details to "Assesment" table
	*/
	function createInsertQuery(){
		echo "flag5";
		if ($this->assesmentID != null){
			echo "flag6";
			return 'INSERT INTO assessments(assessmentID, criteria, mark, comment)
		 VALUES ("'.$this->assesmentID.'","'.$this->criteria.'","'.$this->mark.'","'.$this->comment.'")';
		 echo "flag7";
		} else {
			echo "flag8";
			return null;
		}
	}

}
?>