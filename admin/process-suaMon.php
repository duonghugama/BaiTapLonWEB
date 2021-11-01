<?php
session_start();
if($_SESSION["Quyen"]!= 3)
{
    header("location: ../index.php");
}
$MaMon = $_GET["MaMon"];
$ten = $_POST["ten"];
$SoTC = $_POST["SoTC"];
$MaKhoa = $_POST["MaKhoa"];

echo $MaMon.$ten.$SoTC.$MaKhoa;
include("./config/db.php");
$sql = "UPDATE `monhoc` 
SET `Ten`='$ten',`SoTC`='$SoTC',`MaKhoa`='$MaKhoa'
WHERE `MaMon`='$MaMon'";
echo $sql;
$result = mysqli_query($connect,$sql);
// Bước 03:
if($result > 0){
    header("Location: monhoc.php");
}else{
    echo "Lỗi!";
}
mysqli_close($conn);