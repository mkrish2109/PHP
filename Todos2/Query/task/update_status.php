<?php
include("../../Database.php");

$id = $_POST['id'];
$completed = $_POST['completed'];
$database = new Database();

if ($database->update("task", ["isCompleted" => $completed], "id= $id")) {
    echo "Status Successfully Updated";
} else {
    echo "Update Failed: ";
}

?>