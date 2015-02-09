<?php
/**
* Class to represent all student related information in a Admin object
*/
class GroupReportAssessment {
	
	var $assessmentID;
	var $groupID;
	var $reportID;
function
	 __construct($groupID, $reportID){
		$this->groupID = $groupID;
		$this->reportID = $reportID;
	}
//stopped here. 

	function getGroupID(){
		return $this->groupID;
	}
	function getReportID(){
		return $this->reportID;
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
			return 'INSERT INTO groupreportassessments()
		 VALUES ("'.$this->email.'","'.$this->firstName.'","'.$this->lastName.'","'.$this->password.'")';
		} else {
			return null;
		}
	}
}

?>