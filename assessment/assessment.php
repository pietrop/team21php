<?php
/**
* Class to represent all assessment related information in a Assessment * object
* @author: Pietro
* @date: 13Feb2015
*/

class Assessment{

	var $assessmentID;  //is this default field, auto increment?
	var $criteria;
	var $mark;
	var $comment;

function __construct($assessmentID, $criteria, $mark, $comment){
		$this->assessmentID = $assessmentID; 
		$this->criteria = $criteria;
		$this->mark = $mark;
		$this->comment = $comment;
	}

	function getAssessmentID(){ //????
		return $this->assessmentID;
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
	* Generation of SQL query for adding Assessment details to "Assessment" table
	*/
	function createInsertQuery(){
		// echo "flag5";
		if ($this->assessmentID != null){
			// echo "flag6";
			return 'INSERT INTO assessments(assessmentID, criteria, mark, comment) 
			VALUES ("'.$this->assessmentID.'","'.$this->criteria.'","'.$this->mark.'","'.$this->comment.'")';
		 // echo "flag7";
		} else {
			// echo "flag8";
			return null;
		}
	}

}
?>