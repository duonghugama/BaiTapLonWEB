<?php
session_start();
$MaKH = $_GET['MaKH'];
$connect = mysqli_connect('localhost', 'root', '', 'baitaploncnw');
if (!$connect) {
    die("Không thể kết nối");
}
$sql = "DELETE FROM khoahoc WHERE MaKH = $MaKH";
echo $sql;
    $result = mysqli_query($connect,$sql);
    if($result > 0){
        header("Location:index.php");
    }else{
        echo "Lỗi!";
    }
    mysqli_close($conn);
