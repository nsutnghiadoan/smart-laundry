<?php
session_start();
include "../../admin/config/connect.php";
if (isset($_GET['this_id'])) {
    $this_id = $_GET['this_id'];
    $out = explode(' ', $this_id);
    $sql = 'DELETE FROM order_laund WHERE order_id=' . $out[0];
    $sql1 = 'UPDATE  laund SET laund_stt = 1  WHERE laund_id=' . $out[1];
    mysqli_query($conn, $sql);
    mysqli_query($conn, $sql1);
    echo 'Đã hủy lịch giặt thành công <br/> <br/> <br/>';
    echo '<a href="../../user/index.php" class="return-homepage"> Quay lại trang chủ</a>';
}
