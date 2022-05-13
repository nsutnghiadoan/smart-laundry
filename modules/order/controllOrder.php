<?php
session_start();
include "../../admin/config/connect.php";
if (isset($_GET['this_id'])) {
    $this_id = $_GET['this_id'];
    $sql = 'UPDATE order_laund SET order_stt = 1 WHERE order_id=' . $this_id;
    mysqli_query($conn, $sql);
    echo 'Đã xác nhận lịch giặt thành công <br/> <br/> <br/>';
    echo '<a href="../../user/index.php" class="return-homepage"> Quay lại trang chủ</a>';
}