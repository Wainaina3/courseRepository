<?php

/**
 * Created by PhpStorm.
 * User: David & daniel
 * Date: 13/11/2015
 * Time: 19:49
 * This file contains a model class for interfacing with the database and controller
 */
include_once("adb.php");
/*
 * This class extends adb class which is used to interface with the database
 * All the sql queries about a faculty are written in this class.
 * The queries are sent to the adb class functions for processing.
 * The results are return in form of mysql results.
 */
class faculty extends adb
{

	/**
	* Edits a Faculty information
	* @param 
	* @return boolean
	*/ 
	public function editFaculty($facultyId,$facultyUsername,$facultyFirstName,$facultyLastName,$departmentId){
		$sql="update faculty set facultyUsername='$facultyUsername',facultyFirstName='$facultyFirstName',facultyLastName='$facultyLastName',departmentId='$departmentId' where facultyId='$facultyId'";
		$result=$this->query($sql);
		if(!$result){
			return false;
		}
		return true;
	}

	/**
	* Get faculty by id
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


/**
*This function adds a faculty to the database.

 *@param string $facultyId This is the id of a faculty member.
 * @param string $facultyUsername this the unique username of a faculty member.
 * @param string $facultyFirstName this the first name of a faculty member.
 * @param string $facultyLastName this is the last name of a faculty member.
 * @param string $departmentId this is the department id where a faculty member belongs
 * @return boolean returns true when the insertion was successful.
 */
    function addFaculty($facultyId,$facultyUsername,$facultyFirstName,$facultyLastName,$departmentId)
    {
        $sql="insert into faculty set facultyId='$facultyId',facultyUsername='$facultyUsername',facultyFirstName='$facultyFirstName',facultyLastName='$facultyLastName',departmentId='$departmentId'";

        return $this->query($sql);
    }

    /**
    *This method fetches all faculty members
    * @return boolean false if the query fails and otherwise 
    *@return boolean true otherwise
    */
    function viewFacultyModel(){
    	$sql="select * from faculty";
    	$result=$this->query($sql);
    	if(!$result){
    		return false;
    	}
    	else{
    		return true;
    	}
    }
    /**
    *This method queries for a specific faculty or similar faculty members based on name
    *@param int $fid the id of the faculty
    *@param String $fname this takes either first or last name of the faculty
    *@return Object faculty
    */
    function searchAFaculty($search)
	{
    	$sql="select * from faculty where facultyLastName like '%$search%' or facultyFirstName like 'search%' or facultyId='$search'";
    	$result=$this->query($sql);
    	if(!$result){
    		return false;
    	}
    	else{
    		return true;
    	}
    }


	function deleteFacultyModel($fid)
	{
		$sql="delete from faculty where facultyId='$fid'";

		return $this->query($sql);
	}
}