<?php
include "../../admin/config/connect.php";

if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $fullname = $_POST['fullname'];
    $password = $_POST['password'];
    $level = $_POST['level'];
    $sql = "INSERT INTO USER (user_id , full_name , email , password , user_level)
        VALUES ( '', '$fullname', '$email', '$password', '$level' )";
    mysqli_query($conn, $sql);
    echo '<script>' .
        'location.href = "../../user/index.php"' .
        '</script>';
}
