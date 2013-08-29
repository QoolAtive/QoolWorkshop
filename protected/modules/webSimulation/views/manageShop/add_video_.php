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
                <a href="<?php echo CHtml::normalizeUrl(array("/webSimulation/manageShop/manageBox")); ?>">
                    <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'กล่องแสดงสินค้า'); ?>
                </a>
                <i class="icon-chevron-right"></i>
                <?php echo Yii::t('language', 'ลิ้งก์') . Yii::t('language', 'เพลงหรือวีดีโอ'); ?>
            </span>
        </h3>

        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'add_video-form',
            'focus' => array($model, 'name_th')
        ));
//        echo $form->errorSummary($model);
        ?>
        <div class="_100">
            <div class="_50">
                <?php
                echo $form->labelEx($model, 'name_th');
                echo $form->textField($model, 'name_th', array(
                    'class' => 'fieldrequire',
//    'style' => 'width: 98%; margin-bottom: 10px;',
                    'placeholder' => 'ชื่อกล่อง'
                ));
                echo $form->error($model, 'name_th');
                ?>
            </div>
            <div class="_50">
                <?php
                echo $form->labelEx($model, 'name_en');
                echo $form->textField($model, 'name_en', array(
                    'class' => 'fieldrequire',
//    'style' => 'width: 98%; margin-bottom: 10px;',
                    'placeholder' => 'ชื่อกล่อง'
                ));
                echo $form->error($model, 'name_en');
                ?>
            </div>
            <div class="_100">
                <p style="color: #aaa;">เช่น http://www.youtube.com/watch?v=0_45dIu0MD0 </p>
                <?php
                echo $form->textField($model, 'code', array(
                    'class' => 'fieldrequire',
                    'style' => '',
                ));
                echo $form->error($model, 'code');
                ?>
            </div>
        </div>
        <div class="_100 textcenter" style="margin-top: 25px;">
            <?php
            echo CHtml::submitButton(Yii::t('language', 'บันทึก'));
            echo CHtml::button(Yii::t('language', 'ยกเลิก'), array(
                'onclick' => 'window.location = "' . CHtml::normalizeUrl(array("/webSimulation/manageShop/manageBox")) . '"'));
            ?>
        </div>
            <!--<input type="submit" value="บันทึก" name="yt0">
            <input type="button" onclick="javascript:parent.jQuery.fancybox.close();" value="ยกเลิก">-->

        <?php $this->endWidget(); ?>
    </div>
</div>
