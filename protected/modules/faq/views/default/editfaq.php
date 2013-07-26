<?php
switch ($fm_id) {
    case 2:
        $select1 = '';
        $select2 = 'selected';
        $select3 = '';
        $select4 = '';
        $type = Yii::t('language', 'การเรียนรู้และบทความ');
        break;
    case 3:
        $select1 = '';
        $select2 = '';
        $select3 = 'selected';
        $select4 = '';
        $type = Yii::t('language', 'ค้นหาร้านค้า');
        break;
    case 4:
        $select1 = '';
        $select2 = '';
        $select3 = '';
        $select4 = 'selected';
        $type = Yii::t('language', 'แนะนำการใช้งาน');
        break;

    default:
        $select1 = 'selected';
        $select2 = '';
        $select3 = '';
        $select4 = '';
        $type = Yii::t('language', 'บริการ');
        break;
}
?>
<div class="sidebar">
    <div class="menuitem">
        <ul>
            <li class="boxhead"><img src="<?php echo Yii::t('language', '/img/iconpage/faq.png'); ?>"/></li>
        </ul>
    </div>

    <ul class="tabs clearfix">
        <li class=''>
            <a href="<?php echo CHtml::normalizeUrl(array('/faq/default/index/view/1')); ?>" rel='view-1'>
                <?php
                //FAQ Service Provider 
                echo Yii::t('language', 'คำถาม') . Yii::t('language', 'บริการ');
                ?>
            </a>
        </li>
        <li class=''>
            <a href="<?php echo CHtml::normalizeUrl(array('/faq/default/index/view/2')); ?>" rel='view-2'>
                <?php
                //FAQ Knowledge & Learning
                echo Yii::t('language', 'คำถาม')  . Yii::t('language', 'การเรียนรู้และบทความ');
                ?>
            </a>
        </li>
        <li class=''>
            <a href="<?php echo CHtml::normalizeUrl(array('/faq/default/index/view/3')); ?>" rel='view-3'>
                <?php
                //FAQ E-Directory
                echo Yii::t('language', 'คำถาม') . Yii::t('language', 'ค้นหาร้านค้า');
                ?>
            </a>
        </li>
        <li class=''>
            <a href="<?php echo CHtml::normalizeUrl(array('/faq/default/index/view/4')); ?>" rel='view-4'>
                <?php
                //FAQ Web Simulation
                echo Yii::t('language', 'คำถาม') . Yii::t('language', 'แนะนำการใช้งาน');
                ?>
            </a>
        </li>
        <?php
        if (Yii::app()->user->isAdmin()) {
            ?>
            <li class='<?php echo $select1; ?>'>
                <a href="<?php echo CHtml::normalizeUrl(array('/faq/default/manageFaq/view/1')); ?>" rel='manage1'>
                    <?php echo Yii::t('language', 'จัดการ').Yii::t('language', 'คำถาม'); ?><br/>
                    <?php echo Yii::t('language', 'บริการ'); ?>
                </a>
            </li>
            <li class='<?php echo $select2; ?>'>
                <a href="<?php echo CHtml::normalizeUrl(array('/faq/default/manageFaq/view/2')); ?>" rel='manage2'>
                    <?php echo Yii::t('language', 'จัดการ').Yii::t('language', 'คำถาม'); ?><br/>
                    <?php echo Yii::t('language', 'การเรียนรู้และบทความ'); ?>
                </a>
            </li>
            <li class='<?php echo $select3; ?>'>
                <a href="<?php echo CHtml::normalizeUrl(array('/faq/default/manageFaq/view/3')); ?>" rel='manage3'>
                    <?php echo Yii::t('language', 'จัดการ').Yii::t('language', 'คำถาม'); ?><br/>
                    <?php echo Yii::t('language', 'ค้นหาร้านค้า'); ?>
                </a></li>
            <li class='<?php echo $select4; ?>'>
                <a href="<?php echo CHtml::normalizeUrl(array('/faq/default/manageFaq/view/4')); ?>" rel='manage4'>
                    <?php echo Yii::t('language', 'จัดการ').Yii::t('language', 'คำถาม'); ?><br/>
                    <?php echo Yii::t('language', 'แนะนำการใช้งาน'); ?>
                </a>
            </li>
        <?php } ?>
    </ul>
</div>

<div class="content">
    <div class="tabcontents" >
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
                <a href="<?php echo CHtml::normalizeUrl(array("/faq/default/index/view/" . $fm_id)); ?>">
                    <?php echo Yii::t('language', 'คำถาม') . $type; ?>
                </a>
                <i class="icon-chevron-right"></i>
                <a href="<?php echo CHtml::normalizeUrl(array("/faq/default/manageFaq/view/" . $fm_id)); ?>">
                    <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'คำถาม') . $type; ?>
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
        <div>
            <?php
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
        <div>
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
                'onclick' => 'window.location = "' . CHtml::normalizeUrl(array("/faq/default/manageFaq/view/" . $model->fm_id . '"'))));
            ?>
            <hr>
        </div>
        <?php
        $this->endWidget();
        ?>
    </div>
</div>