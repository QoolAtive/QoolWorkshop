<script type="text/javascript">
    $(document).ready(function() {
        $("#other").hide();
        $("#other2").hide();
        $("#other3").hide();

        if ($("#PaymentCondition_payment_id_4").is(":checked")) { // เลือกเป็นอื่นๆ
            $("#other").show();
        } else {
            $("#other").hide();
        }
        
        if ($("#PaymentCondition_option_0").is(":checked")) {// เลือกส่วนลด
                $("#other2").show();
            } else {
                $("#other2").hide();
            }

            if ($("#PaymentCondition_option_1").is(":checked")) { // บัตรเครดิต
                $("#other3").show();
            } else {
                $("#other3").hide();
            }

        $("[id^=PaymentCondition_payment_id_]").click(function() {
            if ($("#PaymentCondition_payment_id_4").is(":checked")) {
                $("#other").show();
            } else {
                $("#other").hide();
            }
        });

        $("[id^=PaymentCondition_option_]").click(function() {
            if ($("#PaymentCondition_option_0").is(":checked")) {
                $("#other2").show();
            } else {
                $("#other2").hide();
            }

            if ($("#PaymentCondition_option_1").is(":checked")) {
                $("#other3").show();
            } else {
                $("#other3").hide();
            }
        });

    });
</script>
<?php
$list = array(
    array('text' => Yii::t('language', 'ร้านค้าทั้งหมด'), 'link' => '/eDirectory/admin/index', 'select' => ''),
    array('text' => Yii::t('language', 'จัดการสินค้าและบริการ'), 'link' => '/eDirectory/admin/product/id/' . $id, 'select' => ''),
    array('text' => Yii::t('language', 'เพิ่มข้อมูลสินค้าและบริการ'), 'link' => '#', 'select' => 'selected'),
);
$this->renderPartial('side_bar', array(
    'list' => $list,
));
?>
<div class="content">
    <div class="tabcontents">
        <?php
        if (empty($model->id)) {
            $btnText = 'บันทึก';

            $link_back = '/serviceProvider/manage/typeBusiness';
        } else {
            $btnText = 'บันทึก';

            $link_back = '/serviceProvider/manage/typeBusiness';
        }
        ?>
        <h3>  <i class="icon-plus"></i> <?php echo Yii::t('language', 'สินค้าและบริการ'); ?></h3>

        <hr>
        <div class="_100">
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'insert_type_business-form',
                'htmlOptions' => array('enctype' => 'multipart/form-data'),
            ));
            ?>
            <div class="_100">
                <div class="ckleft"> 
                    <?php echo CHtml::label(Yii::t('language', 'รูปภาพเดิม'), false); ?>
                </div>
                <div class="ckright">
                    <?php
                    if (!empty($model->pic)) {
                        ?>
                        <?php
                        echo CHtml::image("/file/product/" . $model->pic, "image", array('height' => '100'));
                        echo $model->pic;
                        ?>

                        <?php
                    }
                    ?> 
                </div>
            </div>
            <div class="_100">
                <h4 class="reg"><?php echo Yii::t('language', '- เงื่อนไขการชำระเงิน -'); ?></h4>
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
                    ?>
                </div>
            </div>
            <div class="_100">
                <?php
                $model_payment->option = $payment_option_array;
                echo $form->labelEx($model_payment, 'option') . "<br />";
                echo $form->checkBoxList($model_payment, 'option', Payment::model()->getListDataOption());
                echo $form->error($model_payment, 'option');
                ?>
                <div id="other2" class="_100">
                    <?php
                    echo $form->labelEx($model_payment, 'other2');
                    echo $form->textField($model_payment, 'other2');
                    ?>
                </div>
                <div id="other3" class="_100">
                    <?php
                    echo $form->labelEx($model_payment, 'other3');
                    echo $form->textField($model_payment, 'other3');
                    ?>
                </div>
            </div>

            <div class="_100">
                <?php
                echo $form->labelEx($model, 'pic');
                echo $form->fileField($model, 'pic');
                echo $form->error($model, 'pic');
                ?>
            </div>
            <div class="_100">
                <?php
                echo $form->labelEx($model, 'guide');
                echo $form->radioButtonList($model, 'guide', SpProduct::model()->getDataTypeList('', true));
                echo $form->error($model, 'guide');
                ?>
            </div>
            <div class="_100">
                <h4 class="reg"><?php echo Yii::t('language', '- ข้อมูลสินค้าภาษาไทย -'); ?></h4>
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
                echo $form->textArea($model, 'detail');
                echo $form->error($model, 'detail');
                ?>
            </div>
            <div class="_100">
                <h4 class="reg"><?php echo Yii::t('language', '- ข้อมูลสินค้าภาษาอังกฤษ -'); ?></h4>
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
                echo $form->textArea($model, 'detail_en');
                echo $form->error($model, 'detail_en');
                ?>
            </div>
            <div class="_100 textcenter">
                <?php
                echo CHtml::submitButton($btnText);
                ?>
            </div>
            <?php $this->endWidget(); ?>
        </div>
    </div>
</div>