<?php

$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'type_business_sub-grid',
    'dataProvider' => $modelTypeSub->getData(),
    'filter' => $modelTypeSub,
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
            'name' => 'sp_type_business',
            'value' => 'SpTypeBusiness::model()->getDataArray($data->sp_type_business)',
            'filter' => SpTypeBusiness::model()->getDataArray(),
        ),
        array(
            'name' => 'name_th',
            'value' => '$data->name_th',
        ),
        array(
            'name' => 'name_en',
            'value' => '$data->name_en',
        ),
        array(
            'class' => 'CButtonColumn',
            'deleteConfirmation' => Yii::t('language', 'คุณต้องการลบข้อมูลนี้หรือไม่?'),
            'header' => Yii::t('language', 'เครื่องมือ'),
            'template' => '{update} &nbsp; {delete}',
            'buttons' => array(
                'update' => array(
                    'label' => Yii::t('language', 'แก้ไข'), //Text label of the button.
                    'url' => 'Yii::app()->createUrl("/serviceProvider/manage/typeBusinessSubInsert/",array("sp_type_business_sub_id"=>$data->sp_type_business_sub_id))',
                ),
                'delete' => array(
                    'label' => Yii::t('language', 'ลบ'), //Text label of the button.
                    'url' => 'Yii::app()->createUrl("/serviceProvider/manage/typeBusinessSubDel/",array("sp_type_business_sub_id"=>$data->sp_type_business_sub_id))',
                ),
            ),
            'afterDelete' => 'function(link,success,data){
                                    if(data != ""){
                                        alert(data);
                                    }
                    }'
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
