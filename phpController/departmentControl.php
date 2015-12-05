<?php

/**
 * Created by PhpStorm.
 * User: David
 * Date: 13/11/2015
 * Time: 19:48
 */
include_once(dirname(__FILE__)."/../phpModel/department.php");//For linux

class departmentControl extends department
{

	function deleteDeparment()
	{
		$depid = $_REQUEST['depid'];

		$obj = new department();
		if(!$obj->deleteDepartment($depid)){
			echo '{"result":0, "message":"No available course outlines"}';
			return;
		}
		echo '{"result":1, "message":"Deletion successful"}';


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
		break;
		case 2:
		//Update
		break;
		case 3:
		// Delete
		$departmentControl->deleteDeparment();
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