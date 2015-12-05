<?php

/**
 * 
 * Author: Daniel
 * Date: 4/12/2015
 * Time: 15:27
 */

/**
*including the directory of the model class
*
*/
include_once(dirname(__FILE__)."\..\phpModel\department.php");

/**
*departmentControl class is for the adding of a new department, Deleting a collapsed department, viewing existing departments, and updating them if there is need for such
*@extends department class which is in the model
*/
class departmentControl extends department
{
	/**
	*This function serves as a controller to the adding of departments
	*It requests for the details entered and set them to the model which querys the database
	*/
	function addDepartmentCon(){
		//Making sure every field is set before proceeding with the insertion. This is a validation point
		if(isset($_REQUEST['deptId']) && isset($_REQUEST['deptName'])&& isset($_REQUEST['hodId'])){
			$deptId=$_REQUEST['deptId'];
			$deptName=$_REQUEST['deptName'];
			$hodId=$_REQUEST['hodId'];
			//setting value for the addDepartment function
			$result=$this->addDepartment($deptId,$deptName,$hodId);
			//unsuccessful query result
			if(!$result){
				//json message when unsuccessful
				echo '{"result":0,"message":"Failed to Add Department"}';
				return;
			}
			//successful query
			else{
				//json message when successful
				echo '{"result":1,"message":"Successfully Added Department"}';
				return;
			}
		}
		//when some fields are not set
		else{
			//json message
			echo '{"result":0,"message":"Need to Fill All Fields!!"}';
			return;
		}
	} //End of addDepartmentCon function
}
//creating an instance of the departmentControl class
$control=new departmentControl();
//validating the command set
if(isset($_REQUEST['cmd'])){
	$cmd=$_REQUEST['cmd'];
	//switching the commands base on their values
	switch($cmd){
		case 1:
		$control->addDepartmentCon();
		break;
	}
}