<?php
$this->renderPartial('_side_menu', array('index' => 'shop'));
?>

<div class="content">
    <div class="tabcontents" >
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
                <a href="<?php echo CHtml::normalizeUrl(array("/webSimulation/manageShop/manageShop")); ?>">
                    <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'ร้านค้า'); ?>
                </a>
                <i class="icon-chevron-right"></i>
                <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'กล่องแสดงสินค้า'); ?>
            </span>
        </h3>
        
        <div class="_100">
            <a class="addboxbtn fancybox.ajax btn" href="<?php echo CHtml::normalizeUrl(array('/webSimulation/manageShop/addBox')); ?>"> เพิ่มกล่องแสดงสินค้า </a>
            <a class="addboxbtn fancybox.ajax btn" href="<?php echo CHtml::normalizeUrl(array('/webSimulation/manageShop/addHtml')); ?>">ใส่โค๊ด html </a>
            <a class="addboxbtn fancybox.ajax btn" href="<?php echo CHtml::normalizeUrl(array('/webSimulation/manageShop/addVideo')); ?>">วีดีโอ/เพลง</a>
            <a href="<?php echo CHtml::normalizeUrl(array('/webSimulation/manageShop/sortBox')); ?>">จัดลำดับกล่อง</a>
        </div>
        <hr>

        <ul class="droptrue">
            <?php
            $boxs = WebShopBox::model()->findAll();
            $i = 1;
            foreach ($boxs as $box) {
                ?>
                <li id="recordsArray_<?php echo $i; ?>">
                    <p class="headsort"><?php echo $box['name_th']; ?></p>
                    <p class="tool">
                        <a href="">แก้ไขสินค้า</a>
                        &nbsp;|&nbsp;
                        <a href="<?php echo CHtml::normalizeUrl(array('/webSimulation/manageShop/deleteBox', 'box_id' => $box['web_shop_box_id'])); ?>"
                           onclick="return confirm('<?php echo Yii::t('language', 'คุณต้องการลบข้อมูลนี้หรือไม่?'); ?>');" >ลบ</a>
                        &nbsp;|&nbsp;
                        <a href="#">แก้ไขการแสดงผล</a>
                        &nbsp;|&nbsp;
                        <a href="#" class="hideshowbox">แสดง/ซ่อน</a>

                    </p>
                </li>
            <?php 
            $i += 1;
            } ?>
        </ul>   




        <ul class="droptrue" style="padding-top:14px;float: right; width:34%; padding: 10px; background: #eee;">
            <li>
                Calendar 

                <p class="tool">

                    <a href="#" class="hideshowbox">แสดง/ซ่อน</a>
                </p>
            </li>

            <li> อัตราแลกเปลี่ยน 

                <p class="tool">

                    <a href="#" class="hideshowbox">แสดง/ซ่อน</a>
                </p>
            </li>
        </ul>
    </div>
</div>