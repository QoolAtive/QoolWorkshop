<?php
$list = array(
    array('text' => Yii::t('language', 'ข้อมูลทั้งหมด'), 'link' => '/eDirectory/admin/index', 'select' => ''),
    array('text' => Yii::t('language', 'จัดการสินค้าและบริการ'), 'link' => '#', 'select' => 'selected'),
);
$this->renderPartial('side_bar', array(
    'list' => $list,
));
?>
<div class="content">
    <div class="tabcontents">
        <div class="textcenter">
            <?php
            echo CHtml::button(Yii::t('language', 'เพิ่มข้อมูลสินค้า'), array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                    '/eDirectory/admin/insertProduct/id/' . $id // id = id บริษัท
                )) . "'")
            );
            ?>
        </div>
        <hr>
        <?php
        $this->renderPartial('product_grid', array(
            'dataProvider' => $dataProvider,
            'model' => $model,
        ));
        ?>
    </div>
</div>
