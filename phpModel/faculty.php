<?php

/**
 * Created by PhpStorm.
 * User: David
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
	* Edits a Faculty information in the database
	* @param int $facultyId this is the unique id provided for faculty.
	 * @param string $facultyUsername this is the unique username to be used by a faculty.
	 * @param string $facultyFirstName this is the first name of faculty to be edited.
	 * @param string $facultyLastName this is the last name of faculty to be edited.
	 * @param string $departmentId this is the department id where the faculty is associated with.
	* @return boolean returns true upon successful execution of query or false otherwise.
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
	* Get faculty by id from the database
	* @param int $id this is the unique id which specifies a faculty
	* @return boolean it returns true when query is executed successfully
	*/
	public function getFacultyById($id){
		$result=$this->query("select * from faculty where facultyId = '$id'");

		if(!$result){
			return false;
		}

		return true;
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
    *This method fetches all faculty members from the database
    * @return boolean true if the query succeed or false id it fails
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
    *@param string $search the search parameter for faculty
    *@return boolean true if the query succeeds
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


	/**This function deletes a faculty from the database given the faculty id
	 * @param $fid the unique id of a faculty to be deleted from the database
	 * @return bool returns true upon successful deletion
     */
	function deleteFacultyModel($fid)
	{
		$sql="delete from faculty where facultyId='$fid'";

		return $this->query($sql);
	}
}