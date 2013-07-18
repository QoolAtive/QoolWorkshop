
<div id="text" class="row-fluid ">
    <h3>แก้ไขข้อความ About Us</h3>
    <?php
    $model = About::model()->find();
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'insert-form',
    ));

    echo $form->errorSummary($model);
    ?>
    <div>
        <?php
        //ภาษาไทย
        echo Yii::t('language', $form->labelEx($model, 'about_text_th'));
        $this->widget('ext.ckeditor.CKEditorWidget', array(
            "model" => $model, # Data-Model
            "attribute" => 'about_text_th', # Attribute in the Data-Model
            "defaultValue" => $model->about_text_th, # Optional
            "config" => array(
                "height" => "500px",
                "width" => "800",
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
    <div>
        <?php
        //ภาษาอังกฤษ
        echo Yii::t('language', $form->labelEx($model, 'about_text_en'));
        $this->widget('ext.ckeditor.CKEditorWidget', array(
            "model" => $model, # Data-Model
            "attribute" => 'about_text_en', # Attribute in the Data-Model
            "defaultValue" => $model->about_text_en, # Optional
            "config" => array(
                "height" => "500px",
                "width" => "800",
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
    <?php
    echo CHtml::submitButton(Yii::t('language', 'บันทึก'));
    echo CHtml::button(Yii::t('language', 'ยกเลิก'), array(
        'onclick' => 'window.location = "' . CHtml::normalizeUrl(array("/about/default/index")) . '"'));
    ?>
    <?php $this->endWidget(); ?>
</div>