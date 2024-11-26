<?php
include("../../Database.php");
$database = new Database();
$id = $_POST['id'];
$task = $_POST['task'];
$endDate = date('Y-m-d H:i:s', strtotime($_POST['endDate']));

$select = $_POST['select'];

$data = [
    '`task`' => $task,
    '`endDate`' => $endDate,
    '`select`' => $select
];

if ($database->update('task', $data, "id= $id")) {
    echo true;
} else {
    echo "Update Failed: " . mysqli_error($conn);
}

?>