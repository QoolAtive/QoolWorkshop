<?php
$this->renderPartial('_side_menu', array('index' => 'shop'));
?>
<style>
    .item_pic img{
        height: 124px;
        width: 124px;}
    </style>

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
                <a href="<?php echo CHtml::normalizeUrl(array("/webSimulation/manageShop/manageShop")); ?>">
                    <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'ร้านค้า'); ?>
                </a>
                <i class="icon-chevron-right"></i>
                <a href="<?php echo CHtml::normalizeUrl(array("/webSimulation/manageShop/manageBox")); ?>">
                    <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'กล่องแสดงสินค้า'); ?>
                </a>
                <i class="icon-chevron-right"></i>
                <?php
                if ($item->web_shop_item_id == NULL) {
                    echo Yii::t('language', 'เพิ่ม');
                } else {
                    echo Yii::t('language', 'แก้ไข');
                }
                echo Yii::t('language', 'สินค้า');
                ?>
            </span>
        </h3>

        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'item_detail-form',
            'htmlOptions' => array('enctype' => 'multipart/form-data'),
        ));
//        echo $form->errorSummary($item);
        ?>

        <div class="_50">
            <?php
            echo $form->labelEx($item, 'name_th');
            echo $form->textField($item, 'name_th', array(
                'class' => 'fieldrequire',
            ));
            echo $form->error($item, 'name_th');

            echo $form->labelEx($item, 'name_en');
            echo $form->textField($item, 'name_en', array(
                'class' => 'fieldrequire',
            ));
            echo $form->error($item, 'name_en');
            ?>
        </div>

        <div class="_50">
            <?php
            echo $form->labelEx($item, 'price_normal');
            echo $form->textField($item, 'price_normal', array(
                'class' => 'fieldrequire numberinput',
            ));
            echo $form->error($item, 'price_normal');

            echo $form->labelEx($item, 'price_special');
            echo $form->textField($item, 'price_special', array(
                'class' => 'fieldrequire numberinput',
            ));
            echo $form->error($item, 'price_special');
            ?>
        </div>

        <div class="_50">
            <?php
            echo $form->labelEx($item, 'category');
            echo $form->dropDownList($item, 'category', ShopCategory::getList(), array(
                'class' => 'fieldrequire',
                'empty' => 'เลือก',
            ));
            echo $form->error($item, 'category');
            ?>
        </div>

        <div class="_25">
            <?php
            echo $form->labelEx($item, 'item_state');
            echo $form->dropDownList($item, 'item_state', array('0' => 'สินค้าใหม่', '1' => 'สินค้ามือสอง'), array(
                'class' => 'fieldrequire',
            ));
            echo $form->error($item, 'item_state');
            ?>
        </div>

        <div class="_25">
            <?php
            echo $form->labelEx($item, 'weight');
            echo $form->textField($item, 'weight', array(
                'class' => 'fieldrequire numberinput',
            ));
            echo $form->error($item, 'weight');
            ?>
        </div>

        <div class="_100">  
            <?php
            echo $form->labelEx($item, 'description_th');
            echo $form->error($item, 'description_th');
            ?>
        </div>
        <div class="_100">
            <?php
            echo $form->textArea($item, 'description_th', array(
                'class' => 'input_text_area',
                'style' => "height: 100px;",
                'rows' => "4",
            ));
            ?>
        </div>

        <div class="_100">  
            <?php
            echo $form->labelEx($item, 'description_en');
            echo $form->error($item, 'description_en');
            ?>
        </div>
        <div class="_100">
            <?php
            echo $form->textArea($item, 'description_en', array(
                'class' => 'input_text_area',
                'style' => "height: 100px;",
                'rows' => "4",
            ));
            ?>
        </div>

        <div class="_100">
            <h4>รูปภาพ</h4>
            <div class="_100">
                <div class="_25">
                    <div class="item_pic" id="pic_1">
                        <?php
                        $this->renderPartial('item_pic_', array('item' => $item, 'pic' => 'pic_1'));
                        ?>
                    </div>
                    <?php
                    echo $form->fileField($item, 'pic_1', array('accept' => 'image/*'));
                    echo $form->error($item, 'pic_1');
                    ?>
                </div>
                <div class="_25">
                    <div class="item_pic" id="pic_2">
                        <?php
                        $this->renderPartial('item_pic_', array('item' => $item, 'pic' => 'pic_2'));
                        ?>
                    </div>
                    <?php
                    echo $form->fileField($item, 'pic_2', array('accept' => 'image/*'));
                    echo $form->error($item, 'pic_2');
                    ?>
                </div>
                <div class="_25">
                    <div class="item_pic" id="pic_3">
                        <?php
                        $this->renderPartial('item_pic_', array('item' => $item, 'pic' => 'pic_3'));
                        ?>
                    </div>
                    <?php
                    echo $form->fileField($item, 'pic_3', array('accept' => 'image/*'));
                    echo $form->error($item, 'pic_3');
                    ?>
                </div>
                <div class="_25">
                    <div class="item_pic" id="pic_4">
                        <?php
                        $this->renderPartial('item_pic_', array('item' => $item, 'pic' => 'pic_4'));
                        ?>
                    </div>
                    <?php
                    echo $form->fileField($item, 'pic_4', array('accept' => 'image/*'));
                    echo $form->error($item, 'pic_4');
                    ?>
                </div>
            </div>
            <div class="_100">
                <div class="_25">
                    <div class="item_pic" id="pic_5">
                        <?php
                        $this->renderPartial('item_pic_', array('item' => $item, 'pic' => 'pic_5'));
                        ?>
                    </div>
                    <?php
                    echo $form->fileField($item, 'pic_5', array('accept' => 'image/*'));
                    echo $form->error($item, 'pic_5');
                    ?>
                </div>
                <div class="_25">
                    <div class="item_pic" id="pic_6">
                        <?php
                        $this->renderPartial('item_pic_', array('item' => $item, 'pic' => 'pic_6'));
                        ?>
                    </div>
                    <?php
                    echo $form->fileField($item, 'pic_6', array('accept' => 'image/*'));
                    echo $form->error($item, 'pic_6');
                    ?>
                </div>
                <div class="_25">
                    <div class="item_pic" id="pic_7">
                        <?php
                        $this->renderPartial('item_pic_', array('item' => $item, 'pic' => 'pic_7'));
                        ?>
                    </div>
                    <?php
                    echo $form->fileField($item, 'pic_7', array('accept' => 'image/*'));
                    echo $form->error($item, 'pic_7');
                    ?>
                </div>
                <div class="_25">
                    <div class="item_pic" id="pic_8">
                        <?php
                        $this->renderPartial('item_pic_', array('item' => $item, 'pic' => 'pic_8'));
                        ?>
                    </div>
                    <?php
                    echo $form->fileField($item, 'pic_8', array('accept' => 'image/*'));
                    echo $form->error($item, 'pic_8');
                    ?>
                </div>
            </div>
        </div>

        <div class="_100 textcenter" style="margin-top: 25px;">
            <?php
            echo $form->hiddenField($item, 'pic_1');
            echo $form->hiddenField($item, 'pic_2');
            echo $form->hiddenField($item, 'pic_3');
            echo $form->hiddenField($item, 'pic_4');
            echo $form->hiddenField($item, 'pic_5');
            echo $form->hiddenField($item, 'pic_6');
            echo $form->hiddenField($item, 'pic_7');
            echo $form->hiddenField($item, 'pic_8');
            echo CHtml::submitButton(Yii::t('language', 'บันทึก'), array(
                'class' => "purple",
            ));
//            if ($item->web_shop_item_id == NULL) {
//                echo CHtml::button(Yii::t('language', 'ยกเลิก'), array(
//                    'onclick' => 'window.location = "' . CHtml::normalizeUrl(array("/webSimulation/manageShop/manageShopItem")) . '"'));
//            } else {
            echo CHtml::button(Yii::t('language', 'ยกเลิก'), array(
                'onclick' => 'window.location = "' . CHtml::normalizeUrl(array("/webSimulation/manageShop/editBox", 'box_id' => $box_id)) . '"'));
//            }
            ?>
        </div>
        <?php $this->endWidget(); ?>
    </div>
</div>