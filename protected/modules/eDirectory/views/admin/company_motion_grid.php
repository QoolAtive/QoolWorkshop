<?php

$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'type_business-grid',
    'dataProvider' => $dataProvider,
    'filter' => $model,
//    'ajaxUpdate' => true,
    'summaryText' => '',
    'columns' => array(
        array(// display 'create_time' using an expression
            'header' => 'ลำดับ',
            'headerHtmlOptions' => array('style' => 'width: 7%;'),
            'htmlOptions' => array('style' => 'text-align: center;'),
            'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)."."',
        ),
        array(
            'header' => Yii::t('language', 'ร้านค้า'),
            'class' => 'CDataColumn',
            'type' => 'raw',
            'htmlOptions' => array('style' => 'text-align:center'),
            'value' => 'CHtml::checkBox("company[]", "", array("value"=>$data->id))',
        ),
        array(
            'name' => 'name',
            'value' => '$data->name',
        ),
        array(
            'name' => 'name_en',
            'value' => '$data->name_en',
        ),
        array(
            'name' => 'update_at',
            'value' => '$data->update_at',
            'filter' => false,
        ),
        array(
            'name' => 'date_warning',
            'value' => '$data->date_warning',
            'filter' => false,
        ),
        array(
            'name' => 'status_block',
            'value' => 'CompanyMotion::model()->blockStatus($data->status_block)',
            'filter' => CompanyMotion::model()->blockStatus(''),
        ),
        array(
            'name' => 'motion_status',
            'value' => 'CompanyMotion::model()->dataStatus($data->motion_status)',
            'filter' => CompanyMotion::model()->dataStatus(''),
        ),
//        array(
//            'class' => 'CButtonColumn',
//            'deleteConfirmation' => 'คุณต้องการลบบทความหรือไม่?',
//            'header' => 'เครื่องมือ',
//            'template' => '{view}{update}{delete}',
//            'buttons' => array(
//                'view' => array(
//                    'label' => 'view', //Text label of the button.
//                    'url' => 'Yii::app()->createUrl("/eDirectory/admin/companyDetail/",array("id"=>$data->id))',
//                ),
//                'update' => array(
//                    'label' => 'edit', //Text label of the button.
//                    'url' => 'Yii::app()->createUrl("/eDirectory/admin/insertCompany",array("id"=>$data->id))',
//                    'visible' => '$data->user_id == Yii::app()->user->id',
//                ),
//                'delete' => array(
//                    'label' => 'delete', //Text label of the button.
//                    'url' => 'Yii::app()->createUrl("/eDirectory/admin/delCompany/",array("id"=>$data->id))',
//                    'visible' => '$data->user_id == Yii::app()->user->id',
//                ),
//            ),
//            'afterDelete' => 'function(link,success,data){
//                                    if(data != ""){
//                                        alert(data);
//                                    }
//                    }'
//        ),
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
