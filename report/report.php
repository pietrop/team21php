<?php
/**
* Class to represent all report related information in a Report 
* object
* @author: Pietro
* @date: 13Feb2015
*/

class Report{
				//which one is primary key in report?
	var $reportID;  
	var $group_ID;
	var $abstract;
	var $review1;
	var $review2;


function __construct($group_ID, $abstract, $review1,$review2){
		// $this->reportID = $reportID;
		$this->group_ID = $group_ID;
		$this->abstract = $abstract;
		$this->review1 = $review1;
		$this->review2 = $review2;
	}

	function getReportID(){
		return $this->reportID;
	}
	
	function getGroup_ID(){
		return $this->group_ID;
	}

	function getAbstract(){
		return $this->abstract;
	}

	function getReview1(){
		return $this->review1;
	}

	function getReview2(){
		return $this->review2;
	}

	/**
	* Generation of SQL query for adding Assesment details to "Assesment" table
	*/
	function createInsertQuery(){
		if ($this->group_ID != null){
			return 'INSERT INTO reports(group_ID, abstract,review1, review2 )
		 VALUES ("'.$this->group_ID.'","'.$this->abstract.'","'.$this->review1.'","'.$this->review2.'")';
		} else {
			return null;
		}
	}

}
?>