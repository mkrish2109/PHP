<?php
include("../Database.php");

$database = new Database();


$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$email = filter_var($email, FILTER_SANITIZE_EMAIL); // Sanitizing email(Remove unexpected symbol like <,>,?,#,!, etc.)
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid Email.......";
} else {


    $result = $database->sql("SELECT * FROM userData WHERE email='{$email}'");

    if ($result == 0) {
        $data = ['username' => $username, 'email' => $email, 'password' => $password];
        if ($database->insert('userdata', $data)) {
            echo true;
        } else {
            echo "Failed to register user.";
        }
    } else {
        echo "Email already exists.";
    }

}

?>