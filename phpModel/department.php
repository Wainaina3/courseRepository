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

/*
*Send a query to courserepo database
*gets all the departments in the database
*@return mysql dataset
*/
    function viewDepartmentsModel(){

        $sql="select * from department";

        return $this->query($sql);
    }

    function getDepartmentCoursesModel($deptid){

        $sql="select * from department,courseoutline,faculty where department.departmentId=courseoutline.departmentId and departmentId='$deptid'";

        return $this->query($sql);

    }

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
		$sql="insert into department set departmentId='$deptId',departmentName='$deptName', departmentHOD='$hodId'";

		return $this->query($sql);
		//checking if query failed

	} //End of the addDepartment function

	function deleteDepartmentModel($delptid)
	{
	$sql="delete from department where departmentId='$delptid'";

		return $this->query($sql);
	}

}