<?php
session_start();
if($_SESSION["Quyen"]!= 3)
{
    header("location: ../index.php");
}
$MaKH = $_POST["MaKH"];
$MaMon = $_POST["MaMon"];
$MaSV = $_POST["MaSV"];

include("./config/db.php");
$sql = "INSERT INTO `chitietdangky`(`MaKH`, `MaMon`, `MaSV`) 
VALUES ('$MaKH','$MaMon','$MaSV')";
echo $sql;
$result = mysqli_query($connect,$sql);
// Bước 03:
if($result > 0){
    header("Location: chiTietDangKy.php?MaKH= $MaKH");
}else{
    echo "Lỗi!";
}
mysqli_close($connect);