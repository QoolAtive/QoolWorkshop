<?php
if (empty($model->id)) {
    $btnText = 'เพิ่มกลุ่มพาร์ทเนอร์';

    $link_back = '/serviceProvider/manage/typeBusiness';
} else {
    $btnText = 'แก้ไขกลุ่มพาร์ทเนอร์';

    $link_back = '/serviceProvider/manage/typeBusiness';
}
?>
<h3>  <i class="icon-plus"></i> <?php echo $btnText; ?></h3>

<hr>
<div class="_100">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'insert_type_business-form',
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
    ));
    ?>
    <div class="_100">
        <h4 class="reg"><?php echo Yii::t('language', '- กลุ่มพาร์ทเนอร์ภาษาไทย -'); ?></h4>
    </div>
    <div class="_100">
        <?php
        echo $form->label($model, 'name');
        echo $form->textfield($model, 'name');
        echo $form->error($model, 'name');
        ?>
    </div>
    <div class="_100">
        <?php
        echo $form->label($model, 'about');
        $this->widget('ext.ckeditor.CKEditorWidget', array(
            "model" => $model, # Data-Model
            "attribute" => 'about', # Attribute in the Data-Model  // textarea name=""
            "defaultValue" => $model->about, # Optional
            "config" => array(
                "resize_dir" => "vertical",
                "height" => "240px",
                "width" => "100%",
                'toolbar' => array(
                    array('Font', 'FontSize', '-', 'Bold', 'Italic', 'Underline', 'Strike', '-', 'Subscript', 'Superscript',
                        '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock',
                        '-', 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', 'Blockquote'),
                    array('TextColor', 'BGColor', '-', 'Cut', 'Copy', 'Paste', '-', 'Undo', 'Redo',
                        '-', 'Image','Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak',
                        '-', 'Source', '-', 'Link', 'Unlink', '-', 'Maximize', '-', 'About',),
                ), # EXISTING(!) Toolbar (see: ckeditor.js) Ex. "toolbar" => "Basic"
            ),
            "ckEditor" => Yii::app()->basePath . "/../js/ckeditor/ckeditor.php",
# Path to ckeditor.php
            "ckBasePath" => Yii::app()->baseUrl . "/js/ckeditor/",
        ));
        echo $form->error($model, 'about');
        ?>
    </div>
    <div class="_100">
        <h4 class="reg"><?php echo Yii::t('language', '- กลุ่มพาร์ทเนอร์ภาษาอังกฤษ -'); ?></h4>
    </div>
    <div class="_100">
        <?php
        echo $form->label($model, 'name_en');
        echo $form->textfield($model, 'name_en');
        echo $form->error($model, 'name_en');
        ?>
    </div>
    <div class="_100">
        <?php
        echo $form->label($model, 'about_en');
        $this->widget('ext.ckeditor.CKEditorWidget', array(
            "model" => $model, # Data-Model
            "attribute" => 'about_en', # Attribute in the Data-Model  // textarea name=""
            "defaultValue" => $model->about_en, # Optional
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
                        '-', 'Source', '-', 'Link', 'Unlink', '-', 'Maximize', '-', 'About',),
                ), # EXISTING(!) Toolbar (see: ckeditor.js) Ex. "toolbar" => "Basic"
            ),
            "ckEditor" => Yii::app()->basePath . "/../js/ckeditor/ckeditor.php",
# Path to ckeditor.php
            "ckBasePath" => Yii::app()->baseUrl . "/js/ckeditor/",
        ));
        echo $form->error($model, 'about_en');
        ?>
    </div>
    <div class="_100 textcenter">
        <?php
        echo CHtml::submitButton($btnText);
//        echo CHtml::button('ยกเลิก', array('onClick' => "history.go(-1)")
//        );
        echo CHtml::button(Yii::t('language', 'ย้อนกลับ'), array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                '/serviceProvider/manage/typeBusiness'
            )) . "'")
        );
        ?>
    </div>
    <?php $this->endWidget(); ?>
</div>