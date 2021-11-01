<?php
if (isset($_GET["ID"]))
    $ID = $_GET["ID"];
else
    $ID = "";
include("./config/db.php");
$sql = "SELECT * FROM `chitietdangky` WHERE ID = $ID";
$result = mysqli_query($connect, $sql);
$count = mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);
$monHoc = $row["MaMon"];
$sinhvien = $row["MaSV"];
include("./header.php");
?>
<main class="container-sm my-4">
    <?php
    echo '<form action="process-suaChiTietDK.php?ID='.$ID.'" method="post">'
    ?>
        <div class="row align-item-center my-4">
            <div class="form-group col">
                <label for="khoaHoc" class="row-sm-2 row-form-label"> Khóa học</label>
                <div class="row">
                    <select class="form-select" aria-label="Default select example" name="MaKH" id="MaKH">
                        <?php
                        include("./config/db.php");
                        if (isset($_GET["ID"])) {
                            $sql = 'SELECT * from chitietdangky, khoahoc 
                            WHERE chitietdangky.MaKH = khoahoc.MaKH ';
                            $result = mysqli_query($connect, $sql);
                            $count = mysqli_num_rows($result);
                            if ($count > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    if($row["ID"] == $ID)
                                    {
                                        echo '<option value=' . $row["MaKH"] . '>' . $row["Ten"] . ' | Kỳ ' . $row["Ky"];
                                        echo ' hiện đang ở đây </option>'; 
                                    }
                                    else
                                    {
                                        echo '<option value=' . $row["MaKH"] . '>' . $row["Ten"] . ' | Kỳ ' . $row["Ky"];
                                        echo '</option>'; 
                                    }
                                }
                            }                        
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
                <label for="ky" class="row-sm-2 row-form-label">Sinh viên</label>
                <div class="row">
                    <select class="form-select" aria-label="Default select example" name="MaSV" id="MaSV">
                        <?php
                        include("./config/db.php");
                        $sql = "SELECT * FROM sinhvien";
                        $result = mysqli_query($connect, $sql);
                        $count = mysqli_num_rows($result);
                        if ($count > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                if ($row["MaSV"] == $sinhvien)
                                    echo '<option value=' . $row["MaSV"] . ' selected = "selected">' . $row["Ten"] . '</option>';
                                else
                                    echo '<option value=' . $row["MaSV"] . ' >' . $row["Ten"] . '</option>';
                            }
                        }
                        ?>
                    </select>
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