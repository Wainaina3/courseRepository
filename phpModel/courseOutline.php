<?php
include_once("adb.php");
/**
*
 * Created by PhpStorm.
 * User: David & Daniel
 * Date: 13/11/2015
 * Time: 19:48
 */
/*
 * The class uses adb class to query the database
 * It sends the queries which are run appropriately
 */
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

class courseOutline extends adb
{
	/**
	* Gets all Courses
	* @param 
	* @return boolean
	*/ 
	public function getAllCourses(){
		$result = $this->query("select * from courseoutline");
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

    public function getCourseById($id){
        $result=$this->query("select * from courseoutline where courseId='$id'");

        if(!$result){
            return false;
        }

        return $this->fetch();
    }

    /**
     * This function deletes a course outline from the database
     * It makes use of the adb class
     * @param string $courseId The id of the course outline to be deleted
     * @return boolean returns true if the outline was deleted
     */
    function deleteCourseOutline($courseId)
    {
    	$sql="delete from courseoutline where courseId='$courseId'";

    	return $this->query($sql);
    }

    /**
    *This method takes the course id and get the course outline
    *@param String $courseId
    *@return boolean true if the query ran successfully and false otherwise.
    */
    function showOutline($courseId){
    	$sql="select * from courseoutline where courseId='$courseId'";
    	$result=$this->query($sql);
    	return $result;
    }

    /**
    *This method fetches the information in the scheduling table based on courseId
    *@param String $courseId
    *@return boolean true if the query ran successfully and false otherwise.
    */
    function showTable($courseId){
    	$tablename="schedule".$courseId;
    	$sql="select * from $tablename";
    	$result=$this->query($sql);
    	return $result;
    }

    /**
    *this method takes in parameter for the updation of the course outline
    *@param String, String, String, String, String, String, String, String, String $courseId,$title,$objective,$dept,$evaluate,$read,$goals,$semester,$fid
    *
    *@return boolean, true if successful and otherwise false
    */
    function  saveUpdatedCourse($courseId,$title,$objective,$dept,$evaluate,$read,$goals,$semester,$fid){
    	$sql="update courseoutline set courseTitle='$title',courseDepartment='$dept',courseObjectives='$objective',courseEvaluate='$evaluate',readings='$read',courseSemester='$semester',facultyId='$fid' where courseId='$courseId'";
    	$result=$this->query($sql);
    	return $result;
    }

    /**
    *This method updates the table for the course scheduling
    *@param  String,String,int,String,String,String $courseId,$weekid,$week,$topic,$reading,$milestone
    *@return boolean, true if successful and otherwise false
    */
    function saveUpdatedTable($courseId,$weekid,$week,$topic,$reading,$milestone){
    	$tablename="schedule".$courseId;
    	$sql="update $tablename set weeks='$week',topics='$topic',readings='$reading',milestones='$milestone' where weekid='$weekid'"; 
    	$result=$this->query($sql);
    	return $result;       
    }



/*Akpene
 *Date:14/11/2015
 */
//Adding a course outline
public function addCourse($course_name,$course_id,$course_objective,
                          $course_readings,$course_description, $course_evaluation, $learning_goals,$courseDept){
//connecting to the database
    $this->connect();
//sql injections
    $sqlScript="insert into course_outline set course_id='$course_id',course_name='$course_name', learning_goals='$learning_goals',
			course_objectives='$course_objective', course_descriptions='$course_description', course_readings='$course_readings',course_evaluations='$course_evaluation',course_dept='$courseDept'";

    return $this->query($sqlScript);
}
}

?>



