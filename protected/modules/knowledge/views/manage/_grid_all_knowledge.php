<?php

$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'knowledge-grid',
    'dataProvider' => $model->getDataManage(),
    'filter' => $model,
    'summaryText' => '',
    'emptyText' => Yii::t('language', 'ไม่พบข้อมูล'),
    'columns' => array(
        array(// display 'create_time' using an expression
            'header' => Yii::t('language', 'ลำดับ'),
            'headerHtmlOptions' => array('style' => 'width: 7%;'),
            'htmlOptions' => array('style' => 'text-align: center;'),
            'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)."."',
        ),
        array(
            'name' => 'subject',
            'type' => 'raw',
            'value' => 'CHtml::link($data->subject, array("/knowledge/default/view/id/$data->id"))',
//                'value' => 'CHtml::link($data->subject,array("manage/ViewTopic/ques_id/$data->id"))',
        ), array(
            'name' => 'subject_en',
            'type' => 'raw',
            'value' => 'CHtml::link($data->subject_en, array("/knowledge/default/view/id/$data->id"))',
        ),
        array(
            'name' => 'type_id',
            'value' => 'KnowledgeType::model()->getList($data->type_id)',
            'filter' => KnowledgeType::model()->getList(),
//                'value' => 'CHtml::link($data->subject,array("manage/ViewTopic/ques_id/$data->id"))',
        ),
        array(
            'name' => 'guide_status',
            'value' => 'Knowledge::model()->getDataTypeList($data->guide_status)',
            'filter' => Knowledge::model()->getDataTypeList(' ', true),
        ),
        array(
            'name' => 'date_write',
//                'value' => '$data->date_write',
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
                    'label' => Yii::t('language', 'ดู'),
                    'url' => 'Yii::app()->createUrl("/knowledge/default/view/",array("id"=>$data->id))',
                ),
                'update' => array(
                    'label' => Yii::t('language', 'แก้ไข'),
                    'url' => 'Yii::app()->createUrl("/knowledge/manage/insert/",array("id"=>$data->id))',
                ),
                'delete' => array(
                    'label' => Yii::t('language', 'ลบ'),
                    'url' => 'Yii::app()->createUrl("/knowledge/manage/del/",array("id"=>$data->id))',
                ),
            ),
            'afterDelete' => 'function(link,success,data){
                                    if(data != ""){
                                        alert(data);
                                    }
                    }'
        ),
    ),
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
