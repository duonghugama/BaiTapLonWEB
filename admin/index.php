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
    <link rel="stylesheet" href="css/style.css">

    <title>Quản lý</title>
</head>

<body>
    <div class="navbar navbar-light" style="background-color:dodgerblue">
        <form class="container-sm justify-content-betteen ">
            <div class="d-inline-flex align-items-center">
                <a class="navbar-brand" href="index.php">
                    <img src="http://www.tlu.edu.vn/Portals/0/2014/Logo-WRU.png" 
                    alt="" width="75" height="60">
                </a>
                <h2 class="">Khóa học</h2>
            </div>
            <div class="justify-content-betteen">
                <a class="link-light text-decoration-none me-4" href="chiTietKhoaHoc/chiTietKhoaHoc.php">Chi tiết khóa học</a>
                <a class="link-light text-decoration-none" href="chiTietDangKy.php">Chi tiết đăng ký</a>
            </div>
        </form>
    </div>
    <main>
        <div class="container-sm my-4">
            <a href="themKhoaHoc.php" class="btn btn-success">Mở kỳ học mới</a>
        </div>
        <div class="container-sm my-3">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID khóa học</th>
                        <th scope="col">Năm</th>
                        <th scope="col">Kỳ</th>
                        <th scope="col">Thời gian bắt đầu</th>
                        <th scope="col">Thời gian kết thúc</th>
                        <th scope="col">Được phép đăng ký</th>
                        <th scope="col">Sửa</th>
                        <th scope="col">Xóa</th>
                        <th scope="col">Chi tiết</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $connect = mysqli_connect('localhost', 'root', '', 'baitaploncnw');
                    if (!$connect) {
                        die("Không thể kết nối");
                    }

                    $sql = "SELECT * FROM khoahoc";
                    $result = mysqli_query($connect, $sql);
                    $count = mysqli_num_rows($result);
                    if ($count > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<tr>';
                            echo '<th scope="row">' . $row['MaKH'] . '</th>';
                            echo '<td>' . $row['Ten'] . '</td>';
                            echo '<td>' . $row['Ky'] . '</td>';
                            echo '<td>' . $row['ThoiGianBatDau'] . '</td>';
                            echo '<td>' . $row['ThoiGianKetThuc'] . '</td>';
                            if ($row['DuocDangKy'] == 1) {
                                echo '<td>' . 'Được phép' . '</td>';
                            } else
                                echo '<td>' . 'Không được phép' . '</td>';
                            echo '<td><a href="suaKhoaHoc.php?MaKH=' . $row['MaKH'] . '"><i class="fas fa-edit"></i></a></td>';
                            echo '<td><a href="xoaKhoaHoc.php?MaKH=' . $row['MaKH'] . '"><i class="fas fa-trash-alt"></i></a></td>';
                            echo '<td><a href="chiTietKhoaHoc/chiTietKhoaHoc.php?MaKH=' . $row['MaKH'] . '">Chi tiết</a></td>';
                            echo '</tr>';
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>
</body>

</html>