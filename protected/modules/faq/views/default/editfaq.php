

<div class="content">
<h3>Manage FAQ</h3>
<?php

//echo '<pre>';
//print_r($model->attributes);
//echo '</pre>';
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'update-form',
        ));
echo $form->errorSummary($model);
?>
<?php

echo Yii::t('language', $form->labelEx($model, 'subject'));
echo $form->textField($model, 'subject');

//echo Yii::t('language', $form->labelEx($model, 'detail'));
//echo $form->textArea($model, 'detail', array('rows' => '10'));

$this->widget('ext.ckeditor.CKEditorWidget', array(
    "model" => $model, # Data-Model
    "attribute" => 'detail', # Attribute in the Data-Model
    "defaultValue" => $model->detail, # Optional
    "config" => array(
        "resize_dir" => "vertical",
        "height" => "400px",
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

echo CHtml::hiddenField('fm_id', $model->fm_id);
echo CHtml::submitButton(Yii::t('language', 'บันทึก'));
//echo CHtml::button(Yii::t('language', 'ยกเลิก'), array('onclick' => '$("#edit' . $model->fm_id . '").hide().html(data).fadeOut();'));
echo CHtml::button(Yii::t('language', 'ยกเลิก'), array(
    'onclick' => 'window.location = "' . CHtml::normalizeUrl(array("/faq/default/manageFaq")) . '"'));
?>
<?php $this->endWidget(); ?>
</div>