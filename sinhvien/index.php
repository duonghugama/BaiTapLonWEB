<?php


include('config/db.php');
if(isset($_POST['btnSearch'])){
    $MaMon = $_POST['dscacMon'];
    $sql1 = "SELECT ThoiGianBatDau,ThoiGianKetThuc, phongHoc, giaovien.Ten as tenGV , tietBatDau, tietKetThuc FROM chitietkhoahoc , monhoc , khoahoc, giaovien
      WHERE chitietkhoahoc.MaKH = khoahoc.MaKH and chitietkhoahoc.MaMon=monhoc.MaMon and chitietkhoahoc.MaGV = giaovien.MaGV
     and monhoc.MaMon = $MaMon";
    $rs1 = mysqli_query($conn, $sql1);
    if($rs1){
        header('location:chiTietHocPhan.php?idMon='.$MaMon);  
    }
}
include("./header.php");
?>

<main>
    <div class="container">
        <form action="" method="POST">
            <div class="row">
                <select name="dscacMon" id="dsMon" class="form-select ms-3 col-md-4" aria-label="Default select example">
                    <?php
                    $sql = "SELECT * FROM monhoc";
                    $rs = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($rs) > 0) {
                        while ($row = mysqli_fetch_assoc($rs)) {
                    ?>
                            <option value="<?php echo $row['MaMon'] ?>"><?php echo $row['Ten'] ?></option>
                    <?php
                        }
                    }
                    ?>
                </select>
                <button name="btnSearch" id="btnSearch2" class="btn btn-danger ms-2 col-md-1"><i class="fas fa-search"></i></button>

            </div>
        </form>
       <div class="row">
       <a href="./thongtinsv.php" class="col-md-6 d-flex justify-content-center">
        <button class="btn btn-info mt-5" style="width: 250px; height: 200px;">
            <i class="fas fa-university mb-3" style="font-size: 100px; opacity: 0.7;"></i> 
            <br>
            Thông tin cá nhân</button>
        </a>

        <a href="./chiTietMon.php" class="col-md d-flex justify-content-center">
        <button class="btn btn-info mt-5" style="width: 250px; height: 200px;">
            <i class="fas fa-university mb-3" style="font-size: 100px; opacity: 0.7;"></i> 
            <br>
            Danh sách môn học</button>
        </a>
       </div>

      <div class="row">
      <a href="./dangkyhoc.php" class="col-md-6 d-flex justify-content-center">
        <button class="btn btn-info mt-5" style="width: 250px; height: 200px;">
            <i class="fas fa-university mb-3" style="font-size: 100px; opacity: 0.7;"></i> 
            <br>
            Đăng ký học</button>
        </a>

        <a href="./kqDangKy.php" class="col-md d-flex justify-content-center">
        <button class="btn btn-info mt-5" style="width: 250px; height: 200px;">
            <i class="fas fa-university mb-3" style="font-size: 100px; opacity: 0.7;"></i> 
            <br>
            Kết quả đăng ký học</button>
        </a>
      </div>
    </div>
</main>

<?php
include("./footer.php");
?>

<!-- <script>
    $("#btnSearch2").click(function(){

    })
</script> -->