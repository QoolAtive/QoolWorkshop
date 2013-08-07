<?php
$this->renderPartial('_side_menu', array('manage' => '2'));
?>

<div class="content">
    <div class="tabcontents">
        <?php
        if ($model->id == NULL) {
            $word = 'เพิ่ม';
        } else {
            $word = 'แก้ไข';
        }
        ?>
        <h3 class="barH3">
            <span>
                <i class="icon-group"></i>
                <a href="<?php echo CHtml::normalizeUrl(array("/news/default/index/view/3")); ?>">
                    <?php echo Yii::t('language', 'การอบรม'); ?>
                </a>
                <i class="icon-chevron-right"></i>
                <a href="<?php echo CHtml::normalizeUrl(array("/news/manage/manageTraining")); ?>">
                    <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'การอบรม'); ?>
                </a>               
                <i class="icon-chevron-right"></i>
                <?php echo Yii::t('language', $word) . trim(Yii::t('language', 'การอบรม')); ?>
            </span>
        </h3>

        
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'update-form',
        ));
        echo $form->errorSummary($model);
        ?>
        <div class="_100">
            <?php
            echo $form->labelEx($model, 'link');
            echo $form->textField($model, 'link');
            ?>
        </div>
        <div class="_50">
            <?php
            //เลือกวันเริ่มต้น
            echo $form->labelEx($model, 'start_at');
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'id' => 'start_at',
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
            ?>
        </div>
        <div class="_50">
            <?php
            //เลือกวันสิ้นสุด
            echo $form->labelEx($model, 'end_at');
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'id' => 'end_at',
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
            ?>
        </div>
        <div class="_100">
            <?php
//    ภาษาไทย
            echo "<h4 class='reg'>" . Yii::t('language', '- ภาษาไทย -') . "</h4>";
            echo $form->labelEx($model, 'subject_th');
            echo $form->textField($model, 'subject_th');
            ?>
        </div>
        <div class="_100">
            <?php
            echo $form->labelEx($model, 'detail_th');
            $this->widget('ext.ckeditor.CKEditorWidget', array(
                "model" => $model, # Data-Model
                "attribute" => 'detail_th', # Attribute in the Data-Model
                "defaultValue" => $model->detail_th, # Optional
                "config" => array(
                    "height" => "240px",
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
//    ภาษาอังกฤษ
            echo "<h4 class='reg'>" . Yii::t('language', '- ภาษาอังกฤษ -') . "</h4>";
            echo $form->labelEx($model, 'subject_en');
            echo $form->textField($model, 'subject_en');
            ?>
        </div>
        <div class="_100">
            <?php
            echo Yii::t('language', $form->labelEx($model, 'detail_en'));
            $this->widget('ext.ckeditor.CKEditorWidget', array(
                "model" => $model, # Data-Model
                "attribute" => 'detail_en', # Attribute in the Data-Model
                "defaultValue" => $model->detail_en, # Optional
                "config" => array(
                    "height" => "240px",
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
        <div class="txt-cen _100">
            <hr>
            <?php
            echo CHtml::submitButton(Yii::t('language', 'บันทึก'));
            echo CHtml::button(Yii::t('language', 'ยกเลิก'), array(
                'onclick' => 'window.location = "' . CHtml::normalizeUrl(array("/news/manage/manageTraining")) . '"'));
            ?>
            <hr>
        </div>
        <?php $this->endWidget(); ?>
    </div>
</div>
