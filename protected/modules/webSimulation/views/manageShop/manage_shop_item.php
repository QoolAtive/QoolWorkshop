<style>
    a [class^="icon-"], a [class*=" icon-"] {
        display: block;
    }
</style>
<?php
$this->renderPartial('_side_menu', array('index' => 'item'));
?>

<div class="content">
    <div class="tabcontents">
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
                <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'สินค้าในร้าน'); ?>
            </span>
        </h3>

        <ul class="websimboxlist">

            <!--สินค้าทั้งหมดในร้าน-->
            <li>
                <ul class="innerlogo">
                    <li>
                        <a href="<?php echo CHtml::normalizeUrl(array('/webSimulation/manageShop/manageItem')); ?>">
                        <i class="icon-gift"></i> 
                        <?php
                        echo Yii::t('language', 'จัดการรายการสินค้า');
                        ?>
                        </a>
                    </li>
                </ul>
            </li>

            <!--หมวดหมู่สินค้า-->
            <li>
                <ul class="innerlogo">
                    <li>
                        <a href="<?php echo CHtml::normalizeUrl(array('/webSimulation/manageShop/manageCategory')); ?>">
                        <i class="icon-tag"></i> 
                        <?php
                        echo Yii::t('language', 'หมวดหมู่สินค้า');
                        ?>
                        </a>
                    </li>
                </ul>
            </li>
            
        </ul>        <!--<ul class="linklist">-->
    </div>
</div>