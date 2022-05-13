<?php
include "../../config/connect.php";
session_start();

if (isset($_GET['this_id'])) {
    $this_id = $_GET['this_id'];
    $query = "SELECT * FROM laund WHERE laund_id = " . $this_id;
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
}
if ($_POST['update']) {
    $laund_name = $_POST['laund_name'];
    $laund_img = $_POST['laund_img'];
    $laund_desc = $_POST['laund_desc'];
    $laund_mass = $_POST['laund_mass'];
    $laund_price =  $_POST['laund_price'];
    if ($laund_name == '' || $laund_img  == '' || $laund_desc == '' ||    $laund_mass  == '' || $laund_price == '') {
        echo 'vui lòng điền đầy đủ thông tin';
    } else {
        $sql = "UPDATE laund SET laund_name='$laund_name' , laund_img='$laund_img' , laund_desc = '$laund_desc', laund_mass = '$laund_mass', laund_price = '$laund_price' WHERE laund_id='$this_id'";
        mysqli_query($conn, $sql);
    }
}
?>
<form method="post">
    <label>Tên máy giặt</label>
    <input name="laund_name" value="<?php echo $row['laund_name']; ?>" />
    <label>Đường dẫn ảnh</label>
    <input name="laund_img" value="<?php echo $row['laund_img']; ?>" />
    <label>Mô tả</label>
    <textarea name="laund_desc" value="<?php echo $row['laund_desc']; ?>"> </textarea>
    <label>Khối lượng (kg)</label>
    <input name="laund_mass" value="<?php echo $row['laund_mass']; ?>" />
    <label>Giá :</label>
    <input name="laund_price" value="<?php echo $row['laund_price']; ?>" />
    <button type="submit" name="update">Cập nhật</button>
</form>