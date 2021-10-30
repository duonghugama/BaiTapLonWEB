<?php
session_start();
if($_SESSION["Quyen"]!= 3)
{
    header("location: ../index.php");
}
$ten = $_POST["ten"];
$SoTC = $_POST["SoTC"];
$MaKhoa = $_POST["MaKhoa"];

include("./config/db.php");
$sql = "INSERT INTO `monhoc`(`Ten`, `SoTC`, `MaKhoa`) 
VALUES ('$ten','$SoTC','$MaKhoa')";
echo $sql;
$result = mysqli_query($connect,$sql);
// Bước 03:
if($result > 0){
    header("Location: monhoc.php");
}else{
    echo "Lỗi!";
}
mysqli_close($connect);