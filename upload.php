<?php 
    include "connection.php";
    $rep = "";
    $folder = "uploads/";
    //var_dump($_FILES);
    //die();
    if (isset($_POST['submit'])) {
        if (!empty($_FILES['file']['name'])) {
            $image = basename($_FILES['file']['name']);
            $filename = uniqid() . $image;
            $filePath = $folder . $filename;
            $fileType = pathinfo($image,PATHINFO_EXTENSION);
            $formats = array('jpg','png','jpeg','gif');
            if (in_array($fileType,$formats)) {
                if (move_uploaded_file($_FILES['file']['tmp_name'],$filePath)) {
                    $sql = "INSERT INTO images (file_name) VALUES ('$filename')";
                    if ($result = mysqli_query($conn,$sql)) {
                        $rep = urlencode('File was uploaded succesfully');
                        header("Location: index.php?succes=".$rep."");
                    } else {
                        $rep = urlencode('File was not uploaded');
                        header("Location: index.php?error=".$rep."");
                    }
                }
            }
        }
    }