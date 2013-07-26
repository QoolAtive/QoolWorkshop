<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'learning-form',
    'enableAjaxValidation' => false,
    'htmlOptions' => array(
        'enctype' => 'multipart/form-data'
    ),
        )
);
if ($model->id == null) {
    $text = Yii::t('language', 'บันทึก');
} else {
    $text = Yii::t('language', 'บันทึก');
}
?>
<?php
$this->renderPartial('_side_bar', array(
    'select2' => 'selected',
    'select1' => '',
));
?>
<div class="content">
    <div class="tabcontents">
        <h3><?php echo Yii::t('language', 'เพิ่มบทเรียน'); ?></h3>
        <div class="_100">
            <?php
            echo $form->labelEx($model, 'group_id');
            echo $form->dropDownList($model, 'group_id', LearningGroup::model()->getListData(), array('empty' => Yii::t('language', 'เลือก'), 'style' => 'width: 200px;'));
            echo $form->error($model, 'group_id');
            ?>
        </div>
        <div class="_100">
            <?php
            echo $form->labelEx($upload, 'file');
            echo $form->fileField($upload, 'file', array('accept' => "application/pdf"));
            echo $form->error($upload, 'file');
            ?>
        </div>
        <?php if (isset($modelFile)) { ?>
            <div class="_100">
                <?php echo CHtml::link($modelFile->path, array('/learning/manage/readingPdf/', 'id' => $modelFile->id), array('target' => '_bank')); ?>
            </div>
        <?php } ?>
        <div class="_100">
            <h4 class="reg"><?php echo Yii::t('language', '- บทเรียนภาษาไทย -'); ?></h4>
        </div>
        <div class="_100">
            <?php
            echo $form->labelEx($modelVideo, 'video');
            echo $form->textField($modelVideo, 'video');
            echo $form->error($modelVideo, 'video');
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
                            '-', 'Source', '-', 'Link', 'Unlink', '-', 'Maximize', '-', 'About',),
                    ), # EXISTING(!) Toolbar (see: ckeditor.js) Ex. "toolbar" => "Basic"
                ),
                "ckEditor" => Yii::app()->basePath . "/../js/ckeditor/ckeditor.php",
                # Path to ckeditor.php
                "ckBasePath" => Yii::app()->baseUrl . "/js/ckeditor/",
            ));
            echo $form->error($model, 'detail');
            ?>
        </div>
        <div class="_100">
            <h4 class="reg"><?php echo Yii::t('language', '- บทเรียนภาษาอังกฤษ -'); ?></h4>
        </div>
        <div class="_100">
            <?php
            echo $form->labelEx($modelVideo, 'video_en');
            echo $form->textField($modelVideo, 'video_en');
            echo $form->error($modelVideo, 'video_en');
            ?>
        </div>
        <div class="_100">
            <?php
            echo $form->labelEx($model, 'subject_en');
            echo $form->textField($model, 'subject_en');
            echo $form->error($model, 'subject_en');
            ?>
        </div>
        <div class="_100">
            <?php
            echo $form->label($model, 'detail_en');
            $this->widget('ext.ckeditor.CKEditorWidget', array(
                "model" => $model, # Data-Model
                "attribute" => 'detail_en', # Attribute in the Data-Model  // textarea name=""
                "defaultValue" => $model->detail_en, # Optional
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
            echo $form->error($model, 'detail_en');
            ?>
        </div>
        <div class="_100" style="text-align: center;">
            <?php
            echo CHtml::submitButton(Yii::t('language', $text));
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
</div>
