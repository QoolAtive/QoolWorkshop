<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'learning-form',
    'enableAjaxValidation' => false,
    'htmlOptions' => array(
        'enctype' => 'multipart/form-data'
    ),
        )
);
?>
<div>
    <h3>เพิ่มบทเรียน</h3>
    <div class="_100">
        <?php
        echo $form->labelEx($model, 'subject');
        echo $form->dropDownList($model, 'subject', LearningGroup::model()->getListData(), array('empty' => Yii::t('language', 'เลือก')));
        echo $form->error($model, 'subject');
        ?>
    </div>
    <div class="_100">
        <?php
        echo $form->labelEx($model, 'subject');
        echo $form->textField($model, 'subject');
        echo $form->error($model, 'subject');
        ?>
    </div>
    <div class="_100">
        <?php
        echo $form->label($model, 'detail');
        $this->widget('ext.ckeditor.CKEditorWidget', array(
            "model" => $model, # Data-Model
            "attribute" => 'detail', # Attribute in the Data-Model  // textarea name=""
            "defaultValue" => $model->detail, # Optional
            "config" => array(
                "resize_dir" => "vertical",
                "height" => "240px",
                "width" => "100%",
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
        echo $form->error($model, 'detail');
        ?>
    </div>
    <div class="_100" style="text-align: center;">
        <?php
        echo CHtml::submitButton(Yii::t('language', 'เพิ่มบทเรียน'));
        echo CHtml::button(Yii::t('language', 'ย้อนกลับ'), array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                '/learning/manage/learning'
            )) . "'")
        );
        ?>
    </div>
</div>
<?php
$this->endWidget();
?>
