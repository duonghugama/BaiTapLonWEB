<?php
    session_start();
   $maKH =  $_GET['makh'];
   $maMon =  $_GET['mamon'];
   $maSV =  $_GET['masv'];

   include('./config/db.php');
   $sql = "DELETE FROM chitietdangky where MaKH='$maKH' and MaMon = '$maMon' and MaSV = '$maSV'";
   $rs = mysqli_query($conn, $sql);
   if($rs){
       $_SESSION['huyHPOK'] = "<h3 class='text-success'>Hủy học phần thành công</h3>";
        header("location: kqDangKy.php");
}
   else{
       echo "Xóa thất bại";
   }
?>