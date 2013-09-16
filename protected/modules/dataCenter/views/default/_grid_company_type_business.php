<?php

$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'company_business_type-grid',
    'dataProvider' => $model->getData(),
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
            'name' => 'name',
            'value' => '"(".Yii::t("language","รหัส")." ".$data->id.") ".$data->name',
        ),
        array(
            'name' => 'name_en',
            'value' => '"(".Yii::t("language","รหัส")." ".$data->id.") ".$data->name_en',
        ),
        array(
            'header' => Yii::t('language', 'ลำดับการแสดง'),
            'type' => 'raw',
            'htmlOptions' => array('style' => 'text-align:center; width: 65px;'),
            'value' => '
                    OrderStoreMain(
                    "no",
                    $data->no,
                    countListMain(),
                    $data->id
                    );
                ',
        ),
        array(
            'class' => 'CButtonColumn',
            'header' => Yii::t('language', 'เครื่องมือ'),
            'deleteConfirmation' => Yii::t('language', 'คุณต้องการลบข้อมูลนี้หรือไม่?'),
            'template' => '{update}&nbsp;{delete}',
            'buttons' => array(
                'update' => array(
                    'label' => Yii::t('language', 'แก้ไข'),
                    'url' => 'Yii::app()->createUrl("/dataCenter/default/insertCompanyTypeBusiness/",array("id"=>$data->id))',
                ),
                'delete' => array(
                    'label' => Yii::t('language', 'ลบ'),
                    'url' => 'Yii::app()->createUrl("/dataCenter/default/delCompanyTypeBusiness",array("id"=>$data->id))',
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

function OrderStoreMain($id, $value, $list, $type_id) {


    return CHtml::dropDownList(
                    $id, $value, $list, array("onchange" => CHtml::ajax(
                        array(
                            "type" => "POST",
                            "url" => "/dataCenter/default/updateNoMain",
                            "data" => array("type_id" => $type_id, "value" => "js:this.value")
                        )
                )
                    )
    );
}

function countListMain() {
    $model_count = CompanyTypeBusiness::model()->count();
    $data = array();
    for ($n = 1; $n <= $model_count; $n++) {
        $data[$n] = $n;
    }
    return $data;
}
?>
