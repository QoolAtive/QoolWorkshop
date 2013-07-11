<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'forgot_password-form',
    'enableAjaxValidation' => false,
        ));
?>
<div style="text-align: center; padding: 0% 40%;">
    <h3>ลืมรหัสผ่าน</h3>
    <div class="_100">
        <?php
        echo $form->labelEx($model, 'email');
        echo $form->textField($model, 'email');
        echo $form->error($model, 'email');
        ?>
    </div>
    <div class="_100">
        <?php
        echo CHtml::submitButton(Yii::t('language', 'ยืนยัน'));
        ?>
    </div>
</div>
<?php
$this->endWidget();
?>
