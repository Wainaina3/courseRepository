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
 * This functions get a department information edited from the user request
 * It first checks whether the department id was set and only proceeds if it was set
 * It then sends it to department to edit it
 * @return json format message of success or failure. The failure result value is 0 while success result is 1
 */
function updateDepartment()
{
    if (!isset($_REQUEST['departmentId'])) {
     echo '{"result":0}';
        exit;
 }
 $department_id=$_REQUEST['departmentId'];
 if  ($this->editDepartment($department_id)) {
    echo '{"result":1,"message":"Department $department_id was edited from database"}';
}
}
}


/*
 * Creates an instance of departmentControl class
 */
$departmentControl = new departmentControl();
//Checks whether there is a command sent to the this class
if(isset($_REQUEST['cmd'])){

	$cmd = $_REQUEST['cmd'];



	switch($cmd){
		case 1:
		//Add
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
?>