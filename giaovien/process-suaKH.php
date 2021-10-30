<?php
include("constants.php");
session_start();
if($_SESSION["Quyen"]!= 1)
{
    header("location: ../index.php");
}
if(isset($_POST['submit']))
{
$ID = $_POST["ID"];

$phongHoc = $_POST["phongHoc"];

$sql = "UPDATE chitietkhoahoc 
SET 
phongHoc='$phongHoc'
WHERE ID='$ID'";

$result = mysqli_query($conn,$sql);
// Bước 03:
if($result > 0){
    
    header("Location:KHGV.php");
}else{
    echo "Lỗi!";
}
mysqli_close($conn);
}
?>
