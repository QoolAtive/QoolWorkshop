<?php
$main = FaqMain::model()->findByPk($main_id);
$sub = FaqSub::model()->findByPk($sub_id);
?>
<h3 class="barH3">
    <span>
        <i class="icon-question-sign"></i>
        <a href="<?php echo CHtml::normalizeUrl(array("/faq/manage/manageMain")); ?>">
            <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'หมวดหมู่คำถามหลัก'); ?>
        </a>
        <i class="icon-chevron-right"></i>
        <a href="<?php echo CHtml::normalizeUrl(array("/faq/manage/manageSub", 'main_id' => $main_id)); ?>">
            <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'หมวดหมู่ย่อย') . ' ' . $main['name_th']; ?>
        </a>
        <i class="icon-chevron-right"></i>
        <?php echo Yii::t('language', 'จัดการ') . $sub['name_th']; ?>
    </span>
</h3>

<div id="view<?php echo $main_id; ?>">
    <?php
    $dataProvider = $model->search();
    $dataProvider->criteria->addCondition('fs_id = ' . $sub_id);
    ?>
    <div class="txt-cen">
        <hr>
        <?php
        echo CHtml::button(Yii::t('language', 'เพิ่มคำถาม'), array(
            'onclick' => 'window.location = "' . CHtml::normalizeUrl(array("/faq/manage/editFaq", 'fm_id' => $main_id, 'fs_id' => $sub_id)) . '"'));
        ?>
        <hr>
    </div>
    <?php
    $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'faq-grid',
        'dataProvider' => $dataProvider,
        'filter' => $model,
        'emptyText' => Yii::t('language', 'ไม่พบข้อมูล'),
        'ajaxUpdate' => true,
        'columns' => array(
            array(
                'header' => Yii::t('language', 'ลำดับ'),
                'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)."."',
            ),
            array(
                'header' => Yii::t('language', ' คำถาม '),
                'name' => LanguageHelper::changeDB('subject_th', 'subject_en'),
                'value' => 'strip(LanguageHelper::changeDB($data->subject_th,$data->subject_en), 20);'
            ),
            array(
                'header' => Yii::t('language', ' คำตอบ '),
                'name' => LanguageHelper::changeDB('detail_th', 'detail_en'),
                'value' => 'strip(LanguageHelper::changeDB($data->detail_th,$data->detail_en), 30);'
            ),
            array(
                'header' => Yii::t('language', ' ผู้เข้าชม(ครั้ง) '),
                'name' => 'counter',
                'filter' => false
            ),
            array(
                'class' => 'CButtonColumn',
                'header' => Yii::t('language', "แก้ไข"),
                'template' => '{update}',
                'buttons' => array(
                    'update' => array(
                        'label' => Yii::t('language', 'แก้ไข'),
                        'url' => 'CHtml::normalizeUrl(array("/faq/manage/editFaq", "fm_id" => $data->fm_id, "fs_id" => $data->fs_id ,"id"=> $data->id))',
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
                        'url' => 'CHtml::normalizeUrl(array("/faq/manage/deleteFaq","id"=> $data->id))',
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
</div>