<?php
include "../../admin/config/connect.php";
$comment = $_GET['comment-input'];
$userID = $_GET['user-id'];
$thisidLaund = $_GET['laund-id'];
$date = date('d-m-y');
$query = "INSERT INTO comment (cmt_id,user_id,laund_id, cmt_date,cmt_detail)
VALUES ( '', '$userID', '$thisidLaund', '$date', '$comment');";
mysqli_query($conn, $query);
header("Location: /smartLaundry/user/index.php");
exit;
