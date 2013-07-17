<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'group-form',
        ));
//echo $form->errorSummary($model);
?>


<div class="rowContact clearfix">
    <?php
    echo Yii::t('language', $form->labelEx($model, 'name_th'));
    echo $form->textField($model, 'name_th', array('size' => '30'));
    echo Yii::t('language', $form->error($model, 'name_th'));

    echo Yii::t('language', $form->labelEx($model, 'name_en'));
    echo $form->textField($model, 'name_en', array('size' => '30'));
    echo Yii::t('language', $form->error($model, 'name_en'));
    ?>
</div>

<?php
echo CHtml::hiddenField('id', $model->id);
//echo CHtml::ajaxSubmitButton(
//        Yii::t('language', 'บันทึก'), CHtml::normalizeUrl(array('/link/default/groupform')), array(
//    'success' => 'function(){
////            hideDiv();
//            $.fancybox.close();
//            $.fn.yiiGridView.update("link-grid");
//        }',
//        ), array('id' => 'ajaxBtn', 'name' => 'ajaxBtn')
//);
echo CHtml::submitButton(Yii::t('language', 'บันทึก'), array('id' => 'submit'));
//echo CHtml::button(Yii::t('language', 'ยกเลิก'), array('onclick' => 'hideDiv();'));
//
echo CHtml::button(Yii::t('language', 'ยกเลิก'), array('onclick' => '$.fancybox.close();'));
?>
<?php $this->endWidget(); ?>
