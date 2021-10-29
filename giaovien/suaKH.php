<?php
    include('partials/menu.php');
    include 'constants.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Hello, world!</title>
  </head>
  <body>
<main class="container">
        <h2>Cập nhật khóa học</h2>
        <form action="process-suaKH.php" method="post">
            <div class="form-group row">
                <label for="patientid" class="col-sm-2 col-form-label">Mã khóa học:</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="patientid" name="patientid" >
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Tên khóa học</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="firstname" name="firstname">
                </div>
            </div>
            <div class="form-group row">
                <label for="lastname" class="col-sm-2 col-form-label">Kì học</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="lastname" name="lastname">
                </div>
            </div>
            <div class="form-group row">
                <label for="dateofbirth" class="col-sm-2 col-form-label">Thời gian bắt đầu</label>
                <div class="col-sm-10">
                <input type="tel" class="form-control" id="dateofbirth" name="dateofbirth">
                </div>
            </div>

            <div class="form-group row">
                <label for="gender" class="col-sm-2 col-form-label">Môn học</label>
                <div class="col-sm-10">
                <input type="tel" class="form-control" id="dateofbirth" name="dateofbirth">
                </div>
            </div>

            

            <div class="form-group row">
                <label for="empMobile" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-success">Lưu lại</button>
                </div>
            </div>
        </form>
    </main>
    
