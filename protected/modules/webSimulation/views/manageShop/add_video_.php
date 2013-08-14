<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'add_html-form',
    'focus' => array($model, 'name_th')
        ));
echo $form->errorSummary($model);
?>
<h3>
Video / Music
</h3>
ลิ้งค์ เพลงหรือวีดีโอ <br>

<p style="color: #aaa;">เช่น http://www.youtube.com/watch?v=0_45dIu0MD0 </p>
<?php
echo $form->textField($model, 'code', array(
    'class' => 'fieldrequire',
    'style' => 'width: 98%;  margin-bottom: 10px;',
));
echo $form->error($model, 'code');
?>
<input type="submit" value="บันทึก" name="yt0">
<input type="button" onclick="javascript:parent.jQuery.fancybox.close();" value="ยกเลิก">

<?php $this->endWidget(); ?>
