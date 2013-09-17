<!--<h3 class="barH3">
    <span>
        <i class="icon-question-sign"></i>
        <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'หมวดหมู่คำถามหลัก'); ?>
    </span>
</h3>-->

<div class="txt-cen">
    <hr>
    <?php
    echo CHtml::button(Yii::t('language', 'เพิ่ม') . Yii::t('language', 'หมวดหมู่คำถามหลัก'), array(
        'onclick' => 'window.location = "' . CHtml::normalizeUrl(array("/faq/manage/editMain")) . '"'));
    echo CHtml::button(Yii::t('language', 'เรียงลำดับ') . Yii::t('language', 'หมวดหมู่คำถามหลัก'), array(
        'onclick' => 'window.location = "' . CHtml::normalizeUrl(array("/faq/manage/sortMain")) . '"'));
    ?>
    <hr>
</div>

<?php
$dataProvider = $model_main->search();
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'faq_main-grid',
    'dataProvider' => $dataProvider,
    'filter' => $model_main,
    'summaryText' => '',
    'emptyText' => Yii::t('language', 'ไม่พบข้อมูล'),
    'columns' => array(
        array(
            'header' => Yii::t('language', 'ลำดับ'),
            'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)."."',
        ),
        'name_th', 
        'name_en',
//        array(
//            'header' => Yii::t('language', 'ชื่อหมวดหมู่หลัก'),
//            'name' => LanguageHelper::changeDB('name_th', 'name_en'),
////                    'value' => 'CHtml::link($data->name_th, CHtml::normalizeUrl(array("/faq/manage/manageSub", "main_id" => $data->id)))',
////                    'type' => 'raw',
//        ),
//        array(
//            'header' => Yii::t('language', 'ชื่อหมวดหมู่หลัก'),
//            'name' => LanguageHelper::changeDB('name_th', 'name_en'),
////                    'value' => 'CHtml::link($data->name_th, CHtml::normalizeUrl(array("/faq/manage/manageSub", "main_id" => $data->id)))',
////                    'type' => 'raw',
//        ),
        array(
            'class' => 'CButtonColumn',
            'header' => Yii::t('language', "เครื่องมือ"),
            'deleteConfirmation' => Yii::t('language', 'คุณต้องการลบข้อมูลนี้หรือไม่?'),
            'template' => '{update} &nbsp; {delete}',
            'buttons' => array(
                'update' => array(
                    'label' => Yii::t('language', 'แก้ไข'),
                    'url' => 'CHtml::normalizeUrl(array("/faq/manage/editMain", "faq_main_id" => $data->id))',
                ),
                'delete' => array(
                    'label' => Yii::t('language', 'ลบ'),
                    'url' => 'CHtml::normalizeUrl(array("/faq/manage/deleteMain", "faq_main_id"=> $data->id))',
                ), //end 'delete' => array(
            ),
        ),
    ), //end 'columns' => array(
    'template' => "{items}\n{pager}",
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