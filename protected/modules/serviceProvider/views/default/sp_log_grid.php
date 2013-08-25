<?php

$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'sp_log-grid',
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
//        array(
//            'name' => 'service_company_id',
//            'value' => '$data->service_company_id',
//        ),
        array(
            'name' => 'companyName',
            'value' => '$data->companyName',
        ),
        array(
            'name' => 'companyName_en',
            'value' => '$data->companyName_en',
        ),
        array(
            'class' => 'CButtonColumn',
            'header' => Yii::t('language', 'เครื่องมือ'),
            'deleteConfirmation' => 'คุณต้องการลบบทความหรือไม่?',
            'template' => '{view}{delete}',
            'buttons' => array(
                'view' => array(
                    'label' => 'edit', //Text label of the button.
                    'url' => 'Yii::app()->createUrl("/serviceProvider/default/detail/",array("id"=>$data->service_company_id))',
                ),
                'delete' => array(
                    'label' => 'del', //Text label of the button.
                    'url' => 'Yii::app()->createUrl("/serviceProvider/default/spLogDel",array("sp_log_id"=>$data->sp_log_id))',
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
        'header' => 'หน้าที่: ',
        'firstPageLabel' => 'หน้าแรก',
        'prevPageLabel' => 'ก่อนหน้า',
        'nextPageLabel' => 'หน้าถัดไป',
        'lastPageLabel' => 'หน้าสุดท้าย',
    )
));
?>
