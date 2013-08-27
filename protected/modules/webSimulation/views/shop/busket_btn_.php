<?php

if ($busket[$item_id] == NULL) {
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'select-form',
    ));
    echo Yii::t('language', 'จำนวน');
    echo ' ' . CHtml::textField('number', '1', array(
        'class' => 'numberinput'
    )) . ' ';
    echo Yii::t('language', 'ชิ้น');
    echo CHtml::ajaxSubmitButton('หยิบใส่ตะกร้า', '/webSimulation/shop/selectItem/item_id/' . $item_id, array(
        'update' => '#busket_btn',
            ), array(
        'id' => 'select',
    ));
    $this->endWidget();
} else {
    echo CHtml::ajaxSubmitButton('หยิบออกจากตะกร้า', '/webSimulation/shop/removeItem/item_id/' . $item_id, array(
        'update' => '#busket_btn',
            ), array(
        'id' => 'select',
    ));
}
?>
