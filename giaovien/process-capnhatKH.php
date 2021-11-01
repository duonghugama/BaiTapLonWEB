<?php
include("constants.php");
session_start();
if($_SESSION["Quyen"]!= 1)
{
    header("location: ../index.php");
}
?>
<?php
    $MaKH = $_POST["MaKH"];
    $MaMon = $_POST["MaMon"];
    $MaGV = $_POST['MaGV'];
    $phong = $_POST["phongHoc"];
    $tietBD = $_POST["TietBatDau"];
    $tietKT = $_POST["TietKetThuc"];
  
    $sql = "INSERT INTO chitietkhoahoc(MaKH, MaMon, MaGV, phonghoc, tietBatDau, tietKetThuc) 
    VALUES ('$MaKH','$MaMon','$MaGV','$phong','$tietBD','$tietKT') ";
    echo $sql;
    $result = mysqli_query($conn,$sql);
    // Bước 03:
    if($result > 0){
        header("Location: KHGV.php");
    }else{
        echo "Lỗi!";
    }
    mysqli_close($conn);

?>

