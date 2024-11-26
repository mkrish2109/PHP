<?php

include("Database.php");

$database = new Database();

$email = $_POST['email'];
$password = $_POST['password'];

$email = filter_var($email, FILTER_SANITIZE_EMAIL);
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid Email.......";
} else {
    $result = $database->sql("SELECT email,password,id FROM userdata WHERE email='{$email}'");

    if ($result && ($result) > 0) {
        if ($password == $result[0]['password']) {
            if (setcookie("userId", $result[0]["id"], time() + 360000)) {
                echo "You have Successfully Login.....";
            }
        } else {
            echo "Invalid email or password....";
        }
    } else {
        echo $php_errormsg;
    }
}


?>