<?php
$select1 = '';
$select2 = '';
$select3 = '';
$select4 = '';
$select5 = '';
switch ($index) {
    case 2:
        $select2 = 'selected';
        break;
    case 3:
        $select3 = 'selected';
        break;
    case 4:
        $select4 = 'selected';
        break;
    case 5:
        $select5 = 'selected';
        break;
    default:
        $select1 = 'selected';
        break;
}
?>
<div class="sidebar">
    <div class="menuitem">
        <ul>
            <li class="boxhead"><img src="<?php echo Yii::t('language', '/img/iconpage/websim.png'); ?>"/></li>
        </ul>

        <ul class="tabs clearfix">
            <li class='<?php echo $select2; ?>'>
                <a rel="view-2" href="<?php echo CHtml::normalizeUrl(array("/webSimulation/manageShop/manageShop/shop_id/" . $shop_id)); ?>">
                    <?php echo Yii::t('language', 'จัดการร้านค้า'); ?>
                </a>
            </li>
            <li class='<?php echo $select3; ?>'>
                <a rel="view-3" href="<?php echo CHtml::normalizeUrl(array("/webSimulation/manageShop/manageShopItem/shop_id/" . $shop_id)); ?>">
                    <?php echo Yii::t('language', 'จัดการสินค้าในร้าน'); ?>
                </a>
            </li>
            <li class='<?php echo $select4; ?>'>
                <a rel="view-4" href="<?php echo CHtml::normalizeUrl(array("/webSimulation/manageShop/manageShopFormat/shop_id/" . $shop_id)); ?>">
                    <?php echo Yii::t('language', 'รูปแบบร้านค้า'); ?>
                </a>
            </li>
            <li class='<?php echo $select5; ?>'>
                <a rel="view-5" href="#">
                    <?php echo Yii::t('language', 'ดูร้านค้าของคุณ'); ?>
                </a>
            </li>
            <li class='<?php echo $select1; ?>'>
                <a rel="view-1" href="<?php echo CHtml::normalizeUrl(array("/webSimulation/manageShop/manageShopList")); ?>">
                    <?php echo Yii::t('language', 'จัดการรายการร้านค้าของคุณ'); ?>
                </a>
            </li>
        </ul>
    </div>
</div>