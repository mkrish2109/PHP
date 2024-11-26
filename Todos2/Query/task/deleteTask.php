<?php
include("../../Database.php");
$database = new Database();
$id = $_POST['id'];

try {

    $sql = $database->query("INSERT INTO task_bin (id,userId,task, `startDate`,`endDate`, `select`) SELECT `id`,`userId`,`task`, `startDate`,`endDate`,`select` FROM task where id='$id'");

    if (!$sql) {
        throw new Exception("Error inserting into bin: " . mysqli_error($conn));
    }

    // Delete task from task table
    $sqlDelete = $database->delete('task', "id='$id'");
    if (!$sqlDelete) {
        throw new Exception("Error deleting from task: " . mysqli_error($conn));
    }

    echo "Task moved to bin and deleted from task table.";
} catch (Exception $e) {
    // Rollback transaction if any query fails

    echo "Error: " . $e->getMessage();
}

?>