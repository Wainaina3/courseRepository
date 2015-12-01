<?php

/**
 * Created by PhpStorm.
 * User: David & Daniel
 * Date: 13/11/2015
 * Time: 19:47
 */

include_once(dirname(__FILE__)."/../phpModel/courseOutline.php");
/**
 * This class communicates with the courseOutline class
 * it acts and interface between the model (database & courseOutline.php) and the view (user page)
 *
 */
class courseOutlineControl extends courseOutline
{

function getAllCourseOutline()
{
    if(!$this->getAllCourses()){
        echo '{"result":0, "message":"No available course outlines"}';
        return;
    }
    $row=$this->fetch();
    echo '{"result":1,"outlines":[';
    while($row){
        echo json_encode($row);
        $row=$this->fetch();
        if($row){
            echo ",";
        }
    }
    echo "]}";
}

function getCourseOutlineById()
{
    $cid = $_REQUEST['courseId'];
    if(!$this->getCourseById($cid)){
        echo '{"result":0, "message":"No available course outlines"}';
        return;
    }
    // $row=$obj->fetch();
    echo '{"result":1,"outlines":[';
    echo json_encode($this->getCourseById($cid));
    echo "]}";
}

/**
 * This functions get a course to be deleted from the user request
 * It first checks whether the course id was set and only proceeds if it was set
 * It then sends it to courseOutline to delete it
 * @return json format message of success or failure. The failure result value is 0 while success result is 1
 */
function deleteCourse()
{
    if (!isset($_REQUEST['courseId'])) {
     echo '{"result":0}';
        exit;
 }

 $courseId=$_REQUEST['courseId'];

 if  ($this->deleteCourseOutline($courseId)) {
    echo '{"result":1,"message":"Course $courseId was deleted from database"}';
}
}

/**
    *This get the courseid of what the user wants to update
    *With the courseId the course Outline with such data is displayed
    *The user then does the modification
    */
    function showCourseToUpdate(){
        if(!isset($_REQUEST['courseId'])){
            echo '{"result":0,"message":"Nothing to do"}';
            return;
        }
        $courseId=$_REQUEST['courseId'];
        $result=$this->showOutline($courseId);
        if(!$result){
            return;
        }
        $row=$this->fetch();
        echo '{"result":1,"Outline":[';
        while($row){
            echo json_encode($row);
            $row=$this->fetch();
            if($row){
                echo ",";
            }
            
        }
        echo "]}";
    }

    function getCourseOutlines(){
    $result=$this->getAllCourses();
    if(!$result){
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

    /**
    *Displays the schedule table of the course outline where the user can modify either the week something is due or otherwise.
    *The user does his/her modifications with the displayed result
    */
    function showTableToUpdate(){
        if(!isset($_REQUEST['courseId'])){
            echo '{"result":0,"message":"Nothing to do"}';
            return;
        }
        $courseId=$_REQUEST['courseId'];
        $result=$this->showTable($courseId);
        if(!$result){
            return;
        }
        $row=$this->fetch();
        echo '{"result":1,"schedule":[';
        while($row){
            echo json_encode($row);
            $row=$this->fetch();
            if($row){
                echo ",";
            }
        }
        echo "]}";
    }

    /**
        *This method takes the changed values the user has input
        *These new values are then saved into the schedule table
        */
        function doUpdateTable(){
            if(isset($_REQUEST['id'])){
                $cid=$_REQUEST['id'];
                $week=$_REQUEST['week'];
                $wid=$_REQUEST['wid'];
                $topic=$_REQUEST['topic'];
                $reading=$_REQUEST['reading'];
                $milestone=$_REQUEST['milestone'];

                $result=$this->saveUpdatedTable($cid,$wid,$week,$topic,$reading,$milestone);
                if(!$result){
                    echo '{"result":0,"message":"Failed to update Schedule"}';
                    return;
                }
                else{
                    echo '{"result":1,"message":"Updated schedule Successfully"}';
                    return;
                }
            }
            echo '{"result":0,"message":"No CourseID captured"}';
        }
// 
    /**
    *This method gets the new values entered and saved them accordingly
    *This is done by calling a saveUpdatedCourse function.
    **/
    function doUpdateCourse(){
        if(isset($_REQUEST['id'])){
            $cid=$_REQUEST['id'];
            $title=$_REQUEST['title'];
            $objective=$_REQUEST['objective'];
            $dept=$_REQUEST['dept'];
            $evaluate=$_REQUEST['evaluate'];
            $read=$_REQUEST['read'];
            $goal=$_REQUEST['goals'];
            $semester=$_REQUEST['semester'];
            $facid=$_REQUEST['fid'];

            $result=$this->saveUpdatedCourse($cid,$title,$objective,$dept,$evaluate,$read,$goal,$semester,$facid);
            if(!$result){
                echo '{"result":0,"message":"Failed to update Course Outline"}';
                return;
            }
            else{
                echo '{"result":1,"message":"Updated Course Outline Successfully"}';
                return;
            }
        }
        echo '{"result":0,"message":"No CourseID captured"}';
    }

// 

}
/**
 * Creates an object of courseOutlineControl class
 * Object will be used to call its functions
 */
$outlineController=new courseOutlineControl();
/**
 * Checks whether a command was set
 * It will run the specific methods if there was a command sent to it
 *
 */
if (isset($_REQUEST['cmd'])) {
    $cmd=$_REQUEST['cmd'];

    switch ($cmd) {
        case 1:
        $outlineController->showCourseToUpdate();
        break;
        case 2:
        $outlineController->doUpdateCourse();
        break;
        case 3:
        $outlineController->doUpdateTable();
        break;
        case 4:
        $outlineController->showTableToUpdate();
        break;
        case 5:
        $outlineController->deleteCourse();
        break;
        case 6:
        $outlineController->getCourseOutlineById();
        break;
        case 7:
        $outlineController->getAllCourseOutline();
        break;
        default:

        break;
    }



}
?>