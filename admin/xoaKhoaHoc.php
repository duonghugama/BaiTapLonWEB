<?php
session_start();
if($_SESSION["Quyen"]!= 3)
{
    header("location: ../index.php");
}
$MaKH = $_GET['MaKH'];
$connect = mysqli_connect('localhost', 'root', '', 'baitaploncnw');
if (!$connect) {
    die("Không thể kết nối");
}
$sql = "DELETE FROM khoahoc WHERE MaKH = $MaKH";
echo $sql;
$result = mysqli_query($connect, $sql);
if ($result > 0) {
    header("Location:index.php");
} else {
    echo "Lỗi!";
}
mysqli_close($connect);
