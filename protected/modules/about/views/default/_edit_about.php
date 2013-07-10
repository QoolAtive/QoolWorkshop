
<div id="text" class="row-fluid ">
    <?php
    $model = About::model()->find();
//    echo '<pre>';
//    print_r($model->attributes);
//    echo '</pre>';
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'insert-form',
            ));

//    echo $form->label($model, 'about_text_th');
    $this->widget('ext.ckeditor.CKEditorWidget', array(
        "model" => $model, # Data-Model
        "attribute" => 'about_text_th', # Attribute in the Data-Model
        "defaultValue" => $model->about_text_th, # Optional
        "config" => array(
            "resize_dir" => "vertical",
            "height" => "750px",
            "width" => "750",
            'toolbar' => array(
                array('Font', 'FontSize', '-', 'Bold', 'Italic', 'Underline', 'Strike', '-', 'Subscript', 'Superscript',
                    '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock',
                    '-', 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', 'Blockquote'),
                array('TextColor', 'BGColor', '-', 'Cut', 'Copy', 'Paste', '-', 'Undo', 'Redo',
                    '-', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak',
                    '-', 'Source', '-', 'About'),
            ), # EXISTING(!) Toolbar (see: ckeditor.js) Ex. "toolbar" => "Basic"
        ),
        "ckEditor" => Yii::app()->basePath . "/../js/ckeditor/ckeditor.php",
        # Path to ckeditor.php
        "ckBasePath" => Yii::app()->baseUrl . "/js/ckeditor/",
    ));
    echo $form->error($model, 'about_text_th');
    echo CHtml::submitButton(Yii::t('language', 'บันทึก'));
    echo CHtml::button(Yii::t('language', 'ยกเลิก'), array(
        'onclick' => 'window.location = "'.CHtml::normalizeUrl(array("/about/default/index")).'"'));
    ?>
    <?php $this->endWidget(); ?>
</div>