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
            'name' => 'name',
            'value' => '$data->name',
        ),
        array(
            'name' => 'main_business',
//                'value' => '$data->date_write',
            'value' => '$data->main_business',
//                'filter' => '',
        ),
        array(
            'name' => 'sub_business',
//                'value' => '$data->date_write',
            'value' => '$data->sub_business',
//                'filter' => '',
        ),
        array(
            'name' => 'name_en',
            'value' => '$data->name_en',
        ),
        array(
            'name' => 'main_business_en',
//                'value' => '$data->date_write',
            'value' => '$data->main_business_en',
//                'filter' => '',
        ),
        array(
            'name' => 'sub_business_en',
//                'value' => '$data->date_write',
            'value' => '$data->sub_business_en',
//                'filter' => '',
        ),
        array(
            'class' => 'CButtonColumn',
            'deleteConfirmation' => 'คุณต้องการลบบทความหรือไม่?',
            'header' => 'เครื่องมือ',
            'template' => '{view}{update}{delete}',
            'buttons' => array(
                'view' => array(
                    'label' => 'view', //Text label of the button.
                    'url' => 'Yii::app()->createUrl("/eDirectory/admin/companyDetail/",array("id"=>$data->id))',
                ),
                'update' => array(
                    'label' => 'edit', //Text label of the button.
                    'url' => 'Yii::app()->createUrl("/serviceProvider/manage/insertCompany/",array("id"=>$data->id))',
                ),
                'delete' => array(
                    'label' => 'del', //Text label of the button.
                    'url' => 'Yii::app()->createUrl("/serviceProvider/manage/delCompany/",array("id"=>$data->id))',
                ),
            ),
            'afterDelete' => 'function(link,success,data){
                                    if(data != ""){
                                        alert(data);
                                    }
                    }'
        ),
//        array(
//            'class' => 'CButtonColumn',
//            'header' => 'จัดการ<p>สินค้า</p>',
//            'template' => '{view}',
//            'buttons' => array(
//                'view' => array(
//                    'label' => 'view', //Text label of the button.
//                    'url' => 'Yii::app()->createUrl("/serviceProvider/manage/product/",array("id"=>$data->id))',
//                ),
//            ),
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
