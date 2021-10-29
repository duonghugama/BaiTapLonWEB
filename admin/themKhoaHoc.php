<?php
session_start();

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css" rel="stylesheet" /> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Mở khóa học</title>
</head>

<body>
    <div class="navbar navbar-light" style="background-color:dodgerblue">
        <form class="container-sm justify-content-betteen ">
            <div class="d-inline-flex align-items-center">
                <a class="navbar-brand" href="index.php">
                    <img src="http://www.tlu.edu.vn/Portals/0/2014/Logo-WRU.png" alt="" width="75" height="60">
                </a>
                <h2 class="">Mở Khóa học</h2>
            </div>
            <div class="justify-content-betteen">
                <a class="link-light text-decoration-none me-4" href="#">Chi tiết khóa học</a>
                <a class="link-light text-decoration-none" href="#">Chi tiết đăng ký</a>
            </div>
        </form>
    </div>
    <main class="container-sm my-4">
        <form action="process-themKhoaHoc.php" method="post">
            <div class="row align-items-center">
                <div class="form-group col">
                    <label for="nam" class="row-sm-2 row-form-label">Năm</label>
                    <div class="row">
                        <input type="text" class="form-control" id="nam" name="nam">
                    </div>
                </div>
                <div class="form-group col">
                    <label for="ky" class="row-sm-2 row-form-label">Kỳ</label>
                    <div class="row">
                        <select class="form-select" aria-label="Default select example" name="ky" id="ky">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">Phụ 1</option>
                            <option value="4">Phụ 2</option>
                            <option value="5">Hè</option>
                        </select>
                    </div>
                </div>
                <div class="form-group col">
                    <label for="TGBD" class="row-sm-2 row-form-label">Thời gian bắt đầu</label>
                    <div class="row">
                        <input type="date" class="form-control" id="TGBD" name="TGBD">
                    </div>
                </div>
                <div class="form-group col">
                    <label for="TGKT" class="row-sm-2 row-form-label">Thời gian kết thúc</label>
                    <div class="row">
                        <input type="date" class="form-control" id="TGKT" name="TGKT">
                    </div>
                </div>
                <div class="form-group col">
                    <label for="DDK" class="row-sm-2 row-form-label">Được đăng ký</label>
                    <div class="row">
                        <select class="form-select" aria-label="Default select example" id="ChoPhep" name="ChoPhep">
                            <option value="1">Được phép</option>
                            <option value="0">Không được phép</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end my-3">
                <button type="submit" name="themKhoaHoc" id="themKhoaHoc" class="btn btn-success">Mở khóa học</button>
            </div>
        </form>
    </main>
</body>

</html>