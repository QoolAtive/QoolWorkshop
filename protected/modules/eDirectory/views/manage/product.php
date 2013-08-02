<?php
$list = array(
    array('text' => Yii::t('language', 'ข้อมูลทั้งหมด'), 'link' => '/eDirectory/manage/index', 'select' => ''),
    array('text' => Yii::t('language', 'สินค้าและบริการ'), 'link' => '#', 'select' => 'selected'),
);
$this->renderPartial('side_bar', array(
    'list' => $list,
));
?>
<div class="content">
    <div class="tabcontents">
        <?php
        $this->renderPartial('product_grid', array(
            'dataProvider' => $dataProvider,
            'model' => $model,
        ));
        ?>
    </div>
</div>
