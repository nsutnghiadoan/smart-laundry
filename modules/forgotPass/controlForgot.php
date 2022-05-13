<?php
include "../../admin/config/connect.php";
if (isset($_POST['email'])) {
    $email = $_POST['email'];
    echo $email;
}