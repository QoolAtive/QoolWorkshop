<div class="form">
    <h3>ยืนยันการสมัครสมาชิก</h3>
    <hr>

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'register_confirm-form',
        'enableClientValidation' => false,
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
    ));
    echo Yii::app()->user->isUserType();
    ?>
    <div class="row">
        <?php echo $form->labelEx($model, 'register_confirm'); ?>
        <?php echo $form->textField($model, 'register_confirm', array('style' => 'width: 200px;')); ?>
        <?php echo $form->error($model, 'register_confirm'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('ยืนยัน', array('id' => 'submit')); ?>
    </div>

    <?php $this->endWidget(); ?>
</div><!-- form -->