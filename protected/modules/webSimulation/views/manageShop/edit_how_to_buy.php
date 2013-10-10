<?php
$this->renderPartial('_side_menu', array('index' => 'shop'));
?>
<div class="content">
    <div class="tabcontents">
        <h3 class="barH3">
            <span>
                <i class="icon-shopping-cart"></i>
                <a href="<?php echo CHtml::normalizeUrl(array("/webSimulation/manageShop/manageShop")); ?>">
                    <?php
                    $shop = WebShop::model()->findByPk($shop_id);
                    echo Yii::t('language', 'ร้าน :n', array(':n' => $shop->name_th)); ?>
                </a>
                <i class="icon-chevron-right"></i>
                <a href="<?php echo CHtml::normalizeUrl(array("/webSimulation/manageShop/manageShop")); ?>">
                    <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'ร้านค้า'); ?>
                </a>
                <i class="icon-chevron-right"></i>
                <?php echo Yii::t('language', 'แก้ไข') . Yii::t('language', 'วิธีสั่งซื้อและชำระเงิน'); ?>
            </span>
        </h3>

<!--        <h3>
            <?php echo Yii::t('language', 'แก้ไข') . Yii::t('language', 'วิธีสั่งซื้อและชำระเงิน'); ?>
        </h3>-->
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'pay-form',
        ));

//        echo $form->errorSummary($model);
        ?>
        <div class="_100">
            <p>
            <?php
            echo $form->checkBox($model, 'pay_transfer');
            echo ' ';
            echo Yii::t('language', 'โอนเงิน');
            ?>
            </p>
            <div class="_100">
                <?php
                echo $form->labelEx($model, 'account_bank');
                echo $form->textField($model, 'account_bank', array(
                    'class' => 'fieldrequire right'
                ));
                ?>
            </div>
            <div class="_50">
                <?php
                echo $form->labelEx($model, 'account_name');
                echo $form->textField($model, 'account_name', array(
                    'class' => 'fieldrequire right'
                ));
                ?>
            </div>
            <div class="_50">
                <?php
                echo $form->labelEx($model, 'account_number');
                echo $form->textField($model, 'account_number', array(
                    'class' => 'fieldrequire right'
                ));
                ?>
            </div>
        </div>
        
        <div class="_100">
            <?php
            echo $form->checkBox($model, 'pay_ems');
            echo ' ';
            echo Yii::t('language', 'ส่งพัสดุเก็บเงินปลายทาง');
            ?>
        </div>

        <div class="_100">
            <p>
                <?php
                echo $form->checkBox($model, 'pay_byself');
                echo ' ';
                echo Yii::t('language', 'รับสินค้าและชำระเงินด้วยตนเอง');
                ?>
            </p>
            <div class="_20">
                <?php
                echo Yii::t('language', 'ระบุสถานที่นัดพบ');
                ?>
            </div>
            <div class="_80">
                <?php
                echo $form->textField($model, 'location', array(
                    'class' => 'fieldrequire right'
                ));
                ?>
            </div>
            <div class="_20">
                <?php
                echo Yii::t('language', 'เบอร์โทรติดต่อ');
                ?>
            </div>
            <div class="_80">
                <?php
                echo $form->textField($model, 'tel', array(
                    'class' => 'fieldrequire right'
                ));
                ?>
            </div>
        </div>

        <div class="_100">
            <?php
            echo $form->checkBox($model, 'pay_other');
            echo ' ';
            echo $form->labelEx($model, 'other');
            $this->widget('ext.ckeditor.CKEditorWidget', array(
                "model" => $model, # Data-Model
                "attribute" => 'other', # Attribute in the Data-Model
                "defaultValue" => $model->other, # Optional
                "config" => array(
                    "height" => "500px",
                    "width" => "100%",
                    'toolbar' => array(
                        array('Font', 'FontSize', '-', 'Bold', 'Italic', 'Underline', 'Strike', '-', 'Subscript', 'Superscript',
                            '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock',
                            '-', 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', 'Blockquote'),
                        array('TextColor', 'BGColor', '-', 'Cut', 'Copy', 'Paste', '-', 'Undo', 'Redo',
                            '-', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak',
                            '-', 'Source', '-', 'Link', 'Unlink', '-', 'Maximize', '-', 'About'),
                    ), # EXISTING(!) Toolbar (see: ckeditor.js) Ex. "toolbar" => "Basic"
                ),
                "ckEditor" => Yii::app()->basePath . "/../js/ckeditor/ckeditor.php",
                # Path to ckeditor.php
                "ckBasePath" => Yii::app()->baseUrl . "/js/ckeditor/",
            ));
            ?>
        </div>
        <div class="_100 txt-cen">
            <hr>
            <?php
            echo CHtml::submitButton(Yii::t('language', 'บันทึก'));
            echo CHtml::button(Yii::t('language', 'ยกเลิก'), array(
                'onclick' => 'window.location = "' . CHtml::normalizeUrl(array("/webSimulation/manageShop/manageShop")) . '"'));
            ?>
            <hr>
        </div>
        <?php $this->endWidget(); ?>
    </div>
</div>