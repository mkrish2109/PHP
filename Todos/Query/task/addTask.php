<?php
// Retrieve data from cookie and POST
$userId = $_COOKIE["userId"];
$task = $_POST['task'];
$date = date('Y-m-d', strtotime($_POST['date']));
$select = $_POST['select'];

// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "info");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Prepare the SQL query to insert data
$sql = "INSERT INTO task (userId, task, date, `select`) VALUES ('{$userId}', '{$task}', '{$date}', '{$select}')";

// Execute the query
if (mysqli_query($conn, $sql)) {
    echo "Task Successfully Added ..";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>