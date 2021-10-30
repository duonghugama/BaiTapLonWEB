<?php

if ($res3 == true) {
    $my_array = array();
    ?>
<h2 style="color:darkgrey"><?php echo $row3['note'] ?></h2>

    <?php
    $i = 1;
    while ($row3 = mysqli_fetch_assoc($res3)) {
    ?>        
        <p><span style="font-weight: 500;">Thành viên <?php echo $i?>: </span><?php echo $row3['user_id'] ?><span style="font-weight: 500;"> (Trưởng nhóm)</span></p>
        <?php
        $i++;
    }?>
    <p class="note"><?php echo $row1['nameBTL'] ?></p>
    <?php
}
?>