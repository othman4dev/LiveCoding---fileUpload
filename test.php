<?php
    include "connection.php";
    $rep = "";
    $folder = "uploads/";
    if (isset($_POST["submit"])) {
        if(!isset($_FILES['file']['name'])) {
            $image = basename($_FILES["file"]["name"]);
            $filename = uniqid() . $image;
            $filePath = $folder . $filename;
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENTION);
            $formats = array('jpg','png','gif','jpeg');
            if (in_array($formats,$fileType)) {
                if (move_uploaded_file($)) {
                    # code...
                }
            }
        }
    }
?>