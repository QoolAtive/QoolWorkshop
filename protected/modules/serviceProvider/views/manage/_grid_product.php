<?php

$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'product-grid',
    'dataProvider' => $model->getData($id),
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
            'name' => 'name',
            'value' => '$data->name',
        ),
        array(
            'name' => 'detail',
            'value' => '$data->detail',
//                'filter' => '',
        ),
        array(
            'name' => 'name_en',
            'value' => '$data->name_en',
        ),
        array(
            'name' => 'detail_en',
            'value' => '$data->detail_en',
//                'filter' => '',
        ),
        array(
            'name' => 'guide',
            'value' => 'SpProduct::model()->getDataTypeList($data->guide)',
            'filter' => SpProduct::model()->getDataTypeList(' ', true),
        ),
        array(
            'class' => 'CButtonColumn',
            'deleteConfirmation' => 'คุณต้องการลบบทความหรือไม่?',
            'header' => 'เครื่องมือ',
            'template' => '{update}{delete}',
            'buttons' => array(
                'update' => array(
                    'label' => 'edit', //Text label of the button.
                    'url' => 'Yii::app()->createUrl("/serviceProvider/manage/insertProduct/",array("id"=>' . $id . ', "pro_id" => $data->id))',
                ),
                'delete' => array(
                    'label' => 'del', //Text label of the button.
                    'url' => 'Yii::app()->createUrl("/serviceProvider/manage/delProduct/",array("id"=>' . $id . ', "pro_id" => $data->id))',
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
