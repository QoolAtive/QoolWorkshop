<?php
$this->renderPartial('_sidemenu');
?>

<div class="content">
    <div class="tabcontents">
        <?php
        if ($model->id == NULL) {
            ?>
            <h3><?php echo Yii::t('language', 'เพิ่มข่าวอบรม'); ?></h3>
        <?php } else { ?>
            <h3><?php echo Yii::t('language', 'แก้ไขข่าวอบรม'); ?></h3>
        <?php } ?>
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'update-form',
        ));
        echo $form->errorSummary($model);
        ?>
        <?php
        echo Yii::t('language', $form->labelEx($model, 'link'));
        echo $form->textField($model, 'link');

        //เลือกวันเริ่มต้น
        echo Yii::t('language', $form->labelEx($model, 'start_at'));
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'model' => $model,
            'attribute' => 'start_at',
//        'value' => Yii::app()->dateFormatter->format("d MM y",strtotime($model->start_at)),
            // additional javascript options for the date picker plugin
            'options' => array(
                'showAnim' => 'fold',
                'dateFormat' => 'yy-mm-dd',
            ),
            'htmlOptions' => array(
                'style' => 'height:20px;'
            ),
        ));

        //เลือกวันสิ้นสุด
        echo Yii::t('language', $form->labelEx($model, 'end_at'));
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'model' => $model,
            'attribute' => 'end_at',
//        'value' => Yii::app()->dateFormatter->format("d-M-y",strtotime($model->end_at)),
            // additional javascript options for the date picker plugin
            'options' => array(
                'showAnim' => 'fold',
                'dateFormat' => 'yy-mm-dd',
            ),
            'htmlOptions' => array(
                'style' => 'height:20px;'
            ),
        ));

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
                "height" => "240px",
                "width" => "600",
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
                "height" => "240px",
                "width" => "600",
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

        echo CHtml::submitButton(Yii::t('language', 'บันทึก'));
        echo CHtml::button(Yii::t('language', 'ยกเลิก'), array(
            'onclick' => 'window.location = "' . CHtml::normalizeUrl(array("/news/manage/manageTraining")) . '"'));
        ?>
        <?php $this->endWidget(); ?>
    </div>
</div>