<?php
$this->renderPartial('_side_menu', array('index' => 'format'));
?>
<div class="content">
    <div class="tabcontents">
        <h3 class="barH3">
            <span>
                <i class="icon-shopping-cart"></i>
                <a href="<?php echo CHtml::normalizeUrl(array("/webSimulation/manageShop/manageShop")); ?>">
                    <?php echo Yii::t('language', 'ร้าน ') . $model->name_th; ?>
                </a>
                <i class="icon-chevron-right"></i>
                <a href="<?php echo CHtml::normalizeUrl(array("/webSimulation/manageShop/manageShop")); ?>">
                    <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'ร้านค้า'); ?>
                </a>
                <i class="icon-chevron-right"></i>
                <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'รูปแบบร้านค้า'); ?>
            </span>
        </h3>
        
        <!--แก้ไขธีมร้านค้า-->
        <div>
            <?php
            echo CHtml::link(Yii::t('language', 'ธีม') . Yii::t('language', 'ร้านค้า'), CHtml::normalizeUrl(array('/webSimulation/manageShop/selectThemes')));
            echo ' : ';
            echo WebShopFormat::model()->findByAttributes(array('web_shop_id' => $model->web_shop_id))->theme;
            ?>
        </div>
        
        <!--โลโก้ และ พื้นหลัง-->
        <div>
            <?php
            echo CHtml::link(Yii::t('language', 'โลโก้ และ พื้นหลัง'), CHtml::normalizeUrl(array('/webSimulation/manageShop/selectLogoBg')));
            ?>
        </div>
        
        <!--อักษรและข้อความ-->
        <div>
            <?php
            echo CHtml::link(Yii::t('language', 'อักษรและข้อความ'), CHtml::normalizeUrl(array('/webSimulation/manageShop/selectCharText')));
            ?>
        </div>
    </div>
</div>