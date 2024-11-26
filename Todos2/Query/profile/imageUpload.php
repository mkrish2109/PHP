<?php
include("../../Database.php");
$database = new Database();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userId = $_COOKIE["userId"];


    $target_dir = "../../image/";
    $filename = date('Ymdhis') . '-' . basename($_FILES["uploadFile"]["name"]);
    $target_file = $target_dir . $filename;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["uploadFile"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".<br>";
    } else {
        echo "File is not an image.<br>";
        $uploadOk = 0;
    }


    $allowedFileTypes = ['jpg', 'jpeg', 'png', 'gif'];
    if (!in_array($imageFileType, $allowedFileTypes)) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>";
        $uploadOk = 0;
    }

    $result = $database->sql("SELECT image FROM userdata WHERE id='{$userId}'");
    $old_image = ($result && count($result) > 0) ? $result[0]['image'] : null;

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.<br>";
    } else {
        if ($database->update("userdata", ["image" => $filename], "id= $userId")) {
            echo "Database updated successfully.<br>";

            // Move the uploaded file to the target directory
            if (move_uploaded_file($_FILES["uploadFile"]["tmp_name"], $target_file)) {
                echo "The file " . htmlspecialchars(basename($_FILES["uploadFile"]["name"])) . " has been uploaded.<br>";

                // Delete old image file if it exists
                if ($old_image && file_exists($target_dir . $old_image)) {
                    if (unlink($target_dir . $old_image)) {
                        echo "Old image file deleted.<br>";
                    } else {
                        echo "Error deleting old image file.<br>";
                    }
                }
            } else {
                echo "<h3>&nbsp; Failed to upload image!</h3>";
            }
        } else {
            echo "Error: " . $sql . "<br>";
        }
    }

}
?>