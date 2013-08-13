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

        <ul class="linklist">
            <!--แก้ไขธีมร้านค้า-->
            <li>
                <ul class="innerlogo">
                    <li>
                        <?php
                        echo CHtml::link(CHtml::image(WebShopFormat::model()->findByAttributes(array('web_shop_id' => $model->web_shop_id))->theme), CHtml::normalizeUrl(array('/webSimulation/manageShop/selectThemes')));
                        ?>
                    </li>
                    <li>
                        <?php
                        echo CHtml::link(Yii::t('language', 'ธีม') . Yii::t('language', 'ร้านค้า'), CHtml::normalizeUrl(array('/webSimulation/manageShop/selectThemes')));
                        ?>
                    </li>
                </ul>
            </li>

            <!--โลโก้ และ พื้นหลัง-->
            <li>
                <ul class="innerlogo">
                    <li>
                        <?php
                        echo CHtml::link(Yii::t('language', 'โลโก้ และ พื้นหลัง'), CHtml::normalizeUrl(array('/webSimulation/manageShop/selectLogoBg')));
                        ?>
                    </li>
                </ul>
            </li>

            <!--อักษรและข้อความ-->
            <li>
                <ul class="innerlogo">
                    <li>
                        <?php
                        echo CHtml::link(Yii::t('language', 'อักษรและข้อความ'), CHtml::normalizeUrl(array('/webSimulation/manageShop/selectCharText')));
                        ?>
                    </li>
                </ul>
            </li>
            
        </ul>        <!--<ul class="linklist">-->
    </div>
</div>