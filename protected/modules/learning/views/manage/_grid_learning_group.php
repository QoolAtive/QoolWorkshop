<?php

$this->widget('zii.widgets.grid.CGridView', array(
//    'id' => 'admin-grid',
    'dataProvider' => $dataProvider,
    'filter' => $model,
    'ajaxUpdate' => true,
    'summaryText' => '',
    'columns' => array(
        array(// display 'create_time' using an expression
            'header' => 'ลำดับ',
            'headerHtmlOptions' => array('style' => 'width: 7%;'),
            'htmlOptions' => array('style' => 'text-align: center;'),
            'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)."."',
        ),
        array(
            'name' => 'name',
            'value' => '$data->name',
        ),
        array(
            'name' => 'pic',
            'type' => 'raw',
            'value' => 'CHtml::image("/file/learning/".$data->pic,\'\',array(
                                \'height\' => \'50\'
                                ))',
            'filter' => '',
            'htmlOptions' => array('style' => 'text-align: center; width: 100px;'),
        ),
        array(
            'class' => 'CButtonColumn',
            'deleteConfirmation' => Yii::t('language', 'คุณต้องการลบบทความหรือไม่?'),
            'header' => "รายละเอียด",
            'template' => '{update}{delete}',
            'buttons' => array(
                'update' => array(
                    'label' => 'update',
                    'url' => 'Yii::app()->createUrl("/learning/manage/InsertLearningGroup/",array("id"=>$data->id))',
                ),
                'delete' => array(
                    'label' => 'delete',
                    'url' => 'Yii::app()->createUrl("/learning/manage/delLearningGroup/",array("id"=>$data->id))',
                ),
            ),
            'afterDelete' => 'function(link,success,data){if(data != ""){alert(data);}}'
        ),
    ),
    'pager' => array(
        'class' => 'CLinkPager',
        'header' => 'หน้าที่: ',
        'firstPageLabel' => 'หน้าแรก',
        'prevPageLabel' => 'ก่อนหน้า',
        'nextPageLabel' => 'หน้าถัดไป',
        'lastPageLabel' => 'หน้าสุดท้าย',
    )
));
?>