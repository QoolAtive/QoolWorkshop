<div class="sidebar">
    <div class="menuitem">
        <ul>
            <li class="boxhead"><img src="<?php echo Yii::t('language', '/img/iconpage/faq.png'); ?>"/></li>
        </ul>
    </div>

    <ul class="tabs clearfix">
        <li>
            <a href="<?php echo CHtml::normalizeUrl(array('/faq/default/index/view/1')); ?>">
                <?php
                //FAQ Service Provider 
                echo Yii::t('language', 'คำถาม') . " " . Yii::t('language', 'บริการ');
                ?>
            </a>
        </li>
        <li>
            <a href="<?php echo CHtml::normalizeUrl(array('/faq/default/index/view/2')); ?>">
                <?php
                //FAQ Knowledge & Learning
                echo Yii::t('language', 'คำถาม') . " " . Yii::t('language', 'การเรียนรู้และบทความ');
                ?>
            </a>
        </li>
        <li>
            <a href="<?php echo CHtml::normalizeUrl(array('/faq/default/index/view/3')); ?>">
                <?php
                //FAQ E-Directory
                echo Yii::t('language', 'คำถาม') . " " . Yii::t('language', 'ค้นหาร้านค้า');
                ?>
            </a>
        </li>
        <li>
            <a href="<?php echo CHtml::normalizeUrl(array('/faq/default/index/view/4')); ?>">
                <?php
                //FAQ Web Simulation
                echo Yii::t('language', 'คำถาม') . " " . Yii::t('language', 'แนะนำการใช้งาน');
                ?>
            </a>
        </li>
        <?php if (Yii::app()->user->isAdmin()) { ?>
            <li><a href="<?php echo CHtml::normalizeUrl(array('/faq/default/manageFaq/view/1')); ?>">
                    <?php echo Yii::t('language', 'จัดการคำถาม'); ?><br/>
                    <?php echo Yii::t('language', 'บริการ'); ?>
                </a></li>
            <li><a href="<?php echo CHtml::normalizeUrl(array('/faq/default/manageFaq/view/2')); ?>">
                    <?php echo Yii::t('language', 'จัดการคำถาม'); ?><br/>
                    <?php echo Yii::t('language', 'การเรียนรู้และบทความ'); ?>
                </a></li>
            <li><a href="<?php echo CHtml::normalizeUrl(array('/faq/default/manageFaq/view/3')); ?>">
                    <?php echo Yii::t('language', 'จัดการคำถาม'); ?><br/>
                    <?php echo Yii::t('language', 'ค้นหาร้านค้า'); ?>
                </a></li>
            <li><a href="<?php echo CHtml::normalizeUrl(array('/faq/default/manageFaq/view/4')); ?>">
                    <?php echo Yii::t('language', 'จัดการคำถาม'); ?><br/>
                    <?php echo Yii::t('language', 'แนะนำการใช้งาน'); ?>
                </a></li>
        <?php } ?>
    </ul>
</div>

<div class="content">
    <div class="tabcontents" >
        <?php
        if ($model->id != NULL) {
            $word = "แก้ไขคำถาม";
        } else {
            $word = "เพิ่มคำถาม";
        }
        ?>
        <h3><?php echo Yii::t('language', $word); ?></h3>
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'update-form',
        ));
        echo $form->errorSummary($model);
        ?>
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

        echo CHtml::hiddenField('fm_id', $model->fm_id);
        echo CHtml::submitButton(Yii::t('language', 'บันทึก'));
//echo CHtml::button(Yii::t('language', 'ยกเลิก'), array('onclick' => '$("#edit' . $model->fm_id . '").hide().html(data).fadeOut();'));
        echo CHtml::button(Yii::t('language', 'ยกเลิก'), array(
            'onclick' => 'window.location = "' . CHtml::normalizeUrl(array("/faq/default/manageFaq/view/" . $model->fm_id . '"'))));
        ?>
        <?php $this->endWidget(); ?>
    </div>
</div>