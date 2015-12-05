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

    function viewDepartmentsModel(){

        $sql="select * from department";

        return $this->query($sql);
    }

}