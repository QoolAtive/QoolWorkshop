<div class="sidebar">
    <div class="menuitem">
        <ul>
            <li class="boxhead"><img src="<?php echo Yii::t('language', '/img/iconpage/websim.png'); ?>"/></li>
        </ul>

        <ul class="tabs clearfix">
            <li><a rel="view-1" href="<?php echo CHtml::normalizeUrl(array("/webSimulation/manageShop/manageShop/shop_id/" . $shop_id));?>">
                    <?php echo Yii::t('language', 'จัดการร้านค้า'); ?>
                </a></li>
            <li><a rel="view-3" href="web-sim-theme.html">
                    <?php echo Yii::t('language', 'จัดการสินค้าในร้าน'); ?>
                </a></li>
            <li><a rel="view-4" href="web-sim-logobg.html">
                    <?php echo Yii::t('language', 'รูปแบบร้านค้า'); ?>
                </a></li>
            <li><a rel="view-2" href="#">
                    <?php echo Yii::t('language', 'ดูร้านค้าของคุณ'); ?>
                </a></li>
        </ul>
    </div>
</div>