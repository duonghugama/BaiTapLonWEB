
<?php
// Bước 01; Kết nối tới CSDL:
        define('HOST','localhost');
        define('USER','root');
        const PASS  = '';
        const DB    = 'baitaploncnw'; 
        $conn = mysqli_connect(HOST,USER, PASS,DB);
        if(!$conn){
            die('Không thể kết nối');
        }

?>
