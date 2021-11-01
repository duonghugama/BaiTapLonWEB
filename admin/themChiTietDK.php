<?php
include("./header.php");
?>
<main class="container-sm my-4">
    <form action="process-themChiTietDK.php" method="post">
        <div class="row align-item-center my-4">
            <div class="form-group col">
                <div class="row">
                    <select class="form-select" aria-label="Default select example" name="MaKH" id="MaKH">
                        <?php
                        include("./config/db.php");
                        if (isset($_GET["MaKH"])) {
                            $MaKH = $_GET["MaKH"];
                            $sql = "SELECT * FROM khoahoc WHERE MaKH = $MaKH";
                            $result = mysqli_query($connect, $sql);
                            $count = mysqli_num_rows($result);
                            if ($count > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<option value=' . $row["MaKH"] . '>' . $row["Ten"] . ' | Kỳ ' . $row["Ky"];
                                    echo '</option>';
                                }
                            }
                        } 
                        else{
                            $sql = "SELECT * FROM khoahoc";
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
                                echo '<option value=' . $row["MaSV"] . '>' . $row["Ten"] . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end my-3">
            <button type="submit" name="themChiTiet" id="themChiTiet" class="btn btn-success">Thêm sinh viên</button>
        </div>
    </form>
</main>
<?php
include("./footer.php")
?>