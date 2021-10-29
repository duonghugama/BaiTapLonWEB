<?php
session_start();
include("./header.php");
?>
<main>
    <div class="container">
    <table class="table table-striped table-bordered">
        <thead>
            <th scope="col-md-2">STT</th>
            <th scope="col-md-2">Mã Môn Học</th>
            <th scope="col-md-4">Tên Môn Học</th>
            <th scope="col-md-2">Số tín chỉ</th>
            <th scope="col-md-2">Mã khoa</th>
        </thead>

        <tbody>
            <?php
            include('./config/db.php');
            $sql = "SELECT * FROM monhoc";
            $rs = mysqli_query($conn, $sql);
            if (mysqli_num_rows($rs) > 0) {
                 $i = 1;
                while ($row = mysqli_fetch_assoc($rs)) {
            ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $row['MaMon'] ?></td>
                    <td><?php echo $row['Ten'] ?></td>
                    <td><?php echo $row['SoTC'] ?></td>
                    <td><?php echo $row['MaKhoa'] ?></td>
                </tr>
                
            <?php
                $i++;
                }
            }
            ?>
        </tbody>
    </table>
    </div>
</main>

<?php
include("./footer.php");
?>