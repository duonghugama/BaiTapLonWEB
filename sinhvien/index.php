<?php


include('config/db.php');
include("./header.php");
?>

<main>
    <div class="container">
        <?php
                if(isset($_SESSION['submitOK'])){
                    echo $_SESSION['submitOK'];
                    unset($_SESSION['submitOK']);
                }
        ?>
       <div class="row">
       <a href="./thongtinsv.php" class="col-md-6 d-flex justify-content-center">
        <button class="btn btn-info mt-5" style="width: 250px; height: 200px;">
            <i class="fas fa-university mb-3" style="font-size: 100px; opacity: 0.7;"></i> 
            <br>
            Thông tin cá nhân</button>
        </a>

        <a href="./chiTietMon.php" class="col-md d-flex justify-content-center">
        <button class="btn btn-info mt-5" style="width: 250px; height: 200px;">
            <i class="fas fa-university mb-3" style="font-size: 100px; opacity: 0.7;"></i> 
            <br>
            Danh sách môn học</button>
        </a>
       </div>

      <div class="row">
      <a href="./dangkyhoc.php" class="col-md-6 d-flex justify-content-center">
        <button class="btn btn-info mt-5" style="width: 250px; height: 200px;">
            <i class="fas fa-university mb-3" style="font-size: 100px; opacity: 0.7;"></i> 
            <br>
            Đăng ký học</button>
        </a>

        <a href="./kqDangKy.php" class="col-md d-flex justify-content-center">
        <button class="btn btn-info mt-5" style="width: 250px; height: 200px;">
            <i class="fas fa-university mb-3" style="font-size: 100px; opacity: 0.7;"></i> 
            <br>
            Kết quả đăng ký học</button>
        </a>
      </div>
    </div>
</main>

<?php
include("./footer.php");
?>

<!-- <script>
    $("#btnSearch2").click(function(){

    })
</script> -->