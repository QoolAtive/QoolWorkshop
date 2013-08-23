<?php
$this->renderPartial('_side_menu', array('index' => 'item'));
?>

<div class="content">
    <div class="tabcontents" >
        <h3 class="barH3">
            <span>
                <i class="icon-shopping-cart"></i>
                <a href="<?php echo CHtml::normalizeUrl(array("/webSimulation/manageShop/manageShop")); ?>">
                    <?php
                    $shop_name = WebShop::model()->findByPk($shop_id)->name_th;
                    echo Yii::t('language', 'ร้าน ') . $shop_name;
                    ?>
                </a>
                <i class="icon-chevron-right"></i>
                <a href="<?php echo CHtml::normalizeUrl(array("/webSimulation/manageShop/manageShopItem")); ?>">
                    <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'สินค้าในร้าน'); ?>
                </a>
                <i class="icon-chevron-right"></i>
                <?php echo Yii::t('language', 'หมวดหมู่สินค้า'); ?>
            </span>
        </h3>

        <div class="_100">
            <?php
            echo CHtml::button(Yii::t('language', 'เพิ่มหมวดหมู่สินค้า'), array(
                'onclick' => 'window.location = "' . CHtml::normalizeUrl(array("/webSimulation/manageShop/addCategory")) . '"'));
            echo CHtml::button(Yii::t('language', 'จัดลำดับหมวดหมู่สินค้า'), array(
                'onclick' => 'window.location = "' . CHtml::normalizeUrl(array("/webSimulation/manageShop/sortCategory")) . '"'));
            ?>
        </div>
        <hr>

        <ul class="droptrue left">
            <?php
            $category_list = WebShopCategory::model()->findAll(array('condition' => 'web_shop_id = ' . $shop_id, 'order' => 'order_n'));
            $i = 1;
            if ($category_list == NULL) {
                echo '<div class="_100">';
                echo Yii::t('language', 'ไม่พบหมวดหมู่สินค้า');
                echo '</div>';
            } else {
                foreach ($category_list as $category) {
                    ?>
                    <li id="recordsArray_<?php echo $i; ?>">
                        <p class="headsort"><?php echo $category['name_th']; ?></p>
                        <p class="tool">
                            <?php
                            echo CHtml::link('แก้ไขสินค้า', CHtml::normalizeUrl(array('/webSimulation/manageShop/editCategory', 'category_id' => $category['web_shop_category_id'])));
                            ?>
                            &nbsp;|&nbsp;
                            <a href="<?php echo CHtml::normalizeUrl(array('/webSimulation/manageShop/deleteCategory', 'category_id' => $category['web_shop_category_id'])); ?>"
                               onclick="return confirm('<?php echo Yii::t('language', 'คุณต้องการลบหมวดหมู่สินค้านี้หรือไม่?'); ?>');" >ลบ</a>
                            &nbsp;|&nbsp;
                            <a href="#">แก้ไขการแสดงผล</a>
                            &nbsp;|&nbsp;
                            <a href="<?php echo CHtml::normalizeUrl(array('/webSimulation/manageShop/showCategory', 'category_id' => $category['web_shop_category_id'], 'is_show' => $category['show_box'])); ?>" class="hideshowbox">
                                <?php
                                if ($category['show_box']) {
                                    echo 'ซ่อน';
                                } else {
                                    echo 'แสดง';
                                }
                                ?>
                            </a>

                        </p>
                    </li>
                    <?php
                    $i += 1;
                }//END foreach
            }
            ?>
        </ul>   

    </div>
</div>
