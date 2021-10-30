<?php
include("./header.php");
include("config/db.php");
?>
<main>
    <!-- <section class="pb-4"> -->
    <!-- <div class="bg-light rounded-5"> -->
    <!-- Chọn kì học -->
    <section class="ps-4 d-flex justify-content-start">
        <div class="me-3" style="width: 15rem;">
            <select class="form-select" data-mdb-visible-options="3" style="background-color: #f1efef;">
            <option value="1">1</option>
            <option value="2">2</option>
            </select>
        </div>
        <!-- Chọn năm học -->
        <div style="width: 15rem;">
            <select class="form-select" data-mdb-visible-options="3" style="background-color: #f1efef;">
                <?php
                $sql_dsNamHoc = "SELECT * FROM khoahoc";
                $rs_dsNamHoc = mysqli_query($conn, $sql_dsNamHoc);
                if (mysqli_num_rows($rs_dsNamHoc) > 0) {
                    $i = 1;
                    while ($row_dsNamHoc = mysqli_fetch_assoc($rs_dsNamHoc)) {
                ?>
                        <option value="<?php echo $i ?>"><?php echo $row_dsNamHoc['Ten'] ?></option>
                <?php
                        $i++;
                    }
                }
                ?>
                <!-- <option value="1">Năm học 2020</option> -->
            </select>
        </div>
        <button id="btnMon" class="btn btn-success ms-3">Xem</button> 
    </section>
    <div class="container-fluid">
        <div class="row" id="dsMon">
           
            
        </div>
    </div>
    <!-- </div> -->
    <!-- </section> -->

</main>
<?php
include("./footer.php");
?>
<script>
    $('#btnMon').click(function(){
        $('#dsMon').html(`
        <ul class="list-group col-md-3 mt-5 ms-4">
                <h4 style="font-weight: 500;">Môn học</h4>
                <li class="list-group-item ps-5">
                    <?php
                    $sql_dsMon = "SELECT * FROM monhoc";
                    $rs_dsMon = mysqli_query($conn, $sql_dsMon);
                    if (mysqli_num_rows($rs_dsMon) > 0) {
                        while ($row_dsMon = mysqli_fetch_assoc($rs_dsMon)) {
                    ?>
                            <?php
                            echo "<a href='chiTietHocPhan.php?idMon=".$row_dsMon['MaMon']."'>" . $row_dsMon['Ten'] . "</a>";
                            echo "<br>";
                            ?>
                    <?php
                        }
                    }
                    ?>
                </li>
            </ul>
            <div class="col-md mt-5">
                <h4 style="font-weight: 500;">Lớp học phần</h4>
            </div>
        
        `)
    })
</script>