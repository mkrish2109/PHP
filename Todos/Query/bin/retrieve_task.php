<?php
$binId = $_POST['id'];
$conn = mysqli_connect("localhost", "root", "", "info") or die("Connection failed");

// Start transaction
mysqli_begin_transaction($conn);

try {

    $sql = "INSERT INTO task (id, userId, task, `date`, `select`) 
    SELECT id, userId, task, `date`, `select`
    FROM task_bin
    WHERE id ='$binId'";

    if (!mysqli_query($conn, $sql)) {
        throw new Exception("Error inserting into task: " . mysqli_error($conn));
    }


    // Delete task from task_bin table
    $sqlDelete = "DELETE FROM task_bin WHERE id='$binId'";
    if (!mysqli_query($conn, $sqlDelete)) {
        throw new Exception("Error deleting from bin: " . mysqli_error($conn));
    }

    // Commit transaction
    mysqli_commit($conn);
    echo "Task retrieved and moved back to task table.";

} catch (Exception $e) {
    // Rollback transaction if any query fails
    mysqli_rollback($conn);
    echo "Error: " . $e->getMessage();
}

// Close the database connection
mysqli_close($conn);
?>