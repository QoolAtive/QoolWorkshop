<?php
$main = FaqMain::model()->findByPk($main_id);
//$sub = FaqSub::model()->findByPk($sub_id);

$main_name = LanguageHelper::changeDB($main['name_th'], $main['name_en']);
?>
<h3 class="barH3">
    <span>
        <i class="icon-question-sign"></i> 
        <a href="<?php echo CHtml::normalizeUrl(array("/faq/manage/manageCategory")); ?>">
            <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'คำถาม'); ?>
        </a>
        <i class="icon-chevron-right"></i>
        <?php echo Yii::t('language', 'จัดการ') . $main_name; ?>
    </span>
</h3>

<div id="view<?php echo $main_id; ?>">
    <?php
    $dataProvider = $model->search();
    $dataProvider->criteria->addCondition('fm_id = ' . $main_id);
    ?>
    <div class="txt-cen">
        <?php
        echo CHtml::button(Yii::t('language', 'เพิ่ม') . Yii::t('language', ' คำถาม ') . $main_name, array(
            'onclick' => 'window.location = "' . CHtml::normalizeUrl(array("/faq/manage/editFaq", 'fm_id' => $main_id)) . '"'));
        ?>
        <hr>
    </div>
    <?php
    $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'faq-grid',
        'dataProvider' => $dataProvider,
        'filter' => $model,
        'summaryText' => '',
        'emptyText' => Yii::t('language', 'ไม่พบข้อมูล'),
        'columns' => array(
            array(
                'header' => Yii::t('language', 'ลำดับ'),
                'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)."."',
            ),
            array(
                'visible' => Yii::app()->language == 'th' ? true : false,
//                'header' => Yii::t('language', ' หมวดหมู่ย่อย '),
                'name' => 'fs_id',
                'value' => 'FaqSub::model()->findByPk($data->fs_id)->name_th',
                'filter' => CHtml::listData(FaqSub::model()->findAllByAttributes(array('faq_main_id' => $main_id)), "faq_sub_id", "name_th"),
            ),
            array(
                'visible' => Yii::app()->language == 'en' ? true : false,
//                'header' => Yii::t('language', ' หมวดหมู่ย่อย '),
                'name' => 'fs_id',
                'value' => 'FaqSub::model()->findByPk($data->fs_id)->name_en',
                'filter' => CHtml::listData(FaqSub::model()->findAllByAttributes(array('faq_main_id' => $main_id)), "faq_sub_id", "name_en"),
            ),
            array(
//                'header' => Yii::t('language', ' คำถาม '),
                'name' => LanguageHelper::changeDB('subject_th', 'subject_en'),
                'value' => 'strip(LanguageHelper::changeDB($data->subject_th,$data->subject_en), 20);'
            ),
            array(
//                'header' => Yii::t('language', 'คำตอบ'),
                'name' => LanguageHelper::changeDB('detail_th', 'detail_en'),
                'value' => 'strip(LanguageHelper::changeDB($data->detail_th,$data->detail_en), 30);'
            ),
            array(
                'header' => Yii::t('language', 'ผู้เข้าชม') . Yii::t('language', '(ครั้ง)'),
                'name' => 'counter',
                'filter' => false,
                'htmlOptions' => array('style' => 'text-align: center;'),
            ),
            array(
                'class' => 'CButtonColumn',
                'header' => Yii::t('language', "เครื่องมือ"),
                'deleteConfirmation' => Yii::t('language', 'คุณต้องการลบข้อมูลนี้หรือไม่?'),
                'template' => '{update} &nbsp; {delete}',
                'buttons' => array(
                    'update' => array(
                        'label' => Yii::t('language', 'แก้ไข'),
                        'url' => 'CHtml::normalizeUrl(array("/faq/manage/editFaq", "fm_id" => $data->fm_id,"id"=> $data->id))',
                    ),
                    'delete' => array(
                        'label' => Yii::t('language', 'ลบ'),
                        'url' => 'CHtml::normalizeUrl(array("/faq/manage/deleteFaq","id"=> $data->id))',
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
</div>
