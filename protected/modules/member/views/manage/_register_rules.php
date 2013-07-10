<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'register_rules-form',
    'enableAjaxValidation' => false,
        ));
?>
<h3>กฏการสมัครสมาชิก</h3>
<div>
    <input type="checkbox" name="rules" value="1"><?php echo Yii::t('language', 'ยอมรับเงื่อนไข'); ?><br>
</div>

<div>
    <?php
    echo CHtml::submitButton('สมัครสมาชิก');
    ?>  
</div>

<?php
$this->endWidget();
?>