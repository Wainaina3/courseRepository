<?php
/**
*@author Daniel Osei
*Date: 16/12/2015
*Time: 11:53 pm
*/

/**
*including department.php class
*/
include_once("department.php");

/**
*class phpUnitTest for doing the unit test of the function in the department class works
*/
class phpUnitTest extends PHPUnit_Framework_TestCase{
	/**
	*testing if connection exist for the db
	*@return boolean true if successfully ran and else false
	*/
	public function testConnect(){
		$obj=new department();
		return $this->assertTrue($obj->connect()!==false);
	}

	/**
	*test to check if query to select items from the db works
	*@return boolean true for success and else false
	*/
	public function testQuery(){
		$obj=new department();
		$str="select * from department";
		return $this->assertTrue($obj->query($str)!==false);
	}

	/**
	*testing for insert of department details into the db.
	*@return boolean true if query runs successfully and else false
	*/
	public function testInsert(){
		$obj=new department();
		$departName="Business";
		$departID="BSB 001";
		$HOD="BU 302";
		return $this->assertTrue($obj->addDepartment($departID,$departName,$HOD)!==false);
	}
}
?>