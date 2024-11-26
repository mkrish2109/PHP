<?php
$id = $_POST['id'];
$task = $_POST['task'];
$date = $_POST['date'];
$select = $_POST['select'];

$conn = mysqli_connect("localhost", "root", "", "info") or die("Connection failed");

$sql = "UPDATE `task` SET `task`='$task', `date`='$date', `select`='$select' WHERE id={$id}";

if (mysqli_query($conn, $sql)) {
    echo "Task Successfully Updated";
} else {
    echo "Update Failed: " . mysqli_error($conn);
}

mysqli_close($conn);
?>