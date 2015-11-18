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
/*This function adds a faculty to the database.
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
}