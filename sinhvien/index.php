<?php
include('config/db.php');
if(isset($_POST['btnSearch'])){
    $MaMon = $_POST['dscacMon'];
    $sql1 = "SELECT ThoiGianBatDau,ThoiGianKetThuc, phongHoc, giaovien.Ten as tenGV , tietBatDau, tietKetThuc FROM chitietkhoahoc , monhoc , khoahoc, giaovien
      WHERE chitietkhoahoc.MaKH = khoahoc.MaKH and chitietkhoahoc.MaMon=monhoc.MaMon and chitietkhoahoc.MaGV = giaovien.MaGV
     and monhoc.MaMon = $MaMon";
    $rs1 = mysqli_query($conn, $sql1);
    if($rs1){
        header('location:chiTietHocPhan.php?idMon='.$MaMon);  
    }
}
include("./header.php");
?>

<main>
    <div class="container">
        <form action="" method="POST">
            <div class="row">
                <select name="dscacMon" id="dsMon" class="form-select ms-3 col-md-4" aria-label="Default select example">
                    <?php
                    $sql = "SELECT * FROM monhoc";
                    $rs = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($rs) > 0) {
                        while ($row = mysqli_fetch_assoc($rs)) {
                    ?>
                            <option value="<?php echo $row['MaMon'] ?>"><?php echo $row['Ten'] ?></option>
                    <?php
                        }
                    }
                    ?>
                </select>
                <button name="btnSearch" id="btnSearch2" class="btn btn-danger ms-2 col-md-1"><i class="fas fa-search"></i></button>

            </div>
        </form>
    </div>
</main>

<?php
include("./footer.php");
?>

<!-- <script>
    $("#btnSearch2").click(function(){

    })
</script> -->