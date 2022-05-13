<?php
include "../../config/connect.php";
if (isset($_GET['this_id'])) {
    $this_id = $_GET['this_id'];
    $sql = "DELETE FROM order_laund WHERE laund_id = " . $this_id;
    mysqli_query($conn, $sql);

    $sql = "DELETE FROM laund WHERE laund_id = " . $this_id;
    mysqli_query($conn, $sql);
    echo "Đã xóa thành công máy giặt có mã là " . $this_id;
    $index = '../../index.php';
    echo "<br><br><a href='.$index.'>Bấm để quay lại</a>";
}