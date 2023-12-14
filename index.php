<?php 
include "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>LIVE CODING | IMAGE UPLOAD</title>
</head>
<body>
    <div class="wrapper">
        <div class="preview" id="preview">

        </div>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <input type="file" name="file" id="file-inp" onchange="showPreview(this)" accept=".jpg, .png,.jpeg,.gif">
            <input type="submit" value="Submit" name="submit">
            <?php 
            if (isset($_GET['rep'])) {
                $rep = urldecode($_GET['error']);
                echo "<p style='color:red;font-size:11px;'>". $rep ."</p>";
            } else if (isset($_GET["success"])) {
                $good = urldecode($_GET["success"]);
                echo "<p style='color:green;font-size:11px;'>". $good ."</p>";
            }
            ?>
        </form>
        <h1># Gallery</h1>
        <div class="list">
        <?php  
        $sql = "SELECT * FROM images";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            echo "<img class='grid-img' alt='Uploaded Image' src='uploads/".$row["file_name"]."'>";
        }
        ?>
    </div>
    </div>
</body>
</html>
<script src="script.js"></script>