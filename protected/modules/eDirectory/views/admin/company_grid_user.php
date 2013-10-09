<!-- <h3><?php echo Yii::t('language', 'ร้านค้าโดยสมาชิก'); ?></h3> -->
<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => '2_company_user-grid',
    'dataProvider' => $dataProvider,
    'filter' => $model,
    'summaryText' => '',
//    'ajaxUpdate' => false,
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
            'value' => '$data->name',
        ),
        array(
            'name' => 'name_en',
            'value' => '$data->name_en',
        ),
        array(
            'name' => 'verify',
            'type' => 'raw',
            'value' => 'setVerify($data->verify, listConfirm(), $data->id)',
            'filter' => listConfirm(),
        ),
        array(
            'class' => 'CButtonColumn',
//            'deleteConfirmation' => Yii::t('language', 'คุณต้องการลบข้อมูลนี้หรือไม่?'),
            'header' => Yii::t('language', 'เครื่องมือ'),
            'template' => '{view}&nbsp;{update}&nbsp;{delete}',
            'buttons' => array(
                'view' => array(
                    'label' => Yii::t('language', 'ดู'),
                    'url' => 'Yii::app()->createUrl("/eDirectory/default/companyDetail/",array("id"=>$data->id))',
                ),
                'update' => array(
                    'label' => Yii::t('language', 'แก้ไข'),
                    'url' => 'Yii::app()->createUrl("/eDirectory/admin/insertCompany",array("id"=>$data->id))',
                    'visible' => '$data->user_id == Yii::app()->user->id',
                ),
                'delete' => array(
                    'label' => Yii::t('language', 'ลบ'),
                    'url' => 'Yii::app()->createUrl("/eDirectory/admin/delCompany/",array("id"=>$data->id))',
                    'visible' => '$data->user_id == Yii::app()->user->id',
                    'click' => "function() {
                                if(!confirm('" . Yii::t('language', 'คุณต้องการลบข้อมูลนี้หรือไม่?') . "')) return false;
                                $.fn.yiiGridView.update('2_company_user-grid', {
                                        type:'POST',
                                        url:$(this).attr('href'),
                                        success:function(text,status) {
                                                 $.fn.yiiGridView.update('2_company_user-grid');
                                                alert(text);                                                                                    
                                        }
                                });
                                return false;
                        }",
                ),
            ),
//            'afterDelete' => 'function(link,success,data){
//                                    if(data != ""){
//                                        alert(data);
//                                    }
//                    }'
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

function listConfirm() {
    return array(
        '0' => 'ยังไม่ได้รับเครื่องหมาย',
        '1' => 'ได้รับเครื่องหมาย',
    );
}

function setVerify($select, $list, $id) {
    return CHtml::dropDownList(
                    'verify', $select, $list, array("onchange" => CHtml::ajax(
                        array(
                            "type" => "POST",
                            "url" => "/eDirectory/admin/setVerify",
                            "data" => array("value" => 'js:this.value', 'company_id' => $id)
                        )
                )
                    )
    );
}
?>
