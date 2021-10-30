<?php
if (isset($_GET["MaKH"]))
    $MaKH = $_GET["MaKH"];
else
    $MaKH = "";
include("./config/db.php");
$sql = "SELECT * FROM `khoahoc` WHERE MaKH = $MaKH";
$result = mysqli_query($connect, $sql);
$count = mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);
include("./header.php")
?>
<main class="container-sm my-4">
    <?php
    if (isset($_GET["MaKH"]))
        $MaKH = $_GET["MaKH"];
    else
        $MaKH = "";
    echo '<form action="process-suaKhoaHoc.php?MaKH=' . $MaKH . '" method="post">';
    ?>
    <div class="row align-items-center">
        <div class="form-group col">
            <label for="nam" class="row-sm-2 row-form-label">Năm</label>
            <div class="row">
                <?php
                echo '<input type="text" class="form-control" id="nam" name="nam"';
                echo 'value="' . $row["Ten"] . '">';
                ?>
            </div>
        </div>
        <div class="form-group col">
            <label for="ky" class="row-sm-2 row-form-label">Kỳ</label>
            <div class="row">
                <select class="form-select" aria-label="Default select example" name="ky" id="ky">
                    <?php
                    switch ($row["Ky"]) {
                        case 1:
                            echo '<option value="1" selected = "selected">1</option>';
                            echo '<option value="2">2</option>';
                            echo '<option value="3">Phụ 1</option>';
                            echo '<option value="4">Phụ 2</option>';
                            echo '<option value="5">Hè</option>';
                            break;
                        case 2:
                            echo '<option value="1">1</option>';
                            echo '<option value="2" selected = "selected">2</option>';
                            echo '<option value="3">Phụ 1</option>';
                            echo '<option value="4">Phụ 2</option>';
                            echo '<option value="5">Hè</option>';
                            break;
                        case 3:
                            echo '<option value="1">1</option>';
                            echo '<option value="2">2</option>';
                            echo '<option value="3" selected = "selected">Phụ 1</option>';
                            echo '<option value="4">Phụ 2</option>';
                            echo '<option value="5">Hè</option>';
                            break;
                        case 4:
                            echo '<option value="1">1</option>';
                            echo '<option value="2">2</option>';
                            echo '<option value="3">Phụ 1</option>';
                            echo '<option value="4" selected = "selected">Phụ 2</option>';
                            echo '<option value="5">Hè</option>';
                            break;
                        case 5:
                            echo '<option value="1">1</option>';
                            echo '<option value="2">2</option>';
                            echo '<option value="3">Phụ 1</option>';
                            echo '<option value="4">Phụ 2</option>';
                            echo '<option value="5" selected = "selected">Hè</option>';
                            break;
                    }

                    ?>
                </select>
            </div>
        </div>
        <div class="form-group col">
            <label for="TGBD" class="row-sm-2 row-form-label">Thời gian bắt đầu</label>
            <div class="row">
                <?php
                echo '<input type="date" class="form-control" id="TGBD" name="TGBD" ';
                echo 'value="' . $row["ThoiGianBatDau"] . '">';
                ?>
            </div>
        </div>
        <div class="form-group col">
            <label for="TGKT" class="row-sm-2 row-form-label">Thời gian kết thúc</label>
            <div class="row">
                <?php
                echo '<input type="date" class="form-control" id="TGKT" name="TGKT" ';
                echo 'value="' . $row["ThoiGianKetThuc"] . '">';
                ?>
            </div>
        </div>
        <div class="form-group col">
            <label for="DDK" class="row-sm-2 row-form-label">Được đăng ký</label>
            <div class="row">
                <select class="form-select" aria-label="Default select example" id="ChoPhep" name="ChoPhep">
                    <?php
                    if ($row["DuocDangKy"] == 1) {
                        echo '<option value="1" selected = "selected">Được phép';
                        echo '</option>';
                        echo '<option value="0" >Không được phép';
                        echo '</option>';
                    } else {
                        echo '<option value="1">Được phép';
                        echo '</option>';
                        echo '<option value="0" selected = "selected">Không được phép';
                        echo '</option>';
                    }
                    ?>
                </select>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-end my-3">
        <button type="submit" name="themKhoaHoc" id="themKhoaHoc" class="btn btn-success">Sửa khóa học</button>
    </div>
    </form>
</main>
<?php
include("./footer.php")
?>