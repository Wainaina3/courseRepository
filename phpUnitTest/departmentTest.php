<?php

/**
 * Created by PhpStorm.
 * User: David
 * Date: 15/12/2015
 * Time: 19:30
 */
include_once(dirname(__FILE__)."\..\phpModel\department.php");
include_once(dirname(__FILE__)."\..\phpController\departmentControl.php");
class departmentTest extends PHPUnit_Framework_TestCase
{

    /**
     *This Function tests whether query to get all departments
     * returns true on completion
     * @test
     */
    public function testGetDepartments(){

        $department=new department();

        $this->assertTrue($department->viewDepartmentsModel());
    }

    /**
     * Function test whether the departments are returned from the dataset
     * @test
     */
    public function testviewDepartmentControlJsonOutput(){

        $departmentController=new departmentControl();
       $result= $departmentController->viewDepartmentsControl();
       // echo $result;
        $this->assertEmpty($result);
    }
}
