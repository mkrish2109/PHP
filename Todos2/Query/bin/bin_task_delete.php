<?php
include("../../Database.php");
$database = new Database();
$id = $_POST['id'];
$confirm = $_POST['confirm'];

// Check if the task is confirmed for deletion
if ($confirm === 'yes') {

    $sql = $database->delete('task_bin', "id='$id'");

    if ($sql) {
        echo "Task permanently deleted.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    echo "Task deletion not confirmed.";
}

?>