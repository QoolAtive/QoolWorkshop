<?php
$list = array(
    array('text' => Yii::t('language', 'ข้อมูลทั้งหมด'), 'link' => '/eDirectory/admin/index', 'select' => ''),
    array('text' => Yii::t('language', 'ร้านค้าที่ยังไม่ได้รับการอนุมัติ'), 'link' => '#', 'select' => 'selected'),
);

$this->renderPartial('side_bar', array(
    'list' => $list,
))
?>
<div class="content">
    <div class="tabcontents">
        <?php
        $this->renderPartial('company_grid', array(
            'dataProvider' => $dataProvider,
            'model' => $model,
        ));
        ?>
    </div>
</div>