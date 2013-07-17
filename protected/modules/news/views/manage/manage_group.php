<h3><?php echo Yii::t('language', 'จัดการกลุ่มข่าว'); ?></h3>
<?php
$dataProvider = $model->search();

echo CHtml::button(Yii::t('language', 'เพิ่ม'), array(
    'onclick' => 'window.location = "' . CHtml::normalizeUrl(array("/news/manage/editGroup")) . '"'));

$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'news-grid',
    'dataProvider' => $dataProvider,
    'filter' => $model,
    'emptyText' => Yii::t('language', 'ไม่พบข้อมูล'),
    'pagerCssClass' => 'alignCenter',
    'ajaxUpdate' => true,
    'columns' => array(
        array(
            'header' => Yii::t('language', 'ลำดับที่'),
            'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)."."',
        ),
        array(
            'header' => 'หัวข้อ',
            'name' => 'name_th',
            'value' => 'strip($data->name_th, 20);'
        ),
        array(
            'class' => 'CButtonColumn',
            'header' => Yii::t('language', "แก้ไข"),
            'template' => '{update}',
            'buttons' => array(
                'update' => array(
                    'label' => Yii::t('language', 'แก้ไข'),
                    'url' => 'CHtml::normalizeUrl(array("/news/manage/editGroup", "id"=> $data->id))',
                ),
            ),
        ),
        array(
            'class' => 'CButtonColumn',
            'header' => Yii::t('language', "ลบ"),
            'deleteConfirmation' => Yii::t('language', 'คุณต้องการลบข้อมูลนี้หรือไม่?'),
            'template' => '{delete}',
            'buttons' => array(
                'delete' => array(
                    'label' => Yii::t('language', 'ลบ'),
                    'url' => 'CHtml::normalizeUrl(array("/news/manage/deleteGroup","id"=> $data->id))',
                ), //end 'delete' => array(
            ), //end 'buttons' => array(
        ),
    ), //end 'columns' => array(
    'template' => "{pager}\n{items}\n{pager}",
    'pager' => array(
        'class' => 'CLinkPager',
        'header' => Yii::t('language', 'หน้าที่: '),
        'firstPageLabel' => Yii::t('language', 'หน้าแรก'),
        'prevPageLabel' => Yii::t('language', 'ก่อนหน้า'),
        'nextPageLabel' => Yii::t('language', 'หน้าถัดไป'),
        'lastPageLabel' => Yii::t('language', 'หน้าสุดท้าย'),
    )
));
?>
<div class="btnForm l_btn">
    <?php
    echo CHtml::button(Yii::t('language', 'กลับไปหน้าที่แล้ว'), array(
        'onclick' => 'window.location = "' . CHtml::normalizeUrl(array("/news/manage/index")) . '"'));
    ?> 
</div>
<?php

function strip($data, $len) {
    $data = strip_tags(trim($data));
    if (strlen($data) > $len) {
        $return = txtTruncate($data, $len);
        $return .= " ...";
    } else {
        $return = $data;
    }
    return $return;
}

function txtTruncate($string, $limit, $break = " ") {
    if (strlen($string) <= $limit)
        return $string;
    if (false !== ($breakpoint = strpos($string, $break, $limit))) {
        if ($breakpoint < strlen($string) - 1) {
            $string = substr($string, 0, $breakpoint);
        }
    }
    return $string;
}
?>