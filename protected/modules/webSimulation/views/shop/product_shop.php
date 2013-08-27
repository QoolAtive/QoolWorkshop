<div class="main_box clearfix col4">
    <h2 class="topic"><?php echo Yii::t('language', 'สินค้าในร้าน'); ?></h2>

    <?php
    $items = WebShopItem::model()->findAll(array('condition' => 'web_shop_id = ' . $id));
    foreach ($items as $item) {
        ?>
        <div class="item">
            <a class="pdf" href="#"></a>
            <div class="item_pic">
                <a href="/webSimulation/shop/productDetail/id/<?php echo $item['web_shop_id']; ?>/p_id/<?php echo $item['web_shop_item_id']; ?>"  alt="<?php echo $item['name_th']; ?>">
                    <img alt="<?php echo $item['name_th']; ?>" src="
                    <?php
                    if ($item['pic_1'] != NULL) {
                        echo $item['pic_1'];
                    } else if ($item['pic_2'] != NULL) {
                        echo $item['pic_2'];
                    } else if ($item['pic_3'] != NULL) {
                        echo $item['pic_3'];
                    } else if ($item['pic_4'] != NULL) {
                        echo $item['pic_4'];
                    } else if ($item['pic_5'] != NULL) {
                        echo $item['pic_5'];
                    } else if ($item['pic_6'] != NULL) {
                        echo $item['pic_6'];
                    } else if ($item['pic_7'] != NULL) {
                        echo $item['pic_7'];
                    } else if ($item['pic_8'] != NULL) {
                        echo $item['pic_8'];
                    } else {
                        echo '/img/noimage.gif';
                    }
                    ?>" />
                </a>
                <span class="price">฿<?php echo $item['price_normal']; ?></span>
            </div>
            <div class="info_item">
                <h3><a href="/webSimulation/shop/productDetail/id/<?php echo $item['web_shop_id']; ?>/p_id/<?php echo $item['web_shop_item_id']; ?>" alt="<?php echo $item['name_th']; ?>" title="<?php echo $item['name_th']; ?>">
                        <?php echo $item['name_th']; ?>
                        <span class="promotion_price">
                            <?php
                            if ($item['price_special'] != '' && $item['price_special'] != NULL) {
                                echo Yii::t('language', 'ราคาพิเศษ') . ' ฿' . $item['price_special'];
                            }
                            ?>
                        </span>
                    </a></h3>
            </div>
        </div>
        <?php
    } //END item
    ?>

</div>
