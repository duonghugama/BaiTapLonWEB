<?php
session_start();
include('./config/db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Đổi mật khẩu</title>
</head>
<body>
<?php
    if(isset($_POST['btnDoiMK'])){
        $email = $_GET['email'];
        $passCu = $_POST['passCu'];
        $passMoi1 = $_POST['passMoi1'];
        $passMoi2 = $_POST['passMoi2'];
        $sql ="SELECT * FROM user where Email='$email'";
        $rs = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($rs);
        if($row['Password'] == $passCu){
         if($passMoi1 == $passMoi2){
            $sql2 = "UPDATE user set Password = '$passMoi1' where Email='$email'";
            $rs2 = mysqli_query($conn, $sql2);
            if($rs2){
             $_SESSION['doimkOK'] = "<h4 class='text-success'>Đổi mật khẩu thành công</h4>";
             header('location: index.php');
            }
         }
         else{
            //  echo "Sai MK mới";
            $_SESSION['passMoiSai'] = "<h4 class='text-warning'>Mật khẩu nhập lại chưa chính xác</h4>";
            header('location: doiMK.php?email='.$email);
         }
        }
        else{
            // echo "Sai MK cũ";
            $_SESSION['passCuSai'] = "<h4 class='text-warning'>Mật khẩu cũ chưa chính xác</h4>";
            header('location: doiMK.php?email='.$email);


        }
    }
?> 
<div class="container">
    <?php
            if(isset($_SESSION['passMoiSai'])){
                echo $_SESSION['passMoiSai'];
                unset($_SESSION['passMoiSai']);
            }
            if(isset($_SESSION['passCuSai'])){
                echo $_SESSION['passCuSai'];
                unset($_SESSION['passCuSai']);
            }
    ?>
<form action="" method="POST">
    
<label for="inputPassword5" class="form-label">Mật khẩu cũ</label>
    <input name="passCu" type="password" id="inputPassword5" class="form-control col-md-4" aria-describedby="passwordHelpBlock">
   
    <label for="inputPassword5" class="form-label">Mật khẩu mới</label>
    <input name="passMoi1" type="password" id="inputPassword5" class="form-control col-md-4" aria-describedby="passwordHelpBlock">

    <label for="inputPassword5" class="form-label">Nhập lại mật khẩu mới</label>
    <input name="passMoi2" type="password" id="inputPassword5" class="form-control col-md-4" aria-describedby="passwordHelpBlock">

    <button name="btnDoiMK" class="btn btn-success mt-3">Đổi mật khẩu</button>

</form>
</div>

</body>
</html>