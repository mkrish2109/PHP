<?php

include("../../Database.php");

$database = new Database();
$userId = $_COOKIE["userId"];
$task = $_POST['task'];

$endDate = date('Y-m-d H:i:s', strtotime($_POST['endDate']));
$select = $_POST['select'];

$data = [
    "userId" => $userId,
    "task" => $task,
    "endDate" => $endDate,
    "`select`" => $select
];

// Execute the query
if ($database->insert('task', $data)) {
    echo "Task Successfully Added ..";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close the database connection
?>