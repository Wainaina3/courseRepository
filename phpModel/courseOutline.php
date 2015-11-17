<?php

/**
 * Created by PhpStorm.
 * User: David
 * Date: 13/11/2015
 * Time: 19:48
 */
include_once("adb.php");
class courseOutline extends adb
{

/*Akpene
 *Date:14/11/2015
 */
//Adding a course outline
public function addCourse($course_name,$course_id,$course_objective,
			$course_readings,$course_description, $course_evaluation, $learning_goals,$courseDept){
//connecting to the database
			$this->connect();
//sql injections
			$sqlScript="insert into course_outline set course_id='$course_id',course_name='$course_name', learning_goals='$learning_goals',
			course_objectives='$course_objective', course_descriptions='$course_description', course_readings='$course_readings',course_evaluations='$course_evaluation',course_dept='$courseDept'";
		
			return $this->query($sqlScript);
		}
}