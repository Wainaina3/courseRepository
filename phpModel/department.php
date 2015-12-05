<?php

/**
 * Created by PhpStorm.
 * User: David
 * Date: 13/11/2015
 * Time: 19:49
 * Edited by Akpene
 */
include_once("adb.php");
class department extends adb
{
/*Akpene
 *Date:14/11/2015
 */
//Editing department information
public function editDepartment($department_name,$department_id,$department_hod)
			{
//connecting to the database
			$this->connect();
//sql injections
			$sqlScript="update department set departmentName='$department_name',departmentHOD='$department_hod' where departmentId='$department_id'";
		
			$result=$this->query($sqlScript);
            return $result;
		}
}



 