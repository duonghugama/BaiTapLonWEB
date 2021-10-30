<?php
include("./header.php");
?>
<main>
  <h4 class="mb-3 ms-3 text-info">Kết quả đăng ký học</h4>
  <?php
      if(isset($_SESSION['huyHPOK'])){
        echo $_SESSION['huyHPOK'];
        unset($_SESSION['huyHPOK']);
      }
  ?>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Lớp học phần</th>
        <th scope="col">Thời gian</th>
        <th scope="col">Phòng học</th>
        <th scope="col">Giáo viên</th>
        <th scope="col">Số tín chỉ</th>
        <th scope="col">Chức năng</th>
      </tr>
    </thead>
    <tbody>
      <?php
      include("config/db.php");
      $sql = "SELECT chitietdangky.MaKH as maKH, chitietdangky.MaMon as maMon,chitietdangky.MaSV as maSV, monhoc.SoTC, monhoc.Ten as TenMH, ThoiGianBatDau,ThoiGianKetThuc, phongHoc, giaovien.Ten as tenGV , tietBatDau, tietKetThuc FROM chitietdangky, chitietkhoahoc , monhoc , khoahoc, giaovien, sinhvien
            WHERE chitietkhoahoc.MaKH = khoahoc.MaKH and chitietkhoahoc.MaMon=monhoc.MaMon and chitietkhoahoc.MaGV = giaovien.MaGV
             and sinhvien.MaSV = chitietdangky.MaSV and chitietdangky.MaSV = 3
           ";
      $rs = mysqli_query($conn, $sql);
      if (mysqli_num_rows($rs)) {
        while ($row = mysqli_fetch_array($rs)) {
      ?>
          <tr>
            <th scope="row"><?php echo $row['TenMH'] ?></th>
            <td>
              <?php echo $row['ThoiGianBatDau'].' <i class="fas fa-arrow-right"></i> '.$row['ThoiGianKetThuc']
              .'<br> <i class="fas fa-chevron-right"></i> Tiết '.$row['tietBatDau'].' <i class="fas fa-arrow-right"></i> Tiết '.$row['tietKetThuc']?>
            </td>
            <td><?php echo $row['phongHoc']?></td>
            <td><?php echo $row['tenGV']?></td>
            <td><?php echo $row['SoTC']?></td>
            <td><a href="./huyHocPhan.php?makh=<?php echo $row['maKH']?>&mamon=<?php echo $row['maMon']?>&masv=<?php echo $row['maSV']?>">Hủy học phần</a></td>
          </tr>
      <?php
        }
      }
      ?>

    </tbody>
  </table>
</main>

<?php
include("./footer.php");
?>