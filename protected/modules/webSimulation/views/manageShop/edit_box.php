<?php
$this->renderPartial('_side_menu', array('index' => 'shop'));
?>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<style>
    #all_item, #select_item { list-style-type: none; margin: 0; padding: 0; width: 100%; height: 400px; border: 1px solid;}
    #all_item li, #select_item li { margin: 3px 3px 3px 0; padding: 1px; float: left; width: 100px; height: 90px; font-size: 1em; text-align: center; }
</style>
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
                <a href="<?php echo CHtml::normalizeUrl(array("/webSimulation/manageShop/manageShop")); ?>">
                    <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'ร้านค้า'); ?>
                </a>
                <i class="icon-chevron-right"></i>
                <a href="<?php echo CHtml::normalizeUrl(array("/webSimulation/manageShop/manageBox")); ?>">
                    <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'กล่องแสดงสินค้า'); ?>
                </a>
                <i class="icon-chevron-right"></i>
                <?php echo Yii::t('language', 'แก้ไขสินค้า'); ?>
            </span>
        </h3>

        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'sort_box-form',
        ));
//        echo $form->errorSummary($model);
        ?>
        <div class="_50">
            <ul id="all_item" class="connectedSortable">
                <?php
                $items = WebShopItem::model()->findAll(array('condition' => '
                    web_shop_id = ' . $shop_id . '
                    AND
                    NOT EXISTS (SELECT NULL
                    FROM web_shop_box_item box
                    WHERE t.web_shop_item_id = box.web_shop_item_id
                    and web_shop_box_id = ' . $box_id . ')'
                ));
                foreach ($items as $item) {
                    ?>
                    <li id="<?php echo $item['web_shop_item_id']; ?>" class="ui-state-default" ><?php echo $item['name_th']; ?></li>
                    <?php
                }
                ?>
            </ul>
        </div>

        <div class="_50">
            <ul id="select_item" class="connectedSortable">
                <?php
                $items = WebShopBoxItem::model()->findAll(array('condition' => 'web_shop_box_id = ' . $box_id));
                foreach ($items as $item) {
                    $item_name = WebShopItem::model()->findByPk($item['web_shop_item_id']);
                    ?>
                    <li id="<?php echo $item['web_shop_item_id']; ?>" class="ui-state-default" ><?php echo $item_name['name_th']; ?></li>
                    <?php
                }
                ?>
            </ul>
        </div>

        <div class="_100 textcenter" style="margin-top: 25px;">
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
        </div>

        <?php $this->endWidget(); ?>
    </div>
</div>
