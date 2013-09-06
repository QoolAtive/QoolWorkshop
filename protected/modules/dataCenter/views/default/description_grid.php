<?php

$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'description-grid',
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
            'name' => 'detail',
            'value' => '$data->detail',
        ),
        array(
            'name' => 'detail_en',
            'value' => '$data->detail_en',
        ),
        array(
            'name' => 'status',
            'value' => 'TitleWeb::model()->getStatus($data->status)',
            'filter' => false,
        ),
        array(
            'class' => 'CButtonColumn',
            'header' => Yii::t('language', 'ตั้งค่า'),
            'template' => '{set}&nbsp;{unset}',
            'buttons' => array(
                'set' => array(
                    'label' => Yii::t('language', 'เลือก'),
                    'url' => 'Yii::app()->createUrl("/dataCenter/default/descriptionSet/", array("description_id"=>$data->description_id))',
                    'imageUrl' => Yii::app()->request->baseUrl . '/images/setting.png',
                    'visible' => '$data->status == 0',
                ),
                'unset' => array(
                    'label' => Yii::t('language', 'ใช้งานอยู่'),
                    'url' => 'Yii::app()->createUrl("/dataCenter/default/descriptionSet/", array("description_id"=>$data->description_id))',
                    'imageUrl' => Yii::app()->request->baseUrl . '/images/apply.ico',
                    'visible' => '$data->status == 1',
                ),
            ),
        ),
        array(
            'class' => 'CButtonColumn',
            'header' => Yii::t('language', 'เครื่องมือ'),
            'deleteConfirmation' => Yii::t('language', 'คุณต้องการลบข้อมูลนี้หรือไม่?'),
            'template' => '{update}&nbsp;{delete}',
            'buttons' => array(
                'update' => array(
                    'label' => Yii::t('language', 'แก้ไข'),
                    'url' => 'Yii::app()->createUrl("/dataCenter/default/descriptionInsert/",array("description_id"=>$data->description_id))',
                ),
                'delete' => array(
                    'label' => Yii::t('language', 'ลบ'),
                    'url' => 'Yii::app()->createUrl("/dataCenter/default/descriptionDel",array("description_id"=>$data->description_id))',
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
