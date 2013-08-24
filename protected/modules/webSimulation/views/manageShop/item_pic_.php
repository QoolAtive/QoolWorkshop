<?php

if ($model->$pic == NULL) {
    echo CHtml::image('/img/noimage.gif');
} else {
    echo CHtml::image($model->$pic);
}

if ($model->$pic != NULL) {
    echo CHtml::ajaxButton(Yii::t('language', 'ลบ'), CHtml::normalizeUrl(array('/webSimulation/manageShop/deletePic', 'pic' => $pic, 'item_id' => $model->web_shop_item_id)), array(
        'update' => '#' . $pic,
    ));
}

echo CHtml::hiddenField('is_delete_' . $pic, $is_delete);
?>