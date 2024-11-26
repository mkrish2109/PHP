<?php


$userId = $_COOKIE["userId"];
$username = $_POST["username"];
$password = $_POST["password"];

$conn = mysqli_connect("localhost", "root", "", "info") or die("connection failed.");

$sql = "UPDATE userdata SET username='{$username}',password='{$password}' where id='{$userId}'  ";



if (mysqli_query($conn, $sql)) {
    echo "Data Updated Successfully...";
} else {
    echo "Query unsuccessfully error" . mysqli_error($conn);
}

mysqli_close($conn);

