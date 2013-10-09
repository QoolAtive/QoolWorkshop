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
                    $shop_name = WebShop::model()->findByPk($model->web_shop_id)->name_th;
                    echo Yii::t('language', 'ร้าน :n', array(':n' => $shop_name));
                    ?>
                </a>
                <i class="icon-chevron-right"></i>
                <a href="<?php echo CHtml::normalizeUrl(array("/webSimulation/manageShop/manageShopItem")); ?>">
                    <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'สินค้าในร้าน'); ?>
                </a>
                <i class="icon-chevron-right"></i>
                <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'รายการสินค้า'); ?>
                <i class="icon-chevron-right"></i>
                <?php echo Yii::t('language', 'แก้ไข') . Yii::t('language', 'ค่าขนส่งสินค้า'); ?>
            </span>
        </h3>

        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'edit-form',
            'focus' => array($model, 'tran_cost')
        ));
//        echo $form->errorSummary($model);
        ?>
        <div class="_100">
            <div class="_50">
                <?php
                echo $form->labelEx($model, 'tran_cost');
                echo $form->textField($model, 'tran_cost', array(
                    'class' => 'fieldrequire',
//    'style' => 'width: 98%; margin-bottom: 10px;',
                ));
                echo $form->error($model, 'tran_cost');
                ?>
            </div>
        </div>

        <div class="_100 textcenter" style="margin-top: 25px;">
            <hr>
            <?php
            echo CHtml::submitButton(Yii::t('language', 'บันทึก'));
            echo CHtml::button(Yii::t('language', 'ยกเลิก'), array(
                'onclick' => 'window.location = "' . CHtml::normalizeUrl(array("/webSimulation/manageShop/manageItem")) . '"'));
            ?>
            <hr>
        </div>
    </div>
</div>
<!--<input type="submit" value="เพิ่มกล่อง">-->
<!--<input type="button" onclick="javascript:parent.jQuery.fancybox.close();" value="ยกเลิก">-->

<?php $this->endWidget(); ?>
