<div class="_100">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'news_mail-form',
    ));
//        echo $form->errorSummary($model);
    ?>
    <h3>E-mail : </h3>
    <?php
    echo $form->textField($model, 'email', array(
        'class' => 'fieldrequire',
        'size' => '40'
    ));
    echo $form->error($model, 'email');
    ?>
    <div class="txt-cen _100">
        <?php
        echo CHtml::submitButton(Yii::t('language', 'สมัครรับข้อมูลข่าวสาร'));
        ?>
    </div>
    <?php $this->endWidget(); ?>
</div>