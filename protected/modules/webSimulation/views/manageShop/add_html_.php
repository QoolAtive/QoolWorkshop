<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'add_html-form',
    'focus' => array($model, 'name_th')
        ));
echo $form->errorSummary($model);
?>
<h3>
ใส่โค๊ด HTML
</h3>
<?php
echo $form->labelEx($model, 'name_th');
echo $form->textField($model, 'name_th', array(
    'class' => 'fieldrequire',
    'style' => 'width: 98%; margin-bottom: 10px;',
    'placeholder' => 'ชื่อกล่อง'
));
echo $form->error($model, 'name_th');

echo $form->labelEx($model, 'name_en');
echo $form->textField($model, 'name_en', array(
    'class' => 'fieldrequire numberinput',
    'style' => 'width: 98%; margin-bottom: 10px;',
    'placeholder' => 'ชื่อกล่อง'
));
echo $form->error($model, 'name_en');
?>

<?php
echo $form->textArea($model, 'code', array(
    'class' => 'fieldrequire',
    'style' => 'width: 98%; margin-bottom: 10px; height: 150px;',
    'placeholder' => 'HTML'
));
echo $form->error($model, 'code');
?>

<input type="submit" value="บันทึก" name="yt0">
<input type="button" onclick="javascript:parent.jQuery.fancybox.close();" value="ยกเลิก">

<?php $this->endWidget(); ?>