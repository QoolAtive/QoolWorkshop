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
            'name' => 'amount',
            'value' => '$data->amount',
        ),
        array(
            'name' => 'type',
            'value' => 'Yii::t(\'language\', $data->type)',
        ),
        array(
            'name' => 'use',
            'value' => 'CompanyMotionSetting::model()->ListUse($data->use)',
            'filter' => CompanyMotionSetting::model()->ListUse(''),
        ),
        array(
            'class' => 'CButtonColumn',
            'deleteConfirmation' => Yii::t('language', 'คุณต้องการลบข้อมูลนี้หรือไม่?'),
            'header' => Yii::t('language', 'ตั้งค่า'),
            'template' => '{set}{unset}',
            'buttons' => array(
                'set' => array(
                    'label' => Yii::t('language', 'ตั้งค่า'),
                    'url' => 'Yii::app()->createUrl("/eDirectory/admin/setMotion/",array("company_motion_setting_id"=>$data->company_motion_setting_id))',
                    'imageUrl' => Yii::app()->request->baseUrl . '/images/setting.png',
                    'visible' => '$data->use == 0',
                ),
                'unset' => array(
                    'label' => Yii::t('language', 'ใช้งานอยู่'),
//                    'url' => 'Yii::app()->createUrl("/eDirectory/admin/setMotion/",array("company_motion_setting_id"=>$data->company_motion_setting_id))',
                    'imageUrl' => Yii::app()->request->baseUrl . '/images/apply.ico',
                    'visible' => '$data->use == 1',
                ),
            ),
        ),
        array(
            'class' => 'CButtonColumn',
            'deleteConfirmation' => Yii::t('language', 'คุณต้องการลบข้อมูลนี้หรือไม่?'),
            'header' => Yii::t('language', 'เครื่องมือ'),
            'template' => '{update} &nbsp; {delete}',
            'buttons' => array(
                'update' => array(
                    'label' => Yii::t('language', 'แก้ไข'),
                    'url' => 'Yii::app()->createUrl("/eDirectory/admin/motionSettingInsert",array("company_motion_setting_id"=>$data->company_motion_setting_id))',
                ),
                'delete' => array(
                    'label' => Yii::t('language', 'ลบ'),
                    'url' => 'Yii::app()->createUrl("/eDirectory/admin/motionSettingDel/",array("company_motion_setting_id"=>$data->company_motion_setting_id))',
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
