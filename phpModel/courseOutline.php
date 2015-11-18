<?php

/**
* This class contains functions that access the database for information
* requested by the user.
* @category   Courseware
* @package    Course Outline
* @copyright  Copyright (c) 2015-2016 Software Engineering
* @version    Release: @package_version 2.0
* @since      Class available since Release 1.5.0
* @param      $id, $name are the parameters used in this class.
*/

include_once("adb.php");
class courseOutline extends adb
{
	/**
	* Gets all Courses
	* @param 
	* @return boolean
	*/ 
	public function getAllCourses(){
		$result=$this->query("Select * from courseoutline");
		if(!$result){
			return false;
		}
		return true;
	}

	/**
	* Gets all Courses by name
	* @param 
	* @return $this
	*/
	public function getCourseByName($name){
		$result=$this->query("select * from courseoutline where courseTitle like %$name%");

		if(!$result){
			return false;
		}

		return $this->fetch();
	}

	/**
	* Gets all Courses by id
	* @param 
	* @return $this
	*/
	public function getCourseById($id){
		$result=$this->query("select * from courseoutline where courseId = '$id'");

		if(!$result){
			return false;
		}

		return $this->fetch();
	}
}


?>