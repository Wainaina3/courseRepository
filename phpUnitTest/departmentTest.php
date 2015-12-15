<?php

/**
 * Created by PhpStorm.
 * User: David
 * Date: 15/12/2015
 * Time: 19:30
 */
include_once(dirname(__FILE__)."\..\phpModel\department.php");
class departmentTest extends PHPUnit_Framework_TestCase
{

    /**
     *
     */
    public function testGetDepartments(){

        $department=new department();

        $this->assertTrue($department->viewDepartmentsModel());
    }
}
