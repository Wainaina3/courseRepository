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
}


$departmentcontrol = new departmentControl();

if(isset($_REQUEST['cmd'])){
    $cmd=$_REQUEST['cmd'];

    switch($cmd){

        case 1:
            break;
        case 2:
            break;
        case 3:
            break;
        case 4:
            break;
        case 5:
            $departmentcontrol->viewDepartmentsControl();
            break;
        case 6:
           $departmentcontrol->getDepartmentCoursesControl();
    }
}

?>