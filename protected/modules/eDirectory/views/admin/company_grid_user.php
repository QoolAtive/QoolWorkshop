<h3><?php echo Yii::t('language', 'ร้านค้าโดยสมาชิก'); ?></h3>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'company_user-grid',
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
            'name' => 'name',
            'value' => '$data->name',
        ),
        array(
            'name' => 'name_en',
            'value' => '$data->name_en',
        ),
        array(
            'class' => 'CButtonColumn',
            'deleteConfirmation' => Yii::t('language', 'คุณต้องการลบข้อมูลนี้หรือไม่?'),
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
