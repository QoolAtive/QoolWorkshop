<?php

echo CHtml::image($model->$pic, '', array(
    'style' => 'width: 100%'
));
if ($model->$pic != NULL && $model->$pic != '/img/noimage.gif') {
    echo CHtml::ajaxButton(Yii::t('language', 'ลบ'), CHtml::normalizeUrl(array('/webSimulation/manageShop/deletePic', 'pic' => $pic, 'item_id' => $model->web_shop_item_id)), array(
        'update' => '#' . $pic,
    ));
}
?>