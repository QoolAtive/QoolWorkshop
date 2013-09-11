<?php

$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'site_map_sub-grid',
    'dataProvider' => $dataProvider,
    'filter' => $modelSiteMapSub,
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
        array(
            'class' => 'CButtonColumn',
            'header' => Yii::t('language', 'เครื่องมือ'),
            'deleteConfirmation' => Yii::t('language', 'คุณต้องการลบข้อมูลนี้หรือไม่?'),
            'template' => '{update}&nbsp;&nbsp;{delete}',
            'buttons' => array(
                'update' => array(
                    'label' => Yii::t('language', 'แก้ไข'),
                    'url' => 'Yii::app()->createUrl("/dataCenter/default/siteMapSubInsert/",array("site_map_sub_id"=>$data->site_map_sub_id))',
                ),
                'delete' => array(
                    'label' => Yii::t('language', 'ลบ'),
                    'url' => 'Yii::app()->createUrl("/dataCenter/default/siteMapSubDel",array("site_map_sub_id"=>$data->site_map_sub_id))',
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
