<?php
session_start();
if($_SESSION["Quyen"]!= 3)
{
    header("location: ../index.php");
}
$ID = $_GET["ID"];
$MaKH = $_POST["MaKH"];
$MaMon = $_POST["MaMon"];
$MaSV = $_POST["MaSV"];

echo $ID.$MaKH.$MaMon.$MaSV;
include("./config/db.php");
$sql = "UPDATE `chitietdangky` 
SET `MaKH`='$MaKH',`MaMon`='$MaMon',`MaSV`='$MaSV'
WHERE `ID`='$ID'";
echo $sql;
$result = mysqli_query($connect,$sql);
// Bước 03:
if($result > 0){
    header("Location:chiTietDangKy.php?MaKH= $MaKH");
}else{
    echo "Lỗi!";
}
mysqli_close($conn);