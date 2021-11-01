<?php
session_start();
if(isset($_SESSION['checkLogin'])){
    unset($_SESSION['checkLogin']);
    header('location: ../index.php');
}

?>