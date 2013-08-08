<div class="form">
    <h3 class="barH3">
        <i class="icon-lock"></i> ยืนยันการสมัครสมาชิก</h3>

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

<div class="_100 textcenter ">
        <?php echo $form->labelEx($model, 'register_confirm'); ?>

    </div>
     <div class="_100 textcenter">
        <?php echo $form->textField($model, 'register_confirm', array('style' => '  height: 200px;
    margin: 0 auto 24px;
    text-align: center;
    width: 300px;
    text-indent:-1px;')); ?>
        <?php echo $form->error($model, 'register_confirm'); ?>
    </div>
    
   
<div class="">
</div>
    <div class=" textcenter buttons">
        <?php echo CHtml::submitButton('ยืนยัน', array('id' => 'submit','style' => 'width:300px;')); ?>
    </div>

    <?php $this->endWidget(); ?>
</div><!-- form -->