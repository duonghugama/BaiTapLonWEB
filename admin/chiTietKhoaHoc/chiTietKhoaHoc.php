<?php
session_start();
if (isset($_GET["MaKH"]))
    $MaKH = $_GET["MaKH"];
else
    $MaKH = "";
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

    <title>Chi tiết khóa học</title>
</head>

<body>
    <div class="navbar navbar-light" style="background-color:dodgerblue">
        <form class="container-sm justify-content-betteen ">
            <div class="d-inline-flex align-items-center">
                <a class="navbar-brand" href="../index.php">
                    <img src="http://www.tlu.edu.vn/Portals/0/2014/Logo-WRU.png" alt="" width="75" height="60">
                </a>
                <h2 class="">Khóa học</h2>
            </div>
            <div class="justify-content-betteen">
                <a class="link-light text-decoration-none me-4" href="chiTietKhoaHoc.php">Chi tiết khóa học</a>
                <a class="link-light text-decoration-none" href="chiTietDangKy.php">Chi tiết đăng ký</a>
            </div>
        </form>
    </div>
    <form action="chiTietKhoaHoc.php" method="get" class="container-md my-3">
        <div class="row align-items-center">
            <div class="form-group col">
                <label for="nam" class="row-sm-2 row-form-label">Năm</label>
                <div class="row">
                    <select class="form-select" aria-label="Default select example" name="MaKH" id="MaKH">
                        <?php
                        $connect1 = mysqli_connect('localhost', 'root', '', 'baitaploncnw');
                        if (!$connect1) {
                            die("Không thể kết nối");
                        }
                        $sql1 = "SELECT * FROM khoahoc";
                        $result1 = mysqli_query($connect1, $sql1);
                        $count1 = mysqli_num_rows($result1);
                        if ($count1 > 0) {
                            while ($row1 = mysqli_fetch_assoc($result1)) {
                                echo '<option value="' . $row1["MaKH"] . '">';
                                echo 'Năm: ' . $row1["Ten"] . ' | Kỳ ' . $row1["Ky"];
                                echo '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="d-flex justify-content-end my-3">
                <button class="btn btn-success" type="submit">Tìm kiếm</button>
            </div>
        </div>
    </form>

    <div class="container-sm my-3">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Mã khóa học</th>
                    <th scope="col">Môn học</th>
                    <th scope="col">Số tín chỉ</th>
                    <th scope="col">Tên giáo viên</th>
                    <th scope="col">Email</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Khoa</th>
                    <th scope="col">Phòng Học</th>
                    <th scope="col">Tiết bắt đầu</th>
                    <th scope="col">Tiết kết thúc</th>
                    <th scope="col">Sửa</th>
                    <th scope="col">Xóa</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $connect = mysqli_connect('localhost', 'root', '', 'baitaploncnw');
                if (!$connect) {
                    die("Không thể kết nối");
                }
                if ($MaKH != null)
                    $sql = "SELECT chitietkhoahoc.MaKH, monhoc.Ten AS tenMon, monhoc.SoTC, 
                    giaovien.Ten as tenGV, giaovien.Email, giaovien.SDT ,khoa.Ten as tenKhoa,
                    chitietkhoahoc.phongHoc, chitietkhoahoc.tietBatDau, chitietkhoahoc.tietKetThuc
                                        FROM chitietkhoahoc, giaovien, monhoc, khoa 
                                        WHERE chitietkhoahoc.MaMon = monhoc.MaMon
                                        AND chitietkhoahoc.MaGV = giaovien.MaGV 
                                        AND monhoc.MaKhoa = khoa.MaKhoa AND chitietkhoahoc.MaKH = $MaKH";
                else
                    $sql = "SELECT chitietkhoahoc.MaKH, monhoc.Ten AS tenMon, monhoc.SoTC, 
                    giaovien.Ten as tenGV, giaovien.Email, giaovien.SDT ,khoa.Ten as tenKhoa,
                    chitietkhoahoc.phongHoc, chitietkhoahoc.tietBatDau, chitietkhoahoc.tietKetThuc
                                        FROM chitietkhoahoc, giaovien, monhoc, khoa 
                                        WHERE chitietkhoahoc.MaMon = monhoc.MaMon
                                        AND chitietkhoahoc.MaGV = giaovien.MaGV 
                                        AND monhoc.MaKhoa = khoa.MaKhoa";
                $result = mysqli_query($connect, $sql);
                $count = mysqli_num_rows($result);
                if ($count > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        echo '<th scope="row">' . $row['MaKH'] . '</th>';
                        echo '<td>' . $row['tenMon'] . '</td>';
                        echo '<td>' . $row['SoTC'] . '</td>';
                        echo '<td>' . $row['tenGV'] . '</td>';
                        echo '<td>' . $row['Email'] . '</td>';
                        echo '<td>' . $row['SDT'] . '</td>';
                        echo '<td>' . $row['tenKhoa'] . '</td>';
                        echo '<td>' . $row['phongHoc'] . '</td>';
                        echo '<td>' . $row['tietBatDau'] . '</td>';
                        echo '<td>' . $row['tietKetThuc'] . '</td>';

                        echo '<td><a href="suaKhoaHoc.php?MaKH=' . $row['MaKH'] . '"><i class="fas fa-edit"></i></a></td>';
                        echo '<td><a href="xoaKhoaHoc.php?MaKH=' . $row['MaKH'] . '"><i class="fas fa-trash-alt"></i></a></td>';

                        echo '</tr>';
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>