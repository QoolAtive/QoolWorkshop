<?php
$this->renderPartial('_side_bar', array(
    'select1' => '',
    'select2' => '',
    'select3' => 'selected',
));
?>
<div class="content">
    <div class="tabcontents">
        <?php
        if ($model->id != NULL) {
            $word = Yii::t('language', 'แก้ไข');
            $link_back = '/serviceProvider/manage/typeBusiness';
        } else {
            $word = Yii::t('language', 'เพิ่ม');
            $link_back = '/serviceProvider/manage/typeBusiness';
        }
        $title = SpCompany::model()->find('id=:id', array(':id' => $id));
        $company_name = LanguageHelper::changeDB($title->name, $title->name_en);
        ?>
        <h3 class="barH3">
            <i class="icon-compass"></i> 
            <a href="<?php echo CHtml::normalizeUrl(array("/serviceProvider/default/index")); ?>">
                <?php echo Yii::t('language', 'ผู้ให้บริการทั้งหมด'); ?>
            </a>
            <i class="icon-chevron-right"></i>
            <a href="<?php echo CHtml::normalizeUrl(array("/serviceProvider/manage/typeBusiness")); ?>">
                <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'บริการ'); ?>
            </a> 
            <i class="icon-chevron-right"></i>
            <a href="<?php echo CHtml::normalizeUrl(array("/serviceProvider/manage/company")); ?>">
                <?php echo Yii::t('language', 'พาร์ทเนอร์'); ?>
            </a>
            <i class="icon-chevron-right"></i>
            <a href="<?php echo CHtml::normalizeUrl(array("/serviceProvider/manage/product/id/" . $id)); ?>">
                <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'สินค้าและบริการ') . ' (' . $company_name . ') '; ?>
            </a>
            <i class="icon-chevron-right"></i>
            <?php echo Yii::t('language', $word) . trim(Yii::t('language', 'สินค้าและบริการ')); ?>   
        </h3>
        <div class="_100">
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'insert_type_business-form',
                'htmlOptions' => array('enctype' => 'multipart/form-data'),
            ));
            ?>
            <div class="_33">
                <p><?php echo $form->labelEx($model, 'guide'); ?></p>
                <?php
                echo $form->radioButtonList($model, 'guide', SpProduct::model()->getDataTypeList('', true));
                echo $form->error($model, 'guide');
                ?>
            </div>

            <div class="_33">
                <p><?php echo $form->labelEx($model, 'image'); ?></p>
                <?php
                echo $form->fileField($model, 'image');
                echo $form->error($model, 'image');
                ?>
            </div>
            <?php
            if (!empty($model->image)) {
                ?>
                <div class="_33">
                    <p>
                        <?php echo CHtml::label(Yii::t('language', 'รูปภาพเดิม'), false); ?>
                    </p>

                    <?php
                    echo CHtml::image("/file/product/" . $model->image, "", array('width' => '200'));
                    echo $model->image;
                    ?> 

                </div>
                <?php
            }
            ?>
            <div class="_100">
                <h4 class="reg"><?php echo ' - ' . Yii::t('language', 'ข้อมูลสินค้า') . ' (' . Yii::t('language', 'ภาษาไทย') . ') - '; ?></h4>
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
                echo $form->labelEx($model, 'detail');
                $this->widget('ext.ckeditor.CKEditorWidget', array(
                    "model" => $model, # Data-Model
                    "attribute" => 'detail', # Attribute in the Data-Model
                    "defaultValue" => $model->detail, # Optional
                    "config" => array(
                        "height" => "220px",
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
                <h4 class="reg"><?php echo ' - ' . Yii::t('language', 'ข้อมูลสินค้า') . ' (' . Yii::t('language', 'ภาษาอังกฤษ') . ') - '; ?></h4>
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
                echo $form->labelEx($model, 'detail_en');
                $this->widget('ext.ckeditor.CKEditorWidget', array(
                    "model" => $model, # Data-Model
                    "attribute" => 'detail_en', # Attribute in the Data-Model
                    "defaultValue" => $model->detail_en, # Optional
                    "config" => array(
                        "height" => "220px",
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
            <div class="_100 textcenter">
                <hr>
                <?php
                echo CHtml::submitButton(Yii::t('language', 'บันทึก'));
//        echo CHtml::button('ยกเลิก', array('onClick' => "history.go(-1)")
//        );
//        echo Yii::app()->user->getState('product_link_back_to_menu');
                if (Yii::app()->user->getState('default_link_back_to_menu') != null) {
                    $link_back = Yii::app()->user->getState('default_link_back_to_menu');
                    echo CHtml::button(Yii::t('language', 'ย้อนกลับ'), array('onClick' => "window.location='" . CHtml::normalizeUrl(array($link_back
                        )) . "'")
                    );
                } else {
                    echo CHtml::button(Yii::t('language', 'ย้อนกลับ'), array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                            '/serviceProvider/manage/product/id/' . $id
                        )) . "'")
                    );
                }
                echo CHtml::button(Yii::t('language', 'ไปที่') . Yii::t('language', 'พาร์ทเนอร์'), array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                        '/serviceProvider/manage/company'
                    )) . "'")
                );
                ?>
                <hr>
            </div>
            <?php $this->endWidget(); ?>
        </div>
    </div>
</div>