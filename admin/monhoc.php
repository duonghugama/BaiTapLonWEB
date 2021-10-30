<?php
include("header.php")
?>
<main>
    <div class="container-sm my-4">
        <a href="themMon.php" class="btn btn-success">Thêm môn học mới</a>
    </div>
    <div class="container-sm my-3">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Mã Môn</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Số tín chỉ</th>
                    <th scope="col">Khoa</th>
                    <th scope="col">Sửa</th>
                    <th scope="col">Xóa</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include("./config/db.php");

                $sql = "SELECT monhoc.MaMon, monhoc.Ten as tenMon, monhoc.SoTC, khoa.Ten as tenKhoa
                FROM monhoc, khoa WHERE monhoc.MaKhoa = khoa.MaKhoa";
                $result = mysqli_query($connect, $sql);
                $count = mysqli_num_rows($result);
                if ($count > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        echo '<th scope="row">' . $row['MaMon'] . '</th>';
                        echo '<td>' . $row['tenMon'] . '</td>';
                        echo '<td>' . $row['SoTC'] . '</td>';
                        echo '<td>' . $row['tenKhoa'] . '</td>';
                        echo '<td><a href="suaMon.php?MaMon=' . $row['MaMon'] . '"><i class="fas fa-edit"></i></a></td>';
                        echo '<td><a href="xoaMon.php?MaMon=' . $row['MaMon'] . '"><i class="fas fa-trash-alt"></i></a></td>';
                        echo '</tr>';
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</main>
<?php
include("footer.php")
?>