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

/*
*This function send a request to viewDepartmentsModel to
*get all the departments
*@return jsonObject
*/

    function viewDepartmentsControl(){
        $result="";
        if(!$this->viewDepartmentsModel()){
            $result=$result. '{"result":0, "message":"No available departments"}';
            echo $result;
            return;
        }
        $row=$this->fetch();
        //echo '{"result":1,"departments":[';
        $result=$result.'{"result":1,"departments":[';
        while($row){
            //echo json_encode($row);
            $result=$result.json_encode($row);
            $row=$this->fetch();
            if($row){
          //      echo ",";
              $result=  $result.",";
            }
        }
        //echo "]}";
       $result= $result."]}";
        echo $result;
        return $result;
    }

    /**
     *This function gets the courses associated with a particular
     * department with the given id
     * It gets the id from the user POST request
     * @return jsonObject
     */
    function getDepartmentCoursesControl() {

        $deptid=$_REQUEST['dept'];
        if(!$this->getDepartmentCoursesModel($deptid)){
            echo '{"result":0, "message":"No available coursed for this dept"}';
            return;
        }
        $row=$this->fetch();
        echo '{"result":1,"courses":[';
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
	*This function serves as a controller to the adding of departments
	*It requests for the details entered and set them to the model which querys the database
	*/
	function addDepartmentCon(){
		//Making sure every field is set before proceeding with the insertion. This is a validation point
		if(isset($_REQUEST['deptId']) && isset($_REQUEST['deptName'])&& isset($_REQUEST['hodId'])){
			$deptId=$_REQUEST['deptId'];
			$deptName=$_REQUEST['deptName'];
			$hodId=$_REQUEST['hodId'];
			//setting value for the addDepartment function
			$result=$this->addDepartment($deptId,$deptName,$hodId);
			//unsuccessful query result
			if(!$result){
				//json message when unsuccessful

				echo '{"result":0,"message":"Failed to Add Department"}';
				return;
			}
			//successful query
			else{
				//json message when successful
				echo '{"result":1,"message":"Successfully Added Department"}';
				return;
			}
		}
		//when some fields are not set
		else{
			//json message
			echo '{"result":0,"message":"Need to Fill All Fields!!"}';
			return;
		}
    } //End of addDepartmentCon function

    function deleteDepartmentControl(){
        $deptid=$_REQUEST['depid'];
         $deletion=$this->deleteDepartmentModel($deptid);

        if($deletion){
            echo '{"result":1,"message":"Department succesfully deleted"}';
            return;
        }
        else{
            echo '{"result":0,"message":"Could not delete the department"}';
        }
    }



}

/*
 * Creates an instance of facultyControl class
 */
$departmentControl = new departmentControl();
//Checks whether there is a command sent to the this class
if(isset($_REQUEST['cmd'])) {

    $cmd = $_REQUEST['cmd'];

    switch ($cmd) {
        case 1:
            //Add
            $departmentControl->addDepartmentCon();
            break;
        case 2:
            //Update
            break;
        case 3:
            // Delete
            $departmentControl->deleteDepartmentControl();
            break;
        case 4:
            $departmentControl->viewDepartmentsControl();
            break;
        case 5:
            // $departmentcontrol->viewDepartmentsControl();
            break;
        case 6:
            $departmentControl->getDepartmentCoursesControl();

        default:
            echo '{"result":0, "message":"No request made"}';
            break;
    }
}
