<?php

$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'site_map-grid',
    'dataProvider' => $dataProvider,
    'filter' => $modelSiteMap,
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
            'type' => 'raw',
            'name' => 'name',
            'value' => 'CHtml::link($data->name, array($data->link), array("target" => "_bank"))',
        ),
        array(
            'type' => 'raw',
            'name' => 'name_en',
            'value' => 'CHtml::link($data->name_en, array($data->link), array("target" => "_bank"))',
        ),
        array(
            'class' => 'CButtonColumn',
            'header' => Yii::t('language', 'เครื่องมือ'),
            'deleteConfirmation' => 'คุณต้องการลบบทความหรือไม่?',
            'template' => '{update}{delete}',
            'buttons' => array(
                'update' => array(
                    'label' => 'edit', //Text label of the button.
                    'url' => 'Yii::app()->createUrl("/dataCenter/default/siteMapInsert/",array("site_map_id"=>$data->site_map_id))',
                ),
                'delete' => array(
                    'label' => 'del', //Text label of the button.
                    'url' => 'Yii::app()->createUrl("/dataCenter/default/siteMapDel",array("site_map_id"=>$data->site_map_id))',
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
