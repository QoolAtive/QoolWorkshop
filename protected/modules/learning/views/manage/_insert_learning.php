<style type="text/css">
    ._40{
        background-color: #EEEEEE;
        border-radius: 14px 14px 14px 14px;
        display: inline;
        float: left;
        height: 81px;
        margin-left: 2%;
        margin-right: 2%;
        padding: 10px 37px;
        width: 36%;
    }
    .fieldrequire{
        background:  url("/img/fieldrequire.png") no-repeat scroll left center #fff;
    }
</style>
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
    $word = Yii::t('language', 'เพิ่ม');
} else {
    $word = Yii::t('language', 'แก้ไข');
}
?>
<?php
$this->renderPartial('_side_bar', array(
    'select_list' => 2,
));
?>
<div class="content">
    <div class="tabcontents">
        <h3 class="barH3">
            <span>
                <i class="icon-bookmark-empty"></i> 
                <a href="<?php echo CHtml::normalizeUrl(array("/learning/default/home")); ?>">
                    <?php echo Yii::t('language', 'การเรียนรู้'); ?>
                </a>
                <i class="icon-chevron-right"></i>
                <a href="/learning/manage/learning">
                    <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'การเรียนรู้'); ?>
                </a>
                <i class="icon-chevron-right"></i>
                <a href="/learning/manage/learning">
                    <?php echo Yii::t('language', 'บทเรียน'); ?>
                </a>
                <i class="icon-chevron-right"></i>
                <?php echo $word . Yii::t('language', 'บทเรียน'); ?>
            </span>
        </h3>
        <div class="_40">
            <?php echo $form->labelEx($model, 'group_id'); ?>

            <?php
            echo $form->dropDownList($model, 'group_id', LearningGroup::model()->getListData(), array(
                'empty' => Yii::t('language', 'เลือก'),
                'style' => 'width: 100%;',
                'class' => 'fieldrequire'
                    )
            );
            echo $form->error($model, 'group_id');
            ?>
        </div>
        <div class="_40">
            <p><?php echo $form->labelEx($upload, 'file'); ?></p>
            <?php
            echo $form->fileField($upload, 'file', array('accept' => "application/pdf"));
            echo $form->error($upload, 'file');
            ?>
        </div>
        <?php if (!empty($modelFile->path)) { ?>
            <div class="_100" id="file_">
                <?php
                echo CHtml::link($modelFile->path, array('/learning/default/readingfile/', 'id' => $modelFile->id));
                echo "<br/>";
                echo CHtml::ajaxLink(Yii::t('language', 'ลบ'), array(
                    '/learning/manage/delfile'
                        ), array(
                    'type' => 'post',
                    'data' => array('file_id' => $modelFile->id),
                    'update' => 'div#file_',
                        ), array(
//                                'onClick' => 'return confirm("คุณต้องการลบรูปภาพหรือไม่?")',
                    'hrel' => '/learning/manage/delfile', 'id' => $modelFile->id
                        )
                );
                ?>
            </div>
        <?php } ?>
        <div class="_100">
            <h4 class="reg"><?php echo '- ' . Yii::t('language', 'บทเรียน') . ' (' . Yii::t('language', 'ภาษาไทย') . ') -'; ?></h4>
        </div>
        <div class="_100">
            <?php
            echo $form->labelEx($modelVideo, 'video');
            echo $form->textField($modelVideo, 'video', array('class' => 'fieldrequire'));
            echo $form->error($modelVideo, 'video');
            ?>
        </div>
        <div class="_100">
            <?php
            echo $form->labelEx($model, 'subject');
            echo $form->textField($model, 'subject', array('class' => 'fieldrequire'));
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
                            '-', 'Image', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak',
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
            <h4 class="reg"><?php echo '- ' . Yii::t('language', 'บทเรียน') . ' (' . Yii::t('language', 'ภาษาอังกฤษ') . ') -'; ?></h4>
        </div>
        <div class="_100">
            <?php
            echo $form->labelEx($modelVideo, 'video_en');
            echo $form->textField($modelVideo, 'video_en', array('class' => 'fieldrequire'));
            echo $form->error($modelVideo, 'video_en');
            ?>
        </div>
        <div class="_100">
            <?php
            echo $form->labelEx($model, 'subject_en');
            echo $form->textField($model, 'subject_en', array('class' => 'fieldrequire'));
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
                            '-', 'Image', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak',
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
        <div class="_100 txt-cen">
            <hr>
            <?php
            echo CHtml::submitButton(Yii::t('language', 'บันทึก'));
            echo CHtml::button(Yii::t('language', 'ย้อนกลับ'), array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                    '/learning/manage/learning'
                )) . "'")
            );
            ?>
            <hr>
        </div>
    </div>
    <?php
    $this->endWidget();
    ?>
</div>
