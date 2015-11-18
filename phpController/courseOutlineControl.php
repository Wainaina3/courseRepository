<?php

/**
 * Created by PhpStorm.
 * User: David
 * Date: 13/11/2015
 * Time: 19:47
 */
include("../phpModel/courseOutline.php");


$cmd=$_REQUEST['cmd'];

switch ($cmd) {
	case 1:
	getAllCourseOutline();
	break;
	case 2:
	getCourseOutlineById();
	break;


	default:
	echo '{"result":0, "message":"No request made"}';
	break;
}


function getAllCourseOutline()
{

	$obj = new courseOutline();
	if(!$obj->getAllCourses()){
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

function getCourseOutlineById()
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




?>