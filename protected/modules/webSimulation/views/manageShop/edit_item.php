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
            <div class="_25" id="pic_1">
                <?php
//                pic 1
                if ($model->pic_1 != NULL) {
                    echo CHtml::image($model->pic_1, '', array(
                        'style' => 'width:100px',
                    ));
                    echo CHtml::ajaxButton(Yii::t('language', 'ลบ'), CHtml::normalizeUrl(array('/webSimulation/manageShop/deletePic', 'pic' => 'pic_1', 'item_id' => $model->web_shop_item_id)), array(
                        'update' => '#pic_1',
                    ));
                } else {
                    echo $form->fileField($model, 'pic_1', array('accept' => 'imaage/*'));
                    echo $form->error($model, 'pic_1');
                }
                ?>
            </div>
            <div class="_100">
                <?php
                echo CHtml::image($model->pic_1, '', array(
                    'style' => 'width:100px',
                ));
                echo CHtml::image($model->pic_2, '', array(
                    'style' => 'width:100px',
                ));
                echo CHtml::image($model->pic_3, '', array(
                    'style' => 'width:100px',
                ));
                echo CHtml::image($model->pic_4, '', array(
                    'style' => 'width:100px',
                ));
                echo CHtml::image($model->pic_5, '', array(
                    'style' => 'width:100px',
                ));
                echo CHtml::image($model->pic_6, '', array(
                    'style' => 'width:100px',
                ));
                echo CHtml::image($model->pic_7, '', array(
                    'style' => 'width:100px',
                ));
                echo CHtml::image($model->pic_8, '', array(
                    'style' => 'width:100px',
                ));
                ?>
            </div>
        </div>

        <div class="_100 textcenter" style="margin-top: 25px;">
            <?php
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