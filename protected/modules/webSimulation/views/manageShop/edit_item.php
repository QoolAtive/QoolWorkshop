<?php
$this->renderPartial('_side_menu', array('index' => 'item'));
?>

<div class="content">
    <div class="tabcontents">
        <h3 class="barH3">
            <span>
                <i class="icon-shopping-cart"></i>
                <a href="<?php echo CHtml::normalizeUrl(array("/webSimulation/manageShop/manageShop")); ?>">
                    <?php echo Yii::t('language', 'ร้าน ') . $model->name_th; ?>
                </a>
                <i class="icon-chevron-right"></i>
                <a href="<?php echo CHtml::normalizeUrl(array("/webSimulation/manageShop/manageShopItem")); ?>">
                    <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'สินค้าในร้าน'); ?>
                </a>
                <?php
                if ($model->web_shop_item_id) {
                    ?>
                    <i class="icon-chevron-right"></i>
                    <a href="<?php echo CHtml::normalizeUrl(array("/webSimulation/manageShop/manageItem")); ?>">
                        <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'รายการสินค้า'); ?>
                    </a>
                <?php } ?>
                <i class="icon-chevron-right"></i>
                <?php
                if ($model->web_shop_item_id == NULL) {
                    echo Yii::t('language', 'เพิ่ม');
                } else {
                    echo Yii::t('language', 'แก้ไข');
                }
                echo Yii::t('language', 'สินค้าในร้าน');
                ?>
            </span>
        </h3>

        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'item_detail-form',
            'htmlOptions' => array('enctype' => 'multipart/form-data'),
        ));
