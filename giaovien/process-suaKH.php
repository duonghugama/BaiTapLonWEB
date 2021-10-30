<?php
session_start();
if($_SESSION["Quyen"]!= 1)
{
    header("location: ../index.php");
}
$ID = $_GET["ID"];
$MaKH = $_POST["MaKH"];
$MaMon = $_POST["MaMon"];
$MaGV = $_POST["MaGV"];
$phongHoc = $_POST["phongHoc"];
$TGBD = $_POST["ThoiGianBatDau"];
$TGKT = $_POST["ThoiGianKetThuc"];

echo $ID.$MaKH.$MaMon.$MaGV.$phongHoc.$TGBD.$TGKT;
include("constants.php");
$sql = "UPDATE chitietkhoahoc
SET MaKH='$MaKH',MaMon='$MaMon',MaGV='3',
phongHoc='$phongHoc',ThoiGianBatDau='$TGBD',ThoiGianKetThuc='$TGKT' 
WHERE ID='$ID'";
echo $sql;
$result = mysqli_query($connect,$sql);
// Bước 03:
if($result > 0){
    header("Location:KHGV.php");
}else{
    echo "Lỗi!";
}
mysqli_close($conn);