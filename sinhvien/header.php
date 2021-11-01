<?php
session_start();

if(!isset( $_SESSION["checkLogin"])){
    header("location: ../index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Font -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
  <!-- Font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- MDBootstrap -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css" rel="stylesheet" />
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- Style CSS -->
  <link rel="stylesheet" href="css/style.css">
  <title>Đăng ký học</title>
</head>

<body>

  <div class="wrapper d-flex align-items-stretch">
    <!-- Start sidebar -->
    <nav id="sidebar">
      <div class="p-4 pt-5">
        <a href="#" class="img logo rounded-circle mb-5" style="background-image: url(images/avatar.jpg);"></a>
        <ul class="list-unstyled components mb-5">
          <li>
            <a href="./index.php"><i class="fas fa-home me-3"></i>Trang chủ</a>
          </li>
          <li>
            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-graduation-cap me-3"></i>Đăng ký học</a>
            <ul class="collapse list-unstyled" id="homeSubmenu">
              <li>
                <a href="./dangkyhoc.php" id="dangKyHoc">Đăng ký học</a>
              </li>
              <li>
                <a href="./kqDangKy.php">Kết quả đăng ký học</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="./thongtinsv.php"><i class="fas fa-user me-3"></i>Thông tin sinh viên</a>
          </li>
          <li>
            <a href="monhoc.php"><i class="fas fa-book-open me-3"></i>Môn học</a>
          </li>
          <li>
            <a href="./contact/contact/index.php"><i class="fas fa-address-card me-3"></i>Contact</a>
          </li>
        </ul>
        <div class="footer">
          <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://www.facebook.com/HNMinh77" target="_blank">MinhHN</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          </p>
        </div>
      </div>
    </nav>
    <!-- End sidebar -->
    <!-- Page Content  -->
    <div id="content" class="">
      <!-- Start navbar -->
      <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <img src="../img/logo.png" style="width:100px;" class="me-3" alt="">
        <div class="container-fluid">
          <button type="button" id="sidebarCollapse" class="btn btn-primary">
            <i class="fa fa-bars"></i>
            <span class="sr-only">Toggle Menu</span>
          </button>

          <!-- Start Profile -->
          <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
            <img src="images/avatar.jpg" class="rounded-circle" height="35" alt="" loading="lazy" />
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
            <li>
              <a class="dropdown-item" href="./thongtinsv.php">Thông tin sinh viên</a>
            </li>
            <li>
              <a class="dropdown-item" href="#">Đổi mật khẩu</a>
            </li>
            <li>
              <a class="dropdown-item" href="./logout.php">Đăng Xuất</a>
            </li>
          </ul>
          <!--End Profile -->
        </div>
      </nav>
      <!-- End navbar -->
  
