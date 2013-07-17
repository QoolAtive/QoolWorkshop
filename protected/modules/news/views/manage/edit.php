<div class="content">
    <?php
    if ($model->id == NULL) {
        ?>
        <h3><?php echo Yii::t('language', 'เพิ่มข่าว'); ?></h3>
    <?php } else { ?>
        <h3><?php echo Yii::t('language', 'แก้ไขข่าว'); ?></h3>
    <?php } ?>
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'update-form',
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
    ));
    echo $form->errorSummary($model);
    ?>
    <div>
        <?php
        echo Yii::t('language', $form->labelEx($model, 'group_id'));
        echo $form->DropDownList($model, 'group_id', CHtml::listData(NewsGroup::model()->findAll(), "id", "name_th")
                , array('empty' => '-- กรุณาเลือกกลุ่มข่าว --'));
        ?>
    </div>
    <!--เลือกรูปภาพ-->
    <div>
        <?php
        echo $form->labelEx($model, 'pic');
//                    echo "<label>" . Yii::t('language', 'แนบไฟล์') . "</label>";
        $this->widget('CMultiFileUpload', array(
            'model' => $model,
            'attribute' => 'pic',
            'name' => 'link_file',
            'accept' => 'jpg|jpeg|gif|png',
            'denied' => Yii::t('language', 'allowed_img'),
            'max' => 1,
            'remove' => '[x]',
            'duplicate' => Yii::t('language', 'Already Selected'),
                )
        );
//                    echo Yii::t('language', $form->error($model, 'pic'));
        ?>
        <div>
            <div class="file_old clearfix">                                       
                <?php
                if ($model->pic != NULL) {
                    echo "<ul class='list_files'> ";
                    $arr_file_detail = explode('.', $model->pic);

                    $arr_file_name = explode('/upload/img/news/', $model->pic);

                    echo "<li class='link_img'>" . CHtml::link($arr_file_name[1], $model->pic, array('target' => '_blank')) . "</li>";
                    echo " </ul>";
                }
                ?>
            </div>
            <div class="descAttach">
                <?php echo Yii::t('language', 'ไฟล์แนบ') . Yii::t('language', 'ได้แก่'); ?> .jpg, .jpeg, .png, .gif
                <?php echo '(' . Yii::t('language', 'ขนาดไม่เกิน') . ' 10 MB)' . Yii::t('language', 'ชื่อไฟล์เป็นภาษาอังกฤษเท่านั้น'); ?>
            </div>
            <?php //echo Yii::t('language', $form->error($model_files, 'file_name')); ?>
        </div>
    </div>
    <!--END เลือกรูปภาพ-->

    <?php
//    ภาษาไทย
    echo "<h4>" . Yii::t('language', 'ภาษาไทย') . "</h4>";
    echo Yii::t('language', $form->labelEx($model, 'subject_th'));
    echo $form->textField($model, 'subject_th');

    echo Yii::t('language', $form->labelEx($model, 'detail_th'));
    $this->widget('ext.ckeditor.CKEditorWidget', array(
        "model" => $model, # Data-Model
        "attribute" => 'detail_th', # Attribute in the Data-Model
        "defaultValue" => $model->detail_th, # Optional
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

//    ภาษาอังกฤษ
    echo "<h4>" . Yii::t('language', 'ภาษาอังกฤษ') . "</h4>";
    echo Yii::t('language', $form->labelEx($model, 'subject_en'));
    echo $form->textField($model, 'subject_en');

    echo Yii::t('language', $form->labelEx($model, 'detail_en'));
    $this->widget('ext.ckeditor.CKEditorWidget', array(
        "model" => $model, # Data-Model
        "attribute" => 'detail_en', # Attribute in the Data-Model
        "defaultValue" => $model->detail_en, # Optional
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

    echo CHtml::submitButton(Yii::t('language', 'บันทึก'));
    echo CHtml::button(Yii::t('language', 'ยกเลิก'), array(
        'onclick' => 'window.location = "' . CHtml::normalizeUrl(array("/news/manage/index")) . '"'));
    ?>
    <?php $this->endWidget(); ?>
</div>