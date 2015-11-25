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
<<<<<<< HEAD
	$courseTitle=$_REQUEST['courseTitle'];

	// $requestAdd=$this->addCourse($course_name,$course_id,$course_objective,
	// 		$course_readings,$course_description, $course_evaluation, $learning_goals,$courseDept)

	// if($requestAdd){
	// 	echo '{"results":0,"message":"success"}';
	// }
	// else{

	// }
	echo '{"results":0,"message":"Got your message","received":"$courseTitle"}';
	//request all eements

						
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

=======

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
>>>>>>> 63a632b9fd282cc640870b6e4aad431c17d7e226
}