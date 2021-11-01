<?php
include("./header.php");
?>
<main class="container-sm my-4">
    <form action="process-themMon.php" method="post">
        <div class="row align-items-center">
            <div class="form-group col">
                <label for="ten" class="row-sm-2 row-form-label">Tên môn</label>
                <div class="row">
                    <input type="text" class="form-control" id="ten" name="ten">
                </div>
            </div>
            <div class="form-group col">
                <label for="SoTC" class="row-sm-2 row-form-label">Số tín chỉ</label>
                <div class="row">
                    <input type="number" class="form-control" id="SoTC" name="SoTC">
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
                                echo '<option value=' . $row["MaKhoa"] . '>' . $row["Ten"] . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end my-3">
            <button type="submit" name="themMon" id="themMon" class="btn btn-success">Thêm Môn</button>
        </div>
    </form>
</main>
<?php
include("./footer.php")
?>