<?php
session_start();
if($_SESSION["Quyen"]!= 3)
{
    header("location: ../index.php");
}
$ID = $_GET["ID"];
$MaKH = $_POST["MaKH"];
$MaMon = $_POST["MaMon"];
$MaGV = $_POST["MaGV"];
$phongHoc = $_POST["phongHoc"];
$tietBD = $_POST["tietBD"];
$tietKT = $_POST["tietKT"];

echo $ID.$MaKH.$MaMon.$MaGV.$phongHoc.$tietBD.$tietKT;
include("./config/db.php");
$sql = "UPDATE `chitietkhoahoc` 
SET `MaKH`='$MaKH',`MaMon`='$MaMon',`MaGV`='$MaGV',
`phongHoc`='$phongHoc',`tietBatDau`='$tietBD',`tietKetThuc`='$tietKT' 
WHERE `ID`='$ID'";
echo $sql;
$result = mysqli_query($connect,$sql);
// Bước 03:
if($result > 0){
    header("Location:chiTietKhoaHoc.php?MaKH= $MaKH");
}else{
    echo "Lỗi!";
}
mysqli_close($conn);