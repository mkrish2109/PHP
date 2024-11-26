<?php

$conn = mysqli_connect("localhost", "root", "", "info") or die("connection failed.");

$email = $_POST['email'];
$password = $_POST['password'];


$email = filter_var($email, FILTER_SANITIZE_EMAIL);
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid Email.......";
} else {
    $sql = "SELECT email,password,id FROM userdata WHERE email='{$email}'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        if ($password == $user['password']) {
            if (setcookie("userId", $user["id"], time() + 360000)) {
                echo "You have Successfully Login.....";
            }
        } else {
            echo "Invalid email or password....";
        }
    } else {
        echo $php_errormsg;
    }
}
mysqli_close($conn);


?>