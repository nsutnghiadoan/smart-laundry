<?php 

    $conn = mysqli_connect('localhost','root','','smart_laundry');
    if($conn){
        mysqli_query($conn, "SET NAMEs 'UTF8'");
    }else{
        echo "Kết nối Database thất bại";
    }
?>