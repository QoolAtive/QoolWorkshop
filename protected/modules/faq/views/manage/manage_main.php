<?php
$this->renderPartial('_side_menu', array('select' => 'main'));
?>

<div class="content">
    <div class="tabcontents" >
        <img src="<?php echo Yii::t('language', '/img/banner/faq.png'); ?>" class="pagebanner" alt="pagebanner"/>
        <h3 class="barH3">
            <span>
                <i class="icon-question-sign"></i>
                <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'หมวดหมู่คำถามหลัก'); ?>
            </span>
        </h3>

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
        $dataProvider = $model->search();
        $this->widget('zii.widgets.grid.CGridView', array(
            'id' => 'faq_main-grid',
            'dataProvider' => $dataProvider,
            'filter' => $model,
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
                    'name' => LanguageHelper::changeDB('name_th', 'name_en'),
                    'value' => 'CHtml::link($data->name_th, CHtml::normalizeUrl(array("/faq/manage/manageSub", "main_id" => $data->id)))',
                    'type' => 'raw',
                ),
                array(
                    'class' => 'CButtonColumn',
                    'header' => Yii::t('language', "แก้ไขหมวดหมู่ย่อย"),
                    'template' => '{update}',
                    'buttons' => array(
                        'update' => array(
                            'label' => Yii::t('language', 'แก้ไขหมวดหมู่ย่อย'),
                            'url' => 'CHtml::normalizeUrl(array("/faq/manage/manageSub", "main_id" => $data->id))',
                        ),
                    ),
                ),
                array(
                    'class' => 'CButtonColumn',
                    'header' => Yii::t('language', "แก้ไข"),
                    'template' => '{update}',
                    'buttons' => array(
                        'update' => array(
                            'label' => Yii::t('language', 'แก้ไข'),
                            'url' => 'CHtml::normalizeUrl(array("/faq/manage/editMain", "faq_main_id" => $data->id))',
                        ),
                    ),
                ),
                array(
                    'class' => 'CButtonColumn',
                    'header' => Yii::t('language', "ลบ"),
                    'deleteConfirmation' => Yii::t('language', 'คุณต้องการลบหมวดหมู่นี้หรือไม่?'),
                    'template' => '{delete}',
                    'buttons' => array(
                        'delete' => array(
                            'label' => Yii::t('language', 'ลบ'),
                            'url' => 'CHtml::normalizeUrl(array("/faq/manage/deleteMain", "faq_main_id"=> $data->id))',
                        ), //end 'delete' => array(
                    ), //end 'buttons' => array(
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
</div>