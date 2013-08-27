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

        <ul class="websimboxlist">
            <!--จัดการกล่องแสดงสินค้า-->
            <li>
                <ul class="innerlogo">
                    <li>
                        <i class="icon-inbox"></i>
                        <?php
                        echo CHtml::link(Yii::t('language', 'จัดการ') . Yii::t('language', 'กล่องแสดงสินค้า'), CHtml::normalizeUrl(array('/webSimulation/manageShop/manageBox')));
                        ?>
                    </li>
                </ul>
            </li>
            
            <!--รายการสั่งซื้อ-->
            <li>
                <ul class="innerlogo">
                    <li>
                        <i class="icon-list"></i>
                        <?php
                        echo CHtml::link(Yii::t('language', 'รายการ') . Yii::t('language', 'สั่งซื้อ'), CHtml::normalizeUrl(array('/webSimulation/manageShop/order')));
                        ?>
                    </li>
                </ul>
            </li>

            <!--แก้ไขรายละเอียดร้านค้า-->
            <li>
                <ul class="innerlogo">
                    <li><i class="icon-edit"></i>
                        <?php
                        echo CHtml::link(Yii::t('language', 'แก้ไข') . Yii::t('language', 'รายละเอียด') . Yii::t('language', 'ร้านค้า'), CHtml::normalizeUrl(array('/webSimulation/manageShop/register')));
                        ?>
                    </li>
                </ul>
            </li>

            <!--แก้ไขรูปแบบร้านค้า-->
            <li>
                <ul class="innerlogo">
                    <li>
                        <i class="icon-desktop"></i>
                        <?php
                        echo CHtml::link(Yii::t('language', 'จัดการ') . Yii::t('language', 'รูปแบบ') . Yii::t('language', 'ร้านค้า'), CHtml::normalizeUrl(array('/webSimulation/manageShop/manageShopFormat')));
                        ?>
                    </li>
                </ul>
            </li>
            
            <!--แก้ไขวิธีสั่งซื้อและชำระเงิน-->
            <li>
                <ul class="innerlogo">
                    <li>
                        <i class="icon-usd"></i> 
                        <?php
                        echo CHtml::link(Yii::t('language', 'แก้ไข') . Yii::t('language', 'วิธีสั่งซื้อและชำระเงิน'), CHtml::normalizeUrl(array('/webSimulation/manageShop/editHowToBuy')));
                        ?>
                    </li>
                </ul>
            </li>

        </ul><!--<ul class="linklist">-->
    </div>
</div>