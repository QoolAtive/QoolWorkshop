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
                        <a href="<?php echo CHtml::normalizeUrl(array('/webSimulation/manageShop/manageBox')); ?>">
                            <i class="icon-inbox"></i>
                            <?php
                            echo Yii::t('language', 'จัดการ') . Yii::t('language', 'กล่องแสดงสินค้า');
                            ?>
                        </a>
                    </li>
                </ul>
            </li>

            <!--รายการสั่งซื้อ-->
            <li>
                <ul class="innerlogo">
                    <li>
                        <a href="<?php echo CHtml::normalizeUrl(array('/webSimulation/manageShop/order')); ?>">
                            <i class="icon-list"></i>
                            <?php
                            echo Yii::t('language', 'รายการ') . Yii::t('language', 'สั่งซื้อ');
                            ?>
                        </a>
                    </li>
                </ul>
            </li>

            <!--แก้ไขรายละเอียดร้านค้า-->
            <li>
                <ul class="innerlogo">
                    <li>
                        <a href="<?php echo CHtml::normalizeUrl(array('/webSimulation/manageShop/register')); ?>">
                            <i class="icon-edit"></i>
                            <?php
                            echo Yii::t('language', 'แก้ไข') . Yii::t('language', 'รายละเอียด');
                            ?>
                        </a>
                    </li>
                </ul>
            </li>

            <!--แก้ไขรูปแบบร้านค้า-->
            <li>
                <ul class="innerlogo">
                    <li>
                        <a href="<?php echo CHtml::normalizeUrl(array('/webSimulation/manageShop/manageShopFormat')); ?>">
                            <i class="icon-desktop"></i>
                            <?php
                            echo Yii::t('language', 'จัดการ') . Yii::t('language', 'รูปแบบ') . Yii::t('language', 'ร้านค้า');
                            ?>
                        </a>
                    </li>
                </ul>
            </li>

            <!--แก้ไขวิธีสั่งซื้อและชำระเงิน-->
            <li>
                <ul class="innerlogo">
                    <li>
                        <a href="<?php echo CHtml::normalizeUrl(array('/webSimulation/manageShop/editHowToBuy')); ?>">
                            <i class="icon-usd"></i>
                            <?php
                            echo Yii::t('language', 'แก้ไข') . Yii::t('language', 'วิธีสั่งซื้อและชำระเงิน');
                            ?>
                        </a>
                    </li>
                </ul>
            </li>

        </ul><!--<ul class="linklist">-->
    </div>
</div>