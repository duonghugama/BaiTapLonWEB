


<?php
include("./header.php");
include("config/db.php");
?>
<main>
    <!-- <section class="pb-4"> -->
    <!-- <div class="bg-light rounded-5"> -->
    <!-- Chọn kì học -->
    <section class="ps-4 d-flex justify-content-start">
        <div class="me-3" style="width: 15rem;">
            <select class="form-select" data-mdb-visible-options="3" style="background-color: #f1efef;">
                <?php
                $sql_dsNamHoc = "SELECT * FROM khoahoc";
                $rs_dsNamHoc = mysqli_query($conn, $sql_dsNamHoc);
                if (mysqli_num_rows($rs_dsNamHoc) > 0) {
                    $i = 1;
                    while ($row_dsNamHoc = mysqli_fetch_assoc($rs_dsNamHoc)) {
                ?>
                        <option value="<?php echo $i ?>"><?php echo $row_dsNamHoc['Ky'] ?></option>
                <?php
                        $i++;
                    }
                }
                ?>
            </select>
        </div>
        <!-- Chọn năm học -->
        <div style="width: 15rem;">
            <select class="form-select" data-mdb-visible-options="3" style="background-color: #f1efef;">
                <?php
                $sql_dsNamHoc = "SELECT * FROM khoahoc";
                $rs_dsNamHoc = mysqli_query($conn, $sql_dsNamHoc);
                if (mysqli_num_rows($rs_dsNamHoc) > 0) {
                    $i = 1;
                    while ($row_dsNamHoc = mysqli_fetch_assoc($rs_dsNamHoc)) {
                ?>
                        <option value="<?php echo $i ?>"><?php echo $row_dsNamHoc['Ten'] ?></option>
                <?php
                        $i++;
                    }
                }
                ?>
                <!-- <option value="1">Năm học 2020</option> -->
            </select>
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
                            <input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
                            <?php
                            echo "<a href='chiTietHocPhan.php?idMon=".$row_dsMon['MaMon']."'>" . $row_dsMon['Ten'] . "</a>";
                            echo "<br>";
                            ?>
                    <?php
                        }
                    }
                    ?>
                </li>

            </ul>
            <div class="col-md mt-5">
                <h4 style="font-weight: 500;">Lớp học phần</h4>
                <!-- Start Danh sách lớp học được đăng ký -->
                    

<table class="table table-bordered">
<thead>
    <tr>
        <th class="col-md-1"></th>
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
         $sql_dsHocPhan = "SELECT ThoiGianBatDau,ThoiGianKetThuc, phongHoc, giaovien.Ten as tenGV , tietBatDau, tietKetThuc FROM chitietkhoahoc , monhoc , khoahoc, giaovien
         WHERE chitietkhoahoc.MaKH = khoahoc.MaKH and chitietkhoahoc.MaMon=monhoc.MaMon and chitietkhoahoc.MaGV = giaovien.MaGV
         and monhoc.MaMon = $MaMon";
         $rs_dsHocPhan = mysqli_query($conn, $sql_dsHocPhan);
     if (mysqli_num_rows($rs_dsHocPhan) > 0) {
         while ($row_dsHocPhan = mysqli_fetch_array($rs_dsHocPhan)) {
     ?>
             <tr>
                 <td>
                     <input class="form-check-input ms-2" type="checkbox" value="" aria-label="...">
                 </td>
                 <td><?php echo $row_dsHocPhan['ThoiGianBatDau']?></td>
                 <td><?php echo $row_dsHocPhan['ThoiGianKetThuc']?></td>
                 <td><?php echo $row_dsHocPhan['tietBatDau'].' <i class="fas fa-arrow-right"></i> '.$row_dsHocPhan['tietKetThuc']?></td>
                 <td><?php echo $row_dsHocPhan['phongHoc']?></td>
                 <td><?php echo $row_dsHocPhan['tenGV']?></td>
             </tr>

     <?php

         }
     }
    ?>
</tbody>
</table>
                <!-- End Danh sách lớp học được đăng ký -->

            </div>
        </div>
    </div>
    <!-- </div> -->
    <!-- </section> -->

</main>

<?php
include("./footer.php");
?>
