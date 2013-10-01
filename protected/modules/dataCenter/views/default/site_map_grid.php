<?php

$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'site_map-grid',
    'dataProvider' => $dataProvider,
    'filter' => $modelSiteMap,
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
            'header' => Yii::t('language', 'ลำดับการแสดง'),
            'type' => 'raw',
            'htmlOptions' => array('style' => 'text-align:center; width: 65px;'),
            'value' => '
                    OrderStoreMain(
                    "no",
                    $data->sort,
                    countListMain(),
                    $data->site_map_id
                    );
                ',
        ),
        array(
            'class' => 'CButtonColumn',
            'header' => Yii::t('language', 'เครื่องมือ'),
            'deleteConfirmation' => Yii::t('language', 'คุณต้องการลบข้อมูลนี้หรือไม่?'),
            'template' => '{update}&nbsp;&nbsp;{delete}',
            'buttons' => array(
                'update' => array(
                    'label' => Yii::t('language', 'แก้ไข'),
                    'url' => 'Yii::app()->createUrl("/dataCenter/default/siteMapInsert/",array("site_map_id"=>$data->site_map_id))',
                ),
                'delete' => array(
                    'label' => Yii::t('language', 'ลบ'),
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

function OrderStoreMain($id, $value, $list, $data_id) {


    return CHtml::dropDownList(
                    $id, $value, $list, array("onchange" => CHtml::ajax(
                        array(
                            "type" => "POST",
                            "url" => "/dataCenter/default/updateSiteMapMain",
                            "data" => array("id" => $data_id, "value" => "js:this.value")
                        )
                )
                    )
    );
}

function countListMain() {
    $model_count = SiteMap::model()->count();
    $data = array();
    for ($n = 1; $n <= $model_count; $n++) {
        $data[$n] = $n;
    }
    return $data;
}

?>
