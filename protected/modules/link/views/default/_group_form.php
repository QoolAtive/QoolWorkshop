<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'group-form',
    'enableAjaxValidation' => false,
        ));
echo $form->errorSummary($model);
?>


<div class="rowContact clearfix">
    <?php
//    echo $model->id;
    echo Yii::t('language', $form->labelEx($model, 'name'));
    echo $form->textField($model, 'name', array('size' => '30'));
//    echo Yii::t('language', $form->error($model, 'name'));
    ?>
</div>

<?php
echo CHtml::hiddenField('id', $model->id);
echo CHtml::ajaxSubmitButton(
        Yii::t('language', 'บันทึก'), CHtml::normalizeUrl(array('/link/default/groupform')), array(
//    'update' => '#gridview_group',
//    'success' => 'hideDiv',
    'success' => 'function(){
            hideDiv();
            $.fn.yiiGridView.update("link-grid");
        }',
        ), array('id' => 'ajaxBtn', 'name' => 'ajaxBtn')
);
//echo CHtml::submitButton('submit'));

echo CHtml::button(Yii::t('language', 'ยกเลิก'), array('onclick' => 'hideDiv();'));
?>
<?php $this->endWidget(); ?>
