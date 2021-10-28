<?php
session_start();

include("./header.php");
?>

<?php
    include('config/db.php');

    $sql = "SELECT * FROM sinhvien , khoa where sinhvien.MaKhoa = khoa.MaKhoa and MaSV = '3'";
    $rs = mysqli_query($conn, $sql);
    if(mysqli_num_rows($rs) > 0){
        $row = mysqli_fetch_assoc($rs);
    }
    else{
        echo "<h3 class='text-warning'>Sinh viên chưa có thông tin!!!</h3>";
    }
?>

<main style="margin-left: 32px;">
    <form>
        <div class="form-row">
            <img src="./images/avatar.jpg" alt="" style="height: 150px;">
            <div class="row">
                <div class="form-group ms-5">
                    <label for="inputText">Mã sinh viên: </label>
                    <input type="text" class="form-control" id="inputText" value="<?php echo $row['MaSV']?>" readonly>
                </div>
                <div class="form-group ms-5">
                    <label for="inputText">Họ và tên: </label>
                    <input type="text" class="form-control" id="inputText" value="<?php echo $row['Ten']?>" readonly>
                </div>
            </div>
        </div>
        <div class="form-group mt-3 me-5">
            <label for="inputAddress">Quê quán</label>
            <input type="text" class="form-control" id="inputAddress" value="<?php echo $row['QueQuan']?>" readonly>
        </div>
        <div class="form-row me-5">
        <div class="form-group col-md-3 me-3">
            <label for="inputEmail">Giới Tính</label>
            <input type="text" class="form-control" id="inputEmail" value="<?php echo $row['GioiTinh']?>" readonly>
        </div>
        <div class="form-group col-md">
            <label for="inputEmail">Email</label>
            <input type="text" class="form-control" id="inputEmail" value="<?php echo $row['Email']?>" readonly>
        </div>
        </div>

        <div class="form-group me-5">
           <label for="inputKhoa">Khoa</label>
            <input type="text" class="form-control" id="inputKhoa" value="<?php echo $row['Ten']?>" readonly>
        </div>
    </form>
</main>

<?php
include("./footer.php");
?>