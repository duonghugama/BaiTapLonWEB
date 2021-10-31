<?php
include("./header.php");
include("config/db.php");
?>
<main>
    <!-- <section class="pb-4"> -->
    <!-- <div class="bg-light rounded-5"> -->
    <!-- Chọn kì học -->
    <form action="" method="POST">
        <section class="ps-4 d-flex justify-content-start">
            <!-- <div class="me-3" style="width: 15rem;">
                <select name="kyHoc" class="form-select" data-mdb-visible-options="3" style="background-color: #f1efef;">
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
            </div> -->
            <!-- Chọn năm học -->
            <div style="width: 15rem;">
                <select name="namHoc" class="form-select" data-mdb-visible-options="3" style="background-color: #f1efef;">
                    <?php
                    $sql_dsNamHoc = "SELECT * FROM khoahoc";
                    $rs_dsNamHoc = mysqli_query($conn, $sql_dsNamHoc);
                    if (mysqli_num_rows($rs_dsNamHoc) > 0) {
                        $i = 1;
                        while ($row_dsNamHoc = mysqli_fetch_assoc($rs_dsNamHoc)) {
                    ?>
                            <option value="<?php echo $i ?>"><?php echo 'Kỳ '.$row_dsNamHoc['Ky'].' Năm '.$row_dsNamHoc['Ten'] ?></option>
                    <?php
                            $i++;
                        }
                    }
                    ?>
                    <!-- <option value="1">Năm học 2020</option> -->
                </select>
            </div>
            <button name="btnXemMon" id="btnMon" class="btn btn-success ms-3">Xem</button>
        </section>
    </form>
    <div class="container-fluid">
        <div class="row" id="dsMon">
        <ul class="list-group col-md-3 mt-5 ms-4">
                <h4 style="font-weight: 500;">Môn học</h4>
                <li class="list-group-item ps-5">
                    <?php
                    if(isset($_POST['btnXemMon'])){

                        // $kyHoc = $_POST['kyHoc'];
                        $namHoc = $_POST['namHoc'];
                        $sql_dsMon = "select monhoc.MaMon as MaMonHoc, monhoc.Ten as tenMon , ThoiGianBatDau, ThoiGianKetThuc, tietBatDau, tietKetThuc, phongHoc, giaovien.Ten
                        from chitietkhoahoc , monhoc , khoahoc, giaovien
                         where chitietkhoahoc.MaKH = khoahoc.MaKH and chitietkhoahoc.MaMon = monhoc.MaMon
                         and giaovien.MaGV = chitietkhoahoc.MaGV and khoahoc.MaKH = '$namHoc';";
                        //  echo $sql_dsMon;
                        $rs_dsMon = mysqli_query($conn, $sql_dsMon);
                        if (mysqli_num_rows($rs_dsMon) > 0) {
                            while ($row_dsMon = mysqli_fetch_assoc($rs_dsMon)) {
                        ?>
                                <?php
                                echo "<a href='chiTietHocPhan.php?idMon=" . $row_dsMon['MaMonHoc'] ."&namhoc=$namHoc"."'>" . $row_dsMon['tenMon'] . "</a>";
                                echo "<br>";
                                ?>
                        <?php
                            }
                        }
                    }
                    ?>
                </li>
            </ul>
            <div class="col-md mt-5">
                <h4 style="font-weight: 500;">Lớp học phần</h4>
            </div>
        

        </div>
    </div>
    <!-- </div> -->
    <!-- </section> -->

</main>
<?php
include("./footer.php");
?>
<!-- <script>
    $('#btnMon').click(function() {
        $('#dsMon').html(`
    
        `)
    })
</script> -->