//        echo $form->errorSummary($model);
        ?>

        <div class="_50">
            <?php
            echo $form->labelEx($model, 'name_th');
            echo $form->textField($model, 'name_th', array(
                'class' => 'fieldrequire',
            ));
            echo $form->error($model, 'name_th');

            echo $form->labelEx($model, 'name_en');
            echo $form->textField($model, 'name_en', array(
                'class' => 'fieldrequire',
            ));
            echo $form->error($model, 'name_en');
            ?>
        </div>

        <div class="_50">
            <?php
            echo $form->labelEx($model, 'price_normal');
            echo $form->textField($model, 'price_normal', array(
                'class' => 'fieldrequire numberinput',
            ));
            echo $form->error($model, 'price_normal');

            echo $form->labelEx($model, 'price_special');
            echo $form->textField($model, 'price_special', array(
                'class' => 'fieldrequire numberinput',
            ));
            echo $form->error($model, 'price_special');
            ?>
        </div>

        <div class="_50">
            <?php
            echo $form->labelEx($model, 'category');
            echo $form->dropDownList($model, 'category', ShopCategory::getList(), array(
                'class' => 'fieldrequire',
                'empty' => 'เลือก',
            ));
            echo $form->error($model, 'category');
            ?>
        </div>

        <div class="_25">
            <?php
            echo $form->labelEx($model, 'item_state');
            echo $form->dropDownList($model, 'item_state', array('0' => 'สินค้าใหม่', '1' => 'สินค้ามือสอง'), array(
                'class' => 'fieldrequire',
            ));
            echo $form->error($model, 'item_state');
            ?>
        </div>

        <div class="_25">
            <?php
            echo $form->labelEx($model, 'weight');
            echo $form->textField($model, 'weight', array(
                'class' => 'fieldrequire numberinput',
            ));
            echo $form->error($model, 'weight');
            ?>
        </div>

        <div class="_100">  
            <?php
            echo $form->labelEx($model, 'description_th');
            echo $form->error($model, 'description_th');
            ?>
        </div>
        <div class="_100">
            <?php
            echo $form->textArea($model, 'description_th', array(
                'class' => 'input_text_area',
                'style' => "height: 100px;",
                'rows' => "4",
            ));
            ?>
        </div>

        <div class="_100">  
            <?php
            echo $form->labelEx($model, 'description_en');
            echo $form->error($model, 'description_en');
            ?>
        </div>
        <div class="_100">
            <?php
            echo $form->textArea($model, 'description_en', array(
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
                    <div id="pic_1">
                        <?php
                        $this->renderPartial('item_pic_', array('model' => $model, 'pic' => 'pic_1'));
                        ?>
                    </div>
                    <?php
                    echo $form->fileField($model, 'pic_1', array('accept' => 'image/*'));
                    echo $form->error($model, 'pic_1');
                    ?>
                </div>
                <div class="_25">
                    <div id="pic_2">
                        <?php
                        $this->renderPartial('item_pic_', array('model' => $model, 'pic' => 'pic_2'));
                        ?>
                    </div>
                    <?php
                    echo $form->fileField($model, 'pic_2', array('accept' => 'image/*'));
                    echo $form->error($model, 'pic_2');
                    ?>
                </div>
                <div class="_25">
                    <div id="pic_3">
                        <?php
                        $this->renderPartial('item_pic_', array('model' => $model, 'pic' => 'pic_3'));
                        ?>
                    </div>
                    <?php
                    echo $form->fileField($model, 'pic_3', array('accept' => 'image/*'));
                    echo $form->error($model, 'pic_3');
                    ?>
                </div>
                <div class="_25">
                    <div id="pic_4">
                        <?php
                        $this->renderPartial('item_pic_', array('model' => $model, 'pic' => 'pic_4'));
                        ?>
                    </div>
                    <?php
                    echo $form->fileField($model, 'pic_4', array('accept' => 'image/*'));
                    echo $form->error($model, 'pic_4');
                    ?>
                </div>
            </div>
            <div class="_100">
                <div class="_25">
                    <div id="pic_5">
                        <?php
                        $this->renderPartial('item_pic_', array('model' => $model, 'pic' => 'pic_5'));
                        ?>
                    </div>
                    <?php
                    echo $form->fileField($model, 'pic_5', array('accept' => 'image/*'));
                    echo $form->error($model, 'pic_5');
                    ?>
                </div>
                <div class="_25">
                    <div id="pic_6">
                        <?php
                        $this->renderPartial('item_pic_', array('model' => $model, 'pic' => 'pic_6'));
                        ?>
                    </div>
                    <?php
                    echo $form->fileField($model, 'pic_6', array('accept' => 'image/*'));
                    echo $form->error($model, 'pic_6');
                    ?>
                </div>
                <div class="_25">
                    <div id="pic_7">
                        <?php
                        $this->renderPartial('item_pic_', array('model' => $model, 'pic' => 'pic_7'));
                        ?>
                    </div>
                    <?php
                    echo $form->fileField($model, 'pic_7', array('accept' => 'image/*'));
                    echo $form->error($model, 'pic_7');
                    ?>
                </div>
                <div class="_25">
                    <div id="pic_8">
                        <?php
                        $this->renderPartial('item_pic_', array('model' => $model, 'pic' => 'pic_8'));
                        ?>
                    </div>
                    <?php
                    echo $form->fileField($model, 'pic_8', array('accept' => 'image/*'));
                    echo $form->error($model, 'pic_8');
                    ?>
                </div>
            </div>
        </div>

        <div class="_100 textcenter" style="margin-top: 25px;">
            <?php
            echo $form->hiddenField($model, 'pic_1');
            echo $form->hiddenField($model, 'pic_2');
            echo $form->hiddenField($model, 'pic_3');
            echo $form->hiddenField($model, 'pic_4');
            echo $form->hiddenField($model, 'pic_5');
            echo $form->hiddenField($model, 'pic_6');
            echo $form->hiddenField($model, 'pic_7');
            echo $form->hiddenField($model, 'pic_8');
            echo CHtml::submitButton(Yii::t('language', 'บันทึก'), array(
                'class' => "purple",
            ));
//            if ($model->web_shop_item_id == NULL) {
//                echo CHtml::button(Yii::t('language', 'ยกเลิก'), array(
//                    'onclick' => 'window.location = "' . CHtml::normalizeUrl(array("/webSimulation/manageShop/manageShopItem")) . '"'));
//            } else {
            echo CHtml::button(Yii::t('language', 'ยกเลิก'), array(
                'onclick' => 'window.location = "' . CHtml::normalizeUrl(array("/webSimulation/manageShop/manageItem/")) . '"'));
//            }
            ?>
        </div>
        <?php $this->endWidget(); ?>
    </div>
</div>