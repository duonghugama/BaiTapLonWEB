<?php
session_start();
if($_SESSION["Quyen"]!= 3)
{
    header("location: ../index.php");
}
$MaKH = $_GET["MaKH"];
$ten = $_POST["nam"];
$ky = $_POST["ky"];
$TGBD = $_POST["TGBD"];
$TGKT = $_POST["TGKT"];
$ChoPhep = $_POST["ChoPhep"];
include("./config/db.php");
$sql = "UPDATE `khoahoc` 
SET `Ten` = '$ten', `Ky` = '$ky', `ThoiGianBatDau` = '$TGBD', 
`ThoiGianKetThuc` = '$TGKT', `DuocDangKy` =  '$ChoPhep'
WHERE `MaKH` = $MaKH";
echo $MaKH;
$result = mysqli_query($connect,$sql);
// Bước 03:
if($result > 0){
    header("Location:index.php");
}else{
    echo "Lỗi!";
}
mysqli_close($conn);