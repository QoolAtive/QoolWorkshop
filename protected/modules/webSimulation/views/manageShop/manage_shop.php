<?php
$this->renderPartial('_side_menu', array('index' => 'shop'));
?>
<div class="content">
    <div class="tabcontents">
        <h3 class="barH3">
            <span>
                <i class="icon-shopping-cart"></i>
                <?php echo Yii::t('language', 'ร้าน ') . $model->name_th; ?>
                <i class="icon-chevron-right"></i>
                <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'ร้านค้า'); ?>
            </span>
        </h3>

        <!--รายการสั่งซื้อ-->
        <div>
            <?php
            echo CHtml::link(Yii::t('language', 'รายการ') . Yii::t('language', 'สั่งซื้อ'), CHtml::normalizeUrl(array('/webSimulation/manageShop/manageShopFormat')));
            ?>
        </div>
        
        <!--แก้ไขรายละเอียดร้านค้า-->
        <div>
            <?php
            echo CHtml::link(Yii::t('language', 'แก้ไข') . Yii::t('language', 'รายละเอียด') . Yii::t('language', 'ร้านค้า'), CHtml::normalizeUrl(array('/webSimulation/manageShop/register')));
            ?>
        </div>
        
        <!--แก้ไขรูปแบบร้านค้า-->
        <div>
            <?php
            echo CHtml::link(Yii::t('language', 'จัดการ') . Yii::t('language', 'รูปแบบ') . Yii::t('language', 'ร้านค้า'), CHtml::normalizeUrl(array('/webSimulation/manageShop/manageShopFormat')));
            ?>
        </div>
        
    </div>
</div>