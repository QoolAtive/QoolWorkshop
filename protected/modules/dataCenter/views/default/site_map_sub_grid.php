<?php

$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'site_map_sub-grid',
    'dataProvider' => $dataProvider,
    'filter' => $modelSiteMapSub,
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
            'name' => 'main_id',
            'value' => 'SiteMap::model()->getDataArray($data->main_id)',
            'filter' => SiteMap::model()->getDataArray(),
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
//        array(
//            'class' => 'CButtonColumn',
//            'header' => Yii::t('language', 'เครื่องมือ'),
//            'deleteConfirmation' => 'คุณต้องการลบบทความหรือไม่?',
//            'template' => '{update}{delete}',
//            'buttons' => array(
//                'update' => array(
//                    'label' => 'edit', //Text label of the button.
//                    'url' => 'Yii::app()->createUrl("/dataCenter/default/titleWebInsert/",array("title_web_id"=>$data->title_web_id))',
//                ),
//                'delete' => array(
//                    'label' => 'del', //Text label of the button.
//                    'url' => 'Yii::app()->createUrl("/dataCenter/default/titleWebDel",array("title_web_id"=>$data->title_web_id))',
//                ),
//            ),
//            'afterDelete' => 'function(link,success,data){
//                                    if(data != ""){
//                                        alert(data);
//                                    }
//                    }'
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
