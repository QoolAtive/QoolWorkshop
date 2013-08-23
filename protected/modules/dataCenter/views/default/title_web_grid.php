<?php

$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'title_web-grid',
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
            'header' => 'ตั้งค่า',
            'template' => '{set}{unset}',
            'buttons' => array(
                'set' => array(
                    'label' => 'set', //Text label of the button.
                    'url' => 'Yii::app()->createUrl("/dataCenter/default/titleWebSet/", array("title_web_id"=>$data->title_web_id))',
                    'imageUrl' => Yii::app()->request->baseUrl . '/images/setting.png',
                    'visible' => '$data->status == 0',
                ),
                'unset' => array(
                    'label' => 'used', //Text label of the button.
                    'url' => 'Yii::app()->createUrl("/dataCenter/default/titleWebSet/", array("title_web_id"=>$data->title_web_id))',
                    'imageUrl' => Yii::app()->request->baseUrl . '/images/apply.ico',
                    'visible' => '$data->status == 1',
                ),
            ),
        ),
        array(
            'class' => 'CButtonColumn',
            'header' => Yii::t('language', 'เครื่องมือ'),
            'deleteConfirmation' => 'คุณต้องการลบบทความหรือไม่?',
            'template' => '{update}{delete}',
            'buttons' => array(
                'update' => array(
                    'label' => 'edit', //Text label of the button.
                    'url' => 'Yii::app()->createUrl("/dataCenter/default/titleWebInsert/",array("title_web_id"=>$data->title_web_id))',
                ),
                'delete' => array(
                    'label' => 'del', //Text label of the button.
                    'url' => 'Yii::app()->createUrl("/dataCenter/default/titleWebDel",array("title_web_id"=>$data->title_web_id))',
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
