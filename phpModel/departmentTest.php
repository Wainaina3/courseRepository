<?php

/**
 * Created by PhpStorm.
 * User: David
 * Date: 16/12/2015
 * Time: 18:19
 */
class departmentTest extends PHPUnit_Framework_TestCase
{
function testDeletion()
{
    include_once("department.php");
    $obj = new department();
    return $this->assertTrue($obj->deleteDepartment(4));
}
}
