<?php
$ten = $_POST["nam"];
$ky = $_POST["ky"];
$TGBD = $_POST["TGBD"];
$TGKT = $_POST["TGKT"];
$ChoPhep = $_POST["ChoPhep"];
$connect = mysqli_connect('localhost', 'root', '', 'baitaploncnw');
if (!$connect) {
    die("Không thể kết nối");
}
$sql = "INSERT INTO `khoahoc`(`Ten`, `Ky`, `ThoiGianBatDau`, `ThoiGianKetThuc`, `DuocDangKy`) 
VALUES ('$ten','$ky','$TGBD','$TGKT','$ChoPhep')";
echo $sql;
$result = mysqli_query($connect,$sql);
// Bước 03:
if($result > 0){
    header("Location:index.php");
}else{
    echo "Lỗi!";
}
mysqli_close($conn);
