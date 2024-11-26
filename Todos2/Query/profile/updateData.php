<?php
include("../../Database.php");
$database = new Database();

$userId = $_COOKIE["userId"];
$username = $_POST["username"];
$password = $_POST["password"];
$data = [
    "username" => $username,
    "password" => $password
];


if ($database->update("userdata", $data, "id= $userId")) {
    echo "Data Updated Successfully...";
} else {
    echo "Query unsuccessfully error" . mysqli_error($conn);
}


