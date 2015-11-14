<?php

/**
 * Created by PhpStorm.
 * User: David
 * Date: 13/11/2015
 * Time: 19:47
 */
include_once(dirname(__FILE__)."\..\phpModel\courseOutline.php");
/*
 * This class communicates with the courseOutline class
 * it acts and interface between the model (database & courseOutline.php) and the view (user page)
 *
 */
class courseOutlineControl extends courseOutline
{
/*
 * This functions get a course to be deleted from the user request
 * It first checks whether the course id was set and only proceeds if it was set
 * It then sends it to courseOutline to delete it
 * @return json format message of success or failure. The failure result value is 0 while success result is 1
 */
    function deleteCourse()
    {
        if (!isset($_REQUEST['courseId'])) {
           echo '{"result":0}';
        }

        $courseId=$_REQUEST['courseId'];

        if  ($this->deleteCourseOutline($courseId)) {
            echo '{"result":1,"message":"Course $courseId was deleted from database"}';
        }
    }
}
/*
 * Creates an object of courseOutlineControl class
 * Object will be used to call its functions
 */
$outlineController=new courseOutlineControl();
/*
 * Checks whether a command was set
 * It will run the specific methods if there was a command sent to it
 *
 */
if (isset($_REQUEST['cmd'])) {
    $cmd=$_REQUEST['cmd'];

    switch ($cmd) {

        case 5:
            $outlineController->deleteCourse();
            break;

        default:

            break;
    }


}
