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
            'name' => 'amount',
            'value' => '$data->amount',
        ),
        array(
            'name' => 'type',
            'value' => '$data->type',
        ),
        array(
            'name' => 'use',
            'value' => 'CompanyMotionSetting::model()->ListUse($data->use)',
            'filter' => CompanyMotionSetting::model()->ListUse(''),
        ),
        array(
            'class' => 'CButtonColumn',
            'deleteConfirmation' => 'คุณต้องการลบบทความหรือไม่?',
            'header' => 'เครื่องมือ',
            'template' => '{set}{unset}',
            'buttons' => array(
                'set' => array(
                    'label' => 'set', //Text label of the button.
                    'url' => 'Yii::app()->createUrl("/eDirectory/admin/setMotion/",array("company_motion_setting_id"=>$data->company_motion_setting_id))',
                    'visible' => '$data->use == 0',
                ),
                'unset' => array(
                    'label' => 'unset', //Text label of the button.
                    'url' => 'Yii::app()->createUrl("/eDirectory/admin/setMotion/",array("company_motion_setting_id"=>$data->company_motion_setting_id))',
                    'visible' => '$data->use == 1',
                ),
            ),
        ),
        array(
            'class' => 'CButtonColumn',
            'deleteConfirmation' => 'คุณต้องการลบบทความหรือไม่?',
            'header' => 'เครื่องมือ',
            'template' => '{view}{update}{delete}',
            'buttons' => array(
                'view' => array(
                    'label' => 'view', //Text label of the button.
                    'url' => 'Yii::app()->createUrl("/eDirectory/admin/companyDetail/",array("company_motion_setting_id"=>$data->company_motion_setting_id))',
                ),
                'update' => array(
                    'label' => 'edit', //Text label of the button.
                    'url' => 'Yii::app()->createUrl("/eDirectory/admin/insertCompany",array("company_motion_setting_id"=>$data->company_motion_setting_id))',
                ),
                'delete' => array(
                    'label' => 'del', //Text label of the button.
                    'url' => 'Yii::app()->createUrl("/eDirectory/admin/delCompany/",array("company_motion_setting_id"=>$data->company_motion_setting_id))',
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
