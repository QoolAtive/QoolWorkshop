<h3 class="barH3">
    <span>
        <i class="icon-question-sign"></i>
        <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'หมวดหมู่คำถามย่อย'); ?>
    </span>
</h3>

<div class="txt-cen">
    <hr>
    <?php
    echo CHtml::button(Yii::t('language', 'เพิ่ม') . Yii::t('language', 'หมวดหมู่คำถามย่อย'), array(
        'onclick' => 'window.location = "' . CHtml::normalizeUrl(array("/faq/manage/editSub")) . '"'));
    echo CHtml::button(Yii::t('language', 'เรียงลำดับ') . Yii::t('language', 'หมวดหมู่คำถามย่อย'), array(
        'onclick' => 'window.location = "' . CHtml::normalizeUrl(array("/faq/manage/indexSortSub")) . '"'));
    ?>
    <hr>
</div>

<?php
$dataProvider = $model_sub->search();
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'faq_sub-grid',
    'dataProvider' => $dataProvider,
    'filter' => $model_sub,
    'emptyText' => Yii::t('language', 'ไม่พบข้อมูล'),
    'pagerCssClass' => 'alignCenter',
    'ajaxUpdate' => true,
    'columns' => array(
        array(
            'header' => Yii::t('language', 'ลำดับ'),
            'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)."."',
        ),
        array(
            'header' => Yii::t('language', 'ชื่อหมวดหมู่หลัก'),
            'name' => 'faq_main_id',
            'value' => 'FaqMain::model()->findByPk($data->faq_main_id)->name_th',
            'filter' => CHtml::listData(FaqMain::model()->findAll(), "id", "name_th"),
        ),
        array(
            'header' => Yii::t('language', 'ชื่อหมวดหมู่ย่อย'),
            'name' => LanguageHelper::changeDB('name_th', 'name_en'),
//            'value' => 'CHtml::link($data->name_th, CHtml::normalizeUrl(array("/faq/manage/manageFaq", "main_id" => ' . $main_id . ', "sub_id" => $data->faq_sub_id)))',
//            'type' => 'raw',
        ),
        array(
            'class' => 'CButtonColumn',
            'header' => Yii::t('language', "เครื่องมือ"),
            'deleteConfirmation' => Yii::t('language', 'คุณต้องการลบหมวดหมู่นี้หรือไม่?'),
            'template' => '{update} {delete}',
            'buttons' => array(
                'update' => array(
                    'label' => Yii::t('language', 'แก้ไข'),
                    'url' => 'CHtml::normalizeUrl(array("/faq/manage/editSub", "faq_sub_id" => $data->faq_sub_id))',
                ),
                'delete' => array(
                    'label' => Yii::t('language', 'ลบ'),
                    'url' => 'CHtml::normalizeUrl(array("/faq/manage/deleteSub", "faq_sub_id"=> $data->faq_sub_id))',
                ), //end 'delete' => array(
            ),
        ),
//        array(
//            'class' => 'CButtonColumn',
//            'header' => Yii::t('language', "ลบ"),
//            'deleteConfirmation' => Yii::t('language', 'คุณต้องการลบหมวดหมู่นี้หรือไม่?'),
//            'template' => '{delete}',
//            'buttons' => array(
//                'delete' => array(
//                    'label' => Yii::t('language', 'ลบ'),
//                    'url' => 'CHtml::normalizeUrl(array("/faq/manage/deleteSub", "faq_sub_id"=> $data->faq_sub_id))',
//                ), //end 'delete' => array(
//            ), //end 'buttons' => array(
//        ),
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