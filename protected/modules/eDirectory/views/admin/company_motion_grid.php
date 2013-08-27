<?php

$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'type_business-grid',
    'dataProvider' => $dataProvider,
    'filter' => $model,
    'summaryText' => '',
    'emptyText' => Yii::t('language', 'ไม่พบข้อมูล'),
    'columns' => array(
        array(
            'header' => Yii::t('language', 'ลำดับ'),
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
            'value' => 'Tool::ChangeDateTimeToShow($data->update_at)',
            'filter' => false,
        ),
        array(
            'name' => 'date_warning',
            'value' => 'Tool::ChangeDateTimeToShow($data->date_warning)',
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
