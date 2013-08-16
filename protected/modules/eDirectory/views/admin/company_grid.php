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
            'value' => '$data->main_business',
        ),
//        array(
//            'name' => 'sub_business',
//            'value' => '$data->sub_business',
//        ),
        array(
            'name' => 'name_en',
            'value' => '$data->name_en',
        ),
        array(
            'name' => 'main_business_en',
            'value' => '$data->main_business_en',
        ),
//        array(
//            'name' => 'sub_business_en',
//            'value' => '$data->sub_business_en',
//        ),
//        array(
//            'name' => 'user_id',
//            'value' => '$data->user_id',
//        ),
        array(
            'class' => 'CButtonColumn',
            'deleteConfirmation' => 'คุณต้องการลบบทความหรือไม่?',
            'header' => 'เครื่องมือ',
            'template' => '{view}{update}{delete}',
            'buttons' => array(
                'view' => array(
                    'label' => 'view', //Text label of the button.
                    'url' => 'Yii::app()->createUrl("/eDirectory/default/companyDetail/",array("id"=>$data->id))',
                ),
                'update' => array(
                    'label' => 'edit', //Text label of the button.
                    'url' => 'Yii::app()->createUrl("/eDirectory/admin/insertCompany",array("id"=>$data->id))',
                    'visible' => '$data->user_id == Yii::app()->user->id',
                ),
                'delete' => array(
                    'label' => 'del', //Text label of the button.
                    'url' => 'Yii::app()->createUrl("/eDirectory/admin/delCompany/",array("id"=>$data->id))',
                    'visible' => '$data->user_id == Yii::app()->user->id',
                ),
            ),
            'afterDelete' => 'function(link,success,data){
                                    if(data != ""){
                                        alert(data);
                                    }
                    }'
        ),
        array(
            'visible' => $visible,
            'class' => 'CButtonColumn',
            'header' => 'จัดการ<p>สินค้า</p>',
            'template' => '{view}',
            'buttons' => array(
                'view' => array(
                    'label' => 'view', //Text label of the button.
                    'url' => 'Yii::app()->createUrl("/eDirectory/admin/product/",array("id"=>$data->id))',
                    'visible' => '$data->user_id == Yii::app()->user->id',
                ),
            ),
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
