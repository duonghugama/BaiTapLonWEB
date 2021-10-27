<?php
    $conn = mysqli_connect('localhost','root','','baitaploncnw');
    if(!$conn){
        die('Connect database fail');
    }
    else {
        echo "Ket noi thanh cong";  
      }
?>