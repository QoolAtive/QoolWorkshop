<?php
$this->renderPartial('_side_menu', array('index' => 'shop'));
?>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<style>
    #sortable { list-style-type: none; margin: 0; padding: 0; width: 60%; }
    #sortable li { margin: 0 3px 3px 3px; padding: 0.4em; padding-left: 1.5em; font-size: 1.4em; height: 18px; }
    #sortable li span { position: absolute; margin-left: -1.3em; }
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
                <?php echo Yii::t('language', 'จัดลำดับกล่อง'); ?>
            </span>
        </h3>

        <div class="_100 textcenter">
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'sort_box-form',
            ));
//        echo $form->errorSummary($model);
            ?>
            <ul id="sortable">
                <?php
                $boxs = WebShopBox::model()->findAll(array('condition' => 'web_shop_id = ' . $shop_id, 'order' => 'order_n'));
                if ($boxs == NULL) {
                    echo '<div class="_100">';
                    echo Yii::t('language', 'ไม่พบกล่องแสดงสินค้า');
                    echo '<hr/>';
                    echo CHtml::button(Yii::t('language', 'ย้อนกลับ'), array('onClick' => "history.back()"));
                    echo '</div>';
                } else {
                    foreach ($boxs as $box) {
                        ?>
                        <li id="<?php echo $box['web_shop_box_id']; ?>" class="ui-state-default" value="<?php echo $box['order_n']; ?>"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span><?php echo $box['name_th']; ?></li>
                        <?php
                    }
                    ?>
                </ul>

                <div class="_100 textcenter" style="margin-top: 25px;">
                    <?php
                    echo CHtml::hiddenField('sort_arr', '', array(
                        'id' => 'sort_arr',
                    ));
                    echo CHtml::submitButton(Yii::t('language', 'บันทึก'), array(
                        'class' => "purple",
                    ));
                    echo CHtml::button(Yii::t('language', 'ยกเลิก'), array(
                        'onclick' => 'window.location = "' . CHtml::normalizeUrl(array("/webSimulation/manageShop/manageBox")) . '"'));
                    ?>
                </div>
                <?php
            }
            ?>

            <?php $this->endWidget(); ?>
        </div>
    </div>
</div>