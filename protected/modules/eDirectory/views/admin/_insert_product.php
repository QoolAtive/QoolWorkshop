<script type="text/javascript">
    $(document).ready(function() {
        $("#other").hide();
        $("#special_other_1").hide();
        $("#special_other_2").hide();

        if ($("#PaymentCondition_payment_id_4").is(":checked")) { // เลือกเป็นอื่นๆ
            $("#other").show();
        } else {
            $("#other").hide();
        }

        if ($("#PaymentSpecial_special_id_0").is(":checked")) {// เลือกส่วนลด
            $("#special_other_1").show();
        } else {
            $("#special_other_1").hide();
        }

        if ($("#PaymentSpecial_special_id_1").is(":checked")) { // บัตรเครดิต
            $("#special_other_2").show();
        } else {
            $("#special_other_2").hide();
        }

        $("[id^=PaymentCondition_payment_id_]").click(function() {
            if ($("#PaymentCondition_payment_id_4").is(":checked")) {
                $("#other").show();
            } else {
                $("#other").hide();
            }
        });

        $("[id^=PaymentSpecial_special_id_]").click(function() {
            if ($("#PaymentSpecial_special_id_0").is(":checked")) {
                $("#special_other_1").show();
            } else {
                $("#special_other_1").hide();
            }

            if ($("#PaymentSpecial_special_id_1").is(":checked")) {
                $("#special_other_2").show();
            } else {
                $("#special_other_2").hide();
            }
        });

    });
</script>
<?php
$this->renderPartial('side_bar', array(
    'active' => 5,
    'company_id' => $id,
));
$title = Company::model()->find('id=:id', array(':id' => $id));
$company_name = LanguageHelper::changeDB($title->name, $title->name_en);
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
                <i class="icon-home"></i>
                <?php
                echo CHtml::link(Yii::t('language', 'จัดการ') . Yii::t('language', 'ร้านค้า'), array('/eDirectory/admin/index'));
                ?>
                <i class="icon-chevron-right"></i>
                <?php echo CHtml::link(Yii::t('language', 'ร้านค้าทั้งหมด'), array('/eDirectory/admin/index')); ?>
                <i class="icon-chevron-right"></i>
                <?php
                echo CHtml::link(
                        Yii::t('language', 'จัดการ') . Yii::t('language', 'สินค้าและบริการ') . ' (' . $company_name . ') ', array(
                    '/eDirectory/admin/product/id/' . $id
                ));
                ?>
                <i class="icon-chevron-right"></i>
                <?php echo Yii::t('language', $word) . trim(Yii::t('language', 'สินค้าและบริการ')); ?>   
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
                <h4 class="reg"><?php echo ' - ' . Yii::t('language', 'เงื่อนไขการชำระเงิน') . ' - '; ?></h4>
            </div>
            <div class="_100">
                <?php
                $model_payment->payment_id = $payment_array;
                echo $form->labelEx($model_payment, 'payment_id') . "<br />";
                echo $form->checkBoxList($model_payment, 'payment_id', Payment::model()->getListData());
                echo $form->error($model_payment, 'payment_id');
                ?>
                <div id="other" class="_100">
                    <?php
                    echo $form->labelEx($model_payment, 'other');
                    echo $form->textField($model_payment, 'other');
                    echo $form->labelEx($model_payment, 'other_en');
                    echo $form->textField($model_payment, 'other_en');
                    ?>
                </div>
            </div>
            <div class="_100">
                <?php
                $model_payment_special->special_id = $payment_special_array;
                echo $form->labelEx($model_payment_special, 'special_id') . "<br />";
                echo $form->checkBoxList($model_payment_special, 'special_id', Payment::model()->getListDataOption());
                echo $form->error($model_payment_special, 'special_id');
                ?>
                <div id="special_other_1" class="_100">
                    <?php
                    echo $form->labelEx($model_payment_special, 'other1');
                    echo $form->textField($model_payment_special, 'other1');
                    echo $form->labelEx($model_payment_special, 'other1_en');
                    echo $form->textField($model_payment_special, 'other1_en');
                    ?>
                </div>
                <div id="special_other_2" class="_100">
                    <?php
                    echo $form->labelEx($model_payment_special, 'other2');
                    echo $form->textField($model_payment_special, 'other2');
                    echo $form->labelEx($model_payment_special, 'other2_en');
                    echo $form->textField($model_payment_special, 'other2_en');
                    ?>
                </div>
            </div>

            <?php
            if (!empty($model->pic)) {
                ?>
                <div class="_100">
                    <div class="ckleft"> 
                        <?php echo CHtml::label(Yii::t('language', 'รูปภาพเดิม'), false); ?>
                    </div>
                    <div class="ckright">

                        <?php
                        echo CHtml::image("/file/product/" . $model->pic, "image", array('height' => '100'));
                        echo $model->pic;
                        ?>
                    </div>
                </div>
                <?php
            }
            ?> 

            <div class="_100">
                <?php
                echo $form->labelEx($model, 'pic');
                echo $form->fileField($model, 'pic');
                echo $form->error($model, 'pic');
                ?>
            </div>
            <div class="_100">
                <?php
                echo $form->labelEx($model, 'guide') . "<br />";
                echo $form->radioButtonList($model, 'guide', SpProduct::model()->getDataTypeList('', true));
                echo $form->error($model, 'guide');
                ?>
            </div>
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
//                echo $form->textArea($model, 'detail');
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
                echo CHtml::button(Yii::t('language', 'ย้อนกลับ'), array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                        '/eDirectory/admin/product/id/' . $id
                    )) . "'")
                );
                ?>
                <hr>
            </div>
            <?php $this->endWidget(); ?>
        </div>
    </div>
</div>