<?php
$this->renderPartial('_side_menu', array('main_id' => $fm_id));
$main = FaqMain::model()->findByPk($fm_id);
?>

<div class="content">
    <div class="tabcontents" >
        <img src="<?php echo Yii::t('language', '/img/banner/faq.png'); ?>" class="pagebanner" alt="pagebanner"/>
        <?php
        if ($model->id != NULL) {
            $word = Yii::t('language', 'แก้ไข');
        } else {
            $word = Yii::t('language', 'เพิ่ม');
        }
        ?>
        <h3 class="barH3">
            <span>
                <i class="icon-question-sign"></i>
                <a href="<?php echo CHtml::normalizeUrl(array("/faq/manage/manageMain")); ?>">
                    <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'หมวดหมู่คำถามหลัก'); ?>
                </a>
                <i class="icon-chevron-right"></i>
                <a href="<?php echo CHtml::normalizeUrl(array("/faq/manage/manageSub", 'main_id' => $main_id)); ?>">
                    <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'หมวดหมู่ย่อย') . ' ' . $main['name_th']; ?>
                </a>
                <i class="icon-chevron-right"></i>
                <a href="<?php echo CHtml::normalizeUrl(array("/faq/manage/manageFaq", 'main_id' => $main_id)); ?>">
                    <?php echo Yii::t('language', 'จัดการ') . $main['name_th']; ?>  
                </a>  
                <i class="icon-chevron-right"></i>
                <?php echo Yii::t('language', $word) . trim(Yii::t('language', ' คำถาม ')); ?>
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
            $faq_sub_list = CHtml::listData(FaqSub::model()->findAll(array('condition' => 'faq_main_id = ' . $fm_id)), "faq_sub_id", "name_th");
            echo $form->labelEx($model, 'fs_id');
            echo $form->dropDownList($model, 'fs_id', $faq_sub_list, array('class' => 'fieldrequire', 'empty' => Yii::t('language', ' กรุณาเลือกหมวดหมู่ย่อย ')));

            //ภาษาไทย
            echo $form->labelEx($model, 'subject_th');
            echo $form->textField($model, 'subject_th', array('class' => 'fieldrequire'));

            echo $form->labelEx($model, 'detail_th');
            $this->widget('ext.ckeditor.CKEditorWidget', array(
                "model" => $model, # Data-Model
                "attribute" => 'detail_th', # Attribute in the Data-Model
                "defaultValue" => $model->detail_th, # Optional
                "config" => array(
                    "height" => "240px",
                    "width" => "730",
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
            echo $form->labelEx($model, 'subject_en');
            echo $form->textField($model, 'subject_en', array('class' => 'fieldrequire'));

            echo $form->labelEx($model, 'detail_en');
            $this->widget('ext.ckeditor.CKEditorWidget', array(
                "model" => $model, # Data-Model
                "attribute" => 'detail_en', # Attribute in the Data-Model
                "defaultValue" => $model->detail_en, # Optional
                "config" => array(
                    "height" => "240px",
                    "width" => "730",
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
        <div class='txt-cen'>
            <hr>
            <?php
            echo CHtml::hiddenField('fm_id', $model->fm_id);
            echo CHtml::submitButton(Yii::t('language', 'บันทึก'));
            echo CHtml::button(Yii::t('language', 'ยกเลิก'), array(
                'onclick' => 'window.location = "' . CHtml::normalizeUrl(array("/faq/manage/manageFaq/main_id/" . $model->fm_id . '"'))));
            ?>
            <hr>
        </div>
        <?php
        $this->endWidget();
        ?>
    </div>
</div>