<?php
include("../../Database.php");
$database = new Database();
$binId = $_POST['id'];

try {
    $sql = $database->query("INSERT INTO task (id,userId,task, `startDate`,`endDate`, `select`)
    SELECT `id`,`userId`,`task`, `startDate`,`endDate`,`select`
    FROM task_bin
    WHERE id ='$binId'");

    if (!$sql) {
        throw new Exception("Error inserting into task: " . mysqli_error($conn));
    }

    $sqlDelete = $database->delete('task_bin', "id = '$binId'");
    if (!$sqlDelete) {
        throw new Exception("Error deleting from bin: " . mysqli_error($conn));
    }
    echo "Task retrieved and moved back to task table.";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

// Close the database connection
?>