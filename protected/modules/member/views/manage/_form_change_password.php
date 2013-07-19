<style>
    input[type=password]{
        width: 200px;
    }
    label{
        padding-right: 10px;
        width: 100px;
        display: inline-block;
        text-align: right;
    }
    row{
        display: inline-block;
        padding: 5px 0px;
    }
</style>
<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'change_password-form',
    'enableClientValidation' => false,
//    'clientOptions' => array(
//        'validateOnSubmit' => true,
//    ),
    'htmlOptions' => array(
        'autocomplete' => 'off',
    )
        ));
?>
<div style=" padding: 5px 33%;">
    <h3 style="text-align: center;">เปลี่ยนรหัสผ่าน</h3>
    <hr>
    <div class="">
        <?php
        echo $form->labelEx($model, 'old_password');
        echo $form->passwordField($model, 'old_password');
        echo $form->error($model, 'old_password');
        ?>
    </div>
    <div class="">
        <?php
        echo $form->labelEx($model, 'password');
        echo $form->passwordField($model, 'password');
        echo $form->error($model, 'password');
        ?>
    </div>
    <div class="">
        <?php
        echo $form->labelEx($model, 're_password');
        echo $form->passwordField($model, 're_password');
        echo $form->error($model, 're_password');
        ?>
    </div>
    <hr>
    <div class="btnForm">
        <?php
        echo CHtml::submitButton(Yii::t('language', 'ยืนยัน'), array());
        echo CHtml::button(Yii::t('language', 'ย้อนกลับ'), array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                '/member/manage/profile'
            )) . "'")
        );
        ?>
    </div>
</div>
<?php $this->endWidget(); ?>