<?php
session_start();
if($_SESSION["Quyen"]!= 1)
{
    header("location: ../index.php");
}
?>

<?php 

    include('constants.php'); 

?>
<?php include('header.php'); ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

   
    <title>Khóa học</title>
  </head>
  <body>
  <h1 class="bg-info">Chi tiết khóa học</h1>
  <main>
 
    
        <table class="table">
            <thead>
                <tr>
                    
                    <th scope="col">Mã khóa học</th>
                    <th scope="col">Tên khóa học</th>
                    <th scope="col">Kỳ học</th>
                    <th scope="col">Mã môn</th>
                    <th scope="col">Tên môn</th>
                    <th scope="col">Giáo viên</th>
                    <th scope="col">Phòng học</th>
                    <th scope="col">Tiết bắt đầu</th>
                    <th scope="col">Tiết kết thúc</th>
                    
                    
                                 
                </tr>
            </thead>
            
            <tbody>
               
                <?php
             
                
                    // Bước 02: Thực hiện TRUY VẤN
                    $sql = "SELECT ct.MaKH as MaKH,kh.Ten as TenKH,kh.Ky,ct.MaMon,mh.Ten as TenMH,gv.Ten as TenGV,ct.phongHoc,ct.tietBatDau,ct.tietKetThuc FROM chitietkhoahoc ct,khoahoc kh,monhoc mh,giaovien gv
                    WHERE  (ct.MaGV = gv.MaGV AND ct.MaKH = kh.MaKH AND ct.MaMon = mh.MaMon) ";
                    
                    $result = mysqli_query($conn,$sql); //Lưu kết quả trả về vào result
                    // Bước 03: Phân tích và xử lý kết quả

                    if(mysqli_num_rows($result)>0){
                       
                        while($row=mysqli_fetch_assoc($result)){
                            echo '<tr>';
                           
                            echo '<td>'.$row['MaKH'].'</td>';
                            echo '<td>'.$row['TenKH'].'</td>';
                            echo '<td>'.$row['Ky'].'</td>';
                            echo '<td>'.$row['MaMon'].'</td>';
                            echo '<td>'.$row['TenMH'].'</td>';
                            echo '<td>'.$row['TenGV'].'</td>';
                            echo '<td>'.$row['phongHoc'].'</td>';
                            echo '<td>'.$row['tietBatDau'].'</td>';
                            echo '<td>'.$row['tietKetThuc'].'</td>';
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
<?php
include("./footer.php");
?>