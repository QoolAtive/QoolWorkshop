<?php

$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'company_business_type_sub-grid',
    'dataProvider' => $dataProvider,
    'filter' => $modelSubType,
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
            'name' => 'company_type_business_id',
            'value' => 'CompanyTypeBusiness::model()->getList($data->company_type_business_id)',
            'filter' => CompanyTypeBusiness::model()->getList(),
        ),
        array(
            'name' => 'name_th',
            'value' => '"(".Yii::t("language","รหัส")." ".$data->company_sub_type_business_id.") ".$data->name_th',
        ),
        array(
            'name' => 'name_en',
            'value' => '"(".Yii::t("language","รหัส")." ".$data->company_sub_type_business_id.") ".$data->name_en',
        ),
//        array(
//            'header' => Yii::t('language', 'ร้านค้า'),
//            'class' => 'CDataColumn',
//            'type' => 'raw',
//            'htmlOptions' => array('style' => 'text-align:center; h'),
//            'value' => '
//                    Chtml::dropDownList(
//                        "no[id][".$data->company_type_business_id."][]", 
//                        $data->no, 
//                        Tool::countList($data->company_type_business_id,
//                        array("OnChange" => CHtml::ajax(array(
//                                "id" => "test_".$data->company_sub_type_business_id,
//                                "type" => "POST",
//                                "url" => CController::createUrl("/dataCenter/default/upDateNo"),
//                                "data" => array("type_id" => $data->company_sub_type_business_id, "value" => "js:this.value"),
//                            ))
//                        )
//                    ))
//                ',
//        ),
        array(
            'header' => Yii::t('language', 'ลำดับการแสดง'),
            'type' => 'raw',
            'htmlOptions' => array('style' => 'text-align:center; h'),
            'value' => '
                    OrderStore(
                    "no",
                    $data->no,
                    Tool::countList($data->company_type_business_id),
                    $data->company_sub_type_business_id
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
                    'url' => 'Yii::app()->createUrl("/dataCenter/default/companySubTypeBusinessInsert/", array("company_sub_type_business_id"=>$data->company_sub_type_business_id))',
                ),
                'delete' => array(
                    'label' => Yii::t('language', 'ลบ'),
                    'url' => 'Yii::app()->createUrl("/dataCenter/default/companySubTypeBusinessDel", array("company_sub_type_business_id"=>$data->company_sub_type_business_id))',
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

function OrderStore($id, $value, $list, $type_id) {


    return CHtml::dropDownList(
                    $id, $value, $list, array("onchange" => CHtml::ajax(
                        array(
                            "type" => "POST",
                            "url" => "/dataCenter/default/upDateNo",
                            "data" => array("type_id" => $type_id, "value" => "js:this.value")
                        )
                )
                    )
    );
}

?>
