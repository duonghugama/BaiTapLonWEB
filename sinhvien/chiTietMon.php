<?php
include('config/db.php');

if(isset($_POST['btnSearch'])){
    $MaMon = $_POST['dscacMon'];
    $sql1 = "SELECT ThoiGianBatDau,ThoiGianKetThuc, phongHoc, giaovien.Ten as tenGV , tietBatDau, tietKetThuc FROM chitietkhoahoc , monhoc , khoahoc, giaovien
      WHERE chitietkhoahoc.MaKH = khoahoc.MaKH and chitietkhoahoc.MaMon=monhoc.MaMon and chitietkhoahoc.MaGV = giaovien.MaGV
     and monhoc.MaMon = $MaMon";
    $rs1 = mysqli_query($conn, $sql1);
    if($rs1){
        header('location:chiTietMon.php?idMon='.$MaMon);  
    }
}
include("./header.php");
?>
<main>
<?php
    if (isset($_POST['btnDangKy'])){
        $checkHocPhan = $_POST['checkHocPhan'];
    if (isset($checkHocPhan)) {
        $idMon = $_GET['idMon'];
        $sql_dsHocPhan = "SELECT chitietkhoahoc.MaKH as MaKH,chitietkhoahoc.MaMon,monhoc.Ten as TenMon
        FROM chitietkhoahoc , monhoc , khoahoc, giaovien
        WHERE chitietkhoahoc.MaKH = khoahoc.MaKH and chitietkhoahoc.MaMon=monhoc.MaMon and chitietkhoahoc.MaGV = giaovien.MaGV
       and monhoc.MaMon = $idMon";
         $rs_dsHocPhan = mysqli_query($conn, $sql_dsHocPhan);
         $row_dsHocPhan = mysqli_fetch_array($rs_dsHocPhan);
         if($rs_dsHocPhan){
             $MaKHdk = $row_dsHocPhan['MaKH'];
             $MaMondk = $row_dsHocPhan['MaMon'];
             $MaSVdk = 3;
             $TenMon = $row_dsHocPhan['TenMon'];
            $sql_dkHoc = "INSERT INTO chitietdangky(MaKH, MaMon ,MaSV) values ('$MaKHdk','$MaMondk','$MaSVdk')";
            $rs_dkHoc = mysqli_query($conn, $sql_dkHoc);
            if($rs_dkHoc){
                $_SESSION['dangKyOK'] = "<h5 class='text-success'>Bạn đã đăng ký thành công môn học ".$TenMon."</h5>";
            }
         }
        }
    }
    ?>
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
                <button name="btnSearch" id="btnSearch" class="btn btn-danger ms-2 col-md-1"><i class="fas fa-search"></i></button>
            </div>
        </form>
        <table class="table table-bordered mt-3">
                        <thead>
                            <tr>
                                <th class="col-md-1"></th>
                                <th scope="col">Môn Học</th>
                                <th scope="col">Thời gian bắt đầu</th>
                                <th scope="col">Thời gian kết thúc</th>
                                <th scope="col">Tiết</th>
                                <th scope="col">Phòng</th>
                                <th scope="col">Giáo viên</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include('config/db.php');
                            $idMon = $_GET['idMon'];
                            $sql_dsHocPhan = "SELECT monhoc.Ten as TenMon, ThoiGianBatDau,ThoiGianKetThuc, phongHoc, giaovien.Ten as tenGV , tietBatDau, tietKetThuc FROM chitietkhoahoc , monhoc , khoahoc, giaovien
                              WHERE chitietkhoahoc.MaKH = khoahoc.MaKH and chitietkhoahoc.MaMon=monhoc.MaMon and chitietkhoahoc.MaGV = giaovien.MaGV
                            and monhoc.MaMon = $idMon ";
                            $rs_dsHocPhan = mysqli_query($conn, $sql_dsHocPhan);
                            if (mysqli_num_rows($rs_dsHocPhan) > 0) {
                                while ($row_dsHocPhan = mysqli_fetch_array($rs_dsHocPhan)) {
                            ?>
                                    <tr>
                                        <td>
                                            <input class="form-check-input ms-2" name="checkHocPhan" type="checkbox" value="" aria-label="...">
                                        </td>
                                        <td><?php echo $row_dsHocPhan['TenMon']?></td>
                                        <td><?php echo $row_dsHocPhan['ThoiGianBatDau'] ?></td>
                                        <td><?php echo $row_dsHocPhan['ThoiGianKetThuc'] ?></td>
                                        <td><?php echo $row_dsHocPhan['tietBatDau'] . ' <i class="fas fa-arrow-right"></i> ' . $row_dsHocPhan['tietKetThuc'] ?></td>
                                        <td><?php echo $row_dsHocPhan['phongHoc'] ?></td>
                                        <td><?php echo $row_dsHocPhan['tenGV'] ?></td>
                                    </tr>

                            <?php

                                }
                            }
                            ?>
                        </tbody>
                    </table>
                    <button name="btnDangKy" class="btn btn-success">Đăng ký</button>
    </div>
</main>

<?php
include("./footer.php");
?>

<!-- <script>
    $("#btnSearch").click(function(){

    })
</script> -->