<?php

/**
 * Created by PhpStorm.
 * User: David & Daniel
 * Date: 13/11/2015
 * Time: 19:48
 */
include_once("adb.php");
/*
 * The class uses adb class to query the database
 * It sends the queries which are run appropriately
 */
class courseOutline extends adb
{

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
    *this method takes the course id and get the course outline
    *@param $courseId
    *@return courseOutline
    */
    function showOutline($courseId){
        $sql="select * from courseoutline where courseId='$courseId'";
        $result=$this->query($sql);
        return $result;
    }

    /**
    *this method fetches the information in the scheduling table based on courseId
    *@param $courseId
    *@return data in the scheduling table
    */
    function showTable($courseId){
        $tablename="schedule".$courseId;
        $sql="select * from $tablename";
        $result=$this->query($sql);
        return $result;
    }

    /**
    *this method takes in parameter for the updation of the course outline
    *@param $courseId,$title,$objective,$dept,$evaluate,$read,$goals,$semester,$fid
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
    *@param $courseId,$weekid,$week,$topic,$reading,$milestone
    *@return boolean, true if successful and otherwise false
    */
    function saveUpdatedTable($courseId,$weekid,$week,$topic,$reading,$milestone){
        $tablename="schedule".$courseId;
        $sql="update $tablename set weeks='$week',topics='$topic',readings='$reading',milestones='$milestone' where weekid='$weekid'"; 
        $result=$this->query($sql);
        return $result;       
    }

    public function getCourseById($id){
            $this->connect();

            $result=$this->query("select * from courseoutline where courseId = $id");

            if(!$result){
                return false;
            }

            return $this->fetch();
        }
    }