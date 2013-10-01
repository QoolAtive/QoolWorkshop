<?php
$this->renderPartial('_side_menu', array('main_id' => $fm_id));
$main = FaqMain::model()->findByPk($fm_id);
?>

<div class="content">
    <div class="tabcontents" >
        <img src="<?php echo Yii::t('language', '/img/banner/faq.png'); ?>" class="pagebanner" alt="pagebanner"/>
        <?php
        if ($model->id != NULL) {
            $word = 'แก้ไข';
        } else {
            $word = 'เพิ่ม';
        }
        ?>
        <h3 class="barH3">
            <span>
                <i class="icon-question-sign"></i>  
                <a href="<?php echo CHtml::normalizeUrl(array("/faq/manage/manageCategory")); ?>">
                    <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'คำถาม'); ?>
                </a>
                <i class="icon-chevron-right"></i> 
                <a href="<?php echo CHtml::normalizeUrl(array("/faq/manage/manageFaq", 'main_id' => $fm_id)); ?>">
                    <?php 
                    $main_name = LanguageHelper::changeDB($main['name_th'], $main['name_en']);
                    echo Yii::t('language', 'จัดการ') . $main_name; 
                    ?>  
                </a>  
                <i class="icon-chevron-right"></i> 
                <?php echo Yii::t('language', $word) . trim(Yii::t('language', ' คำถาม ')); ?>
            </span>
        </h3>
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'update-form',
        ));
//        echo $form->errorSummary($model);
        ?>
        <div class="_100">
            <?php
            $feild_sub = LanguageHelper::changeDB("name_th", "name_en");
            $faq_sub_list = CHtml::listData(FaqSub::model()->findAll(array('condition' => 'faq_main_id = ' . $fm_id)), "faq_sub_id", $feild_sub);
            echo $form->labelEx($model, 'fs_id');
            echo $form->dropDownList($model, 'fs_id', $faq_sub_list, array(
                'class' => 'fieldrequire',
                'empty' => ' - ' . Yii::t('language', 'กรุณาเลือก') . Yii::t('language', 'หมวดหมู่คำถามย่อย') . ' - '
            ));
            echo $form->error($model, 'fs_id');

            //ภาษาไทย
            echo $form->labelEx($model, 'subject_th');
            echo $form->textField($model, 'subject_th', array('class' => 'fieldrequire'));
            echo $form->error($model, 'subject_th');

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
            echo $form->error($model, 'detail_th');
            ?>
        </div>
        <div class="_100">
            <?php
//    ภาษาอังกฤษ
            echo $form->labelEx($model, 'subject_en');
            echo $form->textField($model, 'subject_en', array('class' => 'fieldrequire'));
            echo $form->error($model, 'subject_en');

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
            echo $form->error($model, 'detail_en');
            ?>
        </div>
        <div class='_100 txt-cen'>
            <hr>
            <?php
            echo CHtml::hiddenField('fm_id', $model->fm_id);
            echo CHtml::submitButton(Yii::t('language', 'บันทึก'));
            echo CHtml::button(Yii::t('language', 'ย้อนกลับ'), array(
                'onclick' => 'window.location = "' . CHtml::normalizeUrl(array("/faq/manage/manageFaq", 'main_id' => $fm_id)) . '"'
            ));
            ?>
            <hr>
        </div>
        <?php
        $this->endWidget();
        ?>
    </div>
</div>