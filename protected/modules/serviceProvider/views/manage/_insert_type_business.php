<?php
$this->renderPartial('_side_bar', array(
    'select1' => 'selected',
    'select2' => '',
));
?>
<div class="content">
    <div class="tabcontents">
        <?php
        if (empty($model->id)) {
            $word = 'เพิ่ม';
        } else {
            $word = 'แก้ไข';
        }
        ?>
        <h3 class="barH3">
            <span>
                <i class="icon-compass"></i> 
                <a href="<?php echo CHtml::normalizeUrl(array("/serviceProvider/default/index")); ?>">
                    <?php echo Yii::t('language', 'ผู้ให้บริการทั้งหมด'); ?>
                </a>
                <i class="icon-chevron-right"></i>
                <a href="<?php echo CHtml::normalizeUrl(array("/serviceProvider/manage/typeBusiness")); ?>">
                    <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'บริการ'); ?>
                </a> 
                <i class="icon-chevron-right"></i>
                <a href="<?php echo CHtml::normalizeUrl(array("/serviceProvider/manage/typeBusiness")); ?>">
                    <?php echo Yii::t('language', 'ประเภทผู้ให้บริการ'); ?>
                </a> 
                <i class="icon-chevron-right"></i>
                <?php echo Yii::t('language', $word) . Yii::t('language', 'ประเภทผู้ให้บริการหลัก'); ?>
            </span>
        </h3>


        <div class="_100">
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'insert_type_business-form',
                'htmlOptions' => array('enctype' => 'multipart/form-data'),
            ));
            ?>
            <div class="_100">
                <h4 class="reg"><?php echo '- ' . Yii::t('language', 'ประเภทผู้ให้บริการ') . ' (' . Yii::t('language', 'ภาษาไทย') . ') -'; ?></h4>
            </div>
            <div class="_100">
                <?php
                echo $form->labelEx($model, 'name');
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
                                '-', 'Image', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak',
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
                <h4 class="reg"><?php echo '- ' . Yii::t('language', 'ประเภทผู้ให้บริการ') . ' (' . Yii::t('language', 'ภาษาอังกฤษ') . ') -'; ?></h4>
            </div>
            <div class="_100">
                <?php
                echo $form->labelEx($model, 'name_en');
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
                <hr>
                <?php
                echo CHtml::submitButton(Yii::t('language', 'บันทึก'));
                if (Yii::app()->user->getState('default_link_back_to_menu')) {
                    $link_back = Yii::app()->user->getState('default_link_back_to_menu');

                    echo CHtml::button(Yii::t('language', 'ย้อนกลับ'), array(
                        'onClick' => "window.location='" . CHtml::normalizeUrl(array(
                            $link_back
                        )) . "'")
                    );
                } else {
                    echo CHtml::button(Yii::t('language', 'ย้อนกลับ'), array(
                        'onClick' => "window.location='" . CHtml::normalizeUrl(array(
                            '/serviceProvider/manage/typeBusiness'
                        )) . "'")
                    );
                }
                ?>
                <hr>
            </div>
            <?php $this->endWidget(); ?>
        </div>
    </div>
</div>