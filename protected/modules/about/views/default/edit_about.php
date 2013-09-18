<?php
$this->renderPartial('_menu', array('select' => 4));
?>
<div class="content">

    <div id="text" class="row-fluid tabcontents">
        <h3 class="barH3">        
            <span>
                <i class="icon-home"></i>
                <a href="<?php echo CHtml::normalizeUrl(array("/about/default/index/view/1")); ?>">
                    <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'เกี่ยวกับเรา'); ?>
                </a>
                <i class="icon-chevron-right"></i>
                <?php echo Yii::t('language', 'แก้ไข') . Yii::t('language', 'เกี่ยวกับเรา'); ?>
            </span>
        </h3>
        <?php
        $model = About::model()->find();
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'insert-form',
        ));

        echo $form->errorSummary($model);
        ?>
        <div class="_100">
            <?php
            //ภาษาไทย
            echo $form->labelEx($model, 'about_text_th');
            $this->widget('ext.ckeditor.CKEditorWidget', array(
                "model" => $model, # Data-Model
                "attribute" => 'about_text_th', # Attribute in the Data-Model
                "defaultValue" => $model->about_text_th, # Optional
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
        <div class="_100">
            <?php
            //ภาษาอังกฤษ
            echo $form->labelEx($model, 'about_text_en');
            $this->widget('ext.ckeditor.CKEditorWidget', array(
                "model" => $model, # Data-Model
                "attribute" => 'about_text_en', # Attribute in the Data-Model
                "defaultValue" => $model->about_text_en, # Optional
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
        <div class="txt-cen">
            <hr>
            <?php
            echo CHtml::submitButton(Yii::t('language', 'บันทึก'));
            echo CHtml::button(Yii::t('language', 'ยกเลิก'), array(
                'onclick' => 'window.location = "' . CHtml::normalizeUrl(array("/about/default/index/view/1")) . '"'));
            ?>
            <hr>
        </div>
        <?php $this->endWidget(); ?>
    </div>
</div>
