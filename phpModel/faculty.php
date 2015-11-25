<?php

/**
 * Created by PhpStorm.
 * User: David
 * Date: 13/11/2015
 * Time: 19:49
 */
include_once("adb.php");
class faculty
{
	/**
	* Edits a Faculty information
	* @param 
	* @return boolean
	*/ 
	public function editFaculty($id){
		$result=$this->query("Select * from faculty");
		if(!$result){
			return false;
		}
		return true;
	}

	/**
	* Gets all faculty by id
	* @param 
	* @return $this
	*/
	public function getFacultyById($id){
		$result=$this->query("select * from faculty where facultyId = '$id'");

		if(!$result){
			return false;
		}

		return $this->fetch();
	}

}