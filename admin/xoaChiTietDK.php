<?php
session_start();
if($_SESSION["Quyen"]!= 3)
{
    header("location: ../index.php");
}
$ID = $_GET["ID"];
$MaKH = $_GET["MaKH"];
include("./config/db.php");
$sql = "DELETE FROM chitietdangky WHERE ID = $ID";
echo $sql;
$result = mysqli_query($connect, $sql);
if ($result > 0) {
    header("Location:chiTietDangKy.php?MaKH= $MaKH");
} else {
    echo "Lỗi!";
}
mysqli_close($connect);
?>