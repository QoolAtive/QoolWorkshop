<?php

$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'learning-grid',
    'dataProvider' => $dataProvider,
    'filter' => $model,
    'ajaxUpdate' => true,
    'summaryText' => '',
    'columns' => array(
        array(// display 'create_time' using an expression
            'header' => Yii::t('language', 'ลำดับ'),
            'headerHtmlOptions' => array('style' => 'width: 7%;'),
            'htmlOptions' => array('style' => 'text-align: center;'),
            'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)."."',
        ),
        array(
            'name' => 'group_id',
            'value' => 'LearningGroup::model()->getGroupList($data->group_id)',
            'filter' => LearningGroup::model()->getGroupList(' ', true),
        ),
        array(
            'name' => LanguageHelper::changeDB('subject', 'subject_en'),
            'value' => 'LanguageHelper::changeDB($data->subject, $data->subject_en)',
        ),
        array(
            'name' => 'date_write',
            'value' => 'Tool::ChangeDateTimeToShow($data->date_write)',
            'filter' => '',
        ),
        array(
            'class' => 'CButtonColumn',
            'deleteConfirmation' => Yii::t('language', 'คุณต้องการลบข้อมูลนี้หรือไม่?'),
            'header' => Yii::t('language', 'เครื่องมือ'),
            'template' => '{view}{update}{delete}',
            'buttons' => array(
                'view' => array(
                    'label' => Yii::t('language', 'ดู'), //Text label of the button.
                    'url' => 'Yii::app()->createUrl("/learning/default/lesson/",array("id"=>$data->id))',
                    'options' => array("target" => "_blank"),
                ),
                'update' => array(
                    'label' => Yii::t('language', 'แก้ไข'),
                    'url' => 'Yii::app()->createUrl("/learning/manage/InsertLearning",array("id"=>$data->id))',
                ),
                'delete' => array(
                    'label' => Yii::t('language', 'ลบ'),
                    'url' => 'Yii::app()->createUrl("/learning/manage/delLearning",array("id"=>$data->id))',
                ),
            ),
        ),
    ),
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