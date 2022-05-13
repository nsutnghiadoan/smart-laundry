<?php
include "../../config/connect.php";
$idUser = $_GET['this_id'];
$sql =  "SELECT * FROM user WHERE user_id = " . $idUser;
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$email = $row['email'];
$sql1 = "UPDATE user SET password ='$email', user_level=2 WHERE user_id = '$idUser'";
mysqli_query($conn, $sql1);
echo "Đã đổi mật khẩu của tài khoản có email là '$email' thành '$email'";