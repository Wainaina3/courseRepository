<?php

/**
 * Created by PhpStorm.
 * User: David
 * Date: 13/11/2015
 * Time: 19:47
 */

include_once(dirname(__FILE__)."\..\phpModel\faculty.php");

class facultyControl
{

	function editFacultyById()
	{

		$cid = $_REQUEST['cid'];
		$obj = new courseOutline();
		if(!$obj->getCourseById($cid)){
			echo '{"result":0, "message":"No available course outlines"}';
			return;
		}
	// $row=$obj->fetch();
		echo '{"result":1,"outlines":[';
		echo json_encode($obj->getCourseById($cid));
		echo "]}";
	}


	function getFacultyById()
	{

		$cid = $_REQUEST['cid'];
		$obj = new courseOutline();
		if(!$obj->getCourseById($cid)){
			echo '{"result":0, "message":"No available course outlines"}';
			return;
		}
	// $row=$obj->fetch();
		echo '{"result":1,"outlines":[';
		echo json_encode($obj->getCourseById($cid));
		echo "]}";
	}

}

$cmd=$_REQUEST['cmd'];

switch ($cmd) {
	case 1:
	getFacultyById();
	break;
	case 2:
	editFacultyById();
	break;


	default:
	echo '{"result":0, "message":"No request made"}';
	break;
}
