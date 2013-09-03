<?php

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
?>