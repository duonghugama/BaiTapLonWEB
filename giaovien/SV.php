<?php
session_start();
if (isset($_GET["MaKH"]))
    $MaKH = $_GET["MaKH"];
else
    $MaKH = "";
?>

<?php 

    include('constants.php'); 

?>
<?php include('partials/menu.php'); ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Khóa học</title>
  </head>
  <body>
  <h1 class="bg-info">Thông tin học viên</h1>
  <main>

  <form action="SV.php" method="get" class="container-md my-3">
        <div class="row align-items-center">
            <div class="form-group col">
                <label for="nam" class="row-sm-2 row-form-label">Chọn khóa học</label>
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
                                echo ' Mã KH: ' . $row1["MaKH"] . ' | Năm: ' . $row1["Ten"] . ' | Kỳ ' . $row1["Ky"];
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

        
    
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Mã khóa học</th>
                    <th scope="col">Tên khóa học</th>
                    <th scope="col">Môn học</th>
                    <th scope="col">Mã SV</th>
                    <th scope="col">Tên SV</th>
                    <th scope="col">Giới tính</th>
                    <th scope="col">Quê quán</th>
                    <th scope="col">Email</th>
                    <th scope="col">Tên khoa</th>              
                  
                </tr>
            </thead>
            
            <tbody>
                <!-- Đoạn này thay đổi theo Dữ liệu trong CSDL -->
                <?php
                  
                  if ($MaKH != null)
                    $sql = "SELECT c.MaKH,kh.Ten as TenKH,m.Ten as TenMH,sv.MaSV,sv.Ten as TenSV,sv.GioiTinh,sv.QueQuan,sv.Email,k.Ten as TenK FROM sinhvien sv,khoa k,chitietdangky c,khoahoc kh,monhoc m
                    WHERE sv.MaKhoa = k.MaKhoa AND c.MaKH = kh.MaKH AND c.MaMon = m.MaMon AND c.MaSV = sv.MaSV AND c.MaKH=$MaKH ";
                  else
                  $sql = "SELECT c.MaKH,kh.Ten as TenKH,m.Ten as TenMH,sv.MaSV,sv.Ten as TenSV,sv.GioiTinh,sv.QueQuan,sv.Email,k.Ten as TenK FROM sinhvien sv,khoa k,chitietdangky c,khoahoc kh,monhoc m
                  WHERE (sv.MaKhoa = k.MaKhoa AND c.MaKH = kh.MaKH AND c.MaMon = m.MaMon AND c.MaSV = sv.MaSV) ";

                    $result = mysqli_query($conn,$sql); //Lưu kết quả trả về vào result
                    $count = mysqli_num_rows($result);
                    // Bước 03: Phân tích và xử lý kết quả

                    if($count>0){
                       
                        while($row=mysqli_fetch_assoc($result)){
                            echo '<tr>';
                            echo '<td>'.$row['MaKH'].'</td>';
                            echo '<td>'.$row['TenKH'].'</td>';
                            echo '<td>'.$row['TenMH'].'</td>';
                            echo '<td>'.$row['MaSV'].'</td>';
                            echo '<td>'.$row['TenSV'].'</td>';
                            echo '<td>'.$row['GioiTinh'].'</td>';
                            echo '<td>'.$row['QueQuan'].'</td>';
                            echo '<td>'.$row['Email'].'</td>';
                            echo '<td>'.$row['TenK'].'</td>';
                            echo '</tr>';
                        }
                    }
               
               
                ?>
                
                
            </tbody>
            </table>
            
    </main>
    
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>