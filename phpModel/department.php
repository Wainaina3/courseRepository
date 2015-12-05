<?php

/**
 * 
 * User: daniel osei
 * Date: 13/11/2015
 * Time: 19:49
 */
include_once("adb.php");
class department extends adb
{
	/**
	*This method is used for the addition of a new department
	*It inserts the details of the associated department into the database
	*@param string $deptId This is the ID of the department being created
	*@param string $deptName This is the name of the department being created
	*@param string $hodId This is the ID of the head of the newly created department
	*@return boolean true if the query runs successfully and else false
	*/
	public function addDepartment($deptId,$deptName,$hodId){
		//querying the result from the database
		$result=$this->query("insert into department set 
							  departmentId='$deptId', 
							  departmentName='$deptName',
							  departmentHOD='$hodId'");
		//checking if query failed
		if($result){
			return false;
		}
		else{
			return true;
		}
	} //End of the addDepartment function
}