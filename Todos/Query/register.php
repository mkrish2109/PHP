<?php
$conn = mysqli_connect("localhost", "root", "", "info") or die("connection failed.");
$username = $_POST['username1'];
$email = $_POST['email1'];
$password = $_POST['password1'];

$email = filter_var($email, FILTER_SANITIZE_EMAIL); // Sanitizing email(Remove unexpected symbol like <,>,?,#,!, etc.)
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid Email.......";
} else {
    $result = mysqli_query($conn, "SELECT * FROM userData WHERE email='{$email}'");

    if (mysqli_num_rows($result) == 0) {
        $query = mysqli_query($conn, "insert into userdata (username, email, password) values ('$username', '$email', '$password')"); // Insert query
        if ($query) {
            echo "You have Successfully Registered.....";
        } else {
            echo "Error....!!";
        }
    } else {
        echo "This email is already registered, Please try another email...";
    }
}
mysqli_close($conn);
?>