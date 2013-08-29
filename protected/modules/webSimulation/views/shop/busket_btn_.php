<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'select-form',
        ));
if ($busket[$item_id] == NULL) {
    echo Yii::t('language', 'จำนวน');
    echo ' ' . CHtml::textField('number', '1', array(
        'class' => 'numberinput'
    )) . ' ';
    echo Yii::t('language', 'ชิ้น');
} else {
    echo Yii::t('language', 'จำนวนในตะกร้า');
    echo ' ' . $busket[$item_id] . ' ';
    echo Yii::t('language', 'ชิ้น');
}
echo CHtml::ajaxSubmitButton('หยิบออกจากตะกร้า', '/webSimulation/shop/selectItem/item_id/' . $item_id, array(
//        'update' => '#busket_btn',
    'type' => 'POST',
    'dataType' => 'json',
    'success' => "function (data){
            $('#busket_btn').html(data.div1);
            $('#busket_side').html(data.div2);
        }"
        ), array(
    'id' => 'select',
));
$this->endWidget();
?>
<!--<div id="busket_side"></div>-->
