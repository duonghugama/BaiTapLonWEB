<?php
session_start();
if (isset($_POST['dangNhap'])) {
    $user = addslashes($_POST['tenDangNhap']);
    $pass = addslashes($_POST['matKhau']);
    //Kết nối tới database
    $connect = mysqli_connect('localhost', 'root', '', 'baitaploncnw');
    if (!$connect) {
        die("Không thể kết nối");
    }

    $sql = "SELECT * FROM user WHERE UserName='$user' And password='$pass'";
    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result) != 0) {
        while ($row = $result->fetch_assoc()) {
            $_SESSION["Quyen"] = $row["Permission_ID"];
            $_SESSION["UserName"] = $row["UserName"];
            $_SESSION["Password"] = $row["Password"];
            $_SESSION["Email"] = $row["Email"];
            $_SESSION['checkLogin'] = $user;
            switch ($_SESSION["Quyen"]) {
                case 1:
                    header("location: ./giaovien/index.php");
                    break;
                case 2:
                    header("location: ./sinhvien/index.php");
                    break;
                case 3:
                    header("location: ./admin/index.php");
                    break;
            }
        }
        
    } else {
        echo "Sai tên đăng nhập hoặc mật khẩu. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
        // echo "không thành công";
    }
}
