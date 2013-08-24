<div class="main_box clearfix col4">
    <h2><a href="#"><?php echo $item_detail['name_th']; ?></a></h2>
    <div class="item_detail">
        <a class="pdf" href="#"></a>
        <div class="item_pic">
            <img alt="<?php echo $item_detail['name_th']; ?>" src="
            <?php
            if ($item_detail['pic_1'] != NULL) {
                echo $item_detail['pic_1'];
            } else if ($item_detail['pic_2'] != NULL) {
                echo $item_detail['pic_2'];
            } else if ($item_detail['pic_3'] != NULL) {
                echo $item_detail['pic_3'];
            } else if ($item_detail['pic_4'] != NULL) {
                echo $item_detail['pic_4'];
            } else if ($item_detail['pic_5'] != NULL) {
                echo $item_detail['pic_5'];
            } else if ($item_detail['pic_6'] != NULL) {
                echo $item_detail['pic_6'];
            } else if ($item_detail['pic_7'] != NULL) {
                echo $item_detail['pic_7'];
            } else if ($item_detail['pic_8'] != NULL) {
                echo $item_detail['pic_8'];
            } else {
                echo '/img/noimage.gif';
            }
            ?>" />
            <!--<span class="price"><label>ราคาปกติ:</label> ฿<?php echo $item_detail['price_normal']; ?></span>-->
        </div>
        <div class="detail_info">
            <p><label>ชื่อสินค้า:</label> <?php echo $item_detail['name_th']; ?></p>
            <p><label>ราคาปกติ:</label> ฿<?php echo $item_detail['price_normal']; ?></p>
            <p><label>ราคาพิเศษ:</label> ฿<?php echo $item_detail['price_special']; ?></p>
            <p><label>หมวดหมู่สินค้า:</label> <?php echo $item_detail['category']; ?></p>
            <p><label>สภาพสินค้า:</label> <?php echo $item_detail['item_state']; ?></p>
            <p><label>น้ำหนักสินค้า (กรัม):</label> <?php echo $item_detail['weight']; ?></p>
            <p><label>รายละเอียดสินค้า:</label> <?php echo $item_detail['description_th']; ?></p>
        </div>
        <div class="list_pic">
            <ul>
                <?php
                if ($item_detail['pic_1'] != NULL) {
                    echo "<li><img alt='" . $item_detail['name_th'] . "' src='" . $item_detail['pic_1'] . "' /></li>";
                }
                if ($item_detail['pic_2'] != NULL) {
                    echo "<li><img alt='" . $item_detail['name_th'] . "' src='" . $item_detail['pic_2'] . "' /></li>";
                }
                if ($item_detail['pic_3'] != NULL) {
                    echo "<li><img alt='" . $item_detail['name_th'] . "' src='" . $item_detail['pic_3'] . "' /></li>";
                }
                if ($item_detail['pic_4'] != NULL) {
                    echo "<li><img alt='" . $item_detail['name_th'] . "' src='" . $item_detail['pic_4'] . "' /></li>";
                }
                if ($item_detail['pic_5'] != NULL) {
                    echo "<li><img alt='" . $item_detail['name_th'] . "' src='" . $item_detail['pic_5'] . "' /></li>";
                }
                if ($item_detail['pic_6'] != NULL) {
                    echo "<li><img alt='" . $item_detail['name_th'] . "' src='" . $item_detail['pic_6'] . "' /></li>";
                }
                if ($item_detail['pic_7'] != NULL) {
                    echo "<li><img alt='" . $item_detail['name_th'] . "' src='" . $item_detail['pic_7'] . "' /></li>";
                }
                if ($item_detail['pic_8'] != NULL) {
                    echo "<li><img alt='" . $item_detail['name_th'] . "' src='" . $item_detail['pic_8'] . "' /></li>";
                }
                ?>
            </ul>
        </div>
    </div>
</div>