<?php

/**
 * Created by PhpStorm.
 * User: David
 * Date: 13/11/2015
 * Time: 19:47
 */
/*
 * This file contains facultyControl class to interface with the view
 * It also contains an instance of that class which is used to call its functions.
 * The functions to be called are determined by the command sent from the javascript request.
 */

include_once(dirname(__FILE__)."\\..\\phpModel\\faculty.php");

/*
 * This class is used to interface between the faculty model class and the view.
 * Data from the view are fetched in this class and processed to be sent to the faculty model.
 * It also sends data to the javascript interface in json format indicating the result or a message about an attempted data processing
 *
 */
class facultyControl extends faculty
{
    /*
     * This function gets data from the add faculty Form and sends them to the model.
     * It requests the $facultyId, $facultyUsername, $facultyFirstName, $facultyLastName and $departmentId
     * The values of those add faculty form are then sent to the model by calling addFaculty method and feeding it the parameters
     */
    function addFacultyControl()
    {
    	$facultyId = $_REQUEST['facultyId'];
    	$facultyUsername = $_REQUEST['facultyUsername'];
    	$facultyFirstName = $_REQUEST['facultyFirstName'];
    	$facultyLastName = $_REQUEST['facultyLastName'];
    	$departmentId = $_REQUEST['departmentId'];

    	$insertion = $this->addFaculty($facultyId,$facultyUsername,$facultyFirstName,$facultyLastName,$departmentId);

    	if (!$insertion) {
    		echo '{"result":0,"message":"Faculty could not be added to the database"}';
    		exit;
    	}
    	echo '{"results":1,"message":"Faculty succesfully added to the database"}';

    }

    function editFacultyById()
    {

    	$fid = $_REQUEST['fid'];
    	$obj = new faculty();
    	if(!$obj->editFaculty($fid)){
    		echo '{"result":0, "message":"No available course outlines"}';
    		return;
    	}
    	echo '{"result":1, "message":"Data edited"}';

    }

    function getAllFaculty()
    {
    	$obj = new faculty();
    	if(!$obj->getAllFaculty()){
    		echo '{"result":0, "message":"No available course outlines"}';
    		return;
    	}
    	$row=$obj->fetch();
    	echo '{"result":1,"outlines":[';
    	while($row){
    		echo json_encode($row);
    		$row=$obj->fetch();
    		if($row){
    			echo ",";
    		}
    	}
    	echo "]}";
    }

    function getFacultyById()
    {

    	$fid = $_REQUEST['fid'];
    	$obj = new faculty();
    	if(!$obj->getFacultyById($fid)){
    		echo '{"result":0, "message":"No available course outlines"}';
    		return;
    	}
	// $row=$obj->fetch();
    	echo '{"result":1,"outlines":[';
    	echo json_encode($obj->getFacultyById($fid));
    	echo "]}";
    }
}
/*
 * Creates an instance of facultyControl class
 */
$facultyController = new facultyControl();
//Checks whether there is a command sent to the this class
if(isset($_REQUEST['cmd'])){

	$cmd = $_REQUEST['cmd'];


	switch($cmd){
		case 1:
		$facultyController->addFacultyControl();
		break;
		case 2:
		$facultyController->getFacultyById();
		break;
		case 3:
		$facultyController->editFacultyById();
		break;
		case 4:
		$facultyController->getAllFaculty();
		break;
		default:
		echo '{"result":0, "message":"No request made"}';
		break;
	}
}