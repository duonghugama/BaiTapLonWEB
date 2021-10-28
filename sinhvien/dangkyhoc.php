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
                            echo "<a href='#'>" . $row_dsMon['Ten'] . "</a>";
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
                            <th></th>
                            <th scope="col">Thời gian</th>
                            <th scope="col">Tiết</th>
                            <th scope="col">Phòng</th>
                            <th scope="col">Giáo viên</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <input class="form-check-input ms-2" type="checkbox" value="" aria-label="...">
                            </td>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <td>
                                <input class="form-check-input ms-2" type="checkbox" value="" aria-label="...">
                            </td>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <td>
                                <input class="form-check-input ms-2" type="checkbox" value="" aria-label="...">
                            </td>
                            <th scope="row">3</th>
                            <td colspan="2">Larry the Bird</td>
                            <td>@twitter</td>
                        </tr>
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