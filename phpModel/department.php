<?php

/**
 * Created by PhpStorm.
 * User: David
 * Date: 13/11/2015
 * Time: 19:49
 */
include_once("adb.php");
class department extends adb
{

  /**
    *This method deletes a department based on id   
    *@return false if the query fails
    *@return true if the query was successful
    */
	function deleteDepartment($id)
	{
		$sql="delete from department where departmentId='$id'";
		$result=$this->query($sql);
		if(!$result){
			return false;
		}
		else{
			return true;
		}
	}

}