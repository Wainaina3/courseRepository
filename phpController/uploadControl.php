<?php

/**
 * Created by PhpStorm.
 * User: David
 * Date: 13/11/2015
 * Time: 19:48
 */
/*
 * This class relies on uploadFile.php file which is located in PhpModel folder
 */
include_once(dirname(__FILE__)."\..\phpModel\uploadFile.php");
define("UPLOAD_DIR",dirname(__FILE__). "\..\pdfFiles/");
class uploadControl extends uploadFile
{

    function file_get_upload(){

        if (!empty($_FILES['myFile'])) {

            $myFile = $_FILES['myFile'];

            if ($myFile['error'] !== UPLOAD_ERR_OK) {

                echo '{"results":0,"message":"Had an error uploading file."}';
                exit;
            }
            else if ($myFile['type'] !== "application/pdf" ) {

                echo '{"results":0,"message":"Only Pdf format files are allowed"}';
                exit;

            }

            $name = preg_replace("/[^A-Z0-9._-]/i","_",$myFile["name"]);

            $i=0;

            $parts=pathinfo($name);

            while (file_exists(UPLOAD_DIR.$name)) {

                $i++;
                $name = $parts["filename"] . "-" . $i ."." . $parts["extension"];
            }

            $success = move_uploaded_file($myFile["tmp_name"],UPLOAD_DIR . $name);

            if (!$success) {
                echo '{"results":0,"message":"Could not successfully move the file to target directory"}';
                exit;
            }
            else{

                $courseId = $_REQUEST['courseId'];
                $fileId = $courseId.date("Y-m-d.H:i:s");
                $courseTitle = $_REQUEST['courseTitle'];
                $semester = $_REQUEST['semester'];
                $facultyId = $_REQUEST['facultyId'];

                $storageLink = dirname(dirname(__FILE__))."\\pdfFiles\\".$name;
                echo $storageLink;
                $this->connect();
                $storageLinkEscaped=mysqli_real_escape_string($this->link,$storageLink);
             $insertion=  $this->insertFile($courseId, $courseTitle,$semester, $facultyId, $fileId, $storageLinkEscaped);



               if ($insertion) {

                    echo '{"results":1,"message":"Successfully inserted in the database"}';
                }
            }


        }
        else{
            echo '{"results":"Empty file called"}';
        }
    }

}

$fileControl = new uploadControl();

if (isset($_REQUEST['cmd'])) {

    $cmd = $_REQUEST['cmd'];

    switch ($cmd) {

        case 1:
            $fileControl->file_get_upload();

            break;

        default:
            echo '{"results":0,"message":"No command was sent to this class. Exiting"}';
    }
}