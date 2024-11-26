<?php
$id = $_POST['id'];
$conn = mysqli_connect("localhost", "root", "", "info") or die("Connection failed");

// Start transaction
mysqli_begin_transaction($conn);

try {

    $sqlInsert = "INSERT INTO task_bin (id,userId,task, `date`, `select`) SELECT `id`,`userId`,`task`,`date`,`select` FROM task where id='$id' ";
    if (!mysqli_query($conn, $sqlInsert)) {
        throw new Exception("Error inserting into bin: " . mysqli_error($conn));
    }

    // Delete task from task table
    $sqlDelete = "DELETE FROM task WHERE id='$id'";
    if (!mysqli_query($conn, $sqlDelete)) {
        throw new Exception("Error deleting from task: " . mysqli_error($conn));
    }

    // Commit transaction
    mysqli_commit($conn);
    echo "Task moved to bin and deleted from task table.";
} catch (Exception $e) {
    // Rollback transaction if any query fails
    mysqli_rollback($conn);
    echo "Error: " . $e->getMessage();
}

// Close the database connection
mysqli_close($conn);
?>