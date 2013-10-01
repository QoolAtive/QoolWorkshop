<?php
$this->renderPartial('_side_menu', array('index' => 'shop'));
?>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

<div class="content">
    <div class="tabcontents" >
        <h3 class="barH3">
            <span>
                <i class="icon-shopping-cart"></i>
                <a href="<?php echo CHtml::normalizeUrl(array("/webSimulation/manageShop/manageShop")); ?>">
                    <?php
                    $shop_name = WebShop::model()->findByPk($shop_id)->name_th;
                    echo Yii::t('language', 'ร้าน :n', array(':n' => $shop_name));
                    ?>
                </a>
                <i class="icon-chevron-right"></i>
                <a href="<?php echo CHtml::normalizeUrl(array("/webSimulation/manageShop/manageShop")); ?>">
                    <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'ร้านค้า'); ?>
                </a>
                <i class="icon-chevron-right"></i>
                <a href="<?php echo CHtml::normalizeUrl(array("/webSimulation/manageShop/manageBox")); ?>">
                    <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'กล่องแสดงสินค้า'); ?>
                </a>
                <i class="icon-chevron-right"></i>
                <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'สินค้าในกล่อง'); ?>
            </span>
        </h3>

        <div class="txt-cen clearfix">
            <?php
            echo CHtml::button(Yii::t('language', 'เพิ่ม') . Yii::t('language', 'สินค้าใหม่ลงในกล่อง'), array(
                'onclick' => 'window.location = "' . CHtml::normalizeUrl(array(
                        '/webSimulation/manageShop/addBoxItem', 'box_id' => $box_id)) . '"'));
            echo CHtml::button(Yii::t('language', 'จัดการ') . Yii::t('language', 'รายการสินค้า'), array(
                'onclick' => 'window.location = "' . CHtml::normalizeUrl(array("/webSimulation/manageShop/manageItem")) . '"'));
            ?>
            <hr />
        </div>

        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'select_box-form',
        ));
//        echo $form->errorSummary($model);
        ?>
        <div class="_50">
            <div class="txt-cen websimtexthead">
                สินค้าทั้งหมด
            </div>
            <ul id="all_item" class="connectedSortable">
                <?php
                $items = WebShopItem::model()->findAll(array('condition' => '
                    web_shop_id = ' . $shop_id . '
                    AND
                    NOT EXISTS (SELECT NULL
                    FROM web_shop_box_item box
                    WHERE t.web_shop_item_id = box.web_shop_item_id
                    and box.web_shop_box_id = ' . $box_id . ')'
                ));
                foreach ($items as $item) {
                    ?>
                    <li id="<?php echo $item['web_shop_item_id']; ?>" class="ui-state-default" >
                        <div class="item_pic">
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
                        </div>
                        <?php echo $item['name_th']; ?>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>

        <div class="_50">
            <div class="txt-cen websimtexthead">
                สินค้าที่เลือก
            </div>
            <ul id="select_item" class="connectedSortable">
                <?php
                $items = WebShopBoxItem::model()->findAll(array('condition' => 'web_shop_box_id = ' . $box_id));
                foreach ($items as $item) {
                    $item_detail = WebShopItem::model()->findByPk($item['web_shop_item_id']);
                    ?>
                    <li id="<?php echo $item['web_shop_item_id']; ?>" class="ui-state-default" >
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
                        </div>
                        <?php echo $item_detail['name_th']; ?>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>

        <div class="_100 textcenter" style="margin-top: 5px;">
            <hr>
            <?php
            echo CHtml::hiddenField('select', '', array(
                'id' => 'select',
            ));
            echo CHtml::submitButton(Yii::t('language', 'บันทึก'), array(
                'class' => "purple",
            ));
            echo CHtml::button(Yii::t('language', 'ยกเลิก'), array(
                'onclick' => 'window.location = "' . CHtml::normalizeUrl(array("/webSimulation/manageShop/manageBox")) . '"'));
            ?>
            <hr>
        </div>

        <?php $this->endWidget(); ?>
    </div>
</div>
