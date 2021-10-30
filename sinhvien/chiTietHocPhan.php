<?php

include("./header.php");
include("config/db.php");
?>
<main>

    <?php
    if (isset($_POST['btnDangKy'])){
        $checkHocPhan = $_POST['checkHocPhan'];
    if (isset($checkHocPhan)) {
        $MaMon = $_GET['idMon'];
        $sql_dsHocPhan = "SELECT chitietkhoahoc.MaKH as MaKH,chitietkhoahoc.MaMon,monhoc.Ten as TenMon
        FROM chitietkhoahoc , monhoc , khoahoc, giaovien
        WHERE chitietkhoahoc.MaKH = khoahoc.MaKH and chitietkhoahoc.MaMon=monhoc.MaMon and chitietkhoahoc.MaGV = giaovien.MaGV
       and monhoc.MaMon = $MaMon";
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
    <!-- <section class="pb-4"> -->
    <!-- <div class="bg-light rounded-5"> -->
    <!-- Chọn kì học -->
    <section class="ps-4 d-flex justify-content-start">
        <div class="me-3" style="width: 15rem;">
        <select class="form-select" data-mdb-visible-options="3" style="background-color: #f1efef;">
            <option value="1">1</option>
            <option value="2">2</option>
            </select>
        </div>
        <!-- Chọn năm học -->
        <div style="width: 15rem;">
           <form action="" method="POST">
           <select class="form-select" data-mdb-visible-options="3" style="background-color: #f1efef;">
                <?php
                $sql_dsNamHoc = "SELECT * FROM khoahoc";
                $rs_dsNamHoc = mysqli_query($conn, $sql_dsNamHoc);
                if (mysqli_num_rows($rs_dsNamHoc) > 0) {
                    $i = 1;
                    while ($row_dsNamHoc = mysqli_fetch_assoc($rs_dsNamHoc)) {
                ?>
                        <option name="namHoc" value="<?php echo $i ?>"><?php echo $row_dsNamHoc['Ten'] ?></option>
                <?php
                        $i++;
                    }
                }
                ?>
                <!-- <option value="1">Năm học 2020</option> -->
            </select>
           </form>
        </div>
    </section>

    <div class="container-fluid">
        <div class="row">
            <ul class="list-group col-md-3 mt-5 ms-4">
                <h4 style="font-weight: 500;">Môn học</h4>
                <li class="list-group-item ps-5">
                    <?php
                    $sql_dsMon = "SELECT * FROM monhoc";
                    $rs_dsMon = mysqli_query($conn, $sql_dsMon);
                    if (mysqli_num_rows($rs_dsMon) > 0) {
                        while ($row_dsMon = mysqli_fetch_assoc($rs_dsMon)) {
                    ?>
                            <!-- <input class="form-check-input me-1" name="checkDangKy" type="checkbox" value="" aria-label="..."> -->
                            <?php
                            echo "<a id='dkMonHoc' href='chiTietHocPhan.php?idMon=" . $row_dsMon['MaMon'] . "'>" . $row_dsMon['Ten'] . "</a>";
                            echo "<br>";
                            ?>
                    <?php
                        }
                    }
                    ?>
                </li>
            </ul>
            <div class="col-md mt-5">
                <form action="" method="POST">
                    <h4 style="font-weight: 500;">Lớp học phần</h4>
                    <!-- Start Danh sách lớp học được đăng ký -->
                    <?php
                             if(isset($_SESSION['dangKyOK'])){
                                echo $_SESSION['dangKyOK'];
                                unset($_SESSION['dangKyOK']);
                              }
                ?>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="col-md-1"></th>
                                <th scope="col">Tên môn</th>
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
                            $MaMon = $_GET['idMon'];
                            $sql_dsHocPhan = "SELECT monhoc.Ten as TenMon, ThoiGianBatDau,ThoiGianKetThuc, phongHoc, giaovien.Ten as tenGV , tietBatDau, tietKetThuc FROM chitietkhoahoc , monhoc , khoahoc, giaovien
                              WHERE chitietkhoahoc.MaKH = khoahoc.MaKH and chitietkhoahoc.MaMon=monhoc.MaMon and chitietkhoahoc.MaGV = giaovien.MaGV
                             and monhoc.MaMon = $MaMon";
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
                    <!-- End Danh sách lớp học được đăng ký -->
                    <button name="btnDangKy" class="btn btn-success">Đăng ký</button>
                    <div id="test1">

                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- </div> -->
    <!-- </section> -->

</main>
<script src="./js/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $("#dkMonHoc").click(function() {
            $("#test1").html("<h3 class='text-success'>Hello</h3>");
        })
    })
</script>

<?php
include("./footer.php");
?>