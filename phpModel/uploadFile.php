<?php

/**
 * Created by PhpStorm.
 * User: David
 * Date: 13/11/2015
 * Time: 19:49
 */
include_once("adb.php");
class uploadFile extends adb
{

    function insertFile($courseId, $courseTitle,$semester, $facultyId, $fileId, $storageLink) {

        $sql="insert into pdffiletable set courseId='$courseId',courseTitle='$courseTitle',semester='$semester',facultyId='$facultyId',fileId='$fileId',storageLink='$storageLink'";

        return $this->query($sql);
    }
}