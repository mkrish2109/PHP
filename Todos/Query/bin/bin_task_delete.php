<?php
$id = $_POST['id'];
$confirm = $_POST['confirm'];

$conn = mysqli_connect("localhost", "root", "", "info") or die("Connection failed");

// Check if the task is confirmed for deletion
if ($confirm === 'yes') {
    $sql = "DELETE FROM task_bin WHERE id='$id'";

    if (mysqli_query($conn, $sql)) {
        echo "Task permanently deleted.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    echo "Task deletion not confirmed.";
}

// Close the database connection
mysqli_close($conn);
?>