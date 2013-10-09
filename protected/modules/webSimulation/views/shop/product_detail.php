<div class="main_box clearfix col4">
    <h2 class="topic"><?php echo $item_detail['name_th']; ?></h2>
    <div class="item_detail clearfix">
        <!-- <a class="pdf" href="#"></a> -->
        <div class="clearfix" style="width: 100%; display: block; height: auto;margin-bottom: 50px;">
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
            <div class="detail_info normal">
                <p><label>ชื่อสินค้า:</label> <?php echo $item_detail['name_th']; ?></p>
                <p><label>ราคา:</label>
                    <?php
                    if ($item_detail['price_special'] != NULL || $item_detail['price_special'] != '') {
                        echo '<span style="text-decoration:line-through;">' . $item_detail['price_normal'] . '</span>';
                        echo ' พิเศษ ';
                        echo $item_detail['price_special'];
                    } else {
                        echo $item_detail['price_normal'];
                    }
                    ?>
                    บาท
                </p>
                <?php if($item_detail['vat'] != NULL){
                    ?>
                <p><label>ภาษีมูลค่าเพิ่ม:</label>
                    <?php
                    echo $item_detail['vat'];
                    ?>
                </p>
                <?php
                }
                ?>
                <p><label>ประเภทสินค้า:</label> <?php echo ShopCategory::getCategory($item_detail['category']); ?></p>
                <p><label>สภาพสินค้า:</label> <?php
                    if ($item_detail['item_state'] == '0') {
                        echo 'สินค้าใหม่';
                    } else {
                        echo 'สินค้ามือสอง';
                    }
                    ?>
                </p>
                <?php
                if ($item_detail['weight'] != NULL) {
                    ?>
                    <p><label>น้ำหนักสินค้า (กรัม):</label> <?php echo $item_detail['weight']; ?></p>
                    <?php }
                ?>
                <p><label>รายละเอียดสินค้า:</label> <?php echo $item_detail['description_th']; ?></p>
            </div>

        </div>
        <div class="clearfix" style="width: 100%; display: block;"></div>
        <!--หยิบใส่ตะกร้า-->
        <div style="width: 100%; display: block; padding: 40px 0; text-align: center;">
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'select-form',
            ));
            ?>
            <div id="busket_btn">
                <?php
                $this->renderPartial('busket_btn_', array('busket' => $busket, 'item_id' => $item_detail['web_shop_item_id']));
                ?>
            </div>
            <?php
            if ($busket[$item_detail['web_shop_item_id']] == NULL) {
                $is_in_busket = false;
            } else {
                $is_in_busket = true;
            }
            echo CHtml::ajaxSubmitButton(($is_in_busket) ? 'หยิบออกจากตะกร้า' : 'หยิบใส่ตะกร้า', CHtml::normalizeUrl(array('/webSimulation/shop/selectItem', 'item_id' => $item_detail['web_shop_item_id'], 'id' => $id)), array(
                'type' => 'POST',
                'dataType' => 'json',
                'success' => "function (data){
            $('#busket_btn').html(data.div1);
            $('#busket_side').html(data.div2);
            if($('#select').val() == 'หยิบใส่ตะกร้า'){
                $('#select').val('หยิบออกจากตะกร้า');
            } else {
                $('#select').val('หยิบใส่ตะกร้า');
            }
        }"
                    ), array(
                'id' => 'select',
            ));
            $this->endWidget();
            ?>
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