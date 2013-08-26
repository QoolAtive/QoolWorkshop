<div class="main_box clearfix col4">
    <h2><?php echo $category->name_th ?></h2>

    <?php
    $items = WebShopCategoryItem::model()->findAll(array('condition' => 'web_shop_id = ' . $id . ' and web_shop_category_id = ' . $category_id));
    foreach ($items as $item) {
        $item_detail = WebShopItem::model()->findByPk($item['web_shop_item_id']);
        ?>
        <div class="item">
            <a class="pdf" href="#"></a>
            <div class="item_pic">
                <a href="/webSimulation/shop/productDetail/id/<?php echo $item['web_shop_id']; ?>/p_id/<?php echo $item['web_shop_item_id']; ?>"  alt="<?php echo $item_detail['name_th']; ?>">
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
                </a>
                <span class="price">฿<?php echo $item_detail['price_normal']; ?></span>
            </div>
            <div class="info_item">
                <h3><a href="/webSimulation/shop/productDetail/id/<?php echo $item['web_shop_id']; ?>/p_id/<?php echo $item['web_shop_item_id']; ?>"  alt="<?php echo $item_detail['name_th']; ?>" alt="<?php echo $item_detail['name_th']; ?>" title="<?php echo $item_detail['name_th']; ?>">
                        <?php echo $item_detail['name_th']; ?>
                        <span class="promotion_price">
                            <?php
                            if ($item_detail['price_special'] != '' && $item_detail['price_special'] != NULL) {
                                echo Yii::t('language', 'ราคาพิเศษ') . ' ฿' . $item_detail['price_special'];
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
