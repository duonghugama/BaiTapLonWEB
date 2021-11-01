<?php
session_start();
if($_SESSION["Quyen"]!= 3)
{
    header("location: ../index.php");
}
$MaKH = $_POST["MaKH"];
$MaMon = $_POST["MaMon"];
$MaGV = $_POST["MaGV"];
$phong = $_POST["phongHoc"];
$tietBD = $_POST["tietBD"];
$tietKT = $_POST["tietKT"];
include("./config/db.php");
$sql = "INSERT INTO `chitietkhoahoc`(`MaKH`, `MaMon`, `MaGV`, `phonghoc`, `tietBatDau`, `tietKetThuc`) 
VALUES ('$MaKH','$MaMon','$MaGV','$phong','$tietBD','$tietKT')";
echo $sql;
$result = mysqli_query($connect,$sql);
// Bước 03:
if($result > 0){
    header("Location: chiTietKhoaHoc.php?MaKH= $MaKH");
}else{
    echo "Lỗi!";
}
mysqli_close($connect);