<?php
/**
* Class to represent all student related information in a Admin object - wrong comment, change later.
*/
class GroupReportAssessment {
	
	var $groupID;
	var $reportID;
	function __construct($groupID, $reportID){
			$this->groupID = $groupID;
			$this->reportID = $reportID;
		}

		function getGroupID(){
			return $this->groupID;
		}
		function getReportID(){
			return $this->reportID;
		}

		/**
		* Generation of SQL query for adding student details to "students" table
		*/
		function createInsertQuery(){
			if ($this->groupID != null){
				return 'INSERT INTO groupreportassessment(group_ID, report_ID)
			 VALUES ("'.$this->groupID.'","'.$this->reportID.'")';
			} else {
				return null;
			}
		}
}

?>