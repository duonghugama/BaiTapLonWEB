<?php
if (isset($_GET["MaKH"]))
    $MaKH = $_GET["MaKH"];
else
    $MaKH = "";
include("./header.php")
?>
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
            include("./config/db.php");
            if ($MaKH != null)
                $sql = "SELECT chitietkhoahoc.ID, chitietkhoahoc.MaKH, monhoc.Ten AS tenMon, monhoc.SoTC, 
                    giaovien.Ten as tenGV, giaovien.Email, giaovien.SDT ,khoa.Ten as tenKhoa,
                    chitietkhoahoc.phongHoc, chitietkhoahoc.tietBatDau, chitietkhoahoc.tietKetThuc
                                        FROM chitietkhoahoc, giaovien, monhoc, khoa 
                                        WHERE chitietkhoahoc.MaMon = monhoc.MaMon
                                        AND chitietkhoahoc.MaGV = giaovien.MaGV 
                                        AND monhoc.MaKhoa = khoa.MaKhoa AND chitietkhoahoc.MaKH = $MaKH";
            else
                $sql = "SELECT chitietkhoahoc.ID, chitietkhoahoc.MaKH, monhoc.Ten AS tenMon, monhoc.SoTC, 
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

                    echo '<td><a href="suaChiTietKH.php?ID=' . $row["ID"] . '"><i class="fas fa-edit"></i></a></td>';
                    echo '<td><a href="xoaChiTietKH.php?ID=' . $row["ID"] . '&MaKH='.$row["MaKH"].'"><i class="fas fa-trash-alt"></i></a></td>';

                    echo '</tr>';
                }
            }
            ?>
        </tbody>
    </table>
    <div class="d-flex justify-content-end my-3">
        <?php
        if (isset($_GET["MaKH"])) {
            $MaKH = $_GET["MaKH"];
            echo '<a class="btn btn-success" href="themChiTietKH.php?MaKH=' . $MaKH . '">Thêm</a>';
        } else {
            $MaKH = "";
            echo '<a class="btn btn-success" href="themChiTietKH.php">Thêm</a>';
        }
        ?>
    </div>
</div>
<?php
include("./footer.php")
?>