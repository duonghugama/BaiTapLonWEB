<?php
if (isset($_GET["ID"]))
    $ID = $_GET["ID"];
else
    $ID = "";
include("constants.php");
include("header.php");
$sql = "SELECT ct.ID,ct.MaKH as MaKH,kh.Ten as TenKH,kh.Ky,kh.ThoiGianBatDau,kh.ThoiGianKetThuc,mh.Ten as TenMH,gv.Ten as TenGV,ct.phongHoc FROM chitietkhoahoc ct,khoahoc kh,monhoc mh,giaovien gv
WHERE  ct.MaGV = gv.MaGV AND ct.MaKH = kh.MaKH AND ct.MaMon = mh.MaMon AND ct.MaGV ='3' AND ID = $ID";

$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);
$maKH = $row["MaKH"];
$TenKH = $row["TenKH"];
$Ky = $row["Ky"];
$TGBD = $row["ThoiGianBatDau"];
$TGKT = $row["ThoiGianKetThuc"];
$TenMH = $row["TenMH"];
$phongHoc = $row["phongHoc"];



?>
<main class="container-sm my-4">
    <?php
    echo '<form action="process-suaKH.php?ID='.$ID.'" method="post">'
    ?>
      <form>
        <div class="form-row">
            
            <div class="row">
                <div class="form-group ms-5">
                    <label for="inputText">Mã khóa học: </label>
                    <input type="text" class="form-control" id="inputText" value="<?php echo $row['MaKH']?>" readonly>
                </div>
                <div class="form-group ms-5">
                    <label for="inputText">Tên khóa học: </label>
                    <input type="text" class="form-control" id="inputText" value="<?php echo $row['TenKH']?>" readonly>
                </div>

                <div class="form-group ms-5">
                    <label for="inputText">Kỳ học: </label>
                    <input type="text" class="form-control" id="inputText" value="<?php echo $row['Ky']?>" readonly>
                </div>

                <div class="form-group ms-5">
                    <label for="inputText">Thời gian bắt đầu: </label>
                    <input type="text" class="form-control" id="inputText" value="<?php echo $row['ThoiGianBatDau']?>" readonly>
                </div>

                <div class="form-group ms-5">
                    <label for="inputText">Thời gian kết thúc: </label>
                    <input type="text" class="form-control" id="inputText" value="<?php echo $row['ThoiGianKetThuc']?>" readonly>
                </div>

                <div class="form-group ms-5">
                    <label for="inputText">Môn học: </label>
                    <input type="text" class="form-control" id="inputText" value="<?php echo $row['TenMH']?>" readonly>
                </div>

                <div class="form-group ms-5">
                    <label for="inputText">Phòng học: </label>
                    <input type="text" class="form-control" id="inputText" value="<?php echo $row['phongHoc']?>">
                </div>
            </div>
        <div class="d-flex justify-content-end my-3">
            <input type="hidden" name="id" value="<?php echo   $row['ID'] ?>">
            <button type="submit" name="submit" id="capnhat" class="btn btn-success">Cập nhật</button>
        </div>
        
    </form>
</main>
<?php
include("footer.php")
?>