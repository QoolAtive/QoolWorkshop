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
                    echo Yii::t('language', 'ร้าน :n', array(':n' => $shop_name));
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
                <?php echo Yii::t('language', 'โค้ด HTML'); ?>
            </span>
        </h3>

        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'add_html-form',
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
//                    'placeholder' => Yii::t('language', 'ชื่อกล่องภาษาไทย'),
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
//                    'placeholder' => Yii::t('language', 'ชื่อกล่องภาษาอังกฤษ'),
                ));
                echo $form->error($model, 'name_en');
                ?>
            </div>
            <div class="_100">
                <?php
                echo Yii::t('language', 'HTML');
                $this->widget('ext.ckeditor.CKEditorWidget', array(
                    "model" => $model, # Data-Model
                    "attribute" => 'code', # Attribute in the Data-Model
                    "defaultValue" => $model->code, # Optional
                    "config" => array(
                        "height" => "240px",
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

//echo $form->textArea($model, 'code', array(
//    'class' => 'fieldrequire',
//    'style' => 'margin-bottom: 10px; height: 150px;',
//    'placeholder' => 'HTML'
//));
                echo $form->error($model, 'code');
                ?>
            </div>
        </div>
        <div class="_100 textcenter" style="margin-top: 5px;">
            <hr>
            <?php
            echo CHtml::submitButton(Yii::t('language', 'บันทึก'));
            echo CHtml::button(Yii::t('language', 'ยกเลิก'), array(
                'onclick' => 'window.location = "' . CHtml::normalizeUrl(array("/webSimulation/manageShop/manageBox")) . '"'));
            ?>
            <hr>
        </div>
        <?php $this->endWidget(); ?>
    </div>
</div>