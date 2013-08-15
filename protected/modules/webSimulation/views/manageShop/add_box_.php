<h3>
    เพิ่มกล่องแสดงสินค้า
</h3>

<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'add_box-form',
    'focus' => array($model, 'name_th')
        ));
echo $form->errorSummary($model);
?>

<?php
echo $form->labelEx($model, 'name_th');
echo $form->textField($model, 'name_th', array(
    'class' => 'fieldrequire numberinput',
    'style' => 'width: 98%; margin-bottom: 10px;',
));
echo $form->error($model, 'name_th');

echo $form->labelEx($model, 'name_en');
echo $form->textField($model, 'name_en', array(
    'class' => 'fieldrequire numberinput',
    'style' => 'width: 98%; margin-bottom: 10px;',
));
echo $form->error($model, 'name_en');
?>

<input type="submit" value="เพิ่มกล่อง">
<input type="button" onclick="javascript:parent.jQuery.fancybox.close();" value="ยกเลิก">

<?php $this->endWidget(); ?>
