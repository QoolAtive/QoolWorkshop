<?php
$form = $this->beginWidget("CActiveForm", array(
    'id' => 'rule_knowledge-form',
        ));
?>
<hr>
<div class='text_detail' style='text-align: center;'>
    <h3>test</h3>
    <p>test</p>
</div>
<hr>
<input type="hidden" name="rule_knowledge" value='1' />
<div style='text-align: center;'>
    <?php
    echo CHtml::submitButton(Yii::t('language', 'ยอมรับ'));
    echo CHtml::button(Yii::t('language', 'ยกเลิก'), array(
        'onClick' => "window.location='javascript:parent.jQuery.fancybox.close();'")
    );
    ?>
</div>
<?php
$this->endWidget();
?>
