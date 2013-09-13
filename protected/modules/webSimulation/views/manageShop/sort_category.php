<?php
$this->renderPartial('_side_menu', array('index' => 'item'));
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
                <a href="<?php echo CHtml::normalizeUrl(array("/webSimulation/manageShop/manageShopItem")); ?>">
                    <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'สินค้าในร้าน'); ?>
                </a>
                <i class="icon-chevron-right"></i>
                <a href="<?php echo CHtml::normalizeUrl(array("/webSimulation/manageShop/manageCategory")); ?>">
                    <?php echo Yii::t('language', 'หมวดหมู่สินค้า'); ?>
                </a>
                <i class="icon-chevron-right"></i>
                <?php echo Yii::t('language', 'จัดลำดับหมวดหมู่สินค้า'); ?>
            </span>
        </h3>

        <div class="_100 textcenter">
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'sort-form',
            ));
//        echo $form->errorSummary($model);
            ?>
            <ul id="sortable">
                <?php
                $category_list = WebShopCategory::model()->findAll(array('condition' => 'web_shop_id = ' . $shop_id, 'order' => 'order_n'));
                foreach ($category_list as $category) {
                    ?>
                    <li id="<?php echo $category['web_shop_category_id']; ?>" class="ui-state-default" value="<?php echo $category['order_n']; ?>"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span><?php echo $category['name_th']; ?></li>
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
                    'onclick' => 'window.location = "' . CHtml::normalizeUrl(array("/webSimulation/manageShop/manageCategory")) . '"'));
                ?>
            </div>

            <?php $this->endWidget(); ?>
        </div>
    </div>
</div>