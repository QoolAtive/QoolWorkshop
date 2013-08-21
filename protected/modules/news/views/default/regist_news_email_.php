<div class="_100">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'news_mail-form',
    ));
//        echo $form->errorSummary($model);
    ?>
    <?php
    echo 'E-mail :' . $form->textField($model, 'email', array('class' => 'fieldrequire'));
    echo $form->error($model, 'email');
    ?>
    <?php
    echo CHtml::submitButton(Yii::t('language', 'สมัครรับข้อมูลข่าวสาร'));
    ?>
    <?php $this->endWidget(); ?>
</div>