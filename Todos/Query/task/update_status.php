<?php
$id = $_POST['id'];
$completed = $_POST['completed'];

$conn = mysqli_connect("localhost", "root", "", "info") or die("Connection failed");

$sql = "UPDATE `task` SET `isCompleted`='$completed' WHERE id={$id}";

if (mysqli_query($conn, $sql)) {
    echo "Status Successfully Updated";
} else {
    echo "Update Failed: " . mysqli_error($conn);
}

mysqli_close($conn);
?>