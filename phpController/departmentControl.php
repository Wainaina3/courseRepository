<?php

/**
 * Created by PhpStorm.
 * User: David
 * Date: 13/11/2015
 * Time: 19:48
 */
include_once(dirname(__FILE__)."\..\phpModel\department.php");

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


/*
 * Creates an instance of facultyControl class
 */
$departmentControl = new departmentControl();
//Checks whether there is a command sent to the this class
if(isset($_REQUEST['cmd'])){

	$cmd = $_REQUEST['cmd'];

	switch($cmd){
		case 1:
		//Add
		$departmentControl->addDepartmentCon();
		break;
		case 2:
		//Update
		break;
		case 3:
		// Delete
		break;
		case 4:
		//Get all
		break;
       
		default:
		echo '{"result":0, "message":"No request made"}';
		break;
	}
}
?>