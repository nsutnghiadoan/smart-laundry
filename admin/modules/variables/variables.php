<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: ../modules/login/login.php');
}
$login = $_SESSION['login'];
$getID = "SELECT * FROM user WHERE email= '$login'";
$result = mysqli_query($conn, $getID);
$user = mysqli_fetch_array($result);
$email = $user['email'];

$countUser = "SELECT COUNT(user_id) FROM user WHERE user_level = 1";
$resultUser = mysqli_query($conn, $countUser);
$userCount = mysqli_fetch_array($resultUser);
$quanUser = $userCount['COUNT(user_id)'];

$countNotAdmin = "SELECT COUNT(user_id) FROM user WHERE user_level = 2";
$resultNotAdmin = mysqli_query($conn, $countNotAdmin);
$notAdminCount = mysqli_fetch_array($resultNotAdmin);
$quanNotAdmin = $notAdminCount['COUNT(user_id)'];

$countOrder = "SELECT COUNT(order_id) FROM order_laund ";
$resultUser = mysqli_query($conn, $countOrder);
$orderCount = mysqli_fetch_array($resultUser);
$quanOrder = $orderCount['COUNT(order_id)'];

$countLaund = "SELECT COUNT(laund_id) FROM laund ";
$resultLaund = mysqli_query($conn, $countLaund);
$laundCount = mysqli_fetch_array($resultLaund);
$quanLaund = $laundCount['COUNT(laund_id)'];

$countLaunding = "SELECT COUNT(laund_id) FROM laund WHERE laund_stt = 0";
$resultLauding = mysqli_query($conn, $countLaunding);
$laundingCount = mysqli_fetch_array($resultLauding);
$quanLaunding = $laundingCount['COUNT(laund_id)'];

$notLauding = $quanLaund - $quanLaunding;

$countOrderNotConfirm = "SELECT COUNT(order_id) FROM order_laund WHERE order_stt = 0";
$resultOrderNotConfirm = mysqli_query($conn, $countOrderNotConfirm);
$arrayOrderNotConfirm = mysqli_fetch_array($resultOrderNotConfirm);
$orderNotConfirm = $arrayOrderNotConfirm['COUNT(order_id)'];

$countOrderConfirm = "SELECT COUNT(order_id) FROM order_laund WHERE order_stt = 1";
$resultOrderConfirm = mysqli_query($conn, $countOrderConfirm);
$arrayOrderConfirm = mysqli_fetch_array($resultOrderConfirm);
$orderConfirm = $arrayOrderConfirm['COUNT(order_id)'];

$orderPay = $quanOrder - $orderNotConfirm - $orderConfirm;
$quanUserAndAdmin = $quanNotAdmin + $quanUser;