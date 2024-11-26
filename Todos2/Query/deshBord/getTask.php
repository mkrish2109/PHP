<?php
include("../../Database.php");
$database = new Database();
$userId = $_COOKIE["userId"];
$taskStatus = $_POST['taskStatus'];

$query = "SELECT * FROM task WHERE userId = {$userId}";

if ($taskStatus == 'pending') {
    $query .= " AND isCompleted = 0";
} elseif ($taskStatus == 'completed') {
    $query .= " AND isCompleted = 1";
}

$result = $database->sql($query);
$output = "";

if (count($result) > 0) {
    foreach ($result as $task) {
        $endDate = date('d-m-Y H:i A', strtotime($task["endDate"]));
        $output = "<h2 class='text-lg font-bold mb-4 capitalize'>$taskStatus Task</h2>
        <div class='task bg-white shadow-md rounded-lg p-6 capitalize'>
         <h3 class='text-xl font-bold'>{$task['task']}</h3>
         <p class='text-gray-700'>Due Date:  $endDate</p>
         </div>";
    }
    echo $output;
} else {
    echo "<p>No tasks found.</p>";
}
?>