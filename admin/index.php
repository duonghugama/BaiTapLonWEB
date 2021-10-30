<?php
include("./header.php");
?>
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
                include("./config/db.php");

                $sql = "SELECT * FROM khoahoc";
                $result = mysqli_query($connect, $sql);
                $count = mysqli_num_rows($result);
                if ($count > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        echo '<th scope="row">' . $row['MaKH']. '</th>';
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
                        echo '<td><a href="chiTietKhoaHoc.php?MaKH=' . $row['MaKH'] . '">Chi tiết</a></td>';
                        echo '</tr>';
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</main>
<?php
include("./footer.php")
?>