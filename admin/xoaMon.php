<?php
session_start();
if($_SESSION["Quyen"]!= 3)
{
    header("location: ../index.php");
}
$MaMon = $_GET['MaMon'];
$connect = mysqli_connect('localhost', 'root', '', 'baitaploncnw');
if (!$connect) {
    die("Không thể kết nối");
}
$sql = "DELETE FROM monhoc WHERE MaMon = $MaMon";
echo $sql;
$result = mysqli_query($connect, $sql);
if ($result > 0) {
    header("Location: monhoc.php");
} else {
    echo "Lỗi!";
}
mysqli_close($connect);
