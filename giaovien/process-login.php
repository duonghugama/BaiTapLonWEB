<?php
        // Dịch vụ bảo vệ:
        session_start(); //Công ty dịch vụ Bảo vệ


        if(isset($_POST['sbmlogin'])){
            $username = $_POST['txtusername'];
            $password = $_POST['txtpassword'];

            // Bước 01: Kết nối DB Server
            $conn = mysqli_connect('localhost','root','','baitaploncnw');
            if(!$conn){
                die("Không thể kết nối");
            }

            // Bước 02: Truy vấn thông tin
            $sql = "SELECT * FROM User WHERE UserName='$username' AND Password='$password'";
            $result = mysqli_query($conn,$sql);

            // Bước 03: Xác thực > Đăng nhập > Ở trên, trả về 1 bản ghi thôi
            if(mysqli_num_rows($result) > 0){
                // Bảo vệ cửa CHÍNH: kiểm tra xác thực
                $_SESSION['loginOK'] = $username;
                header("Location: home.php");
            }else{
                $_SESSION['login'] = "<div class='error text-center'>Username or Password did not match.</div>";
                header("Location: login.php");
            }
        }
    ?>

 