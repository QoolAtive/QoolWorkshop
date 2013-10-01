<style>
    a [class^="icon-"], a [class*=" icon-"] {
        display: block;
    }
</style>
<?php
$this->renderPartial('_side_menu', array('index' => 'shop'));
?>
<div class="content">
    <div class="tabcontents">
        <h3 class="barH3">
            <span>
                <i class="icon-shopping-cart"></i>
                <a href="<?php echo CHtml::normalizeUrl(array("/webSimulation/manageShop/manageShop")); ?>">
                    <?php echo Yii::t('language', 'ร้าน :n', array(':n' => $model->name_th)); ?>
                </a>
                <i class="icon-chevron-right"></i>
                <a href="<?php echo CHtml::normalizeUrl(array("/webSimulation/manageShop/manageShop")); ?>">
                    <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'ร้านค้า'); ?>
                </a>
                <i class="icon-chevron-right"></i>
                <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'รูปแบบ') . Yii::t('language', 'ร้านค้า'); ?>
            </span>
        </h3>

        <ul class="websimboxlist">
            <!--แก้ไขธีมร้านค้า-->
            <li>
                <ul class="innerlogo">
                    <li>
                        <?php
                        echo CHtml::link(CHtml::image('/img/layout/' . WebShopFormat::model()->findByAttributes(array('web_shop_id' => $model->web_shop_id))->theme . '.jpg'), CHtml::normalizeUrl(array('/webSimulation/manageShop/selectThemes')));
                        ?>
                    </li>
                    <li>
                        <?php
                        echo CHtml::link(Yii::t('language', 'ธีม'), CHtml::normalizeUrl(array('/webSimulation/manageShop/selectThemes')));
                        ?>
                    </li>
                </ul>
            </li>

            <!--โลโก้ และ พื้นหลัง-->
            <li>
                <ul class="innerlogo">
                    <li>
                        <a href="<?php echo CHtml::normalizeUrl(array('/webSimulation/manageShop/selectLogoBg')); ?>">
                            <i class="icon-magic"></i>
                            <?php
                            echo Yii::t('language', 'โลโก้และพื้นหลัง');
                            ?>
                        </a>
                    </li>
                </ul>
            </li>

            <!--อักษรและข้อความ-->
            <li>
                <ul class="innerlogo">
                    <li>
                        <a href="<?php echo CHtml::normalizeUrl(array('/webSimulation/manageShop/selectCharText')); ?>">
                            <i class="icon-font"></i>
                            <?php
                            echo Yii::t('language', 'อักษรและข้อความ');
                            ?>
                        </a>
                    </li>
                </ul>
            </li>

        </ul>        <!--<ul class="linklist">-->
    </div>
</div>