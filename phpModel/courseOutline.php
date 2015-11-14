<?php

/**
 * Created by PhpStorm.
 * User: David
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

    /*
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
}