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
        
        <!--เพิ่มสินค้าในร้าน-->
<!--        <div>
            <?php
            echo CHtml::link(Yii::t('language', 'เพิ่มสินค้าในร้าน'), CHtml::normalizeUrl(array('/webSimulation/manageShop/editItem')));
            ?>
        </div>-->
        
        <!--สินค้าทั้งหมดในร้าน-->
        <div>
            <?php
            echo CHtml::link(Yii::t('language', 'จัดการรายการสินค้า'), CHtml::normalizeUrl(array('/webSimulation/manageShop/manageItem')));
            ?>
        </div>
        
        <!--หมวดหมู่สินค้า-->
        <div>
            <?php
            echo CHtml::link(Yii::t('language', 'หมวดหมู่สินค้า'), CHtml::normalizeUrl(array('/webSimulation/manageShop/manageItemCategory')));
            ?>
        </div>
    </div>
</div>