<?php
if (isset($_GET["ID"]))
    $ID = $_GET["ID"];
else
    $ID = "";
include("./config/db.php");
$sql = "SELECT * FROM `chitietkhoahoc` WHERE ID = $ID";
$result = mysqli_query($connect, $sql);
$count = mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);
$monHoc = $row["MaMon"];
$giaoVien = $row["MaGV"];
$phongHoc = $row["phongHoc"];
$tietBD = $row["tietBatDau"];
$tietKT = $row["tietKetThuc"];
include("./header.php");
?>
<main class="container-sm my-4">
    <?php
    echo '<form action="process-suaChiTietKH.php?ID='.$ID.'" method="post">'
    ?>
        <div class="row align-item-center my-4">
            <div class="form-group col">
                <div class="row">
                    <select class="form-select" aria-label="Default select example" name="MaKH" id="MaKH">
                        <?php
                        include("./config/db.php");
                        if (isset($_GET["ID"])) {
                            $sql = 'SELECT * from chitietkhoahoc, khoahoc 
                            WHERE chitietkhoahoc.MaKH = khoahoc.MaKH 
                            AND ID ='.$ID.'';
                            $result = mysqli_query($connect, $sql);
                            $row = mysqli_fetch_assoc($result);
                            echo '<option value=' . $row["MaKH"] . '>' . $row["Ten"] . ' | Kỳ ' . $row["Ky"];
                            echo '</option>'; 
                        } 
                        else {
                            $sql = "SELECT * from khoahoc";
                            $result = mysqli_query($connect, $sql);
                            $count = mysqli_num_rows($result);
                            if ($count > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<option value=' . $row["MaKH"] . '>' . $row["Ten"] . ' | Kỳ ' . $row["Ky"];
                                    echo '</option>';
                                }
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="form-group col">
                <label for="nam" class="row-sm-2 row-form-label">Môn Học</label>
                <div class="row">
                    <select class="form-select" aria-label="Default select example" name="MaMon" id="MaMon">
                        <?php
                        include("./config/db.php");
                        $sql = "SELECT * FROM monhoc";
                        $result = mysqli_query($connect, $sql);
                        $count = mysqli_num_rows($result);
                        if ($count > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                if ($row["MaMon"] == $monHoc)
                                    echo '<option value=' . $row["MaMon"] . ' selected = "selected">' . $row["Ten"] . '</option>';
                                else
                                    echo '<option value=' . $row["MaMon"] . '>' . $row["Ten"] . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group col">
                <label for="ky" class="row-sm-2 row-form-label">Giáo viên</label>
                <div class="row">
                    <select class="form-select" aria-label="Default select example" name="MaGV" id="MaGV">
                        <?php
                        include("./config/db.php");
                        $sql = "SELECT * FROM giaovien";
                        $result = mysqli_query($connect, $sql);
                        $count = mysqli_num_rows($result);
                        if ($count > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                if ($row["MaGV"] == $giaoVien)
                                    echo '<option value=' . $row["MaGV"] . ' selected = "selected">' . $row["Ten"] . '</option>';
                                else
                                    echo '<option value=' . $row["MaGV"] . ' >' . $row["Ten"] . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group col">
                <label for="phongHoc" class="row-sm-2 row-form-label">Phòng học</label>
                <div class="row">
                    <?php
                    echo '<input type="text" class="form-control" id="phongHoc" name="phongHoc" value = "'.$phongHoc.'">';
                    ?>              
                </div>
            </div>
            <div class="form-group col">
                <label for="tietBD" class="row-sm-2 row-form-label">Tiết bắt đầu</label>
                <div class="row">
                    <?php               
                    echo '<input type="number" class="form-control" id="tietBD" name="tietBD" value = "'.$tietBD.'">';
                    ?>
                </div>
            </div>
            <div class="form-group col">
                <label for="tietKT" class="row-sm-2 row-form-label">Tiết kết thúc</label>
                <div class="row">
                    <?php
                    echo '<input type="number" class="form-control" id="tietKT" name="tietKT" value = "'.$tietKT.'">';
                    ?>         
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end my-3">
            <button type="submit" name="themChiTiet" id="themChiTiet" class="btn btn-success">Sửa</button>
        </div>
    </form>
</main>
<?php
include("./footer.php")
?>