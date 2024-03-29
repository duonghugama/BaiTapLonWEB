<?php
session_start();
if($_SESSION["Quyen"]!= 1)
{
    header("location: ../index.php");
}
?>


<?php 

include('constants.php'); 
    $sql = "SELECT gv.MaGV,gv.Ten as TenGV,gv.Email,gv.SDT,k.Ten as TenK FROM giaovien gv,khoa k
    where gv.MaKhoa = k.MaKhoa  and Email = '".$_SESSION["Email"]."'";
    $res = mysqli_query($conn, $sql);
    if(mysqli_num_rows($res) > 0){
        $row = mysqli_fetch_assoc($res);
    }
?>

<?php include('header.php'); ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
    <title>Khóa học</title>
  </head>
  <body>
  <h1 class="bg-info">Thông tin giáo viên</h1>
  <main style="margin-left: 32px;">
    <form>
        <div class="form-row">
            
            <div class="row">
                <div class="form-group ms-5">
                    <label for="inputText">Mã giáo viên: </label>
                    <input type="text" class="form-control" id="inputText" value="<?php echo $row['MaGV']?>" readonly>
                </div>
                <div class="form-group ms-5">
                    <label for="inputText">Họ và tên: </label>
                    <input type="text" class="form-control" id="inputText" value="<?php echo $row['TenGV']?>" readonly>
                </div>

                <div class="form-group ms-5">
                    <label for="inputText">Email: </label>
                    <input type="text" class="form-control" id="inputText" value="<?php echo $row['Email']?>" readonly>
                </div>

                <div class="form-group ms-5">
                    <label for="inputText">Số điện thoại: </label>
                    <input type="text" class="form-control" id="inputText" value="<?php echo $row['SDT']?>" readonly>
                </div>

                <div class="form-group ms-5">
                    <label for="inputText">Khoa: </label>
                    <input type="text" class="form-control" id="inputText" value="<?php echo $row['TenK']?>" readonly>
                </div>
            </div>
       
    </form>
</main>


   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>
<?php
include("./footer.php");
?>