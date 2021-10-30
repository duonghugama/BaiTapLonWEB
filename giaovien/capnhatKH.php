<?php
if (isset($_GET["ID"]))
    $ID = $_GET["ID"];
else
    $ID = "";
include("constants.php");
include("header.php");
$sql = "SELECT mh.MaMon,ct.ID,ct.MaKH as MaKH,kh.Ten as TenKH,kh.Ky,kh.ThoiGianBatDau,kh.ThoiGianKetThuc,mh.Ten as TenMH,gv.Ten as TenGV,ct.phongHoc FROM chitietkhoahoc ct,khoahoc kh,monhoc mh,giaovien gv
WHERE  ct.MaGV = gv.MaGV AND ct.MaKH = kh.MaKH AND ct.MaMon = mh.MaMon AND ct.MaGV ='3' AND kh.DuocDangKy ='1' ";

$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);
$maKH = $row["MaKH"];
$TenMH = $row["TenMH"];
$TenMH = $row["TenMH"];
$MaMon = $row["MaMon"];
$Ky = $row["Ky"];
$TGBD = $row["ThoiGianBatDau"];
$TGKT = $row["ThoiGianKetThuc"];
$TenMH = $row["TenMH"];
$phongHoc = $row["phongHoc"];



?>
<main class="container">
        <h2>Thêm thông tin khóa học</h2>
      <form action="process-capnhatKH.php" method="post">
      <div class="form-group row">
                <label for="INT" class="col-sm-2 col-form-label">Khóa học</label>
                <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example" name="MaKH" id="MaKH">
                        <?php
                  
                  $sql = "SELECT ct.ID,ct.MaKH as MaKH,kh.Ten as TenKH,kh.Ky,kh.ThoiGianBatDau,kh.ThoiGianKetThuc,mh.Ten as TenMH,gv.Ten as TenGV,ct.phongHoc FROM chitietkhoahoc ct,khoahoc kh,monhoc mh,giaovien gv
                  WHERE  ct.MaGV = gv.MaGV AND ct.MaKH = kh.MaKH AND ct.MaMon = mh.MaMon AND ct.MaGV ='3' AND kh.DuocDangKy ='1'   ";
                    $result = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($result);
                   
                    if(mysqli_num_rows($result)){
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<option value=' . $row["MaKH"] . '>' . $row["MaKH"] . '</option>';
                        }
                    }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="INT" class="col-sm-2 col-form-label">Môn học</label>
                <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example" name="MaMon" id="MaMon">
                        <?php
                  
                  $sql = "SELECT ct.MaMon,ct.ID,ct.MaKH as MaKH,kh.Ten as TenKH,kh.Ky,kh.ThoiGianBatDau,kh.ThoiGianKetThuc,mh.Ten as TenMH,gv.Ten as TenGV,ct.phongHoc FROM chitietkhoahoc ct,khoahoc kh,monhoc mh,giaovien gv
                  WHERE  ct.MaGV = gv.MaGV AND ct.MaKH = kh.MaKH AND ct.MaMon = mh.MaMon AND ct.MaGV ='3' AND kh.DuocDangKy ='1'   ";
                    $result = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($result);
                   
                    if(mysqli_num_rows($result)){
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<option value=' . $row["MaMon"] . '>' . $row["TenMH"] . '</option>';
                        }
                    }
                        ?>
                    </select>
                </div>
            </div>


            <div class="form-group row">
                <label for="INT" class="col-sm-2 col-form-label">Giáo viên</label>
                <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example" name="MaGV" id="MaGV">
                        <?php
                  
                  $sql = "SELECT gv.MaGV,ct.ID,ct.MaKH as MaKH,kh.Ten as TenKH,kh.Ky,kh.ThoiGianBatDau,kh.ThoiGianKetThuc,mh.Ten as TenMH,gv.Ten as TenGV,ct.phongHoc FROM chitietkhoahoc ct,khoahoc kh,monhoc mh,giaovien gv
                  WHERE  ct.MaGV = gv.MaGV AND ct.MaKH = kh.MaKH AND ct.MaMon = mh.MaMon AND ct.MaGV ='3' AND kh.DuocDangKy ='1'   ";
                    $result = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($result);
                   
                    if(mysqli_num_rows($result)){
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<option value=' . $row["MaGV"] . '>' . $row["TenGV"] . '</option>';
                        }
                    }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="empPosition" class="col-sm-2 col-form-label">Phòng học</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="phongHoc" name="phongHoc">
                </div>
            </div>

            <div class="form-group row">
                <label for="empPosition" class="col-sm-2 col-form-label">Tiết bắt đầu</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="TietBatDau" name="TietBatDau">
                </div>
            </div>

            <div class="form-group row">
                <label for="empPosition" class="col-sm-2 col-form-label">Tiết kết thúc</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="TietKetThuc" name="TietKetThuc">
                </div>
            </div>
             
            
                    <button type="submit" class="btn btn-success">Cập nhật</button>
                
            </div>
        </div>
        
    </form>
</main>
<?php
include("footer.php")
?>