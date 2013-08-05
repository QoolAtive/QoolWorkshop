<?php

$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'learning_group-grid',
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
            'name' => 'name',
            'value' => '$data->name',
            'visible' => Yii::app()->language == 'th' ? true : false,
        ),
        array(
            'header' => Yii::t('language', 'รูปภาพ'),
            'name' => 'pic',
            'type' => 'raw',
            'value' => 'CHtml::image("/file/learning/".$data->pic,\'\',array(
                                \'height\' => \'50\'
                                ))',
            'filter' => '',
            'htmlOptions' => array('style' => 'text-align: center; width: 100px;'),
            'visible' => Yii::app()->language == 'th' ? true : false,
        ),
        array(
            'name' => 'name_en',
            'value' => '$data->name_en',
            'visible' => Yii::app()->language == 'en' ? true : false,
        ),
        array(
            'header' => Yii::t('language', 'รูปภาพ'),
            'name' => 'pic_en',
            'type' => 'raw',
            'value' => 'CHtml::image("/file/learning/".$data->pic_en,\'\',array(
                                \'height\' => \'50\'
                                ))',
            'filter' => '',
            'htmlOptions' => array('style' => 'text-align: center; width: 100px;'),
            'visible' => Yii::app()->language == 'en' ? true : false,
        ),
        array(
            'class' => 'CButtonColumn',
            'deleteConfirmation' => Yii::t('language', 'คุณต้องการลบข้อมูลนี้หรือไม่?'),
            'header' => Yii::t('language', 'เครื่องมือ'),
            'template' => '{update} {delete}',
            'buttons' => array(
                'update' => array(
                    'label' => Yii::t('language', 'แก้ไข'),
                    'url' => 'Yii::app()->createUrl("/learning/manage/InsertLearningGroup/",array("id"=>$data->id))',
                ),
                'delete' => array('label' => Yii::t('language', 'ลบ'), 'label' => 'delete',
                    'url' => 'Yii::app()->createUrl("/learning/manage/delLearningGroup/",array("id"=>$data->id))',
                ),
            ),
            'afterDelete' => 'function(link,success,data){if(data != ""){alert(data);}}'
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