<?php
if (isset($_GET["ID"]))
    $ID = $_GET["ID"];
else
    $ID = "";
include("constants.php");
include("header.php");
$sql = "SELECT * from chitietkhoahoc
WHERE chitietkhoahoc.MaGV ='3' AND ct.ID = $ID";
$result = mysqli_query($connect, $sql);
$count = mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);

$TGBD = $row["ThoiGianBatDau"];
$TGKT = $row["ThoiGianKetThuc"];
$monHoc = $row["TenMH"];
$phongHoc = $row["phongHoc"];


?>
<main class="container-sm my-4">
    <?php
    echo '<form action="process-suaKH.php?ID='.$ID.'" method="post">'
    ?>
        <div class="row align-item-center my-4">
            <div class="form-group col">
                <div class="row">
                    
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="form-group col">
                <label for="nam" class="row-sm-2 row-form-label">Môn Học</label>
                <div class="row">
                    <select class="form-select" aria-label="Default select example" name="MaMon" id="MaMon">
                        <?php
                        include("constants.php");
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
                <label for="tietBD" class="row-sm-2 row-form-label">Thời gian bắt đầu</label>
                <div class="row">
                    <?php               
                    echo '<input type="date" class="form-control" id="TGBD" name="TGBD" value = "'.$TGBD.'">';
                    ?>
                </div>
            </div>

            <div class="form-group col">
                <label for="tietBD" class="row-sm-2 row-form-label">Thời gian kết thúc</label>
                <div class="row">
                    <?php               
                    echo '<input type="date" class="form-control" id="TGKT" name="TGKT" value = "'.$TGKT.'">';
                    ?>
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
            
        </div>
        <div class="d-flex justify-content-end my-3">
            <button type="submit" name="themChiTiet" id="themChiTiet" class="btn btn-success">Sửa</button>
        </div>
    </form>
</main>
<?php
include("footer.php")
?>