<?php
$this->renderPartial('_sidemenu');
?>

<div class="content">
    <div class="tabcontents">
        <h3><?php echo Yii::t('language', 'แก้ไข Feed ข่าว'); ?></h3>
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'update-form',
        ));
        echo $form->errorSummary($model);
        ?>
        <?
        echo Yii::t('language', $form->labelEx($model, 'link'));
        echo $form->textField($model, 'link');

        echo CHtml::hiddenField('id', $model->id);
        echo CHtml::submitButton(Yii::t('language', 'บันทึก'));
        echo CHtml::button(Yii::t('language', 'ยกเลิก'), array(
            'onclick' => 'window.location = "' . CHtml::normalizeUrl(array("/news/default/index")) . '"'));
        ?>
        <?php $this->endWidget(); ?>
    </div>
</div>