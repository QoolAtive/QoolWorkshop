<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'group-form',
    'enableAjaxValidation' => true,
    'enableClientValidation' => true,
    'focus' => array($model, 'name_th')
        ));
//echo $form->errorSummary($model);
?>

<div class="rowContact clearfix">
    <?php
    echo $form->labelEx($model, 'name_th');
    echo $form->textField($model, 'name_th', array('class' => 'fieldrequire', 'size' => '30'));
    echo $form->error($model, 'name_th');

    echo $form->labelEx($model, 'name_en');
    echo $form->textField($model, 'name_en', array('class' => 'fieldrequire', 'size' => '30'));
    echo $form->error($model, 'name_en');
    ?>
</div>

<?php
echo CHtml::hiddenField('id', $model->id);
echo CHtml::ajaxSubmitButton(
        Yii::t('language', 'บันทึก'), CHtml::normalizeUrl(array('/link/default/groupform')), array(
    'success' => 'function(data){
        if(data.result === "success"){
            alert("' . Yii::t('language', 'บันทึก') . Yii::t('language', 'ข้อมูล') . Yii::t('language', 'เรียบร้อย') . '");
            $.fn.yiiGridView.update("link-grid");
            $.fancybox.close();
        } else {
//            alert("' . Yii::t('language', 'ข้อมูลไม่ถูกต้อง') . '");
        }
    }',
        ), array('id' => 'ajaxBtn', 'name' => 'ajaxBtn')
);
// echo CHtml::ajaxSubmitButton(Yii::t('language', 'บันทึก'), array('id' => 'submit'));
//echo CHtml::button(Yii::t('language', 'ยกเลิก'), array('onclick' => 'hideDiv();'));

echo CHtml::button(Yii::t('language', 'ยกเลิก'), array('onclick' => '$.fancybox.close();'));
$this->endWidget();
?>
