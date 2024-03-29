<?php 

    include('constants.php'); 

?>
<?php
session_start();
if($_SESSION["Quyen"]!= 1)
{
    header("location: ../index.php");
}
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
  <h1 class="bg-info">Thông tin khóa học</h1>
  <main>
        
    
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Mã khóa học</th>
                    <th scope="col">Tên khóa học</th>
                    <th scope="col">Kỳ học</th>
                    <th scope="col">Thời gian bắt đầu</th>
                    <th scope="col">Thời gian kết thúc</th>
                                 
                </tr>
            </thead>
            
            <tbody>
               
                <?php
             
                
                    // Bước 02: Thực hiện TRUY VẤN
                    $sql = "SELECT * FROM khoahoc";
                    
                    $result = mysqli_query($conn,$sql); //Lưu kết quả trả về vào result
                    // Bước 03: Phân tích và xử lý kết quả

                    if(mysqli_num_rows($result)>0){
                       
                        while($row=mysqli_fetch_assoc($result)){
                            echo '<tr>';
                            echo '<td>'.$row['MaKH'].'</td>';
                            echo '<td>'.$row['Ten'].'</td>';
                            echo '<td>'.$row['Ky'].'</td>';
                            echo '<td>'.$row['ThoiGianBatDau'].'</td>';
                            echo '<td>'.$row['ThoiGianKetThuc'].'</td>';
                           
                            echo '</tr>';
                        }
                    }
               
                ?>
                
                
            </tbody>
            </table>
            <a href="chitietkh.php" class="btn btn-success"><i class=""></i>Chi tiết</a>
            <a href="KHGV.php" class="btn btn-success"><i class=""></i>Khóa học được phân công</a>
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