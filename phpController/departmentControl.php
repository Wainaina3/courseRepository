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

        if(!$this->viewDepartmentsModel()){
            echo '{"result":0, "message":"No available departments"}';
            return;
        }
        $row=$this->fetch();
        echo '{"result":1,"departments":[';
        while($row){
            echo json_encode($row);
            $row=$this->fetch();
            if($row){
                echo ",";
            }
        }
        echo "]}";
    }

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
