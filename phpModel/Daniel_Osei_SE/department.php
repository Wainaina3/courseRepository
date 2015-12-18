<?php

/**
 *
 * @author: Daniel Osei
 * Date: 4/12/2015
 * Time: 14:48
 */
/**
*Including adb.php page
*This gives access to functions in the adb.php page
*/
include_once("adb.php");

/**
*Class department is for the creating of a new Department, Updating records, deleting if necessary, and view existing departments
*It extends the adb class to give access the functions in that class
*/
class department extends adb
{
	/**
	*This method is used for the addition of a new department
	*It inserts the details of the associated department into the database
	*@param String $deptId This is the ID of the department being created
	*@param String $deptName This is the name of the department being created
	*@param String $hodId This is the ID of the head of the newly created department
	*@return boolean true if the query runs successfully and else false
	*/
	public function addDepartment($deptId,$deptName,$hodId){
		//querying the result from the database
		$result=$this->query("insert into department set 
							  departmentId='$deptId', 
							  departmentName='$deptName',
							  departmentHOD='$hodId'");
		//checking if query failed
		if(!$result){
			return false;
		}
		else{
			return true;
		}
	} //End of the addDepartment function
}