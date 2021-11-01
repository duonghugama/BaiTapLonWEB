<?php
$MaMon = $_GET['MaMon'];
include("./header.php");
include("./config/db.php");
$sql = "SELECT monhoc.Ten as tenMon, monhoc.SoTC,khoa.MaKhoa, khoa.Ten as tenKhoa
FROM monhoc, khoa WHERE monhoc.MaKhoa = khoa.MaKhoa AND MaMon = $MaMon";
$result = mysqli_query($connect, $sql);
$count = mysqli_num_rows($result);
if ($count > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $ten = $row["tenMon"];
        $SoTC = $row["SoTC"];
        $MaKhoa = $row["MaKhoa"];
    }
}
?>
<main class="container-sm my-4">
    <?php
    echo '<form action="process-suaMon.php?MaMon='.$MaMon.'" method="post">'
    ?>
        <div class="row align-items-center">
            <div class="form-group col">
                <label for="ten" class="row-sm-2 row-form-label">Tên môn</label>
                <div class="row">
                    <?php
                    echo '<input type="text" class="form-control" id="ten" name="ten" value = "'.$ten.'">'
                    ?>
                </div>
            </div>
            <div class="form-group col">
                <label for="SoTC" class="row-sm-2 row-form-label">Số tín chỉ</label>
                <div class="row">
                    <?php
                    echo '<input type="number" class="form-control" id="SoTC" name="SoTC" value="'.$SoTC.'">'
                    ?>
                </div>
            </div>

            <div class="form-group col">
                <label for="ky" class="row-sm-2 row-form-label">Khoa</label>
                <div class="row">
                    <select class="form-select" aria-label="Default select example" name="MaKhoa" id="MaKhoa">
                        <?php
                        include("./config/db.php");
                        $sql = "SELECT * FROM khoa";
                        $result = mysqli_query($connect, $sql);
                        $count = mysqli_num_rows($result);
                        if ($count > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                if($row["MaKhoa"] != $MaKhoa)
                                echo '<option value=' . $row["MaKhoa"] . '>' . $row["Ten"] . '</option>';
                                else
                                echo '<option value=' . $row["MaKhoa"] . ' selected = "selected">' . $row["Ten"] . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end my-3">
            <button type="submit" name="themMon" id="themMon" class="btn btn-success">Sửa Môn</button>
        </div>
    </form>
</main>
<?php
include("./footer.php")
?>