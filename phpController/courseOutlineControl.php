<?php

/**
 * Created by PhpStorm.
 * User: David
 * Date: 13/11/2015
 * Time: 19:47
 */
include_once(dirname(__FILE__)."\..\phpModel\courseOutline.php");

class courseOutlineControl extends courseOutline
{
/*Akpene
 *Adding a course outline
 */
public function addCourseControl(){

	$courseName=$_REQUEST['courseName'];
	$courseId=$_REQUEST['courseId'];
	$courseObjective=$_REQUEST['courseObjective'];
	$courseReadings=$_REQUEST['courseReadings'];
	$courseDescription=$_REQUEST['courseDescription'];
	$courseEvaluation=$_REQUEST['courseEvaluation'];
	$learningGoals=$_REQUEST['learningGoals'];
	$courseDepartment=$_REQUEST['courseDepartment'];

	echo '{"results":0,"message":"Got your message","received":"'.$courseName.'"}';
						
}


}
$outline = new courseOutlineControl();

if(isset($_REQUEST['cmd'])) {

	$cmd=$_REQUEST['cmd'];

	switch ($cmd) {
		case 1:
			$outline->addCourseControl();
			break;
		
		default:
			# code...
			break;
	}
}