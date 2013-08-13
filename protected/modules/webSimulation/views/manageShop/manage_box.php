<?php
$this->renderPartial('_side_menu', array('index' => 'shop'));
?>

<div class="content">
    <div class="tabcontents" >
        <h3 class="_100">จัดการกล่อง </h3>
        <hr>
        <div class="_100">
            <a class="addboxbtn fancybox.ajax btn" href="<?php echo CHtml::normalizeUrl(array('/webSimulation/manageShop/addBox')); ?>"> เพิ่มกล่องแสดงสินค้า </a>
            <a class="addboxbtn fancybox.ajax btn" href="web-sim-box-html.html">ใส่โค๊ด html </a>
            <a class="addboxbtn fancybox.ajax btn" href="web-sim-box-video.html">วีดีโอ/เพลง</a>
        </div>
        <hr>



        <ul class="droptrue">
            <li id="recordsArray_1"> 

                <p class="headsort">Hot Product</p>
                <p class="tool">
                    <a href="">แก้ไขสินค้า</a>
                    &nbsp;|&nbsp;
                    <a href="" onclick="return confirm('Are you sure to Delete?');">ลบ</a>
                    &nbsp;|&nbsp;
                    <a href="#">แก้ไขการแสดงผล</a>
                    &nbsp;|&nbsp;
                    <a href="#" class="hideshowbox">แสดง/ซ่อน</a>

                </p>

            </li>
            <li id="recordsArray_2">
                <p class="headsort">New Release</p>


                <p class="tool">
                    <a href="">แก้ไขสินค้า</a>
                    &nbsp;|&nbsp;
                    <a href="" onclick="return confirm('Are you sure to Delete?');">ลบ</a>
                    &nbsp;|&nbsp;
                    <a href="#">แก้ไขการแสดงผล</a>
                    &nbsp;|&nbsp;
                    <a href="#" class="hideshowbox">แสดง/ซ่อน</a>
                </p>


            </li>

            <?php
            $boxs = WebShopBox::model()->findAll();
            foreach ($boxs as $box) {
                ?>
                <li id="recordsArray_4">
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
            <?php } ?>
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